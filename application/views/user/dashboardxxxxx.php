<?php include 'header.php';?>


<?php  $timer = $this->db->where('status','Active')->where('user_id',$this->session->userdata('micusername'))->get('user_package')->result_array(); ?>
<div class="container-fluid content-inner pb-0">
   <?php if(!empty($timer)){ ?>  
   <div class="bd-example">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
            <?php 
               foreach($timer as $key => $tr)
               {
                   $p =$this->db->where('id',$tr['package_id'])->get('package')->row_array(); 
               ?>   
            <div class="carousel-item <?php if($key == 0){ echo "active"; } ?>">
               <div class="row">
                  <div class="col-lg-6">
                     <div>
                        <p><?=$p['package_name']?></p>
                     </div>
                     <div class="card mining">
                        <div class="card-body mining text-center">
                           <div class="row">
                              <div class="gif-container">
                                 <img src="<?=BASEURL?>assets/images/<?php if($tr['end_time'] == NULL){ echo "bit.png";}else{ echo "bitcoin-gif.gif"; }?>" class="topmining" alt="Bincoin Mining" width="200px">
                              </div>
                              <div class="timer">
                                 <div class="time">
                                    <?php if($tr['end_time'] == NULL){
                                       $image = $p['image'];
                                       ?>
                                    <form id="form1" action="<?=BASEURL?>user/start_timer" method="post">
                                       <input type="hidden" value="<?=$tr['up_id']?>" name="pack_id">
                                       <button id="bbbb" type="submit"><img src="<?=BASEURL?>assets/images/power-button1.gif" class="power-button bt" alt="Bincoin Mining" width="200px"></button>
                                    </form>
                                    <?php }else{
                                       $image = $p['gif'];
                                       ?>
                                    <div id="counter mt-2r<?=$tr['id']?>"></div>
                                    <?php } ?>
                                 </div>
                              </div>
                              <!--<div class="timer">-->
                              <!--   <div class="time">-->
                              <!--   </div>-->
                              <!--</div>-->
                              <span class="trxmining" id="mininval<?=$tr['id']?>">0.00000000000000</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div>
                        <p><br></p>
                     </div>
                     <div class="card">
                        <div class="card-body mining text-center">
                           <div class="gif-container">
                              <img src="<?=BASEURL?>assets/images/<?=$image?>" class="topmining" alt="Bincoin Mining" width="200px">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
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
   <?php } ?>
   <div class="row desktop">
      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body ">
                <div class="row d-flex align-items-center">
                   
                <div class="col-2">
                    
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
                  </div>
                  <div class="col">
                  <?php 
                     $total_earnings = $this->db->select_sum('credit')->where('entry_date <=',date('Y-m-d H:i:s'))->where('username',$this->session->userdata('micusername'))->get('account')->row()->credit+0;
                     $total_withdraw = $this->db->select_sum('debit')->where('remark','Withdraw')->where('username',$this->session->userdata('micusername'))->get('account')->row()->debit+0;
                     $binary_income = $this->db->select_sum('credit')->where('remark','Pair Income')->where('username',$this->session->userdata('micusername'))->get('account')->row()->credit+0;
                     ?>
                   <h4 class="pt-3">TOTAL EARNINGS</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($total_earnings,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
                  
               </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
                 <div class="row d-flex align-items-center">
                <div class="col-2">
                  <svg fill="#fcfcfc" width="30px" height="30px" viewBox="0 0 24 24" id="down-direction-circle" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <circle id="primary" cx="12" cy="12" r="10" style="fill: #e09515;"></circle>
                        <path id="secondary" d="M10,12V8a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1v4h.82a1,1,0,0,1,.76,1.65l-2.82,3.27a1,1,0,0,1-1.52,0L8.42,13.65A1,1,0,0,1,9.18,12Z" style="fill: #e09515E09515;"></path>
                     </g>
                  </svg>
                 </div>
                  <div class="col">
                  <h4 class="pt-3">TOTAL WITHDRAW</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($total_withdraw,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
               </div>
            </div>
            </div>
         </div>
      </div>
      <?php $balance = $this->db->select('sum(credit) - sum(debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('user_id',$this->session->userdata('micusername'))->get('e_wallet')->row()->balance+0;?>
      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
               <div class="row d-flex align-items-center">
                <div class="col-2">
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
                  </div>
                   <div class="col">
                  <h4 class="pt-3">E-WALLET</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($balance,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
               </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
              <div class="row d-flex align-items-center">
                <div class="col-2">
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
                  </div>
                  <div class="col">
                  <?php  $withdraw = $this->db->select('sum(credit) - sum(debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('username',$this->session->userdata('micusername'))->get('account')->row()->balance+0; ?>
                  <h4 class="pt-3">WITHDRAW WALLET</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($withdraw,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
               </div>
            </div>
            </div>
            </div>
         </div>

      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
               <div class="row d-flex align-items-center">
                <div class="col-2">
                  <svg fill="#E09515" width="30px" height="30px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#E09515">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <path d="M1587.854 1133.986c-109.666-42.353-223.51-72.057-339.276-91.257h-5.195c135.53-91.369 224.866-246.324 224.866-421.609v-24.847c-28.235 18.07-64.377 41.788-115.087 57.713-15.925 202.165-186.466 362.428-393.148 362.428-199.793 0-365.93-148.97-390.777-342.212-3.388-16.94-4.517-34.898-4.517-53.082v-60.988c1.355-.113 2.258-.452 3.614-.678 10.503-1.807 19.877-4.179 29.364-6.663 8.132-2.033 16.15-4.18 23.38-6.664 7.905-2.71 15.472-5.421 22.587-8.583 8.132-3.502 15.586-7.116 23.04-10.956 5.083-2.823 10.391-5.308 15.135-8.132a662.834 662.834 0 0 0 20.668-12.762c3.388-2.259 7.34-4.518 10.503-6.55 4.857-3.163 9.6-5.986 14.344-8.923 34.447-21.572 67.313-38.4 128.527-38.513h.226c53.195 0 84.932 12.085 114.635 29.026 9.826 5.647 19.539 11.972 29.817 18.522 35.124 22.815 73.976 47.549 133.722 58.956.678.113 1.13.452 1.807.564 20.33 3.728 43.143 5.873 69.007 5.873.452 0 .79-.113 1.242-.113 103.342-.225 157.214-34.785 204.537-65.392l55.793-34.448v-.112l.564-.452-3.952-21.346-2.372-15.473c-5.308-34.447-15.247-67.426-27.22-99.501-24.733-66.748-62.568-127.963-114.521-179.803-26.993-27.218-57.6-50.936-89.224-70.136-80.188-50.71-173.93-77.93-269.93-77.93-220.235 0-408.846 141.177-478.87 338.824-19.2 53.082-29.365 109.553-29.365 169.412V621.12c0 19.2 1.13 38.4 3.502 56.47C472.108 829.949 557.152 960.735 678 1042.166h-5.083c-111.812 18.41-222.042 46.983-328.433 87.19-140.612 53.309-231.53 183.417-231.53 331.709V1669.1l26.768 16.49c172.235 106.955 454.475 234.353 820.292 234.353 201.938 0 508.235-40.546 820.404-234.353l26.654-16.49v-208.037c0-144.904-88.094-276.255-219.218-327.078" fill-rule="evenodd"></path>
                     </g>
                  </svg>
                  </div>
                  <div class="col">
                  <?php $direct=$this->db->where('ref_id',$this->session->userdata('micusername'))->count_all_results('user_role')+0; ?>
                  <h4 class="pt-3">DIRECT REFERAL</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=$direct?></h4>
               </div>
               </div>
               </div>
            </div>
         </div>

      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
              <div class="row d-flex align-items-center">
                <div class="col-2">
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
                  </div>
                   <div class="col">
                  <h4 class="pt-3">BINARY INCOME</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($binary_income,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
               </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
                 <div class="row d-flex align-items-center">
                <div class="col-2">
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
                  </div>
                  <div class="col">
                  <?php 
                     $direct_income = $this->db->select('sum(credit) + sum(ewallet) as balance')->where('date(entry_date) <=',date('Y-m-d H:i:s'))->where('remark','Direct Income')->where('username',$this->session->userdata('micusername'))->get('account')->row()->balance+0;
                     
                     ?>
                  <h4 class="pt-3">DIRECT INCOME</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($direct_income,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
               </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
                  <div class="row d-flex align-items-center">
                 <div class="col-2">
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
                  <?php 
                     $mining_income = $this->db->select('sum(credit) + sum(ewallet) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('remark','ROI Income')->where('username',$this->session->userdata('micusername'))->get('account')->row()->balance+0;
                     $level_income = $this->db->select('sum(credit) + sum(ewallet) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('remark','Level Income')->where('username',$this->session->userdata('micusername'))->get('account')->row()->balance+0;
                     ?>
                     </div>
                       <div class="col">
                  <h4 class="pt-3">MINING INCOME</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($mining_income,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
               </div>
                 </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
              <div class="row d-flex align-items-center">
                <div class="col-2">
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
                  </div>
                   <div class="col">
                  <h4 class="pt-3">LEVEL INCOME</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($level_income,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
               </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
               <div class="row d-flex align-items-center">
                <div class="col-2">
                  <svg fill="#E09515" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#E09515">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <path d="M21,3H4A2,2,0,0,0,2,5V19a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V8a1,1,0,0,0-1-1H5A1,1,0,0,1,5,5H22V4A1,1,0,0,0,21,3Zm-2.5,9.5A1.5,1.5,0,1,1,17,14,1.5,1.5,0,0,1,18.5,12.5Z"></path>
                     </g>
                  </svg>
                  </div>
                    <div class="col">
                  <h4 class="pt-3">WALLET</h4>
                  <h4 class="counter mt-2" style="visibility: visible;">0 <span style="font-size:12px; color:#fff;">USDT</span></h4>
               </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="card shining-card">
            <div class="card-body">
               <div class="row d-flex align-items-center">
                <div class="col-2">
                  <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <path d="M12.75 15.9203H13.4C14.05 15.9203 14.59 15.3403 14.59 14.6403C14.59 13.7703 14.28 13.6003 13.77 13.4203L12.76 13.0703V15.9203H12.75Z" fill="#E09515"></path>
                        <path d="M11.9701 1.89845C6.45007 1.91845 1.98007 6.40845 2.00007 11.9285C2.02007 17.4485 6.51007 21.9185 12.0301 21.8985C17.5501 21.8785 22.0201 17.3885 22.0001 11.8685C21.9801 6.34845 17.4901 1.88845 11.9701 1.89845ZM14.2601 11.9985C15.0401 12.2685 16.0901 12.8485 16.0901 14.6385C16.0901 16.1785 14.8801 17.4185 13.4001 17.4185H12.7501V17.9985C12.7501 18.4085 12.4101 18.7485 12.0001 18.7485C11.5901 18.7485 11.2501 18.4085 11.2501 17.9985V17.4185H10.8901C9.25007 17.4185 7.92007 16.0385 7.92007 14.3385C7.92007 13.9285 8.26007 13.5885 8.67007 13.5885C9.08007 13.5885 9.42007 13.9285 9.42007 14.3385C9.42007 15.2085 10.0801 15.9185 10.8901 15.9185H11.2501V12.5385L9.74007 11.9985C8.96007 11.7285 7.91007 11.1485 7.91007 9.35845C7.91007 7.81845 9.12007 6.57845 10.6001 6.57845H11.2501V5.99845C11.2501 5.58845 11.5901 5.24845 12.0001 5.24845C12.4101 5.24845 12.7501 5.58845 12.7501 5.99845V6.57845H13.1101C14.7501 6.57845 16.0801 7.95845 16.0801 9.65845C16.0801 10.0685 15.7401 10.4085 15.3301 10.4085C14.9201 10.4085 14.5801 10.0685 14.5801 9.65845C14.5801 8.78845 13.9201 8.07845 13.1101 8.07845H12.7501V11.4585L14.2601 11.9985Z" fill="#E09515"></path>
                        <path d="M9.42188 9.36812C9.42188 10.2381 9.73187 10.4081 10.2419 10.5881L11.2519 10.9381V8.07812H10.6019C9.95188 8.07812 9.42188 8.65812 9.42188 9.36812Z" fill="#E09515"></path>
                     </g>
                  </svg>
                  </div>
                   <div class="col">
                  <?php 
                     $topup = $this->db->select('investment')->where('username',$this->session->userdata('micusername'))->get('user_role')->row()->investment+0;
                     $first_package = $this->db->select('amount')->order_by('id','ASC')->where('user_id',$this->session->userdata('micusername'))->get('user_package')->row()->amount+0;
                     ?>
                  <h4 class="pt-3">TOPUP</h4>
                  <h4 class="counter mt-2" style="visibility: visible;"><?=$topup-$first_package?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
               </div>
               </div>
            </div>
         </div>
      </div>
      <!--<div class="col-lg-4">-->
      <!--     <div class="card shining-card">-->
      <!--        <div class="card-body">-->
      <!--           <div class="text-center">-->
      <!--              <svg fill="#E09515" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#E09515">-->
      <!--                 <g id="SVGRepo_bgCarrier" stroke-width="0"></g>-->
      <!--                 <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>-->
      <!--                 <g id="SVGRepo_iconCarrier">-->
      <!--                    <path d="M21,3H4A2,2,0,0,0,2,5V19a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V8a1,1,0,0,0-1-1H5A1,1,0,0,1,5,5H22V4A1,1,0,0,0,21,3Zm-2.5,9.5A1.5,1.5,0,1,1,17,14,1.5,1.5,0,0,1,18.5,12.5Z"></path>-->
      <!--                 </g>-->
      <!--              </svg>-->
      <!--        <?php $total=$this->db->where('user_type','u')->count_all_results('user_role')+0; ?>-->
      <!--              <h4 class="pt-3">Total Registration</h4>-->
      <!--              <h4 class="counter mt-2" style="visibility: visible;"><?=$total?></h4>-->
      <!--           </div>-->
      <!--        </div>-->
      <!--     </div>-->
      <!--  </div>-->
   </div>
   
 
   
   
   <div class="mobile">
        <div class="app">
   <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                  <svg height="18px" width="18px" version="1.1" id="_x36_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
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
               </div>
               <div class="col p-1 m-1 ">
                  <h4 class="pt-3">TOTAL EARNINGS</h4>
                   <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($total_earnings,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
                   
                 </div>
               </div>
              
         </div>
      </div>
   </div>
     <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
               <svg fill="#fcfcfc" width="18px" height="18px" viewBox="0 0 24 24" id="down-direction-circle" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                     <circle id="primary" cx="12" cy="12" r="10" style="fill: #e09515;"></circle>
                     <path id="secondary" d="M10,12V8a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1v4h.82a1,1,0,0,1,.76,1.65l-2.82,3.27a1,1,0,0,1-1.52,0L8.42,13.65A1,1,0,0,1,9.18,12Z" style="fill: #e09515E09515;"></path>
                  </g>
               </svg>
               </div>
               <div class="col p-1 m-1">
               <h4 class="pt-3">TOTAL WITHDRAW</h4>
               <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($total_withdraw,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
            </div>
         </div>
      </div>
   </div>
</div>
</div>

      <div class="app">
           <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                    <svg width="18px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#E09515" stroke="#E09515">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                           <g>
                              <path fill="none" d="M0 0h24v24H0z"></path>
                              <path d="M12 11a5 5 0 0 1 5 5v6H7v-6a5 5 0 0 1 5-5zm-6.712 3.006a6.983 6.983 0 0 0-.28 1.65L5 16v6H2v-4.5a3.5 3.5 0 0 1 3.119-3.48l.17-.014zm13.424 0A3.501 3.501 0 0 1 22 17.5V22h-3v-6c0-.693-.1-1.362-.288-1.994zM5.5 8a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"></path>
                           </g>
                        </g>
                     </svg>
               </div>
               <div class="col p-1 m-1 ">
                 <h4 class="pt-3 wallet">E-WALLET</h4>
                     <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($balance,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
            </div>
         </div>
      </div>
   </div>
</div>
      <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" width="18px" height="18px" fill="#eee7e7">
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
                     
                    </div>
               <div class="col p-1 m-1 ">
                  <h4 class="pt-3">WITHDRAW WALLET</h4>
                     <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($withdraw,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
            </div>
         </div>
      </div>
   </div>
</div>
         
      </div>
      <div class="app">
          <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                    <svg fill="#E09515" width="18px" height="18px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#E09515">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                           <path d="M1587.854 1133.986c-109.666-42.353-223.51-72.057-339.276-91.257h-5.195c135.53-91.369 224.866-246.324 224.866-421.609v-24.847c-28.235 18.07-64.377 41.788-115.087 57.713-15.925 202.165-186.466 362.428-393.148 362.428-199.793 0-365.93-148.97-390.777-342.212-3.388-16.94-4.517-34.898-4.517-53.082v-60.988c1.355-.113 2.258-.452 3.614-.678 10.503-1.807 19.877-4.179 29.364-6.663 8.132-2.033 16.15-4.18 23.38-6.664 7.905-2.71 15.472-5.421 22.587-8.583 8.132-3.502 15.586-7.116 23.04-10.956 5.083-2.823 10.391-5.308 15.135-8.132a662.834 662.834 0 0 0 20.668-12.762c3.388-2.259 7.34-4.518 10.503-6.55 4.857-3.163 9.6-5.986 14.344-8.923 34.447-21.572 67.313-38.4 128.527-38.513h.226c53.195 0 84.932 12.085 114.635 29.026 9.826 5.647 19.539 11.972 29.817 18.522 35.124 22.815 73.976 47.549 133.722 58.956.678.113 1.13.452 1.807.564 20.33 3.728 43.143 5.873 69.007 5.873.452 0 .79-.113 1.242-.113 103.342-.225 157.214-34.785 204.537-65.392l55.793-34.448v-.112l.564-.452-3.952-21.346-2.372-15.473c-5.308-34.447-15.247-67.426-27.22-99.501-24.733-66.748-62.568-127.963-114.521-179.803-26.993-27.218-57.6-50.936-89.224-70.136-80.188-50.71-173.93-77.93-269.93-77.93-220.235 0-408.846 141.177-478.87 338.824-19.2 53.082-29.365 109.553-29.365 169.412V621.12c0 19.2 1.13 38.4 3.502 56.47C472.108 829.949 557.152 960.735 678 1042.166h-5.083c-111.812 18.41-222.042 46.983-328.433 87.19-140.612 53.309-231.53 183.417-231.53 331.709V1669.1l26.768 16.49c172.235 106.955 454.475 234.353 820.292 234.353 201.938 0 508.235-40.546 820.404-234.353l26.654-16.49v-208.037c0-144.904-88.094-276.255-219.218-327.078" fill-rule="evenodd"></path>
                        </g>
                     </svg>
                    </div>
               <div class="col p-1 m-1 ">
                 
                     <?php $direct=$this->db->where('ref_id',$this->session->userdata('micusername'))->count_all_results('user_role')+0; ?>
                     <h4 class="pt-3">DIRECT REFERAL</h4>
                     <h4 class="counter mt-2" style="visibility: visible;"><?=$direct?></h4>
            </div>
         </div>
      </div>
   </div>
</div>
          
        <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                    <svg height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#E09515" stroke="#E09515">
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
                     
                    </div>
               <div class="col p-1 m-1 ">
                 
                    <h4 class="pt-3">BINARY INCOME</h4>
                     <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($binary_income,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
            </div>
         </div>
      </div>
   </div>
</div>
 
      </div>
      <div class="app">
            <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                     <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="18px" height="18px" fill="#000000">
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
                     
                    </div>
               <div class="col p-1 m-1 ">
                 
                     <h4 class="pt-3">MINING INCOME</h4>
                     <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($mining_income,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
            </div>
         </div>
      </div>
   </div>
</div>
           <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                     <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" width="18px" height="18px" fill="#eee7e7">
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
                       
                    </div>
               <div class="col p-1 m-1 ">
                 <h4 class="pt-3">LEVEL INCOME</h4>
                     <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($level_income,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
                   
            </div>
         </div>
      </div>
   </div>
</div>
 

      </div>
      <div class="app">
            <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                     <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="18px" height="18px" fill="#000000">
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
                     
                    </div>
               <div class="col p-1 m-1 ">
                 
                     <h4 class="pt-3">DIRECT INCOME</h4>
                     <h4 class="counter mt-2" style="visibility: visible;"><?=number_format($direct_income,2);?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
            </div>
         </div>
      </div>
   </div>
</div>
           <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                     <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" width="18px" height="18px" fill="#eee7e7">
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
                       
                    </div>
               <div class="col p-1 m-1 ">
                 <h4 class="pt-3"style=width:50px;>WALLET</h4>
                     <h4 class="counter mt-2" style="visibility: visible;">0 <span style="font-size:12px; color:#fff;">USDT</span></h4>
                   
            </div>
         </div>
      </div>
   </div>
</div>
 

      </div>
      <div class="app">
      <div class="col-5">
      <div class="card shining-card">
         <div class="appcard-body ">
            <div class="approw d-flex align-items-center">
               <div class="col-1 m-1">
                     <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="18px" height="18px" fill="#000000">
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
                     
                    </div>
               <div class="col p-1 m-1 ">
                 
                     <h4 class="pt-3">TOPUP</h4>
                     <h4 class="counter mt-2" style="visibility: visible;"><?=$topup-$first_package?> <span style="font-size:12px; color:#fff;">USDT</span></h4>
            </div>
         </div>
      </div>
   </div>
</div>
  </div>
   </div>
   <div class="row"></div>
      <div class="col-lg-12">
         <div class="card card-block card-stretch custom-scDirect Referall">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
               <div class="caption">
                  <h4 class="font-weight-bold mb-2">Maximum Permitted Level</h4>
               </div>
            </div>
            <?php 
               $limit = $topup*3;
               $per = ($total_earnings*100)/$limit;
               $round = round($per);
               ?>
            <div class="card-body">
               <div class="row">
                  <div class="firstrow">
                     <div class="col first">
                        <span class="mb-2"><?=$total_earnings;?></span>
                     </div>
                     <div class="col second">
                        <span class="mb-2"><?=$limit;?></span>  
                     </div>
                  </div>
               </div>
               <div class="bd-example">
                  <div class="progress">
                     <div class="progress-bar bg-success w-<?=$round?>" role="progressbar" aria-valuenow="<?=$round?>" aria-valuemin="0" aria-valuemax="100"><?=$round?>%</div>
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
                     <img src="<?=BASEURL?>assets/images/<?=$mining['gif']?>" class="mining" alt="Bincoin Mining">
                  </div>
                  <div class="pt-3">
                     <h4 class="counter mt-2" style="visibility: visible;"><?=$mining['package_name']?></h4>
                     <div class="pt-3">
                        <small> Mining Speed</small>
                        <span style="text-transform: lowercase;"> : <?=$mining['percentage']?> X </span>
                     </div>
                  </div>
                  <form action="<?=BASEURL?>user/index" method="post" id="packk">
                     <div class="pricing d-flex justify-content-between align-items-center">
                        <div class="me-2">
                           <select  name="package" class="form-select form-select-lg mb-3 btn.btn-primary" aria-label=".form-select-lg example">
                              <option value="" selected="">Select Package</option>
                              <?php 
                                //  $package =$this->db->where('ROUND(CAST(percentage AS DECIMAL(4,2)), 2)=',$mining['percentage'])->get('package')->result_array();
                                
                                 $package =$this->db->where('percentage',$mining['percentage'])->get('package')->result_array();
                                 foreach($package as $key => $pack){
                                 ?> 
                              <option value="<?=$pack['id']?>"><?=$pack['value']?> USDT</option>
                              <?php } ?>
                           </select>
                        </div>
                        <div>
                           <button id="activate_btn" style="margin-top: 10px;" type="submit" class="btn btn-primary">Activate</button>
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
         <!--            <h4 class="counter mt-2" style="visibility: visible;">Weekly Income</h4>-->
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
         <!--            <h4 class="counter mt-2" style="visibility: visible;">Weekly Income</h4>-->
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
         <!--            <h4 class="counter mt-2" style="visibility: visible;">Weekly Income</h4>-->
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
                              <th scope="col">counter mt-2</th>
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
                                 <div id="vall<?=$r['id']?>">0.00000000000000 USDT</div>
                              </td>
                              <td>
                                 <div id="counter mt-2<?=$r['id']?>"></div>
                              </td>
                              <td>
                                 <?php if($r['end_time'] == NULL){ ?>
                                 <form id="form2" action="<?=BASEURL?>user/start_timer" method="post">
                                    <input type="hidden" value="<?=$r['up_id']?>" name="pack_id">
                                    <button id="bbb" type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-play me-1"></i>Start</button>
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
     
     
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Trading History</h4>
                  </div>
               </div>
               <div class="card-body2">
                  <div class="col-xl-12 col-md-6 col-sm-3">
                     <div class="firstrow">
                        <div class="col first">
                           <span class="mb-2">XAUUSD,<span class=" text-danger">sell&nbsp0.05</span> </span>
                        </div>
                        <div class="col second">
                           <span class="mb-2">2023/02/06&nbsp10:13:03</span>  
                        </div>
                     </div>
                     <div class="secondrow">
                        <div class="col first">
                           <span class="mb-2">1&nbsp855.75</span>
                           <span class="mb-2">
                              <i class="icon">
                                 <svg width="20px" height="20px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                                 </svg>
                              </i>
                           </span>
                           <span class="mb-2">1&nbsp855.75</span>
                        </div>
                        <div class="col second">
                           <span class="mb-2 blue">0.06</span>  
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-12 col-md-12 col-sm-12">
                     <div class="firstrow">
                        <div class="col new">
                           <div class="details ">
                              <span class="mb-2">S/L </span>
                           </div>
                           <div class="details">
                              <span  class="mb-2">-</span>  
                           </div>
                        </div>
                        <div class="col new">
                           <div class="details ">
                              <span class="mb-2">T/P </span>
                           </div>
                           <div class="details">
                              <span  class="mb-2">1854.0</span>  
                           </div>
                        </div>
                     </div>
                     <div class="secondrow">
                        <div class="col new">
                           <div class="details ">
                              <span class="mb-2">Open </span>
                           </div>
                           <div class="details">
                              <span  class="mb-2">2023.03.09&nbsp09:20:15</span>  
                           </div>
                        </div>
                        <div class="col new">
                           <div class="details ">
                              <span class="mb-2">Swap </span>
                           </div>
                           <div class="details">
                              <span  class="mb-2">0.00</span>  
                           </div>
                        </div>
                     </div>
                     <div class="thirdrow">
                        <div class="col new">
                           <div class="details ">
                              <span class="mb-2">M </span>
                           </div>
                           <div class="details">
                              <span  class="mb-2">#2554525822852</span>  
                           </div>
                        </div>
                        <div class="col new">
                           <div class="details">
                              <span class="mb-2">Commission </span>
                           </div>
                           <div class="details">
                              <span  class="mb-2">0.20</span>  
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
                  <div class="header-title">
                     <h4 class="card-title">Trading view</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="tradeview" style="align-item:center;">
                     <!-- TradingView Widget BEGIN -->
                     <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text">Market summary</span></a> by TradingView</div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                           {
                           "width": "1200",
                           "height": "500",
                           "symbolsGroups": [
                              {
                               "name": "Forex",
                               "originalName": "Forex",
                               "symbols": [
                                 {
                                   "name": "FX:EURUSD",
                                   "displayName": "EUR/USD"
                                 },
                                 {
                                   "name": "FX:GBPUSD",
                                   "displayName": "GBP/USD"
                                 },
                                 {
                                   "name": "FX:USDJPY",
                                   "displayName": "USD/JPY"
                                 },
                                 {
                                   "name": "FX:USDCHF",
                                   "displayName": "USD/CHF"
                                 },
                                 {
                                   "name": "FX:AUDUSD",
                                   "displayName": "AUD/USD"
                                 },
                                 {
                                   "name": "FX:USDCAD",
                                   "displayName": "USD/CAD"
                                 }
                               ]
                             },
                             {
                               "name": "Indices",
                               "originalName": "Indices",
                               "symbols": [
                                 {
                                   "name": "FOREXCOM:SPXUSD",
                                   "displayName": "S&P 500"
                                 },
                                 {
                                   "name": "FOREXCOM:NSXUSD",
                                   "displayName": "US 100"
                                 },
                                 {
                                   "name": "FOREXCOM:DJI",
                                   "displayName": "Dow 30"
                                 },
                                 {
                                   "name": "INDEX:NKY",
                                   "displayName": "Nikkei 225"
                                 },
                                 {
                                   "name": "INDEX:DEU40",
                                   "displayName": "DAX Index"
                                 },
                                 {
                                   "name": "FOREXCOM:UKXGBP",
                                   "displayName": "UK 100"
                                 }
                               ]
                             },
                             {
                               "name": "Futures",
                               "originalName": "Futures",
                               "symbols": [
                                 {
                                   "name": "CME_MINI:ES1!",
                                   "displayName": "S&P 500"
                                 },
                                 {
                                   "name": "CME:6E1!",
                                   "displayName": "Euro"
                                 },
                                 {
                                   "name": "COMEX:GC1!",
                                   "displayName": "Gold"
                                 },
                                 {
                                   "name": "NYMEX:CL1!",
                                   "displayName": "Crude Oil"
                                 },
                                 {
                                   "name": "NYMEX:NG1!",
                                   "displayName": "Natural Gas"
                                 },
                                 {
                                   "name": "CBOT:ZC1!",
                                   "displayName": "Corn"
                                 }
                               ]
                             },
                             {
                               "name": "Bonds",
                               "originalName": "Bonds",
                               "symbols": [
                                 {
                                   "name": "CME:GE1!",
                                   "displayName": "Eurodollar"
                                 },
                                 {
                                   "name": "CBOT:ZB1!",
                                   "displayName": "T-Bond"
                                 },
                                 {
                                   "name": "CBOT:UB1!",
                                   "displayName": "Ultra T-Bond"
                                 },
                                 {
                                   "name": "EUREX:FGBL1!",
                                   "displayName": "Euro Bund"
                                 },
                                 {
                                   "name": "EUREX:FBTP1!",
                                   "displayName": "Euro BTP"
                                 },
                                 {
                                   "name": "EUREX:FGBM1!",
                                   "displayName": "Euro BOBL"
                                 }
                               ]
                             }
                            
                           ],
                           "showSymbolLogo": true,
                           "colorTheme": "dark",
                           "isTransparent": false,
                           "locale": "in"
                           }
                        </script>
                     </div>
                     <!-- TradingView Widget END -->
                    
                  </div>
                   <div class="tradeview">
                      <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                          <div class="tradingview-widget-container__widget"></div>
                          <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/AAPL/" rel="noopener" target="_blank"><span class="blue-text">Apple</span></a> by TradingView</div>
                          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                          {
                          "symbols": [
                            [
                              "Apple",
                              "AAPL|1D"
                            ],
                            [
                              "Google",
                              "GOOGL|1D"
                            ],
                            [
                              "Microsoft",
                              "MSFT|1D"
                            ]
                          ],
                          "chartOnly": false,
                          "width": "1200",
                          "height": 500,
                          "locale": "in",
                          "colorTheme": "dark",
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
                          "chartType": "candlesticks",
                          "backgroundColor": "rgba(0, 0, 0, 1)",
                          "widgetFontColor": "rgba(255, 255, 255, 1)",
                          "upColor": "#22ab94",
                          "downColor": "#f7525f",
                          "borderUpColor": "#22ab94",
                          "borderDownColor": "#f7525f",
                          "wickUpColor": "#22ab94",
                          "wickDownColor": "#f7525f"
                        }
                          </script>
                        </div>
                        <!-- TradingView Widget END -->
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>
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
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php include 'footer.php';?>