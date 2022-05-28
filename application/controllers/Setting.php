<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	
	public function index() {
		// check session login
		if($this->session->userdata('cds_id') == ''){
			$request_uri = uri_string();
			$this->session->set_userdata('cds_redirect', $request_uri);
			redirect(base_url());
		}

		$log_id = $this->session->userdata('cds_id');
		$log_role = $this->Crud->read_field('id', $log_id, 'user', 'role');
		$log_img_id = $this->Crud->read_field('id', $log_id, 'user', 'img_id');
		$log_img = $this->Crud->read_field('id', $log_img_id, 'img', 'pics_small');
		if(!file_exists($log_img)) {$log_img = 'assets/images/avatar.png';}

		$data['form_link'] = 'setting/update';

		$data['role'] = $log_role;
		$data['img'] = $log_img;
		$data['img_id'] = $log_img_id;
		$data['fullname'] = $this->Crud->read_field('id', $log_id, 'user', 'fullname');
		$data['username'] = $this->Crud->read_field('id', $log_id, 'user', 'username');
		$data['email'] = $this->Crud->read_field('id', $log_id, 'user', 'email');
		$data['phone'] = $this->Crud->read_field('id', $log_id, 'user', 'phone');
		$data['address'] = $this->Crud->read_field('id', $log_id, 'user', 'address');
		$data['categories'] = $this->Crud->read_field('id', $log_id, 'user', 'category');
		$data['tagline'] = $this->Crud->read_field('id', $log_id, 'user', 'tagline');
		$data['skill'] = $this->Crud->read_field('id', $log_id, 'user', 'skill');
		$data['bio'] = $this->Crud->read_field('id', $log_id, 'user', 'bio');

		$data['title'] =  'Setting | '.app_name;
		$data['page_active'] = 'setting';
		$data['page_dash'] = true;
		
		$this->load->view('designs/main_header', $data);
		$this->load->view('setting', $data);
		$this->load->view('designs/main_footer', $data);
	}

	public function update() {
		if($_POST) {
			$log_id = $this->session->userdata('cds_id');
			$log_email = $this->Crud->read_field('id', $log_id, 'user', 'email');
			$log_username = $this->Crud->read_field('id', $log_id, 'user', 'username');
			$log_role = $this->Crud->read_field('id', $log_id, 'user', 'role');

			if($log_id == '') {
				echo $this->Crud->msg('danger', 'Session Expired! - Please Log In');
			} else {
				$username = $this->input->post('username');
				$fullname = $this->input->post('fullname');
				$phone = $this->input->post('phone');
				$email = $this->input->post('email');
				$category = $this->input->post('category');
				$skill = $this->input->post('skill');
				$tagline = $this->input->post('tagline');
				$address = $this->input->post('address');
				$bio = $this->input->post('bio');
				$img_id = $this->input->post('img_id');
				$old_password = $this->input->post('old_password');
				$password = $this->input->post('password');
				$confirm = $this->input->post('confirm');

				if(!$username || !$fullname || !$email || !$address) {
					echo $this->Crud->msg('info', 'Username, Full Name, Email and Location are requied');
					die;
				}

				$email_owner = $this->Crud->read_field('email', $email, 'user', 'id');
				if(!empty($email_owner)) {
					if($email_owner != $log_id) {
						echo $this->Crud->msg('info', 'Email is taken by another');
						die;
					}
				}

				$username_owner = $this->Crud->read_field('username', $username, 'user', 'id');
				if(!empty($username_owner)) {
					if($username_owner != $log_id) {
						echo $this->Crud->msg('info', 'Username is taken by another');
						die;
					}
				}

				// try get coordinate
				$coor = $this->Crud->google_coordinate($address);
				if(!empty($coor)) {
					$upd_data['lat'] = $coor->lat;
					$upd_data['lng'] = $coor->lng;
				}

				//check pictures upload
				if($_FILES['pics']['name']){
					$path = 'assets/images/users/'.$log_id;
					$slug = '';
					$upload_image = $this->Crud->img_upload($log_id, $slug, $path);
					if($upload_image->id > 0) {
						$img_id = $upload_image->id;
					}
				}
				//end pictures upload

				$upd_data['username'] = $username;
				$upd_data['fullname'] = $fullname;
				$upd_data['phone'] = $phone;
				$upd_data['email'] = $email;
				$upd_data['address'] = $address;
				$upd_data['tagline'] = $tagline;
				$upd_data['bio'] = $bio;
				$upd_data['img_id'] = $img_id;

				if($log_role == 'Doer') {
					if(empty($category)) {
						echo $this->Crud->msg('info', 'Category can not be empty');
						die;
					}
					$upd_data['category'] = json_encode($category);
					if(!empty($skill)) {$upd_data['skill'] = json_encode($skill);}
				}

				$upd_rec = $this->Crud->update('id', $log_id, 'user', $upd_data);

				// for password check
				$upd_pass = 0;
				if(!empty($old_password) || !empty($password) || !empty($confirm)) {
					if(!$old_password || !$password || !$confirm) {
						echo $this->Crud->msg('info', 'Password Changing - Current Password, New Password and Repeat New Password are required');
						die;
					} else {
						if($this->Crud->check2('id', $log_id, 'password', md5($old_password), 'user') <= 0) {
							echo $this->Crud->msg('info', 'Current Password not correct');
						} else {
							if($password != $confirm) {
								echo $this->Crud->msg('info', 'Password not matched');
								die;
							}

							$upd_pass = $this->Crud->update('id', $log_id, 'user', array('password'=>md5($password)));
						}
					}
				}

				$msg = '';
				if($upd_rec > 0) {$msg = 'Record Updated. ';}
				if($upd_pass > 0) {$msg .= 'Password Changed';}
				
				if($msg) {
					echo $this->Crud->msg('success', $msg);
				} else {
					//echo $this->Crud->msg('danger', 'Oops! - Please try later');
				}
			}
		}
	}

}
