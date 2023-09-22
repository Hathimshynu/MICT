<?php include 'header.php';?>

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
             <div class="card d-flex justify-content-center">
                 <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Deposit</h4>
                    <a href="<?=BASEURL?>user/deposit_history" class="btn btn-primary view-history-btn"><i class="fa-solid fa-eye me-2"></i>History</a>
                </div>
                  <div class="card-body ">
                          
    
                       
                   <div class="row" style="display: flex;justify-content: space-evenly;">
         <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
              <div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
								<div class="row d-flex justify-content-center align-items-center">

										<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
										<div class="card shining-card wallet overflow-hidden">
											<div class="card-body">
												<div class="row">
												
												    	<div class="col">
														<h4 class="">E-Wallet <i class="bi bi-arrow-clockwise"></i></h4>
														<h5 class="mb-2 number-font text-primary"><?=sprintf('%.2f',floatval($this->db->select('sum(credit - debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('user_id',$this->session->userdata('micusername'))->get("e_wallet")->row()->balance+0));?> USDT</h5>
													
													</div>
													<div class="col col-auto">
														<div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
														<img style="max-width:50%" src="">
														</div>
													</div>
												
												</div>
											</div>
										</div>
									</div>
									</div>
										</div>
									</div>
            <div class="card wallet">
        <?php
            $check_waiting_transaction = $this->db->where('user_id',$this->session->userdata('micusername'))->where('status','Wait')->get('pay_status')->row_array();
            if(empty($check_waiting_transaction)){
        ?>    
        <form target="_blank" action="<?=BASEURL?>coinpayments/genpay_link" enctype="multipart/form-data" method="post">
                  <div class="card-body">
                     <div class="">
           
                        <div class="form-group"><span style="color:red;"></span>
                           <label for="exampleInputEmail1" class="form-label">USDT <span class="text-danger"><?=form_error('amount');?></span></label>
                           <input type="text" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Transfer USDT" fdprocessedid="ijryfu" required>
                        </div>
                          <div class="form-group">
                           <label for="exampleInputEmail1" class="form-label">Transaction Password <span class="text-danger"><?=form_error('tpass');?></span></label>
                            <input type="password" name="tpass" class="form-control" id="exampleInputEmail1" fdprocessedid="79lwiv" required>
                                                            
                        </div>
                       
                     </div>
                     <div class="text-center">
                         <button type="submit" class="btn btn-success mt-4 mb-0" fdprocessedid="9a036e"><i class="fa-regular fa-circle-check me-2"></i>Deposit</button>
                         </div>
                          </div>
                     </form>                 
                     
                 <?php }else{ ?>
                 
                  <div class="card-body">
        					<div class="col-sm-12 text-center">
        					    <h3 class="text-danger">Please wait, your transaction is being processed...</h3>
        					</div>
        			 </div>	
        		
        			<?php } ?>    
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
                <th>SL.no</th>
                <th>Date</th>
                <th>Time</th>
                <th>USDT</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $deposit_history = $this->db->where('user_id',$this->session->userdata('micusername'))->where('remark','Deposit')->get('e_wallet')->result_array();
            foreach($deposit_history as $key => $deposit){
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?= date('d F Y', strtotime($deposit['entry_date'])); ?></td>
                <td><?= date('H:i:s', strtotime($deposit['entry_date'])); ?></td>
                <td><?=$deposit['credit'];?></td>
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



<script>
   $(document).ready(function () {
    $('#example').DataTable();
}); 
</script>        
<?php include 'footer.php';?>        