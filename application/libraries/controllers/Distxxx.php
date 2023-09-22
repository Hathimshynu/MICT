<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function gen_roi(){
	    
	    $roi_date = date('Y-m-d');
    	$payouts = $this->db->where('roi_date <',$roi_date)->get('roi')->result_array();
    	foreach ($payouts as $key => $n) {
    			$dataearn1 = array(
    				'user_id' => $n['user_id'],
    				'entry_date'=> $n['roi_date'],
    				'credit' => $n['amount'],
                    'balance' => $n['amount']+($this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$n['user_id'])->get('account')->row()->balance+0),
    				'remark' => 'ROI',
    				'description' => $n['inves_id']
    			);
    			$this->db->insert('account', $dataearn1);
    	}
    	$this->db->where('roi_date <', $roi_date)->delete('roi'); 
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
        if ($this->session->userdata('userid') != 1)
            redirect('','refresh');

        if ($deleteid == '') {
            $this->session->set_flashdata('error_message', 'Check Your ID');
			redirect('users','refresh');

        } else {
            $this->db->set('status', "IF(status='Active','Inactive','Active')", false);
            $this->db->where('user_role_id',$deleteid);
			$this->db->update('user_role');
			$this->session->set_flashdata('success_message', 'Blocked Successfully');
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
			  $config['upload_path'] = 'assets/receipt';  
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

	public function update_profile()
	{
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
			$this->session->set_flashdata('success_message', 'Profile Update Request Send Successfully');
			redirect('user_profile','refresh');
		} else {
			$this->session->set_flashdata('error_message', 'Request Not Send');
			redirect('user_profile','refresh');
		}   
		  
	}

	

	public function bank()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');

		if($_POST){

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


		$data['bank'] = $this->admin->get_row_data('bank','user_id',$this->session->userdata('userid'));
		$data['page_name'] = "bank";
		$this->load->view('bank',$data);	  
	}


	public function kyc()
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');

		if($_POST){
			$data['user_id'] = $this->input->post('user_id');
		
			$data['afile'] = $this->input->post('aadharimage');
			$data['pfile'] = $this->input->post('panimage');
			
			$data['aadhar'] = $this->input->post('aadhar');
			$data['pan'] = $this->input->post('pan');
			
			$kycinsert = $this->db->insert('kyc_request',$data);
		if ($kycinsert){
			$this->session->set_flashdata('success_message', 'KYC Update Request Send Successfully');
			redirect('kyc','refresh');
		} else {
			$this->session->set_flashdata('error_message', 'Request Not Send');
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
		


	public function admin_request()
	{
		if ($_POST) {
            if($this->admin->add_admin_request($this->session->userdata('userid'))) {
            	$this->session->set_flashdata('success_message', 'Request Successfully');
            	redirect('investment_request','refresh');
            } else {
            	$this->session->set_flashdata('error_message', 'check your details');
            	redirect('investment_request','refresh');
            }
		}
		$data['pin_request'] = $this->admin->get_tabledata('admin_request','user_id',$user_id);
		$data['page_name'] = "investment_request";
		$this->load->view('investment_request',$data);
	}

	
	public function view_investment_request($param1='',$param2='')
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		$data['wallet_request'] = $this->db->get('admin_request')->result_array();
		$data['page_name'] = "view_investment_request";
		$this->load->view('view_investment_request',$data);
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
        	$result = $this->db->update('admin_request',array('status'=>'Rejected','approve_date'=>date("Y-m-d")));


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

	public function registration()
	{
        if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		if ($_POST) {

			$result = $this->admin->register_manage();
			if($result) {
				$this->session->set_flashdata('success_message', 'Registred Successfully');
				redirect('registration','refresh');
			} else {
				$this->session->set_flashdata('error_message', 'Please Check Your Datas');
				redirect('registration','refresh');
			}
		}
		$data['ref_id'] = $this->db->get_where('user_role',array('user_role_id'=>$this->session->userdata('userid')))->row()->username;
		$data['name'] = $this->db->get_where('profile',array('profile_id'=>$this->session->userdata('userid')))->row()->name;
		$data['page_name'] = "registration";
		$this->load->view('registration',$data);
	}

	public function get_user_details()
    {
        $userids = $this->db->get_where('user_role',array('username'=>$this->input->post('username')))->row()->user_role_id;
        $userid = $this->db->get_where('profile',array('profile_id'=>$userids))->row_array();
        if (!empty($userid)) {
	            echo json_encode($userid);
	        } else {
	            echo "empty";
	        }
        
    }

    public function check_details()
    {
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
			$user_id = $this->session->userdata('userid');
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

	

	




















































    
    
    public function view_payout(){
        if ($_POST) {
            $viewdate = date_format(date_create($this->input->post('viewdate')),"Y-m-d");
            $data['paid'] = $this->db->where('entry_date',$viewdate)->where('remark','Paid')->get('account')->result_array();
        }
        
        $data['page_name'] = "view_payout";
		$this->load->view('view_payout',$data);
    }
    public function gen_payout(){
	    
	    $entry_date = date_format(date_create($this->input->post('mydate')),"Y-m-d");
    	$payouts = $this->db->distinct()->select('user_id')->where('entry_date <',$entry_date)->get('account')->result_array();
    	foreach ($payouts as $key => $n) {
    	    $amount = $this->db->select_sum('amount')->where('user_id',$n['user_id'])->get('account')->row()->amount+0;
    	    if($amount > 0){
    			$data_paid = array(
    				'user_id' => $n['user_id'],
    				'entry_date'=> $entry_date,
    				'amount' => -$amount,
    				'remark' => 'Paid',
    				'description' => 'Paid'
    			);
    			$this->db->insert('account', $data_paid);
    	    }
    	}
    }
    
    
    
    //////Accessbility("login"/"logout" as "user"/"admin")

	

	///// Reset Password

	public function password_reset()
    {
        if ($_POST) {
            $user_id = $this->session->userdata('userid');
            $old_pass = sha1($this->input->post('old_pass'));
            $new_pass = sha1($this->input->post('new_pass'));
            $p = $this->input->post('new_pass');
            $this->db->where('password',$old_pass);
            $this->db->where('user_id',$user_id);
            $details = $this->db->get('user')->row_array();
            if (!empty($details)) {
                $this->db->where('user_id',$user_id);
                $this->db->update('user',array('password'=>$new_pass,'p'=>$p));
                $this->session->set_flashdata('c_success_message', 'Password update Successfully');
                redirect('password_reset','refresh');
            } else {
                $this->session->set_flashdata('c_error_message', 'Password Not Existing');
                redirect('password_reset','refresh');
            }
        }
        $data['page_name'] = "password_reset";
        $this->load->view('password_reset',$data);
    }

	/////// Registration




	////// permission for an user to access account

	


	

	

	

	public function view_updates_approve($id)
	{

		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');

		$user_updates = $this->db->order_by("id", "DESC")->get_where('user_updates', array('user_id' => $id))->row_array();
		$data['user_id'] = $user_updates['user_id'];
		$data['phone'] = $user_updates['mob'];
		$data['name'] = $user_updates['name'];
		$data['pimage'] = $user_updates['pimage'];   
		$data['email'] = $user_updates['email'];   
		$data['afile'] = $user_updates['afile'];  
		$data['pfile'] = $user_updates['pfile'];  
		$data['cfile'] = $user_updates['cfile'];    
		$data['acc_no'] = $user_updates['acc_no'];
		$data['acc_name'] = $user_updates['acc_name'];
		$data['ifsc'] = $user_updates['ifsc'];
		$data['b_branch'] = $user_updates['b_branch'];
		$data['aadhar'] = $user_updates['aadhar'];
		$data['pan'] = $user_updates['pan'];
		$data['door'] = $user_updates['door'];
		$data['street'] = $user_updates['street'];
		$data['city'] = $user_updates['city'];
		$data['district'] = $user_updates['district'];
		$data['state'] = $user_updates['state'];
		$data['pin'] = $user_updates['pin'];
		$data['status'] = "Active";
		$data['bank_status'] = "Approved";

		$this->db->where('user_id',$data['user_id']);
		$re_ban = $this->db->update('user',$data);
		if ($re_ban) {
			$this->session->set_flashdata('success_message', 'Request Accepted Successfully');
			$data_xxx['status'] = "Approved";

			$this->db->where('user_id',$data['user_id']);
			$re_ban = $this->db->update('user_updates',$data_xxx);
			redirect('view_updates','refresh');  
		} else {
			$this->session->set_flashdata('Error_message', 'Not Accepted Successfully');
			redirect('view_updates','refresh');  
		}
	}

	public function view_updates_reject($id)
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');
		$data_b['status'] = "Rejected";
		$this->db->where('user_id',$id);
		$re_ban = $this->db->update('user_updates',$data_b);
		if ($re_ban == true) {
			$this->session->set_flashdata('success_message', 'Request Rejected Successfully');
			$this->admin->delete_rowdata('user_updates', 'user_id', $id);
			redirect('view_updates','refresh');  
		} else {
			$this->session->set_flashdata('Error_message', 'Not Successfully');
			redirect('view_updates','refresh');  
		}

	}

	

	public function do_upload($filename,$uploadpath,$page)
	{
		$config['upload_path']          = $uploadpath;
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 512;
        //$config['max_width']            = 300;
        //$config['max_height']           = 300;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($filename))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error_message',  $error['error']);
			redirect($page,'refresh');
		}
	}


	public function pin_request()
	{
		if ($this->session->userdata('admin_usertype') == "a") 
			redirect('','refresh');
		$user_id = $this->session->userdata('userid');
		if ($_POST) {
			$pin_value = $this->input->post('pin_value');
			if ($pin_value != 0) {
				log_message("error",$pin_value);
				if ($this->admin->add_pin_request($user_id,$file_name)) {
					$this->session->set_flashdata('success_message', 'Request Successfully');
					redirect('pin_request','refresh');
				} else {
					$this->session->set_flashdata('error_message', 'Please Enter Amount');
					redirect('pin_request','refresh');
				}

			} else {
				$this->session->set_flashdata('error_message', 'Please Enter Amount');
				redirect('pin_request','refresh');
			}
		}
		if ($this->db->where_in('status', ['Accepted','Request'])->where('user_id',$this->session->userdata('userid'))->count_all_results('wallet_request')+0>0)
			redirect('','refresh');
		$username = $this->admin->get_tabledata('user','user_id',$user_id);
		log_message("error",$username['username']);
		$data['user'] = $this->admin->get_row_data('user','user_id',$user_id);

		$data['pin_request'] = $this->admin->get_tabledata('wallet_request','user_id',$user_id);
		$data['page_name'] = "pin_request";
		$this->load->view('pin_request',$data);
	}

	public function view_pin_request($param1='',$param2='')
	{
		if ($this->session->userdata('login') != "1") 
			redirect('','refresh');

		$data['wallet_request'] = $this->db->get('wallet_request')->result_array();
		$data['page_name'] = "view_pin_request";
		$this->load->view('view_pin_request',$data);
	}



	public function get_position_details()
	{
		$parent_id_check = $this->db->get_where('user',array('username'=>$this->input->post('parent_id_check')))->row()->user_id;
		$position_code = $this->input->post('position_code');
		$details = $this->db->get_where('tree', array('parent_id' => $parent_id_check, 'position' => $position_code))->row_array();
                       // log_message("error", $this->db->last_query());

		if (empty($details)) {
			echo "empty";
		} else {
			echo "yes";
		}
	}

	/// Genology 


	

    

	  

	public function check()
	{
		$levelcounts = $this->admin->get_children('main_tree',3,0);
		for ($i=0; $i < count($levelcounts); $i++) { 
			//log_message("error","child count:".count($levelcounts)."\n requierd count:".pow(2,$i+1)."\n");
		  log_message('error',"level".($i+1)." -".$levelcounts[$i]);
			/*if($levelcounts[$i] == pow(2,$i+1))
			{
			}*/
		  }
	    //$this->admin->dzonalrebirth();
    			
                
                /*$alllevelcounts = $this->admin->getparentatlevel('tree',1,1,$list_child=array());
	    for ($j=0; $j < count($alllevelcounts); $j++) { 
						if($alllevelcounts[$j][2] != '') {
                    Log_message("error",$alllevelcounts[$j][2]."\n");
							$childarray[] = $alllevelcounts[$j][2];
						}
	    }*/
	    /**/
	    //$this->admin->rebirth();
	    //$this->admin->zonal();
	    //$this->admin->bdmincome(19);
		//$this->admin->magic();
		//$this->admin->bdmincome(4);
		//$this->admin->add_referal_tree(1);
		//$alllevelcounts = $this->admin->getparentatlevel('tree',1,1,$list_child=array());
		//Log_message("error",$alllevelcounts[$i]."\n");
		//echo '<pre>'; print_r($alllevelcounts); echo '</pre>';
		
		//Log_message("error",count($alllevelcounts)."\n");
		//for ($i=0; $i < count($alllevelcounts); $i++) { 
		    
		    //Log_message("error",$alllevelcounts[$i][2]."\n");
		    
		    /*if($alllevelcounts[$i] != pow(2,$i+1))
		    {
		        Log_message("error",$alllevelcounts[$i]."-".pow(2,$i+1)."\n");
		        Log_message("error",$i);
		        break;
		    }*/
		    
		//}
		
		    
	}
	
	
	public function delete_user()
    {
        $deleteid = $this->input->post('hids');
        if ($this->session->userdata('userid') != 1)
            redirect('','refresh');

        if ($deleteid == '') {
            $this->session->set_flashdata('error_message', 'Check Your ID');
			redirect('customers','refresh');

        } else {
            $req = $this->db->where('user_id',$deleteid)->where('status','Request')->count_all_results('admin_request');
            if($req == 0) {
                $this->db->where('user_id',$deleteid);
    			$this->db->delete('user');
    			$this->session->set_flashdata('success_message', 'Delete Successfully');
			    redirect('customers','refresh');
            } else {
                $this->session->set_flashdata('success_message', 'User request is in Progress');
			    redirect('customers','refresh');
            }
			
        }
    }
    
    
	
	
	public function user_genealogy($select_parentid = '')
    {
        if ($this->session->userdata('login') != 1)
            redirect('','refresh');

        if ($select_parentid == '') {
            $user_id = $this->session->userdata('userid');
            $data['sponsor'] = $this->admin->get_row_data('user','user_id',$user_id);
        } else {
            $data['sponsor'] = $this->admin->get_row_data('user','user_id',$select_parentid);
        }
        $data['usertype'] = $this->session->userdata('usertype');
        $data['page_name'] = "user_genealogy";
        $this->load->view('user_genealogy',$data);
    }
	
	public function add_deposite()
	{
	    if ($this->session->userdata('login') == 0)
			redirect('','refresh');
		if ($_POST) {
		    $data['amount'] = $this->input->post('amount');
		    if ($this->db->insert('fund_wallet',$data)) {
				$this->session->set_flashdata('success_message' , "Success");
				redirect('','refresh');
			} else {
				$this->session->set_flashdata('error_message' , "Not Success");
				redirect('','refresh');
			}
		}
	}


	
	public function search_userid()
    {
        $search_id = $this->input->post('check_userid');

        $this->db->where('username',$search_id);
        $check = $this->db->get('user')->row_array();

        if (!empty($check)) {
            redirect('genealogy/'.$check['user_id'],'refresh');
        } else {
            $this->session->set_flashdata('error_message', '! Userid not available. Please recheck your Userid...');
            redirect('genealogy','refresh');
        }
    }
    
    
    


    /*public function referral($parent_ids="")
	{
	    $parent_id = hex2bin($parent_ids);

		if ($parent_id == "") 
		$parent_id = '1';
			$plid_check = $this->db->get_where('user',array('username'=>$parent_id))->row()->user_id;
			$childs = $this->db->where('ref_id',$plid_check)->where('bank_status','Approved')->count_all_results('user');
        	if ($childs <= 1) {
				$data['ref_id'] = $this->db->get_where('user',array('username'=>$parent_id))->row()->username;
				$data['name'] = $this->db->get_where('user',array('username'=>$parent_id))->row()->name;
			} else {
				$data['full'] = 'yes';
				$data['phone'] = $this->db->get_where('user',array('username'=>$parent_id))->row()->phone;
			}
			

			//$data['packages'] = $this->db->get('card')->result_array();
		$data['page_name'] = "referral";
		$this->load->view('referral',$data);
	}*/

	

	
	public function software_support()
    {
		$data['page_name'] = "software_support";
		$this->load->view('software_support',$data);
	}

	/*public function view_packages()
    {
        if ($this->session->userdata('userid') != 1)
            redirect('','refresh');
		$data['page_name'] = "view_packages";
		$this->load->view('view_packages',$data);
	}


	public function update_packages()
    {
        if ($this->session->userdata('userid') != 1)
            redirect('','refresh');
		$userdata = array(
			'name' => $this->input->post('package_name'),
			'package' => $this->input->post('package_count'),
			'type' => $this->input->post('package_type'),
			'amount' => $this->input->post('package_amount')
		);

        $this->db->where('id', $this->input->post('package_id'));
        $this->db->update('packages', $userdata);
		$data['page_name'] = "view_packages";
		$this->load->view('view_packages',$data);

	}

	public function view_master()
    {
        if ($this->session->userdata('userid') != 1)
            redirect('','refresh');
		$data['page_name'] = "master";
		$this->load->view('master',$data);
	}

	public function update_master()
    {
        if ($this->session->userdata('userid') != 1)
            redirect('','refresh');
		$userdata = array(
			'dir_referral' => $this->input->post('dir_referral'),
			'bonus' => $this->input->post('bonus'),
			'passive' => $this->input->post('passive'),
			'nominee' => $this->input->post('nominee')
		);

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master', $userdata);
        log_message("error", $this->db->last_query());
		$data['page_name'] = "master";
		$this->load->view('master',$data);

	}

	public function referral_manage()
	{
	    if ($this->session->userdata('login') != 1)
            redirect('','refresh');

        $res = $this->admin->add_referral($this->input->post('placement_id'));
		
		if($res == true){
			$this->session->set_flashdata('success_message', 'Customer Add Successfully');
			$this->session->sess_destroy();
			redirect('http://localhost/works/novelx/ktk/');
		} else {
			$this->session->set_flashdata('error_message', 'Not Successfull');
			redirect('','refresh');  
		}
		
	}*/


	public function packages($doit='',$id="") {
		if ($this->session->userdata('userid') != 1)
			redirect('','refresh');

		if ($doit == 'delete') {
			$this->db->where('id',$id);
			$this->db->delete('packages');
			$this->session->set_flashdata('success_message', 'Delete Successfully');
			redirect('packages','refresh');
		}

		if ($_POST) {
			$data['name'] = $this->input->post('name');
			$data['amount'] = $this->input->post('amount');
			$this->db->insert('packages',$data);
			$this->session->set_flashdata('success_message', 'News send Successfully');
			redirect('packages','refresh');
		}

		$data['page_name'] = "packages";
		$this->load->view('packages',$data);
	}




    public function mgenealogy($select_parentid = '')
    {
        if ($this->session->userdata('login') != 1)
            redirect('','refresh');

        if ($select_parentid == '') {
            $user_id = $this->session->userdata('userid');
            $data['sponsor'] = $this->admin->get_row_data('user','user_id',1);
        } else {
            $data['sponsor'] = $this->admin->get_row_data('user','user_id',$select_parentid);
        }
        $data['usertype'] = $this->session->userdata('usertype');
        $data['page_name'] = "mgenealogy";
        $this->load->view('mgenealogy',$data);
    }

    public function ggenealogy($select_parentid = '')
    {
        if ($this->session->userdata('login') != 1)
            redirect('','refresh');

        if ($select_parentid == '') {
            $user_id = $this->session->userdata('userid');
            $data['sponsor'] = $this->admin->get_row_data('user','user_id',1);
        } else {
            $data['sponsor'] = $this->admin->get_row_data('user','user_id',$select_parentid);
        }
        $data['usertype'] = $this->session->userdata('usertype');
        $data['page_name'] = "ggenealogy";
        $this->load->view('ggenealogy',$data);
    }

	

	/*public function topup() {
		{
			if ($this->session->userdata('login') != 1)
            redirect('','refresh');
			$user_id = $this->session->userdata('userid');
			if ($_POST) {
				$pin_value = $this->input->post('pin_value');
				if ($pin_value != 0) {
					if ($this->admin->add_topup_request($user_id,$file_name)) {
						$this->session->set_flashdata('success_message', 'Request Successfully');
						redirect('topup','refresh');
					} else {
						$this->session->set_flashdata('error_message', 'Please Enter Amount');
						redirect('topup','refresh');
					}
	
				} else {
					$this->session->set_flashdata('error_message', 'Please Enter Amount');
					redirect('topup','refresh');
				}
			}
			$data['user'] = $this->admin->get_row_data('user','user_id',$user_id);
			$data['topup'] = $this->admin->get_tabledata('topup_request','user_id',$user_id);
			$data['page_name'] = "topup";
			$this->load->view('topup',$data);
		}
	}
	public function topup_requests() {
		if ($this->session->userdata('login') != 1)
            redirect('','refresh');
            $user_id = $this->session->userdata('userid');

		if ($param1 == 'approval') {
			$rej_date = strtotime(date("m/d/Y"));
			$remark = $this->input->post('remark');
			$epinr = $this->admin->get_row_data('topup_request','topup_request_id',$param2);
			$this->db->where('topup_request_id',$epinr['topup_request_id']);
			$this->db->update('topup_request',array('status'=>'Accepted','remark'=>$remark,'approve_date'=>$rej_date));
			//$this->admin->pin_aprroval($param2);
			$this->session->set_flashdata('success_message', 'Request Accepted Successfully');
			redirect('topup_requests','refresh');  
		}

		if ($param1 == 'reject') {
			$rej_date = strtotime(date("m/d/Y"));
			$remark = $this->input->post('remark');
			$epinr = $this->admin->get_row_data('topup_request','topup_request_id',$param2);
			$this->db->where('topup_request_id',$epinr['topup_request_id']);
			$this->db->update('topup_request',array('status'=>'Rejected','remark'=>$remark,'approve_date'=>$rej_date));
			$this->session->set_flashdata('success_message', 'Request Reject Successfully');
			redirect('topup_requests','refresh');  
		}

		$data['topup_request'] = $this->admin->get_tabledata('topup_request');
		$data['page_name'] = "topup_requests";
		$this->load->view('topup_requests',$data);
	}*/



	
	public function wallet_transfer()
	{
		$user_id = $this->session->userdata('userid');
    if ($_POST) {
			$pin_value = $this->input->post('pin_value');
			if ($pin_value != 0) {
				log_message("error",$pin_value);
				if ($this->admin->add_wallet_transfer($user_id,$file_name)) {
					$this->session->set_flashdata('success_message', 'Request Successfully');
					redirect('wallet_transfer','refresh');
				} else {
					$this->session->set_flashdata('error_message', 'Please Enter Amount');
					redirect('wallet_transfer','refresh');
				}
			} else {
				$this->session->set_flashdata('error_message', 'Please Enter Amount');
				redirect('wallet_transfer','refresh');
			}
		}
		$data['user'] = $this->admin->get_row_data('user','user_id',$user_id);
		$data['wallet_transfer'] = $this->admin->get_tabledata('wallet_transfer','sender_id',$user_id);
    	log_message("error",$user_id);

		$data['page_name'] = "wallet_transfer";
		$this->load->view('wallet_transfer',$data);
	}

	
	
	/*public function bonus()
	{
		if ($this->session->userdata('userid') != 1)
			redirect('','refresh');
		if ($_POST) {
			$amount = $this->input->post('amount');
			if ($amount != 0) {
			    $this->db->trans_start(); 
			    $user_id = $this->input->post('user_id');
			    $p[0] = $this->input->post('l2');
			    $p[1] = $this->input->post('l3');
			    $p[2] = $this->input->post('l1');
			    
			    $l[0] = ($amount*$p[0])/100;
			    $l[1] = ($amount*$p[1])/100;
			    $l[2] = ($amount*$p[2])/100;
			    
			    $dataearnx = array(
                        'user_id' => $user_id,
                        'amount' => $l[2],
                        'entry_date'=> date('Y-m-d H:i:s'),
                        'remark' => "Bonus",
                        'i_from' => $user_id,
                        'dic' => $this->input->post('dic')
                        );
                        $this->db->insert('account', $dataearnx);
			    
			    $parentacc = $this->admin->get_all_parent('tree',$user_id,$res=array());
                for ($i=0; $i < 2; $i++) { 
                    if($parentacc[$i] != ""){
                        $dataearn = array(
                        'user_id' => $parentacc[$i],
                        'amount' => $l[$i],
                        'entry_date'=> date('Y-m-d H:i:s'),
                        'remark' => "Bonus",
                        'i_from' => $user_id,
                        'dic' => $this->input->post('dic')
                        );
                        $this->db->insert('account', $dataearn);
                        log_message("error", $this->db->last_query());
                    }
                }
                
                $this->db->trans_complete(); 
                if($this->db->trans_status() == FALSE){
                    $this->session->set_flashdata('error_message', 'Not Sucess Please check your details');
					redirect('bonus','refresh');             
                    return FALSE;
                }else{
                    
                    $this->session->set_flashdata('success_message', 'Request Successfully');
					redirect('bonus','refresh');
                    return true;
                }

			} else {
				$this->session->set_flashdata('error_message', 'Please Enter Amount');
				redirect('bonus','refresh');
			}
		}
		$data['bonus'] = $this->admin->get_tabledata('wallet_request','user_id',$user_id);
		$data['page_name'] = "bonus";
		$this->load->view('bonus',$data);
	}*/
	

	/*public function topup_request()
	{
		if ($this->session->userdata('userid') != 1)
			redirect('','refresh');
		$user_id = $this->session->userdata('userid');
		if ($_POST) {
			$pin_value = $this->input->post('pin_value');
			if ($pin_value != 0) {
				if ($this->admin->add_topup_request($user_id,$file_name)) {
					$this->session->set_flashdata('success_message', 'Request Successfully');
					$this->session->sess_destroy();
			        redirect('http://localhost/works/novelx/ktk/');
				} else {
					$this->session->set_flashdata('error_message', 'Please Enter Amount');
					redirect('permission_request','refresh');
				}

			} else {
				$this->session->set_flashdata('error_message', 'Please Enter Amount');
				redirect('permission_request','refresh');
			}
		}
		$data['pin_request'] = $this->admin->get_tabledata('topup_request','user_id',$user_id);
		$data['page_name'] = "permission_request";
		$this->load->view('permission_request',$data);
	}*/


	/*public function topup_approve()
	{
		if ($this->session->userdata('userid') != 1)
			redirect('','refresh');
			log_message("error",'gfhgfvhchvcgcgffc');
		if ($this->input->post('datastatus') == 'Approve') {
			log_message("error",'gfhgfvhchvcgcgffc');
			$remark = $this->input->post('remark');
			$hids = $this->input->post('hids');
			$rej_date = date('Y-m-d');
			$epinr = $this->admin->get_row_data('topup_request','id',$hids);
			$this->db->where('id',$epinr['id']);
			$this->db->update('topup_request',array('status'=>'Accepted','remark'=>$remark,'approve_date'=>$rej_date));
			log_message("error",$this->db->last_query());
			$package_value = $this->db->select('package')->where('amount',$epinr['topup_amount'])->get('packages')->row()->package+0;
			$this->db->set('package', 'package+'.$package_value, FALSE);
			$this->db->where('user_id',$epinr['user_id']);
			$this->db->update("user");

			$this->session->set_flashdata('success_message', 'Request Accepted Successfully');
			redirect('topup_requests','refresh');  
		} 
		if ($this->input->post('datastatus') == 'Reject') {
			$remark = $this->input->post('remark');
			$hids = $this->input->post('hids');
			$rej_date = date('Y-m-d');
			$epinr = $this->admin->get_row_data('topup_request','id',$hids);
			$this->db->where('id',$epinr['id']);
			$this->db->update('topup_request',array('status'=>'reject','remark'=>$remark,'approve_date'=>$rej_date));
			$this->session->set_flashdata('success_message', 'Request Reject Successfully');
			redirect('topup_requests','refresh');  
		} 
	}*/
	public function view_pin_approve()
    {
    	if ($this->session->userdata('userid') != 1)
    		redirect('','refresh');

    	if ($this->input->post('datastatus') == 'Approve') {
			$remark = $this->input->post('remark');
			$hids = $this->input->post('hids');
			$rej_date = date('Y-m-d');
			$epinr = $this->admin->get_row_data('wallet_request','wallet_request_id',$hids);
			$this->db->where('wallet_request_id',$epinr['wallet_request_id']);
			$this->db->update('wallet_request',array('status'=>'Accepted','remark'=>$remark,'approve_date'=>$rej_date));
			$userdata=array(
				'user_id' => $epinr['user_id'],
				'wallet_value' => $epinr['wallet_value'],
				'entry_date' =>date("Y-m-d")
			);
			if($this->db->insert('wallet', $userdata))
			$this->session->set_flashdata('success_message', 'Request Accepted Successfully');
			redirect('view_pin_request','refresh'); 
    	} 

    	if ($this->input->post('datastatus') == 'Reject') {
    		$remark = $this->input->post('remark');
    		$hids = $this->input->post('hids');
    		$rej_date = date('Y-m-d');
    		$epinr = $this->admin->get_row_data('wallet_request','wallet_request_id',$hids);
    		$this->db->where('wallet_request_id',$epinr['wallet_request_id']);
    		$this->db->update('wallet_request',array('status'=>'reject','remark'=>$remark,'approve_date'=>$rej_date));
    		$this->session->set_flashdata('success_message', 'Request Reject Successfully');
    		redirect('view_pin_request','refresh');  
    	} 

    }

	public function withdraw_request()
	{
		if ($this->session->userdata('userid') != 1)
		redirect('','refresh');

		$dataroiaccount= array(
            'user_id' => $this->input->post('hids'),
            'entry_date'=> date('Y-m-d'),
            'remark' => $this->input->post('remark'),
	        );
	    if ($this->db->insert('withdraw_request', $dataroiaccount))
	    	$this->session->set_flashdata('success_message', 'Request Accepted Successfully');
		redirect('','refresh');  
	}

	public function withdraw_approve()
	{
		if ($this->session->userdata('userid') != 1)
			redirect('','refresh');
		$withdetails = $this->db->get_where('withdraw_request',array('id'=>$this->input->post('hids')))->row_array();
		$accdetails = $this->db->get_where('bank',array('user_id'=>$withdetails['user_id']))->row_array();
		$dataearn = array(
		'status'=>'Paid',
		'approve_date'=>date('Y-m-d H:i:s'),
		'dic' => $accdetails['acc_name'].", ".$accdetails['acc_no'].", ".$accdetails['ifsc']
		);
		$this->db->where('id',$this->input->post('hids'));
		if($this->db->update('withdraw_request',$dataearn)){
            $this->session->set_flashdata('error_message', 'Not Sucess Please check your details');
			redirect('view_withdraw','refresh');         
        }else{
            
            $this->session->set_flashdata('success_message', 'Request Accepted Successfully');
          redirect('view_withdraw','refresh');  
        }		
	}

	public function withdraw_reject($id)
	{
		if ($this->session->userdata('userid') != 1)
			redirect('','refresh');

		$this->db->where('user_id',$id);
		$this->db->update('withdraw_request',array('status'=>'Rejected'));
		$this->session->set_flashdata('success_message', 'Request Rejected Successfully');
		redirect('view_withdraw','refresh');  
	}
	
	public function gregistration($parent_id = '',$position = '')
	{

		//if ($this->session->userdata('login') != 1)
		//	redirect('','refresh');
			
		if($this->session->userdata('userid') == 0)
		$userid=1;
		else
		$userid = $this->session->userdata('userid');
		$data['usertype'] = $this->session->userdata('usertype');
		$data['user_id'] = $userid;
		if ($parent_id == "") {
			$data['ref_id'] = $this->db->get_where('user',array('user_id'=>$userid))->row()->username;
			$data['name'] = $this->db->get_where('user',array('user_id'=>$userid))->row()->name;
		}
		else {
			$childs = $this->db->where('parent_id',$parent_id)->count_all_results('tree');
        	if ($childs <= 1) {
			$data['ref_id'] = $this->db->get_where('user',array('user_id'=>$parent_id))->row()->username;
			$data['name'] = $this->db->get_where('user',array('user_id'=>$parent_id))->row()->name;
			} else {
				$this->session->set_flashdata('error_message', 'User Full');
	            redirect('genealogy','refresh');
			}

		}
		if($position == "right"){
		    $posavilable = $this->db->get_where('tree',array('parent_id'=>$parent_id))->row()->position;
    		if($posavilable == 'right')
    		redirect('genealogy','refresh');
    		else
    		$data['position'] = "right";
		} else {
		    $posavilable = $this->db->get_where('tree',array('parent_id'=>$parent_id))->row()->position;
    		if($posavilable == 'left')
    		redirect('genealogy','refresh');
    		else
    		$data['position'] = "left";
		}
		
		$data['page_name'] = "gregistration";
		$this->load->view('gregistration',$data);
	}







	



	public function gregister_manage()
	{
		if ($this->session->userdata('login') != 1) {
			redirect('','refresh');
		}
		$user_id = $this->session->userdata('userid');
		$usertype = $this->session->userdata('usertype');
		if ($_POST) {
		$value = $this->input->post('j_amount');
		//Log_message("error","ok here".$value);
		if ($value != 0) {
			$check_pin = $this->admin->get_row_data('wallet','user_id',$user_id);
			if ($usertype == "a") {
				$res = $this->admin->gadd_customer($user_id,'user.png');
				if($res == true){
					$this->session->set_flashdata('success_message', 'Customer Add Successfully');
					redirect('registration');
				} else {
					$this->session->set_flashdata('error_message', 'Not Successfull');
					redirect('registration');  
				}
			} elseif (!empty($check_pin)) {
			            log_message("error", "user");

				if ($value <= $check_pin['wallet_value']) {
					if($this->admin->gadd_customer($user_id,'user.png'))
					{
					$res = $check_pin['wallet_value'] - $value;
					$this->db->where('user_id',$user_id);
					$this->db->update('wallet',array('wallet_value'=>$res));
					$this->session->set_flashdata('success_message', 'Customer Add Successfully');
					redirect('registration');
					}
				} else {
					$this->session->set_flashdata('error_message', 'E-Pin value empty');
					redirect('registration');
				}
			} else {
				$this->session->set_flashdata('error_message', 'E-Pin value empty');
				redirect('registration');
			}
		} else {
			$this->session->set_flashdata('error_message', 'Please Enter Amount');

			redirect('registration','refresh');
		}
		}

	}


	/*public function add_topup()
	{
		//if ($this->session->userdata('login') != 1) 
		//	redirect('','refresh');
		$value = $this->input->post('j_amount');
		$topupamount = $this->db->select_sum('topup_amount')->from('topup')->where('user_id',$this->session->userdata('userid'))->get()->row()->topup_amount;

		$check_pin = $this->admin->get_row_data('wallet','user_id',$this->session->userdata('userid'));

		if ($value <= $check_pin['wallet_value']  ) {
			$res = $check_pin['wallet_value'] - $value;
			$this->db->where('user_id',$this->session->userdata('userid'));
			$u_epin = $this->db->update('wallet',array('wallet_value'=>$res));
			if ($u_epin) {
				$data['user_id'] = $this->session->userdata('userid');
				$data['topup_amount'] = $value;
				$data['topup_date'] = date('Y-m-d');
				$r_topup = $this->db->insert('topup',$data);
				if (!empty($r_topup))        {
					$this->session->set_flashdata('success_message', 'Topuped');
					redirect('topup','refresh');
				} else {
					$this->session->set_flashdata('error_message', 'Not Topuped');
					redirect('topup','refresh');
				}        
			} else {
				$this->session->set_flashdata('error_message', 'Error not success');
				redirect('topup');
			}

		} else {
			$this->session->set_flashdata('error_message', 'Choose the next Package / Epin value low');
			redirect('topup','refresh');
		}

	}*/

	public function user_profile_admin($id="")
	{
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		if ($this->session->userdata('userid') == 0) 
			$data['cust'] = $this->admin->get_row_data('user','user_id',$id);
		else
			$data['cust'] = $this->admin->get_row_data('user','user_id',$this->session->userdata('userid'));
		
		$data['page_name'] = "user_profile_admin";
		$this->load->view('user_profile_admin',$data);
	}



	public function view_user_profile($id='')
	{
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		if ($this->session->userdata('userid') == 0)
			$data['cust'] = $this->admin->get_row_data('user','user_id',$id);
		else
			$data['cust'] = $this->admin->get_row_data('user','user_id',$this->session->userdata('userid'));
		$data['page_name'] = "view_user_profile";
		$this->load->view('view_user_profile',$data);
	}

	
	
	public function rebirth()
	{
		if ($this->session->userdata('login') != 1)
			redirect('','refresh');
		$data['page_name'] = "rebirth";
		$this->load->view('rebirth',$data);
	}

		public function entry_list($id='')
		{
			if ($this->session->userdata('login') != 1)
				redirect('','refresh');

			if ($_POST) {
				$fdate = date_format(date_create($this->input->post('fdate')),"Y-m-d");
				$tdate = date_format(date_create($this->input->post('tdate')),"Y-m-d");
				$this->db->where('user_id',$this->session->userdata("userid"));
				$this->db->where('join_date >=',$fdate);
				$this->db->where('join_date <=',$tdate);
				$data['users'] = $this->db->get('user')->result_array();

			} else {
				if ($id == '') {
					$data['users'] = $this->db->where('user_id !=', 0)->get('user')->result_array();
				} else {
					$data['users'] = $this->db->get_where('user',array('user_id'=>$id))->result_array();
				}
			}

			$data['page_name'] = "entry_list";
			$this->load->view('entry_list',$data);

		}

		
		
		
		
		public function through_admin($id='')
		{
		    /*$accepted = $this->db->select('user_id')->get_where('admin_request',array('status'=>'Accepted'))->result();
		    $childs = $this->db->select('child_id')->get('tree')->result();
		    $h=array_diff(array_column($childs,"child_id"),array_column($accepted,"user_id"));
			$data['earn'] = $h;*/
			$data['earn'] =$this->db->select('user_id')->get_where('admin_request',array('status'=>'Accepted','remark'=>'Admin'))->result_array();
			$data['page_name'] = "through_admin";
			$this->load->view('through_admin',$data);

		}
		
		public function list_rebirth($id='')
		{
			if ($this->session->userdata('login') != 1)
				redirect('','refresh');

			if ($_POST) {
				$fdate = date_format(date_create($this->input->post('fdate')),"Y-m-d");
				$tdate = date_format(date_create($this->input->post('tdate')),"Y-m-d");
				$this->db->where('plid',$this->session->userdata("userid"));
				$this->db->where('join_date >=',$fdate);
				$this->db->where('join_date <=',$tdate);
				$data['earn'] = $this->db->get('rebirth')->result_array();

			} else {
				if ($id == '') {
				    if ($this->session->userdata('userid') == 0)
					$data['earn'] = $this->db->get('rebirth')->result_array();
					else
					$data['earn'] = $this->db->get_where('rebirth',array('user_id'=>$this->session->userdata("userid")))->result_array();
				} else {
				    if ($this->session->userdata('userid') == 0)
					$data['earn'] = $this->db->get_where('rebirth',array('user_id'=>$id))->result_array();
				}
			}

			$data['page_name'] = "list_rebirth";
			$this->load->view('list_rebirth',$data);

		}


	public function update_profile_admin()
		{
			if ($this->session->userdata('login') != 1)
				redirect('','refresh');
			
			$n_details = $this->db->where('phone',$this->input->post('mob'))->where('user_id !=',$this->input->post('user_id'))->count_all_results('user')+0;
			//Log_message("error",$this->db->last_query());
			if ($n_details >= 3)        {
				$this->session->set_flashdata('error_message', 'Phone Number Already Exist');
				redirect('view_user_profile/'.$this->input->post('user_id'),'refresh');
				exit();
			}

			$n_detailsa = $this->db->where('aadhar',$this->input->post('aadhar'))->where('user_id !=',$this->input->post('user_id'))->count_all_results('user')+0;
			//Log_message("error",$this->db->last_query());
			if ($n_detailsa >= 3)        {
				$this->session->set_flashdata('error_message', 'Aadhar Already Exist');
				redirect('view_user_profile/'.$this->input->post('user_id'),'refresh');
				exit();
			}

			$n_detailsp = $this->db->where('pan',$this->input->post('pan'))->where('user_id !=',$this->input->post('user_id'))->count_all_results('user')+0;
			//Log_message("error",$this->db->last_query());
			if ($n_detailsp >= 3)        {
				$this->session->set_flashdata('error_message', 'PAN Already Exist');
				redirect('view_user_profile/'.$this->input->post('user_id'),'refresh');
				exit();
			}

			$data['phone'] = $this->input->post('phone');
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['pimage'] = $this->input->post('pimage');
			$data['afile'] = $this->input->post('aadharimage');
			$data['afile2'] = $this->input->post('aadhar2image');
			$data['pfile'] = $this->input->post('panimage');
			$data['cfile'] = $this->input->post('chequeimage');
			$data['acc_no'] = $this->input->post('a_number');
			$data['acc_name'] = $this->input->post('a_name');
			$data['ifsc'] = $this->input->post('ifsc');
			$data['b_name'] = $this->input->post('b_name');
			$data['b_branch'] = $this->input->post('b_branch');
			$data['aadhar'] = $this->input->post('aadhar');
			$data['pan'] = $this->input->post('pan');
			$data['nominee'] = $this->input->post('nominee');
			$data['mother'] = $this->input->post('mother');
			$data['door'] = $this->input->post('door');
			$data['street'] = $this->input->post('street');
			$data['city'] = $this->input->post('city');
			$data['district'] = $this->input->post('district');
			$data['state'] = $this->input->post('state');
			$data['bio'] = $this->input->post('bio');
			$data['pdescription'] = $this->input->post('pdescription');
			$data['pname'] = $this->input->post('pname');
			$data['ptitle'] = $this->input->post('ptitle');
			$data['productimg'] = $this->input->post('productimage');
			$data['company'] = $this->input->post('company');
			$data['designation'] = $this->input->post('designation');

			
			$data['bank_status'] = "Approved";

			$this->db->where('user_id',$this->input->post('user_id'));
			$re_ban = $this->db->update('user',$data);
			if ($re_ban) {
				$this->session->set_flashdata('success_message', 'Request Accepted Successfully');
				$data_xxx['status'] = "Approved";
				$this->db->where('user_id',$this->input->post('user_id'));
				$re_ban = $this->db->update('user_updates',$data_xxx);
				redirect('view_user_profile/'.$this->input->post('user_id'),'refresh');  
			} else {
				$this->session->set_flashdata('Error_message', 'Not Accepted Successfully');
				redirect('view_user_profile/'.$this->input->post('user_id'),'refresh');  
			} 
		}

    
		public function payout_history($id='')
		{
			$data['usertype'] = $this->session->userdata('usertype');
        	$data['user_id'] = $this->session->userdata('userid');
			$data['page_name'] = "payout_history";
			$this->load->view('payout_history',$data);

		}
		

	public function paid_list()
    {
        if ($this->session->userdata('login') != 1)
				redirect('','refresh');

			if ($_POST) {
				$fdate = date_format(date_create($this->input->post('fdate')),"Y-m-d");
				$tdate = date_format(date_create($this->input->post('tdate')),"Y-m-d");
				$data['paids'] = $this->db->get_where('account',array('remark'=>'Paid','entry_date >='=>$fdate,'entry_date <='=>$tdate,'user_id'=>$this->session->userdata("userid")))->result_array();

			} else {
				if ($id == '') {
				    if ($this->session->userdata('userid') == 0)
					$data['paids'] = $this->db->get_where('account',array('remark'=>'Paid'))->result_array();
					else
					$data['paids'] = $this->db->get_where('account',array('remark'=>'Paid','user_id'=>$this->session->userdata("userid")))->result_array();
				} else {
				    if ($this->session->userdata('userid') == 0)
					$data['paids'] = $this->db->get_where('account',array('remark'=>'Paid','user_id'=>$id))->result_array();
				}
			}

        $data['page_name'] = "paid_list";
        $this->load->view('paid_list',$data);
    }

    public function payout()
    {
        if ($this->session->userdata('userid') != 1)
            redirect('','refresh');

        $payout = $this->db->count_all_results('payout');
        if ($payout == 0) {
        	$this->db->where('user_id !=',0);
	        $this->db->where('status !=','Inactive');
	        $data_payout = $this->db->get('user')->result_array();

	        foreach ($data_payout as $key => $n) {
	        	$weekside = 'No';
	            $washout = 0;
	            if ($n['bank_status'] == 'Approved') {

	            	$leftcount = $this->admin->countChildren($n['user_id'], '', 'left')+1-$this->db->select_sum('left_count')->where('parent_id',$n['user_id'])->get('pairs')->row()->left_count;
	            	$righcount = $this->admin->countChildren($n['user_id'], '', 'right')+1-$this->db->select_sum('right_count')->where('parent_id',$n['user_id'])->get('pairs')->row()->right_count;

	            	/*$leftcount = 50-$this->db->select_sum('left_count')->where('parent_id',$n['user_id'])->get('pairs')->row()->left_count;
	            	$righcount = 40-$this->db->select_sum('right_count')->where('parent_id',$n['user_id'])->get('pairs')->row()->right_count;*/

	            	Log_message("error",$leftcount ."chghjk". $righcount);

	            	if ($leftcount != 0 && $righcount != 0) {
	            		
	            	if ($leftcount > 25 && $righcount > 25) {

	            		$paircount = 25;

	            		$amount_payable = ($this->db->select_sum('amount')->where('user_id',$n['user_id'])->where('trans','Earned')->get('account')->row()->amount+0)-$this->db->select_sum('amount')->where('user_id',$n['user_id'])->where('trans','Paid')->get('account')->row()->amount+($paircount*400);

	            		
	            		if ($leftcount > $righcount) {
	            			$weekside = 'right';
	            			$washout = $righcount - 25;
	            		} else {
	            			$weekside = 'left';
	            			$washout = $leftcount - 25;
	            		}

	            		if ($leftcount == $righcount) {
	            			$weekside = 'no';
	            			$washout = 0;
	            		}
	            		
	            	} else {
	            		if ($leftcount > $righcount) {
	            			$paircount = $righcount;
	            			$amount_payable = ($this->db->select_sum('amount')->where('user_id',$n['user_id'])->where('trans','Earned')->get('account')->row()->amount+0)-$this->db->select_sum('amount')->where('user_id',$n['user_id'])->where('trans','Paid')->get('account')->row()->amount+($paircount*400);
	            		} else {
	            			$paircount = $leftcount;
	            			$amount_payable = ($this->db->select_sum('amount')->where('user_id',$n['user_id'])->where('trans','Earned')->get('account')->row()->amount+0)-$this->db->select_sum('amount')->where('user_id',$n['user_id'])->where('trans','Paid')->get('account')->row()->amount+($paircount*400);
	            		}

	            		if ($leftcount == $righcount) {
	            			$paircount = $leftcount;
	            			$amount_payable = ($this->db->select_sum('amount')->where('user_id',$n['user_id'])->where('trans','Earned')->get('account')->row()->amount+0)-$this->db->select_sum('amount')->where('user_id',$n['user_id'])->where('trans','Paid')->get('account')->row()->amount+($paircount*400);
	            		}

	            	}

	            	$dataearn1 = array(
	    				'user_id' => $n['user_id'],
	    				'entry_date'=> date('Y-m-d'),
	    				'amount' => $amount_payable-(($amount_payable*10)/100),
	    				's_amount' => ($amount_payable*10)/100,
	    				'a_number' => $n['acc_no'],
	    				'ifsc' => $n['ifsc'],
	    				'b_name' => $n['b_name'],
	    				'weekside' => $weekside,
	    				'paircount' => $paircount,
	    				'washout' => $washout
	    				);
	    			$this->db->insert('payout', $dataearn1);
	    		}
	            }
        	} 
        } 

        $data['payouts'] = $this->db->get('payout')->result_array();
        $data['page_name'] = "payout";
        $this->load->view('payout',$data);
    }
    
    
    
    public function pay()
    {
        if ($this->session->userdata('userid') != 1)
            redirect('','refresh');
        $data['payouts'] = $this->db->get('payout')->result_array();
        $data['page_name'] = "pay";
        $this->load->view('pay',$data);
    }
    
    public function updatepayout(){
     // POST values
     $id = $this->input->post('id');
     $field = $this->input->post('field');
     $value = $this->input->post('value');
     $valueact = ($value*5)/100;
     // Update records
     $this->admin->update_payout($id,$field,$value);
     $this->admin->update_payout($id,'s_amount',$valueact);

     echo 1;
     exit;
   }
   
   public function updateuser(){
     // POST values
     $id = $this->input->post('id');
     $field = $this->input->post('field');
     $value = $this->input->post('value');
     // Update records
     $this->admin->update_user($id,$field,$value);
     $this->admin->update_user($id,'password',sha1($value));

     echo 1;
     exit;
   }


    public function topup_list()
    {
    	if ($this->session->userdata('login') != 1)
    		redirect('','refresh');

    	if ($_POST) {
    		$fdate = date_format(date_create($this->input->post('fdate')),"Y-m-d");
    		$tdate = date_format(date_create($this->input->post('tdate')),"Y-m-d");

    	$this->db->select('user_id')
	    		->from('topup')
	    		->where('entry_date >=',$fdate)
	    		->where('entry_date <=',$tdate)
	    		->group_by('user_id')
	    		->having('COUNT(user_id) >', 1);
    		$data['topups'] = $this->db->get()->result_array();
    		log_message("error", $this->db->last_query());
    	} 

    	$this->db->select('user_id')
	    	->from('topup')
	    	->group_by('user_id')
	    	->having('COUNT(user_id) >', 1);
    	$data['topups'] = $this->db->get()->result_array();
    	log_message("error", $this->db->last_query());
    	$data['page_name'] = "topup_list";
    	$this->load->view('topup_list',$data);

    }

    public function kyc_list()
    {
    	if ($this->session->userdata('login') != 1)
    		redirect('','refresh');

    	$data['banks'] = $this->db->get('user')->result_array();
    	//log_message("error", $this->db->last_query());
    	$data['page_name'] = "kyc_list";
    	$this->load->view('kyc_list',$data);

    }

    public function pin_list()
    {
    	if ($this->session->userdata('login') != 1)
    		redirect('','refresh');

    	$data['pins'] = $this->db->get('wallet')->result_array();
    	//log_message("error", $this->db->last_query());
    	$data['page_name'] = "pin_list";
    	$this->load->view('pin_list',$data);

    }
    
    public function deposit_history()
    {
    	if ($this->session->userdata('login') != 1)
    		redirect('','refresh');

    	$data['fund'] = $this->db->get('fund_wallet')->result_array();
    	//log_message("error", $this->db->last_query());
    	$data['page_name'] = "deposit_history";
    	$this->load->view('deposit_history',$data);

    }

    
    
    
    public function get_amount()
    {
        $bamount = $this->db->select_sum('amount')->where('user_id',$this->session->userdata('userid'))->where('remark',$this->input->post('p_code'))->get('account')->row()->amount+0;
        //log_message("error", $this->db->last_query());
        $pamount = $this->db->select('SUM(amount) + SUM(samount) as amount', FALSE)->where('user_id',$this->session->userdata('userid'))->where('status','Paid')->where('wallet',$this->input->post('p_code'))->get('withdraw_request')->row()->amount+0;
        //log_message("error", $this->db->last_query());
		$amount['amount'] = $bamount-$pamount; 		
		$amount['samount'] = ($bamount*10)/100; 		
        if (!empty($amount)) {
	            echo json_encode($amount);
	        } else {
	            echo "empty";
	        }
        
    }


    public function get_utr()
    {

        $utr = $this->input->post('utr');
        $this->db->where('utr',$utr);
        $details = $this->db->get('admin_request')->row_array();
        if (!empty($details)) {
            echo json_encode($details);
        } else {
            echo "empty";
        }
    }
    
    

    public function payall(){

    	$this->db->where('status !=','Unpaid');
    	$payouts = $this->db->get('payout')->result_array();

    	$this->db->trans_start();
    	foreach ($payouts as $key => $n) {
    			$dataearn1 = array(
					'user_id' => $n['user_id'],
					'entry_date'=> $n['entry_date'],
					'amount' => $n['amount']+$n['s_amount'],
					'remark' => 'Paid',
					'i_from' => 1,
					'dic' => $n['a_number']+$n['ifsc']+$n['b_name'],
					'trans' => 'Paid',
    			);
    			$this->db->insert('account', $dataearn1);
    			
    			$dataacc = array(  
					'parent_id' => $n['user_id'],
					'entry_date'=> date('Y-m-d'),
					'left_count' => $n['paircount'],
					'right_count' => $n['paircount'],
					'remark' => 'Paid',
    			);
    			$this->db->insert('pairs', $dataacc);

    			if ($n['weekside'] != 'No') {
    				if ($n['weekside'] == 'left') {
    					$dataaccx = array(  
						'parent_id' => $n['user_id'],
						'entry_date'=> date('Y-m-d'),
						'left_count' => $n['washout'],
						'right_count' => 0,
						'remark' => 'Wash',
		    			);
		    			$this->db->insert('pairs', $dataaccx);
    				} else {
    					$dataaccx = array(  
						'parent_id' => $n['user_id'],
						'entry_date'=> date('Y-m-d'),
						'left_count' => 0,
						'right_count' => $n['washout'],
						'remark' => 'Wash',
		    			);
		    			$this->db->insert('pairs', $dataaccx);
    				}
    				
    			}	
    	}
    	$this->db->empty_table('payout');
    	$this->db->trans_complete(); 
    	$this->session->set_flashdata('success_message', 'Paid Successfully');
    	redirect('','refresh');
    }

}