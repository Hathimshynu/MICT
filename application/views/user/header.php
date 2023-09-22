
<!doctype html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>MICT</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="https://templates.iqonic.design/lite/coinex/dashboard/html/dist/assets/images/favicon.ico" />
      <link rel="stylesheet" href="<?=BASEURL?>assets/css/libs.min.css">
      <link rel="stylesheet" href="<?=BASEURL?>assets/css/coinexe209.css?v=1.0.0">
      
      <!--FONT AWESOME-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Google Tag Manager -->
      
      <!--FONT AWESOME-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
        <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <!--Custom CSS-->
    <link rel="stylesheet" href="<?=BASEURL?>assets/css/custom.min.css">

    <!-- Include SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
      
      
      
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../../../../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WNGH9RL');window.tag_manager_event='dashboard-free-preview';window.tag_manager_product='Coinex';</script>
      <!-- End Google Tag Manager -->
      </head>
<style>


.dataTables_filter{
    margin-bottom:10px !important;
}

::-webkit-scrollbar-thumb {
    background: #6a5f5f96 !important;
    border-radius: 20px !important;
    transition: all 400ms ease !important;
    cursor: pointer !important;
}

::-webkit-scrollbar-track {
    background: lightgrey !important;
    border-radius: 20px !important;
}



@media screen And (max-width:500px){
    .dataTables_length{
        margin-bottom:10px !important;
    }
    ::-webkit-scrollbar {
    width: 8px !important;
    height: 4px !important;
}

div.dataTables_wrapper div.dataTables_filter input {
   
    width: 206px !important;
    height: 30px !important;
}

}

@media screen and (min-width:768px){
    .dataTables_paginate.paging_simple_numbers{
        margin-top:18px !important;
    }
}

.page-item.active .page-link {
    color: white !important;
   background-color: #3c41da !important;
    border-color: #3c41da !important;
}


.page-item.disabled .page-link {
    color: black!important;
    pointer-events: none;
    background-color: white!important;
    border-color: #313135!important;
}
.table thead {
    white-space: nowrap;
    color: black!important;
  }
.form-select:disabled {
    color: #4A4A4F;
    background-color: white!important;
}

.form-select{
    background-color: white!important;
    color:black!important;
}
 .form-control:disabled, .form-control[readonly] {
    background-color:  white!important;
     color:black!important;
    opacity: 1;
}   

.form-control {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: black !important;
    background-color: white!important;
    background-clip: padding-box;
     border: 1px solid #313135;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    box-shadow: 0 0 0 0;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.table thead tr {
    background-color: #fbfaff!important;
}
body{
    background:#fbfaff!important;
}
.sidebar-default .navbar-nav .nav-item .nav-link:not(.disabled) {
    color: #ffffff!important;
    margin-top:5px!important;
}
.item-name{
    color:white!important;
}
    img.headlogo {
    width: 135px;
}
.iq-navbar {
    z-index: 890;
    background-color:#180b7c!important;
}
.card{
      background: #fbfaff!important;
       
}

h4{
      color: #180b7c!important;
}


.sidebar-toggle.mobile {
    top: 3px !important;
}

.sidebar{
    background:#180b7c!important;
}
/*.sidebar .sidebar-header {*/
/*    border-bottom: 1px solid #313135;*/
/*    margin-bottom: 0.75rem;*/
/*    background: #825af9!important;*/
/*}*/

.sidebar .sidebar-header {
    border-bottom: 1px solid #313135;
    /*margin-bottom: -2.25rem;*/
    background: #180b7c!important;
}

   @media screen and (max-width:991px){
  img.img-fluid.headerlogo {
    display: block;
}

.nav .sidebar-toggle {
    height: 39px;
    background: #180b7c!important;
    padding: 0.25rem 0.75rem;
    width: 52px;
    /* border: 1px solid #d2a60c; */
    margin-top: -8px;
}
.navbar-light .navbar-toggler {
    border-color: rgb(210 166 12)!important;
}
.container-fluid.navbar-inner {
    background: #180b7c!important;
}
.iq-navbar {
    z-index: 890;
    background: #180b7c!important;
}
   }  
/*span.item-name {*/
/*    color: #f8cd4a!important;*/
/*} */
button.btn.btn-primary {
   background-color: #fbfaff!important;
    color: #180b7c!important;
}
i.fa-solid.fa-sitemap {
    width: 22px;
}
i.fa-solid.fa-sign-out {
    width: 18px;
    margin-left: 4px;
}
i.fa-solid.fa-user {
    width: 22px;
}
h4.card-title.mb-0 {
    color: #f8cd4a;
}
.card-header{
    background:#fbfaff!important;
}
p.demo_name_style_blue.add-btn {
    color: orange!important;
}
.jOrgChart .node {
    color: black!important;
}
p.demo_name_style {
    background-color: #d2a60c!important;
}
img.tree_icon.with_tooltip.root_node {
    background: white!important;
}

label.form-label {
    color: #d2a60c!important;
}
/*.wallet {*/
/*    background-color: #2f3031!important;*/
/*}*/

