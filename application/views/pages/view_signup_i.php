<div class="col-4 sign-welcome" >
	<p>Welcome to individual registration</p>
</div>	
<!-- <form id="mainForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> -->
	<?php echo form_open('signup/ind_reg'); ?>
	<div class="col-4 cont-div sign-width-ind">
		<input id="fname" name="fname" class="base-input cont-input required" placeholder="Enter First name"/>
		<span class="phperror"><?php echo form_error('fname'); ?></span>

		<input id="lname" name="lname" class="base-input cont-input required" placeholder="Enter Last name"/>
		<span class="phperror"><?php echo form_error('lname'); ?></span>	

		<input id="work" name="work" class="base-input cont-input required" placeholder="Enter place of work"/>
		<span class="phperror"><?php echo form_error('work'); ?></span>		

		<input id="school" name="school" class="base-input cont-input required" placeholder="Enter School"/>
		<span class="phperror"><?php echo form_error('school'); ?></span>

		<input id="email" name="email" class="base-input cont-input required" placeholder="Enter Email"/>
		<span class="phperror"><?php echo form_error('email'); ?></span>

		<input id="pass" name="pass" type="password" class="base-input cont-input required" placeholder="Enter password"/>
		<span class="phperror"><?php echo form_error('pass'); ?></span>

		<button class="cart-btn2 stack sign-ind-btn">SIGN UP</button>
	</div>			
</form>