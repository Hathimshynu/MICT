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
                        <h3 class="card-header bg-white mb-3">List of Products</h3>
                        <!-- <a class="btn btn-primary mb-3 ml-auto" href="<?=BASEURL?>product_preview" style="width:150px" >Preview</a> -->
                        <button class="btn btn-success mb-3" style="width:150px" data-toggle="modal"
                            data-target=".bd-example-modal-md">Add Product</button>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Amount</th>
                                        <th>Product Description</th>
                                        <th>Product Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=1; foreach ($products as $key => $e) { ?>
                                    <tr>
  
                                            <td><?php echo $count++;?></td>
                                            <td><?=$e['name']?></td>
                                            <td>
                                            <img height="50px" src="<?=PRODUCTURL.$e['img']?>" width="50px" alt="">
                                            </td>
                                            <td><?=$e['amount']?></td>
                                            <td><?=$e['description']?></td>
                                            <td><?=$e['status']?>
                                            </td>
                                            <td class="d-flex">
                                                <input type="hidden" value="<?=$e['product_id']?>" name="id">
                                                <!-- <button type="submit" class="btn btn-success">update</button> -->
                                                <a href="<?=BASEURL?>product_edit/<?=$e['product_id']?>" class="btn btn-success "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a href="<?=BASEURL?>product_delete/delete/<?=$e['product_id']?>" class="btn btn-danger ml-2"><i class="fa fa-trash"></i></a>
                                            </td>
                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="add_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="<?=BASEURL?>add_product" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" align="center">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Product Name:</label>
                            <input type="text" class="form-control" name="product_name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Product Amount:</label>
                            <input type="number" class="form-control" name="product_amount">
                        </div>
                        <div class="col-md-12">
                            <label for="">Product Description:</label>
                            <textarea type="text" class="form-control" name="product_description"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="mt-3">Product Image:</label>
                            <div align="center">
                                <a id="proclick" href="#" class="mt-2">
                                    <img id="proimg" height="200px" src="<?=PRODUCTURL?>product.jpg" width="200px"
                                        accept="image/jpg" class="img-lg  mb-3">
                                </a>
                                <label>
                                    <span id="pro_status" style="color:green; font-weight: bold;"></span>
                                </label><br>
                                <input style="display: none;" type="file" class="custom-file-input" name="profile"
                                    id="profile">
                                <input type="text" class="readonly form-control" name="pimage" id="pimage" value=""
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <input type="hidden" id="hids" name="hids">
                    <input type="hidden" id="datastatus" name="datastatus">
                    <div class="d-flex">
                    <input id="modalbtn" onclick="this.disabled=true;this.value='Wait....';this.form.submit();" type="submit" class="btn btn-success" Value="Yes">                   
                     <button type="button" class="btn btn-danger " data-dismiss="modal">No</button>

                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-hidden="true" id="exampleModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Realy?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to continue?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <form action="<?=BASEURL?>add_product" method="POST">
                    <input type="hidden" id="hids" name="hids">
                    <input type="hidden" id="datastatus" name="datastatus">
                    <!-- <button type="submit" class="btn btn-primary">Yes</button> -->
                    <input id="modalbtn" onclick="this.disabled=true;this.value='Wait....';this.form.submit();" type="submit" class="btn btn-success" Value="Yes">                
                        <button type="button" class="btn btn-danger " data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
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
