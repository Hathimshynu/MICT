<?php include 'header.php';?>


<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="<?=BASEURL?>assets/css/registration.css" />

<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>
    div#example_wrapper {
    margin: 20px;
}
.col-sm-12 {
    overflow: auto;
}

.mode-select{
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e") !important;
}
.upi-card{
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;
}
.view-history-btn{
    background-color: #3A6CD1 !important;
    border-color: #3A6CD1 !important;
    border-radius: 24px !important;
    box-shadow:none !important;
}
</style>               
               
               
      <div class="container-fluid content-inner pb-5">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Deposit</h4>
                    <a href="<?=BASEURL?>user/deposit_history" class="btn btn-primary view-history-btn"><i class="fa-solid fa-eye me-2"></i>History</a>
                </div>
                  <div class="card-body">
                      
                       
                   <div class="row">
         <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
              <div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
								<div class="row d-flex justify-content-center align-items-center">
    
								<h6 class="mb-2 number-font text-danger">*Make payment as USDT.TRC20 to below wallet address and submit Tx ID here! Your deposit will be activated within minutes..</h6> <br> <p style="color:red;font-size:20px;">The Minimum Deposit 30USDT </p>
										
									</div>
										</div>
									</div>
            <div class="card wallet">
        <form action="<?=BASEURL?>user/mdeposit" enctype="multipart/form-data" method="post">
                  <div class="card-body">
                     <div class="">
  
                          <div class="form-group"><span style="color:red;"></span>
                           <label for="exampleInputEmail1" class="form-label">E-wallet Balance<h5 class="mb-2 number-font text-primary"><?=sprintf('%.2f',floatval($this->db->select('sum(credit - debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('user_id',$this->session->userdata('micusername'))->get("e_wallet")->row()->balance+0));?> USDT</h5>
													</label>
                           
                        </div>
                        
                        <div class="form-group"><span style="color:red;"></span>
                           <label for="exampleInputEmail1" class="form-label">USDT Amount <span class="text-danger"><?=form_error('amount');?></span></label>
                           <input type="text" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Transfered USDT" fdprocessedid="ijryfu" required>
                        </div>
                          <div class="form-group">
                           <label for="exampleInputEmail1" class="form-label">TXid <span class="text-danger"><?=form_error('utr');?></span></label>
                            <input type="text" name="utr" class="form-control" id="exampleInputEmail1" fdprocessedid="79lwiv" required>
                                                            
                        </div>
                       
                     </div>
                     <div class="text-center">
                         <button type="submit" class="btn btn-success mt-4 mb-0" fdprocessedid="9a036e"><i class="fa-regular fa-circle-check me-2"></i>Deposit</button>
                         </div>
                     </form>                  </div>
               </div>
            </div>
           
                              <div id="QR" class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                  <div class="card wallet text-center upi-card">
                      
                     <!--<div class="card-header ">-->
                        <!--  <h4 class="card-title" >Investment</h4>-->
                        <!--</div>-->
                        <div class="card-body" style="mt-20">
                            <h3 class="text-center mb-2" style="color:#2E3B7D;font-weight:600;">QR Code</h3>

                           <img style="height:80%; width:80%;" src="<?=BASEURL?>assets/images/mict_admin_qr.png" title=""> 
                            <div class="container-copy text-center w-50 mt-3">
                                    <div class="copy-text gradient-border" id="gradient-border">
                                        <input type="text" class="text" value="TX4JP9BK8EAJvp7rLXhMQXmTHQPoVQ7aXM">
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Click to Copy" aria-label="Click to Copy"><i class="fa fa-clone copy-icon"></i></button>
                                    </div>
                                </div>
                        </div>
                     </div>
                  </div>
               </div>
                  </div>
               </div>
            </div>
        </div>
        
         <div class="row mb-5">
          <div class="col-lg-12">
             <div class="card ">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Wallet Transaction History</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">SL.no</th>
                <th class="text-center">Date</th>
                <th class="text-center">Time</th>
                <th class="text-center">USDT</th>
                <th class="text-center">TXid</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $deposit_history = $this->db->where('user_id',$this->session->userdata('micusername'))->get('admin_request')->result_array();
            foreach($deposit_history as $key => $deposit){
            ?>
            <tr>
                <td class="text-center"><?=$count++?></td>
                <td class="text-center"><?= date('d F Y', strtotime($deposit['entry_date'])); ?></td>
                <td class="text-center"><?= date('H:i:s', strtotime($deposit['entry_date'])); ?></td>
                <td class="text-center"><?=$deposit['wallet_value'];?></td>
                <td class="text-center"><?=$deposit['utr'];?></td>
                <td class="text-center"><?=$deposit['status'];?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
             </div>
          </div>
      </div>
        </div>  
        
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<!-- Script for Copy to Clipboard -->
<script type="text/javascript">
    let copyText = document.querySelector(".copy-text");
copyText.querySelector("button").addEventListener("click", function () {
	let input = copyText.querySelector("input.text");
	input.select();
	document.execCommand("copy");
	copyText.classList.add("active");
	window.getSelection().removeAllRanges();
	setTimeout(function () {
		copyText.classList.remove("active");
	}, 3000);
});

</script>

<script>
   $(document).ready(function () {
    $('#example').DataTable();
}); 
</script>        
<?php include 'footer.php';?>        