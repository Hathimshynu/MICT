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
<style>
/* Type-2 */
.scroll-box {
  display: flex;
  widows: 100%;
    overflow: auto;
    overflow-y: hidden;
}

  
  .scroll-box li {
    display: inline-block;
  }
  .scroll-box a {
    display: block;
    width: 300px;
    //height: 170px;
    background: #f5f5f5;
    border: 1px solid #e5e5e5;
    padding: 10px;
    text-align: center;
    margin: 10px;
    color: #282828;
  }
    .scroll-box a:hover {
      text-decoration: none;
    }
    .scroll-box h3 {
      margin-top: 10px;
    }
    .scroll-box h1 {
        font-size:16px;
      margin-top: 10px;
      color: orange;
    }
    .scroll-box h4 {
        font-size:12px;
      color: #aaa;
      margin-bottom: 15px;
    }
    .scroll-box h5 {
        font-size:12px;
      line-height: 20px;
    }
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section p-3">
        <div class="card mt-3 p-3">
            <h2 class="card-header  bg-white mb-3">Genealogy</h2>
            <div class="card-body ">
                <div class="section-body">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-4 col-12">
                            <div class="card card-body text-center">
                                <p><img height="50" class="rounded-circle mr-1"
                                        src="<?=PROFILEURL.$this->db->select('pimage')->where('profile_id',$sponsor['user_role_id'])->get('profile')->row()->pimage?>"
                                        alt="card image"></p>
                                <h4 class="card-title"><?=$sponsor['username']?></h4>
                                <h4 class="card-title"><?=$sponsor['user_id']?></h4>
                                <h6 class="card-title"><?="level".$sponsor['rank']?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="scroll-box">
                            <?php 
                                    $childs = $this->db->get_where('tree', array('parent_id' => $sponsor['user_role_id']))->result_array();
                                    $count = 1;
                                    foreach ($childs as $key => $child) {
                                    $users = $this->db->get_where('user_role', array('user_role_id' => $child['child_id']))->row_array(); ?>
                                    <li>
                                <a href="<?=BASEURL.'genealogy/'.$users['user_role_id']?>">
                                  <img alt="image" src="<?=PROFILEURL.$this->db->select('pimage')->where('profile_id',$users['user_role_id'])->get('profile')->row()->pimage?>" class="rounded-circle mr-1" style="width:50px">
                                  <h1><?=$users['username']?></h1>
                                  <h4><?=$users['user_id']?></h4>
                                  <h5><?=$users['rank']?></h5>
                                </a>
                              </li>
                              <?php $count++; } ?>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('footer'); ?>
