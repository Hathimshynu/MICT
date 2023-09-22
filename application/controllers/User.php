<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','string'));
        $this->load->library(array('form_validation', 'email'));
        $this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
    }
    
    public function get_game_result(){
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $get_last_game_of_user = $this->db->where('username',$this->session->userdata('micusername'))->where('description','new')->get('game')->row_array();
        
        if(!empty($get_last_game_of_user)){
            
            $get_result = $this->db->where('game_id',$get_last_game_of_user['game_id'])->get('game_resuts')->row_array();
            
            if(!empty($get_result))
            {
                $this->db->set('description','old');
                $this->db->where('game_id',$get_last_game_of_user['game_id']);
                $this->db->where('username',$this->session->userdata('micusername'));
                $this->db->update('game');
            
                if($get_result['win'] == $get_last_game_of_user['remark']){
                    $data['message'] = 'Win';
                }else{
                   $data['message'] = 'Loss'; 
                }
            }else{
                $data['message'] = 'Empty'; 
            }
            
        } else {
            $data['message'] = 'Empty'; 
        }
        
        echo json_encode($data);
    }
    
    public function support()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        if($_POST){ 
            $this->form_validation->set_rules('support_type', 'Support Type', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            log_message('error',$this->input->post('support_type'));
            log_message('error',$this->input->post('description'));
            if($this->form_validation->run()==true){
                $upp = $this->user->support();
                if($upp){
                    $this->session->set_flashdata('success_message','Support Request Sent Successfully');
                    redirect('user/support','refresh');
                }else{
                    $this->session->set_flashdata('error_message','Please Try Again');
                    redirect('user/support','refresh');    
                }
            }else{
                $vdsdfv = implode(" <br> ", $this->form_validation->error_array());
                $this->session->set_flashdata('error_message',$vdsdfv);
                redirect('user/support','refresh');
            }
        }else{
            
            //  $count = $this->db->where('user_id',$this->session->userdata('usquareusername'))->where('view','unread')->count_all_results('support')+0;
             
            //  if($count > 0){
            //      $this->db->set('view','read');
            //      $this->db->where('user_id',$this->session->userdata('usquareusername'));
            //      $this->db->where('view','unread');
            //      $this->db->update('support');
            //  }
            
             $this->load->view('user/support');
        }
    }
    
    public function coinpayments_api_call($cmd, $req = array()) {
            // Fill these in from your API Keys page
            $public_key = '1fab085d98338c0390a5e72f97a3dcb231ae898929a6662a71ff1fbc98747e0a';
            $private_key = '6a50a734bD065cf6829fbba36701F99D746F7cEa8dA7cF90A3fa694490Ea76e6';
        
            // Set the API command and required fields
            $req['version'] = 1;
            $req['cmd'] = $cmd;
            $req['key'] = $public_key;
            $req['format'] = 'json'; //supported values are json and xml
            $req['currency1'] = 'USDT.TRC20';
            $req['currency2'] = 'USDT.TRC20';
            $req['success_url'] = 'https://mict.uk/user/payment_success';
            $req['cancel_url'] = 'https://mict.uk/user/payment_cancel';
            
            
            // Generate the query string
            $post_data = http_build_query($req, '', '&');
        
            // Calculate the HMAC signature on the POST data
            $hmac = hash_hmac('sha512', $post_data, $private_key);
        
            // Create cURL handle and initialize (if needed)
            static $ch = NULL;
            if ($ch === NULL) {
                $ch = curl_init('https://www.coinpayments.net/api.php');
                curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: '.$hmac));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        
            // Execute the call and close cURL handle
            $data = curl_exec($ch);
            // Parse and return data if successful.
            if ($data !== FALSE) {
                if (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) {
                    // We are on 32-bit PHP, so use the bigint as string option. If you are using any API calls with Satoshis it is highly NOT recommended to use 32-bit PHP
                    $dec = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);
                } else {
                    $dec = json_decode($data, TRUE);
                }
                if ($dec !== NULL && count($dec)) {
                    return $dec;
                } else {
                    // If you are using PHP 5.5.0 or higher you can use json_last_error_msg() for a better error message
                    return array('error' => 'Unable to parse JSON result ('.json_last_error().')');
                }
            } else {
                return array('error' => 'cURL error: '.curl_error($ch));
            }
        }
        
        
    public function payment_success(){
        
        $txn = $this->db->where('status', 'Wait')->where('user_id', $this->session->userdata('micusername'))->order_by('wallet_id', 'ASC')->get('pay_status')->row_array();
        
        $resultxx = $this->coinpayments_api_call('get_tx_info',array('txid' => $txn['txn_id']));
        
        if($resultxx['error']=='ok'){
            $status = $resultxx['result']['status'];
            
            if($status == 1){
                
                $query = $this->db->set('status', 'Success')->where('txn_id', $txn['txn_id'])->update('pay_status');
                
                $wallet =array(
            		    'user_id' => $this->session->userdata('micusername'),
            		    'credit' => $txn['amount'],
            		    'entry_date' => date('Y-m-d H:i:s'),
            		    'description' => $txn['txn_id'],
            		    'remark' => 'Deposit'
            		);
            		
            	$eprofile = $this->db->insert('e_wallet',$wallet);
                
                $this->load->view('user/payment_success');
            } else if($status == -1){
                $query = $this->db->set('status', 'Cancelled')->where('txn_id', $txn['txn_id'])->update('pay_status');
                $this->load->view('user/payment_cancel');
            } else {
                redirect('user/gateway_deposit','refresh');
            }
            
        }
        
    }
    
    public function payment_cancel(){
        $txn = $this->db->where('status', 'Wait')->where('user_id', $this->session->userdata('micusername'))->order_by('wallet_id', 'ASC')->get('pay_status')->row_array();
        
        $resultxx = $this->coinpayments_api_call('get_tx_info',array('txid' => $txn['txn_id']));
        
        if($resultxx['error']=='ok'){
            $status = $resultxx['result']['status'];
            
            if($status == 1){
                
                $query = $this->db->set('status', 'Success')->where('txn_id', $txn['txn_id'])->update('pay_status');
                
                $wallet =array(
            		    'user_id' => $this->session->userdata('micusername'),
            		    'credit' => $txn['amount'],
            		    'entry_date' => date('Y-m-d H:i:s'),
            		    'description' => $txn['txn_id'],
            		    'remark' => 'Deposit'
            		);
            		
            	$eprofile = $this->db->insert('e_wallet',$wallet);
                
                $this->load->view('user/payment_success');
            } else if($status == -1){
                $query = $this->db->set('status', 'Cancelled')->where('txn_id', $txn['txn_id'])->update('pay_status');
                $this->load->view('user/payment_cancel');
            } else {
                redirect('user/gateway_deposit','refresh');
            }
            
        } else {
            redirect('user','refresh');
        }
    }
    
    public function gateway_deposit()
    {
        
         if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
   
             $txn = $this->db->where('status', 'Wait')->where('user_id', $this->session->userdata('micusername'))->order_by('wallet_id', 'ASC')->get('pay_status')->row_array();
        
            $resultxx = $this->coinpayments_api_call('get_tx_info',array('txid' => $txn['txn_id']));
           /* echo "<pre>";
   print_r($resultxx);
echo "</pre>";*/
            if($resultxx['error']=='ok'){
                $status = $resultxx['result']['status'];

               if($status == 1){
                    
                    $query = $this->db->set('status', 'Success')->where('txn_id', $txn['txn_id'])->update('pay_status');
                    
                    $wallet =array(
                		    'user_id' => $this->session->userdata('micusername'),
                		    'credit' => $txn['amount'],
                		    'entry_date' => date('Y-m-d H:i:s'),
                		    'description' => $txn['txn_id'],
                		    'remark' => 'Deposit'
                		);
                		
                	$eprofile = $this->db->insert('e_wallet',$wallet);
                    
                } else if($status == -1){
                    $query = $this->db->set('status', 'Cancelled')->where('txn_id', $txn['txn_id'])->update('pay_status');
                } 
                
                
                
            }
            
            $this->load->view('user/gateway_deposit');
        }
        
   
    public function geme_result_cron()
    {
        $this->db->trans_begin();
        $rsss = $this->user->get_game();
        $game_id = date('Y-m-d')."_".($rsss['game_id']-1);
        $red_total = $this->db->select('SUM(amount) as balance')->where('remark','red')->where('game_id',$game_id)->get('game')->row()->balance + 0;
        $green_total = $this->db->select('SUM(amount) as balance')->where('remark','green')->where('game_id',$game_id)->get('game')->row()->balance + 0;
        
        if($red_total > $green_total){
            
            $hgjbkm = 'green';
            $loss='red';
        } else if($green_total > $red_total){
            $hgjbkm = 'red';
            $loss='green';
        }else if($red_total == 0 || $green_total == 0) {
            // If either red_total or green_total is 0, generate a random winner.
            $fdg = rand(1, 2);
            if ($fdg == 1) {
                $hgjbkm = 'red';
                $loss = 'green';
            } else {
                $hgjbkm = 'green';
                $loss = 'red';
            }
        } else {
            $fdg = rand(1,2);
            if($fdg == 1){
                $hgjbkm = 'green';
                $loss='red';
            } else {
                $hgjbkm = 'red';
                $loss='green';
            }
            
        }
        $data['win'] = $hgjbkm;  
        $data['loss'] = $loss;  
        $data['game_id'] = $game_id;
        $this->db->insert('game_resuts',$data);
        
        $game_check = $this->db->where('remark', $hgjbkm)->where('game_id', $game_id)->get('game')->result_array();
        foreach($game_check as $key => $val){
            
             $amount=$val['amount']*2;
             $twentpercent=($amount*20)/100;
             $deduct_bal=($amount)-($twentpercent);
             log_message('error','TWENTY PERCENTAGE' .$twentpercent);
             log_message('error','DEDUCT BAL' .$deduct_bal);
            
            $data1['game_id'] = $game_id;
            $data1['credit'] = $deduct_bal;
            $data1['remark'] =  "Win";
            $data1['username'] = $val['username'];
            $data1['entry_date'] = date('Y-m-d H:i:s');
            $data1['description'] =$val['remark'];
            $data1['deducted_amount'] = $twentpercent;
            $data1['deducted_balance'] = $deduct_bal;
         
             $this->db->insert('game_wallet',$data1);
             
             
             $teams=$this->db->select('team')->where('child_id',$val['username'])->get('uni_tree')->row()->team;
             $game_level=$this->user->game_level_income($teams,$val['username'],$twentpercent);
        }
        
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                exit();
        }
        else
        {
                $this->db->trans_commit();
                exit();
        }
        
        
    }
    
    
    // public function geme_result_cron()
    // {
    //     $this->db->trans_begin();
    //     $rsss = $this->user->get_game();
    //     $game_id = date('Y-m-d')."_".($rsss['game_id']-1);
    //     $red_total = $this->db->select('SUM(amount) as balance')->where('remark','red')->where('game_id',$game_id)->get('game')->row()->balance + 0;
    //     $green_total = $this->db->select('SUM(amount) as balance')->where('remark','green')->where('game_id',$game_id)->get('game')->row()->balance + 0;
        
    //     if($red_total > $green_total){
            
    //         $hgjbkm = 'red';
    //     } else if($green_total > $red_total){
    //         $hgjbkm = 'green';
    //     } else {
    //         $fdg = rand(1,2);
    //         if($fdg == 1){
    //             $hgjbkm = 'green';
    //         } else {
    //             $hgjbkm = 'red';
    //         }
            
    //     }
    //     $data['win'] = $hgjbkm;  
    //     $data['game_id'] = $game_id;
    //     $this->db->insert('game_resuts',$data);
        
    //     $game_check = $this->db->where('remark', $hgjbkm)->where('game_id', $game_id)->get('game')->result_array();
    //     foreach($game_check as $key => $val){
    //         $data1['game_id'] = $game_id;
    //         $data1['debit'] = $val['amount']*2;
    //         $data1['remark'] =  "Win";
    //         $data1['username'] = $val['username'];
    //         $data1['entry_date'] = date('Y-m-d H:i:s');
    //         $data1['description'] =$val['remark'];
         
    //          $this->db->insert('game_wallet',$data1);
    //     }
        
    //     if ($this->db->trans_status() === FALSE)
    //     {
    //             $this->db->trans_rollback();
    //             exit();
    //     }
    //     else
    //     {
    //             $this->db->trans_commit();
    //             exit();
    //     }
        
        
    // }

    
       public function investment($mode="")
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
            $data['mode'] = $mode;
            $this->load->view('user/investment',$data); 
        }
        
        
       public function ai_trading_transfer_history()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $this->load->view('user/ai_trading_transfer_history'); 
        }
        
        public function kyc()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $this->load->view('user/kyc'); 
        }
        
        
        
       public function view_stack_profit_history($id='')
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $data['id']=$id;
        log_message('error',$id);
        
        $this->load->view('user/view_stack_profit_history',$data); 
        }
    
    
    public function currentgame(){
        
        if ($this->session->userdata('micusertype') != 'u') 

        redirect('user', 'refresh');
        
       $game= $this->user->creategame_id();
        if($game){
            echo json_encode(['gameId' => $game]);
        }
  }
  
  
    
 public function game_invest()
{
    if ($this->session->userdata('micusertype') != 'u') {

        redirect('user', 'refresh');

    }


    $this->load->library('form_validation');

  

      $this->form_validation->set_rules('amount', 'Amount', 'required|numeric|greater_than_equal_to[0.5]|callback_check_amount');
      $this->form_validation->set_message('greater_than_equal_to', 'Minimum Deposit Amount must be greater than or equal to 30.');
      $this->form_validation->set_rules('remark', 'Game', 'required|callback_check_played|callback_check_time');
      //$this->form_validation->set_rules('remark', 'Time', 'required|');


    if ($this->form_validation->run() == false) {

        $response['status'] = 'error';

        $response['message'] = validation_errors();

    } else {
        $username = $this->session->userdata('micusername');
        $approve = $this->user->game_manage($username);


        if ($approve) {

            $response['status'] = 'success';

            $response['message'] = 'Success';

        } else {

            $response['status'] = 'error';

            $response['message'] = 'Error found';

        }

    }

    echo json_encode($response);

}   

