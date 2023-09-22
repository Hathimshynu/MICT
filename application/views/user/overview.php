<?php include 'header.php';?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;0,800;1,400;1,500;1,700;1,800&display=swap');
</style>


<style>
  .tradingview-widget-container {
    position: relative;
    width: 100%!important;
    overflow: hidden;
  }

  .tradingview-widget-container__widget {
    width: 100%!important;
    height: 500px!important; /* Set initial height */
  }

  @media (max-width: 768px) {
    .tradingview-widget-container__widget {
      height: 300px!important; /* Adjust height for smaller screens */
    }
  }
</style>
<style>

@import url('https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap');


.banner-container p {
  margin: 0;
}


/*.banner-container {*/
/*  display: flex;*/
/*  align-items: center;*/
/*  justify-content: end;*/
/*  height:400px !important;*/
/*  padding: 30px;*/
/*  color: #224;*/
/*  background: url('<?=BASEURL?>assets/images/banner-bg-new.jpg') center / cover no-repeat fixed;*/
/*}*/

.banner-card{
    position: absolute;
    right: 5%;
    top: 21%;
}

.banner-container .card {
    text-align:center !important;
  max-width: 300px;
  min-height: 200px;
  /*display: flex;*/
  /*justify-content: center;*/
  height: 300px;
  padding: 27px;
  margin-bottom:0 !important;
  border: 2px solid rgb(247 232 75);
  border-radius: 20px !important;
  /*background-color: #48cbbf80!important;*/
  /*background-color: grey!important;*/
  box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.25) !important;
}



.btn-glow {
    background: #825af9!important;
    color: black !important;
    font-weight: 400;
    box-shadow: #825af9;
    animation: glow 1.4s ease-out infinite;
}
.btn-glow:hover {
  background: #f8cd4a !important;
}

@media screen and (max-width:370px){
    .banner-card {
    right: 2% !important;
    }
}

@media screen and (max-width:500px){
    .banner-container .card{
        padding-top:10px !important;
        padding-bottom:10px !important;
    }
    .d-forex-btn, .d-crypto-btn {
        padding: 6px 15px !important;
    font-size: 10px !important;
}
.banner-container .banner-image{
    height:auto !important;
}

.carousel-indicators [data-bs-target] {
    width: 10px !important;
    height: 10px !important;

}
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
  color: #000; 
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

.deduct-para{
    background-color: #FFE53B;
    background-image: linear-gradient(90deg, #FFE53B 0%, #FF2525 74%);
    border-radius:10px;
    font-weight:500 !important;
    font-size:18px;
    padding:10px 5px;
}

  .trading-history p{
        margin-bottom:0 !important;
        margin-top:0 !important;
        padding-top:0 !important;
        padding-bottom:0 !important;
        text-shadow: 0px 1px 2px black;
    }
    
    .trading-history .text-info{
        color: #48dbfb !important;
    }
    
    @media screen and (max-width:500px){
        .trading-history p{
            font-size:12px !important;
        }
    }
    
      .trade-currency{
        font-size:18px !important;
        margin-bottom:17px !important;
    }
    
    
    /*CSS for Ranking Cards*/
    
    .rank-card-container :root {
  --card-height:  65vh;
  --card-width:   calc(var(--card-height) / 1.5);
  --bg:           25 28 41;
  --color:        88 199 250;
    }
    
    .rank-card-container .card {
        min-height: 480px;
    background: rgba(25, 28, 41);
    width: calc(var(--card-height) / 1.5);
    height: var(--card-height);
    padding: 30px;
    position: relative;
    border-radius: 6px;
    color: rgba(88, 199, 250, 0.6);
    cursor: pointer;
    text-align: center;
    margin-top: 5px;
}

.rank-card-container .card .crown-img {
    width: 120px;
    border-radius: 50%;
    border: 2px solid #443dd6;
}

.rank-card-container .image-container {
    background-color: #443e3e;
    padding: 7px;
    margin: -30px;
    margin-bottom: 20px;
    border-radius: 7px;
}


@keyframes spin {
    0% {
        --rotate: 0deg;
    }
    100% {
        --rotate: 360deg;
    }
}

.rank-card-container .card::before {
    content: "";
    width: 104%;
    height: 102.7%;
    border-radius: 8px;
    background-image: linear-gradient( var(--rotate), #FEF130, #FEF130 43%, #FF971D );
    position: absolute;
    z-index: -1;
    top: -1.3%;
    left: -2%;
    animation: spin 2.5s linear infinite;
}

.rank-card-container .card::after {
    position: absolute;
    content: "";
    top: calc(var(--card-height) / 6);
    left: 0;
    right: 0;
    z-index: -1;
    height: 100%;
    width: 100%;
    margin: 0 auto;
    transform: scale(0.8);
    filter: blur(calc(var(--card-height) / 6));
    opacity: 1;
    transition: opacity 0.5s;
    animation: spin 2.5s linear infinite;
}

#lock {
  font-size: 36px;
    background-color: var(--bs-white);
    color: #ff0000;
    border-radius: 12px;
    padding: 11px;
    box-shadow: rgb(14 30 37 / 72%) 0px 2px 16px 4px, rgb(14 30 37 / 60%) 0px 2px 16px 0px;
}

#lock-open {
  font-size: 34px;
    background-color: transparent;
    color: #44bd32;
    border-radius: 12px;
    /*padding: 11px;*/
}

/*Blocking card CSS*/
.locked-card .crown-img{
    opacity: 0.2 !important;
}
.locked-card .rank-level{
    opacity: 0.2 !important;
}
 .locked-card #locked-rank-icon{
    opacity: 0.4 !important;
}
.locked-card::before {
    opacity: 0.1 !important;
}

.d-forex-btn, .d-crypto-btn{
    font-weight: 900;
    font-size: 20px;
}
.d-forex-btn i, .d-crypto-btn i{
    font-size:18px !important;
}

@media screen and (max-width:500px){
    .d-forex-btn i, .d-crypto-btn i{
    font-size:11px !important;
}

}


