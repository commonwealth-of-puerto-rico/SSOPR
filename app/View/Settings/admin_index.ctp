
<div class="cl-mcont">
  <div class="row">
    <div class="col-md-12">
      <div class="block-flat">
        <div class="content">
          <div class="actions">
          <?php 
          echo $this->Html->link(ucfirst(__('new')) . ' ' . ucfirst(__('setting')), array('action' => 'add'), array('class' => 'btn btn-primary btn-sm')); 
          echo "&nbsp;";
          ?>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="datatable">
              <thead>
                <tr>
                  <th><?php echo $this->Paginator->sort('name', ucfirst(__('name'))); ?> <span class="fa fa-sort"></span></th>
                  <th><?php echo $this->Paginator->sort('name', ucfirst(__('value'))); ?> <span class="fa fa-sort"></span></th>
                  <th><?php echo $this->Paginator->sort('name', ucfirst(__('description'))); ?> <span class="fa fa-sort"></span></th>
                  <th class="actions"></th>      
                </tr>
              </thead>
              <tbody>
<?php
    foreach($settings as $setting) :

?>
    <tr>
      <td><?php echo $setting['Setting']['name']; ?>  </td>
      <td><?php echo $setting['Setting']['value']; ?>  </td>
      <td><?php echo $setting['Setting']['description']; ?>  </td>
    <td>
    <div class="btn-group">
      <button class="btn btn-default btn-sm" type="button">Actions</button>
      <button data-toggle="dropdown" class="btn btn-sm btn-primary dropdown-toggle" type="button">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul role="menu" class="dropdown-menu pull-right">
        <li><a href="/admin/settings/edit/<?php echo $setting['Setting']['id']; ?>">Edit</a></li>
        <li class="divider"></li>
        <li><a href="/admin/settings/delete/<?php echo $setting['Setting']['id']; ?>" onclick="return confirm('Are you sure you want to delete this setting?')">Remove</a></li>
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
