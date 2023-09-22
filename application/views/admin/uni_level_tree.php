<?php include 'header.php';?>
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
   width: 200px;
   //height: 170px;
   /background: #f5f5f5;/
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
<div class="container-fluid content-inner pb-0">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Unilevel</h4>
            </div>
            <div class="card-body ">
               <div class="row">
                  <!-- <div class="col-lg-12 offset-lg-4 col-12"> -->
                  <div class="card card-body text-center ">
                     <p><img height="50" class="rounded-circle mr-1" src="<?=PROFILEURL?><?=$sponsor['profile'];?>" alt="card image"></p>
                     <h4 class="card-title"><?=$sponsor['username']?></h4>
                     <h4 class="card-title"><?=$sponsor['email']?></h4>
                     <!--<h6 class="card-title"><?=$sponsor['rank']?></h6>-->
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <ul class="scroll-box">
                        <?php 
                           $childs = $this->db->get_where('uni_tree', array('parent_id' => $sponsor['username']))->result_array();
                           $count = 1;
                           foreach ($childs as $key => $child) {
                           $users = $this->db->get_where('user_role', array('username' => $child['child_id']))->row_array();
                           ?>
                        <li>
                           <a href="<?=BASEURL.'admin/uni_level_tree/'.$users['username']?>">
                              <img alt="image" src="<?=BASEURL?>assets/profile/<?=$users['profile'];?>" class="rounded-circle mr-1" style="width:50px">
                              <h1><?=$users['username']?></h1>
                              <h4><?=$users['email']?></h4>
                              
                           </a>
                        </li>
                        <?php $count++; } ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'footer.php';?>