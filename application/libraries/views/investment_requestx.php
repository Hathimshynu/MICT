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
                    <h3 class="card-header bg-white mb-3">Investment</h3>
                    <?=form_open('admin_request');?>
                        <div class="form-row">
                                    <div class="col-lg-2">
                                        <label>Investment Type</label>
                                        <select class="form-control" name="type" id="type" required>
                                            <option value="Daily" <?php if($this->input->post('type') == 'Daily') echo 'checked'; ?>>Daily</option>
                                            <option value="Six Month" <?php if($this->input->post('type') == 'Six Month') echo 'checked'; ?>>Six Month</option>
                                        </select>
                                        
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Transaction Hash: <?=form_error('utr')?></label>
                                        <input type="text" class="form-control" id="utr" name="utr" value="<?=$this->input->post('utr')?>" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>BTC</label>
                                        <input type="number" class="form-control" id="amount" name="amount" step="any" value="<?=$this->input->post('amount')?>" required>
                                    </div>
                                </div>
                        <div class="form-group mt-3" align="center">
                            <button class="btn btn-primary" id="btnRequest" type="submit" >Request</button>
                        </div>
                        <hr>
                    <?=form_close();?>

                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('footer'); ?>