<ul class="cl-vnavigation">
  <!-- <li><a href="/"><i class="fa fa-home"></i><span>Home</span></a></li> -->
    <li><a href="/admin/agencies"><i class="fa fa-list-alt"></i><span>Agencies</span></a>
    <li><a href="/admin/settings"><i class="fa fa-cogs"></i><span>Settings</span></a>
    <li><a href="/admin/users"><i class="fa fa-users"></i><span>Users</span></a>
<!--
    <ul class="sub-menu">
      <li><a href="/admin/search/basic">Basic</a></li>
      <li><a href="/admin/search/basic">Advanced</a></li>      
    </ul>
-->
  </li>
</ul>

<?php echo $this->Form->create('Search', array('class' => '', 'novalidate' => true)); ?>
<div class="text-right collapse-button" style="padding:7px 9px;">
  <input type="text" class="form-control search" name="key" placeholder="Search..." />
</div>
<?php echo $this->Form->end(); ?>
