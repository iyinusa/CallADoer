<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	
	public function index() {
		
	}

	public function login() {
		$redir = $this->session->userdata('cds_redirect');
		
		if($_POST) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			if(!$email || !$password) {
				echo $this->Crud->msg('danger', 'All fields are required');
				die;
			} 

			$query = $this->Crud->read2('email', $email, 'password', md5($password), 'user');
			if(empty($query)) {$query = $this->Crud->read2('username', $email, 'password', md5($password), 'user');}
			if(empty($query)) {
				echo $this->Crud->msg('danger', 'Invalid Authentication');
			} else {
				foreach($query as $q) {
					if($q->activate == 0){
						echo $this->Crud->msg('info', 'Please activate your account');
						die;
					}

					$this->Crud->update('id', $q->id, 'user', array('status'=>1));

					//add data to session, Web login
					$s_data = array (
						'cds_id' => $q->id
					);
					$this->session->set_userdata($s_data);
					
					echo $this->Crud->msg('success', 'Login Successfully!');
				
					// redirect
					if($redir=='') {$redir = '';}
					echo '<script>window.location.replace("'.base_url($redir).'");</script>';
				}
			}
		}
	}

	public function register() {
		if($_POST) {
			$fullname = $this->input->post('fullname');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$confirm = $this->input->post('confirm');

			if(!$fullname || !$email || !$password || !$confirm) {
				echo $this->Crud->msg('danger', 'All fields are required');
				die;
			} 

			if($password != $confirm) {
				echo $this->Crud->msg('danger', 'Password not matched');
				die;
			}

			if($this->Crud->check('email', $email, 'user') > 0) {
				echo $this->Crud->msg('danger', 'Email already taken');
				die;
			}

			$verify_code = md5(time());
			$ins_data['fullname'] = $fullname;
			$ins_data['email'] = $email;
			$ins_data['username'] = time();
			$ins_data['password'] = md5($password);
			$ins_data['role'] = 'User';
			$ins_data['activation_code'] = $verify_code;
			$ins_data['reg_date'] = date(fdate);

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
				echo '<script>$("#reg_fullname,#reg_email,#reg_password,#reg_confirm").val("");</script>';
			} else {
				echo $this->Crud->msg('danger', 'Please try later');
			}
		}
	}

	public function logout() {
		// check login redirection
		if($this->session->userdata('cds_id')){
			$user_id = $this->session->userdata('cds_id');
			$up_data['status'] = 0;
			$this->Crud->update('id', $user_id, 'user', $up_data);
			$this->session->set_userdata('cds_id', '');
			$this->session->sess_destroy();
		}
		redirect(base_url());
	}

	public function change_status() {
		$log_id = $this->session->userdata('cds_id');
		$current = $this->Crud->read_field('id', $log_id, 'user', 'status');

		if($current == 1) {
			$status = 'offline';
			$data['status'] = 0;
		} else {
			$status = 'online';
			$data['status'] = 1;
		}

		$this->Crud->update('id', $log_id, 'user', $data);

		echo $status;
	}
}
