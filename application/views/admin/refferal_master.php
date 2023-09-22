
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
               <h4 class="card-title mb-0">Refferal Master</h4>
            </div>
            <div class="card-body"> 

               <form action="<?=BASEURL?>admin/refferal_master" method="post">
                   <div class="row">
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Refferal precentage</label>
                     <input type="text" class="form-control" id="fname" name="percentage" placeholder="Direct Refferal precentage" fdprocessedid="3kjcn6">
                     <button type="submit" class="btn btn-primary m-3" fdprocessedid="kjp027">Submit</button>
                  </div>
                  </div>
               </form>
           
            <div class="card-header">
               <h6 class="card-title mb-3">Refferal history</h6>
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
          $direct_income=$this->db->get('referal_master')->result_array();
          foreach( $direct_income as $key=>$direct) { ?>
                  <tr>
                     <td><?=$count++?></td>
                     <td><?=$direct['entry_date']?></td>
                     <td><?=$direct['referal_percentage']?>%</td>
                  </tr>
                <?php } ?>
               </tbody>
            </table>
            <div class="card-header">
               <h6 class="card-title mb-3">Splitting form</h6>
            </div>

               <form action="<?=BASEURL?>admin/split_form_referal" method="post" >
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label class="form-label" for="fname">E-wallet</label>
                        <input type="text" class="form-control" id="fname" name="e_wallet" placeholder="" fdprocessedid="3kjcn6">
                     </div>
                     <div class="form-group col-md-6">
                        <label class="form-label" for="fname">Withdraw wallet</label>
                        <input type="text" class="form-control" id="fname" name="withdraw_wallet" placeholder="" fdprocessedid="3kjcn6">
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
    <?php  $referal_data=$this->db->where('type','direct')->get('split_binary_master')->result_array();
        $count=1;
        foreach($referal_data as $key=>$data){ ?>
                  <tr>
                     <td><?=$count++?></td>
                     <td><?=$data['entry_date']?></td>
                     <td><?=$data['direct_divide']?>%</td>
                     <td><?=$data['edirect_divide']?>%</td>
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