.animated-text {
  text-align: center;
  font-weight:900 !important;
  background: linear-gradient(to right, #FFF 20%, #FF0 40%, #FF0 60%, #FFF 80%);
  background-size: 200% auto;
  color: #000;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  text-fill-color: transparent;
  animation: shine 1s linear infinite;
}

@keyframes shine {
  to {
    background-position: 200% center;
  }
}


.carousel-control-prev-icon {
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff' stroke='%23fff' stroke-width='2'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e")!important;
}
.carousel-control-next-icon{
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff' stroke='%23fff' stroke-width='2'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e")!important;
}

.carousel-inner{
    border-radius:12px;
}

.carousel-indicators [data-bs-target] {
    width: 15px;
    height: 15px;
    background-color:#fff !important;
}

@media screen and (min-width:992px){
    .carousel-inner{
        height:400px !important;
    }
}
@media screen and (max-width:500px){
    .carousel-inner{
        height: 170px !important;
    }
    .carousel-control-prev-icon, .carousel-control-next-icon {
    width: 1rem !important;
    height: 1rem !important;
    }
}

.carousel-indicators [data-bs-target].active {
    background-color:#FEF130 !important;
}

.verical-ruler{
    width: 2px !important;
    min-height: 1em;
    background-color: #FF971D !important;
    opacity: 3.9 !important;
}

.team-earnings-container{
    background-color:#222222;
    border-radius:10px !important;
    margin-left: -6px;
    margin-right: -6px;
}


@media screen and (max-width:500px){
    .team-earnings-container .wallet-p{
        padding-top: 12px !important;
    padding-bottom: 12px !important;
    }
    .team-earnings-container{
        margin-top:14px !important;
    }
    .invest-btn-container{
    margin-top:13px !important;
    }
    .rank-card-container{
        margin-top: 11px !important;
    }
    .wallet-text-heading{
        margin-bottom:3px !important;
        font-size: 11px !important;
    }
    .wallet-amount-show{
        font-size:15px !important;
    }
    
    /*Recently updated for Small Screen Rank Cards*/
    .container-fluid.content-inner.dashboard-inner.pb-0{
        padding-top: 12px !important;
    }
    
    .rank-card-container .card .crown-img {
    width: 50px !important;
    }
    .rank-card-container .image-container {
      margin-bottom: 6px !important;
      margin-left: -4px;
      margin-top: -4px !important;
      margin-right: -4px !important;
      border-bottom-left-radius:0px !important;
      border-bottom-right-radius:0px !important;
    }
    .rank-level{
        font-size: 12px !important;
    }
    #lock-open {
        height: 40px !important;
    }
    .lock-unlock-icons{
        margin-top:0 !important;
    }
    .achieved-container{
        margin-top:0px !important;
    }
    .achieved-text{
        font-size: 12px !important;
    }
    .rank-card-container .card {
    min-height: 155px !important;
    padding-bottom: 5px !important;
    padding: 4px !important;
    margin-bottom: 9px !important;
    }
    #lock {
    font-size: 19px !important;
    padding: 7px !important;
    border-radius: 9px !important;
    }
    #locked-rank-icon{
        margin-top: 4px !important;
    }
    .animated-text{
        font-size:13px !important;
    }
    .rank-card-container > * {
    padding-right: 7px !important;
    padding-left: 12px !important;
    }
    .rank-col-pl{
        padding-left: 6px !important;
    }
    .treasure-container{
        margin-top:4px !important;
    }
    .rank-package-info{
        display:none !important;
    }
    .pack-price{
        font-size:8px !important;
        opacity: 0.6;
    }
    .col-6-sm-screen{
        margin-right:12px !important;
    }
    .mobile-screen-card{
        padding-left: 14px !important;
    }
    .mobile-screen-card .card{
        margin-bottom: 10px !important;
        min-height: 80px !important;
    }
}

 @keyframes slideRight {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(16px);
      }
    }
    
    #angle-right-icon {
      font-size: 16px;
      animation: slideRight 1s infinite linear;
    }
    
    /*Rank Creator Card CSS*/
    
    .rank-creator-income-container{
        margin-left: -6px;
        margin-right: -9px;
        margin-bottom: 30px;
    }
    .rank-creator-income{
        background-color:#3B3B3B;
        padding:15px 20px;
        border-radius:15px;
    }
    .warning-icon{
        color:#F54035;
        font-size:18px;
        font-size: 27px;
    }
    .rank-text{
        font-size: 20px;
    }
    .rank-button{
        background-color:#FF971D !important;
        box-shadow: 0px 2px 2px #0b0b0c;
    }
    .rank-button:hover{
        background-color:#FF971D !important;
    }
    
    @media screen and (max-width:768px){
        .warning-icon {
    font-size: 19px !important;
       }
       .rank-text {
    font-size: 13px !important;
     }
     .rank-button {
    font-size: 10px !important;
    padding: 5px 13px !important;
     }
     .rank-creator-row > * {
         padding-right: 6px !important;
         padding-left: 6px !important;
     }
     .rank-creator-income-container{
         margin-top: 7px !important;
         margin-bottom: 15px !important;
     }
   }
</style>


