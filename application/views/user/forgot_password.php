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
    
                        <form action="<?=BASEURL?>user/verify_password" method="post">
                            <?php
                            if($this->input->post('username') != ""){ 
                                $user = $this->input->post('username');
                            } else{ 
                                $user = $username;
                            } ?>
                            <div>
                             <div class="form-floating mb-3">
                                     <input type="hidden" class="form-control" name="username" value="<?=$user;?>">
                                        <input type="text" class="form-control" name="password" >
                                        <label for="floatingInput">Password</label>
                                        <?=form_error('password');?>
                                    </div>
                                <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="confirm_password">
                                        <label for="floatingInput">Confirm Password</label>
                                        <?=form_error('confirm_password');?>
                                    </div>
                              </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-sm mt-3" type="submit">Submit</button>
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
