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
                        <h3 class="card-header bg-white mb-3 text-center">Buy Product</h3>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <label for="" class="">Product Image:</label><br>

                                    <img id="" height="200px" src="<?=PRODUCTURL.$buy['img']?>" accept="image/jpg">


                                </div>
                                <div class="col-md-6">
                                    <label for="">Product Name:</label>


                                    <input type="text" value="<?=$buy['name']?>" class="form-control" name="pname"
                                        readonly>
                                    <label for="">Product Amount:</label>

                                    <input type="text" value="<?=$buy['amount']?>" class="form-control" name="amount"
                                        readonly>

                                    <label for="" class="mt-3">Product Description:</label>

                                    <textarea type="text" value="" class="form-control" name="description"
                                        readonly><?=$buy['description']?></textarea>

                                    <input type="hidden" value="<?=$buy['product_id']?>" name="id">
                                </div>
                                <div align="center" class="col-md-12">

                                    <button class="btn btn-primary ml-auto mt-3" style="width:150px;"
                                        data-toggle="modal" data-target=".bd-example-modal-lg">Buy</button>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


<?php $this->load->view('footer'); ?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="add_modal">
    <div class="modal-dialog modal-md">
        <form action="<?=BASEURL?>product_buy" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" align="center">Register User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="">User Name:</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="col-md-6">
                            <label for="">Phone Number:</label>
                            <input type="number" class="form-control" name="phone">
                        </div>
                        <div class="col-md-6">
                            <label for="">Email-ID:</label>
                            <input type="text" class="form-control" name="email">
                        </div>

                        <div class="col-md-6">
                            <label>Flat No/Door No</label>
                            <input type="text" class="form-control" id="door" name="door" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label>Street/Village</label>
                            <input type="text" class="form-control" id="street" name="street" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control" id="city" name="city" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4">District</label>
                            <input type="text" class="form-control" id="district" name="district" required value="">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4">State</label>

                            <input type="text" class="form-control" id="state" name="state" required value="">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4">Country</label>

                            <input type="text" class="form-control" id="country" name="country" required value="">
                        </div>

                        <div class="col-md-6">
                            <label>Pin Code:</label>
                            <input type="text" class="form-control" pattern="[0-9]{6}" minlength="6" maxlength="6" id="pincode" name="pincode" required value="">
                        </div>
                        <div class="col-md-12">
                            <label>Landmark:</label>

                            <textarea type="text" class="form-control" name="landmark"></textarea>
                        </div>
                    </div>
                    <div class="d-flex float-right mt-3 mb-1">
                        <button type="submit" class="btn btn-primary" style="width:100px;">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                    <input type="hidden" id="product_id" name="product_id" value="<?=$buy['product_id']?>">

                </div>

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <input type="hidden" id="datastatus" name="datastatus">

            </div>
        </form>

    </div>
</div>
</div>
