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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-lg-5">
                            <h3 class="mb-4">User Profile</h3>
                            <div class="card-body profile-slider">
                                <?=form_open('update_profile');?>
                                <input type="hidden" name="user_id" value="<?=$cust['profile_id']?>">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div align="center">
                                            <a id="proclick" href="#">
                                                <img id="proimg" height="100px" src="<?=PROFILEURL.$cust['pimage']?>"
                                                    width="100px" accept="image/jpg" class="img-lg rounded-circle mb-3">
                                            </a>
                                            <label>
                                                <span id="pro_status" style="color:green; font-weight: bold;"></span>
                                            </label><br>
                                            <input style="display: none;" type="file" class="custom-file-input"
                                                name="profile" id="profile">
                                            <input type="text" class="readonly form-control" name="pimage" id="pimage"
                                                value="<?=$cust['pimage']?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 form-row">
                                        <div class="col-lg-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="<?=$cust['name']?>" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Phone <span id="phone_label" style="color:red;"><?=form_error('phone')?></span></label>
                                            <input type="text" pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10" class="form-control" name="phone" value="<?=$cust['phone']?>" required>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Email <span id="email_label" style="color:red;"><?=form_error('email')?></span></label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?=$cust['email']?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 form-row">
                                        <div class="col-md-4">
                                            <label>Flat No/Door No</label>
                                            <input type="text" class="form-control" id="door" name="door"
                                                value="<?=$cust['door']?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Street/Village</label>
                                            <input type="text" class="form-control" id="street" name="street"
                                                value="<?=$cust['street']?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="<?=$cust['city']?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4">State</label>
                                            <select class="form-control" placeholder="state" name="state" id="state"
                                                required>
                                                <option value="">Select State</option>
                                                <option value="Tamil Nadu"
                                                    <?php if($cust['state']=='Tamil Nadu') echo 'selected'?>>Tamil
                                                    Nadu</option>
                                                <option value="Kerala"
                                                    <?php if($cust['state']=='Kerala') echo 'selected'?>>Kerala
                                                </option>
                                                <option value="Other"
                                                    <?php if($cust['state']=='Other') echo 'selected'?>>Other
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail4">District</label>
                                            <input type="text" class="form-control" id="district" name="district"
                                                required value="<?=$cust['district']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Pin Code</label>
                                            <input type="text" class="form-control" pattern="[0-9]{6}" minlength="6"
                                                maxlength="6" id="pin" name="pin" required value="<?=$cust['pin']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3" align="center">
                                    <button class="btn btn-primary btn-block mt-2" style="width:150px;"
                                        type="submit">Update Profile</button>
                                </div>
                                <?=form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('footer'); ?>

    <script>
    $(document).ready(function() {

        $("#proclick").click(function() {
            $("#profile").trigger('click')
        });
        $(document).on('change', '#profile', function() {
            var name = document.getElementById("profile").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
            }
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("profile").files[0]);
            var f = document.getElementById("profile").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
                alert("Image File Size is very big");
            } else {
                form_data.append("pro_upload", document.getElementById('profile').files[0]);
                $.ajax({
                    url: "<?php echo base_url(); ?>/pro_upload",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#pro_status').html("Image Uploading...");
                    },
                    success: function(data) {
                        $('#pro_status').html("Uploaded");
                        $('#pimage').val(data);
                        $('#proimg').attr('src', '<?=PROFILEURL?>' + data);
                    }
                });
            }
        });
    });
    </script>
