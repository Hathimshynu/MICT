<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model {
    //////// Add request 
    ////approval for users
    
    public function pay()
    {
        $this->db->trans_start();
        $withdraw = $this->get_row_data('withdraw_request','id',$this->input->post('hids'));
        $dataearn = array(
            'user_id' => $withdraw['user_id'],
            'debit' => $withdraw['amount']-$withdraw['samount'],
            'balance' => ($this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$withdraw['user_id'])->get('account')->row()->balance+0-$withdraw['amount']),
            'entry_date'=> date('Y-m-d'),
            'remark' => "Paid",
            'description' => 'Paid');
        $this->db->insert('account', $dataearn);
        $admin_earn = array(
            'user_id' => 1,
            'credit' => $withdraw['samount']/2,
            'balance' => ($this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',1)->get('account')->row()->balance+0+$withdraw['amount']/2),
            'entry_date'=> date('Y-m-d'),
            'remark' => "credit",
            'description' => $withdraw['user_id']);
        $this->db->insert('account', $admin_earn);
        $sponser_earn = array(
            'user_id' => $this->db->select('ref_id')->where('user_role_id',$withdraw['user_id'])->get("user_role")->row()->ref_id,
            'credit' => $withdraw['samount']/2,
            'balance' => ($this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',1)->get('account')->row()->balance+0+$withdraw['amount']/2),
            'entry_date'=> date('Y-m-d'),
            'remark' => "credit",
            'description' => $withdraw['user_id']);
        $this->db->insert('account', $sponser_earn);
        $this->db->where('id',$this->input->post('hids'));
		$result = $this->db->update('withdraw_request',array('status'=>'Paid','approve_date'=>date("Y-m-d")));
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }


public function get_genealogy($treeid)
{ 
    $user_detail = $this->get_row_data('profile','profile_id',$treeid); ?>
<div class="node" style="cursor: default;">

    <a href="<?=BASEURL?>genealogy/<?=$user_detail['profile_id']?>">
        <img style="border:  3px solid #ff0000" class="tree_icon with_tooltip root_node" src="<?=PROFILEURL.$user_detail['pimage']?>" ondblclick="getGenologyTree('elangorp',event);"
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
                    <div class="pull-right">: <?=$this->db->select('left_pv')->where('user_role_id',$user_detail['profile_id'])->get('user_role')->row()->left_pv+0;?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Right</div>
                    <div class="pull-right">: <?=$this->db->select('right_pv')->where('user_role_id',$user_detail['profile_id'])->get('user_role')->row()->right_pv+0;?></div>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php }



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
        $checkchild_exits = $this->db->where('child_id',$child)->count_all_results($tree);

        if($checkchild_exits == 0){
            $childcountxx = $this->db->where('parent_id',$parent)->count_all_results($tree);
            if($childcountxx < 2){
                $checkposition = $this->db->where('parent_id',$parent)->where('position','left')->count_all_results($tree);
                if($checkposition == 0){
                    $data2['parent_id'] = $parent;
                    $data2['child_id'] = $child;
                    $data2['entry_date'] = date('Y-m-d');
                    $data2['position'] = 'left';
                    if($this->db->insert($tree,$data2))
                        return true;
                    else
                        return false;
                } else {
                    $data2['parent_id'] = $parent;
                    $data2['child_id'] = $child;
                    $data2['entry_date'] = date('Y-m-d');
                    $data2['position'] = 'right';
                    if($this->db->insert($tree,$data2))
                        return true;
                    else
                        return false;
                }
            } else {
                $levelcounts = $this->get_children($tree,$parent,0);
                for ($i=0; $i <= count($levelcounts); $i++) { 
                    if($levelcounts[$i] != pow(2,$i+1))
                    {
                        $alllevelcounts = $this->getparentatlevel($tree,$parent,1,$list_child=array());
                        $childarray = array();
                        for ($j=0; $j < count($alllevelcounts); $j++) { 
                            if($alllevelcounts[$j][$i] != '') {
                                $childarray[] = $alllevelcounts[$j][$i];
                            }
                            foreach ($childarray as $key => $ccc) {
                                $childcount = $this->db->where('parent_id',$ccc)->count_all_results($tree);
                                if($childcount < 2){
                                    $checkposition = $this->db->where('parent_id',$ccc)->where('position','left')->count_all_results($tree);
                                    if($checkposition == 0){
                                        $data2['parent_id'] = $ccc;
                                        $data2['child_id'] = $child;
                                        $data2['entry_date'] = date('Y-m-d');
                                        $data2['position'] = 'left';
                                        if($this->db->insert($tree,$data2)) {
                                            return true;
                                        }
                                        else {
                                            return false;
                                        }

                                    } else {
                                        $data2['parent_id'] = $ccc;
                                        $data2['child_id'] = $child;
                                        $data2['entry_date'] = date('Y-m-d');
                                        $data2['position'] = 'right';
                                        if($this->db->insert($tree,$data2)) {
                                            return true;
                                        }
                                        else {
                                            return false;
                                        }
                                    }
                                }
                            }
                        }
                    }
                } 
            }
        } else {
            ////log_message('error',"false");
            return false;
        }
    }


    
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
    
    public function add_withdraw_request($user_id)
    {
        $user = $this->get_row_data('user_role','user_role_id',$user_id);
        $data['user_id'] = $user_id;
        $data['amount'] = $this->input->post('amount');
        $data['samount'] =$this->input->post('amount')- $this->input->post('samount');
        $data['status'] = "Request";
        $data['date'] = date("Y-m-d H:i:s");
        $this->db->insert('withdraw_request',$data);
        return true;
    }
    
    public function setup_manage()
    {
        $this->db->trans_start();
        $userdata = array(
            'ref_id' => 1,
            'pwd' => sha1($this->input->post('pwd')),
            'user_type' => 'a',
            'rank' => 'Admin',
            'username' => $this->input->post('username'),
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
                    ////log_message("error", $this->db->last_query());
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
        
        $user_detail = $this->get_row_data('user_role','user_role_id',$epinr['user_id']);
        $appro_date = date('Y-m-d');

        $master = $this->db->get_where('packages', array('amount'=>$epinr['wallet_value']))->row_array();

        $roi = ($epinr['wallet_value']*$master['roi'])/100;

        for ($x = 1; $x <= $master['days']; $x++) {
            $data_roi['user_id'] = $epinr['user_id'];
            $data_roi['amount'] = $roi;
            $data_roi['roi_date'] = date("Y-m-d", strtotime("+".$x." day"));
            $data_roi['inves_id'] = $id;
            $data_roi['type'] = 'roi';
            $this->db->insert('roi',$data_roi);
        }
        
        
        

        $parentacc = $this->get_all_parent('tree',$epinr['user_id'],$res=array());
        
        $linnerlevel = $this->db->DISTINCT()->select('level')->where('type','linear')->count_all_results('master');
        //log_message("error", $this->db->last_query().$linnerlevel."tgy");
        for ($i=0; $i < min($linnerlevel,count($parentacc)); $i++) { 
            $level = ($i+1);
            $criteria = $this->db->where('criteria',$epinr['wallet_value'])->where('level',$level)->get('master')->row_array();
            if ($epinr['type'] == "Join") {
                $rewards = ($epinr['wallet_value']*$criteria['rewards'])/100;
            }else {
                $rewards = ($epinr['wallet_value']*$criteria['rewards']/2)/100;
            }
     
            for ($y = 1; $y <= $criteria['bonus_count']; $y++) {
                $monthy_roi['user_id'] = $parentacc[$i];
                $monthy_roi['amount'] = $rewards;
                $monthy_roi['roi_date'] = date("Y-m-d", strtotime("+30 day"));
                $monthy_roi['inves_id'] = $id;
                $monthy_roi['type'] = 'Linner Referral';    
                $this->db->insert('roi',$monthy_roi);
            }
        } 

        $parentaccx = $this->get_all_parent('tree',$epinr['user_id'],$res=array($epinr['user_id']));
        for ($i=0; $i <= count($parentaccx); $i++) { 
            $legPosition = $this->db->select('position')->where('child_id',$parentaccx[$i])->get('tree')->row()->position;
            
            if ($legPosition == 'left') {
                $this->db->set('left_pv', 'left_pv+'.$epinr['wallet_value'], FALSE);
                $this->db->where('user_role_id',$parentaccx[($i+1)]);
                $result = $this->db->update('user_role');
            }
            if ($legPosition == 'right') {
                $this->db->set('right_pv', 'right_pv+'.$epinr['wallet_value'], FALSE);
                $this->db->where('user_role_id',$parentaccx[($i+1)]);
                $result = $this->db->update('user_role');
            }
            
            
            
            


            if ($parentaccx[$i] != "") {
                
                $pv=$this->db->where('user_role_id',$parentaccx[$i])->get('user_role')->row_array();
                $paidpair=$this->db->select('pair')->where('user_id',$parentaccx[$i])->get('account')->row()->pair;
                $needpair = (min($pv['left_pv'],$pv['right_pv'])-$paidpair)+0;
                
                $pairreward = $this->db->select('pair_match')->where('amount',$needpair)->get('packages')->row()->pair_match+0;
                $pair = ($epinr['wallet_value']*$pairreward)/100;

                if($pair > 0){
                  $pair_earn = array(
                    'user_id' => $parentaccx[$i],
                    'credit' => $pair,
                    'balance' => $pair+($this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$parentaccx[$i])->get('account')->row()->balance+0),
                    'entry_date'=> date('Y-m-d'),
                    'remark' => "pair",
                    'pair' => $pair,
                    'description' => $epinr['user_id']);
                    $this->db->insert('account', $pair_earn);  
                }
                
            }
        }
        
        
        
        
        $parentaccESLA = $this->get_all_parent('tree',$epinr['user_id'],$res=array());
        foreach ($parentaccESLA as $key => $elsa) {
           ///// ESLA mining Bonus

            $parent = $this->db->where('parent_id',$elsa)->get('tree')->result_array();
            $first_line = $auxilary  =  0;
            $myinsve = $this->db->select('investment')->where('user_role_id',$elsa)->get('user_role')->row()->investment+0;
            for ($i=0; $i < count($parent) ; $i++) { 
                $child = $this->db->select('investment')->where('user_role_id',$parent[$i]['child_id'])->get('user_role')->row()->investment+0;
                $first_line = $first_line+$child;
            }
            
    
            $rightpv =   $this->db->select('right_pv')->where('user_role_id',$elsa)->get('user_role')->row()->right_pv;
            $leftpv = $this->db->select('left_pv')->where('user_role_id',$elsa)->get('user_role')->row()->left_pv;
            $main_branch = $leftpv+$rightpv;
            
            $side = max($leftpv,$rightpv);
    
            $b = $this->admin->get_all_child_by_level("tree",$elsa,1,$list_child=array());
            // echo '<pre>'.print_r($b).'</pre>';
    
            for ($i=1; $i <= 5 ; $i++) { 
                for ($x=0; $x < count($b[$i]) ; $x++) { 
                    $child_investment = $this->db->select('investment')->where('user_role_id',$b[$i][$x])->get('user_role')->row()->investment;
                    $child_pos = $this->db->select('position')->where('child_id',$b[$i][$x])->get('tree')->row()->position;
                    $auxilary = $child_investment +$auxilary;
                }
            }
            
            
    
            $esla = $this->db
            ->where('investment',$myinsve)
            ->where('first_line >=',$first_line)
            ->where('auxiliary_branch >=',$auxilary)
            ->where('sidde_branch >=',$side)
            ->where('main_branch >=',$main_branch)
            ->get('bonus')->row_array();
            
            log_message('error', $this->db->last_query());
    
    
            if ($esla['commission'] > 0) {
                    
                    $esla_earn = array(
                        'user_id' => $elsa,
                        'credit' => $esla['commission'],
                        'balance' => $esla['commission']+($this->db->order_by('account_id',"DESC")->limit(1)->where('user_id',$elsa)->get('account')->row()->balance+0),
                        'entry_date'=> date('Y-m-d'),
                        'remark' => "elsa",
                        'description' => "bonus");
                    $this->db->insert('account', $esla_earn);
                    $this->db->where('user_role_id',$id);
                    $this->db->update('user_role',array('rank'=>$esla['level']));
                } 
        }

        
        

        //$this->db->where('admin_request_id',$id);
        //$this->db->update('admin_request',array('status'=>'Accepted','approve_date'=>$appro_date));
        $this->db->where('user_role_id',$user_detail['user_role_id']);
        $this->db->update('user_role',array('investment'=>$user_detail['investment']+$epinr['wallet_value']));
        ////log_message('error',$this->db->last_query());
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }
    
    public function add_admin_request($user_id)
    {
            $this->db->trans_start();
            $data['user_id'] = $user_id;
            $data['wallet_value'] = $this->input->post('amount');
            $data['utr'] = $this->input->post('utr');
            $data['pay_mode'] = $this->input->post('pay_mode');
            $data['filename'] = $this->input->post('receiptimage');
            $data['type'] = $this->input->post('type');
            $data['ref_id'] = $this->db->select('ref_id')->where('user_role_id',$user_id)->get('user_role')->row()->ref_id;
            $data['status'] = "Request";
            // $data['tree'] = $this->input->post('tree');
            $data['entry_date'] = date("Y-m-d");
            $this->db->insert('admin_request',$data);
            

            $this->db->trans_complete();
            if($this->db->trans_status() == FALSE){
                return false;
            } else {
                return true;
            }
    }
    public function register_manage()
    {
        $this->db->trans_start();
        $userdata = array(
            'username' => $this->randuser(),
            'ref_id' => $this->db->select('user_role_id')->where('username',$this->input->post('ref_id'))->get('user_role')->row()->user_role_id,
            'pwd' => sha1($this->input->post('cp')),
            'user_type' => 'u',
            'rank' => 'Agent',
            'entry_date' =>date("Y-m-d")
        );

        $this->db->insert('user_role', $userdata);
        $child_id = $this->db->insert_id();
        $left_count =$this->db->where('position','left')->where('parent_id',$userdata['ref_id'])->count_all_results('tree');
        $tree_count =$this->db->where('parent_id',$userdata['ref_id'])->count_all_results('tree');
		////log_message("error",$tree_count);
		
        $treedata['parent_id'] = $userdata['ref_id'];
        $treedata['child_id'] = $child_id;
        $treedata['entry_date'] =date("Y-m-d");

        if ($left_count<1) {
            $treedata['position'] = 'left';
        }else {
            $treedata['position'] = 'Right';

        }

        $this->db->insert('tree',$treedata);

        // if ($this->input->post('product_id') != "") {
        //     $data['product_id'] = $this->input->post('product_id');
        //         $data['user_id'] = $child_id;
        //         $data['entry_date'] =date("Y-m-d");
        //         $this->db->insert('billing',$data);
        //     }

        //log_message("error", $this->db->last_query());
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
        //log_message("error", $this->db->last_query());
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }
    public function product_register_manage()
    {
        $this->db->trans_start();
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $data['pincode'] = $this->input->post('pincode');
        $data['door'] = $this->input->post('door');
        $data['street'] = $this->input->post('street');
        $data['city'] = $this->input->post('city');
        $data['district'] = $this->input->post('district');
        $data['state'] = $this->input->post('state');
        $data['country'] = $this->input->post('country');
        $data['landmark'] = $this->input->post('landmark');
        $data['product_id'] = $this->input->post('product_id');
        $data['ref_id'] = $this->db->select('user_role_id')->where('username',$this->input->post('ref_id'))->get('user_role')->row()->user_role_id;
        $data['date'] =date("Y-m-d");
        $data['status'] = 'ordered';
        $this->db->insert('orders',$data);
        $userdata = array(
            'username' => $this->input->post('username'),
            'ref_id' => $data['ref_id'],
            'pwd' => sha1($this->input->post('password')),
            'user_type' => 'u',
            'rank' => 'Agent',
            'user_id' => $this->randuser(),
            'entry_date' =>date("Y-m-d")
        );
        $this->db->insert('user_role', $userdata);
        //log_message("error", $this->db->last_query());
        $child_id = $this->db->insert_id();
        $profile_data  =  array(
        'profile_id' => $child_id,   
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'entry_date' =>date("Y-m-d")
        );
        $account_data  =  array(
            'user_id' => $this->db->select('user_role_id')->where('username',$data['ref_id'])->get('user_role')->row()->user_role_id,
            'credit' => $this->db->select('rewards')->where('type',"DIR")->get('master')->row()->rewards,
            'entry_date'=> date('Y-m-d'),
            'remark' => "Level",
            'description' => 'DIR'
            );
        $ref_data  =  array(
            'user_id' => $child_id,
            'credit' => $this->db->select('rewards')->where('type',"SELF")->get('master')->row()->rewards,
            'entry_date'=> date('Y-m-d'),
            'remark' => "Level",
            'description' => 'SELF'
            );
        $this->db->insert('account', $ref_data);
        $this->db->insert('account', $account_data);
        $this->db->insert('profile', $profile_data);
        $this->db->insert('bank', array('user_id' => $child_id));
        $this->db->insert('kyc', array('user_id' => $child_id));
        //log_message("error", $this->db->last_query());
        $this->db->trans_complete();
        if($this->db->trans_status() == FALSE){
            return false;
        } else {
            return true;
        }
    }
    public function randuser()
    {
        $useridsamble = $this->db->select('username')->limit(1)->get('user_role')->row()->username;
        $digits = strlen($useridsamble)-3;
        $car = substr($useridsamble,0,3);
        $uscode = $car.rand(pow(10, $digits-1), pow(10, $digits)-1);
        $query = $this->db->get_where('user_role', array('username' => $uscode))->row_array();
        if (!empty($query)) {
            $this->randuser($car.rand(pow(10, $digits-1), pow(10, $digits)-1));
        }
        return $uscode;
    }
    public function login($username='',$password='')
    {
        $this->db->where('username',$username);
        $this->db->where('pwd',sha1($password));
        $this->db->where('status','Active');
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
        //log_message("error",$this->db->last_query());
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
}
?>
