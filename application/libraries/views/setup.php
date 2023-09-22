<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Setup</title>
        <!-- Bootstrap CSS -->
        <link href="<?=BASEURL?>assets/css/bootstrap.min.css" rel="stylesheet"> 
        <!-- Fontawesome Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="<?=BASEURL?>assets/js/jquery-3.4.1.min.js"></script> 
    </head>
    <style>


    * {
        font-family: 'Mulish', sans-serif;
    }

    body {
        margin: 0;
        padding: 0;
        background: url(https://novelx.in/novelx.in/shibin/maccap/assets/web//l-bg1.jpg);
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

    <?php
    if ($this->session->flashdata('success_message')) { ?>
        <div style="z-index: 999; right: 0; top: 80px; position: absolute;"
        class="alert alert-success alert-dismissible fade show">
        <?php echo $this->session->flashdata('success_message');?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php } 
if ($this->session->flashdata('error_message')) { ?>
    <div style="z-index: 999; right: 0; top: 80px; position: absolute;"
    class="alert alert-danger alert-dismissible fade show">
    <?php echo $this->session->flashdata('error_message');?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<?php } ?>
<!-- Main Content -->
<div class="container">    
    <div class="box">
        <h2>Setup</h2>
        <p>Please fill the details to continue.<p>
            <form action="<?=BASEURL?>setup" method="POST" enctype="multipart/form-data">
                <div class="py-4">
                    <div class="form-row">
                        <div class="col-lg-4">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-lg-4">
                            <label>User Name</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="col-lg-4">
                            <label>User ID</label>
                            <input type="text" class="form-control" name="user_id" required>
                        </div>
                        <div class="col-lg-4">
                            <label>Password</label>
                            <input type="password" class="form-control" autocomplete="off" name="pwd" required>
                        </div>
                        <div class="col-lg-4">
                            <label>Phone</label>
                            <input type="text" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10" class="form-control" name="phone" required>
                        </div>
                        <div class="col-lg-4">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="col-lg-4">
                            <label>Flat No/Door No</label>
                            <input type="text" class="form-control" id="door" name="door" required>
                        </div>
                        <div class="col-lg-4">
                            <label>Street/Village</label>
                            <input type="text" class="form-control" id="street" name="street" required>
                        </div>
                        <div class="col-lg-4">
                            <label>City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="col-lg-4">
                            <label>State</label>
                            <select class="form-control" placeholder="state" name="state" id="state" required>
                                <option value="">Select State</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label>District</label>
                            <input type="text" class="form-control" id="district" name="district" required>
                        </div>
                        <div class="col-lg-4">
                            <label>Pin Code</label>
                            <input type="text" class="form-control" pattern="[0-9]{6}" minlength="6" maxlength="6" id="pin" name="pin" required>
                        </div>
                        
                        
                        <div class="col-lg-4">
                            <label>GST</label>
                            <input type="text" class="form-control" id="gst" name="gst">
                        </div>
                        <div class="col-lg-4">
                            <label>TIN</label>
                            <input type="text" class="form-control" id="tin" name="tin">
                        </div>
                        
                        <div class="col-lg-4">
                            <label>Currency Sympol</label>
                            <input type="text" class="form-control" name="currency" required>
                        </div>

                        
                        <div class="col-lg-6 text-center">
                            <label>Fav</label>
                            <div id="uploadArea" class="upload-area">
                                <a id="favclick" href="#"><img id="favimg"src="<?=WEBURL?>fav.png" height="100px"accept="image/jpg" class="img-lg mb-3"></a> 
                                <label><br> <slogo id="fav_status"style="color:green; font-weight: bold;"></slogo>
                                </label><br> 
                                <input style="display: none;" type="file" class="custom-file-input"name="favfile" id="favfile"> 
                                <input type="text" name="favimage" id="favimage" required class="readonly form-control" autocomplete="off"> 
                            </div>
                        </div>
                        <div class="col-lg-6 text-center">
                            <label>Logo</label>
                            <div id="uploadArea" class="upload-area"> 
                                <a id="logoclick" href="#"><img id="logoimg"src="<?=WEBURL?>logo.png" height="100px"accept="image/jpg" class="img-lg mb-3"></a> 
                                <label><br> <slogo id="logo_status"style="color:green; font-weight: bold;"></slogo></label><br> 
                                <input style="display: none;" type="file" class="custom-file-input"name="logofile" id="logofile"> 
                                <input type="text" name="logoimage" id="logoimage" required class="readonly form-control" autocomplete="off"> 
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3" align="center">
                    <button class="btn btn-primary btn-block mb-2" style="width:150px;"   type="submit">Setup</button>
                </div>
            </form>		

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#logoclick").click(function() {
                $("#logofile").trigger('click')
            });
            $("#favclick").click(function() {
                $("#favfile").trigger('click')
            });
            
            $(document).on('change', '#favfile', function() {
                var name = document.getElementById("favfile").files[0].name;
                var form_data = new FormData();
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['png']) == -1) {
                    alert("Invalid Image File");
                }
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("favfile").files[0]);
                var f = document.getElementById("favfile").files[0];
                var fsize = f.size || f.fileSize;
                if (fsize > 200000) {
                    alert("Image File Size is very big");
                } else {
                    form_data.append("fav_upload", document.getElementById('favfile').files[0]);
                    $.ajax({
                        url: "<?php echo base_url(); ?>/fav_upload",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('#fav_status').html("Image Uploading...");
                        },
                        success: function(data) {
                            $('#fav_status').html("Uploaded");
                            $('#favimage').val(data);
                            $('#favimg').attr('src', '<?=WEBURL?>' + data);
                        }
                    });
                }
            });

            $(document).on('change', '#logofile', function() {
                var name = document.getElementById("logofile").files[0].name;
                var form_data = new FormData();
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['png']) == -1) {
                    alert("Invalid Image File");
                }
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("logofile").files[0]);
                var f = document.getElementById("logofile").files[0];
                var fsize = f.size || f.fileSize;
                if (fsize > 500000) {
                    alert("Image File Size is very big");
                } else {
                    form_data.append("logo_upload", document.getElementById('logofile').files[0]);
                    $.ajax({
                        url: "<?php echo base_url(); ?>/logo_upload",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('#logo_status').html("Image Uploading...");
                        },
                        success: function(data) {
                            $('#logo_status').html("Uploaded");
                            $('#logoimage').val(data);
                            $('#logoimg').attr('src', '<?=WEBURL?>' + data);
                        }
                    });
                }
            });
        });
    </script>
