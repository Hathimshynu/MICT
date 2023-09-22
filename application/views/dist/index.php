<?php include 'header.php';?>

<style>

    ol li, ul li {
    list-style: revert!important;
    list-style-type: revert!important;
}

@media only screen and (max-width: 767px){
#header-06 .intro-text {
    margin-top: 24px !important;
    margin-bottom: 18px !important;
}
}
@media only screen and (max-width: 767px){
    #welcome_cryptonic_06 {
        padding: 27px 0 100px !important;
    }
}

@media screen and (max-width:500px){
    #faq-area-06 {
    padding-top: 0px !important;
    }
    #roadmap_06 .location_04 .location_wrapper .location .location_title {
    padding-bottom: 0px !important;
}
    #roadmap_06 {
        padding-bottom: 70px !important;
    }
    #header-06 .intro-text .btn_video_wrapper {
    margin-top: 25px !important;
   }
   #welcome_cryptonic_06 .sub-title {
       padding-top: 4px !important;
    margin-bottom: 9px !important;
   }
   .robot {
    margin-top: -20px !important;
}
.percentage{
    margin-top:0px !important;
}
#about_cryptonic_06{
    padding-top:0px !important;
}
#welcome_cryptonic_06{
    padding-bottom: 40px !important;
}
.about_cryptonic-content a{
    margin-top:50px !important;
}
#about_cryptonic_06 .about_cryptonic-content p {
    margin-bottom: 30px !important;
}
#about_cryptonic_06 .img-wrapper > img {
    margin-top: 0% !important;
}
#token_sale_06{
    margin-top: -92px !important;
}
  
}

    .dot::before {
        content: "\2022"; /* Unicode bullet character */
        margin-right: 5px; /* Adjust the spacing between the bullet and the text */
    }
#token_sale_06 .pricing_items .single-wrapper .pricing_single .offer_details h3 {
    font-size: 24px;
    font-weight: 600;
    color: white!important;
    margin-top: 25px;
    background-image: linear-gradient(to bottom, #9982ed 0%, #f879b6 100%);
    color: transparent;
    -webkit-background-clip: text;
    background-clip: text;
    transition: all 0.3s ease-in-out;
}

#token_sale_06 .pricing_items .single-wrapper .pricing_single:before {
    position: absolute;
    content: "";
    height: 100%;
    width: 100%;
     background: none!important; 
    left: 0;
    top: 0;
    z-index: -1;
    visibility: hidden;
    opacity: 0;
    transition: all 0.3s ease-in-out;
}

#token_sale_06 .pricing_items .single-wrapper .pricing_single .offer_details h3 {
   
    margin-top: -65px!important;
   
    padding: 17px!important;
}
#header-06 .navbar .navbar-nav .nav-item .nav-link.active, #header-06 .navbar .navbar-nav .nav-item .nav-link:hover {
    background: linear-gradient(to left, #9982ed 0%, #0000ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

#roadmap_06 .location_04 .location_wrapper span:after {
    position: absolute;
    top: 50%;
    left: 50%;
    height: 40px;
    width: 40px;
    border: 1px solid #221dfb!important;
    content: "";
    border-radius: 50%;
    transform: translate(-50%, -50%);
    background: linear-gradient(to left, #5b4df4 0%, #180e88 100%)!important;
    z-index: -2;
    opacity: 0.5;
}

#roadmap_06 .location_04 .location_wrapper .location .location_title h3 {
    font-weight: 500;
    font-size: 16px;
    color: #007bff!important;
    margin-bottom: 15px;
    background-image: linear-gradient(to left, #231dfb 0%, #2923fa 100%)!important;
    color: transparent;
    -webkit-background-clip: text;
    background-clip: text;
    display: inline-block;
}
#token_sale_06 .pricing_bottom .pricing_list_wrapper .item_list_1 li:before {
    border: 3px solid #3b32f8!important;
}
#best_feature_06 .feature_items .single-wrapper .single-items p {
    color: #ffffff!important;
    font-size: 16px;
    font-weight: 300;
    margin: 0;
    line-height: 26px;
}
#roadmap_06 .location_04 .location_wrapper .location .location_title p {
    font-size: 16px;
    font-weight: 300;
    margin: 0;
    color: #ffffff!important;
    text-align: revert!important;
}

#token_sale_06 .sub-title p {
    color: #ffffff!important;
}
#faq-area-06 .faq-wrapper .accordion-wrapper .accordion-single .panel-heading a {
    background-image: linear-gradient(-45deg, #000000 0%, #000000 100%)!important;
}
#faq-area-06 .faq-wrapper .accordion-wrapper .accordion-single .accordion-content p {
    font-size: 16px;
     color: white!important; 
    font-weight: 400;
    margin: 0;
}

#roadmap_06 .location_04 .location_wrapper span:before {
    position: absolute;
    top: 50%;
    left: 50%;
    height: 10px;
    width: 10px;
    background: blue!important;
    content: "";
    border-radius: 50%;
    transform: translate(-50%, -50%);
}
</style>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
   padding: 15px;
}

