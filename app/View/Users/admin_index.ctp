
<div class="cl-mcont">
  <div class="row">
    <div class="col-md-12">
      <div class="block-flat">
        <div class="content">
          <div class="actions">
          <?php 
          echo $this->Html->link(ucfirst(__('new')) . ' ' . ucfirst(__('user')), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm')); 
          echo "&nbsp;";
          ?>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="datatable">
              <thead>
                <tr>
                  <th><?php echo $this->Paginator->sort('name', ucfirst(__('full name'))); ?> <span class="fa fa-sort"></span></th>
                  <th class="actions"></th>      
                </tr>
              </thead>
              <tbody>
<?php
    foreach($users as $user) :

?>
    <tr>
      <td  class='clickableRow' href='/admin/users/view/<?php echo $user['User']['id']; ?>'><a href="/admin/users/view/<?php echo $user['User']['id']; ?>" rel="tooltip" title="<?php echo ucfirst(__('view')); ?>"><?php echo $user['User']['name'] . " " . $user['User']['last_name'] . " " . $user['User']['maidens_name'];; ?></a>
    <p>
    <?php 
    if (!isset($user['User']['active']) || ($user['User']['active'] == 0)) : 
        echo '<span class="label label-important">';
        echo __('inactive'); 
        echo '</span>'; 
    else : 
        echo '<span class="label label-success">';
        echo __('active'); 
        echo '</span>'; 
    endif;  
    ?>                
    </p>          
  </td>
  <td>
    <div class="btn-group">
      <button class="btn btn-default btn-sm" type="button">Actions</button>
      <button data-toggle="dropdown" class="btn btn-sm btn-primary dropdown-toggle" type="button">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul role="menu" class="dropdown-menu pull-right">
        <li><a href="/admin/users/view/<?php echo $user['User']['id']; ?>">View</a></li>            
        <li><a href="/admin/users/edit/<?php echo $user['User']['id']; ?>">Edit</a></li>
        <li class="divider"></li>
        <li><a href="/admin/users/reset/<?php echo $user['User']['id']; ?>" onclick="return confirm('Are you sure you want to reset this user?')">Reset</a></li>  
        <li><a href="/admin/users/delete/<?php echo $user['User']['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Remove</a></li>
      </ul>
    </div>
  </td>      
</tr>
<?php endforeach; ?>
</table>

<?php 
  echo $this->Paginator->pagination(array('ul' => 'pagination pagination-large'
)); 
?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
      jQuery(document).ready(function($) {
            $(".clickableRow").click(function() {
                  window.document.location = $(this).attr("href");
            });
      }); 

      
      $(document).ready(function(){
        App.dataTables();        
      });
</script>
