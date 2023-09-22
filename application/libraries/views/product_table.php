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
                        <h3 class="card-header bg-white mb-3 text-center">Ordered Products</h3>
                        <form action="<?=BASEURL?>product_table" method="POST">
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
                        <div class="table-responsive mt-3">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Product Details</th>
                                        <th>Ordered Date</th>
                                        <th>User Name</th>
                                        <th>Residental Address</th>
                                        <th>Product Amount</th>
                                        <th>Delivery Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=1; foreach ($orders as $key => $e) { 
                                            $productid = explode(",,",$e['product_id']);
                                            $item = array();
                                            foreach ($productid as $product){
                                                $item[] =  $this->db->select('name')->where('product_id',$product)->get('products')->row()->name;
                                            }
                                            array_filter($item, 'strlen');
                                            $details =  $this->admin->get_row_data('profile','profile_id',$e['user_id']);
                                            ?>
                                    <tr>

                                        <td><?php echo $count++;?></td>
                                        <td><?=implode(",",$item);?></td>
                                        <td><?=$e['entry_date']?></td>
                                        <td><?=$details['name'].",<br>".$details['phone'].",<br>".$details['email']?>
                                        <td><?=$details['door'].",".$details['landmark'].",<br>".$details['street'].$details['city'].",<br>".$details['district'].$details['state'].",<br>".$details['country'].$details['pincode']?>
                                        </td>
                                       
                                        
                                        <td><?=$e['amount']?></td>
                                        <td><?php if ($e['status']=="New") { ?>
                                            <form action="<?=BASEURL?>product_delivery" method="POST"
                                                enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?=$e['billing_id']?>">
                                                <button type="submit" class="btn btn-success">Delivery</button>
                                            </form>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php  }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
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
           

        }
    });
});
</script>
<?php $this->load->view('footer'); ?>

