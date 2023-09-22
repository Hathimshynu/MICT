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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row mt-3">
                <div class="col-lg-12 ">
                    <div class="card p-4">
                        <h3 class="card-header bg-white mb-3">My Team</h3>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="earn" class="table table-striped table-bordered table-hover display nowrap"
                                    style="width:100%">
                                    <thead class="text-primary">

                                        <tr>
                                            <th>Level</th>
                                            <th>Investment</th>
                                            <th>User Details</th>
                                            <th>Parent Details</th>
                                            <th>Join Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $childs = $this->admin->get_all_child_by_level('tree',$this->session->userdata('userid'),1);
                                            for ($x = 1; $x <= count($childs); $x++) { 
                                            for ($y = 0; $y < count($childs[$x]); $y++) {
                                              $user_gg = $this->db->where('user_role_id',$childs[$x][$y])->get('user_role')->row_array();
                                              $ref_gg = $this->db->where('user_role_id',$user_gg['ref_id'])->get('user_role')->row_array();
                                              $user_gg_name = $this->db->select('name')->where('profile_id',$user_gg['user_role_id'])->get('profile')->row()->name;
                                              $ref_gg_name = $this->db->select('name')->where('profile_id',$user_gg['ref_id'])->get('profile')->row()->name;
                                              
                                              $invesamount = $this->db->select_sum('wallet_value')->where('status','Accepted')->where('user_id',$user_gg['user_role_id'])->get('admin_request')->row()->wallet_value+0;
                                              if($invesamount > 0)
                                              $cocode = "green";
                                              else
                                              $cocode = "red";
                                              ?>
                                        <tr>
                                            <td>Level <?=$x?></td>
                                            <td><span class="input-<?=$cocode?>"><?=$invesamount?></span></td>
                                            <td><?=$user_gg_name."<br>".$user_gg['username']?></td>
                                            <td><?=$ref_gg_name."<br>".$ref_gg['username']?></td>
                                            <td><?=date_format(date_create($user_gg['entry_date']),"d-m-Y");?></td>
                                        </tr>
                                        <?php }} ?>
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
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#earn').DataTable({
        dom: 'Bfrtip',
        "buttons": [
            'excel', 'pdf', 'print'
        ],
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;

            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };




        }
    });
});
</script>
