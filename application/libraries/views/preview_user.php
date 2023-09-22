<?php
$comp = $this->db->get('setup')->row_array();            
?>
<!DOCTYPE html>
<html lang="Eng">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php 
    $userdata = $this->session->userdata;
    $comp = $this->db->get('setup')->row_array();
    $ms=$this->db->where('status','new')->count_all_results('messages')+0;
    $ar=$this->db->where('status','Request')->count_all_results('admin_request')+0;
    $br=$this->db->where('status','Request')->count_all_results('bank_request')+0;
    $ky=$this->db->where('status','Request')->count_all_results('kyc_request')+0?>
    <title><?=$comp['company_name']?></title>
    <link rel="icon" href="<?=WEBURL?>fav.png" type="image/png" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=BASEURL?>assets/css/bootstrap.min.css" />
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- menu css  -->
    <link rel="stylesheet" href="<?=BASEURL?>assets/css/metisMenu.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=BASEURL?>assets/css/custom_style.css" />
    <link rel="stylesheet" href="<?=BASEURL?>assets/css/style.css" />
    <script src="<?=BASEURL?>assets/js/jquery-3.4.1.min.js"></script>
</head>

<body class="crm_body_bg">
    <div class="main_content_iner overly_inner p-5">
        <h1 align="center">Dashboard</h1>
        <div class="container-fluid p-0 ">
            <?php  $user_details = $this->admin->get_row_data('profile','profile_id',$preview['user_role_id']); ?>
            <?php  $bank_details = $this->admin->get_row_data('bank','user_id',$preview['user_role_id']); ?>
            <?php  $kyc_details = $this->admin->get_row_data('kyc','user_id',$preview['user_role_id']); ?>
            <section class="mb-2 mb-lg-5 ">
                <div class="row mr-rt">
                    <?php
                    $invesamount = $this->db->select_sum('wallet_value')->where('status','Accepted')->where('user_id',$preview['user_role_id'])->get('admin_request')->row()->wallet_value+0;
                    $ceiling = $invesamount*2;  
                    $totalincome = $this->db->select_sum('credit')->where('user_id',$preview['user_role_id'])->get('account')->row()->credit+0;
                    $total_paid = $this->db->select_sum('debit')->where('user_id',$preview['user_role_id'])->get('account')->row()->debit+0;
                    $balance = $ceiling - $total_paid; ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-indigo"></div>
                                <div class="text">
                                    <h6 class="mb-0">Total Investment</h6><span class="text-gray-500"><?=round($invesamount,2)?>
                                        <?=$comp['currency']?></span>
                                </div>
                            </div>
                            <div class="icon text-white bg-indigo"><i class="fa fa-money" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-green"></div>
                                <div class="text">
                                    <h6 class="mb-0">Ceiling</h6><span class="text-gray-500"><?=round($ceiling,2)?>
                                        <?=$comp['currency']?></span>
                                </div>
                            </div>
                            <div class="icon text-white bg-green"><i class="fa fa-th-large" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-blue"></div>
                                <div class="text">
                                    <h6 class="mb-0">Total Income</h6><span class="text-gray-500"><?=round($totalincome,2)?>
                                        <?=$comp['currency']?></span>
                                </div>
                            </div>
                            <div class="icon text-white bg-blue"><i class="fa fa-google-wallet" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-red"></div>
                                <div class="text">
                                    <h6 class="mb-0">Balance</h6><span class="text-gray-500"><?=round($balance,2)?>
                                        <?=$comp['currency']?></span>
                                </div>
                            </div>
                            <div class="icon text-white bg-red"><i class="fa fa-money" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-red"></div>
                                <div class="text">
                                    <h6 class="mb-0">Payout</h6><span
                                        class="text-gray-500"><?= $this->db->select_sum('amount')->where('status','Paid')->where('user_id',$this->session->userdata('userid'))->get('withdraw_request')->row()->amount+0?>
                                        <?=$comp['currency']?></span>
                                </div>
                            </div>
                            <div class="icon text-white bg-red"><i class="fa fa-archive" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-indigo"></div>
                                <div class="text">
                                    <h6 class="mb-0">Team</h6><span class="text-gray-500">
                                        <?=$this->admin->countChildren('tree',$preview['user_role_id'],0,0,0)?>
                                    </span>
                                </div>
                            </div>
                            <div class="icon text-white bg-indigo"><i class="fa fa-users" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-green"></div>
                                <div class="text">
                                    <h6 class="mb-0">Trading Income</h6><span
                                        class="text-gray-500"><?= round($this->db->select_sum('credit')->where('remark','ROI')->where('user_id',$preview['user_role_id'])->get('account')->row()->credit+0,2);?>
                                        <?=$comp['currency']?></span>
                                </div>
                            </div>
                            <div class="icon text-white bg-green"><i class="fa fa-life-ring" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card-widget h-100">
                            <div class="card-widget-body">
                                <div class="dot me-3 bg-blue"></div>
                                <div class="text">
                                    <h6 class="mb-0">Level</h6><span
                                        class="text-gray-500"><?= round($this->db->select_sum('credit')->like('remark', 'Level', 'after')->where('remark','Level')->where('user_id',$preview['user_role_id'])->get('account')->row()->credit+0,2);?>
                                        <?=$comp['currency']?></span>
                                </div>
                            </div>
                            <div class="icon text-white bg-blue"><i class="fa fa-battery-half" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-2 mb-lg-5 ">
                <div class="card">
                    <h1 align="center" class="mt-2">Profile Details</h1>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div align="center">
                                    <a id="proclick" href="#">
                                        <img id="proimg" height="100px" src="<?=PROFILEURL.$user_details['pimage']?>"
                                            width="100px" accept="image/jpg" class="img-lg rounded-circle mb-3">
                                    </a>
                                    <label>
                                        <span id="pro_status" style="color:green; font-weight: bold;"></span>
                                    </label><br>
                                    <input style="display: none;" type="file" class="custom-file-input" name="profile"
                                        id="profile">
                                    <input type="text" class="readonly form-control" name="pimage" id="pimage"
                                        value="<?=$user_details['pimage']?>" required>
                                </div>
                            </div>
                            <div class="col-lg-8 form-row">
                                <div class="col-lg-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="<?=$user_details['name']?>" required>
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone <span id="phone_label"
                                            style="color:red;"><?=form_error('phone')?></span></label>
                                    <input type="text" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10"
                                        class="form-control" name="phone" value="<?=$user_details['phone']?>" required>
                                </div>
                                <div class="col-lg-12">
                                    <label>Email <span id="email_label"
                                            style="color:red;"><?=form_error('email')?></span></label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="<?=$user_details['email']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 form-row">
                                <div class="col-md-4">
                                    <label>Flat No/Door No</label>
                                    <input type="text" class="form-control" id="door" name="door"
                                        value="<?=$user_details['door']?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Street/Village</label>
                                    <input type="text" class="form-control" id="street" name="street"
                                        value="<?=$user_details['street']?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label>City</label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        value="<?=$user_details['city']?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4">State</label>
                                    <select class="form-control" placeholder="state" name="state" id="state" required>
                                        <option value="">Select State</option>
                                        <option value="Tamil Nadu"
                                            <?php if($user_details['state']=='Tamil Nadu') echo 'selected'?>>
                                            Tamil
                                            Nadu</option>
                                        <option value="Kerala"
                                            <?php if($user_details['state']=='Kerala') echo 'selected'?>>
                                            Kerala
                                        </option>
                                        <option value="Other"
                                            <?php if($user_details['state']=='Other') echo 'selected'?>>Other
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail4">District</label>
                                    <input type="text" class="form-control" id="district" name="district" required
                                        value="<?=$user_details['district']?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Pin Code</label>
                                    <input type="text" class="form-control" pattern="[0-9]{6}" minlength="6"
                                        maxlength="6" id="pin" name="pin" required value="<?=$user_details['pin']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <section class="mb-2 mb-lg-5 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 align="center">Bank Details</h1>
                                
                                        <div class="row">
                                            <div class="col-md-12 p-lg-5">

                                                <label>Account Holder Name</label>
                                                <input type="text" class="form-control" name="acc_name" id="acc_name"
                                                    value="<?=$bank_details['acc_name']?>" required>
                                                <label>Account Number</label>
                                                <input type="text" class="form-control" name="acc_no" id="acc_no"
                                                    value="<?=$bank_details['acc_no']?>" required>
                                                <label>Branch Name</label>
                                                <input type="text" class="form-control" name="acc_branch"
                                                    id="acc_branch" value="<?=$bank_details['acc_branch']?>" required>
                                                <label>IFSC</label>
                                                <input type="text" class="form-control" name="acc_ifsc" id="acc_ifsc"
                                                    value="<?=$bank_details['acc_ifsc']?>" required>
                                                <label>Bank Name</label>
                                                <input type="text" class="form-control" name="acc_bank" id="acc_bank"
                                                    value="<?=$bank_details['acc_bank']?>" required>
                                                    <label class="mt-3 ">Canceled Cheque Image</label>   

                                                <div id="uploadArea" class="upload-area" align="center">
                                                <a id="chequeclick" href="#">
                                                        <img id="chequeimg" src="<?=KYCURL.$bank_details['cfile']?>"
                                                            width="70%" accept="image/jpg" class="img-lg mb-3">
                                                    </a>
                                                    <label><span id="cheque_status"
                                                            style="color:green; font-weight: bold;"></span></label><br>
                                                    <input style="display: none;" type="file" class="custom-file-input"
                                                        name="chequefile" id="chequefile">
                                                    <input value="<?=$bank_details['cfile']?>" type="text"
                                                        class="readonly form-control" autocomplete="off"
                                                        name="chequeimage" id="chequeimage" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    
                            </div>
                            <div class="col-lg-6">
                                <h1 align="center">KYC Details</h1>
                                
                                        <div class="py-4">
                                            <div class="form-row">
                                                <div class="col-lg-6">
                                                    <label>Aadhar No </label>
                                                    <input type="text" class="form-control" name="aadhar" id="aadhar"
                                                        value="<?=$kyc_details['aadhar']?>" required>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>PAN No </label>
                                                    <input type="text" class="form-control" name="pan" id="pan"
                                                        value="<?=$kyc_details['pan']?>" required>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <label class="mt-2">Aadhar Image</label>
                                                    <div id="uploadArea" class="upload-area">
                                                        <a id="aadharclick" href="#"><img id="aadharimg"
                                                                src="<?=KYCURL.$kyc_details['afile']?>" width="70%"
                                                                accept="image/jpg" class="img-lg mb-3"></a>
                                                        <label><span id="aadhar_status"
                                                                style="color:green; font-weight: bold;"></span></label><br>
                                                        <input style="display: none;" type="file"
                                                            class="custom-file-input" name="aadharfile" id="aadharfile">
                                                        <input type="text" name="aadharimage" id="aadharimage"
                                                            value="<?=$kyc_details['afile']?>" required
                                                            class="readonly form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <label class="mt-2">PAN</label>
                                                    <div id="uploadArea" class="upload-area">
                                                        <a id="panclick" href="#"><img id="panimg"
                                                                src="<?=KYCURL.$kyc_details['pfile']?>" width="70%"
                                                                accept="image/jpg" class="img-lg mb-3"></a>
                                                        <label><span id="pan_status"
                                                                style="color:green; font-weight: bold;"></span></label><br>
                                                        <input style="display: none;" type="file"
                                                            class="custom-file-input" name="panfile" id="panfile">
                                                        <input type="text" name="panimage" id="panimage"
                                                            value="<?=$kyc_details['pfile']?>" required
                                                            class="readonly form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('footer');?>
