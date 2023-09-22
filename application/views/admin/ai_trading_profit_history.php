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
                    <h4 class="card-title mb-0">Trading Profit Generated History</h4>
                </div>
                          <table id="example" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>SL.no</th>
                        <th>Date & Time</th>
                        <th>User ID</th>
                        <th>Percentage</th>
                        <th>Profit</th>
                         <th>Trade Open Time</th>
                          <th>Trade Close Time</th>
                          <th>Action</th>
                      
                      
                    </tr>
                </thead>
                <tbody>
                   <?php $his= $this->db->where('remark','Trade Profit')->get('account')->result_array();
                   $count=1;
                   foreach($his as $key=>$row){?>
                    <tr>
                        <td><?=$count++;?></td>
                        <td><?=$row['entry_date'];?></td>
                        <td><?=$row['username']?></td>
                        <td><?= intval($row['percentage']) ?>%</td>
                        <td><?=number_format($row['credit'],2);?></td>
                        <td>xxxxxx</td>
                         <td>xxxxxx</td>
                         <td><p style="color:green">Buy</p><p style="color:red">Sell</p></td>
                     
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