<?php  $timer = $this->db->where('status','Active')->where('user_id',$this->session->userdata('micusername'))->get('user_package')->result_array(); ?>
<div class="container-fluid content-inner dashboard-inner pb-5">
    <div class="row mb-0">
          <div style="background-color:transparent !important;box-shadow:none !important;  padding-left: 10px;padding-right: 10px;" class="card mb-0">
                  <div class="card-body p-0">
                     <div class="bd-example">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                           <ol class="carousel-indicators">
                              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></li>
                              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"></li>
                             
                           </ol>
                           <div class="carousel-inner">
                             
                              <div class="carousel-item active">
                                 <img src="<?=BASEURL?>assets/images/mictrd.jpg" class="d-block w-100" alt="#">
                                 <!--<div class="carousel-caption d-none d-md-block">-->
                                 <!--   <h4 class="text-white">Second slide label</h4>-->
                                 <!--   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                 <!--</div>-->
                              </div>
                              <div class="carousel-item">
                                 <img src="<?=BASEURL?>assets/images/banner-bg-new.jpg" class="d-block w-100" alt="#">
                                 <!--<div class="carousel-caption d-none d-md-block">-->
                                 <!--   <h4 class="text-white">Third slide label</h4>-->
                                 <!--   <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>-->
                                 <!--</div>-->
                              </div>
                               <div class="carousel-item">
                                 <img src="<?=BASEURL?>assets/images/banner/banner-3.jpg" class="d-block w-100" alt="#">
                                 <!--<div class="carousel-caption d-none d-md-block">-->
                                 <!--   <h4 class="text-white">Third slide label</h4>-->
                                 <!--   <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>-->
                                 <!--</div>-->
                              </div>
                               <div class="carousel-item">
                                 <img src="<?=BASEURL?>assets/images/mobtrd.jpg" class="d-block w-100" alt="#">
                                 <!--<div class="carousel-caption d-none d-md-block">-->
                                 <!--   <h4 class="text-white">Third slide label</h4>-->
                                 <!--   <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>-->
                                 <!--</div>-->
                              </div>
                               <div class="carousel-item">
                                 <img src="<?=BASEURL?>assets/images/banner/banner-3.jpg" class="d-block w-100" alt="#">
                                 <!--<div class="carousel-caption d-none d-md-block">-->
                                 <!--   <h4 class="text-white">Third slide label</h4>-->
                                 <!--   <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>-->
                                 <!--</div>-->
                              </div>
                           </div>
                           <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           </a>
                           <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               
        <!--<div class="col-lg-12 d-none">-->
        <!--    <div class="banner-container card mb-0">-->
        <!--        <img style="height:500px;object-fit:cover" src="<?=BASEURL?>assets/images/banner-bg-new.jpg" class="img-responsive banner-image img-fluid">-->
               
        <!--        <div class="card banner-card">-->
        <!--          <p style="color:rgb(247 232 75);font-size:24px;font-weight:700;text-shadow: 2px 2px 4px #000000;font-family: 'Poppins', sans-serif;">If you want to activate <span class="h-d-content">INVESTMENT PANEL</span> Click the below <span class="h-d-content">ACTIVATE</span> button</p>-->
        <!--          <div class="d-flex justify-content-center align-items-center mt-3">-->
        <!--              <i style="color:yellow !important;font-size:26px;" class="fa-solid fa-arrow-right me-4" id="arrow-icon"></i><button class="btn btn-primary btn-glow rounded-pill" data-bs-toggle="modal" data-bs-target="#ActivateModal">Activate</button>-->
        <!--          </div>-->
        <!--        </div>-->
               
        <!--    </div>-->
        <!--</div>-->
        
         <!--Panel Activation Modal Starts-->
      <div class="modal fade" id="ActivateModal" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div style="border: 1px solid #19191a !important;" class="modal-content">
               <div style="background-color:#19191a !important" class="modal-header">
                  <h5 class="modal-title text-primary" id="exampleModalLabel1">Panel Activation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  </button>
               </div>
               <div class="modal-body text-center">
                  <h4 class="text-center mb-3">Are you sure?</h4>
                  <small style="font-size:12px;" class="text-white mt-5 p-0">Note:</small><br>
                  <p class="text-center text-dark deduct-para my-4 mt-0">
                      $20 dollars will be deducted from your Wallet.</p>
                     <form id="regist" method="post">
                      <div class="d-flex justify-content-center align-items-center mt-3">
                          <input type="hidden" class="form-control"  name="user_id" value="<?=$this->session->userdata('micusername')?>" placeholder="Enter the percentage">
                          <div>
                              <button type="submit" class="btn btn-warning rounded-pill me-3 panel-avtivation-success" ><i class="fa-regular fa-circle-check me-2"></i>Yes</button>
                              <button type="button" class="btn btn-outline-danger rounded-pill panel-avtivation-failed" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark me-2"></i>No</button>
                          </div>
                      </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--Panel Activation Modal Ends-->
        
    </div>
    

   
         
    
   <div class="row desktop mt-4">
      <div class="col-lg-6">
         <div class="card">
            <div class="card-body ">
                <div class="row d-flex align-items-center">
                   
                <div class="col-2">
                    
                <svg height="30px" width="30px" version="1.1" id="_x36_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <g>
                           <path style="fill:#825af9;" d="M363.233,42.356c-0.953,6.324-5.024,13.079-12.473,19.143 c-24.426,19.749-32.569,36.033-34.647,41.144c-0.433,1.126-0.606,1.732-0.606,1.732H196.493c0,0-0.173-0.606-0.606-1.732 c-2.079-5.111-10.221-21.395-34.647-41.144c-0.26-0.173-0.433-0.347-0.606-0.52c-27.545-23.041-5.63-54.136,35.86-42.53 c1.992,0.52,3.811,0.953,5.457,1.213C224.211,22.954,218.408,0,256,0c40.451,0,30.663,26.505,59.507,18.45 c7.969-2.252,15.158-2.858,21.482-2.338C355.091,17.757,365.485,29.277,363.233,42.356z"></path>
                           <path style="fill:#825af9;" d="M443.095,324.905C443.095,428.24,359.335,512,256,512c-26.851,0-52.404-5.63-75.445-15.938 c-42.616-18.709-76.916-53.01-95.713-95.626c-10.221-23.127-15.938-48.679-15.938-75.531c0-97.445,94.154-171.85,123.084-198.268 c1.732-1.473,3.292-2.945,4.504-4.158h119.013c1.213,1.213,2.772,2.685,4.504,4.158 C348.941,153.055,443.095,227.459,443.095,324.905z"></path>
                           <path style="fill:#825af9;" d="M328.932,114.856c0,5.717-3.811,10.394-8.921,11.781c-1.039,0.346-2.165,0.52-3.292,0.52H195.28 c-1.126,0-2.252-0.173-3.292-0.52c-5.11-1.386-8.921-6.063-8.921-11.781c0-6.756,5.457-12.213,12.213-12.213h121.439 C323.475,102.643,328.932,108.1,328.932,114.856z"></path>
                           <path style="fill:#FFFFFF;" d="M313.486,380.722c-3.202,6.019-7.635,11.045-13.207,15.17c-5.601,4.095-12.314,7.149-20.127,9.171 c-3.41,0.853-6.98,1.448-10.609,1.943v22.715h-27.098v-22.269c-7.723-0.644-15.1-1.844-22.041-3.758 c-10.619-2.905-24.519-14.644-24.519-14.644c-1.19-0.683-1.974-1.904-2.132-3.252c-0.179-1.368,0.287-2.746,1.259-3.708 l13.583-13.583c1.468-1.467,3.728-1.735,5.503-0.664c0,0,10.163,8.834,17.857,10.916c7.704,2.102,15.348,3.163,22.983,3.163 c9.608,0,17.559-1.696,23.865-5.087c6.315-3.441,9.458-8.705,9.458-15.943c0-5.185-1.537-9.3-4.66-12.314 c-3.103-3.004-8.348-4.878-15.764-5.701l-24.331-2.092c-14.406-1.407-25.521-5.423-33.313-12.007 c-7.833-6.613-11.719-16.637-11.719-30.022c0-7.417,1.497-14.02,4.511-19.829c3.015-5.8,7.099-10.708,12.304-14.704 c5.205-4.005,11.273-7.02,18.174-8.992c2.875-0.853,5.909-1.398,8.982-1.893v-19.573h27.098v19.165 c6.335,0.624,12.354,1.636,17.965,3.183c9.498,2.578,19.492,10.4,19.492,10.4c1.259,0.664,2.103,1.884,2.32,3.262 c0.208,1.408-0.248,2.796-1.229,3.817l-12.74,12.929c-1.358,1.379-3.461,1.735-5.196,0.832c0,0-7.545-5.364-14.059-7.059 c-6.514-1.705-13.356-2.578-20.574-2.578c-9.41,0-16.369,1.814-20.861,5.413c-4.511,3.599-6.741,8.319-6.741,14.099 c0,5.215,1.576,9.221,4.798,12.027c3.193,2.796,8.586,4.62,16.221,5.393l21.307,1.835c15.814,1.378,27.781,5.582,35.882,12.581 c8.12,7,12.165,17.232,12.165,30.618C318.295,367.733,316.678,374.713,313.486,380.722z"></path>
                        </g>
                     </g>
                  </svg>
                  </div>
                  <div class="col">
                  <?php 
                     $total_earnings = $this->db->select_sum('credit')->where('entry_date <=',date('Y-m-d H:i:s'))->where('username',$this->session->userdata('micusername'))->get('account')->row()->credit+0;
                     $total_withdraw = $this->db->select_sum('debit')->where('remark','Withdraw')->where('username',$this->session->userdata('micusername'))->get('account')->row()->debit+0;
                     $binary_income = $this->db->select_sum('credit')->where('remark','Pair Income')->where('username',$this->session->userdata('micusername'))->get('account')->row()->credit+0;
                     ?>
                     
                     <?php $trading_bal =  $this->db->select("(SUM(credit) - SUM(debit)) as balance")->where('user_id', $this->session->userdata('micusername'))->get('trading_wallet')->row()->balance + 0;
                     $tot_profit =  $this->db->select("(SUM(credit)) as balance")->where('username', $this->session->userdata('micusername'))->where('remark','Trade Profit')->get('account')->row()->balance + 0;?>
                   <h4 class="pt-3">My Investment</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=$trading_bal;?> <span class="text-dark" style="font-size:12px;">USDT</span></h4>
                  
               </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="card">
            <div class="card-body">
                 <div class="row d-flex align-items-center">
                <div class="col-2">
                  <svg fill="#fcfcfc" width="30px" height="30px" viewBox="0 0 24 24" id="down-direction-circle" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <circle id="primary" cx="12" cy="12" r="10" style="fill: #825af9;"></circle>
                        <path id="secondary" d="M10,12V8a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1v4h.82a1,1,0,0,1,.76,1.65l-2.82,3.27a1,1,0,0,1-1.52,0L8.42,13.65A1,1,0,0,1,9.18,12Z" style="fill: #825af9E09515;"></path>
                     </g>
                  </svg>
                 </div>
                  <div class="col">
                  <h4 class="pt-3"> Total Profit</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=$tot_profit;?> <span class="text-dark" style="font-size:12px;">USDT</span></h4>
               </div>
            </div>
            </div>
         </div>
      </div>
     
   </div>
   
   <div class="row mobile mt-2 mb-1 mobile-screen-card">
        <div class="app">
         <div class="col-6 col-6-sm-screen">
          <div class="card">
             <div class="appcard-body ">
                <div class="approw d-flex align-items-center">
                   <div class="col-1 m-1">
                      <svg height="18px" width="18px" version="1.1" id="_x36_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                         <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                         <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                         <g id="SVGRepo_iconCarrier">
                            <g>
                               <path style="fill:#825af9;" d="M363.233,42.356c-0.953,6.324-5.024,13.079-12.473,19.143 c-24.426,19.749-32.569,36.033-34.647,41.144c-0.433,1.126-0.606,1.732-0.606,1.732H196.493c0,0-0.173-0.606-0.606-1.732 c-2.079-5.111-10.221-21.395-34.647-41.144c-0.26-0.173-0.433-0.347-0.606-0.52c-27.545-23.041-5.63-54.136,35.86-42.53 c1.992,0.52,3.811,0.953,5.457,1.213C224.211,22.954,218.408,0,256,0c40.451,0,30.663,26.505,59.507,18.45 c7.969-2.252,15.158-2.858,21.482-2.338C355.091,17.757,365.485,29.277,363.233,42.356z"></path>
                               <path style="fill:#825af9;" d="M443.095,324.905C443.095,428.24,359.335,512,256,512c-26.851,0-52.404-5.63-75.445-15.938 c-42.616-18.709-76.916-53.01-95.713-95.626c-10.221-23.127-15.938-48.679-15.938-75.531c0-97.445,94.154-171.85,123.084-198.268 c1.732-1.473,3.292-2.945,4.504-4.158h119.013c1.213,1.213,2.772,2.685,4.504,4.158 C348.941,153.055,443.095,227.459,443.095,324.905z"></path>
                               <path style="fill:#10100e;" d="M328.932,114.856c0,5.717-3.811,10.394-8.921,11.781c-1.039,0.346-2.165,0.52-3.292,0.52H195.28 c-1.126,0-2.252-0.173-3.292-0.52c-5.11-1.386-8.921-6.063-8.921-11.781c0-6.756,5.457-12.213,12.213-12.213h121.439 C323.475,102.643,328.932,108.1,328.932,114.856z"></path>
                               <path style="fill:#FFFFFF;" d="M313.486,380.722c-3.202,6.019-7.635,11.045-13.207,15.17c-5.601,4.095-12.314,7.149-20.127,9.171 c-3.41,0.853-6.98,1.448-10.609,1.943v22.715h-27.098v-22.269c-7.723-0.644-15.1-1.844-22.041-3.758 c-10.619-2.905-24.519-14.644-24.519-14.644c-1.19-0.683-1.974-1.904-2.132-3.252c-0.179-1.368,0.287-2.746,1.259-3.708 l13.583-13.583c1.468-1.467,3.728-1.735,5.503-0.664c0,0,10.163,8.834,17.857,10.916c7.704,2.102,15.348,3.163,22.983,3.163 c9.608,0,17.559-1.696,23.865-5.087c6.315-3.441,9.458-8.705,9.458-15.943c0-5.185-1.537-9.3-4.66-12.314 c-3.103-3.004-8.348-4.878-15.764-5.701l-24.331-2.092c-14.406-1.407-25.521-5.423-33.313-12.007 c-7.833-6.613-11.719-16.637-11.719-30.022c0-7.417,1.497-14.02,4.511-19.829c3.015-5.8,7.099-10.708,12.304-14.704 c5.205-4.005,11.273-7.02,18.174-8.992c2.875-0.853,5.909-1.398,8.982-1.893v-19.573h27.098v19.165 c6.335,0.624,12.354,1.636,17.965,3.183c9.498,2.578,19.492,10.4,19.492,10.4c1.259,0.664,2.103,1.884,2.32,3.262 c0.208,1.408-0.248,2.796-1.229,3.817l-12.74,12.929c-1.358,1.379-3.461,1.735-5.196,0.832c0,0-7.545-5.364-14.059-7.059 c-6.514-1.705-13.356-2.578-20.574-2.578c-9.41,0-16.369,1.814-20.861,5.413c-4.511,3.599-6.741,8.319-6.741,14.099 c0,5.215,1.576,9.221,4.798,12.027c3.193,2.796,8.586,4.62,16.221,5.393l21.307,1.835c15.814,1.378,27.781,5.582,35.882,12.581 c8.12,7,12.165,17.232,12.165,30.618C318.295,367.733,316.678,374.713,313.486,380.722z"></path>
                            </g>
                         </g>
                      </svg>
                   </div>
                   <div class="col p-1 m-1 ">
                      <h4 class="pt-3">My Investment</h4>
                       <h4 class="counter mt-2" style="visibility: visible;"><?=$trading_bal;?> <span class="text-dark" style="font-size:12px;">USDT</span></h4>
                       
                     </div>
                   </div>
                  
             </div>
          </div>
       </div>
         <div class="col-6 col-6-sm-screen">
          <div class="card">
             <div class="appcard-body ">
                <div class="approw d-flex align-items-center">
                   <div class="col-1 m-1">
                   <svg fill="#fcfcfc" width="18px" height="18px" viewBox="0 0 24 24" id="down-direction-circle" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                      <g id="SVGRepo_iconCarrier">
                         <circle id="primary" cx="12" cy="12" r="10" style="fill: #825af9;"></circle>
                         <path id="secondary" d="M10,12V8a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1v4h.82a1,1,0,0,1,.76,1.65l-2.82,3.27a1,1,0,0,1-1.52,0L8.42,13.65A1,1,0,0,1,9.18,12Z" style="fill: #825af9E09515;"></path>
                      </g>
                   </svg>
                   </div>
                   <div class="col p-1 m-1">
                   <h4 class="pt-3">Total Profit</h4>
                   <h4 class="counter mt-2" style="visibility: visible;"><?=$tot_profit?> <span class="text-dark" style="font-size:12px;">USDT</span></h4>
                </div>
             </div>
          </div>
       </div>
    </div>
      </div>

