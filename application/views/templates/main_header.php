<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <title>Say It Right</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\css\sayitright.css">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script type="text/javascript">
	setTimeout(function() {
    $('#succ-msg').fadeOut('fast');}, 3000); 
</script>
<script>
	function myFunction() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
	    x.className += " responsive";
	  } else {
	    x.className = "topnav";
	  }
	}
</script>
</head>

<body>
	<div class="wrapper" style="background-image: url('<?php echo base_url(); ?>assets/images/home-banner.jpg');">
	 <div class="wrapper row navigation-bar">
	 	<div class="logo-container"><img class="logo" src="<?php echo base_url(); ?>assets/images\logo.png"></div>
	      <div id="myTopnav"  class="topnav">
	      	<nav>
	      	 <a class="<?php echo activate_menu('home'); ?>" href="<?php echo base_url(); ?>home/index">HOME</a>  
	         <a class="<?php echo activate_menu('about'); ?>" href="<?php echo base_url(); ?>about/index">ABOUT US</a>  
	         <a href="http://manoharrajaram.uta.cloud/sayitright_blog/">BLOG</a>
	         <a class="<?php echo activate_menu('bfu'); ?>" href="<?php echo base_url(); ?>bfu/index">BUY FROM US</a>  
	         <a class="<?php echo activate_menu('contact'); ?>" href="<?php echo base_url(); ?>contact/index">CONTACT</a>  
	         <a class="<?php echo activate_menu('signup'); ?>" href="<?php echo base_url(); ?>signup/index">SIGN UP</a>  
	         <a class="<?php echo activate_menu('login'); ?>" href="<?php echo base_url(); ?>login/index">LOGIN</a>
	     	 <a href="javascript:void(0);" style="font-size:30px;" class="icon" onclick="myFunction()">&#9776;</a>	         
	      	</nav>
	  </div>
	</div>