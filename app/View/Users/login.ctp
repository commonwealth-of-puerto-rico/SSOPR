<?php 
    echo $this->Form->create('User', array('style' => 'margin-bottom: 0px !important;', 'class' => 'form-horizontal well')); 
?>
<h4 class="title">Login Access</h4>
    <div class="form-group">
        <div class="col-sm-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
<?php
                echo $this->Form->input('username', array(
                    'label' => false,
                    'type' => 'text',
                    'class' => 'form-control',
                    'placeholder' => 'Username'
                )); 
?>                
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
<?php
                echo $this->Form->input('password', array(
                    'label' => false,
                    'type' => 'password',
                    'class' => 'form-control',
                    'id' => 'password',
                    'placeholder' => 'Password'
                ));
?>                
            </div>
        </div>
    </div>
<?php
        echo $this->Form->input('remember', array(
            'label' => ucfirst(__('remember me')),
            'type' => 'checkbox',
        ));        
?>
    </fieldset>

    <div class="foot">
            <?php echo $this->Form->submit(ucfirst(__('Log me in')), array(
                'div' => false,        
                'class' => 'btn btn-primary',
                'data-dismiss' => 'modal',
                'type' => 'submit'
            )); ?>             
    </div>
</form>

<?php echo $this->Form->end(); ?>

