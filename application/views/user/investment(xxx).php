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
       .ai{
    font-size:12px!important;
}
   }

.mode-select{
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e") !important;
}

 .button-container {
    display: inline-block;
    border-radius: 5px;
  }

 
@media screen and (max-width: 500px){
.ai {
    font-size: 13px!important;
    width: 119px;
}
    
}

.label-dzbd7lyV.snap-dzbd7lyV.end-dzbd7lyV {
    border-radius: 12px 0 0 12px;
    right: 0;
    visibility: hidden!important;
}

@media screen and (max-width:576px){
    .ai-on-off-switch{
        margin-top:10px !important;
    }
}

.ai-on-off-switch input:checked {
    background-color: #4cd137 !important;
    border-color: #4cd137 !important;
    opacity: 10 !important;
}
.form-check-input:checked[type="checkbox"] {
    background-image: url("data:image/svg+xml,%3csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3e%3crect x='1' y='1' width='18' height='18' rx='9' fill='%23FFFFFF' stroke='%23000000' stroke-width='2'/%3e%3c/svg%3e") !important;
}
</style>               
               
               
      <div class="container-fluid content-inner pb-0">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header d-block d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-between">
                    <h4 class="card-title mb-0">AI Trading </h4>
                    <div class="ai-on-off-switch">
                           <?php $status=$this->db->select('trading_status')->where('username',$this->session->userdata('micusername'))->get('user_role')->row()->trading_status;
           
           ?>
                     <span class="me-2" style="color:black;font-weight:600;">AI Trading ON/OFF</span> <div class="form-check form-switch form-switch-custom form-switch-danger rounded-pill" style="width: 65px;">
                         
                     <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck13" style="width: 65px; height: 25px; margin-top: 1px;" <?php echo ($status == 'Enable') ? 'Checked disabled' : ''; ?>>
                   
                     </div>
                </div>
                    
                   
                </div>
                
  
                
                  <div class="card-body">
                   <div class="row">
         <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
              <div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
								<div class="row d-flex justify-content-center align-items-center">
      <!--<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">-->
						<!--				<div class="card wallet overflow-hidden">-->
						<!--					<div class="card-body">-->
						<!--						<div class="row">-->
						<!--						  	<div class="col">-->
						<!--								<h4 class="">E-wallet</h4>-->
						<!--								<h5 class="mb-2 number-font"><?=sprintf('%.2f',floatval($this->db->select('sum(credit - debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('user_id',$this->session->userdata('micusername'))->get("e_wallet")->row()->balance+0));?> USDT</h5>-->
											
						<!--							</div>-->
						<!--						<div class="col col-auto">-->
						<!--								<div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">-->
						<!--									<i class="fe fe-dollar-sign text-white mb-5 "></i>-->
						<!--								</div>-->
						<!--							</div>-->
						<!--						</div>-->
						<!--					</div>-->
						<!--				</div>-->
						<!--			</div>-->
									<div class="col-6 col-md-12  col-xl-6">
										<div class="card shining-card wallet overflow-hidden">
											<div class="card-body">
												<div class="row">
								  

								<?php $balance =  $this->db->select("(SUM(credit) - SUM(debit)) as balance")->where('user_id', $this->session->userdata('micusername'))->get('e_wallet')->row()->balance + 0;?>
												    	<div class="col">
														<h4 class="ai" style="font-size:15px">E-Wallet <i class="bi bi-arrow-clockwise"></i></h4>
														<h5 class="mb-2 number-font text-primary" ><?=sprintf('%.2f',floatval($balance));?> USDT</h5><a href="<?=BASEURL?>user/ai_trading_transfer_history"><span style="font-size:10px">Transfer History</span></a>
													
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
										<div class="col-6 col-md-12  col-xl-6">
										<div class="card shining-card wallet overflow-hidden">
											<div class="card-body">
												<div class="row">
												    	<div class="col">
												    	    <?php $tradbal =  $this->db->select("(SUM(credit) - SUM(debit)) as balance")->where('user_id', $this->session->userdata('micusername'))->get('trading_wallet')->row()->balance + 0;?>
														<h4 class="ai" style="font-size:15px">AI Trading Wallet <i class="bi bi-arrow-clockwise"></i></h4>
														<h5 class="mb-2 number-font text-primary" ><?=$tradbal;?> USDT</h5><a href="<?=BASEURL?>user/portfolio"><span style="font-size:12px">View Portfolio</span></a>
													
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
        <form id="deposit">
                  <div class="card-body">
                     <div class="">
                         <!--<div class="text-center">-->
                         <!--    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&amp;data=TRZbX9BqdY3dYEAUn3LdQUm2Z9VsVeiS37" alt="" title="">-->
                         <!--</div>-->
                         
                        <!--<div class="form-group">-->
                        <!--   <label for="exampleInputEmail1" class="form-label">Wallet Address </label>-->
                        <!--    <input type="hidden" name="withdraw_wallet" value="<?=$address['withdraw_wallet']?>" class="form-control" readonly="" fdprocessedid="4bitmu">-->
                        <!--</div>-->
                        
                        <input type="hidden" name="username" value="<?=$this->session->userdata('micusername');?>" class="form-control"  fdprocessedid="4bitmu">
                        <input type="hidden" name="mode" value="<?=$mode;?>" class="form-control"  fdprocessedid="4bitmu">
                            <input type="hidden" value="<?=$address['private_key']?>" class="form-control" readonly="" fdprocessedid="4bitmu">
                   
                            
                              <div class="form-group">
                    <label class="form-label">Select Slab</label>
                    <select name='slab' id="slabSelect" class="form-select mb-3 shadow-none">

                    </select>
                </div>
                
                <?php
                function isDisableDay() {
                    // Get the current day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                    $currentDayOfWeek = date('w');
                
                    // Check if the current day is not Friday (index 5)
                    return $currentDayOfWeek !== 5;
                }
                ?>
                
                  <div class="form-group">
                      <div id="error-message" style="color: red;"></div>
                    <label class="form-label">Select package</label>
                    <input type='hidden' name='package_id' id='package_id'>
                    <select name='package' id="packageSelect" class="form-select mb-3 shadow-none">
      
                    </select>
                </div>
                        <div class="form-group"><span style="color:red;"></span>
                           <label for="exampleInputEmail1" class="form-label">Amount <span class="text-danger"><?=form_error('amount');?></span></label>
                           <input type="number" name="amount" readonly class="form-control" id="exampleInputEmail1"  fdprocessedid="ijryfu">
                        </div>
                        
                      
                        <!--  <div class="form-group">-->
                        <!--   <label for="exampleInputEmail1" class="form-label">Transaction Password <span class="text-danger"><?=form_error('tpass');?></span></label>-->
                        <!--    <input type="password" name="tpass" class="form-control" id="exampleInputEmail1" fdprocessedid="79lwiv">-->
                                                            
                        <!--</div>-->
                       
                     </div>
                     <div class="text-center">
                         <button type="submit" class="btn btn-info  mt-4 mb-0" fdprocessedid="9a036e"><i class="fa-regular fa-circle-check me-2"></i>Transfer</button>
                         </div>
                     </form>                  </div>
               </div>
            </div>
           
                              <div id="QR" class="col-lg-6 col-xl-6 col-md-12 col-sm-12 d-flex justify-content-center">
                                  
                                  <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
  {
  "interval": "1h",
  "width": 425,
  "isTransparent": false,
  "height": 450,
  "symbol": "BITSTAMP:USDTUSD",
  "showIntervalTabs": true,
  "locale": "in",
  "colorTheme": "light"
}
</script>
</div>
<!-- TradingView Widget END -->
                                  
           
      
                 
                  </div>
               </div>
        
               
                  </div>
               </div>
            </div>
        </div>
        

       
        
    
        </div>  
        
        

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>



<!--TRANSFER TRADE WALLET-->
<script>
  $('#deposit').submit(function(event) {
    event.preventDefault();
    var slab = $('#slabSelect').val();
    var package = $('#packageSelect').val();
    var package_id = $('#package_id').val();
    
    
    $.ajax({
      url: '<?php echo base_url('user/transfer_trade_wallet'); ?>',
      type: 'POST',
      data: { slab:slab, package:package, package_id:package_id },
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



<!--on page load show last selected slab or default slab1  -->
<script>

$(document).ready(function() {
    
      // Check if today is Friday, and disable the dropdown if not
    var currentDate = new Date();
    if (currentDate.getDay() !== 5) { // Friday has index 5
        $('#slabSelect').prop('disabled', true);
    }
    
    // Define the function to populate packages based on the selected slab
    function populatePackages(selectedSlab) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('user/get_slab_packages'); ?>',
            data: { slab: selectedSlab },
            success: function(response) {
                var packages = JSON.parse(response);
                var packageSelect = $('#packageSelect');
                var packageid = $('#package_id');
                
                packageSelect.empty();
                packageid.empty();

                $.each(packages, function(index, packageInfo) {
                    packageSelect.append($('<option>', {
                        value: packageInfo.package,
                        text: packageInfo.package,
                        'data-package-id': packageInfo.id // Set the data-package-id attribute
                    }));
                });

                packageSelect.trigger('change'); // Trigger change event to display default package
            }
        });
    }

    // Run the populatePackages function on page load
    populatePackages($('#slabSelect').val());

    $('#slabSelect').on('change', function() {
        var selectedSlab = $(this).val();
        populatePackages(selectedSlab);
    });

    $('#packageSelect').on('change', function() {
        var selectedPackage = $(this).val();
        var selectedPackageId = $(this).find(':selected').data('package-id'); // Get the package ID
        
        $('#exampleInputEmail1').val(selectedPackage);
        $('#package_id').val(selectedPackageId); // Set the package ID in the package_id field
    });

    // Define the function to populate the slab dropdown
    function populateSlabDropdown() {
        $.ajax({
            url: '<?=BASEURL?>user/get_slab', 
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var slabSelect = $('#slabSelect');

                slabSelect.empty();

                $.each(data, function(index, item) {
                    var displayText = "Slab " + item.slab; // Construct the display label
                    slabSelect.append($('<option>', {
                        value: item.slab,
                        text: displayText
                    }));
                });

                slabSelect.val(slabSelect.val()); // Select the value after repopulating the dropdown
                slabSelect.trigger('change'); // Trigger the change event to populate packages
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }

    // Run the populateSlabDropdown function on page load
    populateSlabDropdown();
    
    
    // 
    
    
    
    
    
    