<?php include 'header.php';?>
<style>
    .resetbtn {
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
<div class="container-fluid content-inner pb-5">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Reset Password</h4>
            </div>
            
           <div class="card-body">
                 <form action="<?=BASEURL?>user/reset_password" method="post">
                   <div class="row justify-content-center mt-3 mb-3">
                      <div class="form-group col-md-8">
                         <label class="form-label" for="Password">Old Password <span class="text"><?=form_error('oldpass');?></span></label>
                         <input type="text" class="form-control" id="Password" <?=$this->input->post('oldpass');?>  placeholder="Old Password" name="oldpass">
                      </div>
                      <div class="form-group col-md-8">
                         <label class="form-label" for="Password">New Password <span class="text"><?=form_error('newpass');?></span></label>
                         <input type="text" class="form-control" id="newPassword" placeholder="New Password" <?=$this->input->post('newpass');?> name="newpass">
                      </div>
                      <div class="form-group col-md-8">
                         <label class="form-label" for="Password">Confirm Password <span class="text"><?=form_error('conpass');?></span></label>
                         <input type="text" class="form-control" id="Confirm Password" <?=$this->input->post('conpass');?> placeholder="Confirm Password" name="conpass">
                      </div>
                       
                   </div>
                  <div class="resetbtn mb-5"> <button type="submit" class="btn btn-success" fdprocessedid="yp214p">Reset Password</button></div>
                </form>
            </div>
            
            
         </div>
      </div>
   </div>
</div>
<?php include 'footer.php';?>