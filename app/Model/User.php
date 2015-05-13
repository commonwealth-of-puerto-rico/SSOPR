<?php

class User extends AppModel {
    var $name = 'User';    
    
    public $displayField = 'full_name';
    
    public $virtualFields = array(
        'full_name' => 'CONCAT(User.name, " ", User.last_name)',
    );   
    public $hasOne = array(
        'Profile' => array(
            'className' => 'Profile'
        )
    );
    
    public $hasMany = array(
        'SocialProfile' => array(
            'className' => 'SocialProfile'
        )
    );
    
    public $validate = array(
       'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please provide a valid email address.'
            ),
            'email' => array(
                'rule'    => 'email',
                'message' => 'Please provide a valid email address.'
            ),        
            'availability' => array(
                'rule' => 'isUnique',
                'message' => 'An account with this email address has already been registered.'                
            )           
        ),
       'username' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please provide the username.'
            ),
            'length' => array(
                'rule' => array('between', 4, 60),
                'message' => 'Your username must be between 6 and 60 characters long.'
            ),           
           /*
            'availability' => array(
                'on' => 'create',                                
                'rule' => 'isUnique',
                'message' => 'An account with this username already exists. Please select another.'                
            )
            * 
            */
         
        ),
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A first name is required.'
            )
        ),
        'last_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A last name is required.'
            )
        ),     
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required.'
            ),
            'length' => array(
                'rule' => array('minLength', '4'),
                'message' => 'The password lenght must be equal or greater than 4 characters.'
            )            
        )
    );

   public function parentNode() {
       if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }

        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
    
   function bindNode($user) {
        return array('Group' => array('id' => $user['User']['group_id']));
   }    
}

?>
