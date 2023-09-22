<?php
$this->load->view('header');    
$comp = $this->db->get('setup')->row_array();            
?>
<div class="main_content_iner overly_inner ">
    <?php if ($this->session->userdata('usertype') == "u") { 
      $flash_news = $this->db->order_by('id',"DESC")->limit(1)->get('news')->result_array();
       ?>
      <h4 ><marquee behavior="scroll" direction="left" >
      <?php foreach ($flash_news as $key => $n) { ?>
          <span style="color:white;padding:5px 9px;border-radius: 50px;background: red;"><?php echo $n['news'];  ?></span>
          <?php } ?>
      </marquee></h4>
    <?php  } ?>
    <div class="row">
        <div class="col-lg-4">
            <h1>Dashboard</h1>

        </div>
        <div class="col-lg-8">

        </div>
    </div>

    <div class="container-fluid p-0 ">
        <?php if ($this->session->userdata('usertype') == "a") { 
        $invesamount_admin = $this->db->select_sum('wallet_value')->where('status','Accepted')->get('admin_request')->row()->wallet_value+0;
        $totalroi_admin = $this->db->select_sum('amount')->get('roi')->row()->amount+0;
        $total_paid_admin = $this->db->select_sum('debit')->get('account')->row()->debit+0;
        ?>
        <section class="mb-3 mb-lg-5 ">
            <div class="row mr-rt">
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-indigo"></div>
                            <div class="text">
                                <h6 class="mb-0">Total Investments</h6><span
                                    class="text-gray-500"><?=$invesamount_admin?> <?=$comp['currency']?></span>
                            </div>
                        </div>
                        <div class="icon text-white bg-indigo"><i class="fa fa-money" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-green"></div>
                            <div class="text">
                                <h6 class="mb-0">Payout</h6><span class="text-gray-500"><?=$total_paid_admin?>
                                    <?=$comp['currency']?></span>
                            </div>
                        </div>
                        <div class="icon text-white bg-green"><i class="fa fa-archive" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-blue"></div>
                            <div class="text">
                                <h6 class="mb-0">My Team</h6><span
                                    class="text-gray-500"><?=($this->db->count_all_results('user_role')+0)-1;?></span>
                            </div>
                        </div>
                        <div class="icon text-white bg-blue"><i class="fa fa-users" aria-hidden="true"></i></div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-red"></div>
                            <div class="text">
                                <h6 class="mb-0">TRADING INCOME</h6><span class="text-gray-500"><?=$totalroi_admin?>
                                    <?=$comp['currency']?></span>
                            </div>
                        </div>
                        <div class="icon text-white bg-red"><i class="fa fa-life-ring" aria-hidden="true"></i></div>
                    </div>
                </div>
                
                


            </div>
        </section>

        <section class="mb-4 mb-lg-5">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Finances 💰</h2>
            <div class="row">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <div class="card h-100">
                        <div class="card-header">
                            <h4 class="card-heading">Statics</h4>
                        </div>
                        <div class="card-body">

                            <canvas id="lineChart"></canvas>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-4 mb-lg-5">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Linked Cards 💳 </h2>
            <div class="row text-dark">
                <div class="col-md-6 col-xl-4 mb-4">
                    <div class="card credit-card bg-hover-gradient-indigo">
                        <div class="credict-card-content">
                            <div class="h1 mb-3 mb-lg-1"><i class="fa fa-cc-visa" aria-hidden="true"></i></div>
                            <div class="credict-card-bottom">
                                <div class="text-uppercase flex-shrink-0 me-1 mb-1">
                                    <div class="fw-bold">Card Number</div><small class="text-gray-500">1245 1478 1362
                                        6985</small>
                                </div>
                                <h4 class="mb-1">$417.78</h4>
                            </div>
                        </div><a class="stretched-link" href="#"></a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 mb-4">
                    <div class="card credit-card bg-hover-gradient-blue">
                        <div class="credict-card-content">
                            <div class="h1 mb-3 mb-lg-1"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></div>
                            <div class="credict-card-bottom">
                                <div class="text-uppercase flex-shrink-0 me-1 mb-1">
                                    <div class="fw-bold">Card Number</div><small class="text-gray-500">1245 1478 1362
                                        6985</small>
                                </div>
                                <h4 class="mb-1">$224.17</h4>
                            </div>
                        </div><a class="stretched-link" href="#"></a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 mb-4">
                    <div class="card credit-card bg-hover-gradient-green">
                        <div class="credict-card-content">
                            <div class="h1 mb-3 mb-lg-1"><i class="fa fa-cc-visa" aria-hidden="true"></i></div>
                            <div class="credict-card-bottom">
                                <div class="text-uppercase flex-shrink-0 me-1 mb-1">
                                    <div class="fw-bold">Card Number</div><small class="text-gray-500">1245 1478 1362
                                        6985</small>
                                </div>
                                <h4 class="mb-1">$568.00</h4>
                            </div>
                        </div><a class="stretched-link" href="#"></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-4">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">People 👩‍💻</h2>
            <div class="outer">
                <div class="inner">


                    <?php 
            $profiles = $this->db->limit(10)->order_by('profile_id','DESC')->get('profile')->result_array();
            $count=1; 
            foreach ($profiles as $key => $profile) {
            $usersdata_ss = $this->db->where('user_role_id',$profile['profile_id'])->get('user_role')->row_array();
            ?>
                    <div class="col-sm-6 col-xl-12">
                        <a class="message card px-5 py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset"
                            href="#">
                            <div class="row">
                                <div
                                    class="col-xl-3 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <strong
                                        class="h5 mb-0"><?=date_format(date_create($usersdata_ss['entry_date']),"d")?><sup
                                            class="text-xs text-gray-500 font-weight-normal ms-1"><?=date_format(date_create($usersdata_ss['entry_date']),"M")?></sup></strong><img
                                        class="avatar avatar-md p-1 mx-3 my-2 my-xl-0"
                                        src="<?=PROFILEURL.$profile['pimage']?>" alt="..." style="max-width: 3rem">
                                    <h6 class="mb-0"><?=$profile['name']?></h6>
                                </div>
                                <div
                                    class="col-xl-9 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                                    <div
                                        class="bg-gray-200 rounded-pill px-4 py-1 me-0 me-xl-3 mt-3 mt-xl-0 text-sm text-dark exclude">
                                        <?=$usersdata_ss['username']?></div>
                                    <p class="mb-0 mt-3 mt-lg-0">from :
                                        <?php if(!empty($profile['district'] && $profile['state'])){
                                        $profile['district']. $profile['state'] ;
                                    }else {
                                            echo 'need to update profile';
                                        }?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section class="mb-4">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Investment</h2>
            <div class="outer">
                <div class="inner">
                    <div class="row">
                        <?php 
                        $rois = $this->db->limit(10)->order_by('admin_request_id','DESC')->get_where('admin_request',array('status'=>'Accepted'))->result_array();
                        $count=1; 
                        foreach ($rois as $key => $roi) {?>
                        <div class="col-sm-12 col-xl-12">
                            <a class="message card py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset"
                                href="#">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <h6>Amount</h6>
                                        <p class="d-input1"><strong><?=$roi['wallet_value']?></strong></p>
                                        <hr class="no-l" />
                                    </div>
                                    <hr>
                                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 w-50">
                                        <h6>Days:</h6>
                                        <p><?=$this->db->where('description', $roi['admin_request_id'])->where('user_id',$rois['userid'])->count_all_results('account')+0?>
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 w-51">
                                        <h6>TRADING INCOME:</h6>
                                        <p class="d-input">
                                            <strong><?=number_format($this->db->select_sum('credit')->where('description', $roi['admin_request_id'])->where('user_id',$rois['userid'])->get('account')->row()->credit+0,2); ?></strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
                                        <h6>Type:</h6>
                                        <?php if($roi['type']=='Daily'){$typecolor = 'orange';}else{$typecolor = 'green';}?>
                                        <span class="input-<?=$typecolor?>"><?=$roi['type']?></span>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 w-50">
                                        <h6>Date:</h6>
                                        <strong><?=date_format(date_create($roi['approve_date']),"d-M-Y")?></strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>


        <?php } else { $user_details = $this->admin->get_row_data('profile','profile_id',$this->session->userdata('userid')); ?>
        <section class="mb-3 mb-lg-5 ">

            <div class="row mr-rt">
                <?php
                $invesamount = $this->db->select_sum('wallet_value')->where('status','Accepted')->where('user_id',$this->session->userdata('userid'))->get('admin_request')->row()->wallet_value+0;
                $ceiling = $invesamount*2;  
                $totalincome = $this->db->select_sum('credit')->where('user_id',$this->session->userdata('userid'))->get('account')->row()->credit+0;
                $total_paid = $this->db->select_sum('debit')->where('user_id',$this->session->userdata('userid'))->get('account')->row()->debit+0;
                $balance = $totalincome - $total_paid; ?>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-red"></div>
                            <div class="text">
                                <h6 class="mb-0">Wallet</h6><span class="text-gray-500"><?=round($balance,2)?>
                                    <?=$comp['currency']?></span>
                            </div>
                        </div>
                        <div class="icon text-white bg-red"><i class="fa fa-money" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-blue"></div>
                            <div class="text">
                                <h6 class="mb-0">My Earnings</h6><span class="text-gray-500"><?=round($totalincome,2)?>
                                    <?=$comp['currency']?></span>
                            </div>
                        </div>
                        <div class="icon text-white bg-blue"><i class="fa fa-google-wallet" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-red"></div>
                            <div class="text">
                                <h6 class="mb-0">Payout</h6><span class="text-gray-500"><?= $total_paid?>
                                    <?=$comp['currency']?></span>
                            </div>
                        </div>
                        <div class="icon text-white bg-red"><i class="fa fa-archive" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-indigo"></div>
                            <div class="text">
                                <h6 class="mb-0">Team</h6><span class="text-gray-500">
                                    <?=$this->admin->countChildren('tree',$this->session->userdata('userid'),0,0,0)?>
                                </span>
                            </div>
                        </div>
                        <div class="icon text-white bg-indigo"><i class="fa fa-users" aria-hidden="true"></i></div>
                    </div>
                </div>
                <?php $teams = array_map('current', $this->admin->getparentatlevel('tree',$this->session->userdata('userid'),1,$list_child=array()));
                $teamincome = 0;
                foreach ($teams as $team) {
                    $teamincome += number_format($this->db->select_sum('credit')->where('user_id',$team)->get('account')->row()->credit+0,2);
                }?>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-green"></div>
                            <div class="text">
                                <h6 class="mb-0">Team Income</h6><span class="text-gray-500"><?=$teamincome?>
                                    <?=$comp['currency']?></span>
                            </div>
                        </div>
                        <div class="icon text-white bg-green"><i class="fa fa-archive" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card-widget h-100">
                        <div class="card-widget-body">
                            <div class="dot me-3 bg-blue"></div>
                            <div class="text">
                                <h6 class="mb-0">Leadership Income</h6><span
                                    class="text-gray-500"><?=number_format($this->db->select_sum('credit')->where('remark', 'Leadership')->where('user_id',$this->session->userdata('userid'))->get('account')->row()->credit+0,2); ?></span>
                            </div>
                        </div>
                        <div class="icon text-white bg-blue"><i class="fa fa-users" aria-hidden="true"></i></div>
                    </div>
                </div>
                <?php 
                $leadmaster = $this->db->get_where('master',array('type'=>'leadership'))->result_array();
                //echo '<pre>',print_r($leadmaster,1),'</pre>'; 
                $leadcount = $this->db->where('parent_id',$this->session->userdata('userid'))->count_all_results('tree');
                $l1 = $leadmaster[0]['criteria'];
                $l2 = $leadmaster[1]['criteria'];
                $l3 = $leadmaster[2]['criteria'];?>
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-heading">Leadership</h4>
                        </div>
                        <div class="card-body">
                            <div class="progress m-2">
                              <div class="progress-bar" style="width:<?=($leadcount/$l1)*100?>%"><?=($leadcount/$l1)*100?>%</div>
                            </div>
                            
                            <!-- Green -->
                            <div class="progress m-2">
                              <div class="progress-bar bg-success" style="width:<?=($leadcount/$l2)*100?>%"><?=($leadcount/$l2)*100?>%</div>
                            </div>
                            
                            
                            <!-- Orange -->
                            <div class="progress m-2">
                               <div class="progress-bar bg-warning" style="width:<?=($leadcount/$l3)*100?>%"><?=($leadcount/$l3)*100?>%</div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </section>
        <section class="mb-4 mb-lg-5">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Finances 💰</h2>
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="card h-100">
                        <div class="card-header">
                            <h4 class="card-heading">My Income</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="lineChart"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="h-50 pb-4 pb-lg-2">
                        <div class="card h-100">
                            <div class="card-body d-flex">
                                <div class="row w-100 align-items-center">
                                    <div class="col-5 mb-4 mb-sm-0">
                                        <h2 class="mb-0 d-flex align-items-center"><span>Investment</span><span
                                                class="dot bg-green d-inline-block ms-3"></span></h2><span
                                            class="text-muted text-uppercase small"><?=$invesamount. $comp['currency']?>
                                        </span>
                                        <hr><small class="text-muted">Ceiling <?=$ceiling?>
                                            <?=$comp['currency']?></small>
                                    </div>
                                    <div class="col-7">
                                        <div class="progress-circle over50 p<?=round(100-(($total_paid/$ceiling)*100))?>">
                                            <span><?=round(100-(($total_paid/$ceiling)*100))?>%</span>
                                            <div class="left-half-clipper">
                                                <div class="first50-bar"></div>
                                                <div class="value-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $roitotal = $this->db->select_sum('credit')->where('remark','ROI')->where('user_id',$this->session->userdata('userid'))->get('account')->row()->credit+0;
                    $roiscount = $this->db->where('status','Accepted')->where('user_id',$this->session->userdata('userid'))->count_all_results('admin_request')+0;
                    ?>
                    <div class="h-50 pt-lg-2">
                        <div class="card h-100">
                            <div class="card-body d-flex">
                                <div class="row w-100 align-items-center">
                                    <div class="col-sm-12 mb-4 mb-sm-0">
                                        <h2 class="mb-0 d-flex align-items-center"><span>Return of Investment</span><span class="dot bg-indigo d-inline-block ms-3"></span>
                                        </h2><span
                                            class="text-muted text-uppercase small"><?=$roitotal. $comp['currency']?></span>
                                        <hr><small class="text-muted">Number of Investments <?=$roiscount?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-4">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Investment</h2>
            <div class="outer">
                <div class="inner">
                    <div class="row">
                        <?php 
                        $rois = $this->db->get_where('admin_request',array('status'=>'Accepted','user_id'=>$this->session->userdata('userid')))->result_array();
                        $count=1; 
                        foreach ($rois as $key => $roi) {?>
                        <div class="col-sm-12 col-xl-12">
                            <a class="message card py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset"
                                href="#">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <h6>Amount</h6>
                                        <p class="d-input1"><strong><?=$roi['wallet_value']?></strong></p>
                                        <hr class="no-l" />
                                    </div>
                                    <hr>
                                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 w-50">
                                        <h6>Days:</h6>
                                        <p><?=$this->db->where('description', $roi['admin_request_id'])->where('user_id',$this->session->userdata('userid'))->count_all_results('account')+0?>
                                        </p>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 w-51">
                                        <h6>TRADING INCOME:</h6>
                                        <p class="d-input">
                                            <strong><?=number_format($this->db->select_sum('credit')->where('description', $roi['admin_request_id'])->where('user_id',$this->session->userdata('userid'))->get('account')->row()->credit+0,2); ?></strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
                                        <h6>Type:</h6>
                                        <?php if($roi['type']=='Daily'){$typecolor = 'orange';}else{$typecolor = 'green';}?>
                                        <span class="input-<?=$typecolor?>"><?=$roi['type']?></span>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 w-50">
                                        <h6>Date:</h6>
                                        <strong><?=date_format(date_create($roi['approve_date']),"d-M-Y")?></strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>

        <?php 
} 
if ($this->session->userdata('usertype') != "a")
$this->db->where('user_id',$this->session->userdata('userid'));


$incomedata = $this->db->limit(5)->group_by('year(entry_date),month(entry_date)')->order_by('year(entry_date),month(entry_date)')->select('month(entry_date) as monthxx, sum(credit)  as amount, sum(debit)  as paid')->get('account')->result_array();
foreach ($incomedata as $key => $row) {
    $month_array[] = '"'.date("F", mktime(0, 0, 0, $row['monthxx'], 10)).'"';
    $amount_array[] = $row['amount'];
    $amountp_array[] = $row['paid'];
}


//echo '<pre>',print_r($incomedata,1),'</pre>'; 

?>
    </div>
</div>
<?php $this->load->view('footer');?>
<script>
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: [<?=implode(',', $month_array)?>],
        datasets: [{
                label: "Withdrawn",
                data: [<?=implode(',', $amountp_array)?>],
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            },
            {

                label: "Earned",
                data: [<?=implode(',', $amount_array)?>],
                backgroundColor: [
                    'rgba(0, 137, 132, .2)',
                ],
                borderColor: [
                    'rgba(0, 10, 130, .7)',
                ],
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true
    }
});
</script>
