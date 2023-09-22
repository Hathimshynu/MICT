<?php include 'header.php';?>
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>

   .col-sm-12 {
   overflow: auto;
   }
   .modal-content {
       background-color: #fff!important;
   }
   .modal-header {
   
    border-bottom: 0px solid #313135!important;
   
}
.modal-footer{
   border-top: 0px solid #313135!important;
    
}
</style>

<div class="container-fluid content-inner pb-5">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
             <div class="card-header mb-2">
               <h6 class="card-title mb-2">Withdraw Request</h6>
               
            </div>
            
         
            
          
            <div class="card-body"> 
            
         
             <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Date & Time</th>
                     <th>User Name</th>
                     <th>Requested Amount</th>
                     <th>Admin charge</th>
                     <th>Payable Amount</th>
                      <th>Action</th>
                    
                  </tr>
               </thead> 
               <tbody>
                     <?php
                     $count = 1;
                     $withdraw_request = $this->db->where('status','Request')->get('withdraw_request')->result_array();
                     foreach($withdraw_request as $key => $withdraw){
                     ?>
                      <tr>
                        <td><?=$count++;?></td>
                        <td><?=$withdraw['entry_date'];?></td>
                        <td><?=$withdraw['username'];?></td>
                        <td><?=$withdraw['usdt'];?></td>
                        <td><?=$withdraw['service_charge'];?></td>
                        <td><?=$withdraw['balance_usdt'];?></td>
                        <td><a type="button" class="btn btn-sm btn-success waves-effect waves-light me-1 edit_btn" data-bs-toggle="modal" data-bs-target="#topmodal" data-id='<?=$withdraw['id']?>' data-status="Accept"><i class="fa-solid fa-thumbs-up me-1" ></i>Approve</a>
                            <a type="button" class="btn btn-sm btn-danger waves-effect waves-light edit_btn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-id='<?=$withdraw['id']?>'  data-status="Reject"><i class="fa-solid fa-circle-xmark me-1" ></i>Reject</a></td>
                            <!--<button type="button" class="btn btn-success waves-effect waves-light">Accept</button> <button type="button" class="btn btn-danger waves-effect waves-light">Reject</button></td>-->
                        </tr>
                   <?php } ?>

                     </tbody>
                    
            </table>
         </div>
      </div>
   </div>
</div>
 <div class="row">
      <div class="col-lg-12">
         <div class="card">
             <div class="card-header mb-2">
               <h6 class="card-title mb-2">Withdraw History</h6>
               
            </div>
            
         
            
          
            <div class="card-body"> 
            
         
             <table id="example1" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Date & Time</th>
                     <th>User Name</th>
                     <th>Requested Amount</th>
                     <th>Admin charge</th>
                     <th>Payable Amount</th>
                     <th>Action date</th>
                     <th>Remark</th>
                  </tr>
               </thead> 
               <tbody>
                     <?php
                     $count = 1;
                     $withdraw_request = $this->db->where('status!=','Request')->get('withdraw_request')->result_array();
                     foreach($withdraw_request as $key => $withdraw){
                     ?>
                      <tr>
                        <td><?=$count++;?></td>
                        <td><?=$withdraw['entry_date'];?></td>
                        <td><?=$withdraw['username'];?></td>
                        <td><?=$withdraw['usdt'];?></td>
                        <td><?=$withdraw['service_charge'];?></td>
                        <td><?=$withdraw['balance_usdt'];?></td>
                        <td><?=$withdraw['accepted_date'];?></td>
                        <td><?=$withdraw['remark'];?></td>
                            <!--<button type="button" class="btn btn-success waves-effect waves-light">Accept</button> <button type="button" class="btn btn-danger waves-effect waves-light">Reject</button></td>-->
                        </tr>
                   <?php } ?>

                     </tbody>
                    
            </table>
         </div>
      </div>
   </div>
</div>
</div>



  



<!--Modal for accept Button-->
        <div id="topmodal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center p-5">
                        <form action="<?=BASEURL?>admin/withdraw" method="POST">
                        <lord-icon src="https://cdn.lordicon.com/pithnlch.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px">
                        </lord-icon>
                        <div class="mt-4">
                            <h3 class="mb-3">Are you sure?</h3>
                          
                            
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="status" id="status">
                            <div class="hstack gap-2 justify-content-center mt-5">
                                <a  class="btn btn-link link-danger fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Cancel</a>
                                <button  type="submit" class="btn btn-success" id="fine"><i class="fa-regular fa-circle-check me-1"></i></i>Accept</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal for accept button -->

        <!-- Modal for Reject Button -->
        <div class="modal fade" id="varyingcontentModal" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?=BASEURL?>admin/admin_reject" method="POST">
                    <div class="modal-body">
                        
                            <div class="mb-3">
                                <label for="customer-name" class="col-form-label">Want to Reject?</label>
                                <input type="hidden" name="id" id="rej_id">
                                <input type="hidden" name="status" id="rej_status">
                                <input type="text" placeholder="Enter reason here..." class="form-control" id="customer-name" name="remark" required>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="">Reject</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
          <!--image model-->
                        <div class="modal fade" id="image1<?=$user['receipt']?>" tabindex="-1" aria-labelledby="image1Label" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <div class="mt-4">
                                            <div class="text-center">
                                                <img style="width:400px;height:400px;object-fit:cover;" class="img-responsive img-fluid" 
                                                src="<?=BASEURL?>assets/images/recepit/<?=$user['receipt']?>">
                                                </div>
                                                <div class="hstack gap-2 justify-content-center mt-5">
                                                <button type="button" class="btn btn-danger  me-4" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
        <!--end-->

       
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

 <script>
      $(document).on('click', '.edit_btn', function() {

        var dt_id = $(this).attr("data-id");
        var dt_status = $(this).attr("data-status");
   
        $("#id").val(dt_id);
        $("#status").val(dt_status);

        if(dt_status == 'Accept'){
           $("#id").val(dt_id);
           $("#status").val(dt_status);
             return;
        } else {
           $("#rej_id").val(dt_id);
           $("#rej_status").val(dt_status);
          return;
        }
      });
    </script> 

<script>
   $(document).ready(function () {
    $('#example').DataTable();
    $('#example1').DataTable();
   }); 
</script>

  

<?php include 'footer.php';?>