public function check_played()
{
    $rsss = $this->user->get_game();
    $game_id = date('Y-m-d')."_".$rsss['game_id'];
    $played = $this->db->where('username',$this->session->userdata('micusername'))->where('game_id',$game_id)->count_all_results("game")+0;
    // log_message('error',$this->db->last_query());
    if($played == 0)
    {
        return TRUE;    
    }
    else
    {
        $this->form_validation->set_message('check_played', "already invested");
        return FALSE;
    }
} 

public function check_time()
{
    $people = array("8", "9", "18", "19", "28", "29", "38", "39", "48", "49", "58", "59");

    if (in_array(date('i'), $people))
      {
      $this->form_validation->set_message('check_time', "Now freezing time");
        return FALSE;
      }
    else
      {
      return TRUE;    
      }
    
} 
public function check_amount($amount)
{
    $available = $this->db->select('SUM(credit) - SUM(debit) as balance')
                         ->where('username', $this->session->userdata('micusername'))
                         ->get('game_wallet')
                         ->row()
                         ->balance + 0;
//  log_message('error',$this->db->last_query());
     if($amount <= $available)
    {
        return TRUE;    
    }
    else
    {
        $this->form_validation->set_message('check_amount', "Insufficent Balance");
        return FALSE;
    }
}  


    
    public function get_slab() {
    
    // log_message('error','SLAB'.$selectedSlab);
    
    $slab = $this->db->group_by('slab')->get('slab_master')->result_array();
    echo json_encode($slab);
  }

    public function get_slab_packages() {
    $selectedSlab = $this->input->post('slab');
    
    // log_message('error','SLAB'.$selectedSlab);
    
    $slabToPackages = $this->db->where('slab',$selectedSlab)->get('slab_master')->result_array();
    echo json_encode($slabToPackages);
}


    
public function transfer_stack_wallet()
{
    if ($this->session->userdata('micusertype') != 'u') {
        redirect('user', 'refresh');
    }

    $this->load->library('form_validation');

    // $this->form_validation->set_rules('mode', 'Mode', 'trim|required');
    $this->form_validation->set_rules('amount', 'Amount','trim|numeric|required|greater_than[30]|callback_user_amount_check');


    if ($this->form_validation->run() == false) {
        $response['status'] = 'error';
        $response['message'] = validation_errors();
    } else {

        $deposit = $this->user->stacking_insert();

        if ($deposit) {

            $response['status'] = 'success';
            $response['message'] = 'Amount Transfered To Stacking Wallet Successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Something Went Wrong';
        }
    }

    echo json_encode($response);
    
    
}