@property --angle {
  syntax: "<angle>";
  initial-value: 0deg;
  inherits: false;
}

.moving-border {
    width: 200px;
    height: 300px;
    position: relative;
    background: #130868;
    padding: 4px;
}
.moving-border::before,
.moving-border::after {
  content: "";
  position: absolute;
  inset: -0.2rem;
  z-index: -1;
  background: linear-gradient(var(--angle), 
    #032146,  #C3F2FF, #130868);
  animation: rotate 10s linear infinite;
}
.moving-border::after {
  filter: blur(10px);
}
@keyframes rotate {
  0%     { --angle: 0deg; }
  100%   { --angle: 360deg;
  }
}
.robot {
    background-image: url(<?=BASEURL?>assets/images/robot.png);
    height: 483px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
    margin-top: -94px;
}

.percentage {
    background-image: url(<?=BASEURL?>assets/images/tra.png);
    height: 483px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
   
}

.ani1 {
    width: 279px;
    position: relative;
    top: -49px;
}

.ani4 {
    font-family: fantasy;
    font-size: 58px;
    color: #7664f1;
    line-height:normal;
}
span.ani3 {
    font-size: 29px;
}

p.cur3 {
    font-family: ui-rounded;
    font-size: 29px;
    line-height: normal;
}

span.per {
    font-size: 82px;
    margin: 7px;
}
.card1 {
    margin: 30px auto;
    width: 920px;
    height: 185px;
    border-radius: 40px;
    /*box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);*/
        border: 1px solid blue;

    cursor: pointer;
    transition: 0.4s;
}
</style>

<style>
    
    #roadmap_06 .sub-title {
    margin: 0px 0 129px 0!important;
    text-align: left;
    max-width: 429px;
}

#roadmap_06 .location_04 .location_wrapper .location_3 {
    right: 20%!important;
    bottom: -5%!important;
}

p.cur2 {
    font-family: cursive;
    font-size: 83px;
    font-weight: 900;
    color: goldenrod;
    margin: 7px;
}
.per1 {
    margin-top: 22px;
    padding: 10px;
}
#token_sale_06 .pricing_bottom .pricing_list_wrapper {
   
    border: 1px solid #1e109b;
    padding: 60px;
    margin: 0 10px;
}
.text-start1 {
    text-align: center;
}

.rd::before {
    content: "";
    position: absolute;
    bottom: -25px;
    right: -41px;
    width: 161px;
    height: 161px;
    background-color: #007bff;
    border-radius: 50%;
}
.rd1 {
    padding: 20px;
}



@media screen and (max-width: 500px) {
  p.font1 {
    font-size: 15px!important;
    font-family: auto!important;
    color: lightblue!important;
   
}

p.font2 {
    font-size: 14px!important;
    font-family: auto!important;
    color: lightblue!important;
}

p.font3 {
    font-size: 13px!important;
    font-family: auto;
    color: lightblue;
}
p{
    margin-bottom:0px!important;
    
}
p.cur2 {
   
    font-size: 50px!important;
    font-weight: 900;
   
span.per {
    font-size: 46px!important;
}
/*.ani4 {*/
/*    top: -7px!important;*/
/*    font-family: fantasy;*/
/*    font-size: 48px!important;*/
/*    color: #7664f1;*/
/*    line-height: normal;*/
/*    position: absolute!important;*/
/*    left: 252px!important;*/
/*}*/

}


p.font1 {
    font-size: 29px;
    font-family: auto;
    color: lightblue;
}

p.font2 {
    font-size: 28px;
    font-family: auto;
    color: lightblue;
}

p.font3 {
    font-size: 16px;
    font-family: auto;
    color: lightblue;
}
#token_sale_06 {
    text-align: center;
    padding: 0px 0 0px!important;
    position: relative;
}

#best_feature_06 {
    text-align: center;
    padding: 0px 0 0px!important;
    position: relative;
    margin-top: 50px!important;
}
.bubble1,.bubble2,.bubble3,.bubble4{
    display:none !important;
}

.offer_details ul {
    font-size: 16px;
    list-style: square inside url("<?=BASEURL?>assets/website/assets/images/list-img.png") !important;
}
.offer_details ul li{
    padding-bottom:5px !important;
}

@media screen and (max-width:500px){
    #notes-mobile{
        display:block !important;
    }
    #notes-desktop{
        display:none !important;
    }
}

@media screen and (min-width:501px){
    #notes-mobile{
        display:none!important;
    }
     #notes-desktop{
        display:block !important;
    }
}
#token_sale_06 .pricing_items .single-wrapper .pricing_single .offer_details {
    padding: 27px 15px 15px !important;
}


