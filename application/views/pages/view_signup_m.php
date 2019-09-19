	<div class="row path">
		<div class="col-12 wrapper">
			<p>Home &rarr; Sign Up</p>
			<h2>SIGN UP</h2>
		</div>
	</div>


	<div class="row cont-main wrapper">
		<div id="signup" class="flex-container-cont shadow div-center sign-width wrapper">
			<h1 id="usr-typ" class="wrapper">Select type of user</h1>
			<div class="holder wrapper">
				<?php echo form_open('signup/ind'); ?>
					<button name="ind" class="cart-btn2 sign-btn">INDIVIDUAL</button>
				</form>
				<?php echo form_open('signup/evt'); ?>
					<button name="evt" class="cart-btn2 sign-btn">EVENT</button>
				</form>
				<?php echo form_open('signup/bus'); ?>
					<button name="bus" class="cart-btn2 sign-btn">BUSINESS</button>
				</form>
			</div>
