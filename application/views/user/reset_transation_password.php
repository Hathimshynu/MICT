<?php include 'header.php';?>
<style>
    .resetbtn {
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
               <h4 class="card-title mb-0">Change Transation Password</h4>
            </div>
           
             <form action="<?=BASEURL?>user/reset_tpass" method="post">
               <div class="row justify-content-center mt-3 mb-3">
                  <div class="form-group col-md-8">
                     <label class="form-label" for="Password">Old Password <?=form_error('oldpass');?></span></label>
                     <input type="text" class="form-control" id="Password" placeholder="Old Password" fdprocessedid="8085c" name="oldpass">
                  </div>
                  <div class="form-group col-md-8">
                     <label class="form-label" for="Password">New Password <?=form_error('newpass');?></span></label>
                     <input type="text" class="form-control" id="newPassword" placeholder="New Password" fdprocessedid="69cnyh" name="newpass">
                  </div>
                  <div class="form-group col-md-8">
                     <label class="form-label" for="Password">Confirm Password <?=form_error('conpass');?></span></label>
                     <input type="text" class="form-control" id="Confirm Password" placeholder="Confirm Password" fdprocessedid="301i5" name="conpass">
                  </div>
                   
               </div>
              <div class="resetbtn mb-5"> <button type="submit" class="btn btn-primary" fdprocessedid="yp214p">Change Password</button></div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include 'footer.php';?>