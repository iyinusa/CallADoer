<!-- Dashboard Headline -->
<div class="dashboard-headline">
	<h3>Howdy, <?php echo $fullname; ?>!</h3>
	<span>We are glad to see you again!</span>
</div>

<!-- Fun Facts Container -->
<div class="fun-facts-container">
	<div class="fun-fact" data-fun-fact-color="#36bd78">
		<div class="fun-fact-text">
			<span>All Jobs</span>
			<h4><?php echo $jobs; ?></h4>
		</div>
		<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
	</div>
	<div class="fun-fact" data-fun-fact-color="#45587F">
		<div class="fun-fact-text">
			<span>Completed Jobs</span>
			<h4><?php echo $jobs_complete; ?></h4>
		</div>
		<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
	</div>
	<div class="fun-fact" data-fun-fact-color="#efa80f">
		<div class="fun-fact-text">
			<span>Reviews</span>
			<h4><?php echo $reviews; ?></h4>
		</div>
		<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
	</div>

	<!-- Last one has to be hidden below 1600px, sorry :( -->
	<div class="fun-fact" data-fun-fact-color="#36bd78">
		<div class="fun-fact-text">
			<span>This Month Views</span>
			<h4><?php echo $month_views; ?></h4>
		</div>
		<div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
	</div>
</div>

<!-- Row -->
<div class="row">
	<div class="col-xl-12">
		<!-- Dashboard Box -->
		<div class="dashboard-box main-box-in-row">
			<div class="headline">
				<h3><i class="icon-feather-bar-chart-2"></i> Your Profile Views (<?php echo date('Y'); ?>)</h3>
				<!-- <div class="sort-by">
					<select class="selectpicker hide-tick">
						<option>Last 6 Months</option>
						<option>This Year</option>
						<option>This Month</option>
					</select>
				</div> -->
			</div>
			<div class="content">
				<!-- Chart -->
				<div class="chart">
					<canvas id="chart" width="100" height="45"></canvas>
				</div>
			</div>
		</div>
		<!-- Dashboard Box / End -->
	</div>
</div>
<!-- Row / End -->