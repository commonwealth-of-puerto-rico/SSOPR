<?php
if ($action == "add") :
    $actionTitle = "Create a Validation Rule";
    $actionSave = "Add Field";
elseif ($action == "edit") :
    $actionTitle = "Editing Field " . $field['Field']['name'];    
    $actionSave = "Save Changes";
endif;
echo $this->Html->css('../js/jquery.icheck/skins/square/blue.css'); 
echo $this->Html->script('jquery.icheck/icheck.min.js'); 

?>
<div class="cl-mcont">
  <div class="row">
<div class="col-sm-6 col-md-6">
    <div class="block-flat">
        <div class="content">
            <div class="header"><h1 class="hthin"><?php echo $actionTitle; ?></h1></div>
            <p></p>
            <?php echo $this->Form->create('Field', array('class' => 'form-horizontal well', 'novalidate' => true)); ?>
<?php if ($action == "edit") : echo $this->Form->input('Field.id'); endif; ?>
    <fieldset>
        <?php 

        echo $this->Form->input('name', array(
            'label' => 'Name',
            'type' => 'select',
            'options' => $customFields,
            'empty' => true,
            'class' => 'form-control',
        )); 

        echo $this->Form->input('rule', array(
            'label' => 'Rule',
            'type' => 'text',
            'class' => 'form-control',
        )); 
        echo $this->Form->input('message', array(
            'label' => 'Message',
            'type' => 'text',
            'class' => 'form-control',
        )); 

        echo $this->Form->input('required', array(
            'label' => 'Field is required',
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
            echo $this->Html->link(__('Go Back'), array('controller' => 'fields', 'action' => 'index'), array('class' => 'btn btn-default btn-large')); 
 ?> 
        </div>
<?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    <div class="col-sm-6 col-md-6">
        <div class="block-flat">
          <h1 class="hthin">Commonly used regular expressions</h1>            
            <div class="content">
                <table class="table table-hover">
                    <tr>
                        <th>Pattern</th>
                        <th>Matches a(n)</th>                    
                    </tr>
                    <tr>
                        <td>/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/</td>
                        <td>Email address</td>                    
                    </tr>
                    <tr>
                        <td>/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/</td>
                        <td>URL</td>                    
                    </tr>
                    <tr>
                        <td>/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/</td>
                        <td>IP address</td>
                    </tr>
                    <tr>
                        <td>\b(19|20)?[0-9]{2}[- /.](0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01])\b</td>
                        <td>Date in yyyy-mm-dd format. Matches invalid dates such as Feb 31.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>