</style>
  <div class="container">
        <div class="row">                
            <div class="col-12 col-md-12 col-lg-6">
                <div class="intro-text">
                    <h1>Welcome to MICT</h1>
                    <p>METAVERSE INTELLIGENCE CRYPTO TRADING</p>
                    <div class="btn_video_wrapper">
                        <a href="https://mict.uk/user" class="btn btn-default btn-default-style">Sign in</a>
                                            
                    </div>
                
                </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-6 img-wrapper">
                <div class="intro-img">
                    <div class="bounce_wrapper">
                        <img src="<?=BASEURL?>assets/website/assets/images/header-06.png" alt="">
                        <div class="shape-1">
                            <div class="box bounce-1"><img src="<?=BASEURL?>assets/website/assets/images/bounce/header1_b.png" alt=""></div>
                        </div>  
                    </div>
                </div>
            </div>               
        </div>  
    </div>
    <span class="shape1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/header6_shape_1.png" alt=""></span>
    <span class="shape2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/header6_shape_2.png" alt=""></span>
    <!--<span class="shape3 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/header6_shape_3.png" alt=""></span>   -->
    <span class="shape4 header-shape "><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/header6_shape_4.png" alt=""></span>   
    <!--<span class="shape5 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/header6_shape_5.png" alt=""></span>     -->
    <span class="shape6 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/header6_shape_6.png" alt=""></span>     

    <!--<span class="bubble1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed1.png" alt=""></span>   -->
    <!--<span class="bubble2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed1.png" alt=""></span>     -->
    <!--<span class="bubble3 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed2.png" alt=""></span>-->
    <!--<span class="bubble4 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed4.png" alt=""></span>  -->

    <div id="particles1-js" class="particles"></div>  
</header> <!-- End Header -->

<section id="welcome_cryptonic_06">
    <div class="container">
        <div class="row">        
            <div class="col-sm-12">
                <div class="sub-title">
                    <h2 class=" wow fadeInUp" data-animate="fadeInUp" data-delay=".1s">About MICT</h2>
                </div>
            </div>
        </div>      
        <div class="row ">     
            <div class="col-sm-12 col-md-10 col-lg-10 mx-auto">
                <div class="about_cryptonic-content">
                    <img src="<?=BASEURL?>assets/website/assets/images/newmic.png" alt=""  class="wow ZoomInUp" data-animate="ZoomInUp" data-delay=".3s" style="width:200px;">
                    <p class=" wow fadeInUp" data-animate="fadeInUp" data-delay="0.3s">
                        Welcome to MICT (Metavers Intelligence Crypto Trading), a cutting-edge platform that bridges the world of cryptocurrencies and intelligent trading strategies. At MICT, we bring together a team of seasoned professionals and the power of advanced technology to navigate the dynamic landscape of crypto trading.
                    </p>
                    <a href="#" class="btn btn-default btn-default-style wow fadeInUp" data-animate="fadeInUp" data-delay="0.4s">Learn More</a>
                </div>
            </div>           
        </div>         
    </div>
    <span class="shape1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/wel-map.png" alt=""></span>
    <span class="bubble1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed1.png" alt=""></span>   
    <span class="bubble2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed1.png" alt=""></span> 
    <div id="particles2-js" class="particles"></div>  
</section> <!-- End welcome_cryptonic -->

<section id="about_cryptonic_06">
    <div class="container">
        <div class="row">        
            <div class="col-sm-12 col-md-7 col-lg-5 padding-none">
                <div class="about_cryptonic-content">
    <h2 class="wow fadeInUp" data-animate="fadeInUp" data-delay="0.2s">Gaming Income Plan</h2>
    <p class="wow fadeInUp" data-animate="fadeInUp" data-delay="0.3s">Engage in our Gaming Income plan with two exciting games. While a flat 20% service charge is applied to profits, the engaging experiences of games occurring every 10 minutes, promise excitement and rewards.</p>
    
    <table class=" moving-border" style="width:100%">
        <tr>
            <td>Level 1:</td>
            <td><p style="text-align: start">20% commission</p></td>
        </tr>
        <tr>
            <td>Level 2:</td>
            <td><p style="text-align: start">15% commission</p></td>
        </tr>
        <tr>
            <td>Level 3:</td>
            <td><p style="text-align: start">10% commission</p></td>
        </tr>
        <tr>
            <td>Level 4:</td>
            <td><p style="text-align: start">5% commission</p></td>
        </tr>
        <tr>
            <td>Level 5:</td>
            <td><p style="text-align: start">1% commission</p></td>
        </tr>
    </table>
    
    <p class="wow fadeInUp" data-animate="fadeInUp" data-delay="0.4s">We're proud to present this comprehensive overview of our AI Trading System and Gaming Income plan. Stay tuned for an enhanced investment experience that combines innovation, growth, and financial prosperity.</p>
    
