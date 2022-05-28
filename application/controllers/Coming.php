<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coming extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	
	public function index() {
	
		$data['title'] =  app_name;
		$data['page_active'] = 'coming';
		
		$this->load->view('coming', $data);
	}

	public function subscribe() {
		$email = $this->input->get('email');
		if($email) {
			if($this->Crud->check('email', $email, 'subscribe') <= 0) {
				$this->Crud->create('subscribe', array('email'=>$email, 'reg_date'=>date(fdate)));
			}
		}
	}

}
