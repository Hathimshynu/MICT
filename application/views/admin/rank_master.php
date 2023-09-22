<?php include 'header.php';?>
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>

   .col-sm-12 {
   overflow: auto;
   }
</style>

<div class="container-fluid content-inner pb-0">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
             <div class="card-header mb-2">
               <h4 class="card-title mb-2">Rank history</h4>
            </div>
            <div class="card-body"> 
             <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Rank</th>
                     <th>USDT</th>
                     <th>Percentage</th>
                     <th>Daily Reward</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                   <?php
                   $count = 1;
                   $rank_master = $this->db->get('rank_master')->result_array();
                   foreach($rank_master as $key => $rank){
                   ?>
                  <tr>
                     <td><?=$count++;?></td>
                     <td><?=$rank['rank'];?></td>
                     <td><?=$rank['amount'];?></td>
                     <td><?=$rank['percentage'];?></td>
                     <td><?=$rank['daily_reward'];?></td>
                     <td><button type="button" id="rank" class="btn btn-info" data-bs-toggle="modal" data-bs-target=".edit-rank" data-auto="<?=$rank['id'];?>"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button></td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
              <div class="modal fade edit-rank" tabindex="-1" role="dialog"  aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                       <div class="modal-header">
                          <h5 class="modal-title">Edit Rank</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                          </button>
                       </div>
                       <div class="modal-body">
                           <div class="row d-flex justify-content-center">
                               <form id="master"> 
                                  <div class="col-lg-8">
                                  
                                        <input type="hidden" class="form-control" id="auto" name="id"  fdprocessedid="3kjcn6">
                                   
                                    <!--<div class="form-group">-->
                                    <!--   <label class="form-label" for="fname">Rank</label>-->
                                    <!--    <input type="text" class="form-control" id="rank" name="rank" fdprocessedid="3kjcn6">-->
                                    <!--</div>-->
                                    <div class="form-group">
                                       <label class="form-label" for="fname">Amount</label>
                                       <input type="text" class="form-control" id="amount" name="amount"  fdprocessedid="3kjcn6">
                                    </div>
                                    <div class="form-group">
                                       <label class="form-label" for="fname">Percentage</label>
                                        <input type="text" class="form-control" id="percentage" name="percentage"  fdprocessedid="3kjcn6">
                                    </div>
                                    <div class="form-group">
                                       <label class="form-label" for="fname">Daily Reward</label>
                                         <input type="text" class="form-control" id="reward" name="reward" fdprocessedid="3kjcn6">
                                    </div>
                                   <div class="d-flex justify-content-center">   
                                      <button type="submit" class="btn btn-primary m-3" fdprocessedid="kjp027"><i class="fa-regular fa-circle-check me-2"></i>Submit</button>
                                   </div>
                                 </div>
                              </form>
                          </div>    
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                       </div>
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
  $('#master').submit(function(event) {
    event.preventDefault();
    var id = $("input[name='id']").val();
    var amount = $("input[name='amount']").val();
    var percentage = $("input[name='percentage']").val();  
    var reward = $("input[name='reward']").val();      
    $.ajax({
      url: '<?php echo base_url('admin/rank_update'); ?>',
      type: 'POST',
      data: { id:id, amount:amount, percentage:percentage, reward:reward },
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
$(document).on('click', '#rank', function() {
    var dt_idcard = $(this).attr("data-auto");
    $("#auto").val(dt_idcard);
});
</script>

<?php include 'footer.php';?>