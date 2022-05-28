<?php if(empty($page_dash)){ ?>
<!-- Sign In Popup
================================================== -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#login">Log In</a></li>
			<li><a href="#register">Register</a></li>
		</ul>

		<div class="popup-tabs-container">
			<!-- Login -->
			<div class="popup-tab-content" id="login">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>We're glad to see you again!</h3>
					<span>Don't have an account? <a href="javascript:;" class="register-tab">Sign Up!</a></span>
				</div>
					
				<!-- Form -->
				<div class="input-with-icon-left">
					<i class="icon-material-baseline-mail-outline"></i>
					<input type="text" class="input-text with-border" id="auth_email" placeholder="Email Address/Username"/>
				</div>

				<div class="input-with-icon-left">
					<i class="icon-material-outline-lock"></i>
					<input type="password" class="input-text with-border" id="auth_password" placeholder="Password"/>
				</div>
				<!-- <a href="javascript:;" class="forgot-password">Forgot Password?</a> -->

				<div id="auth_msg"></div>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" onclick="login();">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

			<!-- Register -->
			<div class="popup-tab-content" id="register">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Let's create your account!</h3>
				</div>

				<a href="<?php echo base_url('apply'); ?>" class="button button-sliding-icon ripple-effect">Bacome a Doer <i class="icon-material-outline-arrow-right-alt"></i></a>

				<div class="social-login-separator"><span>or</span></div>

				<h3 style="text-align:center;">Register as Employer<br/><br/></h3>
					
				<!-- Form -->
				<div class="input-with-icon-left">
					<i class="icon-feather-user"></i>
					<input type="text" class="input-text with-border" id="reg_fullname" placeholder="Full Name"/>
				</div>
				
				<div class="input-with-icon-left">
					<i class="icon-material-baseline-mail-outline"></i>
					<input type="email" class="input-text with-border" id="reg_email" placeholder="Email Address"/>
				</div>

				<!-- <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom"> -->
				<div class="input-with-icon-left">
					<i class="icon-material-outline-lock"></i>
					<input type="password" class="input-text with-border" id="reg_password" placeholder="Password"/>
				</div>

				<div class="input-with-icon-left">
					<i class="icon-material-outline-lock"></i>
					<input type="password" class="input-text with-border" id="reg_confirm" placeholder="Repeat Password"/>
				</div>

				<div id="reg_msg"></div>
				
				<!-- Button -->
				<button class="margin-top-10 button full-width button-sliding-icon ripple-effect" onclick="register();">Register <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Sign In Popup / End -->

<!-- Footer
================================================== -->
<div id="footer">
	
	<!-- Footer Top Section -->
	<div class="footer-top-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">

					<!-- Footer Rows Container -->
					<div class="footer-rows-container">
						
						<!-- Left Side -->
						<div class="footer-rows-left">
							<div class="footer-row">
								<div class="footer-row-inner footer-logo">
									<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="">
								</div>
							</div>
						</div>
						
						<!-- Right Side -->
						<div class="footer-rows-right">

							<!-- Social Icons -->
							<div class="footer-row">
								<div class="footer-row-inner">
									<ul class="footer-social-links">
										<li>
											<a href="javascript:;" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-facebook-f"></i>
											</a>
										</li>
										<li>
											<a href="javascript:;" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-twitter"></i>
											</a>
										</li>
										<li>
											<a href="javascript:;" title="Google Plus" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-google-plus-g"></i>
											</a>
										</li>
										<li>
											<a href="javascript:;" title="LinkedIn" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-linkedin-in"></i>
											</a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>

					</div>
					<!-- Footer Rows Container / End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Top Section / End -->

	<!-- Footer Middle Section -->
	<div class="footer-middle-section">
		<div class="container">
			<div class="row">

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>For Doers</h3>
						<ul>
							<li><a href="javascript:;"><span>Add Profile</span></a></li>
							<li><a href="javascript:;"><span>Request Alerts</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>For Hirers</h3>
						<ul>
							<li><a href="javascript:;"><span>Browse Doers</span></a></li>
							<li><a href="javascript:;"><span>Request A Doer</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Helpful Links</h3>
						<ul>
							<li><a href="javascript:;"><span>Privacy Policy</span></a></li>
							<li><a href="javascript:;"><span>Terms of Use</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Account</h3>
						<ul>
							<li><a href="javascript:;"><span>Log In</span></a></li>
							<li><a href="javascript:;"><span>My Account</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Newsletter -->
				<div class="col-xl-4 col-lg-4 col-md-12">
					<h3><i class="icon-feather-mail"></i> Sign Up For a Newsletter</h3>
					<p>Don't get missed out on every update.</p>
					<form class="newsletter">
						<input type="text" name="fname" placeholder="Enter your email address">
						<button type="submit"><i class="icon-feather-arrow-right"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Middle Section / End -->
	
	<!-- Footer Copyrights -->
	<div class="footer-bottom-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					© <?php echo date('Y'); ?> <strong><?php echo app_name; ?></strong>. All Rights Reserved.
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->
<?php } else { // Dashboard Footer ?>

		<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
					© <?php echo date('Y'); ?> <strong><?php echo app_name; ?></strong>. All Rights Reserved.
				</div>
				<ul class="footer-social-links">
					<li>
						<a href="javascript:;" title="Facebook" data-tippy-placement="top">
							<i class="icon-brand-facebook-f"></i>
						</a>
					</li>
					<li>
						<a href="javascript:;" title="Twitter" data-tippy-placement="top">
							<i class="icon-brand-twitter"></i>
						</a>
					</li>
					<li>
						<a href="javascript:;" title="Google Plus" data-tippy-placement="top">
							<i class="icon-brand-google-plus-g"></i>
						</a>
					</li>
					<li>
						<a href="javascript:;" title="LinkedIn" data-tippy-placement="top">
							<i class="icon-brand-linkedin-in"></i>
						</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!-- Footer / End -->

		</div>
	</div>
</div>
<?php } ?>

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script>var base_url = '<?php echo base_url(); ?>';</script>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-migrate-3.0.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/mmenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/tippy.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-slider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/snackbar.js"></script>
<script src="<?php echo base_url(); ?>assets/js/clipboard.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/slick.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
	// Snackbar for user status switcher
	$('#snackbar-user-status label').click(function() { 
		Snackbar.show({
			text: 'Your status has been changed!',
			pos: 'bottom-center',
			showAction: false,
			actionText: "Dismiss",
			duration: 3000,
			textColor: '#fff',
			backgroundColor: '#383838'
		}); 
		$.ajax({
			url: '<?php echo base_url("auth/change_status"); ?>',
			success: function(data) {
				if(data == 'offline') {
					$('.user-avatar').removeClass('status-online');
					$('.user-avatar').addClass('status-offline');
				} else {
					$('.user-avatar').removeClass('status-offline');
					$('.user-avatar').addClass('status-online');
				}
			}
		});
	}); 

	function register() {
		$('#reg_msg').html('<div style="text-align:center;"><i class="fa fa-spinner icon-line-awesome-spinner fa-2x fa-fw"></i> please wait...</div>');
		var fullname = $('#reg_fullname').val();
		var email = $('#reg_email').val();
		var password = $('#reg_password').val();
		var confirm = $('#reg_confirm').val();
		$.ajax({
			url: '<?php echo base_url("auth/register"); ?>',
			type: 'post',
			data: {fullname:fullname, email:email, password:password, confirm:confirm},
			success: function(data) {
				$('#reg_msg').html(data);
			}
		});
	}

	function login() {
		$('#auth_msg').html('<div style="text-align:center;"><i class="fa fa-spinner icon-line-awesome-spinner fa-2x fa-fw"></i> please wait...</div>');
		var email = $('#auth_email').val();
		var password = $('#auth_password').val();
		$.ajax({
			url: '<?php echo base_url("auth/login"); ?>',
			type: 'post',
			data: {email:email, password:password},
			success: function(data) {
				$('#auth_msg').html(data);
			}
		});
	}