</div>

            </div>
            <div class="col-sm-12 col-md-5 col-lg-7">
                <div class="about-img">
                    <div class="img-wrapper">
                         <img src="<?=BASEURL?>assets/website/assets/images/index-about.png" alt=""  class="wow fadeInUp" data-animate="fadeInUp" data-delay=".3s">
                    </div>
                </div>
            </div>            
        </div>    
    </div>
    <!--<span class="shape1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/about-light-1.png" alt=""></span>-->
    <span class="shape2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/about-light-2.png" alt=""></span>
    <span class="bubble1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed1.png" alt=""></span>   
    <span class="bubble2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed2.png" alt=""></span>     
    <span class="bubble3 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed3.png" alt=""></span>
    <div id="particles3-js" class="particles"></div>
</section> <!-- End about_cryptonic -->


<!--<section id="token_sale_07">-->
<!--    <div class="container">-->
<!--        <div class="row">        -->
<!--            <div class="col-sm-12">-->
<!--                <div class="sub-title">-->
<!--                    <h6 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">Token</h6>-->
<!--                    <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">Income</h2>-->
<!--                     <p>we are offering complimentary Associat Club memberships until September 30th. Additionally, the first 100 members to join will enjoy an exclusive 3-month membership. We believe in maximizing your potential, which is why the initial investment limit is set at 120. However, surpassing this limit will still grant you a profit ratio of 120.</p>-->

<!--                </div>-->
<!--            </div>-->
<!--        </div>        -->
<!--        <div class="row pricing_items">        -->
<!--            <div class="col-sm-12 col-md-6 col-lg-6 single-wrapper wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">-->
<!--                <div class="pricing_single">-->
                   
<!--                    <div class="offer_details">-->
                       
<!--                        <h3 >SLAB 3 - Personalized Criteria:</h3>-->
<!--                    </div>-->
                   
                        
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-12 col-md-6 col-lg-6 single-wrapper wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">-->
<!--                <div class="pricing_single">-->
                   
<!--                    <div class="offer_details">-->
                       
<!--                        <h3>SLAB 4 - Personalized Criteria:</h3>-->
<!--                    </div>-->
                   
                        
<!--                </div>-->
<!--            </div>-->
            
<!--        </div> -->
 

<!--        <div class="row pricing_bottom">        -->
<!--            <div class="col-sm-12 col-md-12 col-lg-12">  -->
<!--                <div class="pricing_list_wrapper">-->
<!--                    <ul class="list-unstyled item_list_1  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">-->
<!--                        <li><h3 style="font-size:15px">SLAB 1 - No Criteria:</h3> <span>30,60,120</span></li>-->
<!--                        <li><h3 style="font-size:15px">SLAB 4 - Personalized Criteria:</h3> <span>10000,15000,25000</span></li>-->
<!--                     </ul>                -->
<!--                     <ul class="list-unstyled item_list_2  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">-->
<!--                        <li><h3 style="font-size:15px">SLAB 2 - No Criteria:</h3> <span>250,550,1100</span></li>-->
<!--                        <li><h3 style="font-size:15px">return percentages levels</h3> <span>-->
<!--                              Level 1: 12%,-->
<!--                            Level 2: 8%,-->
<!--                            Level 3: 6%,-->
<!--                            Level 4: 3%,-->
<!--                            Level 5: 1%-->
<!--                        </span></li>-->
<!--                     </ul>                -->
<!--                     <ul class="list-unstyled item_list_3  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">-->
<!--                        <li><h3 style="font-size:15px">SLAB 3 - Personalized Criteria:</h3> <span>-->
<!--                          2250,-->
<!--                        3500,-->
<!--                        5000-->
<!--                        </span></li>-->
                      
<!--                     </ul>-->

 
<!--                </div>-->
<!--            </div>-->
<!--        </div>          -->
<!--    </div>-->
<!--    <span class="shape1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/token_sale.png" alt=""></span> -->
<!--    <span class="shape2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/token_sale_1.png" alt=""></span>  -->
<!--    <span class="bubble1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed1.png" alt=""></span>   -->
<!--    <span class="bubble2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed1.png" alt=""></span>     -->
<!--    <span class="bubble4 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed3.png" alt=""></span>-->
<!--    <div id="particles5-js" class="particles"></div>  -->
<!--</section> -->




<section id="token_sale_07">
    <div class="container">
            <div class="row">        
            <div class="col-lg-12">
                <div class="sub-title">
                   
                    <h2>ARTIFICIAL INTELLIGENCE CRYPTO TRADING</h2>
                
                </div>
                 <div class="sub-title">
                   
                    <P>
                        In the fast-paced world of cryptocurrency trading, traditional methods are giving way to cutting-edge innova-
