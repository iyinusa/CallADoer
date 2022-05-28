<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
    }
	
	public function index() {

		// computed doer of the day
		$compute_it = true;
		$check_doer = $this->Crud->read('doer_day');
		if(!empty($check_doer)) {
			foreach($check_doer as $cd) {
				if(date('d M, Y') == date('d M, Y', strtotime($cd->reg_date))) {$compute_it = false; break;}
			}
		}
		if($compute_it == true) {
			$get_doer = $this->Crud->read_single_order('role', 'Doer', 'user', 'id', 'RANDOM', 1);
			if(!empty($get_doer)) {
				foreach($get_doer as $gd) {
					$this->Crud->create('doer_day', array('user_id'=>$gd->id, 'reg_date'=>date(fdate)));
				}
			}
		}
		$doer_of_day = '';
		if(!empty($check_doer)) {
			foreach($check_doer as $cd) {
				if(date('d M, Y') == date('d M, Y', strtotime($cd->reg_date))) {
					$doer_of_day = $this->doer_grid($cd->user_id, 'single');
					break;
				}
			}
		}
		$data['doer_of_day'] = $doer_of_day;
		
		// jobs count
		$jobs = $this->Crud->read('job');
		$jobs_total = count($jobs);
		$jobs_complete = 0;
		if(!empty($jobs)) {
			foreach($jobs as $job) {
				if(strtolower($job->status) == 'completed'){$jobs_complete += 1;}
			}
		}
		$data['jobs'] = $jobs_total;
		$data['jobs_complete'] = $jobs_complete;

		// doers count
		$doers = $this->Crud->read_single('role', 'Doer', 'user');
		$data['doers'] = count($doers);

		// categories
		$category_list = '';
		$categories = $this->Crud->read('category');
		if(!empty($categories)) {
			foreach($categories as $c) {
				$cat_img = 'assets/images/job-category-04.jpg';
				if(file_exists($c->img)) {$cat_img = $c->img;}

				// doers in category
				$cat_doer = number_format($this->db->from('user')->where('category', $c->id)->count_all_results());

				$category_list .= '
					<div class="col-xl-3 col-md-6">
						<a href="javascript:;" class="photo-box small" data-background-image="'.base_url($cat_img).'">
							<div class="photo-box-content">
								<h3>'.$c->name.'</h3>
								<span>'.$cat_doer.'</span>
							</div>
						</a>
					</div>
				';
			}
		}
		$data['category_list'] = $category_list;

		// highest rated doers
		$highest_rating = '';
		$used_id = array();
		$hr_count = 0;
		$high_rating = array();
		$high_rate = $this->Crud->doer_rating(10); // limit to 10 records
		if(!empty($high_rate)) {
			foreach($high_rate as $hr) {
				$nrate = $this->Crud->rating($hr->user_id);
				$high_rating[] = array('user_id'=>$hr->user_id, 'value'=>$nrate);
			}
			$high_rating = $this->Crud->array_sort($high_rating, 'value', SORT_DESC);
		}
		if(!empty($high_rating)) {
			foreach($high_rating as $hrr) {
				$user_id = $hrr['user_id'];
				$highest_rating .= $this->doer_grid($user_id);
				$used_id[] = $user_id;
				$hr_count += 1;
			}
		}
		// if rating not upto 10, get more random
		if($hr_count < 10) {
			$more_highest = $this->Crud->read_single('role', 'Doer', 'user');
			if(!empty($more_highest)) {
				foreach($more_highest as $mh) {
					if($hr_count >= 10) {break;}
					if(!in_array($mh->id, $used_id)) {
						$highest_rating .= $this->doer_grid($mh->id);
						$hr_count += 1;
					}
				}
			}
		}
		$data['highest_rating'] = $highest_rating;
	
		$data['title'] =  app_name.' | '.app_meta_desc;
		$data['page_active'] = 'main';
		
		$this->load->view('designs/main_header', $data);
		$this->load->view('main', $data);
		$this->load->view('designs/main_footer', $data);
	}

	function doer_grid($user_id, $type="grid") {
		$log_id = $this->session->userdata('cds_id');
		
		$grid = '';

		$username = $this->Crud->read_field('id', $user_id, 'user', 'username');
		$fullname = $this->Crud->read_field('id', $user_id, 'user', 'fullname');
		$user_img_id = $this->Crud->read_field('id', $user_id, 'user', 'img_id');
		$user_img = $this->Crud->read_field('id', $user_img_id, 'img', 'pics_small');
		if(!file_exists($user_img)) {$user_img = 'assets/images/avatar.png';}
		$category = $this->Crud->read_field('id', $user_id, 'user', 'category');
		$category = $this->Crud->category($category);
		if(strlen($category) > 25) {$category = substr($category, 0, 25);}
		$address = $this->Crud->read_field('id', $user_id, 'user', 'address');
		if($address){
			$address = explode(',', $address);
			if(!empty($address)){$address = $address[count($address)-1];}
		}
		$verified = $this->Crud->read_field('id', $user_id, 'user', 'verified');
		if($verified == 1) {$verified = '<div class="verified-badge"></div>';} else {$verified = '';}

		$taging = '';
		$tagline = $this->Crud->read_field('id', $user_id, 'user', 'tagline');
		if($tagline){$taging = $tagline;} else {$taging = $category;}

		$rating = $this->Crud->rating($user_id);

		// bookmark button
		$bookmark_btn = '';
		if($log_id != '') {
			if($log_id != $user_id) {
				if($this->Crud->check2('user_id', $user_id, 'book_by', $log_id, 'bookmark') > 0) {
					$bookmark_btn = '<span class="bookmark-icon bookmarked" data-book="'.$user_id.'"></span>';
				} else {
					$bookmark_btn = '<span class="bookmark-icon" data-book="'.$user_id.'"></span>';
				}
			}
		}

		if($type != 'grid') {$width = 'style="width:100%;"';} else {$width = '';}

		$grid = '
			<div class="freelancer" '.$width.'>
				<div class="freelancer-overview">
					<div class="freelancer-overview-inner">
						'.$bookmark_btn.'
						<div class="freelancer-avatar">
							'.$verified.'
							<a href="'.base_url('doer/'.$username).'"><img src="'.base_url($user_img).'" alt=""></a>
						</div>

						<div class="freelancer-name">
							<h4><a href="'.base_url('doer/'.$username).'">'.$fullname.' <img class="flag" src="'.base_url('assets/images/flags/ng.svg').'" alt="" title="Nigeria" data-tippy-placement="top"></a></h4>
							<span>'.$taging.'</span>
						</div>

						<div class="freelancer-rating">
							<div class="star-rating" data-rating="'.$rating.'"></div>
						</div>
					</div>
				</div>
				
				<div class="freelancer-details">
					<div class="freelancer-details-list">
						<ul>
							<li>Location <strong><i class="icon-material-outline-location-on"></i> '.$address.'</strong></li>
							<!-- <li>Rate <strong>&#8358;2,000/day</strong></li> -->
						</ul>
					</div>
					<a href="'.base_url('doer/'.$username).'" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
				</div>
			</div>
		';

		return $grid;
	}

}
