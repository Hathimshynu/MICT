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
       .create-ticket-btn{
           font-size: 15px;
           padding: 10px 7px;
       }
   }
   
   .text-primary {
    --bs-text-opacity: 1;
    /* color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important; */
    color: blue!important;
}

label.form-label {
    color: black!important;
    font-size: 18px!important;
}

.form-control1 {
    color: black!important;
    background-clip: padding-box;
    border: 1px solid whitesmoke!important;
    background-color: #ededed!important;
    display: flex;
    width: inherit;
}

.view-issue{
    background-color: #ff0000 !important;
    padding:8px 10px !important;
    cursor:pointer !important;
}

.issue-des-text{
    border:2px solid #ff0000;
    padding:10px;
    border-radius:14px;
}

.issue-title{
    border:2px solid #ff0000;
    padding:10px;
    border-radius:14px;
     font-size:19px !important;
}

.view-reply{
    background-color: #05c46b !important;
    padding:8px 10px !important;
    cursor:pointer !important;
}

.reply-des-text{
    border:2px solid #05c46b;
    padding:10px;
    border-radius:14px;
}

.reply-title{
    border:2px solid #05c46b;
    padding:10px;
    border-radius:14px;
    font-size:19px !important;
}


</style>

<div class="container-fluid content-inner pb-5">
    
    
    
     <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="card-title mb-0">Support</h4>
               <button data-bs-toggle="modal" data-bs-target="#CreateTicket" style="font-size:16px;" type="button" class="btn btn-info create-ticket-btn"><i style="font-weight:900;font-size:16px;" class="fa-solid fa-plus me-2"></i>Create Support</button>
            </div>
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Created Date</th>
                     <th>Ticket ID</th>
                     <th>Support Type</th>
                     <th>Issue</th>
                     <th>Status</th>
                     <th>Reply</th>
                     <th>Reply Date</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $his=$this->db->where('user_id',$this->session->userdata('micusername'))->get('support')->result_array(); 
                  $count=1;
                  foreach($his as $key=>$row){
                  ?>
                  <tr>
                     <td><?=$count++;?></td>
                     <td><?=$row['entry_date'];?></td>
                     <td><?=$row['ticket_id'];?></td>
                     <td><?=$row['support_type'];?></td>
                     <td>
                         <span data-bs-toggle="modal" data-bs-target="#ViewIssue" class=" badge rounded-pill bg-danger view-issue" data-ticket-id="<?= $row['ticket_id']; ?>"><i class="fa-solid fa-eye me-1"></i>View</span>
                     </td>
                     <td>
                     <?php if($row['status'] == 'new') { ?>
                    <span style='background-color:#8c7ae6 !important;' class="badge rounded-pill bg-info"><?=$row['status'];?></span>
                <?php } else { ?>
                    <span class="badge rounded-pill bg-success"><?=$row['status'];?></span>
                <?php } ?>
                     </td>
                     
                     <td>
                         <?php if ($row['status'] == 'new') { ?>
                    <span class="badge rounded-pill bg-info">Processing</span>
                <?php } else { ?>
                   <span data-bs-toggle="modal" data-bs-target="#ViewReply" class=" badge rounded-pill bg-success view-reply" data-ticket-id="<?= $row['ticket_id']; ?>"><i class="fa-solid fa-eye me-1"></i>View</span>
                <?php } ?>
                         
                     </td>
                     
                     <td> <?php if ($row['status'] == 'new') { ?>
                    <span class="text-center"><b>---</b></span>
                <?php } else { ?>
                    <?= $row['entry_date']; ?>
                <?php } ?></td>
                  </tr>
                  <?php } ?>
                  
                  <!-- <tr>-->
                  <!--   <td></td>-->
                  <!--   <td></td>-->
                  <!--   <td></td>-->
                  <!--   <td></td>-->
                  <!--   <td>-->
                  <!--       <span data-bs-toggle="modal" data-bs-target="#ViewIssue" class=" badge rounded-pill bg-danger view-issue"><i class="fa-solid fa-eye me-1"></i>View</span>-->
                  <!--   </td>-->
                  <!--   <td>-->
                  <!--       <span class="badge border border-success text-success py-1">New</span>-->
                  <!--   </td>-->
                  <!--   <td>-->
                  <!--       <span class="badge bg-primary py-1">Processing</span>-->
                  <!--   </td>-->
                  <!--   <td></td>-->
                  <!--</tr>-->
              
               </tbody>
               
               
               
               <!--Create Ticket Modal -->
      <div class="modal fade" id="CreateTicket" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div style="background-color:white !important;" class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Create Ticket</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
               </div>
               <div class="modal-body">
                  <div class="d-flex justify-content-center align-items-center row">
                      <div class="col-lg-12">
                          <form method='post' action='<?=BASEURL?>user/support'>
                                 <div class="form-group">
                                    <label class="form-label">Support Type</label>
                                    <select name="support_type" class="form-select mb-3 shadow-none">
                                        <option selected value="">Select</option>
                                        <option value="Deposit Support">Deposit Support</option>
                                        <option value="Trade Support">Trade Support</option>
                                        <option value="Withdrawal Support">Withdrawal Support</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                                    <textarea  name='description' class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>
                                
                                <div class="d-flex justify-content-center mt-4">
                                    <div>
                                        <button type="submit" class="btn btn-success me-2"><i class="fa-regular fa-circle-check me-2"></i>Submit</button>
                                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                                    </div>  
                                </div>
                            </form>
                      </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--Create Ticket Modal -->
      
      
      <!--View Issue Modal -->
      <div class="modal fade" id="ViewIssue" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div style="background-color:white !important;" class="modal-content">
                 <div style="border:none !important;" class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i style="color:black;font-size: 20px;" class="fa-solid fa-xmark"></i>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="d-flex justify-content-center align-items-center row">
                      <div class="col-lg-12">
                         <div class="title">
                             <p style="font-size: 20px;font-weight: 500;" class="text-dark mb-0">Title:</p>
                             <h6 class="issue-title text-info ps-4 my-2"> </h6>
                         </div>
                         <div class="description mt-3">
                             <p style="font-size: 20px;font-weight: 500;" class="text-dark mb-0">Description:</p>
                             <p class="issue-des-text mt-2">
                               
                             </p>
                         </div>
                         <div style="border:none !important;" class="modal-footer border-0">
                             <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                         </div>
                      </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--View Issue Modal -->
      
      
       <!--View Reply Modal -->
      <div class="modal fade" id="ViewReply" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div style="background-color:white !important;" class="modal-content">
                <div style="border:none !important;" class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i style="color:black;font-size: 20px;" class="fa-solid fa-xmark"></i>
                  </button>
                </div>  
               <div class="modal-body">
                  <div class="d-flex justify-content-center align-items-center row">
                      <div class="col-lg-12">
                         <div class="title">
                             <p style="font-size: 20px;font-weight: 500;" class="text-dark mb-0">Title:</p>
                             <h6 class="reply-title text-info ps-4 my-2"> </h6>
                         </div>
                         <div class="description mt-3">
                             <p style="font-size: 20px;font-weight: 500;" class="text-dark mb-0">Description:</p>
                             <p class="reply-des-text mt-2">
                                
                             </p>
                         </div>
                         <div style="border:none !important;" class="modal-footer border-0">
                             <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                         </div>
                      </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--View Reply Modal -->
      
      
               
            </table>
         </div>
      </div>
   </div>
    
    
  
 
