

<div class="cl-mcont">
  <div class="row">
  <h1 class="hthin"><?php echo $user['User']['full_name']; ?></h1>
    <div class="col-md-12">
      <div class="actions"> 
    <?php 
    if (isset($agency['Agency']['name'])) :
        echo $this->Html->link(__('Back To Agency'), array('controller' => 'agencies', 'action' => 'view', $agency['Agency']['id']), array('class' => 'btn btn-primary btn-sm')); 
        echo "&nbsp;";
    endif;

    echo $this->Html->link(__('Update Profile'), array('admin' => true, 'controller' => 'profile', 'action' => 'index', $user['User']['id']), array('class' => 'btn btn-primary btn-sm')); 
    echo "&nbsp;";
    echo $this->Html->link(__('Reset Account'), array('action' => 'admin_reset_account', 'user_id' => $user['User']['id']), array('class' => 'btn btn-danger btn-sm')); 
    echo "&nbsp;";

    ?>
      </div>      
      <div class="tab-container">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab">Information</a></li>
          <li><a href="#profile" data-toggle="tab">Profile</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active cont" id="home">
            <h3 class="hthin">User information</h3>
              <table class="table table-view table-hover">
                 <tbody>
                     <tr>
                         <td><strong>First name</strong></td>
                         <td><?php echo $user['User']['name']; ?></td>
                     </tr>
                     <tr>
                         <td><strong>Last name</strong></td>
                         <td><?php echo $user['User']['last_name']; ?></td>
                     </tr>
                     <tr>
                         <td><strong>Maiden name</strong></td>
                         <td><?php echo $user['User']['maidens_name']; ?></td>
                     </tr>                  
                     <tr>
                         <td><strong>User name</strong></td>
                         <td><?php echo $user['User']['username']; ?></td>
                     </tr>
                     <tr>
                         <td><strong>Email address</strong></td>
                         <td><a href="mailto:<?php echo $user['User']['email']; ?>"><?php echo $user['User']['email']; ?></a></td>
                     </tr>
                     <tr>
                         <td><strong>Active</strong></td>
                         <td><?php if (!isset($user['User']['active']) || ($user['User']['active'] == 0)) : echo "No"; else : echo "Yes"; endif; ?></td>
                     </tr>
                     <tr>
                         <td><strong>Created on</strong></td>
                         <td><?php echo date('l, F d Y', strtotime($user['User']['created'])); echo " at "; echo date('g:i A', strtotime($user['User']['created'])); ?></td>
                     </tr>
                     <tr>
                         <td><strong>Last modified on</strong></td>
                         <td><?php echo date('l, F d Y', strtotime($user['User']['modified'])); echo " at "; echo date('g:i A', strtotime($user['User']['modified'])); ?></td>
                     </tr>
                     <tr>
                         <td><strong>Last successful log in</strong></td>
                         <td><?php if (isset($user['User']['last_login']) && ($user['User']['last_login'] != NULL)) : echo date('l, F d Y', strtotime($user['User']['last_login'])); echo " at "; echo date('g:i A', strtotime($user['User']['last_login'])); else : echo "Never"; endif; ?></td>
                     </tr>                  
                   </tbody>
              </table>


          </div>
          <div class="tab-pane cont" id="profile">
            <h3 class="hthin">Profile</h3>
  <?php if (empty($user['Profile']['id'])) : 
    echo 'This user has not created a profile.';
  else : ?>
      <table class="table table-view table-hover">
         <tbody>
             <tr>
                 <td><strong>Position</strong></td>
                 <td><?php echo $user['Profile']['title']; ?></td>
             </tr>
             <tr>
                 <td><strong>Address</strong></td>
                 <td><?php echo $user['Profile']['address']; ?></td>
             </tr>
             <tr>
                 <td><strong>City</strong></td>
                 <td><?php echo $user['Profile']['city']; ?></td>
             </tr>
             <tr>
                 <td><strong>State</strong></td>
                 <td><?php echo $user['Profile']['state']; ?></td>
             </tr>                  
             <tr>
                 <td><strong>Country</strong></td>
                 <td><?php echo $user['Profile']['country']; ?></td>
             </tr>
              <tr>
                  <td><strong>Personal Contact Number</strong></td>
                  <td><?php echo $user['User']['phone_personal']; ?></td>
              </tr>
              <tr>
                  <td><strong>Corporate Contact Number</strong></td>
                  <td><?php echo $user['User']['phone_corporate']; ?></td>
              </tr>
              <tr>
                  <td><strong>Fax Number</strong></td>
                  <td><?php echo $user['User']['fax_number']; ?></td>
              </tr>   
              <tr>
                  <td><strong>Skype</strong></td>
                  <td><?php echo $user['Profile']['skype_username']; ?></td>
              </tr>
              <tr>
                  <td><strong>Created on</strong></td>
                  <td><?php echo date('l, F d Y', strtotime($user['Profile']['created'])); echo " at "; echo date('g:i A', strtotime($user['Profile']['created'])); ?></td>
              </tr>
              <tr>
                  <td><strong>Last modified on</strong></td>
                  <td><?php echo date('l, F d Y', strtotime($user['Profile']['modified'])); echo " at "; echo date('g:i A', strtotime($user['Profile']['modified'])); ?></td>
              </tr>
            </tbody>
          </table>        
  <?php endif; ?>    

              </div>
            </div>
          <div>
              <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary btn-large')); ?>         
              <?php echo $this->Html->link(__('Go Back'), array('action' => 'index'), array('class' => 'btn btn-default btn-large')); ?> 
          </div>
      </div>
    </div>
  </div>
</div>  
<?php echo $this->Form->end(); ?>
