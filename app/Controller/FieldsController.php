<?php
/**
 * Fields controller.
 *
 */

App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');

class FieldsController extends AppController {
    public $components = array('Security');

	public function admin_index() {		
        if (!$this->Auth->loggedIn()) {
            $this->redirect('/users/login');        
        } else {
            $this->paginate = array();                                           
            $this->Field->recursive = 0;
            $this->set('fields', $this->paginate());
        }
    }

    public function admin_add() {        
        $this->set('title_for_layout', 'Create a Field');   
		/* Get custom fields */
        $customFieldsUrl = '1/object/' . Configure::read('DB_OBJECTTYPCLASS_CUSTOMINVENTORY') . '/attrs';
        $URL = Configure::read('ApiUrl') . $customFieldsUrl;

        $HttpSocket = new HttpSocket();
        $HttpSocket->configAuth('Basic', Configure::read('apiUser'), Configure::read('apiPassword'));            
        $response = $HttpSocket->get($URL);            
        $customFields = json_decode($response->body);

        if (is_object($customFields) && (!isset($customFields->fault))) {
            foreach($customFields->attrs as $k=>$v) {
                if (!strstr($v->name, '_DB')) {
                    $customFieldOptions[$v->name] = $v->name;
                }
            }
            $customFields = $customFieldOptions;
        }

        
        $this->set('customFields', $customFields);        

        if ($this->request->is('post')) {
            $this->Field->create();            
            if ($this->Field->save($this->request->data)) {
                $this->redirect(array('controller' => 'fields', 'action' => 'index'));
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
            $this->Session->setFlash(__('You must select a field.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));            
            $this->redirect(array('controller' => 'fields', 'action'=>'index'));
        }else{
            if( $this->Field->delete( $id ) ){
                $this->Session->setFlash(__('The field was deleted.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));                    
	            $this->redirect(array('controller' => 'fields', 'action'=>'index'));

            }else{  
                $this->Session->setFlash(__('Unable to delete the field.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));            
	            $this->redirect(array('controller' => 'fields', 'action'=>'index'));
            }
        }
    }
    public function admin_edit($id) {
        $this->set('title_for_layout', 'Edit Field');     
        if (!isset($id)) {
            $this->Session->setFlash(__('You must select a field.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));            
            $this->redirect(array('controller' => 'field', 'action'=>'index'));            
        }

        $id = $this->request->params['pass'][0];                
        $this->Field->id = $id;
        $field = $this->Field->read();  
        $this->set('field', $field);

		/* Get custom fields */
        $customFieldsUrl = '1/object/' . Configure::read('DB_OBJECTTYPCLASS_CUSTOMINVENTORY') . '/attrs';
        $URL = Configure::read('ApiUrl') . $customFieldsUrl;

        $HttpSocket = new HttpSocket();
        $HttpSocket->configAuth('Basic', Configure::read('apiUser'), Configure::read('apiPassword'));            
        $response = $HttpSocket->get($URL);            
        $customFields = json_decode($response->body);

        if (is_object($customFields) && (!isset($customFields->fault))) {
            foreach($customFields->attrs as $k=>$v) {
                if (!strstr($v->name, '_DB')) {
                    $customFieldOptions[$v->name] = $v->name;
                }
            }
            $customFields = $customFieldOptions;
        }

        
        $this->set('customFields', $customFields);        
        
        if( $this->Field->exists() ){
            if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
                if( $this->Field->save( $this->request->data ) ){
                    $this->Session->setFlash(__('The changes where successfully saved.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));
                    $this->redirect(array('controller' => 'fields', 'action'=>'edit', $id));
                }else {
                    $this->Session->setFlash(__('Unable to modify this field. Please, try again.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'
                    ));
                }
                $this->set('action', "edit");
                $this->render('admin_form');         
           }else{
                $this->request->data = $this->Field->read();
                $this->set('action', "edit");
                $this->render('admin_form');         
            }
        }
    }

}