</style>      
 <style>

   .card.mining {
   background-size: cover;
   background-color: black;
   }
   img.topmining {
    width: 100%;
}
   img.mining {
   width: 100%;
   height:400px;
   }
   .card-body.mining.text-center {
   padding: 0;
   }
   img.power-button {
   width: 100px;
   }
   @media screen and (max-width: 767px){
   img.mining {
   width: 100%!important;
   height:200px;
   }
   .time {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   font-size: 21px!important;
   margin-top: -1px!important;
   margin-left: 0px!important;
   }
   
   }
   @media (min-width: 768px) and (max-width: 991px) {
   img.mining {
   width: 100%;
   }
   }
   .time {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   font-size: 32px;
   margin-top: -1px;
   margin-left: 2px;
   }
   span.trxmining {
   margin-top: -29px;
   margin-bottom: 0;
   }
   .countdown {
   margin: 0; 
   padding: 75px;
   }
   .countdown-timer {
   display: flex;
   flex-direction: column;
   align-items: center;
   }
   .progress-ring {
   transform: rotate(-90deg);
   width: 100%;
   height: 100%;
   }
   .progress-ring__circle {
   fill: transparent;
   stroke: #1aa053!important;
   stroke-dasharray: 283;
   stroke-dashoffset: 0;
   transition: stroke-dashoffset 0.3s ease-in-out;
   }
   #bbbb{
   background-color: transparent;
   border:none;
   cursor:pointer;
   }
   .start-button {
   z-index: 100;
   margin-top: -37px;
   display: block;
   padding: 50px 38px;
   border-radius: 50%;
   border: 3px solid black;
   background: #19361e;
   box-shadow: 0 0 0 3px #19361e;
   color: #4bd763;
   font-size: 1.5em;
   margin: 30px auto;
   }
   .start-button:hover {
   background-color: darkgreen;
   }
   .start-button:active {
   background-color: forestgreen;
   }
   .apps {
   display: flex;
   justify-content: space-around;
   }
   .btn-custom {
   background-color: #3c3b3b;
   }
   span.btn-inner {
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: center;
   }
   span.percentage {
   margin-top: -96px;
   }
   @media screen and (min-width:991px){
   .mobile {
   display: none;
   }
   }
   @media screen and (max-width:991px){
   .desktop {
   display: none;
   }
   .col-sm-2 {
   -webkit-flex: 0 0 auto;
   -ms-flex: 0 0 auto;
   flex: 0 0 auto;
   width: 45%!important;
   }
   .app {
   display: flex;
   justify-content: space-around;
   }

.pt-3 {
    left: 14px;
    /* right: 55px; */
    /* font-size: 12px!important; */
    font-size: 9px!important;
    padding-top: 0rem !important;
    position: absolute;
    top: 10px;
}
  h4.counter.mt-2 {
    right: 0;
    font-size: 15px!important;
    color: #180b7c!important;
    position: relative;
   
}
   }

     .appcard-body {
    padding: 10px;
}
h4.counter.mt-2 {
    right: 0;
    font-size: 15px!important;
    color:#180b7c!important;
    position: relative;
}

   .firstrow {
   display: flex;
   justify-content: space-between;
   }
   .secondrow {
   display: flex;
   justify-content: space-between;
   }
   .insidefirstrow {
   display: flex;
   }
   .col.second {
   right: 13px;
   position: absolute;
   }
   .col.first {
   display: flex;
   }
   .thirdrow {
   display: flex;
   justify-content: space-between;
   }
   .col.new {
   display: flex;
   justify-content: space-between;
   margin: 4px;
   }
   .card-body2 {
   padding: 10px;
   }
   span.mb-2.blue {
   color: #59ceef;
   }
   @media only screen and (max-width : 991px) {
   span.mb-2 {
   font-size: 11px!important;
   margin-bottom: 0px;
   }
   h4.title.dashboard {
   display: block!important;
   }
   /*.tradeview {*/
   /*overflow: auto;*/
   /*}*/
   }
   h4.title.dashboard {
   display: none;
   }
   .tradeview {
    overflow: auto;
    display: flex;
   
}
select.form-select.form-select-lg.mb-3.btn\.btn-primary {
    background-color: #d2a60c;
    color: white;
    margin-top: 27px;
    height: 44px;
    font-size: 15px;
}
  @media only screen and (max-width : 991px) {
      select.form-select.form-select-lg.mb-3.btn\.btn-primary {
    background-color: #d2a60c;
    color: white;
    margin-top: 27px;
    height: 44px;
    font-size: 11px;
}
.shining-card:before {
    content: '';
    position: absolute;
    content: '';
    height: 66px;
    width: 2px;
    background: white!important;
}
h4.pt-3.wallet {
    right: 73px!important;
}

  }
  
  h5{
      color:#180b7c!important;
  }
  
  
  .btn-glow {
  background: #f8cd4a;
  color:black !important;
  font-weight: 400;
  box-shadow: 0 0 0 0 #FEF130;
  animation: glow 1.4s ease-out infinite;
}

.btn-glow:hover {
  background: #f8cd4a !important;
}

@keyframes glow {
  0% {
    box-shadow: 0 0 0 0 #FEF130;
  }

  50% {
    box-shadow: 0 0 30px 0 #FEF130;
  }
}

.h-d-content{
    color:#32ff7e !important;
}

#arrow-icon {
  font-size: 24px; 
  color: white!important; 
  position: relative;
}

@keyframes slide-infinite {
  0% {
    transform: translateX(0); 
  }
  100% {
    transform: translateX(100%); 
  }
}

/* Apply the animation to the arrow icon */
#arrow-icon {
  animation: slide-infinite 1s linear infinite; /* Adjust the animation duration as needed */
}

