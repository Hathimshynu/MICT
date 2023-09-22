<?php include 'header.php';?>
<style>
   /*.background {*/
   /*background-image: url('<?=BASEURL?>assets/images/bitcoin-gif.gif');*/
   /*background-size: cover;*/
   /*position: absolute;*/
   /*top: 0;*/
   /*left: 0;*/
   /*height: 100%;*/
   /*width: 100%;*/
   /*}*/
   .card.mining {
   background-size: cover;
   background-color: black;
   }
   img.mining {
   width: 100%;
   }
   .card-body.mining.text-center {
   padding: 0;
   }

    img.power-button {
    width: 100px;
}
   }
   @media screen and (max-width: 767px){
   img.mining {
   width: 100%!important;
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
   font-size: 11px!important;
   padding-top: 1rem !important;
   }
   h4.counter {
   font-size: 10px!important;
   }
   }
</style>
<div class="bd-example">
   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="row">
               <?php  $timer = $this->db->where('status','Active')->where('user_id',$this->session->userdata('micusername'))->get('user_package')->result_array(); ?>
               <div class="col-lg-6">
                  <div class="card mining">
                     <div class="card-body mining text-center">
                        <div class="row">
                           <div class="gif-container">
                              <img src="<?=BASEURL?>assets/images/bitcoin-gif.gif" class="mining" alt="Bincoin Mining" width="200px">
                           </div>
                           <div class="timer">
                              <div class="time">
                                 <img src="<?=BASEURL?>assets/images/power-button.png" class="power-button" alt="Bincoin Mining" width="200px">
                              </div>
                           </div>
                           <div class="timer">
                              <div class="time">
                                 <span class="hours">00</span>:<span class="minutes">00</span>:<span class="seconds">00</span>
                              </div>
                           </div>
                           <span class="trxmining">0.00000000000000 TRX</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="card">
                     <div class="card-body mining text-center">
                        <div class="gif-container">
                           <img src="<?=BASEURL?>assets/images/new.gif" class="mining" alt="Bincoin Mining" width="200px">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="row">
               <?php  $timer = $this->db->where('status','Active')->where('user_id',$this->session->userdata('micusername'))->get('user_package')->result_array(); ?>
               <div class="col-lg-6">
                  <div class="card mining">
                     <div class="card-body mining text-center">
                        <div class="row">
                           <div class="gif-container">
                              <img src="<?=BASEURL?>assets/images/bitcoin-gif.gif" class="mining" alt="Bincoin Mining" width="200px">
                           </div>
                           <div class="timer">
                              <div class="time">
                                 <img src="<?=BASEURL?>assets/images/power-button.png" class="power-button" alt="Bincoin Mining" width="200px">
                              </div>
                           </div>
                           <div class="timer">
                              <div class="time">
                                 <span class="hours">00</span>:<span class="minutes">00</span>:<span class="seconds">00</span>
                              </div>
                           </div>
                           <span class="trxmining">0.00000000000000 TRX</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="card">
                     <div class="card-body mining text-center">
                        <div class="gif-container">
                           <img src="<?=BASEURL?>assets/images/new.gif" class="mining" alt="Bincoin Mining" width="200px">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="row">
               <?php  $timer = $this->db->where('status','Active')->where('user_id',$this->session->userdata('micusername'))->get('user_package')->result_array(); ?>
               <div class="col-lg-6">
                  <div class="card mining">
                     <div class="card-body mining text-center">
                        <div class="row">
                           <div class="gif-container">
                              <img src="<?=BASEURL?>assets/images/bitcoin-gif.gif" class="mining" alt="Bincoin Mining" width="200px">
                           </div>
                           <div class="timer">
                              <div class="time">
                                 <img src="<?=BASEURL?>assets/images/power-button.png" class="power-button" alt="Bincoin Mining" width="200px">
                              </div>
                           </div>
                           <div class="timer">
                              <div class="time">
                                 <span class="hours">00</span>:<span class="minutes">00</span>:<span class="seconds">00</span>
                              </div>
                           </div>
                           <span class="trxmining">0.00000000000000 TRX</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="card">
                     <div class="card-body mining text-center">
                        <div class="gif-container">
                           <img src="<?=BASEURL?>assets/images/new.gif" class="mining" alt="Bincoin Mining" width="200px">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
      </button>
   </div>
