<!doctype html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>COINEX | Responsive Bootstrap 5 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?=BASEURL?>assets/images/favicon.ico" />
      <link rel="stylesheet" href="<?=BASEURL?>assets/css/libs.min.css">
      <link rel="stylesheet" href="<?=BASEURL?>assets/css/coinex.css?v=1.0.0">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Google Tag Manager -->
      
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WNGH9RL');window.tag_manager_event='dashboard-free-preview';window.tag_manager_product='Coinex';</script>
      <!-- End Google Tag Manager -->  </head>
  <body class="" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
      <div style="background-image: url('<?=BASEURL?>assets/images/auth/01.png')" >  
        <div class="wrapper">
<section class="vh-100 bg-image">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-body">
                         <div class="auth-form">
                            <div class="text-center">
                                <h2 >Reset Password</h2>
                            </div>
            <form action="<?=BASEURL?>user/forget_password" method="post">
                            <div>
                                <p class="mt-3 text-center">Enter your Username and we'll send you an otp
                                    with instructions to reset your password.</p>
                   <div id="demo"></div>
                   <div id="timer"></div>
                             <div class="input-group form-floating mb-3">
                                  <input type="text" class="form-control" aria-label="Recipient's username"  id="username" aria-describedby="button-addon2" value="" name="name">
                                   
                                  <button class="btn btn-light btn-btn-primary mt-6"  type="button" id="button-addon2" onclick="otp()">Send OTP</button>
                                  <label for="floatingInput">Username <?=form_error('username');?></label>
                                  </div>
                                <div class="form-floating mb-3">
                                        <input type="text"  value="" name="otpp" class="form-control">
                                        <label for="floatingInput">OTP <?=form_error('otpp');?></label>
                                    </div>
                               
                              </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-sm mt-3" type="submit">Verify</button>
                            </div>
            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
      </div>
      
    
    <!-- Backend Bundle JavaScript -->
    <script src="<?=BASEURL?>assets/js/libs.min.js"></script>
    <!-- widgetchart JavaScript -->
    <script src="<?=BASEURL?>assets/js/charts/widgetcharts.js"></script>
    <!-- fslightbox JavaScript -->
    <script src="<?=BASEURL?>assets/js/fslightbox.js"></script>
    <!-- app JavaScript -->
    <script src="<?=BASEURL?>assets/js/app.js"></script>
    <!-- apexchart JavaScript -->
    <script src="<?=BASEURL?>assets/js/charts/apexcharts.js"></script>
  </body>
</html>

// <script>
//   function otp(){
//       var em = document.getElementById('username').value;
//       alert(em);
//       if(em == "")
//       {
//          document.getElementById("demo").innerHTML = "Please enter user id*";
//       }
//       else
//       {
//          $.post('<?=BASEURL?>user/forgot_mail_check', {
//             'username': em,
//          })
//          .done(function(res) {
//             if(res!='success') {
//               document.getElementById("demo").innerHTML = "Please enter valid user Id.";
//             } else{
//               document.getElementById("demo").innerHTML = "OTP has sent to your registred email";
//               document.getElementById("sendotp").style.pointerEvents = "none";
   
//               document.getElementById('timer').innerHTML =
//               05 + ":" + 00;
//               startTimer();
//               function startTimer() {
//                   var presentTime = document.getElementById('timer').innerHTML;
//                   var timeArray = presentTime.split(/[:]+/);
//                   var m = timeArray[0];
//                   var s = checkSecond((timeArray[1] - 1));
//                   if(s==59){m=m-1}
//                      if(m<0){
//                         document.getElementById("demo").innerHTML = "If you don't get OTP. Click send OTP again";
//                         document.getElementById("sendotp").style.pointerEvents = "none";
//                         return
//                      }
   
//                      document.getElementById('timer').innerHTML =
//                      m + ":" + s;
//                      console.log(m)
//                      setTimeout(startTimer, 1000);
   
//                   }
   
//                   function checkSecond(sec) {
//                      if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
//                      if (sec < 0) {sec = "59"};
//                      return sec;
//                      }
//                      }
//   });
//       }
//   }
// </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   function otp() {
      var em = document.getElementById('username').value;
    //   alert(em);
      if (em == "") {
         document.getElementById("demo").innerHTML = "Please enter user id*";
      } else {
         $.post('<?=BASEURL?>user/forgot_mail_check', {
            'username': em,
         })
         .done(function (res) {
            if (res == 'success') {
               document.getElementById("demo").innerHTML = "OTP has been sent to your registered email";
               document.getElementById("sendotp").style.pointerEvents = "none";

               document.getElementById('timer').innerHTML = "05:00";
               startTimer();

               function startTimer() {
                  var presentTime = document.getElementById('timer').innerHTML;
                  var timeArray = presentTime.split(/[:]+/);
                  var m = parseInt(timeArray[0], 10);
                  var s = parseInt(timeArray[1], 10);
                  if (s === 0) {
                     m -= 1;
                     s = 59;
                  } else {
                     s -= 1;
                  }

                  if (m < 0) {
                     document.getElementById("demo").innerHTML = "If you don't get OTP, click 'Send OTP' again.";
                     document.getElementById("sendotp").style.pointerEvents = "auto";
                     return;
                  }

                  document.getElementById('timer').innerHTML = (m < 10 ? "0" : "") + m + ":" + (s < 10 ? "0" : "") + s;
                  setTimeout(startTimer, 1000);
               }
            } else if (res == 'empty') {
               document.getElementById("demo").innerHTML = "Please enter valid user Id.";
            } else {
               document.getElementById("demo").innerHTML = "OTP has been sent to your registered email";
            }
         })
     
      }
   }
</script>
