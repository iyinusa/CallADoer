<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Become A Doer</h2>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<?php echo form_open_multipart($form_link, array('id'=>'bb_ajax_form', 'clear'=>false)); ?>
			<div class="dashboard-box margin-top-0">
				<div class="headline">
					<h3><i class="icon-feather-folder-plus"></i> Doer Sign Up Form</h3>
				</div>

				<div class="content with-padding padding-bottom-10">
					<div class="row">
						<div class="col-sm-12"><div id="bb_ajax_msg"></div></div>

						<div class="col-sm-12">
							<div class="submit-field">
								<h5>Full Name</h5>
								<input type="text" name="fullname" class="with-border" required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="submit-field">
								<h5>Phone</h5>
								<input type="text" name="phone" class="with-border" required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="submit-field">
								<h5>Email</h5>
								<input type="email" class="with-border" name="email" required>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="submit-field">
								<h5>Your Location</h5>
								<div class="input-with-icon">
									<div id="autocomplete-container">
										<input id="ilocation" class="with-border" type="text" placeholder="Type Your Address" name="location" required>
									</div>
									<i class="icon-material-outline-location-on"></i>
								</div>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="submit-field">
								<h5>Doer Category</h5>
								<?php 
									$category = $this->Crud->read_order('category', 'name', 'asc');
									if(!empty($category)) {
										foreach($category as $cat) {
											echo '
												<div class="checkbox">
													<input type="checkbox" name="category[]" id="chekcbox'.$cat->id.'" value="'.$cat->id.'">
													<label for="chekcbox'.$cat->id.'"><span class="checkbox-icon"></span> '.$cat->name.'&nbsp;&nbsp;</label>
												</div>
											';
										}
									} 
								?>
								<div class="checkbox">
									<input type="checkbox" name="check_others" id="chekcbox_other" oninput="get_others();">
									<label for="chekcbox_other"><span class="checkbox-icon"></span> Others&nbsp;&nbsp;</label>
								</div>
							</div>
						</div>

						<div id="others_box" class="col-sm-12" style="display:none;">
							<div class="submit-field">
								<h5>Please Specify</h5>
								<input type="text" class="with-border" name="others">
							</div>
						</div>

						<div class="col-sm-12">
							<h5>Set Authentication<hr/></h5>
						</div>

						<div class="col-sm-6">
							<div class="submit-field">
								<h5>Choose Username</h5>
								<input type="text" class="with-border" name="username" required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="submit-field">
								<h5>Set Password</h5>
								<input type="text" class="with-border" name="password" required>
							</div>
						</div>
					</div>
				</div>
				
			</div>

			<div class="col-sm-12 text-center">
				<button type="submit" class="button ripple-effect big margin-top-30 bb_form_btn"><i class="icon-feather-plus"></i> Apply Now</button>
			</div>
			<?php echo form_close(); ?>
		</div>


		<div class="col-sm-6 d-none d-sm-block">
			<img alt="" src="<?php echo base_url(); ?>assets/images/ambassador.png" style="max-width:100%;" />
		</div>
	</div>
</div>

<div class="margin-top-80"></div>

<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>

<script>
	function get_others() {
		$('#others').val('');
		$('#others_box').toggle();
	}
</script>