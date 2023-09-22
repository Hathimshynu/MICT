
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
.eye-icon {
    /*width: 26px !important;*/
    /*height: 25px !important;*/
    padding: 5px;
    padding-top: 1px;
    padding-bottom: 1px;
    background-color: #5D61E2 !important;
    border-color: #5D61E2 !important;
}
</style>



      <div class="container-fluid content-inner pb-5">
            <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">KYC Request</h4>
            </div>
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Date & Time</th>
                     <th>User ID</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Aadhar Front Image</th>
                     <th>Aadhar Back Image</th>
                     <th>PAN Card Image</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                
                  <tr>
                     <td>1</td>
                     <td>14/09/23 00:00:00</td>
                      <td>xxxx</td>
                     <td>xxxx</td>
                      <td>xxx</td>
                      <td>
                          <div class="d-flex justify-content-center align-items-center">
                             <img data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Click Eye Icon to view Image" src="<?=BASEURL?>assets/images/aadhar-front-img.jpg" width="100px" style="object-fit: contain;">
                             <button data-bs-toggle="modal" data-bs-target=".Aadhar-Front-Modal" type="button" data-img="9165198" class="ms-3 btn btn-primary btn-icon eye-icon waves-effect waves-light eye"><i class="fa-solid fa-eye"></i></button>
                          </div>    
                      </td>
                      <td>
                          <div class="d-flex justify-content-center align-items-center">
                             <img data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Click Eye Icon to view Image" src="<?=BASEURL?>assets/images/aadhar-back-img.jpeg" width="100px" style="object-fit: contain;">
                             <button data-bs-toggle="modal" data-bs-target=".Aadhar-Back-Modal" type="button" data-img="9165198" class="ms-3 btn btn-primary btn-icon eye-icon waves-effect waves-light eye"><i class="fa-solid fa-eye"></i></button>
                          </div>    
                      </td>
                     <td>
                         <div class="d-flex justify-content-center align-items-center">
                             <img data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Click Eye Icon to view Image" src="<?=BASEURL?>assets/images/pancard-img.png" width="100px" style="object-fit: contain;">
                             <button data-bs-toggle="modal" data-bs-target=".Pan-Card-Modal" type="button" data-img="9165198" class="ms-3 btn btn-primary btn-icon eye-icon waves-effect waves-light eye"><i class="fa-solid fa-eye"></i></button>
                          </div> 
                     </td>
                      <td>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#AcceptModal" class="btn btn-sm btn-primary me-2"><i class="fa-solid fa-thumbs-up me-1"></i>Accept</button>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#RejectModal" class="btn btn-sm btn-danger"><i class="fa-solid fa-thumbs-down me-1"></i>Reject</button>
                      </td>
                  
                  </tr>
          
               </tbody>
               
               
               <!-- Aadhar Font Image View Modal (Eye Icon) -->
               <div class="modal fade Aadhar-Front-Modal" tabindex="-1" role="dialog"  aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                       <div class="modal-header">
                          <!--<h5 class="modal-title">Modal title</h5>-->
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                          </button>
                       </div>
                       <div class="modal-body">
                          <div class="d-flex justify-content-center align-items-center my-2 img-container">
                              <img class="img-responsive img-fluid" src="<?=BASEURL?>assets/images/aadhar-front-img.jpg">
                          </div>
                          
                          <div class="text-center">
                              <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Close</button>
                          </div>
                       </div>
                       
                    </div>
                 </div>
              </div>
          <!-- Aadhar Font Image View Modal (Eye Icon) -->
          
            <!-- Aadhar Back Image View Modal (Eye Icon) -->
               <div class="modal fade Aadhar-Back-Modal" tabindex="-1" role="dialog"  aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                       <div class="modal-header">
                          <!--<h5 class="modal-title">Modal title</h5>-->
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                          </button>
                       </div>
                       <div class="modal-body">
                          <div class="d-flex justify-content-center align-items-center my-2 img-container">
                              <img class="img-responsive img-fluid" src="<?=BASEURL?>assets/images/aadhar-back-img.jpeg">
                          </div>
                          
                          <div class="text-center">
                              <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Close</button>
                          </div>
                       </div>
                       
                    </div>
                 </div>
              </div>
          <!-- Aadhar Back Image View Modal (Eye Icon) -->
          
          
           <!-- PAN Card Image View Modal (Eye Icon) -->
               <div class="modal fade Pan-Card-Modal" tabindex="-1" role="dialog"  aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                       <div class="modal-header">
                          <!--<h5 class="modal-title">Modal title</h5>-->
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                          </button>
                       </div>
                       <div class="modal-body">
                          <div class="d-flex justify-content-center align-items-center my-2 img-container">
                              <img class="img-responsive img-fluid" src="<?=BASEURL?>assets/images/pancard-img.png">
                          </div>
                          
                          <div class="text-center">
                              <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Close</button>
                          </div>
                       </div>
                       
                    </div>
                 </div>
              </div>
              
          <!-- PAN Card Image View Modal (Eye Icon) -->
          
          
          
           <!-- Modal for Accept button -->
      <div class="modal fade" id="AcceptModal" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body text-center">
                     <lord-icon src="https://cdn.lordicon.com/pithnlch.json" trigger="loop" colors="primary:#FF971D,secondary:#fff" style="width:120px;height:120px">
                </lord-icon>
                 <form action="" method="POST">
                <div class="mt-4">
                    <h3 class="mb-3">Are you sure?</h3>
                     
                    <div class="hstack gap-2 justify-content-center mt-5">
                        <a href="javascript:void(0);" class="btn btn-link link-danger fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Cancel</a>
                        <button type="submit" class="btn btn-success"><i class="fa-regular fa-circle-check me-1"></i>Accept</a>
                    </div>
                </div>
                </form>
                            
               </div>
            </div>
         </div>
      </div>
      
      
        <!-- Modal for Reject button -->
      <div class="modal fade" id="RejectModal" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body text-center">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label style="font-size: 22px !important;" for="customer-name" class="text-white mb-3">Want to Reject?</label>
                           
                            <input style="border: 1px solid #FEF130;" type="text" placeholder="Enter reason here..." class="form-control" id="customer-name" name="remark">
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <div>
                                 <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Reject</button>
                             </div>
                        </div>
                    </form>
               </div>
            </div>
         </div>
      </div>
      
               
               
            </table>
         </div>
      </div>
   </div>
   
 </div>         
    
   





<script src="<?=BASEURL?>assets/js/lord-icon-2.1.0.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<script>
   $(document).ready(function () {
    $('#example').DataTable();
}); 
</script>

<?php include 'footer.php';?>