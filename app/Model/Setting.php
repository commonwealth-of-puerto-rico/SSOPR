<?php

//App::uses('Company', 'AuthComponent', 'Controller/Component/Auth');

class Setting extends AppModel {
    var $name = 'Setting';

        
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
