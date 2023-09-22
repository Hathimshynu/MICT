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
<?php include 'header.php';?>
<div class="container-fluid content-inner pb-0">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Binary Master</h4>
            </div>
            <div class="card-body"> 

               <form action="<?=BASEURL?>admin/binary_master" method="post">
                   <div class="row">
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Pair match Percentage</label>
                     <input type="text" class="form-control" id="fname" name="pair_match" placeholder="Pair match Percentage" fdprocessedid="3kjcn6">
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
                     <th>Precentage</th>
                  </tr>
               </thead>
               <tbody>
        <?php $count=1;
          $pair_match=$this->db->get('binary_master')->result_array();
          foreach($pair_match as $key=>$pair) { ?>
                  <tr>
                     <td><?=$count++?></td>
                     <td><?=$pair['entry_date']?></td>
                     <td><?=$pair['binary_percentage']?>%</td>
                  </tr>
                <?php } ?>
               </tbody>
            </table>
            <div class="card-header">
               <h6 class="card-title mb-3">Splitting form</h6>
            </div>

               <form action="<?=BASEURL?>admin/split_form_binary" method="post" >
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label class="form-label" for="fname">E-wallet</label>
                        <input type="text" class="form-control" id="fname" name="e_wallet" placeholder="" fdprocessedid="3kjcn6">
                     </div>
                     <div class="form-group col-md-6">
                        <label class="form-label" for="fname">Withdraw wallet</label>
                        <input type="text" class="form-control" id="fname" placeholder="" name="withdraw_wallet" fdprocessedid="3kjcn6">
                     </div>
                  </div>
                  <div class="walletbtn">   
                     <button type="submit" class="btn btn-primary m-3" fdprocessedid="kjp027">Submit</button>
                  </div>
               </form>
            
            <div class="card-header">
               <h6 class="card-title mb-3">Split form Update History</h6>
            </div>
            <table id="example2" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Update Date</th>
                     <th>E-wallet</th>
                     <th>withdraw-wallet</th>
                  </tr>
               </thead>
               <tbody>
 <?php  $binary_data=$this->db->where('type','binary')->get('split_binary_master')->result_array();
        $count=1;
        foreach($binary_data as $key=>$data){ ?>
                  <tr>
                     <td><?=$count?></td>
                     <td><?=$data['entry_date']?></td>
                     <td><?=$data['binary_divide']?>%</td>
                     <td><?=$data['ebinary_divide']?>%</td>
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