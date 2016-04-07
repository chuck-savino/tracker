<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->config->item('site_title','ion_auth'); ?></title>
        <!-- Bootstrap -->
        <link rel="icon" href="<?php echo base_url(); ?>application/resources/bootstrap_auth/images/entire_network.ico">
        <link href="<?php echo base_url(); ?>application/third_party/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="<?php echo base_url(); ?>application/resources/bootstrap_auth/css/base.css" rel="stylesheet"> 
        <link href="<?php echo base_url(); ?>application/third_party/css/dropdown_menus_customize.css" rel="stylesheet">
 
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        -->
        <script src="<?php echo base_url(); ?>application/third_party/jquery/jquery-1.12.0.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url(); ?>application/third_party/bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	</style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $this->config->item('site_title','ion_auth'); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <?php if ($this->ion_auth->in_group('admin'))
              { ?>        
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>base_auth/create_user">Register New User</a></li>
                  <li><a href="<?php echo base_url(); ?>base_auth/create_group">Create New Group</a></li>
                  <li><a href="<?php echo base_url(); ?>base_auth">List Users</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link1</a></li>
                  <li><a href="#">Another separated link</a></li>
                </ul>
              </li>
              <?php } ?>
            </ul>
          <form action="<?php echo base_url(); ?>base_auth/base_auth_request" method="post" class="navbar-form navbar-right">
            <?php if (!$this->ion_auth->logged_in()) { ?> 
                <div class="form-group">
                <input type="text" name="identity" id="identity" placeholder="username" class="form-control">
                
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" name="remember" id="remember" value="1">
                </div>
              <button id="hdr_login" type="submit" name="auth_button" value="login" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Sign in</button>
              &nbsp;<a id="forgot_password" class='btn btn-primary 'href="<?php echo base_url(); ?>base_auth/forgot_password/"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;Forgot password</a>
            <?php } else {  ?>
                <button id="hdr_logout" type="submit" name="auth_button" value="logout" class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign out</button>
            &nbsp;<a id="change_password" class='btn btn-primary 'href="<?php echo base_url(); ?>base_auth/change_password/">Change password</a>
            <?php } ?>  
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value = "<?php echo $this->security->get_csrf_hash(); ?>" >
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

<br><br><br>
<script>
    //this turns the bootstrap dropdown menus into opening on hover vs requiring a click
    $(document).ready(function(){
        $('.dropdown').hover(
            function() {
                $(this).addClass('open');
            },
            function() {
                $(this).removeClass('open');
            });
    });
</script>    
