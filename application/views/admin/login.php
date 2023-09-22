<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>MICT | Admin login</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?=BASEURL?>assets/images/favicon.ico">
      <link rel="stylesheet" href="<?=BASEURL?>assets/css/libs.min.css">
      <link rel="stylesheet" href="<?=BASEURL?>assets/css/coinex.css">
      </head>
  <body class="" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <!--<div id="loading">-->
    <!--  <div class="loader simple-loader">-->
    <!--      <div class="loader-body"></div>-->
    <!--  </div>    </div>-->
    <!-- loader END -->
      <div style="background-image: url('<?=BASEURL?>assets/images/auth/01.png')">  
        <div class="wrapper">
<section class="vh-100 bg-image">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="auth-form">
                                <h2 class="text-center mb-4">Sign In</h2>
                                <?php  if ($this->session->flashdata('error_message')) { ?>
                                    <div class="alert alert-left alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        <?php echo $this->session->flashdata('error_message');?>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?> 
                                <form action="<?=BASEURL?>admin/login" method="post">
                                    <h6 class="mt-2 mb-2 text-center text-danger"><?=$this->session->userdata('error_message'); ?></h6>
                                    <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" value="" name="username">
                                        <label for="floatingInput">User ID</label>
                                    </div>
                                     <div class="form-floating mb-2">
                                        <input type="password" class="form-control" id="Password" value="" name="password">
                                        <label for="Password">Password</label>
                                    </div>
                                    <div class="d-flex justify-content-between  align-items-center flex-wrap">
                                        <!--<div class="form-group">-->
                                        <!--    <div class="form-check">-->
                                        <!--        <input class="form-check-input" type="checkbox" id="Remember">-->
                                        <!--        <label class="form-check-label" for="Remember">Remember me?</label>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <a href="#page-forgot-password.html">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                     <button type="submit" class="btn btn-primary"> Sign In</button>
                                    </div>
                                    
                              
                                </form>
                                <!--<div class="new-account mt-3 text-center">-->
                                <!--    <p>Don't have an account? <a class="" href="<?=BASEURL?>admin/registration">Click-->
                                <!--            here to sign up</a></p>-->
                                <!--</div>-->
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