public function transfer_to_wallet()
{
    if ($this->session->userdata('micusertype') != 'u') {
        redirect('user', 'refresh');
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('from_wallet', 'FROM', 'trim|required|callback_user_all_wallet_check');
    $this->form_validation->set_rules('to_wallet', 'FROM', 'trim|required');

    if ($this->form_validation->run() == false) {
        $response['status'] = 'error';
        $response['message'] = validation_errors();
    } else {

        $deposit = $this->user->transfer_wallet();

        if ($deposit=='true') {

            $response['status'] = 'success';
            $response['message'] = 'Amount Transfered  Successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Something Went Wrong';
        }
    }

    echo json_encode($response);
    
    
}


//     public function transfer_trade_wallet()
    
//     {
//         if ($this->session->userdata('micusertype') != 'u') {
//             redirect('user', 'refresh');
//         }
       
//          if($_POST){
             
//         $this->load->library('form_validation');
    
//         $this->form_validation->set_rules('slab', 'slab','trim|required');
//         $this->form_validation->set_rules('package', 'package','trim|required|callback_user_wallet_check');
        
//         // log_message('error','SLAB'.$this->input->post('slab'));
//         // log_message('error','PACKAGE'.$this->input->post('package'));
//         // log_message('error','PACKAGE_id'.$this->input->post('package_id'));
    
    
//         if ($this->form_validation->run() == false) {
//             $response['status'] = 'error';
//             $response['message'] = validation_errors();
//         } else {
    
//             $transfer = $this->user->tradewallet_transfer();
    
//             if ($transfer) {
    
//                 $response['status'] = 'success';
//                 $response['message'] = 'Amount Transfered to Trading Wallet Successfully';
//             } else {
//                 $response['status'] = 'Something Went Wrong';
//                 $response['message'] = 'Error found';
//             }
//         }
    
//         echo json_encode($response);
        
        
//     }
    
//  }


   public function transfer_trade_wallet()
    {
        if ($this->session->userdata('micusertype') != 'u') {
            redirect('user', 'refresh');
        }
       
         if($_POST){
             
             $user=$this->db->select('trading_status')->where('username',$this->session->userdata('micusername'))->get('user_role')->row()->trading_status;
        
        // if($user =='Disable'){
             
        $this->load->library('form_validation');
        $invest = $this->db->select_sum('transfer_amount')->where('user_id',$this->session->userdata('micusername'))->get('trading_wallet')->row()->transfer_amount+0;
        $this->form_validation->set_rules('slab', 'slab','trim|required');
        $this->form_validation->set_rules('package', 'package','trim|required|callback_user_wallet_check|greater_than['.$invest.']');
        $this->form_validation->set_message('greater_than', 'Sorry, you have to add sufficient balance amount in e-wallet or upgrade to a higher package');

        
        // log_message('error','SLAB'.$this->input->post('slab'));
        // log_message('error','PACKAGE'.$this->input->post('package'));
        // log_message('error','PACKAGE_id'.$this->input->post('package_id'));
    
    
            if ($this->form_validation->run() == false) {
                $response['status'] = 'error';
                $response['message'] = validation_errors();
            } else {
                
                // $package_value = $this->input->post('package');
                // $invest = $this->db->select_sum('transfer_amount')->where('user_id',$this->session->userdata('micusername'))->get('trading_wallet')->row()->transfer_amount+0;
                // $amount = $invest + $package_value;
                // $check_invest = $this->db->where('package',$amount)->get('slab_master')->row_array();
                
                // if(!empty($check_invest))
                // {
            
                    $transfer = $this->user->tradewallet_transfer();
            
                    if ($transfer) {
            
                        $response['status'] = 'success';
                        $response['message'] = 'Amount Transfered to Trading Wallet Successfully';
                    } else {
                        $response['status'] = 'error';
                        $response['message'] = 'Error found';
                    }
                // }else{
                //      $response['status'] = 'error';
                //      $response['message'] = 'Your investment limit has been exceeded, please try with another package';
                // }
                
            }
        //  } else{
        //      $response['status'] = 'error';
        //      $response['message'] = 'You Are Not Allowed to Invest Now. You can try it on weekend days when your AI switch is off.';
        //  }
          echo json_encode($response);
    }
    
 }


public function user_amount_check() {
    $amount = $this->input->post('amount');
    $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('user_id', $this->session->userdata('micusername'))
                        ->get('e_wallet')
                        ->row()
                        ->balance + 0;

    if ($amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_amount_check', 'Check your balance');
        return false;
    }
}

public function user_stack_check() {
    
    $amount = $this->input->post('amount');
    $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('user_id', $this->session->userdata('micusername'))
                        ->get('stacking_wallet')
                        ->row()
                        ->balance + 0;

    if ($amount > 0 && $amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_amount_check', 'Check your stacking Wallet balance');
        return false;
    }
}

public function user_all_wallet_check() {
    
       $from_wallet = $this->input->post('from_wallet');
       $to_wallet = $this->input->post('to_wallet');
       $amount = $this->input->post('amount');

    if ($from_wallet == 'e_wallet' && $to_wallet == 'withdraw_wallet' && $amount < 5) {
        $this->form_validation->set_message('user_all_wallet_check', 'Amount must be greater than or equal to 5 when transferring from E_Wallet to Withdraw Wallet');
        return false;
    }
    
    if ($from_wallet == 'withdraw_wallet' && $to_wallet == 'e_wallet' && $amount < 30) {
        $this->form_validation->set_message('user_all_wallet_check', 'Amount must be greater than or equal to 30 when transferring from withdraw_wallet to E_Wallet');
        return false;
    }
    
    if($this->input->post('from_wallet')=='e_wallet'){
     $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")->where('user_id', $this->session->userdata('micusername'))->get('e_wallet')->row()->balance + 0;

    if ($amount > 0 && $amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_all_wallet_check', 'Check your E_Wallet balance');
        return false;
    }
  }
  elseif($this->input->post('from_wallet')=='trading_wallet'){
      
         $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('user_id', $this->session->userdata('micusername'))
                        ->get('trading_wallet')
                        ->row()
                        ->balance + 0;

    if ($amount > 0 && $amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_all_wallet_check', 'Check your Trading Wallet balance');
        return false;
    }
  }
  
  elseif($this->input->post('from_wallet')=='withdraw_wallet'){
      
         $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('username', $this->session->userdata('micusername'))
                        ->get('account')
                        ->row()
                        ->balance + 0;

    if ($amount > 0 && $amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_all_wallet_check', 'Check your Withdraw Wallet balance');
        return false;
    }
  }
  elseif($this->input->post('from_wallet')=='gaming_wallet'){
      $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('username', $this->session->userdata('micusername'))
                        ->get('gaming_wallet')
                        ->row()
                        ->balance + 0;

    if ($amount > 0 && $amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_all_wallet_check', 'Check your Gaming Wallet balance');
        return false;
    }
  }
}


public function user_trading_check() {
    $amount = $this->input->post('amount');
    $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('user_id', $this->session->userdata('micusername'))
                        ->get('trading_wallet')
                        ->row()
                        ->balance + 0;

    if ($amount > 0 && $amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_amount_check', 'Check your Trading Wallet balance');
        return false;
    }
}

public function withdraw_wallet_check() {
    $amount = $this->input->post('amount');
    $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('username', $this->session->userdata('micusername'))
                        ->get('account')
                        ->row()
                        ->balance + 0;

    if ($amount > 0 && $amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_amount_check', 'Check your Withdraw Wallet balance');
        return false;
    }
}

public function gaming_wallet_check() {
    $amount = $this->input->post('amount');
    $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('username', $this->session->userdata('micusername'))
                        ->get('gaming_wallet')
                        ->row()
                        ->balance + 0;

    if ($amount > 0 && $amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_amount_check', 'Check your Gaming Wallet balance');
        return false;
    }
}



public function user_wallet_check() {
    $amount = $this->input->post('package');
    $balance = $this->db->select("(SUM(credit) - SUM(debit)) as balance")
                        ->where('user_id', $this->session->userdata('micusername'))
                        ->get('e_wallet')
                        ->row()
                        ->balance + 0;
    $invest = $this->db->select_sum('transfer_amount')->where('user_id',$this->session->userdata('micusername'))->get('trading_wallet')->row()->transfer_amount+0;
    
    $transfer_amount = $amount - $invest;

    if ($transfer_amount <= $balance) {
        return true;
    } else {
        $this->form_validation->set_message('user_wallet_check', 'E Wallet balance is Low');
        return false;
    }
}




    public function latestselectedslab() {
        
        $query = $this->db->select('*')->where('user_id', $this->session->userdata('micusername'))->order_by('wallet_id', 'desc')->get('trading_wallet')->row_array();
    
        log_message('error', 'Query Result: ' . json_encode($query));
        
        if (!empty($query)) {
            $response=$query['slab'];
        } else {
            $response=0;
        }
        echo json_encode($response);
    }  

    
    
      public function send_otp(){
        $dataemail=$this->session->userdata('micemail');
        $otp=rand(0001,99999);
        $data['otp']=$otp;
        $this->db->where('email',$dataemail);
        $this->db->update('user_role',$data);
     
            $this->load->library('email');
            $config = array(
                
            'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'mict.uk', 
            'smtp_port' => 465,
            'mailtype' => 'html',// it can be text or html
            'wordwrap' => TRUE,
            'newline' => "\r\n",
            'charset' => 'utf-8',
            'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
            'smtp_timeout' => '4', //in seconds
                
                );
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from('noreplay@backofficee.com', 'MICT');
            $this->email->reply_to('noreplay@backofficee.com', 'MICT');
            $this->email->to($dataemail);
            $this->email->subject("Forgor Password Change");
            //$this->email->message("<b>g jsdvdbjdf bjnfdm</b>");  
            $this->email->message($this->load->view('user/success',$data,true));   
            
         if($this->email->send()){
             $this->session->set_flashdata('success_message','OTP send to your mail ID');
                  redirect('user/forget_password','refresh');
         }else{
            $this->session->set_flashdata('error_message','Something went wrong, Please check your ID ');
                  redirect('user/forget_password','refresh');
         }
          }
          
          
          
    
    
    
    
    public function test(){
        echo time();
    }
    
    
    
    public function get_pack_details()
    {
        $pack = $this->input->post('pack');
    
        $package = $this->db->where('id',$pack)->get('fd_package')->row_array();
    
        //$tot = $amount/$coin_value;
        
        if (!empty($package)) {
            $pc['days'] =  $package['days'];
            $pc['percentage'] =  $package['percentage'];
            $pc['value'] =  $package['value'];
            echo json_encode($pc);
        } else {
            echo "empty";
        }
    }
    
    public function start_timer()
    {
        if($_POST){
         $insert = $this->admin->roi_generate();
          
          if($insert){
              redirect('user','refresh'); 
          }else{
             redirect('user','refresh');   
          }
        }else{
            redirect('user','refresh');
        }
    }

    public function stop_timer()
    {
        if($this->input->post('stop') == "stop"){
            
            $this->db->where('up_id',$this->input->post('up_id'));
            $stop = $this->db->update('user_package' ,array('start_time' => NULL,'end_time' => NULL,));
             
            if($stop)
            {
                echo "success";   
            }else{
                echo "error"; 
            }
        }
    }

    public function index()
    {
        if($this->session->userdata('micusertype') != 'u')
        {
            $this->load->view('user/sign_in');  
        }
        else{
            
            if($_POST){ 
        
            $this->form_validation->set_rules('package', 'Package', 'trim|required|callback_balance_check');
            
                if($this->form_validation->run()==true){
                    $upp = $this->admin->package_manage($this->session->userdata('micusername'));
                    if($upp){
                        $this->session->set_flashdata('success_message','Details Updated Successfully');
                        redirect('user','refresh');
                    }else{
                     $this->session->set_flashdata('error_message','Please Try Again');
                     redirect('user','refresh');    
                    }
                }else{
                //$this->session->set_flashdata('error_message','Please select package');
                $data['errors'] = $this->form_validation->error_array();
                $this->load->view('user/dashboard',$data);
               }
            }else{
            
            $data['page_name'] = "dashboard";
            $this->load->view('user/dashboard',$data); 
            }
        }

    } 
    
    
    
    
    
      public function balance_check()
      {
        $package_value = $this->db->select('value')->where('id',$this->input->post('package'))->get('package')->row()->value+0;
        
        $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('user_id',$this->session->userdata('micusername'))->get('e_wallet')->row()->balance+0;
    
        if ($package_value <= $balance)
        {
            return TRUE;
        }
        else
        {
           $this->form_validation->set_message('balance_check','Insufficient Balance');
           return FALSE;
        }
    
      }
      
      public function checkbal()
      {
        
        $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('username',$this->session->userdata('micusername'))->get('account')->row()->balance+0;
    
        if ($this->input->post('amount') <= $balance)
        {
            return TRUE;
        }
        else
        {
           $this->form_validation->set_message('checkbal','Insufficient Balance');
           return FALSE;
        }
    
      }
    
     public function withdrawal()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        if ($_POST) {
		     $error=array();
		   $this->form_validation->set_rules('amount', 'TRON', 'trim|required|numeric|greater_than_equal_to[30]|callback_checkbal');
            $this->form_validation->set_rules('tpass', 'Transaction Password', 'trim|required|callback_checktranpass');
    		if($this->form_validation->run()==true) {
    		    $address = $this->db->select('withdraw_wallet')->where('username',$this->session->userdata('micusername'))->get("user_wallet")->row()->withdraw_wallet; 
                $admin_wallet = $this->db->order_by('id','DESC')->get('admin_wallet')->row_array();

    		    $tron_wallet_from_address = $admin_wallet['withdraw_wallet'];
            	$tron_wallet_to_address   = $address;
            	$tron_private_key	 = $admin_wallet['private_key'];
            	$amt 				 = floatval($this->input->post('amount'));
            	
            	//echo $amt; exit;
            	include_once APPPATH . '/third_party/tron/tron-api-master/vendor/autoload.php';
            
            	$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
            	$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
            	$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
            
            	try {
            		$tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
            	} catch (\IEXBase\TronAPI\Exception\TronException $e) {
            		exit($e->getMessage());
            	}
            
            	$contract = $tron->contract('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t');  // Tether USDT https://tronscan.org/#/token20/TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t
                $tron->setAddress($tron_wallet_from_address);
                $tron->setPrivateKey($tron_private_key);
                $contract->setFeeLimit(100);
                
                $balance = $contract->balanceOf();
            	if($balance >= $amt)
            	{
            	    
            
            		try {
            				$vds =  $contract->transfer($tron_wallet_from_address, $amt,$tron_wallet_to_address);
                        sleep(3);
                        $detail = $tron->getTransaction($vds['txid']);
                        $checktran = $detail['ret'][0]['contractRet'];
                        if($checktran == 'SUCCESS'){
                            $withdraw =array(
                    		    'username' => $this->session->userdata('micusername'),
                    		    'debit' => $this->input->post('amount'),
                    		    'entry_date' => date('Y-m-d H:i:s'),
                    		    'remark' => "Withdraw",
                    		    'description' => $address
                    		    
                    		    );
                    		
                    		$this->db->insert('account',$withdraw);
                    						
                    		$this->session->set_flashdata('success_message', "Done Payment Successfully");
                		    redirect('user','refresh');
                        } else {
                            $this->session->set_flashdata('error_message', "try again");
        		            redirect('user/withdraw','refresh'); 
                        }
            			} catch (\IEXBase\TronAPI\Exception\TronException $e) {
            				die($e->getMessage());
            			}
 
            	}else{
            		$this->session->set_flashdata('error_message', "Insufficient USDT");
        		     redirect('user/withdraw','refresh'); 
            	}
               
		    }else{
    		     $this->session->set_flashdata('error_message', "Insufficient USDT / Enter Correct Transaction password");
    		     $data['page_name'] = "withdraw";
    		     $this->load->view('user/withdraw',$data);
    		}
		}else{
		     $data['page_name'] = "withdraw";
    		$this->load->view('user/withdraw',$data);
		}
    }
    
  
    
