<div class="row dash-board-cont">
	<div id="succ-msg"><?php if(isset($msg)){echo $msg;} ?></div>
	<div class="wrapper ml-10 mb-5">
		<h2 class="evt-conf-head">List of Events</h2>
		<div style="overflow-x:auto;">
			<?php echo form_open('event_admin/cre_edit_del_event'); ?>
				<button class="cart-btn2" name="action" value="create">CREATE EVENT</button>
			</form>
			 	<table class="conf-table">
			    <tr class="tr1">
			      <th>Events</th>
			      <th>Description</th>
			      <th>Date</th>
			      <th>State</th>
			      <th>Action</th>
			    </tr>
			    <?php foreach ($admin_events as $row){ ?>
			    <tr>
			      <th><?php echo $row['type_desc']; ?></th>
			      <th><?php echo $row['description']; ?></th>
			      <th style="width:10%;"><?php echo $row['date']; ?></th>
			      <th><?php echo $row['name']; ?></th>
			      <th>
			      	<?php echo form_open('event_admin/cre_edit_del_event'); ?>
			      		<input type="hidden" name="event_id"    value="<?php echo $row['event_id']; ?>" />
			      		<input type="hidden" name="event_type_id"    value="<?php echo $row['event_type']; ?>" />
			      		<input type="hidden" name="event_type"  value="<?php echo $row['type_desc']; ?>" />
			      		<input type="hidden" name="event_desc"  value="<?php echo $row['description']; ?>" />
			      		<input type="hidden" name="event_date"  value="<?php echo $row['date']; ?>" />
			      		<input type="hidden" name="event_state" value="<?php echo $row['name']; ?>" />
			      		<input type="hidden" name="event_state_code" value="<?php echo $row['state']; ?>" />

			      		<button class="cart-btn2" name="action" value="edit" style="width: 30%;" name="edit" type="submit">EDIT</button>
			      		<button class="cart-btn2" name="action" value="delete" style="width: 30%;" name="del" type="delete">DELETE</button>		
			      	</form>
			      </th>
			    </tr>
			    <?php } ?>
			</table>
		</div>
	</div>	
</div>

<div class="spacer"></div>