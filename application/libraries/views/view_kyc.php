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
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card p-4">
                        <h3 class="card-header bg-white mb-3">KYC Updates</h3>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>User Details</th>
                                        <th>Aadhar</th>
                                        <th>Pan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=1; foreach ($users as $key => $e) {
                                $user_details= $this->db->get_where('profile',array('profile_id'=>$e['user_id']))->row_array(); ?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td>Name:
                                            <?=$user_details['name']."<br> Phone: ".$user_details['phone']."<br> Aashar: ".$e['aadhar']."<br> PAN: ".$e['pan']?>
                                        </td>
                                        <td>
                                            <a href="assets/kyc/<?=$e["afile"]?>" target="_plank"><img height="100"
                                                    src="assets/kyc/<?=$e["afile"]?>"></a>
                                        </td>
                                        <td>
                                            <a href="assets/kyc/<?=$e["pfile"]?>" target="_plank"><img height="100"
                                                    src="assets/kyc/<?=$e["pfile"]?>"></a>
                                        </td>
                                        <td>
                                            <?php if ($e['status'] != "Accepted" && $e['status'] != "Rejected") { ?>
                                            <a href="#" data-toggle="modal" data-target=".modal_novelx" class="btn btn-info btn-sm mr-2 edit_info" data-id='<?=$e["kyc_request_id"]?>' data-status='Accept'>Accept</a>
                                            <br><br>
                                            <a href="#" data-toggle="modal" data-target=".modal_novelx" class="btn btn-danger btn-sm mr-2 edit_info" data-id='<?=$e["kyc_request_id"]?>' data-status='Reject'>Reject</a>
                                            <?php } else echo $e['status']; ?>
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
<div class="modal modal_novelx" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?=BASEURL?>view_kyc" method="POST">
          <div class="modal-header">
        <h5 class="modal-title">Really?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you want to continue?</p>
        <input type="hidden" id="hids" name="hids">
        <input type="hidden" id="datastatus" name="datastatus">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Yes</button>
      </div>
      </form>
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
