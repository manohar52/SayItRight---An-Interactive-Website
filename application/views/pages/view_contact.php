	<div class="row path wrapper">
		<div class="col-12">
			<p>Home &rarr; Contact Us</p>
			<h2>CONTACT US</h2>
		</div>
	</div>

	<div class="row cont-main">
		<div class="flex-container-cont wrapper">
			<div id="succ-msg"><?php echo $msg; ?></div>
				<?php echo form_open('contact/send'); ?>
				<div class="col-4 cont-div">
					<input id="fname" name="fname" class="base-input cont-input required" placeholder="Enter First name"/>
					<span  class="phperror"><?php echo form_error('fname'); ?></span>
					<input id="lname" name="lname" class="base-input cont-input required" placeholder="Enter Last name"/>	
					<span  class="phperror"><?php echo form_error('lname'); ?></span>
					<input id="phone" name="phone" class="base-input cont-input required" placeholder="Telephone"/>
					<span  class="phperror"><?php echo form_error('phone');; ?></span>
				</div>
				<div class="col-4 cont-div">
					<textarea id="msg" name="msg" class="base-input cont-input cont-input-msg required" placeholder="Message"></textarea>
					<span  class="phperror"><?php echo form_error('msg'); ?></span>
					<button id="sndmsg" class="cart-btn2 stack snd-msg">SEND MESSAGE</button>
				</div>
			</form>	
		</div>
	</div>	