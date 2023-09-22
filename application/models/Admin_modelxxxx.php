<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model {
    
    public function reject_kyc_request()
    {
          $this->db->trans_begin();
            $kaccept_data=array(
                'status'=>'Rejected',
                'remark'=>$this->input->post('remark'),
                'end_date'=>date('Y-m-d H:i:s')
                );
            $this->db->where('id',$this->input->post('kreq'));
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
            $this->db->where('id',$this->input->post('hids'));
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
            $reject_data=array(
                'status'=>'Accepted',
                'end_date'=>date('Y-m-d H:i:s')
                );
            $this->db->where('id',$this->input->post('hids'));
            $this->db->update('userprofile_data',$reject_data);
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
                'status'=>'Rejected',
                'remark'=>$this->input->post('remark'),
                'end_date'=>date('Y-m-d H:i:s')
                );
            $this->db->where('id',$this->input->post('hids'));
            $this->db->update('userprofile_data',$reject_data);
        
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
        $this->db->where('pwd_hint',$password);
        $details = $this->db->get('user_role')->row_array();
        if (!empty($details)) {
            return $details;
        } else {
            return false;
        }
    }
   
    public function get_genealogy($treeid)
    { 

    $user_detail = $this->get_row_data('user_role','user_name',$treeid);
    if($user_detail['investment'] > 0 | $user_detail['user_type'] == 'a')
        $ccode="green";
    else
        $ccode="red";
    
    
     ?>
<div class="node" style="cursor: default;">
    
    <a href="<?=BASEURL?>admin/genealogy/<?=$user_detail['user_name']?>">
        <img style="border: 3px solid <?=$ccode?>" class="tree_icon with_tooltip root_node" src="<?=PROFILEURL.$user_detail['pimage']?>" ondblclick="getGenologyTree('elangorp',event);"
            data-tooltip-content="#<?=$user_detail['user_name']?>">
        <p class="demo_name_style"><?=$user_detail['name']?></p>
    </a>
</div>

<div id="tooltip_div" style="display:none;">
    <div id="<?=$user_detail['user_name']?>" class="tree_img_tree">
    <?php 
    $left_child=$this->db->select('child_id')->where('parent_id',$user_detail['user_name'])->where('position','left')->get('tree')->row()->child_id;
    if($left_child!=""){
        $left_team=$this->db->like('team',$left_child)->count_all_results('tree')+1;
    }else{
      $left_team=0;  
    }
    
    $right_child=$this->db->select('child_id')->where('parent_id',$user_detail['user_name'])->where('position','right')->get('tree')->row()->child_id;
    if($right_child!=""){
        $right_team=$this->db->like('team',$right_child)->count_all_results('tree')+1;
    }else{
      $right_team=0;  
    }
    
    ?>
        <div class="Demo_head_bg">
            <p><?=$user_detail['name']?></p>
        </div>
        <div class="body_text_tree">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <div class="pull-left">User ID</div>
                    <div class="pull-right">: <?=$user_detail['user_name']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Join Date</div>
                    <div class="pull-right">: <?=date_format(date_create($user_detail['entry_date']),"d-M-Y");?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Product Investment</div>
                    <div class="pull-right">: <?=$user_detail['investment']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Ref / Spo ID</div>
                    <div class="pull-right">: <?=$user_detail['referral_id']?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Left Count</div>
                   
                    <div class="pull-right">: <?=$left_team;?></div>
                </li>
                <li class="list-group-item">
                    <div class="pull-left">Right Count</div>
                    <div class="pull-right">: <?=$right_team?></div>
                </li>
               
            </ul>
        </div>
    </div>
</div>

<?php }

    public function get_all_parent_users($table,$field,$child, $array)
    {

        $parents = $this->get_row_data($table,$field,$child);
        if(count($array) > 1){
            $myteam = explode(',',$child, $parents['team']);
        }else{
            $myteam = explode(',', $parents['team']);
        }
        
        return $myteam;
    }
    

  

}

?>