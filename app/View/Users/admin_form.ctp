<?php
if ($action == "add") :
    $actionTitle = "Create a New User";
    $actionSave = "Create User";
elseif ($action == "edit") :
    $actionTitle = "Editing User " . $user['User']['full_name'];    
    $actionSave = "Save Changes";
endif;
echo $this->Html->css('../js/jquery.icheck/skins/square/blue.css'); 
echo $this->Html->script('jquery.icheck/icheck.min.js'); 

?>
<div class="cl-mcont">
  <div class="row">
  <h1 class="hthin"><?php echo $actionTitle; ?></h1>
<div class="col-md-12">
    <div class="block-flat">
        <div class="header">                          
            <h3>Information</h3>
        </div>
        <div class="content">
<?php echo $this->Form->create('User', array('class' => 'form-horizontal well', 'novalidate' => true)); ?>
<?php if ($action == "edit") : echo $this->Form->input('User.id'); endif; ?>
    <fieldset>
        <?php echo $this->Form->input('name', array(
            'label' => 'First name',
            'type' => 'text',
            'class' => 'form-control',
        )); 

        echo $this->Form->input('last_name', array(
            'label' => 'Last name',
            'type' => 'text',
            'class' => 'form-control',
        )); 

        echo $this->Form->input('maidens_name', array(
            'label' => 'Maiden name',
            'type' => 'text',
            'class' => 'form-control',
        )); 
        
        echo $this->Form->input('email', array(
            'label' => 'Email address',
            'type' => 'email',
            'class' => 'form-control',
            'prepend' => '@',
            'helpBlock' => 'Required for password recovery',                
        ));
           
        if ($action == "edit") :            
            echo $this->Form->input('username', array(
                'label' => 'Username',
                'type' => 'text',
                'class' => 'form-control',
            ));

            endif;
        ?>
        <?php 
        echo $this->Form->input('active', array(
            'label' => 'Active?',
            'type' => 'checkbox',
            'class' => 'icheck',
            'multiple' => false,
        ));        
        echo $this->Form->input('locked', array(
            'label' => 'Account is locked ?',
            'type' => 'checkbox',
            'class' => 'icheck',
            'multiple' => false,
        ));  
        ?>
    </fieldset>
    <br />
        <div>
            <?php 
            echo $this->Form->submit($actionSave, array(
                'div' => false,        
                'class' => 'btn btn-primary btn-large',
            )); 
            echo "&nbsp;";
            echo $this->Html->link(__('Go Back'), array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-wdefault btn-large')); 
 ?> 
        </div>
<?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>