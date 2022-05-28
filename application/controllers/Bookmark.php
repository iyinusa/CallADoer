<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmark extends CI_Controller {

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

		$data['bookmarked'] = $this->Crud->read_single('user_id', $log_id, 'bookmark');
		$data['bookmarks'] = $this->Crud->read_single('book_by', $log_id, 'bookmark');

		$data['title'] =  'Setting | '.app_name;
		$data['page_active'] = 'bookmark';
		$data['page_dash'] = true;
		
		$this->load->view('designs/main_header', $data);
		$this->load->view('bookmark', $data);
		$this->load->view('designs/main_footer', $data);
	}

}
