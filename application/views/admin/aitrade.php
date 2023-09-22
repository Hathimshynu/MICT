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


/* Hide spinners for input[type="number"] in WebKit-based browsers */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0; /* Optional: Adjust if needed */
}

/* Hide spinners for input[type="number"] in other browsers */
input[type="number"] {
    appearance: textfield;
    -moz-appearance: textfield; /* For Firefox */
}
</style>               
               
               
      <div class="container-fluid content-inner pb-0">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0">AI Trade</h4>
                   
                                  <a href="<?=BASEURL?>admin/ai_trading_profit_history" class="btn btn-primary rounded-pill" style="display: inline-block; width: 120px; padding: 6px 10px; font-size: 14px;">
                                        AI Trade Profit History
                                    </a>
                   
                </div>
                
  
                
                  <div class="card-body">
                   <div class="row d-flex justify-content-center">
         <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
           
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
                        <div class="m-3">
                            <label for="exampleInputdate" class="form-label">Trade Open Time</label>
                            <input type="datetime-local" name='trade_open_time' class="form-control" id="trade_open_time">
                        </div>
                          <div class="form-group m-3 mt-2"><span style="color:red;"></span>
                           <label for="" class="form-label">Opening Price <span class="text-danger"></span></label>
                           <input type="text" name="open_price"   class="form-control" id="open_price" placeholder="Enter Opening Price" fdprocessedid="ijryfu">
                        </div>
                        
                         <div class="m-3 mt-2">
                            <label for="exampleInputdate" class="form-label">Trade Close Time</label>
                            <input type="datetime-local" name='trade_close_time' class="form-control" id="trade_close_time">
                        </div>
                        
                         <div class="form-group m-3 mt-2"><span style="color:red;"></span>
                           <label for="" class="form-label">Closing Price <span class="text-danger"></span></label>
                           <input type="text" name="close_price"   class="form-control" id="close_price" placeholder="Enter Closing Price" fdprocessedid="ijryfu">
                        </div>
                        
                        <input type="hidden" name="username" value="<?=$this->session->userdata('micusername');?>" class="form-control"  fdprocessedid="4bitmu">
                        <input type="hidden" name="mode" value="<?=$mode;?>" class="form-control"  fdprocessedid="4bitmu">
                            <input type="hidden" value="<?=$address['private_key']?>" class="form-control" readonly="" fdprocessedid="4bitmu">
                         
                              <div class="form-group m-3 mt-2"><span style="color:red;"></span>
                           <label for="" class="form-label">Trade Pair <span class="text-danger"></span></label>
                           <input type="text" name="trade_pair"   class="form-control" id="trade_pair" placeholder="" fdprocessedid="ijryfu" value="BTC/ETC">
                        </div>
                            <div class="form-group m-3 mt-2"><span style="color:red;"></span>
                           <label for="" class="form-label">Action <span class="text-danger"></span></label>
                           <input type="text" name="action"   class="form-control" id="action"  fdprocessedid="ijryfu" value="Buy/Sell">
                        </div>
                        <div class="form-group m-3 mt-2"><span style="color:red;"></span>
                           <label for="exampleInputEmail1" class="form-label">AI Trading Profit <span class="text-danger"><?=form_error('percentage');?></span></label>
                           <input type="text" name="percentage"   class="form-control" id="percentage" placeholder="" fdprocessedid="ijryfu">
                        </div>
                       
                       
                     </div>
                     <div class="text-center">
                         <button type="submit" class="btn btn-success  mt-4 mb-0" id='sbmtbtn' fdprocessedid="9a036e"><i class="fa-regular fa-circle-check me-2"></i>Generate</button>
                         </div>
                     </form>                  </div>
               </div>
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




<script>
 $('#deposit').submit(function(event) {
    event.preventDefault();
     $('#sbmtbtn').prop('disabled', true);
    $('#sbmtbtn').text('Please Wait...');
    var percentage = $("input[name='percentage']").val();
    var trade_open_time = $("input[name='trade_open_time']").val();
    var trade_close_time = $("input[name='trade_close_time']").val();
    var open_price = $("input[name='open_price']").val();
    var close_price = $("input[name='close_price']").val();
    var trade_pair = $("input[name='trade_pair']").val();
    var action = $('#action').val();



        $.ajax({
            url: '<?=BASEURL?>admin/trade_profit',
            type: 'POST',
            data: {percentage: percentage,
            trade_open_time:trade_open_time,
            trade_close_time:trade_close_time,
            open_price:open_price,
            close_price:close_price,
            trade_pair:trade_pair,
            action:action
            },
            dataType: 'json',
            success: function(response) {
                // alert(response.status);
                 $('#sbmtbtn').prop('disabled', false);
            $('#sbmtbtn').text('Generate');
                    console.log(response); 
                if (response.status === 'success') {
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        html: response.message.replace(/<\/?span[^>]*>/g, ''),
                        icon: "error",
                    });
                }
            },error: function(xhr, status, error) {
                $('#sbmtbtn').prop('disabled', false);
            $('#sbmtbtn').text('Generate');
        console.log("AJAX Error:", error);
    },
        });
});
</script>



<script>
   $(document).ready(function () {
    $('#example').DataTable();
}); 
</script> 

<script>
   $(document).ready(function () {
    $('#example1').DataTable();
}); 
</script> 
<?php include 'footer.php';?>        