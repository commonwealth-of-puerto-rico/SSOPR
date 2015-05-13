<?php
/**
 * Services controller
 *
 */

App::uses('AppController', 'Controller');

class AgenciesController extends AppController {
    public $components = array('Security');

	public function admin_index() {		
        if (!$this->Auth->loggedIn()) {
            $this->redirect('/users/login');        
        } else {
            $this->paginate = array();                                           
            $this->Agency->recursive = 0;
            $this->set('agencies', $this->paginate());
        }
    }


    public function index() {
        echo "index goes here!";
        die();
    }
    
    public function admin_add() {
        
        $this->set('title_for_layout', 'Agencies');   
        
        if ($this->request->is('post')) {

            $this->Agency->create();            
            if ($this->Agency->save($this->request->data)) {
                $this->redirect(array('controller' => 'agencies', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The agency could not be added. Please, try again'), 'alert', array(
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
    
    public function admin_edit($id) {
        $this->set('title_for_layout', 'Edit Agency');     
        if (!isset($id)) {
            $this->Session->setFlash(__('You must select a agency.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));            
            $this->redirect(array('controller' => 'agencies', 'action'=>'index'));            
        }

        $id = $this->request->params['pass'][0];                
        $this->Agency->id = $id;
        $agency = $this->Agency->read();  
        $this->set('agency', $agency);
                
        if( $this->Agency->exists() ){
            if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
                if( $this->Setting->save( $this->request->data ) ){
                    $this->Session->setFlash(__('The changes where successfully saved.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));
                    $this->redirect(array('controller' => 'agencies', 'action'=>'edit', $id));
                }else {
                    $this->Session->setFlash(__('Unable to update this agency. Please, try again.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'
                    ));
                }
                $this->set('action', "edit");
                $this->render('admin_form');         
           }else{
                $this->request->data = $this->Agency->read();
                $this->set('action', "edit");
                $this->render('admin_form');         
            }
        }
    }

    
    public function admin_delete($id) {
        $id = $this->request->params['pass'][0];

        if( !$id ) {
            $this->Session->setFlash(__('You must select an agency.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));            
            $this->redirect(array('controller' => 'agencies', 'action'=>'index'));
        }else{
            if( $this->Agency->delete( $id ) ){
                $this->Session->setFlash(__('The agency was deleted.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));                    
	            $this->redirect(array('controller' => 'agencies', 'action'=>'index'));

            }else{  
                $this->Session->setFlash(__('Unable to delete the agency.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));            
	            $this->redirect(array('controller' => 'agency', 'action'=>'index'));
            }
        }
    }
    
}
