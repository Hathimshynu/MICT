<?php include 'header.php';?>
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>
   div#example_wrapper {
   margin: 20px;
   }
   .col-sm-12 {
   overflow: auto;
   }
</style>
<div class="container-fluid content-inner pb-0">
   <div class="row">
      <div class="col-lg-12">
         <div class="card ">
            <div class="card-header">
               <h4 class="card-title mb-0">Withdrawal</h4>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                           <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                 <div class="card wallet overflow-hidden">
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="col">
                                             <h4 class="">Withdraw-wallet</h4>
                                             <h5 class="mb-2 number-font"><?=sprintf('%.2f',floatval($this->db->select('sum(credit - debit) as balance')->where('username',$this->session->userdata('micusername'))->where('entry_date <=',date('Y-m-d H:i:s'))->get("account")->row()->balance+0));?> USDT</h5>
                                          </div>
                                          <div class="col col-auto">
                                             <div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
                                                <i class="fe fe-dollar-sign text-white mb-5 "></i>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card wallet">
                        <div class="card-body">
                <?php $wallet=$this->db->select('wallet_address')->where('username',$this->session->userdata('micusername'))->get('user_role')->row()->wallet_address; ?>
                           <form action="<?=BASEURL?>user/withdrawal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                              <div class="">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Wallet Address </label>
                                    <input type="text" name="withdraw_wallet" value="<?=$wallet?>" class="form-control" readonly="" fdprocessedid="4bitmu">
                                 </div>
                                 <div class="form-group"><span style="color:red;"></span>
                                    <label for="exampleInputEmail1" class="form-label">USDT <span class="text-danger"><?=form_error('amount');?></span></label>
                                    <input type="number" name="amount" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter Transfer USDT" fdprocessedid="ijryfu">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Transaction Password <span class="text-danger"><?=form_error('tpass');?></span></label>
                                    <input type="password" name="tpass" value="" class="form-control" id="exampleInputEmail1" fdprocessedid="79lwiv">
                                 </div>
                              </div>
                              <div class="text-center">
                                 <button type="submit" class="btn btn-primary  mt-4 mb-0" fdprocessedid="9a036e">Transfer</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div  class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                     <div class="card wallet">
                        <div class="card-body" style="mt-20">
                           <form action="<?=BASEURL?>user/user_wallet" method="post">
                              <div class="">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Wallet Address </label>
                                    <input type="text" name="wallet_address" value="" class="form-control" placeholder="Enter TRC20 Wallet Address "fdprocessedid="4bitmu">
                                 </div>
                                 
                                        <div class="form-group">
                                            <label for="wallet">OTP:<?=form_error('otp'); ?></label>
                                            <div class="input-group">
                                              
                                            <?php $dataotp = array(
                                                'type'  => 'text',
                                                'name'  => 'otp',
                                                'id'    => 'otp',
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            );
                    
                                            echo form_input($dataotp); ?>
                                              <button class="btn btn-success" name="btn_otp" id="btn_otp" type="button">Send Email OTP</button>
                                            </div>
                                         <h6 style="color:#d2a60c;"><span style="margin-left:1rem;" id="countdown"></span><i style="margin-left:1rem;"></i></h6>
                                        </div>
                                                     
                                 
                              </div>
                              <div class="text-center">
                                 <button type="submit" class="btn btn-primary  mt-4 mb-0" fdprocessedid="9a036e">Submit</button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="card wallet mt-2">
                        <div class="card-body" style="mt-20">
                           <table id="example2" class="table" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>SL.no</th>
                                    <th>Date</th>
                                    <th>Wallet</th>
                                 </tr>
                              </thead>
                              <tbody>
                <?php $wallet_address=$this->db->where('username',$this->session->userdata('micusername'))->get('wallet_address')->result_array();
                      $count=1;
                      foreach($wallet_address as $key=>$address) { ?>
                                 <tr>
                                    <td><?=$count++?></td>
                                    <td><?=$address['entry_date']?></td>
                                    <td><?=$address['address']?></td>
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
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Withdrawal History</h4>
            </div>
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Date & Time</th>
                     <th>USDT</th>
                     <th>Wallet</th>
                  </tr>
               </thead>
               <tbody>
                   <?php $withdraw = $this->db->where('username',$this->session->userdata('micusername'))->where('remark','Withdraw')->get('account')->result_array();
                   foreach($withdraw as $k => $wd)
                   {
                   ?>
                  <tr>
                     <td><?=$count++;?></td>
                     <td><?=$wd['entry_date'];?></td>
                     <td><?=$wd['debit']?> USDT</td>
                     <td><?=$wd['description']?></td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php include 'footer.php';?>
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
    
        $("#btn_otp").click(function(){
           var timeleft = 120;
           var downloadTimer = setInterval(function(){
           if(timeleft <= 0){
            //   alert('hai');
               $('#btn_otp').prop('disabled', false);
               $('#countdown').prop('disabled', true);
            clearInterval(downloadTimer);
            
            document.getElementById("countdown").innerHTML = "Finished";
          } else {
               $('#btn_otp').prop('disabled', true);
            document.getElementById("countdown").innerHTML = timeleft + " seconds";
          }
          timeleft -= 1;
        }, 1000);
        
          var user=$('#email').val();
            //   alert(user);
          $.post('<?=BASEURL?>user/send_otp', {
                'email': user
            })
            .done(function(res) {
                $('.toast').toast('show');
            });
        });
</script>
