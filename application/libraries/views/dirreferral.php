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
                        <h3 class="card-header bg-white mb-3">My Direct Referals</h3>
                        <div class="card-body">
                            <form action="<?=BASEURL?>dirreferral" method="POST">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label>From Date</label>
                                        <input type="date" class="form-control" name="fdate" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>To Date</label>
                                        <input type="date" class="form-control" name="tdate" value="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" required>

                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary mt-4" type="submit" name="b_submit" style="width:150px"  value="view">View</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="novelx_table" class="table table-striped table-bordered table-hover display nowrap" style="width:100%">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Joining Date</th>
                                            <th>User Details</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count=1; foreach ($earn as $key => $n) {
                                          $user_detaisl = $this->db->get_where('profile',array('profile_id'=>$n['user_role_id']))->row_array();
                                        ?>
                                        <tr>
                                            <td><?php echo $count++;?></td>
                                            <td><?=date_format(date_create($n['entry_date']),"d-m-Y");?></td>
                                            <td><?=$user_detaisl['name']." <br> ".$n['username'];?></td>
                                            <td><?=$user_detaisl['phone']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="3" class="text-right"></th>
                                        <th></th>
                                    </tfoot>
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
