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
	echo $this->Html->css('../js/jquery.gritter/css/jquery.gritter.css'); 
?>

	<link rel="stylesheet" href="/fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->
<?php        
	echo $this->Html->css('../js/jquery.nanoscroller/nanoscroller.css'); 
	echo $this->Html->css('../js/jquery.easypiechart/jquery.easy-pie-chart.css'); 
	echo $this->Html->css('../js/bootstrap.switch/bootstrap-switch.css'); 
	echo $this->Html->css('../js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css'); 
	echo $this->Html->css('../js/jquery.select2/select2.css'); 
	echo $this->Html->css('../js/bootstrap.slider/css/slider.css'); 
    echo $this->Html->css('style.css');	
?>

<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->Html->script('jquery.nanoscroller/jquery.nanoscroller.js'); ?>
<?php echo $this->Html->script('jquery.sparkline/jquery.sparkline.min.js'); ?>
<?php echo $this->Html->script('jquery.easypiechart/jquery.easy-pie-chart.js'); ?>
<?php echo $this->Html->script('jquery.ui/jquery-ui.js'); ?>
<?php echo $this->Html->script('jquery.nestable/jquery.nestable.js'); ?>
<?php echo $this->Html->script('bootstrap.switch/bootstrap-switch.min.js'); ?>
<?php echo $this->Html->script('bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>
<?php echo $this->Html->script('jquery.select2/select2.min.js'); ?>
<?php echo $this->Html->script('bootstrap.slider/js/bootstrap-slider.js'); ?>
<?php echo $this->Html->script('jquery.gritter/js/jquery.gritter.js'); ?>
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

<body>
  <!-- Fixed navbar -->
  <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-collapse">
      	<div class="navbar-header">
	    	<a class="navbar-brand" href="/"></a>
    	</div>
	    <ul class="nav navbar-nav navbar-right user-nav"><?= $this->element('options'); ?>
	    </ul>			
      </div><!--/.nav-collapse -->
    </div>
  </div>
	
   <div id="cl-wrapper">
		<div class="cl-sidebar">
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content"><?= $this->element('admin/sidebar'); ?>
          </div>
        </div>
	</div>
</div>

	<div class="container-fluid" id="pcont">
		<div class="page-head">
		  <h3 class="text-left"><?php echo ucfirst(__($this->params['controller'])); ?></h3>
		  <ol class="breadcrumb">
		    <li><a href="/">Home</a></li>
		    <li><a href="/admin/<?php echo $this->params['controller']; ?>"><?php echo ucfirst($this->params['controller']); ?></a></li>
		    <li class="active">
<?php 
if (stristr($this->params['action'], 'admin')) {
	$action = str_replace('admin_', '', $this->params['action']);
	echo ucfirst($action);
}
?>
			</li>
		  </ol>
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
            <?php // End of content ?>
		</div>
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
