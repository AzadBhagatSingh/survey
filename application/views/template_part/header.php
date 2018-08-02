<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Survey</title>
        <link type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/css/theme.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/images/icons/css/font-awesome.css'); ?>" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            <script src="<?php echo base_url('assets/scripts/jquery-1.9.1.min.js'); ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('assets/scripts/jquery.validate.min.js'); ?>" type="text/javascript"></script>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="<?php echo base_url('user'); ?>">Survey</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                       <!--  <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form> -->
                        <ul class="nav pull-right">
                            <li><a style="color:#248aaf;">User : <?php echo $this->session->userdata['UserName']; ?></a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url('assets/images/user.png'); ?>" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->