tions. Our Al-based crypto trading method utilizes advanced algorithms and machine learning to analyze market
trends, predict price movements, and execute trades with unparalleled precision.

                    </P>
                
                </div>
                <div class="ani1"><p class="ani2"><span class="ani3">Start Trading with Just</span> <span class="ani4">$30</span></p></div>
               
                 </div>
                 <div class="col-lg-12">
                     <div class="row">
                     <div class="col-lg-6">
                         
                        <table class="moving-border" style="width:100%" >
  <tr>
    <th colspan="2" style="width:50%">Referral Bonus</th>
  
  </tr>
  <tr>
    <td style="width:50%">Level - 01</td>
    <td style="width:50%">12%</td>
  
    
  </tr>
  <tr>
      <td style="width:50%">Level - 02</td>
    <td style="width:50%">8%</td>
  </tr>
   <tr>
      <td style="width:50%">Level - 03</td>
    <td style="width:50%">6%</td>
  </tr>
    <tr>
      <td style="width:50%">Level - 04</td>
    <td style="width:50%">3%</td>
  </tr>
   <tr>
      <td style="width:50%">Level - 05</td>
    <td style="width:50%">1%</td>
  </tr>

</table>

                         
                     </div>
                     
                     <div class="col-lg-6 robot">
                         
                         
                     </div>
                     <div class="col-lg-12 mt-5 percentage">
                         
                         <div class="d-flex justify-content-center">
                             <div class="cur1"><p class="cur2">Enjoy</p></div>
                             <div class="cur1"><p class="cur3">Daily profit <br>for a Life Time</p></div>
                         </div>
                         
                         <div class="per1" >
                             <p class="text-center"><span class="per">2</span><span class="per">-</span><span class="per">6</span><span class="per">%</span></p>
                             
                         </div>
                         
                     </div>
                     </div>
                     
                     
                     
                 </div>
                  </div>
            
    </div>
    
</section>











<section id="token_sale_06">
    <div class="container">
        <div class="row">        
            <div class="col-sm-12">
                <div class="sub-title">
                    <!--<h6 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">Token</h6>-->
                    <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">Financial Slab</h2>
                     <p>we are offering complimentary Associat Club memberships until September 30th. Additionally, the first 100 members to join will enjoy an exclusive 3-month membership. We believe in maximizing your potential, which is why the initial investment limit is set at 120. However, surpassing this limit will still grant you a profit ratio of 120.

Please note that trading will not be available on Fridays as we observe a non-trading day. Our unique SLAB system offers three distinct levels tailored to your preferences.</p>
                </div>
            </div>
        </div>        
        <div class="row pricing_items">   
         <div class="col-sm-12 col-md-6 col-lg-12 single-wrapper wow fadeInUp mb-2" data-wow-duration="2s" data-wow-delay=".2s">
                <div class="pricing_single">
                    
                     <div class="offer_details text-start d-sm-none d-md-none d-lg-none d-xl-none d-xxl-none" id="notes-mobile">
                        <!--<h3 style="text-align:start;">NOTES:</h3>-->
                        
                        <ul>
                        <li style="text-align:start;" class="">To begin your investment journey, a minimum of $30 is required.</li>
                        <li style="text-align:start;" class="">
Until september 30, enjoy a free membership to our prestigious DIAMOND MASTER CLUB, granting you access to a network of like-minded investors and exclusive insights.
</li>
                        <li style="text-align:start;" class="">
                            For new ID's, a maximum investment of $120 is allowed until the completion of the respective slab period (that is Friday).

                        </li>
                        <li style="text-align:start;" class="">
                            Every Friday marks our slab changing day. In case you need to change the slab, you should do it on friday. Please note that there will be no trading activity on slab changing days.
                        </li>
                         <li style="text-align:start;" class="">
                            * To Enter <b>SLAB3</b> ensure a minimum personal account balance of $2,250. Additionally, from any of your
first three generations, you need at least 10 individuals with a combined investment of $10,000.
                        </li>
                         <li style="text-align:start;" class="">
                           ** To Enter <b>SLAB4</b> establish a minimum personal account balance of $10,000. To meet the criteria, your
network's total investment across generations must reach an impressive sum of 10 lakhs USDT.
                        </li>
                        
                        </ul>
                        
                        
                    </div>
                   
                    <div class="offer_details text-start" id="notes-desktop">
                        
                        
                       
                        <!--<h3 style="text-align:start;">NOTES:</h3>-->
                        
                        <ul>
                        <p style="text-align:start;" class=""><i style="color:#FEF130 !important;margin-right:5px !important;font-size:16px !important;" class="fa-solid fa-circle-chevron-right arrow-icon me-1"></i>To begin your investment journey, a minimum of $30 is required.</p>
                        <p style="text-align:start;" class="d-flex"><i style="color:#FEF130 !important;margin-right:5px !important;font-size:16px !important;" class="fa-solid fa-circle-chevron-right arrow-icon me-1"></i>
