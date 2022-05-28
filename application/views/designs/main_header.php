<?php
	$log_user_id = $this->session->userdata('cds_id');
	$log_user = $this->Crud->read_field('id', $log_user_id, 'user', 'fullname');
	$log_status = $this->Crud->read_field('id', $log_user_id, 'user', 'status');
	$log_role = $this->Crud->read_field('id', $log_user_id, 'user', 'role');
	$log_img_id = $this->Crud->read_field('id', $log_user_id, 'user', 'img_id');
	$log_img = $this->Crud->read_field('id', $log_img_id, 'img', 'pics_small');
	if(!file_exists($log_img)) {$log_img = 'assets/images/avatar.png';}

	if($log_status == 1){
		$status_icon = 'online';
		$status_online = 'current-status';
		$status_offline = '';
	} else {
		$status_icon = 'offline';
		$status_online = '';
		$status_offline = 'current-status';
	}

	if(!empty($page_dash)) {
		$body_class = 'gray';
		$head_class = 'dashboard-header not-sticky';
	} else {
		$body_class = '';
		$head_class = '';
	}

	if(!empty($page_active)) {
		if($page_active == 'main'){$main_act = 'current';} else {$main_act = '';}
		if($page_active == 'about'){$about_act = 'current';} else {$about_act = '';}
		if($page_active == 'doer'){$doer_act = 'current';} else {$doer_act = '';}
		if($page_active == 'contact'){$contact_act = 'current';} else {$contact_act = '';}

		if($page_active == 'dashboard'){$dashboard_act = 'active';} else {$dashboard_act = '';}
		if($page_active == 'setting'){$setting_act = 'active';} else {$setting_act = '';}
		if($page_active == 'message'){$message_act = 'active';} else {$message_act = '';}
		if($page_active == 'job'){$job_act = 'active';} else {$job_act = '';}
		if($page_active == 'bookmark'){$bookmark_act = 'active';} else {$bookmark_act = '';}
		if($page_active == 'review'){$review_act = 'active';} else {$review_act = '';}
	}
?>

<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title><?php echo $title; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colors/green.css">

</head>
<body class="<?php echo $body_class; ?>">

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth <?php echo $head_class; ?>">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt=""></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">

            			<li><a href="<?php echo base_url(); ?>" class="<?php echo $main_act; ?>">Home</a></li>
            
            			<!-- <li><a href="javascript:;" class="<?php echo $about_act; ?>">About</a></li> -->

						<li><a href="<?php echo base_url('doers'); ?>" class="<?php echo $doer_act; ?>">Doers</a></li>

						<li><a href="<?php echo base_url('doers'); ?>">Request A Doer</a></li>

						<li><a href="javascript:;" class="<?php echo $contact_act; ?>">Contact</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<?php if(empty($log_user_id)){ ?>
					<div class="header-widget">
						<a href="#sign-in-dialog" class="popup-with-zoom-anim log-in-button"><i class="icon-feather-log-in"></i> <span>Log In / Register</span></a>
					</div>
				<?php } else { ?>

					<!--  User Notifications -->
					<div class="header-widget hide-on-mobile">
						
						<!-- Notifications -->
						<div class="header-notifications">
							<div class="header-notifications-trigger">
								<a href="#"><i class="icon-feather-bell"></i><span>0</span></a>
							</div>

							<div class="header-notifications-dropdown">

								<div class="header-notifications-headline">
									<h4>Notifications</h4>
									<button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
										<i class="icon-feather-check-square"></i>
									</button>
								</div>

								<div class="header-notifications-content">
									<div class="header-notifications-scroll" data-simplebar>
										
									</div>
								</div>

							</div>

						</div>

					</div>
					<!--  User Notifications / End -->

					<!-- User Menu -->
					<div class="header-widget">

						<!-- Messages -->
						<div class="header-notifications user-menu">
							<div class="header-notifications-trigger">
								<a href="javascript:;"><div class="user-avatar status-<?php echo $status_icon; ?>"><img src="<?php echo base_url($log_img); ?>" alt=""></div></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<!-- User Status -->
								<div class="user-status">

									<!-- User Name / Avatar -->
									<div class="user-details">
										<div class="user-avatar status-<?php echo $status_icon; ?>"><img src="<?php echo base_url($log_img); ?>" alt=""></div>
										<div class="user-name">
											<?php echo $log_user; ?> <span><?php echo $log_role; ?></span>
										</div>
									</div>
									
									<!-- User Status Switcher -->
									<div class="status-switch" id="snackbar-user-status">
										<label class="user-online <?php echo $status_online; ?>">Online</label>
										<label class="user-invisible <?php echo $status_offline; ?>">Invisible</label>
										<!-- Status Indicator -->
										<span class="status-indicator" aria-hidden="true"></span>
									</div>	
							</div>
							
							<ul class="user-menu-small-nav">
								<li><a href="<?php echo base_url('dashboard'); ?>"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
								<li><a href="<?php echo base_url('setting'); ?>"><i class="icon-material-outline-settings"></i> Settings</a></li>
								<li><a href="<?php echo base_url('auth/logout'); ?>"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
							</ul>

							</div>
						</div>

					</div>
					<!-- User Menu / End -->

				<?php } ?>
				<!-- Mobile Navigation Button -->
				<span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>

			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

<?php if(!empty($page_dash)) { ?>
<!-- Dashboard Container -->
<div class="dashboard-container">
	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Navigation">
							<li class="<?php echo $dashboard_act; ?>"><a href="<?php echo base_url('dashboard'); ?>"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<li class="<?php echo $message_act; ?>"><a href="<?php echo base_url('message'); ?>"><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">0</span></a></li>
							<li class="<?php echo $job_act; ?>"><a href="<?php echo base_url('job'); ?>"><i class="icon-material-outline-business-center"></i> Jobs</a></li>
							<li class="<?php echo $bookmark_act; ?>"><a href="<?php echo base_url('bookmark'); ?>"><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>
							<li class="<?php echo $review_act; ?>"><a href="<?php echo base_url('review'); ?>"><i class="icon-material-outline-rate-review"></i> Reviews</a></li>
						</ul>

						<ul data-submenu-title="Account">
							<li class="<?php echo $setting_act; ?>"><a href="<?php echo base_url('setting'); ?>"><i class="icon-material-outline-settings"></i> Settings</a></li>
							<li><a href="<?php echo base_url('auth/logout'); ?>"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->

	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
<?php } ?>