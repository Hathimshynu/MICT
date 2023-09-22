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
                    <h4 class="card-title mb-0">Peer To Peer</h4>
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
															<img style="height:50px;" class="img-responsive" src="https://mict.uk/assets/images/w-wallet.png">
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
                                          
                  
                     <form action="<?=BASEURL?>user/peer_to_peer" method="post">
                     <div class="">
                        <div class="form-group"><span style="color:red;"></span>
                           <label for="exampleInputEmail1" class="form-label">User ID <span class="text-danger"><?=form_error('user_id');?></span></label>
                           <input type="text" name="user_id" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter User id" fdprocessedid="ijryfu">
                        </div>
                        <div class="form-group"><span style="color:red;"></span>
                           <label for="exampleInputEmail1" class="form-label">USDT <span class="text-danger"><?=form_error('amount');?></span></label>
                           <input type="number" name="amount" value="" class="form-control" id="exampleInputEmail1" placeholder="Enter Transfer USDT" fdprocessedid="ijryfu">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1" class="form-label">Transaction Password <span class="text-danger"><?=form_error('tpass');?></span></label>
                            <input type="password" name="tpass" value="" class="form-control" id="exampleInputEmail1" fdprocessedid="79lwiv">
                                                            
                        </div>
                       
                     </div>
                     <div class="text-center">
                         <button type="submit" class="btn btn-info  mt-4 mb-0" fdprocessedid="9a036e">Transfer</button>
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
                    <h4 class="card-title mb-0">Peer to Peer Credit</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Date & Time</th>
                <th>User ID</th>
                <th>USDT</th>
            </tr>
        </thead>
        <tbody>
<?php $peer_peer=$this->db->where('remark','PTP credit')->where('user_id',$this->session->userdata('micusername'))->get('e_wallet')->result_array();
      $count=1;
      foreach($peer_peer as $key=>$peer){ ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$peer['entry_date']?></td>
                <td><?=$peer['description']?></td>
                <td><?=$peer['credit']?> USDT</td>
            </tr>
         <?php  } ?>  
        </tbody>

    </table>
             </div>
          </div>
      </div>
     <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Peer to Peer Debit</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Date & Time</th>
                <th>User ID</th>
                <th>USDT</th>
            </tr>
        </thead>
        <tbody>
<?php $peer_to_peer=$this->db->where('remark','PTP debit')->where('user_id',$this->session->userdata('micusername'))->get('e_wallet')->result_array();
      $count=1;
      foreach($peer_to_peer as $key=>$peerto){ ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$peerto['entry_date']?></td>
                <td><?=$peerto['description']?></td>
                <td><?=$peerto['debit']?> USDT</td>
            </tr>
         <?php  } ?>  
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
<?php include 'footer.php';?>        