Until september 30, enjoy a free membership to our prestigious DIAMOND MASTER CLUB, granting you access to a network of like-minded investors and exclusive insights.
</p>
                        <p style="text-align:start;" class=""><i style="color:#FEF130 !important;margin-right:5px !important;font-size:16px !important;" class="fa-solid fa-circle-chevron-right arrow-icon me-1"></i>
                            For new ID's, a maximum investment of $120 is allowed until the completion of the respective slab period (that is Friday).

                        </p>
                        <p style="text-align:start;"><i style="color:#FEF130 !important;margin-right:5px !important;font-size:16px !important;" class="fa-solid fa-circle-chevron-right arrow-icon me-1"></i>
                            Every Friday marks our slab changing day. In case you need to change the slab, you should do it on friday. Please note that there will be no trading activity on slab changing days.
                        </p>
                         <p style="text-align:start;"><i style="color:#FEF130 !important;margin-right:5px !important;font-size:16px !important;" class="fa-solid fa-circle-chevron-right arrow-icon me-1"></i>
                            * To Enter <b>SLAB3</b> ensure a minimum personal account balance of $2,250. Additionally, from any of your
first three generations, you need at least 10 individuals with a combined investment of $10,000.
                        </p>
                         <p style="text-align:start;"><i style="color:#FEF130 !important;margin-right:5px !important;font-size:16px !important;" class="fa-solid fa-circle-chevron-right arrow-icon me-1"></i>
                            ** To Enter <b>SLAB4</b> establish a minimum personal account balance of $10,000. To meet the criteria, your
network's total investment across generations must reach an impressive sum of 10 lakhs USDT.
                        </p>
                        
                        </ul>
                        
                        
                    </div>
                   
                        
                </div>
            </div>
            <!--<div class="col-sm-12 col-md-6 col-lg-6 single-wrapper wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">-->
            <!--    <div class="pricing_single">-->
                   
            <!--        <div class="offer_details">-->
                       
            <!--            <h3 >SLAB 3 - Personalized Criteria:</h3>-->
            <!--            <p>-->
            <!--                *To enter SLAB 3, ensure a minimum personal account balance of $2,250. Additionally, from any of your first three generations, you need at least 10 individuals with a combined investment of $10,000.-->
            <!--            </p>-->
            <!--        </div>-->
                   
                        
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-sm-12 col-md-6 col-lg-6 single-wrapper wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">-->
            <!--    <div class="pricing_single">-->
                   
            <!--        <div class="offer_details">-->
                       
            <!--            <h3>SLAB 4 - Personalized Criteria:</h3>-->
            <!--            <p>-->
            <!--                ** For SLAB 4, establish a minimum personal account balance of $10,000. To meet the criteria, your network's total investment across generations must reach an impressive sum of 10 lakhs usdt.-->
            <!--            </p>-->
            <!--        </div>-->
                   
                        
            <!--    </div>-->
            <!--</div>-->
            
        </div> 
 

        <div class="row pricing_bottom">        
            <div class="col-lg-12 col-md-12 col-sm-12">  
         
                <div class="">
                          <div class="sub-title">
                   
                    <h2>INVESTMENT SLAB</h2>
                
                </div>
                 
                     
                   
                      <table class="moving-border" style="width:100%" >
  <tr>
    <th style="width:25%">Slab 1</th>
     <th style="width:25%">Slab 2</th>
      <th style="width:25%">Slab 3</th>
      <th style="width:25%">Slab 4</th>
  
  </tr>
  <tr>
    <td style="width:25%">$30</td>
    <td style="width:25%">$250</td>
     <td style="width:25%">$2250</td>
     <td style="width:25%">$10000</td>
    
    </tr>
    
     <tr>
    <td style="width:25%">$60</td>
    <td style="width:25%">$550</td>
     <td style="width:25%">$2500</td>
     <td style="width:25%">$15000</td>
    
    </tr>
    
      <tr>
    <td style="width:25%">$120</td>
    <td style="width:25%">$1100</td>
     <td style="width:25%">5000</td>
     <td style="width:25%">$25000</td>
    
    </tr>
  


</table>


<!--<div class="mt-2">-->
   
<!--        <p class="text-start">To begin your investment journey,a minimum of $30 is required</p>-->
<!--        <p class="text-start">Until september 30,enjoy a free membership to our prestigious DIAMOND MASTER CLUB, granting you access to a network of like-minded investors and exclusive insights</p>-->
<!--        <p class="text-start">For new ID's,a maximum investment of $ 120 is allowed untill the completion of the respective slab period(that is Friday)</p>-->
<!--        <p class="text-start">Every Friday marks our slab changing day. In case you need to change the slab, you should do it on friday. Please note that there will be no trading activity on slab changing days.</p>-->
 
  
    
<!--</div>-->



<div class="d-flex justify-content-center mt-5">
  <table class="moving-border" style="width:80%">
    
 
  <tr>
    <th style="width:30%">Direct Referral</th>
    <th style="width:70%">Extra Bonus Reward</th> 
  </tr>

   <tr>
    <td style="width:25%">10</td>
    <td class="text-start1" style="width:25%">Receive an impressive 10% Extra</td>
   
    </tr>
     <tr>
    <td style="width:25%">20</td>
    <td class="text-start1" style="width:25%">Enjoy a substantial boost of 20%</td>
   
    </tr>
      <tr>
    <td style="width:25%">30</td>
    <td class="text-start1" style="width:25%">Elevate a remarkable 50%</td>
   
    </tr>
      <tr>
    <td style="width:25%">50</td>
    <td class="text-start1 " style="width:25%">Reach the Pinnacle with 100%</td>
     
   
    </tr>
  
         
     