<!--      <div class="app">-->

<!--      <div class="col-6 col-6-sm-screen">-->
<!--      <div class="card">-->
<!--         <div class="appcard-body ">-->
<!--            <div class="approw d-flex align-items-center">-->
<!--               <div class="col-1 m-1">-->
<!--                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" width="18px" height="18px" fill="#eee7e7">-->
<!--                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>-->
<!--                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>-->
<!--                        <g id="SVGRepo_iconCarrier">-->
<!--                           <circle style="fill:#825af9;" cx="254" cy="254" r="254"></circle>-->
<!--                           <g>-->
<!--                              <path style="fill:#825af9FFFF;" d="M418.4,158c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.2,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,144.4,416,150.4,418.4,158 L418.4,158z"></path>-->
<!--                              <path style="fill:#825af9FFFF;" d="M418.4,291.6c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,278,416,284,418.4,291.6 L418.4,291.6z"></path>-->
<!--                              <path style="fill:#825af9FFFF;" d="M418.4,425.2c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,411.6,416,417.6,418.4,425.2 L418.4,425.2z"></path>-->
<!--                           </g>-->
<!--                           <path style="fill:#825af9324A5E;" d="M137.2,426c0,0,2.4,8-0.8,10.4c0,0-3.2,0.8-2.8,5.2c0,0,0,5.2-6.8,4.8c0,0-17.6,2-20.4-2 c0,0-2-2.4-0.8-6l20.8-7.6L137.2,426z"></path>-->
<!--                           <g>-->
<!--                              <path style="fill:#825af92B3B4E;" d="M134.4,414c0,0,7.6,6.4,2,15.2c0,0-4,5.6-4,8.4c0,0,0.4,8.8-8.8,6.8c0,0-9.2-6.8-15.6-1.2 c0,0-4.8-0.4-2.4-6.8c0,0,5.2-6.8,8.4-12.8c0,0,2-1.2,0.8-6L134.4,414z"></path>-->
<!--                              <path style="fill:#825af92B3B4E;" d="M155.6,426c0,0-2.4,8,0.8,10.4c0,0,3.2,0.8,2.8,5.2c0,0,0,5.2,6.8,4.8c0,0,17.6,2,20.4-2 c0,0,2-2.4,0.8-6l-20.8-7.6L155.6,426z"></path>-->
<!--                           </g>-->
<!--                           <path style="fill:#825af9324A5E;" d="M158,414c0,0-7.6,6.4-2,15.2c0,0,4,5.6,4,8.4c0,0-0.4,8.8,8.8,6.8c0,0,9.2-6.8,15.6-1.2 c0,0,4.8-0.4,2.4-6.8c0,0-5.2-6.8-8.4-12.8c0,0-2-1.2-0.8-6L158,414z"></path>-->
<!--                           <polygon style="fill:#825af9E6E9EE;" points="127.6,125.2 145.2,194.8 163.2,125.2 "></polygon>-->
<!--                           <polygon style="fill:#825af91543F;" points="150.4,132.8 152.8,125.2 139.6,125.2 142,132.8 "></polygon>-->
<!--                           <polygon style="fill:#825af97058;" points="150.4,132.8 146.4,132.8 142,132.8 133.2,185.6 146.4,194.4 159.6,185.6 "></polygon>-->
<!--                           <path style="fill:#825af9324A5E;" d="M112.8,222.8c-3.2,18-6.8,50.4-0.8,88c0,0,5.6,86.8,0.4,106c0,0,10.4,18,28.4,0 c0,0,0.4-142.8,5.2-148.8v-45.2H112.8z"></path>-->
<!--                           <path style="fill:#825af92B3B4E;" d="M146,222.8v45.6c4.8,6,5.2,148.8,5.2,148.8c18,18,28.4,0,28.4,0c-5.2-19.2,0.4-106,0.4-106 c6-37.6,2.4-70-0.8-88H146V222.8z"></path>-->
<!--                           <polygon style="fill:#825af9CED5E0;" points="160.4,115.6 132,115.6 128,125.2 162.8,125.2 "></polygon>-->
<!--                           <path style="fill:#825af92B3B4E;" d="M129.2,121.6l-31.6,11.6c0,0,19.2,58.4,10.8,97.6c0,0-3.2,20-0.8,35.2c0,0,22,16,30.4,1.2 c0,0,11.2-35.2,9.2-69.6l-10-26.4L129.2,121.6z"></path>-->
<!--                           <g>-->
<!--                              <path style="fill:#825af9324A5E;" d="M132,115.6L116.8,132l5.6,2.4l-4.4,4c0,0,14.4,43.6,29.2,58.8C147.2,197.6,131.2,129.6,132,115.6z"></path>-->
<!--                              <path style="fill:#825af9324A5E;" d="M163.2,121.6l31.6,11.6c0,0-19.2,58.4-10.8,97.6c0,0,3.2,20,0.8,35.2c0,0-22,16-30.4,1.2 c0,0-11.2-35.2-9.2-69.6l10-26.4L163.2,121.6z"></path>-->
<!--                           </g>-->
<!--                           <g>-->
<!--                              <path style="fill:#825af92B3B4E;" d="M160.4,115.6l15.2,16.4l-5.6,2.4l4.4,4c0,0-14.4,43.6-29.2,58.8 C145.2,197.6,161.2,129.6,160.4,115.6z"></path>-->
<!--                              <circle style="fill:#825af92B3B4E;" cx="150.8" cy="200.8" r="3.2"></circle>-->
<!--                           </g>-->
<!--                           <polygon style="fill:#825af97058;" points="165.6,175.2 170.8,166.4 179.2,172.4 "></polygon>-->
<!--                           <rect x="163.226" y="172.418" transform="matrix(-0.9789 0.2042 -0.2042 -0.9789 376.4811 310.3871)" style="fill:#825af92B3B4E;" width="17.999" height="4.4"></rect>-->
<!--                           <path style="fill:#825af99B54C;" d="M196.8,260.8c0.4,3.6,0.4,6,0.4,6c0.8,0.8,3.2,4,3.2,4c4.4,3.6,2,6.4,2,6.4l0.4,2.8 c1.2,1.2,0.4,3.6,0.4,3.6c-2.4,4.4-4,0.8-4,0.8c-2.4,3.2-4-0.8-4-0.8c-3.2,1.2-4-1.6-4-1.6s-5.6,0.8-4.4-11.6c0.4-2.8,0.4-6,0-9.2 h10V260.8z"></path>-->
<!--                           <path style="fill:#825af9;" d="M192,273.2c0-0.4,0.4-2.4,0.4-2.4c-0.8,2.4,2,4,2,4c-0.4,0-0.4-1.6-0.4-1.6c0.4,2,4,3.6,4,3.6 c0.4-1.2,1.6-2.4,1.6-2.4c-0.8,1.2-1.2,2.4-1.2,2.4c0.8,0,1.2,0.8,1.2,0.8c-0.8-0.8-1.2,0-1.2,0c1.6,0.4,1.2,2,1.2,2 c0-1.6-1.2-1.6-1.2-1.6c0.8,0.8,0.4,1.6,0.4,1.6c0-1.2-1.6-1.6-1.6-1.6c0.8-1.2,0-0.8,0-0.8c-1.6-2-2,0.4-2.4,0.8h-0.4 c0.8-2,0-2.4,0-2.4c-1.6-1.2-1.6,0.8-1.6,0.8c0,3.2-2.4,4.8-2.4,4.8h-0.8c1.6-0.8,2-2.4,2-2.4c1.2-3.2-0.4-3.6-0.4-3.6 c-2.8-0.4-2,2-2,2c-1.2,0.4-2.4,0-2.4,0c0.4,0,1.2-0.8,1.2-0.8c1.2-0.8-0.4-2.8-0.4-2.8c0.8,0.8,4,0.8,4,0.8c1.6,0,0.4-1.6,0.4-1.6 l-0.8,0.4c0-0.4-0.8-2.4-0.8-2.4C191.2,271.2,192,272.8,192,273.2z"></path>-->
<!--                           <g>-->
<!--                              <path style="fill:#825af99B54C;" d="M202.8,278c0,0-0.4,0.4-1.6,2.4c0,0-0.4,0.4-0.4,0.8c-0.4,0.8-0.8,0.8-1.6,0.8 c-0.8-0.4-2-0.4-2.8-0.4c0,0-0.8,0-1.6,0c-0.4,0-0.8-0.4-0.8-0.8c0.4-0.8,0.8-2,2.4-2c0,0,1.6-0.4,2.4,0c0,0-2.8-0.8-4,0.8 c0,0-1.6,1.6-0.4,2.4c0,0,4,0,4.4,0.4c0,0,1.6,0.8,2.4-0.4c0,0,0.4-2,2-1.6c0,0-0.4-0.4-1.2-0.4C201.6,280,202,278.8,202.8,278z"></path>-->
<!--                              <path style="fill:#825af99B54C;" d="M199.2,282c-0.4,0.8,0.4,2.8,0.4,2.8c-0.4-0.4-0.4-0.8-0.4-0.8c0,0.4-0.4,0.4-0.4,0.8 c0.4-1.2,0-2.8,0-2.8H199.2z"></path>-->
<!--                              <path style="fill:#825af99B54C;" d="M195.2,283.6C195.2,283.6,195.2,283.2,195.2,283.6c-0.4-0.4-0.4-0.4-0.4-0.4c0.4-0.8,0.4-2,0.4-2 h0.4C196,282.4,195.2,283.6,195.2,283.6z"></path>-->
<!--                           </g>-->
<!--                           <rect x="185.2" y="254.8" style="fill:#825af9FFFF;" width="13.2" height="9.2"></rect>-->
<!--                           <path style="fill:#825af99B54C;" d="M96,260.8c-0.4,3.6-0.4,6-0.4,6c-0.8,0.8-3.2,4-3.2,4c-4.4,3.6-2,6.4-2,6.4L90,280 c-1.2,1.2-0.4,3.6-0.4,3.6c2.4,4.4,4,0.8,4,0.8c2.4,3.2,4-0.8,4-0.8c3.2,1.2,4-1.6,4-1.6s5.6,0.8,4.4-11.6c-0.4-2.8-0.4-6,0-9.2H96 V260.8z"></path>-->
<!--                           <path style="fill:#825af9;" d="M100.8,273.2c0-0.4-0.4-2.4-0.4-2.4c0.8,2.4-2,4-2,4c0.4,0,0.4-1.6,0.4-1.6c-0.4,2-4,3.6-4,3.6 c-0.4-1.2-1.6-2.4-1.6-2.4c0.8,1.2,1.2,2.4,1.2,2.4c-0.8,0-1.2,0.8-1.2,0.8c0.8-0.8,1.2,0,1.2,0c-1.6,0.4-1.2,2-1.2,2 c0-1.6,1.2-1.6,1.2-1.6c-0.8,0.8-0.4,1.6-0.4,1.6c0-1.2,1.6-1.6,1.6-1.6c-0.8-1.2,0-0.8,0-0.8c1.6-2,2,0.4,2.4,0.8h0.4 c-0.8-2,0-2.4,0-2.4c1.6-1.2,1.6,0.8,1.6,0.8c0,3.2,2.4,4.8,2.4,4.8h0.8c-1.6-0.8-2-2.4-2-2.4c-1.2-3.2,0.4-3.6,0.4-3.6 c2.8-0.4,2,2,2,2c1.2,0.4,2.4,0,2.4,0c-0.4,0-1.2-0.8-1.2-0.8c-1.2-0.8,0.4-2.8,0.4-2.8c-0.8,0.8-4,0.8-4,0.8 c-1.6,0-0.4-1.6-0.4-1.6l0.8,0.4c0-0.4,0.8-2.4,0.8-2.4C101.6,271.2,100.8,272.8,100.8,273.2z"></path>-->
<!--                           <g>-->
<!--                              <path style="fill:#825af99B54C;" d="M90.4,278c0,0,0.4,0.4,1.6,2.4c0,0,0.4,0.4,0.4,0.8c0.4,0.8,0.8,0.8,1.6,0.8c0.8-0.4,2-0.4,2.8-0.4 c0,0,0.8,0,1.6,0c0.4,0,0.8-0.4,0.8-0.8c-0.4-0.8-0.8-2-2.4-2c0,0-1.6-0.4-2.4,0c0,0,2.8-0.8,4,0.8c0,0,1.6,1.6,0.4,2.4 c0,0-4,0-4.4,0.4c0,0-1.6,0.8-2.4-0.4c0,0-0.4-2-2-1.6c0,0,0.4-0.4,1.2-0.4C91.2,280,90.8,278.8,90.4,278z"></path>-->
<!--                              <path style="fill:#825af99B54C;" d="M93.6,282c0.4,0.8-0.4,2.8-0.4,2.8c0.4-0.4,0.4-0.8,0.4-0.8c0,0.4,0.4,0.4,0.4,0.8 c-0.4-1.2,0-2.8,0-2.8H93.6z"></path>-->
<!--                              <path style="fill:#825af99B54C;" d="M97.6,283.6C97.6,283.6,97.6,283.2,97.6,283.6c0.4-0.4,0.4-0.4,0.4-0.4c-0.4-0.8-0.4-2-0.4-2h-0.4 C96.8,282.4,97.6,283.6,97.6,283.6z"></path>-->
<!--                           </g>-->
<!--                           <rect x="94.4" y="254.8" style="fill:#825af9FFFF;" width="13.2" height="9.2"></rect>-->
<!--                           <path style="fill:#825af92B3B4E;" d="M201.2,260h-18.4c0,0-0.4-47.2,2-56.4c0,0,0.8-9.2-1.6-16.8c3.2-28.4,11.6-53.6,11.6-54 C194.8,133.2,204,156.4,201.2,260z"></path>-->
<!--                           <path style="fill:#825af9324A5E;" d="M91.2,260h18.4c0,0,0.4-47.2-2-56.4c0,0-0.8-9.2,1.6-16.8c-3.2-28.4-11.6-53.6-11.6-54 C97.6,133.2,88.4,156.4,91.2,260z"></path>-->
<!--                           <ellipse style="fill:#825af99B54C;" cx="146.4" cy="112" rx="12" ry="13.2"></ellipse>-->
<!--                           <g>-->
<!--                              <path style="fill:#825af9FFFF;" d="M158,109.6c0,0,2.4,11.6-11.6,15.6c0,0,8,1.6,11.6,11.6C157.6,136.8,167.2,122,158,109.6z"></path>-->
<!--                              <path style="fill:#825af9FFFF;" d="M134.4,109.6c0,0-2.4,11.6,11.6,15.6c0,0-8,1.6-11.6,11.6C134.8,136.8,125.6,122,134.4,109.6z"></path>-->
<!--                           </g>-->
<!--                           <path style="fill:#825af9;" d="M163.2,100c-1.6,4.8-2.4,8-2.4,8.4l0,0c-4,5.2-8.8,8.8-14.4,8.8c-5.2,0-9.6-3.2-13.2-8 c-8-10-2.4-28-2.4-28c4,4.4,16.8,4.8,16.8,4.8c-5.2-0.8-6.4-4.8-6.4-5.6c1.2,2.8,13.6,4.4,13.6,4.4C167.6,87.2,163.2,100,163.2,100z "></path>-->
<!--                           <path style="fill:#825af9324A5E;" d="M139.2,62.4c0,0,17.6-7.2,26.8,8.8c9.6,17.2-2.4,35.6-4.8,37.2c0,0,0.8-2.8,2.4-8.8 c0,0,4.4-12.8-8.8-14.8c0,0-12.4-1.6-13.6-4.4c0,0,0.8,4.4,6.4,5.6c0,0-12.8-0.4-16.8-4.8c0,0-5.6,18,2.4,28c0,0-14-11.2-12.4-28.4 C121.2,81.2,120.4,57.6,139.2,62.4z"></path>-->
<!--                           <path style="fill:#825af97058;" d="M271.2,104.4H300c2.8,0,5.6-2.4,5.6-5.6s-2.4-5.6-5.6-5.6h-34c-2.8,0-5.6,2.4-5.6,5.6v146.4h-28.8 c-2.8,0-5.6,2.4-5.6,5.6c0,2.8,2.4,5.6,5.6,5.6h28.8v146.4c0,2.8,2.4,5.6,5.6,5.6h30c2.8,0,5.6-2.4,5.6-5.6c0-2.8-2.4-5.6-5.6-5.6 h-24.8V104.4z"></path>-->
<!--                        </g>-->
<!--                     </svg>-->
                     
