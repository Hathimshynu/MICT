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
    <section class="section p-3">
        <div class="col-md-12 grid-margin">


          <div class="card">
            <link rel="stylesheet" href="<?=BASEURL?>assets/css/tooltipster.bundle.min.css" type="text/css">
            <link rel="stylesheet" href="<?=BASEURL?>assets/css/tooltipster-sideTip-shadow.min.css" type="text/css">
            <link rel="stylesheet" href="<?=BASEURL?>assets/css/tree.css" type="text/css">
            <link rel="stylesheet" href="<?=BASEURL?>assets/css/tree_binary.css" type="text/css">
            <link rel="stylesheet" href="<?=BASEURL?>assets/css/tree_tooltip.css" type="text/css">
            
            <div class="card-header"><h2>AUTO GENEALOGY</h2></div>
            <div class="card-body">
                <div id="tree" class="orgChart" style="transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: 50% 50% 0px;">
                    <div class="jOrgChart">
                        <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                                <tr class="node-cells">
                                    <td class="node-cell" colspan="4">
                                        <?php 
                                        $tree = "tree";
                                        $this->admin->get_genealogy_auto($sponsor['user_role_id']);?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <div class="line down">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="line left">
                                    </td>
                                    <td class="line right top">
                                    </td>
                                    <td class="line left top">
                                    </td>
                                    <td class="line right">
                                    </td>
                                </tr>

                                <tr>
                                    <td class="node-container" colspan="2">
                                        <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody>
                                                <tr class="node-cells">
                                                    <td class="node-cell" colspan="4">
                                                        <?php
                                                        if (!empty($sponsor['user_role_id'])) {
                                                            $cl = $this->db->select('child_id')->from($tree)->where('parent_id',$sponsor['user_role_id'])->where('position','left')->get()->row()->child_id; 
                                                            if (!empty($cl)) {
                                                                $this->admin->get_genealogy_auto($cl);
                                                            } else { ?>
                                                                <div class="node">
                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                    <br>
                                                                    <p class="demo_name_style_blue add-btn">
                                                                    Empty</p>
                                                                </div>
                                                            <?php } 
                                                        } else { ?>
                                                            <div class="node">
                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                <br>
                                                                <p class="demo_name_style_blue add-btn">
                                                                Empty</p>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="line down">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="line left">
                                                    </td>
                                                    <td class="line right top">
                                                    </td>
                                                    <td class="line left top">
                                                    </td>
                                                    <td class="line right">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="node-container" colspan="2">
                                                        <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                                                            <tbody>
                                                                <tr class="node-cells">
                                                                    <td class="node-cell" colspan="4">
                                                                        <?php
                                                                        if (!empty($cl)) {
                                                                            $cll = $this->db->select('child_id')->from($tree)->where('parent_id',$cl)->where('position','left')->get()->row()->child_id; 
                                                                            if (!empty($cll)) {
                                                                                $this->admin->get_genealogy_auto($cll);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                Empty</p>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <div class="line down">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="line left">
                                                                    </td>
                                                                    <td class="line right top">
                                                                    </td>
                                                                    <td class="line left top">
                                                                    </td>
                                                                    <td class="line right">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="node-container" colspan="2">
                                                                        <?php
                                                                        if (!empty($cll)) {
                                                                            $clll = $this->db->select('child_id')->from($tree)->where('parent_id',$cll)->where('position','left')->get()->row()->child_id; 
                                                                            if (!empty($clll)) {
                                                                                $this->admin->get_genealogy_auto($clll);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                Empty</p>
                                                                            </div>
                                                                        <?php } ?>

                                                                    </td>
                                                                    <td class="node-container" colspan="2">
                                                                        <?php
                                                                        if (!empty($cll)) {
                                                                            $cllr = $this->db->select('child_id')->from($tree)->where('parent_id',$cll)->where('position','right')->get()->row()->child_id; 
                                                                            if (!empty($cllr)) {
                                                                                $this->admin->get_genealogy_auto($cllr);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                Empty</p>
                                                                            </div>
                                                                        <?php } ?>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="node-container" colspan="2">
                                                        <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                                                            <tbody>
                                                                <tr class="node-cells">
                                                                    <td class="node-cell" colspan="4">
                                                                        <?php
                                                                        if (!empty($cl)) {
                                                                            $clr = $this->db->select('child_id')->from($tree)->where('parent_id',$cl)->where('position','right')->get()->row()->child_id; 
                                                                            if (!empty($clr)) {
                                                                                $this->admin->get_genealogy_auto($clr);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br><p class="demo_name_style_blue add-btn">Empty</p>
                                                                            </div>
                                                                        <?php } ?>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <div class="line down">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="line left">
                                                                    </td>
                                                                    <td class="line right top">
                                                                    </td>
                                                                    <td class="line left top">
                                                                    </td>
                                                                    <td class="line right">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="node-container" colspan="2">
                                                                        <?php
                                                                        if (!empty($clr)) {
                                                                            $clrl = $this->db->select('child_id')->from($tree)->where('parent_id',$clr)->where('position','left')->get()->row()->child_id; 
                                                                            if (!empty($clrl)) {
                                                                                $this->admin->get_genealogy_auto($clrl);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                Empty</p>
                                                                            </div>
                                                                        <?php } ?>


                                                                    </td>
                                                                    <td class="node-container" colspan="2">

                                                                        <?php
                                                                        if (!empty($clr)) {
                                                                            $clrr = $this->db->select('child_id')->from($tree)->where('parent_id',$clr)->where('position','right')->get()->row()->child_id; 
                                                                            if (!empty($clrr)) {
                                                                                $this->admin->get_genealogy_auto($clrr);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                Empty</p>
                                                                            </div>
                                                                        <?php } ?>


                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="node-container" colspan="2">
                                        <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody>
                                                <tr class="node-cells">
                                                    <td class="node-cell" colspan="4">
                                                        <?php
                                                        if (!empty($sponsor['user_role_id'])) {
                                                            $cr = $this->db->select('child_id')->from($tree)->where('parent_id',$sponsor['user_role_id'])->where('position','right')->get()->row()->child_id; 
                                                            if (!empty($cr)) {
                                                                $this->admin->get_genealogy_auto($cr);
                                                            } else { ?>
                                                                <div class="node">
                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                    <br>
                                                                    <p class="demo_name_style_blue add-btn">
                                                                    Empty</p>
                                                                </div>
                                                            <?php } 
                                                        } else { ?>
                                                            <div class="node">
                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                <br>
                                                                <p class="demo_name_style_blue add-btn">
                                                                Empty</p>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="line down">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="line left">
                                                    </td>
                                                    <td class="line right top">
                                                    </td>
                                                    <td class="line left top">
                                                    </td>
                                                    <td class="line right">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="node-container" colspan="2">
                                                        <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                                                            <tbody>
                                                                <tr class="node-cells">
                                                                    <td class="node-cell" colspan="4">
                                                                        <?php
                                                                        if (!empty($cr)) {
                                                                            $crl = $this->db->select('child_id')->from($tree)->where('parent_id',$cr)->where('position','left')->get()->row()->child_id; 
                                                                            if (!empty($crl)) {
                                                                                $this->admin->get_genealogy_auto($crl);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                Empty</p>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <div class="line down">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="line left">
                                                                    </td>
                                                                    <td class="line right top">
                                                                    </td>
                                                                    <td class="line left top">
                                                                    </td>
                                                                    <td class="line right">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="node-container" colspan="2">
                                                                        <?php
                                                                        if (!empty($crl)) {
                                                                            $crrl = $this->db->select('child_id')->from($tree)->where('parent_id',$crl)->where('position','left')->get()->row()->child_id; 
                                                                            if (!empty($crrl)) {
                                                                                $this->admin->get_genealogy_auto($crrl);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                Empty</p>
                                                                            </div>
                                                                        <?php } ?>

                                                                    </td>
                                                                    <td class="node-container" colspan="2">
                                                                        <?php
                                                                        if (!empty($crl)) {
                                                                            $crlr = $this->db->select('child_id')->from($tree)->where('parent_id',$crl)->where('position','right')->get()->row()->child_id; 
                                                                            if (!empty($crlr)) {
                                                                                $this->admin->get_genealogy_auto($crlr);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                Empty</p>
                                                                            </div>
                                                                        <?php } ?>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td class="node-container" colspan="2">
                                                        <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                                                            <tbody>
                                                                <tr class="node-cells">
                                                                    <td class="node-cell" colspan="4">
                                                                        <?php
                                                                        if (!empty($cr)) {
                                                                            $crr = $this->db->select('child_id')->from($tree)->where('parent_id',$cr)->where('position','right')->get()->row()->child_id; 
                                                                            if (!empty($crr)) {
                                                                                $this->admin->get_genealogy_auto($crr);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                Empty</p>
                                                                            </div>
                                                                        <?php } ?>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <div class="line down">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="line left">
                                                                    </td>
                                                                    <td class="line right top">
                                                                    </td>
                                                                    <td class="line left top">
                                                                    </td>
                                                                    <td class="line right">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="node-container" colspan="2">
                                                                        <?php
                                                                        if (!empty($crr)) {
                                                                            $crrl = $this->db->select('child_id')->from($tree)->where('parent_id',$crr)->where('position','left')->get()->row()->child_id; 
                                                                            if (!empty($crrl)) {
                                                                                $this->admin->get_genealogy_auto($crrl);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                    Empty
                                                                                </p>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="node-container" colspan="2">
                                                                        <?php
                                                                        if (!empty($crr)) {
                                                                            $crrr = $this->db->select('child_id')->from($tree)->where('parent_id',$crr)->where('position','right')->get()->row()->child_id; 
                                                                            if (!empty($crrr)) {
                                                                                $this->admin->get_genealogy_auto($crrr);
                                                                            } else { ?>
                                                                                <div class="node">
                                                                                    <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon " aria-hidden="true"></i>
                                                                                    <br>
                                                                                    <p class="demo_name_style_blue add-btn">
                                                                                    Empty</p>
                                                                                </div>
                                                                            <?php } 
                                                                        } else { ?>
                                                                            <div class="node">
                                                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                                                <br>
                                                                                <p class="demo_name_style_blue add-btn">
                                                                                    Empty
                                                                                </p>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

          </section>
      </div>

      <?php $this->load->view('footer'); ?>
      <script src="<?=BASEURL?>assets/js/tooltipster.bundle.min.js" type="text/javascript"></script>
<script src="<?=BASEURL?>assets/js/genealogy.js"></script>