</table>
    
</div>

<div class="d-flex justify-content-center mt-2">
    
    <div class="card1">
        <p class="font1 mt-4">Bring in 50 direct Referrals within 72 hours</p>
        <p class="font2">You'll get the 1<sup>st</sup> CSO nomination from the Asian region!</p>
        <p class="font3 mt-1">(Company will provide full financial support,facility center amount,CSO salary,staff salary)</p>
    </div>
    
</div>
<div class="d-flex justify-content-center mt-2">
    <p class=""><span></span>NOTE:To qualify for rewards,you must provide valid proof of your referrals and meet the specified criteria. join now and let your journey to greateness begin!</p>
</div>






 
                </div>
            </div>
          
        </div>          
    </div>
    <!--<span class="shape1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/token_sale.png" alt=""></span> -->
    <!--<span class="shape2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/token_sale_1.png" alt=""></span>  -->
    <span class="bubble1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed1.png" alt=""></span>   
    <span class="bubble2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed1.png" alt=""></span>     
    <span class="bubble4 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/particals_icon/fixed3.png" alt=""></span>
    <div id="particles5-js" class="particles"></div>  
</section> <!-- End token_sale -->

<section id="best_feature_06">
    <div class="container">
        <div class="row">        
            <div class="col-sm-12">
                <div class="sub-title">
                   
                    <h2>Our leadership recognition program comprises several tiers:</h2>
                
                </div>
            </div>
        </div>        
        <div class="row feature_items d-flex justify-content-between">        
            <div class="col-sm-12 col-md-6 col-lg-12 single-wrapper">
                <div class="single-items wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                    <h3>CSO Criteria</h3>
                    <img src="<?=BASEURL?>assets/website/assets/images/icons/feature-01.png" alt="">
                    <p>
                        CSO: 100 accounts spanning three levels<br>
GM: Achieved through 10 CSOs from five levels<br>
Wise President: Honored with 25 CSOs<br>
President: Accomplished with 10 GMs<br>
National Ambassador: Celebrated when five Presidents are established<br>
                     </p>
                </div>
            </div>

            

            
        </div>  
    </div>
    <!--<span class="shape1 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/feature-1.png" alt=""></span>-->
    <div id="particles4-js" class="particles"></div>  
</section> 


<section id="roadmap_06" >
    <div class="container"  id="ourmission">
        <div class="row">        
            <div class="col-lg-12">
                <div class="sub-title">
                    <h2 class=" wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s" >Our Mission*</h2>
                    <p class=" wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                        Our mission is to empower investors with the tools and expertise needed to navigate the complex world of cryptocurrencies. We aim to provide a secure and transparent environment where investors can participate in crypto trading activities with confidence, backed by the expertise of our experienced traders.
                    </p>
                </div>
            </div>
        </div>     
        <div class="row">        
            <div class="location_04">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="location_wrapper">
                        <div class="roadmap_position"></div>
                        <div class="location location_top location_1  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                            <!--<div class="map_date">-->
                            <!--    <h5>August, 2020</h5>-->
                            <!--</div>-->
                            <span></span>
                            <div class="location_title">
                                <h3>Professional Expertise*</h3>
                                <p>
                                    Our team consists of skilled crypto traders with a deep understanding of market trends, analysis, and risk management. With years of experience in the field, our traders leverage their knowledge to make informed decisions, taking advantage of opportunities in the ever-evolving crypto market.
                                </p>
                            </div>
                        </div>
                        <div class="location location_bttom location_2  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                            <!--<div class="map_date">-->
                            <!--    <h5>July, 2020</h5>-->
                            <!--</div>-->
                            <span></span>
                            <div class="location_title">
                                <h3>Innovative Approach*</h3>
                                <p>
                                    At MICT, we harness the power of advanced technology, artificial intelligence, and data analysis to inform our trading strategies. Our approach combines traditional trading practices with cutting-edge tools, enabling us to adapt swiftly to market changes and make calculated decisions.
                                </p>
                            </div>
                        </div>
                        <div class="location location_top location_3  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                            <!--<div class="map_date">-->
                            <!--    <h5>July, 2020</h5>-->
                            <!--</div>-->
                            <span></span>
                            <div class="location_title">
                                <h3>Transparency and Accountability*</h3>
                                <p>
                                    We believe in transparency as the foundation of trust. Our profit sharing program is designed to ensure that investors can track and verify the outcomes of our trading activities. While we don't guarantee daily profits, we do commit to sharing the net profit or loss, allowing our investors to make informed choices.
                                    
                                </p>
                            </div>
                        </div>
                        <div class="location location_bttom location_4  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                            <!--<div class="map_date">-->
                            <!--    <h5>July, 2020</h5>-->
                            <!--</div>-->
                            <span></span>
                            <div class="location_title">
                                <h3>Investor-Centric Approach*</h3>
                                <p>
                                    We prioritize our investors' needs and aspirations. Our diverse investment plans cater to different risk appetites and investment goals. Whether you're a seasoned trader or new to the world of cryptocurrencies, we offer options that align with your preferences.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <span class="shape2 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/road_map_2.png" alt=""></span>
    <span class="shape3 header-shape"><img src="<?=BASEURL?>assets/website/assets/images/shape/home_6/road_map_3.png" alt=""></span>   
    <div id="particles7-js" class="particles"></div>
