<?php include 'header.php';?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=BASEURL?>assets/tree/tooltipster.bundle.min.css" type="text/css">
<link rel="stylesheet" href="<?=BASEURL?>assets/tree/tooltipster-sideTip-shadow.min.css" type="text/css">
<link rel="stylesheet" href="<?=BASEURL?>assets/tree/tree.css" type="text/css">
<link rel="stylesheet" href="<?=BASEURL?>assets/tree/tree_binary.css" type="text/css">
<link rel="stylesheet" href="<?=BASEURL?>assets/tree/tree_tooltip.css" type="text/css">
<style>
    .list-group-item {
   
    color: black;

}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
   .card {
   overflow: auto;
   height: 100vh;
   }
   div#my_tree {
   display: flex;
   }
   .tree__container__step2 {
   margin-left: 176px;
   }
   .tree__container__step5 {
   margin-left: 215px;
   }
   .tree__container__step4 {
   margin-left: 22px;
   }
   .vl{
   border-left:3px solid black !important;
   }
   .tree__container__step__card1 {
   display: flex;
   text-align: center;
   margin-top: 50px;
   margin-left: 49px;
   align-items: center;
   justify-content: center;
   }
   div#tree__container {
   margin-left: 130px!important;
   margin-top: 15px!important;
   margin-right: 3px!important;
   }
   .tree__container__branch.from_tree__container__step__card2__first {
   display: flex;
   justify-content: space-between;
   align-items: center;
   }
   .tree__container__step__card1 p {
   padding: 10px;
   box-shadow: 0 0 4px 1px rgb(121 121 121 / 30%);
   border-radius: 4px;
   text-align: center;
   width: 88px;
   display: inline-block;
   margin: 0 !important;
   height: 88px;
   border-radius: 100px;
   background-color:#7467D7;
   }
   .tree__container__step__card4 p {
   padding: 10px;
   box-shadow: 0 0 4px 1px rgb(121 121 121 / 30%);
   border-radius: 4px;
   text-align: center;
   width: 73px;
   display: inline-block;
   margin: 0 !important;
   height: 73px;
   border-radius: 100px;
   background-color: #ff7c00;
   }
   .tree__container__step__card5 p {
   padding: 10px;
   box-shadow: 0 0 4px 1px rgb(121 121 121 / 30%);
   border-radius: 4px;
   text-align: center;
   width: 73px;
   display: inline-block;
   margin: 0 !important;
   height: 73px;
   border-radius: 100px;
   background-color: #ff7c00;
   }
   .tree__container__step__card1 {
   display: flex;
   text-align: center;
   margin-left: 72px;
   align-items: center;
   justify-content: center;
   }
   .tree__container, #from_tree__container__step__card2__first, .tree__container__branch {
   display: flex;
   flex-direction: row;
   justify-content: center;
   }
   .tree__container__step__card3 {
   text-align: center;
   margin: 0px;
   }
   .tree__container__step__card3 p {
   padding: 10px;
   box-shadow: 0 0 4px 1px rgb(121 121 121 / 30%);
   border-radius: 4px;
   text-align: center;
   width: 73px;
   display: inline-block;
   margin: 0 !important;
   height: 73px;
   border-radius: 100px;
   background-color: #ff7c00;
   }
   .tree__container__step__card2 {
   text-align: center;
   margin: 0px;
   }
   .tree__container__step {
   flex: 1 1 0px;
   width: auto;
   padding: 0;
   margin: 10px;
   }
   .tree__container__step__card2 p {
   padding: 10px;
   box-shadow: 0 0 4px 1px rgb(121 121 121 / 30%);
   border-radius: 4px;
   text-align: center;
   width: 73px;
   display: inline-block;
   margin: 0 !important;
   height: 73px;
   border-radius: 100px;
   background-color: #ff7c00;
   }
   #tree__svg-container {
   z-index: -1;
   position: absolute;
   }
   .tree__container__step {
   flex: 1 1 0px;
   width: auto;
   padding: 0;
   }
   div#tree__container {
   margin: 26px;
   }
   .tree__container__step3 {
   margin: -36px;
   }
   .tree__container__step__card3 {
   text-align: center;
   margin-left: -340px;
   }
   .tree__container__step__card2__p {
   cursor: pointer;
   transition: transform .2s ease;
   }
   .secondcol {
   margin-left: 58px;
   }
   .tree__container__step__card3__p {
   cursor: pointer;
   transition: transform .2s ease;
   }
   i.mdi.mdi-account-outline {
   margin-top: -39px;
   font-size: 119px;
   display: flex;
   align-items: center;
   flex-direction: column;
   justify-content: center;
   }
   i.mdi.mdi-account-outline{
   color:white !important;
   }
   .secondrow {
   display: flex;
   justify-content: space-between;
   }
