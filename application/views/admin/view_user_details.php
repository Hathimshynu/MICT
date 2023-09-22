
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

      <div class="container-fluid content-inner pb-0">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">User Credentials</h4>
                </div>
                <div class="card-body">
                     <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-Profile-tab" data-bs-toggle="tab" data-bs-target="#nav-Profile" type="button" role="tab" aria-controls="nav-Profile" aria-selected="true">Profile</button>
                       
                        <button class="nav-link" id="nav-DepositWallet-tab" data-bs-toggle="tab" data-bs-target="#nav-DepositWallet" type="button" role="tab" aria-controls="nav-DepositWallet" aria-selected="false">Deposit Wallet</button>
                         <button class="nav-link" id="nav-WithdrawalHistory-tab" data-bs-toggle="tab" data-bs-target="#nav-WithdrawalHistory" type="button" role="tab" aria-controls="nav-WithdrawalHistory" aria-selected="false">Withdrawal History</button>
                        <button class="nav-link" id="nav-Depositreferrals-tab" data-bs-toggle="tab" data-bs-target="#nav-Depositreferral" type="button" role="tab" aria-controls="nav-Depositreferral" aria-selected="false">Direct referrals</button>
                        <button class="nav-link" id="nav-DirectIncome-tab" data-bs-toggle="tab" data-bs-target="#nav-DirectIncome" type="button" role="tab" aria-controls="nav-DirectIncome" aria-selected="false">Direct Income</button>
                        <button class="nav-link" id="nav-ROIHistory-tab" data-bs-toggle="tab" data-bs-target="#nav-ROIHistory" type="button" role="tab" aria-controls="nav-ROIHistory" aria-selected="false">ROI History</button>
                        <button class="nav-link" id="nav-LevelIncome-tab" data-bs-toggle="tab" data-bs-target="#nav-LevelIncome" type="button" role="tab" aria-controls="nav-LevelIncome" aria-selected="false">Level Income</button>
                        <!--<button class="nav-link" id="nav-BinaryIncome-tab" data-bs-toggle="tab" data-bs-target="#nav-BinaryIncome" type="button" role="tab" aria-controls="nav-BinaryIncome" aria-selected="false">Binary Income</button>-->
                        
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-Profile" role="tabpanel" aria-labelledby="nav-Profile-tab">
                          <form action="<?=BASEURL?>admin/update_profile" method="post">
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
                                    <option >Select Country</option>
                                    <option <?php if($user['country']=='Caneda'){echo "selected";}?>>Caneda</option>
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
                                 <label class="form-label" for="pass">Joining Date</label>
                                 <input type="text" class="form-control" id="date" name="entry_date" value="<?=$user['entry_date']?>"  placeholder="Joining Date" /readonly>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="rpass">Active Date</label>
                                 <input type="text" class="form-control" id="date" value="<?=$user['active_date']?>" placeholder="Active date " /readonly>
                              </div>
                           </div>
                          
                           <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                      </div>
                      <div class="tab-pane fade" id="nav-DepositWallet" role="tabpanel" aria-labelledby="nav-DepositWallet-tab">
                         <div class="row">
                             <div class="col-lg-6">
                                  <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL.no</th>
                                    <th>Credited Date</th>
                                    <th>Wallet Address</th>
                                    <th>Private Key</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $deposit_wallet = $this->db->where('user_id',$user['username'])->where('remark','Deposit')->get('e_wallet')->result_array();
                              $count = 1;
                              foreach($deposit_wallet as $k => $dw)
                              {
                                  $user_wallet = $this->db->where('username',$user['username'])->get('user_wallet')->row_array();
                              ?>  
                                <tr>
                                    <td><?=$count++;?></td>
                                    <td><?=$dw['entry_date']?></td>
                                    <td><?=$user_wallet['withdraw_wallet'];?></td>
                                    <td><?=$user_wallet['private_key'];?></td>
                                </tr>
                               <?php } ?>
                                 
                            </tbody>
                    
                        </table>
                             </div>
                             <div class="col-lg-6">
                                 <div class="mobile mt-3">
                                     <div class="app">
                                         <div class="row">
                                             <div class="col-lg-10 d-flex justify-content-center ">
                                               <div class="card shining-card">
                                                  <div class="card-body ">
                                                     <div class="text-center">
                                                        <svg height="30px" width="30px" version="1.1" id="_x36_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                                           <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                           <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                           <g id="SVGRepo_iconCarrier">
                                                              <g>
                                                                 <path style="fill:#e09515;" d="M363.233,42.356c-0.953,6.324-5.024,13.079-12.473,19.143 c-24.426,19.749-32.569,36.033-34.647,41.144c-0.433,1.126-0.606,1.732-0.606,1.732H196.493c0,0-0.173-0.606-0.606-1.732 c-2.079-5.111-10.221-21.395-34.647-41.144c-0.26-0.173-0.433-0.347-0.606-0.52c-27.545-23.041-5.63-54.136,35.86-42.53 c1.992,0.52,3.811,0.953,5.457,1.213C224.211,22.954,218.408,0,256,0c40.451,0,30.663,26.505,59.507,18.45 c7.969-2.252,15.158-2.858,21.482-2.338C355.091,17.757,365.485,29.277,363.233,42.356z"></path>
                                                                 <path style="fill:#e09515;" d="M443.095,324.905C443.095,428.24,359.335,512,256,512c-26.851,0-52.404-5.63-75.445-15.938 c-42.616-18.709-76.916-53.01-95.713-95.626c-10.221-23.127-15.938-48.679-15.938-75.531c0-97.445,94.154-171.85,123.084-198.268 c1.732-1.473,3.292-2.945,4.504-4.158h119.013c1.213,1.213,2.772,2.685,4.504,4.158 C348.941,153.055,443.095,227.459,443.095,324.905z"></path>
                                                                 <path style="fill:#10100e;" d="M328.932,114.856c0,5.717-3.811,10.394-8.921,11.781c-1.039,0.346-2.165,0.52-3.292,0.52H195.28 c-1.126,0-2.252-0.173-3.292-0.52c-5.11-1.386-8.921-6.063-8.921-11.781c0-6.756,5.457-12.213,12.213-12.213h121.439 C323.475,102.643,328.932,108.1,328.932,114.856z"></path>
                                                                 <path style="fill:#FFFFFF;" d="M313.486,380.722c-3.202,6.019-7.635,11.045-13.207,15.17c-5.601,4.095-12.314,7.149-20.127,9.171 c-3.41,0.853-6.98,1.448-10.609,1.943v22.715h-27.098v-22.269c-7.723-0.644-15.1-1.844-22.041-3.758 c-10.619-2.905-24.519-14.644-24.519-14.644c-1.19-0.683-1.974-1.904-2.132-3.252c-0.179-1.368,0.287-2.746,1.259-3.708 l13.583-13.583c1.468-1.467,3.728-1.735,5.503-0.664c0,0,10.163,8.834,17.857,10.916c7.704,2.102,15.348,3.163,22.983,3.163 c9.608,0,17.559-1.696,23.865-5.087c6.315-3.441,9.458-8.705,9.458-15.943c0-5.185-1.537-9.3-4.66-12.314 c-3.103-3.004-8.348-4.878-15.764-5.701l-24.331-2.092c-14.406-1.407-25.521-5.423-33.313-12.007 c-7.833-6.613-11.719-16.637-11.719-30.022c0-7.417,1.497-14.02,4.511-19.829c3.015-5.8,7.099-10.708,12.304-14.704 c5.205-4.005,11.273-7.02,18.174-8.992c2.875-0.853,5.909-1.398,8.982-1.893v-19.573h27.098v19.165 c6.335,0.624,12.354,1.636,17.965,3.183c9.498,2.578,19.492,10.4,19.492,10.4c1.259,0.664,2.103,1.884,2.32,3.262 c0.208,1.408-0.248,2.796-1.229,3.817l-12.74,12.929c-1.358,1.379-3.461,1.735-5.196,0.832c0,0-7.545-5.364-14.059-7.059 c-6.514-1.705-13.356-2.578-20.574-2.578c-9.41,0-16.369,1.814-20.861,5.413c-4.511,3.599-6.741,8.319-6.741,14.099 c0,5.215,1.576,9.221,4.798,12.027c3.193,2.796,8.586,4.62,16.221,5.393l21.307,1.835c15.814,1.378,27.781,5.582,35.882,12.581 c8.12,7,12.165,17.232,12.165,30.618C318.295,367.733,316.678,374.713,313.486,380.722z"></path>
                                                              </g>
                                                           </g>
                                                        </svg>
               <?php $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('user_id',$user['username'])->get('e_wallet')->row()->balance+0;?>
                                                        <h4 class="pt-3">E-Wallet</h4>
                                                        <h4 class="counter" style="visibility: visible;"><?=number_format($balance,2)?></h4>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>    
                                 <div class="row">
                                     <div class="card-header text-center">
                                           <h6 style="text-underline-offset:7px;" class="card-title mb-3 text-decoration-underline">Deposit Form</h6>
                                        </div>
                                        <form action="<?=BASEURL?>admin/add_user_wallet" method="post">
                                           <div class="row">
                                              
                                                 <input type="hidden" class="form-control" id="" value="<?=$user['username']?>" name="username" placeholder="value">
                                             
                                              <div class="form-group col-md-6">
                                                   <label class="form-label"></label>
                                                   <select name="type" class="selectpicker form-control" data-style="py-0">
                                                      <option value="">Select Transaction Type</option>
                                                      <option value="Credit">Credit</option>
                                                      <option value="Debit">Debit</option>
                                                   </select>
                                                </div>
                                              <div class="form-group col-md-6">
                                                 <label class="form-label" for="lname"></label>
                                                 <input type="text" class="form-control" name="amount" id="" placeholder="value">
                                              </div>
                                              <div class="d-flex justify-content-center align-items-center">
                                                  <button type="submit" class="btn btn-primary">Submit</button>
                                              </div>
                                              </div>
                                        </form>      
                                 </div>
                                 <div class="table-responsive mt-5">
                                 <table  class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL.no</th>
                                    <th>Entry Date</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $wallet_history = $this->db->where('user_id',$user['username'])->get('wallet_history')->result_array();
                              $count = 1;
                              foreach($wallet_history as $key => $wh){
                              ?>  
                                <tr>
                                    <td><?=$count++;?></td>
                                    <td><?=date("d/m/Y", strtotime($wh['entry_date']));?></td>
                                   <td><?=$wh['type']?></td>
                                   <td><?=$wh['amount']?></td>
                                </tr>
                               <?php } ?> 
                            </tbody>
                    
                        </table>   <!--id="example1"-->
                                </div>
                                 
                                     </div>
                                 </div>
                             </div>
                       <div class="tab-pane fade" id="nav-WithdrawalHistory" role="tabpanel" aria-labelledby="nav-Withdrawal History-tab">
                          <table id="example1" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Credited Date</th>
                                    <th>Wallet Address</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                              $withdraw_wallet = $this->db->where('username',$user['username'])->where('remark','Withdraw')->get('account')->result_array();
                              $count = 1;
                              foreach($withdraw_wallet as $w => $ww)
                              {
                              ?> 
                                <tr>
                                    <td><?=$count++;?></td>
                                    <td><?=$ww['entry_date']?></td>
                                   <td><?=$ww['description'];?></td>
                                </tr>
                             <?php } ?>
                            </tbody>
                    
                        </table>
                      </div>
                      <div class="tab-pane fade" id="nav-Depositreferral" role="tabpanel" aria-labelledby="nav-Depositreferral-tab">
                           <table id="example2" class="table" style="width:100%">
                           <thead>
            <tr>
                <th>SL.no</th>
                <th>Joining</th>
                <th>Active</th>
                <th>User Details</th>
                <th>Sponser Details</th>
                <th>Password</th>
                <th>Tran.Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php $direct_referal=$this->db->where('ref_id',$user['username'])->get('user_role')->result_array();
          $count=1;
          foreach($direct_referal as $key=>$direct){ ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$direct['entry_date']?></td>
                <td><?=$direct['active_date']?></td>
                <td><?=$direct['username']?></td>
                <td><?=$direct['ref_id']?></td>
                <td><?=$direct['pwd_hint']?></td>
                <td><?=$direct['tpwd']?></td>
         <?php   if($direct['investment'] > 0){ ?>
                <td><button type="button" class="btn btn-success btn-sm" fdprocessedid="60z5ko">Active</button></td>
        <?php }else{ ?>
             <td><button type="button" class="btn btn-success btn-sm" fdprocessedid="60z5ko">Inactive</button></td>
       <?php    } ?>
            </tr>
            <?php } ?>
             </tbody>
                    
                        </table>
                      </div>
                      <div class="tab-pane fade" id="nav-DirectIncome" role="tabpanel" aria-labelledby="nav-DirectIncome-tab">
                          <table id="example3" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL.no</th>
                                        <th>Credited Date</th>
                                        <th>User name</th>
                                        <th>E-wallet</th>
                                        <th>Withdraw Wallet</th>
                                    </tr>
                                </thead>
                                <tbody>
        <?php $direct_income=$this->db->where('username',$user['username'])->where('remark','Direct income')->get('account')->result_array();
          $count=1;
          foreach($direct_income as $key=>$dincome){ ?>
                                    <tr>
                                        <td><?=$count++?></td>
                                        <td><?=$dincome['entry_date']?></td>
                                        <td><?=$dincome['username']?></td>
                                        <td><?=$dincome['ewallet']?></td>
                                        <td><?=$dincome['credit']?></td>
                                    </tr>
                        <?php } ?>
                                </tbody>
                        </table> 
                      </div>
                      <div class="tab-pane fade" id="nav-ROIHistory" role="tabpanel" aria-labelledby="nav-ROIHistory-tab">
                           <table id="example4" class="table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>SL.no</th>
                                    <th>Investment Date</th>
                                    <th>Investment</th>
                                    <th>Received</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php $roi_income=$this->db->where('user_id',$user['username'])->get('user_package')->result_array();
                      $count=1;
                      foreach($roi_income as $key=>$roi){ 
$rec=$this->db->select_sum('credit')->where('remark','ROI Income')->where('username',$user['username'])->where('description',$roi['up_id'])->get('account')->row()->credit+0;
                      ?>
                                <tr>
                                    <td><?=$count++?></td>
                                    <td><?=date("d/m/Y", strtotime($roi['entry_date']));?></td>
                                    <td><?=$roi['amount']?></td>
                                    <td><?=number_format($rec,2);?></td>
                                    <td><a href="<?=BASEURL?>admin/mining_history/<?=$roi['up_id']?>"><button type="button" class="btn btn-primary btn-sm" fdprocessedid="60z5ko">view</button></a></td>
                                </tr>
                    <?php } ?>
                            </tbody>

                        </table>
                      </div>
                      <div class="tab-pane fade" id="nav-LevelIncome" role="tabpanel" aria-labelledby="nav-Level Income-tab">
                           <table id="example5" class="table" style="width:100%">
                             <thead>
                                <tr>
                                    <th>SL.no</th>
                                    <th>Credited Date</th>
                                    <th>User name</th>
                                    <th>Amount</th>
                                    <th>E-wallet</th>
                                    <th>Withdraw Wallet</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php $level_income=$this->db->where('username',$user['username'])->where('remark','Level Income')->get('account')->result_array();
                      $count=1;
                      foreach($level_income as $key=>$level){ ?>
                                <tr>
                                    <td><?=$count++?></td>
                                    <td><?=$level['entry_date']?></td>
                                    <td><?=$level['username']?></td>
                                    <td><?=$level['amount']?></td>
                                    <td><?=$level['ewallet']?></td>
                                    <td><?=$level['credit']?></td>
                                </tr>
                      <?php } ?>
                            </tbody>
                    
                        </table>
                      </div>
                       <div class="tab-pane fade" id="nav-BinaryIncome" role="tabpanel" aria-labelledby="nav-Binary Income-tab">
                           <table id="example6" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL.no</th>
                                    <th>Matching Date</th>
                                    <th>User name</th>
                                    <th>Matching</th>
                                    <th>Received</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php $binary_income=$this->db->where('remark','Pair Income')->where('pair_id !=','')->get('account')->result_array();
                          $count=1;
                          foreach($binary_income as $key=>$binary){ 
                          $income=$this->db->select_sum('credit')->where('description',$binary['pair_id'])->get('account')->row()->credit+0; ?>
                                <tr>
                                    <td><?=$count++?></td>
                                    <td><?=$binary['entry_date']?></td>
                                    <td><?=$binary['username']?></td>
                                    <td><?=$binary['left_pair']?></td>
                                    <td><?=$income?></td>
                                    <td><a href="<?=BASEURL?>admin/binary_history/<?=$binary['pair_id']?>"><button type="button" class="btn btn-primary btn-sm" fdprocessedid="60z5ko">view</button></a></td>
                                </tr>
                     <?php } ?>
                            </tbody>
                    
                        </table>
                      </div>
                    <!--  <div class="tab-pane fade" id="nav-BinaryIncome" role="tabpanel" aria-labelledby="nav-Binary Income-tab">-->
                    <!--       <table id="example6" class="table" style="width:100%">-->
                    <!--        <thead>-->
                    <!--            <tr>-->
                    <!--                <th>SL.no</th>-->
                    <!--                <th>Credited Date</th>-->
                    <!--                <th>User name</th>-->
                    <!--                <th>E-wallet</th>-->
                    <!--                <th>Withdraw Wallet</th>-->
                    <!--            </tr>-->
                    <!--        </thead>-->
                    <!--        <tbody>-->
                    <!-- $binary_income=$this->db->where('username',$user['username'])->where('remark','Pair Income')->get('account')->result_array();-->
                    <!--  $count=1;-->
                    <!--  foreach($binary_income as $key=>$binary){ ?>-->
                    <!--            <tr>-->
                    <!--                <td><?=$count++?></td>-->
                    <!--                <td><?=$binary['entry_date']?></td>-->
                    <!--                <td><?=$binary['username']?></td>-->
                    <!--                <td><?=$binary['ewallet']?></td>-->
                    <!--                <td><?=$binary['credit']?></td>-->
                    <!--            </tr>-->
                    <!--  } ?>-->
                    <!--        </tbody>-->
                    
                    <!--    </table>-->
                    <!--  </div>-->
                     
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