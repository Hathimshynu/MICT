<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url'));
        $this->load->library(array('form_validation', 'email'));
        $this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
    }
    
    public function withdraw()
    {
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if ($_POST) {
            $error = array();

        try {
         $id = $this->input->post('id');
         
           if ($id !="") {
               
                $accept_data = $this->db->where('id',$id)->get('withdraw_request')->row_array();
                
    		    $address = $accept_data['wallet_address'];
                $admin_wallet = $this->db->order_by('id','DESC')->get('admin_wallet')->row_array();
                
    		    $tron_wallet_from_address = $admin_wallet['withdraw_wallet'];
            	$tron_wallet_to_address   = $address;
            	$tron_private_key	 = $admin_wallet['private_key'];
            	$amt 				 = floatval($accept_data['balance_usdt']);
                
                include_once APPPATH . '/third_party/tron/tron-api-master/vendor/autoload.php';
        
                $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
                $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
                $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
        
                $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
                $contract = $tron->contract('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t');  // Tether USDT https://tronscan.org/#/token20/TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t
                $tron->setAddress($tron_wallet_from_address);
                $tron->setPrivateKey($tron_private_key);
                $contract->setFeeLimit(100);
        
                $usdtblance = $contract->balanceOf();
        
                if ($usdtblance >= $amt) {
                    $vds = $contract->transfer($tron_wallet_to_address, $amt, $tron_wallet_from_address);
                    sleep(3);
                    $detail = $tron->getTransaction($vds['txid']);
                    $checktran = $detail['ret'][0]['contractRet'];
                    
                    if($checktran == 'SUCCESS'){
                           $withdraw = array(
                    		     'accepted_date' => date('Y-m-d H:i:s'),
                    		    'status' => "Accepted",
                    		    'remark' => 'Paid',
                    		    'credited_amount' => $amt
                        	);
                        		
                        	$eprofile = $this->db->where('id',$id);
                            $this->db->update('withdraw_request',$withdraw);
                        						
        
                        if ($eprofile) {
                            $this->session->set_flashdata('success_message', "Done Payment Successfully.");
                            redirect('admin/withdraw_request', 'refresh');
                        } else {
                            throw new Exception("Invalid USDT Transfer Request");
                        }
                    } else {
                        throw new Exception("Please Try Again");
                    }
                } else {
                    throw new Exception("Insufficient USDT");
                }
            } else {
                throw new Exception("Check Data");
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error_message', $e->getMessage());
            $data['page_name'] = "withdraw_request";
            $this->load->view('admin/withdraw_request', $data);
        }

		}else{
		   redirect('admin/withdraw_request', 'refresh');
		}
    }
    
    public function admin_reject()
    {
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if (!empty($this->input->post('id')) && !empty($this->input->post('status')) && !empty($this->input->post('remark'))){
            
            $result = $this->admin->withdraw_reject($this->input->post('id'),$this->input->post('status'),$this->input->post('remark'));
            if($result){
                $this->session->set_flashdata('success_message', 'Request Rejected Successfully');
                redirect('admin/withdraw_request','refresh');
            } 
            else {
                $this->session->set_flashdata('error_message', 'Action Not Successfull Please Check Your Data');
                redirect('admin/withdraw_request','refresh'); 
            }   
        } else {
                $this->session->set_flashdata('error_message', 'Action Not Successfull Please Check Your Data');
                redirect('admin/withdraw_request','refresh');   
        } 
    }
    
    
    public function withdraw_request()
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
         $data['page_name'] = "withdraw_request"; 
        $this->load->view('admin/withdraw_request',$data);
    }
    
    public function check_invest_of_user(){
        
        $users = $this->db->get('user_role')->row_array();
        
        foreach($users as $key => $us){
            
            
            
        }
        
    }
    
    
    
    public function active_notification($id="")
    {
          if($this->session->userdata('mcusertype') != 'a')
          redirect('admin','refresh');
          
          if($id != "")
          {
              $act_id = hex2bin($id);
              
              $get_data = $this->db->where('id',$act_id)->get('notification')->row_array();
              
              if($get_data['status'] == 0){
                  
                $up =  $this->admin->act_notification($act_id);
                
                if($up){
                    $this->session->set_flashdata('success_message', 'Notification activated successfully');
                    redirect('admin/notification','refresh');
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again');
                    redirect('admin/notification','refresh');
                }
                  
              }else{
                  $this->db->set('status',0);
                  $this->db->where('id',$id);
                  $this->db->update('notification'); 
              }
          }
          
          
      }
      
      
         public function scrolling_news()
      {
        if($this->session->userdata('mcusertype') != 'a')
        redirect('admin','refresh'); 
        if($_POST){
          $this->form_validation->set_rules('title', 'Title ', 'trim|required');
          $this->form_validation->set_rules('news', 'News ', 'trim|required');
          $this->form_validation->set_rules('news_date', 'Date', 'trim|required');
                
                    if($this->form_validation->run()==true){
                            $upp = $this->admin->add_scrolling_news();
                            if($upp){
                                $this->session->set_flashdata('success_message','News Updated Successfully');
                                redirect('admin/scrolling_news','refresh');
                            }else{
                             $this->session->set_flashdata('error_message','Please Try Again');
                             redirect('admin/scrolling_news','refresh');    
                            }
                    }else{
                    $this->session->set_flashdata('error_message','Please Check Your Details');
                    $this->load->view('admin/scrolling_news');
                }
        }else{
           $this->load->view('admin/scrolling_news');
        }
      }
      
      public function informative_news()
      {
        if($this->session->userdata('mcusertype') != 'a')
        redirect('admin','refresh');
        
        if($_POST){
          $this->form_validation->set_rules('title', 'Title ', 'trim|required');
          $this->form_validation->set_rules('news', 'News ', 'trim|required');
          $this->form_validation->set_rules('news_date', 'Date', 'trim|required');
                
                    if($this->form_validation->run()==true){
                            $upp = $this->admin->add_informative_news();
                            if($upp){
                                $this->session->set_flashdata('success_message','News Updated Successfully');
                                redirect('admin/informative_news','refresh');
                            }else{
                             $this->session->set_flashdata('error_message','Please Try Again');
                             redirect('admin/informative_news','refresh');    
                            }
                    }else{
                    $this->session->set_flashdata('error_message','Please Check Your Details');
                    $this->load->view('admin/informative_news');
                }
        }else{
         
         
            
         $this->load->view('admin/informative_news');
        }
      }
           
           
           
          public function delete_news()
    {
        $del_id = $this->input->post('del_id');
          if($del_id !=""){
              
              $delete_news = $this->db->where('news_id',$del_id)->delete('scroll_news');
              
              if($delete_news)
              {
                 $this->session->set_flashdata('success_message', 'News deleted successfully');
                 redirect('admin/scrolling_news','refresh'); 
              }else{
                 $this->session->set_flashdata('success_message', "Please try again");
                 redirect('admin/scrolling_news','refresh');
              }
              
          }else{
              redirect('admin/scrolling_news','refresh');
          }
    } 
    
    public function delete_informative_news()
    {
        $del_id = $this->input->post('del_id');
          if($del_id !=""){
              
              $delete_news = $this->db->where('news_id',$del_id)->delete('informative_news');
              
              if($delete_news)
              {
                 $this->session->set_flashdata('success_message', 'News deleted successfully');
                 redirect('admin/informative_news','refresh'); 
              }else{
                 $this->session->set_flashdata('success_message', "Please try again");
                 redirect('admin/informative_news','refresh');
              }
              
          }else{
              redirect('admin/informative_news','refresh');
          }
    }
    
     public function scroll_news_status($news_id="")
    {
          if($news_id !=""){
              
              $status = $this->db->select('status')->where('news_id',$news_id)->get('scroll_news')->row()->status;
              
              if($status == "Active")
              {
                  
                  $this->db->set('status','Inactive');
                  $this->db->where('news_id',$news_id);
                  $change = $this->db->update('scroll_news');
              }else if($status == "Inactive"){
                 
                  $this->db->set('status','Active');
                  $this->db->where('news_id',$news_id);
                  $change = $this->db->update('scroll_news');
              }
              
              if($change)
              {
                 $this->session->set_flashdata('success_message', 'Status changed');
                 redirect('admin/scrolling_news','refresh'); 
              }else{
                 $this->session->set_flashdata('success_message', "Please try again");
                 redirect('admin/scrolling_news','refresh');
              }
              
          }else{
              redirect('admin/scrolling_news','refresh');
          }
    } 
    
     public function informative_news_status($news_id="")
    {
          if($news_id !=""){
              
              $status = $this->db->select('status')->where('news_id',$news_id)->get('informative_news')->row()->status;
              
              if($status == "Active")
              {
                  
                  $this->db->set('status','Inactive');
                  $this->db->where('news_id',$news_id);
                  $change = $this->db->update('informative_news');
              }else if($status == "Inactive"){
                 
                  $this->db->set('status','Active');
                  $this->db->where('news_id',$news_id);
                  $change = $this->db->update('informative_news');
              }
              
              if($change)
              {
                 $this->session->set_flashdata('success_message', 'Status changed');
                 redirect('admin/informative_news','refresh'); 
              }else{
                 $this->session->set_flashdata('success_message', "Please try again");
                 redirect('admin/informative_news','refresh');
              }
              
          }else{
              redirect('admin/informative_news','refresh');
          }
    } 
    
     
    
      public function notification()
      {
          if($this->session->userdata('mcusertype') != 'a')
          redirect('admin','refresh');
          
          if($_POST)
            {
           
              $config = array(
                  'file_name'=>time(),    
                  'upload_path' => "assets/notification",
                  'allowed_types' => "jpg|png|jpeg",
                  'overwrite' => false,
                  'max_size' => "3074000" // Can be set to particular file size , here it is 3 MB(3074 Kb)
                );
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('userfile')){
                  $data = array('upload_data' => $this->upload->data());
                  $this->form_validation->set_rules('title', 'Title', 'trim|required');
           
                  if($this->form_validation->run()==true){
                  
                    $refreg= $this->admin->notification($this->upload->data()['file_name']);
                    if($refreg){
        
                      $this->session->set_flashdata('success_message', 'Notification updated Successfully');
                      redirect('admin/notification','refresh');
                    }else{
            
                      $this->session->set_flashdata('error_message', 'Check your details');
                      redirect('admin/notification','refresh');
                    } 
                  }else{
                    $vdsdfv = implode(" <br> ", $this->form_validation->error_array());
                    $this->session->set_flashdata('error_message',$vdsdfv);
                     redirect('admin/notification','refresh');
                  }
                }else{
               
                  $this->session->set_flashdata('error_message', $this->upload->display_errors());
                  redirect('admin/notification','refresh');
                }
           
              
            }else{
                $this->load->view('admin/notification'); 
            
            }
          
        }
    
    
    public function support()
    {
         if($this->session->userdata('mcusertype') != 'a')
            redirect('admin','refresh');
            
        if($_POST){ 
            $this->form_validation->set_rules('reply', 'Reply', 'trim|required');
            if($this->form_validation->run()==true){
                $upp = $this->admin->reply();
                if($upp){
                    $this->session->set_flashdata('success_message','Successfully');
                    redirect('admin/support','refresh');
                }else{
                    $this->session->set_flashdata('error_message','Please Try Again');
                    redirect('amin/support','refresh');    
                }
            }else{
                $vdsdfv = implode(" <br> ", $this->form_validation->error_array());
                $this->session->set_flashdata('error_message',$vdsdfv);
                redirect('admin/support','refresh');
            }
        }else{
             $this->load->view('admin/support');
        }
    }
    
    
    public function mail_temp(){
        $this->load->view('admin/mail_temp');
    }
    
    public function test_user_mail(){
        $this->admin->bulk_mail();
    }
    
    public function test_timer(){
        $this->load->view('admin/test_timer');
    }
    
    
    public function delete_past_entries(){
        
        $ewallet = $this->db->group_by('user_id')->get('e_wallet')->result_array();
        
        foreach($ewallet as $key => $ew){
            
            $check_user = $this->db->where('username',$ew['user_id'])->get('user_role')->row_array();
            
            if(empty($check_user)){
                
                $this->db->where('user_id',$ew['user_id']);
                $this->db->delete('e_wallet');
                
            }
            
        }
        
    } 
    
    
    public function deposit_request(){
         if ($this->session->userdata('mcusertype') != "a") {
            redirect('admin', 'refresh');
        }
        
        $this->load->view('admin/deposit_request');
    }
    
    
     public function kyc_request(){
         if ($this->session->userdata('mcusertype') != "a") {
            redirect('admin', 'refresh');
        }
        
        $this->load->view('admin/kyc_request');
    }
    
    
      public function deposit_accept($id="")
    {
        if($this->session->userdata('mcusertype') != 'a')
            redirect('admin','refresh');
            

            
            $deposit = $this->admin->accept_deposit($id);
            
            if($deposit){
                
                  $this->session->set_flashdata('success_message','Deposit Accepted Successfully');
                  redirect('admin/deposit_request','refresh');
        
            }else{
                
                $this->session->set_flashdata('error_message','Please check the data');
                redirect('admin/deposit_request','refresh');
            }

      }
      
    public function deposit_reject($id="")
    {
        if($this->session->userdata('mcusertype') != 'a')
            redirect('admin','refresh');
                
                            
            $deposit = $this->admin->reject_deposit($id);
            
            if($deposit){
                
                  $this->session->set_flashdata('success_message','Deposit Rejected Successfully');
                  redirect('admin/deposit_request','refresh');
        
            }else{
                
                $this->session->set_flashdata('error_message','Please check the data');
                redirect('admin/deposit_request','refresh');
            }

    }
    
    
    
    public function stacking_income(){
        
        $this->db->trans_begin();
        
        $stack_income = $this->db->select('reward')->where('type', 'stacking income')->get('master')->row()->reward+0;
        log_message('error','STACK REWARD'.json_encode($stack_income));
        
        // $stackusers_yesterday = $this->db->where('DATE(entry_date)', 'DATE_SUB(CURDATE(), INTERVAL 1 DAY)', FALSE)->get('stacking_wallet')->result_array();
 
        $stackusers = $this->db->where('days >',0)->where('DATE(entry_date)<',date('Y-m-d'))->get('stacking_wallet')->result_array();
        log_message('error','DAYS GREATER THAN ZERO USERS'.json_encode($stackusers));
        
        
        if (!empty($stackusers)) {
        
        
            foreach ($stackusers as $user) {
            $stack_user_id = $user['user_id'];
            
            
            $user_stack_amount = $user['credit']; 
            $income = ($user_stack_amount * $stack_income) / 100;
            
            $income_data = array(
            'username' => $stack_user_id,
            'credit' => $income,
            'entry_date' => date('Y-m-d H:i:s'),
            'remark' => 'Stacking Income',
            'description' =>$user['stacking_id'] ,
            'type' => 'Stack',
            'amount' =>$user['credit'],
            );
            
            $this->db->insert('account', $income_data);
            
            $this->db->set('days','days - 1',false)->where('stacking_id', $user['stacking_id'])->update('stacking_wallet');
            
            }
            echo 'Stacking income generated successfully.';
        } 
        
        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    
    }
     
        public function roi_generatessss()
    {
        $this->db->trans_begin();

        $roi = $this->db->where('days >', 0)->get('user_package')->result_array();

        foreach ($roi as $key => $roo) {
            $total = $this->db->select_sum('credit')
                              ->where('username', $roo['username'])
                              ->where('DATE(entry_date)', date('Y-m-d'))
                              ->get('account')
                              ->row()->credit + 0;

            $pay = min($roo['celing'] - $total, $roo['roi']);

            if ($pay > 0) {
                $insert_data = array(
                    'username' => $roo['username'],
                    'entry_date' => date('Y-m-d H:i:s'),
                    'credit' => $pay,
                    'remark' => 'Roi Income',
                    'description' => $roo['id']
                );

                $this->db->insert('account', $insert_data);

                $this->db->set('days', 'days - 1', false)
                         ->where('id', $roo['id'])
                         ->update('user_package');
            }
        }

        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
     
      public function gen_newroi()
        {
            $this->db->trans_begin();
            
            $gen_date = '2023-06-16'; 
            
            $deposit = $this->db->where('days >', '0')->where('DATE(entry_date) <', $gen_date)->get('fin_roi_users')->result_array();
            
           // $reject_dates = $this->db->where('reject_dates', date('Y-m-d'))->get('roi_reject_days')->row_array();
            
            // if (empty($reject_dates) && date('N') != 7 && date('N') != 6) {
                foreach ($deposit as $key => $dep) {
                
                $check = $this->db->where('user_id',$dep['user_id'])->where('date(entry_date)',$gen_date)->where('remark','ROI income')->get('fin_account')->row_array();
                if(empty($check)){    
                    $total_deposit = $dep['wallet_value'];
                    
                    $entry = date('Y-m-d H:i:s', strtotime($dep['entry_date'] . ' + 24 hours'));
                    log_message('error',$dep['package'] ."eeeeeeeeeeeeeee");
                    
                      if ($dep['package'] != 'silver') {
                            
                            $roi_credit = array(
                                'user_id' => $dep['user_id'],
                                'credit' => $dep['roi_amount'],
                                'entry_date' =>  date($gen_date.' H:i:s'),
                                'remark' => 'ROI income',
                                'description' => $dep['roi_id'],
                                'type' => 'roi'
                            );
                            
                            $this->db->insert('fin_account', $roi_credit);
                            
                            $this->roi_mail($roi_credit);
                         }
                    
                        $user = $this->db->where('user_name', $dep['user_id'])->get('users')->row_array();
                        
                        $lvl = array(
                            'user_id' => $user['ref_id'],
                            'credit' => $dep['level_amount'],
                            'entry_date' => date('Y-m-d H:i:s'),
                        );
                        
                        $this->db->insert('fin_level_amount', $lvl);
                        
                        $this->db->set('days', 'days - 1', false);
                        $this->db->where('id', $dep['id']);
                        $this->db->update('fin_roi_users');
                        
                        $remain_days = $dep['days'] - 1;
                        
                        $check = $this->db->where('user_id', $dep['user_id'])->where('description', $dep['roi_id'])->count_all_results('fin_wallet') + 0;
                        
                        if ($check == 0 && $remain_days == 0 && $dep['doc_status'] == 'Verified') {
                            $credit_per = $this->db->select('reward')->where('type', 'credit_amount')->get('fin_master')->row()->reward + 0;
                            $amt = ($total_deposit * $credit_per) / 100;
                            
                            $wallet_credit = array(
                                'user_id' => $dep['user_id'],
                                'credit' => $amt,
                                'entry_date' => date($gen_date.' H:i:s'),
                                'description' => $dep['roi_id']
                            );
                            
                            $this->db->insert('fin_wallet', $wallet_credit);
                        }
                     
                   }
                }
            // }
            
            if ($this->db->trans_status() == FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
      
     
  
  
    
    
    public function levelmaster_update()
    {
        if ($this->session->userdata('mcusertype') != "a") {
            redirect('admin', 'refresh');
        }
        
        $this->form_validation->set_rules('inner_menu[]', 'Inner Menu', 'trim|required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = 'error';
            $response['message'] = validation_errors();
        } else {
            $innerMenuArray = $this->input->post('inner_menu');
            $sts = $this->db->where('status', 'Active')->count_all_results('level_master');
            
            if ($sts > 0) {
                $data = array(
                'status' => 'Inactive',
                );
                $this->db->where('status', 'Active');
                $this->db->update('level_master', $data);
            }
            
            if (!empty($innerMenuArray)) {
                $arrayLength = count($innerMenuArray);
                $insertedData = array(); // An array to store the inserted data
                
                for ($i = 0; $i < $arrayLength; $i++) {
                    $value = $innerMenuArray[$i];
                    $a = $i + 1;
                    $insertData = array(
                    'level' => 'Level ' . $a,
                    'percentage' => $value,
                    'status' => 'Active',
                    'entry_date' => date('Y-m-d H:i:s'),
                    );
                    
                    // Insert the data into the database
                    $this->db->insert('level_master', $insertData);
                    
                    // Store the inserted data in the $insertedData array
                    $insertedData[] = $insertData;
                }
                
                if (!empty($insertedData)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Level added successfully.';
                } else {
                        $response['status'] = 'error';
                        $response['message'] = 'Level addition failed.';
                    }
                } else {
                $response['status'] = 'error';
                $response['message'] = 'The "level" array is empty.';
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    
    
    
    public function gamelevel_master_update()
    {
        if ($this->session->userdata('mcusertype') != "a") {
            redirect('admin', 'refresh');
        }
        
        $this->form_validation->set_rules('inner_menu[]', 'Inner Menu', 'trim|required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = 'error';
            $response['message'] = validation_errors();
        } else {
            $innerMenuArray = $this->input->post('inner_menu');
            $sts = $this->db->where('status', 'Active')->count_all_results('game_level_master');
            
            if ($sts > 0) {
                $data = array(
                'status' => 'Inactive',
                );
                $this->db->where('status', 'Active');
                $this->db->update('game_level_master', $data);
            }
            
            if (!empty($innerMenuArray)) {
                $arrayLength = count($innerMenuArray);
                $insertedData = array(); // An array to store the inserted data
                
                for ($i = 0; $i < $arrayLength; $i++) {
                    $value = $innerMenuArray[$i];
                    $a = $i + 1;
                    $insertData = array(
                    'level' => 'Level ' . $a,
                    'percentage' => $value,
                    'status' => 'Active',
                    'entry_date' => date('Y-m-d H:i:s'),
                    );
                    
                    // Insert the data into the database
                    $this->db->insert('game_level_master', $insertData);
                    
                    // Store the inserted data in the $insertedData array
                    $insertedData[] = $insertData;
                }
                
                if (!empty($insertedData)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Level added successfully.';
                } else {
                        $response['status'] = 'error';
                        $response['message'] = 'Level addition failed.';
                    }
                } else {
                $response['status'] = 'error';
                $response['message'] = 'The "level" array is empty.';
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
 
 
 
     public function levelmaster(){
         if ($this->session->userdata('mcusertype') != 'a') {
                redirect('admin', 'refresh');
            }
            
         $this->load->view('admin/levelmaster');
     }
    
    
    
    public function trade_profit()
    
    {
        if ($this->session->userdata('mcusertype') != 'a') {
            redirect('admin', 'refresh');
        }
        
        if($_POST){
        
            $this->load->library('form_validation');
             $this->form_validation->set_rules('percentage', 'Percentage','trim|required|numeric');
            $this->form_validation->set_rules('trade_open_time', 'Open Time','required');
            $this->form_validation->set_rules('trade_close_time', 'Percentage','trim|required');
            $this->form_validation->set_rules('open_price', 'Open Price','trim|required');
            $this->form_validation->set_rules('close_price', 'Close price','trim|required');
            $this->form_validation->set_rules('trade_pair', 'Trade pair','trim|required');
            $this->form_validation->set_rules('action', 'Action','trim|required');
            
            
            if ($this->form_validation->run() == false) {
                $response['status'] = 'error';
                $response['message'] = validation_errors();
            } else {
                $today = $this->db->select('entry_date')->where('remark','Trade Profit')->where('DATE(entry_date)',date('Y-m-d'))->get('account')->row_array();
                log_message('error','TODAY DATE'.json_encode($today));
                // if (empty($today)){
                
                    $transfer = $this->admin->tradewallet_profit();
                    
                    if ($transfer==true) {
                        $response['status'] = 'success';
                        $response['message'] = 'Profit and Level Income Generated Successfully';
                    } else {
                        $response['status'] = 'error';
                        $response['message'] = 'Something Went Wrong';
                    }
                    log_message('error','RESPONSE'.json_encode($response));
                // }else{
                //     $response['status']='error';
                //     $response['message'] ='Today Profit Already Generated';
                // }
            }
        }
        echo json_encode($response);
    }
    



public function user_amount_check() {
    $amount = $this->input->post('amount');
    $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('user_id', $this->session->userdata('micusername'))
                        ->get('e_wallet')
                        ->row()
                        ->balance + 0;

    if ($amount > 0 && $amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_amount_check', 'Check your balance');
        return false;
    }
}

    
public function trade_income()
{
    if ($this->session->userdata('mcusertype') != 'a') {
        redirect('admin', 'refresh');
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('forex', 'Forex', 'trim|required');
    $this->form_validation->set_rules('crypto', 'Crypto', 'trim|required');

    if ($this->form_validation->run() == false) {
        $response['status'] = 'error';
        $response['message'] = validation_errors();
    } else {
        
         $today = date('Y-m-d'); 
        $this->db->where('DATE(entry_date)', $today);
        $date = $this->db->get('trade_history')->result_array();

        if(empty($date)){
         $forex = $this->input->post('forex');
       $crypto = $this->input->post('crypto');
        $trade = $this->admin->trade_income($forex,$crypto);
        }
        else
        {
                $response['status'] = 'error';
                $response['message'] = 'Already Generated';
        }

        if ($trade) {

            $response['status'] = 'success';
            $response['message'] = 'Successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error found';
        }
    }

    echo json_encode($response);
}
    

public function wallet_updatee()
{
    if ($this->session->userdata('mcusertype') != 'a') {
        redirect('admin', 'refresh');
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('wallet_address', 'Wallet Address', 'trim|required');

    if ($this->form_validation->run() == false) {
        $response['status'] = 'error';
        $response['message'] = validation_errors();
    } else {

        $wallet = $this->admin->wallet_update();

        if ($wallet) {

            $response['status'] = 'success';
            $response['message'] = 'Wallet Updated Successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error found';
        }
    }

    echo json_encode($response);
}

  
  public function get_team_investment($username = "",$type="")
{
    $amount = 0;
    $get_childs = $this->db->like('team',$username)->get('uni_tree')->result_array();
    $childs = array_column($get_childs,'child_id');
    array_unshift($childs,$username);
   $user_invest = $this->db->select('sum(usdt) as balance')->where('username', $username)->get('deposit')->row()->balance + 0;
    if(!empty($childs)){
       $amount = $this->db->select('sum(usdt) as balance')->where_in('username', $childs)->where('type' ,$type)->get('deposit')->row()->balance + 0;
    }
    echo $user_invest;
    return $amount;
    
}
    
public function rank_update()
{
    if ($this->session->userdata('mcusertype') != 'a') {
        redirect('admin', 'refresh');
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|callback_amount_check');
    $this->form_validation->set_rules('percentage', 'Percentage', 'trim|required|numeric|callback_percentage_check');
    $this->form_validation->set_rules('reward', 'Reward', 'trim|required|numeric|callback_reward_check');

    if ($this->form_validation->run() == false) {
        $response['status'] = 'error';
        $response['message'] = validation_errors();
    } else {

        $rank = $this->admin->rank_update();

        if ($rank) {

            $response['status'] = 'success';
            $response['message'] = 'Rank Updated Successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error found';
        }
    }

    echo json_encode($response);
}

        public function amount_check() {
            $amount = $this->input->post('amount');
            if ($amount <= 0) {
                $this->form_validation->set_message('amount_check', 'The Amount field must be a positive number.');
                return false;
            }
            return true;
        }
        
        
           public function percentage_check() {
            $percentage = $this->input->post('percentage');
            if ($percentage <= 0) {
                $this->form_validation->set_message('percentage_check', 'The Percentage field must be a positive number.');
                return false;
            }
            return true;
        }
        
        
           public function reward_check() {
            $reward = $this->input->post('reward');
            if ($reward <= 0) {
                $this->form_validation->set_message('reward_check', 'The Reward field must be a positive number.');
                return false;
            }
            return true;
        }
    
        public function admin_wallet()
        {
            if($this->session->userdata('mcusertype')!='a')
            redirect('admin/index','refresh'); 
            
            if($_POST)
            {
                $this->form_validation->set_rules('wallet_address', 'Wallet Address', 'trim|required');
                if($this->form_validation->run()==true){ 
                
                    $wallet = $this->admin->update_wallet($this->session->userdata('mcusername'));
                    
                    if($wallet)
                    {
                        $this->session->set_flashdata('success_message','Wallet successfully updated');
                        redirect('admin/admin_wallet','refresh');  
                    }else{
                        $this->session->set_flashdata('error_message','Please try again');
                        redirect('admin/admin_wallet','refresh');   
                    }
                
                }else{
                    $data['page_name'] = "admin_wallet";    
                    $this->load->view('admin/admin_wallet',$data);   
                }
            
            }else{
                $data['page_name'] = "admin_wallet";    
                $this->load->view('admin/admin_wallet',$data);
            }   
        }
            
            public function otpcheck()
            {
                $otp=$this->db->select('otp')->where('user_type','a')->get('user_role')->row()->otp;
                
                if($otp == $this->input->post('otp')){
                    return true;
                }else{
                    $this->session->set_flashdata('error_message','Invalid OTP');
                    return false;
                }
                
                
            }
    
               
    //     public function forgot_otp()
    // {
    //     $email=$this->session->userdata('mcemail');
    //      $otp = rand(1000,9999);
    //     // log_message('error',$id);
    //     $this->db->set('otp',$otp);
    //     $this->db->where('email',$email);
    //     $this->db->update('user_role');
        
    //     $mail = $id;
        
    //     $from_email='noreply@backofficee.com';
    //     $from_name='MICX';
    //     $to_email = $mail;
    //     $subject_email = 'Mict OTP';
    //     $dataemail['otp']=$otp;
    //     $mesg = $this->load->view('admin/success',$dataemail,true);
    //     $config = Array(
    //         'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    //         'smtp_host' => 'mict.uk', 
    //         'smtp_port' => 465,
    //         'mailtype' => 'html',// it can be text or html
    //         'wordwrap' => TRUE,
    //         'newline' => "\r\n",
    //         'charset' => 'utf-8',
    //         'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    //         'smtp_timeout' => '4', //in seconds
    //     );
    //     $this->load->library('email');
    //     $this->email->initialize($config);
    //     $this->email->from($from_email, $from_name); 
    //     $this->email->to($to_email);
    //     $this->email->subject($subject_email); 
    //     $this->email->message("$mesg");   
    //     $this->email->send();
   
    //  }
    
    public function forgot_otp($email="")
{


    
    // Generate a random OTP (4 digits)
    $otp = rand(1000, 9999);
    
    // Update the OTP in the database for the user with the given email
    $this->db->where('email', $email);
    $this->db->update('user_role', ['otp' => $otp]);
    
    // Define email parameters
    $from_email = 'noreply@backofficee.com';
    $from_name = 'MICX';
    $to_email = $email; // Use the user's email as the recipient
    $subject_email = 'Mict OTP';
    
    // Prepare the email message using a view
    $dataemail['otp'] = $otp;
    $mesg = $this->load->view('admin/success', $dataemail, true);
    
    // Configure email settings
    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.mict.uk', // Use the correct SMTP server address
        'smtp_port' => 465,
        'mailtype' => 'html', // Use 'html' for HTML emails
        'wordwrap' => true,
        'newline' => "\r\n",
        'charset' => 'utf-8',
        'smtp_crypto' => 'ssl', // Use SSL for secure connection
        'smtp_timeout' => 4, // Timeout in seconds
    );
    
    // Load and initialize the email library
    $this->load->library('email', $config);
    
    // Set email parameters
    $this->email->from($from_email, $from_name);
    $this->email->to($to_email);
    $this->email->subject($subject_email);
    $this->email->message($mesg);
    
    // Send the email
    if ($this->email->send()) {
        // Email sent successfully
        echo 'Email sent successfully.';
    } else {
        // Email sending failed
        echo 'Email sending failed.';
    }
}

    
            
    public function testt()
    {
       echo sha1("123456");
    }
    
    public function test(){
       //echo date('Y-m-d H:i:s', strtotime(' + 4 hours'));
    //   $currentDateTime = date('Y-m-d H:i:s');
    //   $addingFiveMinutes= strtotime($currentDateTime.' + 4 hours');
    //         $getDateTime = date("F d, Y H:i:s", $addingFiveMinutes);
    //         echo $getDateTime;
    $current_timestamp = time(); // Get current timestamp
    echo $current_timestamp." <br>";
    $new_timestamp = $current_timestamp + (4 * 3600); // Add 4 hours' worth of seconds
    echo $new_timestamp;
    }
    
    public function start_mining(){
    
         if($this->input->post('start') == "Start")
         {
            $times = array(
                'user_id' => $this->session->userdata('micusername'),
                'start_time' => $this->input->post('up_time')
                );
           $action = $this->db->insert('timer',$times);
           if($action){
            echo "success";
           }else{
            echo "empty";
           }
         }else{
             echo "empty";
         }
        
    }
    
    public function generate_roi()
    {
        log_message('error',$this->input->post('up_id'));
        log_message('error',"Hiii");
        $timer = $this->db->where('up_id',$this->input->post('up_id'))->where('end_time !=',NULL)->where('user_id',$this->session->userdata('micusername'))->get('user_package')->row_array();
        
        
        if(!empty($timer))
        {
            
           $gen = $this->admin->roi_generate();
           
           if($gen)
           {
               echo "success";
           }else{
               echo "error";
           }
            
        }else{
            echo "error"; 
        }
       
    }
    
    public function generate_binary()
    {
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
       $gen = $this->admin->binary_daily_pay();
       
       if($gen)
       {
           echo "Success";
       }else{
           echo "Error";
       }
    }

    public function index()
    {
        if($this->session->userdata('mcusertype')!='a')
        {
            $this->load->view('admin/login');

        }
        else{
            $data['page_name'] ="dashboard";
            $this->load->view('admin/dashboard',$data);
        }
    }
    
public function login()
{
  if($_POST){
    $username= $this->input->post('username');
    $password= $this->input->post('password');
    $check= $this->admin->login($username,$password);

    if($check != false){
      $this->session->set_userdata('mcusername',$check['username']);
      $this->session->set_userdata('mcemail',$check['email']);
      $this->session->set_userdata('mcusertype',$check['user_type']);

      $this->session->set_flashdata('success_message',"Welcome to MICT");
      redirect('admin/index','refresh');
    }else {
      $this->session->set_flashdata('error_message',"Please enter valid username and password");
      redirect('admin','refresh');
        }
      }else {
          $this->session->set_flashdata('error_message',"Please enter valid username and password");
          redirect('admin','refresh');
        }
    }
  
public function logout()
  {
    $this->session->set_userdata('mcusername','');
    $this->session->set_userdata('mcemail','');
    $this->session->set_userdata('mcusertype','');
    redirect('admin','refresh');
  }
  
   public function generate_rank()
    {
        
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        $check =  $this->db->where('type',"rank")->where('date(entry_date)',date('Y-m-d'))->get('account')->result_array();
        $check_bonus =  $this->db->where('type',"rank bonus")->where('date(entry_date)',date('Y-m-d'))->get('account')->result_array();
        
          if(empty($check) && empty($check_bonus)){
       
                       $gen = $this->admin->gen_rank();
                       
                        if($gen){
                            $this->session->set_flashdata('success_message','Generated Successfully');
                            redirect('admin/generate_rank_income','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/generate_rank_income','refresh');    
                        }
                    
                   }else{
                         $this->session->set_flashdata('error_message','Already Generated today');
                         redirect('admin/generate_rank_income','refresh');    
                        }
            
           
            
        }
      
       
      


    
    public function create_wallet()
    {
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        require_once(APPPATH . '/third_party/tron/tron-api-master/vendor/autoload.php');
        try {
    		$tron = new \IEXBase\TronAPI\Tron();
    
    		$generateAddress = $tron->generateAddress(); // or createAddress()
    		$isValid = $tron->isAddress($generateAddress->getAddress());
    		
    		$wallet      = true;
    		$hex         = $generateAddress->getAddress();
    		$base58      = $generateAddress->getAddress(true);
    		$private_key = $generateAddress->getPrivateKey();
    		$public_key  = $generateAddress->getPublicKey();
    		
    		$user_wallet_data=array(
             'private_key'=>$private_key,
             'entry_date'=>date('Y-m-d H:i:s'),
             'withdraw_wallet' => $base58,
             'username' => $this->session->userdata('mcusername'),
             'hex' => $hex,
             'public_key'=>$public_key,
             );
           
            $this->db->insert('admin_wallet',$user_wallet_data);
                
    	} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    		echo $e->getMessage();
    	}
    	
    	$this->session->set_flashdata('success_message','Wallet successfully created');
    	redirect('admin/admin_wallet','refresh');
    }
    
   
    
    public function dashboard()
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 

        $this->load->view('admin/dashboard');
  }
  
      public function trade_level_master()
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 

        $this->load->view('admin/trade_level_master');
  }
  
   public function game_level_master()
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 

        $this->load->view('admin/game_level_master');
  }
  
  
   public function generate_rank_income()
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 

        $this->load->view('admin/generate_rank_income');
  }
  
    public function trading_income()
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 

        $this->load->view('admin/trading_income');
  }
  
  
public function uni_level_tree($select_parentid="")
    {
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh');  
        
       if ($select_parentid != '') {
            $data['sponsor'] = $this->db->where('username',$select_parentid)->get('user_role')->row_array();
        } else {
            $data['sponsor'] = $this->db->where('username',$this->session->userdata('mcusername'))->get('user_role')->row_array();

        }
        $data['page_name'] ="uni_level_tree";
        $this->load->view('admin/uni_level_tree',$data);
    }
public function binary_tree($select_parentid ="")
    {
     if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 

        if ($select_parentid != '') {
            $data['sponsor'] = $this->db->where('username',$select_parentid)->get('user_role')->row_array();
        } else {
            $data['sponsor'] = $this->db->where('username',$this->session->userdata('mcusername'))->get('user_role')->row_array();

        }
        $data['tree'] = 'tree';
        $data['page_name'] ="binary_tree";
        $this->load->view('admin/binary_tree',$data);
    }
    
 public function add()
{
    
     if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
// if($this->input->post('userSubmit')){

//Check whether user upload picture

        if(!empty($_FILES['imagee']['name'])){
            $config['upload_path'] = 'assets/images';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['imagee']['name'];

//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('imagee')){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }else{
                $picture = '';
            }
        }else{
            $picture = '';
        }
        
        if(!empty($_FILES['imageee']['name'])){
            $config['upload_path'] = 'assets/images';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['imageee']['name'];

//Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('imageee')){
                $uploadData = $this->upload->data();
                $picture1 = $uploadData['file_name'];
            }else{
                $picture1 = '';
            }
        }else{
            $picture1 = '';
        }

        $userdata = array(
            'package_name'=>$this->input->post('package_name'),
            'percentage' => $this->input->post('percentage'),
            'value' => $this->input->post('value'),
            'entry_date' => date('Y-m-d H:i:s'),
            'gif' => $picture,
            'image' => $picture1,
        );

             $this->db->insert('package',$userdata);
       if($userdata){
           
                    $this->session->set_flashdata('success_message','Details Updated Successfully');
                     redirect('admin/mining_master','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/mining_master','refresh');    
                        }
                        
                     }
            


 public function level()
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('level1', 'level1', 'trim|required');
            $this->form_validation->set_rules('level2', 'level2', 'trim|required'); 
            $this->form_validation->set_rules('level3', 'level3', 'trim|required');
            $this->form_validation->set_rules('level4', 'level4', 'trim|required');
            $this->form_validation->set_rules('level5', 'level5', 'trim|required');
            
                if($this->form_validation->run()==true){
                    
                    $data = array(
                        
                         'entry_date' => date("Y-m-d H:i:s"),
                         'level1'=> $this->input->post('level1'),
                         'level2'=> $this->input->post('level2'),
                         'level3'=> $this->input->post('level3'),
                         'level4'=> $this->input->post('level4'),
                         'level5'=> $this->input->post('level5'),
                       );
                       
                     $this->db->insert('level_master',$data);
                     
                     $this->session->set_flashdata('success_message','Details Updated Successfully');
                     redirect('admin/level_master','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/level_master','refresh');    
                        }
                        
                    
                
                }else{
                $this->session->set_flashdata('error_message','Please Check Your Details');
                $this->load->view('admin/level_master',$data);
            }
            
            
    }
    
     public function trade_level()
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('level1', 'level1', 'trim|required');
            $this->form_validation->set_rules('level2', 'level2', 'trim|required'); 
            $this->form_validation->set_rules('level3', 'level3', 'trim|required');
            $this->form_validation->set_rules('level4', 'level4', 'trim|required');
            $this->form_validation->set_rules('level5', 'level5', 'trim|required');
            
                if($this->form_validation->run()==true){
                    
                    $data = array(
                        
                         'entry_date' => date("Y-m-d H:i:s"),
                         'level1'=> $this->input->post('level1'),
                         'level2'=> $this->input->post('level2'),
                         'level3'=> $this->input->post('level3'),
                         'level4'=> $this->input->post('level4'),
                         'level5'=> $this->input->post('level5'),
                       );
                       
                     $this->db->update('trade_level_master',$data);
                     
                     $this->session->set_flashdata('success_message','Details Updated Successfully');
                     redirect('admin/trade_level_master','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/trade_level_master','refresh');    
                        }
                        
                    
                
                }else{
                $this->session->set_flashdata('error_message','Please Check Your Details');
                $this->load->view('admin/trade_level_master',$data);
            }
            
            
    }
    
     
            

      public function update_profile()
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
         if($_POST){ 
        
            $this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required'); 
            $this->form_validation->set_rules('mobile_no', 'mobile_no', 'trim|required');
            $this->form_validation->set_rules('country', 'country', 'trim|required');
            
                if($this->form_validation->run()==true){
                        $upp = $this->admin->profile_update();
                        if($upp){
                            $this->session->set_flashdata('success_message','Details Updated Successfully');
                            redirect('admin/user_credential','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/user_credential','refresh');    
                        }
                        
                    
                
                }else{
                $this->session->set_flashdata('error_message','Please Check Your Details');
                $this->load->view('admin/user_credential',$data);
            }
            
            
            }else{
            // $this->session->set_flashdata('error_message', $this->upload->display_errors());
             redirect('admin/user_credential','refresh');
            }
            
        }
            
               
 public function add_user_wallet()
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('type', 'Type', 'trim|required'); 
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');
            //$this->form_validation->set_rules('entry_date', 'entry_date', 'trim|required');
            
                if($this->form_validation->run()==true){
                        $upp = $this->admin->add_wallet();
                        if($upp){
                            $this->session->set_flashdata('success_message','Details Updated Successfully');
                            redirect('admin/user_credential','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/user_credential','refresh');    
                        }
                        
                    
                
                }else{
                $this->session->set_flashdata('error_message','Please Check Your Details');
                $this->load->view('admin/user_credential',$data);
                }
            }else{
            // $this->session->set_flashdata('error_message', $this->upload->display_errors());
             redirect('admin/user_credential','refresh');
            }
            
        }   
  public function binary_history($pair_id='')
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
          $pair_amount=$this->db->where('description',$pair_id)->get('account')->result_array();
          $data['pair']=$pair_amount;
          $data['page_name'] = "binary_history"; 
          $this->load->view('admin/binary_history',$data); 
     
    }
    public function user_credential()
    {
       if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        $data['page_name'] ="user_credential";
        $this->load->view('admin/user_credential',$data);
    
    }
    
    
    public function view_user_details($user_id="")
    { 
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh');
        
        $data['page_name'] ="user_credential";
         $data['user'] = $this->db->where('username',hex2bin($user_id))->get('user_role')->row_array();
         $this->load->view('admin/view_user_details',$data);
      
    }
    
     public function mining_history($up_id="")
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
          $data['mining'] = $this->db->where('description',$up_id)->where('remark','ROI Income')->get('account')->result_array();
          
          $this->load->view('admin/mining_history',$data); 
        }