//     public function deposit()
//     {
//         if($this->session->userdata('micusertype')!='u')
//         redirect('user/index','refresh'); 
        
//         if ($_POST) {
// 		     $error=array();
//             $this->form_validation->set_rules('amount', 'Amount in TRON', 'trim|required|numeric|greater_than_equal_to[50]');
//             $this->form_validation->set_rules('tpass', 'Transaction Password', 'trim|required|callback_checktranpass');
//     		if($this->form_validation->run()==true) {
    		    
    		    
//     		    $address = $this->db->where('username',$this->session->userdata('micusername'))->get("user_wallet")->row_array(); 
//                 $admin_wallet = $this->db->select('wallet_address')->where('user_role_id',1)->get("user_role")->row()->wallet_address;

//     		    $tron_wallet_from_address = $address['withdraw_wallet'];
//             	$tron_wallet_to_address   = $admin_wallet;
//             	$tron_private_key	 = $address['private_key'];
//             	$amt 				 = floatval($this->input->post('amount'));
    		    
    		    
//     		    include_once APPPATH . '/third_party/tron/tron-api-master/vendor/autoload.php';
            
//             	$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
//             	$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
//             	$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
            	
            	
            	
//     		    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
//                 $contract = $tron->contract('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t');  // Tether USDT https://tronscan.org/#/token20/TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t
//                 $tron->setAddress($tron_wallet_from_address);
//                 $tron->setPrivateKey($tron_private_key);
//                 $contract->setFeeLimit(100);
                
//                 $usdtblance = $contract->balanceOf();
//                 if($usdtblance >= $amt){
//                 $vds =  $contract->transfer($tron_wallet_to_address, $amt,$tron_wallet_from_address);
//                 sleep(3);
//                 $detail = $tron->getTransaction($vds['txid']);
//                 $checktran = $detail['ret'][0]['contractRet'];
//                 if($checktran == 'SUCCESS'){
//                      $wallet =array(
//             		    'user_id' => $this->session->userdata('micusername'),
//             		    'credit' => $this->input->post('amount'),
//             		    'entry_date' => date('Y-m-d H:i:s'),
//             		    'description' => $address['withdraw_wallet'],
//             		    'remark' => 'Deposit'
//             		    );
            		
//             		$eprofile = $this->db->insert('e_wallet',$wallet);
 
//                     if($eprofile){
//                         $this->session->set_flashdata('success_message', "Done Payment Successfully.");
//                         redirect('user/deposit','refresh'); 
//                     } else {
//                       $this->session->set_flashdata('error_message', "Invalied USDT Transfer Request");
//                       redirect('user/deposit','refresh');  
//                     }

//                 } else {
//                     $this->session->set_flashdata('error_message', "Please Try Again");
//                     redirect('user/deposit','refresh'); 
//                 }
//                 }else{
//                      $this->session->set_flashdata('error_message', "Insufficient USDT");
//         		     redirect('user/deposit','refresh'); 
//             	}
    		    
               
// 		    }else{
//     		     $this->session->set_flashdata('error_message', "Insufficient USDT / Enter Correct Transaction password");
//     		     $data['page_name'] = "deposit";
//     		     $this->load->view('user/deposit',$data); 
//     		}
// 		}else{
		    
// 		    $address = $this->db->where('username',$this->session->userdata('micusername'))->count_all_results("user_wallet")+0;
// 		    if($address == 0){

// 	            require_once(APPPATH . '/third_party/tron/tron-api-master/vendor/autoload.php');
//                 try {
//             		$tron = new \IEXBase\TronAPI\Tron();
            
//             		$generateAddress = $tron->generateAddress(); // or createAddress()
//             		$isValid = $tron->isAddress($generateAddress->getAddress());
            		
//             		$wallet      = true;
//             		$hex         = $generateAddress->getAddress();
//             		$base58      = $generateAddress->getAddress(true);
//             		$private_key = $generateAddress->getPrivateKey();
//             		$public_key  = $generateAddress->getPublicKey();
            		
//             		$user_wallet_data=array(
//                      'private_key'=>$private_key,
//                      'entry_date'=>date('Y-m-d H:i:s'),
//                      'withdraw_wallet' => $base58,
//                      'username' => $this->session->userdata('micusername')
//                      );
                   
//                     $this->db->insert('user_wallet',$user_wallet_data);
                        
//             	} catch (\IEXBase\TronAPI\Exception\TronException $e) {
//             		echo $e->getMessage();
//             	}
//         	redirect('user/deposit','refresh'); 
// 		    } else {
// 		       $address = $this->db->where('username',$this->session->userdata('micusername'))->get("user_wallet")->row_array(); 
		       
		
//         		include_once APPPATH . '/third_party/tron/tron-api-master/vendor/autoload.php';
//             	$wallet_address = $address['withdraw_wallet'];
//                 $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
//                 $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
//                 $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
//                 try {
//                     $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
//                     $contract = $tron->contract('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t');
//                 } catch (\IEXBase\TronAPI\Exception\TronException $e) {
//                     exit($e->getMessage());
//                 }
//                 $tron->setAddress($wallet_address);
//                 $balance = $contract->balanceOf();

// 		    }
// 	        $data['balance'] = $balance+0;
// 	        $data['address'] = $address;
//     		$data['page_name'] = "deposit";
//     		$this->load->view('user/deposit',$data);
// 		}
//     }