<!--                    </div>-->
            <!--   <div class="col p-1 m-1 ">-->
            <!--      <h4 class="pt-3">My Team</h4>-->
            <!--         <h4 class="counter mt-2" style="visibility: visible;">0</h4>-->
            <!--</div>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</div>-->
<!-- <div class="col-6 col-6-sm-screen">-->
<!--      <div class="card">-->
<!--         <div class="appcard-body ">-->
<!--            <div class="approw d-flex align-items-center">-->
<!--               <div class="col-1 m-1">-->
<!--                    <svg fill="#825af9" width="18px" height="18px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#825af9">-->
<!--                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>-->
<!--                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>-->
<!--                        <g id="SVGRepo_iconCarrier">-->
<!--                           <path d="M1587.854 1133.986c-109.666-42.353-223.51-72.057-339.276-91.257h-5.195c135.53-91.369 224.866-246.324 224.866-421.609v-24.847c-28.235 18.07-64.377 41.788-115.087 57.713-15.925 202.165-186.466 362.428-393.148 362.428-199.793 0-365.93-148.97-390.777-342.212-3.388-16.94-4.517-34.898-4.517-53.082v-60.988c1.355-.113 2.258-.452 3.614-.678 10.503-1.807 19.877-4.179 29.364-6.663 8.132-2.033 16.15-4.18 23.38-6.664 7.905-2.71 15.472-5.421 22.587-8.583 8.132-3.502 15.586-7.116 23.04-10.956 5.083-2.823 10.391-5.308 15.135-8.132a662.834 662.834 0 0 0 20.668-12.762c3.388-2.259 7.34-4.518 10.503-6.55 4.857-3.163 9.6-5.986 14.344-8.923 34.447-21.572 67.313-38.4 128.527-38.513h.226c53.195 0 84.932 12.085 114.635 29.026 9.826 5.647 19.539 11.972 29.817 18.522 35.124 22.815 73.976 47.549 133.722 58.956.678.113 1.13.452 1.807.564 20.33 3.728 43.143 5.873 69.007 5.873.452 0 .79-.113 1.242-.113 103.342-.225 157.214-34.785 204.537-65.392l55.793-34.448v-.112l.564-.452-3.952-21.346-2.372-15.473c-5.308-34.447-15.247-67.426-27.22-99.501-24.733-66.748-62.568-127.963-114.521-179.803-26.993-27.218-57.6-50.936-89.224-70.136-80.188-50.71-173.93-77.93-269.93-77.93-220.235 0-408.846 141.177-478.87 338.824-19.2 53.082-29.365 109.553-29.365 169.412V621.12c0 19.2 1.13 38.4 3.502 56.47C472.108 829.949 557.152 960.735 678 1042.166h-5.083c-111.812 18.41-222.042 46.983-328.433 87.19-140.612 53.309-231.53 183.417-231.53 331.709V1669.1l26.768 16.49c172.235 106.955 454.475 234.353 820.292 234.353 201.938 0 508.235-40.546 820.404-234.353l26.654-16.49v-208.037c0-144.904-88.094-276.255-219.218-327.078" fill-rule="evenodd"></path>-->
<!--                        </g>-->
<!--                     </svg>-->
<!--                    </div>-->
            <!--   <div class="col p-1 m-1 ">-->
                 
            <!--         <?php $direct=$this->db->where('ref_id',$this->session->userdata('micusername'))->count_all_results('user_role')+0; ?>-->
            <!--         <h4 class="pt-3">DIRECT REFERAL</h4>-->
            <!--         <h4 class="counter mt-2" style="visibility: visible;">0</h4>-->
            <!--</div>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</div>-->
         
