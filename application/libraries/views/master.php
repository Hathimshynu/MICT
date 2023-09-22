<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
if ($this->session->flashdata('success_message')) { ?>
    <div style="z-index: 999; right: 0; top: 80px; position: absolute;" class="alert alert-success alert-dismissible fade show">
        <?php echo $this->session->flashdata('success_message');?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php } 
if ($this->session->flashdata('error_message')) { ?>
    <div style="z-index: 999; right: 0; top: 80px; position: absolute;" class="alert alert-danger alert-dismissible fade show">
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
                        <h3 class="card-header bg-white mb-3">Master Setup</h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Level</th>
                                                <th>Criteria</th>
                                                <th>Rewards</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                            <?php 
                                            $packages = $this->admin->get_tabledata('master');
                                            $count=1;
                                            foreach ($packages as $key => $m) { ?>
                                                <?=form_open('update_master');?>

                                                <tr>
                                                    <td><?php echo $count++;?><input type="hidden" class="form-control" placeholder="id" name="id" value="<?=$m['master_id']?>" required></td>
                                                    <td><input style="width: 3em !important;" type="text" class="form-control" placeholder="level" name="level" value="<?=$m['level']?>" required readonly> </td> 
                                                    <td><input style="width: 7em !important;" type="text" class="form-control" placeholder="criteria" name="criteria"value="<?=$m['criteria']?>" required></td> 
                                                    <td><input style="width: 7em !important;" type="text" class="form-control" placeholder="rewards"name="rewards" value="<?=$m['rewards']?>" required></td> 
                                                    <td><input style="width: 7em !important;"  type="text" class="form-control" placeholder="type" name="type" value="<?=$m['type']?>" readonly></td>
                                                    <td><button type="submit" class="btn form-control btn-danger">Update</button></td>
                                                </tr>
                                                <?=form_close();?>

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
