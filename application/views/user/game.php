<?php include 'header.php';?>
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&amp;display=swap">

<!--Custom CSS-->
<link rel="stylesheet" type="text/css" src="<?=BASEURL?>assets/css/game.css"/>

<style>
    /* Reset default styles for body */

/* Keyframe animations for confetti */
@keyframes confetti-slow {
  0% {
    transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
  }

  100% {
    transform: translate3d(25px, 105vh, 0) rotateX(360deg) rotateY(180deg);
  }
}

@keyframes confetti-medium {
  0% {
    transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
  }

  100% {
    transform: translate3d(100px, 105vh, 0) rotateX(100deg) rotateY(360deg);
  }
}

@keyframes confetti-fast {
  0% {
    transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
  }

  100% {
    transform: translate3d(-50px, 105vh, 0) rotateX(10deg) rotateY(250deg);
  }
}

/* Styles for the container */
.container {
  /*width: 100vw;*/
  height: 500px;
  background: #ffffff;
  border: 1px solid white;
  position: fixed;
  top: 0px;
}

/* Styles for the confetti container */
.confetti-container {
  perspective: 700px;
  position: absolute;
  overflow: hidden;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}

/* Styles for the confetti */
.confetti {
  position: absolute;
  z-index: 1;
  top: -10px;
  border-radius: 0%;
}

.confetti--animation-slow {
  animation: confetti-slow 2.25s linear 1 forwards;
}

.confetti--animation-medium {
  animation: confetti-medium 1.75s linear 1 forwards;
}

.confetti--animation-fast {
  animation: confetti-fast 1.25s linear 1 forwards;
}

/* Styles for the checkmark circle */
.checkmark-circle {
  width: 100px;
  height: 100px;
  position: relative;
  display: inline-block;
  vertical-align: top;
  margin-left: auto;
  margin-right: auto;
}

.checkmark-circle .background {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #00C09D;
  position: absolute;
}

/* Styles for the checkmark */
.checkmark-circle .checkmark {
  border-radius: 5px;
}

.checkmark-circle .checkmark.draw:after {
  -webkit-animation-delay: 100ms;
  -moz-animation-delay: 100ms;
  animation-delay: 100ms;
  -webkit-animation-duration: 2s;
  -moz-animation-duration: 2s;
  animation-duration: 2s;
  -webkit-animation-timing-function: ease;
  -moz-animation-timing-function: ease;
  animation-timing-function: ease;
  -webkit-animation-name: checkmark;
  -moz-animation-name: checkmark;
  animation-name: checkmark;
  -webkit-transform: scaleX(-1) rotate(135deg);
  -moz-transform: scaleX(-1) rotate(135deg);
  -ms-transform: scaleX(-1) rotate(135deg);
  -o-transform: scaleX(-1) rotate(135deg);
  transform: scaleX(-1) rotate(135deg);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}

.checkmark-circle .checkmark:after {
  opacity: 1;
  height: 75px;
  width: 37.5px;
  -webkit-transform-origin: left top;
  -moz-transform-origin: left top;
  -ms-transform-origin: left top;
  -o-transform-origin: left top;
  transform-origin: left top;
  border-right: 15px solid white;
  border-top: 15px solid white;
  border-radius: 2.5px !important;
  content: '';
  left: 12px;
    top: 59px;
  position: absolute;
}

@keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
}

.trophy-img{
    margin-left:44px !important;
    animation:none !important;
}

.congrats-text{
    font-family: 'Satisfy', cursive;
    font-size: 45px;
    font-weight: 500;
    letter-spacing: 1px;
}


.custom-btn {
    font-weight:900 !important;
  width: 130px;
  height: 40px;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}

/* 1 */
.btn-1 {
  background: rgb(6,14,131);
  background: linear-gradient(0deg, rgba(6,14,131,1) 0%, rgba(12,25,180,1) 100%);
  border: none;
}
.btn-1:hover {
   background: rgb(0,3,255);
background: linear-gradient(0deg, rgba(0,3,255,1) 0%, rgba(2,126,251,1) 100%);
}

  
  .modal-content {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    background:white!important;
}
  .btn-sm, .btn-group-sm > .btn {
    padding: 0.25rem 1rem;
    font-size: 0.875rem;
    border-radius: 0!important;
}
.wrap1 {
    font-size: 10px!important;
    border-radius: 0; 
}


.table thead {
    white-space: nowrap;
    color: black;!important
   
}

.card-body {
  
    padding: 15px!important;
}
.wrap2{
    width:58px;
}

.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
    color: #fff;
     background-color:none!important; 
     border-color:none!important; 
}

.tbl {
    overflow: auto!important;
}
.wrp{
    background: linear-gradient(to bottom right, violet, red)!important;
}

thead, tbody, tfoot, tr, td, th {
    border-color: inherit;
    border-style: none!important;
    border-width: 0;
}


.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
    color: #fff!important;
    background-color: #180b7c!important;
    border: 1px solid cornflowerblue!important;
}
.nav-link {
  
    color: white!important;
   
}

