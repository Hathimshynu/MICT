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
                <div class="col-lg-4">
                    <div class="card p-4">
                        <h3 class="card-header bg-white mb-3">Our News</h3>
                        <div class="card-body">
                            <form action="<?=BASEURL?>news" method="POST">
                                <div class="form-row">
                                    <label>News</label>
                                    <textarea class="form-control" name="news" required></textarea>
                                    <div class="mx-auto text-center">
                                        <button class="btn btn-primary mt-3" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <?php $news = $this->admin->get_tabledata('news');?>
                            <div class="table-responsive">
                                <table id="example"
                                    class="table table-striped table-bordered table-hover display nowrap"
                                    style="width:100%">
                                    <thead class="text-primary">
                                        <th width="10px">Sl.No</th>
                                        <th>News</th>
                                        <th width="5">Action</th>
                                    </thead>
                                    <tbody>
                                        <?php $count=1; foreach ($news as $key => $n) { ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?php echo $count++;?></td>
                                            <td><?=$n['news']?></td>
                                            <td style="vertical-align: middle;"><a href="<?=BASEURL?>/news/delete/<?=$n['id']?>" class="btn btn-danger btn-block"><i class="fa fa-trash"></i></a>
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


</script>
