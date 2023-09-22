<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>



<style>
.modal-dialog-scrollable .modal-content {
    max-height: 100%;
    overflow: hidden;
    background: white!important;
}
    div#example_wrapper {
    margin: 20px;
}
.col-sm-12 {
    overflow: auto;
}

.forex-card{
    background-color: transparent !important;
    /*background-image: linear-gradient(161deg, #FF971D 26%, #FEF130 100%) !important;*/
    background-image: linear-gradient(161deg, #1d67ff 26%, #ea30fe 100%) !important;
}

.card-heading{
    background:transparent !important;
    padding:10px 20px;
    /*border-bottom:1px solid grey;*/
}

.avatar {
    height: 50px;
    width: 50px;
    background-color: black;
    border-radius: 4px;
    display:flex;
    justify-content:center;
    align-items:center;
}
.avatar .trophy-icon{
    font-size:26px !important;
    color:#FEF130 !important;
}
.price-show{
    /*color: #89e711 !important;*/
    color:#FEF130 !important;
    font-weight:800;
    text-shadow: 1px 2px 4px black;
}
.pack-features{
    text-shadow: 0px 1px 2px black;
    font-weight: 600;
    font-size: 14px;
}
.horizontal-ruler{
    margin:0 !important;
    margin-bottom:6px !important;
}

.total-invested-amount{
    background-color: #FF971D;
    font-size: 25px !important;
    color:black !important;
    font-weight: 900;
    padding: 5px 24px;
    border-radius: 10px;
}

@media screen and (max-width:500px){
    .total-invested-amount{
        font-size: 20px !important;
         padding: 5px 11px !important;
    }
    
}

.accordion-item {
    border:none !important;
    background-color: transparent !important;
}
.accordion-button {
    padding: 1rem 4px !important;
    text-shadow: 1px 2px 4px black !important;
}
.accordion-button:not(.collapsed) {
    color: white !important;
    text-shadow: 1px 2px 4px black !important;
}
.accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
}

.history-label{
    margin-bottom: 0px;
    background-color: #C4E538;
    padding: 8px 10px;
    border: 1px solid #f2aa3f;
    border-radius: 20px;
    color: #000018;
    font-weight: 400;
    font-size: 15px;
}

  /* Webkit-based browsers (Chrome, Safari) */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button,
    input[type="search"]::-webkit-search-cancel-button,
    input[type="search"]::-webkit-search-decoration {
        -webkit-appearance: none;
        appearance: none;
        display: none;
    }

    /* Mozilla-based browsers (Firefox) */
    input[type="number"]::-moz-inner-spin-button,
    input[type="number"]::-moz-outer-spin-button {
        appearance: none;
        display: none;
    }

</style>