.bet {
    background-image: url(<?=BASEURL?>assets/images/bet2.png);

    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

}
@media screen and (max-width:500px){
    .game-card-img{
        height:90px !important;
    }
    .table thead tr th {
    padding: 9px!important;
    text-transform: uppercase!important;
    letter-spacing: 0px!important;
    font-size: 11px!important;
}
.table tbody tr td {
   
    font-size: 13px!important;
}
}


.text-muted {
    --bs-text-opacity: 1;
    color: #4A4A4F !important;
    background: #12183a!important;
}
.card {
    background: #12183a!important;
    border: 2px solid cornflowerblue;
}

.table thead tr {
    background-color: #12183a!important;
    border: 1px solid cornflowerblue!important;
}
.table tbody tr td {
    color: white!important;
    vertical-align: middle;
    border: 1px solid cornflowerblue!important;
    font-size: 13px!important;
}
.table thead {
  
    color: white!important;
}

.main-content .content-inner {
    min-height: calc(100vh - 6.6rem);
    background: #12183a!important;
}
      .button {
        background-color: #1c87c9;
        -webkit-border-radius: 60px;
        border-radius: 60px;
        border: none;
        color: #eeeeee;
        cursor: pointer;
        display: inline-block;
        font-family: sans-serif;
        font-size: 14px;
        padding: 5px 15px;
        text-align: center;
        text-decoration: none;
      }
       @keyframes glowing {
    0% {
        box-shadow: 0 0 10px rgba(255, 215, 0, 0.8);
    }
    50% {
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
    }
    100% {
        box-shadow: 0 0 10px rgba(255, 215, 0, 0.8);
    }
}

      .button {
        animation: glowing 1300ms infinite;
      }
      

  .card-body img {
    width: 80px!important;
    height: 80px!important;
    animation: rotate 5s linear infinite;
    transform-origin: center;
  }

  @keyframes rotate {
    from {
      transform: rotateY(0deg);
    }
    to {
      transform: rotateY(360deg);
    }
  }
  

.center .you-won-text{
  color: rgba(255,0,0,0.1);
  font-size: 64px;
  font-weight: 700;
  background-size: cover;
  background-image: url("<?=BASEURL?>assets/images/youwin-bg.jpg");
  -webkit-background-clip: text;
  animation: background-text-animation 15s linear infinite;
}
@keyframes background-text-animation {
  0%{
    background-position: left 0px top 50%;
  }
  50%{
    background-position: left 1500px top 50%;
  }
  100%{
    background-position: left 0px top 50%;
  }
}

@media screen and (max-width:500px){
    .center .you-won-text{
        font-size:55px !important;
    }
    .gradient-text span{
        font-size:42px !important;
    }
}

.lost-game-img{
    animation:none !important;
}

.tryagain-text{
   margin-top: -40px;
    font-weight: 600;
    font-size: 30px;
    color: #fff;

}

.gamelost-modalbody{
    background-image:url('<?=BASEURL?>assets/images/lose-bg.jpg') !important;
    background-size: cover !important;
}

