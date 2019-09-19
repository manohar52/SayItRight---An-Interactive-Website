	<div class="row path">
		<div class="col-12">
			<p>Home &rarr; Log In</p>
			<h2>LOG IN</h2>
		</div>
	</div>
<div class="row cont-main">	
	<span class="phperror"><?php echo $msg; ?></span>	
	<?php echo form_open('login/signin'); ?>
		<div class="flex-container-cont shadow div-center log-width wrapper">
			<input id="email" name="email"  class="base-input log-input required" placeholder="Enter Email"/>
				<span class="phperror"><?php echo form_error('email'); ?></span>	
			<input id="pass" name="password" type="password" class="base-input log-input required" placeholder="Enter Password"/>
				<span class="phperror"><?php echo form_error('password'); ?></span>	
			<button class="cart-btn2 log-btn">LOG IN</button>
		</div>
	</form>
</div>