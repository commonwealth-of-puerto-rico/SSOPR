<?php
    if ($action == "add") :
        $actionTitle = "Register a new account";
        $actionSave = "Register";
    elseif ($action == "edit") :
        $actionTitle = "Edit account information";    
        $actionSave = "Save Changes";

    endif;
?>
<div class="users form">
<?php 
echo $this->Form->create('User', array('class' => 'form-horizontal well')); 

?>
<?php if ($action == "edit") : echo $this->Form->input('User.id'); endif; ?>
    <fieldset>
        <h1><?php echo __($actionTitle); ?></h1>

        <?php echo $this->Form->input('name', array(
            'label' => 'First name',
            'type' => 'text',
            'class' => 'input-large',
        )); 
        ?>


        <?php echo $this->Form->input('last_name', array(
            'label' => 'Last name',
            'type' => 'text',
            'class' => 'input-large',
        )); 
        ?>

        <?php echo $this->Form->input('maidens_name', array(
            'label' => 'Maiden name',
            'type' => 'text',
            'class' => 'input-large',
        )); 
        ?>
        
        <?php 
            echo $this->Form->input('email', array(
            'label' => 'Email address',
            'type' => 'text',
            'class' => 'input-large',              
        ));
        
        ?>

        <?php echo $this->Form->input('username', array(
            'label' => 'Username',
            'type' => 'text',
            'class' => 'input-large',
        )); ?>
        <?php echo $this->Form->input('password', array(
            'label' => 'Password',
            'type' => 'password',
            'class' => 'input-large',
            'value' => '',
        ));
        echo $this->Form->input('phone_personal', array(
            'label' => 'Residential Phone Number',
            'type' => 'text',
            'class' => 'input-large',
        )); 
        echo $this->Form->input('fax_number', array(
            'label' => 'Fax Number',
            'type' => 'text',
            'class' => 'input-large',
        ));
        echo $this->Form->input('phone_corporate', array(
            'label' => 'Corportate Phone Number',
            'type' => 'text',
            'class' => 'input-large',
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
            echo $this->Html->link(__('Cancel'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-warning btn-large')); 
        endif;
 ?> 
    </div>
<?php echo $this->Form->end(); ?>    
</div>