</style>               
               
      <div class="container-fluid content-inner pb-5">
          <div class="row">
           <div class="col-lg-12">
    <!--           <div class="card">-->
                
    <!--                <div class="card-body">-->
    <!--                   <p style="color:black!important">Available Balance: ₹ 0.00 </p>-->
    <!--                   <p> <button type="button" class="btn btn-info btn-sm" style="background-color: #825af9!important;-->
    <!--border-color: #825af9!important;">Recharge</button> </p>-->
                       
    <!--               </div>-->
                  
    <!--               </div>-->
                            
                            
                            <div class="card">
                                <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                                        <!--<li class="nav-item">-->
                                        <!--    <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">-->
                                        <!--        DODE-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <button style="cursor:pointer !important;" class="nav-link" data-bs-toggle="modal" data-bs-target="#CommingSoon"> <!--data-bs-toggle="tab" href="#profile1" role="tab"-->
                                        <!--        QUQU-->
                                        <!--    </button>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <button style="cursor:pointer !important;" class="nav-link" data-bs-toggle="modal" data-bs-target="#CommingSoon">  <!--data-bs-toggle="tab" href="#messages1" role="tab"-->
                                        <!--    DEDA-->
                                        <!--    </button>-->
                                        <!--</li>-->
                                      
                                    </ul>
                                    
                                      <!-- Modal -->
                                      <div class="modal fade" id="CommingSoon" tabindex="-1" role="dialog" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              
                                               <div class="modal-body">
                                                   <div class="my-5">
                                                       <h1 class="text-center" style="color:#3A6CD1;font-weight: 900;letter-spacing: 1px;font-size: 40px;">Coming Soon</h1>
                                                   </div>
                                                   <div class="text-center">
                                                  <button style="width: fit-content !important;" type="button" class="btn btn-danger ok-btn w-50" data-bs-dismiss="modal">OK</button></div>
                                               </div>
                                              
                                            </div>
                                         </div>
                                      </div>
                                      <!-- Modal -->

                                    <!-- Tab panes -->
                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="home1" role="tabpanel">
                                            
                                            <button style="display:none;" class="btn btn-sm btn-primary" id="winbtn" data-bs-toggle="modal" data-bs-target="#WinModal">Win</button>
                                            <button style="display:none;" class="btn btn-sm btn-primary" id="lossbtn" data-bs-toggle="modal" data-bs-target="#LostModal">Loss</button>
                                            
                                             <!--Win Popup Modal -->
                                        <div class="modal fade" id="WinModal" tabindex="-1" role="dialog" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-body">
                                                    <div class="js-container container" style="top:0px !important;"></div>
                                                       <div style="text-align:center;margin-top:30px;position:  fixed;width:100%;height:100%;top:0px;left:0px;">
                                                            <div class="checkmark-circle mt-3">
                                                              <div class="background"></div>
                                                              <div class="checkmark draw"></div>
                                                            </div>
                                                            <h1 class="text-info congrats-text mt-3 mb-2">Congratulations!</h1>
                                                            <div class="center d-flex justify-content-center gradient-text">
                                                              <h1 class="you-won-text">You Won</h1><span style="font-size:50px;background-image: url('<?=BASEURL?>assets/images/youwon-bg.jpg');" class="ps-1">&#128525;</span>
                                                            </div>
                                                            <div class="congrats-img text-center">
                                                              <img style="height:150px !important;width:auto !important;object-fit:contain !important;" class="img-fluid img-responsive trophy-img" src="<?=BASEURL?>assets/images/trophy.png">
                                                           </div> 
                                                           
                                                           <button class="custom-btn btn-1 mt-4" data-bs-dismiss="modal">OK</button>
                                                    </div>  
                                                 </div>
                                            </div>
                                         </div>
                                      </div>
                                       <!--Win Popup Modal -->
                                       
                                        <!--Lost Popup Modal -->
                                        <div class="modal fade" id="LostModal" tabindex="-1" role="dialog" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                            <div class="modal-content gamelost-modalbody">
                                              <div style="border:1px solid #fff;" class="modal-body pb-5 gamelost-modalbody">
                                                   <div class="text-center lost-game-container">
                                                       <img style="height:100%!important;width:auto !important;" class="img-resposive img-fluid lost-game-img" src="<?=BASEURL?>assets/images/lose-game.png">
                                                        <h2 class="tryagain-text">Try Again.......</h2>
                                                        
                                                        <button class="btn btn-light mt-4" data-bs-dismiss="modal">OK</button>
                                                   </div>
                                              </div>
                                            </div>
                                         </div>
                                      </div>
                                       <!--Lost Popup Modal -->
                                             
                                               <div class="row mt-4">
                                                   <div class="col-lg-12">
                                                       
                                                     <div class="d-flex justify-content-center">
                                                             <p class="m-1" style="color:white!important">Count Down</p>
                                                          </div>
                                                        <div class="d-flex justify-content-center">
                                                          
                                                           <h5 class="m-1" style="color:white!important; font-size:30px;">
                                                               <div id="countdown">00:00</div></h5>
                                                       </div>

                                                       
                                                         
                                               <div class="row">
                                                   <div class=" col-lg-12">
                                                         <div class=" d-flex justify-content-center align-items-center mt-4 ">
                                                       <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4" style="width: 18rem;height:12rem;">
                                                          
                                                          <div class="card-body text-center p-4">
                                                             <img id="loader" style="height:100px;" class="img-responsive game-card-img" src="<?=BASEURL?>assets/images/tron.png">
                                                            <h5 class="card-title my-2 mt-4">
                                                             <button type="button" class="button btn btn-sm btn-success waves-effect waves-light me-1 edit_btn" data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinGreenBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                             </h5>
                                                          </div>
                                                          
                                            

                                                        </div>
                                                         <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4" style="width: 18rem;height:12rem;">
                                                          <div class="card-body text-center p-4">
                                                              <img style="height:100px;" src="<?=BASEURL?>assets/images/stellar.png" class="img-responsive game-card-img" alt="...">
                                                            <h5 class="card-title my-2 mt-4">
                                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                                            <button type="button" class=" button btn btn-sm btn-success waves-effect waves-light me-1 edit_btn" data-status="red" style="background:#180b7c!important;border-color:#228b22!important" id="joinRedBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                            </h5>
                                                          </div>
                                                        </div>
                                                        </div>
                                                         </div>
                                                        </div>

                                                       
                                                       <div class=" d-flex justify-content-center p-1 mt-4">
                                                           
                                                        <div>
                                                            <p class="text-center"><i class="fas fa-trophy"  style="color:white!important"></i>
