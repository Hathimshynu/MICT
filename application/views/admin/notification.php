
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
           <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Notification</h4>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                 
                     <div class="card">
                         
            <div class="card-header">
               <h4 class="card-title mb-0">Notification</h4>
            </div>
            <div class="card-body"> 
           
               <form action="<?=BASEURL?>admin/notification" method="POST" enctype="multipart/form-data">
                   <div class="row">
                  <div class="form-group col-md-12">
                     <label class="form-label" for="fname">Title</label>
                     <input type="text" class="form-control" name="title" id="" placeholder="" value="" fdprocessedid="3kjcn6" >
                  </div>
                   <div class="form-group col-md-12">
                     <label class="form-label" for="fname">Image</label>
                     <input type="file" class="form-control" id="" placeholder="" name="userfile" value="" fdprocessedid="3kjcn6" >
                  </div>
                  
                  </div>
                   <div class="walletbtn">   
                     <button type="submit" class="btn btn-primary m-3" fdprocessedid="kjp027">Submit</button>
                  </div>
               </form>
        </div> 
        
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
       
          <div class="card"> 
            <div class="card-header">
               <h6 class="card-title mb-3">Notification History</h6>
            </div>
             <div class="card-body"> 
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Created date</th>
                     <th>Title</th>
                     <th>Image</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                   <?php
                   $no = $this->db->get('notification')->result_array();
                   $count = 1;
                   foreach($no as $key => $rs){
                       
                       if($rs['status'] == 1){
                           $status = 'Active';
                            $col = 'success';
                       } else {
                           $status = 'Inactive';
                           $col = 'danger';
                       }
                   ?>
                  <tr>
                     <td><?=$count++;?></td>
                     <td><?=$rs['entry_date'];?></td>
                     <td><?=$rs['title'];?></td>
                     <td><a href="<?=BASEURL?>assets/notification/<?=$rs['image'];?>"><img src="<?=BASEURL?>assets/notification/<?=$rs['image'];?>" width="50px"></a></td>
                     <td><a class="btn btn-<?=$col?> btn-sm" href="<?=BASEURL?>admin/active_notification/<?=bin2hex($rs['id'])?>"><?=$status?></a> <a class="btn btn-danger btn-sm" href="<?=BASEURL?>admin/delete_notification/<?=bin2hex($rs['id'])?>">Delete</a></td>
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
<script>
   $(document).ready(function () {
    $('#example2').DataTable();
   }); 

</script>



<?php include 'footer.php';?>

