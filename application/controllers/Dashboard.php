<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

		if($log_role == 'Admin') {
			$jobs = $this->Crud->read('job');
			$reviews = $this->Crud->read('review');
			$bookmarks = $this->Crud->read('bookmark');
			$views = $this->Crud->read('view');
		} else if($log_role == 'Doer') {
			$jobs = $this->Crud->read_single('user_id', $log_id, 'job');
			$reviews = $this->Crud->read_single('user_id', $log_id, 'review');
			$bookmarks = $this->Crud->read_single('user_id', $log_id, 'bookmark');
			$views = $this->Crud->read_single('user_id', $log_id, 'view');
		} else {
			$jobs = $this->Crud->read_single('post_by', $log_id, 'job');
			$reviews = $this->Crud->read_single('rate_by', $log_id, 'review');
			$bookmarks = $this->Crud->read_single('book_by', $log_id, 'bookmark');
			$views = $this->Crud->read_single('user_id', $log_id, 'view');
		}

		// jobs count
		$jobs_total = count($jobs);
		$jobs_complete = 0;
		if(!empty($jobs)) {
			foreach($jobs as $job) {
				if(strtolower($job->status) == 'completed'){$jobs_complete += 1;}
			}
		}
		$data['jobs'] = $jobs_total;
		$data['jobs_complete'] = $jobs_complete;

		// reviews count
		$data['reviews'] = count($reviews);

		// bookmark count
		$data['bookmarks'] = count($bookmarks);

		// views count
		$month_views = 0;
		$jan=0; $feb=0; $mar=0; $apr=0; $may=0; $jun=0; $jul=0; $aug=0; $sep=0; $oct=0; $nov=0; $dec=0;
		if(!empty($views)) {
			foreach($views as $v) {
				if(date('M Y') == date('M Y', strtotime($v->reg_date))) {$month_views += 1;}
				if(date('Y') == date('Y', strtotime($v->reg_date))) {
					if(date('M', strtotime($v->reg_date)) == 'Jan') {$jan += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Feb') {$feb += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Mar') {$mar += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Apr') {$apr += 1;}
					if(date('M', strtotime($v->reg_date)) == 'May') {$may += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Jun') {$jun += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Jul') {$jul += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Aug') {$aug += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Sep') {$sep += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Oct') {$oct += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Nov') {$nov += 1;}
					if(date('M', strtotime($v->reg_date)) == 'Dec') {$dec += 1;}
				}
			}
		}
		
		$data['month_views'] = $month_views;
		$data['views_array'] = array($jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$dec);

		$data['fullname'] = $this->Crud->read_field('id', $log_id, 'user', 'fullname');

		$data['title'] =  'Dashboard | '.app_name;
		$data['page_active'] = 'dashboard';
		$data['page_dash'] = true;
		
		$this->load->view('designs/main_header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('designs/main_footer', $data);
	}

}
