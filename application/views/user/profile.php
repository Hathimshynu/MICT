
<?php include 'header.php';?>

<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>
    div#example_wrapper {
    margin: 20px;
}
div#example2_wrapper {
    margin: 20px;
}
div#example3_wrapper {
    margin: 20px;
}
div#example4_wrapper {
    margin: 20px;
}
div#example5_wrapper {
    margin: 20px;
}
div#example6_wrapper {
    margin: 20px;
}

.col-sm-12 {
    overflow: auto;
}
</style>

      <div class="container-fluid content-inner pb-5">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Profile</h4>
                </div>
                <div class="card-body">
                     <form action="<?=BASEURL?>user/profile" method="post">
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="fname">Name <span class="text"><?=form_error('first_name');?></span></label>
                                 <input type="text" class="form-control" id="fname" name="first_name" value="<?=$user['first_name']?>" placeholder="First Name">
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="lname">User id</label>
                                 <input type="text" class="form-control" id="User id" name="username" value="<?=$user['username']?>" placeholder="Name" readonly>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="Email">Email <span class="text"><?=form_error('email');?></span></label>
                                 <input type="text" class="form-control" id="Email" name="email" value="<?=$user['email']?>" placeholder="Email">
                              </div>
                                <div class="form-group col-md-6">
                                 <label class="form-label" for="mobno">Mobile Number: <span class="text"><?=form_error('mobile_no');?></span></label>
                                 <input type="text" class="form-control" id="mobno" name="mobile_no" value="<?=$user['mobile_no']?>" placeholder="Mobile Number">
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label">Country: <span class="text"><?=form_error('country');?></span></label>
                                 <select value="<?=$user['country']?>" name="country" class="selectpicker form-control" data-style="py-0">
                                    <option value="">Select Country</option>
                                    <option <?php if($user['country']=='Canada'){echo "selected";}?>>Canada</option>
                                    <option <?php if($user['country']=='Noida'){echo "selected";}?>>Noida</option>
                                    <option <?php if($user['country']=='USA'){echo "selected";}?>>USA</option>
                                    <option <?php if($user['country']=='India'){echo "selected";}?>>India</option>
                                    <option <?php if($user['country']=='Africa'){echo "selected";}?>>Africa</option>
                                 </select>
                              </div>
            <?php $data=$this->db->select('first_name')->where('username',$user['ref_id'])->get('user_role')->row()->first_name; ?>
                             <div class="form-group col-md-6">
                                 <label class="form-label" for="pass">Sponser Name</label>
                                 <input type="text" class="form-control" id="sponser_name" name="sponsor_name" value="<?=$data?>" placeholder="Name" /readonly >
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="rpass">Sponser ID</label>
                                 <input type="text" class="form-control" id="sponser_id" name="sponsor_id" value="<?=$user['ref_id']?>" placeholder="Sponser ID" /readonly>
                              </div>
                                 <div class="form-group col-md-6">
                                 <label class="form-label" for="fname">TRC20 Wallet Address*  <span class="text"><?=form_error('wallet_address');?></span></label>
                                 <input type="text" class="form-control" id="" name="wallet_address" value="<?=$user['wallet_address']?>" placeholder="TRC20 Wallet Address*">
                              </div>
                                <div class="form-group col-md-6">
                                 <label class="form-label" for="fname">Transaction Password*  <span class="text"><?=form_error('tpwd');?></span></label>
                                 <input type="text" class="form-control" id="" name="tpwd" value="<?=$user['tpwd']?>" placeholder="Transaction Password">
                              </div>
                           </div>
                          
                           <button type="submit" class="btn btn-info">Update</button>
                        </form>
                    
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
    $('#example1').DataTable();
}); 
   $(document).ready(function () {
    $('#example2').DataTable();
});
   $(document).ready(function () {
    $('#example3').DataTable();
});
   $(document).ready(function () {
    $('#example4').DataTable();
});
   $(document).ready(function () {
    $('#example5').DataTable();
});
   $(document).ready(function () {
    $('#example6').DataTable();
});
</script>






<?php include 'footer.php';?>