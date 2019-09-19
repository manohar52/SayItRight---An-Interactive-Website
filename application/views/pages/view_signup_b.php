<div class="col-4 sign-welcome" >
	<p>Welcome to Business Records</p>
</div>	
<?php echo form_open('signup/bus_reg');	?>
	<div class="row radio-cont">
		<label class="radio-inline">Type of business</label>
	    <label class="radio-inline">
	      <input type="radio" name="optradio" value="U" checked>University</label>
	    <label class="radio-inline">
	      <input type="radio" name="optradio" value="C">Company</label>
	</div>	
		<div class="col-4 cont-div sign-width-ind">
			<input id="fname" name="fname" class="base-input cont-input required" placeholder="Enter name"/>	
			<span class="phperror"><?php echo form_error('fname'); ?></span>
			<input id="email" name="email" class="base-input cont-input required" placeholder="Enter Email"/>
			<span  class="phperror"><?php echo form_open('email'); ?></span>
			<input id="pass" name="password" type="password" class="base-input cont-input required" placeholder="Enter password"/>
			<span  class="phperror"><?php echo form_error('pass'); ?></span>
			<button class="cart-btn2 stack sign-ind-btn">SIGN UP</button>
		</div>	
	</form>		