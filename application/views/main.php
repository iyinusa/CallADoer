<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->
<div class="intro-banner" data-background-image="<?php echo base_url(); ?>assets/images/background.jpg">
	<div class="container">
		
		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline">
					<h3>
						<strong>Request a Doer or become a Doer for any job, any time.</strong>
						<br>
						<span style="font-size:small">Thousands of small businesses use <strong class="color"><?php echo app_name; ?></strong> to offer right solutions.</span>
					</h3>
					<div>
						<a href="<?php echo base_url('apply'); ?>" class="button button-sliding-icon ripple-effect">Bacome a Doer <i class="icon-material-outline-arrow-right-alt"></i></a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Search Bar -->
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="<?php echo base_url('doers'); ?>" class="intro-banner-search-form margin-top-95">
					<!-- Search Field -->
					<div class="intro-search-field with-autocomplete">
						<label for="autocomplete-input" class="field-title ripple-effect">Where?</label>
						<div class="input-with-icon">
							<input id="ilocation" name="location" type="text" placeholder="Your Location">
							<i class="icon-material-outline-location-on"></i>
						</div>
					</div>

					<!-- Search Field -->
					<div class="intro-search-field">
						<label for="intro-keywords" class="field-title ripple-effect">What/Who?</label>
						<input id="intro-keywords" name="keywords" type="text" placeholder="Keywords">
					</div>

					<!-- Button -->
					<div class="intro-search-button">
						<button class="button ripple-effect">Search</button>
					</div>
				</form>
			</div>
		</div>

		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					<li>
						<strong class="counter"><?php echo number_format($jobs); ?></strong>
						<span>Jobs Hired</span>
					</li>
					<li>
						<strong class="counter"><?php echo number_format($jobs_complete); ?></strong>
						<span>Jobs Completed</span>
					</li>
					<li>
						<strong class="counter"><?php echo number_format($doers); ?></strong>
						<span>Doers</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<!-- Category Boxes -->
<div class="section margin-top-65 margin-bottom-30">
	<div class="container">
		<div class="row">

			<!-- Section Headline -->
			<div class="col-xl-12">
				<div class="section-headline centered margin-top-0 margin-bottom-45">
					<h3>Popular Categories</h3>
				</div>
			</div>

			<?php echo $category_list; ?>

		</div>
	</div>
</div>
<!-- Category Boxes / End -->

<!-- Doers Of the Day -->
<div class="section black padding-top-65 padding-bottom-70 full-width-carousel-fix">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<div class="col-sm-12">
					<div class="section-headline margin-top-0 margin-bottom-25">
						<h3 style="color:#ccc;">About <?php echo app_name; ?></h3>
					</div>
				</div>
				<div class="col-sm-12">
					We Provide online solutions for all circumstances through our pool of professionals cutting across all areas of human endeavors. This we do through seamless inter personal connection of our clients to the right professional within the location to get the job done without any stress for both parties. 
				</div>
				<div class="col-sm-12">
					<div class="section-headline margin-top-0 margin-bottom-25">
						<h3 style="color:#ccc;"><br/>Vision</h3>
					</div>
				</div>
				<div class="col-sm-12">
					To be the Leading online professionals connector bringing a seamless solution to your need.
				</div>
				<div class="col-sm-12">
					<div class="section-headline margin-top-0 margin-bottom-25">
						<h3 style="color:#ccc;"><br/>Mission</h3>
					</div>
				</div>
				<div class="col-sm-12">
					Providing a stress free solution to our clients need from the the comfort of their homes/offices . 
				</div>
			</div>

			<div class="col-sm-5">
				<div class="col-sm-12">
					<div class="section-headline margin-top-0 margin-bottom-25">
						<h3 style="color:#ccc;"><span class="d-block d-sm-none"><br/></span>Doer of the Day</h3>
					</div>
				</div>

				<div class="col-sm-12">
					<div class="freelancers-container freelancers-grid-layout">
						
						<?php echo $doer_of_day; ?>
			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Doers Of the Day / End-->

<!-- Highest Rated Doers -->
<div class="section gray padding-top-65 padding-bottom-70 full-width-carousel-fix">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-25">
					<h3>Highest Rated Doers</h3>
					<a href="<?php echo base_url('doers'); ?>" class="headline-link">Browse All Doers</a>
				</div>
			</div>

			<div class="col-xl-12">
				<div class="default-slick-carousel freelancers-container freelancers-grid-layout">

					<?php echo $highest_rating; ?>

				</div>
			</div>

		</div>
	</div>
</div>
<!-- Highest Rated Freelancers / End-->

<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script>
	function search_doer() {
		var location = $('ilocation').val();
		var keyword = $('intro-keywords').val();
		$.ajax({
			url: '<?php echo base_url("doers"); ?>',
			type: 'post',
			data: {location:location, keyword:keyword}
		});
	}
</script>
