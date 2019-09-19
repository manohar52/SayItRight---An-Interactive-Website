	<div class="row path wrapper">
		<div class="col-12">
			<p>Home &rarr; Buy from us</p>
			<h2>BUY FROM US</h2>
		</div>
	</div>
	<div class="row buy-main">
		<?php if (isset($msg)) { ?>
			<div id="succ-msg"><?php echo $msg; ?></div>
		<?php }?>
	<span class="phperror"><?php echo validation_errors(); ?></span>
	<div class="flex-container wrapper">
		<h2 class="wrapper mb-5 text-align-c" >Buy from US</h2>

	<?php 
	$cont = 0;
	foreach ($products->result() as $item)
			{
				$cont = $cont + 1; 
				$img = base_url()."assets/".$item->image_url;
				$cost = htmlspecialchars($item->cost);
				$desc = htmlspecialchars($item->description)
				?>
		<div class="col-3 prod">
			<img class="fit-div" src="<?php echo $img ?>"/>
			<div class="desc-wrap">
				<p class="stack fit-div fit-desc-mob"><?php echo $cost ?></p>
				<p style="margin-top:-5%" class="stack fit-div fit-desc-mob"><?php echo $desc ?></p>
				<?php $popupid = $item->prod_id; 
				 ?>
				<button class="wrapper cart-btn2 stack fit-div fit-desc-mob" onclick="window.location.href = '<?php echo "#p".$popupid; ?>'">ADD TO CART</button>
			</div>
		</div>
		<?php if($cont == 3){
		$cont = 0;
		?>
			</div>
			<div class="flex-container wrapper">
		<?php }
	 } ?>


	</div>
	<div style="margin-bottom: 7%"></div>
	</div>


<?php 
	foreach ($products->result() as $row){
	$popupid = $row->prod_id; 
	$img = base_url()."assets/".$row->image_url;
	?>
		<div id="<?php echo "p".$popupid; ?>" class="overlay">
			<div class="popup">
				<p>ADD TO CART</p>
				<a class="close" href="#">&times;</a>
				<div class="content">
					<div class="col-6 cart-img">
						<img class="fit-div" src="<?php echo $img; ?>"/>
					</div>
					<!-- <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
						<?php echo form_open('bfu/addtocart'); ?>
						<div class="clo-6 cart-align">
							<input type="hidden" name="pid" value="<?php echo $popupid ?>">
							<input type="hidden" name="img" value="<?php echo $img; ?>">
							<p>Product Quantity</p>
							<!-- <input name="qty" class="base-input cont-input" required pattern="^[0-9]+$" /> -->
							<input name="qty" class="base-input cont-input"/>
							<p>Note: Enter a number in the quantity field</p>
							<div class="qty-btn-flex">
								<button class="qty-cart-btn close-btn" onclick="window.location.href = '#';">Close</button>
								<button name="add_cart" class="qty-cart-btn a2c-btn">Add to Cart</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php  } ?>

	<div class="row base">
		<div class="col-6 base-txt wrapper">
			<h2>View Shopping cart</h2>
			<p>You can see the products that you added to your cart</p>			
		</div>
		<div class="col-6 wrapper">
			<!-- <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
				<?php echo form_open('bfu/viewcart'); ?>
				<button name="view_cart" class="base-btn cart-btn">View Cart</button>
				<!-- <span class="phperror"><?php echo $cartErr; ?></span> -->
			</form>
		</div>
	</div>