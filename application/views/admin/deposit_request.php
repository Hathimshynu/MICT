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
  

 <div class="container-xxl flex-grow-1 container-p-y">  
         

   
        
        
  
                    
                                     <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Requests</h4>
                </div>
                <br>
                 <table id="example1" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>User ID</th>
                <th>Amount</th>
                <th>TXid</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $his= $this->db->where('status','Request')->get('admin_request')->result_array();
                   $count=1;
                   foreach($his as $key=>$row){
                      
                   ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$row['user_id']?></td>
                <td><?=$row['wallet_value']?></td>
                <td><?=$row['utr']?></td>
               <td><?=$row['entry_date']?></td>
               <td><a class="btn btn-primary btn-sm "  onclick="showpayConfirmation(event, '<?=BASEURL?>admin/deposit_accept/<?=$row['admin_request_id']?>')">Accept</a>
                   <a class="btn btn-danger btn-sm "  onclick="showDeleteConfirmation(event, '<?=BASEURL?>admin/deposit_reject/<?=$row['admin_request_id']?>')">Reject</a>
               </td>
              
            
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
                    
                     <div class="row mb-5">
          <div class="col-lg-12">
             <div class="card ">
                 <div class="card-header">
                    <h4 class="card-title mb-0"> History</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">SL.no</th>
                 <th class="text-center">User ID</th>
                 <th class="text-center">User Name</th>
                <th class="text-center">Date</th>
                <th class="text-center">Time</th>
                <th class="text-center">USDT</th>
                <th class="text-center">TXid</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $deposit_history = $this->db->get('admin_request')->result_array();
            foreach($deposit_history as $key => $deposit){
                $username=$this->db->where('username',$deposit['user_id'])->get('user_role')->row_array();
            ?>
            <tr>
                <td class="text-center"><?=$count++?></td>
                <td class="text-center"><?=$deposit['user_id'];?></td>
                <td class="text-center"><?=$username['first_name'];?></td>
                
                <td class="text-center"><?= date('d F Y', strtotime($deposit['entry_date'])); ?></td>
                <td class="text-center"><?= date('H:i:s', strtotime($deposit['entry_date'])); ?></td>
                <td class="text-center"><?=$deposit['wallet_value'];?></td>
                <td class="text-center"><?=$deposit['utr'];?></td>
               <td class="text-center">
                <span class="badge <?php echo ($deposit['status'] == 'Accepted') ? 'bg-success' : 'bg-danger'; ?>">
                    <?php echo $deposit['status']; ?>
                </span>
            </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
             </div>
          </div>
      </div>
                    
                    
                    </div>
          
        <?php include 'footer.php';?>
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>          


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





  



<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>





    <script src="<?=BASEURL?>assets/vendor/js/menu.js"></script>
    
    <script src="<?=BASEURL?>assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>

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
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

<script>
function showDeleteConfirmation(event, rejecturl) {
  event.preventDefault(); // Prevent the default behavior of the link
  Swal.fire({
    title: 'Confirmation',
    text: 'Are you sure you want to reject the deposit ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
  }).then((result) => {
    if (result.isConfirmed) {
       window.location.href = rejecturl; // Pass the deleteUrl to the reject function
    } else {
      Swal.fire('Reject canceled.', '', 'error');
    }
  });
}

function deleteBankAccount(reject) {
  // Make an AJAX request to delete the account
  fetch(rejecturl, { method: 'REJECT' }) // Send a DELETE request to the deleteUrl
    .then(response => response.json())
    .then(data => {
      Swal.fire('Payout deleted!', '', 'success');
    })
    .catch(error => {
      Swal.fire('Reject failed.', '', 'error');
    });
}
</script>


<script>
function showpayConfirmation(event, payurl) {
  event.preventDefault(); // Prevent the default behavior of the link
  Swal.fire({
    title: 'Confirmation',
    text: 'Are you sure you want to Accept ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
  }).then((result) => {
    if (result.isConfirmed) {
       window.location.href = payurl; // Pass the deleteUrl to the reject function
    } else {
      Swal.fire('Deposit canceled.', '', 'error');
    }
  });
}


</script>




