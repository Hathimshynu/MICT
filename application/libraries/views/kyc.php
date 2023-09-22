<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
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
        <div class="section-body">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-lg-5">
                            <h3 class="mb-4">KYC</h3>
                            <div class="card-body profile-slider">
                                <?php 
                                $count = $this->db->where('status','Request')->where('user_id',$cust['user_id'])->count_all_results('kyc_request');
                                if ($count > 0) { ?>
                                <h2 class="section-title">Please wait for the update patiently</h2>
                                <p class="section-lead">already in que</p>
                                <?php } else { ?>
                                <?=form_open('kyc');?>
                                <!-- <form action="<?=BASEURL?>kyc" method="POST" enctype="multipart/form-data"> -->
                                    <input type="hidden" name="user_id" value="<?=$cust['user_id']?>">
                                    <div class="py-4">
                                        <div class="form-row">
                                            <div class="col-lg-6">
                                                <label>Aadhar No <span id="aadhar_label"
                                                        style="color:red;"><?=form_error('aadhar')?></span></label>
                                                <input type="text" class="form-control" name="aadhar" id="aadhar" value="<?=$cust['aadhar']?>" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>PAN No <span id="pan_label" style="color:red;"><?=form_error('pan')?></span></label>
                                                <input type="text" class="form-control" name="pan" id="pan" value="<?=$cust['pan']?>" required>
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <label>Aadhar Image</label>
                                                <div id="uploadArea" class="upload-area">
                                                    <a id="aadharclick" href="#"><img id="aadharimg"
                                                            src="<?=KYCURL.$cust['afile']?>" width="70%"
                                                            accept="image/jpg" class="img-lg mb-3"></a>
                                                    <label><span id="aadhar_status"
                                                            style="color:green; font-weight: bold;"></span></label><br>
                                                    <input style="display: none;" type="file" class="custom-file-input"
                                                        name="aadharfile" id="aadharfile">
                                                    <input type="text" name="aadharimage" id="aadharimage"
                                                        value="<?=$cust['afile']?>" required
                                                        class="readonly form-control" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <label>PAN</label>
                                                <div id="uploadArea" class="upload-area">
                                                    <a id="panclick" href="#"><img id="panimg"
                                                            src="<?=KYCURL.$cust['pfile']?>" width="70%"
                                                            accept="image/jpg" class="img-lg mb-3"></a>
                                                    <label><span id="pan_status"
                                                            style="color:green; font-weight: bold;"></span></label><br>
                                                    <input style="display: none;" type="file" class="custom-file-input"
                                                        name="panfile" id="panfile">
                                                    <input type="text" name="panimage" id="panimage"
                                                        value="<?=$cust['pfile']?>" required
                                                        class="readonly form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3" align="center">
                                        <button class="btn btn-primary btn-block mb-2" style="width:150px;"   type="submit">Update KYC</button>
                                    </div>
                                    <?=form_close();?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('footer'); ?>

<script>
$(document).ready(function() {
    $("#panclick").click(function() {
        $("#panfile").trigger('click')
    });
    $("#aadharclick").click(function() {
        $("#aadharfile").trigger('click')
    });
    $("#aadhar2click").click(function() {
        $("#aadhar2file").trigger('click')
    });
    $(document).on('change', '#chequefile', function() {
        var name = document.getElementById("chequefile").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid Image File");
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("chequefile").files[0]);
        var f = document.getElementById("chequefile").files[0];
        var fsize = f.size || f.fileSize;
        if (fsize > 2000000) {
            alert("Image File Size is very big");
        } else {
            form_data.append("cheque_upload", document.getElementById('chequefile').files[0]);
            $.ajax({
                url: "<?php echo base_url(); ?>/cheque_upload",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#cheque_status').html("Image Uploading...");
                },
                success: function(data) {
                    $('#cheque_status').html("Uploaded");
                    $('#chequeimage').val(data);
                    $('#chequeimg').attr('src', '<?=KYCURL?>' + data);
                }
            });
        }
    });
    $(document).on('change', '#aadharfile', function() {
        var name = document.getElementById("aadharfile").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid Image File");
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("aadharfile").files[0]);
        var f = document.getElementById("aadharfile").files[0];
        var fsize = f.size || f.fileSize;
        if (fsize > 2000000) {
            alert("Image File Size is very big");
        } else {
            form_data.append("aadhar_upload", document.getElementById('aadharfile').files[0]);
            $.ajax({
                url: "<?php echo base_url(); ?>/aadhar_upload",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#aadhar_status').html("Image Uploading...");
                },
                success: function(data) {
                    $('#aadhar_status').html("Uploaded");
                    $('#aadharimage').val(data);
                    $('#aadharimg').attr('src', '<?=KYCURL?>' + data);
                }
            });
        }
    });
    /*$(document).on('change', '#aadhar2file', function() {
    var name = document.getElementById("aadhar2file").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
    alert("Invalid Image File");
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("aadhar2file").files[0]);
    var f = document.getElementById("aadhar2file").files[0];
    var fsize = f.size || f.fileSize;
    if (fsize > 2000000) {
    alert("Image File Size is very big");
    } else {
    form_data.append("aadhar2_upload", document.getElementById('aadhar2file').files[0]);
    $.ajax({
    url: "<?php echo base_url(); ?>/aadhar2_upload",
    method: "POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function() {
    $('#aadhar2_status').html("Image Uploading...");
    },
    success: function(data) {
    $('#aadhar2_status').html("Uploaded");
    $('#aadhar2image').val(data);
    $('#aadhar2img').attr('src', '<?=BASEURL?>assets/img_uploads/' +
    data);
    }
    });
    }
    });*/
    $(document).on('change', '#panfile', function() {
        var name = document.getElementById("panfile").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid Image File");
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("panfile").files[0]);
        var f = document.getElementById("panfile").files[0];
        var fsize = f.size || f.fileSize;
        if (fsize > 2000000) {
            alert("Image File Size is very big");
        } else {
            form_data.append("pan_upload", document.getElementById('panfile').files[0]);
            $.ajax({
                url: "<?php echo base_url(); ?>/pan_upload",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#pan_status').html("Image Uploading...");
                },
                success: function(data) {
                    $('#pan_status').html("Uploaded");
                    $('#panimage').val(data);
                    $('#panimg').attr('src', '<?=KYCURL?>' + data);
                }
            });
        }
    });
});
</script>
