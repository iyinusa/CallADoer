<div class="dashboard-headline">
	<h3>Settings</h3>
</div>

<?php echo form_open_multipart($form_link, array('id'=>'bb_ajax_form', 'clear'=>false)); ?>
<div class="row">
	<!-- Dashboard Box -->
	<div class="col-xl-12">
		<div class="dashboard-box margin-top-0">

			<!-- Headline -->
			<div class="headline">
				<h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
			</div>

			<div class="content with-padding padding-bottom-0">

				<div class="row">

					<div class="col-sm-4">
						<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
							<img class="profile-pic" src="<?php echo base_url($img); ?>" alt="" />
							<div class="upload-button"></div>
							<input type="hidden" name="img_id" value="<?php echo $img_id; ?>" />
							<input class="file-upload" type="file" name="pics" accept="image/*"/>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="row">

							<div class="col-xl-6">
								<div class="submit-field">
									<h5>Username</h5>
									<input type="text" class="with-border" name="username" value="<?php echo $username; ?>" required>
								</div>
							</div>

							<div class="col-xl-6">
								<div class="submit-field">
									<h5>Full Name</h5>
									<input type="text" class="with-border" name="fullname" value="<?php echo $fullname; ?>" required>
								</div>
							</div>

							<div class="col-xl-6">
								<div class="submit-field">
									<h5>Phone</h5>
									<input type="text" class="with-border" name="phone" value="<?php echo $phone; ?>">
								</div>
							</div>

							<div class="col-xl-6">
								<div class="submit-field">
									<h5>Email</h5>
									<input type="email" class="with-border" name="email" value="<?php echo $email; ?>" required>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Dashboard Box -->
	<div class="col-xl-12">
		<div class="dashboard-box">

			<!-- Headline -->
			<div class="headline">
				<h3><i class="icon-material-outline-face"></i> My Profile</h3>
			</div>

			<div class="content">
				<ul class="fields-ul">
					<?php if($role == 'Doer'){ ?>
					<li>
						<div class="row">
							<div class="col-xl-7">
								<div class="submit-field">
									<h5>Category</h5>
									
									<div class="row">
										<?php 
											$category = $this->Crud->read_order('category', 'name', 'asc');
											if(!empty($category)) {
												foreach($category as $cat) {
													$checked = '';
													if(!empty($categories)) {if(in_array($cat->id, json_decode($categories))){$checked = 'checked';}}
													
													echo '
														<div class="col-sm-6">
															<div class="checkbox">
																<input type="checkbox" name="category[]" id="chekcbox'.$cat->id.'" value="'.$cat->id.'" '.$checked.'>
																<label for="chekcbox'.$cat->id.'"><span class="checkbox-icon"></span> '.$cat->name.'&nbsp;&nbsp;</label>
															</div>
														</div>
													';
												}
											} 
										?>
									</div>
								</div>
							</div>

							<div class="col-xl-5">
								<div class="submit-field">
									<h5>Skills <i class="help-icon" data-tippy-placement="right" title="Add up your skills"></i></h5>

									<div class="keywords-container">
										<div class="keyword-input-container">
											<input type="text" class="keyword-input with-border" placeholder="e.g. PHP, PMP"/>
											<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
										</div>
										<div class="keywords-list">
											<?php 
												if(!empty($skill)) {
													foreach(json_decode($skill) as $key=>$value) {
														echo '
															<span class="keyword"><span class="keyword-remove"></span><span class="keyword-text"><input name="skill[]" type="checkbox" checked style="opacity: 0; position: absolute; left: 9999px;" value="'.$value.'" /> '.$value.'</span></span>
														';
													}
												} 
											?>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<?php } ?>

					<li>
						<div class="row">
							<div class="col-xl-6">
								<div class="submit-field">
									<h5>Tagline <i class="help-icon" data-tippy-placement="top" title="Max. 25 Character"></i></h5>
									<input type="text" class="with-border" name="tagline" maxlength="25" value="<?php echo $tagline; ?>" />
								</div>
							</div>

							<div class="col-xl-6">
								<div class="submit-field">
									<h5>Location</h5>
									<input id="<?php if(empty($address)){echo 'ilocation';} ?>" class="with-border" type="text" name="address" value="<?php echo $address; ?>" placeholder="<?php if(empty($address)){echo 'Enter Your Address';} ?>" required>
								</div>
							</div>

							<div class="col-xl-12">
								<div class="submit-field">
									<h5>Introduce Yourself</h5>
									<textarea name="bio" cols="30" rows="5" class="with-border"><?php echo $bio; ?></textarea>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Dashboard Box -->
	<div class="col-xl-12">
		<div id="test1" class="dashboard-box">

			<!-- Headline -->
			<div class="headline">
				<h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
			</div>

			<div class="content with-padding">
				<div class="row">
					<div class="col-xl-4">
						<div class="submit-field">
							<h5>Current Password</h5>
							<input type="password" class="with-border" name="old_password">
						</div>
					</div>

					<div class="col-xl-4">
						<div class="submit-field">
							<h5>New Password</h5>
							<input type="password" class="with-border" name="password">
						</div>
					</div>

					<div class="col-xl-4">
						<div class="submit-field">
							<h5>Repeat New Password</h5>
							<input type="password" class="with-border" name="confirm">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Button -->
	<div class="col-sm-12 text-center">
		<div class="col-sm-12"><div id="bb_ajax_msg"></div></div>
		<button type="submit" class="button ripple-effect big margin-top-30 bb_form_btn"><i class="icon-material-outline-check"></i> Save Changes</button>
	</div>

</div>
<?php echo form_close(); ?>

<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jsform.js"></script>
