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
        <div class="section-body mt-2">

            <div class="card p-4 ">
                <h3 class="mb-4 card-header bg-white ">Bank</h3>


                <div class="card-body mt-2">
                    <?php 
                    $count = $this->db->where('status','Request')->where('user_id',$bank['user_id'])->count_all_results('bank_request');
                    if ($count > 0) { ?>
                    <h2 class="section-title">Please wait for the update patiently</h2>
                    <p class="section-lead">already in que</p>
                </div>
            
            <?php } else { ?>
                <div class="card-body">
                    <?=form_open('bank');?>
                    <div class="row">
                        <div class="col-md-6 p-lg-5">
                            <h3 class="mb-4">Bank Details</h3>
                            <input type="hidden" name="user_id" value="<?=$bank['user_id']?>">
                            <label>Account Holder Name</label>
                            <input type="text" class="form-control" name="acc_name" id="acc_name"
                                value="<?=$bank['acc_name']?>" required>
                            <label>Account Number<span id="aadhar_label"
                                    style="color:red;"><?=form_error('acc_no')?></span></label>
                            <input type="text" class="form-control" name="acc_no" id="acc_no"
                                value="<?=$bank['acc_no']?>" required>
                            <label>Branch Name</label>
                            <input type="text" class="form-control" name="acc_branch" id="acc_branch"
                                value="<?=$bank['acc_branch']?>" required>
                            <label>IFSC</label>
                            <input type="text" class="form-control" name="acc_ifsc" id="acc_ifsc"
                                value="<?=$bank['acc_ifsc']?>" required>
                            <label>Bank Name</label>
                            <input type="text" class="form-control" name="acc_bank" id="acc_bank"
                                value="<?=$bank['acc_bank']?>" required>

                        </div>
                        <div class="col-md-6  p-lg-5">
                            <label>Canceled Cheque Image</label>
                            <div id="uploadArea" class="upload-area">
                                <a id="chequeclick" href="#">
                                    <img id="chequeimg" src="<?=KYCURL.$bank['cfile']?>" width="70%"
                                        accept="image/jpg" class="img-lg mb-3">
                                </a>
                                <label><span id="cheque_status"
                                        style="color:green; font-weight: bold;"></span></label><br>
                                <input style="display: none;" type="file" class="custom-file-input" name="chequefile"
                                    id="chequefile">
                                <input value="<?=$bank['cfile']?>" type="text" class="readonly form-control"
                                    autocomplete="off" name="chequeimage" id="chequeimage" required>
                            </div>
                            <div class="form-group mt-3" align="center">
                                <button class="btn btn-primary btn-block mt-4" style="width:150px;" type="submit">Update
                                    BANK</button>
                            </div>
                        </div>
                    </div>
                    <?=form_close();?>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</div>
<?php $this->load->view('footer'); ?>

<script>
$(document).ready(function() {
    $("#chequeclick").click(function() {
        $("#chequefile").trigger('click')
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

});
</script>
