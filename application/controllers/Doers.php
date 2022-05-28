<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Doers extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	
	public function index() {

		if($_POST) {
			$data['location'] = $this->input->post('location');
			$data['keyword'] = $this->input->post('keywords');
		}
	
		$data['title'] =  'Doers | '.app_name;
		$data['page_active'] = 'doer';
		
		$this->load->view('designs/main_header', $data);
		$this->load->view('doer/all', $data);
		$this->load->view('designs/main_footer', $data);
	}

	public function directory($limit='', $offset='') {
		$log_id = $this->session->userdata('cds_id');
		$rec_limit = 9;
		$item = '';

		if($limit == '') {$limit = $rec_limit;}
		if($offset == '') {$offset = 0;}

		$search = $this->input->get('search');
		$location = $this->input->get('location');
		$categories = $this->input->get('category');

		if($search == 'null'){$search = '';}
		if($categories == 0 || $categories == 'undefined'){$categories = '';} else {$categories = str_replace(',','-',$categories);}

		$query = $this->Crud->filter_doer($limit, $offset, $search, $categories);
		$count = count($this->Crud->filter_doer('', '', $search, $categories));

		if(!empty($query)) {
			foreach($query as $q) {
				$user_id = $q->id;
				$username = $q->username;
				$fullname = $q->fullname;
				$user_img_id = $q->img_id;
				$user_img = $this->Crud->read_field('id', $user_img_id, 'img', 'pics_small');
				if(!file_exists($user_img)) {$user_img = 'assets/images/avatar.png';}
				$category = $q->category;
				$category = $this->Crud->category($category);
				if(strlen($category) > 25) {$category = substr($category, 0, 25);}
				$address = $q->address;
				if($address){
					$address = explode(',', $address);
					if(!empty($address)){$address = $address[count($address)-1];}
				}
				$verified = $q->verified;
				if($verified == 1) {$verified = '<div class="verified-badge"></div>';} else {$verified = '';}

				$taging = '';
				$tagline = $q->tagline;
				if($tagline){$taging = $tagline;} else {$taging = $category;}

				$rating = $this->Crud->rating($user_id);

				// get distance
				if($location && $q->address) {
					$distance = $this->Crud->google_distance($location, $q->address);
				} else {
					$distance = '0km';
				}

				// get duration
				//$duration = $this->Crud->google_distance($source, $address, 'duration');

				$item .= '
					<div class="freelancer">
						<div class="freelancer-overview">
							<div class="freelancer-overview-inner">
								<span class="bookmark-icon"></span>

								<div class="freelancer-avatar">
									'.$verified.'
									<a href="'.base_url('doer/'.$username).'"><img src="'.base_url($user_img).'" alt=""></a>
								</div>
								
								<div class="freelancer-name">
									<h4><a href="'.base_url('doer/'.$username).'">'.$fullname.' <img class="flag" src="'.base_url('assets/images/flags/ng.svg').'" alt="" title="Nigeria" data-tippy-placement="top"></a></h4>
									<span>'.$taging.'</span>
									
									<div class="freelancer-rating">
										<div class="star-rating" data-rating="'.$rating.'"></div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>Distance <strong><i class="icon-material-outline-my-location"></i> '.$distance.'</strong></li>
									<li>Location <strong><i class="icon-material-outline-location-on"></i> '.$address.'</strong></li>
								</ul>
							</div>
							<a href="'.base_url('doer/'.$username).'" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
				';
			}
		}

		$resp['item'] = '<div class="freelancers-container freelancers-list-layout">'.$item.'</div>';

		$more_record = $count - ($offset + $rec_limit);
		$resp['left'] = $more_record;

		if($count > ($offset + $rec_limit)) { // for load more records
			$resp['limit'] = $rec_limit;
			$resp['offset'] = $offset + $limit;
			$resp['more'] = 'yes';
		} else {
			$resp['limit'] = $rec_limit;
			$resp['offset'] = 1;
			$resp['more'] = 'no';
		}

		echo json_encode($resp);
	}

	public function view($user) {
		$request_uri = uri_string();
		$this->session->set_userdata('cds_redirect', $request_uri);

		$log_id = $this->session->userdata('cds_id');

		if(!$user) {
			redirect(base_url('doers'));
		} else {
			$user_id = $this->Crud->read_field('username', $user, 'user', 'id');
			$this->session->set_userdata('book_user', $user_id);
			$role = $this->Crud->read_field('id', $user_id, 'user', 'role');
			if($this->Crud->check('id', $user_id, 'user') <= 0 || $role != 'Doer') {
				redirect(base_url('doers'));
			} else {
				$username = $this->Crud->read_field('id', $user_id, 'user', 'username');
				$fullname = $this->Crud->read_field('id', $user_id, 'user', 'fullname');
				$bio = $this->Crud->read_field('id', $user_id, 'user', 'bio');
				$user_img_id = $this->Crud->read_field('id', $user_id, 'user', 'img_id');
				$user_img = $this->Crud->read_field('id', $user_img_id, 'img', 'pics_small');
				if(!file_exists($user_img)) {$user_img = 'assets/images/avatar.png';}
				$skill = $this->Crud->read_field('id', $user_id, 'user', 'skill');
				$category = $this->Crud->read_field('id', $user_id, 'user', 'category');
				$category = $this->Crud->category($category);
				// if(strlen($category) > 25) {$category = substr($category, 0, 25);}
				$address = $this->Crud->read_field('id', $user_id, 'user', 'address');
				if($address){
					$address = explode(',', $address);
					if(!empty($address)){$address = $address[count($address)-1];}
				}
				$verified = $this->Crud->read_field('id', $user_id, 'user', 'verified');
				if($verified == 1) {$verified = '<div class="verified-badge-with-title">Verified</div>';} else {$verified = '';}

				$taging = '';
				$tagline = $this->Crud->read_field('id', $user_id, 'user', 'tagline');
				if($tagline){$taging = $tagline;} else {$taging = $category;}

				$rating = $this->Crud->rating($user_id);

				$recommend = number_format(($rating / 5) * 100);

				// job completion status
				$total_jobs = count($this->Crud->read_single('user_id', $user_id, 'job'));
				$complete_jobs = count($this->Crud->read2('user_id', $user_id, 'status', 'completed', 'job'));
				if($total_jobs > 0) {
					$complete = number_format(($complete_jobs / $total_jobs) * 100);
				} else {$complete = 0;}

				$data['user_id'] = $user_id;
				$data['fullname'] = $fullname;
				$data['bio'] = $bio;
				$data['user_img'] = $user_img;
				$data['category'] = $category;
				$data['skill'] = $skill;
				$data['address'] = $address;
				$data['full_address'] = $this->Crud->read_field('id', $user_id, 'user', 'address');
				$data['verified'] = $verified;
				$data['taging'] = $taging;
				$data['rating'] = $rating;
				$data['recommend'] = $recommend;
				$data['complete'] = $complete;
				
				$data['log_id'] = $log_id;
			}
		}
	
		$data['title'] =  $fullname.' | '.app_name;
		$data['page_active'] = 'doer';
		
		$this->load->view('designs/main_header', $data);
		$this->load->view('doer/view', $data);
		$this->load->view('designs/main_footer', $data);
	}

	public function bookmark($buser = '') {
		$user_id = $this->session->userdata('cds_id');
		$book_user = $this->session->userdata('book_user');

		if($buser != '') {$book_user = $buser;}
		
		if($user_id && $book_user) {
			$booked = $this->Crud->read_field2('user_id', $book_user, 'book_by', $user_id, 'bookmark', 'id');

			if(!empty($booked)) {
				$this->Crud->delete('id', $booked, 'bookmark');
			} else {
				$book_data['user_id'] = $book_user;
				$book_data['book_by'] = $user_id;
				$book_data['reg_date'] = date(fdate);

				$this->Crud->create('bookmark', $book_data);
			}
		}
	}

	public function review_directory($limit='', $offset='') {
		$log_id = $this->session->userdata('cds_id');
		$book_user = $this->session->userdata('book_user');
		$rec_limit = 5;
		$item = '';

		if($limit == '') {$limit = $rec_limit;}
		if($offset == '') {$offset = 0;}

		$query = $this->Crud->read_single('user_id', $book_user, 'review', $limit, $offset);
		$count = count($this->Crud->read_single('user_id', $book_user, 'review'));
		if(!empty($query)) {
			foreach($query as $q) {
				$id = $q->id;
				$rate_by = $q->rate_by;
				$rate_value = $q->value;
				$comment = $q->comment;
				$reg_date = date('d M, Y', strtotime($q->reg_date));

				$rate_name = $this->Crud->read_field('id', $rate_by, 'user', 'fullname');
				if(!$rate_name){$rate_name = 'Anonymous';}

				$item .= '
					<li>
						<div class="boxed-list-item">
							<div class="item-content">
								<h4> <span>Rated by <b>'.$rate_name.'</b></span></h4>
								<div class="item-details margin-top-10">
									<div class="star-rating" data-rating="'.$rate_value.'"></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> '.$reg_date.'</div>
								</div>
								<div class="item-description">
									<p>'.$comment.'</p>
								</div>
							</div>
						</div>
					</li>
				';
			}
		}

		$resp['item'] = '<ul class="boxed-list-ul">'.$item.'</ul>';

		$more_record = $count - ($offset + $rec_limit);
		$resp['left'] = $more_record;

		if($count > ($offset + $rec_limit)) { // for load more records
			$resp['limit'] = $rec_limit;
			$resp['offset'] = $offset + $limit;
			$resp['more'] = 'yes';
		} else {
			$resp['limit'] = $rec_limit;
			$resp['offset'] = 1;
			$resp['more'] = 'no';
		}

		echo json_encode($resp);
	}

	public function review() {
		$user_id = $this->session->userdata('cds_id');
		$book_user = $this->session->userdata('book_user');
		
		if($user_id && $book_user) {
			if($_POST) {
				$status = '';
				$msg = '';

				$rate = $this->input->post('rate');
				$rate_msg = $this->input->post('rate_msg');

				if(!$rate || $rate == 'undefined' || !$rate_msg) {
					$status = 'error';
					$msg = $this->Crud->msg('danger', 'Please Rate and Type Review');
				} else {
					if($this->Crud->check3('user_id', $book_user, 'rate_by', $user_id, 'comment', $rate_msg, 'review') > 0) {
						$status = 'success';
						$msg = $this->Crud->msg('info', 'Review already posted');
					} else {
						$rate_data['user_id'] = $book_user;
						$rate_data['rate_by'] = $user_id;
						$rate_data['value'] = $rate;
						$rate_data['comment'] = $rate_msg;
						$rate_data['reg_date'] = date(fdate);

						if($this->Crud->create('review', $rate_data) > 0) {
							$status = 'success';
							$msg = $this->Crud->msg('success', 'Thank You! - Review Posted');
						} else {
							$status = 'error';
							$msg = $this->Crud->msg('success', 'Oops! - Please try later');
						}
					}
				}

				echo json_encode(array('status'=>$status, 'msg'=>$msg));
			}
		}
	}

	public function req_login() {
		if($_POST) {
			$status = '';
			$msg = '';

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			if(!$email || !$password) {
				$status = 'error';
				$msg = $this->Crud->msg('danger', 'All fields are required');
			} else {
				$id = $this->Crud->read_field2('email', $email, 'password', md5($password), 'user', 'id');
				if(empty($id)) {
					$id = $this->Crud->read_field2('username', $email, 'password', md5($password), 'user', 'id');
				}

				if($id) {
					$this->Crud->update('id', $id, 'user', array('status'=>1));
					//add data to session, Web login
					$s_data = array (
						'cds_id' => $id
					);
					$this->session->set_userdata($s_data);

					$status = 'success';
					$msg = $this->Crud->msg('success', 'Authentication Passed');
				} else {
					$status = 'error';
					$msg = $this->Crud->msg('danger', 'Authentication Failed');
				}
			}

			echo json_encode(array('status'=>$status, 'msg'=>$msg));
		}
	}

	public function request_service() {
		$user_id = $this->session->userdata('cds_id');
		$book_user = $this->session->userdata('book_user');

		if($_POST) {
			$type = $this->input->post('type');
			$title = $this->input->post('title');
			$detail = $this->input->post('detail');

			if(!$title || !$detail) {
				$status = 'error';
				$msg = $this->Crud->msg('danger', 'All fields are required');
			} else {
				if($type == 'new') {
					$name = $this->input->post('name');
					$email = $this->input->post('email');
					$pass = $this->input->post('pass');
					$phone = $this->input->post('phone');
					$location = $this->input->post('location');

					if(!$name || !$email || !$pass || !$phone || !$location) {
						$status = 'error';
						$msg = $this->Crud->msg('danger', 'All fields are required');
					} else {
						if($this->Crud->check('email', $email, 'user') > 0) {
							$status = 'error';
							$msg = $this->Crud->msg('danger', 'Email already taken by another');
						} else {
							$verify_code = md5(time());
							$ins_data['fullname'] = $name;
							$ins_data['email'] = $email;
							$ins_data['phone'] = $phone;
							$ins_data['address'] = $location;
							$ins_data['username'] = time();
							$ins_data['password'] = md5($pass);
							$ins_data['role'] = 'User';
							$ins_data['activation_code'] = $verify_code;
							$ins_data['reg_date'] = date(fdate);

							// try get coordinate
							$coor = $this->Crud->google_coordinate($location);
							if(!empty($coor)) {
								$ins_data['lat'] = $coor->lat;
								$ins_data['lng'] = $coor->lng;
							}

							$user_id = $this->Crud->create('user', $ins_data);
							if($user_id > 0) {
								// push email
								if($email) {
									$verify_link = base_url('activate/hash/'.$verify_code);
									$admin_email = app_email;
									$subject = 'VERIFICATION';
									$subhead = 'Please Verify Email';
									$body_msg = '
										<div class="mname">Dear '.$name.',</div><br/> 
										Thanks for registering on '.app_name.'. Please verify your email by clicking on the link below:<br/></br>
										<a href="'.$verify_link.'">'.$verify_link.'</a><br/></br>
										Regards.
									';
									$this->Crud->send_email($email, $admin_email, $subject, $body_msg, app_name, $subhead);
								}
							} 
						}
					}
				} 

				if($user_id) {
					$job_data['user_id'] = $book_user;
					$job_data['post_by'] = $user_id;
					$job_data['title'] = $title;
					$job_data['details'] = $detail;
					$job_data['status'] = 'pending';
					$job_data['reg_date'] = date(fdate);
					if($this->Crud->create('job', $job_data) > 0) {
						$status = 'success';
						$msg = $this->Crud->msg('success', 'Your Request has been sent.');

						// push email to Doer
						$d_email = $this->Crud->read_field('id', $book_user, 'user', 'email');
						$d_name = $this->Crud->read_field('id', $book_user, 'user', 'fullname');
						if($d_email) {
							$admin_email = app_email;
							$subject = 'JOB REQUEST';
							$subhead = 'You Have A New Request';
							$body_msg = '
								<div class="mname">Dear '.$name.',</div><br/> 
								Thanks for registering on '.app_name.'. Please verify your email by clicking on the link below:<br/></br>
								<a href="'.$verify_link.'">'.$verify_link.'</a><br/></br>
								Regards.
							';
							$this->Crud->send_email($d_email, $admin_email, $subject, $body_msg, app_name, $subhead);
						}
					} else {
						$status = 'error';
						$msg = $this->Crud->msg('danger', 'Oops! - Please try later');
					}
				}
			}

			echo json_encode(array('status'=>$status, 'msg'=>$msg));
		}
	} 

}
