
	<div class="row home_cont wrapper no-flex">
		<div id="succ-msg">
			<?php if (isset($msg)) {
				echo $msg; } ?>
				</div>
		<div class="col-6 mg-5">
				<div id='PopUp' style='display:none;'>
        			<iframe width="60%" height="300" style="margin-left: 20%;" src="https://www.youtube.com/embed/Bey4XXJAqS8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    			</div>		
		</div>
		<div class=" wrapper col-6 mg-5 tc-white">
			<h1 id="main-cont">For good communication <span style="color:red">Say It Right</span> is a tool that you should use</h1>
			<p>You can play this video tutorial on its usage by just pressing this button</p>
			<div class="spacer">
				<a href="#" class="round-button" onclick="showPopUp()"><img src="<?php echo base_url(); ?>assets\images\play.png"></a>	
				<script>
            		function showPopUp()
            		{
                		document.getElementById('PopUp').style.display = 'block';
            		}
        		</script>
			</div>
	
		</div>
	</div>

	<div class="row base wrapper">
		<div class="col-6 base-txt">
			<h2 id="subscribe">Subscribe to our newlsetter</h2>
			<p>We dont send any kind of spam</p>			
		</div>
		<!-- <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >			  -->
			<span class="phperror"><?php echo validation_errors(); ?></span>
			<?php echo form_open('home/subscribe'); ?>
		<div class="col-6">
			<input pattern="^.+@([^\.].*)\.([a-z]{2,})$" name="sub" class="base-input" placeholder="Enter Email ID"/>
			<button class="base-btn base-btn-pos">Subscribe</button>
			<!-- <br><span class="phperror"><?php echo $emailErr; ?></span> -->
		</div>
	</form>
	</div>