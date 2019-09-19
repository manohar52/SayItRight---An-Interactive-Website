<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <title>Say It Right</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css\sayitright.css">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png">
</head>

<body>
	 <div class="wrapper" style="background-image: url('<?php echo base_url(); ?>assets/images/home-banner.jpg');">
 	 <div class="wrapper row navigation-bar">
	 	<div class="logo-container"><img class="logo" src="<?php echo base_url();?>assets/images\logo.png"></div>
	  </div>
	<div class="row path">
		<div class="col-12">
			<h2>Create New Event</h2>
		</div>
	</div>

	<div class="row cont-main">
		<div id="signup" class="flex-container-cont shadow div-center sign-width wrapper">
				<?php echo form_open('event_admin/save_event'); ?>
				<?php if (isset($event_det['event_id'])){ ?>
				<input type="hidden" name="event_id" value="<?php echo $event_det['event_id']; ?>">
				<?php } ?>
					
					<div class="edit-flex">
						<label class="edit-label" for="event_type">Event Type</label>
						<select class="base-input listbox1" name="event_type">

						<?php 
							$sel = "";
							foreach ($event_types as $row) { 
								if(isset($event_det['event_type']))
								{
									if ($event_det['event_type'] == $row['type_desc'])
									{
										$sel = "selected=\"selected\"";
									}
									else{ $sel = "";}
								}
							?>
							<option <?php echo $sel;?> value="<?php echo $row['event_type']; ?>"><?php echo $row['event_type']." ".$row['type_desc'] ?></option>	
						<?php }	?>  
						</select>
						
					</div>
					<div class="edit-flex">
						<label style="padding-right: 7%;" class="edit-label" for="state">State</label>
						<select class="base-input listbox1" name="state">
							<?php 
								foreach ($states as $row) {
									if (isset($event_det['event_state'])) 
									{
										if ($event_det['event_state'] == $row['name']) {
											$sel = "selected=\"selected\"";
									}
									else{ $sel ="";}
								}
							?>
							<option <?php echo $sel; ?> value="<?php echo $row['state_code']; ?>"><?php echo $row['state_code']." ".$row['name'] ?></option>	
							<?php }	?>
						</select>
						
					</div>
					<div class="edit-flex">
						<label class="edit-label" for="event_date">Event Date</label>
						<input id="date1"  required style="height:50px;" class="base-input required" type="date" name="event_date" value="<?php if(isset($event_det['event_date'])){ echo $event_det['event_date']; } ?>" />
						<span id="error-date1" class="phperror"></span>
					</div>
					<div class="edit-flex">
						<label class="edit-label" for="event_desc">Description</label>
						<textarea id="desc" required name="event_desc" class="base-input evnt-desc required" placeholder="Event Description"/><?php if (isset($event_det['event_desc'])){echo $event_det['event_desc']; }?></textarea>
						<span id="error-desc" class="phperror"></span>
					</div>
					<div class="edit-flex">		
						<button name="upd_crt" value="<?php echo $upd_crt; ?>" class="cart-btn2 stack sign-ind-btn btn-evt"><?php echo $upd_crt; ?></button>
					</div>
			</form>	
			<div class="div-cancel">
				<?php echo form_open('event_admin/cancel_event'); ?>
					<button name="cancel" class="cart-btn2 btn-evt btn-evt-cancel">CANCEL</button>
			</form>
			</div>
		</div>
	</div>