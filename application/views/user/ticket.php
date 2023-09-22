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
.text-container{
    border:2px solid #1E90FF;
    border-radius:13px;
    padding:10px;
}
.coming-soon-text{
    letter-spacing:1px;
    color:#4DA6E9 !important;
    font-size:20px !important;
    font-weight:800;
}
</style>
<div class="container-fluid content-inner pb-5">
   <div class="row">
      <div class="col-lg-12">
         <div class="card ">
            <div class="card-header d-flex justify-content-between">
               <h4 class="card-title mb-0">Generate Support Ticket</h4>
               <!--<p><a href="<?=BASEURL?>user/tickethistory"><button class="btn btn-primary btn-sm" style="background:#0050ff!important;color:white!important">Ticket History</button></a></p>-->
            </div>
            <div class="card-body w-cardbody">
               <div class="row d-flex justify-content-center">
                  <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                      
                      <div class="card-body">
                          <div class="text-center">
                          <img src="<?=BASEURL?>assets/images/coming-soon.png" class="img-fluid img-responsive">
                          </div>
                          <div class="text-container">
                              <p class="coming-soon-text mb-0">This facility will be activated very soon</p>
                              
                          </div>
                            <div class="mt-4">
                                            <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">NOTES</label>
                                            <div class="p-2" style="background:lightcyan!important;font-weight: bold!important;color:black!important">
                                               "For the time being,Please send your quires to info@mict.uk"

</div>
                                        </div>
                      </div>
                        
                     <!--<div class="card wallet">-->
                     <!--   <div class="card-body">-->
              
                     <!--     <form id="regist" class="mt-3">-->
                     <!--                   <div class="row g-3">-->
                     <!--                       <div class="col-lg-12">-->
                     <!--                           <label for="exampleFormControlTextarea1" class="form-label">Message</label>-->
                     <!--                      <input type="hidden" name="username" value="">-->
                     <!--                           <textarea class="form-control1 bg-light border-light" name="message" id="exampleFormControlTextarea1" rows="6" placeholder="Enter comments"></textarea>-->
                     <!--                       </div>-->
                     <!--                       <div class="col-lg-12 text-end">-->
                     <!--                                  <button class="btn btn-info" type="submit" style="color:white!important">-->
                     <!--                                      Submit-->
                     <!--                                  </button>-->
                     <!--                       </div>-->
                     <!--                   </div>-->
                     <!--               </form>-->
                     <!--   </div>-->
                     <!--</div>-->
                  </div>
               </div>
            </div>
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
<script>
   $(document).ready(function () {
    $('#example2').DataTable();
   }); 
</script> 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

<script>
$('#regist').submit(function(event) {
    event.preventDefault();
    var username = $("input[name='username']").val();
    var message = $("textarea[name='message']").val();

    $.ajax({
        url: '<?php echo base_url('user/user_support'); ?>',
        type: 'POST',
        data: { username: username, message: message },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                Swal.fire({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                }).then(function() {
                    window.location.href = '<?php echo base_url('user/support'); ?>';
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    html: response.message.replace(/<\/?span[^>]*>/g, ''),
                    icon: "error",
                });
            }
        },
        error: function(xhr, status, error) {
            // Handle the error case
            Swal.fire({
                title: "Error!",
                text: "An error occurred while processing the request.",
                icon: "error",
            });
        }
    });
});
</script>


