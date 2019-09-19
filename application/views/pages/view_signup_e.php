<div class="col-4 sign-welcome" >
	<p>Welcome to event user registration</p>
</div>	
	<?php echo form_open('signup/evt_reg'); ?>
	<div class="col-4 cont-div sign-width-ind">
		<input id="fname" name="fname" class="base-input cont-input required" placeholder="Enter First name"/>
		<span  class="phperror"><?php echo form_error('fname'); ?></span>
		<input id="lname" name="lname" class="base-input cont-input required" placeholder="Enter Last name"/>
		<span id="error-lname" class="phperror"><?php echo form_error('lname'); ?></span>	
		<input id="email" name="email" class="base-input cont-input required" placeholder="Enter Email"/>
		<span id="error-email" class="phperror"><?php echo form_error('email'); ?></span>
		<input id="pass" name="pass" type="password" class="base-input cont-input required" placeholder="Enter password"/>
		<span id="error-pass" class="phperror"><?php echo form_error('pass'); ?></span>	
		<button class="cart-btn2 stack sign-ind-btn">SIGN UP</button>
	</div>			
</form>
