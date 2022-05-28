<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activate extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	
	public function index() {
		if($this->session->userdata('cds_id') != '') {
			redirect(base_url('dashboard'));
		}
		$this->hash();
	}

	public function hash($code='') {
		if($this->session->userdata('cds_id') != '') {
			redirect(base_url('dashboard'));
		}

		if(empty($code)) {
			redirect(base_url());
		} 

		$id = $this->Crud->read_field('activation_code', $code, 'user', 'id');
		if(empty($id)) {
			$data['icon'] = 'icon-line-awesome-close';
			$data['msg'] = 'Invalid Activation';
			$data['desc'] = 'Unable to Verify your Activation';
			$data['link'] = '<a href="'.base_url().'" class="button ripple-effect-dark button-sliding-icon margin-top-30">Continue <i class="icon-material-outline-arrow-right-alt"></i></a>';
		} else {
			if($this->Crud->read_field('id', $id, 'user', 'activate') == 1) {
				$data['icon'] = 'icon-feather-check';
				$data['msg'] = 'Already Activated';
				$data['desc'] = 'Your account is already Activated. Please click below to Log In';
				$data['link'] = '<a href="#sign-in-dialog" class="button popup-with-zoom-anim ripple-effect-dark button-sliding-icon margin-top-30">Log In <i class="icon-material-outline-arrow-right-alt"></i></a>';
			} else {
				if($this->Crud->update('id', $id, 'user', array('activate'=>1)) > 0) {
					$data['icon'] = 'icon-feather-check';
					$data['msg'] = 'Thank You!';
					$data['desc'] = 'Your account is now Activated. Please click below to Log In';
					$data['link'] = '<a href="#sign-in-dialog" class="button popup-with-zoom-anim ripple-effect-dark button-sliding-icon margin-top-30">Log In <i class="icon-material-outline-arrow-right-alt"></i></a>';
				} else {
					$data['icon'] = 'icon-line-awesome-close';
					$data['msg'] = 'Activation Failed';
					$data['desc'] = 'Unable to Verify your Activation. Please try later or contact support';
					$data['link'] = '<a href="'.base_url().'" class="button ripple-effect-dark button-sliding-icon margin-top-30">Continue <i class="icon-material-outline-arrow-right-alt"></i></a>';
				}
				
			}
		}

		$data['title'] =  'Activate Account | '.app_name;
		$data['page_active'] = 'activate';
		
		$this->load->view('designs/main_header', $data);
		$this->load->view('activate', $data);
		$this->load->view('designs/main_footer', $data);
	}

}