</p>
                                                           <p class="text-center" style="color:white!important">Record</p>
                                                       
                                                       </div>
                                                       </div>
                                                       
                                                       <div id="winresults" class="tbl">
                                                           <table class="table table-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Deposit</th>
                                                                    <th scope="col">Value</th>
                                                                    <th scope="col">Result</th>
                                                                    <th scope="col">Prize</th>
                                                                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $games = $this->db->order_by('entry_date','DESC')->limit(5)->where('username',$this->session->userdata('micusername'))->get('game')->result_array();
                                                                $count = 1;
                                                                foreach($games as $x => $val){
                                                                    
                                                                    $res = $this->db->where('game_id',$val['game_id'])->get("game_resuts")->row_array(); 
                                                                    if($val['remark'] == 'green'){
                                                                        $rdfg = 'TRON';
                                                                    } else {
                                                                        $rdfg = 'Stellar';
                                                                    }
                                                                    
                                                                    if(empty($res)){
                                                                        $rdfgxx = 'Wait....';
                                                                        $gh = 0;
                                                                    } else {
                                                                        if($res['win'] == $val['remark']){
                                                                            $rdfgxx = 'Win';
                                                                            $gh = 2;
                                                                        } else {
                                                                            $rdfgxx = 'Lose';
                                                                            $gh = 0;
                                                                        }
                                                                    }
                                                                ?>
                                                                <tr>
                                                                    <td><?=$rdfg?></td>
                                                                    <td><?=$val['amount']?></td>
                                                                    <td><?=$rdfgxx?></td>
                                                                    <td><?=$val['amount']*$gh?></td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                       </div>
                                                     
                                                       
                                                   </div>
                                                   
                                               </div>
                                                
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                      
                                        
                                        
                                         <div class="tab-pane" id="profile1" role="tabpanel">
                                            
                                          
                                                
                                               <div class="row mt-4">
                                                   <div class="col-lg-12">
                                                       
                                                    
                                                             
                                                        <div class="d-flex justify-content-center">
                                                           <p class="m-1" style="color:white!important">Count Down</p>
                                                           <h5 class="m-1" style="color:white!important"><div id="countdown">00:00</div></h5>
                                                       </div>

                                                       
                                                         
                                               <div class="row">
                                                   <div class=" col-lg-6">
                                                         <div class=" d-flex justify-content-center align-items-center mt-4 ">
                                                       <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          
                                                          <div class="card-body text-center p-4">
                                                             <img id="loader" style="height:100px;" class="img-responsive game-card-img" src="<?=BASEURL?>assets/images/tron.png">
                                                            <h5 class="card-title my-2 mt-4">
                                                             <button type="button" class="button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinGreenBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                             </h5>
                                                          </div>
                                                          
                                            

                                                        </div>
                                                         <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          <div class="card-body text-center p-4">
                                                              <img style="height:100px;" src="<?=BASEURL?>assets/images/stellar.png" class="img-responsive game-card-img" alt="...">
                                                            <h5 class="card-title my-2 mt-4">
                                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                                            <button type="button" class=" button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinRedBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                            </h5>
                                                          </div>
                                                        </div>
                                                        
                                                        
                                                        </div>
                                                         </div>
                                                         <div class=" col-lg-6">
                                                         <div class=" d-flex justify-content-center align-items-center mt-4 ">
                                                       <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          
                                                          <div class="card-body text-center p-4">
                                                             <img id="loader" style="height:100px;" class="img-responsive game-card-img" src="<?=BASEURL?>assets/images/tron.png">
                                                            <h5 class="card-title my-2 mt-4">
                                                             <button type="button" class="button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinGreenBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                             </h5>
                                                          </div>
                                                          
                                            

                                                        </div>
                                                         <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          <div class="card-body text-center p-4">
                                                              <img style="height:100px;" src="<?=BASEURL?>assets/images/stellar.png" class="img-responsive game-card-img" alt="...">
                                                            <h5 class="card-title my-2 mt-4">
                                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                                            <button type="button" class=" button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinRedBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                            </h5>
                                                          </div>
                                                        </div>
                                                        
                                                        
                                                        </div>
                                                         </div>
                                                         
                                                        </div>

                                                  

                 
                                                   
                                                           
                                                  
                                                    
                                                       
                                                       
                                                       <div class=" d-flex justify-content-center p-1 mt-4">
                                                           
                                                        <div>
                                                            <p class="text-center"><i class="fas fa-trophy"  style="color:white!important"></i>
</p>
                                                           <p class="text-center" style="color:white!important">Record</p>
                                                       
                                                       </div>
                                                       </div>
                                                       
                                                       <div id="winresults" class="tbl">
                                                           <table class="table table-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Deposit</th>
                                                                    <th scope="col">Value</th>
                                                                    <th scope="col">Result</th>
                                                                    <th scope="col">Prize</th>
                                                                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $games = $this->db->order_by('entry_date','DESC')->limit(5)->where('username',$this->session->userdata('micusername'))->get('game')->result_array();
                                                                $count = 1;
                                                                foreach($games as $x => $val){
                                                                    
                                                                    $res = $this->db->where('game_id',$val['game_id'])->get("game_resuts")->row_array(); 
                                                                    if($val['remark'] == 'green'){
                                                                        $rdfg = 'TRON';
                                                                    } else {
                                                                        $rdfg = 'Stellar';
                                                                    }
                                                                    
                                                                    if(empty($res)){
                                                                        $rdfgxx = 'Wait....';
                                                                        $gh = 0;
                                                                    } else {
                                                                        if($res['win'] == $val['remark']){
                                                                            $rdfgxx = 'Win';
                                                                            $gh = 2;
                                                                        } else {
                                                                            $rdfgxx = 'Lose';
                                                                            $gh = 0;
                                                                        }
                                                                    }
                                                                ?>
                                                                <tr>
                                                                    <td><?=$rdfg?></td>
                                                                    <td><?=$val['amount']?></td>
                                                                    <td><?=$rdfgxx?></td>
                                                                    <td><?=$val['amount']*$gh?></td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                       </div>
                                                     
                                                       
                                                   </div>
                                                   
                                               </div>
                                                
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                        <div class="tab-pane" id="messages1" role="tabpanel">
                                            
                                          
                                                
                                               <div class="row mt-4">
                                                   <div class="col-lg-12">
                                                       
                                                    
                                                             
                                                        <div class="d-flex justify-content-center">
                                                           <p class="m-1" style="color:white!important">Count Down</p>
                                                           <h5 class="m-1" style="color:white!important"><div id="countdown">00:00</div></h5>
                                                       </div>

                                                       
                                                         
                                                <div class="row">
                                                   <div class=" col-lg-6">
                                                         <div class=" d-flex justify-content-center align-items-center mt-4 ">
                                                       <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          
                                                          <div class="card-body text-center p-4">
                                                             <img id="loader" style="height:100px;" class="img-responsive game-card-img" src="<?=BASEURL?>assets/images/tron.png">
                                                            <h5 class="card-title my-2 mt-4">
                                                             <button type="button" class="button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinGreenBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                             </h5>
                                                          </div>
                                                          
                                            

                                                        </div>
                                                         <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          <div class="card-body text-center p-4">
                                                              <img style="height:100px;" src="<?=BASEURL?>assets/images/stellar.png" class="img-responsive game-card-img" alt="...">
                                                            <h5 class="card-title my-2 mt-4">
                                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                                            <button type="button" class=" button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinRedBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                            </h5>
                                                          </div>
                                                        </div>
                                                        
                                                        
                                                        </div>
                                                         </div>
                                                         <div class=" col-lg-6">
                                                         <div class=" d-flex justify-content-center align-items-center mt-4 ">
                                                       <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          
                                                          <div class="card-body text-center p-4">
                                                             <img id="loader" style="height:100px;" class="img-responsive game-card-img" src="<?=BASEURL?>assets/images/tron.png">
                                                            <h5 class="card-title my-2 mt-4">
                                                             <button type="button" class="button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinGreenBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                             </h5>
                                                          </div>
                                                          
                                            

                                                        </div>
                                                         <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          <div class="card-body text-center p-4">
                                                              <img style="height:100px;" src="<?=BASEURL?>assets/images/stellar.png" class="img-responsive game-card-img" alt="...">
                                                            <h5 class="card-title my-2 mt-4">
                                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                                            <button type="button" class=" button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinRedBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                            </h5>
                                                          </div>
                                                        </div>
                                                        
                                                        
                                                        </div>
                                                         </div>
                                                           <div class=" col-lg-6">
                                                         <div class=" d-flex justify-content-center align-items-center mt-4 ">
                                                       <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          
                                                          <div class="card-body text-center p-4">
                                                             <img id="loader" style="height:100px;" class="img-responsive game-card-img" src="<?=BASEURL?>assets/images/tron.png">
                                                            <h5 class="card-title my-2 mt-4">
                                                             <button type="button" class="button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinGreenBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                             </h5>
                                                          </div>
                                                          
                                            

                                                        </div>
                                                         <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          <div class="card-body text-center p-4">
                                                              <img style="height:100px;" src="<?=BASEURL?>assets/images/stellar.png" class="img-responsive game-card-img" alt="...">
                                                            <h5 class="card-title my-2 mt-4">
                                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                                            <button type="button" class=" button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinRedBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                            </h5>
                                                          </div>
                                                        </div>
                                                        
                                                        
                                                        </div>
                                                         </div>
                                                           <div class=" col-lg-6">
                                                         <div class=" d-flex justify-content-center align-items-center mt-4 ">
                                                       <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          
                                                          <div class="card-body text-center p-4">
                                                             <img id="loader" style="height:100px;" class="img-responsive game-card-img" src="<?=BASEURL?>assets/images/tron.png">
                                                            <h5 class="card-title my-2 mt-4">
                                                             <button type="button" class="button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinGreenBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                             </h5>
                                                          </div>
                                                          
                                            

                                                        </div>
                                                         <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          <div class="card-body text-center p-4">
                                                              <img style="height:100px;" src="<?=BASEURL?>assets/images/stellar.png" class="img-responsive game-card-img" alt="...">
                                                            <h5 class="card-title my-2 mt-4">
                                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                                            <button type="button" class=" button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinRedBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                            </h5>
                                                          </div>
                                                        </div>
                                                        
                                                        
                                                        </div>
                                                         </div>
                                                         <div class=" col-lg-6">
                                                         <div class=" d-flex justify-content-center align-items-center mt-4 ">
                                                       <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          
                                                          <div class="card-body text-center p-4">
                                                             <img id="loader" style="height:100px;" class="img-responsive game-card-img" src="<?=BASEURL?>assets/images/tron.png">
                                                            <h5 class="card-title my-2 mt-4">
                                                             <button type="button" class="button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinGreenBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                             </h5>
                                                          </div>
                                                          
                                            

                                                        </div>
                                                         <div class="card m-1 m-sm-1 m-md-3 m-lg-4 m-xl-4 m-xxl-4 crd" style="width: 18rem;height:12rem;">
                                                          <div class="card-body text-center p-4">
                                                              <img style="height:100px;" src="<?=BASEURL?>assets/images/stellar.png" class="img-responsive game-card-img" alt="...">
                                                            <h5 class="card-title my-2 mt-4">
                                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                                            <button type="button" class=" button btn btn-sm btn-success waves-effect waves-light me-1 " data-status="green" style="background:#180b7c!important;border-color:#228b22!important" id="joinRedBtn" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" data-bs-whatever="@mdo">Deposit</button>
                                                            </h5>
                                                          </div>
                                                        </div>
                                                        
                                                        
                                                        </div>
                                                         </div>
                                                         
                                                         
                                                         
                                                     
                                                         
                                                        </div>

                                                  

                 
                                                   
                                                           
                                                  
                                                    
                                                       
                                                       
                                                       <div class=" d-flex justify-content-center p-1 mt-4">
                                                           
                                                        <div>
                                                            <p class="text-center"><i class="fas fa-trophy"  style="color:white!important"></i>
</p>
                                                           <p class="text-center" style="color:white!important">Record</p>
                                                       
                                                       </div>
                                                       </div>
                                                       
                                                       <div id="winresults" class="tbl">
                                                           <table class="table table-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Deposit</th>
                                                                    <th scope="col">Value</th>
                                                                    <th scope="col">Result</th>
                                                                    <th scope="col">Prize</th>
                                                                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $games = $this->db->order_by('entry_date','DESC')->limit(5)->where('username',$this->session->userdata('micusername'))->get('game')->result_array();
                                                                $count = 1;
                                                                foreach($games as $x => $val){
                                                                    
                                                                    $res = $this->db->where('game_id',$val['game_id'])->get("game_resuts")->row_array(); 
                                                                    $game_wallet = $this->db->select('credit')->order_by('entry_date','desc')->where('username',$this->session->userdata('micusername'))->where('game_id',$val['game_id'])->get("game_wallet")->row()->credit+0; 
                                                                    if($val['remark'] == 'green'){
                                                                        $rdfg = 'TRON';
                                                                    } else {
                                                                        $rdfg = 'Stellar';
                                                                    }
                                                                    
                                                                    if(empty($res)){
                                                                        $rdfgxx = 'Wait....';
                                                                        $gh = 0;
                                                                    } else {
                                                                        if($res['win'] == $val['remark']){
                                                                            $rdfgxx = 'Win';
                                                                            $gh = 2;
                                                                        } else {
                                                                            $rdfgxx = 'Lose';
                                                                            $gh = 0;
                                                                        }
                                                                    }
                                                                ?>
                                                                <tr>
                                                                    <td><?=$rdfg?></td>
                                                                    <td><?=$val['amount']?></td>
                                                                    <td><?=$rdfgxx?></td>
                                                                    <td><?=$game_wallet;?></td>
                                                                    
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                       </div>
                                                     
                                                       
                                                   </div>
                                                   
                                               </div>
                                                
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                      
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div>
                        </div>
    
        </div>  
        
        
        
        <!-- Varying Modal Content -->


<!-- Varying modal content -->
         <div class="modal fade" id="varyingcontentModal" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingcontentModalLabel">Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                // Your PHP code to calculate the balance here
                $available = $this->db->select('SUM(credit) - SUM(debit) as balance')
                    ->where('username', $this->session->userdata('micusername'))
                    ->get('game_wallet')
                    ->row()
                    ->balance;

                if ($available === null) {
                    $available = 0;
                }
                ?>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="card p-2" style="background:white!important">
                                <h6 class="text-center mt-2" style="color:black!important">Available Amount</h6>
                                <p class="text-center mt-2" style="color:black!important"><?=$available?></p>
                            </div>
                            
                        </div>
                        <div class="col-lg-12">
                            <form id="regist" method="post">
                            <div class="mt-1"><span style="color:black!important">Amount</span>
                                <input type="hidden" class="form-control m-2" name="status" id="status">
                                <input type="text" class="form-control m-2" placeholder="Enter Amount" name="amount" id="amount">
                            </div>
                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-info btn1">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <script type="text/javascript">
    
        const Confettiful = function(el) {
  this.el = el;
  this.containerEl = null;
  
  this.confettiFrequency = 3;
  this.confettiColors = ['#EF2964', '#00C09D', '#2D87B0', '#48485E','#EFFF1D'];
  this.confettiAnimations = ['slow', 'medium', 'fast'];
  
  this._setupElements();
  this._renderConfetti();
};

Confettiful.prototype._setupElements = function() {
  const containerEl = document.createElement('div');
  const elPosition = this.el.style.position;
  
  if (elPosition !== 'relative' || elPosition !== 'absolute') {
    this.el.style.position = 'relative';
  }
  
  containerEl.classList.add('confetti-container');
  
  this.el.appendChild(containerEl);
  
  this.containerEl = containerEl;
};

Confettiful.prototype._renderConfetti = function() {
  this.confettiInterval = setInterval(() => {
    const confettiEl = document.createElement('div');
    const confettiSize = (Math.floor(Math.random() * 3) + 7) + 'px';
    const confettiBackground = this.confettiColors[Math.floor(Math.random() * this.confettiColors.length)];
    const confettiLeft = (Math.floor(Math.random() * this.el.offsetWidth)) + 'px';
    const confettiAnimation = this.confettiAnimations[Math.floor(Math.random() * this.confettiAnimations.length)];
    
    confettiEl.classList.add('confetti', 'confetti--animation-' + confettiAnimation);
    confettiEl.style.left = confettiLeft;
    confettiEl.style.width = confettiSize;
    confettiEl.style.height = confettiSize;
    confettiEl.style.backgroundColor = confettiBackground;
    
    confettiEl.removeTimeout = setTimeout(function() {
      confettiEl.parentNode.removeChild(confettiEl);
    }, 3000);
    
    this.containerEl.appendChild(confettiEl);
  }, 25);
};

window.confettiful = new Confettiful(document.querySelector('.js-container'));


    </script>

          
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>






<script>


// const timerDuration = 600; // 10 minutes in seconds
// let elapsedTime = parseInt(localStorage.getItem("elapsedTime")) || 0;
// const timerDisplay = document.getElementById("timer");
// const joinGreenBtn = document.getElementById("joinGreenBtn");
// const joinRedBtn = document.getElementById("joinRedBtn");

// function updateTimer() {
//     elapsedTime++;

//     // Check if the timer has reached the specified duration
//     if (elapsedTime >= timerDuration) {
//         // Reset the elapsed time to 0 and update local storage
//         elapsedTime = 0;
//         localStorage.setItem("elapsedTime", elapsedTime);

//         // Call the controller function user/game1 or take any other action
//          // Call the controller function user/currentgame via AJAX
//         $.ajax({
//             url: "<?php echo base_url('user/currentgame'); ?>",
//             method: "POST",
//             dataType: "json",
//             success: function (response) {
//                 // Handle the response from the server
//                 if (response.status === "success") {
//                     console.log(response.message);
//                     console.log("Game ID: " + response.game_id);
//                 } else {
//                     console.error("Error creating game: " + response.message);
//                 }
//             },
//             error: function () {
//                 console.error("AJAX request failed.");
//             }
//         });
//     }

//     updateTimerDisplay();

//     // Store the elapsed time in local storage
//     localStorage.setItem("elapsedTime", elapsedTime);

//     // Check if the timer has reached 8 minutes (480 seconds)
//     if (elapsedTime >= 480) {
    //     joinGreenBtn.disabled = true;
    //     joinRedBtn.disabled = true;

    // } else {
    //     joinGreenBtn.disabled = false;
    //     joinRedBtn.disabled = false;
    // }
// }

// function updateTimerDisplay() {
//     const hours = Math.floor(elapsedTime / 3600);
//     const minutes = Math.floor((elapsedTime % 3600) / 60);
//     const seconds = elapsedTime % 60;

//     const formattedTime = `${padZero(hours)}:${padZero(minutes)}:${padZero(seconds)}`;
//     timerDisplay.textContent = formattedTime;
// }

// function padZero(num) {
//     return num < 10 ? `0${num}` : num;
// }

// // Start the timer when the page loads
// setInterval(updateTimer, 1000);

</script>


<?php 
$datttt = date('i');
$timeFirst = strtotime(date('Y-m-d H:i:s'));
$timeSecond = strtotime(date('Y-m-d H:' . (ceil(($datttt + 0.1) / 10) * 10) . ':00'));
$differenceInSeconds = $timeSecond - $timeFirst;
    ?>


<script >
//  const joinGreenBtn = document.getElementById("joinGreenBtn");
// const joinRedBtn = document.getElementById("joinRedBtn");
//   var okok = '<?=$differenceInSeconds?>';
//         function countdown(element, minutes, seconds) {
//             var time = minutes*60 + seconds;
//             var interval = setInterval(function() {
//                 var el = document.getElementById('timer');
//                 if (time <= 0) {
//                     var text = "Completed";
//                     el.innerHTML = text;
//                     setTimeout(function() {
//                         countdown('clock', 0, 30);
//                     }, 500);
//                     clearInterval(interval);
//                     location = '';
//                     return;
//                 }
//                 if(time >= 480){
//                       joinGreenBtn.disabled = true;
//                         joinRedBtn.disabled = true;
                
//                     } else {
//                         joinGreenBtn.disabled = false;
//                         joinRedBtn.disabled = false;
//                     }
//                 var minutes = Math.floor( time / 60 );
//                 if (minutes < 10) minutes = "0" + minutes;
//                 var seconds = time % 60;
//                 if (seconds < 10) seconds = "0" + seconds;
//                 var text = minutes + ':' + seconds;
//                 el.innerHTML = text;
//                 time--;
//             }, 1000);
//         }
//         countdown('clock', 0, okok);
        
   
   
   const joinGreenBtn = document.getElementById("joinGreenBtn");
const joinRedBtn = document.getElementById("joinRedBtn");

var okok = '<?=$differenceInSeconds?>';

function countdown(element, minutes, seconds) {
    var time = minutes * 60 + seconds;
    var interval = setInterval(function() {
        var el = document.getElementById('timer');
        if (time <= 0) {
            var text = "Completed";
            el.innerHTML = text;
            setTimeout(function() {
                countdown('clock', 0, 30);
            }, 500);
            clearInterval(interval);
            // After 2 minutes, call the currentgame function using AJAX
            if (time <= -120) {
                disableButtons();
                callCurrentGameFunction();
            }
            return;
        }
        var minutes = Math.floor(time / 60);
        if (minutes < 10) minutes = "0" + minutes;
        var seconds = time % 60;
        if (seconds < 10) seconds = "0" + seconds;
        var text = minutes + ':' + seconds;
        el.innerHTML = text;
        time--;
    }, 1000);
}

function disableButtons() {
    joinGreenBtn.disabled = true;
    joinRedBtn.disabled = true;
}

function enableButtons() {
    joinGreenBtn.disabled = false;
    joinRedBtn.disabled = false;
}

function callCurrentGameFunction() {
     $.ajax({
            url: "<?php echo base_url('user/currentgame'); ?>",
            method: "POST",
            dataType: "json",
            success: function (response) {
                // Handle the response from the server
                if (response.status === "success") {
                    console.log(response.message);
                    console.log("Game ID: " + response.game_id);
                } else {
                    console.error("Error creating game: " + response.message);
                }
            },
            error: function () {
                console.error("AJAX request failed.");
            }
        });
}

countdown('clock', 0, okok);     
        
       
</script>





    


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- SweetAlert2 -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

<!--Accept Success Popup-->


<script>
$(document).ready(function() {
  $('#regist').submit(function(event) {
    event.preventDefault();
    // alert('hhhhhhhhhh');
    var amount = $("input[name='amount']").val();
    var remark = $("input[name='status']").val();

    $.ajax({
      url: '<?php echo base_url('user/game_invest'); ?>',
      type: 'POST',
      data: { amount: amount, remark: remark },
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
        } else {
          Swal.fire({
            title: "Error!",
            html: response.message.replace(/<\/?span[^>]*>/g, ''),
            icon: "error",
          })
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
  

        $.ajax({
            url: "<?php echo base_url('user/get_game_result'); ?>",
            type: "GET",
            dataType: "json",
            success: function(response) {
                
                if(response.message == 'Win'){
                    $('#winbtn').trigger( "click" );
                } else if(response.message == 'Loss'){
                    $('#lossbtn').trigger( "click" );
                } else{
                    console.log('Empty');
                }
            },
            error: function() {
                // Handle errors here
                console.log('Error fetching data');
            }
        });
    });
  
  
</script>

 <script>
        $(document).ready(function() {
            $(document).on('click', '.edit_btn', function() {
                
                var dt_status = $(this).attr("data-status");
                //alert(dt_status);
                $("#status").val(dt_status);
            });
        });
    </script>


<?php 
$hgb = $this->user->get_game(); 
$c_time = $hgb['c_time'];
$game_id = ($hgb['game_id'])*600;
$countiomee = ($game_id-$c_time)*1000;
?>
                       
                       
                       
<script>
// Function to call after countdown finishes
function myFunction() {
    location.reload(true);
    // Add your code here to do something after the countdown finishes
}

function addLeadingZero(number) {
    return (number < 10 ? '0' : '') + number;
}

// Set the countdown time (in milliseconds)




var countdownTime = <?=$countiomee?>; // 60 seconds

// Start the countdown
var countdownInterval = setInterval(function() {
    countdownTime -= 1000;
    if (countdownTime <= 0) {
        clearInterval(countdownInterval);
        myFunction(); // Call your function when countdown finishes
    } else {
        if (countdownTime <= 120000) {
            $( "#joinGreenBtn").prop( "disabled", true );
            $( "#joinRedBtn").prop( "disabled", true );
        }
        
        if (countdownTime <= 60000) {
            $( "#joinGreenBtn").prop( "disabled", true );
            $( "#joinRedBtn").prop( "disabled", true );
        }
    
    
        var hours = addLeadingZero(Math.floor(countdownTime / (1000 * 60 * 60)));
        var minutes = addLeadingZero(Math.floor((countdownTime % (1000 * 60 * 60)) / (1000 * 60)));
        var seconds = addLeadingZero(Math.floor((countdownTime % (1000 * 60)) / 1000));

        // Display the countdown in the #countdown element
        $('#countdown').text(minutes + ':' + seconds);
    }
}, 1000);
</script>


<?php include 'footer.php';?>    

<script>
function startLoader() {
  var loader = document.getElementById('loader');
  loader.classList.add('rotate');
}
</script>
