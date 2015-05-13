<p>Hello <?php echo $user['User']['name']; ?> <?php echo $user['User']['last_name']; ?> <?php echo $user['User']['maidens_name']; ?>,</p>
<br />
<p>An account has been created for you in Digicel</p>
<p>This email contains all the necessary information for you to access and update your account. </p>
<br />
<p>Account information:</p>
<p> Name: <?php echo $user['User']['name']; ?> <?php echo $user['User']['last_name']; ?> <?php echo $user['User']['maidens_name']; ?></p>   
<p> Username: <?php echo $user['User']['username']; ?></p>
<p> Temporary password: <?php echo $user['User']['tmpPassword']; ?></p>
<br />


