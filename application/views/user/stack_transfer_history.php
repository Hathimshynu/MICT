<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"/>


<style>
    div#example_wrapper {
    margin: 20px;
}
.col-sm-12 {
    overflow: auto;
}
</style>

<?php include 'header.php';?>

      <div class="container-fluid content-inner pb-0">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Stacking Wallet Transaction History</h4>
                </div>
                  <table id="example" class="table">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>User ID</th>
                <th> Date & Time</th>
                <th>Transfered Amount</th>
              
              
            </tr>
        </thead>
        <tbody>
      <?php $his= $this->db->where('user_id',$this->session->userdata('micusername'))->get('stacking_wallet')->result_array();
                   $count=1;
                   foreach($his as $key=>$row){
                      $total= $this->db->select_sum('credit')->where('username',$row['user_id'])->where('type','stack')->where('description',$row['stacking_id'])->get('account')->row()->credit+0;
                   ?>
            <tr>
                <td><?=$count++;?></td>
                <td><?=$row['user_id'];?></td>
                <td><?=$row['entry_date'];?></td>
                <td><?=$row['credit'];?></td>
                 
              
            
            </tr>
         <?php }?>
        </tbody>

    </table>
             </div>
          </div>
      </div>
      <!--Table Ends-->
      
   
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
     $(document).ready(function () {
    $('#example1').DataTable();
}); 
</script>

<?php include 'footer.php';?>