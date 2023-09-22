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
    $kr=$this->db->where('status','Request')->count_all_results('kyc_request')+0;
    $wr=$this->db->where('status','Request')->count_all_results('withdraw_request')+0?>
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
    <!-- sidebar  -->
    <nav class="sidebar dark_sidebar" style="overflow: scroll;">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo" href="<?=BASEURL?>">
                <h4>First Try</h4>
            </a>
            <a class="small_logo" href="<?=BASEURL?>"><img width="50em" src="<?=WEBURL.$comp['fav_file']?>" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>

        <ul id="sidebar_menu">
            <?php if ($this->session->userdata('usertype')== "a") { ?>
            <li class="<?php if($page_name == 'dashboard'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>">
                    <div class="nav_icon_small"><i class="fa fa-building-o" aria-hidden="true"></i></div>
                    <div class="nav_title"><span>Dashboard</span></div>
                </a>
            </li>
            <li class="<?php if($page_name == 'genealogy'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>genealogy">
                    <div class="nav_icon_small"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                    <div class="nav_title"><span>Genealogy</span></div>
                </a>
            </li>

            <li class="<?php if($page_name == 'genealogy_auto'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>genealogy_auto">
                    <div class="nav_icon_small"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                    <div class="nav_title"><span>Auto Genealogy</span></div>
                </a>
            </li>
            <li class="<?php if($page_name == 'products'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>products">
                    <div class="nav_icon_small"> <i class="fa fa-credit-card"></i></div>
                    <div class="nav_title"><span>Products</span></div>
                </a>
            </li>
            <li class="<?php if($page_name == 'product_table'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>product_table">
                    <div class="nav_icon_small"> <i class="fa fa-credit-card"></i></div>
                    <div class="nav_title"><span>Ordered Products </span></div>
                </a>
            </li>
            <li class="<?php if($page_name == 'deliverd_products'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>deliverd_products">
                    <div class="nav_icon_small"> <i class="fa fa-credit-card"></i></div>
                    <div class="nav_title"><span>Delivered Products</span></div>
                </a>
            </li>
            <li class="<?php if($page_name == 'view_withdraw'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>view_withdraw">
                    <div class="nav_icon_small"> <i class="fa fa-credit-card"></i>
                        <span class="badge badge-pill badge-danger"><?php if($wr>0){ echo $wr;} ?></span>
                    </div>
                    <div class="nav_title"><span>Withdraw Request</span></div>
                </a>
            </li>
            <li class="<?php if($page_name == 'master'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>master">
                    <div class="nav_icon_small"> <i class="fa fa-credit-card"></i>
                        
                    </div>
                    <div class="nav_title"><span>Master</span></div>
                </a>
            </li>
            <li
                class="dropdown <?php if($page_name == 'news' || $page_name == 'messages' || $page_name == 'message' || $page_name == 'terms'){echo 'active';}?>">
                <a href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="badge badge-pill badge-danger"><?php if($ms>0){ echo $ms;} ?></span>
                    </div>
                    <div class="nav_title">
                        <span>Customer Support</span>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                </a>
                <ul>
                    <li class="<?php if($page_name == 'terms'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>terms">
                            <div class="nav_icon_small"><i class="fa fa-file-archive-o" aria-hidden="true"></i></div>
                            <div class="nav_title"><span>Terms</span></div>
                        </a>
                    </li>
                    <li class="<?php if($page_name == 'news'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>news">
                            <div class="nav_icon_small"><i class="fa fa-flag" aria-hidden="true"></i></div>
                            <div class="nav_title"><span>News</span></div>
                        </a>
                    </li>
                    <li class="<?php if($page_name == 'messages'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>messages">
                            <div class="nav_icon_small"><i class="fa fa-envelope"></i>
                                <span class="badge badge-pill badge-danger"><?php if($ms>0){ echo $ms;} ?></span>
                            </div>
                            <div class="nav_title"><span>Messages</span></div>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="dropdown <?php if($page_name == 'view_investment_request' || $page_name == 'view_kyc' || $page_name == 'view_bank'){echo 'active';}?>">
                <a href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa fa-shield" aria-hidden="true"></i>
                        <span
                            class="badge badge-pill badge-danger"><?php if(($ar+$br+$kr)>0){ echo ($ar+$br+$kr);} ?></span>
                    </div>
                    <div class="nav_title">
                        <span>Management</span>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                </a>
                <ul>
                    <li class="<?php if($page_name == 'view_investment_request'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>view_investment_request">
                            <div class="nav_icon_small"><i class="fa fa-id-badge" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-danger"><?php if($ar>0){ echo $ar;} ?></span>
                            </div>
                            <div class="nav_title"><span>Investments</span></div>
                        </a>
                    </li>
                    <li class="<?php if($page_name == 'view_kyc'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>view_kyc">
                            <div class="nav_icon_small"><i class="fa fa-id-card" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-danger"><?php if($kr>0){ echo $kr;} ?></span>
                            </div>
                            </div>
                            <div class="nav_title"><span>KYC Updates</span></div>
                        </a>
                    </li>
                    <li class="<?php if($page_name == 'view_bank'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>view_bank">
                            <div class="nav_icon_small"><i class="fa fa-university" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-danger"><?php if($br>0){ echo $br;} ?></span>
                            </div>
                            </div>
                            <div class="nav_title"><span>Bank Updates</span></div>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="dropdown <?php if($page_name == 'users' || $page_name == 'customers' || $page_name == 'earn_history' ||  $page_name == 'level' ||   $page_name == 'non_active' || $page_name == 'dirreferral'  ){echo 'active';}?>">
                <a href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <i class="fa fa-pie-chart" aria-hidden="true"></i>
                    </div>
                    <div class="nav_title">
                        <span>Report</span>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                </a>
                <ul>
                    <li class="<?php if($page_name == 'users'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>users">
                            <div class="nav_icon_small"><i class="fa fa-universal-access" aria-hidden="true"></i></div>
                            <div class="nav_title"><span>Members</span></div>
                        </a>
                    </li>

                    <li class="<?php if($page_name == 'level'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>level">
                            <div class="nav_icon_small"><i class="fa fa-cubes" aria-hidden="true"></i> </div>
                            <div class="nav_title"><span>Team</span></div>
                        </a>
                    </li>

                    <li class="<?php if($page_name == 'dirreferral'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>dirreferral">
                            <div class="nav_icon_small"><i class="fa fa-exchange" aria-hidden="true"></i></div>
                            <div class="nav_title"><span>My Direct</span></div>
                        </a>
                    </li>
                    <li class="<?php if($page_name == 'earn_history'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>earn_history">
                            <div class="nav_icon_small"><i class="fa fa-money" aria-hidden="true"></i></div>
                            <div class="nav_title"><span>Earn History</span></div>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } elseif ($this->session->userdata('usertype')== "u") { ?>
            <li class="<?php if($page_name == 'dashboard'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>">
                    <div class="nav_icon_small"><i class="fa fa-building-o" aria-hidden="true"></i></div>
                    <div class="nav_title"><span>Dashboard</span></div>
                </a>
            </li>
            <li class="<?php if($page_name == 'genealogy'){echo 'active';}?>">
                <a class="nav-link" href="<?=BASEURL?>genealogy">
                    <div class="nav_icon_small"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                    <div class="nav_title"><span>Genealogy</span></div>
                </a>
            </li>
            <li class="<?php if($page_name == 'investment_request'){echo 'active';}?>">
                <a href="<?=BASEURL?>investment_request" class="nav-link">
                    <div class="nav_icon_small"><i class="fa fa-money" aria-hidden="true"></i></div>
                    <div class="nav_title"><span>Investment</span></div>
                </a>
            </li>
            
            <li class="<?php if($page_name == 'withdraw'){echo 'active';}?>">
                <a href="<?=BASEURL?>withdraw" class="nav-link">
                    <div class="nav_icon_small"><i class="fa fa-credit-card"></i></div>
                    <div class="nav_title"><span>Withdraw</span></div>
                </a>
            </li>
            <li class="dropdown <?php if($page_name == 'message'){echo 'active';}?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <div class="nav_icon_small">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="nav_title">
                        <span>Customer Support</span>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                </a>
                <ul>
                    <li class="<?php if($page_name == 'message'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>message">
                            <div class="nav_icon_small"><i class="fa fa-envelope"></i></div>
                            <div class="nav_title"><span>Message</span></div>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="dropdown <?php if($page_name == 'users' || $page_name == 'customers' || $page_name == 'earn_history' ||  $page_name == 'level' ||   $page_name == 'non_active' || $page_name == 'dirreferral'  ){echo 'active';}?>">

                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <div class="nav_icon_small">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="nav_title">
                        <span>Reports</span>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                </a>
                <ul>
                    <li class="<?php if($page_name == 'level'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>level">
                            <div class="nav_icon_small"><i class="fa fa-sitemap"></i></div>
                            <div class="nav_title"><span>Team</span></div>
                        </a>
                    </li>

                    <li class="<?php if($page_name == 'dirreferral'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>dirreferral">
                            <div class="nav_icon_small"><i class="fa fa-exchange" aria-hidden="true"></i></div>
                            <div class="nav_title"><span>My Direct</span></div>
                        </a>
                    </li>
                    <li class="<?php if($page_name == 'payout_history'){echo 'active';}?>">
                        <a class="nav-link" href="<?=BASEURL?>earn_history">
                            <div class="nav_icon_small"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                            <div class="nav_title"><span>Account History</span></div>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </nav>
    <!--/ sidebar  -->
    <section class="main_content dashboard_part large_header_bg">
        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                        </div>
                        <div class="line_icon open_miniSide d-none d-lg-block">
                            <i class="fa fa-list-ul" aria-hidden="true"></i>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <script>
                                function share() {
                                    let shareData = {
                                        title: '<?=$comp['company_name']?>',
                                        text: '<?=$comp['company_name']?> Referral Link',
                                        url: '<?="https://demo.nxtmlm.com/test/first_try/registration?id=".bin2hex($userdata['username'])?>',
                                    }
                                    navigator.clipboard.writeText('<?="https://demo.nxtmlm.com/test/first_try/registration?id=".bin2hex($userdata['username'])?>');
                                    navigator.share(shareData);
                                }
                                </script>


                                <li><a href="" onclick="share()">
                                        <i class="fa fa-share-alt fa-2x" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <?php if ($userdata['usertype'] == "a") { ?>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                                        <?php if(($ar+$br+$kr+$wr)>0){ echo "<span>".($ar+$br+$kr+$wr)."</span>";} ?>
                                    </a>
                                </li>
                                <li>
                                    <a class="bell_notification_clicker" href="#">
                                        <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                                        <?php if($ms>0){ echo "<span>".$ms."</span>";} ?>
                                    </a>
                                    <!-- Menu_NOtification_Wrap  -->
                                    <div class="Menu_NOtification_Wrap">
                                        <div class="notification_Header">
                                            <h4>Messages</h4>
                                        </div>
                                        <div class="Notification_body">

                                            <?php 
                                            $news = $this->admin->get_tabledata('messages','status','new');
                                            foreach ($news as $key => $n) { ?>
                                            <a href="<?=BASEURL?>messages">
                                                <div class="single_notify d-flex align-items-center">
                                                    <div class="notify_thumb">
                                                        <a href="#"><img
                                                                src="<?=PROFILEURL.$this->db->select('pimage')->where('profile_id',$n['m_from'])->get('profile')->row()->pimage?>"
                                                                alt=""></a>
                                                    </div>
                                                    <div class="notify_content">
                                                        <a href="#">
                                                            <h5><?=$userdata['name']?> At <?=$n['m_date']?></h5>
                                                        </a>
                                                        <p><?=$n['message']?></p>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php } ?>
                                        </div>
                                        <div class="nofity_footer">
                                            <div class="submit_button text-center pt_20">
                                                <a href="<?=BASEURL?>messages" class="btn_1">See More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Menu_NOtification_Wrap  -->
                                </li>
                                <?php } ?>
                            </div>
                            <div class="profile_info">
                                <img class="avatar p-1"
                                    src="<?=PROFILEURL.$this->db->select('pimage')->where('profile_id',$userdata['userid'])->get('profile')->row()->pimage?>"
                                    alt="<?=$userdata['name']?>">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <h5><?=$userdata['name']?></h5>
                                        <p><?php if ($this->session->userdata('usertype') != "a") {
                                            echo "level".$userdata['rank'];
                                        }else {
                                            echo $userdata['rank'];
                                        } ?></p>
                                    </div>
                                    <div class="profile_info_details">
                                        <?php if ($this->session->userdata('usertype') != "a") { ?>
                                        <a href="<?=BASEURL?>user_profile">
                                            <i class="fa fa-address-book-o pr-2" aria-hidden="true"
                                                style="font-size:20px;"></i> Profile </a>
                                        <a href="<?=BASEURL?>kyc">
                                            <i class="fa fa-address-card pr-2" style="font-size:20px;"
                                                aria-hidden="true"></i> KYC </a>
                                        <a href="<?=BASEURL?>bank">
                                            <i class="fa fa-university pr-2" style="font-size:20px;"
                                                aria-hidden="true"></i> BANK </a><a href="<?=BASEURL?>password_reset">
                                            <i class="fa fa-key pr-2" style="font-size:20px;"></i> Reset </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="<?=BASEURL?>logout" class="dropdown-item has-icon text-danger">
                                            <i class="fa fa-sign-out-alt"></i> Logout
                                        </a>
                                        <?php } else { ?>
                                        <a href="<?=BASEURL?>logout" class="dropdown-item has-icon text-danger">
                                            <i class="fa fa-sign-out-alt"></i> Logout
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
