
<?php include 'header.php';?>
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>

   .col-sm-12 {
   overflow: auto;
   }
</style>
<div class="container-fluid content-inner pb-5">
  
           <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Trading Income</h4>
            </div>
            <div class="card-body">
               <div class="row  d-flex justify-content-center">
                  <div  class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
                     <div class="card">
                        <!--<div class="card-header">-->
                        <!--       <h4 class="card-title mb-0">Trade Income</h4>-->
                        <!--    </div>-->
                             <form id="trade">
                        <div class="card-body">
                                 <div class="form-group">
                                    <label for="forex" class="form-label">Forex</label>
                                    <input type="text" name="forex" class="form-control" placeholder=""fdprocessedid="4bitmu">
                                 </div>
                                 <div class="form-group">
                                    <label for="crypto" class="form-label">Crypto</label>
                                    <input type="text" name="crypto" class="form-control" placeholder=""fdprocessedid="4bitmu">
                                 </div>
                              <div class="text-center">
                                 <button type="submit" class="btn btn-success  mt-4 mb-0" fdprocessedid="9a036e"><i class="fa-regular fa-circle-check me-2"></i>Submit</button>
                              </div>
                        </div>
                         </form>
                     </div>
                     
                  </div>
               </div>
               <div class="row">
                   <div class="card mt-2">
                        <div class="card-body" style="mt-20">
                           <table id="example2" class="table" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>SL.no</th>
                                    <th>Date & Time</th>
                                    <th>Forex</th>
                                    <th>Crypto</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $count = 1;
                                  $trade_history = $this->db->where('remark','Daily Trade')->get('trade_history')->result_array();
                                  foreach($trade_history as $key => $trade){
                                  ?>
                                 <tr>
                                    <td><?=$count++;?></td>
                                    <td><?= date('Y-m-d', strtotime($trade['entry_date'])); ?></td>
                                    <td><?=$trade['forex_percentage'];?></td>
                                    <td><?=$trade['crypto_percentage'];?></td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

<script>
  $('#trade').submit(function(event) {
    event.preventDefault();
    var forex = $("input[name='forex']").val();
    var crypto = $("input[name='crypto']").val();
    $.ajax({
      url: '<?php echo base_url('admin/trade_income'); ?>',
      type: 'POST',
      data: { forex:forex, crypto:crypto },
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
<script>
   $(document).ready(function () {
    $('#example2').DataTable();
   }); 

</script>


<?php include 'footer.php';?>