.invest-nav{
    background-color: #fefa2a26;
    padding: 7px 0px;
    /*border-top-right-radius: 5px;*/
    /*border-bottom-right-radius: 5px;*/
}

.alert{
    display:none !important;
}

ul.navbar-nav.iq-main-menu{
    overflow-y:auto !important;
    padding-bottom:100px !important;
}

.sidebar .sidebar-header {
    border-bottom: none !important;
}



label.form-label {
    color: #69227c!important;
}


.table tbody tr td {
    color: black!important;
    vertical-align: middle;
}
.loader{
    background:#180b7c!important;
}
/*.icon {*/
  width: 40px; /* Adjust the size as needed */
  height: 40px; /* Adjust the size as needed */
  background-color: #007bff; /* Circle background color */
  border-radius: 50%; /* Makes the container circular */
/*  display: flex;*/
/*  align-items: center;*/
/*  justify-content: center;*/
  color: white; /* Icon color */
/*}*/


</style>

  <body class="">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
    

        
    <aside class="sidebar sidebar-default navs-rounded ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="<?=BASEURL?>user" class="navbar-brand dis-none align-items-center justify-content-center">
                <img src="<?=BASEURL?>assets/images/newmic.png" class="img-fluid headerlogo"  alt="logo">
            </a>
            <div class="sidebar-toggle mobile" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"></path>
                    </svg>
                    
                </i>
            </div>
        </div>
        <div class="sidebar-body p-0 data-scrollbar">
            <div class="collapse navbar-collapse pe-3" id="sidebar">
                <ul class="navbar-nav iq-main-menu">
                    <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'dashboard' ){ echo "active"; } ?> " aria-current="page" href="<?=BASEURL?>user">
                            <i class="icon">
                           <i style="font-size:20px !important;" class="fas fa-home"></i>                     
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    
                    
                    
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'deposit' ){ echo "active"; } ?>" href="<?=BASEURL?>user/profile">
                            <i class="icon">
                              <i style="font-size:20px !important;" class="fas fa-user"></i>
                              </i>
                            <span class="item-name">Profile</span>
                        </a>
                    </li>
                    
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'deposit' ){ echo "active"; } ?>" href="<?=BASEURL?>user/reset_password">
                            <i class="icon">
                              <i style="font-size:20px !important;" class="fa-solid fa-key"></i>
                              </i>
                            <span class="item-name">Security</span>
                        </a>
                    </li>
                    
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'deposit' ){ echo "active"; } ?>" href="<?=BASEURL?>user/myteam">
                            <i class="icon">
                              <i style="font-size:20px !important;" class="fa-solid fa-users"></i>
                              </i>
                            <span class="item-name">My Team</span>
                        </a>
                    </li>
                    
                    
                    
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'deposit' ){ echo "active"; } ?>" href="<?=BASEURL?>user/support">
                            <i class="icon">
                              <i style="font-size:20px !important;" class="fas fa-headset"></i>

                              </i>
                            <span class="item-name">Support Ticket</span>
                        </a>
                    </li>
                    
                    
                      <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'referral' ){ echo "active"; } ?>" href="<?=BASEURL?>user/referral">
                            <i class="icon">
                              <i style="font-size:20px !important;" class="fas fa-user-plus"></i>
                              </i>
                            <span class="item-name">Referral</span>
                        </a>
                    </li>
                    
                    <!--   <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'deposit' ){ echo "active"; } ?>" href="<?=BASEURL?>user/deposit">-->
                    <!--        <i class="icon">-->
                    <!--          <i style="font-size:20px !important;" class="fa-solid fa-building-columns"></i>-->
                    <!--          </i>-->
                    <!--        <span class="item-name">Deposit</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                   
                    <!--  <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'under_maintenance' ){ echo "active"; } ?>" href="<?=BASEURL?>user/under_maintenance">-->
                    <!--        <i class="icon">-->
                    <!--          <i style="font-size:20px !important;" class="fa-solid fa-building-columns"></i>-->
                    <!--          </i>-->
                    <!--        <span class="item-name">Deposit</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    
                    <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'mdeposit' ){ echo "active"; } ?>" href="<?=BASEURL?>user/mdeposit">
                            <i class="icon">
                              <i style="font-size:20px !important;" class="fa-solid fa-building-columns"></i>
                              </i>
                            <span class="item-name">Deposit</span>
                        </a>
                    </li>
                    
                         
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'level_master' ){ echo "active"; } ?>" data-bs-toggle="collapse" href="#sidebar-master" role="button" aria-expanded="false" aria-controls="sidebar-user">
                            <i class="icon">
                                <i style="font-size:20px;" class="fa-solid fa-chart-line"></i>
                            </i>
                            <span class="item-name">AI Trading</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-master" data-bs-parent="#sidebar">
                            <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="<?=BASEURL?>user/overview">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                   
                                    <span class="item-name">Overview</span>
                                </a>
                            </li>
                        
                          <li class="nav-item">
                                <a class="nav-link" href="<?=BASEURL?>user/portfolio">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                   
                                    <span class="item-name">Portfolio</span>
                                </a>
                            </li>
                     
                     
                            <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="<?=BASEURL?>user/ailevel">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                   
                                    <span class="item-name">AI Level Income</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="<?=BASEURL?>user/investment">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                   
                                    <span class="item-name">AI Invest</span>
                                </a>
                            </li>
                        
                        
                   
                        
                     
                            <li class="nav-item">
                                <a class="nav-link" href="<?=BASEURL?>user/trading_withdraw">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                   
                                    <span class="item-name"> Withdraw Capital</span>
                                </a>
                            </li>
                            
                            
                           </ul>
                    
                    </li>
                    
                    
                    
                    
                    
                                <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'level_master' ){ echo "active"; } ?>" data-bs-toggle="collapse" href="#sidebar-master1" role="button" aria-expanded="false" aria-controls="sidebar-user">
                           <i style="font-size:20px !important;" class="fa-brands fa-stack-exchange"></i>
                            <span class="item-name">Stacking</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-master1" data-bs-parent="#sidebar">
                            <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="<?=BASEURL?>user/stack">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                   
                                    <span class="item-name">Stack</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="<?=BASEURL?>user/stack_income_history">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                   
                                    <span class="item-name">Stacking History</span>
                                </a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="">-->
                            <!--        <i class="icon">-->
                            <!--            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                            <!--                <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                            <!--            </svg>-->
                            <!--        </i>-->
                                   
                            <!--        <span class="item-name">Plans</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="">-->
                            <!--        <i class="icon">-->
                            <!--            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                            <!--                <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                            <!--            </svg>-->
                            <!--        </i>-->
                                   
                            <!--        <span class="item-name">Choose Plan</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="">-->
                            <!--        <i class="icon">-->
                            <!--            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                            <!--                <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                            <!--            </svg>-->
                            <!--        </i>-->
                                   
                            <!--        <span class="item-name">Fund Manage</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                        
                        
                        </ul>
                    </li>
                    
                    
                                        
                    
         
                    
                    
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'level_master' ){ echo "active"; } ?>" data-bs-toggle="collapse" href="#sidebar-master2" role="button" aria-expanded="false" aria-controls="sidebar-user">
                            <i class="icon">
                                 <i style="font-size:20px !important;" class="fa-solid fa-puzzle-piece"></i>
                            </i>
                            <span class="item-name">Gaming</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="roGameund" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-master2" data-bs-parent="#sidebar">
                            <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="<?=BASEURL?>user/game">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                   
                                    <span class="item-name">Play Game</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="<?=BASEURL?>user/gamelevel">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                   
                                    <span class="item-name">Level income</span>
                                </a>
                            </li>
                        
                        
                        </ul>
                    </li>
                    
                    
                                        
               
                   
                    <!--   <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'deposit' ){ echo "active"; } ?>" href="<?=BASEURL?>user/deposit">-->
                    <!--        <i class="icon">-->
                    <!--          <i style="font-size:20px !important;" class="fas fa-wallet"></i>-->
                    <!--          </i>-->
                    <!--        <span class="item-name"> Wallet</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    
                     <li class="nav-item ">
                        <a class="nav-link" href="<?=BASEURL?>user/walletpage">
                            <i class="icon">
                              <i style="font-size:20px !important;" class="fas fa-exchange-alt"></i>
                              </i>
                            <span class="item-name">Internal Transfer Wallet</span>
                        </a>
                    </li>
                    
                    <!--   <li class="nav-item <?php if($page_name == 'activation_wallet' ){ echo "active"; } ?>">-->
                    <!--    <a class="nav-link" aria-current="page" href="<?=BASEURL?>user/activation_wallet">-->
                    <!--       <i style="font-size:20px !important;" class="fa-solid fa-wallet"></i>-->
                    <!--        <span class="item-name">Activation Wallet</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!-- <li class="nav-item ">-->
                    <!--    <a class="nav-link " aria-current="page" href="<?=BASEURL?>user/logout">-->
                    <!--        <i class="icon">-->
                    <!--        <svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                    <!--        </i>-->
                    <!--        <span class="item-name">Logout</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!--<li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'profile' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>user/profile">-->
                    <!--        <i class="icon">-->
                    <!--            <i class="fa-solid fa-user"></i>-->
                    <!--            </i>-->
                    <!--        <span class="item-name">Profile</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--<li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'binary_tree' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>user/binary_tree">-->
                    <!--        <i class="icon">-->
                    <!--           <i class="fa-solid fa-sitemap"></i>-->
                    <!--            </i>-->
                    <!--        <span class="item-name">Binary Tree</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                     <li class="nav-item ">
                        <a class="nav-link d-flex align-items-center <?php if($page_name == 'uni_level_tree' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>user/uni_level_tree">
                            <i class="icon">
                              <i style="font-size:20px !important;" class="fas fa-sitemap"></i>
                              </i>
                            <span class="item-name">Tree</span>
                        </a>
                    </li>
                    
                 
                    <!-- <li class="nav-item">-->
                    <!--    <a style="display:flex !important;" class="nav-link d-flex justify-content-center align-items-center <?php if($page_name == 'forex_invest' ){ echo "active"; } ?>" data-bs-toggle="collapse" href="#sidebar-invest" role="button" aria-expanded="false" aria-controls="sidebar-user">-->
                    <!--       <i style="font-size:20px !important;" class="fa-solid fa-sack-dollar"></i>-->
                    <!--        <span class="item-name">Invest</span>-->
                    <!--        <i class="right-icon">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
                    <!--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />-->
                    <!--            </svg>-->
                    <!--        </i>-->
                    <!--    </a>-->
                    <!--    <ul class="sub-nav collapse  " id="sidebar-invest" data-bs-parent="#sidebar">-->
                            
                    <!--         <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'forex_invest' ){ echo "active"; } ?>" href="<?=BASEURL?>user/forex_invest">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> U </i>-->
                    <!--                <span class="item-name">Forex Invest</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'crypto_invest' ){ echo "active"; } ?>" href="<?=BASEURL?>user/crypto_invest">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> U </i>-->
                    <!--                <span class="item-name">Crypto Invest</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                            
                    <!--    </ul>-->
                    <!--</li>-->
                    
                    <!-- <li class="nav-item">-->
                    <!--    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-user" role="button" aria-expanded="false" aria-controls="sidebar-user">-->
                    <!--      <i style="font-size:20px !important;" class="fa-solid fa-sack-dollar"></i>-->
                    <!--        <span class="item-name">Income</span>-->
                    <!--        <i class="right-icon">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
                    <!--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />-->
                    <!--            </svg>-->
                    <!--        </i>-->
                    <!--    </a>-->
                    <!--    <ul class="sub-nav collapse  " id="sidebar-user" data-bs-parent="#sidebar">-->
                           
                    <!--        <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'level_income' ){ echo "active"; } ?>" href="<?=BASEURL?>user/level_income">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> U </i>-->
                    <!--                <span class="item-name">Activation Level income</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--         <li class="nav-item">-->
                    <!--            <a class="nav-link" href="<?=BASEURL?>user/level_income">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> U </i>-->
                    <!--                <span class="item-name">Trade Profit Level income</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                           
                    <!--    </ul>-->
                    <!--</li>-->
                    
                      <li class="nav-item <?php if($page_name == 'withdraw' ){ echo "active"; } ?>">
                        <a class="nav-link" aria-current="page" href="<?=BASEURL?>user/withdraw">
                           <i style="font-size:20px !important;" class="fa-solid fa-dollar-sign"></i>
                            <span class="item-name">Withdrawal</span>
                        </a>
                    </li>
                    
                    <!--  <li class="nav-item <?php if($page_name == 'withdraw' ){ echo "active"; } ?>">-->
                    <!--    <a class="nav-link" aria-current="page" href="<?=BASEURL?>user/trading_withdraw">-->
                    <!--       <i style="font-size:20px !important;" class="fa-solid fa-dollar-sign"></i>-->
                    <!--        <span class="item-name">Trading Withdraw</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!-- <li class="nav-item <?php if($page_name == 'roi' ){ echo "active"; } ?>">-->
                    <!--    <a class="nav-link" aria-current="page" href="<?=BASEURL?>user/roi">-->
                    <!--       <i style="font-size:20px !important;" class="fa-solid fa-circle-dollar-to-slot"></i>-->
                    <!--        <span class="item-name">Trade Profit</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!-- <li class="nav-item">-->
                    <!--    <a class="nav-link d-flex justify-content-center align-items-center <?php if($page_name == 'rank_bonus' ){ echo "active"; } ?>" data-bs-toggle="collapse" href="#sidebar-rank" role="button" aria-expanded="false" aria-controls="sidebar-user">-->
                    <!--        <i class="fa-solid fa-trophy"></i>-->
                    <!--        <span class="item-name">Rank</span>-->
                    <!--        <i class="right-icon">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
                    <!--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />-->
                    <!--            </svg>-->
                    <!--        </i>-->
                    <!--    </a>-->
                    <!--    <ul class="sub-nav collapse  " id="sidebar-rank" data-bs-parent="#sidebar">-->
                           
                    <!--        <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'rank_bonus' ){ echo "active"; } ?>" href="<?=BASEURL?>user/rank_bonus">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> U </i>-->
                    <!--                <span class="item-name">Rank Bonus</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--         <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'rank_roi' ){ echo "active"; } ?>" href="<?=BASEURL?>user/rank_roi">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> U </i>-->
                    <!--                <span class="item-name">Rank ROI</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                           
                    <!--    </ul>-->
                    <!--</li>-->
                    
                    
                    <!--  <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'withdrawal' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>user/withdrawal">-->
                    <!--        <i class="icon">-->
                    <!--        <svg width="22" height="22" fill="#808080" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 2H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h3v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-9h3a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1ZM7 20v-2a2 2 0 0 1 2 2Zm10 0h-2a2 2 0 0 1 2-2Zm0-4a4 4 0 0 0-4 4h-2a4 4 0 0 0-4-4V8h10Zm4-6h-2V7a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3H3V4h18Zm-9 5a3 3 0 1 0-3-3 3 3 0 0 0 3 3Zm0-4a1 1 0 1 1-1 1 1 1 0 0 1 1-1Z"/></svg>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">Withdrawl</span>-->
                    <!--    </a>-->
                    <!--</li>-->

                      
                    <!--  <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'fd_activate' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>user/fd_activate">-->
                    <!--        <i class="icon">-->
                    <!--        <svg fill="gray" width="22" height="22" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"><path d="m3.5 13.56 1.5-.88V16h26v-3.29l1.48.85a1 1 0 0 0 1-1.73L18 2.92 2.5 11.83a1 1 0 1 0 1 1.73Zm14.35-6.45a.8.8 0 0 1 .8 0L25.37 11h-3.22l-3.9-2.24-3.9 2.24h-3.21Z" class="clr-i-solid clr-i-solid-path-1"/><path d="M32.85 27H32v-.85A1.15 1.15 0 0 0 30.85 25H28v-7.37h-4V25h-4v-7.37h-4V25h-4v-7.37H8V25H5.15A1.15 1.15 0 0 0 4 26.15V27h-.85A1.15 1.15 0 0 0 2 28.15V31h32v-2.85A1.15 1.15 0 0 0 32.85 27Z" class="clr-i-solid clr-i-solid-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">FD Activate</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-Team" role="button" aria-expanded="false" aria-controls="sidebar-user">-->
                    <!--        <i class="icon">-->
                    <!--             <svg height="22" width="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="m512 412.421-6.265-87.121c2.166-25.848-23.736-39.641-37.367-44.438a24.837 24.837 0 0 1-2.668-1.146l-21.856 50.891-6.158-45.897 3.804-2.855-1.038-12.477 10.167-3.383c-.036-.242-.089-.484-.089-.708v-12.933c4.207-4.672 7.392-14.142 9.272-24.873 2.65-.958 4.368-2.408 6.622-13.676 1.594-7.939-.894-12.852-1.503-12.843 1.056-7.223 2.506-21.499-1.253-28.668 0 0 2.578-4.645 2.578-10.847-10.848 1.548-45.476-20.666-55.814-2.588-14.992-1.548-23.942 19.602-17.14 42.103 0 0-8.414-.404-5.048 11.366 3.15 11.045 5.674 13.569 10.104 15.152 1.889 10.732 5.075 20.201 9.272 24.873v11.734l14.034 4.672-1.074 13.095 3.804 2.855-6.354 47.347-27.478-51.509c-.259.098-.519.214-.77.314-7.088 2.487-21.982 7.428-34.118 15.233l-1.092 7.715-.072-.877h.009a32.311 32.311 0 0 0-.206-7.116c-3.437-25.052-36.033-39.051-51.266-44.528l-30.431 60.852-7.527-56.064 4.636-3.474-1.316-15.976 12.548-4.18v-14.991c4.905-5.46 8.646-16.558 10.866-29.133 5.173-1.853 8.145-4.806 11.832-17.757 3.938-13.783-5.916-13.319-5.916-13.319 7.966-26.358-2.515-51.141-20.075-49.315-12.119-21.194-52.682 4.842-65.4 3.025 0 7.267 3.025 12.709 3.025 12.709-4.412 8.395-2.712 25.124-1.468 33.581-.725-.008-9.622.081-5.844 13.319 3.696 12.951 6.649 15.904 11.832 17.757 2.22 12.575 5.943 23.674 10.865 29.133v14.991l14.804 4.941-1.253 15.215 4.637 3.474-8.01 59.733-32.266-64.522c-16.254 5.835-52.243 21.364-51.554 49.674l-.698-4.868c-12.128-7.805-27.012-12.746-34.11-15.233-.242-.099-.51-.216-.76-.314L93.97 332.057l-6.355-47.347 3.804-2.855-1.074-13.095 14.033-4.672v-11.734c4.198-4.672 7.384-14.142 9.272-24.873 4.422-1.584 6.945-4.108 10.115-15.152 3.347-11.77-5.058-11.366-5.058-11.366 6.793-22.501-2.157-43.651-17.139-42.103-10.338-18.079-44.967 4.136-55.814 2.588 0 6.202 2.578 10.847 2.578 10.847-3.768 7.17-2.31 21.445-1.253 28.668-.609-.009-3.097 4.904-1.504 12.843 2.256 11.268 3.974 12.718 6.614 13.676 1.888 10.732 5.075 20.201 9.282 24.873v12.933c0 .224-.054.466-.099.708l10.177 3.383-1.038 12.477 3.813 2.855-6.166 45.897L46.3 279.716c-.939.464-1.844.85-2.667 1.146C30.002 285.659 4.1 299.451 6.265 325.3L0 412.421h512z" style="fill:gray"/></svg>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">Team</span>-->
                    <!--        <i class="right-icon">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
                    <!--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />-->
                    <!--            </svg>-->
                    <!--        </i>-->
                    <!--    </a>-->
                    <!--    <ul class="sub-nav collapse" id="sidebar-Team" data-bs-parent="#sidebar">-->
                    <!--        <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'direct_referral' ){ echo "active"; } ?>" href="<?=BASEURL?>user/direct_referral">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> L </i>-->
                    <!--                <span class="item-name">Direct referral</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'left_team' ){ echo "active"; } ?>" href="<?=BASEURL?>user/left_team">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> R </i>-->
                    <!--                <span class="item-name">Left team</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--          <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'right_team' ){ echo "active"; } ?>" href="<?=BASEURL?>user/right_team">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> R </i>-->
                    <!--                <span class="item-name">Right team</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--         <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'level_team' ){ echo "active"; } ?>" href="<?=BASEURL?>user/level_team">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> R </i>-->
                    <!--                <span class="item-name">Level team</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                         
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--  <li class="nav-item">-->
                    <!--    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-Setup" role="button" aria-expanded="false" aria-controls="sidebar-Setup">-->
                    <!--        <i class="icon">-->
                    <!--        <svg fill="gray" width="22" height="25" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"><path class="clr-i-solid clr-i-solid-path-1" d="m32.57 15.72-3.35-1a11.65 11.65 0 0 0-.95-2.33l1.64-3.07a.61.61 0 0 0-.11-.72l-2.39-2.4a.61.61 0 0 0-.72-.11l-3.05 1.63a11.62 11.62 0 0 0-2.36-1l-1-3.31a.61.61 0 0 0-.59-.41h-3.38a.61.61 0 0 0-.58.43l-1 3.3a11.63 11.63 0 0 0-2.38 1l-3-1.62a.61.61 0 0 0-.72.11L6.2 8.59a.61.61 0 0 0-.11.72l1.62 3a11.63 11.63 0 0 0-1 2.37l-3.31 1a.61.61 0 0 0-.43.58v3.38a.61.61 0 0 0 .43.58l3.33 1a11.62 11.62 0 0 0 1 2.33l-1.64 3.14a.61.61 0 0 0 .11.72l2.39 2.39a.61.61 0 0 0 .72.11l3.09-1.65a11.65 11.65 0 0 0 2.3.94l1 3.37a.61.61 0 0 0 .58.43h3.38a.61.61 0 0 0 .58-.43l1-3.38a11.63 11.63 0 0 0 2.28-.94l3.11 1.66a.61.61 0 0 0 .72-.11l2.39-2.39a.61.61 0 0 0 .11-.72l-1.66-3.1a11.63 11.63 0 0 0 .95-2.29l3.37-1a.61.61 0 0 0 .43-.58v-3.41a.61.61 0 0 0-.37-.59ZM18 23.5a5.5 5.5 0 1 1 5.5-5.5 5.5 5.5 0 0 1-5.5 5.5Z"/><path fill="none" d="M0 0h36v36H0z"/></svg>-->
                    <!--         </i>-->
                    <!--        <span class="item-name">Setup</span>-->
                    <!--        <i class="right-icon">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
                    <!--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />-->
                    <!--            </svg>-->
                    <!--        </i>-->
                    <!--    </a>-->
                    <!--    <ul class="sub-nav collapse" id="sidebar-Setup" data-bs-parent="#sidebar">-->
                    <!--        <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'reset_pass' ){ echo "active"; } ?>" href="<?=BASEURL?>user/reset_pass">-->
                    <!--                <i class="icon">-->
                    <!--                <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                </svg>                           -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> U </i>-->
                    <!--                <span class="item-name">Change password</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'reset_tpass' ){ echo "active"; } ?>" href="<?=BASEURL?>user/reset_tpass">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>-->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> U </i>-->
                    <!--                <span class="item-name">Change Transation Password</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                            
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--   <li class="nav-item ">-->
                    <!--    <a class="nav-link " aria-current="page" href="<?=BASEURL?>user/customer_support">-->
                    <!--        <i class="icon">-->
                    <!--        <svg fill="gray" height="22" width="22" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" xml:space="preserve"><path d="M16 2C9.4 2 4 7.4 4 14v3c0 2.8 2.2 5 5 5 .6 0 1-.4 1-1v-8c0-.6-.4-1-1-1-1.1 0-2.1.4-2.9 1 .5-5 4.8-9 9.9-9s9.4 3.9 9.9 9c-.8-.6-1.8-1-2.9-1-.6 0-1 .4-1 1v8c0 .6.4 1 1 1s1.3-.1 1.8-.4c-1.1 2-2.8 3.6-4.9 4.5-.2-1.2-1.2-2.2-2.5-2.2S15 25 15 26.3c0 .7.3 1.4.9 1.9.5.4 1 .6 1.6.6h.4C23.6 28 28 22.9 28 17v-3c0-6.6-5.4-12-12-12z"/></svg>-->
                    <!--         </i>-->
                    <!--        <span class="item-name">Customer support</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                     <li class="nav-item mb-5">
                        <a class="nav-link " aria-current="page" href="<?=BASEURL?>user/logout">
                            <i class="icon">
                                <i class="fa-solid fa-sign-out"></i>
                           </i>
                            <span class="item-name">Logout</span>
                        </a>
                    </li>
                    
                </ul>      
                </div>        
         
        </div>
    </aside>    
    <main class="main-content">
      <div class="position-relative">
        <!--Nav Start-->
        <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar border-bottom">
          <div class="container-fluid navbar-inner">
            <a href="index.html" class="navbar-brand">
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                <!-- <svg width="20px" height="20px" viewBox="0 0 24 24">-->
                <!--    <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />-->
                <!--</svg>-->
            <img src="<?=BASEURL?>assets/images/dashboardicons/icons8-list-24.png" style="width: 30px;
    top: 5px;
    left: 11px;
    position: absolute;">
                </i>
            </div>
              <!--<h4 class="title">-->
              <!--  Dashboard-->
              <!--</h4>-->
               <a href="<?=BASEURL?>user" class="navbar-brand dis-none align-items-center justify-content-center">
                <img src="<?=BASEURL?>assets/images/newmic.png" class="headlogo "  alt="logo" style="width:68px!important">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                  <span class="navbar-toggler-bar bar1 mt-2"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
              <ul class="navbar-nav ms-auto navbar-list mb-2 mb-lg-0 align-items-center">
                  <!--<button type="button" class="btn btn-primary" style="margin-right:10px" onclick="sharel()">Left</button><br>-->
                  <button type="button" class="btn btn-sm me-2 btn-primary" onclick="sharell()"><i class="fa-solid fa-share me-2"></i>Referral Link</button>
                <li class="nav-item dropdown">
                  <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=BASEURL?>assets/images/avatars/01.png" alt="User-Profile" class="img-fluid avatar avatar-50 avatar-rounded">
                    <div class="caption ms-3 ">
                        <?php $user = $this->db->where('username',$this->session->userdata('micusername'))->get('user_role')->row_array(); ?>
                        <h6 class="mb-0 caption-title"><?=$this->session->userdata('micusername');?></h6>
                        <p class="mb-0 caption-sub-title" style="color:white!important"><?=$user['first_name']?></p>
                    </div>
                  </a>
           
                </li>
              </ul>
            </div>
          </div>
        </nav>        <!--Nav End-->
      </div>
      
      <script>
        // function sharel(){
        //     if (location.protocol !== 'https:') {
        
        //         var rtextarea = document.createElement("textarea");
        //         document.body.appendChild(rtextarea);
        //         rtextarea.value = '<?=BASEURL."user/registration/left/".bin2hex($this->session->userdata('micusername'))?>'; //save main text in it
        //         rtextarea.select(); //select textarea contenrs
        //         document.execCommand("copy");
        //         document.body.removeChild(rtextarea);
        //       } else {
        //         let shareData = {
        //           title: '<?=$comp['company_name']?>',
        //           text: '<?=$comp['company_name']?>',
        //           url: '<?=BASEURL."user/registration/left/".bin2hex($this->session->userdata('micusername'))?>',
        //       }
        //       navigator.clipboard.writeText('<?=BASEURL."user/registration/left/".bin2hex($this->session->userdata('micusername'))?>');
        //       navigator.share(shareData);
        //     }
        // } 
        
        function sharell(){
            if (location.protocol !== 'https:') {
        
                var rtextarea = document.createElement("textarea");
                document.body.appendChild(rtextarea);
                rtextarea.value = '<?=BASEURL."user/registration/".bin2hex($this->session->userdata('micusername'))?>'; //save main text in it
                rtextarea.select(); //select textarea contenrs
                document.execCommand("copy");
                document.body.removeChild(rtextarea);
               } else {
                let shareData = {
                  title: '<?=$comp['company_name']?>',
                  text: '<?=$comp['company_name']?>',
                  url: '<?=BASEURL."user/registration/".bin2hex($this->session->userdata('micusername'))?>',
              }
              navigator.clipboard.writeText('<?=BASEURL."user/registration/".bin2hex($this->session->userdata('micusername'))?>');
              navigator.share(shareData);
            }
        } 
    </script>
    
    
    <?php if ($this->session->flashdata('success_message')) { ?>
    <script>
        // SweetAlert for success message
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= $this->session->flashdata("success_message") ?>',
        });
    </script>
