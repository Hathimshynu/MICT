
<?php include 'header.php';?>
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>

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
           
               <form action="<?=BASEURL?>admin/fd_activate_edit" method="post">
                   <input type="hidden" class="form-control" id="" placeholder="" name="id" value="<?=$fd_package['id']?>" fdprocessedid="3kjcn6" >
                   <div class="row">
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Package Name</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_name" value="<?=$fd_package['package_name']?>" fdprocessedid="3kjcn6" >
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Package Value</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_value" value="<?=$fd_package['value']?>" fdprocessedid="3kjcn6" >
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">No of Days</label>
                     <input type="text" class="form-control" id="" placeholder="" name="days" value="<?=$fd_package['days']?>" fdprocessedid="3kjcn6" >
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Precentage</label>
                     <input type="text" class="form-control" id="" placeholder="" name="percentage" value="<?=$fd_package['percentage']?>" fdprocessedid="3kjcn6" >
                  </div>
                  </div>
                   <div class="walletbtn">   
                               <button class="btn btn-primary m-3" fdprocessedid="kjp027">Save Changes</button>
                  </div>
               </form>
        </div> 
        </div>

   </div>
</div>
</div>

<?php include 'footer.php';?>