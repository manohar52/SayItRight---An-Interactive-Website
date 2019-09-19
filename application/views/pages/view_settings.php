<div class="row dash-board-cont">
	<div class="sett-marg">
		<h2 class="evt-conf-head">Welcome to your profile</h2>
		<?php 
		 if (isset($error)) { ?>
		<span class="phperror"><?php echo $error; ?></span>
		<?php }?>
		<div class="flex-container-cont shadow settings">
			<div class="col-3">
				<div class="prof-img">
					<img src="<?php echo base_url()."assets/images/".$user_info['image_url']; ?>"></img>
				</div>	
				<?php echo form_open_multipart('settings/do_upload');?>
				    <div class="cimg">
				    	<div class="choose">CHOOSE IMAGE<input type="file" name="fileToUpload" class="hide_file" id="fileToUpload"></div>
				    	<input type="hidden" name="prof_img" value="<?php echo $user_info['image_url']; ?>">
				    	<button type="submit" name="submit" class="cart-btn2">CHANGE IMAGE</button>
				    </div>
				</form>
			</div>

				<div class="col-9">
					<?php echo form_open('settings/update_user_data'); ?>
						<div>
							<?php if($role != 3){ ?>								
							<input name="fname" class="base-input sett-input" value="<?php echo $user_info['fname']; ?>" placeholder="Enter your name"/>	
							<span class="phperror"><?php echo form_error('fname'); ?></span>						
							<input name="lname"  class="base-input sett-input" value="<?php echo $user_info['lname']; ?>" placeholder="Enter last name"/>
							<span class="phperror"><?php echo form_error('lname'); ?></span>						
							<?php 
							}else{ ?>
							<input name="fname" class="base-input" style="margin-right: 40%" value="<?php echo $user_info['fname']; ?>" placeholder="Enter your name"/>
							<span class="phperror"><?php echo form_error('fname'); ?></span>											
							<?php }
							?>
						</div>

						<div class="set2">
						<?php if($role == 1){ ?>									
							<input name="work"  class="base-input sett-input" value="<?php echo $user_info['work_loc']; ?>" placeholder="Enter place of work"/>
							<span class="phperror"><?php echo form_error('work'); ?></span>						
							<input name="school"  class="base-input sett-input" value="<?php echo $user_info['school']; ?>" placeholder="Enter school"/>
							<span class="phperror"><?php echo form_error('school'); ?></span>						
						<?php } ?>
							<input name="email" readonly class="base-input sett-input" value="<?php echo $user_info['email_id']; ?>" placeholder="Enter email"/>
							<input name="password" type="password" value="<?php echo $user_info['password']; ?>" class="base-input sett-input" placeholder="Enter Password"/>
							<span class="phperror"><?php echo form_error('password'); ?></span>						
						</div>
						<button name="save" class="cart-btn2 sett-btn">SAVE CHANGES</button>
					</form>
				</div>
		</div>
	</div>
</div>