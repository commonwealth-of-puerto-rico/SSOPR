<?php

if (!isset($class)) : 
	$class = 'alert-danger';
endif;

switch($class) :
	case('alert-success') :
		$alert_icon = 'fa-check';
		$alert_title = 'Success!';
		break;			
	case('alert-info') :
		$alert_icon = 'fa-info-circle';
		$alert_title = 'Info!';
		break;			
	case('alert-warning') :
		$alert_icon = 'fa-warning';
		$alert_title = 'Alert!';
		break;			
	case('alert-danger') :
		$alert_icon = 'fa-times-circle';
		$alert_title = 'Error!';			
		break;
	default :
		$alert_icon = 'fa-times-circle';
		$alert_title = 'Error!';		
		break;						
endswitch;

if (!isset($close)) {
	$close = true;
}

?>

 <div class="alert alert<?php echo ($class) ? ' ' . $class : null; ?> alert-white rounded">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<div class="icon"><i class="fa <?php echo $alert_icon; ?>"></i></div>
	<strong><?php echo $alert_title; ?></strong> <?php echo $message; ?>
 </div>
							 