public function mdeposit()
    {
       if($this->session->userdata('micusertype')!='u')
       redirect('user/index','refresh'); 

        
        if ($_POST) {

            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than_equal_to[30]|numeric');
            $this->form_validation->set_rules('utr', 'Transaction Hash', 'trim|required|callback_utrcheck');
            
            if ($this->form_validation->run() == true) {
                
                $check_req = $this->db->where('user_id',$this->session->userdata('micusername'))->where('status','Request')->get('admin_request')->row_array();
                
                if(empty($check_req))
                {
                    $refreg = $this->user->user_deposit();
                    
                    if ($refreg) {
                       $this->session->set_flashdata('success_message', "Requested Successfully.");
                       redirect('user/mdeposit', 'refresh');
                    } else {
                       $this->session->set_flashdata('error_message', "Please try again.");
                       redirect('user/mdeposit', 'refresh'); 
                    }
                }else{
                     $this->session->set_flashdata('error_message', "You already have a pending request.");
                       redirect('user/mdeposit', 'refresh'); 
                }
            } else {
                $this->load->view('user/mdeposit',$data);
            }
            
            
		}else{
		    
    		$this->load->view('user/mdeposit',$data);
		}
    }


 public function utrcheck(){
        
        $utr_check = $this->db->where('utr',$this->input->post('utr'))->get('admin_request')->row_array();

        if (!empty($utr_check))
        {
            $this->form_validation->set_message('utrcheck','Transaction Id already exist');
            return FALSE;
        }
        else
        {
           return TRUE;
        }
}

    public function deposit()
    {
       if($this->session->userdata('micusertype')!='u')
       redirect('user/index','refresh'); 

        
        if ($_POST) {
            $error = array();
             $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|greater_than[0]');
             $this->form_validation->set_rules('tpass', 'Transaction Password', 'trim|required|callback_checktranpass');
        try {
            if ($this->form_validation->run() == true) {
                
        	    $address = $this->db->where('username',$this->session->userdata('micusername'))->get("user_wallet")->row_array(); 
                $admin_wallet = $this->db->select('wallet_address')->where('user_role_id',1)->get("user_role")->row()->wallet_address;

    		    $tron_wallet_from_address = $address['withdraw_wallet'];
            	$tron_wallet_to_address   = $admin_wallet;
            	$tron_private_key	 = $address['private_key'];
            	$amt 				 = floatval($this->input->post('amount'));
        
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
                       $wallet =array(
            		    'user_id' => $this->session->userdata('micusername'),
            		    'credit' => $this->input->post('amount'),
            		    'entry_date' => date('Y-m-d H:i:s'),
            		    'description' => $address['withdraw_wallet'],
            		    'remark' => 'Deposit'
            		    );
            		
            		$eprofile = $this->db->insert('e_wallet',$wallet);
        
        
                        if ($eprofile) {
                            $this->session->set_flashdata('deposit_message', "Done Payment Successfully.");
                            redirect('user/deposit', 'refresh');
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
                throw new Exception("Enter USDT Greater than 0");
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error_message', $e->getMessage());
            $data['page_name'] = "deposit";
            $this->load->view('user/deposit', $data);
        }

		}else{
		    
		    $address = $this->db->where('username',$this->session->userdata('micusername'))->count_all_results("user_wallet")+0;
		    if($address == 0){

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
                     'username' => $this->session->userdata('micusername')
                     );
                   
                    $this->db->insert('user_wallet',$user_wallet_data);
                        
            	} catch (\IEXBase\TronAPI\Exception\TronException $e) {
            		echo $e->getMessage();
            	}
        	redirect('user/deposit','refresh'); 
		    } else {
		       $address = $this->db->where('username',$this->session->userdata('micusername'))->get("user_wallet")->row_array(); 
		       
		
        		include_once APPPATH . '/third_party/tron/tron-api-master/vendor/autoload.php';
            	$wallet_address = $address['withdraw_wallet'];
                $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
                $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
                $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
                try {
                    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
                    $contract = $tron->contract('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t');
                } catch (\IEXBase\TronAPI\Exception\TronException $e) {
                    exit($e->getMessage());
                }
                $tron->setAddress($wallet_address);
                $balance = $contract->balanceOf();

		    }
	        $data['balance'] = $balance+0;
	        $data['address'] = $address;
    		$data['page_name'] = "deposit";
    		$this->load->view('user/deposit',$data);
		}
    }
    
  public function checktranpass()
  {

    $regmailcheck = $this->db->where('username',$this->session->userdata('micusername'))->where('tpwd',$this->input->post('tpass'))->get('user_role')->row_array();

    if (empty($regmailcheck))
    {
          $this->form_validation->set_message('checktranpass','Enter Correct Transaction password');
          return FALSE;    
    }
    else
    {
         return TRUE;
    }

  }
    
    
    public function withdraw_ai_trading(){
        
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        if ($_POST) {
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|greater_than[0]|callback_check_tradebal');
            
    	 if ($this->form_validation->run() == false) {
            $response['status'] = 'error';
            $response['message'] = validation_errors();
            // log_message('error','TRADING AMOUNT'.$this->input->post('amount'));
        }else{
            //   $result = $this->user->aitrading_ins();
               
            //   if($result== true){
            //       $response['status']='success';
            //       $response['message']='Amount Withdrawal successful From AI Trading Wallet';
            //   }else{
            //       $response['status']='error';
            //       $response['message']='Something went wrong ! Please Try Agin';
            //   }  
            
            $response['status']='error';
            $response['message']='Withdrawals from the AI trading wallet are available after 30 days.';
          }
            
    
           echo json_encode($response);
        }
    }
    
    
    
     public function check_tradebal()
  {
     $amount = $this->input->post('amount');
     
    $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('user_id',$this->session->userdata('micusername'))->get('trading_wallet')->row()->balance+0;
    
    if ($amount > $balance)
    {
       
      $this->form_validation->set_message('check_tradebal','AI Trading Balance is Low ');
      return FALSE;    
    }
    else
    {

      log_message('error', $this->input->post('amount'));
      return TRUE;
    }

  } 
    
            public function get_trading_status()
    {
        $user=$this->db->select('trading_status')->where('username',$this->session->userdata('micusername'))->get('user_role')->row()->trading_status;
        
        if($user =='Enable'){
            $response['status']='Enable';
        }
        else{
            $response['status']='Disable';
        }
        echo json_encode($response);
    }
    
    
    
    
    public function update_trading_status()
    {
        $user=$this->db->select('trading_status')->where('username',$this->session->userdata('micusername'))->get('user_role')->row()->trading_status;
        
        if($user =='Disable'){
            $data['trading_status']='Enable';
            $data['trading_enable_time']=date('Y-m-d H:i:s');
            $upp = $this->db->where('username',$this->session->userdata('micusername'))->update('user_role',$data);
            
            $history = array(
            
             'user_id' => $this->session->userdata('micusername'),
             'status' => "Enable",
             'entry_date' => date("Y-m-d H:i:s")
                
            );
            
            $this->db->insert('trading_enable_history',$history);
        }
        $response['status']='success';
        $response['message'] = 'Trading AI has been enabled successfully.';
        echo json_encode($response);
    }
    
    
        public function disable_all_trading_status()
    {
        
        log_message('error','all trading status');
        $trading_status=$this->db->select('trading_status','Enable')->get('user_role')->result_array();
        
        foreach($trading_status as $key=>$val){
            
            $data['trading_status']='Disable';
            $data['trading_disable_time']=date('Y-m-d H:i:s');
            $this->db->update('user_role',$data);
        }
    }
    
    
    
   public function dashboard()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
            $this->load->view('user/dashboard'); 
        }
        
         public function activation_wallet()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/activation_wallet','refresh'); 
      
            $this->load->view('user/activation_wallet'); 
        }
        
    public function profile()
    {
       if($this->session->userdata('micusertype')!='u')
       redirect('user/index','refresh'); 
        
      if($_POST){
        
        $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Package', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile_no', 'Mobile', 'trim|required|numeric');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('wallet_address', 'Wallet address', 'trim|required');
        $this->form_validation->set_rules('tpwd', 'Transaction', 'trim|required');
        
            if($this->form_validation->run()==true){
                $upp = $this->user->update_profile($this->session->userdata('micusername'));
                if($upp){
                    $this->session->set_flashdata('success_message','Profile Updated Successfully');
                    redirect('user/profile','refresh');
                }else{
                 $this->session->set_flashdata('error_message','Please Try Again');
                 redirect('user/profile','refresh');    
                }
            }else{
                $data['page_name'] = "profile";
                $this->load->view('user/profile',$data);
            }
        }else{
          $data['page_name'] = "profile";
          $this->load->view('user/profile',$data); 
        }
    }
        
         public function under_maintenance()
    { 
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
    
      $data['page_name'] = "under_maintenance";
      $this->load->view('user/under_maintenance',$data); 
        }
        
        
         public function deposit_history()
    { 
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
    
      $data['page_name'] = "deposit_history";
      $this->load->view('user/deposit_history',$data); 
        }
   
   
   
   public function kyc_update()
{
    if ($this->session->userdata('winnerusertype') != 'u') {
        redirect('user', 'refresh');
    }

    $regcheck = $this->db->where('username', $this->session->userdata('winneruser'))->get('user_role')->row_array();

    if ($regcheck['id_name'] != "" && $regcheck['id_no'] != "") {
        $this->session->set_flashdata('error_message', 'KYC already updated');
        redirect('user/kyc', 'refresh');
    } else {

        if ($_POST) {
            $this->form_validation->set_rules('id_name', 'ID Name', 'trim|required');
            $this->form_validation->set_rules('id_no', 'ID No', 'trim|required');
            $this->form_validation->set_rules('user', 'User name', 'trim|required');

            if ($this->form_validation->run() == true) {
// Handle file upload
                $config['upload_path'] = 'assets/kyc/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $file_data = $this->upload->data();
                    $image = $file_data['file_name'];

                    $approve = $this->admin->update_kyc($image);

                    if ($approve) {
                        $this->session->set_flashdata('success_message', 'KYC updated successfully');
                        redirect('user/kyc', 'refresh');
                    } else {
                        $this->session->set_flashdata('error_message', 'Failed');
                        redirect('user/kyc_update', 'refresh');
                    }
                } else {
                    $upload_error = $this->upload->display_errors('', '');
                    $this->session->set_flashdata('error_message', 'File upload failed: ' . $upload_error);
                    redirect('user/kyc_update', 'refresh');
                }

            } else {
                $this->session->set_flashdata('error_message', 'Please try again');
                $this->load->view('user/kyc', $data);
            }
        } else {
            $this->load->view('user/kyc', $data);
        }
    }
}
   
   
  public function login()
  {
    if($_POST){
      $username= $this->input->post('username');
      $password= $this->input->post('password');
      $check= $this->admin->login($username,$password);

      if($check != false){
        $this->session->set_userdata('micusername',$check['username']);
        $this->session->set_userdata('micemail',$check['email']);
        $this->session->set_userdata('micusertype',$check['user_type']);
        $this->session->set_flashdata('success_message',"Welcome To MICT");
        redirect('user','refresh');
      }else {
        $this->session->set_flashdata('error_message',"Please enter valid username address and password");
        redirect('user','refresh');
      }
    }else{
        $this->session->set_flashdata('error_message',"Please enter valid username address and password");
        redirect('user','refresh');
    }  
  }

 public function logout()
  {
    $this->session->set_userdata('micusername','');
    $this->session->set_userdata('micemail','');
    $this->session->set_userdata('micusertype','');
    redirect('user','refresh');
  }
    
    public function registration($ref_id="")
    {
    
       if($_POST){
           $this->form_validation->set_rules('ref_id','refferal','trim|required');
           $this->form_validation->set_rules('first_name','Name','trim|required');
           $this->form_validation->set_rules('email','Email','trim|required|callback_emailrecheck');
           $this->form_validation->set_rules('pwd','Password','trim|required|min_length[6]|max_length[12]');
           $this->form_validation->set_rules('cpwd','Confirm Password','trim|required|matches[pwd]');
           $this->form_validation->set_rules('country','Country','trim|required');
           $this->form_validation->set_rules('mobile','Mobile no','trim|required|callback_mobrecheck|min_length[10]|max_length[20]');
        //   $this->form_validation->set_rules('position','Position','trim|required');
           $this->form_validation->set_rules('tpwd','Transaaction password','trim|required|min_length[4]|max_length[6]');
           $this->form_validation->set_rules('ctpwd','Confirm password','trim|required|matches[tpwd]');
    
    
           if($this->form_validation->run()==true){
    
               $result = $this->admin->register_manage();
               
               if($result['status'] == true){
                   $datasuccess['user'] = $result['user'];
                   $datasuccess['pass'] = $result['password'];
                    $datasuccess['email'] = $result['email'];
                   
                   $this->session->set_flashdata('success_message', 'Your account registered successfully');
                   $this->user->register_mail($datasuccess);
                   $this->load->view('user/mail_welcome',$datasuccess);
               }else{
                   $this->session->set_flashdata('error_message', 'Something went wrong');
                   redirect('user/registration','refresh');
               }   
           }
           else
           {
               
               $data['page_name'] = "registration";
               $this->load->view('user/registration',$data);
           } 
    
       } else{
           
           $ref = hex2bin($ref_id);
           $check_user =  $this->db->where('username',$ref)->where('user_type','u')->get('user_role')->row_array();
          
           if(!empty($check_user)){
               $data['referral'] = $check_user['username'];
           }else{
               $this->session->set_flashdata('error_message', 'Your referral link is expired. Please try again.');
               redirect('user','refresh');
           }

           
           
           $data['page_name'] = "registration";
           $this->load->view('user/registration',$data);
       }
    }
        
 public function emailrecheck()
  {

    $regmailcheck = $this->db->where('email',$this->input->post('email'))->count_all_results('user_role')+0;

    if ($regmailcheck > 0)
    {
      $this->form_validation->set_message('emailrecheck','Email already Exits');
      return FALSE;    
    }
    else
    {

      log_message('error', 'mobile');
      return TRUE;
    }

  }
  
   public function mobrecheck()
  {

    $mobcheck = $this->db->where('mobile_no',$this->input->post('mobile'))->count_all_results('user_role')+0;

    if ($mobcheck > 0)
    {
      $this->form_validation->set_message('mobrecheck','Mobile No already Exits');
      return FALSE;    
    }
    else
    {

      log_message('error', 'mobile');
      return TRUE;
    }

  }  
  
   public function profile_update()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|callback_emailreecheck'); 
            $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|callback_mobreecheck|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('country', 'country', 'trim|required');
            
                if($this->form_validation->run()==true){
                        $upp = $this->admin->update_profile();
                        if($upp){
                            $this->session->set_flashdata('success_message','Details Updated Successfully');
                            redirect('user/profile','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('user/profile','refresh');    
                        }
                        
                    
                
                }else{
                $this->session->set_flashdata('error_message','Please Check Your Details');
                 $data['page_name'] = "profile";
                $this->load->view('user/profile',$data);
            }
            
            
            }else{
            // $this->session->set_flashdata('error_message', $this->upload->display_errors());
             redirect('user/profile','refresh');
            }
            
        }
        
        public function binary_tree($select_parentid ="")
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        if ($select_parentid != '') {
            $data['sponsor'] = $this->db->where('username',$select_parentid)->get('user_role')->row_array();
        } else {
            $data['sponsor'] = $this->db->where('username',$this->session->userdata('micusername'))->get('user_role')->row_array();

        }
        $data['tree'] = 'tree';
        $data['page_name'] = 'binary_tree';
        $this->load->view('user/binary_tree',$data);
    }
    
    public function uni_level_tree($select_parentid="")
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
       if ($select_parentid != '') {
            $data['sponsor'] = $this->db->where('username',$select_parentid)->get('user_role')->row_array();
        } else {
            $data['sponsor'] = $this->db->where('username',$this->session->userdata('micusername'))->get('user_role')->row_array();

        }
        $data['page_name'] = 'uni_level_tree';
        $this->load->view('user/uni_level_tree',$data);
    }
  
  
