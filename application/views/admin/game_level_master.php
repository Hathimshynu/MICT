<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>

<!-- Vendors CSS -->
    <link rel="stylesheet" href="<?=BASEURL?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?=BASEURL?>assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?=BASEURL?>assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?=BASEURL?>assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?=BASEURL?>assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="<?=BASEURL?>assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="<?=BASEURL?>assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="<?=BASEURL?>assets/vendor/libs/flatpickr/flatpickr.css" />




<?php include 'header.php';?>
<style>
    .col-sm-12 {
    overflow: auto;
}
</style>
  

 <div class="container-xxl flex-grow-1 container-p-y pb-5">  
         <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Game Level Master</h4>
                                    </div>
                            
                              <div class="card-body">
                                      <fieldset class="form-group">
                                     <table class="table table-borderless" id="dynamic_field">  
                                <tr>  
                                    <td><input type="text" name="addmore[][name]" placeholder="Level 1" class="form-control name_list" /></td>  
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                </tr>  
                            </table> 
                               <button class="btn btn-primary btn-submit" style="margin-left:250px" >Submit</button>
                                  </fieldset>
                               
                                </div>
                                
                            
                           </div>
                        
                          </div>
                       
                    </div>
                    
                    <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">History</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Date</th>
                <td>Levels</td>
                <td>Percentage</td>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $his= $this->db->order_by('id','desc')->get('game_level_master')->result_array();
                   $count=1;
                   foreach($his as $key=>$row){
                      
                   ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$row['entry_date']?></td>
                <td><?=$row['level']?></td>
                <td><?=$row['percentage']?></td>
                <td><span class="mt-2 badge bg-success"><?=$row['status'];?></span></td>
            
            </tr>
            
            <!-- <tr>-->
            <!--    <td><?=$cout++?></td>-->
            <!--    <td>9/9/23 00:00:00</td>-->
            <!--    <td>xxxx</td>-->
            <!--    <td><span class="mt-2 badge bg-danger">Inactive</span></td>-->
            
            <!--</tr>-->
            
              <?php }?>
        </tbody>

    </table>
             </div>
          </div>
      </div>
                    
</div>
          
        
         <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>           

<?php include 'footer.php';?>
   

<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>





    <!--<script src="<?=BASEURL?>assets/vendor/js/menu.js"></script>-->
    
    <!--<script src="<?=BASEURL?>assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>-->

<!-- Make sure you have included jQuery and the Repeater plugin -->
<!-- For example, you can include them like this: -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="path/to/jquery.repeater.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;  
           var level = 'Level ' + i; // Generate placeholder text like "Level 2", "Level 3", ...
        $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="addmore[][name]" placeholder="' + level + '" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
  
    });  
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-submit").click(function(e) {
            e.preventDefault();
            var inner_menu = $("input[name='addmore[][name]']").map(function() {
                return $(this).val();
            }).get();

            $.ajax({
                url: "<?=BASEURL?>admin/gamelevel_master_update",
                type: 'POST',
                dataType: "json",
                data: { inner_menu: inner_menu },
                beforeSend: function() {
                    // You can add some loading animation here if needed
                },
                success: function(data) {
                    if (data.status === 'success') {
                        Swal.fire({
                            title: "Success!",
                            text: data.message,
                            icon: "success",
                        }).then((result) => {
                            // Reload the page after the user clicks "OK"
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            html: data.message.replace(/<\/?span[^>]*>/g, ''),
                            icon: "error",
                        }).then((result) => {
                            // Reload the page after the user clicks "OK"
                            location.reload();
                        });
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while processing the request.",
                        icon: "error",
                    }).then((result) => {
                        // Reload the page after the user clicks "OK"
                        location.reload();
                    });
                },
                complete: function() {
                    // This function will be called after success or error, you can remove the loading animation here
                }
            });
        });
    });
</script>



