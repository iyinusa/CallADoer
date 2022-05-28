<div class="single-page-header freelancer-header" data-background-image="<?php echo base_url(); ?>assets/images/single-freelancer.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image freelancer-avatar"><img src="<?php echo base_url($user_img); ?>" alt=""></div>
						<div class="header-details">
							<h3><?php echo $fullname; ?> <span><?php echo $taging; ?></span></h3>
							<ul>
								<li><div class="star-rating" data-rating="<?php echo $rating; ?>"></div></li>
								<li><img class="flag" src="<?php echo base_url(); ?>assets/images/flags/ng.svg" alt=""> Nigeria</li>
								<li><?php echo $verified; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">
			
			<!-- Page Content -->
			<div class="single-page-section">
				<h3 class="margin-bottom-25">About Me</h3>
				<p><?php echo $bio; ?></p>
			</div>

			<!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-thumb-up"></i> Reviews</h3>
				</div>

				<!-- <ul class="boxed-list-ul"> -->
					<div id="review_data"></div>
				<!-- </ul> -->

				<div class="col-xs-12">
					<div id="review_more"></div>
				</div>

				<!-- <ul class="boxed-list-ul">
					<li>
						<div class="boxed-list-item">
							<div class="item-content">
								<h4>Web, Database and API Developer <span>Rated by Tunde Lawson</span></h4>
								<div class="item-details margin-top-10">
									<div class="star-rating" data-rating="5.0"></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> December 2018</div>
								</div>
								<div class="item-description">
									<p>Excellent programmer - fully carried out my project in a very professional manner. </p>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="boxed-list-item">
							<div class="item-content">
								<h4>WP Theme Design <span>Rated by Stella Omoregie</span></h4>
								<div class="item-details margin-top-10">
									<div class="star-rating" data-rating="5.0"></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> November 2018</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="boxed-list-item">
							<div class="item-content">
								<h4>Fix Enterprise CMS Pages <span>Rated by Deji Cookies</span></h4>
								<div class="item-details margin-top-10">
									<div class="star-rating" data-rating="5.0"></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> November 2018</div>
								</div>
								<div class="item-description">
									<p>I was extremely impressed with the quality of work AND how quickly he got it done. He then offered to help with another side part of the project that we didn't even think about originally.</p>
								</div>
							</div>
						</div>
					</li>
				</ul> -->

				<?php  if($log_id != ''){if($log_id != $user_id){ ?>
				<hr />
				<div class="feedback-yes-no">
					<strong><i class="icon-material-outline-thumb-up"></i> Leave a Review</strong>
					<div class="leave-rating">
						<input type="radio" name="rates" id="rates1" value="5">
						<label for="rates1" class="icon-material-outline-star"></label>
						<input type="radio" name="rates" id="rates2" value="4">
						<label for="rates2" class="icon-material-outline-star"></label>
						<input type="radio" name="rates" id="rates3" value="3">
						<label for="rates3" class="icon-material-outline-star"></label>
						<input type="radio" name="rates" id="rates4" value="2">
						<label for="rates4" class="icon-material-outline-star"></label>
						<input type="radio" name="rates" id="rates5" value="1">
						<label for="rates5" class="icon-material-outline-star"></label>
					</div><div class="clearfix"></div>
				</div>

				<textarea class="with-border" placeholder="Your Review" id="review_msg" cols="7" required></textarea>

				<div id="review_reply"></div>

				<a href="javascript:;" class="button margin-bottom-25 popup-with-zoom-anim" onclick="post_review();"><i class="icon-material-outline-thumb-up"></i> Post Review</a>

				<?php }} else {echo '<a href="#sign-in-dialog" class="button margin-bottom-25 popup-with-zoom-anim"><i class="icon-feather-log-in"></i> Log In to Review</a>';} ?>

				<div class="clearfix"></div>
			</div>
			<!-- Boxed List / End -->

		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<!-- Button -->
				<a href="#small-dialog" class="apply-now-button popup-with-zoom-anim margin-bottom-50">Call The Doer <i class="icon-material-outline-arrow-right-alt"></i></a>

				<!-- Freelancer Indicators -->
				<div class="sidebar-widget">
					<div class="freelancer-indicators">

						<!-- Indicator -->
						<div class="indicator">
							<strong><?php echo $complete; ?>%</strong>
							<div class="indicator-bar" data-indicator-percentage="<?php echo $complete; ?>"><span></span></div>
							<span>Job Success</span>
						</div>

						<!-- Indicator -->
						<div class="indicator">
							<strong><?php echo $recommend; ?>%</strong>
							<div class="indicator-bar" data-indicator-percentage="<?php echo $recommend; ?>"><span></span></div>
							<span>Recommendation</span>
						</div>
					</div>
				</div>

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>Skills</h3>
					<div class="task-tags">
						<?php 
							if(!empty($skill)) {
								foreach(json_decode($skill) as $key=>$value) {
									echo '<span>'.$value.'</span> ';
								}
							}
						?>
					</div>
				</div>

				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<!-- Bookmark Button -->
					<?php 
						if($log_id != $user_id){
							echo '<h3>Bookmark</h3>';

							if($log_id == ''){ 
								echo '
									<a href="#sign-in-dialog" class="button margin-bottom-25 popup-with-zoom-anim">
										<i class="icon-feather-log-in"></i> Log In to Bookmark
									</a>
								';
							} else {
								if($this->Crud->check2('user_id', $user_id, 'book_by', $log_id, 'bookmark') > 0) {
									echo '
										<button class="bookmark-button margin-bottom-25 bookmarked">
											<span class="bookmark-icon"></span>
											<span class="bookmark-text">Bookmark</span>
											<span class="bookmarked-text">Bookmarked</span>
										</button>
									';
								} else {
									echo '
										<button class="bookmark-button margin-bottom-25">
											<span class="bookmark-icon"></span>
											<span class="bookmark-text">Bookmark</span>
											<span class="bookmarked-text">Bookmarked</span>
										</button>
									';
								}
							}
						}
					?>
					<!-- <button class="bookmark-button margin-bottom-25">
						<span class="bookmark-icon"></span>
						<span class="bookmark-text">Bookmark</span>
						<span class="bookmarked-text">Bookmarked</span>
					</button> -->

					<!-- Copy URL -->
					<h3>Doer URL</h3>
					<div class="copy-url">
						<input id="copy-url" type="text" class="with-border" readonly>
						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>

