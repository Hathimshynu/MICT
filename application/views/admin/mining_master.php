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
               <h4 class="card-title mb-0">Mining Master</h4>
            </div>
            <div class="card-body"> 

               <?=form_open_multipart('admin/add'); ?>
                   <div class="row">
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Package Name <span class="text"><?=form_error('package_name');?></span></label>
                     <input type="text" class="form-control" id="fname" name="package_name" fdprocessedid="3kjcn6">
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Value <span class="text"><?=form_error('value');?></span></label>
                     <input type="text" class="form-control" id="fname" name="value" fdprocessedid="3kjcn6">
                  </div>
                  </div>
                   <div class="row">
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Percentage <span class="text"><?=form_error('percentage');?></span></label>
                     <input type="text" class="form-control" id="fname" name="percentage" fdprocessedid="3kjcn6">
                  </div>
                  <div class="form-group col-md-6">
                  <div class="mb-3">
                <label class="form-label" for="customFile">Gif</label>
                <input type="file" class="form-control" name="imagee" id="customFile">
                  </div>
                  </div>
                   <div class="form-group col-md-6">
                  <div class="mb-3">
                <label class="form-label" for="customFile">Image</label>
                <input type="file" class="form-control" name="imageee" id="customFile">
                  </div>
                  </div>
                  </div>
                  <div class="walletbtn">   
                     <button type="submit" class="btn btn-primary m-3" fdprocessedid="kjp027">Submit</button>
                  </div>
                  
               <?=form_close(); ?>
           
            <div class="card-header">
               <h6 class="card-title mb-3">Active Mining Packages</h6>
            </div>
            <table id="example" class="table" style="width:100%">
   
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Mining Speed</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
     <?php $mining_data=$this->db->order_by('id','desc')->group_by('percentage')->where('status','Active')->get('package')->result_array();
          $count=1;
          foreach($mining_data as $key => $mining){ ?>
                  <tr>
                     <td><?=$count++?></td>
                     <td><?=$mining['percentage']?>%</td>
                     <td>
                          <a href="<?=BASEURL?>admin/view_mining_master/<?=bin2hex($mining['percentage'])?>"><button type="button" class="btn btn-primary btn-sm" fdprocessedid="60z5ko">View</button></a>
                     </td>
                  </tr>
            <?php } ?>
               </tbody>
            </table>
            
    <!--<div class="card-header">-->
    <!--           <h6 class="card-title mb-3">Inactive Mining Packages</h6>-->
    <!--        </div>-->
    <!--        <table id="example" class="table" style="width:100%">-->
   
    <!--           <thead>-->
    <!--              <tr>-->
    <!--                 <th>SL.no</th>-->
    <!--                 <th>Mining Speed</th>-->
    <!--                 <th>Action</th>-->
    <!--              </tr>-->
    <!--           </thead>-->
    <!--           <tbody>-->
    <!-- $mining_details=$this->db->group_by('percentage')->where('status','Inactive')->get('package')->result_array();-->
    <!--      $count=1;-->
    <!--      foreach($mining_details as $key=>$min){ ?>-->
    <!--              <tr>-->
    <!--                 <td><?=$count++?></td>-->
    <!--                 <td><?=$min['percentage']?></td>-->
    <!--                 <td>-->
    <!--                      <a href="<?=BASEURL?>admin/view_mining_master_inactive/<?=$min['percentage']?>"><button type="button" class="btn btn-primary btn-sm" fdprocessedid="60z5ko">View</button></a>-->
    <!--                 </td>-->
    <!--              </tr>-->
    <!--         } ?>-->
    <!--           </tbody>-->
    <!--        </table>-->
            <div class="card-header">
               <h6 class="card-title mb-3">Splitting form</h6>
            </div>

               <form action="<?=BASEURL?>admin/split_form_mining" method="post" >
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label class="form-label" for="fname">E-wallet <span class="text"><?=form_error('e_wallet');?></span></label>
                        <input type="text" class="form-control" id="fname" name="e_wallet" placeholder="" fdprocessedid="3kjcn6">
                     </div>
                     <div class="form-group col-md-6">
                        <label class="form-label" for="fname">Withdraw wallet <span class="text"><?=form_error('withdraw_wallet');?></span></label>
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
         <?php  $mining_data=$this->db->where('type','mining')->get('split_binary_master')->result_array();
                $count=1;
                foreach($mining_data as $key=>$data){ ?>
                  <tr>
                     <td><?=$count?></td>
                     <td><?=$data['entry_date']?></td>
                     <td><?=$data['roi_divide']?>%</td>
                     <td><?=$data['eroi_divide']?>%</td>
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