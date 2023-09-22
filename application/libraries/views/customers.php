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
            <div class="row mt-3">
                <div class="col-lg-12 ">
                    <div class="card p-4">
                        <h3 class="card-header bg-white mb-3">Non Active Users</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php 
                                $users = $this->db->get_where('user_role', array('rank' => 'New'))->result_array();?>
                                <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Sl</th>
                                        <th>User Details</th>
                                        <th>Income</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <?php 
                                    $count=1; 
                                    foreach ($users as $usvalue) { 
                                      $user = $this->db->get_where('profile', array('profile_id !=' => $usvalue['user_role_id']))->row_array();
                                      ?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td><?="Name- ".$user['name']."<br>UserID- ".$usvalue['username']."<br> Mob- ".$user['phone']?>
                                        </td>

                                        <td>
                                            <a
                                                href="<?=BASEURL?>earn_history/<?=$usvalue['user_role_id']?>"><?=$this->db->select_sum('amount')->where('user_id',$usvalue['user_role_id'])->get('account')->row()->amount+0?></a>
                                        </td>

                                        <td><a href="<?=BASEURL?>block_user/<?=$usvalue['user_role_id']?>"
                                                class="btn btn-icon icon-left btn-<?php if($usvalue['status'] == 'Active') echo 'success'; else  echo 'danger';?>"><?=$usvalue['status']?></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
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
</script>

