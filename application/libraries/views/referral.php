<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- Bootstrap CSS -->
    <link href="<?=BASEURL?>assets/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Fontawesome Icon -->
    <?php $comp = $this->db->get('setup')->row_array();?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?=$this->db->select('company_name')->get('setup')->row()->company_name?></title>
    <link rel="icon" href="<?=WEBURL?>fav.png" type="image/png" sizes="16x16">
    <script src="<?=BASEURL?>assets/js/jquery-3.4.1.min.js"></script> 
</head>
<style>
* {
    font-family: 'Mulish', sans-serif;
}
body {
    margin: 0;
    padding: 0;
	background: url(https://novelx.in/novelx.in/shibin/macgap/assets/web//l-bg1.jpg);
	 background-position:75% 0%!important;
}
 
.box {
    width: 80%!important;
    position: absolute;
     margin-top: 5%;
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
.row{margin:0px;}
.box .input-box label {
    position: absolute;
    color: #464646;
    
    padding: 10px 0;
    font-size: 16px;
    pointer-events: none;
    transition: .5s;
}
.box .input-box input:focus ~ label,
.box .input-box input:valid ~ label{
    
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
    width: 96%!important;
    position: absolute; 
     
    background: transparent;
    padding: 40px;
    box-sizing: border-box;
   box-shadow: 0px 15px 25px rgb(0 0 0 / 0%)!important;
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
input[type=submit] {
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
<div class="container">    
		<div class="box">
       <h2>Registration</h2>
       <p>Please fill the details to continue.<p>
           <?=form_open('registration');?>
            <div class="form-row">
                <div class="col-md-4">
                    <label>Customer Name</label>
                    <input value="<?=$this->input->post('name')?>" type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-4">
                    <label>Mobile Number <span id="phone_label" style="color:red;"><?=form_error('phone')?></span></label>
                    <div class="input-group">
                        <input value="<?=$this->input->post('phone')?>" type="text" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10" class="form-control" name="phone" id="phone" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Email Id <span id="email_label" style="color:red;"><?=form_error('email')?></span></label>
                    <div class="input-group">
                        <input value="<?=$this->input->post('email')?>" type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Referral ID </label>
                    <input type="text" class="form-control readonly" id="ref_id" name="ref_id" value="<?=$ref['username']?>" required>
                </div>
                <div class="col-md-6">
                    <label>Referral Name <span id="rname_label" style="color:red;"></span></label>
                    <input type="text" id="rname" class="form-control readonly" autocomplete="off" required>
                </div>
                <div class="col-md-4">
                    <label>User Name <span id="username_label" style="color:red;"><?=form_error('username')?></span></label>
                    <input value="<?=$this->input->post('username')?>" type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                </div>
                <div class="col-md-4">
                    <label>Password <span style="color:red;"><?=form_error('cp')?></span></label>
                    <input value="<?=$this->input->post('p')?>" type="password" class="form-control" id="p" name="p" autocomplete="off" required>
                </div>
                <div class="col-md-4">
                    <label>Confirm Password </label>
                    <input value="<?=$this->input->post('cp')?>" type="password" class="form-control" id="cp" name="cp" autocomplete="off" required>
                </div>
                <div class="col-md-3 mt-3 offset-md-3 ">
                    <button id="btnsubmit" class="btn btn-primary btn-block" type="submit">Submit</button>
                </div>
                <div class="col-md-3 mt-3">
                    <button class="btn btn-danger btn-block" type="reset">Cancel</button>
                </div>
            </div>
        <?=form_close();?>
        
    </div>
</div> 
<script type="text/javascript">
$(document).ready(function() {
    get_user_details($('#ref_id').val());
});
function get_user_details(usernameg) {
    $.post('<?=BASEURL?>get_user_details', {
        'username': usernameg
    })
    .done(function(res) {
        if (res != 'empty') {
            $('#rname_label').empty();
            $('#rname').val(res);
        } else {
            $('#rname').val('');
            $('#rname_label').html('No Data Found Check Your Referral ID');
        }
    });
}
$(document).ready(function() {
     $(".readonly").keydown(function(e){
        e.preventDefault();
    });
    
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
      }, 2000); 
} );
</script>