</div>
<div class="row desktop">
   <div class="col-lg-4">
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
               <h4 class="pt-3">Total earnings</h4>
               <h4 class="counter" style="visibility: visible;">0</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg fill="#fcfcfc" width="30px" height="30px" viewBox="0 0 24 24" id="down-direction-circle" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <circle id="primary" cx="12" cy="12" r="10" style="fill: #e09515;"></circle>
                     <path id="secondary" d="M10,12V8a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1v4h.82a1,1,0,0,1,.76,1.65l-2.82,3.27a1,1,0,0,1-1.52,0L8.42,13.65A1,1,0,0,1,9.18,12Z" style="fill: #e09515E09515;"></path>
                  </g>
               </svg>
               <h4 class="pt-3">Total Withdraw</h4>
               <h4 class="counter" style="visibility: visible;">0</h4>
            </div>
         </div>
      </div>
   </div>
   <?php $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('user_id',$this->session->userdata('micusername'))->get('e_wallet')->row()->balance+0;?>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#E09515" stroke="#E09515">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <g>
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M12 11a5 5 0 0 1 5 5v6H7v-6a5 5 0 0 1 5-5zm-6.712 3.006a6.983 6.983 0 0 0-.28 1.65L5 16v6H2v-4.5a3.5 3.5 0 0 1 3.119-3.48l.17-.014zm13.424 0A3.501 3.501 0 0 1 22 17.5V22h-3v-6c0-.693-.1-1.362-.288-1.994zM5.5 8a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"></path>
                     </g>
                  </g>
               </svg>
               <h4 class="pt-3">E-wallet</h4>
               <h4 class="counter" style="visibility: visible;"><?=$balance?> TRX</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" width="30px" height="30px" fill="#eee7e7">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <circle style="fill:#E09515;" cx="254" cy="254" r="254"></circle>
                     <g>
                        <path style="fill:#E09515FFFF;" d="M418.4,158c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.2,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,144.4,416,150.4,418.4,158 L418.4,158z"></path>
                        <path style="fill:#E09515FFFF;" d="M418.4,291.6c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,278,416,284,418.4,291.6 L418.4,291.6z"></path>
                        <path style="fill:#E09515FFFF;" d="M418.4,425.2c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,411.6,416,417.6,418.4,425.2 L418.4,425.2z"></path>
                     </g>
                     <path style="fill:#E09515324A5E;" d="M137.2,426c0,0,2.4,8-0.8,10.4c0,0-3.2,0.8-2.8,5.2c0,0,0,5.2-6.8,4.8c0,0-17.6,2-20.4-2 c0,0-2-2.4-0.8-6l20.8-7.6L137.2,426z"></path>
                     <g>
                        <path style="fill:#E095152B3B4E;" d="M134.4,414c0,0,7.6,6.4,2,15.2c0,0-4,5.6-4,8.4c0,0,0.4,8.8-8.8,6.8c0,0-9.2-6.8-15.6-1.2 c0,0-4.8-0.4-2.4-6.8c0,0,5.2-6.8,8.4-12.8c0,0,2-1.2,0.8-6L134.4,414z"></path>
                        <path style="fill:#E095152B3B4E;" d="M155.6,426c0,0-2.4,8,0.8,10.4c0,0,3.2,0.8,2.8,5.2c0,0,0,5.2,6.8,4.8c0,0,17.6,2,20.4-2 c0,0,2-2.4,0.8-6l-20.8-7.6L155.6,426z"></path>
                     </g>
                     <path style="fill:#E09515324A5E;" d="M158,414c0,0-7.6,6.4-2,15.2c0,0,4,5.6,4,8.4c0,0-0.4,8.8,8.8,6.8c0,0,9.2-6.8,15.6-1.2 c0,0,4.8-0.4,2.4-6.8c0,0-5.2-6.8-8.4-12.8c0,0-2-1.2-0.8-6L158,414z"></path>
                     <polygon style="fill:#E09515E6E9EE;" points="127.6,125.2 145.2,194.8 163.2,125.2 "></polygon>
                     <polygon style="fill:#E095151543F;" points="150.4,132.8 152.8,125.2 139.6,125.2 142,132.8 "></polygon>
                     <polygon style="fill:#E095157058;" points="150.4,132.8 146.4,132.8 142,132.8 133.2,185.6 146.4,194.4 159.6,185.6 "></polygon>
                     <path style="fill:#E09515324A5E;" d="M112.8,222.8c-3.2,18-6.8,50.4-0.8,88c0,0,5.6,86.8,0.4,106c0,0,10.4,18,28.4,0 c0,0,0.4-142.8,5.2-148.8v-45.2H112.8z"></path>
                     <path style="fill:#E095152B3B4E;" d="M146,222.8v45.6c4.8,6,5.2,148.8,5.2,148.8c18,18,28.4,0,28.4,0c-5.2-19.2,0.4-106,0.4-106 c6-37.6,2.4-70-0.8-88H146V222.8z"></path>
                     <polygon style="fill:#E09515CED5E0;" points="160.4,115.6 132,115.6 128,125.2 162.8,125.2 "></polygon>
                     <path style="fill:#E095152B3B4E;" d="M129.2,121.6l-31.6,11.6c0,0,19.2,58.4,10.8,97.6c0,0-3.2,20-0.8,35.2c0,0,22,16,30.4,1.2 c0,0,11.2-35.2,9.2-69.6l-10-26.4L129.2,121.6z"></path>
                     <g>
                        <path style="fill:#E09515324A5E;" d="M132,115.6L116.8,132l5.6,2.4l-4.4,4c0,0,14.4,43.6,29.2,58.8C147.2,197.6,131.2,129.6,132,115.6z"></path>
                        <path style="fill:#E09515324A5E;" d="M163.2,121.6l31.6,11.6c0,0-19.2,58.4-10.8,97.6c0,0,3.2,20,0.8,35.2c0,0-22,16-30.4,1.2 c0,0-11.2-35.2-9.2-69.6l10-26.4L163.2,121.6z"></path>
                     </g>
                     <g>
                        <path style="fill:#E095152B3B4E;" d="M160.4,115.6l15.2,16.4l-5.6,2.4l4.4,4c0,0-14.4,43.6-29.2,58.8 C145.2,197.6,161.2,129.6,160.4,115.6z"></path>
                        <circle style="fill:#E095152B3B4E;" cx="150.8" cy="200.8" r="3.2"></circle>
                     </g>
                     <polygon style="fill:#E095157058;" points="165.6,175.2 170.8,166.4 179.2,172.4 "></polygon>
                     <rect x="163.226" y="172.418" transform="matrix(-0.9789 0.2042 -0.2042 -0.9789 376.4811 310.3871)" style="fill:#E095152B3B4E;" width="17.999" height="4.4"></rect>
                     <path style="fill:#E095159B54C;" d="M196.8,260.8c0.4,3.6,0.4,6,0.4,6c0.8,0.8,3.2,4,3.2,4c4.4,3.6,2,6.4,2,6.4l0.4,2.8 c1.2,1.2,0.4,3.6,0.4,3.6c-2.4,4.4-4,0.8-4,0.8c-2.4,3.2-4-0.8-4-0.8c-3.2,1.2-4-1.6-4-1.6s-5.6,0.8-4.4-11.6c0.4-2.8,0.4-6,0-9.2 h10V260.8z"></path>
                     <path style="fill:#E09515;" d="M192,273.2c0-0.4,0.4-2.4,0.4-2.4c-0.8,2.4,2,4,2,4c-0.4,0-0.4-1.6-0.4-1.6c0.4,2,4,3.6,4,3.6 c0.4-1.2,1.6-2.4,1.6-2.4c-0.8,1.2-1.2,2.4-1.2,2.4c0.8,0,1.2,0.8,1.2,0.8c-0.8-0.8-1.2,0-1.2,0c1.6,0.4,1.2,2,1.2,2 c0-1.6-1.2-1.6-1.2-1.6c0.8,0.8,0.4,1.6,0.4,1.6c0-1.2-1.6-1.6-1.6-1.6c0.8-1.2,0-0.8,0-0.8c-1.6-2-2,0.4-2.4,0.8h-0.4 c0.8-2,0-2.4,0-2.4c-1.6-1.2-1.6,0.8-1.6,0.8c0,3.2-2.4,4.8-2.4,4.8h-0.8c1.6-0.8,2-2.4,2-2.4c1.2-3.2-0.4-3.6-0.4-3.6 c-2.8-0.4-2,2-2,2c-1.2,0.4-2.4,0-2.4,0c0.4,0,1.2-0.8,1.2-0.8c1.2-0.8-0.4-2.8-0.4-2.8c0.8,0.8,4,0.8,4,0.8c1.6,0,0.4-1.6,0.4-1.6 l-0.8,0.4c0-0.4-0.8-2.4-0.8-2.4C191.2,271.2,192,272.8,192,273.2z"></path>
                     <g>
                        <path style="fill:#E095159B54C;" d="M202.8,278c0,0-0.4,0.4-1.6,2.4c0,0-0.4,0.4-0.4,0.8c-0.4,0.8-0.8,0.8-1.6,0.8 c-0.8-0.4-2-0.4-2.8-0.4c0,0-0.8,0-1.6,0c-0.4,0-0.8-0.4-0.8-0.8c0.4-0.8,0.8-2,2.4-2c0,0,1.6-0.4,2.4,0c0,0-2.8-0.8-4,0.8 c0,0-1.6,1.6-0.4,2.4c0,0,4,0,4.4,0.4c0,0,1.6,0.8,2.4-0.4c0,0,0.4-2,2-1.6c0,0-0.4-0.4-1.2-0.4C201.6,280,202,278.8,202.8,278z"></path>
                        <path style="fill:#E095159B54C;" d="M199.2,282c-0.4,0.8,0.4,2.8,0.4,2.8c-0.4-0.4-0.4-0.8-0.4-0.8c0,0.4-0.4,0.4-0.4,0.8 c0.4-1.2,0-2.8,0-2.8H199.2z"></path>
                        <path style="fill:#E095159B54C;" d="M195.2,283.6C195.2,283.6,195.2,283.2,195.2,283.6c-0.4-0.4-0.4-0.4-0.4-0.4c0.4-0.8,0.4-2,0.4-2 h0.4C196,282.4,195.2,283.6,195.2,283.6z"></path>
                     </g>
                     <rect x="185.2" y="254.8" style="fill:#E09515FFFF;" width="13.2" height="9.2"></rect>
                     <path style="fill:#E095159B54C;" d="M96,260.8c-0.4,3.6-0.4,6-0.4,6c-0.8,0.8-3.2,4-3.2,4c-4.4,3.6-2,6.4-2,6.4L90,280 c-1.2,1.2-0.4,3.6-0.4,3.6c2.4,4.4,4,0.8,4,0.8c2.4,3.2,4-0.8,4-0.8c3.2,1.2,4-1.6,4-1.6s5.6,0.8,4.4-11.6c-0.4-2.8-0.4-6,0-9.2H96 V260.8z"></path>
                     <path style="fill:#E09515;" d="M100.8,273.2c0-0.4-0.4-2.4-0.4-2.4c0.8,2.4-2,4-2,4c0.4,0,0.4-1.6,0.4-1.6c-0.4,2-4,3.6-4,3.6 c-0.4-1.2-1.6-2.4-1.6-2.4c0.8,1.2,1.2,2.4,1.2,2.4c-0.8,0-1.2,0.8-1.2,0.8c0.8-0.8,1.2,0,1.2,0c-1.6,0.4-1.2,2-1.2,2 c0-1.6,1.2-1.6,1.2-1.6c-0.8,0.8-0.4,1.6-0.4,1.6c0-1.2,1.6-1.6,1.6-1.6c-0.8-1.2,0-0.8,0-0.8c1.6-2,2,0.4,2.4,0.8h0.4 c-0.8-2,0-2.4,0-2.4c1.6-1.2,1.6,0.8,1.6,0.8c0,3.2,2.4,4.8,2.4,4.8h0.8c-1.6-0.8-2-2.4-2-2.4c-1.2-3.2,0.4-3.6,0.4-3.6 c2.8-0.4,2,2,2,2c1.2,0.4,2.4,0,2.4,0c-0.4,0-1.2-0.8-1.2-0.8c-1.2-0.8,0.4-2.8,0.4-2.8c-0.8,0.8-4,0.8-4,0.8 c-1.6,0-0.4-1.6-0.4-1.6l0.8,0.4c0-0.4,0.8-2.4,0.8-2.4C101.6,271.2,100.8,272.8,100.8,273.2z"></path>
                     <g>
                        <path style="fill:#E095159B54C;" d="M90.4,278c0,0,0.4,0.4,1.6,2.4c0,0,0.4,0.4,0.4,0.8c0.4,0.8,0.8,0.8,1.6,0.8c0.8-0.4,2-0.4,2.8-0.4 c0,0,0.8,0,1.6,0c0.4,0,0.8-0.4,0.8-0.8c-0.4-0.8-0.8-2-2.4-2c0,0-1.6-0.4-2.4,0c0,0,2.8-0.8,4,0.8c0,0,1.6,1.6,0.4,2.4 c0,0-4,0-4.4,0.4c0,0-1.6,0.8-2.4-0.4c0,0-0.4-2-2-1.6c0,0,0.4-0.4,1.2-0.4C91.2,280,90.8,278.8,90.4,278z"></path>
                        <path style="fill:#E095159B54C;" d="M93.6,282c0.4,0.8-0.4,2.8-0.4,2.8c0.4-0.4,0.4-0.8,0.4-0.8c0,0.4,0.4,0.4,0.4,0.8 c-0.4-1.2,0-2.8,0-2.8H93.6z"></path>
                        <path style="fill:#E095159B54C;" d="M97.6,283.6C97.6,283.6,97.6,283.2,97.6,283.6c0.4-0.4,0.4-0.4,0.4-0.4c-0.4-0.8-0.4-2-0.4-2h-0.4 C96.8,282.4,97.6,283.6,97.6,283.6z"></path>
                     </g>
                     <rect x="94.4" y="254.8" style="fill:#E09515FFFF;" width="13.2" height="9.2"></rect>
                     <path style="fill:#E095152B3B4E;" d="M201.2,260h-18.4c0,0-0.4-47.2,2-56.4c0,0,0.8-9.2-1.6-16.8c3.2-28.4,11.6-53.6,11.6-54 C194.8,133.2,204,156.4,201.2,260z"></path>
                     <path style="fill:#E09515324A5E;" d="M91.2,260h18.4c0,0,0.4-47.2-2-56.4c0,0-0.8-9.2,1.6-16.8c-3.2-28.4-11.6-53.6-11.6-54 C97.6,133.2,88.4,156.4,91.2,260z"></path>
                     <ellipse style="fill:#E095159B54C;" cx="146.4" cy="112" rx="12" ry="13.2"></ellipse>
                     <g>
                        <path style="fill:#E09515FFFF;" d="M158,109.6c0,0,2.4,11.6-11.6,15.6c0,0,8,1.6,11.6,11.6C157.6,136.8,167.2,122,158,109.6z"></path>
                        <path style="fill:#E09515FFFF;" d="M134.4,109.6c0,0-2.4,11.6,11.6,15.6c0,0-8,1.6-11.6,11.6C134.8,136.8,125.6,122,134.4,109.6z"></path>
                     </g>
                     <path style="fill:#E09515;" d="M163.2,100c-1.6,4.8-2.4,8-2.4,8.4l0,0c-4,5.2-8.8,8.8-14.4,8.8c-5.2,0-9.6-3.2-13.2-8 c-8-10-2.4-28-2.4-28c4,4.4,16.8,4.8,16.8,4.8c-5.2-0.8-6.4-4.8-6.4-5.6c1.2,2.8,13.6,4.4,13.6,4.4C167.6,87.2,163.2,100,163.2,100z "></path>
                     <path style="fill:#E09515324A5E;" d="M139.2,62.4c0,0,17.6-7.2,26.8,8.8c9.6,17.2-2.4,35.6-4.8,37.2c0,0,0.8-2.8,2.4-8.8 c0,0,4.4-12.8-8.8-14.8c0,0-12.4-1.6-13.6-4.4c0,0,0.8,4.4,6.4,5.6c0,0-12.8-0.4-16.8-4.8c0,0-5.6,18,2.4,28c0,0-14-11.2-12.4-28.4 C121.2,81.2,120.4,57.6,139.2,62.4z"></path>
                     <path style="fill:#E095157058;" d="M271.2,104.4H300c2.8,0,5.6-2.4,5.6-5.6s-2.4-5.6-5.6-5.6h-34c-2.8,0-5.6,2.4-5.6,5.6v146.4h-28.8 c-2.8,0-5.6,2.4-5.6,5.6c0,2.8,2.4,5.6,5.6,5.6h28.8v146.4c0,2.8,2.4,5.6,5.6,5.6h30c2.8,0,5.6-2.4,5.6-5.6c0-2.8-2.4-5.6-5.6-5.6 h-24.8V104.4z"></path>
                  </g>
               </svg>
               <h4 class="pt-3">Widthdraw wallet</h4>
               <h4 class="counter" style="visibility: visible;">0</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg fill="#E09515" width="30px" height="30px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#E09515">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <path d="M1587.854 1133.986c-109.666-42.353-223.51-72.057-339.276-91.257h-5.195c135.53-91.369 224.866-246.324 224.866-421.609v-24.847c-28.235 18.07-64.377 41.788-115.087 57.713-15.925 202.165-186.466 362.428-393.148 362.428-199.793 0-365.93-148.97-390.777-342.212-3.388-16.94-4.517-34.898-4.517-53.082v-60.988c1.355-.113 2.258-.452 3.614-.678 10.503-1.807 19.877-4.179 29.364-6.663 8.132-2.033 16.15-4.18 23.38-6.664 7.905-2.71 15.472-5.421 22.587-8.583 8.132-3.502 15.586-7.116 23.04-10.956 5.083-2.823 10.391-5.308 15.135-8.132a662.834 662.834 0 0 0 20.668-12.762c3.388-2.259 7.34-4.518 10.503-6.55 4.857-3.163 9.6-5.986 14.344-8.923 34.447-21.572 67.313-38.4 128.527-38.513h.226c53.195 0 84.932 12.085 114.635 29.026 9.826 5.647 19.539 11.972 29.817 18.522 35.124 22.815 73.976 47.549 133.722 58.956.678.113 1.13.452 1.807.564 20.33 3.728 43.143 5.873 69.007 5.873.452 0 .79-.113 1.242-.113 103.342-.225 157.214-34.785 204.537-65.392l55.793-34.448v-.112l.564-.452-3.952-21.346-2.372-15.473c-5.308-34.447-15.247-67.426-27.22-99.501-24.733-66.748-62.568-127.963-114.521-179.803-26.993-27.218-57.6-50.936-89.224-70.136-80.188-50.71-173.93-77.93-269.93-77.93-220.235 0-408.846 141.177-478.87 338.824-19.2 53.082-29.365 109.553-29.365 169.412V621.12c0 19.2 1.13 38.4 3.502 56.47C472.108 829.949 557.152 960.735 678 1042.166h-5.083c-111.812 18.41-222.042 46.983-328.433 87.19-140.612 53.309-231.53 183.417-231.53 331.709V1669.1l26.768 16.49c172.235 106.955 454.475 234.353 820.292 234.353 201.938 0 508.235-40.546 820.404-234.353l26.654-16.49v-208.037c0-144.904-88.094-276.255-219.218-327.078" fill-rule="evenodd"></path>
                  </g>
               </svg>
               <?php $direct=$this->db->where('ref_id',$this->session->userdata('micusername'))->count_all_results('user_role')+0; ?>
               <h4 class="pt-3">Direct Referal</h4>
               <h4 class="counter" style="visibility: visible;"><?=$direct?></h4>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#E09515" stroke="#E09515">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <path style="fill:#E09515;" d="M120.433,139.63c12.853,0,23.273-10.42,23.273-23.273V93.085H256h112.294v23.273 c0,12.853,10.42,23.273,23.273,23.273c12.853,0,23.273-10.42,23.273-23.273V69.812c0-12.853-10.42-23.273-23.273-23.273H279.273 v-23.26c0-12.853-10.42-23.273-23.273-23.273c-12.853,0-23.273,10.42-23.273,23.273v23.26H120.433 c-12.853,0-23.273,10.42-23.273,23.273v46.545C97.161,129.21,107.58,139.63,120.433,139.63z"></path>
                     <path style="fill:#E09515EFC27B;" d="M120.433,182.108c-38.498,0-69.818,31.32-69.818,69.818s31.32,69.818,69.818,69.818 s69.818-31.32,69.818-69.818S158.933,182.108,120.433,182.108z"></path>
                     <path style="fill:#E095155286FA;" d="M120.433,368.289C54.025,368.289,0,422.315,0,488.721c0,12.853,10.42,23.273,23.273,23.273h97.161 h97.159c12.853,0,23.273-10.42,23.273-23.273C240.865,422.315,186.84,368.289,120.433,368.289z"></path>
                     <path style="fill:#E09515ECB45C;" d="M50.615,251.926c0,38.498,31.32,69.818,69.818,69.818V182.108 C81.936,182.108,50.615,213.428,50.615,251.926z"></path>
                     <path style="fill:#E095153D6DEB;" d="M0,488.721c0,12.853,10.42,23.273,23.273,23.273h97.161V368.289C54.025,368.289,0,422.315,0,488.721z "></path>
                     <path style="fill:#E09515EFC27B;" d="M391.567,182.108c-38.498,0-69.818,31.32-69.818,69.818s31.32,69.818,69.818,69.818 s69.818-31.32,69.818-69.818S430.064,182.108,391.567,182.108z"></path>
                     <path style="fill:#E0951500E7F0;" d="M391.567,368.289c-66.406,0-120.432,54.025-120.432,120.432c0,12.853,10.42,23.273,23.273,23.273 h97.159h97.161c12.853,0,23.273-10.42,23.273-23.273C512,422.315,457.975,368.289,391.567,368.289z"></path>
                     <path style="fill:#E09515ECB45C;" d="M321.749,251.926c0,38.498,31.32,69.818,69.818,69.818V182.108 C353.067,182.108,321.749,213.428,321.749,251.926z"></path>
                     <path style="fill:#E0951500D7DF;" d="M271.135,488.721c0,12.853,10.42,23.273,23.273,23.273h97.159V368.289 C325.16,368.289,271.135,422.315,271.135,488.721z"></path>
                  </g>
               </svg>
               <h4 class="pt-3">Binary income</h4>
               <h4 class="counter" style="visibility: visible;">0</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="30px" height="30px" fill="#000000">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <rect x="160" y="357.424" style="fill:#E09515;" width="192" height="108.336"></rect>
                     <polygon points="160,376.16 274.24,376.16 160,434.064 "></polygon>
                     <path style="fill:#E09515999999;" d="M377.456,487.84H134.544c-9.424,0-17.12-7.712-17.12-17.12l0,0c0-9.424,7.712-17.12,17.12-17.12 H377.44c9.424,0,17.12,7.712,17.12,17.12l0,0C394.576,480.144,386.864,487.84,377.456,487.84z"></path>
                     <path style="fill:#E09515D6D6D6;" d="M480,376.16H32c-17.6,0-32-14.4-32-32v-288c0-17.6,14.4-32,32-32h448c17.6,0,32,14.4,32,32v288 C512,361.76,497.6,376.16,480,376.16z"></path>
                     <rect x="21.968" y="46.096" style="fill:#E09515;" width="468.16" height="308.128"></rect>
                     <path style="fill:#E095150BA4E0;" d="M153.104,268.608l-34.112-73.952c0,0-35.792,0.48-35.792,33.408s0,40.56,0,40.56 S153.344,268.608,153.104,268.608z"></path>
                     <circle style="fill:#E09515FFFFFF;" cx="154.784" cy="148.368" r="35.312"></circle>
                     <path style="fill:#E095150BA4E0;" d="M156.448,268.608l34.112-73.952c0,0,35.792,0.48,35.792,33.408s0,40.56,0,40.56 S156.208,268.608,156.448,268.608z"></path>
                     <g>
                        <polygon style="fill:#E09515FFFFFF;" points="154.784,194.656 130.208,194.656 154.784,249.056 179.36,194.656 "></polygon>
                        <circle style="fill:#E09515FFFFFF;" cx="357.216" cy="148.368" r="35.312"></circle>
                     </g>
                     <g>
                        <path style="fill:#E095150BA4E0;" d="M355.552,268.608l-34.112-73.952c0,0-35.792,0.48-35.792,33.408s0,40.56,0,40.56 S355.792,268.608,355.552,268.608z"></path>
                        <path style="fill:#E095150BA4E0;" d="M358.896,268.608l34.112-73.952c0,0,35.792,0.48,35.792,33.408s0,40.56,0,40.56 S358.656,268.608,358.896,268.608z"></path>
                     </g>
                     <polygon style="fill:#E09515FFFFFF;" points="357.216,194.656 332.64,194.656 357.216,249.056 381.792,194.656 "></polygon>
                  </g>
               </svg>
               <h4 class="pt-3">Mining income</h4>
               <h4 class="counter" style="visibility: visible;">0</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" width="30px" height="30px" fill="#eee7e7">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <circle style="fill:#E09515;" cx="254" cy="254" r="254"></circle>
                     <g>
                        <path style="fill:#E09515FFFF;" d="M418.4,158c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.2,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,144.4,416,150.4,418.4,158 L418.4,158z"></path>
                        <path style="fill:#E09515FFFF;" d="M418.4,291.6c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,278,416,284,418.4,291.6 L418.4,291.6z"></path>
                        <path style="fill:#E09515FFFF;" d="M418.4,425.2c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,411.6,416,417.6,418.4,425.2 L418.4,425.2z"></path>
                     </g>
                     <path style="fill:#E09515324A5E;" d="M137.2,426c0,0,2.4,8-0.8,10.4c0,0-3.2,0.8-2.8,5.2c0,0,0,5.2-6.8,4.8c0,0-17.6,2-20.4-2 c0,0-2-2.4-0.8-6l20.8-7.6L137.2,426z"></path>
                     <g>
                        <path style="fill:#E095152B3B4E;" d="M134.4,414c0,0,7.6,6.4,2,15.2c0,0-4,5.6-4,8.4c0,0,0.4,8.8-8.8,6.8c0,0-9.2-6.8-15.6-1.2 c0,0-4.8-0.4-2.4-6.8c0,0,5.2-6.8,8.4-12.8c0,0,2-1.2,0.8-6L134.4,414z"></path>
                        <path style="fill:#E095152B3B4E;" d="M155.6,426c0,0-2.4,8,0.8,10.4c0,0,3.2,0.8,2.8,5.2c0,0,0,5.2,6.8,4.8c0,0,17.6,2,20.4-2 c0,0,2-2.4,0.8-6l-20.8-7.6L155.6,426z"></path>
                     </g>
                     <path style="fill:#E09515324A5E;" d="M158,414c0,0-7.6,6.4-2,15.2c0,0,4,5.6,4,8.4c0,0-0.4,8.8,8.8,6.8c0,0,9.2-6.8,15.6-1.2 c0,0,4.8-0.4,2.4-6.8c0,0-5.2-6.8-8.4-12.8c0,0-2-1.2-0.8-6L158,414z"></path>
                     <polygon style="fill:#E09515E6E9EE;" points="127.6,125.2 145.2,194.8 163.2,125.2 "></polygon>
                     <polygon style="fill:#E095151543F;" points="150.4,132.8 152.8,125.2 139.6,125.2 142,132.8 "></polygon>
                     <polygon style="fill:#E095157058;" points="150.4,132.8 146.4,132.8 142,132.8 133.2,185.6 146.4,194.4 159.6,185.6 "></polygon>
                     <path style="fill:#E09515324A5E;" d="M112.8,222.8c-3.2,18-6.8,50.4-0.8,88c0,0,5.6,86.8,0.4,106c0,0,10.4,18,28.4,0 c0,0,0.4-142.8,5.2-148.8v-45.2H112.8z"></path>
                     <path style="fill:#E095152B3B4E;" d="M146,222.8v45.6c4.8,6,5.2,148.8,5.2,148.8c18,18,28.4,0,28.4,0c-5.2-19.2,0.4-106,0.4-106 c6-37.6,2.4-70-0.8-88H146V222.8z"></path>
                     <polygon style="fill:#E09515CED5E0;" points="160.4,115.6 132,115.6 128,125.2 162.8,125.2 "></polygon>
                     <path style="fill:#E095152B3B4E;" d="M129.2,121.6l-31.6,11.6c0,0,19.2,58.4,10.8,97.6c0,0-3.2,20-0.8,35.2c0,0,22,16,30.4,1.2 c0,0,11.2-35.2,9.2-69.6l-10-26.4L129.2,121.6z"></path>
                     <g>
                        <path style="fill:#E09515324A5E;" d="M132,115.6L116.8,132l5.6,2.4l-4.4,4c0,0,14.4,43.6,29.2,58.8C147.2,197.6,131.2,129.6,132,115.6z"></path>
                        <path style="fill:#E09515324A5E;" d="M163.2,121.6l31.6,11.6c0,0-19.2,58.4-10.8,97.6c0,0,3.2,20,0.8,35.2c0,0-22,16-30.4,1.2 c0,0-11.2-35.2-9.2-69.6l10-26.4L163.2,121.6z"></path>
                     </g>
                     <g>
                        <path style="fill:#E095152B3B4E;" d="M160.4,115.6l15.2,16.4l-5.6,2.4l4.4,4c0,0-14.4,43.6-29.2,58.8 C145.2,197.6,161.2,129.6,160.4,115.6z"></path>
                        <circle style="fill:#E095152B3B4E;" cx="150.8" cy="200.8" r="3.2"></circle>
                     </g>
                     <polygon style="fill:#E095157058;" points="165.6,175.2 170.8,166.4 179.2,172.4 "></polygon>
                     <rect x="163.226" y="172.418" transform="matrix(-0.9789 0.2042 -0.2042 -0.9789 376.4811 310.3871)" style="fill:#E095152B3B4E;" width="17.999" height="4.4"></rect>
                     <path style="fill:#E095159B54C;" d="M196.8,260.8c0.4,3.6,0.4,6,0.4,6c0.8,0.8,3.2,4,3.2,4c4.4,3.6,2,6.4,2,6.4l0.4,2.8 c1.2,1.2,0.4,3.6,0.4,3.6c-2.4,4.4-4,0.8-4,0.8c-2.4,3.2-4-0.8-4-0.8c-3.2,1.2-4-1.6-4-1.6s-5.6,0.8-4.4-11.6c0.4-2.8,0.4-6,0-9.2 h10V260.8z"></path>
                     <path style="fill:#E09515;" d="M192,273.2c0-0.4,0.4-2.4,0.4-2.4c-0.8,2.4,2,4,2,4c-0.4,0-0.4-1.6-0.4-1.6c0.4,2,4,3.6,4,3.6 c0.4-1.2,1.6-2.4,1.6-2.4c-0.8,1.2-1.2,2.4-1.2,2.4c0.8,0,1.2,0.8,1.2,0.8c-0.8-0.8-1.2,0-1.2,0c1.6,0.4,1.2,2,1.2,2 c0-1.6-1.2-1.6-1.2-1.6c0.8,0.8,0.4,1.6,0.4,1.6c0-1.2-1.6-1.6-1.6-1.6c0.8-1.2,0-0.8,0-0.8c-1.6-2-2,0.4-2.4,0.8h-0.4 c0.8-2,0-2.4,0-2.4c-1.6-1.2-1.6,0.8-1.6,0.8c0,3.2-2.4,4.8-2.4,4.8h-0.8c1.6-0.8,2-2.4,2-2.4c1.2-3.2-0.4-3.6-0.4-3.6 c-2.8-0.4-2,2-2,2c-1.2,0.4-2.4,0-2.4,0c0.4,0,1.2-0.8,1.2-0.8c1.2-0.8-0.4-2.8-0.4-2.8c0.8,0.8,4,0.8,4,0.8c1.6,0,0.4-1.6,0.4-1.6 l-0.8,0.4c0-0.4-0.8-2.4-0.8-2.4C191.2,271.2,192,272.8,192,273.2z"></path>
                     <g>
                        <path style="fill:#E095159B54C;" d="M202.8,278c0,0-0.4,0.4-1.6,2.4c0,0-0.4,0.4-0.4,0.8c-0.4,0.8-0.8,0.8-1.6,0.8 c-0.8-0.4-2-0.4-2.8-0.4c0,0-0.8,0-1.6,0c-0.4,0-0.8-0.4-0.8-0.8c0.4-0.8,0.8-2,2.4-2c0,0,1.6-0.4,2.4,0c0,0-2.8-0.8-4,0.8 c0,0-1.6,1.6-0.4,2.4c0,0,4,0,4.4,0.4c0,0,1.6,0.8,2.4-0.4c0,0,0.4-2,2-1.6c0,0-0.4-0.4-1.2-0.4C201.6,280,202,278.8,202.8,278z"></path>
                        <path style="fill:#E095159B54C;" d="M199.2,282c-0.4,0.8,0.4,2.8,0.4,2.8c-0.4-0.4-0.4-0.8-0.4-0.8c0,0.4-0.4,0.4-0.4,0.8 c0.4-1.2,0-2.8,0-2.8H199.2z"></path>
                        <path style="fill:#E095159B54C;" d="M195.2,283.6C195.2,283.6,195.2,283.2,195.2,283.6c-0.4-0.4-0.4-0.4-0.4-0.4c0.4-0.8,0.4-2,0.4-2 h0.4C196,282.4,195.2,283.6,195.2,283.6z"></path>
                     </g>
                     <rect x="185.2" y="254.8" style="fill:#E09515FFFF;" width="13.2" height="9.2"></rect>
                     <path style="fill:#E095159B54C;" d="M96,260.8c-0.4,3.6-0.4,6-0.4,6c-0.8,0.8-3.2,4-3.2,4c-4.4,3.6-2,6.4-2,6.4L90,280 c-1.2,1.2-0.4,3.6-0.4,3.6c2.4,4.4,4,0.8,4,0.8c2.4,3.2,4-0.8,4-0.8c3.2,1.2,4-1.6,4-1.6s5.6,0.8,4.4-11.6c-0.4-2.8-0.4-6,0-9.2H96 V260.8z"></path>
                     <path style="fill:#E09515;" d="M100.8,273.2c0-0.4-0.4-2.4-0.4-2.4c0.8,2.4-2,4-2,4c0.4,0,0.4-1.6,0.4-1.6c-0.4,2-4,3.6-4,3.6 c-0.4-1.2-1.6-2.4-1.6-2.4c0.8,1.2,1.2,2.4,1.2,2.4c-0.8,0-1.2,0.8-1.2,0.8c0.8-0.8,1.2,0,1.2,0c-1.6,0.4-1.2,2-1.2,2 c0-1.6,1.2-1.6,1.2-1.6c-0.8,0.8-0.4,1.6-0.4,1.6c0-1.2,1.6-1.6,1.6-1.6c-0.8-1.2,0-0.8,0-0.8c1.6-2,2,0.4,2.4,0.8h0.4 c-0.8-2,0-2.4,0-2.4c1.6-1.2,1.6,0.8,1.6,0.8c0,3.2,2.4,4.8,2.4,4.8h0.8c-1.6-0.8-2-2.4-2-2.4c-1.2-3.2,0.4-3.6,0.4-3.6 c2.8-0.4,2,2,2,2c1.2,0.4,2.4,0,2.4,0c-0.4,0-1.2-0.8-1.2-0.8c-1.2-0.8,0.4-2.8,0.4-2.8c-0.8,0.8-4,0.8-4,0.8 c-1.6,0-0.4-1.6-0.4-1.6l0.8,0.4c0-0.4,0.8-2.4,0.8-2.4C101.6,271.2,100.8,272.8,100.8,273.2z"></path>
                     <g>
                        <path style="fill:#E095159B54C;" d="M90.4,278c0,0,0.4,0.4,1.6,2.4c0,0,0.4,0.4,0.4,0.8c0.4,0.8,0.8,0.8,1.6,0.8c0.8-0.4,2-0.4,2.8-0.4 c0,0,0.8,0,1.6,0c0.4,0,0.8-0.4,0.8-0.8c-0.4-0.8-0.8-2-2.4-2c0,0-1.6-0.4-2.4,0c0,0,2.8-0.8,4,0.8c0,0,1.6,1.6,0.4,2.4 c0,0-4,0-4.4,0.4c0,0-1.6,0.8-2.4-0.4c0,0-0.4-2-2-1.6c0,0,0.4-0.4,1.2-0.4C91.2,280,90.8,278.8,90.4,278z"></path>
                        <path style="fill:#E095159B54C;" d="M93.6,282c0.4,0.8-0.4,2.8-0.4,2.8c0.4-0.4,0.4-0.8,0.4-0.8c0,0.4,0.4,0.4,0.4,0.8 c-0.4-1.2,0-2.8,0-2.8H93.6z"></path>
                        <path style="fill:#E095159B54C;" d="M97.6,283.6C97.6,283.6,97.6,283.2,97.6,283.6c0.4-0.4,0.4-0.4,0.4-0.4c-0.4-0.8-0.4-2-0.4-2h-0.4 C96.8,282.4,97.6,283.6,97.6,283.6z"></path>
                     </g>
                     <rect x="94.4" y="254.8" style="fill:#E09515FFFF;" width="13.2" height="9.2"></rect>
                     <path style="fill:#E095152B3B4E;" d="M201.2,260h-18.4c0,0-0.4-47.2,2-56.4c0,0,0.8-9.2-1.6-16.8c3.2-28.4,11.6-53.6,11.6-54 C194.8,133.2,204,156.4,201.2,260z"></path>
                     <path style="fill:#E09515324A5E;" d="M91.2,260h18.4c0,0,0.4-47.2-2-56.4c0,0-0.8-9.2,1.6-16.8c-3.2-28.4-11.6-53.6-11.6-54 C97.6,133.2,88.4,156.4,91.2,260z"></path>
                     <ellipse style="fill:#E095159B54C;" cx="146.4" cy="112" rx="12" ry="13.2"></ellipse>
                     <g>
                        <path style="fill:#E09515FFFF;" d="M158,109.6c0,0,2.4,11.6-11.6,15.6c0,0,8,1.6,11.6,11.6C157.6,136.8,167.2,122,158,109.6z"></path>
                        <path style="fill:#E09515FFFF;" d="M134.4,109.6c0,0-2.4,11.6,11.6,15.6c0,0-8,1.6-11.6,11.6C134.8,136.8,125.6,122,134.4,109.6z"></path>
                     </g>
                     <path style="fill:#E09515;" d="M163.2,100c-1.6,4.8-2.4,8-2.4,8.4l0,0c-4,5.2-8.8,8.8-14.4,8.8c-5.2,0-9.6-3.2-13.2-8 c-8-10-2.4-28-2.4-28c4,4.4,16.8,4.8,16.8,4.8c-5.2-0.8-6.4-4.8-6.4-5.6c1.2,2.8,13.6,4.4,13.6,4.4C167.6,87.2,163.2,100,163.2,100z "></path>
                     <path style="fill:#E09515324A5E;" d="M139.2,62.4c0,0,17.6-7.2,26.8,8.8c9.6,17.2-2.4,35.6-4.8,37.2c0,0,0.8-2.8,2.4-8.8 c0,0,4.4-12.8-8.8-14.8c0,0-12.4-1.6-13.6-4.4c0,0,0.8,4.4,6.4,5.6c0,0-12.8-0.4-16.8-4.8c0,0-5.6,18,2.4,28c0,0-14-11.2-12.4-28.4 C121.2,81.2,120.4,57.6,139.2,62.4z"></path>
                     <path style="fill:#E095157058;" d="M271.2,104.4H300c2.8,0,5.6-2.4,5.6-5.6s-2.4-5.6-5.6-5.6h-34c-2.8,0-5.6,2.4-5.6,5.6v146.4h-28.8 c-2.8,0-5.6,2.4-5.6,5.6c0,2.8,2.4,5.6,5.6,5.6h28.8v146.4c0,2.8,2.4,5.6,5.6,5.6h30c2.8,0,5.6-2.4,5.6-5.6c0-2.8-2.4-5.6-5.6-5.6 h-24.8V104.4z"></path>
                  </g>
               </svg>
               <h4 class="pt-3">level income</h4>
               <h4 class="counter" style="visibility: visible;">0</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg fill="#E09515" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#E09515">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <path d="M21,3H4A2,2,0,0,0,2,5V19a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V8a1,1,0,0,0-1-1H5A1,1,0,0,1,5,5H22V4A1,1,0,0,0,21,3Zm-2.5,9.5A1.5,1.5,0,1,1,17,14,1.5,1.5,0,0,1,18.5,12.5Z"></path>
                  </g>
               </svg>
               <h4 class="pt-3">Wallet</h4>
               <h4 class="counter" style="visibility: visible;">0</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <path d="M12.75 15.9203H13.4C14.05 15.9203 14.59 15.3403 14.59 14.6403C14.59 13.7703 14.28 13.6003 13.77 13.4203L12.76 13.0703V15.9203H12.75Z" fill="#E09515"></path>
                     <path d="M11.9701 1.89845C6.45007 1.91845 1.98007 6.40845 2.00007 11.9285C2.02007 17.4485 6.51007 21.9185 12.0301 21.8985C17.5501 21.8785 22.0201 17.3885 22.0001 11.8685C21.9801 6.34845 17.4901 1.88845 11.9701 1.89845ZM14.2601 11.9985C15.0401 12.2685 16.0901 12.8485 16.0901 14.6385C16.0901 16.1785 14.8801 17.4185 13.4001 17.4185H12.7501V17.9985C12.7501 18.4085 12.4101 18.7485 12.0001 18.7485C11.5901 18.7485 11.2501 18.4085 11.2501 17.9985V17.4185H10.8901C9.25007 17.4185 7.92007 16.0385 7.92007 14.3385C7.92007 13.9285 8.26007 13.5885 8.67007 13.5885C9.08007 13.5885 9.42007 13.9285 9.42007 14.3385C9.42007 15.2085 10.0801 15.9185 10.8901 15.9185H11.2501V12.5385L9.74007 11.9985C8.96007 11.7285 7.91007 11.1485 7.91007 9.35845C7.91007 7.81845 9.12007 6.57845 10.6001 6.57845H11.2501V5.99845C11.2501 5.58845 11.5901 5.24845 12.0001 5.24845C12.4101 5.24845 12.7501 5.58845 12.7501 5.99845V6.57845H13.1101C14.7501 6.57845 16.0801 7.95845 16.0801 9.65845C16.0801 10.0685 15.7401 10.4085 15.3301 10.4085C14.9201 10.4085 14.5801 10.0685 14.5801 9.65845C14.5801 8.78845 13.9201 8.07845 13.1101 8.07845H12.7501V11.4585L14.2601 11.9985Z" fill="#E09515"></path>
                     <path d="M9.42188 9.36812C9.42188 10.2381 9.73187 10.4081 10.2419 10.5881L11.2519 10.9381V8.07812H10.6019C9.95188 8.07812 9.42188 8.65812 9.42188 9.36812Z" fill="#E09515"></path>
                  </g>
               </svg>
               <h4 class="pt-3">Topup</h4>
               <h4 class="counter" style="visibility: visible;">0</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card shining-card">
         <div class="card-body">
            <div class="text-center">
               <svg fill="#E09515" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#E09515">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <path d="M21,3H4A2,2,0,0,0,2,5V19a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V8a1,1,0,0,0-1-1H5A1,1,0,0,1,5,5H22V4A1,1,0,0,0,21,3Zm-2.5,9.5A1.5,1.5,0,1,1,17,14,1.5,1.5,0,0,1,18.5,12.5Z"></path>
                  </g>
               </svg>
               <?php $total=$this->db->where('user_type','u')->count_all_results('user_role')+0; ?>
               <h4 class="pt-3">Total Registration</h4>
               <h4 class="counter" style="visibility: visible;"><?=$total?></h4>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="mobile">
   <div class="app">
      <div class="col-sm-2">
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
                  <h4 class="pt-3">Total earnings</h4>
                  <h4 class="counter" style="visibility: visible;">0</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-2">
         <div class="card shining-card">
            <div class="card-body">
               <div class="text-center">
                  <svg fill="#fcfcfc" width="30px" height="30px" viewBox="0 0 24 24" id="down-direction-circle" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <circle id="primary" cx="12" cy="12" r="10" style="fill: #e09515;"></circle>
                        <path id="secondary" d="M10,12V8a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1v4h.82a1,1,0,0,1,.76,1.65l-2.82,3.27a1,1,0,0,1-1.52,0L8.42,13.65A1,1,0,0,1,9.18,12Z" style="fill: #e09515E09515;"></path>
                     </g>
                  </svg>
                  <h4 class="pt-3">Total Withdraw</h4>
                  <h4 class="counter" style="visibility: visible;">0</h4>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="app">
      <div class="col-sm-2">
         <div class="card shining-card">
            <div class="card-body">
               <div class="text-center">
                  <svg width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#E09515" stroke="#E09515">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <g>
                           <path fill="none" d="M0 0h24v24H0z"></path>
                           <path d="M12 11a5 5 0 0 1 5 5v6H7v-6a5 5 0 0 1 5-5zm-6.712 3.006a6.983 6.983 0 0 0-.28 1.65L5 16v6H2v-4.5a3.5 3.5 0 0 1 3.119-3.48l.17-.014zm13.424 0A3.501 3.501 0 0 1 22 17.5V22h-3v-6c0-.693-.1-1.362-.288-1.994zM5.5 8a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"></path>
                        </g>
                     </g>
                  </svg>
                  <h4 class="pt-3">E-wallet</h4>
                  <h4 class="counter" style="visibility: visible;">0</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-2">
         <div class="card shining-card">
            <div class="card-body">
               <div class="text-center">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" width="30px" height="30px" fill="#eee7e7">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <circle style="fill:#E09515;" cx="254" cy="254" r="254"></circle>
                        <g>
                           <path style="fill:#E09515FFFF;" d="M418.4,158c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.2,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,144.4,416,150.4,418.4,158 L418.4,158z"></path>
                           <path style="fill:#E09515FFFF;" d="M418.4,291.6c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,278,416,284,418.4,291.6 L418.4,291.6z"></path>
                           <path style="fill:#E09515FFFF;" d="M418.4,425.2c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,411.6,416,417.6,418.4,425.2 L418.4,425.2z"></path>
                        </g>
                        <path style="fill:#E09515324A5E;" d="M137.2,426c0,0,2.4,8-0.8,10.4c0,0-3.2,0.8-2.8,5.2c0,0,0,5.2-6.8,4.8c0,0-17.6,2-20.4-2 c0,0-2-2.4-0.8-6l20.8-7.6L137.2,426z"></path>
                        <g>
                           <path style="fill:#E095152B3B4E;" d="M134.4,414c0,0,7.6,6.4,2,15.2c0,0-4,5.6-4,8.4c0,0,0.4,8.8-8.8,6.8c0,0-9.2-6.8-15.6-1.2 c0,0-4.8-0.4-2.4-6.8c0,0,5.2-6.8,8.4-12.8c0,0,2-1.2,0.8-6L134.4,414z"></path>
                           <path style="fill:#E095152B3B4E;" d="M155.6,426c0,0-2.4,8,0.8,10.4c0,0,3.2,0.8,2.8,5.2c0,0,0,5.2,6.8,4.8c0,0,17.6,2,20.4-2 c0,0,2-2.4,0.8-6l-20.8-7.6L155.6,426z"></path>
                        </g>
                        <path style="fill:#E09515324A5E;" d="M158,414c0,0-7.6,6.4-2,15.2c0,0,4,5.6,4,8.4c0,0-0.4,8.8,8.8,6.8c0,0,9.2-6.8,15.6-1.2 c0,0,4.8-0.4,2.4-6.8c0,0-5.2-6.8-8.4-12.8c0,0-2-1.2-0.8-6L158,414z"></path>
                        <polygon style="fill:#E09515E6E9EE;" points="127.6,125.2 145.2,194.8 163.2,125.2 "></polygon>
                        <polygon style="fill:#E095151543F;" points="150.4,132.8 152.8,125.2 139.6,125.2 142,132.8 "></polygon>
                        <polygon style="fill:#E095157058;" points="150.4,132.8 146.4,132.8 142,132.8 133.2,185.6 146.4,194.4 159.6,185.6 "></polygon>
                        <path style="fill:#E09515324A5E;" d="M112.8,222.8c-3.2,18-6.8,50.4-0.8,88c0,0,5.6,86.8,0.4,106c0,0,10.4,18,28.4,0 c0,0,0.4-142.8,5.2-148.8v-45.2H112.8z"></path>
                        <path style="fill:#E095152B3B4E;" d="M146,222.8v45.6c4.8,6,5.2,148.8,5.2,148.8c18,18,28.4,0,28.4,0c-5.2-19.2,0.4-106,0.4-106 c6-37.6,2.4-70-0.8-88H146V222.8z"></path>
                        <polygon style="fill:#E09515CED5E0;" points="160.4,115.6 132,115.6 128,125.2 162.8,125.2 "></polygon>
                        <path style="fill:#E095152B3B4E;" d="M129.2,121.6l-31.6,11.6c0,0,19.2,58.4,10.8,97.6c0,0-3.2,20-0.8,35.2c0,0,22,16,30.4,1.2 c0,0,11.2-35.2,9.2-69.6l-10-26.4L129.2,121.6z"></path>
                        <g>
                           <path style="fill:#E09515324A5E;" d="M132,115.6L116.8,132l5.6,2.4l-4.4,4c0,0,14.4,43.6,29.2,58.8C147.2,197.6,131.2,129.6,132,115.6z"></path>
                           <path style="fill:#E09515324A5E;" d="M163.2,121.6l31.6,11.6c0,0-19.2,58.4-10.8,97.6c0,0,3.2,20,0.8,35.2c0,0-22,16-30.4,1.2 c0,0-11.2-35.2-9.2-69.6l10-26.4L163.2,121.6z"></path>
                        </g>
                        <g>
                           <path style="fill:#E095152B3B4E;" d="M160.4,115.6l15.2,16.4l-5.6,2.4l4.4,4c0,0-14.4,43.6-29.2,58.8 C145.2,197.6,161.2,129.6,160.4,115.6z"></path>
                           <circle style="fill:#E095152B3B4E;" cx="150.8" cy="200.8" r="3.2"></circle>
                        </g>
                        <polygon style="fill:#E095157058;" points="165.6,175.2 170.8,166.4 179.2,172.4 "></polygon>
                        <rect x="163.226" y="172.418" transform="matrix(-0.9789 0.2042 -0.2042 -0.9789 376.4811 310.3871)" style="fill:#E095152B3B4E;" width="17.999" height="4.4"></rect>
                        <path style="fill:#E095159B54C;" d="M196.8,260.8c0.4,3.6,0.4,6,0.4,6c0.8,0.8,3.2,4,3.2,4c4.4,3.6,2,6.4,2,6.4l0.4,2.8 c1.2,1.2,0.4,3.6,0.4,3.6c-2.4,4.4-4,0.8-4,0.8c-2.4,3.2-4-0.8-4-0.8c-3.2,1.2-4-1.6-4-1.6s-5.6,0.8-4.4-11.6c0.4-2.8,0.4-6,0-9.2 h10V260.8z"></path>
                        <path style="fill:#E09515;" d="M192,273.2c0-0.4,0.4-2.4,0.4-2.4c-0.8,2.4,2,4,2,4c-0.4,0-0.4-1.6-0.4-1.6c0.4,2,4,3.6,4,3.6 c0.4-1.2,1.6-2.4,1.6-2.4c-0.8,1.2-1.2,2.4-1.2,2.4c0.8,0,1.2,0.8,1.2,0.8c-0.8-0.8-1.2,0-1.2,0c1.6,0.4,1.2,2,1.2,2 c0-1.6-1.2-1.6-1.2-1.6c0.8,0.8,0.4,1.6,0.4,1.6c0-1.2-1.6-1.6-1.6-1.6c0.8-1.2,0-0.8,0-0.8c-1.6-2-2,0.4-2.4,0.8h-0.4 c0.8-2,0-2.4,0-2.4c-1.6-1.2-1.6,0.8-1.6,0.8c0,3.2-2.4,4.8-2.4,4.8h-0.8c1.6-0.8,2-2.4,2-2.4c1.2-3.2-0.4-3.6-0.4-3.6 c-2.8-0.4-2,2-2,2c-1.2,0.4-2.4,0-2.4,0c0.4,0,1.2-0.8,1.2-0.8c1.2-0.8-0.4-2.8-0.4-2.8c0.8,0.8,4,0.8,4,0.8c1.6,0,0.4-1.6,0.4-1.6 l-0.8,0.4c0-0.4-0.8-2.4-0.8-2.4C191.2,271.2,192,272.8,192,273.2z"></path>
                        <g>
                           <path style="fill:#E095159B54C;" d="M202.8,278c0,0-0.4,0.4-1.6,2.4c0,0-0.4,0.4-0.4,0.8c-0.4,0.8-0.8,0.8-1.6,0.8 c-0.8-0.4-2-0.4-2.8-0.4c0,0-0.8,0-1.6,0c-0.4,0-0.8-0.4-0.8-0.8c0.4-0.8,0.8-2,2.4-2c0,0,1.6-0.4,2.4,0c0,0-2.8-0.8-4,0.8 c0,0-1.6,1.6-0.4,2.4c0,0,4,0,4.4,0.4c0,0,1.6,0.8,2.4-0.4c0,0,0.4-2,2-1.6c0,0-0.4-0.4-1.2-0.4C201.6,280,202,278.8,202.8,278z"></path>
                           <path style="fill:#E095159B54C;" d="M199.2,282c-0.4,0.8,0.4,2.8,0.4,2.8c-0.4-0.4-0.4-0.8-0.4-0.8c0,0.4-0.4,0.4-0.4,0.8 c0.4-1.2,0-2.8,0-2.8H199.2z"></path>
                           <path style="fill:#E095159B54C;" d="M195.2,283.6C195.2,283.6,195.2,283.2,195.2,283.6c-0.4-0.4-0.4-0.4-0.4-0.4c0.4-0.8,0.4-2,0.4-2 h0.4C196,282.4,195.2,283.6,195.2,283.6z"></path>
                        </g>
                        <rect x="185.2" y="254.8" style="fill:#E09515FFFF;" width="13.2" height="9.2"></rect>
                        <path style="fill:#E095159B54C;" d="M96,260.8c-0.4,3.6-0.4,6-0.4,6c-0.8,0.8-3.2,4-3.2,4c-4.4,3.6-2,6.4-2,6.4L90,280 c-1.2,1.2-0.4,3.6-0.4,3.6c2.4,4.4,4,0.8,4,0.8c2.4,3.2,4-0.8,4-0.8c3.2,1.2,4-1.6,4-1.6s5.6,0.8,4.4-11.6c-0.4-2.8-0.4-6,0-9.2H96 V260.8z"></path>
                        <path style="fill:#E09515;" d="M100.8,273.2c0-0.4-0.4-2.4-0.4-2.4c0.8,2.4-2,4-2,4c0.4,0,0.4-1.6,0.4-1.6c-0.4,2-4,3.6-4,3.6 c-0.4-1.2-1.6-2.4-1.6-2.4c0.8,1.2,1.2,2.4,1.2,2.4c-0.8,0-1.2,0.8-1.2,0.8c0.8-0.8,1.2,0,1.2,0c-1.6,0.4-1.2,2-1.2,2 c0-1.6,1.2-1.6,1.2-1.6c-0.8,0.8-0.4,1.6-0.4,1.6c0-1.2,1.6-1.6,1.6-1.6c-0.8-1.2,0-0.8,0-0.8c1.6-2,2,0.4,2.4,0.8h0.4 c-0.8-2,0-2.4,0-2.4c1.6-1.2,1.6,0.8,1.6,0.8c0,3.2,2.4,4.8,2.4,4.8h0.8c-1.6-0.8-2-2.4-2-2.4c-1.2-3.2,0.4-3.6,0.4-3.6 c2.8-0.4,2,2,2,2c1.2,0.4,2.4,0,2.4,0c-0.4,0-1.2-0.8-1.2-0.8c-1.2-0.8,0.4-2.8,0.4-2.8c-0.8,0.8-4,0.8-4,0.8 c-1.6,0-0.4-1.6-0.4-1.6l0.8,0.4c0-0.4,0.8-2.4,0.8-2.4C101.6,271.2,100.8,272.8,100.8,273.2z"></path>
                        <g>
                           <path style="fill:#E095159B54C;" d="M90.4,278c0,0,0.4,0.4,1.6,2.4c0,0,0.4,0.4,0.4,0.8c0.4,0.8,0.8,0.8,1.6,0.8c0.8-0.4,2-0.4,2.8-0.4 c0,0,0.8,0,1.6,0c0.4,0,0.8-0.4,0.8-0.8c-0.4-0.8-0.8-2-2.4-2c0,0-1.6-0.4-2.4,0c0,0,2.8-0.8,4,0.8c0,0,1.6,1.6,0.4,2.4 c0,0-4,0-4.4,0.4c0,0-1.6,0.8-2.4-0.4c0,0-0.4-2-2-1.6c0,0,0.4-0.4,1.2-0.4C91.2,280,90.8,278.8,90.4,278z"></path>
                           <path style="fill:#E095159B54C;" d="M93.6,282c0.4,0.8-0.4,2.8-0.4,2.8c0.4-0.4,0.4-0.8,0.4-0.8c0,0.4,0.4,0.4,0.4,0.8 c-0.4-1.2,0-2.8,0-2.8H93.6z"></path>
                           <path style="fill:#E095159B54C;" d="M97.6,283.6C97.6,283.6,97.6,283.2,97.6,283.6c0.4-0.4,0.4-0.4,0.4-0.4c-0.4-0.8-0.4-2-0.4-2h-0.4 C96.8,282.4,97.6,283.6,97.6,283.6z"></path>
                        </g>
                        <rect x="94.4" y="254.8" style="fill:#E09515FFFF;" width="13.2" height="9.2"></rect>
                        <path style="fill:#E095152B3B4E;" d="M201.2,260h-18.4c0,0-0.4-47.2,2-56.4c0,0,0.8-9.2-1.6-16.8c3.2-28.4,11.6-53.6,11.6-54 C194.8,133.2,204,156.4,201.2,260z"></path>
                        <path style="fill:#E09515324A5E;" d="M91.2,260h18.4c0,0,0.4-47.2-2-56.4c0,0-0.8-9.2,1.6-16.8c-3.2-28.4-11.6-53.6-11.6-54 C97.6,133.2,88.4,156.4,91.2,260z"></path>
                        <ellipse style="fill:#E095159B54C;" cx="146.4" cy="112" rx="12" ry="13.2"></ellipse>
                        <g>
                           <path style="fill:#E09515FFFF;" d="M158,109.6c0,0,2.4,11.6-11.6,15.6c0,0,8,1.6,11.6,11.6C157.6,136.8,167.2,122,158,109.6z"></path>
                           <path style="fill:#E09515FFFF;" d="M134.4,109.6c0,0-2.4,11.6,11.6,15.6c0,0-8,1.6-11.6,11.6C134.8,136.8,125.6,122,134.4,109.6z"></path>
                        </g>
                        <path style="fill:#E09515;" d="M163.2,100c-1.6,4.8-2.4,8-2.4,8.4l0,0c-4,5.2-8.8,8.8-14.4,8.8c-5.2,0-9.6-3.2-13.2-8 c-8-10-2.4-28-2.4-28c4,4.4,16.8,4.8,16.8,4.8c-5.2-0.8-6.4-4.8-6.4-5.6c1.2,2.8,13.6,4.4,13.6,4.4C167.6,87.2,163.2,100,163.2,100z "></path>
                        <path style="fill:#E09515324A5E;" d="M139.2,62.4c0,0,17.6-7.2,26.8,8.8c9.6,17.2-2.4,35.6-4.8,37.2c0,0,0.8-2.8,2.4-8.8 c0,0,4.4-12.8-8.8-14.8c0,0-12.4-1.6-13.6-4.4c0,0,0.8,4.4,6.4,5.6c0,0-12.8-0.4-16.8-4.8c0,0-5.6,18,2.4,28c0,0-14-11.2-12.4-28.4 C121.2,81.2,120.4,57.6,139.2,62.4z"></path>
                        <path style="fill:#E095157058;" d="M271.2,104.4H300c2.8,0,5.6-2.4,5.6-5.6s-2.4-5.6-5.6-5.6h-34c-2.8,0-5.6,2.4-5.6,5.6v146.4h-28.8 c-2.8,0-5.6,2.4-5.6,5.6c0,2.8,2.4,5.6,5.6,5.6h28.8v146.4c0,2.8,2.4,5.6,5.6,5.6h30c2.8,0,5.6-2.4,5.6-5.6c0-2.8-2.4-5.6-5.6-5.6 h-24.8V104.4z"></path>
                     </g>
                  </svg>
                  <h4 class="pt-3">Widthdraw wallet</h4>
                  <h4 class="counter" style="visibility: visible;">0</h4>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="app">
      <div class="col-sm-2">
         <div class="card shining-card">
            <div class="card-body">
               <div class="text-center">
                  <svg fill="#E09515" width="30px" height="30px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#E09515">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <path d="M1587.854 1133.986c-109.666-42.353-223.51-72.057-339.276-91.257h-5.195c135.53-91.369 224.866-246.324 224.866-421.609v-24.847c-28.235 18.07-64.377 41.788-115.087 57.713-15.925 202.165-186.466 362.428-393.148 362.428-199.793 0-365.93-148.97-390.777-342.212-3.388-16.94-4.517-34.898-4.517-53.082v-60.988c1.355-.113 2.258-.452 3.614-.678 10.503-1.807 19.877-4.179 29.364-6.663 8.132-2.033 16.15-4.18 23.38-6.664 7.905-2.71 15.472-5.421 22.587-8.583 8.132-3.502 15.586-7.116 23.04-10.956 5.083-2.823 10.391-5.308 15.135-8.132a662.834 662.834 0 0 0 20.668-12.762c3.388-2.259 7.34-4.518 10.503-6.55 4.857-3.163 9.6-5.986 14.344-8.923 34.447-21.572 67.313-38.4 128.527-38.513h.226c53.195 0 84.932 12.085 114.635 29.026 9.826 5.647 19.539 11.972 29.817 18.522 35.124 22.815 73.976 47.549 133.722 58.956.678.113 1.13.452 1.807.564 20.33 3.728 43.143 5.873 69.007 5.873.452 0 .79-.113 1.242-.113 103.342-.225 157.214-34.785 204.537-65.392l55.793-34.448v-.112l.564-.452-3.952-21.346-2.372-15.473c-5.308-34.447-15.247-67.426-27.22-99.501-24.733-66.748-62.568-127.963-114.521-179.803-26.993-27.218-57.6-50.936-89.224-70.136-80.188-50.71-173.93-77.93-269.93-77.93-220.235 0-408.846 141.177-478.87 338.824-19.2 53.082-29.365 109.553-29.365 169.412V621.12c0 19.2 1.13 38.4 3.502 56.47C472.108 829.949 557.152 960.735 678 1042.166h-5.083c-111.812 18.41-222.042 46.983-328.433 87.19-140.612 53.309-231.53 183.417-231.53 331.709V1669.1l26.768 16.49c172.235 106.955 454.475 234.353 820.292 234.353 201.938 0 508.235-40.546 820.404-234.353l26.654-16.49v-208.037c0-144.904-88.094-276.255-219.218-327.078" fill-rule="evenodd"></path>
                     </g>
                  </svg>
                  <?php $direct=$this->db->where('ref_id',$this->session->userdata('micusername'))->count_all_results('user_role')+0; ?>
                  <h4 class="pt-3">Direct Referal</h4>
                  <h4 class="counter" style="visibility: visible;"><?=$direct?></h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-2">
         <div class="card shining-card">
            <div class="card-body">
               <div class="text-center">
                  <svg height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#E09515" stroke="#E09515">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <path style="fill:#E09515;" d="M120.433,139.63c12.853,0,23.273-10.42,23.273-23.273V93.085H256h112.294v23.273 c0,12.853,10.42,23.273,23.273,23.273c12.853,0,23.273-10.42,23.273-23.273V69.812c0-12.853-10.42-23.273-23.273-23.273H279.273 v-23.26c0-12.853-10.42-23.273-23.273-23.273c-12.853,0-23.273,10.42-23.273,23.273v23.26H120.433 c-12.853,0-23.273,10.42-23.273,23.273v46.545C97.161,129.21,107.58,139.63,120.433,139.63z"></path>
                        <path style="fill:#E09515EFC27B;" d="M120.433,182.108c-38.498,0-69.818,31.32-69.818,69.818s31.32,69.818,69.818,69.818 s69.818-31.32,69.818-69.818S158.933,182.108,120.433,182.108z"></path>
                        <path style="fill:#E095155286FA;" d="M120.433,368.289C54.025,368.289,0,422.315,0,488.721c0,12.853,10.42,23.273,23.273,23.273h97.161 h97.159c12.853,0,23.273-10.42,23.273-23.273C240.865,422.315,186.84,368.289,120.433,368.289z"></path>
                        <path style="fill:#E09515ECB45C;" d="M50.615,251.926c0,38.498,31.32,69.818,69.818,69.818V182.108 C81.936,182.108,50.615,213.428,50.615,251.926z"></path>
                        <path style="fill:#E095153D6DEB;" d="M0,488.721c0,12.853,10.42,23.273,23.273,23.273h97.161V368.289C54.025,368.289,0,422.315,0,488.721z "></path>
                        <path style="fill:#E09515EFC27B;" d="M391.567,182.108c-38.498,0-69.818,31.32-69.818,69.818s31.32,69.818,69.818,69.818 s69.818-31.32,69.818-69.818S430.064,182.108,391.567,182.108z"></path>
                        <path style="fill:#E0951500E7F0;" d="M391.567,368.289c-66.406,0-120.432,54.025-120.432,120.432c0,12.853,10.42,23.273,23.273,23.273 h97.159h97.161c12.853,0,23.273-10.42,23.273-23.273C512,422.315,457.975,368.289,391.567,368.289z"></path>
                        <path style="fill:#E09515ECB45C;" d="M321.749,251.926c0,38.498,31.32,69.818,69.818,69.818V182.108 C353.067,182.108,321.749,213.428,321.749,251.926z"></path>
                        <path style="fill:#E0951500D7DF;" d="M271.135,488.721c0,12.853,10.42,23.273,23.273,23.273h97.159V368.289 C325.16,368.289,271.135,422.315,271.135,488.721z"></path>
                     </g>
                  </svg>
                  <h4 class="pt-3">Binary income</h4>
                  <h4 class="counter" style="visibility: visible;">0</h4>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="app">
      <div class="col-sm-2">
         <div class="card shining-card">
            <div class="card-body">
               <div class="text-center">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="30px" height="30px" fill="#000000">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <rect x="160" y="357.424" style="fill:#E09515;" width="192" height="108.336"></rect>
                        <polygon points="160,376.16 274.24,376.16 160,434.064 "></polygon>
                        <path style="fill:#E09515999999;" d="M377.456,487.84H134.544c-9.424,0-17.12-7.712-17.12-17.12l0,0c0-9.424,7.712-17.12,17.12-17.12 H377.44c9.424,0,17.12,7.712,17.12,17.12l0,0C394.576,480.144,386.864,487.84,377.456,487.84z"></path>
                        <path style="fill:#E09515D6D6D6;" d="M480,376.16H32c-17.6,0-32-14.4-32-32v-288c0-17.6,14.4-32,32-32h448c17.6,0,32,14.4,32,32v288 C512,361.76,497.6,376.16,480,376.16z"></path>
                        <rect x="21.968" y="46.096" style="fill:#E09515;" width="468.16" height="308.128"></rect>
                        <path style="fill:#E095150BA4E0;" d="M153.104,268.608l-34.112-73.952c0,0-35.792,0.48-35.792,33.408s0,40.56,0,40.56 S153.344,268.608,153.104,268.608z"></path>
                        <circle style="fill:#E09515FFFFFF;" cx="154.784" cy="148.368" r="35.312"></circle>
                        <path style="fill:#E095150BA4E0;" d="M156.448,268.608l34.112-73.952c0,0,35.792,0.48,35.792,33.408s0,40.56,0,40.56 S156.208,268.608,156.448,268.608z"></path>
                        <g>
                           <polygon style="fill:#E09515FFFFFF;" points="154.784,194.656 130.208,194.656 154.784,249.056 179.36,194.656 "></polygon>
                           <circle style="fill:#E09515FFFFFF;" cx="357.216" cy="148.368" r="35.312"></circle>
                        </g>
                        <g>
                           <path style="fill:#E095150BA4E0;" d="M355.552,268.608l-34.112-73.952c0,0-35.792,0.48-35.792,33.408s0,40.56,0,40.56 S355.792,268.608,355.552,268.608z"></path>
                           <path style="fill:#E095150BA4E0;" d="M358.896,268.608l34.112-73.952c0,0,35.792,0.48,35.792,33.408s0,40.56,0,40.56 S358.656,268.608,358.896,268.608z"></path>
                        </g>
                        <polygon style="fill:#E09515FFFFFF;" points="357.216,194.656 332.64,194.656 357.216,249.056 381.792,194.656 "></polygon>
                     </g>
                  </svg>
                  <h4 class="pt-3">Mining income</h4>
                  <h4 class="counter" style="visibility: visible;">0</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-2">
         <div class="card shining-card">
            <div class="card-body">
               <div class="text-center">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" width="30px" height="30px" fill="#eee7e7">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <circle style="fill:#E09515;" cx="254" cy="254" r="254"></circle>
                        <g>
                           <path style="fill:#E09515FFFF;" d="M418.4,158c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.2,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,144.4,416,150.4,418.4,158 L418.4,158z"></path>
                           <path style="fill:#E09515FFFF;" d="M418.4,291.6c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,278,416,284,418.4,291.6 L418.4,291.6z"></path>
                           <path style="fill:#E09515FFFF;" d="M418.4,425.2c-14,13.6-34,22-56.8,22c-22.4,0-42.8-8.4-56.8-22l0,0c2.4-7.2,7.6-13.6,14.8-16.8 l22-10.4c0.8-2.8,4-6.8,4-6.8c-1.6-2.4-2.8-5.2-4-8c-1.6,0-3.6-1.6-4.8-3.6c-1.2-2-0.8-4.4,0-6c-3.6-9.2-6-23.2,5.6-33.6l-5.6,1.2 c0,0,6.8-12.8,20.4-8c0,0-1.2-2-5.6-3.2c0,0,6-2.8,9.6,1.6c0,0,2-1.6,0-3.2c0,0,10.8,0.4,20,9.2c12.4,12,9.6,27.2,5.2,37.2 c0.4,1.2,0.4,3.2-0.4,4.8c-0.8,2-2.4,3.2-4,3.6c-0.8,1.2-3.6,6-4.8,8c0,0,3.6,4,4,6.8l22,10.4C410.8,411.6,416,417.6,418.4,425.2 L418.4,425.2z"></path>
                        </g>
                        <path style="fill:#E09515324A5E;" d="M137.2,426c0,0,2.4,8-0.8,10.4c0,0-3.2,0.8-2.8,5.2c0,0,0,5.2-6.8,4.8c0,0-17.6,2-20.4-2 c0,0-2-2.4-0.8-6l20.8-7.6L137.2,426z"></path>
                        <g>
                           <path style="fill:#E095152B3B4E;" d="M134.4,414c0,0,7.6,6.4,2,15.2c0,0-4,5.6-4,8.4c0,0,0.4,8.8-8.8,6.8c0,0-9.2-6.8-15.6-1.2 c0,0-4.8-0.4-2.4-6.8c0,0,5.2-6.8,8.4-12.8c0,0,2-1.2,0.8-6L134.4,414z"></path>
                           <path style="fill:#E095152B3B4E;" d="M155.6,426c0,0-2.4,8,0.8,10.4c0,0,3.2,0.8,2.8,5.2c0,0,0,5.2,6.8,4.8c0,0,17.6,2,20.4-2 c0,0,2-2.4,0.8-6l-20.8-7.6L155.6,426z"></path>
                        </g>
                        <path style="fill:#E09515324A5E;" d="M158,414c0,0-7.6,6.4-2,15.2c0,0,4,5.6,4,8.4c0,0-0.4,8.8,8.8,6.8c0,0,9.2-6.8,15.6-1.2 c0,0,4.8-0.4,2.4-6.8c0,0-5.2-6.8-8.4-12.8c0,0-2-1.2-0.8-6L158,414z"></path>
                        <polygon style="fill:#E09515E6E9EE;" points="127.6,125.2 145.2,194.8 163.2,125.2 "></polygon>
                        <polygon style="fill:#E095151543F;" points="150.4,132.8 152.8,125.2 139.6,125.2 142,132.8 "></polygon>
                        <polygon style="fill:#E095157058;" points="150.4,132.8 146.4,132.8 142,132.8 133.2,185.6 146.4,194.4 159.6,185.6 "></polygon>
                        <path style="fill:#E09515324A5E;" d="M112.8,222.8c-3.2,18-6.8,50.4-0.8,88c0,0,5.6,86.8,0.4,106c0,0,10.4,18,28.4,0 c0,0,0.4-142.8,5.2-148.8v-45.2H112.8z"></path>
                        <path style="fill:#E095152B3B4E;" d="M146,222.8v45.6c4.8,6,5.2,148.8,5.2,148.8c18,18,28.4,0,28.4,0c-5.2-19.2,0.4-106,0.4-106 c6-37.6,2.4-70-0.8-88H146V222.8z"></path>
                        <polygon style="fill:#E09515CED5E0;" points="160.4,115.6 132,115.6 128,125.2 162.8,125.2 "></polygon>
                        <path style="fill:#E095152B3B4E;" d="M129.2,121.6l-31.6,11.6c0,0,19.2,58.4,10.8,97.6c0,0-3.2,20-0.8,35.2c0,0,22,16,30.4,1.2 c0,0,11.2-35.2,9.2-69.6l-10-26.4L129.2,121.6z"></path>
                        <g>
                           <path style="fill:#E09515324A5E;" d="M132,115.6L116.8,132l5.6,2.4l-4.4,4c0,0,14.4,43.6,29.2,58.8C147.2,197.6,131.2,129.6,132,115.6z"></path>
                           <path style="fill:#E09515324A5E;" d="M163.2,121.6l31.6,11.6c0,0-19.2,58.4-10.8,97.6c0,0,3.2,20,0.8,35.2c0,0-22,16-30.4,1.2 c0,0-11.2-35.2-9.2-69.6l10-26.4L163.2,121.6z"></path>
                        </g>
                        <g>
                           <path style="fill:#E095152B3B4E;" d="M160.4,115.6l15.2,16.4l-5.6,2.4l4.4,4c0,0-14.4,43.6-29.2,58.8 C145.2,197.6,161.2,129.6,160.4,115.6z"></path>
                           <circle style="fill:#E095152B3B4E;" cx="150.8" cy="200.8" r="3.2"></circle>
                        </g>
                        <polygon style="fill:#E095157058;" points="165.6,175.2 170.8,166.4 179.2,172.4 "></polygon>
                        <rect x="163.226" y="172.418" transform="matrix(-0.9789 0.2042 -0.2042 -0.9789 376.4811 310.3871)" style="fill:#E095152B3B4E;" width="17.999" height="4.4"></rect>
                        <path style="fill:#E095159B54C;" d="M196.8,260.8c0.4,3.6,0.4,6,0.4,6c0.8,0.8,3.2,4,3.2,4c4.4,3.6,2,6.4,2,6.4l0.4,2.8 c1.2,1.2,0.4,3.6,0.4,3.6c-2.4,4.4-4,0.8-4,0.8c-2.4,3.2-4-0.8-4-0.8c-3.2,1.2-4-1.6-4-1.6s-5.6,0.8-4.4-11.6c0.4-2.8,0.4-6,0-9.2 h10V260.8z"></path>
                        <path style="fill:#E09515;" d="M192,273.2c0-0.4,0.4-2.4,0.4-2.4c-0.8,2.4,2,4,2,4c-0.4,0-0.4-1.6-0.4-1.6c0.4,2,4,3.6,4,3.6 c0.4-1.2,1.6-2.4,1.6-2.4c-0.8,1.2-1.2,2.4-1.2,2.4c0.8,0,1.2,0.8,1.2,0.8c-0.8-0.8-1.2,0-1.2,0c1.6,0.4,1.2,2,1.2,2 c0-1.6-1.2-1.6-1.2-1.6c0.8,0.8,0.4,1.6,0.4,1.6c0-1.2-1.6-1.6-1.6-1.6c0.8-1.2,0-0.8,0-0.8c-1.6-2-2,0.4-2.4,0.8h-0.4 c0.8-2,0-2.4,0-2.4c-1.6-1.2-1.6,0.8-1.6,0.8c0,3.2-2.4,4.8-2.4,4.8h-0.8c1.6-0.8,2-2.4,2-2.4c1.2-3.2-0.4-3.6-0.4-3.6 c-2.8-0.4-2,2-2,2c-1.2,0.4-2.4,0-2.4,0c0.4,0,1.2-0.8,1.2-0.8c1.2-0.8-0.4-2.8-0.4-2.8c0.8,0.8,4,0.8,4,0.8c1.6,0,0.4-1.6,0.4-1.6 l-0.8,0.4c0-0.4-0.8-2.4-0.8-2.4C191.2,271.2,192,272.8,192,273.2z"></path>
                        <g>
                           <path style="fill:#E095159B54C;" d="M202.8,278c0,0-0.4,0.4-1.6,2.4c0,0-0.4,0.4-0.4,0.8c-0.4,0.8-0.8,0.8-1.6,0.8 c-0.8-0.4-2-0.4-2.8-0.4c0,0-0.8,0-1.6,0c-0.4,0-0.8-0.4-0.8-0.8c0.4-0.8,0.8-2,2.4-2c0,0,1.6-0.4,2.4,0c0,0-2.8-0.8-4,0.8 c0,0-1.6,1.6-0.4,2.4c0,0,4,0,4.4,0.4c0,0,1.6,0.8,2.4-0.4c0,0,0.4-2,2-1.6c0,0-0.4-0.4-1.2-0.4C201.6,280,202,278.8,202.8,278z"></path>
                           <path style="fill:#E095159B54C;" d="M199.2,282c-0.4,0.8,0.4,2.8,0.4,2.8c-0.4-0.4-0.4-0.8-0.4-0.8c0,0.4-0.4,0.4-0.4,0.8 c0.4-1.2,0-2.8,0-2.8H199.2z"></path>
                           <path style="fill:#E095159B54C;" d="M195.2,283.6C195.2,283.6,195.2,283.2,195.2,283.6c-0.4-0.4-0.4-0.4-0.4-0.4c0.4-0.8,0.4-2,0.4-2 h0.4C196,282.4,195.2,283.6,195.2,283.6z"></path>
                        </g>
                        <rect x="185.2" y="254.8" style="fill:#E09515FFFF;" width="13.2" height="9.2"></rect>
                        <path style="fill:#E095159B54C;" d="M96,260.8c-0.4,3.6-0.4,6-0.4,6c-0.8,0.8-3.2,4-3.2,4c-4.4,3.6-2,6.4-2,6.4L90,280 c-1.2,1.2-0.4,3.6-0.4,3.6c2.4,4.4,4,0.8,4,0.8c2.4,3.2,4-0.8,4-0.8c3.2,1.2,4-1.6,4-1.6s5.6,0.8,4.4-11.6c-0.4-2.8-0.4-6,0-9.2H96 V260.8z"></path>
                        <path style="fill:#E09515;" d="M100.8,273.2c0-0.4-0.4-2.4-0.4-2.4c0.8,2.4-2,4-2,4c0.4,0,0.4-1.6,0.4-1.6c-0.4,2-4,3.6-4,3.6 c-0.4-1.2-1.6-2.4-1.6-2.4c0.8,1.2,1.2,2.4,1.2,2.4c-0.8,0-1.2,0.8-1.2,0.8c0.8-0.8,1.2,0,1.2,0c-1.6,0.4-1.2,2-1.2,2 c0-1.6,1.2-1.6,1.2-1.6c-0.8,0.8-0.4,1.6-0.4,1.6c0-1.2,1.6-1.6,1.6-1.6c-0.8-1.2,0-0.8,0-0.8c1.6-2,2,0.4,2.4,0.8h0.4 c-0.8-2,0-2.4,0-2.4c1.6-1.2,1.6,0.8,1.6,0.8c0,3.2,2.4,4.8,2.4,4.8h0.8c-1.6-0.8-2-2.4-2-2.4c-1.2-3.2,0.4-3.6,0.4-3.6 c2.8-0.4,2,2,2,2c1.2,0.4,2.4,0,2.4,0c-0.4,0-1.2-0.8-1.2-0.8c-1.2-0.8,0.4-2.8,0.4-2.8c-0.8,0.8-4,0.8-4,0.8 c-1.6,0-0.4-1.6-0.4-1.6l0.8,0.4c0-0.4,0.8-2.4,0.8-2.4C101.6,271.2,100.8,272.8,100.8,273.2z"></path>
                        <g>
                           <path style="fill:#E095159B54C;" d="M90.4,278c0,0,0.4,0.4,1.6,2.4c0,0,0.4,0.4,0.4,0.8c0.4,0.8,0.8,0.8,1.6,0.8c0.8-0.4,2-0.4,2.8-0.4 c0,0,0.8,0,1.6,0c0.4,0,0.8-0.4,0.8-0.8c-0.4-0.8-0.8-2-2.4-2c0,0-1.6-0.4-2.4,0c0,0,2.8-0.8,4,0.8c0,0,1.6,1.6,0.4,2.4 c0,0-4,0-4.4,0.4c0,0-1.6,0.8-2.4-0.4c0,0-0.4-2-2-1.6c0,0,0.4-0.4,1.2-0.4C91.2,280,90.8,278.8,90.4,278z"></path>
                           <path style="fill:#E095159B54C;" d="M93.6,282c0.4,0.8-0.4,2.8-0.4,2.8c0.4-0.4,0.4-0.8,0.4-0.8c0,0.4,0.4,0.4,0.4,0.8 c-0.4-1.2,0-2.8,0-2.8H93.6z"></path>
                           <path style="fill:#E095159B54C;" d="M97.6,283.6C97.6,283.6,97.6,283.2,97.6,283.6c0.4-0.4,0.4-0.4,0.4-0.4c-0.4-0.8-0.4-2-0.4-2h-0.4 C96.8,282.4,97.6,283.6,97.6,283.6z"></path>
                        </g>
                        <rect x="94.4" y="254.8" style="fill:#E09515FFFF;" width="13.2" height="9.2"></rect>
                        <path style="fill:#E095152B3B4E;" d="M201.2,260h-18.4c0,0-0.4-47.2,2-56.4c0,0,0.8-9.2-1.6-16.8c3.2-28.4,11.6-53.6,11.6-54 C194.8,133.2,204,156.4,201.2,260z"></path>
                        <path style="fill:#E09515324A5E;" d="M91.2,260h18.4c0,0,0.4-47.2-2-56.4c0,0-0.8-9.2,1.6-16.8c-3.2-28.4-11.6-53.6-11.6-54 C97.6,133.2,88.4,156.4,91.2,260z"></path>
                        <ellipse style="fill:#E095159B54C;" cx="146.4" cy="112" rx="12" ry="13.2"></ellipse>
                        <g>
                           <path style="fill:#E09515FFFF;" d="M158,109.6c0,0,2.4,11.6-11.6,15.6c0,0,8,1.6,11.6,11.6C157.6,136.8,167.2,122,158,109.6z"></path>
                           <path style="fill:#E09515FFFF;" d="M134.4,109.6c0,0-2.4,11.6,11.6,15.6c0,0-8,1.6-11.6,11.6C134.8,136.8,125.6,122,134.4,109.6z"></path>
                        </g>
                        <path style="fill:#E09515;" d="M163.2,100c-1.6,4.8-2.4,8-2.4,8.4l0,0c-4,5.2-8.8,8.8-14.4,8.8c-5.2,0-9.6-3.2-13.2-8 c-8-10-2.4-28-2.4-28c4,4.4,16.8,4.8,16.8,4.8c-5.2-0.8-6.4-4.8-6.4-5.6c1.2,2.8,13.6,4.4,13.6,4.4C167.6,87.2,163.2,100,163.2,100z "></path>
                        <path style="fill:#E09515324A5E;" d="M139.2,62.4c0,0,17.6-7.2,26.8,8.8c9.6,17.2-2.4,35.6-4.8,37.2c0,0,0.8-2.8,2.4-8.8 c0,0,4.4-12.8-8.8-14.8c0,0-12.4-1.6-13.6-4.4c0,0,0.8,4.4,6.4,5.6c0,0-12.8-0.4-16.8-4.8c0,0-5.6,18,2.4,28c0,0-14-11.2-12.4-28.4 C121.2,81.2,120.4,57.6,139.2,62.4z"></path>
                        <path style="fill:#E095157058;" d="M271.2,104.4H300c2.8,0,5.6-2.4,5.6-5.6s-2.4-5.6-5.6-5.6h-34c-2.8,0-5.6,2.4-5.6,5.6v146.4h-28.8 c-2.8,0-5.6,2.4-5.6,5.6c0,2.8,2.4,5.6,5.6,5.6h28.8v146.4c0,2.8,2.4,5.6,5.6,5.6h30c2.8,0,5.6-2.4,5.6-5.6c0-2.8-2.4-5.6-5.6-5.6 h-24.8V104.4z"></path>
                     </g>
                  </svg>
                  <h4 class="pt-3">level income</h4>
                  <h4 class="counter" style="visibility: visible;">0</h4>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <?php 
      $mining_data=$this->db->order_by('id','desc')->group_by('percentage')->where('status','Active')->get('package')->result_array();
      foreach($mining_data as $key => $mining){
      ?>   
   <div class="col-lg-6">
      <div class="card">
         <div class="card-body text-center">
            <div class="gif-container">
               <img src="<?=BASEURL?>assets/images/gif/3.gif" class="img-fluid img-responsive" alt="Bincoin Mining">
            </div>
            <div class="pt-3">
               <h4 class="counter" style="visibility: visible;"><?=$mining['package_name']?></h4>
               <div class="pt-3">
                  <small> Mining Speed</small>
                  <span style="text-transform: lowercase;"> : <?=$mining['percentage']?> X </span>
               </div>
            </div>
            <form action="<?=BASEURL?>user/index" method="post">
               <div class="pricing d-flex justify-content-between align-items-center">
                  <div class="me-2">
                     <select style="background-color: #ff971d;color:white;margin-top: 29px;height:47px;" name="package" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected="">Select Package</option>
                        <?php 
                           $package =$this->db->where('percentage',$mining['percentage'])->get('package')->result_array();
                           foreach($package as $key => $pack){
                           ?> 
                        <option value="<?=$pack['id']?>"><?=$pack['value']?> TRX</option>
                        <?php } ?>
                     </select>
                  </div>
                  <div>
                     <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Activate</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <?php } ?>
   <!--<div class="col-lg-6">-->
   <!--   <div class="card">-->
   <!--      <div class="card-body text-center">-->
   <!--         <div class="gif-container">-->
   <!--            <img src="<?=BASEURL?>assets/images/gif/bitcoin-mining.gif" class="img-fluid img-responsive" alt="Bincoin Mining">-->
   <!--         </div>-->
   <!--         <div class="pt-3">-->
   <!--            <h4 class="counter" style="visibility: visible;">Weekly Income</h4>-->
   <!--            <div class="pt-3">-->
   <!--               <small> 2.35 USDT</small>-->
   <!--               <small> Mining Speed</small>-->
   <!--               <span style="text-transform: lowercase;">x 0.5</span>-->
   <!--            </div>-->
   <!--         </div>-->
   <!--         <div class="pricing d-flex justify-content-between align-items-center">-->
   <!--            <div>-->
   <!--               <button style="margin-top: 10px;" class="btn btn-primary">Activate.S</button>-->
   <!--            </div>-->
   <!--            <div>-->
   <!--               <button style="margin-top: 10px;" type="button" class="btn btn-primary">Standard</button>-->
   <!--            </div>-->
   <!--         </div>-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->
   <!--<div class="col-lg-6">-->
   <!--   <div class="card">-->
   <!--      <div class="card-body text-center">-->
   <!--         <div class="gif-container">-->
   <!--            <img src="<?=BASEURL?>assets/images/gif/bitcoin-mining.gif" class="img-fluid img-responsive" alt="Bincoin Mining">-->
   <!--         </div>-->
   <!--         <div class="pt-3">-->
   <!--            <h4 class="counter" style="visibility: visible;">Weekly Income</h4>-->
   <!--            <div class="pt-3">-->
   <!--               <small> 2.35 USDT</small>-->
   <!--               <small> Mining Speed</small>-->
   <!--               <span style="text-transform: lowercase;">x 0.5</span>-->
   <!--            </div>-->
   <!--         </div>-->
   <!--         <div class="pricing d-flex justify-content-between align-items-center">-->
   <!--            <div>-->
   <!--               <button style="margin-top: 10px;" class="btn btn-primary">Activate.S</button>-->
   <!--            </div>-->
   <!--            <div>-->
   <!--               <button style="margin-top: 10px;" type="button" class="btn btn-primary">Standard</button>-->
   <!--            </div>-->
   <!--         </div>-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->
   <!--<div class="col-lg-6">-->
   <!--   <div class="card">-->
   <!--      <div class="card-body text-center">-->
   <!--         <div class="gif-container">-->
   <!--            <img src="<?=BASEURL?>assets/images/gif/bitcoin-mining.gif" class="img-fluid img-responsive" alt="Bincoin Mining">-->
   <!--         </div>-->
   <!--         <div class="pt-3">-->
   <!--            <h4 class="counter" style="visibility: visible;">Weekly Income</h4>-->
   <!--            <div class="pt-3">-->
   <!--               <small> 2.35 USDT</small>-->
   <!--               <small> Mining Speed</small>-->
   <!--               <span style="text-transform: lowercase;">x 0.5</span>-->
   <!--            </div>-->
   <!--         </div>-->
   <!--         <div class="pricing d-flex justify-content-between align-items-center">-->
   <!--            <div>-->
   <!--               <button style="margin-top: 10px;" class="btn btn-primary">Activate.S</button>-->
   <!--            </div>-->
   <!--            <div>-->
   <!--               <button style="margin-top: 10px;" type="button" class="btn btn-primary">Standard</button>-->
   <!--            </div>-->
   <!--         </div>-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->
