<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>


<style>
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

/*@media screen and (min-width:768px){*/
/*    .forex-wallet-card-container{*/
/*        margin-top: -204px !important;*/
/*}*/
/*    }*/

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
</style>

<?php include 'header.php';?>

      <div class="container-fluid content-inner pb-0">
    <!--  <div class="row">-->
    <!--      <div class="col-lg-12">-->
    <!--         <div class="card">-->
    <!--             <div class="card-header">-->
    <!--                <h4 class="card-title mb-0">Forex Invest</h4>-->
    <!--            </div>-->
    <!--             <table id="example" class="table" style="width:100%">-->
    <!--    <thead>-->
    <!--        <tr>-->
    <!--            <th>SL.no</th>-->
    <!--            <th>Mode</th>-->
    <!--            <th>Invested Date</th>-->
    <!--            <th>Approved Date</th>-->
    <!--            <th>Amount</th>-->
    <!--        </tr>-->
    <!--    </thead>-->
    <!--    <tbody>-->
    <!--        <tr>-->
    <!--            <td>1</td>-->
    <!--            <td>Forex</td>-->
    <!--            <td>26/7/2023 00:00:00</td>-->
    <!--            <td>28/7/2023 00:00:00</td>-->
    <!--            <td>$675</td>-->
    <!--        </tr>-->
    <!--    </tbody>-->

    <!--</table>-->
    <!--         </div>-->
    <!--      </div>-->
    <!--  </div>-->
    
    
    <div class="row d-flex justify-content-center align-items-center mb-0">
         <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div style="border-radius:30px!important;" class="card text-white forex-card">
                <div class="card-heading forex-card">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="align-items-center me-3">
                             <div class="avatar">
                                 <i class="fa-solid fa-gem trophy-icon"></i>
                             </div>
                        </div> 
                        <div class="align-items-center text-center">
                            <h3 class="price-show">FOREX</h3>
                        </div>    
                    </div>
                </div>
              <?php  $forex =  $this->db->select_sum('usdt')->where('username', $this->session->userdata('micusername'))->where('type','Forex')->get('deposit')->row()->usdt + 0;
              $forex_today = $this->db->select_sum('usdt')
                        ->where('username', $this->session->userdata('micusername'))
                        ->where('type', 'Forex')
                        ->where('DATE(entry_date)', date('Y-m-d'))
                        ->get('deposit')
                        ->row()
                        ->usdt + 0;
              ?>
                  <div class="card-body">
                      <div class="amount-container d-flex justify-content-center align-items-center">
                          <p class="total-invested-amount"><span class="text-white me-1">Amount : </span><span class=""><?=$forex;?> USDT</span></p>
                      </div>
                     <!--<h4 style="color:#acffb8 !important;" class="card-title price-show">$50,000</h4>-->
                     <div class="pack-container mt-3">
                         <div class="pack-details d-flex justify-content-between align-items-center">
                             <p class="pack-features">Invested</p>
                             <p class="pack-features"><?=$forex;?> USDT</p>
                         </div>
                         <hr class="horizontal-ruler">
                         
                          <div class="pack-details d-flex justify-content-between align-items-center">
                             <p class="pack-features">Today's Profit</p>
                             <p class="pack-features"><?=$forex_today;?> USDT</p>
                         </div>
                          <hr class="horizontal-ruler">
                       
                          <div class="pack-details d-flex justify-content-between align-items-center">
                             <p class="pack-features">Profit Split</p>
                             <p class="pack-features">70 : 30</p>
                         </div>
                          <hr class="horizontal-ruler">
                       
                     </div>
                     <?php $active = $this->db->where('user_id',$this->session->userdata('micusername'))->get('user_activation')->row_array();
                     if($active['status'] == 'Active'){
                     ?>
                     <div class="mt-3 d-flex justify-content-between align-items-center">
                         <a href="<?=BASEURL?>user/investment/forex"><button class="btn btn-primary btn-glow rounded-pill">Invest</button></a>
                         <a href="<?=BASEURL?>user/forex_trading_history"><p class="history-label"><i class="fa-solid fa-arrow-right-long me-2"></i>History</p></a>
                     </div>
                     <?php } else{ ?>
                     <div class="mt-3 d-flex justify-content-between align-items-center">
                         <button id="investment-failed" class="btn btn-primary btn-glow rounded-pill">Invest</button>
                         <a href="<?=BASEURL?>user/forex_trading_history"><p class="history-label"><i class="fa-solid fa-arrow-right-long me-2"></i>History</p></a>
                     </div>
                     <?php } ?>
                  </div>
               </div>
        </div>
    </div>
    
     <div class="row mb-5">
         	        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         	            <div class="card shining-card wallet overflow-hidden">
        					<div class="card-body">
        						<div class="row">
        						    	<div class="col">
        								<h4 class="">Today Profit <i class="bi bi-arrow-clockwise"></i></h4>
        								<h5 class="mb-2 number-font text-primary">$ 10.03 USDT</h5>
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
         	        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         	            <div class="card shining-card wallet overflow-hidden">
        					<div class="card-body">
        						<div class="row">
        						    	<div class="col">
        								<h4 class="">Trade Profit <i class="bi bi-arrow-clockwise"></i></h4>
        								<h5 class="mb-2 number-font text-primary">$ 10.03 USDT</h5>
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
         	        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         	            <div class="card shining-card wallet overflow-hidden">
        					<div class="card-body">
        						<div class="row">
        						    	<div class="col">
        								<h4 class="">Withdraw Wallet <i class="bi bi-arrow-clockwise"></i></h4>
        								<h5 class="mb-2 number-font text-primary">$ 10.03 USDT</h5>
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
         	         <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         	            <div class="card shining-card wallet overflow-hidden">
        					<div class="card-body">
        						<div class="row">
        						    	<div class="col">
        								<h4 class="">Sponser Level <i class="bi bi-arrow-clockwise"></i></h4>
        								<h5 class="mb-2 number-font text-primary">2</h5>
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





<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>
   $(document).ready(function () {
    $('#example').DataTable();
}); 
</script>

<?php include 'footer.php';?>