<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dist extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form','url'));
        $this->load->library(array('form_validation', 'email'));
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		
	}
	public function genealogy_auto($select_parentid = '')
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if ($select_parentid != '') {
			$data['sponsor'] = $this->admin->get_row_data('user_role','user_role_id',$select_parentid);
		} else {
			$data['sponsor'] = $this->admin->get_row_data('user_role','user_role_id',$this->session->userdata('userid'));
		}
		$data['page_name'] = "genealogy_auto";
		$this->load->view('genealogy_auto',$data);
	}
	public function get_products()
	{
		$details = $this->db->get('products')->result_array();
		
		if (!empty($details)) {
			echo json_encode($details);
		} else {
			echo "empty";
		}
	}
	public function auto_request()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		$data['page_name'] = "auto_request";
		$this->load->view('auto_request',$data);
	}
	public function products()
	{
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		$data['products'] = $this->db->get('products')->result_array();
		$data['page_name'] = "products";
		$this->load->view('products',$data);
	}
	public function add_product()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		$data['name'] = $this->input->post('product_name');
		$data['img'] = $this->input->post('pimage');
		$data['amount'] = $this->input->post('product_amount');
		$data['description'] = $this->input->post('product_description');
		$profile = $this->db->insert('products',$data);
		redirect('products','refresh');
	}
	public function product_edit($id="") {
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if($_POST){
			$data['name'] = $this->input->post('pname');
			$data['img'] = $this->input->post('pimage');
			$data['amount'] = $this->input->post('amount');
			$data['description'] = $this->input->post('description');
			$data['status'] = $this->input->post('status');
			$this->db->where('product_id',$this->input->post('id'));
			$this->db->update('products',$data);
			redirect('products','refresh');
		}
		$data['product'] = $this->admin->get_row_data('products','product_id', $id);
		$data['page_name'] = "product_edit";
		$this->load->view('product_edit',$data);
	}
	public function product_delete($doit='',$id="") {
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if ($doit == 'delete') {
			$this->db->where('product_id',$id);
			$this->db->delete('products');
			$this->session->set_flashdata('success_message', 'Product Deleted Successfully');
			redirect('products','refresh');
		}
	}
	public function product_table() {
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if ($_POST) {
			$fdate = date_format(date_create($this->input->post('fdate')),"Y-m-d");
			$tdate = date_format(date_create($this->input->post('tdate')),"Y-m-d");
			$this->db->where('DATE(entry_date) >=',$fdate);
			$this->db->where('DATE(entry_date) <=',$tdate);
			$data['orders'] = $this->db->where('status','New')->get('billing')->result_array();
		} else {
		   $data['orders'] = $this->db->where('status','New')->get('billing')->result_array();
		}
		log_message("error", $this->db->last_query());
		$data['page_name'] = "product_table";
		$this->load->view('product_table',$data);
	}
	public function product_delivery() {
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if($this->admin->product_credits()){
			$data['status'] = "completed";
			$this->db->where('billing_id',$this->input->post('id'));
			$this->db->update('billing',$data);
			redirect('product_table','refresh');
		}

	}
	public function deliverd_products() {
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if ($_POST) {
			$fdate = date_format(date_create($this->input->post('fdate')),"Y-m-d");
			$tdate = date_format(date_create($this->input->post('tdate')),"Y-m-d");
			$this->db->where('status','completed');
			$this->db->where('DATE(entry_date) >=',$fdate);
			$this->db->where('DATE(entry_date) <=',$tdate);
			$data['orders'] = $this->db->get('billing')->result_array();
		} else {
		   $data['orders'] = $this->db->where('status','completed')->get('billing')->result_array();
		}
		
		$data['page_name'] = "deliverd_products";
		$this->load->view('deliverd_products',$data);
	}

	public function update_upload()  
	{  
		if(isset($_FILES["update_upload"]["name"]))  
		{  
			$config['file_name'] = time().substr($_FILES["update_upload"]["name"], 0, 3);;
			$config['upload_path'] = 'assets/product';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$config['overwrite'] = false;
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('update_upload'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();  
				echo $data["file_name"];  
			}  
		}  
	}
	/*public function check()
	{
		$this->admin->autofill('tree',1,2);
	}*/

	///// Reset Password
	public function password_reset()
	{
	    if (empty($this->session->userdata('usertype')))
            redirect('','refresh');
		if ($_POST) {
			$user_id = $this->session->userdata('userid');
			$new_pass = sha1($this->input->post('new_pass'));
			$this->db->where('user_role_id',$user_id);
			$details = $this->db->update('user_role',array('pwd'=>$new_pass));
			if ($details) {
				$this->session->set_flashdata('success_message', 'Password update Successfully');
				redirect('password_reset','refresh');
			} else {
				$this->session->set_flashdata('error_message', 'Password Not Existing');
				redirect('password_reset','refresh');
			}
		}
		$data['page_name'] = "password_reset";
		$this->load->view('password_reset',$data);
	}

	public function master()
    {
        if ($this->session->userdata('usertype') != "a")
            redirect('','refresh');
		$data['page_name'] = "master";
		$this->load->view('master',$data);
	}


	public function update_master()
    {
        if ($this->session->userdata('usertype') != "a")
            redirect('','refresh');
		$userdata = array(
			'level' => $this->input->post('level'),
			'criteria' => $this->input->post('criteria'),
			'rewards' => $this->input->post('rewards'),
			'type' => $this->input->post('type')
		);
        $this->db->where('master_id', $this->input->post('id'));
        $this->db->update('master', $userdata);
        log_message("error", $this->db->last_query());
		$data['page_name'] = "master";
		$this->load->view('master',$data);
	}


	public function formutr($data, $datafield){
	    
        if($this->db->where($datafield,$data)->count_all_results('admin_request')+0 > 0){
	        $this->form_validation->set_message('formcheck', $datafield.' is already Exits');
	        return false;
	    } else {
	        return true;
	    }   
	}

	public function pin_request()
	{
		if ($this->session->userdata('usertype') == "a") 
			redirect('','refresh');
		$user_id = $this->session->userdata('userid');
		if ($_POST) {
			$this->form_validation->set_rules('phone', 'phone', 'callback_formutr[utr]');
			if($this->form_validation->run()==true) {
				$pin_value = $this->input->post('pin_value');
				if ($pin_value != 0) {
					log_message("error",$pin_value);
					if ($this->admin->add_pin_request($user_id,$file_name)) {
						$this->session->set_flashdata('success_message', 'Request Successfully');
						redirect('investment_request','refresh');
					} else {
						$this->session->set_flashdata('error_message', 'Please Enter Amount');
						redirect('investment_request','refresh');
					}
				} else {
					$this->session->set_flashdata('error_message', 'Please Enter Amount');
					redirect('investment_request','refresh');
				}
			} else {
				$data['page_name'] = "investment_request";
				$this->load->view('investment_request',$data);
			}
			
		}
		
		$data['page_name'] = "investment_request";
		$this->load->view('investment_request',$data);
	}
	
	public function withdraw_approve()
	{
		if ($this->session->userdata('usertype') != "a")
			redirect('','refresh');
		
		if($this->admin->pay_withdraw_request()){
            $this->session->set_flashdata('success_message', 'Request Accepted Successfully');
			redirect('view_withdraw','refresh');         
        }else{
            $this->session->set_flashdata('error_message', 'Not Sucess Please check your details');
          redirect('view_withdraw','refresh');  
        }		
	}

	public function preview($id = '')  
	{ 
		log_message("error", $id);
		$data['preview'] = $this->admin->get_row_data('user_role','username',$id);
		$data['page_name'] = "preview_user";
		$this->load->view('preview_user',$data);
	}
	
	public function logo_upload()  
	{  
		if(isset($_FILES["logo_upload"]["name"]))  
		{  
			$config['file_name'] = 'logo';
			$config['upload_path'] = 'assets/web';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$config['overwrite'] = true;
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('logo_upload'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();  
				echo $data["file_name"];  
			}  
		}  
	}
	public function fav_upload()  
	{  
		if(isset($_FILES["fav_upload"]["name"]))  
		{  
			$config['file_name'] = 'fav';
			$config['upload_path'] = 'assets/web';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$config['overwrite'] = true;
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('fav_upload'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();  
				echo $data["file_name"];  
			}  
		}  
	}
	public function setup()
	{
	    if ($_POST) {
	        $tables = $this->db->list_tables();
                foreach ($tables as $table)
                {
                   if ($table != 'master'  & $table != 'packages') {
                       $this->db->truncate($table);
    	            }
                }
    	 if($this->admin->setup_manage())
    	 {
    	     redirect('','refresh');
    	 } else {
    	    $this->session->set_flashdata('error_message', 'Action Not Successfull Please Check Your Data');
				redirect('setup','refresh'); 
    	 }
	    }
		$data['page_name'] = "setup";
		$this->load->view('setup',$data);
	}
	
	public function view_admin_approve()
	{
		if ($this->session->userdata('login') != "1")
			redirect('','refresh');
		if ($this->input->post('datastatus') == 'Approve') {
			$hids = $this->input->post('hids');
			if($this->admin->user_aprroval($hids)){
				$this->session->set_flashdata('success_message', 'Request Accepted Successfully');
				redirect('view_investment_request','refresh');
			} 
			else {
				$this->session->set_flashdata('error_message', 'Action Not Successfull Please Check Your Data');
				redirect('view_investment_request','refresh'); 
			}   
		} 
		if ($this->input->post('datastatus') == 'Reject') {
			
			$this->db->where('admin_request_id',$this->input->post('hids'));
			$result = $this->db->update('admin_request',array('status'=>'Rejected','remark'=>$this->input->post('remark'),'approve_date'=>date("Y-m-d")));
			if($result){
				$this->session->set_flashdata('success_message', 'Request Rejected Successfully');
				redirect('view_investment_request','refresh');
			} 
			else {
				$this->session->set_flashdata('error_message', 'Action Not Successfull Please Check Your Data');
				redirect('view_investment_request','refresh'); 
			}   
		} 
	}
	
	
	public function checkutr(){
	    if($this->db->where('utr',$this->input->post('utr'))->count_all_results('admin_request')+0 > 0){
	        $this->form_validation->set_message('checkutr', 'Data already Exits');
	        return false;
	    } else {
	        return true;
	    }
	}
	public function admin_request()
	{
	    if ($_POST) {
	    $this->form_validation->set_rules('utr', 'utr', 'callback_checkutr');
		
		if($this->form_validation->run()==true) {
			if($this->admin->add_admin_request($this->session->userdata('userid'))) {
    				$this->session->set_flashdata('success_message', 'Request Successfully');
    				redirect('investment_request','refresh');
    			} else {
    				$this->session->set_flashdata('error_message', 'check your details');
    				redirect('investment_request','refresh');
    			} 
		} else {
		    $this->load->view('investment_request');
		}
	    }
	    $data['pin_request'] = $this->admin->get_tabledata('admin_request','user_id',$this->session->userdata('userid'));
		$data['page_name'] = "investment_request";
		$this->load->view('investment_request',$data);
	}
	

	public function formcheck($data, $datafield){
	    if($this->db->where($datafield,$data)->count_all_results('profile')+0 > 0){
	        $this->form_validation->set_message('formcheck', $datafield.' is already Exits');
	        return false;
	    } else {
	        return true;
	    }
	    
	}
	public function formcheckuser($data, $datafield){
	    if($this->db->where($datafield,$data)->count_all_results('user_role')+0 > 0){
	        $this->form_validation->set_message('formcheck', $datafield.' is already Exits');
	        return false;
	    } else {
	        return true;
	    }
	    
	}
	public function registration()
	{
	    $this->form_validation->set_rules('phone', 'phone', 'callback_formcheck[phone]');
		$this->form_validation->set_rules('email', 'email', 'callback_formcheck[email]');
		$this->form_validation->set_rules('username', 'username', 'callback_formcheckuser[username]');
		$this->form_validation->set_rules('p', 'Password', 'required');
		$this->form_validation->set_rules('cp', 'Password', 'required|matches[p]');
		if($this->form_validation->run()==true) {
			$result = $this->admin->register_manage();
			if($result) {
				//$this->admin->send_my_mail($this->input->post('email'),$this->input->post('username'),$this->input->post('p'));
				redirect(BASEURL,'refresh');
			} else {
				$this->session->set_flashdata('error_message', 'Please Check Your Details');
				redirect(BASEURL."referral/".bin2hex($this->input->post('ref_id')),'refresh');
			}
		} else {
		    $data['ref'] = $this->db->get_where('user_role',array('username'=>$this->input->post('ref_id')))->row_array();
			$this->load->view('referral',$data);
		}
	}
	

	public function test()
	{
	    $this->load->view('modal_contact_view');
	}
	
	function formsubmit()
    {
        $this->form_validation->set_rules('phone', 'phone', 'callback_formcheck[phone]');
        
		if($this->form_validation->run()==true) {
			echo "error";
		} else {
		    $data['ref'] = $this->db->get_where('user_role',array('user_role_id'=>1))->row_array();
			$this->load->view('referral',$data);
		}
    }
	
	public function get_utr()
    {
        $utr = $this->input->post('utr');
        $this->db->where('utr',$utr);
        $details = $this->db->get('admin_request')->row_array();
        if (!empty($details)) {
            echo "exits";
        } else {
            echo "notexits";
        }
    }
    
    public function forgot_password()
	{
		if($_POST){
			$email = $this->input->post('email');
			$phonenum = $this->input->post('phone');
			$forgotuser = $this->db->get_where('profile',array('email'=>$email,'phone'=>$phonenum))->row_array();
			
				if(!empty($forgotuser)){
					$sendmail = $this->admin->send_forgotpass($forgotuser['email'],$forgotuser['p']);
					//log_message('error',$sendmail);
					if($sendmail=="ok"){
					$this->session->set_flashdata('success_message', 'Your Password Sent to Your Register Email ID');
					redirect('','refresh');  }
				} 
				else {
				$this->session->set_flashdata('error_message', 'The Details You Entered are incorrect ');
					redirect('','refresh');   
				}
			
		}		
			
	}
	public function withdraw()
	{
		if ($this->session->userdata('login') != 1 )
			redirect('','refresh');
		$user_id = $this->session->userdata('userid');
		if ($_POST) {
			$pin_value = $this->input->post('amount');
			if ($pin_value != 0) {
				if ($this->admin->send_withdraw_request($user_id)) {
					$this->session->set_flashdata('success_message', 'Request Successfully');
					redirect('withdraw','refresh');
				} else {
					$this->session->set_flashdata('error_message', 'Please Enter Amount');
					redirect('withdraw','refresh');
				}
			} else {
				$this->session->set_flashdata('error_message', 'Please Enter Amount');
				redirect('withdraw','refresh');
			}
		}
		$data['status'] = $this->db->select('status')->where('user_id',$this->session->userdata('userid'))->get('bank')->row()->status;
		$data['withdraw'] = $this->admin->get_tabledata('withdraw_request','user_id',$user_id); 
		$data['page_name'] = "withdraw";
		$this->load->view('withdraw',$data);
	}
	public function earn_history($id='')
	{
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		if ($_POST) {
			$fdate = date_format(date_create($this->input->post('fdate')),"Y-m-d");
			$tdate = date_format(date_create($this->input->post('tdate')),"Y-m-d");
			if ($this->session->userdata('userid') != 1)
				$this->db->where('user_id',$this->session->userdata("userid"));
			$this->db->where('entry_date >=',$fdate);
			$this->db->where('entry_date <=',$tdate);
			$data['account'] = $this->db->get('account')->result_array();
		} else {
		    if ($id == '') {
			if ($this->session->userdata('userid') == 1)
				$data['account'] = $this->db->get('account')->result_array();
			else
    				$data['account'] = $this->db->get_where('account',array('user_id'=>$this->session->userdata("userid")))->result_array();
    		} else {
    			$data['account'] = $this->db->get_where('account',array('user_id'=>$id))->result_array();
    		}
    		
    		log_message('error',$this->db->last_query());	
			
		}
		
		
		$data['page_name'] = "earn_history";
		$this->load->view('earn_history',$data);
	}
	public function dirreferral($id='')
	{
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		if ($_POST) {
			$fdate = date_format(date_create($this->input->post('fdate')),"Y-m-d");
			$tdate = date_format(date_create($this->input->post('tdate')),"Y-m-d");
			$this->db->where('ref_id',$this->session->userdata("userid"));
			$this->db->where('entry_date >=',$fdate);
			$this->db->where('entry_date <=',$tdate);
			$data['earn'] = $this->db->get('user_role')->result_array();
			
		} else {
		   if ($id == '') {
				$data['earn'] = $this->db->get_where('user_role',array('ref_id'=>$this->session->userdata("userid")))->result_array();
			} else {
				$data['earn'] = $this->db->get_where('user_role',array('ref_id'=>$id))->result_array();
			}
		log_message('error',$this->db->last_query()); 
		}
		
		
		$data['page_name'] = "dirreferral";
		$this->load->view('dirreferral',$data);
	}
	public function non_active($id='')
	{
		$data['usertype'] = $this->session->userdata('usertype');
		$data['user_id'] = $this->session->userdata('userid');
		$data['page_name'] = "non_active";
		$this->load->view('non_active',$data);
	}
	public function level()
	{
		$data['usertype'] = $this->session->userdata('usertype');
		$data['user_id'] = $this->session->userdata('userid');
		$data['page_name'] = "level";
		$this->load->view('level',$data);
	}
	public function terms() {
		if ($this->session->userdata('usertype') != 'a')
			redirect('','refresh');
		if ($_POST) {
		    log_message("error", $this->input->post('terms'));
			$terms = $this->input->post('terms');
			//$this->db->update('terms',array('terms'=>$terms));
			
			$this->session->set_flashdata('success_message', 'Terms Add Successfully');
			redirect('terms','refresh');
		}
		$data['page_name'] = "terms";
		$this->load->view('terms',$data);
	}
	
	public function news($doit='',$id="") {
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		if ($doit == 'delete') {
			$this->db->where('id',$id);
			$this->db->delete('news');
			$this->session->set_flashdata('success_message', 'Delete Successfully');
			redirect('news','refresh');
		}
		if ($_POST) {
			$data['news'] = htmlentities($this->input->post('news'));
			if($this->db->insert('news',$data)){
			$this->session->set_flashdata('success_message', 'News send Successfully');
			redirect('news','refresh');
			}
		}
		$data['page_name'] = "news";
		$this->load->view('news',$data);
	}
	public function messages($doit='',$id="") {
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		if ($doit == 'delete') {
			$this->db->where('id',$id);
			$this->db->delete('messages');
			$this->session->set_flashdata('success_message', 'Delete Successfully');
			redirect('messages','refresh');
		}
		if ($this->input->post('datastatus') == 'Replay') {  
			$replay_msg = htmlentities($this->input->post('replay'));
			Log_message('error',$replay_msg );
			$this->db->where('id',$this->input->post('hids'));
			$result = $this->db->update('messages',array('status'=>'Replayed','replay'=>$replay_msg,'r_date'=>date('Y-m-d')));
			if ($result) {
				$this->session->set_flashdata('success_message', 'Replayed Successfully');
				redirect('messages','refresh');
			} else {
				$this->session->set_flashdata('error_message', 'Replay Not Success');
				redirect('messages','refresh');
			}
		} 
		$data['page_name'] = "messages";
		$this->load->view('messages',$data);
	}
	public function message($doit='',$id="") {
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		if ($doit == 'delete') {
			$this->db->where('id',$id);
			$result = $this->db->delete('messages');
			if ($result) {
				$this->session->set_flashdata('success_message', 'Deleted Successfully');
				$data['page_name'] = "message";
		        $this->load->view('message',$data);
			} else {
				$this->session->set_flashdata('error_message', 'Deleted Not Successfull');
				$data['page_name'] = "message";
		        $this->load->view('message',$data);
			}
		}
		if ($_POST) {
			$data['m_from'] = $this->input->post('user_id');
			$data['message'] = $this->input->post('message');
			$data['m_date'] = date('Y-m-d');
			// $result = $this->db->insert('messages',$data);
			if ( $this->db->insert('messages',$data)) {
				$this->session->set_flashdata('success_message', 'Message Send Successfully');
				redirect('message','refresh');  
			} else {
				$this->session->set_flashdata('error_message', 'Message Not Send');
				redirect('message','refresh');  
			}
		}
		$data['page_name'] = "message";
		$this->load->view('message',$data);
		
	}
	public function view_withdraw()
	{
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		$data['withdraw'] = $this->db->get('withdraw_request')->result_array();
		$data['page_name'] = "view_withdraw";
		$this->load->view('view_withdraw',$data);
	}
	public function genealogy($select_parentid = '')
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if ($select_parentid != '') {
			$data['sponsor'] = $this->admin->get_row_data('user_role','user_role_id',$select_parentid);
		} else {
			$data['sponsor'] = $this->admin->get_row_data('user_role','user_role_id',$this->session->userdata('userid'));
		}
		$data['page_name'] = "genealogy";
		$this->load->view('genealogy',$data);
	}
	public function gen_roi(){
		$roi_date = date('Y-m-d');
		if($this->db->where('entry_date',date('Y-m-d',strtotime("-1 days")))->where('remark','ROI')->count_all_results('account')+0 == 0){
    		$investers = $this->db->distinct()->select('user_id')->where('status','Accepted')->get('admin_request')->result_array();
    		foreach ($investers as $key => $n) {
    			$dataearn1 = array(
    				'user_id' => $n['user_id'],
    				'entry_date'=> date('Y-m-d',strtotime("-1 days")),
    				'credit' => 80,
    				'balance' => 80+($this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$n['user_id'])->get('account')->row()->balance+0),
    				'remark' => 'ROI',
    				'description' => 'ROI'
    			);
    			$this->db->insert('account', $dataearn1);
    		}
		}
		exit();
	}
	public function view_kyc()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		$data['users'] = $this->db->order_by('kyc_request_id','DESC')->get('kyc_request')->result_array();
		$data['page_name'] = "view_kyc";
		$this->load->view('view_kyc',$data);
		if($_POST){
			if($this->input->post('datastatus') == "Reject"){
				
				$data_b['status'] = "Rejected";
				$this->db->where('kyc_request_id',$this->input->post('hids'));
				$re_ban = $this->db->update('kyc_request',$data_b);
				if ($re_ban == true) {
					$this->session->set_flashdata('success_message', 'Request Rejected Successfully');
					redirect('view_kyc','refresh');  
				} else {
					$this->session->set_flashdata('Error_message', 'Not Successfully');
					redirect('view_kyc','refresh');  
				}
			}
			if($this->input->post('datastatus') == "Accept"){
				if ($this->admin->kyc_approve()) {
					$this->session->set_flashdata('success_message', 'Request Accepted Successfully');
					redirect('view_kyc','refresh');  
				} else {
					$this->session->set_flashdata('Error_message', 'Not Successfully');
					redirect('view_kyc','refresh');  
				}
			}
			
		}
	}
	public function view_bank()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		$data['users'] = $this->db->order_by('bank_request_id','DESC')->get('bank_request')->result_array();
		$data['page_name'] = "view_bank";
		$this->load->view('view_bank',$data);
		if($_POST){
			if($this->input->post('datastatus') == "Reject"){
				
				$data_b['status'] = "Rejected";
				$this->db->where('bank_request_id',$this->input->post('hids'));
				$re_ban = $this->db->update('bank_request',$data_b);
				if ($re_ban == true) {
					$this->session->set_flashdata('success_message', 'Request Rejected Successfully');
					redirect('view_bank','refresh');  
				} else {
					$this->session->set_flashdata('Error_message', 'Not Successfully');
					redirect('view_bank','refresh');  
				}
			}
			if($this->input->post('datastatus') == "Accept"){
				if ($this->admin->bank_approve()) {
					$this->session->set_flashdata('success_message', 'Request Accepted Successfully');
					redirect('view_bank','refresh');  
				} else {
					$this->session->set_flashdata('Error_message', 'Not Successfully');
					redirect('view_bank','refresh');  
				}
			}
			
		}
	}
	public function block_user($deleteid = '')
	{
		if ($this->session->userdata('usertype') != "a")
			redirect('','refresh');
		if ($deleteid == '') {
			$this->session->set_flashdata('error_message', 'Check Your ID');
			redirect('users','refresh');
		} else {
			$this->db->set('status', "IF(status='Active','Inactive','Active')", false);
			$this->db->where('user_role_id',$deleteid);
			$this->db->update('user_role');
			$ccc = $this->db->select('status')->where('user_role_id',$deleteid)->get('user_role')->row()->status;
			if($ccc == "Active")
			$this->session->set_flashdata('success_message', 'Activated Successfully');
			else
			$this->session->set_flashdata('error_message', 'Blocked Successfully');
			redirect('users','refresh');
		}
	}

	public function get_aadhar()
	{
		$utr = $this->input->post('utr');
		$this->db->where('aadhar_no',$utr);
		$this->db->where('user_id !=',$this->session->userdata('userid'));
		$details = $this->db->get('kyc')->row_array();
		log_message("error", $this->db->last_query());
		if (!empty($details)) {
			echo json_encode($details);
		} else {
			echo "empty";
		}
	}
	public function get_pan()
	{
		$utr = $this->input->post('utr');
		$this->db->where('pan_no',$utr);
		$this->db->where('user_id !=',$this->session->userdata('userid'));
		$details = $this->db->get('kyc')->row_array();
		log_message("error", $this->db->last_query());
		if (!empty($details)) {
			echo json_encode($details);
		} else {
			echo "empty";
		}
	}
	public function receipt_upload()  
	{  
		if(isset($_FILES["receipt_upload"]["name"]))  
		{  
			$config['file_name'] = time().substr($_FILES["receipt_upload"]["name"], 0, 3);;
			$config['upload_path'] = 'assets/receipt/';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$config['overwrite'] = false;
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('receipt_upload'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();  
				echo $data["file_name"];  
			}  
		}  
	}
	public function pro_upload()  
	{  
		if(isset($_FILES["pro_upload"]["name"]))  
		{  
			$config['file_name'] = time().substr($_FILES["pro_upload"]["name"], 0, 3);;
			$config['upload_path'] = 'assets/profile';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$config['overwrite'] = false;
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('pro_upload'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();  
				echo $data["file_name"];  
			}  
		}  
	}
	public function aadhar_upload()  
	{  
		if(isset($_FILES["aadhar_upload"]["name"]))  
		{  
			$config['file_name'] = time().substr($_FILES["aadhar_upload"]["name"], 0, 3);;
			$config['upload_path'] = 'assets/kyc';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$config['overwrite'] = false;
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('aadhar_upload'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();  
				echo $data["file_name"];  
			}  
		}  
	}
	public function pan_upload()  
	{  
		if(isset($_FILES["pan_upload"]["name"]))  
		{  
			$config['file_name'] = time().substr($_FILES["pan_upload"]["name"], 0, 3);;
			$config['upload_path'] = 'assets/kyc';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$config['overwrite'] = false;
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('pan_upload'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();  
				echo $data["file_name"];  
			}  
		}  
	}
	public function cheque_upload()  
	{  
		if(isset($_FILES["cheque_upload"]["name"]))  
		{  
			$config['file_name'] = time().substr($_FILES["cheque_upload"]["name"], 0, 3);;
			$config['upload_path'] = 'assets/kyc';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$config['overwrite'] = false;
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('cheque_upload'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();  
				echo $data["file_name"];  
			}  
		}  
	}  

	public function profilecheck($data, $datafield){
	    if($this->db->where($datafield,$data)->where('profile_id !=',$this->session->userdata('userid'))->count_all_results('profile')+0 > 0){
	        $this->form_validation->set_message('profilecheck', $datafield.' is already Exits');
	        return false;
	    } else {
	        return true;
	    }
	    
	}
	public function update_profile()
	{
		$this->form_validation->set_rules('phone', 'phone', 'callback_profilecheck[phone]');
		$this->form_validation->set_rules('email', 'email', 'callback_profilecheck[email]');
		if($this->form_validation->run()==true) {
			$data['phone'] = $this->input->post('phone');
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['pimage'] = $this->input->post('pimage');
			$data['door'] = $this->input->post('door');
			$data['street'] = $this->input->post('street');
			$data['city'] = $this->input->post('city');
			$data['district'] = $this->input->post('district');
			$data['state'] = $this->input->post('state');
			$data['pin'] = $this->input->post('pin');	
			$this->db->where('profile_id',$this->input->post('user_id'));
			$profile = $this->db->update('profile',$data);
			if ($profile){
				$this->session->set_flashdata('success_message', 'Profile Details Send Successfully');
				redirect('user_profile','refresh');
			} else {
				$this->session->set_flashdata('error_message', 'Request Not Send');
				redirect('user_profile','refresh');
			}  

		} 
		else{
			$this->session->set_flashdata('error_message', 'Email ID or Phone number already Exits');
				redirect('user_profile','refresh');
		}
	}
	
	public function bankcheck($data, $datafield){
	    if($this->db->where($datafield,$data)->where('bank_id !=',$this->session->userdata('userid'))->count_all_results('bank')+0 > 0){
	        $this->form_validation->set_message('bankcheck', $datafield.' is already Exits');
	        return false;
	    } else {
	        return true;
	    }
	    
	}

	public function bank()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if($_POST){
			$this->form_validation->set_rules('acc_no', 'acc_no', 'callback_bankcheck[acc_no]');
			$pending_reuest = $this->db->where('user_id',$this->session->userdata('userid'))->where('status','Request')->count_all_results('bank_request');
			if($this->form_validation->run()==true && $pending_reuest == 0) {
				$bank_request_data['user_id'] = $this->input->post('user_id');
				$bank_request_data['acc_name'] = $this->input->post('acc_name');
				$bank_request_data['acc_no'] = $this->input->post('acc_no');
				$bank_request_data['acc_branch'] = $this->input->post('acc_branch');
				$bank_request_data['acc_ifsc'] = $this->input->post('acc_ifsc');
				$bank_request_data['acc_bank'] = $this->input->post('acc_bank');
				$bank_request_data['cfile'] = $this->input->post('chequeimage');
				
				$bank_request_insert = $this->db->insert('bank_request',$bank_request_data);
				if ($bank_request_insert){
					$this->session->set_flashdata('success_message', 'Bank Details Update Request Send Successfully');
					redirect('bank','refresh');
				} else {
					$this->session->set_flashdata('error_message', 'Request Not Send');
					redirect('bank','refresh');
				}  
			} 
			else{
				$this->session->set_flashdata('error_message', 'Account number already Exits / Already Submitted');
					redirect('bank','refresh');
			}
		}
		
		$data['bank'] = $this->admin->get_row_data('bank','user_id',$this->session->userdata('userid'));
		$data['page_name'] = "bank";
		$this->load->view('bank',$data);	  
	}

	public function kyccheck($data, $datafield){
		if($this->db->where($datafield,$data)->where('kyc_id !=',$this->session->userdata('userid'))->count_all_results('kyc')+0 > 0){
			$this->form_validation->set_message('kyccheck', $datafield.' is already Exits');
			return false;
		} else {
			return true;
		}
		
	}

	public function kyc()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if($_POST){
			$this->form_validation->set_rules('aadhar', 'aadhar', 'callback_kyccheck[aadhar]');
			$this->form_validation->set_rules('pan', 'pan', 'callback_kyccheck[pan]');
			$pending_reuest = $this->db->where('user_id',$this->session->userdata('userid'))->where('status','Request')->count_all_results('kyc_request');
			if($this->form_validation->run()==true && $pending_reuest == 0) {
					$data['user_id'] = $this->input->post('user_id');
					$data['afile'] = $this->input->post('aadharimage');
					$data['pfile'] = $this->input->post('panimage');
					
					$data['aadhar'] = $this->input->post('aadhar');
					$data['pan'] = $this->input->post('pan');
					
					// $kycinsert = $this->db->insert('kyc_request',$data);
					if ($this->db->insert('kyc_request',$data)){
						$this->session->set_flashdata('success_message', 'KYC Update Request Send Successfully');
						redirect('kyc','refresh');
					} else {
						$this->session->set_flashdata('error_message', 'Request Not Send');
						redirect('kyc','refresh');
					}  
				} 
				else{
					$this->session->set_flashdata('error_message', 'Pan number / Aadhar number already Exits / Already Submitted');
						redirect('kyc','refresh');
				}
			}
			$data['cust'] = $this->admin->get_row_data('kyc','user_id',$this->session->userdata('userid'));
			$data['page_name'] = "kyc";
			$this->load->view('kyc',$data);	  
		
	}
	
	//// update && edit user profiles
	public function user_profile()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		$data['cust'] = $this->admin->get_row_data('profile','profile_id',$this->session->userdata('userid'));
		$data['page_name'] = "user_profile";
		$this->load->view('user_profile',$data);
	}
	public function investment_request()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		$data['page_name'] = "investment_request";
		$this->load->view('investment_request',$data);
	}
	
	
	public function view_investment_request($param1='',$param2='')
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		$data['wallet_request'] = $this->db->order_by('admin_request_id',"DESC")->get('admin_request')->result_array();
		$data['page_name'] = "view_investment_request";
		$this->load->view('view_investment_request',$data);
	}
	
	public function customers()
	{
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		$data['page_name'] = "customers";
		$this->load->view('customers',$data);
	}
	
	public function users()
	{
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		$data['page_name'] = "users";
		$this->load->view('users',$data);
	}
	public function referral($parent_ids="")
	{
	    $parent_id = hex2bin($parent_ids);
		if (!empty($parent_id)){
			$plid_check = $this->db->get_where('user_role',array('username'=>$parent_id))->row_array();
	    	if ($plid_check) {
				$data['ref'] = $this->db->get_where('user_role',array('username'=>$parent_id))->row_array();
			} else {
				$data['ref'] = $this->db->get_where('user_role',array('user_role_id'=>1))->row_array();
			}
		} else {
			$data['ref'] = $this->db->get_where('user_role',array('user_role_id'=>1))->row_array();
		}
		$data['page_name'] = "referral";
		$this->load->view('referral',$data);
	}
	/*public function registration()
	{
		if($_POST){
			$result = $this->admin->register_manage();
			if($result) {
				$this->admin->send_my_mail($this->input->post('email'),$this->input->post('username'),$this->input->post('p'));
				redirect(BASEURL,'refresh');
			} else {
				$this->session->set_flashdata('error_message', 'Please Check Your Details');
				redirect(BASEURL."referral/".bin2hex($this->input->post('ref_id')),'refresh');
			}
		}
	}*/
	
	public function get_user_details()
	{
		$userids = $this->db->get_where('user_role',array('username'=>$this->input->post('username')))->row()->user_role_id;
		$userid = $this->db->get_where('profile',array('profile_id'=>$userids))->row_array();
		if (!empty($userid)) {
			echo $userid['name']." - ".$userid['district'];
		} else {
			echo "empty";
		}
	}
	public function check_details()
	{
	    log_message('error',"hgjbhjbijkb");
		$c_data = $this->input->post('c_data');
		$data_filed = $this->input->post('data_filed');
		$this->db->where($data_filed,$c_data);
		$details = $this->db->get('profile')->row_array();
		if (!empty($details)) {
			echo json_encode($details);
		} else {
			echo "empty";
		}
	}
	public function check_user_details()
	{
		$c_data = $this->input->post('c_data');
		$data_filed = $this->input->post('data_filed');
		$this->db->where($data_filed,$c_data);
		$details = $this->db->get('user_role')->row_array();
		if (!empty($details)) {
			echo json_encode($details);
		} else {
			echo "empty";
		}
	}
	public function index()
	{ 
		if ($this->session->userdata('login') == 1)
		{
			$data['userdata'] = $this->session->userdata;
			$data['page_name'] = "dashboard";
			$data['user'] = $this->admin->get_row_data('user_role','user_role_id',$user_id);
			$this->load->view('dashboard',$data);
		} else {
			$this->load->view('login');
		}
	}
	public function login()
	{
		if ($_POST) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$check = $this->admin->login($username,$password);
			if ($check !== false) {
				$this->session->set_userdata('login', '1');
				$this->session->set_userdata('userid', $check['user_role_id']);
				$this->session->set_userdata('username', $check['username']);
				$this->session->set_userdata('rank', $check['rank']);
				$this->session->set_userdata('name', $this->db->select('name')->where('profile_id',$check['user_role_id'])->get('profile')->row()->name);
				$this->session->set_userdata('usertype', $check['user_type']);
				$this->session->set_flashdata('success_message' , "success");
				redirect('','refresh');
			} else {
				$this->session->set_flashdata('error_message' , "Please enter valid username and password");
				redirect('','refresh');
			}
		}
	}
	public function logout()
	{
		session_destroy();
		redirect('','refresh');
	}
	public function myerror()
	{ 	
		$data['page_name'] = "myerror";
		$this->load->view('myerror',$data);
	}
	
	
}
