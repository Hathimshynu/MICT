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

<?php include 'header.php';?>

      <div class="container-fluid content-inner pb-0">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Portfolio History</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
      <thead>
            <?php   ?>
            <tr>
               
                <th> Trade Open Time</th>
                <th>Open Price</th>
                <th>Trade Close Time</th>
                <th> Close Price</th>
                <th> Trade Pair</th>
                 <th>Action</th>
                 <th>Profit Price</th>
                 <th>Profit Percentage</th>
              
              
            </tr>
        </thead>
        <tbody>
            <?php $his= $this->db->where('username',$this->session->userdata('micusername'))->where('remark','Trade Profit')->get('account')->result_array();
            $loss_his=$this->db->where('username',$this->session->userdata('micusername'))->get('trading_loss_history')->result_array();
                   $count=1;
                   foreach($loss_his as $key=>$row){?>
            <tr>
              
                <td><?=$row['trade_open_time'];?></td>
                <td><?=$row['open_price'];?></td>
                
                <td><?=$row['trade_close_time']?></td>
                <td><?=$row['close_price']?></td>
                <td><?=$row['trading_pair']?></td>
                <td> <?php if ($row['action'] == 'Buy') {
                echo '<p style="color:green">BUY</p>';
            } elseif ($row['action'] == 'Sell') {
                echo '<p style="color:red">SELL</p>';
            }
            ?></td>
            <td><?=$row['profit']?></td>
                <td><?=$row['percentage']?></td>
            
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