</script>

<!-- Google Autocomplete -->
<script>
	function initAutocomplete() {
		 var options = {
		  types: ['(cities)'],
		  // componentRestrictions: {country: "us"}
		 };

		 var input = document.getElementById('ilocation');
		 var autocomplete = new google.maps.places.Autocomplete(input, options);
	}

	// Autocomplete adjustment for homepage
	if ($('.intro-banner-search-form')[0]) {
	    setTimeout(function(){ 
	        $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
	    }, 300);
	}

</script>

<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&libraries=places&callback=initAutocomplete"></script>

<?php $access_loc = array('main','apply','doer','setting'); if(in_array($page_active, $access_loc)){ ?>
<script>
	$(function() {
        get_location();
	});
	
	function get_location() {
		/* Chrome need SSL! */
		// var is_chrome = /chrom(e|ium)/.test( navigator.userAgent.toLowerCase() );
		// var is_ssl    = 'https:' == document.location.protocol;
		// if( is_chrome && ! is_ssl ){
		// 	return false;
		// }

		/* HTML5 Geolocation */
		navigator.geolocation.getCurrentPosition(
			function( position ){ // success cb

				/* Current Coordinate */
				var lat = position.coords.latitude;
				var lng = position.coords.longitude;
				var google_map_pos = new google.maps.LatLng( lat, lng );

				/* Use Geocoder to get address */
				var google_maps_geocoder = new google.maps.Geocoder();
				google_maps_geocoder.geocode(
					{ 'latLng': google_map_pos },
					function( results, status ) {
						if ( status == google.maps.GeocoderStatus.OK && results[0] ) {
							// console.log( results[0].formatted_address );
							$('#ilocation').val(results[0].formatted_address);
						}
					}
				);
			},
			function(){ // fail cb
			}
		);
	}
</script>
<?php } ?>

