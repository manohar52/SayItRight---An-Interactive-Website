<div class="row cont-main">		
		<h2 style="text-align: center;">Buy From Us</h2>
		<div class="flex-container-cont shadow div-center check-marg wrapper" >
				<div class="col-6">
					<?php echo form_open('bfu/checkout'); ?>
					<div class="contact-info">
						<h3 class="tc-grey">Contact information</h3>
						<input id="email" name="email" class="base-input chk-inp" placeholder="Enter Email"/>	
						<span class="phperror"><?php echo form_error('email'); ?></span>
					</div>
					<div class="ship-info">
						<h3 class="tc-grey">Shipping address</h3>
						<input id="fname" name="fname" class="base-input chk-inp-ship" placeholder="Enter First Name"/>
						<span class="phperror"><?php echo form_error('fname'); ?></span>
						<input id="lname" name="lname" class="base-input chk-inp-ship" placeholder="Enter Last Name"/>	
						<span class="phperror"><?php echo form_error('lname'); ?></span>
						<input id="addr" name="addr" class="base-input chk-inp-ship" placeholder="Enter Address"/>	
						<span class="phperror"><?php echo form_error('addr'); ?></span>
						<input id="apt" name="apt" class="base-input chk-inp-ship" placeholder="Enter Apartment, Suit etc;"/>	
						<span class="phperror"><?php echo form_error('apt'); ?></span>
						<input id="city" name="city" class="base-input chk-inp-ship" placeholder="Enter City"/>	
						<span class="phperror"><?php echo form_error('city'); ?></span>
						<div class="flex-name">
							<select name="lang" class="base-input listbox" name="cars">
							  <option value="EN">English</option>
							  <option value="SP">Spanish</option>
							</select>
							<input id="postal" name="postal" class="base-input chk-inp-ship" placeholder="Enter Postal Code"/>	
							<span class="phperror"><?php echo form_error('postal'); ?></span>
						</div>
					</div>
					<div class="row check-btn" style="margin-top: 5%;">
						<button name="check" class="cart-btn2 check-btn">CHECKOUT</button>
					</div>
				</form>
				</div>

			<div class="col-6">
				<!-- <form id="mainForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">				 -->
			<?php echo form_open('bfu/clear'); ?>
				<div style="overflow-x:auto;">
	 			 	<table class="conf-table">
					    <tr class="tr1">
					      <th>Item</th>
					      <th>Units</th>
					      <th>Name</th>
					      <th>Price</th>
					    </tr>
						<?php  
							$total = 0;
							foreach ($kart as $item) {
								$total = $total + $item['subtotal'];
							 ?>
					    <tr> 
					      <th><img class="chk-img" src="<?php echo $item['options']['img']; ?>"></th>
					      <th><?php echo $item['qty']; ?></th>					      
					      <th><?php echo $item['name']; ?></th>
					      <th><?php echo "$".$item['price']; ?></th>
					    </tr>
					
						<?php } ?>
					    <tr> 
					      <th style="text-align:center;">Total</th>
					      <th></th>					      
					      <th>USD</th>
					      <th><?php echo "$".$total; ?></th>
					    </tr>						
					</table>
				</div>
					<button name="clear" class="cart-btn2 check-btn">CLEAR CART</button>
			</form>
			</div>

		</div>	
	</form>
</div>