<!--      </div>-->
    
   </div>
   
 
   <div class="row">
       <div class="col-lg-12" style="overflow:auto;">
           
           
           
            <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
  {
  "symbols": [
    [
      "CRYPTOCAP:USDT|1M"
    ]
  ],
  "chartOnly": false,
  "width": 1200,
  "height": 500,
  "locale": "in",
  "colorTheme": "light",
  "autosize": false,
  "showVolume": false,
  "showMA": false,
  "hideDateRanges": false,
  "hideMarketStatus": false,
  "hideSymbolLogo": false,
  "scalePosition": "right",
  "scaleMode": "Normal",
  "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
  "fontSize": "10",
  "noTimeScale": false,
  "valuesTracking": "1",
  "changeMode": "price-and-percent",
  "chartType": "area",
  "maLineColor": "#2962FF",
  "maLineWidth": 1,
  "maLength": 9,
  "lineWidth": 2,
  "lineType": 0,
  "dateRanges": [
    "1d|1",
    "1m|30",
    "3m|60",
    "12m|1D",
    "60m|1W",
    "all|1M"
  ]
}
</script>
</div>
<!-- TradingView Widget END -->
           
           
       </div>
       
   </div>

 
</div>

<?php $roi_divide = $this->db->select('reward')->where('type','eroi divide')->get('master')->row()->reward+0; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $( "#packk" ).submit(function( event ) {
     $("#activate_btn").prop("disabled", true)
   });
   $( "#form2" ).submit(function( event ) {
     $("#bbb").prop("disabled", true)
   });
     $( "#form1" ).submit(function( event ) {
     $("#bbbb").prop("disabled", true)
   });
