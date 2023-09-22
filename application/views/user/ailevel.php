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
             <div class="card" style="overflow:auto">
                 <div class="card-header">
                    <h4 class="card-title mb-0">AI Trading Level Income</h4>
                </div>
                 <table id="" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Credited Date</th>
                <th>User Details</th>
                <th>Level</th>
                <th>USDT</th>
            </tr>
        </thead>
        <tbody>
         <?php $his= $this->db->order_by('level','asc')->where('username',$this->session->userdata('micusername'))->where('remark','Trade Level Income')->get('account')->result_array(); 
         
         $count=1;
         foreach($his as $key=>$row){
            $username= $this->db->where('username',$row['description'])->get('user_role')->row_array();
         ?>
            <tr>
                <td><?=$count++?></td>
                <td><?= date('Y-m-d', strtotime($row['entry_date'])); ?></td>
                  <td>
                      <p>User Id:<?=$row['description']?></p>
                      <p>User Name:<?=$username['first_name'];?></p>
                  </td>
                
                 <td><?=$row['level'];?></td>
                  <td><?=$row['credit'];?></td>
            
            </tr>
        <?php } ?>
        </tbody>
      </table>
             </div>
          </div>
      </div>
   
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