<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <title>Say It Right</title>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\css\sayitright.css">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png">
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
	<div class="wrapper">
 	 <div class="wrapper row navigation-bar">
	 	<div class="logo-container"><img class="logo" src="<?php echo base_url(); ?>assets/images\logo.png"></div>
	      <div id="myTopnav"  class="topnav">
	      	<nav>
	      	 <a class="<?php echo activate_menu('dash'); ?>" href="<?php echo base_url(); ?>dash/index">HOME</a>  
	         <a class="<?php echo activate_menu('conf'); ?>" href="<?php echo base_url(); ?>conf/index">CONFERENCES</a>  
	         <a class="<?php echo activate_menu('conf'); ?>" href="<?php echo base_url(); ?>conf/myconf">MY CONFERENCES</a>  
	         <a class="<?php echo activate_menu('events'); ?>" href="<?php echo base_url(); ?>events/index">EVENTS</a>  
	         <a class="<?php echo activate_menu('events'); ?>" href="<?php echo base_url(); ?>events/myevents">MY EVENTS</a>  
	         <a class="<?php echo activate_menu('settings'); ?>" href="<?php echo base_url(); ?>settings/index">SETTINGS</a>  
	         <a href=<?php echo base_url()."logout/index" ?>>LOG OUT</a>  
	         <a href="javascript:void(0);" style="font-size:30px;" class="icon" onclick="myFunction()">&#9776;</a>	
	      	</nav>
	      </div>
	  </div>