<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
	<div class="sign-in-form">
		<ul class="popup-tabs-nav">
			<li><a href="#tab">Call The Doer</a></li>
		</ul>

		<div class="popup-tabs-container">
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Discuss with <?php echo $fullname; ?></h3>
				</div>

				<input type="hidden" id="log_id" value="<?php if(!empty($log_id)){echo $log_id;} ?>" />
				<input type="hidden" id="type" />

				<div id="req_auth" style="display:none;">
					<button class="button button-sliding-icon ripple-effect" onclick="existing_account();">Existing Account <i class="icon-material-outline-arrow-right-alt"></i></button>
					<button class="button button-sliding-icon ripple-effect" onclick="new_account();">New Account <i class="icon-material-outline-arrow-right-alt"></i></button>
				</div>

				<div id="req_login" style="display:none;">
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" id="logemail" placeholder="Email Address/Username"/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-line-awesome-lock"></i>
						<input type="password" class="input-text with-border" id="logpass" placeholder="Password"/>
					</div>

					<div id="log_msg"></div>

					<button class="button button-sliding-icon ripple-effect" onclick="req_login();">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
				</div>

				<div id="callreg" style="display:none;">
					<div class="input-with-icon-left">
						<i class="icon-material-outline-account-circle"></i>
						<input type="text" class="input-text with-border" id="callname" placeholder="Full Name"/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="email" class="input-text with-border" id="callemail" placeholder="Email Address"/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-line-awesome-lock"></i>
						<input type="text" class="input-text with-border" id="callpass" placeholder="Password"/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-feather-phone"></i>
						<input type="text" class="input-text with-border" id="callphone" placeholder="Phone"/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-room"></i>
						<input type="text" class="input-text with-border" id="ilocation" placeholder="Your Location"/>
					</div>
				</div>

				<div id="callform" style="display:none;">
					<div class="social-login-separator"><span></span></div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-mouse"></i>
						<input type="text" class="input-text with-border" id="calltitle" placeholder="Job Title"/>
					</div>

					<textarea name="textarea" rows="6" id="calldetails" placeholder="Job Details" class="with-border"></textarea>

					<div id="request_msg"></div>

					<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" onclick="request_service();">Request A Service <i class="icon-material-outline-arrow-right-alt"></i></button>
				</div>

				<div id="callsuccess" style="display:none;">
					<div class="order-confirmation-page">
						<div class="breathing-icon"><i class="icon-line-awesome-check"></i></div>
						<h2 class="margin-top-30">Thank You!</h2>
						<p>Your Request has been sent to <?php echo $fullname; ?></p>
					</div>
				</div>
				

			</div>

		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