<?php } ?>
<?php $this->session->unset_userdata('success_message'); ?>

<?php if ($this->session->flashdata('error_message')) { ?>
    <script>
        // SweetAlert for error message
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $this->session->flashdata("error_message") ?>',
        });
    </script>
<?php } ?>

  <?php $this->session->unset_userdata('error_message'); ?>  
  
 
   

<!--<?php if ($this->session->flashdata('success_message')) { ?>-->
<!--    <button type="button" class="btn btn-primary" onclick="showSuccessToast()" style="display:none!important;">Show Toast</button>-->

<!--    <div class="bs-toast toast fade" id="success-toast" role="alert" aria-live="assertive" aria-atomic="true">-->
<!--        <div class="toast-header">-->
<!--            <i class="mdi mdi-check-circle text-success me-2"></i>-->
<!--            <div class="me-auto fw-semibold">Success</div>-->
<!--            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>-->
<!--        </div>-->
<!--        <div class="toast-body"><?php echo $this->session->flashdata('success_message'); ?></div>-->
<!--    </div>-->

    <!-- Add the following script tag -->
<!--    <script>-->
        // Function to show the success toast message
<!--        function showSuccessToast() {-->
<!--            var successToast = new bootstrap.Toast(document.getElementById('success-toast'));-->
<!--            successToast.show();-->
<!--        }-->

        // When the document is ready, show the success toast
<!--        document.addEventListener('DOMContentLoaded', function () {-->
<!--            showSuccessToast();-->
<!--        });-->
<!--    </script>-->
<!--<?php } ?>-->

