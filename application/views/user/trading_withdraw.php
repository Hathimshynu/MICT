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
   
     /* Hide the up and down arrows in number input */
  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button,
  input[type="number"]::-webkit-input-placeholder {
    -webkit-appearance: none;
    appearance: none;
    margin: 0; /* Optional, for some versions of iOS */
  }

  /* Hide the up and down arrows in Firefox */
  input[type="number"] {
    -moz-appearance: textfield;
  }
  
  
</style>


<div class="container-fluid content-inner pb-5">
   <div class="row">
      <div class="col-lg-12">
         <div class="card ">
            <div class="card-header">
               <h4 class="card-title mb-0">Trading Withdraw</h4>
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
                                                   <?php   $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('user_id',$this->session->userdata('micusername'))->get('trading_wallet')->row()->balance+0; ?>
                                             <h4 class="text-center">AI Trading-wallet</h4>
                                             <h5 class="mb-2 mt-1 number-font text-primary text-center"><?=$balance;?> USDT</h5>
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
              
                           <form id="deposit" enctype="multipart/form-data">
                              <div class="">
                                 <div class="form-group">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" id='amount' name="amount" value="" placeholder="Enter Amount" class="form-control">
                                 </div>
                                 <div class="form-group">
                           <!--<label for="exampleInputEmail1" class="form-label">Transaction Password <span class="text-danger"><?=form_error('tpass');?></span></label>-->
                           <!-- <input type="password" name="tpass" class="form-control" id="exampleInputEmail1" fdprocessedid="79lwiv" required>-->
                                                            
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
               <h4 class="card-title mb-0">Trading Withdrawal History</h4>
            </div>
              <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>User ID</th>
                     <th>Date & Time</th>
                     <th>Withdraw Amount</th>
                  </tr>
               </thead>
               <tbody>
                   <?php $his= $this->db->where('username',$this->session->userdata('micusername'))->where('remark','AI Withdraw')->get('account')->result_array();
                   $count=1;
                   foreach($his as $key=>$row){?>
                   
                  <tr>
                     <td><?=$count++;?></td>
                     <td><?=$row['username'];?></td>
                     <td><?=$row['entry_date'];?></td>
                     <td><?=$row['credit']?></td>
                  </tr>
                  <?php }?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php include 'footer.php';?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>



<script>
  $('#deposit').submit(function(event) {
    event.preventDefault();
    var amount = $('#amount').val();
    
    $.ajax({
      url: '<?=BASEURL?>user/withdraw_ai_trading',
      type: 'POST',
      data: { amount:amount},
      dataType: 'json',
      success: function(response) {
        //   console.log(response); 
        if (response.status === 'success') {
          Swal.fire({
            title: "Success!",
            text: response.message,
            icon: "success",
          }).then(function() {
            location.reload();
          });
        } 
        else {
            Swal.fire({
                // title: "Error!",
                html: response.message.replace(/<\/?span[^>]*>/g, ''),
                icon: "error",
            });
        }
      },
        error: function(xhr, status, error) {
            Swal.fire({
                // title: "Error!",
                text: "An error occurred while processing the request.",
                icon: "error",
            });
        }
    });
  });
</script>




<script>
   $(document).ready(function () {
    $('#example').DataTable();
   }); 
</script> 


