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
               <h4 class="card-title mb-0">level Master</h4>
            </div>
            <div class="card-body"> 

               <form action="<?=BASEURL?>admin/trade_level" method="post">
                 <div class="col-lg-8 level">
                     <div class="row">
                        <div class="form-group col-md-6 ">
                           <label class="form-label" for="fname">Level 1</label>
                            <input type="text" class="form-control" id="fname" name="level1" placeholder="Direct Refferal precentage" fdprocessedid="3kjcn6">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6 ">
                           <label class="form-label" for="fname">Level 2</label>
                            <input type="text" class="form-control" id="fname" name="level2" placeholder="Direct Refferal precentage" fdprocessedid="3kjcn6">
                        </div>
                       
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6 ">
                           <label class="form-label" for="fname">Level 3</label>
                           <input type="text" class="form-control" id="fname" name="level3" placeholder="Direct Refferal precentage" fdprocessedid="3kjcn6">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6 ">
                           <label class="form-label" for="fname">Level 4</label>
                            <input type="text" class="form-control" id="fname" name="level4" placeholder="Direct Refferal precentage" fdprocessedid="3kjcn6">
                        </div>
                        
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6 ">
                           <label class="form-label" for="fname">Level 5</label>
                             <input type="text" class="form-control" id="fname" name="level5" placeholder="Direct Refferal precentage" fdprocessedid="3kjcn6">
                        </div>
                        
                     </div>
                       <div class="walletbtn">   
                     <button type="submit" class="btn btn-primary m-3" fdprocessedid="kjp027">Submit</button>
                  </div>
                  </div>
       
               </form>
           
            <div class="card-header">
               <h6 class="card-title mb-3">Level history</h6>
            </div>
             <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Update Date</th>
                     <th>Level 1</th>
                     <th>Level 2</th>
                     <th>Level 3</th>
                     <th>Level 4 </th>
                     <th>Level 5</th>
                  </tr>
               </thead>
               <tbody>
    <?php $count=1;
          $level_percentage=$this->db->get('level_master')->result_array();
          foreach( $level_percentage as $key=>$level) { ?>
                  <tr>
                     <td><?=$count++?></td>
                     <td><?=$level['entry_date']?></td>
                     <td><?=$level['level1']?>%</td>
                     <td><?=$level['level2']?>%</td>
                     <td><?=$level['level3']?>%</td>
                     <td><?=$level['level4']?>%</td>
                     <td><?=$level['level5']?>%</td>
                  </tr>
            <?php } ?>
               </tbody>
            </table>

         </div>
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