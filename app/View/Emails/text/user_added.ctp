Hello <?php echo $user['User']['name']; ?> <?php echo $user['User']['last_name']; ?> <?php echo $user['User']['maidens_name']; ?>,


An account has been created for you in Digicel. This email contains all the necessary information for you to access and update your account.


Account information:

    Name: <?php echo $user['User']['name']; ?> <?php echo $user['User']['last_name']; ?> <?php echo $user['User']['maidens_name']; ?>
    
    Username: <?php echo $user['User']['username']; ?>
    
    Temporary password: <?php echo $user['User']['tmpPassword']; ?>
    
    