</div>


<?php include 'footer.php';?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<script>
   $(document).ready(function () {
    $('#example').DataTable();
   }); 
</script> 



<!--issue modal script -->
<script>
   $(document).ready(function () {
        // Handle click event on the "View" button for issues
        $('.view-issue').click(function () {
            var ticketId = $(this).data('ticket-id');
            var row = <?php echo json_encode($his); ?>; // Convert PHP array to JavaScript array

            // Find the row with the matching ticket_id
            var rowData = row.find(function (element) {
                return element.ticket_id == ticketId;
            });

            if (rowData) {
                // Populate the modal content with data from the selected row
                var supportType = rowData.support_type;
                var description = rowData.description;

                // Set the modal content dynamically
                $('#ViewIssue .issue-title').text(supportType);
                $('#ViewIssue .issue-des-text').text(description);
            }
        });
    });
</script>

<!--reply modal script-->
<script>
    $(document).ready(function () {
        // Handle click event on the "View" button for replies
        $('.view-reply').click(function () {
            var ticketId = $(this).data('ticket-id');
            var row = <?php echo json_encode($his); ?>; // Convert PHP array to JavaScript array

            // Find the row with the matching ticket_id
            var rowData = row.find(function (element) {
                return element.ticket_id == ticketId;
            });

            if (rowData) {
                // Populate the modal content with data from the selected row
                var supportType = rowData.support_type;
                var reply = rowData.reply;

                // Set the modal content dynamically
                $('#ViewReply .reply-title').text(supportType);
                $('#ViewReply .reply-des-text').text(reply);
            }
        });
    });
</script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>


