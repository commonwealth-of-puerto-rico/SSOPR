<?php
if ($action == "add") :
    $actionTitle = "Add an Agency";
    $actionSave = "Add Agency";
elseif ($action == "edit") :
    $actionTitle = "Editing Agency " . $agency['Agency']['name'];    
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
        <div class="content">
<?php echo $this->Form->create('Agency', array('class' => 'form-horizontal well', 'novalidate' => true)); ?>
<?php if ($action == "edit") : echo $this->Form->input('Setting.id'); endif; ?>
    <fieldset>
        <?php echo $this->Form->input('name', array(
            'label' => 'Name',
            'type' => 'text',
            'class' => 'form-control',
        )); 
        echo $this->Form->input('description', array(
            'label' => 'Description',
            'type' => 'textarea',
            'class' => 'form-control',
        )); 

        echo $this->Form->input('icon_url', array(
            'label' => 'Icon URL',
            'type' => 'text',
            'class' => 'form-control',
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
            echo $this->Html->link(__('Go Back'), array('controller' => 'agencies', 'action' => 'index'), array('class' => 'btn btn-wdefault btn-large')); 
 ?> 
        </div>
<?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>