//   public function buy_package()
//     { 
//         if($_POST){ 
        
//             $this->form_validation->set_rules('package', 'Package', 'trim|required|callback_balance_check');
            
//                 if($this->form_validation->run()==true){
//                     $upp = $this->admin->package_manage($this->session->userdata('micusername'));
//                     if($upp){
//                         $this->session->set_flashdata('success_message','Details Updated Successfully');
//                         redirect('user/profile','refresh');
//                     }else{
//                      $this->session->set_flashdata('error_message','Please Try Again');
//                      redirect('user/profile','refresh');    
//                     }
//                 }else{
//                 $this->session->set_flashdata('error_message','Please Check Your Details');
//                 $this->load->view('user/profile',$data);
//             }
            
            
//             }else{
//             // $this->session->set_flashdata('error_message', $this->upload->display_errors());
//              redirect('user/profile','refresh');
//             }
            
//         }
    

    
        
 public function mobreecheck()
  {

    $mobcheck = $this->db->where('mobile_no',$this->input->post('mobile'))->where('username !=',$this->session->userdata('micusername'))->count_all_results('user_role')+0;

    if ($mobcheck > 0)
    {
      $this->form_validation->set_message('mobreecheck','Mobile No already Exist');
      return FALSE;    
    }
    else
    {

      log_message('error', 'mobile');
      return TRUE;
    }

  } 
  
   public function emailreecheck()
  {

    $regmailcheck = $this->db->where('email',$this->input->post('email'))->where('username !=',$this->session->userdata('micusername'))->count_all_results('user_role')+0;

    if ($regmailcheck > 0)
    {
      $this->form_validation->set_message('emailreecheck','Email already Exits');
      return FALSE;    
    }
    else
    {

      log_message('error', 'mobile');
      return TRUE;
    }

  }

 public function reset_password()
  {
    if($this->session->userdata('micusertype') !='u')
      redirect('user','refresh');

    if($_POST){

      $this->form_validation->set_rules('oldpass','Old password','trim|required|callback_checkoldpass');
      $this->form_validation->set_rules('newpass','New Password','trim|required|min_length[4]|max_length[12]');
      $this->form_validation->set_rules('conpass','Confirm Password','trim|required|matches[newpass]');

      if($this->form_validation->run()==true){

        $passwordreset = $this->admin->update_password();

        if($passwordreset){
          $this->session->set_userdata('micusername','');
          $this->session->set_userdata('micemail','');
          $this->session->set_userdata('micusertype','');

          $this->session->set_flashdata('success_message', "Password changed successfully. Please login again.");
          redirect('user','refresh');
        }

        else{   
          $this->session->set_flashdata('error_message' , "Faild");
          redirect('user/reset_password','refresh');
        }

      }else{
        $this->session->set_flashdata('old_Form_Error' , "old password is incorrect");
         $data['page_name'] = "reset_pass";
        $this->load->view('user/reset_password');
      }

    } else {  
      $data['page_name'] = "reset_pass";
      $this->load->view('user/reset_password',$data);
    }

  }

  public function checkoldpass()
  {

    $passcheck = $this->db->where('username',$this->session->userdata('micusername'))->where('pwd_hint',$this->input->post('oldpass'))->from('user_role')->count_all_results()+0;

    if ($passcheck == 1)
    {
      return TRUE;    
    }
    else
    {
      $this->form_validation->set_message('checkoldpass','Old Password Incorrect');
      return FALSE;
    }

  }
    
public function reset_tpass()
  {
    if($this->session->userdata('micusertype') !='u')
      redirect('user','refresh');

    if($_POST){

      $this->form_validation->set_rules('oldpass','Old password','trim|required|callback_checkoldtpass');
      $this->form_validation->set_rules('newpass','New Password','trim|required|min_length[4]|max_length[6]');
      $this->form_validation->set_rules('conpass','Confirm Password','trim|required|matches[newpass]');

      if($this->form_validation->run()==true){

        $passwordreset = $this->admin->update_tpassword();

        if($passwordreset){
         
          $this->session->set_flashdata('success_message', "password change successfully");
          redirect('user/reset_tpass','refresh');
        }

        else{   
          log_message('error','ll');
          $this->session->set_flashdata('error_message' , "Failed");
          redirect('user/reset_tpass','refresh');
        }

      }else{
        log_message('error','oo');
        $this->session->set_flashdata('old_Form_Error' , "old password is incorrect");
        $data['page_name'] = "reset_tpass";
        $this->load->view('user/reset_transation_password');
      }

    }
    else{  
      log_message('error','pp');
      $data['page_name'] = "reset_tpass";
      $this->load->view('user/reset_transation_password',$data);
    }

  }

  public function checkoldtpass()
  {

    $passcheck = $this->db->where('username',$this->session->userdata('micusername'))->where('tpwd',$this->input->post('oldpass'))->from('user_role')->count_all_results()+0;

    if ($passcheck == 1)
    {
      return TRUE;    
    }
    else
    {
      $this->form_validation->set_message('checkoldtpass','Old Password Incorrect');
      return FALSE;
    }

  }
  
   public function forgot_mail_check()
    {
         
        
        $check = $this->db->where('username',$this->input->post('username'))->get('user_role')->row_array();

        
        // log_message('error',$check);
        
        if(!empty($check))
        {
            if($this->forgot_otp($check['email']));
        	echo "success";
		} else {
		    
			echo "empty";
		
		}
    }
    
    
   public function forgot_otp($email=""){
       
        $otp = rand(1000, 9999);
        $this->db->where('email', $email);
        $this->db->update('user_role', ['otp' => $otp]);
       
        $this->load->library('email');
        $dataemail['otp'] = $otp;
        
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.hostinger.com';
        $config['smtp_port']=587;
        $config['smtp_timeout']='30';
        $config['smtp_user']='info@mict.uk';
        $config['smtp_pass']='Siraj@123';
        $config['charset']='utf-8';
        $config['newline']="\r\n";
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('info@mict.uk', 'MIC');
        $this->email->reply_to('info@mict.uk', 'MIC');
        $this->email->to($email);
        // log_message('error',$email."yyyyyyyyyyy");
        $this->email->subject('MIC AI forgot password');
        $this->email->message($this->load->view('user/forgot_mail', $dataemail, true));
         //$this->email->message("ytfbg u gh uhuiyjg uj");
        $this->email->send();
        return true;
   } 
    
    
// public function forgot_otpxxxx($email="")
// {

//     $otp = rand(1000, 9999);
//     $this->db->where('email', $email);
//     $this->db->update('user_role', ['otp' => $otp]);
//     // Define email parameters
//     $from_email = 'noreply@backofficee.com';
//     $from_name = 'MICX';
//     $to_email = $email; 
//     $subject_email = 'Mict OTP';

//     $dataemail['otp'] = $otp;
   
    
//     $config = array(
//         'protocol' => 'smtp',
//         'smtp_host' => 'mict.uk', // Use the correct SMTP server address
//         'smtp_port' => 465,
//         'mailtype' => 'html', // Use 'html' for HTML emails
//         'wordwrap' => true,
//         'newline' => "\r\n",
//         'charset' => 'utf-8',
//         'smtp_crypto' => 'ssl', // Use SSL for secure connection
//         'smtp_timeout' => 4, // Timeout in seconds
//     );
    
//     // Load and initialize the email library
//     $this->load->library('email', $config);
    
//     // Set email parameters
//     $this->email->from($from_email, $from_name);
//     $this->email->to($to_email);
//     $this->email->subject($subject_email);
//     $this->email->message( $this->load->view('user/forgot_mail', $dataemail, true));
    
//     // Send the email
//     if ($this->email->send()) {
//         // Email sent successfully
//         echo 'Email sent successfully.';
//     } else {
//         // Email sending failed
//         echo 'Email sending failed.';
//     }
// }



    
    public function level_income()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
        $data['page_name'] = "level_income";
        $this->load->view('user/level_income',$data); 
    }
    
    
//     public function withdraw()
//     {
//         if($this->session->userdata('micusertype')!='u')
//         redirect('user/index','refresh'); 

//         if ($_POST) {
//               $error = array();
//                  $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|greater_than[0]|callback_checkaccount');
//                  $this->form_validation->set_rules('tpass', 'Transaction Password', 'trim|required|callback_checktranpass');
//             try {
//                 if ($this->form_validation->run() == true) {
                    
