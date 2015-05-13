<?php

//App::uses('Company', 'AuthComponent', 'Controller/Component/Auth');

class SocialProfile extends AppModel {
    var $name = 'SocialProfile';

    
    public $belongsTo = array(        
        'User' => array(
            'className'    => 'User',
            'foreignKey'   => 'user_id'
        )
    ); 
    
}


?>
