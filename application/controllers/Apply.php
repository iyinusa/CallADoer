<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	
	public function index() {
		if($this->session->userdata('cds_id') != '') {
			redirect(base_url('dashboard'));
		}

		$data['form_link'] = 'apply/form';
		$data['title'] =  'Become A Doer | '.app_name;
		$data['page_active'] = 'apply';
		
		$this->load->view('designs/main_header', $data);
		$this->load->view('apply', $data);
		$this->load->view('designs/main_footer', $data);
	}

	public function form() {
		if($_POST) {
			$fullname = $this->input->post('fullname');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$location = $this->input->post('location');
			$category = $this->input->post('category');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if(!$fullname || !$phone || !$email || !$location || !$username || !$password || empty($category)) {
				echo $this->Crud->msg('warning', 'All fields are required');
			} else {
				if($this->Crud->check('email', $email, 'user') > 0) {
					echo $this->Crud->msg('danger', 'Email already taken');
				} else if($this->Crud->check('username', $username, 'user') > 0) {
					echo $this->Crud->msg('danger', 'Username already taken');
				} else {
					// check if other category check
					$check_others = $this->input->post('check_others');
					if($check_others) {
						$other_name = $this->input->post('others');
						if($this->Crud->check('name', $other_name, 'category') > 0) {
							$other_id = $this->Crud->read_field('name', $other_name, 'category', 'id');
						} else {
							$other_id = $this->Crud->create('category', array('name'=>$other_name, 'img'=>'assets/images/job-category-03.jpg'));
						}
						$category[] = $other_id;
					}

					$verify_code = md5(time());
					$ins_data['fullname'] = $fullname;
					$ins_data['phone'] = $phone;
					$ins_data['email'] = $email;
					$ins_data['address'] = $location;
					$ins_data['category'] = json_encode($category);
					$ins_data['username'] = $username;
					$ins_data['password'] = md5($password);
					$ins_data['role'] = 'Doer';
					$ins_data['activation_code'] = $verify_code;
					$ins_data['reg_date'] = date(fdate);

					// try get coordinate
					$coor = $this->Crud->google_coordinate($location);
					if(!empty($coor)) {
						$ins_data['lat'] = $coor->lat;
						$ins_data['lng'] = $coor->lng;
					}

					$ins_id = $this->Crud->create('user', $ins_data);
					if($ins_id > 0) {
						// push email
						if($email) {
							$verify_link = base_url('activate/hash/'.$verify_code);
							$admin_email = app_email;
							$subject = 'VERIFICATION';
							$subhead = 'Please Verify Email';
							$body_msg = '
								<div class="mname">Dear '.$fullname.',</div><br/> 
								Thanks for registering on '.app_name.'. Please verify your email by clicking on the link below:<br/></br>
								<a href="'.$verify_link.'">'.$verify_link.'</a><br/></br>
								Regards.
							';
							$this->Crud->send_email($email, $admin_email, $subject, $body_msg, app_name, $subhead);
						}
						echo $this->Crud->msg('success', 'Thank you! Please check your INBOX or SPAM to activate account.');
						echo '<script>$("#bb_ajax_form").get(0).reset();</script>';
					} else {
						echo $this->Crud->msg('danger', 'Please try later');
					}
				}
			}
			
			die;
		}
	}

}
