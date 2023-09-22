<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_partials/header');
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
<div class="main-content">
    <section class="section">
        <div class="section-header row">
            <div class="col-lg-10">
                <h1>Registration</h1>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" align="center">
                            <form id="dataform" action="<?=BASEURL?>registration" method="POST"
                                enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label>Customer Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Mobile Number <span id="phone_label" style="color:red;"></span></label>
                                        <div class="input-group">
                                            <input type="text" onkeyup="check_details(this.value,'phone')" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10" class="form-control" name="phone" id="phone" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Email Id <span id="email_label" style="color:red;"></span></label>
                                        <div class="input-group">
                                            <input type="email" onkeyup="check_details(this.value,'email')" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Referral ID </label>
                                        <input type="text" class="form-control" id="ref_id" name="ref_id" value="<?=$ref_id?>" onkeyup="get_user_details(this.value,'ref_id')" required> 
                                    </div>

                                    <div class="col-md-6">
                                        <label>Referral Name <span id="ref_id_label" style="color:red;"></span></label>
                                        <input type="text" id="rname" class="form-control readonly" autocomplete="off" value="<?=$name?>" required> 
                                    </div>

                                    <div class="col-md-4">
                                        <label>User Name <span id="username_label" style="color:red;"></span></label>
                                        <input type="text" class="form-control" id="username" name="username" onkeyup="check_user_details(this.value,'username')" required> 
                                    </div>

                                    <div class="col-md-4">
                                        <label>Password <span id="p_label"></span></label>
                                        <input type="password" class="form-control" id="p" name="p" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Confirm Password </label>
                                        <input type="text" class="form-control" id="cp" name="cp" required>
                                    </div>

                                    <div class="col-md-3 mt-3 offset-md-3 ">
                                        <button id="btnsubmit" class="btn btn-primary btn-block"type="submit">Submit</button> 
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <button class="btn btn-danger btn-block" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php $this->load->view('_partials/footer'); ?>
<script type="text/javascript">
    $('#p, #cp').on('keyup', function() {
        $('#btnsubmit').prop('disabled', true);
        if ($('#p').val() == $('#cp').val()) {
            $('#btnsubmit').prop('disabled', false);
            $('#p_label').html('Matching').css('color', 'green');

        } else {
            $('#btnsubmit').prop('disabled', true);
            $('#p_label').html('Not Matching').css('color', 'red');
        }

    });


    


    function check_details(c_data, data_filed) {
        $('#' + data_filed + '_label').empty();
        $.post('<?=BASEURL?>check_details', {
            'c_data': c_data,
            'data_filed': data_filed
        })
        .done(function(res) {
            if (res != 'empty') {
                $('#' + data_filed).val('');
                $('#' + data_filed + '_label').html('Data already in Use');
            } 
        });
    }



    function check_user_details(c_datau, data_filedu) {
        $('#' + data_filedu + '_label').empty();
        $.post('<?=BASEURL?>check_user_details', {
            'c_data': c_datau,
            'data_filed': data_filedu
        })
        .done(function(res) {
            if (res != 'empty') {
                $('#' + data_filedu).val('');
                $('#' + data_filedu + '_label').html('Data already in Use');
            } 
        });
    }

    function get_user_details(usernameg, data_filedg) {

        $.post('<?=BASEURL?>get_user_details', {
            'username': usernameg,
            'data_filed': data_filedg
        })
        .done(function(res) {
            if (res != 'empty') {
                $('#' + data_filedg + '_label').empty();
                var obj = JSON.parse(res);
                $('#rname').val(obj.name + " - " + obj.district);
            } else {
               $('#rname').val('');
               $('#' + data_filedg + '_label').html('No Data Found Check Your Referral ID'); 
            }
        });
    }

    function get_utr(utr) {
        $.post('<?=BASEURL?>get_utr', {
            'utr': utr
        })
        .done(function(res) {
            if (res != 'empty') {
                $('#ref_no').val('');
                $('#position_label').html('Reference Number Used');
            }
        });
    }


</script>