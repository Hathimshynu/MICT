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
   @media screen and (max-width:500px){
       .w-cardbody{
           padding: 12px !important;
       }
   }
</style>
<div class="container-fluid content-inner pb-5">
   <div class="row">
      <div class="col-lg-12">
         <div class="card ">
            <div class="card-header">
               <h4 class="card-title mb-0">Withdraw</h4>
            </div>
            <div class="card-body w-cardbody">
               <div class="row d-flex justify-content-center">
                  <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                           <div class="row d-flex justify-content-center align-items-center">
                              <div class="col-12 col-lg-8">
                                 <div class="card wallet overflow-hidden shining-card">
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="text-center">
                                              <img style="height:50px;" class="img-responsive" src="<?=BASEURL?>assets/images/w-wallet.png">
                                                   <?php   $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('username',$this->session->userdata('micusername'))->get('account')->row()->balance+0; ?>
                                             <h4 class="text-center">Withdraw-wallet</h4>
                                             <h5 class="mb-2 mt-1 number-font text-primary text-center"><?=(int)($balance * 100) / 100;;?> USDT</h5>
                                          </div>
                                          <div class="col col-auto">
                                             <div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
                                                <i class="fe fe-dollar-sign text-white mb-5 "></i>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     <div class="card wallet">
                        <div class="card-body">
              
                           <form action="<?=BASEURL?>user/withdraw" enctype="multipart/form-data" method="post">
                              <div class="">
                                 <div class="form-group">
                                    <label for="amount" class="form-label">Amount <span class="text-danger"><?=form_error('amount');?></span></label>
                                    <input type="text" name="amount" value="" placeholder="Enter Amount" class="form-control">
                                 </div>
                                 <div class="form-group">
                           <label for="exampleInputEmail1" class="form-label">Transaction Password <span class="text-danger"><?=form_error('tpass');?></span></label>
                            <input type="password" name="tpass" class="form-control" placeholder="Enter transaction password" id="" fdprocessedid="79lwiv" >
                                                            
                        </div>
                              </div>
                              <div class="text-center">
                                 <button type="submit" class="btn btn-success mt-2 mt-sm-2 mt-md-3 mt-lg-4 mb-0" fdprocessedid="9a036e"><i class="fa-regular fa-circle-check me-2"></i>Submit</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Withdrawal History</h4>
            </div>
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Date & Time</th>
                     <th>Amount</th>
                     <th>Admin charge</th>
                     <th>Payable</th>
                     <th>Status</th>
                     <th>Accepted/Rejected Date</th>
                     <th>Remark</th>
                  </tr>
               </thead>
               <tbody>
                <?php
                $count=1;
                $history = $this->db->where('username',$this->session->userdata('micusername'))->get('withdraw_request')->result_array();
                foreach($history as $key => $his)
                {
                    if($his['status'] == 'Request'){
                        $status = 'Processing';
                    }else{
                        $status = $his['status'];
                    }
                    
                    if($his['accepted_date'] == NULL){
                        $acc = '--';
                    }else{
                        $acc = $his['accepted_date'];
                    }
                ?>
                  <tr>
                     <td><?=$count++;?></td>
                     <td><?=$his['entry_date'];?></td>
                     <td><?=$his['usdt'];?></td>
                     <td><?=$his['service_charge'];?></td>
                     <td><?=$his['balance_usdt'];?></td>
                     <td><?=$status;?></td>
                     <td><?=$acc;?></td>
                     <td><?=$his['remark'];?></td>
                  </tr>
                 <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php include 'footer.php';?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>
   $(document).ready(function () {
    $('#example').DataTable();
   }); 
</script> 
<script>
   $(document).ready(function () {
    $('#example2').DataTable();
   }); 
</script> 

