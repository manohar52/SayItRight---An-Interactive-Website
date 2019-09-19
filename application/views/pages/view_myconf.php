<div class="row dash-board-cont">
	<div class="wrapper ml-10 mb-5">
		<h2 class="evt-conf-head">List of My Conferences</h2>
		<div style="overflow-x:auto;">
			 	<table class="conf-table">
				    <tr class="tr1">
				      <th>Conferences</th>
				      <th>Description</th>
				      <th>Date</th>
				      <th>State</th>
				    </tr>
				    <?php foreach ($user_conf as $row) { ?>
				    <tr>
				      <th><?php echo $row['type_desc']; ?></th>
				      <th><?php echo $row['description']; ?></th>
				      <th style="width:10%;"><?php echo $row['date']; ?></th>
				      <th><?php echo $row['name']; ?></th>
				    </tr>
				    <?php } ?>
				</table>
		</div>
	</div>	
</div>
<div class="spacer"></div>