public function mining_master()
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        $data['page_name'] ="mining_master";
        $this->load->view('admin/mining_master',$data);
        
    }
    
public function unblock($id='')
{ 
     if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
    $block=$this->db->where('id',$id)->set('status','Active')->update('package',$data);
    $this->load->view('admin/mining_master',$data);

}
public function view_mining_master($mining="")
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
          $per = hex2bin($mining);
          $data['mining_data']=$this->db->where('ROUND(CAST(percentage AS DECIMAL(4,2)), 2)=',$per)->where('status','Active')->get('package')->result_array();
          log_message('error',$this->db->last_query());
           $this->load->view('admin/view_mining_master',$data);
        
    }
public function block($id='')
{  
   if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
    $block=$this->db->where('id',$id)->set('status','Inactive')->update('package',$data);
    $this->load->view('admin/mining_master',$data);

    
}
public function package()
    {
       if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 

        $this->load->view('admin/package');
    }
    
    
    public function binary_master()
    {
       if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('pair_match', 'pair match percentage', 'trim|required');
            
                if($this->form_validation->run()==true){
                    
                            $data = array(
                                 'entry_date' => date("Y-m-d H:i:s"),
                                 'binary_percentage'=> $this->input->post('pair_match'),
                               );
                               
                             $this->db->insert('binary_master',$data);
                             
                             $dataa = array(
                                 'entry_date' => date("Y-m-d H:i:s"),
                                 'reward'=> $this->input->post('pair_match'),
                               );
                             $this->db->where('type','binary income')->update('master',$dataa);
                             
                             $this->session->set_flashdata('success_message','Details Updated Successfully');
                             redirect('admin/binary_master','refresh');
                        }else{
                        $data['page_name'] = "binary_master"; 
                        $this->load->view('admin/binary_master',$data);    
                        }
                        
                     }else{
                $data['page_name'] = "binary_master"; 
                $this->load->view('admin/binary_master',$data);
            }
            
}
public function refferal_master()
    {
       if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('percentage', 'refferal percentage', 'trim|required');
            
                if($this->form_validation->run()==true){
                    
                    $ref_data = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'referal_percentage'=> $this->input->post('percentage'),
                       );
                       
                     $this->db->insert('referal_master',$ref_data);
                     
                     $ref_dataa = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'reward'=> $this->input->post('percentage'),
                       );
                     $this->db->where('type','direct income')->update('master',$ref_dataa);
                     
                     $this->session->set_flashdata('success_message','Details Updated Successfully');
                     redirect('admin/refferal_master','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/refferal_master','refresh');    
                        }
                        
                     }else{
                    $data['page_name'] ="refferal_master";
                    $this->load->view('admin/refferal_master',$data);
            }
            
}

  public function rank_master()
    {
      if($this->session->userdata('mcusertype')!='a')
        redirect('admin/rank_master','refresh'); 

        $this->load->view('admin/rank_master');
  }

    public function split_form_level()
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('e_wallet', 'e_wallet', 'trim|required');
            $this->form_validation->set_rules('withdraw_wallet', 'withdraw_wallet', 'trim|required');
            
                if($this->form_validation->run()==true){
                    
                    $level_data = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'reward'=> $this->input->post('withdraw_wallet')
                       );
                    $this->db->where('type','elevel divide')->update('master',$level_data);
                       $elevel_data = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'reward'=> $this->input->post('e_wallet'),
                        );
                     $this->db->where('type','level divide')->update('master',$elevel_data);
                    
                     
                     $dataaa = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'level_divide'=> $this->input->post('e_wallet'),
                         'elevel_divide'=> $this->input->post('withdraw_wallet'),
                         'type'=> "level"
                       );
                     $this->db->insert('split_binary_master',$dataaa);
                
                     $this->session->set_flashdata('success_message','Details Updated Successfully');
                     redirect('admin/level_master','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/level_master','refresh');    
                        }
                        
                }else{
                         
                    $this->load->view('admin/level_master');
            }
            
}
public function split_form_binary()
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('e_wallet', 'e_wallet', 'trim|required');
            $this->form_validation->set_rules('withdraw_wallet', 'withdraw_wallet', 'trim|required');
            
                if($this->form_validation->run()==true){
                    
                    $data = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'reward'=> $this->input->post('withdraw_wallet')
                       );
                        $this->db->where('type','ebinary divide')->update('master',$data);
                       $e_data = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'reward'=> $this->input->post('e_wallet'),
                        );
                     $this->db->where('type','binary divide')->update('master',$e_data);
                    
                     
                     $dataa = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'binary_divide'=> $this->input->post('e_wallet'),
                         'ebinary_divide'=> $this->input->post('withdraw_wallet'),
                         'type'=> "binary"
                       );
                     $this->db->insert('split_binary_master',$dataa);
                
                     $this->session->set_flashdata('success_message','Details Updated Successfully');
                     redirect('admin/binary_master','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/binary_master','refresh');    
                        }
                        
                     }else{
                $this->load->view('admin/binary_master');
            }
            
}
public function split_form_referal()
    {
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('e_wallet', 'e_wallet', 'trim|required');
            $this->form_validation->set_rules('withdraw_wallet', 'withdraw_wallet', 'trim|required');
            
                if($this->form_validation->run()==true){
                    
                    $referal_data = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'reward'=> $this->input->post('withdraw_wallet')
                       );
                        $this->db->where('type','edirect divide')->update('master',$referal_data);
                       $ereferal_data = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'reward'=> $this->input->post('e_wallet'),
                        );
                     $this->db->where('type','direct divide')->update('master',$ereferal_data);
                    
                     
                     $referal_dataa = array(
                         'entry_date' => date("Y-m-d H:i:s"),
                         'direct_divide'=> $this->input->post('e_wallet'),
                         'edirect_divide'=> $this->input->post('withdraw_wallet'),
                         'type'=> "direct"
                       );
                     $this->db->insert('split_binary_master', $referal_dataa);
                
                     $this->session->set_flashdata('success_message','Details Updated Successfully');
                     redirect('admin/refferal_master','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/refferal_master','refresh');    
                        }
                        
                     }else{
                $this->load->view('admin/refferal_master');
            }
            
}
public function split_form_mining()
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('e_wallet', 'e_wallet', 'trim|required|numeric|greater_than_equal_to[0]');
            $this->form_validation->set_rules('withdraw_wallet', 'withdraw_wallet', 'trim|required|numeric|greater_than_equal_to[0]');
            
                if($this->form_validation->run()==true){
                    
                            $m_data = array(
                                 'entry_date' => date("Y-m-d H:i:s"),
                                 'reward'=> $this->input->post('withdraw_wallet')
                               );
                                $this->db->where('type','eroi divide')->update('master',$m_data);
                               $mi_data = array(
                                 'entry_date' => date("Y-m-d H:i:s"),
                                 'reward'=> $this->input->post('e_wallet')
                                );
                             $this->db->where('type','roi divide')->update('master',$mi_data);
                            
                             
                             $m_dataa = array(
                                 'entry_date' => date("Y-m-d H:i:s"),
                                 'roi_divide'=> $this->input->post('e_wallet'),
                                 'eroi_divide'=> $this->input->post('withdraw_wallet'),
                                 'type'=> "mining"
                               );
                             $this->db->insert('split_binary_master',$m_dataa);
                        
                             $this->session->set_flashdata('success_message','Details Updated Successfully');
                             redirect('admin/mining_master','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('admin/mining_master','refresh');    
                        }
                        
                     }else{
                $this->load->view('admin/mining_master');
            }
            
}
public function level_master()
    {
       if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
         $data['page_name'] = "level_master"; 
        $this->load->view('admin/level_master',$data);
    }
    
    public function wallet_update()
    {
       if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
         $data['page_name'] = "wallet_update"; 
        $this->load->view('admin/wallet_update',$data);
    }

