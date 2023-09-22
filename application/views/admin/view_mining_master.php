.<?php include 'header.php';?>








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
.row {
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
               <h4 class="card-title mb-0">Mining Master Packages</h4>
            </div>
            <div class="card-body"> 
            
            
            
            <div class="card-header">
               <h6 class="card-title mb-3">Mining history</h6>
            </div>
             <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Date</th>
                     <th>Package</th>
                     <th>Value</th>
                     <th>Percentage</th>
                     <th>GIF</th>
                     <th>Image</th>
                      <th>Action</th>
                  </tr>
               </thead>
               <tbody>
     <?php 
          $count=1;
          foreach($mining_data as $key => $mining){ ?>
                  <tr>
                     <td><?=$count++?></td>
                     <td><?=$mining['entry_date']?></td>
                     <td><?=$mining['package_name']?></td>
                     <td><?=$mining['value']?></td>
                     <td><?=$mining['percentage']?>%</td>
                     <td><img width="80px" src="<?=MININGURL.$mining['gif']?>"></td>
                     <td><img width="80px" src="<?=MININGURL.$mining['image']?>"></td>
                     <td>
                         
                         <a href="<?=BASEURL?>admin/block/<?=$mining['id']?>"><button type="button" class="btn btn-danger btn-sm" fdprocessedid="60z5ko"><i class="fa-solid fa-ban me-1"></i>Block</button></a>
                     </td>
                  </tr>
            <?php } ?>
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
    $(document).ready(function () {
    $('#example2').DataTable();
   });
</script>







<?php include 'footer.php';?>