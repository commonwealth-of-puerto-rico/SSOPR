<div class="cl-mcont">
  <div class="row">
  <h1 class="hthin"><h1><?php echo $user['User']['full_name']; ?></h1>
<div class="col-md-12">
    <div class="block-flat">
        <div class="header">                          
            <h3>Information</h3>
        </div>
        <div class="content">
           <table class="table table-view table-hover">
              <thead>
                  <tr>
                      <th colspan="2"><strong><?php echo __('Account Information'); ?></strong></th>
                  </tr>
              </thead>
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
                      <td><strong>Created on</strong></td>
                      <td><?php echo date('l, F d Y', strtotime($user['User']['created'])); echo " at "; echo date('g:i A', strtotime($user['User']['created'])); ?></td>
                  </tr>
                  <tr>
                      <td><strong>Last successful log in</strong></td>
                      <td><?php if (isset($user['User']['last_login']) && ($user['User']['last_login'] != NULL)) : echo date('l, F d Y', strtotime($user['User']['last_login'])); echo " at "; echo date('g:i A', strtotime($user['User']['last_login'])); else : echo "Never"; endif; ?></td>
                  </tr>                  
                </tbody>
           </table>
    </fieldset>
<?php if (!empty($user['UserDetail']['id'])) : ?>
           <table class="table table-view">
              <thead>
                  <tr>
                      <th colspan="2"><strong><?php echo __('Profile Information'); ?></strong></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td><strong>Position</strong></td>
                      <td><?php echo $user['UserDetail']['title']; ?></td>
                  </tr>
                  <tr>
                      <td><strong>Address</strong></td>
                      <td><?php echo $user['UserDetail']['address']; ?></td>
                  </tr>
                  <tr>
                      <td><strong>City</strong></td>
                      <td><?php echo $user['UserDetail']['city']; ?></td>
                  </tr>
                  <tr>
                      <td><strong>State</strong></td>
                      <td><?php echo $user['UserDetail']['state']; ?></td>
                  </tr>                  
                  <tr>
                      <td><strong>Country</strong></td>
                      <td><?php echo $user['UserDetail']['country']; ?></td>
                  </tr>
<?php 
if (!isset($user['User']['phone_personal']) || ($user['User']['phone_personal'] == "")) : $user['User']['phone_personal'] = "Not provided"; else : $user['User']['phone_personal'] = "<a href=\"callto://+1" . str_replace('-', '', $user['User']['phone_personal']) . "\">" . $user['User']['phone_personal'] ."</a>"; endif;
if (!isset($user['User']['fax_number']) || ($user['User']['fax_number'] == "")) : $user['User']['fax_number'] = "Not provided"; else : $user['User']['fax_number'] = $user['User']['fax_number']; endif;
if (!isset($user['User']['phone_corporate']) || ($user['User']['phone_corporate'] == "")) : $user['User']['phone_corporate'] = "Not provided"; else : $user['User']['phone_corporate'] = "<a href=\"callto://+1" . str_replace('-', '', $user['User']['phone_corporate']) . "\">" . $user['User']['phone_corporate'] ."</a>"; endif;
if (isset($user['UserDetail']['skype_username']) && ($user['UserDetail']['skype_username'] != "")) : $user['UserDetail']['skype_username'] = "<a href=\"skype://" . $user['UserDetail']['skype_username'] . "?call\">" . $user['UserDetail']['skype_username'] . "</a>"; else : $user['UserDetail']['skype_username'] = "Not provided"; endif;
?>                  
                  <tr>
                      <td><strong>Personal Contact Number</strong></td>
                      <td><?php echo "<p>" . $user['User']['phone_personal']; ?></td>
                  </tr>
                  <tr>
                      <td><strong>Corporate Contact Number</strong></td>
                      <td><?php echo "<p>" . $user['User']['phone_corporate']; ?></td>
                  </tr>
                  <tr>
                      <td><strong>Fax Number</strong></td>
                      <td><?php echo "<p>" . $user['User']['fax_number']; ?></td>
                  </tr>                  
                  <tr>
                      <td><strong>Skype</strong></td>
                      <td><?php echo $user['UserDetail']['skype_username']; ?></td>
                  </tr>
                  <tr>
                      <td><strong>Created on</strong></td>
                      <td><?php echo date('l, F d Y', strtotime($user['UserDetail']['created'])); echo " at "; echo date('g:i A', strtotime($user['UserDetail']['created'])); ?></td>
                  </tr>
                  <tr>
                      <td><strong>Last modified on</strong></td>
                      <td><?php echo date('l, F d Y', strtotime($user['UserDetail']['modified'])); echo " at "; echo date('g:i A', strtotime($user['UserDetail']['modified'])); ?></td>
                  </tr>
                </tbody>
           </table>        
<?php endif; ?>   
    <div>
            <?php echo $this->Html->link(__('Manage your account'), array('admin' => true, 'controller' => 'users', 'action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary btn-large')); ?>          
            <?php echo $this->Html->link(__('Manage your profile'), array('admin' => true, 'controller' => 'profile', 'action' => 'index'), array('class' => 'btn btn-primary btn-large')); ?>                
            <?php echo $this->Html->link(__('Go Back'), array(''), array('class' => 'btn btn-primary btn-large')); ?> 
        </div>
</div>

    
<?php echo $this->Form->end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>