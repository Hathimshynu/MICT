<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model {
    
     public function update_kyc()
    {
         $this->db->trans_begin();
         
          $data= array(
            'entry_date' => date("Y-m-d h:i:s"),
            'aadhar_num' => $this->input->post('aadhar'),
            'pan_num' => $this->input->post('pan'),
            'aadhar_img' => $this->input->post('pimage'),
            'pan_img' => $this->input->post('panimage')
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
         
          $data= array(
            'entry_date' => date("Y-m-d h:i:s"),
            'acnt_hldr_name' => $this->input->post('acc_name'),
            'acnt_num' => $this->input->post('acc_no'),
            'confirm_acnt_num' => $this->input->post('cacc_no'),
            'phone_num' => $this->input->post('phone_no'),
            'bank_ifsc' => $this->input->post('acc_ifsc'),
            'bank_name' => $this->input->post('acc_bank'),
            'bank_branch' => $this->input->post('acc_branch'),
            'g_pay' => $this->input->post('gpay'),
            'phone_pay' => $this->input->post('phonepe')
            );
            $this->db->insert('account_details',$data);
            
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
         
          $data= array(
            'entry_date' => date("Y-m-d h:i:s"),
            'name' => $this->input->post('name'),
            'user_id' => $this->input->post('userid'),
            'email' => $this->input->post('email'),
            'passward' => $this->input->post('password'),
            'gender' => $this->input->post('gender'),
            'phone' => $this->input->post('phone_no'),
            'dob' => $this->input->post('dob'),
            'country' => $this->input->post('country'),
            'address' => $this->input->post('address'),
            'state' => $this->input->post('state'),
            'pincode' => $this->input->post('pin')
            );
            $this->db->insert('userprofile_data',$data);
            
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
}