<!--<?php $this->session->unset_userdata('success_message'); ?>-->

<!--<?php if ($this->session->flashdata('error_message')) { ?>-->
<!--    <button type="button" class="btn btn-primary" onclick="showErrorToast()" style="display:none!important;">Show Toast</button>-->

<!--    <div class="bs-toast toast fade" id="error-toast" role="alert" aria-live="assertive" aria-atomic="true">-->
<!--        <div class="toast-header">-->
<!--            <i class="mdi mdi-alert-circle text-danger me-2"></i>-->
<!--            <div class="me-auto fw-semibold">Error</div>-->
<!--            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>-->
<!--        </div>-->
<!--        <div class="toast-body"><?php echo $this->session->flashdata('error_message'); ?></div>-->
<!--    </div>-->

    <!-- Add the following script tag -->
<!--    <script>-->
        // Function to show the error toast message
<!--        function showErrorToast() {-->
<!--            var errorToast = new bootstrap.Toast(document.getElementById('error-toast'));-->
<!--            errorToast.show();-->
<!--        }-->

        // When the document is ready, show the error toast
<!--        document.addEventListener('DOMContentLoaded', function () {-->
<!--            showErrorToast();-->
<!--        });-->
<!--    </script>-->
<!--<?php } ?>-->

<!--<?php $this->session->unset_userdata('error_message'); ?>-->
<script>
function showToast() {
var toastEl = document.getElementById('my-toast');
var toast = new bootstrap.Toast(toastEl);
toast.show();
}
</script>
          