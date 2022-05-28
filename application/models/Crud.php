<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    ////////////////// CLEAR CACHE ///////////////////
	public function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	//////////////////// C - CREATE ///////////////////////
	public function create($table, $data) {
		$this->db->insert($table, $data);
		return $this->db->insert_id();	
	}
	
	//////////////////// R - READ /////////////////////////
	public function read($table, $limit='', $offset='') {
		$query = $this->db->order_by('id', 'DESC');
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_order($table, $field, $type, $limit='', $offset='') {
		$query = $this->db->order_by($field, $type);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_group($table, $field) {
		$query = $this->db->group_by($field);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_single($field, $value, $table, $limit='', $offset='') {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_single_order($field, $value, $table, $or_field, $or_value, $limit='', $offset='') {
		$query = $this->db->order_by($or_field, $or_value);
		$query = $this->db->where($field, $value);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_single_reverse($field, $value, $table) {
		$query = $this->db->order_by('id', 'ASC');
		$query = $this->db->where($field, $value);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_field($field, $value, $table, $call) {
		$return_call = '';
		$getresult = $this->read_single($field, $value, $table);
		if(!empty($getresult)) {
			foreach($getresult as $result)  {
				$return_call = $result->$call;
			}
		}
		return $return_call;
	}
	
	public function read_field2($field, $value, $field2, $value2, $table, $call) {
		$return_call = '';
		$getresult = $this->read2($field, $value, $field2, $value2, $table);
		if(!empty($getresult)) {
			foreach($getresult as $result)  {
				$return_call = $result->$call;
			}
		}
		return $return_call;
	}
	
	public function read2($field, $value, $field2, $value2, $table, $limit='', $offset='') {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read3($field, $value, $field2, $value2, $field3, $value3, $table, $limit='', $offset='') {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->where($field3, $value3);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read2_order($field, $value, $field2, $value2, $table, $fd, $type) {
		$query = $this->db->order_by($fd, $type);
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read3_order($field, $value, $field2, $value2, $field3, $value3, $table, $fd, $type) {
		$query = $this->db->order_by($fd, $type);
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->where($field3, $value3);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function check($field, $value, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	public function check2($field, $value, $field2, $value2, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	public function check3($field, $value, $field2, $value2, $field3, $value3, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->where($field3, $value3);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	public function read_date($start, $end, $table) {
		$query = $this->db->where('report_date >=', $start);
		$query = $this->db->where('report_date <=', $end);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function read_date_data($field, $value, $date_field, $start, $end, $table) {
		$query = $this->db->where($field, $value);
		$query = $this->db->where($date_field.' >=', $start);
		$query = $this->db->where($date_field.' <=', $end);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function check_date_field($field, $value, $date, $table) {
		$query = $this->db->where($field, $value);
		$query = $this->db->where('start_date <=', $date);
		$query = $this->db->where('end_date >=', $date);
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function read_like($field, $value, $table, $limit='', $offset='') {
		$query = $this->db->like($field, $value);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_like2($field, $value, $field2, $value2, $table, $limit='', $offset='') {
		$query = $this->db->like($field, $value);
		$query = $this->db->or_like($field2, $value2);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_like3($field, $value, $field2, $value2, $field3, $value3, $table, $limit='', $offset='') {
		$query = $this->db->like($field, $value);
		$query = $this->db->or_like($field2, $value2);
		$query = $this->db->or_like($field3, $value3);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	//////////////////// U - UPDATE ///////////////////////
	public function update($field, $value, $table, $data) {
		$this->db->where($field, $value);
		$this->db->update($table, $data);
		return $this->db->affected_rows();	
	}
	
	//////////////////// D - DELETE ///////////////////////
	public function delete($field, $value, $table) {
		$this->db->where($field, $value);
		$this->db->delete($table);
		return $this->db->affected_rows();	
	}
	//////////////////// END DATABASE CRUD ///////////////////////
	
	//////////////////// DATATABLE AJAX CRUD ///////////////////////
	public function datatable_query($table, $column_order, $column_search, $order, $where='') {
		// where clause
		if(!empty($where)) {
			$this->db->where(key($where), $where[key($where)]);
		}
		
		$this->db->from($table);
 
		// here combine like queries for search processing
		$i = 0;
		if($_POST['search']['value']) {
			foreach($column_search as $item) {
				if($i == 0) {
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				
				$i++;
			}
		}
		 
		// here order processing
		if(isset($_POST['order'])) { // order by click column
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if(isset($this->order)) { // order by default defined
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
 
	public function datatable_load($table, $column_order, $column_search, $order, $where='') {
		$this->datatable_query($table, $column_order, $column_search, $order, $where);
		
		if($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		
		$query = $this->db->get();
		return $query->result();
	}
 
	public function datatable_filtered($table, $column_order, $column_search, $order, $where='') {
		$this->datatable_query($table, $column_order, $column_search, $order, $where);
		$query = $this->db->get();
		return $query->num_rows();
	}
 
	public function datatable_count($table, $where='') {
		$this->db->select("*");
		
		// where clause
		if(!empty($where)) {
			$this->db->where(key($where), $where[key($where)]);
		}
		
		$this->db->from($table);
		return $this->db->count_all_results();
	} 
	//////////////////// END DATATABLE AJAX CRUD ///////////////////
	
	//////////////////// NOTIFICATION CRUD ///////////////////////
	public function msg($type = '', $text = ''){
		$msg = '';

		if($type == 'success') {
			$icon = 'icon-feather-check-circle';
		} else if($type == 'info') {
			$icon = 'icon-feather-info';
			$type = 'notice';
		} else if($type == 'warning') {
			$icon = 'icon-line-awesome-warning';
		} else if($type == 'danger') {
			$icon = 'icon-line-awesome-close';
			$type = 'error';
		}

		$msg = '
			<div class="notification '.$type.' closeable">
				<p><i class="'.$icon.'"></i> '.$text.'</p>
				<a class="close"></a>
			</div>
		';

		return $msg;	
	}
	//////////////////// END NOTIFICATION CRUD ///////////////////////
	
	//////////////////// EMAIL CRUD ///////////////////////
	public function send_email($to, $from, $subject, $body_msg, $name, $subhead) {
		//clear initial email variables
		$this->email->clear(); 
		$email_status = '';
		
		$this->email->to($to);
		$this->email->from($from, $name);
		$this->email->subject($subject);
						
		$mail_data = array('message'=>$body_msg, 'subhead'=>$subhead);
		$this->email->set_mailtype("html"); //use HTML format
		$mail_design = $this->load->view('designs/email_template', $mail_data, TRUE);
				
		$this->email->message($mail_design);
		if(!$this->email->send()) {
			$email_status = FALSE;
		} else {
			$email_status = TRUE;
		}
		
		$this->email->clear();
		return $email_status;
	}
	//////////////////// END EMAIL CRUD ///////////////////////
	
	//////////////////// SMS CRUD ///////////////////////
	public function get_credit() {
		$token = '';
		$api_link = 'https://www.bulksmsnigeria.com/api/v2/balance/get?api_token='.$token;
		$result = file_get_contents($api_link);
		return $result;
	}

	public function sms_send($sender = '', $recipient = '', $message = '') {
		// create a new cURL resource
		$curl = curl_init();
		
		$token = '';
		$api_link = 'https://www.bulksmsnigeria.com/api/v1/sms/create?';
		
		//$curl_data = $api_link.'api_token='.$token.'&from='.$sender.'&to='.$recipient.'&body='.$message;
		$curl_data = array('api_token'=>$token, 'from'=>$sender, 'to'=>$recipient, 'body'=>$message);
		
		$chead = array();
		//$chead[] = 'Content-Type: application/json';

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	//////////////////// END SMS CRUD ///////////////////////
	
	//////////////////// PAYMENT API CRUD ///////////////////////
	public function pay_sandbox($link) {
		//$api = 'https://moneywave.herokuapp.com/'.$link;
		$api = 'https://live.moneywaveapi.co/'.$link;
		return $api;
	}
	
	public function pay_token() {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/merchant/verify');
		$api_key = 'lv_MU8LU5H4LD70BDO0CGKZ';
		$api_secret = 'lv_K3EGMVKB86039IYYLDS7MU32RMLURD';
		$curl_data = array('apiKey'=>$api_key, 'secret'=>$api_secret);
		$curl_data = json_encode($curl_data);
		
		$chead = array();
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_post($endpoint, $token, $data) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox($endpoint);
		$curl_data = json_encode($data);
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	
	}
	
	public function pay_getbank($code, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		if($code == 'NGN') {
			$api_link = 'https://live.moneywaveapi.co/banks';
		} else {
			$api_link = 'https://live.moneywaveapi.co/banks?country='.$code;	
		}
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_validate($acc_no, $bank_code, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/resolve/account');
		$curl_data = array('account_number'=>$acc_no, 'bank_code'=>$bank_code);
		$curl_data = json_encode($curl_data);
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_card_to_wallet($firstname, $lastname, $phonenumber, $email, $card_no, $cvv, $expiry_year, $expiry_month, $amount, $fee, $currency, $redirecturl, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/transfer');
		$recipient = 'wallet';
		$apiKey = 'ts_JFVEN8X6FPE166YGBC88';
		$medium = 'web';
		
		$curl_data = array('firstname'=>$firstname, 'lastname'=>$lastname, 'phonenumber'=>$phonenumber, 'email'=>$email, 'recipient'=>$recipient, 'card_no'=>$card_no, 'cvv'=>$cvv, 'expiry_year'=>$expiry_year, 'expiry_month'=>$expiry_month, 'apiKey'=>$apiKey, 'amount'=>$amount, 'fee'=>$fee, 'redirecturl'=>$redirecturl, 'medium'=>$medium, 'chargeCurrency'=>$currency);
		$curl_data = json_encode($curl_data);
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_verify($id, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/transfer/'.$id);
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_wallet_to_account($amount, $bankcode, $accountNumber, $currency, $senderName, $token) {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		$api_link = $this->pay_sandbox('v1/disburse');
		$lock = 'tehilah#12';
		
		$curl_data = array('lock'=>$lock, 'amount'=>$amount, 'bankcode'=>$bankcode, 'accountNumber'=>$accountNumber, 'currency'=>$currency, 'senderName'=>$senderName);
		$curl_data = json_encode($curl_data);
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_wallet_balance($token) {
		// create a new cURL resource
		$curl = curl_init();
		
		$curl_data = array('name'=>'Wallet');
		$curl_data = json_encode($curl_data);

		// parameters
		$api_link = $this->pay_sandbox('v1/wallet');
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
		//curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	public function pay_wallet_transaction($ref, $token) {
		// create a new cURL resource
		$curl = curl_init();
		
		$curl_data = array('ref'=>$ref);
		$curl_data = json_encode($curl_data);

		// parameters
		$api_link = $this->pay_sandbox('v1/disburse/status');
		
		$chead = array();
		$chead[] = 'Authorization: '.$token;
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Content-Length: '.strlen($curl_data);

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	//////////////////// END PAYMENT API CRUD ///////////////////////
	
	//////////////////// RavePAY CRUD ///////////////////////
	public function rave_key($server, $type) {
		$key = '';
		if($server == 'test') {
			if($type == 'public') {
				$key = 'FLWPUBK-dec2f656b3c2d47c84298707c7350f1c-X';
			} else if($type == 'secret') {
				$key = 'FLWSECK-82137be3ef8863dac5a8043b6ae78843-X';
			}
		} else if($server == 'live') {
			if($type == 'public') {
				$key = 'FLWPUBK-e0a0d9e617caaa7b4242765fde2dc108-X';
			} else if($type == 'secret') {
				$key = 'FLWSECK-278a17f95e3bc8246c53ae1c076a9e93-X';
			}
		}
		
		return $key;
	}
	
	public function rave_verify($data, $server='') {
		// create a new cURL resource
		$curl = curl_init();

		// parameters
		if($server == 'live') {
			$api_link = 'https://api.ravepay.co/flwv3-pug/getpaidx/api/verify';
		} else {
			$api_link = 'http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/verify';
		}
		$curl_data = json_encode($data);
		
		$chead = array();
		$chead[] = 'Content-Type: application/json';

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	
	}
	//////////////////// END RavePAY API CRUD ///////////////////////

	//////////////////// IMAGE CRUD ///////////////////////
	public function img_upload($log_id, $name, $path) {
		$img_id = 0;
		$stamp = $name;
		$save_path = '';
		$msg = '';
		
		if (!is_dir($path))
			mkdir($path, 0755);

		$pathMain = './'.$path;
		if (!is_dir($pathMain))
			mkdir($pathMain, 0755);

		$result = $this->do_upload("pics", $pathMain);

		if (!$result['status']){
			$msg = $this->msg('danger', 'Upload Failed');
		} else {
			$save_path = $path . '/' . $result['upload_data']['file_name'];
			
			//if size not up to 400px above
			if($result['image_width'] >= 400){
				if($result['image_width'] >= 400 || $result['image_height'] >= 400) {
					if($this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $stamp .'-303.gif','400','400', $result['image_width'], $result['image_height'])){
						$resize400 = $pathMain . '/' . $stamp.'-303.gif';
						$resize400_dest = $resize400;
						
						if($this->crop_image($resize400, $resize400_dest,'303','220')){
							$save_path303 = $path . '/' . $stamp .'-303.gif';
						}
					}
				}
					
				if($result['image_width'] >= 200 || $result['image_height'] >= 200){
					if($this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $stamp .'-150.gif','200','200', $result['image_width'], $result['image_height'])){
						$resize100 = $pathMain . '/' . $stamp.'-150.gif';
						$resize100_dest = $resize100;	
						
						if($this->crop_image($resize100, $resize100_dest,'150','150')){
							$save_path150 = $path . '/' . $stamp .'-150.gif';
						}
					}
				}
				
				//save picture in system
				$pics_data = array(
					'user_id' => $log_id,
					'pics' => $save_path,
					'pics_medium' => $save_path303,
					'pics_small' => $save_path150,
					'reg_date' => date(fdate)
				);
				$pics_ins = $this->create('img', $pics_data);
				// update in user table
				if($pics_ins) {
					$img_id = $pics_ins;
					$save_path = $save_path303;
				}
			} else {
				$msg = $this->msg('warning', 'Width Size: 400px');
			}
		}

		return (object)array('id'=>$img_id, 'msg'=>$msg, 'path'=>$save_path);
	}
	
	public function do_upload($htmlFieldName, $path) {
        $config['file_name'] = time();
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|tif|bmp';
        $config['max_size'] = '10000';
        $config['max_width'] = '6000';
        $config['max_height'] = '6000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        unset($config);
        
		if (!$this->upload->do_upload($htmlFieldName)){
            return array('error' => $this->upload->display_errors(), 'status' => 0);
        } else {
            $up_data = $this->upload->data();
			return array('status' => 1, 'upload_data' => $this->upload->data(), 'image_width' => $up_data['image_width'], 'image_height' => $up_data['image_height']);
        }
    }
	
	public function resize_image($sourcePath, $desPath, $width = '500', $height = '500', $real_width, $real_height) {
        $this->image_lib->clear();
		$config['image_library'] = 'gd2';
        $config['source_image'] = $sourcePath;
        $config['new_image'] = $desPath;
        $config['quality'] = '100%';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
		$config['width'] = $width;
        $config['height'] = $height;
		
		$dim = (intval($real_width) / intval($real_height)) - ($config['width'] / $config['height']);
		$config['master_dim'] = ($dim > 0)? "height" : "width";
		
		$this->image_lib->initialize($config);
 
        if ($this->image_lib->resize())
            return true;
        return false;
    }
	
	public function crop_image($sourcePath, $desPath, $width = '320', $height = '320') {
        $this->image_lib->clear();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $sourcePath;
        $config['new_image'] = $desPath;
        $config['quality'] = '100%';
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $width;
        $config['height'] = $height;
		$config['x_axis'] = '20';
		$config['y_axis'] = '20';
        
		$this->image_lib->initialize($config);
 
        if ($this->image_lib->crop())
            return true;
        return false;
    }
	//////////////////// END IMAGE LIBRARY ///////////////////////
	
	//////////////////// MUNITES TO HOURS ///////////////////////
	public function to_hours($time, $format = '%02d:%02d') {
		if ($time < 1) {
			return;
		}
		$hours = floor(($time) / 60);
		$minutes = ($time % 60);
		return sprintf($format, $hours, $minutes);
	}
	public function time($datetime) {
        $difference = time() - $datetime;
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");

        if ($difference > 0) { 
            $ending = 'ago';
        } else { 
            $difference = -$difference;
            $ending = 'to go';
        }
		
		for($j = 0; $difference >= $lengths[$j]; $j++) {
            $difference /= $lengths[$j];
        } 
        $difference = round($difference);

        if($difference != 1) { 
            $period = strtolower($periods[$j].'s');
        } else {
            $period = strtolower($periods[$j]);
        }

        return "$difference $period $ending";
	}
	//////////////////// END MUNITES TO HOURS ///////////////////////
	
	//////////////////// DATETIME ///////////////////////
	public function date_diff($now, $end, $type) {
		$now = new DateTime($now);
		$end = new DateTime($end);
		$date_left = $end->getTimestamp() - $now->getTimestamp();
		
		if($type == 'seconds') {
			if($date_left <= 0){$date_left = 0;}
		} else if($type == 'minutes') {
			$date_left = $date_left / 60;
			if($date_left <= 0){$date_left = 0;}
		} else if($type == 'hours') {
			$date_left = $date_left / (60*60);
			if($date_left <= 0){$date_left = 0;}
		} else if($type == 'days') {
			$date_left = $date_left / (60*60*24);
			if($date_left <= 0){$date_left = 0;}
		} else {
			$date_left = $date_left / (60*60*24*365);
			if($date_left <= 0){$date_left = 0;}
		}	
		
		return $date_left;
	}
	//////////////////// END DATETIME ///////////////////////

	//////////////////// ARRAY SORT ///////////////////////
	function array_sort($array, $on, $order=SORT_ASC){
		$new_array = array();
		$sortable_array = array();

		if (count($array) > 0) {
			foreach ($array as $k => $v) {
				if (is_array($v)) {
					foreach ($v as $k2 => $v2) {
						if ($k2 == $on) {
							$sortable_array[$k] = $v2;
						}
					}
				} else {
					$sortable_array[$k] = $v;
				}
			}

			switch ($order) {
				case SORT_ASC:
					asort($sortable_array);
					break;
				case SORT_DESC:
					arsort($sortable_array);
					break;
			}

			foreach ($sortable_array as $k => $v) {
				$new_array[$k] = $array[$k];
			}
		}

		return $new_array;
	}
	//////////////////// END ARRAY SORT ///////////////////////

	//////////////////// YEARS ///////////////////////
	public function years($start = '', $year_count = 20, $history = true) {
		$data = array();

		if($start == ''){$start = date('Y');}
		if($history == true) {
			$start_year = $start - $year_count;
			$end_year = $start + $year_count;
		} else {
			$start_year = $start;
			$end_year = $start + $year_count;
		}

		for($i = $start_year; $i < $end_year; $i++) {
			$year = $i.'/'.($i+1);
			$data[] = $year;
		}

		return $data;
	}
	public function category($arr) {
		$cats = '';
		if(!empty($arr)) {
			foreach(json_decode($arr) as $key=>$value) {
				$cat_name = $this->read_field('id', $value, 'category', 'name');
				$cats .= $cat_name.', ';
			}
			$cats = rtrim($cats, ', ');
		}
		return $cats;
	}
	public function rating($user_id) {
		$my_rating = '';
		$value = 0;
		$total = 0;
		$per = 0;
		$rate = $this->read_single('user_id', $user_id, 'review');
		if(!empty($rate)) {
			foreach($rate as $r) {
				$value += $r->value;	
			}
			$total = count($rate) * 5;
			$per = ($value / $total) * 5;
		}

		return number_format($per,1);
	}
	public function doer_rating($limit='', $offset='') {
		// build query
		$query = $this->db->select('user_id, SUM(value) AS value', FALSE);
		
		if(!empty($limit) && !empty($offset)) {
			$query = $this->db->limit($limit, $offset);
		} else if(!empty($limit)) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->group_by('user_id');
		$query = $this->db->get('review');
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function filter_doer($limit='', $offset='', $search='', $category='') {
		// build query
		$query = $this->db->where('role', 'Doer');
		if(!empty($search)) {$query = $this->db->or_like('fullname', $search);}

		if(!empty($category)) {
			$cat = explode('-', $category);
			for($i=0; $i<count($cat); $i++) {
				$query = $this->db->like('category', $cat[$i]);
			}
		}
		
		if(!empty($limit) && !empty($offset)) {
			$query = $this->db->limit($limit, $offset);
		} else if(!empty($limit)) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get('user');
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	//////////////////// END YEARS ///////////////////////

	public function doer($id) {
		$da['username'] = $this->read_field('id', $id, 'user', 'username');
		$da['fullname'] = $this->read_field('id', $id, 'user', 'fullname');

		$user_img_id = $this->read_field('id', $id, 'user', 'img_id');
		$user_img = $this->read_field('id', $id, 'img', 'pics_small');
		if(!file_exists($user_img)) {$user_img = 'assets/images/avatar.png';}
		$da['img'] = $user_img;

		$category = $this->read_field('id', $id, 'user', 'category');
		$category = $this->category($category);
		if(strlen($category) > 25) {$category = substr($category, 0, 25);}
		$da['category'] = $category;

		$address = $this->read_field('id', $id, 'user', 'address');
		if($address){
			$address = explode(',', $address);
			if(!empty($address)){$address = $address[count($address)-1];}
		}
		$da['address'] = $address;

		$da['verified'] = $this->read_field('id', $id, 'user', 'verified');

		$taging = '';
		$tagline = $this->read_field('id', $id, 'user', 'tagline');
		if($tagline){$taging = $tagline;} else {$taging = $category;}
		$da['taging'] = $taging;

		$rating = $this->rating($id);
		$da['rating'] = $rating;

		return (object)$da;
	}

	//////////////////// Google Distance Matrix ///////////////////////
	function google_coordinate($address) {
		$key = google_key;
		$address = urlencode($address);
		$link = "https://maps.google.com/maps/api/geocode/json?address=".$address."&key=".$key;

		$response = @file_get_contents($link);
		$resp = json_decode($response, true);

		$lat = ''; $lng = '';
		if($resp['status'] == 'OK') {
			$lat = $resp['results'][0]['geometry']['location']['lat'];
			$lng = $resp['results'][0]['geometry']['location']['lng'];
		}
		
		// return distance
		if($lat && $lng) {
			return (object)array('lat'=>$lat, 'lng'=>$lng);
		}
	}
	
	function google_distance($source, $destination, $type='distance') {
		// address or cordinate (e.g. 6.6194,3.5105)
		// address or cordinate (e.g. 6.5962,3.3918)
		$key = google_key;
		$source = urlencode($source);
		$destination = urlencode($destination);
		$link = "https://maps.googleapis.com/maps/api/distancematrix/json?&key=".$key."&origins=".$source."&destinations=".$destination."&mode=driving";

		$response = @file_get_contents($link);
		$resp = json_decode($response, true);

		$distance = ''; $duration = '';
		if($resp['status'] == 'OK') {
			if($resp['rows'][0]['elements'][0]['status'] == 'OK') {
				$distance = $resp['rows'][0]['elements'][0]['distance']['text'];
				$duration = $resp['rows'][0]['elements'][0]['duration']['text'];
			}
		}
		
		// return distance
		if($distance && $type == 'distance') {
			return $distance;
		}

		// return duration
		if($duration && $type == 'duration') {
			return $duration;
		}
	}
	//////////////////// End Google Distance Matrix ///////////////////////
	
	//////////////////// MODULE ///////////////////////
	public function module($role, $module, $type) {
		$result = 0;
		
		$mod_id = $this->read_field('link', $module, 'access_module', 'id');
		$crud = $this->read_field('role_id', $role, 'access', 'crud');
		if($mod_id) {
			if(!empty($crud)) {
				$crud = json_decode($crud);
				foreach($crud as $cr) {
					$cr = explode('.', $cr);
					if($mod_id == $cr[0]) {
						if($type == 'create'){$result = $cr[1];}
						if($type == 'read'){$result = $cr[2];}
						if($type == 'update'){$result = $cr[3];}
						if($type == 'delete'){$result = $cr[4];}
						break;
					}
				}
			}
		}
		
		return $result;
	}
	public function mod_read($role, $module) {
		$rs = $this->module($role, $module, 'read');
		return $rs;
	}
	//////////////////// END MODULE ///////////////////////
}
