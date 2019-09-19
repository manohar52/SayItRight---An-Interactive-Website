<div class="row dash-board-cont">
	<div class="wrapper ml-10 mb-5">
		<h2 class="evt-conf-head">List of Events</h2>
		<div style="overflow-x:auto;">
			 	<table class="conf-table">
				    <tr class="tr1">
				      <th>Events</th>
				      <th>Description</th>
				      <th>Date</th>
				      <th>State</th>
				      <th>Action</th>
				    </tr>
				    <?php foreach ($event_list as $row) {
				    	$reg = "Register";
				    	$reg_btn = "r";
				    	foreach ($user_events as $value) {
				    		if($row['event_id'] == $value['event_id']){
				    			$reg = "De-Register";
				    			$reg_btn = "d";
				    			break;
				    		}
				    	}
				   	?>
				    <tr>
				      <th><?php echo $row['type_desc']; ?></th>
				      <th><?php echo $row['description']; ?></th>
				      <th style="width:10%;"><?php echo $row['date']; ?></th>
				      <th><?php echo $row['name']; ?></th>
				      <th>
				      	<!-- <form method = "POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> -->
				      		<?php echo form_open('events/reg_dreg') ?>
				      		<input type="hidden" name="event_id"    value="<?php echo $row['event_id']; ?>" />
				      		<input type="hidden" name="button_type"    value="<?php echo $reg_btn; ?>" />
				      		<button class="cart-btn2" name="<?php echo $reg_btn; ?>" ><?php echo $reg; ?></button>
				      	</form>
				      </th>
				    </tr>
				    <?php } ?>
				</table>
		</div>
	</div>	
</div>
<div class="spacer"></div>