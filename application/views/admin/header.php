
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
      <!-- Google Tag Manager -->
      
      <!--FONT AWESOME-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
      <!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':-->
      <!--new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],-->
      <!--j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=-->
      <!--'../../../../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);-->
      <!--})(window,document,'script','dataLayer','GTM-WNGH9RL');window.tag_manager_event='dashboard-free-preview';window.tag_manager_product='Coinex';</script>-->
      <!-- End Google Tag Manager -->  
      
      
      <style>
      .sidebar .data-scrollbar{
          height:78vh!important;
      }
          /*New Loader*/
.loader.simple-loader .loader-body {
    background: url('<?=BASEURL?>assets/images/loader-new.png') no-repeat scroll center center;
    animation: rotate 2s infinite linear;
    background-size: auto 150px;
}
/* Define the keyframes for rotation */
@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
@media (max-width: 500px) {
    .loader.simple-loader .loader-body {
        background-size: auto 100px;
    }
}
      </style>
      
      </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
    <aside class="sidebar sidebar-default navs-rounded ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="<?=BASEURL?>admin" class="navbar-brand dis-none align-items-center justify-content-center">
                <img style="height: 90px;" src="<?=BASEURL?>assets/images/newmic.png"  class="img-fluid "  alt="logo" style="width:51px!important">
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
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
                <ul class="navbar-nav iq-main-menu mb-5">
                    <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'dashboard' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin">
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                            <i class="icon">
                            <i class="fa-solid fa-house"></i>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    
                  <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'user_credential' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/user_credential">
                             <i class="icon">
                               <i class="fa-solid fa-user-gear"></i>
                            </i>
                            <span class="item-name">User Management</span>
                        </a>
                    </li>
                    
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'kyc_request' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/kyc_request">
                             <i class="icon">
                               <i class="fa-solid fa-address-card"></i>
                            </i>
                            <span class="item-name">KYC Management</span>
                        </a>
                    </li>
                    
                    <!-- <li class="nav-item">-->
                    <!--    <a class="nav-link <?php if($page_name == 'binary_tree' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/binary_tree">-->
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                    <!--         <i class="icon">-->
                    <!--        <i class="fa-solid fa-street-view"></i>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">Binary Tree</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'uni_level_tree' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/uni_level_tree">
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                             <i class="icon">
                            <i class="fa-solid fa-users-between-lines"></i>
                            </i>
                            <span class="item-name">Unilevel</span>
                        </a>
                    </li>
                    
                    <!--  <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'capital_withdraw_request' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/capital_withdraw_request">-->
                    <!--        <i class="icon">-->
                    <!--        <i class="fa-solid fa-arrow-right-arrow-left"></i>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">Capital Withdraw Request</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!-- <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'deposit_history' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/deposit_history">-->
                    <!--        <i class="icon">-->
                    <!--        <i class="fa-solid fa-landmark"></i>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">Deposit History</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!--     <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'wallet_update' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/wallet_update">-->
                    <!--        <i class="icon">-->
                    <!--        <i class="fa-solid fa-wallet"></i>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">Wallet Update</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!--  <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'trading_income' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/trading_income">-->
                    <!--        <i class="icon">-->
                    <!--       <i class="fa-solid fa-magnifying-glass-dollar"></i>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">Daily Profit</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                      
                    <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'admin_wallet' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/admin_wallet">
                          
                             <i class="icon">
                               <i class="fa-solid fa-chalkboard-user"></i>
                            </i>
                            <span class="item-name">Admin Wallet</span>
                        </a>
                    </li>
                    
                    <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'withdraw_request' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/withdraw_request">
                          
                             <i class="icon">
                               <i class="fa-solid fa-chalkboard-user"></i>
                            </i>
                            <span class="item-name">Withdraw Request</span>
                        </a>
                    </li>
                    
                    
                       <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'deposit_request' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/deposit_request">
                          
                             <i class="icon">
                               <i class="fa-solid fa-chalkboard-user"></i>
                            </i>
                            <span class="item-name">Manual Deposit Request</span>
                        </a>
                    </li>
                    
                       <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'deposit_request' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/scrolling_news">
                          
                             <i class="icon">
                               <i class="fa-solid fa-chalkboard-user"></i>
                            </i>
                            <span class="item-name">Scrolling_News</span>
                        </a>
                    </li>
                    
                    
                    <!--<li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'trading' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/forex_trading">-->
                    <!--         <i class="icon">-->
                    <!--          -->
                    <!--        </i>-->
                    <!--        <span class="item-name">Trading</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!-- <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'forex_trading' ){ echo "active"; } ?>" data-bs-toggle="collapse" href="#sidebar-trading" role="button" aria-expanded="false" aria-controls="sidebar-user">-->
                    <!--        <i class="icon">-->
                    <!--            <i class="fa-solid fa-chart-line"></i>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">Trading</span>-->
                    <!--        <i class="right-icon">-->
                    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
                    <!--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />-->
                    <!--            </svg>-->
                    <!--        </i>-->
                    <!--    </a>-->
                    <!--    <ul class="sub-nav collapse" id="sidebar-trading" data-bs-parent="#sidebar">-->
                           
                    <!--          <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'forex_trading' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/forex_trading">-->
                    <!--                <i class="icon">-->
                    <!--                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                    <!--                        <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                    <!--                    </svg>-->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> L </i>-->
                    <!--                <span class="item-name">Forex Trading</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                            
                    
                    <!--        <li class="nav-item">-->
                    <!--            <a class="nav-link <?php if($page_name == 'crypto_trading' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/crypto_trading">-->
                    <!--                <i class="icon">-->
                    <!--                   <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                    <!--                        <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                    <!--                    </svg> -->
                    <!--                </i>-->
                    <!--                <i class="sidenav-mini-icon"> R </i>-->
                    <!--                <span class="item-name">Crypto Trading</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    
                    <!-- <li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'generate_rank_income' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/generate_rank_income">-->
                    <!--         <i class="icon">-->
                    <!--           <i class="fa-solid fa-ranking-star"></i>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">Generate Rank Income</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--<li class="nav-item ">-->
                    <!--    <a class="nav-link <?php if($page_name == 'fd_activate' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/fd_activate">-->
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                    <!--         <i class="icon">-->
                    <!--           <i class="fa-solid fa-chalkboard-user"></i>-->
                    <!--        </i>-->
                    <!--        <span class="item-name">FD Activate</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                  
                   <!--<li class="nav-item">-->
                   <!--             <a class="nav-link <?php if($page_name == 'trade_level_master' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/stacking_income">-->
                   <!--                 <i class="icon">-->
                   <!--                     <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                   <!--                         <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                   <!--                     </svg>-->
                   <!--                 </i>-->
                   <!--                 <i class="sidenav-mini-icon"> L </i>-->
                   <!--                 <span class="item-name">Generate stack Income</span>-->
                   <!--             </a>-->
                   <!--         </li>-->
                      <li class="nav-item">
                        <a class="nav-link <?php if($page_name == 'level_master' ){ echo "active"; } ?>" data-bs-toggle="collapse" href="#sidebar-master" role="button" aria-expanded="false" aria-controls="sidebar-user">
                            <i class="icon">
                                 <svg width="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </i>
                            <span class="item-name">AI Master</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-master" data-bs-parent="#sidebar">
                            <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'rank_master' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/aitrade">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> R </i>
                                    <span class="item-name">AI Profit</span>
                                </a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link <?php if($page_name == 'level_master' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/level_master">-->
                            <!--        <i class="icon">-->
                            <!--            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                            <!--                <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                            <!--            </svg>-->
                            <!--        </i>-->
                            <!--        <i class="sidenav-mini-icon"> L </i>-->
                            <!--        <span class="item-name">Level Master</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--  <li class="nav-item">-->
                            <!--    <a class="nav-link <?php if($page_name == 'trade_level_master' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/trade_level_master">-->
                            <!--        <i class="icon">-->
                            <!--            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                            <!--                <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                            <!--            </svg>-->
                            <!--        </i>-->
                            <!--        <i class="sidenav-mini-icon"> L </i>-->
                            <!--        <span class="item-name">Trade Level Master</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link <?php if($page_name == 'mining_master' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/mining_master">-->
                            <!--        <i class="icon">-->
                            <!--            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                            <!--                <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                            <!--            </svg>-->
                            <!--        </i>-->
                            <!--        <i class="sidenav-mini-icon"> L </i>-->
                            <!--        <span class="item-name">Mining Master</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link <?php if($page_name == 'refferal_master' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/refferal_master">-->
                            <!--        <i class="icon">-->
                            <!--           <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">-->
                            <!--                <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    -->
                            <!--            </svg> -->
                            <!--        </i>-->
                            <!--        <i class="sidenav-mini-icon"> R </i>-->
                            <!--        <span class="item-name">Referral Master</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                             <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'trade_level_master' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/levelmaster">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> L </i>
                                    <span class="item-name">Trade Level Master</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                      <li class="nav-item">
                        <a class="nav-link <?php if($page_name == 'game_master' ){ echo "active"; } ?>" data-bs-toggle="collapse" href="#sidebar-gamemaster" role="button" aria-expanded="false" aria-controls="sidebar-user">
                            <i class="icon">
                                <i class="fa-solid fa-puzzle-piece"></i>
                            </i>
                            <span class="item-name">Game Master</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-gamemaster" data-bs-parent="#sidebar">
                            
                             <li class="nav-item">
                                <a class="nav-link <?php if($page_name == 'game_level_master' ){ echo "active"; } ?>" href="<?=BASEURL?>admin/game_level_master">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" width="16" viewBox="0 0 24 24" fill="none">
                                            <circle cx="12" cy="12" r="7.5" stroke="currentColor"></circle>                                                                    
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> L </i>
                                    <span class="item-name">Game Level Master</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                   
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'support' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/support">
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                              <i class="icon">
                              <i class="fa-solid fa-headset"></i>
                            </i>
                            <span class="item-name">Support</span>
                        </a>
                    </li>
                       <li class="nav-item mb-5">
                        <a class="nav-link " aria-current="page" href="<?=BASEURL?>admin/logout">
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                              <i class="icon">
                              <i class="fa-solid fa-sign-out"></i>
                            </i>
                            <span class="item-name">logout</span>
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
                 <svg width="20px" height="20px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                </svg>
                </i>
            </div>
              <h4 class="title">
                Dashboard
              </h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                  <span class="navbar-toggler-bar bar1 mt-2"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto navbar-list mb-2 mb-lg-0 align-items-center">
             <!--<button type="button" class="btn btn-primary" style="margin-right:10px" onclick="sharel()">Left</button>-->
             <!--<button type="button" class="btn btn-primary" onclick="sharer()">Right</button>-->
             <button type="button" class="btn btn-sm me-2 btn-primary" onclick="sharer()"><i class="fa-solid fa-share me-2"></i>Referral Link</button>
                <li class="nav-item dropdown">
                  <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=BASEURL?>assets/images/avatars/01.png" alt="admin-Profile" class="img-fluid avatar avatar-50 avatar-rounded">
                    <div class="caption ms-3 ">
                        <h6 class="mb-0 caption-title"><?=$this->session->userdata('mcusername');?></h6>
                        <!--<p class="mb-0 caption-sub-title">Super Admin</p>-->
                    </div>
                  </a>
               
                </li>
              </ul>
            </div>
          </div>
        </nav>        <!--Nav End-->
      </div>
              <?php      
 if ($this->session->flashdata('success_message')) { ?>
    <div class="alert alert-left alert-success bg-success text-light border-0 alert-dismissible fade show " role="alert">
        <i class="bi bi-check-circle me-1"></i>
        <?php echo $this->session->flashdata('success_message');?>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } if ($this->session->flashdata('error_message')) { ?>
    <div class="alert alert-left alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        <?php echo $this->session->flashdata('error_message');?>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
      <script>
        function sharel(){
            if (location.protocol !== 'https:') {
        
                var rtextarea = document.createElement("textarea");
                document.body.appendChild(rtextarea);
                rtextarea.value = '<?=BASEURL."user/registration/left/".bin2hex($this->session->userdata('mcusername'))?>'; //save main text in it
                rtextarea.select(); //select textarea contenrs
                document.execCommand("copy");
                document.body.removeChild(rtextarea);
               } else {
                let shareData = {
                  title: '<?=$comp['company_name']?>',
                  text: '<?=$comp['company_name']?>',
                  url: '<?=BASEURL."user/registration/left/".bin2hex($this->session->userdata('mcusername'))?>',
              }
              navigator.clipboard.writeText('<?=BASEURL."user/registration/left/".bin2hex($this->session->userdata('mcusername'))?>');
              navigator.share(shareData);
            }
        } 
        function sharer(){
            if (location.protocol !== 'https:') {
        
                var rtextarea = document.createElement("textarea");
                document.body.appendChild(rtextarea);
                rtextarea.value = '<?=BASEURL."user/registration/".bin2hex($this->session->userdata('mcusername'))?>'; //save main text in it
                rtextarea.select(); //select textarea contenrs
                document.execCommand("copy");
                document.body.removeChild(rtextarea);
               } else {
                let shareData = {
                  title: '<?=$comp['company_name']?>',
                  text: '<?=$comp['company_name']?>',
                  url: '<?=BASEURL."user/registration/".bin2hex($this->session->userdata('mcusername'))?>',
              }
              navigator.clipboard.writeText('<?=BASEURL."user/registration/".bin2hex($this->session->userdata('mcusername'))?>');
              navigator.share(shareData);
            }
        }
    </script>