<?php include 'header.php';?>

      <div class="container-fluid content-inner pb-0">

    
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between p-3">
             <h4 class="d-flex align-items-center">Wallet</h4>
             <div>
               <button type="button" class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">

                     Wallet Transfer

                     </button>
                     
                     <!--<a href="<?=BASEURL?>user/peer_to_peer"><button type="button" class="btn btn-info mt-2">-->

                     <!--ID to ID Transfer-->

                     <!--</button></a> -->
                     </div>
         </div>
         
        </div>
        
    </div>
     <div class="row">
         
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         	            <div class="card  wallet overflow-hidden" style="height:161px">
        					<div class="card-body" style="display:flex">
        					<div>
        					    <?php $E_wallet =  $this->db->select("(SUM(credit) - SUM(debit)) as balance")->where('user_id', $this->session->userdata('micusername'))->get('e_wallet')->row()->balance + 0;?>
        					    	<h4 class="">E-Wallet </h4>
        								<h5 class="mb-2 number-font text-primary"><?=$E_wallet;?> USDT</h5>
        					</div>
        							
        						
        						
        					</div>
        				</div>
         	        </div>
         

         	        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         	            <div class="card  wallet overflow-hidden" style="height:161px">
        					<div class="card-body" style="display:flex;">
        					
        							
        									<div>
        									    <?php $trade_bal =  $this->db->select("(SUM(credit) - SUM(debit)) as balance")->where('user_id', $this->session->userdata('micusername'))->get('trading_wallet')->row()->balance + 0;?>
        					    		<h4 class="">Trading Wallet </h4>
        								<h5 class="mb-2 number-font text-primary"><?=$trade_bal;?>USDT</h5>
        					</div>
        						
        					</div>
        				</div>
         	        </div>
         	  <!--      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">-->
         	  <!--          <div class="card  wallet overflow-hidden" style="height:161px">-->
        				<!--	<div class="card-body" style="display:flex;">-->
        					
        							
        				<!--					<div>-->
        				<!--	    		<h4 class="">Trading Level Wallet </h4>-->
        				<!--				<h5 class="mb-2 number-font text-primary">2000.06 USDT</h5>-->
        				<!--	</div>-->
        						
        				<!--	</div>-->
        				<!--</div>-->
         	  <!--      </div>-->
         	       
         	          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         	            <div class="card  wallet overflow-hidden" style="height:161px">
        					<div class="card-body" style="display:flex;">
        				
        							
        								<div>
        								     <?php $game_bal =  $this->db->select("(SUM(credit) - SUM(debit)) as balance")->where('username', $this->session->userdata('micusername'))->get('game_wallet')->row()->balance + 0;?>
        					    		<h4 class="">Gaming Wallet</h4>
        								<h5 class="mb-2 number-font text-primary"><?=$game_bal;?>USDT</h5>
        					</div>
        								
        							
        					
        					</div>
        				</div>
         	        </div>
         	  <!--      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">-->
         	  <!--          <div class="card  wallet overflow-hidden" style="height:161px">-->
        				<!--	<div class="card-body" style="display:flex;">-->
        					
        								
        				<!--					<div>-->
        				<!--	    		<h4 class="">Gaming Level Wallet </h4>-->
        				<!--				<h5 class="mb-2 number-font text-primary">2000.06 USDT</h5>-->
        				<!--	</div>-->
        							
        						
        				<!--	</div>-->
        				<!--</div>-->
         	  <!--      </div>-->
         	         <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         	            <div class="card  wallet overflow-hidden" style="height:161px">
        					<div class="card-body" style="display:flex;">
        					
        							
        									<div>
        									    <?php $acou_bal =  $this->db->select("(SUM(credit) - SUM(debit)) as balance")->where('username', $this->session->userdata('micusername'))->get('account')->row()->balance + 0;?>
        					    			<h4 class="">Withdraw Wallet </h4>
        								<h5 class="mb-2 number-font text-primary"><?=$acou_bal;?> USDT</h5>
        					</div>
        						
        						
        					</div>
        				</div>
         	        </div>
         	        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         	            <div class="card  wallet overflow-hidden" style="height:161px">
        					<div class="card-body" style="display:flex;">
        						
        								
        									<div>
        									     <?php $stack_bal =  $this->db->select("(SUM(credit)) as balance")->where('user_id', $this->session->userdata('micusername'))->get('stacking_wallet')->row()->balance + 0;?>
        					    			<h4 class="">Stacking Wallet</h4>
        								<h5 class="mb-2 number-font text-primary"><?=$stack_bal;?>USDT</h5>
        					</div>
        							
        						
        					</div>
        				</div>
         	        </div>
         	    </div>
   
 </div>         
    
 



