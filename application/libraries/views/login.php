<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- Bootstrap CSS -->
    <link href="<?=BASEURL?>assets/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- Fontawesome Icon -->
    <?php $comp = $this->db->get('setup')->row_array();?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?=$comp['company_name']?></title>
    <link rel="icon" href="<?=WEBURL.$comp['fav_file']?>" type="image/png" sizes="16x16">
  </head>
  <style>
  

  * {
    font-family: 'Mulish', sans-serif;
  }

  body {
    margin: 0;
    padding: 0;
  }

  .main-container {
    width: 100%;
    height: 100vh;
    background: url(<?=WEBURL?>l-bg1.jpg);
    background-position:75% 0%!important;
    transition: 0.4s linear;
  }

  .box {
    width: 400px!important;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 40px;
    box-sizing: border-box;
    box-shadow: 0px 15px 25px rgb(0 0 0 / 25%)!important;
    border-radius: 10px;
  }

  .box h2 {

    padding: 0;
    color: #f45b0f;
    text-align: left;
    font-weight: 600;
  }
  .box p {
    margin-bottom: 30px;
  }

  .box p:nth-child(even) {
    margin-top: 0;
  }

  .box a {
    color: #F45B0F;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
    text-transform: uppercase;
  }

  .box .input-box {
    position: relative;
    margin-bottom: 30px;
  }

  .box .input-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px; 
    color: #163049a1;
    border: 1px solid #fff;
    border: none;
    border-bottom-style: solid;
    outline: none;
    letter-spacing: 1px;
    background: transparent;
  }

  .box .input-box label {
    position: absolute;
    color: #464646;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    pointer-events: none;
    transition: .5s;
  }

  .box .input-box input:focus ~ label,
  .box .input-box input:valid ~ label{
    top: -18px;
    left: 0;
    color: #163049a1;
    font-size: 12px;
  }

  .box input[type=submit] {
    background: transparent;
    border: none;
    outline: none;
    background: #F45B0F;
    color: #fff;
    padding: 8px 20px;
    cursor: pointer;
    float: right;
    border-radius: 50px;
  }


  @media(max-width:768px){
   .box {
    width: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: transparent;
    padding: 40px;
    box-sizing: border-box;
    box-shadow: 0px 15px 25px rgb(0 0 0 / 0%);

  }
  .box .input-box {
    position: relative;
    margin-bottom: 30px;
    width: 90%;
  }
  .box a {
    color: #F45B0F;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
    text-transform: uppercase;
  }
  .box h2 {
    margin: 0px;
    padding: 0;
    color:#142e47;
    text-align: left;
    font-size: 35px;
    font-weight: 600;
  }
  .box p{
   margin-bottom:30px;
 }
 
 .main-container {
  width: 100%;
  height: 100vh;
  background: url(<?=WEBURL?>/l-bg1.jpg);
  transition: 0.4s linear;
  background-position: 75% 0%;
}

.box {
  width: 100%!important;
  position: absolute;
  top: 45%;
  left: 45%;
  transform: translate(-50%, -50%);
  background: transparent;
  padding: 40px;
  box-sizing: border-box;
  box-shadow: 0px 15px 25px rgb(0 0 0 / 0%)!important;

}
.box input[type=submit] {
  background: transparent;
  border: none;
  outline: none;
  background: #F45B0F;
  color: #fff;
  padding: 8px 20px;
  cursor: pointer;
  float: left;
  border-radius: 50px;
}
}
</style>

<body> 

  <div id="main" class="main-container">
   <div class="box">
     <h2>Login</h2>
     <p>Please sign in to continue.<p>
       <form method="POST" action="<?=BASEURL?>login" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">User Name</label>
                                        <input id="username" type="text" class="form-control" name="username" value="<?=$comp['company_name']?>"  tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill Your User Name
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" value="admin123"  tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    

                                    <?php if ($this->session->flashdata('error_message')) { ?>
                                        <div class="alert text-white bg-danger" role="alert">
                                            <div class="iq-alert-text"><?php echo $this->session->flashdata('error_message');?></div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="ri-close-line"></i>
                                            </button>
                                        </div>
                                        <?php } ?>

                                    <div class="form-group">
                                        <button type="submit" style="background-color: #f0753c"
                                            class="btn text-white btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <div class="form-group">
                                        
                                        <a href="#" data-toggle="modal" data-target=".bd-example-modal-xl"
                                            class=" edit_info" data-status='forgot' style="color: #821e1e">Forgot Password</a>
                                    </div>

    </div>

  </div> 
  <!-- Bootstrap Bundle with Popper -->
  <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-hidden="true" width=50%>
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?=BASEURL?>forgot_password" method="POST">
                        <div class="form-row" >
                                <label>Please enter your Email Id</label>
                                <input type="text" id="email" class="form-control" name="email" required>
                            <br>
                                <label>Please enter your Phone Number</label>
                                <input type="text" id="phone" class="form-control" name="phone" required>
                        </div>
                        <div class="form-row mt-5">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=BASEURL?>assets/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
