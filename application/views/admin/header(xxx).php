
<!doctype html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>MICT</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?=BASEURL?>assets/images/newmic.png" />
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
      <!-- End Google Tag Manager -->  </head>
  <body class=" ">

    <!-- loader Start -->
    <!--<div id="loading">-->
    <!--  <div class="loader simple-loader">-->
    <!--      <div class="loader-body"></div>-->
    <!--  </div>    </div>-->
    <!-- loader END -->
    <aside class="sidebar sidebar-default navs-rounded ">                                                                                        
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="<?=BASEURL?>admin" class="navbar-brand dis-none align-items-center justify-content-center">
                <img src="<?=BASEURL?>assets/images/newmic.png" class="img-fluid "  alt="logo" style="width:150px;height:100px">
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
                <ul class="navbar-nav iq-main-menu">
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
                    
                         <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'wallet_update' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/wallet_update">
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                            <i class="icon">
                            <i class="fa-solid fa-wallet"></i>
                            </i>
                            <span class="item-name">Wallet Update</span>
                        </a>
                    </li>
                    
                      <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'trading_income' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/trading_income">
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                            <i class="icon">
                           <i class="fa-solid fa-magnifying-glass-dollar"></i>
                            </i>
                            <span class="item-name">Trading Income</span>
                        </a>
                    </li>
                    
                       <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'user_credential' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/user_credential">
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                             <i class="icon">
                               <i class="fa-solid fa-address-card"></i>
                            </i>
                            <span class="item-name">User Credential</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'admin_wallet' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/admin_wallet">
                            <!--<i class="icon">-->
                            <!--<svg width="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            -->
                            <!--</i>-->
                             <i class="icon">
                               <i class="fa-solid fa-chalkboard-user"></i>
                            </i>
                            <span class="item-name">Admin Wallet</span>
                        </a>
                    </li>
                    
                    <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'trading' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/trading">
                             <i class="icon">
                               <i class="fa-solid fa-chalkboard-user"></i>
                            </i>
                            <span class="item-name">Trading</span>
                        </a>
                    </li>
                    
                     <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'generate_rank_income' ){ echo "active"; } ?>" aria-current="page" href="<?=BASEURL?>admin/generate_rank_income">
                             <i class="icon">
                               <i class="fa-solid fa-ranking-star"></i>
                            </i>
                            <span class="item-name">Generate Rank Income</span>
                        </a>
                    </li>
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
                       <li class="nav-item ">
                        <a class="nav-link <?php if($page_name == 'level_master' ){ echo "active"; } ?>" data-bs-toggle="collapse" href="#sidebar-master" role="button" aria-expanded="false" aria-controls="sidebar-user">
                            <i class="icon">
                                 <svg width="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </i>
                            <span class="item-name">AI Master</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" str