// public function support()
//     {
//       if($this->session->userdata('mcusertype')!='a')
//         redirect('admin/index','refresh'); 

//         $this->load->view('admin/support');
//     }
        public function aitrade()
    {
    $this->load->view('admin/aitrade');
}
    public function support_ticket_chat($sender="")
    {
       if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
    
     $countt=$this->db->where('sender_id',$sender)->where('status','unread')->count_all_results('chat_messages')+0;
     if($countt>0){
         $data['status']='read';
         $this->db->where('sender_id',$sender)->update('chat_messages',$data);
     }
        $data['chats']=$this->db->where('sender_id',$sender)->get('chat_messages')->result_array();
        $this->load->view('admin/support_ticket_chat',$data);
    }
    
    public function send_message()
{
     if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
//   if($POST){

      $sender_id = $this->input->post('sender');
      $receiver_id = $this->input->post('receiver');
      $message = $this->input->post('message');
      $this->admin->save_messages();
//  }else{
     redirect('admin/support_ticket_chat/'.$receiver_id);
//   }
     
}
    public function view_mining_history()
    {
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
      $this->load->view('admin/view_mining_history');
    }
    
    public function fd_activate()
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
          if($_POST){ 
        
            $this->form_validation->set_rules('package_name', 'Package name', 'trim|required');
            $this->form_validation->set_rules('package_value', 'Package value', 'trim|required|numeric'); 
            $this->form_validation->set_rules('days', 'Days', 'trim|required|numeric');
            $this->form_validation->set_rules('percentage', 'Percentage', 'trim|required');
            
                if($this->form_validation->run()==true){
                    
                    $data = array(
                        
                         'entry_date' => date("Y-m-d H:i:s"),
                         'package_name'=> $this->input->post('package_name'),
                         'percentage'=> $this->input->post('percentage'),
                         'value'=> $this->input->post('package_value'),
                         'days'=> $this->input->post('days'),
                       );
                       
                     $inn = $this->db->insert('fd_package',$data);
                     
                     if($inn){
                         $this->session->set_flashdata('success_message','Details Updated Successfully');
                         redirect('admin/fd_activate','refresh');
                     }else{
                         $this->session->set_flashdata('error_message','Details Updated Successfully');
                         redirect('admin/fd_activate','refresh');
                     }
                    }else{
                      $data['page_name'] = "fd_activate";  
                      $this->load->view('admin/fd_activate',$data);   
                    }
                        
                    
                
                }else{
                $this->session->set_flashdata('error_message','Please Check Your Details');
                $data['page_name'] = "fd_activate";  
                $this->load->view('admin/fd_activate',$data);
            }
            //$this->load->view('admin/fd_activate');
    }
    
 public function fd_activate_edit($id="")
    {
         if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
        if($_POST){ 
            $this->form_validation->set_rules('id', 'ID', 'trim|required');
            $this->form_validation->set_rules('package_name', 'Package name', 'trim|required');
            $this->form_validation->set_rules('package_value', 'Package value', 'trim|required|numeric'); 
            $this->form_validation->set_rules('days', 'Days', 'trim|required|numeric');
            $this->form_validation->set_rules('percentage', 'Percentage', 'trim|required');
            
                if($this->form_validation->run()==true){
                    
                    $data = array(
                        
                         'package_name'=> $this->input->post('package_name'),
                         'percentage'=> $this->input->post('percentage'),
                         'value'=> $this->input->post('package_value'),
                         'days'=> $this->input->post('days'),
                       );
                       
                         $this->db->where('id',$this->input->post('id')); 
                         $edited = $this->db->update('fd_package',$data);
                         
                         if($edited)
                         {
                             $this->session->set_flashdata('success_message','Package updated');
                             redirect('admin/fd_activate','refresh');
                         }else{
                             $this->session->set_flashdata('error_message','Please try again');
                             redirect('admin/fd_activate','refresh');
                         }
                    }else{
                     //$this->session->set_flashdata('error_message','Please Try Again');
                     $data['page_name'] = "fd_activate";  
                    $this->load->view('admin/fd_activate_edit',$data);
                    }
                        
                    
                
                }else{
                    $fd = hex2bin($id);
                    $data['fd_package'] = $this->db->where('id',$fd)->get('fd_package')->row_array();
                     $data['page_name'] = "fd_activate";  
                    $this->load->view('admin/fd_activate_edit',$data);
                }
    }
    
     public function trading()
    { 
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
      $data['page_name'] = "trading";   
      $this->load->view('admin/trading',$data);
    }
    
    
    
     public function ai_trading_profit_history()
    { 
        if($this->session->userdata('mcusertype')!='a')
        redirect('admin/index','refresh'); 
        
      $this->load->view('admin/ai_trading_profit_history');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}