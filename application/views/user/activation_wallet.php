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
</style>               
               
               
      <div class="container-fluid content-inner pb-5">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Panel Activation Wallet</h4>
                </div>
                  <div class="card-body">
                   <div class="row">
         <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
              <div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
								<div class="row d-flex justify-content-center align-items-center">
     
									<div class="col-lg-7 col-md-12 col-sm-12 col-xl-7">
										<div class="card shining-card wallet overflow-hidden">
											<div class="card-body p-3">
												<div class="row">
												    	<div class="col">
														<h4 class="">Activation Amount<i class="bi bi-arrow-clockwise"></i></h4>
														<h5 class="mb-2 mt-2 number-font text-primary text-center">20 USDT</h5>
													
													</div>
													<div class="col col-auto">
														<div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
															<!--<i class="fe fe-dollar-sign text-white mb-5 "></i>-->
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
        <form id="deposit">
                  <div class="card-body">
                     <div class="">
                         <!--<div class="text-center">-->
                         <!--    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&amp;data=TRZbX9BqdY3dYEAUn3LdQUm2Z9VsVeiS37" alt="" title="">-->
                         <!--</div>-->
                         
                        <div class="form-group">
                           <label for="exampleInputEmail1" class="form-label">Wallet Address </label>
                            <input type="text" name="withdraw_wallet" value="<?=$address['withdraw_wallet']?>" class="form-control" readonly="" fdprocessedid="4bitmu">
                        </div>
                        
                        <input type="hidden" name="username" value="<?=$this->session->userdata('micusername');?>" class="form-control"  fdprocessedid="4bitmu">
                        <input type="hidden" name="mode" value="<?=$mode;?>" class="form-control"  fdprocessedid="4bitmu">
                            <input type="hidden" value="<?=$address['private_key']?>" class="form-control" readonly="" fdprocessedid="4bitmu">
                            <!--<div class="mb-3">-->
                            <!--    <label for="mode" class="form-label">Mode</label>-->
                            <!--     <div class="form-group d-flex">-->
                            <!--    <div class="form-check d-block me-4">-->
                            <!--        <input class="form-check-input" type="radio" name="mode" value="Forex" id="flexRadioDefault1">-->
                            <!--        <label class="form-check-label" for="flexRadioDefault1">-->
                            <!--            Forex-->
                            <!--        </label>-->
                            <!--    </div>-->
                            <!--    <div class="form-check d-block">-->
                            <!--        <input class="form-check-input" type="radio" name="mode" value="Crypto" id="flexRadioDefault2">-->
                            <!--        <label class="form-check-label" for="flexRadioDefault2">-->
                            <!--            Crypto-->
                            <!--        </label>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--</div>-->
                        <div class="form-group"><span style="color:red;"></span>
                           <label for="exampleInputEmail1" class="form-label">USDT <span class="text-danger"><?=form_error('amount');?></span></label>
                           <input type="number" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Enter Transfer USDT" fdprocessedid="ijryfu">
                        </div>
                        <!--  <div class="form-group">-->
                        <!--   <label for="exampleInputEmail1" class="form-label">Transaction Password <span class="text-danger"><?=form_error('tpass');?></span></label>-->
                        <!--    <input type="password" name="tpass" class="form-control" id="exampleInputEmail1" fdprocessedid="79lwiv">-->
                                                            
                        <!--</div>-->
                       
                     </div>
                     <div class="text-center">
                         <button type="submit" class="btn btn-success mt-4 mb-0" fdprocessedid="9a036e"><i class="fa-regular fa-circle-check me-2"></i>Deposit</button>
                         </div>
                     </form>                  </div>
               </div>
            </div>
           
                              <div id="QR" class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                  <div class="card wallet text-center">
                      
                     <!--<div class="card-header ">-->
                        <!--  <h4 class="card-title" >Investment</h4>-->
                        <!--</div>-->
                        <div class="card-body" style="mt-20">
                           <!--<img style="width:300px;height:465px;" src="https://backofficee.com/g_glob/trade/assets/adminwallet/" title="Link to Google.com"> -->
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?=$address['withdraw_wallet']?>" alt="" title="">
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
             <div class="card ">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Panel Activation History</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Date</th>
                <th>Time</th>
                <th>Mode</th>
                <th>USDT</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $deposit_history = $this->db->where('username',$this->session->userdata('micusername'))->get('deposit')->result_array();
            foreach($deposit_history as $key => $deposit){
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?= date('d F Y', strtotime($deposit['entry_date'])); ?></td>
                <td><?= date('H:i:s', strtotime($deposit['entry_date'])); ?></td>
                <td><?=$deposit['mode'];?></td>
                <td><?=$deposit['usdt'];?></td>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

<script>
  $('#deposit').submit(function(event) {
    event.preventDefault();
    var mode = $("input[name='mode']").val();
    var amount = $("input[name='amount']").val();
    var username = $("input[name='username']").val();
    $.ajax({
      url: '<?php echo base_url('user/user_deposit'); ?>',
      type: 'POST',
      data: { mode:mode, amount:amount, username:username },
      dataType: 'json',
      success: function(response) {
         
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
                title: "Error!",
                html: response.message.replace(/<\/?span[^>]*>/g, ''),
                icon: "error",
            });
        }
      },
        error: function(xhr, status, error) {
            Swal.fire({
                title: "Error!",
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
<?php include 'footer.php';?>        