</style>
 <!--<button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="fgnfgnfgnfg">Tooltip on bottom</button>-->
<div class="container-fluid content-inner pb-0">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Binary Tree</h4>
            </div>
            <div class="card-body">
               <div id="tree" class="orgChart" style="transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: 50% 50% 0px;">
                  <!--<h1>Two Matrix genealogyy</h1>-->
                  <!-- <form action="<?=BASEURL?>user/search_userid" method="POST" class="card card-sm">-->
                  <!--<div class="card-body row no-gutters align-items-center">-->
                  <!--<div class="col">-->
                  <!--<input class="form-control form-control-lg form-control-borderless" name="check_userid" id="check_userid" type="search" placeholder="Search User ID">-->
                  <!--</div>-->
                  <!--end of col-->
                  <!--<div class="col-auto">-->
                  <!--<button class="btn btn-lg btn-info" type="submit" style="height:50px;background-color:#696cff;">Search</button>-->
                  <!--</div>-->
                  <!--end of col-->
                  <!--</div>-->
                  <!--</form>-->
                  <div class="jOrgChart">
                     <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody>
                           <tr class="node-cells">
                              <td class="node-cell" colspan="4">
                                 <?php $this->admin->get_genealogyy($sponsor['username'],'admin');?>
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
                                                if (!empty($sponsor['username'])) {
                                                    $cl = $this->db->select('child_id')->from("tree")->where('parent_id',$sponsor['username'])->where('position','left')->get()->row()->child_id; 
                                                    
                                                    if (!empty($cl)) {
                                                        $this->admin->get_genealogyy($cl,'admin');
                                                    } else { ?>
                                             <div class="node">
                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                <br>
                                                <p class="demo_name_style_blue add-btn">
                                                   Empty
                                                </p>
                                             </div>
                                             <?php } 
                                                } else { ?>
                                             <div class="node">
                                                <i style="font-size: 35px" class="fa fa-ban " aria-hidden="true"></i>
                                                <br>
                                                <p class="demo_name_style_blue add-btn">
                                                   Empty
                                                </p>
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
                                                                $cll = $this->db->select('child_id')->from("tree")->where('parent_id',$cl)->where('position','left')->get()->row()->child_id; 
                                                                if (!empty($cll)) {
                                                                    $this->admin->get_genealogyy($cll,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                                                                $clll = $this->db->select('child_id')->from("tree")->where('parent_id',$cll)->where('position','left')->get()->row()->child_id; 
                                                                if (!empty($clll)) {
                                                                    $this->admin->get_genealogyy($clll,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                                                            if (!empty($cll)) {
                                                                $cllr = $this->db->select('child_id')->from("tree")->where('parent_id',$cll)->where('position','right')->get()->row()->child_id; 
                                                                if (!empty($cllr)) {
                                                                    $this->admin->get_genealogyy($cllr,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                                          <td class="node-container" colspan="2">
                                             <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                                                <tbody>
                                                   <tr class="node-cells">
                                                      <td class="node-cell" colspan="4">
                                                         <?php
                                                            if (!empty($cl)) {
                                                                $clr = $this->db->select('child_id')->from("tree")->where('parent_id',$cl)->where('position','right')->get()->row()->child_id; 
                                                                if (!empty($clr)) {
                                                                    $this->admin->get_genealogyy($clr,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
                                                         </div>
                                                         <?php } 
                                                            } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">Empty</p>
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
                                                                $clrl = $this->db->select('child_id')->from("tree")->where('parent_id',$clr)->where('position','left')->get()->row()->child_id; 
                                                                if (!empty($clrl)) {
                                                                    $this->admin->get_genealogyy($clrl,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                                                            if (!empty($clr)) {
                                                                $clrr = $this->db->select('child_id')->from("tree")->where('parent_id',$clr)->where('position','right')->get()->row()->child_id; 
                                                                if (!empty($clrr)) {
                                                                    $this->admin->get_genealogyy($clrr,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                              <td class="node-container" colspan="2">
                                 <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                                    <tbody>
                                       <tr class="node-cells">
                                          <td class="node-cell" colspan="4">
                                             <?php
                                                if (!empty($sponsor['username'])) {
                                                    $cr = $this->db->select('child_id')->from("tree")->where('parent_id',$sponsor['username'])->where('position','right')->get()->row()->child_id; 
                                                    if (!empty($cr)) {
                                                        $this->admin->get_genealogyy($cr,'admin');
                                                    } else { ?>
                                             <div class="node">
                                                <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                <br>
                                                <p class="demo_name_style_blue add-btn">
                                                   Empty
                                                </p>
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
                                                                $crl = $this->db->select('child_id')->from("tree")->where('parent_id',$cr)->where('position','left')->get()->row()->child_id; 
                                                                if (!empty($crl)) {
                                                                    $this->admin->get_genealogyy($crl,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                                                                $crrl = $this->db->select('child_id')->from("tree")->where('parent_id',$crl)->where('position','left')->get()->row()->child_id; 
                                                                if (!empty($crrl)) {
                                                                    $this->admin->get_genealogyy($crrl,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                                                            if (!empty($crl)) {
                                                                $crlr = $this->db->select('child_id')->from("tree")->where('parent_id',$crl)->where('position','right')->get()->row()->child_id; 
                                                                if (!empty($crlr)) {
                                                                    $this->admin->get_genealogyy($crlr,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                                          <td class="node-container" colspan="2">
                                             <table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center">
                                                <tbody>
                                                   <tr class="node-cells">
                                                      <td class="node-cell" colspan="4">
                                                         <?php
                                                            if (!empty($cr)) {
                                                                $crr = $this->db->select('child_id')->from("tree")->where('parent_id',$cr)->where('position','right')->get()->row()->child_id; 
                                                                if (!empty($crr)) {
                                                                    $this->admin->get_genealogyy($crr,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                                                                $crrl = $this->db->select('child_id')->from("tree")->where('parent_id',$crr)->where('position','left')->get()->row()->child_id; 
                                                                if (!empty($crrl)) {
                                                                    $this->admin->get_genealogyy($crrl,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
                                                                $crrr = $this->db->select('child_id')->from("tree")->where('parent_id',$crr)->where('position','right')->get()->row()->child_id; 
                                                                if (!empty($crrr)) {
                                                                    $this->admin->get_genealogyy($crrr,'admin');
                                                                } else { ?>
                                                         <div class="node">
                                                            <i style="font-size: 35px" class="fa fa-ban tree_icon add-icon" aria-hidden="true"></i>
                                                            <br>
                                                            <p class="demo_name_style_blue add-btn">
                                                               Empty
                                                            </p>
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
      </div>
   </div>
</div>

 
<?php include 'footer.php';?>
 <script src="<?=BASEURL?>assets/tree/jquery-3.4.1.min.js"></script> 
<script src="<?=BASEURL?>assets/tree/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?=BASEURL?>assets/tree/tooltipster.bundle.min.js" type="text/javascript"></script>
<script src="<?=BASEURL?>assets/tree/genealogy.js"></script>