<script>
    $(function() {
		review_load('', '');
		if($('#log_id').val() != '') {
			$('#callform').show();
		} else {
			$('#req_auth').show();
		}
    });

    function review_load(x, y) {
        if(y === 'undefined' || y == '') {
             $('#review_data').html('<div class="col-xs-12"><h1 class="text-muted" style="text-align:center;"><i class="fa fa-spin icon-line-awesome-spinner fa-4x"></i></h1></div>');
        } else {
            $('#review_more').html('<div class="col-xs-12"><h1 class="text-muted" style="text-align:center;"><i class="fa fa-spin icon-line-awesome-spinner fa-4x"></i></h1></div>');
        }

        $.ajax({
            url: '<?php echo base_url("doers/review_directory"); ?>/' + x + '/' + y,
            success: function(data) {
                var dt = JSON.parse(data);
                
                if(y === 'undefined' || y == '') {
                    $('#review_data').html(dt.item);
                } else {
                    $('#review_data').append(dt.item);
                }

                if(dt.more == 'yes') {
                    $('#review_more').html('<div style="text-align:center;"><br/><a href="javascript:;" class="button button-sliding-icon ripple-effect" onclick="review_load(' + dt.limit + ', ' + dt.offset + ');"><i class="icon-feather-refresh-ccw"></i> Load More of ' + dt.left + '</a></div>');
                } else {
                    $('#review_more').html('');
                }
			},
			complete: function() {
				$.getScript('<?php echo base_url(); ?>assets/js/custom.js');
			}
        });
	}

	function post_review() {
		$('#review_reply').html('<div class="col-xs-12"><h1 class="text-muted"><i class="fa fa-spin icon-line-awesome-spinner fa-4x"></i></h1></div>');
		var rate_msg = $('#review_msg').val();
		var rate = $('input[name="rates"]:checked').val();

		$.ajax({
			url: '<?php echo base_url("doers/review"); ?>',
			type: 'post',
			data: {rate:rate, rate_msg:rate_msg},
            success: function(data) {
				var dt = JSON.parse(data);
				$('#review_reply').html(dt.msg);
                if(dt.status == 'success') {
					$('#review_msg').val('');
				}
			}
        });
	}

	function new_account() {
		$("#type").val('new');
		$("#req_auth").hide(200);
		$("#callreg").show(200);
		$("#callform").show(200);
	}

	function existing_account() {
		$("#type").val('existing');
		$("#req_auth").hide(200);
		$("#req_login").show(200);
	}

	function req_login() {
		$('#log_msg').html('<div class="col-xs-12"><h1 class="text-muted" style="text-align:center;"><i class="fa fa-spin icon-line-awesome-spinner fa-4x"></i> Authenticating...</h1></div>');
		var email = $('#logemail').val();
		var password = $('#logpass').val();
		$.ajax({
			url: '<?php echo base_url("doers/req_login"); ?>',
			type: 'post',
			data: {email:email, password:password},
            success: function(data) {
				var dt = JSON.parse(data);
				$('#log_msg').html(dt.msg);
                if(dt.status == 'success') {
					$("#type").val('existing');
					$("#req_login").hide(200);
					$("#callform").show(200);
				}
			}
		});
	}

	function request_service() {
		$('#request_msg').html('<div class="col-xs-12"><h1 class="text-muted" style="text-align:center;"><i class="fa fa-spin icon-line-awesome-spinner fa-4x"></i> Requesting...</h1></div>');
		
		var type = $('#type').val();
		var title = $('#calltitle').val();
		var detail = $('#calldetails').val();

		if(type == 'new') {
			var name = $('#callname').val();
			var email = $('#callemail').val();
			var pass = $('#callpass').val();
			var phone = $('#callphone').val();
			var location = $('#ilocation').val();

			var post_data = {type:type, title:title, detail:detail, name:name, email:email, pass:pass, phone:phone, location:location};
		} else {
			var post_data = {type:type, title:title, detail:detail};
		}
		
		$.ajax({
			url: '<?php echo base_url("doers/request_service"); ?>',
			type: 'post',
			data: post_data,
            success: function(data) {
				var dt = JSON.parse(data);
				$('#request_msg').html(dt.msg);
                if(dt.status == 'success') {
					$("#callreg").hide(200);
					$("#callform").hide(200);
					$("#callsuccess").show(200);
				}
			}
		});
	}
</script>