//             	    $address = $this->db->select('withdraw_wallet')->where('username',$this->session->userdata('micusername'))->get("user_wallet")->row()->withdraw_wallet; 
//                     $admin_wallet = $this->db->order_by('id','desc')->get("admin_wallet")->row_array(); 
                    
//         		    $tron_wallet_from_address = $admin_wallet['withdraw_wallet'];
//                 	$tron_wallet_to_address   = $address;
//                 	$tron_private_key	 = $admin_wallet['private_key'];
//                 	$amt 				 = floatval($this->input->post('amount'));
            
//                     include_once APPPATH . '/third_party/tron/tron-api-master/vendor/autoload.php';
            
//                     $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
//                     $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
//                     $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
            
//                     $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
//                     $contract = $tron->contract('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t');  // Tether USDT https://tronscan.org/#/token20/TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t
//                     $tron->setAddress($tron_wallet_from_address);
//                     $tron->setPrivateKey($tron_private_key);
//                     $contract->setFeeLimit(100);
            
//                     $usdtblance = $contract->balanceOf();
            
//                     if ($usdtblance >= $amt) {
//                         $vds = $contract->transfer($tron_wallet_to_address, $amt, $tron_wallet_from_address);
//                         sleep(3);
//                         $detail = $tron->getTransaction($vds['txid']);
//                         $checktran = $detail['ret'][0]['contractRet'];
                        
//                       if($checktran == 'SUCCESS'){
//                           $withdraw =array(
//                     		    'username' => $this->session->userdata('micusername'),
//                     		    'debit' => $this->input->post('amount'),
//                     		    'entry_date' => date('Y-m-d H:i:s'),
//                     		    'remark' => "Withdraw",
//                     		    'description' => $address
                    		    
//                     		    );
                    		
//                     		$this->db->insert('account',$withdraw);
                    						
//                             if ($withdraw) {
//                                 $this->session->set_flashdata('deposit_message', "Done withdraw successfully.");
//                                 redirect('user/withdraw', 'refresh');
//                             } else {
//                                 throw new Exception("Invalid USDT Transfer Request");
//                             }
//                         } else {
//                             throw new Exception("Please Try Again");
//                         }
//                     } else {
//                         throw new Exception("Insufficient USDT");
//                     }
//                 } else {
//                     $data['page_name'] = "withdraw";
//                     $this->load->view('user/withdraw', $data);
//                 }
//             } catch (Exception $e) {
//                 $this->session->set_flashdata('error_message', $e->getMessage());
//                 $data['page_name'] = "withdraw";
//                 $this->load->view('user/withdraw', $data);
//             }

// 		}else{
// 		    $data['page_name'] = "withdraw";
//             $this->load->view('user/withdraw',$data); 
// 		}
//     }
    
    
    
    
    public function withdraw()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 

        if ($_POST) {
                $response = array();
                $min_amount = $this->db->select('reward')->where('type','min withdraw')->get("master")->row()->reward+0;  
        		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|callback_checkbal|greater_than_equal_to['.$min_amount.']');
                $this->form_validation->set_rules('tpass', 'Transaction Password', 'trim|required|callback_checktranpass');
    
        		if($this->form_validation->run()==true) {
        		    
        		$address = $this->db->select('wallet_address')->where('username',$this->session->userdata('micusername'))->get("user_role")->row()->wallet_address;  
        		
        		if($address != "")
        		{
        		 
        		 $check_req = $this->db->where('username',$this->session->userdata('micusername'))->where('status','Request')->get('withdraw_request')->row_array();
        		 
        		 if(empty($check_req))
                    {
                        $withdraw = $this->user->withdraw();
                        
                        if ($withdraw) {
                              $this->session->set_flashdata('success_message','Requested successfully');
                              redirect('user/withdraw','refresh');
                        } else {
                             $this->session->set_flashdata('error_message','Please try again');
                             redirect('user/withdraw','refresh');
                        }
                    }else{
                        $this->session->set_flashdata('error_message','You already have pending request');
                        redirect('user/withdraw','refresh');
                    }
                    
        		}else{
        		    $this->session->set_flashdata('error_message','Please update your wallet address');
                    redirect('user/withdraw','refresh');
        		}
                           
            } else {
                $data['page_name'] = "withdraw";
                $this->load->view('user/withdraw',$data); 
            }

		}else{
		    $data['page_name'] = "withdraw";
            $this->load->view('user/withdraw',$data); 
		}
    }
    
  public function checkaccount()
  {

        $check = $this->db->select('sum(credit) - sum(debit) as balance')->where('username',$this->session->userdata('micusername'))->get('account')->row()->balance+0;
       
        if ($this->input->post('amount') <= $check)
        {
          return TRUE;    
        }
        else
        {
          $this->form_validation->set_message('checkaccount','Insufficient Balance');
          return FALSE;
        }

  }
    
    
    public function checkeamount()
  {

 $check = $this->db->select('sum(credit) - sum(debit) as balance')->where('user_id',$this->session->userdata('micusername'))->where('entry_date <=',date('Y-m-d H:i:s'))->get('e_wallet')->row()->balance+0;
   
    if ($this->input->post('amount') <= $check)
    {
      return TRUE;    
    }
    else
    {
      $this->form_validation->set_message('checkeamount','Insufficient Balance');
      return FALSE;
    }

  }
    
    //  public function withdraw()
    // {
    //   if($this->session->userdata('micusertype')!='u')
    //     redirect('user/index','refresh'); 
      
    //     $data['page_name'] = "withdraw";
    //     $this->load->view('user/withdraw',$data); 
    // }
    
     public function trading_withdraw()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
        $data['page_name'] = "trading_withdraw";
        $this->load->view('user/trading_withdraw',$data); 
    }
    public function mining_income()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
        $data['page_name'] = "mining_income";
        $this->load->view('user/mining_income',$data);
    }
    public function mining_history($up_id="")
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
          $data['mining'] = $this->db->where('username',$this->session->userdata('micusername'))->where('entry_date <=',date('Y-m-d H:i:s'))->where('remark','ROI Income')->where('description',$up_id)->get('account')->result_array();
          $this->load->view('user/mining_history',$data); 
        }
        
   public function binary_income()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
        $data['page_name'] = "binary_income";
        $this->load->view('user/binary_income',$data); 
    }
    public function binary_history($pair_id='')
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
          $pair_amount=$this->db->where('description',$pair_id)->where('entry_date <=',date('Y-m-d H:i:s'))->get('account')->result_array();
          $data['pair']=$pair_amount;
          $this->load->view('user/binary_history',$data); 
        }   
 public function direct_income()
 {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
      $data['page_name'] = "direct_income";
      $this->load->view('user/direct_income',$data); 
 }  
public function customer_support()
 {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
      $data['page_name'] = "customer_support";
      $this->load->view('user/customer_support'); 
 }  
        
public function send_message()
{
//   if($POST){
    if($this->session->userdata('micusertype')!='u')
    redirect('user','refresh'); 

      $sender_id = $this->input->post('sender');
      $receiver_id = $this->input->post('receiver');
      $message = $this->input->post('message');
      $this->admin->save_message();
//  }else{
     redirect('user/customer_support');
//   }
     
}
        
// public function support_ticket_chat()
//  {
//       if($this->session->userdata('micusertype')!='u')
//         redirect('user/index','refresh'); 
      
//             $this->load->view('user/support_ticket_chat'); 
//         }  
         
 public function forget_password()
    {
    
        
       if($_POST){
           

      $this->form_validation->set_rules('name','Username','trim|required');
      $this->form_validation->set_rules('otpp','Otp','trim|required|callback_forgot_otp_check');
   
     if($this->form_validation->run()==true){
         
         $data['username']=$this->input->post('name');
         $this->load->view('user/forgot_password',$data); 

        }else{
             $data['page_name'] = "forget_password";
             $this->load->view('user/forget_password',$data);
        }

       }else{    
            $data['page_name'] = "forget_password";
            $this->load->view('user/forget_password',$data);
       }
    }
    
 public function forgot_otp_check()
	{
	    $count = $this->db->where('username',$this->input->post('name'))->where('otp',$this->input->post('otpp'))->get('user_role')->row_array();
    // 	$date = $count['otp_time'];
    //     $newtimestamp = strtotime($date. ' + 5 minute');
    //     $newdate = date('Y-m-d H:i:s', $newtimestamp);
    //     $now_date = date('Y-m-d H:i:s');
          
	   
	   if(!empty($count))
	   {
	       return TRUE;
	   }
	   else
	   {
	       $this->form_validation->set_message('forgot_otp_check', 'OTP not valid');
	       return FALSE;
	   }
	}
	
    public function verify_password()
    {
        if($_POST)
	    {
	       if($this->input->post('username') != "")
	       {
    	      $this->form_validation->set_rules('password', 'Password', 'trim|required');
              $this->form_validation->set_rules('confirm_password', 'Confirm password','required|matches[password]');
               
              if($this->form_validation->run()==true) 
              {
                  $this->db->set('pwd',sha1($this->input->post('password')));
                  $this->db->set('pwd_hint',$this->input->post('password'));
                  $this->db->where('username',$this->input->post('username'));
                  $pass = $this->db->update('user_role');
                  
                  if($pass)
                  {
                      $this->session->set_flashdata('success_message','Password changed successfully');
                      redirect('user','refresh');
                  }
                  else
                  {
                      $this->session->set_flashdata('error_message','Something went wrong, Password not changed');
                      redirect('user/forget_password','refresh');
                  }
                  
              } else {
                 $this->load->view('user/forgot_password');
              }
	       }else{
	           redirect('user/forget_password','refresh');
	       }
           
	    }
	    else
	    {
            redirect('user/forget_password','refresh');
	    }
    }   
    //   public function withdrawal()
    // {
      
    //         $this->load->view('user/withdrawal'); 
    //     }
           public function withdrawal_history()
    {
        
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
            $this->load->view('user/withdrawal_history'); 
        }
        
           public function walletpage()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
            $this->load->view('user/walletpage'); 
        }
        
        
            public function stack_transfer_history()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
            $this->load->view('user/stack_transfer_history'); 
        }
             
            public function ailevel()
    {
       
      
            $this->load->view('user/ailevel'); 
        }
        
               public function gamelevel()
    {
       
      
            $this->load->view('user/gamelevel'); 
        }
        
            
    public function portfolio()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
    $this->load->view('user/portfolio');
}


 public function stack()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
    $this->load->view('user/stack');
}

 public function viewhistory()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
    $this->load->view('user/viewhistory');
}

 public function game()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
    $this->load->view('user/game');
}


        
public function peer_to_peer()
{
    if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
      if($_POST){ 
            
            $this->form_validation->set_rules('user_id', 'User id', 'trim|required|callback_checkuser|callback_uppercase_check');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|callback_checkeamount');
            $this->form_validation->set_rules('tpass', 'Transaction password', 'trim|required|callback_checktpass');
            
                if($this->form_validation->run()==true){
                        $upp = $this->admin->peertopeer();
                        
                        if($upp){
                            $this->session->set_flashdata('success_message','Amount Transfered Successfully');
                            redirect('user/peer_to_peer','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('user/peer_to_peer','refresh');    
                        }
                        
                    
                
                }else{
                $this->session->set_flashdata('error_message','Please Check Your Details');
                 $data['page_name'] = "peer_to_peer";
                $this->load->view('user/peer_to_peer',$data);
            }
            
            
            }else{
                $data['page_name'] = "peer_to_peer";
                $this->load->view('user/peer_to_peer',$data); 
            }
      
}

public function uppercase_check($str) {
    if (strtolower($str) == $str) {
        $this->form_validation->set_message('uppercase_check', 'The %s must be in uppercase.');
        return FALSE;
    } else {
        return TRUE;
    }
}


 public function checkuser()
  {

 $check = $this->db->where('username',$this->input->post('user_id'))->count_all_results('user_role')+0;
   
    if ($check == 1)
    {
      return TRUE;    
    }
    else
    {
      $this->form_validation->set_message('checkuser','User not found');
      return FALSE;
    }

  }
  
   public function user_wallet()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        if($_POST)
        {
             $this->form_validation->set_rules('otp', 'OTP', 'trim|required|callback_otpcheck');
            if($this->form_validation->run()==true){ 
                
            $wallet = $this->admin->update_wallet($this->session->userdata('micusername'));
            
            if($wallet)
            {
              $this->session->set_flashdata('success_message','Wallet successfully updated');
    	      redirect('user/user_wallet','refresh');  
            }else{
              $this->session->set_flashdata('error_message','Please try again');
    	      redirect('user/user_wallet','refresh');   
            }
            
            }else{
                     redirect('user/user_wallet','refresh');    
                    }
            
        }else{
            
        $this->load->view('user/withdrawal');
        }   
    }
    
    
         public function otpcheck()
            {
                $otp=$this->db->select('otp')->where('username',$this->session->userdata('micusername'))->get('user_role')->row()->otp;
                
                if($otp == $this->input->post('otp')){
                    
                    return true;
                }else{
                    $this->session->set_flashdata('error_message','Invalid OTP');
                    return false;
                    
                }
            }
        