</script>
<script>
   var timer = <?php echo json_encode($timer); ?>;
   //console.log(timer);
    $.each(timer, function(key, value) {
        //alert(index);
        if(value.end_time !== null)
        {
             var countDownDate = new Date(value.end_time).getTime();
             // Update the count down every 1 second
             var x = setInterval(function() {
                 var now = new Date().getTime();
                 // Find the distance between now an the count down date
                 var distance = countDownDate - now;
                 // Time calculations for days, hours, minutes and seconds
                 var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                 var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                 var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                 var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                 // Output the result in an element with id="counter mt-2"11
                 //alert(circumference);
                 
                 var per = <?php echo $roi_divide;?>;
                 
                 var amount = (value.amount*value.percentage)/100;
                 
                 var finamount = (amount*per)/100;
                 
                 var total_sec = (hours*3600)+(minutes*60) + seconds;
                 //alert(total_sec);
                 
                 if( total_sec > 0 )
                 {
                     secs = total_sec;
                 }else{
                     secs = 1;
                 }
                 
                 var tt = finamount/secs;
                 //alert(total_sec);
                 
                 document.getElementById("vall"+value.id).innerHTML = tt+" TRX";
                 document.getElementById("mininval"+value.id).innerHTML = tt+" TRX";
                 document.getElementById("counter mt-2"+value.id).innerHTML =  hours + "h " +
                 minutes + "m " + seconds + "s ";
                 document.getElementById("counter mt-2r"+value.id).innerHTML =  hours + "h " +
                 minutes + "m " + seconds + "s ";
                
                 if (distance < 0) {
                     clearInterval(x);
                     document.getElementById("vall"+value.id).innerHTML = "0.00000000000000 TRX";
                     document.getElementById("mininval"+value.id).innerHTML = "0.00000000000000 TRX";
                     document.getElementById("counter mt-2"+value.id).innerHTML = "COMPLETED";
                     document.getElementById("counter mt-2r"+value.id).innerHTML = "COMPLETED";
                     //alert(value.up_id);
                     var stop = 'stop';
                     $.post('<?=BASEURL?>user/stop_timer', {
                         'up_id': value.up_id, 'stop': stop
                     })
                     .done(function(res) {
                         //alert(res);
                         if (res != 'error') {
                            	location.reload();
                         } else {
                              location.reload();
                         }
                     });
                     //location.reload();
                 }
             }, 1000);
        }else{
            document.getElementById("counter mt-2"+value.id).innerHTML = 0 + "h " +
             0 + "m " + 0 + "s ";
        }
    });
   // });
