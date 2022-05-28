<div class="dashboard-headline">
	<h3>Bookmarks</h3>
</div>

<div class="row">
	<!-- Dashboard Box -->
	<div class="col-xl-12">
		<div class="dashboard-box margin-top-0">

			<!-- Headline -->
			<div class="headline">
				<h3><i class="icon-material-outline-face"></i> Bookmarked</h3>
			</div>

			<div class="content">
				<ul class="dashboard-box-list">
					<?php
						$book_list = '';
						if(!empty($bookmarked)) {
							foreach($bookmarked as $book) {
								$book_name = $this->Crud->read_field('id', $book->book_by, 'user', 'fullname');
								$book_role = $this->Crud->read_field('id', $book->book_by, 'user', 'role');
								$book_img_id = $this->Crud->read_field('id', $book->book_by, 'user', 'img_id');
								$book_img = $this->Crud->read_field('id', $book_img_id, 'img', 'pics_small');
								if(!file_exists($book_img)) {$book_img = 'assets/images/avatar.png';}

								$book_state = $this->Crud->read_field('id', $book->book_by, 'user', 'address');
								if($book_state){
									$book_state = explode(',', $book_state);
									if(!empty($book_state)){$book_state = $book_state[count($book_state)-1];}
								}
								if($book_state) {
									$book_state = '<li><i class="icon-material-outline-location-on"></i> '.$book_state.'</li>';
								} else {
									$book_state = '';
								}

								$time_ago = $this->Crud->time(strtotime($book->reg_date));

								$book_list .= '
									<li>
										<div class="job-listing">
											<div class="job-listing-details">
												<a href="#" class="job-listing-company-logo">
													<img src="'.base_url($book_img).'" alt="">
												</a>
												<div class="job-listing-description">
													<h3 class="job-listing-title"><a href="javascript:;">'.$book_name.'</a></h3>
													<div class="job-listing-footer">
														<ul>
															<li><i class="icon-material-outline-face"></i> '.$book_role.'</li>
															'.$book_state.'
															<li><i class="icon-material-outline-access-time"></i> '.$time_ago.'</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<!--
										<div class="buttons-to-right">
											<a href="#" class="button red ripple-effect ico" title="Remove" data-tippy-placement="left"><i class="icon-feather-trash-2"></i></a>
										</div>
										-->
									</li>
								';
							}
						}

						echo $book_list;
					?>
				</ul>
			</div>
		</div>
	</div>

	<!-- Dashboard Box -->
	<div class="col-xl-12">
		<div class="dashboard-box">

			<!-- Headline -->
			<div class="headline">
				<h3><i class="icon-material-outline-face"></i> Doers Bookmarked</h3>
			</div>

			<div class="content">
				<ul class="dashboard-box-list">
					<?php
						$da_list = '';
						if(!empty($bookmarks)) {
							foreach($bookmarks as $bs) {
								$user = $this->Crud->doer($bs->user_id);

								$da_list .= '
									<li>
										<div class="freelancer-overview">
											<div class="freelancer-overview-inner">
												<div class="freelancer-avatar">
													<div class="verified-badge"></div>
													<a href="'.base_url('doer/'.$user->username).'"><img src="'.base_url($user->img).'" alt=""></a>
												</div>

												<div class="freelancer-name">
													<h4><a href="'.base_url('doer/'.$user->username).'">'.$user->fullname.' <img class="flag" src="'.base_url('assets/images/flags/ng.svg').'" alt="" title="Nigeria" data-tippy-placement="top"></a></h4>
													<span>'.$user->taging.'</span>
													
													<div class="freelancer-rating">
														<div class="star-rating" data-rating="'.$user->rating.'"></div>
													</div>
												</div>
											</div>
										</div>

										<!--
										<div class="buttons-to-right">
											<a href="#" class="button red ripple-effect ico" title="Remove" data-tippy-placement="left"><i class="icon-feather-trash-2"></i></a>
										</div>
										-->
									</li>
								';
							}
						}
						echo $da_list;
					?>
				</ul>
			</div>
		</div>
	</div>

</div>
