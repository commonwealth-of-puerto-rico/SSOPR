<?php

class Field extends AppModel {
    var $name = 'Field';    
    
    public $displayField = 'name';
    
    public $validate = array(
       'name' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select a custom field.'
            ),
            'availability' => array(
                'rule' => 'isUnique',
                'message' => 'The selected field has an existing validation rule, please update it instead.'                
            )           
        )
    );
}

?>