public function earning_to_ewallet()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        if($_POST){ 
        
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|callback_checkamount');
            $this->form_validation->set_rules('tpass', 'Transaction password', 'trim|required|callback_checktpass');
            
                if($this->form_validation->run()==true){
                        $upp = $this->admin->earningtoewallet();
                        if($upp){
                            $this->session->set_flashdata('success_message','Amount Transfered Successfully');
                            redirect('user/earning_to_ewallet','refresh');
                        }else{
                         $this->session->set_flashdata('error_message','Please Try Again');
                         redirect('user/earning_to_ewallet','refresh');    
                        }
                        
                    
                
                }else{
                $this->session->set_flashdata('error_message','Please Check Your Details');
                 $data['page_name'] = "earning_to_ewallet";
                $this->load->view('user/earning_to_ewallet',$data);
            }
            
            
            }else{
                $data['page_name'] = "earning_to_ewallet";
                $this->load->view('user/earning_to_ewallet',$data); 
            }
            
        }
        
public function checkamount()
  {

 $check = $this->db->select('sum(credit) - sum(debit) as balance')->where('username',$this->session->userdata('micusername'))->where('entry_date <=',date('Y-m-d H:i:s'))->get('account')->row()->balance+0;
   
    if ($this->input->post('amount') <= $check)
    {
      return TRUE;    
    }
    else
    {
      $this->form_validation->set_message('checkamount','Insufficient Balance');
      return FALSE;
    }

  }
  
 public function checktpass()
  {
    $passcheck = $this->db->where('username',$this->session->userdata('micusername'))->where('tpwd',$this->input->post('tpass'))->from('user_role')->count_all_results()+0;

    if ($passcheck == 1)
    {
      return TRUE;    
    }
    else
    {
      $this->form_validation->set_message('checktpass','Password Incorrect');
      return FALSE;
    }

  }
  
  
    public function level_team()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
       $data['page_name'] = "right_team";
        $this->load->view('user/level_team',$data); 
    }
    
    public function right_team()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
       $data['page_name'] = "right_team";
        $this->load->view('user/right_team',$data); 
    }
    
    public function left_team()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
         $data['page_name'] = "left_team";
        $this->load->view('user/left_team',$data); 
    }
    
     public function roi()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
         $data['page_name'] = "roi";
        $this->load->view('user/roi',$data); 
    }
    
     public function rank_bonus()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
         $data['page_name'] = "rank_bonus";
        $this->load->view('user/rank_bonus',$data); 
    }
    
     public function rank_roi()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
         $data['page_name'] = "rank_roi";
        $this->load->view('user/rank_roi',$data); 
    }
    
     public function view_rankroi($rank="")
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
      
         $data['page_name'] = "view_rankroi";
         $data['rank'] = $rank;
        $this->load->view('user/view_rankroi',$data); 
    }
    
    public function direct_referral()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
         $data['page_name'] = "direct_referral";
        $this->load->view('user/direct_referral',$data); 
    }
    
     public function forex_invest()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
         $data['page_name'] = "forex_invest";
        $this->load->view('user/forex_invest',$data); 
    }
    
     public function forex_profit_history()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
         $data['page_name'] = "forex_profit_history";
        $this->load->view('user/forex_profit_history',$data); 
    }
    
   
      public function crypto_invest()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
         $data['page_name'] = "crypto_invest";
        $this->load->view('user/crypto_invest',$data); 
    }
    
     public function crypto_profit_history()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
         $data['page_name'] = "crypto_profit_history";
        $this->load->view('user/crypto_profit_history',$data); 
    }
    
     public function dashboardupdate()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $this->load->view('user/dashboardupdate'); 
    }
      public function trade()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $this->load->view('user/trade'); 
    }
    
      public function forex_trading_history()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $this->load->view('user/forex_trading_history'); 
    }
    
      public function stack_income_history()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $this->load->view('user/stack_income_history'); 
    }
      
      public function ticket()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $this->load->view('user/ticket'); 
    }
    
      public function referral()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $this->load->view('user/referral'); 
    }
    
      public function crypto_trading_history()
    {
      if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
        $this->load->view('user/crypto_trading_history'); 
    }
       public function peertopeer()
    {
    $this->load->view('user/peertopeer');
}
       public function binance()
    {
    $this->load->view('user/binance');
}
       public function overview()
    {
    $this->load->view('user/overview');
}


//       public function reset_password()
//     {
//     $this->load->view('user/reset_password');
// }


       public function myteam()
    {
    $this->load->view('user/myteam');
}
    
    public function fd_activate()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
        
       if($_POST){ 
        
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|callback_user_check');
        $this->form_validation->set_rules('package', 'Package', 'trim|required|callback_pbalance_check');
        
            if($this->form_validation->run()==true){
                $upp = $this->admin->buy_fd_package($this->session->userdata('micusername'));
                if($upp){
                    $this->session->set_flashdata('success_message','Activated Successfully');
                    redirect('user/fd_activate','refresh');
                }else{
                 $this->session->set_flashdata('error_message','Please Try Again');
                 redirect('user/fd_activate','refresh');    
                }
            }else{
            $this->session->set_flashdata('error_message','Please Check Your Details');
            $data['page_name'] = "fd_activate";
            $this->load->view('user/fd_activate',$data);
           }
        }else{
        
        $data['page_name'] = "fd_activate";
        $this->load->view('user/fd_activate',$data); 
        }
    }
    
    
    public function user_check()
      {
       
        
        $user = $this->db->where('username',$this->input->post('user_id'))->get('user_role')->row_array();
    
        if (!empty($user))
        {
            return TRUE;
        }
        else
        {
           $this->form_validation->set_message('user_check','Username not valid');
           return FALSE;
        }
    
      }
    
    
    
     public function pbalance_check()
      {
        $package_value = $this->db->select('value')->where('id',$this->input->post('package'))->get('fd_package')->row()->value+0;
        
        $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('user_id',$this->session->userdata('micusername'))->get('e_wallet')->row()->balance+0;
    
        if ($package_value <= $balance)
        {
            return TRUE;
        }
        else
        {
           $this->form_validation->set_message('pbalance_check','Insufficient Balance');
           return FALSE;
        }
    
      }
      
 public function user_activate()
        {
    if ($this->session->userdata('micusertype') !== 'u') {
        redirect('user', 'refresh');
        return; // Add a return statement here to prevent further execution
    }

    $user_id = $this->input->post('user_id');
    
    $balance = $this->db->select('SUM(credit) - SUM(debit) AS balance')
                       ->where('user_id', $user_id)
                       ->get('e_wallet')
                       ->row()
                       ->balance + 0;

    if ($balance >= 20) {
        $this->form_validation->set_rules('user_id', 'User Id', 'trim|required|callback_amount_check|callback_active_check');
        
        if ($this->form_validation->run() == false) {
            $response['status'] = 'error';
            $response['message'] = validation_errors();
        } else {
            $roi = $this->user->active_manage($user_id);

            if ($roi) {
                $response['status'] = 'success';
                $response['message'] = 'Panel Activated Successfully';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error found';
            }
        }
    } else {
         $response['status'] = 'return';
    }

    echo json_encode($response);
}


 public function active_check($user_id)
      {
       
        
        $user = $this->db->where('user_id',$user_id)->get('user_activation')->row_array();
    
        if (empty($user))
        {
            return TRUE;
        }
        else
        {
           $this->form_validation->set_message('active_check','Already Activated');
           return FALSE;
        }
    
      }
      
     public function amount_check($user_id)
      {

        $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('user_id',$user_id)->get('e_wallet')->row()->balance+0;
    
        if ($balance >= 20)
        {
            return TRUE;
        }
        else
        {
           $this->form_validation->set_message('amount_check','Insufficient Balance');
           return FALSE;
        }
    
      }
    
}
