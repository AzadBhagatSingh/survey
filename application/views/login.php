
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Survey</title>
	<link type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/css/theme.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/images/icons/css/font-awesome.css'); ?>" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<style type="text/css">
	.register_form_error{
		color: red;
	}
</style>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html"> Survey </a>
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="POST" action="<?php echo base_url('user/login'); ?>">
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
						<?php if (isset($message)) { ?>
						<CENTER><h5><?php echo $message; ?></h5></CENTER><br>
						<?php } ?>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="UserName" name="UserName" placeholder="Username">
									<span class="register_form_error"><?php echo form_error('UserName'); ?></span>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" id="Password" name="Password" placeholder="Password">
									<span class="register_form_error"><?php echo form_error('Password'); ?></span>
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right">Login</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; <?php echo date('Y') ?> Survey</b> 
		</div>
	</div>
	<script src="<?php echo base_url('assets/scripts/jquery-1.9.1.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/scripts/jquery-ui-1.10.1.custom.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	
</body>