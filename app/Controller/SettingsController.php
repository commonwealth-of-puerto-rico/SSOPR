<?php
/**
 * Search controller.
 *
 */

App::uses('AppController', 'Controller');

class SettingsController extends AppController {
    public $components = array('Security');

	public function admin_index() {		
        if (!$this->Auth->loggedIn()) {
            $this->redirect('/users/login');        
        } else {
            $this->paginate = array();                                           
            $this->Setting->recursive = 0;
            $this->set('settings', $this->paginate());
        }
    }

    public function admin_add() {
        $currentUser = $this->Session->read('myUser'); 
        
        $this->set('title_for_layout', 'Create a Setting');   
        
        if ($this->request->is('post')) {

            $this->Setting->create();            
            if ($this->Setting->save($this->request->data)) {
                $this->redirect(array('controller' => 'settings', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }
            $this->set('action', "add");
            $this->render('admin_form');         
        } else {
            $this->set('action', "add");
            $this->render('admin_form');         
        }
    }

    public function admin_delete($id) {
        $id = $this->request->params['pass'][0];

        if( !$id ) {
            $this->Session->setFlash(__('You must select a setting.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));            
            $this->redirect(array('controller' => 'settings', 'action'=>'index'));
        }else{
            if( $this->Setting->delete( $id ) ){
                $this->Session->setFlash(__('The setting was deleted.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));                    
	            $this->redirect(array('controller' => 'settings', 'action'=>'index'));

            }else{  
                $this->Session->setFlash(__('Unable to delete the setting.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));            
	            $this->redirect(array('controller' => 'settings', 'action'=>'index'));
            }
        }
    }
    public function admin_edit($id) {
        $this->set('title_for_layout', 'Edit Setting');     
        if (!isset($id)) {
            $this->Session->setFlash(__('You must select a setting.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));            
            $this->redirect(array('controller' => 'setting', 'action'=>'index'));            
        }
        $id = $this->request->params['pass'][0];                
        $this->Setting->id = $id;
        $setting = $this->Setting->read();  
        $this->set('setting', $setting);
                
        if( $this->Setting->exists() ){
            if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
                if( $this->Setting->save( $this->request->data ) ){
                    $this->Session->setFlash(__('The changes where successfully saved.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));
                    $this->redirect(array('controller' => 'settings', 'action'=>'edit', $id));
                }else {
                    $this->Session->setFlash(__('Unable to modify this setting. Please, try again.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'
                    ));
                }
                $this->set('action', "edit");
                $this->render('admin_form');         
           }else{
                $this->request->data = $this->Setting->read();
                $this->set('action', "edit");
                $this->render('admin_form');         
            }
        }
    }

}
