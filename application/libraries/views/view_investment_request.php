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
                <div class="col-lg-12 ">
                    <div class="card p-4">
                        <h3 class="card-header bg-white mb-3">Investment Requested</h3>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>UTR</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=1; foreach ($wallet_request as $key => $e) { ?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td><?=$e['entry_date']?></td>
                                        <?php 
                                        $user = $this->admin->get_row_data('user_role','user_role_id',$e['user_id']);
                                        $profile = $this->admin->get_row_data('profile','profile_id',$e['user_id']);?>
                                        <td><?=$profile['name']."<br>".$user['username']?></td>
                                        <td><?=$e['utr']?></td>
                                        <td><?=$e['wallet_value']?></td>
                                        <td><?=$e['status']?></td>
                                        <td>

                                            <?php if ($e['status'] != "Accepted" && $e['status'] != "Rejected") { ?>
                                            <a href="#" data-toggle="modal" data-target=".modal_novelx" class="btn btn-info btn-sm mr-2 edit_info" data-id='<?=$e["admin_request_id"]?>' data-status='Approve'>Approve</a>
                                            <a href="#" data-toggle="modal" data-target=".modal_novelx" class="btn btn-danger btn-sm mr-2 edit_info" data-id='<?=$e["admin_request_id"]?>' data-status='Reject'>Reject</a>
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
      <form action="<?=BASEURL?>view_admin_approve" method="POST">
          <div class="modal-header">
        <h5 class="modal-title">Really?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modelhead">Why you reject?</p>
        <input type="hidden" id="hids" name="hids">
        <input type="hidden" id="datastatus" name="datastatus">
        <div class="col-md-12 mb-3">
            <textarea id="description" class="form-control" name="remark" style="display:none"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button id="modalbtn" type="submit" class="btn btn-success">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
    
    if(data_status == 'Reject'){
        $("#modelhead").html("Why you reject?");
        $("#description").show();
        $("#modalbtn").html('Reject');
    } else  {
        $("#description").hide();
       $("#modelhead").html("Do you want to continue?"); 
       $("#modalbtn").html('Approve');
    }
     
    
});
</script>
