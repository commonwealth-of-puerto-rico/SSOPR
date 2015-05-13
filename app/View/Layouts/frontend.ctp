<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="/img/favicon.ico">  	
    <title><?php echo $title_for_layout; ?></title>


	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
<?php        
	echo $this->Html->css('../js/bootstrap/dist/css/bootstrap.css'); 
?>

	<link rel="stylesheet" href="/fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->
<?php        
    echo $this->Html->css('style.css');	
?>

<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->Html->script('behaviour/general.js'); ?>


<?php echo $this->Html->script('behaviour/voice-commands.js'); ?>
<?php echo $this->Html->script('bootstrap/dist/js/bootstrap.min.js'); ?>
<?php echo $this->Html->script('jquery.flot/jquery.flot.js'); ?>
<?php echo $this->Html->script('jquery.flot/jquery.flot.pie.js'); ?>
<?php echo $this->Html->script('jquery.flot/jquery.flot.resize.js'); ?>
<?php echo $this->Html->script('jquery.flot/jquery.flot.labels.js'); ?>

<?php echo $this->Html->script('jquery.datatables/jquery.datatables.min.js'); ?>
<?php echo $this->Html->script('jquery.datatables/bootstrap-adapter/js/datatables.js'); ?>

</head>


<body class="texture">

<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center"><img class="logo-img" src="/images/logo_prgov.png" alt="logo"/></h3>
			</div>
			<div>
					<div class="content">
                            <div class="social">
                                <?php
                                echo $this->Html->image("/images/login-facebook.jpg", array(
                                    "alt" => "Signin with Facebook",
                                    //'url' => array('controller' => 'users', 'action'=>'social_login', 'Facebook')
                                    'url' => array('action' => 'social_login', 'Facebook')                                    
                                ));

                                echo $this->Html->image("/images/login-google.jpg", array(
                                    "alt" => "Signin with Google",
                                    'url' => array('action'=>'social_login', 'Google')
                                ));

                                echo $this->Html->image("/images/login-twitter.jpg", array(
                                    "alt" => "Signin with Twitter",
                                    'url' => array('action'=>'social_login', 'Twitter')
                                ));
                            ?>
                            </div>
					        <section id="alerts">       
					            <?php echo $this->Session->flash(); ?> 
					            <?php 
					            $errors = $this->Session->read('errors');
					            if (isset($errors)) :
					                foreach ($errors as $k=>$v) :
					                    echo $this->Session->flash($k); 
					                endforeach;
					            endif;
					            ?>
						        <?php echo $this->Session->flash('auth', array(
						            'element' => 'alert',
						            'params' => array('plugin' => 'BoostCake'),
						        ));            
						        ?>                    
					         </section>         
					            <?php echo $this->fetch('content'); ?>  
					            <p></p>            
							
			</div>
		</div>
		<div class="text-center out-links"><a href="#">&copy; <?php echo date('Y'); ?> TECHSUMMIT Hackathon Puerto Rico 2015</a></div>
	</div> 
	
</div>

<script type="text/javascript">
	$(document).ready(function(){
	//initialize the javascript
	App.init();
	});
	
	$("tr").click(function(event) {
	  if(event.target.nodeName != "A"){
	      if ($(this).attr("etitle")) {
	         window.location.href = $(this).attr("etitle");
	      }
	  }
	}); 

	$(function() {
	    $('.demo-cancel-click').click(function(){return false;});
	});         

</script>

</body>
</html>
