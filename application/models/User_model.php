<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model {
    
    
        public function withdraw(){
            
            $this->db->trans_begin();
            
            $address = $this->db->select('wallet_address')->where('username',$this->session->userdata('micusername'))->get("user_role")->row()->wallet_address; 
            $withdraw_charge = $this->db->select('reward')->where('type','admin charge')->get('master')->row()->reward+0;

            $service_charge = ($this->input->post('amount') * $withdraw_charge)/100;
            $withdraw_bal = $this->input->post('amount') - $service_charge;
            
            
             $data = array(
                        'username' => $this->session->userdata('micusername'),
                        'usdt' => $this->input->post('amount'),
                        'service_charge' => $service_charge,
                        'percentage' => $withdraw_charge,
                        'balance_usdt' => $withdraw_bal,
                        'wallet_address' => $address,
                        'entry_date' => date('Y-m-d H:i:s'),
                        'status' => 'Request'
                        );
                    
            $withdraw =  $this->db->insert('withdraw_request',$data);
                
            $data2 = array(
                    'username' => $this->session->userdata('micusername'),
                    'debit' => $this->input->post('amount'),
                    'remark' => 'Withdraw',
                    'entry_date' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('account',$data2);
                    
            if($this->db->trans_status() == FALSE){
                    $this->db->trans_rollback();
                  return false;
            } else {
                    $this->db->trans_commit();
                    return true;
            }         
                    
        }
    
    
    
        public function update_profile() 
        {
            $this->db->trans_begin();
    
            $profile = array(
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'mobile_no' => $this->input->post('mobile_no'),
                'country' => $this->input->post('country'),
                'wallet_address' => $this->input->post('wallet_address'),
                'tpwd' => $this->input->post('tpwd')
                );
            $this->db->where('username',$this->session->userdata('micusername'));
            $this->db->update('user_role',$profile);
            
            if($this->db->trans_status() == FALSE){
                    $this->db->trans_rollback();
                  return false;
            } else {
                    $this->db->trans_commit();
                    return true;
            } 
        }
    
    
    
         public function support() 
        {
            $this->db->trans_begin();
           $ticket = 'TIC'.rand(000,111);
            $support = array(
                'ticket_id' => $ticket,
                'user_id' => $this->session->userdata('micusername'),
                'support_type' => $this->input->post('support_type'),
                'description' => $this->input->post('description'),
                'entry_date' => date('Y-m-d H:i:s'),
                'status' => 'new'
                );
            $this->db->insert('support',$support);
            
            if($this->db->trans_status() == FALSE){
                    $this->db->trans_rollback();
                  return false;
            } else {
                    $this->db->trans_commit();
                    return true;
            } 
        }
    
        public function user_deposit()
        {
            $this->db->trans_begin();
               
            $data['user_id'] = $this->session->userdata('micusername');
            $data['wallet_value'] = $this->input->post('amount');
            $data['utr'] = $this->input->post('utr');
            $data['status'] = "Request";
            $data['entry_date'] = date('Y-m-d H:i:s');
        
            $this->db->insert('admin_request',$data);
            
            if ($this->db->trans_status() == FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
    
    
    
        public function get_game(){
        
            $total_sec = 86400;
            $hours = date("H");
            $minutes = date("i");
            $seconds = date("s");
            $current = $hours * 3600 + $minutes * 60 + $seconds;
            $data['c_time'] = $current;
            $data['game_id'] = floor($current/600)+1;
            return $data;
        }


        public function stacking_insert()
        {
            $this->db->trans_begin();
            $stack_id = 'STACKID'.rand(0000,9999);
               
             $trade_fee=$this->db->where('wallet','stacking')->get('e_wallet_fee')->row_array();
            $deducted=($this->input->post('amount')*$trade_fee['fees_percentage'])/100;
            $creditbal=$this->input->post('amount')-$deducted;
            log_message('error','Stack Tranfer Amount'.$this->input->post('amount'));
            log_message('error','Stack Deducted Amount'.$deducted);
            log_message('error','credit balance Amount'.$creditbal);
            
            
            $stack_id = 'STACKID'.rand(0000,9999);
               
            $data['user_id'] = $this->session->userdata('micusername');
            $data['remark'] = 'Transfer To Stacking Wallet';
            $data['description'] = 'Transfer';
            $data['credit'] = $creditbal;
            $data['transfer_amount'] = $this->input->post('amount');
            $data['stacking_fee'] = $deducted;
            $data['stacking_id'] =$stack_id;
            $data['entry_date'] = date('Y-m-d H:i:s');
        
            $this->db->insert('stacking_wallet',$data);
            
            $data2['user_id'] = $this->session->userdata('micusername');
            $data2['debit'] = $this->input->post('amount');
            $data2['remark'] = 'Transfer To Stacking Wallet';
            $data2['description'] = 'Transfer';
            $data2['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('e_wallet',$data2);
            
            // $this->rank($this->input->post('username'));
        
            if ($this->db->trans_status() == FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
        
        
                
         public function game_level_income($teams,$user,$amount)
    {
        log_message('error','GAME TEAMS'.json_encode($teams));
        log_message('error','GAME USER'.json_encode($user));
        log_message('error','GAME PROFIT Amount'.json_encode($amount));
        
            
            if (!empty($teams) && !empty($amount)) {
                $team_ids = explode("~", $teams);
                log_message('error','GAME EXPLODE TEAMS'.json_encode($team_ids));
                
                $lvl_count = $this->db->where('status', 'Active')->count_all_results('game_level_master')+0;
                $ss=min($lvl_count, count($team_ids));
                
                log_message('error','LEVELCOUNT'.$lvl_count);
                log_message('error','TEAMSCOUNT'.count($team_ids));
                
                for ($i = 0; $i < $ss; $i++) {
                    log_message('error','EXPLODE TEAMS'.json_encode($team_ids[$i]));
                    $add = $i + 1;
                    $level_reward = $this->db->where('status', 'Active')->where('level', 'Level ' . $add)->get('game_level_master')->row_array();

                    // log_message('error','LEVELREWARD'.json_encode($level_reward));
                    if (!empty($level_reward) && is_numeric($level_reward['percentage'])) {
                        $percentage = $level_reward['percentage'];
                        $rew = ($amount * $percentage) / 100;
                        $reward = array(
                        'username' => $team_ids[$i],
                        'credit' => $rew,
                        'entry_date' => date('Y-m-d H:i:s'),
                        'level' => $add,
                        'description' =>$user,
                        'remark' => 'Game Level Income',
                        'type' => 'level',
                        );
                        
                        $inn= $this->db->insert('account', $reward);
                       
                }
            }
           
      }
}
        
         public function transfer_wallet()
        {
            $this->db->trans_begin();
           
           if($this->input->post('from_wallet')=='e_wallet'){
               
            $trade_fee=$this->db->where('wallet','gaming')->get('e_wallet_fee')->row_array();
            $deducted=($this->input->post('amount')*$trade_fee['fees_percentage'])/100;
            $creditbal=$this->input->post('amount')-$deducted;
            log_message('error','game Tranfer Amount'.$this->input->post('amount'));
            log_message('error','game Deducted Amount'.$deducted);
            log_message('error','credit balance Amount'.$creditbal);
              
            if($this->input->post('to_wallet')=='gaming_wallet'){
                $rem = 'Transfer To gaming Wallet';
            } else if ($this->input->post('to_wallet')=='trading_wallet'){
                $rem = 'Transfer To trading Wallet';
            }else if($this->input->post('to_wallet')=='stacking_wallet'){
                $rem = 'Transfer To staking Wallet';
            }else if($this->input->post('to_wallet')=='withdraw_wallet'){
                $rem = 'Transfer To withdraw Wallet';
            }
               
            $data2['user_id'] = $this->session->userdata('micusername');
            $data2['debit'] = $this->input->post('amount');
            $data2['remark'] = $rem;
            $data2['description'] = 'Transfer';
            $data2['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('e_wallet',$data2);
             
             if($this->input->post('to_wallet')=='gaming_wallet'){
                 
            $data['username'] = $this->session->userdata('micusername');
            $data['credit'] = $creditbal;
            $data['transfer_amount'] = $this->input->post('amount');
            $data['gaming_fee'] = $deducted;
            $data['remark'] = 'Credited From e_wallet';
            $data['description'] = 'Wallet Transfer';
            $data['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('game_wallet',$data);
             }
             
             if($this->input->post('to_wallet')=='withdraw_wallet'){
                 $bal=$this->input->post('amount')-1;
                 
            $datas['username'] = $this->session->userdata('micusername');
            $datas['credit'] = $bal;
            $datas['amount'] = $this->input->post('amount');
            $datas['trans_deduct_amount'] = 1;
            $datas['remark'] = 'Credited From e_wallet';
            $datas['description'] = 'Wallet Transfer';
            $datas['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('account',$datas);
             }
             
             if($this->input->post('to_wallet')=='trading_wallet'){
                 
            $tr['user_id'] = $this->session->userdata('micusername');
            $tr['credit'] = $creditbal;
            $tr['trading_fee'] = $deducted;
            $tr['transfer_amount'] = $this->input->post('amount');
            $tr['remark'] = 'Credited From e_wallet';
            $tr['description'] = 'Wallet Transfer';
            $tr['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('trading_wallet',$tr);
             }
             
             if($this->input->post('to_wallet')=='stacking_wallet'){
                 
            $tra['user_id'] = $this->session->userdata('micusername');
            $tra['credit'] = $creditbal;
            $tra['stacking_fee'] = $deducted;
            $tra['transfer_amount'] = $this->input->post('amount');
            $tra['remark'] = 'Credited From e_wallet';
            $tra['description'] = 'Wallet Transfer';
            $tra['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('stacking_wallet',$tra);
             }

           }elseif($this->input->post('from_wallet')=='withdraw_wallet'){
               
                  if($this->input->post('to_wallet')=='gaming_wallet'){
                $remark = 'Transfer To gaming Wallet';
            } else if ($this->input->post('to_wallet')=='trading_wallet'){
                $remark = 'Transfer To trading Wallet';
            }else if($this->input->post('to_wallet')=='stacking_wallet'){
                $remark = 'Transfer To staking Wallet';
            }else if($this->input->post('to_wallet')=='e_wallet'){
                $remark = 'Transfer To e_wallet';
            }
               
            $ac['username'] = $this->session->userdata('micusername');
            $ac['debit'] = $this->input->post('amount');
            $ac['remark'] = $remark;
            $ac['description'] = 'Transfer';
            $ac['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('account',$ac);
             
            if($this->input->post('to_wallet')=='e_wallet'){
                
                
                 
                $ew['user_id'] = $this->session->userdata('micusername');
                $ew['credit'] = $this->input->post('amount');
                $ew['remark'] = 'Credited From withdraw_wallet';
                $ew['description'] = 'Wallet Transfer';
                $ew['entry_date'] = date('Y-m-d H:i:s');
                 
                 $this->db->insert('e_wallet',$ew);
             }
             
             if($this->input->post('to_wallet')=='gaming_wallet'){
                 return false;
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
        
        
    public function register_mail($userdata){

         $this->load->library('email');
         $datasuccess['user_id'] =  $userdata['user'];
         $datasuccess['password'] = $userdata['pass'];
         log_message('error',$userdata['user']."yyyyyyyyyyy");
           log_message('error',$userdata['pass']."yyyyyyyyyyy");
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
         $this->email->to($userdata['email']);
         log_message('error',$userdata['email']."yyyyyyyyyyy");
         $this->email->subject('MIC AI Usercredentials');
         $this->email->message($this->load->view('user/registration_mail',$datasuccess, true));
         //$this->email->message("ytfbg u gh uhuiyjg uj");
         $this->email->send();
         return true;
}
        
        public function game_manage($username="")
    {
        $this->db->trans_begin();
        $rsss = $this->get_game();
        $game_id = date('Y-m-d')."_".$rsss['game_id'];
        //$last_active_game=$this->db->where('status','Active')->order_by('id','desc')->get('game_active')->row_array();
        
        $data['amount'] = $this->input->post('amount');
        $data['game_id'] = $game_id;
        $data['remark'] = $this->input->post('remark');
        $data['username'] = $username;
        $data['entry_date'] = date('Y-m-d H:i:s');
        $data['status'] = "Active";
        //$data['description'] = $last_active_game['game_id'];
     
         $this->db->insert('game',$data);
         
         $data1['game_id'] = $game_id;
        $data1['debit'] = $this->input->post('amount');
        $data1['remark'] =  "game";
        $data1['username'] = $username;
        $data1['entry_date'] = date('Y-m-d H:i:s');
        $data1['description'] =$this->input->post('remark'); ;
     
         $this->db->insert('game_wallet',$data1);
    
        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
      
  
  
//   public function creategame_id(){
       
//       $this->db->trans_begin();
       
//         $result =  $this->db->select('game_id')->order_by('id','desc')->get('game_active')->row_array();
//         log_message('error','RESULT'.$result);
        
       
//           if ($result) {
//                 $currentGameId = (int)str_replace('game', '', $result['game_id']); // Extract the numeric part
//                 $nextGameId = 'game' . ($currentGameId + 1);
                
//                 // Update the status of the previous game to "Inactive"
//                 $data1['status'] = "Inactive";
//                 $this->db->where('game_id', $result['game_id']);
//                 $this->db->update('game_active', $data1);
//             } else {
//                 $nextGameId = 'game1'; // Set to 'game1' if no previous games exist
//             }
            
//             $data['game_id'] = $nextGameId;
//             $data['entry_date'] = date('Y-m-d H:i:s');
//             $data['status'] = "Active";
//             // $data['remark'] = $this->input->post('remark');
            
//             $this->db->insert('game_active', $data);
                     
//             if ($this->db->trans_status() == FALSE) {
//             $this->db->trans_rollback();
//             return false;
//         } else {
//             $this->db->trans_commit();
//             return $nextGameId; ;
//         }
       
//   }
  
  
  
     
        
        public function tradewallet_transfer()
        {
            $this->db->trans_begin();
                 
            
            
             $trade_fee=$this->db->where('wallet','ai_trading')->get('e_wallet_fee')->row_array();
             
            $amount = $this->input->post('package');
            
            $invest = $this->db->select_sum('transfer_amount')->where('user_id',$this->session->userdata('micusername'))->get('trading_wallet')->row()->transfer_amount+0;
    
            $transfer_amount = $amount - $invest; 
            
            $deducted=($transfer_amount*$trade_fee['fees_percentage'])/100;
            $creditbal=$transfer_amount-$deducted;
            log_message('error','trade Tranfer Amount'.$this->input->post('package'));
            log_message('error','trade Deducted Amount'.$deducted);
            log_message('error','trade balance Amount'.$creditbal);
            
            $data['user_id'] = $this->session->userdata('micusername');
            $data['credit'] = $creditbal;
            $data['transfer_amount'] = $transfer_amount;
            $data['trading_fee'] = $deducted;
            $data['slab'] = $this->input->post('slab');
            $data['package_id'] = $this->input->post('package_id');
            $data['remark'] = 'Transfer To Trading Wallet';
            $data['description'] = 'Transfer';
            $data['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('trading_wallet',$data);
             
             
            $data2['user_id'] = $this->session->userdata('micusername');
            $data2['debit'] = $transfer_amount;
            $data2['remark'] = 'Transfer To Trading Wallet';
            $data2['description'] ='Transfer';
            $data2['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('e_wallet',$data2);
            
        
            if ($this->db->trans_status() == FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
        
        
        
        public function aitrading_ins()
        {
            $this->db->trans_begin();
            $data['user_id'] = $this->session->userdata('micusername');
            $data['debit'] = $this->input->post('amount');
            $data['remark'] = 'AI Withdraw';
            $data['description'] = 'Withdraw';
            $data['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('trading_wallet',$data);
             
             
            $data2['username'] = $this->session->userdata('micusername');
            $data2['credit'] = $this->input->post('amount');
            $data2['remark'] = 'AI Withdraw';
            $data2['type'] = 'Withdraw';
            $data2['description'] ='Withdraw from Trading Wallet';
            $data2['entry_date'] = date('Y-m-d H:i:s');
             
             $this->db->insert('account',$data2);
            
        
            if ($this->db->trans_status() == FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
   

    public function forgot_otp_return($id="")
    {
        $data['pwd_hint']= $this->input->post('password');
        $this->db->where('email',$id);
        $this->db->update('user_role',$pwd_hint);
    }
    
     public function join_pur($userfile="")
    {
        $this->db->trans_begin();
        $package_id = $this->input->post('pro_id');
        $username = $this->input->post('username');
        if($this->input->post('cc_number') !="" &&  $this->input->post('amount') !=""){
            
        $data= array(
            'entry_date' => date("Y-m-d h:i:s"),
            'name' => $this->session->userdata('yoloname'),
            'username' => $username,
            'email' => $this->input->post('email'),
            'address1' => $this->input->post('address'),
            'address2' => $this->input->post('address2'),
            'country' => $this->input->post('country'),
            'ph_num' => $this->input->post('phone_num'),
            'state' => $this->input->post('state'),
            'pincode' => $this->input->post('zip'),
            'product_name' => $this->input->post('product_name'),
            'product_image' => $this->input->post('product_img'),
            'package' => $this->input->post('package'),
            'pro_id' => $package_id,
            'recipt_image' => $userfile,
            'reference_num' => $this->input->post('cc_number'),
            'amount' => $this->input->post('amount'),
        );
        $this->db->insert('purchase_table',$data);
        
        }else{
        $amountdata= array(
            'entry_date' => date("Y-m-d h:i:s"),
            'name' => $this->session->userdata('yoloname'),
            'username' => $username,
            'email' => $this->input->post('email'),
            'address1' => $this->input->post('address'),
            'address2' => $this->input->post('address2'),
            'country' => $this->input->post('country'),
            'ph_num' => $this->input->post('phone_num'),
            'state' => $this->input->post('state'),
            'pincode' => $this->input->post('zip'),
            'product_name' => $this->input->post('product_name'),
            'product_image' => $this->input->post('product_img'),
            'package' => $this->input->post('package'),
            'pro_id' => $package_id,
            'e_pin' => $this->input->post('redeem_code'),
           
        );
        $this->db->insert('purchase_table',$amountdata);
        $this->db->set('status',"Used")->set('used_date',date("Y-m-d h:i:s"));
        $this->db->where('pin',$this->input->post('redeem_code'));
        $this->db->update('generate_pin');
        }

        $userteam = $this->db->where('username',$username)->get('user_role')->row_array();
         
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }   
    }


    public function payment_update($userfile="")
    {
        $this->db->trans_begin();
        $package_id = $this->input->post('pro_id');
        $username = $this->input->post('username');
        $invoice="PRO".time();
        $amount = $this->db->select('dpprice')->where('pro_id',$package_id)->get('add_product')->row()->dpprice+0;
       
        $amountdata= array(
            'entry_date' => date("Y-m-d h:i:s"),
            'name' => $this->session->userdata('yoloname'),
            'username' => $username,
            'email' => $this->input->post('email'),
            'address1' => $this->input->post('address'),
            'address2' => $this->input->post('address2'),
            'country' => $this->input->post('country'),
            'ph_num' => $this->input->post('phone_num'),
            'state' => $this->input->post('state'),
            'amount' => $amount,
            'pincode' => $this->input->post('pincode'),
            'product_name' => $this->input->post('product_name'),
            'product_image' => $this->input->post('product_img'),
            'pro_id' => $package_id,
            'e_pin' => $this->input->post('redeem_code'),
            'package' => 'Repurchase',
            'invoice'=>$invoice
           
        );
        $this->db->insert('purchase_table',$amountdata);
        
        $this->db->set('status',"Used")->set('used_date',date("Y-m-d h:i:s"));
        $this->db->where('pin',$this->input->post('redeem_code'));
        $this->db->update('generate_pin');
        
        
        $userteam = $this->db->where('username',$username)->get('user_role')->row_array();
         
        $this->re_level_income($userteam['team'],$username,$this->input->post('redeem_code'));

        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }   
    }
    
public function re_level_income($userteam ="",$username="",$redeem_id="")
{
    if(!empty($userteam)){
        $parents = explode("~",$userteam);
        $level_reward = $this->db->where('pin',$redeem_id)->get('generate_pin')->row_array();
        for ($ii=0; $ii < min(7,count($parents)); $ii++){
            $add = $ii+1;
           
            // $levels= array('levelone','leveltwo','levelthree','levelfour','levelfive','levelsix','levelseven','leveleight');

                $reward_amount = $level_reward['income'.$add];
                if( $reward_amount>0)
                {
                    $reward = array(
                    'username' => $parents[$ii],
                    'credit' => $reward_amount,
                    'entry_date' => date('Y-m-d H:i:s'),
                    'description'=> $username,
                    'remark' => 'Repurchase Level Income',
                    'level' => 'level '.$add
                    );

                    $this->db->insert('account',$reward);
                   
                }
            }
        // log_message('error','hai');
             $divident = array(
                'username' => $username,
                'credit' => $level_reward['divident'],
                'entry_date' => date('Y-m-d H:i:s'),
                'remark' => 'Repurchase Income',
            );

            $this->db->insert('account',$divident);
    }
}

 public function level_income($user_team ="",$user_id="",$pin="")
{
     log_message('error',$user_team);
    if(!empty($user_team)){
        $parents = explode("~",$user_team);
        for ($ii=0; $ii < min(7,count($parents)); $ii++) {
            $add = $ii+1;
            $level_reward = $this->db->where('pin',$pin)->where('pin_type','JON')->get('generate_pin')->row_array();
               //$levels= array('income1','income2','income3','income4','income5','income6','income7');

               $joinuser = $this->db->select('entry_date')->where('username',$parents[$ii])->get('user_role')->row()->entry_date;
               $enddate = date('Y-m-d', strtotime($joinuser. ' + 60 days'));
               $today = date('Y-m-d');
               
               if($today <= $enddate)
               {
                $amount = $level_reward["income".$add];
               }else{
                $totelref = $this->db->where('ref_id',$parents[$ii])->count_all_results('user_role')+0;
                
                  if($totelref >= 5)
                   {
                      $amount = $level_reward['income'.$add];
                   }else{
                       $amount = 0;
                   }
               }
               $reward = array(
                    'username' => $parents[$ii],
                    'credit' => $amount,
                    'entry_date' => date('Y-m-d H:i:s'),
                    'level' => 'level '.$add,
                    'description' => $user_id,
                    'remark' => 'Level Income',
                    'pin'=>$pin
                    );
                $this->db->insert('account',$reward);    
      
        }
    }
}

    public function forgot_otp($id="")
    {
        $otp = rand(1000,9999);
        $this->db->set('otp',$otp);
        $this->db->set('otp_time',date('Y-m-d H:i:s'));
        $this->db->where('email',$id);
        $this->db->update('user_role');

        $mail = $id;

        $from_email='noreply@backofficee.com';
        $from_name='MT4X';
        $to_email = $mail;
        $subject_email = 'MT4X OTP';
        $dataemail['otp']=$otp;
        $mesg = $this->load->view('user/mail_otp',$dataemail,true);
        $config = Array(
                        'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
                        'smtp_host' => 'backofficee.com', 
                        'smtp_port' => 465,
                        'mailtype' => 'html',// it can be text or html
                        'wordwrap' => TRUE,
                        'newline' => "\r\n",
                        'charset' => 'utf-8',
                        'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
                        'smtp_timeout' => '4', //in seconds
                        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from($from_email, $from_name); 
        $this->email->to($to_email);
        $this->email->subject($subject_email); 
        $this->email->message("$mesg");   
// $this->email->set_newline("\r\n");
        $this->email->send();
// if(!$this->email->send()){
//     $this->session->set_flashdata('success_message' , "OTP sent to your Mail ID");
//     redirect('user/edit_profile1','refresh'); 
// } else {
//   $this->session->set_flashdata('error_message' , "Mail not sent. Please try after sometime");
//     redirect('user/edit_profile1','refresh'); 
// }
    }


    public function randuser()
    {
        $lastid = $this->db->select('user_role_id')->order_by('user_role_id','DESC')->limit(1)->get('user_role')->row()->user_role_id+1;
        $rmcode = "YL".time().$lastid;
        $query = $this->db->get_where('user_role', array('username' => $rmcode))->row_array();
        if (!empty($query)) {
            $this->randuser();
        }else{
            return $rmcode; 
        }

    }


//     public function insert_gererate_pin()
//     {  
// //$pass = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
//         $data['user_id'] = $this->session->userdata('yolousersession');
//         $data['pimage']=$this->input->post('pimage');
//         $data['pro_id']=$this->input->post('pro_id');
//         $data['pin_value']=$this->input->post('pin_value');
//         $data['utr_no']=$this->input->post('utr_no');
//         $data['entry_date']= date('Y-m-d H:i:s');
//         $data['pay_mode']=$this->input->post('pay_mode');
// //$data['pin']=$pass;

//         $insertdata=$this->db->insert('generate_pin',$data);

//         if($insertdata)
//         {
//             return true;

//         }
//         else
//         {
//             return false;
//         }


//     }

    public function registinsert()
    {
        $randid = $this->randuser();
        $data['username']= $randid;
        $data['name']= $this->input->post('name');
        $data['phone']= $this->input->post('phone');
        $data['email']= $this->input->post('email');
        $data['pin']= $this->input->post('pin');
        $data['proname']= $this->input->post('proname');
        $data['pintype']= $this->input->post('pintype');
        $data['amount']= $this->input->post('amount');

        $mydata = $this->db->insert('user_role',$data);
        if($mydata)
        {
            return true;
        }
        else
        {
            return false;
        }

    }


    public function login($username,$password)
    {
        $this->db->where('username',$username);
        $this->db->where('pwd_hint',$password);
        $details = $this->db->get('user_role')->row_array();
        if (!empty($details)) {
            return $details;
        } else {
            return false;
        }
    }

    public function update_kyc()
    {
        $this->db->trans_begin();

        $data= array(
            'entry_date' => date("Y-m-d h:i:s"),
            'username' => $this->input->post('username'),
            'aadhar_num' => $this->input->post('aadhar'),
            'pan_num' => $this->input->post('pan'),
        );
        $this->db->insert('kyc_details',$data);

        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    } 


    public function account_updates()
    {
        $this->db->trans_begin();
        
        $profile_data = $this->db->where('username',$this->session->userdata('yolouser'))->get('user_role')->row_array();
        
        if($this->input->post('acc_no') == $profile_data['acc_no'] || $profile_data['acc_no'] == "")
        {
            $data= array(
                'entry_date' => date("Y-m-d h:i:s"),
                'acc_name' => $this->input->post('acc_name'),
                'acc_no' => $this->input->post('acc_no'),
                'acc_ifsc' => $this->input->post('acc_ifsc'),
                'acc_bank' => $this->input->post('acc_bank'),
                'acc_branch' => $this->input->post('acc_branch'),
                'gpay' => $this->input->post('gpay'),
                'phnpay' => $this->input->post('phonepe')
            );
            
            $this->db->where('username',$this->input->post('username'));
            $this->db->update('user_role',$data);
        } else {
           $data= array(
                'entry_date' => date("Y-m-d h:i:s"),
                'username' => $this->input->post('username'),
                'acnt_hldr_name' => $this->input->post('acc_name'),
                'acnt_num' => $this->input->post('acc_no'),
                'bank_ifsc' => $this->input->post('acc_ifsc'),
                'bank_name' => $this->input->post('acc_bank'),
                'bank_branch' => $this->input->post('acc_branch'),
                'g_pay' => $this->input->post('gpay'),
                'phone_pay' => $this->input->post('phonepe')
            );
            $this->db->insert('account_details',$data);
        }
        

        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    } 

    public function profile_updates()
    {
        $this->db->trans_begin();
        $uname = $this->input->post('name');
        $email = $this->input->post('email');
        $phone_no = $this->input->post('phone_no');
      $profile_data = $this->db->where('username',$this->session->userdata('yolouser'))->get('user_role')->row_array();

      if($profile_data['name'] != $uname || $profile_data['email'] != $email || $profile_data['phone'] != $phone_no) 
      {
        $rdata= array(
            
            'entry_date' => date("Y-m-d h:i:s"),
            'name' => $this->input->post('name'),
            'username' => $this->input->post('userid'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'phone_no' => $this->input->post('phone_no'),
            'dob' => $this->input->post('dob'),
            'door' => $this->input->post('door'),
            'street' => $this->input->post('street'),
            'district' => $this->input->post('district'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'pin' => $this->input->post('pin'),
            'profile_update_status' => 'Pending'
            
        );
        $this->db->insert('profile_request',$rdata);
          
      }else{
        $data= array(
            'entry_date' => date("Y-m-d h:i:s"),
            'name' => $this->input->post('name'),
            'username' => $this->input->post('userid'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'phone' => $this->input->post('phone_no'),
            'dob' => $this->input->post('dob'),
            'door' => $this->input->post('door'),
            'street' => $this->input->post('street'),
            'district' => $this->input->post('district'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'pin' => $this->input->post('pin'),
            'profile_update_status' => "Request"
        );
        $this->db->where('user_role_id',$this->input->post('id'));
        $this->db->update('user_role',$data);
    }
    
    if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    public function investment_manager()
    {
        $this->db->trans_begin();

        $data['user_id'] = $this->session->userdata('ausername');
        $data['pay_mode'] = $this->input->post('pay_mode');
        $data['wallet_value'] = $this->input->post('amount');
        $data['utr'] = $this->input->post('utr');
        $data['status'] = "Request";
        $data['entry_date'] = date("Y-m-d H:i:s");

        $this->db->insert('admin_request',$data);



        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;

        }

    }

    public function request_pin()
    {
        $this->db->trans_begin();

        $data= array(
            'entry_date' => date("Y-m-d h:i:s"),
            'request_user' => $this->input->post('request_user'),
            'pin_count' => $this->input->post('pin_count'),
            'type' => $this->input->post('type'),
            'amount' => $this->input->post('amount')

        );
        $this->db->insert('pin_request',$data);

        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }



    public function get_row_data($tablename, $where, $value = FALSE) 
    {
        $rowdata = $this->db->where($where, $value)->get($tablename)->row_array();
        return $rowdata;
    }
    
  
    public function newreg()
    {   
        $this->db->trans_start();

        $admin_id=$this->db->select('username')->where('user_role_id',1)->get('user_role')->row()->username;
        $ref_id = $this->input->post('ref_id');
        $pin = $this->db->where('pin',$this->input->post('joining_amount'))->get('generate_pin')->row_array();
        $adminused = $this->db->select('username')->where('user_role_id','1')->get('user_role')->row()->username;

       if($adminused == $ref_id ){

              $pindata= array(
                  'share_status'=> 'Shared',
                  'user_id'=>$this->input->post('ref_id'),
                  'remark'=>'Admin used'
              );
              $this->db->where('pin',$this->input->post('joining_amount'))->update('generate_pin',$pindata);
            }
            
        if($this->input->post('position_no') == 0){
           
        for($i = 0; $i < 10 ; $i++){
          $pos = $i+1;
          $position = $this->db->where('position',$pos)->where('ref_id',$ref_id)->get('user_role')->row_array();
          
          if(empty($position))
          {
              $position = $pos;
              break;
          }
          
        }
            
        }else{
         $position =  $this->input->post('position_no');
        }
        
        
        $username = $this->randuser();
        
        $data['entry_date'] = date('Y-m-d H:i:s');
        $data['username'] = $username;
        $data['name'] = $this->input->post('name');
        $data['ref_id'] = $ref_id;
        $data['joining_amount'] = $pin['pin_value'];
        $data['position'] = $position;
        $data['pwd_hint'] = ($this->input->post('pwd_hint'));
        $data['pwd'] = sha1($this->input->post('pwd_hint'));
        $data['phone'] = $this->input->post('phone');
        
        $this->db->insert('user_role',$data);

        $this->db->set('status','Used')->set('used_date',date('Y-m-d H:i:s'));
        $this->db->where('pin',$this->input->post('joining_amount'));
        $this->db->update('generate_pin');

        $parent_levels = $this->get_row_data('tree', 'child_id',$ref_id);

        if($admin_id == $ref_id){
            $teams  = $ref_id;
        }else{
            if($parent_levels!=""){
                $teams  = $ref_id."~".$parent_levels['team'];
            }else{
                $teams  = $ref_id;
            }
        }
        
        if($this->session->userdata('yoadmin') != "")
        {
            $sponsor = $this->session->userdata('yoadmin');
        }else{
            if($this->session->userdata('yolouser') !=""){
                $sponsor = $this->session->userdata('yolouser');
            }else{
                $sponsor = $ref_id;
            }
        }
            $tdata['entry_date'] = date('Y-m-d H:i:s');
            $tdata['child_id'] = $username;
            $tdata['parent_id'] = $ref_id;
            $tdata['sponsor_id'] = $sponsor;
            $tdata['position'] = $position;
            $tdata['team'] = $teams;
             
        $this->db->insert('tree',$tdata);
        
        $this->db->set('team',$teams);
        $this->db->where('username',$username);
        $this->db->update('user_role');
      
        $this->level_income($teams,$username,$this->input->post('joining_amount'));
     
        //$package = $this->db->where('product_code',$pin['product_code'])->where('package','joining')->get('add_product')->row_array();
        
        $invoice ='PRO'.time();
        
        $join_package = array(
            
            'username' => $username,
            'invoice' => $invoice,
            'name' => $this->input->post('name'),
            'ph_num' => $this->input->post('phone'),
            'amount' => $pin['pin_value'],
            'product_code' => $pin['product_code'],
            'entry_date' => date('Y-m-d H:i:s'),
            'e_pin' => $this->input->post('joining_amount')
            );
        
        $this->db->insert('purchase_table',$join_package);
     
        $this->db->trans_complete();

        if($this->db->trans_status() == TRUE)
        {

            $result['name'] = $username;
            $result['pwd_hint'] = $this->input->post('pwd_hint');
            $result['p_code'] = $pin['product_code'];
            //log_message('error',$package['product_code']." PRODUCT CODEE");
            $refreg[0] = true;
            $refreg[1] = $result['name'];
            $refreg[2] = $result['pwd_hint'];
            $refreg[3] = $result['p_code'];
            return $refreg;
        }
        else
        {
            return false;
        }
    }


public function active_manage($user_id="")

{

    $this->db->trans_begin();

        $data['debit'] = '20';
        $data['user_id'] = $user_id;
        $data['remark'] = "Activation";
        $data['entry_date'] = date('Y-m-d H:i:s');
    
        $this->db->insert('e_wallet',$data);
        
        
        $data1['status'] = 'Active';
        $data1['user_id'] = $user_id;
        $data1['entry_date'] = date('Y-m-d H:i:s');
    
        $this->db->insert('user_activation',$data1);
        
           $data4['status'] = 'Active';

            $this->db->where('username', $user_id);
            $this->db->update('user_role', $data4);
        
                $amount="20";
                $username = $user_id;
                $teams = $this->db->where('child_id',$username)->get('uni_tree')->row_array();
                
                $this->level_incomexx($teams['team'], $username, $amount);
     
        
    if ($this->db->trans_status() == FALSE) {

        $this->db->trans_rollback();

        return false;

    } else {

        $this->db->trans_commit();

        return true;

    }

}
 
  
    
public function level_incomexx($teams, $user, $amount)
{
    log_message('error', $teams . "rrrrrrrrrrrrrrrr");
    log_message('error', $user . "rrrrrrrrrrrrrrrr");
    log_message('error', $amount . "rrrrrrrrrrrrrrrr");

    $this->db->trans_begin();

    if (!empty($teams) && is_numeric($amount)) {
        $team_ids = explode("~", $teams);

        $level_rewardd = $this->db->order_by('level_id', 'desc')
            ->limit(1)
            ->get('level_master')
            ->row_array();

        if (!empty($level_rewardd)) {
            for ($ii = 0; $ii < min(5, count($team_ids)); $ii++) {
                $add = $ii + 1;
                $level_reward = $level_rewardd['level' . $add];

                $rew = ($amount * $level_reward) / 100;
                $reward = array(
                    'username' => $team_ids[$ii],
                    'credit' => $rew,
                    'entry_date' => date('Y-m-d H:i:s'),
                    'level' => $add,
                    'description' => $user,
                    'remark' => 'Level Income',
                );

                $this->db->insert('account', $reward);
            }

            $admin = $this->db->where('user_role_id', '1')->get('user_role')->row_array();
            $company_reward = $level_rewardd['company'];
            $com = ($amount * $company_reward) / 100;

            $commis = array(
                'username' => $admin['username'],
                'amount' => $com,
                'entry_date' => date('Y-m-d H:i:s'),
                'description' => $user,
                'remark' => 'Level commission',
            );

            $this->db->insert('company_commission', $commis);
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


 public function get_all_parent_users($table,$field,$child, $array)
    {

        $parents = $this->get_row_data($table,$field,$child);
        if(count($array) > 1){
            $myteam = explode('~',$child, $parents['team']);
        }else{
            $myteam = explode('~', $parents['team']);
        }
        
      
        return $myteam;
    }


//   public function get_team_investment($username = "",$type="")
// {
//     $amount = 0;
    
//     $get_childs = $this->db->like('team',$username)->get('uni_tree')->result_array();
    
//     $childs = array_column($get_childs,'child_id');
    
//     array_unshift($childs,$username);
    
//     if(!empty($childs)){
//       $amount = $this->db->select('sum(usdt) as balance')->where_in('username', $childs)->where('type' ,$type)->get('deposit')->row()->balance + 0;
//     }
//     return $amount;
// }

public function rank($username = "")
{
 
    $myteam = $this->get_all_parent_users('uni_tree', 'child_id', $username, $res = []);
   
    array_unshift($myteam, $username); 
   
    $count = count($myteam);
 
    
        
    $admin_id = $this->db->where('user_role_id','1')->get('user_role')->row_array();
   
  $user_invest = (float) $this->db->select_sum('usdt')->where('username', $myteam[$i])->get('deposit')->row()->usdt;
  $ref_check = (int) $this->db->where('ref_id',$myteam[$i])->where('status', 'Active')->count_all_results('user_role');
   
    for ($i = 0; $i < $count; $i++) {
        $team_crypto = 0; 
        $team_forex = 0;
        $total_crypto = 0;
        $total_forex = 0;
        $my_crypto=0;
        $my_forex=0;
        $user_invest=0;
        $ref_check=0;
        
        $user_invest = (float) $this->db->select_sum('usdt')->where('username', $myteam[$i])->get('deposit')->row()->usdt;
        $ref_check = (int) $this->db->where('ref_id',$myteam[$i])->where('status', 'Active')->count_all_results('user_role');
        
        
   if ($user_invest >= 500 && $ref_check >= 1 && $admin_id['username'] !== $myteam[$i]){
        
        $parent_team = $this->db->like('team', $myteam[$i])->get('uni_tree')->result_array();
       
        log_message('error', print_r($parent_team, true));
        $my_crypto = (float) $this->db->select('sum(usdt) as balance')->where('username', $myteam[$i])->where('type', "Crypto")->get('deposit')->row()->balance + 0;
        $my_forex = (float) $this->db->select('sum(usdt) as balance')->where('username', $myteam[$i])->where('type', "forex")->get('deposit')->row()->balance + 0;
          

        foreach ($parent_team as $key => $all_user) {
            $team_crypto += (float) $this->db->select('sum(usdt) as balance')->where('username', $all_user['child_id'])->where('type', "Crypto")->get('deposit')->row()->balance + 0;
            $team_forex += (float) $this->db->select('sum(usdt) as balance')->where('username', $all_user['child_id'])->where('type', "forex")->get('deposit')->row()->balance + 0;
           
        }
     
        $total_crypto = $my_crypto + $team_crypto;
        $total_forex = $my_forex + $team_forex;
      
        log_message('error',$total_forex."forexxxxxxxxxxxxxxxxx");
        log_message('error',$total_crypto."cryptoooooooooooooo");

          
       
              $x = '';

if ($total_crypto >= 1000000 && $team_forex >= 1000000) {
    $x = 'x6,x5,x4,x3,x2,x1';
} else if ($total_crypto >= 200000 && $total_crypto <= 1000000 && $total_forex >= 200000 && $total_forex <= 1000000) {
    $x = 'x5,x4,x3,x2,x1';
} else if ($total_crypto >= 100000 && $total_crypto <= 200000 && $total_forex >= 100000 && $total_forex <= 200000) {
    $x = 'x4,x3,x2,x1';
} else if ($total_crypto >= 40000 && $total_crypto <= 100000 && $total_forex >= 40000 && $total_forex <= 100000) {
    $x = 'x3,x2,x1';
} else if ($total_crypto >= 20000 && $total_crypto <= 40000 && $total_forex >= 20000 && $total_forex <= 40000) {
    $x = 'x2,x1';
} else if ($total_crypto >= 10000 && $total_crypto <= 20000 && $total_forex >= 10000 && $total_forex <= 20000) {
    $x = 'x1';
}

if (!empty($x)) {
    $data = array(
        'rank' => $x,
    );

    $this->db->where('username', $myteam[$i]);
    $this->db->update('user_role', $data);

    $ranks = explode(',', $x);
    
log_message('error', print_r($ranks, true));

    foreach ($ranks as $rank) {
        if (!empty($rank)) {
            $check = $this->db->where('username', $myteam[$i])->where('rank', $rank)->get('rank_users')->result_array();
            log_message('error', print_r($check, true));

            if (empty($check)) {
                $amount = $this->db->where('rank', $rank)->get('rank_master')->row_array();

                $data2 = array(
                    'username' => $myteam[$i],
                    'rank' => $rank,
                    'amount' => $amount['amount'],
                    'percentage' => $amount['percentage'],
                    'entry_date' => date('Y-m-d H:i:s'),
                    'remark' => 'Rank',
                );

                $this->db->insert('rank_users', $data2);
            }
        }
    }

          } 
      }
    }
}


}