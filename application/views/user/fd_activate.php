<?php include 'header.php';?>
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>
    div#example_wrapper {
    margin: 20px;
}
.col-sm-12 {
    overflow: auto;
}
</style>               
               
               
      <div class="container-fluid content-inner pb-0">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">FD Activate</h4>
                </div>
                  <div class="card-body">
                   <div class="row row justify-content-center">
         <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
                          <div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
								<div class="row">
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
										<div class="card wallet overflow-hidden">
											<div class="card-body">
												<div class="row">
												  	<div class="col">
														<h4 class="">E-wallet</h4>
														<h5 class="mb-2 number-font"><?=sprintf('%.2f',floatval($this->db->select('sum(credit - debit) as balance')->where('entry_date <=',date('Y-m-d H:i:s'))->where('user_id',$this->session->userdata('micusername'))->get("e_wallet")->row()->balance+0));?> USDT</h5>
											
													</div>
												<div class="col col-auto">
														<div class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
															<i class="fe fe-dollar-sign text-white mb-5 "></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								
									</div>
										</div>
									</div>
            <div class="card wallet">
                  <div class="card-body">
                                          
                  
                     <form action="<?=BASEURL?>user/fd_activate" method="post">
                     <div class="">
                        <div class="form-group"><span style="color:red;"></span>
                           <label for="exampleInputEmail1" class="form-label">User ID <span class="text-danger"><?=form_error('user_id');?></span></label>
                           <input type="text" name="user_id" value="<?=$this->session->userdata('micusername');?>" class="form-control" id="exampleInputEmail1" placeholder="Enter User id" fdprocessedid="ijryfu">
                        </div>
                       
                         <div class="mb-3">
                    <label for="Select" class="form-label">Package</label>
                    <select name="package" id="package" class="form-select">
                        <option value="">Select</option>
                          <?php
                           $wallet = $this->db->get('fd_package')->result_array();
                           foreach($wallet as $key => $rs){
                           ?>
                                <option value="<?=$rs['id'];?>"><?=$rs['package_name'];?></option>
                        <?php 
                         }
                         ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                           <label for="exampleInputEmail1" class="form-label">Days <span class="text-danger"><?=form_error('tpass');?></span></label>
                            <input type="text" name="tpass" value="" class="form-control" id="days" fdprocessedid="79lwiv" readonly>
                          </div>                                  
                        </div>
                        <div class="col-lg-4">
                       <div class="form-group">
                           <label for="exampleInputEmail1" class="form-label">Amount <span class="text-danger"><?=form_error('tpass');?></span></label>
                            <input type="text" name="tpass" value="" class="form-control" id="amount" fdprocessedid="79lwiv"readonly>
                          </div>                                  
                        </div>
                         <div class="col-lg-4">
                        <div class="form-group">
                           <label for="exampleInputEmail1" class="form-label">TotalRecive <span class="text-danger"><?=form_error('tpass');?></span></label>
                            <input type="text" name="tpass" value="" class="form-control" id="recieve" fdprocessedid="79lwiv"readonly>
                        </div>                               
                        </div>
                     </div>
                     </div>
                     <div class="text-center">
                         <button type="submit" class="btn btn-primary  mt-4 mb-0" fdprocessedid="9a036e">Activate</button>
                         </div>
                     </form>                  </div>
               </div>
            </div>
           
               </div>
                  </div>
               </div>
            </div>
        </div>
        
     <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">FD Activate History</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Date & Time</th>
                <th>User ID</th>
                <th>Package</th>
                <th>Days</th>
                <th>Remaing Days</th>
                <th>Credit</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $fd_package = $this->db->where('user_id',$this->session->userdata('micusername'))->get('user_fd_package')->result_array();
        $count=1;
        foreach($fd_package as $key => $fp)
        {
            $package = $this->db->where('id',$fp['package_id'])->get('fd_package')->row_array();
           
            $startDate =date("Y-m-d", strtotime($fp['recieve_date']));
            $endDate = date('Y-m-d');
              
            $datetime1 = new DateTime($endDate); // First date
            $datetime2 = new DateTime($startDate); // Second date
            
            $interval = $datetime1->diff($datetime2); // Difference between the two dates
            
            $diff = $interval->format('%R%a days'); // Output the difference in days
            
            if($diff > 0)
            {
                $days = str_replace("+","",$diff);
            }
            else
            { 
                $days = "credited ".$startDate;
                
            }
           
        ?>
            <tr>
                <td><?=$count++;?></td>
                <td><?=$fp['entry_date'];?></td>
                <td><?=$fp['user_id'];?></td>
                <td><?=$package['package_name'];?></td>
                <td><?=$package['days'];?> days</td>
                <td><?=$days?> </td>
                <td><?=$package['percentage']?></td>
            </tr>
        <?php } ?>
        </tbody>

    </table>
             </div>
          </div>
      </div
     </div>  
        
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>
   $(document).ready(function () {
    $('#example').DataTable();
}); 
</script>        
<script>
$( "#package" ).change(function() {
    // alert("Hiiii");
    var pack=$('#package').val();
//   alert(user);
    $.post('<?=BASEURL?>user/get_pack_details', {
        'pack': pack
    })
    .done(function(res) {
        
        if (res != 'empty') {
            var obj = JSON.parse(res);
             $('#days').val(obj.days);
             $('#amount').val(obj.value);
             $('#recieve').val(obj.percentage);
            //   alert(res);
            
        } else {
               alert("error");
            
        }
    });
});

</script>
<?php include 'footer.php';?>        