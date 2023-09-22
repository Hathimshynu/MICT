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
            <div class="col-lg-12 mt-3">
                <div class="card p-4">
                    <h3 class="card-header bg-white mb-3">Investment Request</h3>
                    <?=form_open('admin_request');?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div align="center">
                                <a id="receiptclick" href="#">
                                    <img id="receiptimg" src="<?=BASEURL."assets/receipt/receipt.jpg"?>" width="200px" accept="image/jpg" class="img-lg mb-3">
                                </a>
                                    <label><span id="receipt_status"style="color:green; font-weight: bold;"></span></label><br> 
                                    <input style="display: none;" type="file" class="custom-file-input" name="receiptfile" id="receiptfile">
                                        <input type="text" class="form-control" autocomplete="off" name="receiptimage" id="receiptimage" required >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <div class="m-3">
                                            <label>Payment Mode</label>
                                            <select class="form-control" name="pay_mode" required>
                                                <option value="">Select</option>
                                                <option value="NEFT">NEFT</option>
                                                <option value="IMPS">IMPS</option>
                                                <option value="RTGS">RTGS</option>
                                                <option value="UPI">UPI</option>
                                                <option value="Card">Card</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                        </div>
                                        <div class="m-3">
                                            <label>Amount</label>
                                            <input type="text" value="2500" class="form-control" name="amount" id="amount" readonly >

                                        </div>
                                        <div class="m-3">
                                            <label>Referance No (UTR Number) <span id="position_label" style="color:red;"><?=form_error('utr')?></span></label>
                                            <input type="text" class="form-control" id="utr" name="utr" value="<?=$this->input->post('phone')?>" onchange="get_utr(this.value)" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3" align="center">
                                <button class="btn btn-primary" id="btnRequest" type="submit">Request</button>
                            </div>
                            <hr>
                            <?=form_close();?>

                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('footer'); ?>


        <script>
            $(document).ready(function() {
                $('#example').DataTable();
                $("#receiptclick").click(function() {
                    $("#receiptfile").trigger('click')
                });
                $(document).on('change', '#receiptfile', function() {
                    var name = document.getElementById("receiptfile").files[0].name;
                    var form_data = new FormData();
                    var ext = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert("Invalid Image File");
                    }
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("receiptfile").files[0]);
                    var f = document.getElementById("receiptfile").files[0];
                    var fsize = f.size || f.fileSize;
                    if (fsize > 2000000) {
                        alert("Image File Size is very big");
                    } else {
                        form_data.append("receipt_upload", document.getElementById('receiptfile').files[0]);
                        $.ajax({
                            url: "<?php echo base_url(); ?>/receipt_upload",
                            method: "POST",
                            data: form_data,
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend: function() {
                                $('#receipt_status').html("Image Uploading...");
                            },
                            success: function(data) {
                                $('#receipt_status').html("Uploaded");
                                $('#receiptimage').val(data);
                                $('#receiptimg').attr('src', '<?=BASEURL?>assets/receipt/' + data);
                            }
                        });
                    }
                });
            });
            
           

            function get_utr(utr) {
                $.post('<?=BASEURL?>get_utr', {
                    'utr': utr
                })
                .done(function(res) {
                    if (res == 'exits') {
                        $('#position_label').html('Sorry!!!..Reference Number already exists,please check and try again');
                    }
                });
            }
        </script>