</script>
<script>
    if ( window.history.replaceState) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!--Success Popup-->
<!--// <script>-->
<!--//     $('.panel-avtivation-success').click(function(){  -->
<!--//     swal({-->
<!--// 			title: 'Congratulations &#128525;',-->
<!--// 			text: 'Your investment panel has been activated Successfully !!',-->
<!--// 			type: 'success'-->
<!--// 		});-->
<!--// });-->
<!--// </script>-->

<!--// <!--Error Popup-->
<!--// <script>-->
<!--//     $('.panel-avtivation-failed').click(function(){  -->
<!--//     swal({-->
<!--// 			title: 'Insufficient Balance',-->
<!--// 			text: 'Kindly deposit and try again !',-->
<!--// 			type: 'error'-->
<!--// 		});-->
<!--// });-->
<!--// </script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.1.1/sweetalert2.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<?php include 'footer.php';?>




<script>
  $('#regist').submit(function(event) {
    event.preventDefault();

    var user_id = $("input[name='user_id']").val();
    $.ajax({
      url: '<?php echo base_url('user/user_activate'); ?>',
      type: 'POST',
      data: { user_id: user_id },
      dataType: 'json',
      success: function(response) {
        if (response.status === 'success') {
          Swal.fire({
            title: "Success!",
            text: response.message,
            icon: "success",
          }).then(function() {
            location.reload();
          });
        } else if (response.status === 'return') {
          // Redirect logic here
          window.location.href = 'user/deposit';
        } else {
          Swal.fire({
            title: "Error!",
            html: response.message.replace(/<\/?span[^>]*>/g, ''),
            icon: "error",
          }).then(function() {
            location.reload();
          });
        }
      },
      error: function(xhr, status, error) {
        Swal.fire({
          title: "Error!",
          text: "An error occurred while processing the request.",
          icon: "error",
        }).then(function() {
          location.reload();
        });
      }
    });
  });
</script>


 <!--<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>-->
 <!--           <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>-->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>




















