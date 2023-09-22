
<?php include 'header.php';?>


<style>
    .horizontal-ruler{
    margin:0 !important;
    margin-bottom:6px !important;
}

.trading-card{
    background-color:#fff !important;
    border-radius:0px !important;
}

.trading-history-fd .nav-tabs .nav-link{
    color:black !important;
}

.trading-history-fd .nav-tabs .nav-link.active{
    border-radius: 0px !important;
    color: black;
    border-bottom: 2px solid blue;
    box-shadow:none !important;
    background-color: transparent !important;
}

@media screen and (max-width:400px){
    .trading-history-fd .nav-tabs .nav-link {
    font-size: 13px !important;
    }
}

.trading-history-container .history-details{
    padding-top:10px;
}

.trading-history-container .trading-des{
    color:#222f3e;
    font-size:15px;
}

.history-details .sell-currency{
    color:#eb2f06 !important;
}

.history-details .buy-currency{
    color:#44bd32 !important;
}
.positive-profit{
    color:#20bf6b;
}

.negative-profit{
    color:#e84118;
}

.open-close-price, .trade-date{
    color:#7f8fa6;
    font-size:12px;
}

.mb-less{
    margin-bottom:1px !important;
}

@media screen and (max-width:500px){
     .trading-history-fd{
        padding:14px !important;
    }
    .row > * {
        padding-right: 0px !important;
        padding-left: 0px !important;
    }
}
</style>



      <div class="container-fluid content-inner pb-0">
    
    
    <div class="row d-flex justify-content-center align-items-center mb-5">
         <div class="col-lg-10">
            <div class="card trading-card">
                  <div class="card-body trading-history-fd">
                      
                               <ul class="nav nav-tabs" id="myTab-1" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link" id="position-tab" data-bs-toggle="tab" href="#position" role="tab" aria-selected="true">Position</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false">Pending order</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link active" id="history-tab" data-bs-toggle="tab" href="#history" role="tab" aria-selected="false">History</a>
                        </li>
                     </ul>
                     <div class="tab-content" id="myTabContent-2">
                        <div class="tab-pane fade" id="position" role="tabpanel" aria-labelledby="position-tab">
                           <div class="trading-history-container mt-4">
                                 <hr class="horizontal-ruler">
                                 <div class="history-details d-flex justify-content-between align-items-center">
                                     <div>
                                         <p class="trading-des mb-less">XAUUSD, <span class="sell-currency">Sell<span class="volume">0.3000</span></span></p>
                                         <p><small class="open-close-price">19020.0000<span><i class="fa-solid fa-arrow-right-long mx-1"></i></span>19025.00000</small></p>
                                     </div>
                                     <div>
                                        <p class="mb-less"><small class="trade-date">2023-08-08 22:40:04</small></p>
                                        <p class="positive-profit">27.78750</p>
                                      </div>    
                                 </div>
                                 <hr class="horizontal-ruler">
                                  <div class="history-details d-flex justify-content-between align-items-center">
                                     <div>
                                         <p class="trading-des mb-less">GBPJPY, <span class="buy-currency">Buy<span class="volume">0.3000</span></span></p>
                                         <p><small class="open-close-price">19020.0000<span><i class="fa-solid fa-arrow-right-long mx-1"></i></span>19027.00000</small></p>
                                     </div>
                                     <div>
                                        <p class="mb-less"><small class="trade-date">2023-08-08 22:40:04</small></p>
                                        <p class="positive-profit">27.78750</p>
                                      </div> 
                                 </div>
                                  <hr class="horizontal-ruler">
                                  <div class="history-details d-flex justify-content-between align-items-center">
                                     <div>
                                         <p class="trading-des mb-less">EURUSD, <span class="sell-currency">Sell<span class="volume">0.3000</span></span></p>
                                         <p><small class="open-close-price">19020.0000<span><i class="fa-solid fa-arrow-right-long mx-1"></i></span>19000.00000</small></p>
                                     </div>
                                     <div>
                                        <p class="mb-less"><small class="trade-date">2023-08-08 22:40:04</small></p>
                                        <p class="negative-profit">0.00000</p>
                                      </div> 
                                 </div>
                                  <hr class="horizontal-ruler">
                                   <div class="history-details d-flex justify-content-between align-items-center">
                                     <div>
                                         <p class="trading-des mb-less">GBPUSD, <span class="sell-currency">Sell<span class="volume">0.3000</span></span></p>
                                         <p><small class="open-close-price">19020.0000<span><i class="fa-solid fa-arrow-right-long mx-1"></i></span>19000.00000</small></p>
                                     </div>
                                     <div>
                                        <p class="mb-less"><small class="trade-date">2023-08-08 22:40:04</small></p>
                                        <p class="negative-profit">0.00000</p>
                                      </div> 
                                 </div>
                                  <hr class="horizontal-ruler">
                           </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           
                        </div>
                        <div class="tab-pane fade show active" id="history" role="tabpanel" aria-labelledby="history-tab">
                             <div class="trading-history-container mt-4">
                                 <hr class="horizontal-ruler">
                                 <div class="history-details d-flex justify-content-between align-items-center">
                                     <div>
                                         <p class="trading-des mb-less">XAUUSD, <span class="sell-currency">Sell<span class="volume">0.3000</span></span></p>
                                         <p><small class="open-close-price">19020.0000<span><i class="fa-solid fa-arrow-right-long mx-1"></i></span>19025.00000</small></p>
                                     </div>
                                     <div>
                                        <p class="mb-less"><small class="trade-date">2023-08-08 22:40:04</small></p>
                                        <p class="positive-profit">27.78750</p>
                                      </div>    
                                 </div>
                                 <hr class="horizontal-ruler">
                                  <div class="history-details d-flex justify-content-between align-items-center">
                                     <div>
                                         <p class="trading-des mb-less">GBPJPY, <span class="buy-currency">Buy<span class="volume">0.3000</span></span></p>
                                         <p><small class="open-close-price">19020.0000<span><i class="fa-solid fa-arrow-right-long mx-1"></i></span>19027.00000</small></p>
                                     </div>
                                     <div>
                                        <p class="mb-less"><small class="trade-date">2023-08-08 22:40:04</small></p>
                                        <p class="positive-profit">27.78750</p>
                                      </div> 
                                 </div>
                                  <hr class="horizontal-ruler">
                                  <div class="history-details d-flex justify-content-between align-items-center">
                                     <div>
                                         <p class="trading-des mb-less">EURUSD, <span class="sell-currency">Sell<span class="volume">0.3000</span></span></p>
                                         <p><small class="open-close-price">19020.0000<span><i class="fa-solid fa-arrow-right-long mx-1"></i></span>19000.00000</small></p>
                                     </div>
                                     <div>
                                        <p class="mb-less"><small class="trade-date">2023-08-08 22:40:04</small></p>
                                        <p class="negative-profit">0.00000</p>
                                      </div> 
                                 </div>
                                  <hr class="horizontal-ruler">
                                   <div class="history-details d-flex justify-content-between align-items-center">
                                     <div>
                                         <p class="trading-des mb-less">GBPUSD, <span class="sell-currency">Sell<span class="volume">0.3000</span></span></p>
                                         <p><small class="open-close-price">19020.0000<span><i class="fa-solid fa-arrow-right-long mx-1"></i></span>19000.00000</small></p>
                                     </div>
                                     <div>
                                        <p class="mb-less"><small class="trade-date">2023-08-08 22:40:04</small></p>
                                        <p class="negative-profit">0.00000</p>
                                      </div> 
                                 </div>
                                  <hr class="horizontal-ruler">
                           </div>
                        </div>
                     </div>
                  </div>
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