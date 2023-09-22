
<?php include 'header.php';?>
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>

   .col-sm-12 {
   overflow: auto;
   }
   .walletbtn {
   display: flex;
   align-items: center;
   justify-content: center;
   }
</style>
<div class="container-fluid content-inner pb-5">
  
           <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Wallet Update</h4>
            </div>
            <div class="card-body">
               <div class="row  d-flex justify-content-center">
                  <div  class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
                     <div class="card">
                        <div class="card-header">
                               <h4 class="card-title mb-0">Deposit Wallet</h4>
                            </div>
                             <?php  $admin_wall = $this->db->select('wallet_address')->where('user_role_id',1)->get("user_role")->row()->wallet_address; ?>
                             <form id="wallet">
                        <div class="card-body">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Wallet Address </label>
                                    <input type="text" name="wallet_address" class="form-control" placeholder="Enter TRC20 Wallet Address "fdprocessedid="4bitmu">
                                 </div>
                              <p class="mt-2">Current Wallet : <span class="text-primary"><?=$admin_wall;?></span></p>
                              <div class="text-center">
                                 <button type="submit" class="btn btn-success mt-4 mb-0" fdprocessedid="9a036e"><i class="fa-regular fa-circle-check me-2"></i>Submit</button>
                              </div>
                        </div>
                         </form>
                     </div>
                     <!--<div class="card mt-2">-->
                     <!--   <div class="card-body" style="mt-20">-->
                     <!--      <table id="example2" class="table" style="width:100%">-->
                     <!--         <thead>-->
                     <!--            <tr>-->
                     <!--               <th>SL.no</th>-->
                     <!--               <th>Date & Time</th>-->
                     <!--               <th>Wallet</th>-->
                     <!--            </tr>-->
                     <!--         </thead>-->
                     <!--         <tbody>-->
                     <!--            <tr>-->
                     <!--               <td>1</td>-->
                     <!--               <td>11/08/2023</td>-->
                     <!--               <td>xxxx</td>-->
                     <!--            </tr>-->
                     <!--         </tbody>-->
                     <!--      </table>-->
                     <!--   </div>-->
                     <!--</div>-->
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
  $('#wallet').submit(function(event) {
    event.preventDefault();
    var wallet_address = $("input[name='wallet_address']").val();
    $.ajax({
      url: '<?php echo base_url('admin/wallet_updatee'); ?>',
      type: 'POST',
      data: { wallet_address:wallet_address},
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

