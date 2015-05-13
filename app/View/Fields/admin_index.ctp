
<div class="cl-mcont">
  <div class="row">
    <div class="col-md-12">
      <div class="block-flat">
        <div class="content">
          <div class="actions">
          <?php 
          echo $this->Html->link(ucfirst(__('new')) . ' ' . ucfirst(__('field')), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm')); 
          echo "&nbsp;";
          ?>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="datatable">
              <thead>
                <tr>
                  <th class="col-md-2"><?php echo $this->Paginator->sort('name', ucfirst(__('name'))); ?> <span class="fa fa-sort"></span></th>
                  <th class="col-md-2"><?php echo $this->Paginator->sort('name', ucfirst(__('rule'))); ?> <span class="fa fa-sort"></span></th>
                  <th class="col-md-4"><?php echo $this->Paginator->sort('name', ucfirst(__('message'))); ?> <span class="fa fa-sort"></span></th>
                  <th class="col-md-2"><?php echo $this->Paginator->sort('name', ucfirst(__('required'))); ?> <span class="fa fa-sort"></span></th>
                <th class="col-md-2"></th>      
                </tr>
              </thead>
              <tbody>
<?php
    foreach($fields as $field) :

?>
    <tr>
      <td><?php echo $field['Field']['name']; ?>  </td>
      <td><?php echo $field['Field']['rule']; ?>  </td>
      <td><?php echo $field['Field']['message']; ?>  </td>
<td><?php 
    switch($field['Field']['required']) :
        case('0') :
            echo 'No';
            break;
        case('1') :
            echo 'Yes';
            break;
    endswitch;
?></td>
        <td>
    <div class="btn-group">
      <button class="btn btn-default btn-sm" type="button">Actions</button>
      <button data-toggle="dropdown" class="btn btn-sm btn-primary dropdown-toggle" type="button">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul role="menu" class="dropdown-menu pull-right">
        <li><a href="/admin/fields/edit/<?php echo $field['Field']['id']; ?>">Edit</a></li>
        <li class="divider"></li>
        <li><a href="/admin/fields/delete/<?php echo $field['Field']['id']; ?>" onclick="return confirm('Are you sure you want to delete this field?')">Remove</a></li>
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
