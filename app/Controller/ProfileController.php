<?php
App::uses('AppController', 'Controller');

class ProfileController extends AppController {
    public $components = array('RequestHandler');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('profile', 'add', 'edit');           
    }
    public function add() {
        $this->redirect('/user_details/profile'); 
    }  

    public function admin_index($id = null) {  
        $this->loadModel('User');
        if (isset($id) && ($id != "")) :
               $currentUser['id'] = $id;
        elseif (!$currentUser = $this->Session->read('Auth.User')) :
            $this->Session->setFlash(__('You are not logged in.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));                     
            $this->redirect('/pages/home');
         endif;

        $this->User->id = $currentUser['id'];
        $user = $this->User->read();  

        $profile = $this->Profile->findByUserId($user['User']['id']);
        $this->set('user', $user);                

            if(empty($profile)) :                       
                $action = "add";  
                //$this->UserDetail->create();
            else :
                $action = "edit";
                $this->set('profile', $profile);  
            endif;

            if (!empty($this->request->data)) :   
                if ($this->Profile->save($this->request->data)) :
                    $this->Session->setFlash(__('Account information has been saved.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));
                    $this->redirect('/admin/profile');
                else :
                    $this->Session->setFlash(__('Account profile could not be created. Please, try again'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-error'
                    ));
                endif;                
                $this->set('action', $action);                    
            else :
                $this->request->data = $profile;                            
                $this->set('action', $action);
            endif;
    }        
}    
      
?>    