</div>
<div class="row">
   <div class="col-lg-12">
      <div class="card card-block card-stretch custom-scDirect Referall">
         <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <div class="caption">
               <h4 class="font-weight-bold mb-2">Mining Server Configuration</h4>
               <!--<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
            </div>
            <!--<div class="btn-group" Direct Referale="group" aria-label="Basic checkbox toggle button group">-->
            <!--   <input type="checkbox" class="btn-check" id="btncheck1">-->
            <!--   <label class="btn btn-sm btn-secondary active rounded-start" for="btncheck1">Monthly</label>-->
            <!--   <input type="checkbox" class="btn-check" id="btncheck2">-->
            <!--   <label class="btn btn-sm btn-secondary " for="btncheck2">Weekly</label>-->
            <!--   <input type="checkbox" class="btn-check" id="btncheck3">-->
            <!--   <label class="btn btn-sm btn-secondary rounded-end" for="btncheck3">Today</label>-->
            <!--</div>-->
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table data-table mb-0">
                  <thead>
                     <tr>
                        <th scope="col">Server Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Speed</th>
                        <th scope="col">Mining</th>
                        <th scope="col">Counter</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        foreach($timer as $key => $r)
                        {
                        $pack = $this->db->where('id',$r['package_id'])->get('package')->row_array();
                        ?>
                     <tr class="white-space-no-wrap">
                        <td>
                           <img src="<?=BASEURL?>assets/images/coins/02.png" class="img-fluid avatar avatar-30 avatar-rounded" alt="img23" />
                           <?=$pack['package_name'];?><a class="button btn-primary badge ms-2" type="button"></a>
                        </td>
                        <td class="pe-2"><?=$r['amount']?></td>
                        <td class="text-success">
                           <!--<svg width="10" height="8" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                           <!--   <path d="M4 4.5L0.535898 0L7.4641 0L4 4.5Z" fill="#FF2E2E"/>-->
                           <!--</svg>-->
                           <?=$pack['percentage']?>X
                        </td>
                        <td class="text-success">
                           <svg width="10" height="8" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4 0.5L7.4641 5H0.535898L4 0.5Z" fill="#00EC42"/>
                           </svg>
                           --
                        </td>
                        <td>
                           <div id="counter<?=$r['id']?>"></div>
                        </td>
                        <td>
                           <?php if($r['end_time'] == NULL){ ?>
                           <form action="<?=BASEURL?>user/start_timer" method="post">
                              <input type="hidden" value="<?=$r['up_id']?>" name="pack_id">
                              <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-play me-1"></i>Start</button>
                           </form>
                           <?php }else{
                              ?>
                           <button disabled class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-play me-1"></i>Start</button>
                           <?php } ?>
                        </td>
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
</div>
<?php// $stime = $this->db->select('start_time')->order_by('id','DESC')->where('user_id',$this->session->userdata('micusername'))->get('timer')->row()->start_time+0;
   // if($stime != 0)
   // {
   //   $timer = $stime; 
   //   $action = 'load';
   // }else{
   //   $timer = time();
   //   $action = 'click';
   // }
   ?>
<?php 
   //date_default_timezone_set("Asia/Kolkata");
   //$currentDateTime = date('Y-m-d H:i:s');
   //$addingFiveMinutes=  $timer['end_time'];
   //$getDateTime = $timer['end_time']; 
   ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   //   $(document).ready(function() {
         var timer = <?php echo json_encode($timer); ?>;
         console.log(timer);
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
                       // Output the result in an element with id="counter"11
                       document.getElementById("counter"+value.id).innerHTML =  hours + "h " +
                       minutes + "m " + seconds + "s ";
                       // If the count down is over, write some text 
                       if (distance < 0) {
                           clearInterval(x);
                           document.getElementById("counter"+value.id).innerHTML = "COMPLETED";
                           //alert(value.up_id);
                           $.post('<?=BASEURL?>admin/generate_roi', {
                               'up_id': value.up_id,
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
                  document.getElementById("counter"+value.id).innerHTML = 0 + "h " +
                   0 + "m " + 0 + "s ";
              }
          });
    // });
       
</script>
<script> 
   // function makeTimer() {
   
   // 	//		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
   // 	//alert('Hii');
   // 	var dttime = "<?php echo $timer['end_time']?>";
   //     	if(dttime == "")
   //     	{
   //     	   $("#days").html("");
   //     	   $("#hours").html("");
   //     	   $("#minutes").html("");
   //     	   $("#seconds").html(""); 
   //     	}else{
   //     		var endTime = new Date(dttime +" GMT+05:30");			
   //     			endTime = (Date.parse(endTime) / 1000);
       
   //     			var now = new Date();
       			
   //     			now = (Date.parse(now) / 1000);
   //                 //alert(now +" Now");
   //                 //alert(endTime + "end time");
   //     			var timeLeft = endTime - now;
       
   //     			var days = Math.floor(timeLeft / 86400); 
   //     			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
   //     			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
   //     			var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
         
   //     			if (hours < "10") { hours = "0" + hours; }
   //     			if (minutes < "10") { minutes = "0" + minutes; }
   //     			if (seconds < "10") { seconds = "0" + seconds; }
       
   //     			$("#days").html(days + "<span> Days </span>");
   //     			$("#hours").html(hours + "<span> Hours </span>");
   //     			$("#minutes").html(minutes + "<span> Minutes </span>");
   //     			$("#seconds").html(seconds + "<span></span>");
       			
   //     // 			if(now > endTime)
   //     // 			{
   //     // 			    location.reload();
   //     // 			}
   //     	}	
   
   // 	}
   
   // 	setInterval(function() { makeTimer(); }, 1000);
</script>
<?php include 'footer.php';?>