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

.send-reply{
    background-color: #1E90FF !important;
    padding:6px 10px !important;
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
            <div class="card-header">
               <h4 class="card-title mb-0">Support</h4>
            </div>
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Created Date</th>
                     <th>Ticket ID</th>
                     <th>Support Type</th>
                     <th>Issue</th>
                     <th>Reply</th>
                     <th>Reply Date</th>
                     <th>Status</th>
                  </tr>
               </thead>
               <tbody>
 
                  <tr>
                      <td>1</td>
                      <td>12/09/23 00:00:00</td>
                      <td>xxxx</td>
                      <td>Deposit Support</td>
                      <td>
                          <span data-bs-toggle="modal" data-bs-target="#ViewIssue" class=" badge rounded-pill bg-danger view-issue"><i class="fa-solid fa-eye me-1"></i>View</span>
                      </td>
                      <td>
                          <span data-bs-toggle="modal" data-bs-target="#ViewReply" class=" badge rounded-pill bg-success view-reply"><i class="fa-solid fa-eye me-1"></i>View</span>
                      </td>
                      <td>13/09/23 00:00:00</td>
                      <td>
                          <span class="badge border border-success text-success py-1">Completed</span>
                      </td>
                  </tr>
                  
                    <tr>
                      <td>2</td>
                      <td>12/09/23 00:00:00</td>
                      <td>xxxx</td>
                      <td>Deposit Support</td>
                      <td>
                          <span data-bs-toggle="modal" data-bs-target="#ViewIssue" class=" badge rounded-pill bg-danger view-issue"><i class="fa-solid fa-eye me-1"></i>View</span>
                      </td>
                      <td>
                          <span data-bs-toggle="modal" data-bs-target="#SendReply" class=" badge rounded-pill bg-warning send-reply"><i class="fa-solid fa-reply me-1"></i>Reply</span>
                      </td>
                      <td>13/09/23 00:00:00</td>
                      <td>
                          <span class="badge border border-info text-info py-1">New</span>
                      </td>
                  </tr>
             
               </tbody>
               
               
               
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
                             <h6 class="issue-title text-info ps-4 my-2">The Lorem Ipsum</h6>
                         </div>
                         <div class="description mt-3">
                             <p style="font-size: 20px;font-weight: 500;" class="text-dark mb-0">Description:</p>
                             <p class="issue-des-text mt-2">
                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
                             <h6 class="reply-title text-info ps-4 my-2">The standard Lorem Ipsum passage, used since the 1500s</h6>
                         </div>
                         <div class="description mt-3">
                             <p style="font-size: 20px;font-weight: 500;" class="text-dark mb-0">Description:</p>
                             <p class="reply-des-text mt-2">
                                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
      
      
        <!--Send Reply Modal -->
      <div class="modal fade" id="SendReply" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Send Reply</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
               </div>
               <div class="modal-body">
                  <div class="d-flex justify-content-center align-items-center row">
                      <div class="col-lg-12">
                          <form method='post' action='<?=BASEURL?>user/support'>
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
      
               
               
            </table>
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