<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model {
    
    
     public function withdraw_reject($id="",$status="",$remark="")
    {
        $this->db->trans_begin();
        
         $accept_data = $this->db->where('id',$id)->get('withdraw_request')->row_array();
  
            $data['remark'] = $remark;
            $data['status'] = 'Rejected';
            $data['accepted_date'] = date('Y:m:d H:i:s');
            
            $this->db->where('id',$id);
            $this->db->update('withdraw_request',$data);
            
                    $data2['username'] = $accept_data['username'];
                    $data2['credit'] = $accept_data['usdt'];;
                    $data2['remark'] = 'Withdraw Rejected';
                    $data2['entry_date'] = date('Y-m-d H:i:s');
                    
                    $this->db->insert('account',$data2);

        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    
    
    public function act_notification($id){
        
      $this->db->trans_begin(); 
        
          $this->db->set('status',0);
          $this->db->where('status',1);
          $this->db->update('notification');
          
          $this->db->set('status',1);
          $this->db->where('id',$id);
          $this->db->update('notification');
       
       if($this->db->trans_status() == FALSE){
                $this->db->trans_rollback();
              return false;
        } else {
                $this->db->trans_commit();
                return true;
        }  
        
    }
    
    
    public function notification($image="") 
    {
        $this->db->trans_begin();
        
        $notification = array(
            'title' => $this->input->post('title'),
            'entry_date' => date('Y-m-d H:i:s'),
            'image' => $image,
            );
        $this->db->insert('notification',$notification);
        
        if($this->db->trans_status() == FALSE){
                $this->db->trans_rollback();
              return false;
        } else {
                $this->db->trans_commit();
                return true;
        } 
    }
    
    public function reply() 
    {
        $this->db->trans_begin();
        
        $reply = array(
            'reply' => $this->input->post('reply'),
            'reply_date' => date('Y-m-d H:i:s'),
            'status' => 'completed',
            'view' => 'unread'
            );
        $this->db->where('ticket_id',$this->input->post('ticket_id'))->update('support',$reply);
        
        if($this->db->trans_status() == FALSE){
                $this->db->trans_rollback();
              return false;
        } else {
                $this->db->trans_commit();
                return true;
        } 
    }
    
    
    
    
         public function bulk_mail(){
            $mail_users = $this->db->where('mail_status',1)->get('user_role')->result_array();
             $this->load->library('email');
            foreach($mail_users as $key => $mu){
               
                 $datasuccess['name'] =  $mu['first_name'];
                 $datasuccess['message'] = "This is the test mail";
                 log_message('error',$mu['first_name']."yyyyyyyyyyy");
                  log_message('error',$mu['email']."yyyyyyyyyyy");
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
                 $this->email->to($mu['email']);
                 log_message('error',$mu['email']."yyyyyyyyyyy");
                 $this->email->subject('MIC AI');
                 $this->email->message($this->load->view('admin/mail_temp',$datasuccess, true));
                 //$this->email->message("ytfbg u gh uhuiyjg uj");
                 $this->email->send();
            }
            return true;
        }

       
             public function accept_deposit($id="")
        {
            $this->db->trans_begin();
            
            $getid = $this->db->where('admin_request_id',$id)->get('admin_request')->row_array();
            
            $data = ['status'=>'Accepted','entry_date' =>date('Y-m-d H:i:s')];
            $this->db->where('admin_request_id',$id);
            $this->db->update('admin_request',$data);
            
            $da=[
                'user_id'=>$getid['user_id'],
                'credit'=>$getid['wallet_value'],
                'entry_date'=>date('Y-m-d H:i:s'),
                'remark'=>'Deposit',
                'status'=>'Accepted'
                ];
                
                $this->db->insert('e_wallet',$da);
                 
           
        
            if ($this->db->trans_status() == FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
        
                 public function reject_deposit($id="")
        {
            $this->db->trans_begin();
                 
            $getid = $this->db->where('admin_request_id',$id)->get('admin_request')->row_array();
            
            $data = ['status'=>'Rejected','entry_date' =>date('Y-m-d H:i:s'),];
            $this->db->where('admin_request_id',$id);
            $this->db->update('admin_request',$data);
        
            if ($this->db->trans_status() == FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }


         
     public function add_scrolling_news()
        {
            $this->db->trans_start();
            
            $data['title'] = $this->input->post('title');
            $data['news'] = $this->input->post('news');
            $data['news_date'] = $this->input->post('news_date');
            $data['entry_date'] = date('Y-m-d H:i:s');

            
            $this->db->insert('scroll_news',$data);

            if($this->db->trans_status() == TRUE)
            {
                 $this->db->trans_complete();
                return true;
            }
            
            else
            {
                 $this->db->trans_rollback();
                return false;
            }
        }
        
         public function add_informative_news()
        {
            $this->db->trans_start();
            
            $data['title'] = $this->input->post('title');
            $data['news'] = $this->input->post('news');
            $data['news_date'] = $this->input->post('news_date');
            $data['entry_date'] = date('Y-m-d H:i:s');

            
            $this->db->insert('informative_news',$data);

            if($this->db->trans_status() == TRUE)
            {
                 $this->db->trans_complete();
                return true;
            }
            
            else
            {
                 $this->db->trans_rollback();
                return false;
            }
        }
   
    
     public function tradewallet_profit()
        {
            $this->db->trans_begin();
            

                
                $trading = $this->db->select('user_id')->group_by('user_id')->get('trading_wallet')->result_array();
                
              
                if (!empty($trading)) {
                    
                foreach($trading as $key => $user){

                    $status=$this->db->where('username',$user['user_id'])->get('user_role')->row_array();
                    
                    if($status['trading_status'] == 'Enable'){
                         
                       $user_bal =  $this->db->SELECT('SUM(transfer_amount)-SUM(debit) AS bal')->where('user_id',$user['user_id'])->get('trading_wallet')->row()->bal + 0;
                      
                    
                     if ($this->input->post('percentage') < 0 && $user_bal >10 ) {
                         log_message('error','USERBALANCE'.$user_bal);
                         
                        // Deduct the absolute value of the negative percentage from user_bal
                        $deducted_amount = (($user_bal )* abs($this->input->post('percentage')))/ 100;
                        
                        log_message('error','minus AMOUNT'.$deducted_amount);
                
                        // 55% of the deducted amount goes to level income
                        $level_amount = ($deducted_amount * 55)/100;
                        // $lossamount=$user_bal-$level_amount;
                
                        $da['username'] = $user['user_id'];
                        $da['loss'] =$deducted_amount;
                        $da['service_charge'] =$level_amount;
                        $da['trade_open_time'] = $this->input->post('trade_open_time');
                        $da['trade_close_time'] = $this->input->post('trade_close_time');
                        $da['open_price'] = $this->input->post('open_price');
                        $da['close_price'] = $this->input->post('close_price');
                        $da['trading_pair'] = $this->input->post('trade_pair');
                        $da['action'] = $this->input->post('action');
                        $da['percentage'] = $this->input->post('percentage');
                        $da['remark'] = 'Loss';
                        $da['description'] = 'Trading';
                        $this->db->insert('trading_loss_history',$da);
                        
                        
                        
                        $data2['user_id'] = $user['user_id'];
                        $data2['debit'] = $deducted_amount;
                        $data2['remark'] = 'Loss';
                        $data2['description'] = 'Trade Loss';
                        $data2['entry_date'] = date('Y-m-d H:i:s');
                        $data2['percentage']=$this->input->post('percentage');
                        
                         $this->db->insert('trading_wallet',$data2);
                         
                        $t['user_id'] = $user['user_id'];
                        $t['debit'] = $level_amount;
                        $t['remark'] = 'Service charge';
                        $t['service_charge'] =$level_amount;
                        $t['description'] = 'Trade Loss';
                        $t['entry_date'] = date('Y-m-d H:i:s');
                        $t['percentage']=$this->input->post('percentage');
                 
                        $this->db->insert('trading_wallet',$t);
                        $teams=$this->db->select('team')->where('child_id',$user['user_id'])->get('uni_tree')->row()->team;
                        $this->trade_level_income($teams,$user['user_id'],$level_amount);
                       
                         
                     }
                     else if ($this->input->post('percentage') > 0 && $user_bal >0){
                        $profit = ($user_bal * $this->input->post('percentage'))/ 100;
                        $fifty_five_percent = ($profit * 55)/100; 
                        $forty_five_percent = ($profit * 45)/100;
                        // log_message('error','SIXTYPERCENTAGE'.$sixty_percent);
                        // log_message('error','FOURTYPERCENTAGE'.$forty_percent);
                        
                        $pr['username'] = $user['user_id'];
                        $pr['profit'] = $forty_five_percent;
                        $pr['trade_open_time'] = $this->input->post('trade_open_time');
                        $pr['trade_close_time'] = $this->input->post('trade_close_time');
                        $pr['open_price'] = $this->input->post('open_price');
                        $pr['close_price'] = $this->input->post('close_price');
                        $pr['trading_pair'] = $this->input->post('trade_pair');
                        $pr['percentage'] = $this->input->post('percentage');
                        $pr['action'] = $this->input->post('action');
                        $pr['remark'] = 'Trade Profit';
                        $pr['description'] = 'Profit';
                        $this->db->insert('trading_loss_history',$pr);
                        
                        

                        $data['username'] = $user['user_id'];
                        $data['credit'] = $forty_five_percent;
                        $data['remark'] = 'Trade Profit';
                        $data['description'] = 'Profit';
                        $data['amount'] = $user_bal;
                        $data['type'] = 'Trade';
                        $data['entry_date'] = date('Y-m-d H:i:s');
                        $data['percentage']=$this->input->post('percentage');
                 
                        $this->db->insert('account',$data);
                        $teams=$this->db->select('team')->where('child_id',$user['user_id'])->get('uni_tree')->row()->team;
                        $game_level_income=$this->trade_level_income($teams,$user['user_id'],$fifty_five_percent);
                    
                     }
                   }
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
    
    
        
         public function trade_level_income($teams,$user,$amount)
    {
        log_message('error','TEAMS'.json_encode($teams));
        log_message('error','USERS'.json_encode($user));
        log_message('error','Amount'.json_encode($amount));
        
            
            if (!empty($teams) && !empty($amount)) {
                $team_ids = explode("~", $teams);
                log_message('error','EXPLODE TEAMS'.json_encode($team_ids));
                
                $lvl_count = $this->db->where('status', 'Active')->count_all_results('level_master')+0;
                $ss=min($lvl_count, count($team_ids));
                
                log_message('error','LEVELCOUNT'.$lvl_count);
                log_message('error','TEAMSCOUNT'.count($team_ids));
                
                for ($i = 0; $i < $ss; $i++) {
                    log_message('error','EXPLODE TEAMS'.json_encode($team_ids[$i]));
                    $add = $i + 1;
                    $level_reward = $this->db->where('status', 'Active')->where('level', 'Level ' . $add)->get('level_master')->row_array();

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
                        'remark' => 'Trade Level Income',
                        'type' => 'level',
                        );
                        
                        $inn= $this->db->insert('account', $reward);
                       
                }
            }
            if ($inn) {
                   return true;
                } else {
                    return false;
                }
      }
}
    
    
    
                 public function trade_income($forex="",$crypto="")
            {
                $this->db->trans_begin();
                
                $users = $this->db->where('type','forex')->get('deposit')->result_array();
              
                if (!empty($users)) {
                foreach($users as $key => $user){
                    $forex_user =  $this->db->select_sum('usdt')->where('username',$user['username'])->where('type','forex')->get('deposit')->row()->usdt + 0;
                    $forex_bal = $forex_user * $forex / 100;
                    $forex_user_bal = $forex_bal * 0.7;
                    $forex_level = $forex_bal * 0.3;
                     
                    $data['username'] = $user['username'];
                    $data['amount'] = $forex_user_bal;
                    $data['type'] = 'Forex';
                    $data['percentage'] = $forex;
                    $data['remark'] = 'Trade Income';
                    $data['entry_date'] = date('Y-m-d H:i:s');
                    
                    $this->db->insert('daily_trade',$data);

                     if($forex_user_bal > 0){
                    $data3['username'] = $user['username'];
                    $data3['credit'] = $forex_user_bal;
                    $data3['remark'] = 'Trade Income';
                    $data3['type'] = 'Forex';
                    $data3['description'] = $forex;
                    $data3['entry_date'] = date('Y-m-d H:i:s');
                    
                    $this->db->insert('account',$data3);
                    
                    $teams = $this->db->where('child_id',$user['username'])->get('uni_tree')->row_array();
                    $this->forex_level($teams['team'], $user['username'], $forex_level);
                    }
                  }
                }
                
                 $cry_users = $this->db->where('type','crypto')->get('deposit')->result_array();
                 if (!empty($cry_users)) {
                 foreach($cry_users as $key => $cry_user){
                    $crypto_user =  $this->db->select_sum('usdt')->where('username',$cry_user['username'])->where('type','crypto')->get('deposit')->row()->usdt + 0;
                    $crypto_bal = $crypto_user * $crypto / 100;
                    $crypto_user_bal = $crypto_bal * 0.7;
                    $crypto_level = $crypto_bal * 0.3;

                    $data2['username'] = $user['username'];
                    $data2['amount'] = $crypto_user_bal;
                    $data2['type'] = 'Crypto';
                    $data2['percentage'] = $crypto;
                    $data2['remark'] = 'Trade Income';
                    $data2['entry_date'] = date('Y-m-d H:i:s');
                    
                    $this->db->insert('daily_trade',$data2);
                     
                    if($crypto_user_bal > 0){
                    $data4['username'] = $user['username'];
                    $data4['credit'] = $crypto_user_bal;
                    $data4['remark'] = 'Trade Income';
                    $data4['type'] = 'Crypto';
                    $data4['description'] = $crypto;
                    $data4['entry_date'] = date('Y-m-d H:i:s');
                    
                    $this->db->insert('account',$data4);
                    
                     $teams = $this->db->where('child_id',$user['username'])->get('uni_tree')->row_array();
                    $this->crypto_level($teams['team'], $user['username'], $crypto_level);
                    }
                  }
                }
                     
                $data5['crypto_percentage'] = $crypto;
                $data5['forex_percentage'] = $forex;
                $data5['remark'] = 'Daily Trade';
                $data5['entry_date'] = date('Y-m-d H:i:s');
            
                $this->db->insert('trade_history',$data5);
            
                if ($this->db->trans_status() == FALSE) {
                    $this->db->trans_rollback();
                    return false;
                } else {
                    $this->db->trans_commit();
                    return true;
                }
            }
            
            
            public function forex_level($teams, $user, $amount)
{
    log_message('error', $teams . "rrrrrrrrrrrrrrrr");
    log_message('error', $user . "rrrrrrrrrrrrrrrr");
    log_message('error', $amount . "rrrrrrrrrrrrrrrr");

    $this->db->trans_begin();

    if (!empty($teams) && is_numeric($amount)) {
        $team_ids = explode("~", $teams);

        $level_rewardd = $this->db
            ->get('trade_level_master')
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
                    'type' => 'forex',
                    'description' => $user,
                    'remark' => 'Trade Level Income',
                );

                $this->db->insert('account', $reward);
            }

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

            public function crypto_level($teams, $user, $amount)
{
    log_message('error', $teams . "rrrrrrrrrrrrrrrr");
    log_message('error', $user . "rrrrrrrrrrrrrrrr");
    log_message('error', $amount . "rrrrrrrrrrrrrrrr");

    $this->db->trans_begin();

    if (!empty($teams) && is_numeric($amount)) {
        $team_ids = explode("~", $teams);

        $level_rewardd = $this->db
            ->get('trade_level_master')
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
                    'type' => 'crypto',
                    'description' => $user,
                    'remark' => 'Trade Level Income',
                );

                $this->db->insert('account', $reward);
            }

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
    
    
             public function wallet_update()
        {
            $this->db->trans_begin();
                 
            $data['wallet_address'] = $this->input->post('wallet_address');
        
            $this->db->where('user_role_id',1)->update('user_role',$data);
        
            if ($this->db->trans_status() == FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
    
    
        public function rank_update()
    {
        $this->db->trans_begin();
        $data['amount'] = $this->input->post('amount');
        $data['percentage'] = $this->input->post('percentage');
        $data['daily_reward'] = $this->input->post('reward');
    
        $this->db->where('id',$this->input->post('id'))->update('rank_master',$data);
    
        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
   
    public function get_myteam($parent,$position)
    {
        $myteam = array();
        $mychild =$this->db->select('child_id')->where('parent_id',$parent)->where('position',$position)->get('tree')->row_array();
        if(!empty($mychild['child_id'])){
            
            $myteam = $this->db->select('child_id')->like('team',$mychild['child_id'])->get('tree')->result_array();
            array_unshift($myteam, $mychild);
        }
        return array_column($myteam, 'child_id');
    }  
    
   public function get_row_data($tablename, $where, $value = FALSE) 
    {
     $rowdata = $this->db->where($where, $value)->get($tablename)->row_array();
     return $rowdata;
    }
   
   public function roi_generate()
   {
       $this->db->trans_begin();
       
       $user = $this->session->userdata('micusername');
       $pack_id = $this->input->post('pack_id');
       //log_message('error',$this->input->post('up_id'));
       
        $start_time =  date('Y-m-d H:i:s');
        $end_time = date("Y-m-d H:i:s", strtotime(' + 1 minute'));
          
          $timer = array(
          
           'start_time' => $start_time,
           'end_time' => $end_time
          );
          
         $this->db->where('user_id',$this->session->userdata('micusername'));
         $this->db->where('up_id',$pack_id);
         $insert = $this->db->update('user_package',$timer);
       
        log_message('error',"Hiii");
        $active_roi = $this->db->where('up_id',$pack_id)->where('user_id',$user)->where('status','Active')->get('user_package')->row_array();
        
            $roi_per = $this->db->select('percentage')->where('id',$active_roi['package_id'])->get('package')->row()->percentage+0;

            $roi_divide = $this->db->select('reward')->where('type','eroi divide')->get('master')->row()->reward+0;
            $ewallet_divide = $this->db->select('reward')->where('type','roi divide')->get('master')->row()->reward+0;
            
            // log_message('error',$roi_per."roi_per") ;
            // log_message('error', $roi_divide."roi_divide") ;
            // log_message('error',$ewallet_divide."ewallet_divide") ;
            
            $investment = $this->db->select('investment')->where('username',$user)->get('user_role')->row()->investment+0;
            $total_income = $this->db->select_sum('credit')->where('username',$user)->get('account')->row()->credit+0;
            $ceiling = $investment*3;
            
           if($total_income < $ceiling)
           {
            $pay = ($active_roi['amount']*$roi_per)/100;
            
            // log_message('error',$active_roi['amount']." Roi amount");
            // log_message('error',$roi_divide." withdraw divide");
            // log_message('error',$ewallet_divide." ewallet divide");
            // log_message('error',$pay." Pay");
             
            if($pay > 0)
            {
               $payable = min(($ceiling-$total_income),$pay);
               
               //$total_pay = $total_income+$payable;
               
              
                    
                    $withdraw_pay = ($payable*$roi_divide)/100;
                    $ewallet_pay = ($payable*$ewallet_divide)/100;
                
                    if($withdraw_pay > 0)
                    {
                        $account = array(
                            'username' => $user,
                            'credit'  => $withdraw_pay,
                            'remark' => 'ROI Income',
                            'ewallet' => $ewallet_pay,
                            'description' => $active_roi['up_id'],
                            'entry_date' => $end_time
                            );
                        $this->db->insert('account',$account);
                    }
                    
                    if($ewallet_pay > 0)
                    {
                        $credit_wallet = array(
                                'user_id'=> $user,
                                'credit'=> $ewallet_pay,
                                'entry_date'=> $end_time,
                                'remark' => 'ROI income',
                            );
                            
                        $this->db->insert('e_wallet',$credit_wallet);
                    }
                    
                   $this->level_income($user,$payable,$end_time);
                    
                    $new_total_income = $this->db->select_sum('credit')->where('username',$user)->get('account')->row()->credit+0;
                    
                    if($new_total_income >= $ceiling)
                    {
                        $this->db->set('status','Inactive');
                        $this->db->where('up_id',$pack_id);
                        $this->db->update('user_package');  
                    }
            }
        }else{
            $this->db->set('status','Inactive');
            $this->db->where('up_id',$pack_id);
            $this->db->update('user_package'); 
        }
           
        // $this->db->where('up_id',$pack_id);
        // $this->db->update('user_package' ,array('start_time' => NULL,'end_time' => NULL,));
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        
        }
        
   }
   
   public function level_income($user="",$payable="",$entry_date=""){
       
   $user_team = $this->db->select('team')->where('child_id',$user)->get('uni_tree')->row()->team;
        
        if($user_team != "")
        {
            $parents = explode("~",$user_team);
            for ($ii=0; $ii < min(5,count($parents)); $ii++) {
                $add = $ii+1;
                $level_reward = $this->db->order_by('level_id','DESC')->where('type','level')->get('level_master')->row_array();
                 
                 $level_pay = ($payable*$level_reward['level'.$add])/100;
                 log_message('error',$level_reward['level'.$add]);
                 log_message('error',$level_pay);
                 $level_divide = $this->db->select('reward')->where('type','elevel divide')->get('master')->row()->reward+0;
                 $ewallet_divide = $this->db->select('reward')->where('type','level divide')->get('master')->row()->reward+0;
                 
                  $investment = $this->db->select('investment')->where('username',$parents[$ii])->get('user_role')->row()->investment+0;
                  $total_income = $this->db->select_sum('credit')->where('username',$parents[$ii])->get('account')->row()->credit+0;
                  $ceiling = $investment*3;
                  
                  
                  
                 if($level_pay > 0)
                 {
                     $pay = min(($ceiling-$total_income),$level_pay);
                     
                     $lvl_amount = ($pay * $level_divide)/100;
                     $ewallet_amount = ($pay * $ewallet_divide)/100;
                     
                     if($lvl_amount > 0)
                     {
                       $reward = array(
                            'username' => $parents[$ii],
                            'credit' => $lvl_amount,
                            'amount' => $level_pay,
                            'entry_date' => $entry_date,
                            'level' => 'level '.$add,
                            'ewallet' => $ewallet_amount,
                            'description' => $user,
                            'remark' => 'Level Income',
                            );
                        $this->db->insert('account',$reward);    
                     }
                     
                     if($ewallet_amount > 0)
                     {
                        $credit_level = array(
                            'user_id'=> $parents[$ii],
                            'credit'=> $ewallet_amount,
                            'entry_date'=> $entry_date,
                            'remark' => 'Level income',
                        );
                        
                        $this->db->insert('e_wallet',$credit_level);
                     } 
                 }
            }
        } 
   } 
  
  
    public function gen_rank()
{
    $this->db->trans_begin();
    
    $rank_users = $this->db->where('status', 'Active')->get('rank_users')->result_array();

    if (!empty($rank_users)) {
        foreach ($rank_users as $key => $dep) {
            $rank_amount = $this->db->select_sum('credit')->where('type', 'rank')->where('username', $dep['username'])->where('description', $dep['rank'])->get('account')->row()->credit + 0;
            $master = $this->db->where('rank', $dep['rank'])->get('rank_master')->row_array();
            $rank_bonus = $this->db->where('username', $dep['username'])->get('user_role')->row_array();

            if ($rank_amount <= $master['amount']) {
                $ceiling = $dep['amount'] * 0.5; // 50% of amount
                 $ceiling_rank = $dep['amount']; 
                $amount = ($dep['amount'] * $dep['percentage']) / 100;
                $payable = min(($ceiling_rank - $rank_amount), $amount);
               

                if ($payable > 0) {
                    $rank_credit = array(
                        'username' => $dep['username'],
                        'credit' => $payable,
                        'entry_date' => date('Y-m-d H:i:s'),
                        'remark' => 'Rank income',
                        'description' => $dep['rank'],
                        'type' => 'rank'
                    );

                    $this->db->insert('account', $rank_credit);
                    
                    $check = $this->db->where('username',$rank_bonus['ref_id'])->where('description',$dep['username'])->where('rank', $dep['rank'])->get('rank_bonus_users')->row_array();
                    
             if (empty($check)) {
                    $rank_bo = array(
                        'username' => $rank_bonus['ref_id'],
                        'amount' => $ceiling,
                        'percentage'=>'1',
                        'entry_date' => date('Y-m-d H:i:s'),
                        'remark' => 'Rank Bonus income',
                        'description' => $dep['username'],
                        'rank' => $dep['rank'],
                        'type' => 'rank_bonus',
                        'days'=> "100",
                    );

                    $this->db->insert('rank_bonus_users', $rank_bo);
                }
              }
                if ($rank_amount == $master['amount']) {
                    $status = array(
                        'status' => 'Inactive',
                    );

                    $this->db->where('id', $dep['id']);
                    $this->db->update('rank_users', $status);
                }
            }
        }
        
        $this->gen_rank_bonus();
    }

    if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        return false;
    } else {
        $this->db->trans_commit();
        return true;
    }
}




 public function gen_rank_bonus()
{
    $this->db->trans_begin();
    $rank_bonus_users = $this->db->where('days >', '0')->get('rank_bonus_users')->result_array();

    if (!empty($rank_bonus_users)) {
        
        foreach ($rank_bonus_users as $key => $dep) {
           
               $payable=  $dep['amount']* $dep['percentage']/100;

                    $rank_credit = array(
                        'username' => $dep['username'],
                        'credit' => $payable,
                        'entry_date' => date('Y-m-d H:i:s'),
                        'remark' => 'Rank Bonus income',
                        'description' => $dep['rank'],
                        'type' => 'rank bonus'
                    );

                    $this->db->insert('account', $rank_credit);
                    
                        $this->db->set('days', 'days - 1', false);
                        $this->db->where('id', $dep['id']);
                        $this->db->update('rank_bonus_users');

              }
                  
                
            
        
    }

    if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        return false;
    } else {
        $this->db->trans_commit();
        return true;
    }
}

     
   
    public function binary_daily_pay()
    {
            $this->db->trans_begin();
        
            $active_income = $this->db->where('total_days >',0)->get('binary_pay')->result_array();
        
            foreach($active_income as $key => $ai){
        
                $binary_divide = $this->db->select('reward')->where('type','ebinary divide')->get('master')->row()->reward+0;
                $ewallet_divide = $this->db->select('reward')->where('type','binary divide')->get('master')->row()->reward+0;
                
                $investment = $this->db->select('investment')->where('username',$ai['user_id'])->get('user_role')->row()->investment+0;
                $total_income = $this->db->select_sum('credit')->where('username',$ai['user_id'])->get('account')->row()->credit+0;
                $ceiling = $investment*3;
                
                //$payable = min(($ceiling-$total_income),$ai['amount']);
                
                 log_message('error',$binary_divide." binary");
                  log_message('error',$ewallet_divide." ewallet");
                
                $amount = $ai['amount'];
                
                $pay = ($amount*$binary_divide)/100;
                $epay = ($amount*$ewallet_divide)/100;
                
                
                //$total_pay = $total_income+$pay;
               $payable = min(($ceiling-$total_income),$pay);
                
               if($payable > 0)
               {
                    $account = array(
                        'username' => $ai['user_id'],
                        'credit'  => $payable,
                        'remark' => 'Pair Income',
                        'ewallet' => $epay,
                        'description' => $ai['pair_id'],
                        'entry_date' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('account',$account); 
               }
               
              if($epay > 0)
              {
                $credit_wallet = array(
                    'user_id'=> $ai['user_id'],
                    'credit'=> $epay,
                    'entry_date'=> date('Y-m-d H:i:s'),
                    'remark' => 'Pair income',
                );
                 
                $this->db->insert('e_wallet',$credit_wallet);
              }
        
            $this->db->set('total_days', 'total_days-1', FALSE);
            $this->db->where('id',$ai['id']);
            $result = $this->db->update('binary_pay');
        
        }
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        
        }
    
    }
    
    
  public function get_genealogy($treeid)
   { 
    log_message('error',$treeid);
    $user_detail = $this->get_row_data('user_role','username',$treeid);
    $ref_detail = $this->get_row_data('user_role','username',$user_detail['ref_id']);
    
    if($user_detail['investment'] > 0 || $user_detail['user_type'] == 'a')
    {
        $ccode="green";
    }else{
        $ccode="red";
    }
    ?>
    <div class="node" style="cursor: default;">
        
        
            <img style="border:  3px solid <?=$ccode?>" class="tree_icon with_tooltip root_node" src="<?=PROFILEURL?><?=$user_detail['profile']?>" ondblclick="getGenologyTree('elangorp',event);" data-tooltip-content="#<?=$user_detail['username']?>">
            <a href="<?=BASEURL?>admin/binary_tree/<?=$user_detail['username']?>">
                <p class="demo_name_style"><?=$user_detail['username']?></p>
        </a>
    </div>

<div id="tooltip_div" style="display:none;">
    <div id="<?=$user_detail['username']?>" class="tree_img_tree">
<?php 
             $left_user_investment=0;
             $right_user_investment=0;
             $left_child_investment=0;
             $right_child_investment=0;
             $left_investment=0;
             $right_investment=0;
        $left_tree =$this->db->select('child_id')->where('parent_id',$user_detail['username'])->where('position','left')->get('tree')->row()->child_id; 
            $right_tree =$this->db->select('child_id')->where('parent_id',$user_detail['username'])->where('position','right')->get('tree')->row()->child_id; 
            if($left_tree!=""){
                
                
                $left_user_investment=$this->db->select('investment')->where('username',$left_tree)->get('user_role')->row()->investment+0;

                
                
                $left_count= $this->db->select('child_id')->like('team',$left_tree)->get('tree')->result_array();
                $left_team = array_column($left_count, 'child_id');
                // log_message('error',$this->db->last_query());
                

                
                if(!empty($left_team)){
                    
                    $left_child_investment=$this->db->select_sum('investment')->where_in('username',$left_team)->get('user_role')->row()->investment+0;
                    // log_message('error',$this->db->last_query());
                   
                   
                    
                    $left_investment=$left_child_investment+$left_user_investment;

                }else{
                    $left_investment=$left_user_investment;
 
                } 
            }
            
            if($right_tree!=""){
                
          
                $right_user_investment=$this->db->select('investment')->where('username',$right_tree)->get('user_role')->row()->investment+0;
                
                $right_count=$this->db->select('child_id')->like('team',$right_tree)->get('tree')->result_array();
                $right_team = array_column($right_count, 'child_id');
                
                if( !empty($right_team)){

                    $right_child_investment=$this->db->select_sum('investment')->where_in('username',$right_team)->get('user_role')->row()->investment+0;
                    // log_message('error',$this->db->last_query());

                    $right_investment=$right_child_investment+$right_user_investment;
                }else{

                    $right_investment=$right_user_investment;
                } 
            }
        ?>
        <div class="Demo_head_bg">
            <p><?=$user_detail['username']?></p>
        </div>
        <div class="body_text_tree">
            <ul class="list-group no-radius">
                
                <li class="list-group-item">
                    <div class="pull-left">Join Date</div>
                    <div class="pull-right">: <?=date_format(date_create($user_detail['entry_date']),"d-M-Y");?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Email :</div>
                    <div class="pull-right"><?=$user_detail['email']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Total Investment</div>
                    <div class="pull-right">: <?=$user_detail['investment']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Ref / Spo ID</div>
                    <div class="pull-right">: <?=$ref_detail['username']?></div>
                </li>
                
                  <li class="list-group-item">
                    <div class="pull-left">Left Investment</div>
                    <div class="pull-right">: <?=$left_investment?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Right Investment</div>
                    <div class="pull-right">: <?=$right_investment?></div>
                </li>
                
                
               
            </ul>
        </div>
    </div>
</div>

<?php }

 public function get_genealogyy($treeid,$page)
   { 
    log_message('error',$treeid);
    $user_detail = $this->get_row_data('user_role','username',$treeid);
    $ref_detail = $this->get_row_data('user_role','username',$user_detail['ref_id']);
    
    if($user_detail['investment'] > 0 || $user_detail['user_type'] == 'a')
    {
        $ccode="green";
    }else{
        $ccode="red";
    }
    ?>
    <div class="node" style="cursor: default;">
        
        
            <img  class="tree_icon with_tooltip root_node" src="<?=PROFILEURL?><?=$user_detail['profile']?>" ondblclick="getGenologyTree('elangorp',event);" data-tooltip-content="#<?=$user_detail['username']?>">
            <a href="<?=BASEURL?><?=$page?>/binary_tree/<?=$user_detail['username']?>">
                <p class="demo_name_style"><?=$user_detail['username']?></p>
        </a>
    </div>

<div id="tooltip_div" style="display:none;">
    <div id="<?=$user_detail['username']?>" class="tree_img_tree">
<?php 
             $left_user_investment=0;
             $right_user_investment=0;
             $left_child_investment=0;
             $right_child_investment=0;
             $left_investment=0;
             $right_investment=0;
        $left_tree =$this->db->select('child_id')->where('parent_id',$user_detail['username'])->where('position','left')->get('tree')->row()->child_id; 
            $right_tree =$this->db->select('child_id')->where('parent_id',$user_detail['username'])->where('position','right')->get('tree')->row()->child_id; 
            if($left_tree!=""){
                
                
                $left_user_investment=$this->db->select('investment')->where('username',$left_tree)->get('user_role')->row()->investment+0;

                
                
                $left_count= $this->db->select('child_id')->like('team',$left_tree)->get('tree')->result_array();
                $left_team = array_column($left_count, 'child_id');
                // log_message('error',$this->db->last_query());
                
                $left_pair = $this->db->select_sum('left_pair')->where_in('username',$user_detail['username'])->get('account')->row()->left_pair+0;
                $right_pair = $this->db->select_sum('right_pair')->where_in('username',$user_detail['username'])->get('account')->row()->right_pair+0;
                if(!empty($left_team)){
                    
                    $left_child_investment=$this->db->select_sum('investment')->where_in('username',$left_team)->get('user_role')->row()->investment+0;
                    // log_message('error',$this->db->last_query());
                   
                   
                    
                    $left_investment=$left_child_investment+$left_user_investment;

                }else{
                    $left_investment=$left_user_investment;
 
                } 
            }
            
            if($right_tree!=""){
                
          
                $right_user_investment=$this->db->select('investment')->where('username',$right_tree)->get('user_role')->row()->investment+0;
                
                $right_count=$this->db->select('child_id')->like('team',$right_tree)->get('tree')->result_array();
                $right_team = array_column($right_count, 'child_id');
                
                if( !empty($right_team)){

                    $right_child_investment=$this->db->select_sum('investment')->where_in('username',$right_team)->get('user_role')->row()->investment+0;
                    // log_message('error',$this->db->last_query());

                    $right_investment=$right_child_investment+$right_user_investment;
                }else{

                    $right_investment=$right_user_investment;
                } 
            }
        ?>
        <div class="Demo_head_bg">
            <p><?=$user_detail['username']?></p>
        </div>
        <div class="body_text_tree">
            <ul class="list-group no-radius">
                
                <li class="list-group-item">
                    <div class="pull-left">Join Date</div>
                    <div class="pull-right">: <?=date_format(date_create($user_detail['entry_date']),"d-M-Y");?></div>
                </li>
               
                <li class="list-group-item">
                    <div class="pull-left">Total Investment</div>
                    <div class="pull-right">: <?=$user_detail['investment']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Ref ID</div>
                    <div class="pull-right">: <?=$ref_detail['username']?></div>
                </li>
            
                  <li class="list-group-item">
                    <div class="pull-left">Left Investment</div>
                    <div class="pull-right">: <?=$left_investment?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Right Investment</div>
                    <div class="pull-right">: <?=$right_investment?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Left Carry</div>
                    <div class="pull-right">: <?=$left_investment-$left_pair?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Right Carry</div>
                    <div class="pull-right">: <?=$right_investment-$right_pair?></div>
                </li>
                
                
               
            </ul>
        </div>
    </div>
</div>

<?php }
    
    
    public function randuser()
    {
        $uscode = "MIC".rand(000000,999999);
        $query = $this->db->get_where('user_role', array('username' => $uscode))->row_array();
        if (!empty($query)) {
            $this->randuser();
        }else{
           return $uscode; 
        }
        
    }
    
    
     public function register_manage()
     {
      $this->db->trans_begin();
      
      $username = $this->randuser();
      $ref = $this->input->post('ref_id');
    //   $pos = $this->input->post('position');
      $date = date('Y-m-d H:i:s');
      
      $parent_levels = $this->get_row_data('uni_tree', 'child_id',$ref);
      
       $admin_id=$this->db->select('username')->where('user_role_id',1)->get('user_role')->row()->username;
                
        if($admin_id == $ref){
             $teams  = $ref;
        }else{
            if($parent_levels!=""){
                $teams  = $ref."~".$parent_levels['team'];
            }else{
                $teams  = $ref;
            } 
        }
      
      
        $data['user_type'] = 'u';
        $data['entry_date'] = $date;
        $data['username'] = $username;
        $data['first_name'] = $this->input->post('first_name');
        $data['ref_id'] = $ref;
        $data['email'] = $this->input->post('email');
        $data['pwd_hint'] = $this->input->post('pwd');
        $data['pwd'] = sha1($this->input->post('pwd'));
        $data['mobile_no'] = $this->input->post('mobile');
        $data['tpwd'] = $this->input->post('tpwd');
        $data['country'] = $this->input->post('country');
        // $data['position'] = $pos;
         
        
        $this->db->insert('user_role',$data);
        
        // $this->extreme_end_autofill('tree',$ref,$username,$pos,$date);
        
         $this->user_uni_autofill($ref,$username,'uni_tree',$teams);
        
        $result['user'] = $username;
        $result['password'] = $this->input->post('pwd');
        $result['email'] = $this->input->post('email');
        $result['status'] = true;
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return $result;
        
        }
    }
    
    

    public function get_extreme_end_child($tree="",$parent="",$pos="",$ch="")
    {
        $resultccc = $this->db->select('child_id')->where('parent_id', $parent)->where('position', $pos)->get($tree)->row()->child_id;
        if(!empty($resultccc)){
           $ch = $this->get_extreme_end_child($tree,$resultccc,$pos,$resultccc);
        }
        return $ch;
    }

     public function extreme_end_autofill($tree,$parent,$child,$position,$paiddate)
     {
        $getparent = $this->get_extreme_end_child($tree,$parent,$position,$parent);
        if(!empty($getparent)){
            $autofill_team1 = $this->db->select('team')->where('child_id',$getparent)->get($tree)->row()->team;
            if(!empty($autofill_team1)){
                $autofillteams  = $getparent."~".$autofill_team1;
            }else{
                $autofillteams  = $getparent;
            }
            $data2['parent_id'] = trim($getparent);
            $data2['child_id'] = trim($child);
            $data2['entry_date'] = $paiddate;
            $data2['position'] = $position;
            $data2['team'] = $autofillteams;
            if($this->db->insert($tree,$data2)){
                //$this->db->where('username',$child);
               //$this->db->update('user_role',array('team'=>$autofillteams));
                return true;
            }
            else{
                return false;
            }  
        }
     }
    
     public function user_uni_autofill($parent,$child,$tree,$team){

                $childcount = $this->db->where('child_id',$child)->count_all_results($tree)+0;
                if($childcount < 1){
                    $data2['parent_id'] = $parent;
                    $data2['child_id'] = $child;
                    $data2['entry_date'] = date('Y-m-d');
                    $data2['team'] = $team;
                    
                    if($this->db->insert($tree,$data2)) {
                        return true;
                    } else {
                        return false;
                    } 
                }
            }
    
    public function auto_payout(){
        $this->db->trans_begin();
        $payouts = $this->db->select('sum(credit)-sum(debit) as balance, username')->where('entry_date <',date('Y-m-20'))->group_by('username')->having('balance >',0)->get("account")->result_array();
        log_message("error", $this->db->last_query());
        foreach($payouts as $key => $payout)
        {
            $account_data=array(
                'entry_date'=>date('Y-m-d H:i:s'),
                'debit' =>$payout['balance'],
                'username' => $payout['username'],
                );
            $this->db->insert('account',$account_data);
            $payout_data=array(
                'entry_date'=>date('Y-m-d H:i:s'),
                'credit' =>$payout['balance'],
                'username' => $payout['username'],
                );
            $this->db->insert('payout',$payout_data);
        }
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    
    public function userpack()
    {
        $uscode = "P".rand(000000,999999);
        $query = $this->db->get_where('user_package', array('up_id' => $uscode))->row_array();
        if (!empty($query)) {
            $this->userpack();
        }else{
           return $uscode; 
        }
        
    }
    
    
    public function buy_fd_package($user_id="")
    {
        $this->db->trans_begin();
        
        $package_value = $this->db->where('id',$this->input->post('package'))->get('fd_package')->row_array();
        
        $debit_data = array(
            'user_id'=> $user_id,
            'debit'=> $package_value['value'],
            'entry_date'=> date('Y-m-d H:i:s'),
            'remark' => 'FD pack'
        );
        
        $this->db->insert('e_wallet',$debit_data);
        
         $up_id = $this->userpack();
        
        $date_of_pay = date("Y-m-d H:i:s", strtotime(' + '.$package_value['days'].' days'));
        
        $package = array(
            'user_id'=> $user_id,
            'up_id' => $up_id,
            'package_id' => $package_value['id'],
            'amount'=> $package_value['value'],
            'recieve' =>  $package_value['percentage'],
            'recieve_date' =>  $date_of_pay,
            'entry_date'=> date('Y-m-d H:i:s')
        );
        
        $this->db->insert('user_fd_package',$package);
        
        
        
        $package_receive = array(
                    
            'username' => $user_id,
            'entry_date'=> $date_of_pay,
            'credit' => $package_value['percentage'],
            'remark' => 'FD Package',
            'description' => $up_id
            
            );
            
        $this->db->insert('account',$package_receive);
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
        
    }
    
    public function update_wallet($user_id="")
    {
        $this->db->trans_begin();
        
        $user_wallet_data=array(
            
             'wallet_address' => $this->input->post('wallet_address'),
             
        );
           
        $this->db->where('username',$user_id); 
        $this->db->update('user_role',$user_wallet_data);
        
        $history = array(
            
            'username' => $user_id,
            'entry_date' => date('Y-m-d H:i:s'),
            'address' => $this->input->post('wallet_address')
            
            );
            
        $this->db->insert('wallet_address',$history);
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
        
    }
    
    
    public function package_manage($user_id="")
    {
        $this->db->trans_begin();
        
        
        $investment = $this->db->select('investment')->where('username',$user_id)->get('user_role')->row()->investment+0;
        $total_income = $this->db->select_sum('credit')->where('username',$user_id)->get('account')->row()->credit+0;
        $ceiling = $investment*3;
        
         if($total_income >= $ceiling)
         {
            $this->db->set('status','Inactive');
            $this->db->where('user_id',$user_id);
            $this->db->where('status','Active');
            $this->db->update('user_package'); 
         }
        
        
        $package_value = $this->db->where('id',$this->input->post('package'))->get('package')->row_array();
        
        $debit_data = array(
            'user_id'=> $user_id,
            'debit'=> $package_value['value'],
            'entry_date'=> date('Y-m-d H:i:s')
        );
        
        $this->db->insert('e_wallet',$debit_data);
        
        //$this->check_active($user_id);
        
        $user_pack_check = $this->db->where('user_id',$user_id)->count_all_results('user_package')+0;
        
        if($user_pack_check == 0)
        {
            $this->db->set('investment', 'investment+'.$package_value['value'], FALSE);
            $this->db->set('active_date',date('Y-m-d H:i:s'));
            $this->db->where('username',$user_id);
            $result = $this->db->update('user_role');
        }else{
            $this->db->set('investment', 'investment+'.$package_value['value'], FALSE);
            $this->db->where('username',$user_id);
            $result = $this->db->update('user_role');
        }
        
        
        $up_id = $this->userpack();
        
        $package = array(
            'user_id'=> $user_id,
            'up_id' => $up_id,
            'package_id' => $package_value['id'],
            'amount'=> $package_value['value'],
            'percentage' =>  $package_value['percentage'],
            'entry_date'=> date('Y-m-d H:i:s')
        );
        
        $this->db->insert('user_package',$package);
        
        
        $this->db->set('investment', 'investment+'.$package_value['value'], FALSE);
        $this->db->where('child_id',$user_id);
        $resul = $this->db->update('tree');
        
        $direct_income = $this->db->select('reward')->where('type','direct income')->get('master')->row()->reward+0;
        $direct_divide = $this->db->select('reward')->where('type','edirect divide')->get('master')->row()->reward+0;
        $e_divide = $this->db->select('reward')->where('type','direct divide')->get('master')->row()->reward+0;
        
        $direct_amt =$package_value['value']*$direct_income/100;
        
        $ref = $this->db->select('ref_id')->where('username',$user_id)->get('user_role')->row()->ref_id;
        
        $user_invest=$this->db->select('investment')->where('username',$ref)->get('user_role')->row()->investment+0;
        $total_income = $this->db->select_sum('credit')->where('username',$ref)->get('account')->row()->credit+0;
        $ceiling = $user_invest*3;
        
        if($direct_amt > 0)
        {
            $payable = min(($ceiling-$total_income),$direct_amt);
            
            $direct_pay = $payable*$direct_divide/100;
            $ewallet = $payable*$e_divide/100;
            
            if($direct_pay > 0)
            {
                $give_direct = array(
                    
                    'username' => $ref,
                    'entry_date'=> date('Y-m-d H:i:s'),
                    'credit' => $direct_pay,
                    'remark' => 'Direct income',
                    'ewallet' => $ewallet,
                    'description' => $user_id
                    
                    );
                    
                $this->db->insert('account',$give_direct);
            }
            if($ewallet > 0){
                $credit_wallet = array(
                    'user_id'=> $ref,
                    'credit'=> $ewallet,
                    'entry_date'=> date('Y-m-d H:i:s'),
                    'remark' => 'Direct income',
                    'description' => $user_id
                );
                
                $this->db->insert('e_wallet',$credit_wallet);
            }
        }
        
        
        $this->pair_income($user_id,$this->input->post('package'));
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    
    // public function check_active($user=""){
        
    //     $investment = $this->db->select('investment')->where('username',$user)->get('user_role')->row()->investment+0;
        
    //     if($investment == 0){
            
    //         $left_tree =$this->db->select('child_id')->where('parent_id',$user)->where('position','left')->get('tree')->row()->child_id;
    //         $right_tree =$this->db->select('child_id')->where('parent_id',$user)->where('position','right')->get('tree')->row()->child_id;
            
    //         if($left_tree != "" && $right_tree != ""){
                
    //           $left_user_investment=$this->db->select('investment')->where('username',$left_tree)->get('user_role')->row()->investment+0;
    //           $right_user_investment=$this->db->select('investment')->where('username',$right_tree)->get('user_role')->row()->investment+0;
               
    //           if($left_user_investment > 0 && $right_user_investment > 0)
    //           {
    //               $left_count= $this->db->select('child_id')->like('team',$left_tree)->get('tree')->result_array();
    //               $left_team = array_column($left_count, 'child_id');
    //               array_unshift($left_team, $left_tree);
    //               $left_child_investment=$this->db->select_sum('investment')->where_in('username',$left_team)->get('user_role')->row()->investment+0; 
                  
    //               $right_user_investment=$this->db->select('investment')->where('username',$right_tree)->get('user_role')->row()->investment+0;
    //               $right_count=$this->db->select('child_id')->like('team',$right_tree)->get('tree')->result_array();
    //               $right_team = array_column($right_count, 'child_id');
    //               array_unshift($right_team, $right_tree);
    //               $right_child_investment=$this->db->select_sum('investment')->where_in('username',$right_team)->get('user_role')->row()->investment+0;
                  
                  
    //               if($left_child_investment <= $right_child_investment){
                      
    //                   $left_pair = $this->db->select_sum('left_pair')->where('username',$user)->get('account')->row()->left_pair+0;
                      
    //                   $lp = $left_child_investment - $left_pair;
                      
    //                   $account = array(
    //                         'username' => $user,
    //                         'left_pair' => $lp,
    //                         'entry_date' => date('Y-m-d H:i:s')
    //                         );
    //                   $this->db->insert('account',$account);
    //               }else if($right_child_investment < $left_child_investment){
                      
    //                  $right_pair = $this->db->select_sum('right_pair')->where('username',$user)->get('account')->row()->right_pair+0;
                     
    //                  $rp = $right_child_investment - $right_pair;
                      
    //                  $account = array(
    //                         'username' => $user,
    //                         'right_pair' => $rp,
    //                         'entry_date' => date('Y-m-d H:i:s')
    //                         );
    //                   $this->db->insert('account',$account); 
    //               }
                  
    //           }
                
    //         }
            
    //     }
    // }
    
    public function get_all_paired_users($child)
    {
       
        $users = array();
        $myteam = $this->get_all_parent_users('tree','child_id',$child,$res=array());
        $admin_id = $this->db->select('username')->where('user_role_id',1)->get("user_role")->row()->username; //log_message('error',"parent count : ".count($myteam));
        for ($i=0; $i < count($myteam) ; $i++) {
            if($myteam[$i] != $admin_id){
            log_message('error',$myteam[$i]);
            $binarypair = 0;
            $left_user_investment=0;
            $right_user_investment=0;
            $left_child_investment=0;
            $right_child_investment=0;
            $left_investment=0;
            $right_investment=0;
            $pair_match=0;
            $paidpair=0;
            $left_tree =$this->db->select('child_id')->where('parent_id',$myteam[$i])->where('position','left')->get('tree')->row()->child_id;
            $right_tree =$this->db->select('child_id')->where('parent_id',$myteam[$i])->where('position','right')->get('tree')->row()->child_id;
            //if($left_tree!="" && $right_tree!=""){
            
            if(!empty($left_tree) && !empty($right_tree)){
                 log_message('error',$child."user_idddd");
                $left_user_investment=$this->db->select('investment')->where('username',$left_tree)->get('user_role')->row()->investment+0;
                $left_count= $this->db->select('child_id')->like('team',$left_tree)->get('tree')->result_array();
                $left_team = array_column($left_count, 'child_id');
                array_unshift($left_team, $left_tree);
                $left_child_investment=$this->db->select_sum('investment')->where_in('username',$left_team)->get('user_role')->row()->investment+0; 
                //log_message('error',$this->db->last_query());
                $left_investment=$left_child_investment;
                
                $right_user_investment=$this->db->select('investment')->where('username',$right_tree)->get('user_role')->row()->investment+0;
                $right_count=$this->db->select('child_id')->like('team',$right_tree)->get('tree')->result_array();
                $right_team = array_column($right_count, 'child_id');
                array_unshift($right_team, $right_tree);
                $right_child_investment=$this->db->select_sum('investment')->where_in('username',$right_team)->get('user_role')->row()->investment+0;
                //log_message('error',$this->db->last_query());
                $right_investment=$right_child_investment;
                
                
                $left_pair = $this->db->select_sum('left_pair')->where('username',$myteam[$i])->get('account')->row()->left_pair+0;
                $right_pair = $this->db->select_sum('right_pair')->where('username',$myteam[$i])->get('account')->row()->right_pair+0;
                $left_binary_pair= $left_investment-$left_pair;
                $right_binary_pair= $right_investment-$right_pair;
                log_message('error',"username for pair".$myteam[$i]."left_investment".$left_investment."///right_investment".$right_investment."///binarypair".$binarypair." Paid Pair".$paid_pair);
                if($left_binary_pair > 0 || $right_binary_pair > 0){
                    log_message('error','got the data');
                $newdata = array('username'=>$myteam[$i] ,'left_pair'=>$left_binary_pair,'right_pair' => $right_binary_pair);
                    array_push($users,$newdata);
                }
            }
    
        }
        }
        //log_message('error',print_r($users));
        return $users;
        
    }
    
    
    public function pair_income($user="",$pack_id="")
    {
        
        log_message('error',"Pairrrr");
           $paired_users = $this->get_all_paired_users($user);
           foreach($paired_users as $x => $paired_user) {
       
            log_message('error',$paired_user['username']);
            
            $package_value = $this->db->where('id',$pack_id)->get('package')->row_array();
    
            //log_message("error", "pairout///".$pairout."max_income///".$max_income."total_income///".$total_income);
            
            $min_pay = min($paired_user['left_pair'],$paired_user['right_pair']);
           
           $binary_per = $this->db->select('reward')->where('type','binary income')->get('master')->row()->reward+0;
           
            $today_pay = ($min_pay*$binary_per)/100;
           
           // $pusers = $this->db->where('username', $paired_user['username'])->get('user_role')->row_array();
        
            $left_tree =$this->db->select('username')->where('investment >',0)->where('ref_id',$paired_user['username'])->where('position','left')->get('user_role')->row()->username;
            $right_tree =$this->db->select('username')->where('investment >',0)->where('ref_id',$paired_user['username'])->where('position','right')->get('user_role')->row()->username;
            
            if($left_tree != "")
            {
                $left_user_investment=$this->db->select('investment')->where('username',$left_tree)->get('user_role')->row()->investment+0;
            }else{
                $left_user_investment = 0;
            }
        
            if($right_tree != "")
            {
              $right_user_investment=$this->db->select('investment')->where('username',$right_tree)->get('user_role')->row()->investment+0;  
            }else{
              $right_user_investment = 0;
            }
             
            //  log_message('error',$left_user_investment." Left invest");
            //  log_message('error',$right_user_investment." Right invest");
              $user_invest=$this->db->select('investment')->where('username',$paired_user['username'])->get('user_role')->row()->investment+0;
                
                $pair_id = "";
                $remark = "";
                
                if($user_invest > 0){
                    log_message('error',"first condition");
                    if($left_user_investment > 0 && $right_user_investment > 0)
                    {
                        log_message('error',"second condition");
                       //log_message('error',$left_tree." lefttttt"); 
                           
                       $binary_days = $this->db->select('reward')->where('type','binary days')->get('master')->row()->reward+0;
                       $binary_divide = $this->db->select('reward')->where('type','ebinary divide')->get('master')->row()->reward+0;
                       $ewallet_divide = $this->db->select('reward')->where('type','binary divide')->get('master')->row()->reward+0;
                        
                        $total_income = $this->db->select_sum('credit')->where('username',$paired_user['username'])->get('account')->row()->credit+0;
                        $ceiling = $user_invest*3;
                        //$payable = min(($ceiling-$total_income),$today_pay);
                        
                       $daily_pay = $today_pay/$binary_days;
                        
                       $now_pay = ($daily_pay*$binary_divide)/100; 
                       $ewallet_pay = ($daily_pay*$ewallet_divide)/100;
                       
                        log_message('error',$daily_pay." daily_pay"); 
                        log_message('error',$binary_divide." binary_divide"); 
                        
                       $left_pair = $min_pay;
                       $right_pair = $min_pay;
                       
                       $pay_amount = $now_pay;
                       $ewallet = $ewallet_pay;
                       
                       $rd = rand(1,100);
                       
                       $pair_id = time().$rd;
                       $remark = 'Pair Income';
                       
                       if($ewallet > 0)
                       {
                            $credit_wallet = array(
                                'user_id'=> $paired_user['username'],
                                'credit'=> $ewallet,
                                'entry_date'=> date('Y-m-d H:i:s'),
                                'remark' => 'Pair income',
                            );
                            
                           $this->db->insert('e_wallet',$credit_wallet);
                       }
                       
                       $bal_days = $binary_days-1;
                      
                       if($daily_pay > 0) 
                       {
                           $daily_income = array(
                                'user_id'=> $paired_user['username'],
                                'amount'=> $daily_pay,
                                'total_days'=> $bal_days,
                                'pair_id' => $pair_id,
                                'entry_date' => date('Y-m-d H:i:s'),
                            );
                            
                            $this->db->insert('binary_pay',$daily_income);
                       }
                    }else{
                    log_message('error',"third condition");
                    
                    $left_ref = $this->db->select('username')->where('ref_id',$paired_user['username'])->where('position','left')->get('user_role')->row()->username;
                    $right_ref = $this->db->select('username')->where('ref_id',$paired_user['username'])->where('position','right')->get('user_role')->row()->username;
                        if($left_ref == "" || $right_ref == "")
                        {
                            log_message('error',"fourth condition");
                           log_message('error',$left_ref." lefttttt"); 
                           log_message('error',$right_ref." righttttt"); 
                           log_message('error',$paired_user['left_pair']." left Pairrrr"); 
                           log_message('error',$paired_user['right_pair']." right Pairrrr"); 
                            if($left_ref == "")
                            {
                                log_message('error',"fifth condition");
                                $left_pair = $paired_user['left_pair'];
                                $right_pair = 0;
                                $pay_amount = 0;
                                $ewallet = 0;
                            }else{
                                log_message('error',"sixth condition");
                                $left_pair = 0;
                                $right_pair = $paired_user['right_pair'];
                                $pay_amount = 0;
                                $ewallet = 0;
                            }
                            
                        }
                        else{
                            log_message('error',"seventh condition");
                         $inactive_child = $this->db->where('ref_id',$paired_user['username'])->where('investment',0)->get('user_role')->row_array();
                          
                          $in_users= $this->db->select('child_id')->like('team',$inactive_child['username'])->get('tree')->result_array();
                          $in_users_team = array_column($in_users, 'child_id');
                          array_unshift($in_users_team, $inactive_child['username']);
                          
                          $inactive_team_investment=$this->db->select_sum('investment')->where_in('username',$in_users_team)->get('user_role')->row()->investment+0; 
                          
                              if($inactive_child['position'] == 'left'){
                                    $left_pair = $this->db->select_sum('left_pair')->where('username',$paired_user['username'])->get('account')->row()->left_pair+0;
                                    $left_binary_pair = $inactive_team_investment - $left_pair;
                                
                                    $left_pair = $left_binary_pair;
                                    $right_pair = 0;
                                    $pay_amount = 0;
                                    $ewallet = 0;
                              }else if($inactive_child['position'] == 'right'){
                                  $right_pair = $this->db->select_sum('right_pair')->where('username',$paired_user['username'])->get('account')->row()->right_pair+0;
                                  $right_binary_pair = $inactive_team_investment - $right_pair;
                                  
                                $left_pair = 0;
                                $right_pair = $right_binary_pair;
                                $pay_amount = 0;
                                $ewallet = 0;
                              }
                        }
                    }
                
                }else{
                    log_message('error',"eight condition");
                   if($paired_user['left_pair'] < $paired_user['right_pair'])
                   {
                        $left_pair = $paired_user['left_pair'];
                        $right_pair = 0;
                        $pay_amount = 0;
                        $ewallet = 0;
                   }else{
                       $left_pair = 0;
                       $right_pair = $paired_user['right_pair'];
                       $pay_amount = 0;
                       $ewallet=0;
                   }  
                }
                
                $payable = min(($ceiling-$total_income),$pay_amount);
                log_message('error',$ceiling." ceiling"); 
                log_message('error',$total_income." total"); 
                log_message('error',$pay_amount." Pay"); 
                
                if($payable > 0)
                {
                    $amt = $payable;
                }else{
                    $amt = 0;
                }
                
                if($amt > 0 || $left_pair > 0 || $right_pair > 0)
                {
                    $account = array(
                        'username' => $paired_user['username'],
                        'credit'  => $amt,
                        'left_pair' => $left_pair,
                        'right_pair' => $right_pair,
                        'remark' => $remark,
                        'pair_id' => $pair_id,
                        'ewallet' => $ewallet,
                        'description' => $pair_id,
                        'entry_date' => date('Y-m-d H:i:s')
                        );
                    $this->db->insert('account',$account); 
                }
           
        } 
    }
    
    public function master()
    {
        $this->db->trans_begin();
        $data = array(
                'reward'=> $this->input->post('tds'),
        );
        $this->db->where('type','tds');
        $this->db->update('master',$data);
        $acdata = array(
                'reward'=> $this->input->post('ac'),
        );
        $this->db->where('type','ac');
        $this->db->update('master',$acdata);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function share_pin()
    {
        $this->db->trans_begin();
        $data['user_id']= $this->input->post('userid');
        $data['share_status']= 'Shared';
        $this->db->where('main_id',$this->input->post('pinvalue'));
        $this->db->update('generate_pin',$data);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();

            return true;
        }
    }
    
    public function profile_update()
    {
        $this->db->trans_begin();
        
        $data['first_name']= $this->input->post('first_name');
        $data['last_name']= $this->input->post('last_name');
        $data['email']= $this->input->post('email');
        $data['mobile_no']= $this->input->post('mobile_no');
        $data['country']= $this->input->post('country');
        
        log_message('error',$this->input->post('username'));
        $this->db->where('username',$this->input->post('username'));
        $this->db->update('user_role',$data);
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();

            return true;
        }
    }
    
public function earningtoewallet()
    {
        $this->db->trans_begin();
        $data = array(
                'username'=> $this->session->userdata('micusername'),
                'entry_date'=> date('Y-m-d H:i:s'),
                'debit'=> $this->input->post('amount'),
                'remark'=> 'WTE'
        );
        $this->db->insert('account',$data);
        $dataa = array(
                'user_id'=> $this->session->userdata('micusername'),
                'entry_date'=> date('Y-m-d H:i:s'),
                'credit'=> $this->input->post('amount'),
                'remark'=> 'WTE'
        );
        $this->db->insert('e_wallet',$dataa);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    
    public function peertopeer()
    {
        $this->db->trans_begin();
        $data = array(
                'user_id'=> $this->session->userdata('micusername'),
                'entry_date'=> date('Y-m-d H:i:s'),
                'debit'=> $this->input->post('amount'),
                'description'=> $this->input->post('user_id'),
                'remark'=> 'PTP debit'
        );
        $this->db->insert('e_wallet',$data);
        $dataa = array(
                'user_id'=> $this->input->post('user_id'),
                'entry_date'=> date('Y-m-d H:i:s'),
                'credit'=> $this->input->post('amount'),
                'description'=> $this->session->userdata('micusername'),
                'remark'=> 'PTP credit'
        );
        $this->db->insert('e_wallet',$dataa);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    
    public function save_message() 
 {
      $data = array
      (
          'sender_id' => $this->input->post('sender'),
           'receiver_id' =>$this->input->post('receiver'),
           'type' =>'send',
           'status' =>'unread',
           'user_type' =>'u',
         'send' => $this->input->post('message'),
         'date' => date('Y-m-d H:i:s')
      );
      $this->db->insert('chat_messages',$data);

//log_message('error',$this->input->post('sender')."ass");
       $d = array
      (
          'sender_id' => $this->input->post('receiver'),
           'type' =>'receive',
          // 'receiver_id' =>$this->input->post('receiver'),
         'receive_msg' => $this->input->post('message'),
         'date' => date('Y-m-d H:i:s')
      );
      $this->db->insert('chat_messages',$d);
   }

 public function save_messages() 
 {
      $data = array
      (
          'sender_id' => $this->input->post('sender'),
           'receiver_id' =>$this->input->post('receiver'),
           'type' =>'send',
           'user_type' =>'a',
         'send' => $this->input->post('message'),
         'date' => date('Y-m-d H:i:s')
      );
      $this->db->insert('chat_messages',$data);

//log_message('error',$this->input->post('sender')."ass");
       $d = array
      (
          'sender_id' => $this->input->post('receiver'),
           'type' =>'receive',
          // 'receiver_id' =>$this->input->post('receiver'),
         'receive_msg' => $this->input->post('message'),
         'date' => date('Y-m-d H:i:s')
      );
      $this->db->insert('chat_messages',$d);
   }
    
     public function approve_pin_request()
    {

        $this->db->trans_begin();
        
        $pass = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

        $pininsert = $this->db->where('id', $this->input->post('accept'))->get('pin_request')->row_array();

        $baccept_data=array(
            'status'=>'Accepted',
            'end_date'=>date('Y-m-d H:i:s')
        );
        
        $this->db->where('id',$this->input->post('accept'));
        $this->db->update('pin_request',$baccept_data);
        
        $pin_data=array(
            'status'=>'Unused',
            'pin' => $pass,
            'gen_date'=>date('Y-m-d H:i:s'),
           
            
        );

        
        $this->db->insert('e_pin',$pin_data);

        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;

        }
    }
        public function reject_pin_request()
    {
        $this->db->trans_begin();

        $breject_data=array(
            'status'=>'Rejected',
            'remark'=>$this->input->post('remark'),
            'end_date'=>date('Y-m-d H:i:s'),

        );
        $this->db->where('id',$this->input->post('accept'));
        $this->db->update('pin_request',$breject_data);

        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
// return true;
        }
    }
    
    public function add_product_details($img_name)
    {
        $this->db->trans_begin();

        $data['pro_id'] = "YOP".rand(111111,999999);
        $data['image'] = $img_name;
        $data['product_code']= $this->input->post('product_code');
        $data['title']= $this->input->post('title');
        $data['description']= $this->input->post('description');
        $data['dpprice']= $this->input->post('dpprice');
        $data['mrpprice']= $this->input->post('mrpprice');
        $data['stock']= $this->input->post('stock');
        $data['package'] = $this->input->post('package');
        
      
        $this->db->insert('add_product',$data);
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
            } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        } 
    }



    public function product_update()
    {  
        $this->db->trans_begin();
      
        $data['image'] = $this->input->post('pimage');
        $data['title']= $this->input->post('title');
        $data['description']= $this->input->post('description');
        $data['product_code']= $this->input->post('product_code');
        $data['dpprice']= $this->input->post('dpprice');
        $data['mrpprice']= $this->input->post('mrpprice');
        $data['stock']= $this->input->post('stock');
        $data['package']= $this->input->post('package');
        
        $this->db->where('id',$this->input->post('id'))->update('add_product',$data);
        
         if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
            } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        } 
    }
    
       public function update_kyc()
    {
      $this->db->trans_begin();
            $kyc_data= array(
                'aadhar_num' => $this->input->post('aadhar'),
                'pan_num' => $this->input->post('pan'),
                // 'aadhar_img' => $this->input->post('kycimage'),
                // 'pan_img' => $this->input->post('panimage')
                );
            $this->db->where('id',$this->input->post('userid'));
            $this->db->update('kyc_details',$kyc_data);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
            } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }   
    }
    
    
     public function update_account()
    {
      $this->db->trans_begin();
            $account_data= array(
                'acnt_hldr_name' => $this->input->post('acc_name'),
                'acnt_num' => $this->input->post('acc_no'),
                'confirm_acnt_num' => $this->input->post('cacc_no'),
                'bank_ifsc' => $this->input->post('acc_ifsc'),
                'phone_num' => $this->input->post('phnum'),
                'bank_name' => $this->input->post('acc_bank'),
                'bank_branch' => $this->input->post('acc_branch'),
                'g_pay' => $this->input->post('gpay'),
                'phone_pay' => $this->input->post('phonepe')
                );
            $this->db->where('id',$this->input->post('userid'));
            $this->db->update('account_details',$account_data);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
            } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }   
    }
    
    public function update_password()
    {
      $this->db->trans_begin();
            $pass_data['pwd']= sha1($this->input->post('newpass'));
            $pass_data['pwd_hint']= $this->input->post('newpass');
            $this->db->where('username',$this->session->userdata('micusername'));
            $this->db->update('user_role',$pass_data);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }   
    }
    
 public function update_tpassword()
    {
      $this->db->trans_begin();
            $pass_data['tpwd']= $this->input->post('newpass');
            $this->db->where('username',$this->session->userdata('micusername'));
            $this->db->update('user_role',$pass_data);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }   
    }
    
     public function forgot_otp($id="")
    {
         $otp = rand(1000,9999);
        // log_message('error',$id);
        $this->db->set('otp',$otp);
        $this->db->set('otp_time',date('Y-m-d H:i:s'));
        $this->db->where('email',$id);
        $this->db->update('user_role');
        
        $mail = $id;
        
        $from_email='noreply@backofficee.com';
        $from_name='MICX';
        $to_email = $mail;
        $subject_email = 'MICX OTP';
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
        $this->email->send();
   
     }
    
    public function update_profile()
    {
      $this->db->trans_begin();
            $profile_data= array(
                'first_name' => $this->input->post('name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'mobile_no' => $this->input->post('mobile'),
                'country' => $this->input->post('country'),
                );
            $this->db->where('username',$this->session->userdata('micusername'));
            $this->db->update('user_role',$profile_data);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }   
    }
    
     
    public function add_wallet()
    {
      $this->db->trans_begin();
      
        if($this->input->post('type') == "Credit")
        {
            $add_amount = array(
                'user_id' => $this->input->post('username'),
                'credit' => $this->input->post('amount'),
                'entry_date' => date("Y-m-d H:i:s"),
                'remark' => "Added by admin"
                );
           
        }else{
            $add_amount= array(
                'user_id' => $this->input->post('username'),
                'debit' => $this->input->post('amount'),
                'entry_date' => date("Y-m-d H:i:s"),
                'remark' => "Deducted by admin"
                );

        }
        
         $this->db->insert('e_wallet',$add_amount); 
         
         $history = array(
                'user_id' => $this->input->post('username'),
                'amount' => $this->input->post('amount'),
                'entry_date' => date("Y-m-d H:i:s"),
                'type' => $this->input->post('type')
            );
         
         $this->db->insert('wallet_history',$history);
         
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }   
    }
    
  public function reject_kyc_request()
    {
        $this->db->trans_begin();
            
            $kaccept_data=array(
                'status'=>'Rejected',
                'remark'=>$this->input->post('remark'),
                'end_date'=>date('Y-m-d H:i:s')
                );
            $this->db->where('id',$this->input->post('kid'));
            $this->db->update('kyc_details',$kaccept_data);
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;;
        }
    }
        public function pay_user()
    {
          $this->db->trans_begin();
           $balance= $this->db->select('sum(credit - debit) as balance')->where('username',$this->input->post('pay'))->get('account')->row()->balance+0;
            $kaccept_data=array(
                'pay_status'=>'Paid',
                'paid_date'=>date('Y-m-d H:i:s'),
                'debit' =>$balance,
                'username' => $this->input->post('pay'),
                );
        
            $this->db->insert('account',$kaccept_data);
            
            $tdscharge=$this->db->select('reward')->where('type','tds')->get('master')->row()->reward;
            $admincharge=$this->db->select('reward')->where('type','ac')->get('master')->row()->reward;
            
            $ans=($balance*$tdscharge)/100;
             $and=($balance*$admincharge)/100;
             
             $vrr=($balance-$ans)-$and;
            $pay_data=array(
                'pay_status'=>'Paid',
                'paid_date'=>date('Y-m-d H:i:s'),
                'debit' =>$balance,
                'tds' =>$ans,
                'ac' =>$and,
                'actual_pay' =>$vrr,
                'username' => $this->input->post('pay'),
                );
            $this->db->insert('payout',$pay_data);
            
            $this->db->set('pay_status','Paid')->where('username',$this->input->post('pay'));
            $this->db->update('account');
            
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    
    public function approve_kyc_request()
    {
          $this->db->trans_begin();
            $kaccept_data=array(
                'status'=>'Accepted',
                'end_date'=>date('Y-m-d H:i:s')
                );
            $this->db->where('id',$this->input->post('kid'));
            $this->db->update('kyc_details',$kaccept_data);
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }
    }
    
    public function approve_bank_request()
    {
        $this->db->trans_begin();
            $baccept_data=array(
                'status'=>'Accepted',
                'end_date'=>date('Y-m-d H:i:s')
                );
            $this->db->where('id',$this->input->post('bkreq'));
            $this->db->update('account_details',$baccept_data);
            
        $bank_details = $this->db->where('id',$this->input->post('bkreq'))->get('account_details')->row_array();
        
        $update = array(
            'acc_no' => $bank_details['acnt_num'],
            'acc_name' => $bank_details['acnt_hldr_name'],
            'acc_ifsc' => $bank_details['bank_ifsc'],
            'acc_bank' => $bank_details['bank_name'],
            'acc_branch' => $bank_details['bank_branch'],
            'gpay' => $bank_details['g_pay'],
            'phnpay' => $bank_details['phone_pay'],
            );
            
        $this->db->where('username',$bank_details['username']);
        $this->db->update('user_role',$update);
            
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }
    }
    
    public function reject_bank_request()
    {
        $this->db->trans_begin();
            
            $baccept_data=array(
                'status'=>'Rejected',
                'remark'=>$this->input->post('remark'),
                'end_date'=>date('Y-m-d H:i:s')
                );
            $this->db->where('id',$this->input->post('bkreq'));
            $this->db->update('account_details',$baccept_data);
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }
    }
    
     public function approve_profile_request()
    {
        $this->db->trans_begin();
            $approve_data=array(
                'profile_update_status'=>'Accepted',
                'approve_date'=>date('Y-m-d H:i:s')
                );
            $this->db->where('user_role_id',$this->input->post('hids'));
            $this->db->update('profile_request',$approve_data);
            
            $updatepro =$this->db->where('user_role_id',$this->input->post('hids'))->get('profile_request')->row_array();
                $approvepro=array(
                'name' =>  $updatepro['name'],
                'dob' => $updatepro['dob'],
                'gender' => $updatepro['gender'],
                'phone' => $updatepro['phone_no'],
                'email' => $updatepro['email'],
                'door' => $updatepro['door'],
                'street' => $updatepro['street'],
                'city' => $updatepro['city'],
                'district' => $updatepro['district'],
                'country' => $updatepro['country'],
                'pin' => $updatepro['pin']
                );
            $this->db->where('username',$updatepro['username']);
            $this->db->update('user_role',$approvepro);
            
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
            // return true;
        }
    }
    
     public function reject_profile_request()
    {
        $this->db->trans_begin();
            
            $reject_data=array(
                'profile_update_status'=>'Rejected',
                'remark'=>$this->input->post('remark'),
                'end_date'=>date('Y-m-d H:i:s')
                );
            $this->db->where('user_role_id',$this->input->post('hids'));
            $this->db->update('user_role',$reject_data);
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }
    }
    
      public function view_admin_approve()
    {
         $this->db->trans_begin();
        
        $approve = array(
        );
        
        $this->db->insert('admin_request',$approve);
        
          if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return $values;
            // return true;
        }
    }
  
    public function login($username,$password)
    {
        log_message('error',$username);
        log_message('error',sha1($password));
        $this->db->where('username',$username);
        $this->db->where('pwd',sha1($password));
        $details = $this->db->get('user_role')->row_array();
        if (!empty($details)) {
            return $details;
        } else {
            return false;
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
    
    public function update_forgotpassword()
    {
        $this->db->trans_begin();
            
            $data['pwd_hint']=$this->input->post('password');
            $this->db->where('username',$this->input->post('username'));
            $this->db->update('user_role',$data);
        
        if($this->db->trans_status() == FALSE){
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            
            return true;
            // return true;
        }
    }
    
    
// public function add_product_details($img_name)
//     {   
//         $data['image'] = $img_name;
//         $data['title']= $this->input->post('title');
//         $data['description']= $this->input->post('description');
//         $data['dpprice']= $this->input->post('dpprice');
//         $data['mrpprice']= $this->input->post('mrpprice');
//         $data['protype']= $this->input->post('protype');
//         // $data['vendor']= $this->input->post('vendor');
//         $data['protag']= $this->input->post('protag');
//         $data['levelone']= $this->input->post('levelone');
//         $data['leveltwo']= $this->input->post('leveltwo');
//         $data['levelthree']= $this->input->post('levelthree');
//         $data['levelfour']= $this->input->post('levelfour');
//         $data['levelfive']= $this->input->post('levelfive');
//         $data['levelsix']= $this->input->post('levelsix');
//         $data['levelseven']= $this->input->post('levelseven');
       
//         $this->db->insert('add_product',$data);
//       log_message('error',$data.'//');
//         return true;
//     }

    
}
//     public function reject_pin_request()
//     {
//         $this->db->trans_begin();

//         $breject_data=array(
//             'status'=>'Rejected',
//             'remark'=>$this->input->post('remark'),
//             'end_date'=>date('Y-m-d H:i:s'),

//         );
//         $this->db->where('id',$this->input->post('accept'));
//         $this->db->update('generate_pin',$breject_data);

//         if($this->db->trans_status() == FALSE){
//             $this->db->trans_rollback();
//             return false;
//         } else {
//             $this->db->trans_commit();

//             return true;
// // return true;
//         }
//     }


//     public function approve_pin_request()
//     {

//         $this->db->trans_begin();
        
//         $pass = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

//         $pininsert = $this->db->where('id', $this->input->post('accept'))->get('generate_pin')->row_array();

//         $baccept_data=array(
//             'status'=>'Accepted',
//             'end_date'=>date('Y-m-d H:i:s')
//         );
        
//         $this->db->where('id',$this->input->post('accept'));
//         $this->db->update('generate_pin',$baccept_data);
        
//         $pin_data=array(
//             'status'=>'Unused',
//             'user_id' => $pininsert['user_id'],
//             'pin' => $pass,
//             'gen_date'=>date('Y-m-d H:i:s'),
//             'pin_value'=> $pininsert['pin_value'],
//             'pro_id'=> $pininsert['pro_id']
//         );

        
//         $this->db->insert('e_pin',$pin_data);

//         if($this->db->trans_status() == FALSE){
//             $this->db->trans_rollback();
//             return false;
//         } else {
//             $this->db->trans_commit();

//             return true;
// // return true;
//         }
//     }
    

?>