<!-- Modal -->

      <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">

         <div class="modal-dialog modal-dialog-scrollable" role="document">

            <div class="modal-content">

               <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalScrollableTitle">Wallet Transfer</h5>

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                  </button>

               </div>

               <div class="modal-body">
                   
                   <div class="row">
         <div class="col-lg-12">
           
            
                  <div class="card-body">
                      
                          <form id="deposit" enctype="multipart/form-data" method="post">
                  <div class="card-body">
                     <div class="">
                        <div class="row">
                      <div class="col-lg-6">
                           <div class="form-group">
                           <label for="" class="form-label">Transfer From  </label>
                            <div class="input-group mb-3">
                         
                          <select name='from_wallet' id='from_wallet' class="form-select" id="inputGroupSelect01">
                            <option selected value=''>Select</option>
                            <option value="e_wallet">E-Wallet</option>
                            <!--<option value="trading_wallet">Trading Wallet</option>-->
                            <option value="withdraw_wallet">Withdraw Wallet</option>
                            <!--<option value="gaming_wallet">Gaming Wallet</option>-->
                            <!-- <option value="stacking_wallet">Stacking Wallet</option>-->
                          </select>
                        </div>
                        </div>
                    
                      </div>
                      
                       <div class="col-lg-6">
                           <div class="form-group">
                           <label for="" class="form-label">Transfer To </label>
                             <div class="input-group mb-3">
                         
                          <select name='to_wallet' id='to_wallet' class="form-select" id="inputGroupSelect02">
                            <option selected value=''>Select</option>
                            
                            <option value="e_wallet">E-Wallet</option>
                            <option value="withdraw_wallet">Withdraw Wallet</option>
                            <!--<option value="trading_wallet">Trading Wallet</option>-->
                            <!--<option value="trading_level_wallet">Trading Level Wallet</option>-->
                            <option value="gaming_wallet">Gaming Wallet</option>
                             <!--<option value="stacking_wallet">Stacking Wallet</option>-->
                          </select>
                        </div>
                        </div>
                    
                      </div>
                      </div>
                       
                        <div class="form-group"><span style="color:red;"></span>
                           <label for="" class="form-label">USDT</label>
                           <input type="number" name="amount" class="form-control" id="" placeholder="Enter Transfer USDT">
                        </div>
                         
                       
                     </div>
                     <div class="text-center">
                         <button type="submit" id="btnbuton" class="btn btn-info mt-4 mb-0" ><i class="fa-regular fa-circle-check me-2"></i>Submit</button>
                         </div>
                     </form>   
                      
                      
                     
                  </div>
               </div>
       
    </div>

                
               </div>

               <!--<div class="modal-footer">-->

               <!--   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->

               <!--   <button type="button" class="btn btn-primary">Save changes</button>-->

               <!--</div>-->

            </div>

         </div>

      </div>

  <!--Error Popup-->
<script>
   

		$(document).on('click', '#investment-failed', function(e) {
			swal(
				'Sorry! &#128528;',
				'After panel activation only, you will be able to make investments.',
				'error'
			)
		});

	
</script>



<!--same wallet transfer hide-->
<script>
    $(document).ready(function () {
    // Initial hide/show based on the selected option in 'from_wallet'
    updateToWalletOptions();

    // Add an event listener to 'from_wallet' dropdown
    $('#from_wallet').change(function () {
        // Call the function to update 'to_wallet' options
        updateToWalletOptions();
    });
});

function updateToWalletOptions() {
    var fromWallet = $('#from_wallet').val();
    var toWalletDropdown = $('#to_wallet');

    // Show all options in 'to_wallet' dropdown
    toWalletDropdown.find('option').show();

    // Hide the selected option in 'from_wallet' from 'to_wallet'
    if (fromWallet !== '') {
        toWalletDropdown.find('option[value="' + fromWallet + '"]').hide();
    }
}
</script>

<script>
  $('#deposit').submit(function(event) {
      
    event.preventDefault();
    var from_wallet = $("#from_wallet").val();
    var to_wallet = $("#to_wallet").val();
    var amount = $("input[name='amount']").val();
    
       if (amount < 1) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Amount must be greater than 30.'
        });
    }
    else {

    $.ajax({
      url: '<?php echo base_url('user/transfer_to_wallet'); ?>',
      type: 'POST',
      data: { 
          amount:amount,
          from_wallet:from_wallet,
          to_wallet:to_wallet
      },
      dataType: 'json',
      success: function(response) {
        //  alert(response.status);
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
    }
  });
</script>



 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>
   $(document).ready(function () {
    $('#example').DataTable();
}); 
</script>

<?php include 'footer.php';?>