<?php include 'header.php';?>


<style>
    .trading-history p{
        margin-bottom:0 !important;
        margin-top:0 !important;
        padding-top:0 !important;
        padding-bottom:0 !important;
        text-shadow: 0px 1px 2px black;
    }
    
     .trading-history .text-info{
        color: #48dbfb !important;
    }
    
    @media screen and (max-width:500px){
        .trading-history p{
            font-size:12px !important;
        }
    }
    
    .trade-currency{
        font-size:18px !important;
        margin-bottom:17px !important;
    }
  
</style>


 <div class="container-fluid content-inner pb-0">
     
     
     <div class="row mb-5">
          <a style="cursor:pointer !important;" href="">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Trading History</h4>
                  </div>
               </div>
               <div class="card-body2">
                  <div class="col-xl-12 col-md-12 col-sm-12 trading-history">
                      <!--Trading Card -->
                      <div class="trading-portfolio">
                          <a style="cursor:pointer !important;" href="<?=BASEURL?>user/trading_history_view"> 
                              <hr class="h-ruler">
                              <div class="d-flex justify-content-between align-items-center mb-2 px-0 px-lg-4"><h3>
                                  <span class=" text-white trade-currency">XAUUSD,<span style="color:red;text-shadow:none!important;font-weight:600;" class=" ms-1">sell&nbsp0.05</span> </span></h3>
                              </div>  
                              <div class="d-flex justify-content-between align-items-center px-0 px-lg-4">
                                  <div>
                                      <p class="text-info">Open Price</p>
                                      <p class="text-white">$78</p>
                                      <p class="text-info">Closed Price</p>
                                      <p class="text-white">$81</p>
                                  </div>
                                  <div>
                                      <p class="text-info">Date & Time</p>
                                      <p class="text-white">2023.02.06 00:00:00</p>
                                      
                                       <p class="text-info">Profit Amount</p>
                                      <p class="text-white">$2.03</p>
                                  </div>
                              </div>
                                <hr class="hr-ruler">
                           </a>  
                       </div>   
                        <!--Trading Card -->
                  </div>
               
            </div>
         </div>
      </div>
     
     
 </div>     





<?php include 'footer.php';?>