</section> <!-- End roadmap -->



<section id="faq-area-06" class="faq-area">
    <div class="container">
        <div class="row">        
            <div class="col-sm-12">
                <div class="sub-title">
                    <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">Frequently Asked Questions</h2>
                    <p class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">Artificial based on the neural network, the NRM assistant will instantly analyze user data use.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-5">
                <div class="faq-img  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <img src="<?=BASEURL?>assets/website/assets/images/fap-01.png" alt="" class="img-fluid">
                </div>
            </div>            
            <div class="col-sm-12 col-md-12 col-lg-7">
                <div class="faq-wrapper">
                        <!--Accordion wrapper-->
                    <div class="panel-group accordion-wrapper" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel accordion-single accordion-01  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title" style="color:white!important">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Who is the CSO of the company?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-body  accordion-content">
                                    <p>The CSO of the company is Mr. John William, recognized as a Crypto Giant Among Economists. He is a prominent British National Economist known for his expertise in the field of cryptocurrencies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel accordion-single accordion-02  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                            <div class="panel-heading active" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What is the minimum investment amount? 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse  in show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body  accordion-content">
                                    <p>The minimum investment amount is 30 USDT.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel accordion-single accordion-03  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                       What is the maximum amount an individual can invest? 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="card-body  accordion-content">
                                    <p> Initially, an individual can invest a maximum of 120 dollars. Once a thorough understanding of MICT, AI, and Strategy is acquired, higher investment amounts can be considered based on various tiers. </p>
                                </div>
                            </div>
                        </div>                        
                        <div class="panel accordion-single accordion-03  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                            <div class="panel-heading" role="tab" id="headingfour">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                         Does this company possess legal legitimacy?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                              <div class="card-body  accordion-content">
                                    <p>Yes, this company holds legal recognition as a financial institution registered under the UK Government Act (Registration Number: 15039802).</p>
                                </div>
                            </div>
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="particles10-js" class="particles"></div>
</section><!-- End faq-area -->

<section id="contact_06">
    <div class="container">       
        <div class="row">           
            <div class="col-md-6">
                <div class="address_wrapper" id="contact">
                     <div class="sub-title">
                        <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">Get in touch with us</h2>
                    </div>
                    <div class="contact-info-wrapper">
                        <div class="contact-info">
                            <div class="single-list wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                <div class="address_title"><img src="assets/website/assets/images/icons/contact_1.png" alt=""><span>Address</span></div>
                                <div class="title_caption">
                                    <span>11 Ebury Street, Westminster, <br>
                                    United Kingdom, SW1W9QN
                                    </span>
                                </div>
                            </div>
                            <div class="single-list wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                                <div class="address_title"><img src="assets/website/assets/images/icons/contact_2.png" alt=""><span>Call Us</span></div>
                                <div class="title_caption">
                                    <span>+44 7700 177165</span><br>
                                    <!--<span>+021 554 598 562</span>-->
                                </div>
                            </div>
                            <div class="single-list wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                                <div class="address_title"><img style="height: 22px !important;width: auto;" src="assets/website/assets/images/icons/contact_3.png" alt=""><span>E-mail</span></div>
                                <div class="title_caption">
                                    <span>info@mict.uk</span><br>
                                    <span>support@mict.uk</span>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact_form">
                    <form action="#">
                        <div class="row">
                            <div class="col-12 col-sm-12  form-group  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                <input type="text" class="form-control" id="name" placeholder="Your Name">
                            </div>
                            <div class="col-12 col-sm-12  form-group  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                                <input type="email" class="form-control person-email" id="email" placeholder="E-mail Address">
                            </div>
                            <div class="col-12 col-sm-12 form-group  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                                <textarea class="form-control" id="comment" placeholder="Massage"></textarea>
                            </div>                              
                            <div class="col-12 col-sm-12 form-group">
                                <div class="submit-btn  wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                                     <input type="submit" value="Send Massage">
                                </div>
                            </div>
                        </div>
                    </form>   
                </div>                     
            </div>                  
        </div>                   
    </div>
    <div id="particles11-js" class="particles"></div>
</section>

<?php include 'footer.php';?>



