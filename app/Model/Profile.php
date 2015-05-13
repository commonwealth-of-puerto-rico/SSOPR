<?php

//App::uses('Company', 'AuthComponent', 'Controller/Component/Auth');

class Profile extends AppModel {
    var $name = 'Profile';

    
    public $belongsTo = array(        
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'user_id'
        )
    ); 
    
    public $validate = array(
        'user_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'The profile must belong to a user.'
            )
        )        
    );
}


?>
