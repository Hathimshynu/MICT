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
                        <h3 class="card-header bg-white mb-3">Earn History</h3>
                        <div class="card-body">
                            <form action="<?=BASEURL?>earn_history" method="POST">
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
                                <table id="earn" class="table table-striped table-bordered table-hover display nowrap"
                                    style="width:100%">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Sl</th>
                                            <th>Date</th>
                                            <th class="text-right">Income</th>
                                            <th class="text-right">Paid</th>
                                            <th class="text-right">Remark</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count=1; foreach ($account as $key => $n) {?>
                                        <tr>
                                            <td><?php echo $count++;?></td>
                                            <td><?=date_format(date_create($n['entry_date']),"d-m-Y");?></td>
                                            <td align="right"><?=number_format($n['credit'],2)?></td>
                                            <td align="right"><?=number_format($n['debit'],2)?></td>
                                            <td><?=$n['remark']?></td>
                                            <td><?=$n['description']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="6" class="text-right"></th>
                                        
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

            // Total over all pages
            total = api
                .column(2)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                
            paid = api
                .column(3)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


           
            
 
            // Update footer
            $( api.column( 1 ).footer() ).html(
                'Total Income : '+ total.toFixed(2) +' / Total Received : '+ paid.toFixed(2) + ' / Balance : ' + (total-paid).toFixed(2)
            );

            
        }
    });
});
</script>
