<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $helpers = array(
        'Session',
        'Time',
        'Js',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );
   
    public $components = array(
        'Acl',
        'Session',
        'RequestHandler',
        'Cookie',
        'Auth' => array( 
            'flash' => array(
                    'element' => 'alert',
                    'key' => 'auth',
                    'params' => array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-error'
                    )
            ),            
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'User'
                )
            )            
        )
    );

    public function isAuthorized($user) {
        if (isset($user['group_id']) && $user['group_id'] == '11') {
            return true; //Admin can access every action
        } 
        $action = $this->action;
        return true;
    }
    
    public function beforeFilter() {
        /* Find all settings and write them into CakePHP configuration */        
        $this->loadModel('Setting');
        $settings = $this->Setting->find('all');
        foreach($settings as $k=>$v) {
            Configure::write($v['Setting']['name'], $v['Setting']['value']);            
        }
        
        /* Verify if user is logged in and if so write User information into the current session */
        if ($this->Auth->loggedIn()) :
            $user['User'] = $this->Session->read('Auth.User'); 
            $this->Session->write('myUser', $this->Session->read('Auth.User'));             
            $this->set('myUser', $user);            
        endif;
        
        //Configure AuthComponent
        $this->Auth->authorize = 'Controller';
        $this->Auth->autoRedirect = false;
        if (isset($this->params['admin']) && $this->params['admin'] == true) {            
            /* Actions for administrative things */            
            $this->layout = 'admin';
            $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
            $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
            $this->Auth->loginRedirect = array('controller' => 'search', 'action' => 'index');            
        } else {            
            $this->layout = 'frontend';                   
            $agency_slug = $this->params['name'];
            if (isset($agency_slug) && ($agency_slug != "")) {
                $this->loadModel('Agency');
                $agency = $this->Agency->find('first', array('conditions'=>array('Agency.slug' => $agency_slug)));    
                if (!empty($agency)) :
                    $this->set('agency', $agency);
                    /* Rewritting actions if company_slug is provided */    
                    $this->Auth->loginAction = array('name' => $agency_slug, 'controller' => 'pages', 'action' => 'index');
                    $this->Auth->logoutRedirect = array('name' => $agency_slug, 'controller' => 'pages', 'action' => 'index');
                    $this->Auth->loginRedirect = array('name' => $agency_slug, 'controller' => 'pages', 'action' => 'index');                            
                else :
                    $this->redirect("/");
                endif;
            } else {
                /* Rewritting actions for home */
                $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
                $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
                $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'home');                         
            }
        }
        
        $this->Auth->flash['params']['class'] = 'alert-warning';        
        $this->Auth->authError = __('You are not authorized to use that feature.');
                    
        $this->Auth->authenticate = array(
            'all' => array (
                'scope' => array('User.active' => 1)
            ),
            'Form'
        );        
         
    }
}

?>
