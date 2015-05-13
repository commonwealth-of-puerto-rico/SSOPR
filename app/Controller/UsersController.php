<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('SocialProfile', 'Controller');

class UsersController extends AppController {
//    var $uses = array('SocialProfile');
    public $components = array('Hybridauth');
//    public $components = array('Security');

    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'User.name' => 'asc'
        )
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_login', 'edit', 'view', 'login', 'logout', 'social_login', 'social_endpoint');
    }

    public function admin_index() {
        if (!$this->Auth->loggedIn()) {
            $this->redirect('/users/login');        
        } else {
            $this->paginate = array();                                           
            $this->User->recursive = 1;
            $this->set('users', $this->paginate());
        }
    }

    public function admin_view($id = null) {
        if (!isset($id)) : $this->redirect('/admin/users'); endif;
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('title_for_layout', 'View User Information');           
        $this->set('user', $this->User->read(null, $id));
        
    }
    
    public function admin_myaccount($id = null) {
        $user = $this->Session->read('Auth.User');
        $id = $user['id'];

        if (!isset($id)) : $this->redirect('/'); endif;
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set(compact('groups'));       
        $this->set('title_for_layout', 'View User Information');          
        $this->set('user', $this->User->read(null, $id));
    }
    
    public function admin_login() {
        $this->redirect('/users/login');                
    }
    public function login() {
        $this->set('title_for_layout', 'Log in');           
        
//            echo Security::hash('security4all', null, true);      
//            echo $this->request->data['User']['password'];
//            die(print_r($this->request->data));

        $this->User->set($this->request->data);
        if (!$this->Auth->loggedIn()) {
            if ($this->User->validates()) {
                if ($this->request->is('post')) {
                    if ($this->Auth->login()) {
                        if ($this->request->data['User']['remember'] == 1) {
                            unset($this->request->data['User']['remember']);
                            $this->Cookie->write('remember_me', $this->request->data['User'], true, '2 weeks');
                        }                        
                        $uid = $this->Auth->user('id');
                        $this->User->id = $uid;
                        $user = $this->User->read();

                        $this->User->saveField('last_login', date('Y-m-d H:i:s'));
                        $this->Session->setFlash(__('Logged successfully'), 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-info'
                        ));
                        $this->redirect('/admin/agencies'); 

                    } else {
			$this->Session->setFlash(__('Invalid username or password, try again'), 'alert', array(
			    'plugin' => 'BoostCake',
			    'class' => 'alert-warning'
			));
                    }
                }
            } else {
                // didn't validate logic
                $errors = $this->User->validationErrors;
            }
        } else {

            $this->redirect('/agencies');        
        }
    }

    public function logout() {        
        $this->Cookie->delete('remember_me');        
        $this->Hybridauth->logout();        
        $this->redirect($this->Auth->logout());      
    }
    
    public function admin_reset($id = null) {
        if (isset($this->params['named']['user_id']) && (!empty($this->params['named']['user_id']))) :
            $this->User->id = $this->params['named']['user_id'];
        endif;
        $user = $this->User->read();  
        if (!empty($user)) :
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";           
            
            $user['User']['tmpPassword'] = substr(str_shuffle($chars),0,8);            
            $this->User->saveField('password', $user['User']['tmpPassword']);

            $this->set('user', $user);
            $Email = new CakeEmail();
            $Email->viewVars(array('user' => $user));                
            $Email->template('account_reset', 'default')
                ->emailFormat('both')
                ->to($user['User']['email'])
                ->from('webmaster@digicel.gb-advisors.com')
                ->subject('The account has been reset')
                ->send($this->request->data);
            $this->Session->setFlash(__('The user has been reset. An email has been sent to the user with the account information.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ));        
            $this->redirect(array('action' => 'admin_view', $this->params['named']['user_id']));            
        endif;
    }
    
    public function admin_add() {
        $currentUser = $this->Session->read('myUser'); 
        
        $this->set('title_for_layout', 'Add A User');   
        
        if ($this->request->is('post')) {
            $this->request->data['User']['username'] = $this->request->data['User']['email'];

            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";           
            
            $this->request->data['User']['tmpPassword'] = substr(str_shuffle($chars),0,8);            
            $this->request->data['User']['password'] = $this->request->data['User']['tmpPassword'];

            $this->User->create();            

            if ($this->User->save($this->request->data)) {
                $user_id = $this->User->getLastInsertId();                
                if ($this->request->data['User']['active'] != 0) {
                    $this->set('user', $this->request->data);
                    $Email = new CakeEmail();
                    $Email->viewVars(array('user' => $this->request->data));                
                    $Email->template('user_added', 'default')
                        ->emailFormat('both')
                        ->to($this->request->data['User']['email'])
                        ->from('webmaster@digicel.gb-advisors.com')
                        ->subject('Your account has been created')
                        ->send();
                        
                    $this->Session->setFlash(__('The user has been saved. An email has been sent to the user with the account information.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));
                } else {
                    $this->Session->setFlash(__('The user has been saved but since the account is inactive no email was sent.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));                    
                }
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

    public function admin_edit($id) {
        $this->set('title_for_layout', 'Edit User');     
        if (!isset($id)) {
            $this->Session->setFlash(__('You must select an user account.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));            
            $this->redirect(array('action'=>'index'));            
        }
        $id = $this->request->params['pass'][0];                
        $this->User->id = $id;
        $user = $this->User->read();  
        $this->set('user', $user);
        $locked = $user['User']['locked'];  
                
        if( $this->User->exists() ){
            if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
                if (isset($locked) && ($locked == 1)) : 
                    $this->Session->setFlash(__('The account is locked and cannot be modified.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'
                    ));                    
                    $this->redirect(array('action'=>'view', $id));
                else :
                    if( $this->User->save( $this->request->data ) ){
                        $this->Session->setFlash(__('The changes where successfully saved.'), 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-success'
                        ));
                        $this->redirect(array('action'=>'view', $id));
                    }else {
                        $this->Session->setFlash(__('Unable to edit user. Please, try again.'), 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-danger'
                        ));
                    }
                endif;
                $this->set('action', "edit");
                $this->render('admin_form');         
           }else{
                $this->request->data = $this->User->read();
                $this->set('action', "edit");
                $this->render('admin_form');         
            }
        }
    }

    public function edit() {
        $this->set('title_for_layout', 'Edit My User');         
        $currentUser = $this->Session->read('Auth.User');  
        if (!isset($currentUser)) {
            $this->Session->setFlash(__('Invalid user account.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));            
            $this->redirect(array('action'=>'index'));            
        }
        $id = $currentUser['id'];
        $this->User->id = $id;
        $user = $this->User->read();   
        $locked = $user['User']['locked'];  
        $this->set('user', $user);
        
        if (!$id) :
            $this->Session->setFlash(__('You can only edit your account.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));            
            $this->redirect(array('action'=>'index'));                        
        endif;
        
        if( $this->User->exists() ){
            if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
                if( $this->User->save( $this->request->data ) ){
                    $this->Session->setFlash(__('The changes where successfully saved.'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-success'
                    ));
                    $this->redirect(array('action' => 'view', $user['User']['id']));
                }else {
                    $this->Session->setFlash(__('Unable to edit user. Please, try again..'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'
                    ));
                }
                $this->set('action', "edit");
                $this->render('edit');         
           }else{
                $this->request->data = $this->User->read();
                $this->set('action', "edit");
                $this->render('form');         
            }
        }
    }
    
    public function admin_delete($id) {
        $id = $this->request->params['pass'][0];

        if( !$id ) {
            $this->Session->setFlash(__('You must select a user.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));            
            $this->redirect(array('action'=>'index'));
        }else{
            if( $this->User->delete( $id ) ){
                $this->Session->setFlash(__('The user was deleted.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));                    
                $this->redirect(array('action'=>'index'));

            }else{  
                $this->Session->setFlash(__('Unable to delete the user.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));            
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /* Frontend functionality */
    public function register() {        
        if (isset($this->params['name'])) :
            $agency_slug = $this->params['name'];
            $this->loadModel('agency');
            $agency = $this->Agency->find('first', array('conditions'=>array('agency.slug' => $agency_slug)));
            $this->set('agency', $agency);            
        endif;
        $this->set('title_for_layout', 'Register!');           
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your account has been created.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                // Force login if registration is successfull
                $this->Auth->login();
                // Redirect to company home.                 
                $this->redirect('/c/' . $agency_slug);
            } else {
                $this->Session->setFlash(__('Your account could not be created. Please, try again'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }
            $this->set('action', "add");
            $this->render('form');         
        } else {
            $this->set('action', "add");
            $this->render('form');         
        }
    }    
    
    public function social_login($provider) {
        if( $this->Hybridauth->connect($provider) ){
            $this->_successfulHybridauth($provider,$this->Hybridauth->user_profile);
        }else{
            // error
            $this->Session->setFlash($this->Hybridauth->error);
            $this->redirect($this->Auth->loginAction);
        }
    }    

    public function social_endpoint($provider) {
        $this->Hybridauth->processEndpoint();
    }
    
    private function _doSocialLogin($user, $returning = false) {

        if ($this->Auth->login($user['User'])) {
            if($returning){
                $this->Session->setFlash(__('Welcome back, '. $this->Auth->user('username')));
            } else {
                $this->Session->setFlash(__('Welcome to our community, '. $this->Auth->user('username')));
            }
            $this->redirect($this->Auth->loginRedirect);

        } else {
            $this->Session->setFlash(__('Unknown Error could not verify the user: '. $this->Auth->user('username')));
        }
    }    
    
    public function createFromSocialProfile($incomingProfile){

        // check to ensure that we are not using an email that already exists
        $existingUser = $this->find('first', array(
            'conditions' => array('email' => $incomingProfile['SocialProfile']['email'])));

        if($existingUser){
            // this email address is already associated to a member
            return $existingUser;
        }

        // brand new user
        $socialUser['User']['email'] = $incomingProfile['SocialProfile']['email'];
        $socialUser['User']['username'] = str_replace(' ', '_',$incomingProfile['SocialProfile']['display_name']);
        $socialUser['User']['role'] = 'bishop'; // by default all social logins will have a role of bishop
        $socialUser['User']['password'] = date('Y-m-d h:i:s'); // although it technically means nothing, we still need a password for social. setting it to something random like the current time..
        $socialUser['User']['created'] = date('Y-m-d h:i:s');
        $socialUser['User']['modified'] = date('Y-m-d h:i:s');

        // save and store our ID
        $this->save($socialUser);
        $socialUser['User']['id'] = $this->id;

        return $socialUser;


    }

}


?>
