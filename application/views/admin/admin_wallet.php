
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
               <h4 class="card-title mb-0">Withdrawal</h4>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                 
                     <div class="card">
                         
            <div class="card-header">
               <h4 class="card-title mb-0">Withdrawal wallet</h4>
            </div>
            <div class="card-body"> 
            <?php $now_wallet = $this->db->order_by('id','DESC')->get('admin_wallet')->row_array(); ?>
               <form>
                   <div class="row">
                  <div class="form-group col-md-12">
                     <label class="form-label" for="fname">Wallet address</label>
                     <input type="text" class="form-control" id="" placeholder="" value="<?=$now_wallet['withdraw_wallet']?>" fdprocessedid="3kjcn6" readonly>
                  </div>
                  <!-- <div class="form-group col-md-12">-->
                  <!--   <label class="form-label" for="fname">Hex</label>-->
                  <!--   <input type="text" class="form-control" id="" placeholder="" value="<?=$now_wallet['hex']?>" fdprocessedid="3kjcn6" readonly>-->
                  <!--</div>-->
                   <div class="form-group col-md-12">
                     <label class="form-label" for="fname">Private Key</label>
                     <input type="text" class="form-control" id="" placeholder="" value="<?=$now_wallet['private_key']?>" fdprocessedid="3kjcn6" readonly>
                  </div>
                  <!-- <div class="form-group col-md-12">-->
                  <!--   <label class="form-label" for="fname">Public Key</label>-->
                  <!--   <input type="text" class="form-control" id="" placeholder="" value="<?=$now_wallet['public_key']?>" fdprocessedid="3kjcn6" readonly>-->
                  <!--</div>-->
                  </div>
                   <div class="walletbtn">   
                     <a href="<?=BASEURL?>admin/create_wallet" class="btn btn-primary m-3" fdprocessedid="kjp027">Create</a>
                  </div>
               </form>
        </div> 
        
                     </div>
                  </div>
                  <?php $current = $this->db->select('wallet_address')->where('username',$this->session->userdata('mcusername'))->get('user_role')->row()->wallet_address; ?>
                  <div  class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                     <div class="card">
                        <div class="card-header">
                               <h4 class="card-title mb-0">Deposit wallet</h4>
                            </div>
                        <div class="card-body">
                           <form action="<?=BASEURL?>admin/admin_wallet" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                              <div class="">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Wallet Address <?=form_error('wallet_address');?></label>
                                    <input type="text" name="wallet_address" value="" class="form-control" placeholder="Enter TRC20 Wallet Address "fdprocessedid="4bitmu">
                                 </div>
                                   
                     <!--   <div class="mb-3">-->
                     <!--   <div class="inr-icon"></div>-->
                     <!--   <p id="demo" class="text-danger"></p>-->
                     <!--   <p id="timer"></p>-->
                     <!--   <input placeholder="Enter Your User Id *" id="username" type="text" class=" form-control form-control-lg " name="username" value="" required="" autofocus="">-->
                     <!--   <div class="text-danger"><?=form_error('username');?></div>-->
                     <!--</div>-->
                   
                     <!--<div class="col-xs-4 col-lg-5 p-0">-->
                     <!--   <div class="otp-btn">-->
                     <!--      <a id="sendotp" type="button" class="btn btn-success" onclick="otp()">Send OTP</a>-->
                     <!--   </div>-->
                     <!--</div><br>-->
                    
                   
                              </div>
                              <p>Current Wallet : <?=$current;?></p>
                              <div class="text-center">
                                 <button type="submit" class="btn btn-primary  mt-4 mb-0" fdprocessedid="9a036e">Submit</button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="card mt-2">
                        <div class="card-body" style="mt-20">
                           <table id="example2" class="table" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>SL.no</th>
                                    <th>Date & Time</th>
                                    <th>Wallet</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $address = $this->db->where('username',$this->session->userdata('mcusername'))->get('wallet_address')->result_array();
                                  $count =1;
                                  foreach($address as $key => $ad)
                                  {
                                  ?>
                                 <tr>
                                    <td><?=$count++;?></td>
                                    <td><?=$ad['entry_date'];?></td>
                                    <td><?=$ad['address'];?></td>
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
      </div>
   </div>
       
          <div class="card"> 
            <div class="card-header">
               <h6 class="card-title mb-3">Admin Withdrawal Wallet History</h6>
            </div>
             <div class="card-body"> 
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Created date</th>
                     <th>Wallet address</th>
                     <th>Hex</th>
                     <th>Private Key</th>
                     <th>Public Key</th>
                  </tr>
               </thead>
               <tbody>
                   <?php
                   $wallet = $this->db->get('admin_wallet')->result_array();
                   $count = 1;
                   foreach($wallet as $key => $rs){
                   ?>
                  <tr>
                     <td><?=$count++;?></td>
                     <td><?=$rs['entry_date'];?></td>
                     <td><?=$rs['withdraw_wallet'];?></td>
                     <td><?=$rs['hex'];?></td>
                     <td><?=$rs['private_key'];?></td>
                     <td><?=$rs['public_key'];?></td>
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
<script>
   function otp(){
      var em = document.getElementById('sendotp').value;
         $.post('<?=BASEURL?>admin/forgot_otp', {
            'email': em,
         })
         .done(function(res) {
           
               document.getElementById("demo").innerHTML = "OTP has sent to your registred email";
               document.getElementById("sendotp").style.pointerEvents = "none";
   
               document.getElementById('timer').innerHTML =
               05 + ":" + 00;
               startTimer();
               function startTimer() {
                  var presentTime = document.getElementById('timer').innerHTML;
                  var timeArray = presentTime.split(/[:]+/);
                  var m = timeArray[0];
                  var s = checkSecond((timeArray[1] - 1));
                  if(s==59){m=m-1}
                     if(m<0){
                        document.getElementById("demo").innerHTML = "If you don't get OTP. Click send OTP again";
                        document.getElementById("sendotp").style.pointerEvents = "none";
                        return
                     }
   
                     document.getElementById('timer').innerHTML =
                     m + ":" + s;
                     console.log(m)
                     setTimeout(startTimer, 1000);
   
                  }
   
                  function checkSecond(sec) {
                     if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
                     if (sec < 0) {sec = "59"};
                     return sec;
                     }
                     
   });
      
   }
</script>


<?php include 'footer.php';?>

