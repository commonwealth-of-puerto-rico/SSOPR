<?php
    if ($action == "add") :
        $actionTitle = "Create A New Profile";
        $actionSave = "Save Changes";
    elseif ($action == "edit") :
        $actionTitle = "Edit Profile";  
        $actionSave = "Save Changes";

    endif;
    echo $this->Html->script('bootstrap-formhelpers/js/bootstrap-formhelpers-countries.en_US.js');
    echo $this->Html->script('bootstrap-formhelpers/js/bootstrap-formhelpers-countries.js');
    echo $this->Html->script('bootstrap-formhelpers/js/bootstrap-formhelpers-states.en_US.js');
    echo $this->Html->script('bootstrap-formhelpers/js/bootstrap-formhelpers-states.js');    
    echo $this->Html->css('../js/jquery.icheck/skins/square/blue.css'); 
    echo $this->Html->script('jquery.icheck/icheck.min.js'); 

?>
<div class="cl-mcont">
  <div class="row">
<div class="col-md-12">
    <div class="block-flat">
        <div class="header">                          
            <h1><?php echo __($actionTitle); ?></h1>
        </div>
        <div class="content">
<?php 
echo $this->Form->create('Profile', array('class' => 'form-horizontal well')); 
if (isset($user)) :
    echo $this->Form->hidden('user_id', array('value' => $user['User']['id'])); 
endif;

?>
<?php if ($action == "edit") : echo $this->Form->input('Profile.id'); endif; ?>
    <fieldset>

        <?php echo $this->Form->input('title', array(
            'label' => 'Position',
            'type' => 'text',
            'class' => 'input-large',
        )); 
        echo $this->Form->hidden('action', array('value' => $action)); 
        echo $this->Form->input('address', array(
            'label' => 'Address',
            'type' => 'textarea',
            'class' => 'input-large',
        )); 
        echo $this->Form->input('city', array(
            'label' => 'City',
            'type' => 'text',
            'class' => 'input-large',
        )); 
        if ($action == "edit") :
            echo $this->Form->input('state', array(
                'label' => 'State',
                'type' => 'select',
                'class' => 'input-large states',
                'data-state' => $profile['Profile']['state'],
                )); 
            echo $this->Form->input('country', array(
                'label' => 'Country',
                'type' => 'select',
                'class' => 'input-large countries',
                'data-country' => $profile['Profile']['country'],
                )); 
        else :
            echo $this->Form->input('state', array(            
                'label' => 'State',
                'type' => 'select',
                'class' => 'input-large states',
                )); 
            echo $this->Form->input('country', array(
                'label' => 'Country',
                'type' => 'select',
                'class' => 'input-large countries',
                'data-country' => 'PR',                
                ));             
        endif;
        echo $this->Form->input('zip_code', array(
            'label' => 'Zipcode',
            'type' => 'text',
            'class' => 'input-large',
        )); 
        
        echo $this->Form->input('skype_username', array(
            'label' => 'Skype username',
            'type' => 'text',
            'class' => 'input-large',
            'helpBlock' => 'For Skype\'s Integrating Dialing'
        )); 
        
        ?>

    </fieldset>
    <br />
        <div>
            <?php echo $this->Form->submit($actionSave, array(
                'div' => false,        
                'class' => 'btn btn-primary btn-large',
            )); 
            echo "&nbsp;";
            if (isset($user['User']['id'])) :
                echo $this->Html->link(__('Go Back'), array('controller' => 'users', 'action' => 'view', $user['User']['id']), array('class' => 'btn btn-warning btn-large')); 
            endif;
 ?> 
        </div>
    </fieldset>
        </div>
<?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
