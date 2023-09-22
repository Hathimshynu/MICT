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
                    <h4 class="card-title mb-0">Direct Refferal</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Register Date</th>
                <th>Active Date</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>Placement</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $direct = $this->db->where('ref_id',$this->session->userdata('micusername'))->get('user_role')->result_array();
        $count = 1;
        foreach($direct as $key => $dir)
        {
        ?>
            <tr>
                <td><?=$count++;?></td>
                <td><?=date("d/m/Y h:i a", strtotime($dir['entry_date']));?></td>
                <td><?=date("d/m/Y h:i a", strtotime($dir['active_date']));?></td>
                <td><?=$dir['username']?></td>
                <td><?=$dir['first_name'];?></td>
                <td><?=$dir['position'];?></td>
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