<?php if(!empty($page_dash)){ // Dashboard Scripts ?>
	<script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
	<?php if(!empty($views_array)){ ?>
	<script>
		Chart.defaults.global.defaultFontFamily = "Nunito";
		Chart.defaults.global.defaultFontColor = '#888';
		Chart.defaults.global.defaultFontSize = '14';

		var ctx = document.getElementById('chart').getContext('2d');

		var chart = new Chart(ctx, {
			type: 'line',

			// The data for our dataset
			data: {
				labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				// Information about the dataset
				datasets: [{
					label: "Views",
					backgroundColor: 'rgba(86,188,106,0.15)',
					borderColor: '#56bc6a',
					borderWidth: "3",
					data: <?php echo json_encode($views_array); ?>,
					pointRadius: 5,
					pointHoverRadius:5,
					pointHitRadius: 10,
					pointBackgroundColor: "#fff",
					pointHoverBackgroundColor: "#fff",
					pointBorderWidth: "2",
				}]
			},

			// Configuration options
			options: {
				layout: {
					padding: 10,
				},
				legend: { display: false },
				title:  { display: false },
				scales: {
					yAxes: [{
						scaleLabel: {
							display: false
						},
						gridLines: {
							borderDash: [6, 10],
							color: "#d8d8d8",
							lineWidth: 1,
						},
					}],
					xAxes: [{
						scaleLabel: { display: false },  
						gridLines:  { display: false },
					}],
				},
				tooltips: {
					backgroundColor: '#333',
					titleFontSize: 13,
					titleFontColor: '#fff',
					bodyFontColor: '#fff',
					bodyFontSize: 13,
					displayColors: false,
					xPadding: 10,
					yPadding: 10,
					intersect: false
				}
			},
		});
	</script>
	<?php } ?>

<?php } ?>

</body>
</html>