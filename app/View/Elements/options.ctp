<?php
if(!empty($myUser))
?>

  <li class="dropdown profile_menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucfirst(__('greetings')) . ' ', $myUser['User']['full_name']; ?> <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="/admin/users/myaccount">My Account</a></li>
      <li><a href="/admin/profile">Profile</a></li>
      <li class="divider"></li>
      <li><a href="/users/logout">Sign Out</a></li>
    </ul>
  </li>
