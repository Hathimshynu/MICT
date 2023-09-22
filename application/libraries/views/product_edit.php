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
     if ($this->session->flashdata('success_message')) { ?>
<div style="z-index: 999; right: 0; top: 80px; position: absolute;"
    class="alert alert-success alert-dismissible fade show">
    <?php echo $this->session->flashdata('success_message');?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<?php } ?>
<style>

</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-body">

            <div class="row">
                <div class="col-lg-12 mt-3">
                    <div class="card p-4">
                        <h3 class="card-header bg-white mb-3 text-center">Edit Your Product</h3>

                        <div class="card-body">
                            <form action="<?=BASEURL?>product_edit" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <label for="" class="">Product Image:</label>

                                        <div align="center">

                                            <a id="proclick" href="#" class="mt-2">

                                                <img id="proimg" height="200px" src="<?=PRODUCTURL.$product['img']?>"
                                                    width="200px" accept="image/jpg" class="img-lg  mb-3">
                                            </a>
                                            <label>
                                                <span id="pro_status" style="color:green; font-weight: bold;"></span>
                                            </label><br>
                                            <input style="display: none;" type="file" class="custom-file-input"
                                                name="profile" id="profile">
                                            <input type="hidden" class="readonly form-control" name="pimage" id="pimage"
                                                value="<?=$product['img']?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Product Name:</label>


                                        <input type="text" value="<?=$product['name']?>" class="form-control"
                                            name="pname">
                                        <label for="">Product Amount:</label>

                                        <input type="text" value="<?=$product['amount']?>" class="form-control"
                                            name="amount">
                                        <label for="" class="mt-3">Stock:</label>

                                        <select class="form-control" name="status">
                                            <option value="InStock"
                                                <?php if($product['status']=='InStock') echo 'selected'?>>InStock
                                            </option>
                                            <option value="OutStock"
                                                <?php if($product['status']=='OutStock') echo 'selected'?>>OutStock
                                            </option>
                                        </select>
                                        <!-- <input type="text" value="<?=$product['status']?>" class="form-control"
                                            name="status"> -->


                                        <input type="hidden" value="<?=$product['product_id']?>" name="id">
                                    </div>
                                    <div align="center" class="col-md-12">
                                        <label for="" class="mt-3">Product Description:</label>

                                        <textarea type="text" value="" class="form-control"
                                            name="description"><?=$product['description']?></textarea>
                                        <button type="submit" class="btn btn-success ml-auto mt-3">update</button>
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


<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});

$('.edit_info').click(function() {
    var dt_id = $(this).attr("data-id");
    var data_status = $(this).attr("data-status");

    $("#hids").val(dt_id);
    $("#datastatus").val(data_status);
});
</script>
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
            form_data.append("update_upload", document.getElementById('profile').files[0]);
            $.ajax({
                url: "<?php echo base_url(); ?>/update_upload",
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
                    $('#proimg').attr('src', '<?=PRODUCTURL?>' + data);
                }
            });
        }
    });


});
</script>
