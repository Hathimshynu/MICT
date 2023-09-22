<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coinpayments extends CI_Controller {
    
     public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','string'));
        $this->load->library(array('form_validation', 'email'));
        $this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
    }
    
    public function usdt_deposit(){
        $this->load->view('user/usdt_deposit');
    }
    
    
    public function gateway_deposit()
    {
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
            $data['mode'] = $mode;
            $this->load->view('user/gateway_deposit',$data); 
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
    // public function genpay_link(){
    //     if($this->session->userdata('micusertype')!='u')
    //     redirect('user/index','refresh'); 

    //     //$this->session->userdata('micusername');
    //     $email = $this->session->userdata('micemail');
    //     $amount = $this->input->post('amount');
    //     //Get current coin exchange rates
    //     $result = $this->coinpayments_api_call('create_transaction',array('buyer_email' => $email, 'amount' => $amount));
    //     // echo '<pre>',print_r($result,1),'</pre>';
    //     // echo '<pre>',print_r($result['result']['status_url'],1),'</pre>';
        
    //     $regmailcheck = $this->db->where('user_id',$this->session->userdata('micusername'))->where('status','Wait')->get('pay_status')->row_array();

    //     if($result['error'] == 'ok' && empty($regmailcheck)){
    //       $withdraw =array(
		  //  'user_id' => $this->session->userdata('micusername'),
		  //  'amount' => $amount,
		  //  'entry_date' => date('Y-m-d H:i:s'),
		  //  'status' => "Wait",
		  //  'txn_id' => $result['result']['txn_id']
		  //  );
    // 		$fghj = $this->db->insert('pay_status',$withdraw);
    // 		if($fghj){
    // 		  //  redirect($result['result']['checkout_url'],'refresh');
    // 		   $txn_id = $result['result']['txn_id'];
    // 		   $resultxx = $this->coinpayments_api_call('get_tx_info',array('txid' => $txn_id));
    // 		   redirect('user/gateway_deposit','refresh');
    // 		} else {
    // 		    redirect('user/index','refresh'); 
    // 		} 
    //     } else {
    //       $resultxx = $this->coinpayments_api_call('get_tx_info',array('txid' => $regmailcheck['txn_id']));
    //       // echo '<pre>',print_r($resultxx,1),'</pre>';
    //       redirect('user/gateway_deposit','refresh');
    //     }
        
        
    // }
    
    public function genpay_link(){
        if($this->session->userdata('micusertype')!='u')
        redirect('user/index','refresh'); 
    
        if ($_POST) {
               
             $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|greater_than[0]');
             $this->form_validation->set_rules('tpass', 'Transaction Password', 'trim|required|callback_checktranpass');
             
             if ($this->form_validation->run() == true) {
                    //$this->session->userdata('micusername');
                    $email = $this->session->userdata('micemail');
                    $amount = $this->input->post('amount');
                    //Get current coin exchange rates
                    $result = $this->coinpayments_api_call('create_transaction',array('buyer_email' => $email, 'amount' => $amount));
                    // echo '<pre>',print_r($result,1),'</pre>';
                    // echo '<pre>',print_r($result['result']['status_url'],1),'</pre>';
                    
                    $regmailcheck = $this->db->where('user_id',$this->session->userdata('micusername'))->where('status','Wait')->get('pay_status')->row_array();
            
                    if($result['error'] == 'ok' && empty($regmailcheck)){
                       $withdraw =array(
            		    'user_id' => $this->session->userdata('micusername'),
            		    'amount' => $amount,
            		    'entry_date' => date('Y-m-d H:i:s'),
            		    'status' => "Wait",
            		    'txn_id' => $result['result']['txn_id']
            		    );
                		$fghj = $this->db->insert('pay_status',$withdraw);
                		if($fghj){
                		   $txn_id = $result['result']['txn_id'];
                		   redirect($result['result']['checkout_url'],'refresh');
                		} else {
                		    redirect('user/index','refresh'); 
                		} 
                    } else {
                       $resultxx = $this->coinpayments_api_call('get_tx_info',array('txid' => $regmailcheck['txn_id']));
                       // echo '<pre>',print_r($resultxx,1),'</pre>';
                       redirect('user/gateway_deposit','refresh');
                    }
             } else {
                 $data['mode'] = $mode;
                $this->load->view('user/gateway_deposit',$data); 
             }
        }else{
            redirect('user/gateway_deposit','refresh');
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
    
    
    
}