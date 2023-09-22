<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model {


    public function product_credits(){
        $this->db->trans_start();

        $tree ="tree";

		$child_id  = $this->db->select('user_id')->where('billing_id',$this->input->post('id'))->get('billing')->row()->user_id;
		// log_message("error", $child_id);
		$parent_id  = $this->db->select('ref_id')->where('user_role_id',$child_id)->get('user_role')->row()->ref_id;
		// log_message("error", $parent_id);
		$total_purchase=$this->db->select_sum('amount')->where('status','completed')->where('user_id',$child_id)->get('billing')->row()->amount+0;
		// log_message("error", $total_purchase);
		$pv=$this->db->select_sum('amount')->where('status','New')->where('user_id',$child_id)->get('billing')->row()->amount+0;
		// log_message("error", $pv);

		$p_val = 2880;
		if ($p_val<$total_purchase) {
			$this->autofill($tree,$parent_id,$child_id);
		}

        $rank =$this->get_row_data('master','master_id',$parent['rank']+1);
		log_message("error", $rank['rewards']);
        $parent =$this->get_row_data('user_role','user_role_id',$parent_id);
		log_message("error", $parent['rank']);
		log_message("error", $parent['left_pv']);

        if ($parent['left_pv']>$rank['rewards']) {
            $business = array(
                'user_id' => $parent_id,
                'credit' => $rank['rewards'],
                'balance' => ($this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$parent_id)->get('account')->row()->balance+0)+$rank['rewards'],
                'entry_date'=> date('Y-m-d'),
                'remark' => "rewards",
                'description' => $child_id);
            $this->db->insert('account', $business);

            $this->db->set('rank', 'rank+1', FALSE);
            $this->db->where('user_role_id',$parent_id);
            $result = $this->db->update('user_role');
        }



        $this->db->set('left_pv', 'left_pv+'.$pv, FALSE);
        $this->db->where('user_role_id',$parent_id);
        $result = $this->db->update('user_role');
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }

    }
    public function get_genealogy_auto($treeid)
    { 
        $user_detail = $this->get_row_data('profile','profile_id',$treeid);
        ?>
<div class="node" style="cursor: default;">
    <a href="<?=BASEURL?>genealogy_auto/<?=$user_detail['profile_id']?>">
        <img style="border:  3px solid #ff0000" class="tree_icon with_tooltip root_node"
            src="<?=PROFILEURL.$user_detail['pimage']?>" ondblclick="getGenologyTree('elangorp',event);"
            data-tooltip-content="#<?=$user_detail['profile_id']?>">
        <p class="demo_name_style"><?=$user_detail['name']?></p>
    </a>
</div>
<div id="tooltip_div" style="display:none;">
    <div id="<?=$user_detail['profile_id']?>" class="tree_img_tree">
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
                    <div class="pull-right">: <?=$user_detail['sponsor_id']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Left</div>
                    <div class="pull-right">: <?=$this->countChildren("tree", $user_detail['profile_id'], '', 'Left');?>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Right</div>
                    <div class="pull-right">:
                        <?=$this->countChildren("tree", $user_detail['profile_id'], '', 'Right');?></div>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }

    public function pay_withdraw_request()
    {
        $this->db->trans_start();
        $withdraw_request = $this->get_row_data('withdraw_request','id',$this->input->post('hids'));
        $dataearn = array(
            'user_id' => $withdraw_request['user_id'],
            'debit' => $withdraw_request['amount'],
            'balance' => ($this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$withdraw_request['user_id'])->get('account')->row()->balance+0)-$withdraw_request['amount'],
            'entry_date'=> date('Y-m-d'),
            'remark' => "Paid",
            'description' => 'Paid');
        $this->db->insert('account', $dataearn);
        
        $acc = $this->db->select('acc_name, acc_no, acc_branch, acc_ifsc, acc_bank')->get_where('bank',array('user_id'=>$withdraw_request['user_id']))->row_array();
        $this->db->where('id',$this->input->post('hids'));
		$this->db->update('withdraw_request',array('status'=>'Accepted','dic'=>implode(",",$acc),'approve_date'=>date('Y-m-d')));
        
        
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }
    
    
    public function getparentatlevel($tree,$parent,$level,$list_child) //get all childs
    {

        $resultccc = $this->db->where('parent_id', $parent)->get($tree)->result_array();
        foreach ($resultccc as $key => $value) {
            $list_child[]=array($level=>$value['child_id']);
            if(count($resultccc) >= 0)
            {
                $list_child=$this->getparentatlevel($tree,$value['child_id'],$level+1,$list_child);
            }
        }
        return $list_child;
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

    public function autofill($tree,$parent,$child){
        if($this->db->where('child_id',$child)->count_all_results($tree)+0 == 0){
            $childcount = $this->db->where('parent_id',$parent)->count_all_results($tree)+0;
            if($childcount < 4){
                $data2['parent_id'] = $parent;
                $data2['child_id'] = $child;
                $data2['entry_date'] = date('Y-m-d');
                if($this->db->insert($tree,$data2)) {
                    return true;
                } else {
                    return false;
                } 
            } else {
                $levelcounts = $this->get_children($tree,$parent,0);
                for ($i=0; $i <= count($levelcounts); $i++) { 
                    if($levelcounts[$i] != pow(4,$i+1))
                    {
                        $alllevelcounts = $this->getparentatlevel($tree,$parent,1,$list_child=array());
                        $childarray = array();
                        for ($j=0; $j < count($alllevelcounts); $j++) { 
                            if($alllevelcounts[$j][$i] != '') {
                                $childarray[] = $alllevelcounts[$j][$i];
                            }
                            foreach ($childarray as $key => $ccc) {
                                $childcount = $this->db->where('parent_id',$ccc)->count_all_results($tree);
                                if($childcount < 4){
                                    $data2['parent_id'] = $ccc;
                                    $data2['child_id'] = $child;
                                    $data2['entry_date'] = date('Y-m-d');
                                    if($this->db->insert($tree,$data2)) {
                                        return true;
                                    } else {
                                        return false;
                                    } 
                                }
                            }
                        }
                    }
                } 
            }
        } else {
            return false;
        }
    }




    //////// Add  wallet request
    public function add_pin_request($user_id,$filename)
    {
        $user = $this->get_row_data('user_role','user_role_id',$user_id);
        $data['user_id'] = $user['user_role_id'];
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

    ////approval for users
    
    
    public function get_all_child_by_level($tree,$parent,$level,$list_child=array()) 
    {

        $resultccc = $this->db->where('parent_id', $parent)->get($tree)->result_array();
        foreach ($resultccc as $key => $value) {
            $list_child[$level][]=$value['child_id'];
            if(count($resultccc) >= 0)
            {
                $list_child=$this->get_all_child_by_level($tree,$value['child_id'],$level+1,$list_child);
            }
        }
        return $list_child;
    }
    public function send_withdraw_request($id)
    {
        $this->db->trans_start();
        $request = array(
            'user_id' => $id,
            'amount' => $this->input->post('amount'),
            'status' => "Request",
            'date'=> date('Y-m-d'),
            'dic' => $id);
        $this->db->insert('withdraw_request', $request);

        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }
    public function add_withdraw_request($user_id)
    { //`user_id`, `amount`, `status`, `date`, `approve_date`, `dic`, `modof`
        $data['user_id'] = $this->session->userdata('userid');
        $data['amount'] = $this->input->post('amount');
        $data['status'] = "Request";
        $data['date'] = date("Y-m-d H:i:s");
        $this->db->insert('withdraw_request',$data);
        return true;
    }
    
    public function setup_manage()
    {
        $this->db->trans_start();

        $userdata = array(
            'username' => $this->input->post('username'),
            'ref_id' => 0,
            'pwd' => sha1($this->input->post('pwd')),
            'user_type' => 'a',
            'rank' => 'Admin',
            'user_id' => $this->input->post('user_id'),
            'entry_date' =>date("Y-m-d")
        );
        $this->db->insert('user_role', $userdata);

        $child_id = $this->db->insert_id();
        $profile_data  =  array(
        'profile_id' => $child_id,   
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('phone'),
        'entry_date' =>date("Y-m-d"),
        'door'=> $this->input->post('door'),
		'street'=> $this->input->post('street'),
		'city'=> $this->input->post('city'),
		'district'=> $this->input->post('district'),
		'state'=> $this->input->post('state'),
		'pin'=> $this->input->post('pin')
        );
        $this->db->insert('profile', $profile_data);
        				

        $setupdata = array(
            'company_name' => $this->input->post('name'),
            'gst' => $this->input->post('gst'),
            'tin' => $this->input->post('tin'),
            'currency' => $this->input->post('currency')
        );
        $this->db->insert('setup', $setupdata);
        
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
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


    public function count_table($check_data,$table)
    {
        if (!empty($check_data)) {
            $this->db->where($check_data);
        }
        $tabledata = $this->db->count_all_results($table)+0;
        return $tabledata;
    }

    public function get_userdetails($userid='',$column='')
    {
        return $this->get_row_data('user_role','user_role_id',$userid)[$column];
    }
    
    public function countChildren($tree, $parentId, $Nlevel = 0, $legPosition = 0, $tempLevel = 0)
    {
        if ($Nlevel) {
            if ($tempLevel < $Nlevel) {
                $tempLevel = $tempLevel + 1;
                if ($tempLevel == 1 && $legPosition) {
                    $children =$this->db->where('parent_id', $parentId)->where('position', $legPosition)->get($tree)->result_array();
                } else {
                    $children = $this->db->where('parent_id', $parentId)->get($tree)->result_array();
                }
                $count = count($children);
                foreach ($children as $key => $userId) {
                    $count += $this->countChildren($tree, $userId['child_id'], $Nlevel, $legPosition, $tempLevel);
                    log_message("error", $this->db->last_query());
                }
                return $count;
            }
        } else {
            if ($legPosition) {
                $children = $this->db->where('parent_id', $parentId)->where('position', $legPosition)->get($tree)->result_array();
            } else {
                $children = $this->db->where('parent_id', $parentId)->get($tree)->result_array();
            }
            $count = count($children);
            foreach ($children as $key =>  $userId) {
                $count += $this->countChildren($tree, $userId['child_id']);
            }
            return $count;
        }
    }

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
        $epinr = $this->get_row_data('admin_request','admin_request_id',$id);
        

        if ($this->autofill('tree',$epinr['ref_id'],$epinr['user_id'])) {
           $balance = $this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$epinr['ref_id'])->get('account')->row()->balance+0;
            $dataref = array(
                'user_id' => $epinr['ref_id'],
                'credit' => 50,
                'balance' => (50+$balance),
                'entry_date'=> date('Y-m-d'),
                'remark' => "Referral",
                'description' => $epinr['user_id']);
                $this->db->insert('account', $dataref); 
        }

        
        $masterlevelincome = $this->db->where('type','level')->count_all_results('master')+0;
        $parentacc = $this->get_all_parent('tree',$epinr['user_id'],$res=array());
        for ($i=0; $i < min($masterlevelincome,count($parentacc)); $i++) { 
            
            $ref_count = $this->countChildren('tree',$parentacc[$i],0,0,0);
            $master = $this->db->get_where('master',array('criteria'=>$ref_count,'level'=>($i+1),'type'=>'level'))->row_array();
            
            if($master['rewards'] > 0){
                $balance = $this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$epinr['ref_id'])->get('account')->row()->balance+0;
                $datalevel = array(
                    'user_id' => $parentacc[$i],
                    'credit' => $master['rewards'],
                    'balance' => ($master['rewards']+$balance),
                    'entry_date'=> date('Y-m-d'),
                    'remark' => "Level",
                    'description' => $epinr['user_id']);
                $this->db->insert('account', $datalevel);
            }
        }

        $ref_count = $this->db->where('ref_id',$epinr['ref_id'])->where('rank','Member')->count_all_results('user_role')+0;
        $Leadership_count = $this->db->where('user_id',$epinr['ref_id'])->where('remark','Leadership')->count_all_results('account')+0;
        $master = 0;
        switch ($Leadership_count) {
            case 0:
            if($ref_count >= 10)
            $master = $this->db->get_where('master',array('criteria'=>10,'type'=>'leadership'))->row_array();
            break;
            case 1:
            if($ref_count >= 100)
            $master = $this->db->get_where('master',array('criteria'=>100,'type'=>'leadership'))->row_array();
            break;
          case 2:
            if($ref_count >= 1000)
            $master = $this->db->get_where('master',array('criteria'=>1000,'type'=>'leadership'))->row_array();
            break;
        }

        log_message('error',$this->db->last_query());
        if($master['rewards'] > 0){
            $balance = $this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$epinr['ref_id'])->get('account')->row()->balance+0;
            $datalead = array(
                'user_id' => $epinr['ref_id'],
                'credit' => $master['rewards'],
                'balance' => ($master['rewards']+$balance),
                'entry_date'=> date('Y-m-d'),
                'remark' => "Leadership",
                'description' => 1 );
            $this->db->insert('account', $datalead);
        }                
        
        $this->db->where('user_role_id',$epinr['user_id']);
        $this->db->update('user_role',array('rank'=>'Member'));
        
        
        $this->db->where('admin_request_id',$id);
        $this->db->update('admin_request',array('status'=>'Accepted','approve_date'=>date('Y-m-d')));
        //log_message('error',$this->db->last_query());

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
            $data['utr'] = $this->input->post('utr');
            $data['pay_mode'] = $this->input->post('pay_mode');
            $data['filename'] = $this->input->post('receiptimage');
            $data['ref_id'] = $this->db->select('ref_id')->where('user_role_id',$user_id)->get('user_role')->row()->ref_id;
            $data['status'] = "Request";
            $data['entry_date'] = date("Y-m-d");
            if($this->db->insert('admin_request',$data))
                return true;
            else
                return false;
    }



    public function register_manage()
    {
        $this->db->trans_start();

        $userdata = array(
            'username' => $this->input->post('username'),
            'ref_id' => $this->db->select('user_role_id')->where('username',$this->input->post('ref_id'))->get('user_role')->row()->user_role_id,
            'pwd' => sha1($this->input->post('cp')),
            'user_type' => 'u',
            'rank' => '1',
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
        $uscode = "FT".rand (1000000 , 9999999);
        $query = $this->db->get_where('user_role', array('username' => $uscode))->row_array();
        if (!empty($query)) {
            $this->randuser("FT".rand (1000000 , 9999999));
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

    public function send_my_mail($email_id,$user_id,$pass){


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
        
        $subject = $this->db->select('company_name')->get('setup')->row()->company_name;
        if (mail($to, $subject, $message))
            log_message('error',"send");
        else 
            log_message('error',"Not send");
    }
}
?>
