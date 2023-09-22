
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
<div class="container-fluid content-inner pb-0">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">FD Activate</h4>
            </div>
            <div class="card-body"> 
          
               <form action="<?=BASEURL?>admin/fd_activate" method="post">
                   <div class="row">
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Package Name</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_name" value="" fdprocessedid="3kjcn6" >
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Package Value</label>
                     <input type="text" class="form-control" id="" placeholder="" value="" name="package_value" fdprocessedid="3kjcn6" >
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">No of Days</label>
                     <input type="text" class="form-control" id="" placeholder="" value="" name="days" fdprocessedid="3kjcn6" >
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Percentage</label>
                     <input type="text" class="form-control" id="" placeholder="" value="" name="percentage" fdprocessedid="3kjcn6" >
                  </div>
                  </div>
                   <div class="walletbtn">   
                     <button class="btn btn-primary m-3" fdprocessedid="kjp027">Submit</button>
                  </div>
               </form>
        </div> 
        </div>
          <div class="card"> 
            <div class="card-header">
               <h6 class="card-title mb-3">Level history</h6>
            </div>
             <div class="card-body"> 
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Entry Date</th>
                     <th>Package Name</th>
                     <th>Package Value</th>
                     <th>No of Days</th>
                     <th>Precentage</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                   <?php
                   $wallet = $this->db->get('fd_package')->result_array();
                   $count = 1;
                   foreach($wallet as $key => $rs){
                   ?>
                  <tr>
                     <td><?=$count++;?></td>
                     <td><?=$rs['entry_date'];?></td>
                     <td><?=$rs['package_name'];?></td>
                     <td><?=$rs['value'];?></td>
                     <td><?=$rs['days'];?></td>
                     <td><?=$rs['percentage'];?>%</td>
                     <td><a href="<?=BASEURL?>admin/fd_activate_edit/<?=bin2hex($rs['id']);?>"><button type="button" class="btn btn-primary btn-sm">Edit</button></a></td>
                  </tr>
                 <?php 
                 }
                 ?>
               </tbody>
            </table>
          
         </div>
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