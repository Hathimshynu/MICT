<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model {

    //////// Add request 


    ////approval for users


    public function bank_approve()
    {
        $this->db->trans_start();

        $bank_request = $this->get_row_data('bank_request','bank_request_id',$this->input->post('hids'));

        $bankdata = array(

            'acc_name' => $bank_request['acc_name'],
            'acc_no' => $bank_request['acc_no'],
            'acc_branch' => $bank_request['acc_branch'],
            'acc_bank' => $bank_request['acc_bank'],
            'acc_ifsc' => $bank_request['acc_ifsc'],
            'cfile' => $bank_request['cfile'],
            'status' => 'Verified'
        );
        $this->db->where('user_id',$bank_request['user_id']);
        $this->db->update('bank', $bankdata);


        $this->db->where('bank_request_id',$this->input->post('hids'));
        $this->db->update('bank_request',array('status' => 'Accepted'));


        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }


    public function kyc_approve()
    {
        $this->db->trans_start();

        $kyc_request = $this->get_row_data('kyc_request','kyc_request_id',$this->input->post('hids'));

        $kycdata = array(
            'aadhar' => $kyc_request['aadhar'],
            'pan' => $kyc_request['pan'],
            'afile' => $kyc_request['afile'],
            'pfile' => $kyc_request['pfile']
        );
        $this->db->where('user_id',$kyc_request['user_id']);
        $this->db->update('kyc', $kycdata);


        $this->db->where('kyc_request_id',$this->input->post('hids'));
        $this->db->update('kyc_request',array('status' => 'Accepted'));


        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }


    public function user_aprroval($id='')
    {
        $this->db->trans_start();
        $remark = $this->input->post('remark');
        $epinr = $this->get_row_data('admin_request','admin_request_id',$id);
        
        $user_detail = $this->get_row_data('user_role','user_role_id',$epinr['user_id']);
        $appro_date = date('Y-m-d');

        if ($this->db->where('status','Accepted')->where('user_id',$epinr['user_id'])->count_all_results('admin_request')+0== 0) {
            $data_tree['parent_id'] = $user_detail['ref_id'];
            $data_tree['child_id'] = $epinr['user_id'];
            $data_tree['entry_date'] = date('Y-m-d');
            $this->db->insert('tree',$data_tree);
        }
        
        
                        
                       
        $parentacc = $this->get_all_parent('tree',$epinr['user_id'],$res=array());
        for ($i=0; $i < min(6,count($parentacc)); $i++) { 
            $master = $this->db->get_where('master',array('level'=>($i+1),'type'=>'REF'))->row_array();
            $level = ($epinr['wallet_value']*$master['rewards'])/100;
            $ref_count = $this->db->where('ref_id',$parentacc[$i])->count_all_results('user_role')+0;
            if($parentacc[$i] != "" && $ref_count >= $master['criteria']){
                $dataearn = array(
                    'user_id' => $parentacc[$i],
                    'credit' => $level,
                    'balance' => $level+($this->db->order_by('account_id',"DESC")->limit(1)->get('account')->row()->balance+0),
                    'entry_date'=> date('Y-m-d'),
                    'remark' => "Level",
                    'description' => 'Level'.($i+1));
                $this->db->insert('account', $dataearn);
            }
        }                
        
        $roi = $this->db->select('rewards')->where('type','ROI')->where('criteria',$epinr['type'])->get('master')->row()->rewards+0;
        switch ($epinr['type']) {
          case 'Daily':
            $roi = ($epinr['wallet_value']*$roi)/100;
            for ($x = 25; $x <= 325; $x++) {
                $data_roi['user_id'] = $epinr['user_id'];
                $data_roi['amount'] = $roi;
                $data_roi['roi_date'] = date("Y-m-d", strtotime("+".$x." day"));
                $data_roi['inves_id'] = $id;
                $this->db->insert('roi',$data_roi);
            }
            break;
          case 'Six Months':
            $roi = $epinr['wallet_value'];
            $data_roi['user_id'] = $epinr['user_id'];
            $data_roi['amount'] = $roi;
            $data_roi['roi_date'] = date("Y-m-d", strtotime("+150 day"));
            $data_roi['inves_id'] = $id;
            $this->db->insert('roi',$data_roi);
            $data_roi['user_id'] = $epinr['user_id'];
            $data_roi['amount'] = $roi;
            $data_roi['roi_date'] = date("Y-m-d", strtotime("+300 day"));
            $data_roi['inves_id'] = $id;
            $this->db->insert('roi',$data_roi);
            break;
        }
        
        $this->db->where('user_id',$epinr['user_id']);
        $this->db->update('admin_request',array('status'=>'Accepted','approve_date'=>$appro_date));
        log_message('error',$this->db->last_query());

        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }
    

    public function add_admin_request($user_id)
    {
        $data['user_id'] = $user_id;
        $data['wallet_value'] = $this->input->post('amount');
        $data['pay_mode'] = $this->input->post('pay_mode');
        $data['filename'] = $this->input->post('receiptimage');
        $data['utr'] = $this->input->post('utr');
        $data['type'] = $this->input->post('type');
        $data['ref_id'] = $this->db->select('ref_id')->where('user_role_id',$user_id)->get('user_role')->row()->ref_id;
        
        $data['status'] = "Request";
        $data['entry_date'] = date("Y-m-d");
        $this->db->insert('admin_request',$data);

        return true;
    }



    public function register_manage()
    {
        $this->db->trans_start();

        $userdata = array(
            'username' => $this->input->post('username'),
            'ref_id' => $this->db->select('user_role_id')->where('username',$this->input->post('ref_id'))->get('user_role')->row()->user_role_id,
            'pwd' => sha1($this->input->post('cp')),
            'user_type' => 'u',
            'rank' => 'Agent',
            'user_id' => $this->randuser(),
            'entry_date' =>date("Y-m-d")
        );
        $this->db->insert('user_role', $userdata);
        log_message("error", $this->db->last_query());
        $child_id = $this->db->insert_id();
        $profile_data  =  array(
        'profile_id' => $child_id,   
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('phone'),
        'entry_date' =>date("Y-m-d")
        );
        $this->db->insert('profile', $profile_data);
        $this->db->insert('bank', array('user_id' => $child_id));
        $this->db->insert('kyc', array('user_id' => $child_id));
        log_message("error", $this->db->last_query());
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }

    public function randuser()
    {
        $uscode = "MAC".rand (1000000 , 9999999);
        $query = $this->db->get_where('user_role', array('username' => $uscode))->row_array();
        if (!empty($query)) {
            $this->randuser("MAC".rand (1000000 , 9999999));
        }
        return $uscode;
    }


    public function login($username='',$password='')
    {
        $this->db->where('username',$username);
        $this->db->where('pwd',sha1($password));
        $details = $this->db->get('user_role')->row_array();
        if (!empty($details)) {
            return $details;
        } else {
            return false;
        }

    }

    public function insert_data($tablename, $data) {
        $this->db->insert($tablename, $data);
        return $this->db->insert_id();
    }

    public function update_rowdata($tablename, $where, $value,$data) {
        $this->db->where($where, $value)->update($tablename, $data);
        return true;
    }

    public function get_tabledata($tablename,$where=FALSE,$value=FALSE)
    {
        if ($where!=FALSE && $value!=FALSE) {
            $this->db->where($where, $value);
        }
        $tabledata = $this->db->get($tablename)->result_array();
        return $tabledata;
    }

    public function delete_rowdata($tablename, $where, $value = FALSE) {
        $this->db->where($where, $value)->delete($tablename);
        return true;
    }

    public function get_row_data($tablename, $where, $value = FALSE) 
    {

        $rowdata = $this->db->where($where, $value)->get($tablename)->row_array();
////log_message("error",$this->db->last_query());
        return $rowdata;
    }

    public function get_tabledata_by_id($tablename, $where, $value) 
    {
        $this->db->order_by($where, "desc");
        $rowdata = $this->db->where($where, $value)->get($tablename)->result_array();
        return $rowdata;
    }

    public function table_count($tablename, $where = FALSE, $value = FALSE)
    {
        if ($where !== FALSE && $value !== FALSE) {
            $this->db->where($where, $value);
        }
        $count = $this->db->get($tablename)->result_array();
        return count($count);
    }

    public function select_colum_where($table, $columnd, $column, $search)
    {
        $this->db->select($columnd);
        $this->db->from($table);
        $this->db->where($column, $search);
        $query = $this->db->get();
        return $query->result_array();
    }






















    public function getparentatlevel($tree,$parent,$level,$list_child) 
    {

        $resultccc = $this->db->where('parent_id', $parent)->order_by('position', 'ASC')->get($tree)->result_array();
        foreach ($resultccc as $key => $value) {
            $list_child[]=array($level=>$value['child_id']);
            if(count($resultccc) >= 0)
            {
                $list_child=$this->getparentatlevel($tree,$value['child_id'],$level+1,$list_child);
            }
        }
        return $list_child;
    }



    public function get_all_parent($tree, $catId,$raws)
    {
        $roi_users = $this->db->where('child_id',$catId)->get($tree)->result_array();
        foreach ($roi_users as $key => $value)
        {
            array_push($raws,$value['parent_id']);
            $raws = $this->get_all_parent($tree, $value['parent_id'],$raws);
        }
        return $raws;
    }

    

    

    public function countChildrenxx($tree, $parentId, $Nlevel = 0, $legPosition = 0, $tempLevel = 0)
    {
        if ($Nlevel) {
            if ($tempLevel < $Nlevel) {
                $tempLevel = $tempLevel + 1;
                if ($tempLevel == 1 && $legPosition) {
                    $children =$this->db->where('parent_id', $parentId)->where('position', $legPosition)->get($tree)->result_array();
                } else {
                    $children = $this->db->where('parent_id', $parentId)->get($tree)->result_array();
                }

                foreach ($children as $key => $userId) {
                    $count = $userId['child_id'];
                    $this->countChildrenxx($tree, $userId['child_id'], $Nlevel, $legPosition, $tempLevel);
                }
                return $count;
            }
        } 
    }


    

    


    


    /////Registration

    

    ////add wallet request


    public function add_pin_request($user_id,$filename)
    {
        $user = $this->get_row_data('user','user_id',$user_id);
        $data['user_id'] = $user['user_id'];
        $data['wallet_value'] = $this->input->post('pin_value');
        $data['pay_mode'] = $this->input->post('pay_mode');
        //$data['pay_type'] = $this->input->post('pay_type');
        $data['filename'] = $this->input->post('receiptimage');
        $data['utr'] = $this->input->post('utr');
        //$data['remark'] = $this->input->post('remark');
        $data['status'] = "Request";
        $data['entry_date'] = date("Y-m-d");
        $this->db->insert('wallet_request',$data);
        $epin_data['wallet_value'] = $this->input->post('pin_value');

        return true;
    }

    public function genroi_payout()
    {
        $roi_users = $this->db->where('status!=','Zero')->get('topup')->result_array();
        foreach ($roi_users as $key => $value) {
            $roi_user = $this->db->where('user_id',$value['user_id'])->count_all_results('roi');
            if ($roi_user == 0) {
                $user = $this->db->where('user_id',$value['user_id'])->get('user')->row_array();
                switch ($user['roi']) {
                    case "15 Days":
                    for ($i=15; $i < 600 ; $i+=15) { 
                        $datapp['amount'] = ($value['topup_amount']*$user['roi_pres'])/100;
                        $datapp['user_id'] = $value['user_id'];
                        $datapp['s_date'] = date("Y-m-d", strtotime("+".$i." days", strtotime($value['topup_date'])));
                        $this->db->insert('roi',$datapp);
                    ////log_message("error", $this->db->last_query());
                    }
                    break;
                    case "30 Days":
                    for ($i=30; $i <= 600 ; $i+=30) { 
                        $datapp['amount'] = ($value['topup_amount']*$user['roi_pres'])/100;
                        $datapp['user_id'] = $value['user_id'];
                        $datapp['s_date'] = date("Y-m-d", strtotime("+".$i." days", strtotime($value['topup_date'])));
                        $this->db->insert('roi',$datapp);
                    ////log_message("error", $this->db->last_query());
                    }
                    break;
                    case "2 Months":
                    for ($i=60; $i <= 600 ; $i+=60) { 
                        $datapp['amount'] = ($value['topup_amount']*$user['roi_pres'])/100;
                        $datapp['user_id'] = $value['user_id'];
                        $datapp['s_date'] = date("Y-m-d", strtotime("+".$i." days", strtotime($value['topup_date'])));
                        $this->db->insert('roi',$datapp);
                    ////log_message("error", $this->db->last_query());
                    }
                    break;
                    case "4 Months":
                    for ($i=120; $i <= 600 ; $i+=120) { 
                        $datapp['amount'] = ($value['topup_amount']*$user['roi_pres'])/100;
                        $datapp['user_id'] = $value['user_id'];
                        $datapp['s_date'] = date("Y-m-d", strtotime("+".$i." days", strtotime($value['topup_date'])));
                        $this->db->insert('roi',$datapp);
                    ////log_message("error", $this->db->last_query());
                    }
                    break;
                    case "10 Months":
                    for ($i=300; $i <= 600 ; $i+=300) { 
                        $datapp['amount'] = ($value['topup_amount']*$user['roi_pres'])/100;
                        $datapp['user_id'] = $value['user_id'];
                        $datapp['s_date'] = date("Y-m-d", strtotime("+".$i." days", strtotime($value['topup_date'])));
                        $this->db->insert('roi',$datapp);
                    ////log_message("error", $this->db->last_query());
                    }
                    break;
                    default:
                    $datapp['amount'] = ($value['topup_amount']*$user['roi_pres'])/100;
                    $datapp['user_id'] = $value['user_id'];
                    $datapp['s_date'] = date("Y-m-d", strtotime("+600 days", strtotime($value['topup_date'])));
                    $this->db->insert('roi',$datapp);
                    ////log_message("error", $this->db->last_query());

                }

            }
        }

    }






    public function get_userdetails($userid='',$column='')
    {
        $result = $this->get_row_data('user','user_id',$userid);
        return $result[$column];
    }


    public function add_wallet_request($user_id,$filename)
    {
        $user = $this->get_row_data('user','user_id',$user_id);

        $data['user_id'] = $user['user_id'];
        $data['wallet_value'] = $this->input->post('pin_value');
        $data['pay_mode'] = $this->input->post('pay_mode');
        $data['filename'] = $this->input->post('receiptimage');
        $data['utr'] = $this->input->post('utr');
        
        $data['status'] = "Request";
        $data['date'] = date("Y-m-d");
        $this->db->insert('wallet_request',$data);

        return true;
    }

    public function add_wallet_transfer($user_id,$filename)
    {
		$username = $this->admin->get_row_data('user','user_id',$user_id);
        $data['amount'] = $this->input->post('pin_value');
        $data['sender_name'] = $username['username'];
        $data['sender_id'] = $username['user_id'];
        $data['user_id'] = $this->input->post('placement_id');
        $data['username'] = $this->input->post('pname');
        $data['date'] = date("Y-m-d");
        $this->db->insert('wallet_transfer',$data);
        
        return true;
    }
    public function add_withdraw_request($user_id)
    {
        $user = $this->get_row_data('user_role','user_role_id',$user_id);

        $data['user_id'] = $user_id;
        $data['amount'] = $this->input->post('amount');
        $data['status'] = "Request";
        $data['date'] = date("Y-m-d H:i:s");
        $this->db->insert('withdraw_request',$data);

        return true;
    }





    public function add_referral($user_id)
    {

        $ref_id =  $this->db->select('user_id')->where('username',$user_id)->get('user')->row()->user_id;
        $data['name'] = $this->input->post('name');
        $data['usertype'] = "u";
        $data['phone'] = $this->input->post('number');
        $data['email'] = $this->input->post('email');
        $data['package'] = $this->input->post('j_amount');
        $data['join_date'] = (date('Y-m-d'));
        $data['ref_id'] = $ref_id;
        $data['plid'] = $ref_id;
        $data['level'] = 'New';
        $data['username'] = $this->input->post('username');
        $data['password'] = sha1($this->input->post('p'));
        $data['p'] = $this->input->post('p');


        if($this->db->where('username',$this->input->post('username'))->count_all_results('user') == 0)
        {
            $this->db->insert('user',$data);
            $child_id = $this->db->insert_id();
            $pindata = array(
                'user_id' => $child_id,
                'wallet_value' => 0,
                'date' => date('Y-m-d')
            );

            $this->db->insert('wallet', $pindata);
            return true;
        }
        else
            return false;
    }

    public function add_customer($user_id, $filename)
    {

        $placement_id =  $this->db->select('user_id')->where('username',$this->input->post('placement_id'))->get('user')->row()->user_id;
//log_message("error", $this->db->last_query());

        $data['name'] = $this->input->post('name');
        $data['usertype'] = "u";
        $data['phone'] = $this->input->post('number');
        $data['email'] = $this->input->post('email');
        $data['package'] = $this->input->post('j_amount');                           
        $data['join_date'] = (date('Y-m-d'));
        $data['ref_id'] = $userid;
        $data['plid'] = $placement_id;
        if($this->input->post('amountcheck') == 'Yes')
        $data['level'] = 'New';
        else
        $data['level'] = 'Agent';
        $data['username'] = $this->input->post('username');
        $data['password'] = sha1($this->input->post('p'));
        $data['p'] = $this->input->post('p');


        $this->db->trans_start();

        $this->db->insert('user',$data);

////log_message("error", $this->db->last_query());

        $child_id = $this->db->insert_id();

        $pindata = array(
            'user_id' => $child_id,
            'wallet_value' => 0,
            'date' => date('Y-m-d')
        );

        $this->db->insert('wallet', $pindata);
        
        if($this->input->post('amountcheck') != 'Yes'){
            $dataadminearn = array(
                'user_id' => $child_id,
                'wallet_value' => 500,
                'pay_mode' => 'Cash',
                'utr' => 'Admin',
                'remark' => 'Admin',
                'plid' => '1',
                'r_level' => 'Agent',
                'status' => 'Accepted',
                'date'=> date('Y-m-d H:i:s'),
                'approve_date'=> date('Y-m-d H:i:s'));
            $this->db->insert('admin_request', $dataadminearn);  
        }



        if (!empty($placement_id)) {
            $data2['parent_id'] = $placement_id;
            $data2['child_id'] = $child_id;
            $data2['entry_date'] = date('Y-m-d');
            $data2['position'] = $this->input->post('position');
            if($this->db->where('parent_id',$placement_id)->where('position',$this->input->post('position'))->count_all_results('tree') == 0 && $this->db->where('child_id',$child_id)->count_all_results('tree') == 0)
            {
                $this->autofill('tree',$placement_id,$child_id);
                
                $this->update_rowdata('user','user_id', $child_id, array('plid' => $placement_id));
                
                $parentacc = $this->get_all_parent('tree',$child_id,$res=array());
                for ($i=0; $i < 3; $i++) { 
        //log_message("error", 'not successful'.$parentacc[$i]);                   
                    if($parentacc[$i] != ""){
                        $dataearn = array(
                            'user_id' => $parentacc[$i],
                            'amount' => $this->db->select('amount')->where('name','agent')->get('packages')->row()->amount,
                            'entry_date'=> date('Y-m-d H:i:s'),
                            'remark' => "Agent",
                            'i_from' => $child_id);
                        $this->db->insert('account', $dataearn);
                    }
                }
                
                $this->magic();
        
            }
            else
                return false;
        }

        $this->db->trans_complete(); 
        if($this->db->trans_status() == FALSE){
//log_message("error", 'not successful ');                        
            return FALSE;
        }else{

//log_message("error", 'Transaction Result successful ');
            return true;
        }

    }
    
    public function gadd_customer($user_id, $filename)
    {

        $placement_id =  $this->db->select('user_id')->where('username',$this->input->post('placement_id'))->get('user')->row()->user_id;
//log_message("error", $this->db->last_query());

        $data['name'] = $this->input->post('name');
        $data['usertype'] = "u";
        $data['phone'] = $this->input->post('number');
        $data['email'] = $this->input->post('email');
        $data['package'] = $this->input->post('j_amount');                           
        $data['join_date'] = (date('Y-m-d'));
        $data['ref_id'] = $user_id;
        $data['plid'] = $placement_id;
        $data['level'] = 'Agent';
        $data['username'] = $this->input->post('username');
        $data['password'] = sha1($this->input->post('p'));
        $data['p'] = $this->input->post('p');


        $this->db->trans_start();

        $this->db->insert('user',$data);

////log_message("error", $this->db->last_query());

        $child_id = $this->db->insert_id();

        $pindata = array(
            'user_id' => $child_id,
            'wallet_value' => 0,
            'date' => date('Y-m-d')
        );

        $this->db->insert('wallet', $pindata);
        
        



        if (!empty($placement_id)) {
            $data2['parent_id'] = $placement_id;
            $data2['child_id'] = $child_id;
            $data2['entry_date'] = date('Y-m-d');
            $data2['position'] = $this->input->post('position');
            if($this->db->where('parent_id',$placement_id)->where('position',$this->input->post('position'))->count_all_results('tree') == 0 && $this->db->where('child_id',$child_id)->count_all_results('tree') == 0)
            {
                $this->db->insert('tree',$data2);
                $this->update_rowdata('user','user_id', $child_id, array('plid' => $placement_id));
                
                $dataadminearn = array(
                    'user_id' => $child_id,
                    'wallet_value' => 500,
                    'pay_mode' => 'Cash',
                    'utr' => 'Admin',
                    'remark' => 'Admin',
                    'plid' => '1',
                    'r_level' => 'Agent',
                    'status' => 'Accepted',
                    'date'=> date('Y-m-d H:i:s'),
                    'approve_date'=> date('Y-m-d H:i:s'));
                $this->db->insert('admin_request', $dataadminearn);
                
                $parentacc = $this->get_all_parent('tree',$child_id,$res=array());
                for ($i=0; $i < 3; $i++) { 
        //log_message("error", 'not successful'.$parentacc[$i]);                   
                    if($parentacc[$i] != ""){
                        $dataearn = array(
                            'user_id' => $parentacc[$i],
                            'amount' => $this->db->select('amount')->where('name','agent')->get('packages')->row()->amount,
                            'entry_date'=> date('Y-m-d H:i:s'),
                            'remark' => "Agent",
                            'i_from' => $child_id);
                        $this->db->insert('account', $dataearn);
                    }
                }
                
                $this->magic();
        
            }
            else
                return false;
        }
        

        


        $this->db->trans_complete(); 
        if($this->db->trans_status() == FALSE){
//log_message("error", 'not successful ');                        
            return FALSE;
        }else{

//log_message("error", 'Transaction Result successful ');
            return true;
        }

    }

    public function add_referal_tree($hids)
    {

        $adminrequest = $this->db->where('id',$hids)->get('admin_request')->row_array();
////log_message("error", $this->db->last_query());
        $this->autofill('tree',$adminrequest['plid'],$adminrequest['user_id']);

        $parentacc = $this->get_all_parent('tree',$adminrequest['user_id'],$res=array());
        for ($i=0; $i < 3; $i++) { 
            if($parentacc[$i] != ""){
                $dataearn = array(
                    'user_id' => $parentacc[$i],
                    'amount' => $this->db->select('amount')->where('name','agent')->get('packages')->row()->amount,
                    'entry_date'=> date('Y-m-d H:i:s'),
                    'remark' => "Agent",
                    'i_from' => $adminrequest['user_id']);
                $this->db->insert('account', $dataearn);
            }
        }

        $this->magic();
        $this->zonal();
        


        $this->db->trans_complete(); 
        if($this->db->trans_status() == FALSE){
//log_message("error", 'not successful ');                        
            return FALSE;
        }else{

//log_message("error", 'Transaction Result successful ');
            return true;
        }
    }

    


    public function levels($parent, $level) 
    {

        $resultccc = $this->db->where('parent_id', $parent)->get('tree')->result_array();
        foreach ($resultccc as $key => $value) {
            $user_detaisl = $this->db->get_where('user_role',array('user_role_id'=>$value['child_id']))->row();
            $user_profile = $this->db->get_where('profile',array('profile_id'=>$value['child_id']))->row();
            $parent_detaisl = $this->db->get_where('user_role',array('user_role_id'=>$value['parent_id']))->row();
            $parent_profile = $this->db->get_where('profile',array('profile_id'=>$value['parent_id']))->row();

            echo "<tr>
            <td>Level ".$level."</td>
            <td>".$parent_detaisl->username."<br>".$parent_profile->name."<br>".$parent_profile->phone."</td>
            <td>".$user_detaisl->username."<br>".$user_profile->name."<br>".$user_profile->phone."</td><td>".date_format(date_create($user_profile->entry_date),"d-M-Y")."</td></tr>";
            if(count($resultccc) >= 0)
            {
                $this->levels($value['child_id'],$level+1);
            }

        }
        return $list_child;
    }

    public function levels_non($parent, $level) 
    {

        $resultccc = $this->db->where('parent_id', $parent)->get('tree')->result_array();
        foreach ($resultccc as $key => $value) {
            $user_detaisl = $this->db->get_where('user_role',array('user_role_id'=>$value['child_id']))->row();
            $user_profile = $this->db->get_where('profile',array('profile_id'=>$value['child_id']))->row();
            $parent_detaisl = $this->db->get_where('user_role',array('user_role_id'=>$value['parent_id']))->row();
            $parent_profile = $this->db->get_where('profile',array('profile_id'=>$value['parent_id']))->row();
            
            $invesamount = $this->db->select_sum('wallet_value')->where('status','Accepted')->where('user_id',$value['child_id'])->get('admin_request')->row()->wallet_value+0;

            if($invesamount == 0){
            echo "<tr>
            <td>Level ".$level."</td>
            <td>".$parent_detaisl->username."<br>".$parent_profile->name."<br>".$parent_profile->phone."</td>
            <td>".$user_detaisl->username."<br>".$user_profile->name."<br>".$user_profile->phone."</td><td>".date_format(date_create($user_profile->entry_date),"d-M-Y")."</td></tr>";
            }
            if(count($resultccc) >= 0)
            {
                $this->levels($value['child_id'],$level+1);
            }

        }
        return $list_child;
    }


    public function get_business($tree, $parent, $level){
        $resultccc = $this->db->where('parent_id', $parent)->get($tree)->result_array();
        $count = array(0=>0);
        foreach ($resultccc as $key => $row) {
//$count[0] +=$row['child_id']/;
            $count[0]++;
            $children= $this->get_business($tree,$row['child_id'], $level+1);
            $index=1;
            foreach ($children as $child)
            {
                if ($child==0)
                    continue;
                if (isset($count[$index]))
                    $count[$index] += $child;
                else    
                    $count[$index] = $child;
                $index++;
            }
        }  
        return $count; 
    }

    public function get_children($tree, $parent, $level){
        $resultccc = $this->db->where('parent_id', $parent)->get($tree)->result_array();
        $count = array(0=>0);
        foreach ($resultccc as $key => $row) {
            $count[0]++;
            $children= $this->get_children($tree,$row['child_id'],$level+1);
            $index=1;
            foreach ($children as $child)
            {
                if ($child==0)
                    continue;
                if (isset($count[$index]))
                    $count[$index] += $child;
                else    
                    $count[$index] = $child;
                $index++;
            }
        }  
        return $count; 
    }

    public function update_payout($id,$field,$value){
// Update
        $data=array($field => $value);
        $this->db->where('id',$id);
        $this->db->update('payout',$data);
    }

    public function update_user($id,$field,$value){
// Update
        $data=array($field => $value);
        $this->db->where('user_id',$id);
        $this->db->update('user',$data);
    }

    public function send_my_mail($email_id,$user_id,$pass,$inves,$pack){


        $message = '
        <!DOCTYPE html>
        <html>

        <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        </head>

        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
        <!-- HIDDEN PREHEADER TEXT -->
        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: '."'Lato'".', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We'."'".'re thrilled to have you here! Get ready to dive into your new account. </div>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
        <td bgcolor="#FFA73B" align="center">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
        <tr>
        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
        <tr>
        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: '."'Lato'".', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
        <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Welcome!</h1> <h3>Pine World</h3>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
        <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: '."'Lato'".', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
        <p style="margin: 0;">Congratulations on being part of Us! We welcomes you and we look forward to a successful journey with you!</p>
        </td>
        </tr>
        <tr>
        <td bgcolor="#ffffff" align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
        <table>
        <tr>
        <td align="right">Your User ID : </td><td>';
        $message .=$user_id;
        $message .='</td>
        </tr><tr>
        <td align="right">Password : </td><td>';
        $message .=$pass;
        $message .='</td>
        </tr><tr>
        <td align="right">Invested Amount : </td><td>';
        $message .=$inves;
        $message .='</td>
        </tr><tr>
        <td align="right">Selected Package : </td><td>';
        $message .=$pack;
        $message .='</td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr> <!-- COPY -->
        </table>
        </td>
        </tr>

        </table>
        </body>

        </html>';


        $to = $email_id;

        $subject = 'Website Change Reqest';

        $headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if (mail($to, $subject, $message, $headers))
            log_message('error',"send");
        else 
            log_message('error',"Not send");



    }


    public function send_forgotpass($email_id,$pass){

        $message = '
        <!DOCTYPE html>
        <html>

        <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        </head>

        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
        <!-- HIDDEN PREHEADER TEXT -->
        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: '."'Lato'".', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We'."'".'re thrilled to have you here! Get ready to dive into your new account. </div>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
        <td bgcolor="#FFA73B" align="center">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
        <tr>
        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
        <tr>
        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: '."'Lato'".', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
        <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Forgot Password!</h1> <h3>Pine World</h3>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
        <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: '."'Lato'".', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
        <p style="margin: 0;">Please Use this (';
        $message .=$pass;
       

        $message .=') Password for Login!</p>
        </td>
        </tr> <!-- COPY -->
        </table>
        </td>
        </tr>

        </table>
        </body>

        </html>';


        $to = $email_id;
        $subject = 'Forgot Password';
        /*$headers .= "From: ". $email_id. "\r\n";
        $headers .= "Reply-To: ". $email_id . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";*/

        if (mail($to, $subject, $message))
            log_message('error',"send");
        else 
            log_message('error',"Not send");

        return "ok"; 
    }
    
    
    public function get_user_genealogy($treeid)
    { 
        $user_detail = $this->get_row_data('user','user_id',$treeid);

        ?>
<div class="node" style="cursor: default;">

    <a href="<?=BASEURL?>user_genealogy/<?=$user_detail['user_id']?>">
        <img class="tree_icon with_tooltip root_node" src="<?=UPLOADURL.$user_detail['pimage']?>"
            ondblclick="getGenologyTree('elangorp',event);" data-tooltip-content="#<?=$user_detail['user_id']?>">
    </a>
</div>

<div id="tooltip_div" style="display:none;">
    <div id="<?=$user_detail['user_id']?>" class="tree_img_tree">
        <div class="Demo_head_bg">
            <p><?=$user_detail['name']?></p>
        </div>
        <div class="body_text_tree">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <div class="pull-left">User ID</div>
                    <div class="pull-right">: <?=$user_detail['username']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">User ID</div>
                    <div class="pull-right">: <?=$user_detail['username']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Join Date</div>
                    <div class="pull-right">: <?=$user_detail['join_date']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Ref / Spo ID</div>
                    <div class="pull-right">: <?=$user_detail['ref_id']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Left</div>
                    <div class="pull-right">:
                        <?=$this->countChildren('tree',$user_detail['user_id'], '', 'left');?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Right</div>
                    <div class="pull-right">:
                        <?=$this->countChildren('tree',$user_detail['user_id'], '', 'right');?></div>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php }

public function get_genealogy($treeid)
{ 
    $user_detail = $this->get_row_data('user','user_id',$treeid);
    ?>
    <div class="node" style="cursor: default;">

        <a href="<?=BASEURL?>genealogy/<?=$user_detail['user_id']?>">
            <img style="border:  3px solid #ff0000" class="tree_icon with_tooltip root_node" src="<?=UPLOADURL.$user_detail['pimage']?>" ondblclick="getGenologyTree('elangorp',event);" data-tooltip-content="#<?=$user_detail['user_id']?>">
            <p class="demo_name_style"><?=$user_detail['name']?></p>
        </a>
    </div>

    <div id="tooltip_div" style="display:none;">
        <div id="<?=$user_detail['user_id']?>" class="tree_img_tree">
            <div class="Demo_head_bg">
                <p><?=$user_detail['name']?></p>
            </div>
            <div class="body_text_tree">
                <ul class="list-group no-radius">
                    <li class="list-group-item">
                        <div class="pull-left">User ID</div>
                        <div class="pull-right">:  <?=$user_detail['username']?></div>
                    </li>
                    <li class="list-group-item">
                        <div class="pull-left">Join Date</div>
                        <div class="pull-right">:  <?=$user_detail['join_date']?></div>
                    </li>
                    <li class="list-group-item">
                        <div class="pull-left">Ref / Spo ID</div>
                        <div class="pull-right">:  <?=$user_detail['sponsor_id']?></div>
                    </li>
                    <li class="list-group-item">
                        <div class="pull-left">Left</div>
                        <div class="pull-right">: <?=$this->countChildren($user_detail['scheme']."_tree", $user_detail['user_id'], '', 'Left');?></div>
                    </li>
                    <li class="list-group-item">
                        <div class="pull-left">Right</div>
                        <div class="pull-right">:  <?=$this->countChildren($user_detail['scheme']."_tree", $user_detail['user_id'], '', 'Right');?></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<?php }
    public function get_mgenealogy($treeid)
    { 
        $user_detail = $this->get_row_data('user','user_id',$treeid);

        ?>
<div class="node" style="cursor: default;">

    <a href="<?=BASEURL?>mgenealogy/<?=$user_detail['user_id']?>">
        <img style="border:  3px solid #ff0000" class="tree_icon with_tooltip root_node"
            src="assets/img/<?=PROIMAGE?><?=$user_detail['pimage']?>" ondblclick="getGenologyTree('elangorp',event);"
            data-tooltip-content="#<?=$user_detail['user_id']?>">
        <p class="demo_name_style"><?=$user_detail['name']?></p>
    </a>
</div>

<div id="tooltip_div" style="display:none;">
    <div id="<?=$user_detail['user_id']?>" class="tree_img_tree">
        <div class="Demo_head_bg">
            <p><?=$user_detail['name']?></p>
        </div>
        <div class="body_text_tree">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <div class="pull-left">User ID</div>
                    <div class="pull-right">: <?=$user_detail['username']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Join Date</div>
                    <div class="pull-right">: <?=$user_detail['join_date']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Ref / Spo ID</div>
                    <div class="pull-right">: <?=$user_detail['ref_id']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Left</div>
                    <div class="pull-right">:
                        <?=$this->countChildren('bdm_tree',$user_detail['user_id'], '', 'left');?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Right</div>
                    <div class="pull-right">:
                        <?=$this->countChildren('bdm_tree',$user_detail['user_id'], '', 'right');?></div>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php }
    public function get_ggenealogy($treeid)
    { 
        $user_detail = $this->get_row_data('user','user_id',$treeid);

        ?>
<div class="node" style="cursor: default;">

    <a href="<?=BASEURL?>ggenealogy/<?=$user_detail['user_id']?>">
        <img style="border:  3px solid #ff0000" class="tree_icon with_tooltip root_node"
            src="assets/img/<?=PROIMAGE?><?=$user_detail['pimage']?>" ondblclick="getGenologyTree('elangorp',event);"
            data-tooltip-content="#<?=$user_detail['user_id']?>">
        <p class="demo_name_style"><?=$user_detail['name']?></p>
    </a>
</div>

<div id="tooltip_div" style="display:none;">
    <div id="<?=$user_detail['user_id']?>" class="tree_img_tree">
        <div class="Demo_head_bg">
            <p><?=$user_detail['name']?></p>
        </div>
        <div class="body_text_tree">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <div class="pull-left">User ID</div>
                    <div class="pull-right">: <?=$user_detail['username']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Join Date</div>
                    <div class="pull-right">: <?=$user_detail['join_date']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Ref / Spo ID</div>
                    <div class="pull-right">: <?=$user_detail['ref_id']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Left</div>
                    <div class="pull-right">:
                        <?=$this->countChildren('zonal_tree',$user_detail['user_id'], '', 'left');?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Right</div>
                    <div class="pull-right">:
                        <?=$this->countChildren('zonal_tree',$user_detail['user_id'], '', 'right');?></div>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php }
 /*public function magic()
    {
//log_message("error", "bdm_tree count");
        $allusers = $this->db->get_where('user',array('user_id !='=>0,'level'=>'Agent'))->result_array();

        foreach ($allusers as $key => $alluser) {
//$bdm_tree_id = $this->db->where('user_id', $alluser['user_id'])->get('user')->result_array();
            $firstlevelcount = $this->admin->get_business('tree',$alluser['user_id'], 0)[2];
//$secondlevelcount = $this->admin->get_business($alluser['user_id'], 0)[1];
            if ($firstlevelcount == 8) {
                $checkavilable = $this->db->where('child_id',$alluser['user_id'])->count_all_results('bdm_tree');
                if ($checkavilable == 0) {
                    $magic_count = $this->db->count_all_results('bdm_tree');
//log_message("error", "bdm_tree count".$magic_count."-".$placement_id."-".$alluser['user_id']);

                    if ($magic_count == 0) {
                        $data2['parent_id'] = 1;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'left';
                        if($this->db->where('child_id',$alluser['user_id'])->count_all_results('bdm_tree') == 0)
                        {
                            $this->db->insert('bdm_tree',$data2);
                        }
                        else
                            return false;

                    } 
                    elseif($magic_count == 1) {
                        $data2['parent_id'] = 1;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'right';

                        if($this->db->where('child_id',$alluser['user_id'])->count_all_results('bdm_tree') == 0)
                        {
                            $this->db->insert('bdm_tree',$data2);
                        }
                        else
                            return false;
                    }
                    elseif($magic_count == 2) {
                        $data2['parent_id'] = $this->db->select('child_id')->where('parent_id',1)->where('position','left')->get('bdm_tree')->row()->child_id;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'left';
                        if($this->db->where('child_id',$alluser['user_id'])->count_all_results('bdm_tree') == 0)            {
                            $this->db->insert('bdm_tree',$data2);
                        }
                        else
                            return false;
                    }
                    elseif($magic_count == 3) {
                        $data2['parent_id'] = $this->db->select('child_id')->where('parent_id',1)->where('position','left')->get('bdm_tree')->row()->child_id;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'right';
                        if($this->db->where('child_id',$alluser['user_id'])->count_all_results('bdm_tree') == 0)            {
                            $this->db->insert('bdm_tree',$data2);
                        }
                        else
                            return false;
                    }

//log_message("error", $this->db->last_query());

                    if ($magic_count >= 4) {


                        $parentposition = floor(($magic_count-2)/2);
                        $magic_tree_id = $this->db->select('child_id')->get('bdm_tree',1, $parentposition)->row()->child_id;
                        if ($magic_tree_id == 0) 
                            $magic_tree_id = 1;
//log_message("error", $this->db->last_query());

                        if (!empty($magic_tree_id)) {
                            $childcount = $this->db->where('parent_id',$magic_tree_id)->count_all_results('bdm_tree');
//log_message("error", $this->db->last_query());
                            if ($childcount == 0) {
                                $data2['parent_id'] = $magic_tree_id;
                                $data2['child_id'] = $alluser['user_id'];
                                $data2['entry_date'] = date('Y-m-d');
                                $data2['position'] = 'left';
                                if($this->db->where('child_id',$alluser['user_id'])->count_all_results('bdm_tree') == 0)
                                {
                                    $this->db->insert('bdm_tree',$data2);
                                }
                                else
                                    return false;
                            } 
                            elseif($childcount == 1) {
                                $data2['parent_id'] = $magic_tree_id;
                                $data2['child_id'] = $alluser['user_id'];
                                $data2['entry_date'] = date('Y-m-d');
                                $data2['position'] = 'right';
                                if($this->db->where('child_id',$alluser['user_id'])->count_all_results('bdm_tree') == 0)
                                {
                                    $this->db->insert('bdm_tree',$data2);
                                }
                                else
                                    return false;
                            }

//log_message("error", $this->db->last_query());
                        }
                    }
                    $this->bdmincome($alluser['user_id']);
                    $this->update_rowdata('user','user_id', $alluser['user_id'], array('level' => 'BDM'));
                } 
            }
        }
    }*/

    public function magic()
    {
//log_message("error", "bdm_tree count");
        $allusers = $this->db->get_where('user',array('user_id !='=>0,'level'=>'Agent'))->result_array();

        foreach ($allusers as $key => $alluser) {
//$bdm_tree_id = $this->db->where('user_id', $alluser['user_id'])->get('user')->result_array();
            $firstlevelcount = $this->admin->get_business('tree',$alluser['user_id'], 0)[2];
//$secondlevelcount = $this->admin->get_business($alluser['user_id'], 0)[1];
            if ($firstlevelcount == 8) {
                $checkavilable = $this->db->where('child_id',$alluser['user_id'])->count_all_results('bdm_tree');
                if ($checkavilable == 0) {
                    $magic_count = $this->db->count_all_results('bdm_tree');
//log_message("error", "bdm_tree count".$magic_count."-".$placement_id."-".$alluser['user_id']);

                    if ($magic_count == 0) {
                        $data2['parent_id'] = 1;
                        $data2['child_id'] = 0;
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'left';
                        $this->db->insert('bdm_tree',$data2);
                    } 
                    elseif($magic_count == 1) {
                        if($this->db->select('child_id')->where('parent_id',1)->get('bdm_tree')->row()->child_id == 0){
                            log_message("error",'BDM Tree Updated');
                            $this->db->where('parent_id',1);
                            $this->db->where('position','left');
                            $this->db->update('bdm_tree',array('child_id' => $alluser['user_id'], 'entry_date' => date('Y-m-d')));
                            log_message("error",'BDM Tree Updated');
                        } else {
                        $data2['parent_id'] = 1;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'right';
                        $this->db->insert('bdm_tree',$data2);
                        }
                    }
                    elseif($magic_count == 2) {
                        $data2['parent_id'] = $this->db->select('child_id')->where('parent_id',1)->where('position','left')->get('bdm_tree')->row()->child_id;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'left';
                        $this->db->insert('bdm_tree',$data2);
                    }
                    elseif($magic_count == 3) {
                        $data2['parent_id'] = $this->db->select('child_id')->where('parent_id',1)->where('position','left')->get('bdm_tree')->row()->child_id;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'right';
                        $this->db->insert('bdm_tree',$data2);
                    }

//log_message("error", $this->db->last_query());

                    if ($magic_count >= 4) {
                        $parentposition = floor(($magic_count-2)/2);
                        $magic_tree_id = $this->db->select('child_id')->get('bdm_tree',1, $parentposition)->row()->child_id;
                        if ($magic_tree_id == 0) 
                            $magic_tree_id = 1;
//log_message("error", $this->db->last_query());

                        if (!empty($magic_tree_id)) {
                            $childcount = $this->db->where('parent_id',$magic_tree_id)->count_all_results('bdm_tree');
//log_message("error", $this->db->last_query());
                            if ($childcount == 0) {
                                $data2['parent_id'] = $magic_tree_id;
                                $data2['child_id'] = $alluser['user_id'];
                                $data2['entry_date'] = date('Y-m-d');
                                $data2['position'] = 'left';
                                $this->db->insert('bdm_tree',$data2);
                            } 
                            elseif($childcount == 1) {
                                $data2['parent_id'] = $magic_tree_id;
                                $data2['child_id'] = $alluser['user_id'];
                                $data2['entry_date'] = date('Y-m-d');
                                $data2['position'] = 'right';
                                $this->db->insert('bdm_tree',$data2);
                            }

//log_message("error", $this->db->last_query());
                        }
                    }
                    $this->zonal();
                    $this->bdmincome($alluser['user_id']);
                    $this->update_rowdata('user','user_id', $alluser['user_id'], array('level' => 'BDM'));
                } 
            }
        }
    }
    
   /* public function zonal()
    {
//log_message("error", "zonal_tree count");
        $allusers = $this->db->get_where('user',array('user_id !='=>0,'user_id !='=>1,'level'=>'BDM'))->result_array();

        foreach ($allusers as $key => $alluser) {
//$bdm_tree_id = $this->db->where('user_id', $alluser['user_id'])->get('user')->result_array();
            $firstlevelcount = $this->admin->get_business('bdm_tree',$alluser['user_id'], 0)[2];
//$secondlevelcount = $this->admin->get_business($alluser['user_id'], 0)[1];
            if ($firstlevelcount == 8) {
                $checkavilable = $this->db->where('child_id',$alluser['user_id'])->count_all_results('zonal_tree');
                if ($checkavilable == 0) {
                    $magic_count = $this->db->count_all_results('zonal_tree');
//log_message("error", "zonal_tree count".$magic_count."-".$placement_id."-".$alluser['user_id']);

                    if ($magic_count == 0) {
                        $data2['parent_id'] = 1;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'left';
                        $this->db->insert('zonal_tree',$data2);

                    } 
                    elseif($magic_count == 1) {
                        $data2['parent_id'] = 1;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'right';
                        $this->db->insert('zonal_tree',$data2);
                    }
                    elseif($magic_count == 2) {
                        $data2['parent_id'] = $this->db->select('child_id')->where('parent_id',1)->where('position','left')->get('zonal_tree')->row()->child_id;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'left';
                        $this->db->insert('zonal_tree',$data2);
                    }
                    elseif($magic_count == 3) {
                        $data2['parent_id'] = $this->db->select('child_id')->where('parent_id',1)->where('position','left')->get('zonal_tree')->row()->child_id;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'right';
                        $this->db->insert('zonal_tree',$data2);
                    }

//log_message("error", $this->db->last_query());

                    if ($magic_count >= 4) {


                        $parentposition = floor(($magic_count-2)/2);
                        $magic_tree_id = $this->db->select('child_id')->get('zonal_tree',1, $parentposition)->row()->child_id;
                        if ($magic_tree_id == 0) 
                            $magic_tree_id = 1;
//log_message("error", $this->db->last_query());

                        if (!empty($magic_tree_id)) {
                            $childcount = $this->db->where('parent_id',$magic_tree_id)->count_all_results('zonal_tree');
//log_message("error", $this->db->last_query());
                            if ($childcount == 0) {
                                $data2['parent_id'] = $magic_tree_id;
                                $data2['child_id'] = $alluser['user_id'];
                                $data2['entry_date'] = date('Y-m-d');
                                $data2['position'] = 'left';
                                $this->db->insert('zonal_tree',$data2);
                            } 
                            elseif($childcount == 1) {
                                $data2['parent_id'] = $magic_tree_id;
                                $data2['child_id'] = $alluser['user_id'];
                                $data2['entry_date'] = date('Y-m-d');
                                $data2['position'] = 'right';
                                $this->db->insert('zonal_tree',$data2);
                            }

//log_message("error", $this->db->last_query());
                        }
                    }
                    for ($i=0; $i < 2; $i++)
                    {
                        $this->rebirth();
                    }
                    for ($i=0; $i < 10; $i++)
                    {
                        $this->zonalrebirth();
                    }
                    $this->dzonalrebirth();
        
                    $this->zonalincome($alluser['user_id']);
                    $this->update_rowdata('user','user_id', $alluser['user_id'], array('level' => 'Zonal'));
                } 
            }
        }
    }*/
    
    
    public function zonal()
    {
//log_message("error", "zonal_tree count");
        $allusers = $this->db->get_where('user',array('user_id !='=>0,'level'=>'BDM'))->result_array();

        foreach ($allusers as $key => $alluser) {
//$bdm_tree_id = $this->db->where('user_id', $alluser['user_id'])->get('user')->result_array();
            $firstlevelcount = $this->admin->get_business('bdm_tree',$alluser['user_id'], 0)[2];
//$secondlevelcount = $this->admin->get_business($alluser['user_id'], 0)[1];
            if ($firstlevelcount == 8) {
                $checkavilable = $this->db->where('child_id',$alluser['user_id'])->count_all_results('zonal_tree');
                if ($checkavilable == 0) {
                    $magic_count = $this->db->count_all_results('zonal_tree');
//log_message("error", "zonal_tree count".$magic_count."-".$placement_id."-".$alluser['user_id']);

                    if ($magic_count == 0) {
                        $data2['parent_id'] = 1;
                        $data2['child_id'] = 0;
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'left';
                        $this->db->insert('zonal_tree',$data2);

                    } 
                    elseif($magic_count == 1) {
                        if($this->db->select('child_id')->where('parent_id',1)->get('zonal_tree')->row()->child_id == 0){
                            log_message("error",'BDM Tree Updated');
                            $this->db->where('parent_id',1);
                            $this->db->where('position','left');
                            $this->db->update('zonal_tree',array('child_id' => $alluser['user_id'], 'entry_date' => date('Y-m-d')));
                            log_message("error",'BDM Tree Updated');
                        } else {
                        $data2['parent_id'] = 1;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'right';
                        $this->db->insert('zonal_tree',$data2);
                        }
                    }
                    elseif($magic_count == 2) {
                        $data2['parent_id'] = $this->db->select('child_id')->where('parent_id',1)->where('position','left')->get('zonal_tree')->row()->child_id;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'left';
                        $this->db->insert('zonal_tree',$data2);
                    }
                    elseif($magic_count == 3) {
                        $data2['parent_id'] = $this->db->select('child_id')->where('parent_id',1)->where('position','left')->get('zonal_tree')->row()->child_id;
                        $data2['child_id'] = $alluser['user_id'];
                        $data2['entry_date'] = date('Y-m-d');
                        $data2['position'] = 'right';
                        $this->db->insert('zonal_tree',$data2);
                    }

//log_message("error", $this->db->last_query());

                    if ($magic_count >= 4) {


                        $parentposition = floor(($magic_count-2)/2);
                        $magic_tree_id = $this->db->select('child_id')->get('zonal_tree',1, $parentposition)->row()->child_id;
                        if ($magic_tree_id == 0) 
                            $magic_tree_id = 1;
//log_message("error", $this->db->last_query());

                        if (!empty($magic_tree_id)) {
                            $childcount = $this->db->where('parent_id',$magic_tree_id)->count_all_results('zonal_tree');
//log_message("error", $this->db->last_query());
                            if ($childcount == 0) {
                                $data2['parent_id'] = $magic_tree_id;
                                $data2['child_id'] = $alluser['user_id'];
                                $data2['entry_date'] = date('Y-m-d');
                                $data2['position'] = 'left';
                                $this->db->insert('zonal_tree',$data2);
                            } 
                            elseif($childcount == 1) {
                                $data2['parent_id'] = $magic_tree_id;
                                $data2['child_id'] = $alluser['user_id'];
                                $data2['entry_date'] = date('Y-m-d');
                                $data2['position'] = 'right';
                                $this->db->insert('zonal_tree',$data2);
                            }

//log_message("error", $this->db->last_query());
                        }
                    }
                    $this->update_rowdata('user','user_id', $alluser['user_id'], array('level' => 'Zonal'));

                    for ($i=0; $i < 2; $i++)
                    {
                        $this->rebirth();
                    }
                    for ($i=0; $i < 10; $i++)
                    {
                        $this->zonalrebirth();
                    }
                    $this->dzonalrebirth();
        
                    $this->zonalincome($alluser['user_id']);
                } 
            }
        }
    }

    public function bdmincome($newbdm)
    {
        $parentbdm = $this->get_all_parent('bdm_tree',$newbdm,$res=array());
//log_message("error", count($parentbdm));
        for ($i=0; $i < 3; $i++) { 
//log_message("error", "bdm_income".$parentbdm[$i]."\n");
            if($parentbdm[$i] != ""){
                $checkentry = $this->db->select('amount')->where('user_id',$parentbdm[$i])->where('i_from',$newbdm)->where('remark','BDM')->get('account')->row()->amount;
//log_message("error", $this->db->last_query());
                if($checkentry == "") {

                    $dataearn = array(
                        'user_id' => $parentbdm[$i],
                        'amount' => $this->db->select('amount')->where('name','bdm')->get('packages')->row()->amount,
                        'entry_date'=> date('Y-m-d H:i:s'),
                        'remark' => "BDM",
                        'i_from' => $newbdm);
                    $this->db->insert('account', $dataearn);
                }
            }
        }
    }

    public function zonalincome($newbdm)
    {
        $parentbdm = $this->get_all_parent('zonal_tree',$newbdm,$res=array());
//log_message("error", count($parentbdm));
        for ($i=0; $i < 2; $i++) { 
//log_message("error", "zonal_income".$parentbdm[$i]."\n");
            if($parentbdm[$i] != ""){
                $checkentry = $this->db->select('amount')->where('user_id',$parentbdm[$i])->where('i_from',$newbdm)->where('remark','Zonal')->get('account')->row()->amount;
//log_message("error", $this->db->last_query());
                if($checkentry == "") {

                    $dataearn = array(
                        'user_id' => $parentbdm[$i],
                        'amount' => $this->db->select('amount')->where('name','zonal')->get('packages')->row()->amount,
                        'entry_date'=> date('Y-m-d H:i:s'),
                        'remark' => "Zonal",
                        'i_from' => $newbdm);
                    $this->db->insert('account', $dataearn);
                }
            }
        }
    }

    public function rebirth()
    {
        $this->db->trans_start();
        $news=$this->db->select('child_id')->get('zonal_tree')->result_array();
        array_push($news,array('child_id' => '1'));
        foreach ($news as $usvalue) {
            if($usvalue['child_id'] != "0") {
            $recount = $this->db->where('user_id',$usvalue['child_id'])->where('re_from','BDM')->count_all_results('rebirth')+1;
            if($recount <= 2){
                $userdetails = $this->admin->get_row_data('user','user_id',$usvalue['child_id']);
                foreach($userdetails as $key=>$val){        
                    if($key != 'user_id')
                    {
                        if($key == 'username')
                            $this->db->set($key, "R".$recount.$val);   
                        elseif($key == 'level')
                            $this->db->set($key, 'Agent'); 
                        elseif($key == 'join_date')
                            $this->db->set($key, date('Y-m-d'));   
                        elseif($key == 'ref_id')
                            $this->db->set($key, 1);   
                        else
                            $this->db->set($key, $val);   
                    }
                }
                $this->db->insert('user');

                log_message("error", $this->db->last_query());

                $child_id = $this->db->insert_id();

                $pindata = array(
                    'user_id' => $child_id,
                    'wallet_value' => 0,
                    'date' => date('Y-m-d')
                );

                $this->db->insert('wallet', $pindata);

                $redata = array(
                    'user_id' => $usvalue['child_id'],
                    're_user_id' => $child_id,
                    're_from' => 'BDM'
                );

                $this->db->insert('rebirth', $redata);
                
                $dataadminearn = array(
                    'user_id' => $child_id,
                    'wallet_value' => 500,
                    'pay_mode' => 'Cash',
                    'utr' => 'Admin',
                    'remark' => 'Admin',
                    'plid' => '1',
                    'r_level' => 'Agent',
                    'status' => 'Accepted',
                    'date'=> date('Y-m-d H:i:s'),
                    'approve_date'=> date('Y-m-d H:i:s'));
                $this->db->insert('admin_request', $dataadminearn);




                $this->autofill('tree',1,$child_id);

                $this->db->trans_complete(); 

                $parentacc = $this->get_all_parent('tree',$child_id,$res=array());
                for ($i=0; $i < 3; $i++) { 
//log_message("error", 'not successful'.$parentacc[$i]);                   
                    if($parentacc[$i] != ""){
                        $dataearn = array(
                            'user_id' => $parentacc[$i],
                            'amount' => $this->db->select('amount')->where('name','agent')->get('packages')->row()->amount,
                            'entry_date'=> date('Y-m-d H:i:s'),
                            'remark' => "Agent",
                            'i_from' => $child_id);
                        $this->db->insert('account', $dataearn);
                    }
                }



                $this->magic();

                
                if($this->db->trans_status() == FALSE){
//log_message("error", 'not successful ');                        
                    return FALSE;
                }else{

//log_message("error", 'Transaction Result successful ');
                    return true;
                }

            }
        }
        }
    }

    public function zonalrebirth()
    {
        $news=$this->db->select('child_id')->get('zonal_tree')->result_array();
        array_push($news,array('child_id' => '1'));
        foreach ($news as $usvalue) {
            if($usvalue['child_id'] != "0") {
            $firstlevelcount = $this->admin->get_business('zonal_tree',$usvalue['child_id'], 0)[1];
////log_message("error", $firstlevelcount);
//$secondlevelcount = $this->admin->get_business($alluser['user_id'], 0)[1];
            if ($firstlevelcount == 4) {
                $recount = $this->db->where('user_id',$usvalue['child_id'])->where('re_from','Zonal')->count_all_results('rebirth')+1;
                if($recount <= 10){
                    $userdetails = $this->admin->get_row_data('user','user_id',$usvalue['child_id']);
                    foreach($userdetails as $key=>$val){        
                        if($key != 'user_id')
                        {
                            if($key == 'username')
                                $this->db->set($key, "ZR".$recount.$val);   
                            elseif($key == 'level')
                                $this->db->set($key, 'Agent');   
                            elseif($key == 'join_date')
                                $this->db->set($key, date('Y-m-d'));
                            elseif($key == 'ref_id')
                                $this->db->set($key, 1);   
                            else
                                $this->db->set($key, $val);   
                        }
                    }
                    $this->db->trans_start();

                    $this->db->insert('user');

////log_message("error", $this->db->last_query());

                    $child_id = $this->db->insert_id();

                    $pindata = array(
                        'user_id' => $child_id,
                        'wallet_value' => 0,
                        'date' => date('Y-m-d')
                    );

                    $this->db->insert('wallet', $pindata);

                    $redata = array(
                        'user_id' => $usvalue['child_id'],
                        're_user_id' => $child_id,
                        're_from' => 'Zonal'
                    );

                    $this->db->insert('rebirth', $redata);
                    
                    $dataadminearn = array(
                    'user_id' => $child_id,
                    'wallet_value' => 500,
                    'pay_mode' => 'Cash',
                    'utr' => 'Admin',
                    'remark' => 'Admin',
                    'plid' => '1',
                    'r_level' => 'Agent',
                    'status' => 'Accepted',
                    'date'=> date('Y-m-d H:i:s'),
                    'approve_date'=> date('Y-m-d H:i:s'));
                $this->db->insert('admin_request', $dataadminearn);




                    $this->autofill('tree',1,$child_id);

                    $parentacc = $this->get_all_parent('tree',$child_id,$res=array());
                    for ($i=0; $i < 3; $i++) { 
////log_message("error", 'not successful'.$parentacc[$i]);                   
                        if($parentacc[$i] != ""){
                            $dataearn = array(
                                'user_id' => $parentacc[$i],
                                'amount' => $this->db->select('amount')->where('name','agent')->get('packages')->row()->amount,
                                'entry_date'=> date('Y-m-d H:i:s'),
                                'remark' => "Agent",
                                'i_from' => $child_id);
                            $this->db->insert('account', $dataearn);
                        }
                    }

                    $this->magic();
                    

                    $this->db->trans_complete(); 
                    if($this->db->trans_status() == FALSE){
////log_message("error", 'not successful ');                        
                        return FALSE;
                    }else{

////log_message("error", 'Transaction Result successful ');
                        return true;
                    }

                }
            }
        }
    }
    }

    public function dzonalrebirth()
    {
        $news=$this->db->select('child_id')->get('zonal_tree')->result_array();
        array_push($news,array('child_id' => '1'));
        foreach ($news as $usvalue) {
            $firstlevelcount = $this->admin->get_business('zonal_tree',$usvalue['child_id'], 0)[1];
//$secondlevelcount = $this->admin->get_business($alluser['user_id'], 0)[1];
            if ($firstlevelcount == 4) {
                $recount = $this->db->where('user_id',$usvalue['child_id'])->where('re_from','DZonal')->count_all_results('rebirth')+1;
                if($recount <= 1){
                    $userdetails = $this->admin->get_row_data('user','user_id',$usvalue['child_id']);
                    foreach($userdetails as $key=>$val){        
                        if($key != 'user_id')
                        {
                            if($key == 'username')
                                $this->db->set($key, "DZR".$recount.$val);   
                            elseif($key == 'level')
                                $this->db->set($key, 'Zonal');   
                            elseif($key == 'ref_id')
                                $this->db->set($key, 1);   
                            else
                                $this->db->set($key, $val);   
                        }
                    }
                    $this->db->trans_start();

                    $this->db->insert('user');

////log_message("error", $this->db->last_query());

                    $child_id = $this->db->insert_id();

                    $pindata = array(
                        'user_id' => $child_id,
                        'wallet_value' => 0,
                        'date' => date('Y-m-d')
                    );

                    $this->db->insert('wallet', $pindata);

                    $redata = array(
                        'user_id' => $usvalue['child_id'],
                        're_user_id' => $child_id,
                        're_from' => 'DZonal'
                    );

                    $this->db->insert('rebirth', $redata);
                    
                    $dataadminearn = array(
                    'user_id' => $child_id,
                    'wallet_value' => 500,
                    'pay_mode' => 'Cash',
                    'utr' => 'Admin',
                    'remark' => 'Admin',
                    'plid' => '1',
                    'r_level' => 'Zonal',
                    'status' => 'Accepted',
                    'date'=> date('Y-m-d H:i:s'),
                    'approve_date'=> date('Y-m-d H:i:s'));
                $this->db->insert('admin_request', $dataadminearn);




                    $this->autofill('zonal_tree',1,$child_id);

                    $parentacc = $this->get_all_parent('zonal_tree',$child_id,$res=array());
                    for ($i=0; $i < 3; $i++) { 
////log_message("error", 'not successful'.$parentacc[$i]);                   
                        if($parentacc[$i] != "" && $parentacc[$i] != 0){
                            $dataearn = array(
                                'user_id' => $parentacc[$i],
                                'amount' => $this->db->select('amount')->where('name','zonal')->get('packages')->row()->amount,
                                'entry_date'=> date('Y-m-d H:i:s'),
                                'remark' => "Agent",
                                'i_from' => $child_id);
                            $this->db->insert('account', $dataearn);
                        }
                    }

                    $this->magic();
                    


                    $this->db->trans_complete(); 
                    if($this->db->trans_status() == FALSE){
////log_message("error", 'not successful ');                        
                        return FALSE;
                    }else{

////log_message("error", 'Transaction Result successful ');
                        return true;
                    }

                }
            }
        }
    }

    public function autofill($tree,$parent,$child){
//log_message("error","Hai Autofill"."\n");
        $childcountxx = $this->db->where('parent_id',$parent)->count_all_results($tree);
//log_message("error","Level count:".$childcountxx."\n");
        if($childcountxx < 2){
//log_message("error","parent no child"."\n");  
            $checkposition = $this->db->where('parent_id',$parent)->where('position','left')->count_all_results($tree);
            if($checkposition == 0){
                $data2['parent_id'] = $parent;
                $data2['child_id'] = $child;
                $data2['entry_date'] = date('Y-m-d');
                $data2['position'] = 'left';
                if($this->db->where('child_id',$parent)->count_all_results($tree) < 2){
                    $this->db->insert($tree,$data2);
                    $this->update_rowdata('user','user_id', $child, array('plid' => $parent));
                }
                else
                    return false;
                return true;
            } else {
                $data2['parent_id'] = $parent;
                $data2['child_id'] = $child;
                $data2['entry_date'] = date('Y-m-d');
                $data2['position'] = 'right';
                if($this->db->where('parent_id',$parent)->count_all_results($tree) < 2) {
                    $this->db->insert($tree,$data2);
                    $this->update_rowdata('user','user_id', $child, array('plid' => $parent));
                }
                else
                    return false;
                return true;
            }
        } else {
            $levelcounts = $this->get_children($tree,$parent,0);
            for ($i=0; $i <= count($levelcounts); $i++) { 
//log_message("error","child count:".count($levelcounts)."\n");
                if($levelcounts[$i] != pow(2,$i+1))
                {
//log_message("error","check level count:".$levelcounts[$i]."-".pow(2,$i+1)."\n");
//log_message("error","find level:".$i);
                    $alllevelcounts = $this->getparentatlevel($tree,$parent,1,$list_child=array());
                    $childarray = array();
                    for ($j=0; $j < count($alllevelcounts); $j++) { 
                        if($alllevelcounts[$j][$i] != '') {
//log_message("error",$alllevelcounts[$j][$i]."\n");
                            $childarray[] = $alllevelcounts[$j][$i];
                        }

                        foreach ($childarray as $key => $ccc) {
//log_message("error","Parent id-".$ccc."\n");  
                            $childcount = $this->db->where('parent_id',$ccc)->count_all_results($tree);
//log_message("error", $this->db->last_query());
                            if($childcount < 2){
                                $checkposition = $this->db->where('parent_id',$ccc)->where('position','left')->count_all_results($tree);
//log_message("error", $this->db->last_query());
                                if($checkposition == 0){
                                    $data2['parent_id'] = $ccc;
                                    $data2['child_id'] = $child;
                                    $data2['entry_date'] = date('Y-m-d');
                                    $data2['position'] = 'left';
                                    if($this->db->where('parent_id',$ccc)->count_all_results($tree) < 2) {
                                        $this->db->insert($tree,$data2);
                                        $this->update_rowdata('user','user_id', $child, array('plid' => $ccc));
                                    }
                                    else
                                        return false;
                                    return true;
                                } else {
                                    $data2['parent_id'] = $ccc;
                                    $data2['child_id'] = $child;
                                    $data2['entry_date'] = date('Y-m-d');
                                    $data2['position'] = 'right';
                                    if($this->db->where('parent_id',$ccc)->count_all_results($tree) < 2) {
                                        $this->db->insert($tree,$data2);
                                        $this->update_rowdata('user','user_id', $child, array('plid' => $ccc));
                                    }
                                    else
                                        return false;
                                    return true;
                                }
                            }
                        }
                    }
                }
            } 


        }

        return false;
    }
}
?>