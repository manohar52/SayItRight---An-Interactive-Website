	<div class="row dash-board-cont">
		<div class="wrapper flex-dash">
		<div class="col-3 dash-stack">

			<div class="card" style="max-width: 25rem;">
				<div class="sqr1 bg-primary">
					<div class="cont-icon">
						<i class="fas fa-globe-americas fa-4x fa-color"></i>
					</div>
						<div class="cont-data-num">
							<p> <?php echo $act_past; ?> </p>
						</div>
						<div class="cont-data-text">
							<p class="card-font">activities performed</p>
						</div>
				</div>
				<div class="card-desc">
					Total Made
				</div>
			</div>			

			<div class="card text-white bg-primary" style="max-width: 25rem;">
			  <div class="card-header header-font">
			  	<?php  
			  		if (isset($event_title[1])) {
			  			echo $event_title[1];
			  		}
			  		else{ echo "No Event";}
			    ?>
			    </div>
			  <div class="card-body body-font">
			    <h5 class="card-title">
				<?php  
			  		if (isset($event_date[1])) {
			  			echo $event_date[1];
			  		}
			  		else{ echo "";}
			    ?>
			    </h5>
			    <p class="card-text">
			    	<?php  
			  		if (isset($event_desc[1])) {
			  			echo $event_desc[1];
			  		}
			  		else{ echo "";}
			    ?>
			    </p>
			  </div>
			</div>
			<div class="card text-white bg-warning" style="max-width: 25rem;">
			  <div class="card-header header-font">
			  	<?php  
			  		if (isset($conf_title[1])) {
			  			echo $conf_title[1];
			  		}
			  		else{ echo "No Conference";}
			    ?>
			  </div>
			  <div class="card-body body-font">
			    <h5 class="card-title">
				<?php  
			  		if (isset($conf_date[1])) {
			  			echo $conf_date[1];
			  		}
			  		else{ echo "";}
			    ?>			    	
			    </h5>
			    <p class="card-text">
			    	<?php  
			  		if (isset($conf_desc[1])) {
			  			echo $conf_desc[1];
			  		}
			  		else{ echo "";}
			    ?>			    	
			    </p>
			  </div>
			</div>			
		</div>
		<div class="col-3 dash-stack">
			<div class="card" style="max-width: 25rem;">
				<div class="sqr1 bg-success">
					<div class="cont-icon">  
						<i class="fas fa-users fa-4x fa-color"></i>
					</div>
						<div class="cont-data-num">
							<p> <?php echo $conf_past; ?> </p>
						</div>
						<div class="cont-data-text">
							<p class="card-font">activities performed</p>
						</div>
				</div>
				<div class="card-desc">
					Conferences
				</div>
			</div>			

			<div class="card text-white bg-secondary" style="max-width: 25rem;">
			  <div class="card-header header-font">
			  				  	<?php  
			  		if (isset($event_title[2])) {
			  			echo $event_title[2];
			  		}
			  		else{ echo "No Event";}
			    ?>
			  </div>
			  <div class="card-body body-font">
			    <h5 class="card-title"><?php  
			  		if (isset($event_date[2])) {
			  			echo $event_date[2];
			  		}
			  		else{ echo "";}
			    ?></h5>
			    <p class="card-text">			    	<?php  
			  		if (isset($event_desc[2])) {
			  			echo $event_desc[2];
			  		}
			  		else{ echo "";}
			    ?>
			  </div>
			</div>
			<div class="card text-white bg-info" style="max-width: 25rem;">
			  <div class="card-header header-font">
			  				  	<?php  
			  		if (isset($conf_title[2])) {
			  			echo $conf_title[2];
			  		}
			  		else{ echo "No Conference";}
			    ?>
			  </div>
			  <div class="card-body body-font">
			    <h5 class="card-title"><?php  
			  		if (isset($conf_date[2])) {
			  			echo $conf_date[2];
			  		}
			  		else{ echo "";}
			    ?></h5>
			    <p class="card-text"><?php  
			  		if (isset($conf_desc[2])) {
			  			echo $conf_desc[2];
			  		}
			  		else{ echo "";}
			    ?></p>
			  </div>
			</div>			
		</div>
		<div class="col-3 dash-stack">
			<div class="card" style="max-width: 25rem;">
				<div class="sqr1 bg-warning">
					<div class="cont-icon">
						<i class="fas fa-star fa-4x fa-color"></i>
					</div>
						<div class="cont-data-num">
							<p> <?php echo $event_past; ?> </p>
						</div>
						<div class="cont-data-text">
							<p class="card-font">activities performed</p>
						</div>
				</div>
				<div class="card-desc">
					Events
				</div>
			</div>			

			<div class="card text-white bg-success" style="max-width: 25rem;">
			  <div class="card-header header-font">
			  				  	<?php  
			  		if (isset($event_title[3])) {
			  			echo $event_title[3];
			  		}
			  		else{ echo "No Event";}
			    ?>
			  </div>
			  <div class="card-body body-font">
			    <h5 class="card-title"><?php  
			  		if (isset($event_date[3])) {
			  			echo $event_date[3];
			  		}
			  		else{ echo "";}
			    ?></h5>
			    <p class="card-text">			    	<?php  
			  		if (isset($event_desc[3])) {
			  			echo $event_desc[3];
			  		}
			  		else{ echo "";}
			    ?></p>
			  </div>
			</div>
			<div class="card text-white bg-light" style="max-width: 25rem;">
			  <div class="card-header header-font" style="color: grey;">
			  				  	<?php  
			  		if (isset($conf_title[3])) {
			  			echo $conf_title[3];
			  		}
			  		else{ echo "No Conference";}
			    ?>
			  </div>
			  <div class="card-body body-font">
			    <h5 class="card-title"><?php  
			  		if (isset($conf_date[3])) {
			  			echo $conf_date[3];
			  		}
			  		else{ echo "";}
			    ?></h5>
			    <p class="card-text"><?php  
			  		if (isset($conf_desc[3])) {
			  			echo $conf_desc[3];
			  		}
			  		else{ echo "";}
			    ?></p>
			  </div>
			</div>			
		</div>
		<div class="col-3 dash-stack">
			<div class="card" style="max-width: 25rem;">
				<div class="sqr1 bg-secondary">
					<div class="cont-icon">
						<i class="fas fa-trophy fa-4x fa-color"></i>
					</div>
						<div class="cont-data-num">
							<p> <?php echo $act2co; ?> </p>
						</div>
						<div class="cont-data-text">
							<p class="card-font">activities to carry out</p>
						</div>
				</div>
				<div class="card-desc">
					Activities
				</div>
			</div>			

			<div class="card text-white bg-danger" style="max-width: 25rem;">
			  <div class="card-header header-font">
			  			  	<?php  
			  		if (isset($event_title[4])) {
			  			echo $event_title[4];
			  		}
			  		else{ echo "No Event";}
			    ?></div>
			  <div class="card-body body-font">
			    <h5 class="card-title"><?php  
			  		if (isset($event_date[4])) {
			  			echo $event_date[4];
			  		}
			  		else{ echo "";}
			    ?></h5>
			    <p class="card-text">			    	<?php  
			  		if (isset($event_desc[4])) {
			  			echo $event_desc[4];
			  		}
			  		else{ echo "";}
			    ?></p>
			  </div>
			</div>
			<div class="card text-white bg-dark" style="max-width: 25rem;">
			  <div class="card-header header-font">
			  				  	<?php  
			  		if (isset($conf_title[4])) {
			  			echo $conf_title[4];
			  		}
			  		else{ echo "No Conference";}
			    ?>
			  </div>
			  <div class="card-body body-font">
			    <h5 class="card-title"><?php  
			  		if (isset($conf_date[4])) {
			  			echo $conf_date[4];
			  		}
			  		else{ echo "";}
			    ?></h5>
			    <p class="card-text"><?php  
			  		if (isset($conf_desc[4])) {
			  			echo $conf_desc[4];
			  		}
			  		else{ echo "";}
			    ?></p>
			  </div>
			</div>			
		</div>
	</div>
	</div>