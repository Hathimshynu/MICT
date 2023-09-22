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
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row p-4">
                <div class="col-lg-12 mt-3">
                    <div class="card p-4">
                        <h3 class="card-header bg-white mb-3">Withdraw</h3>
                        <?php if($this->db->where('user_id',$this->session->userdata('userid'))->where('status','Request')->count_all_results('withdraw_request') == 0 && $status == 'Verified') { ?>
                        <form action="<?=BASEURL?>withdraw" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" id="user_id">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <?php 
                                $amount = $this->db->select('balance')->limit(1)->order_by('account_id',"DESC")->where('user_id',$this->session->userdata('userid'))->get("account")->row()->balance+0;
                                 ?>
                                    <label>Withdraw Wallet</label>
                                    <input type="text" class="form-control" name="wallet" id="wallet" value="<?=$amount?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" name="amount" id="amount" min="500" max='<?=$amount?>' step="any" required>
                                </div>
                                <div class="col-md-4 text-center mt-4">
                                    <button class="btn btn-primary" type="submit">Request</button>
                                </div>

                            </div>
                        </form>
                        <?php } else { ?>
                        <div class="card card-hero">
                            <div class="card-header">
                                <div class="card-icon">
                                    <i class="fa fa-question-circle"></i>
                                </div>
                                <?php if($status == "Unverified") { 
                                echo "<h4>Please Update Bank and KYC Details First</h4>"; 
                            } else { 
                                echo "<h4>Please Wait Your request has been successfully submitted and is under process</h4>";
                            }?>

                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Request Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Paid Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count=1;foreach ($withdraw as $key => $p) { ?>
                                        <tr>
                                            <td><?php echo $count++;?></td>
                                            <td><?php echo date("d-m-Y",strtotime($p['date']));?></td>
                                            <td><?=$p['amount']?></td>
                                            <td><?=$p['status']?></td>
                                            <td>
                                                <?php if (!empty($p['approve_date'])) {
                                                  echo date("d-m-Y",strtotime($p['approve_date']));
                                                } ?>
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
        </div>
    </section>
</div>
<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});

function get_amount(p_code) {
    $.post('<?=BASEURL?>get_amount', {
            'p_code': p_code
        })
        .done(function(res) {
            var obj = JSON.parse(res);
            if (obj.amount != 0) {
                $('#amount').attr('readonly', false);
                $("#amount").attr('min', 1);
                $("#amount").attr('max', obj.amount);
                $('#amount').val(obj.amount);
                $('#samount').val(obj.samount);
            } else {
                $('#amount').val('');
                $('#amount').attr('readonly', true);
            }
        });
}
$('#amount').keyup(function() {
    $('#samount').val(($(this).val() * 10) / 100);
});
</script>
