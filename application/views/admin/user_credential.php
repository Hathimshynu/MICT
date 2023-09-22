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
                    <h4 class="card-title mb-0">User Credential</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Joining</th>
                <th>Active</th>
                <th>User Details</th>
                 <th>Name</th>
                <th>Sponser Details</th>
                <th>Password</th>
                <th>Tran.Password</th>
                 <th>E-mail</th>
                <th>View</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = $this->db->where('user_type','u')->get('user_role')->result_array();
            $count = 1;
            foreach($users as $key => $us)
            {
            ?>
            <tr>
                <td><?=$count++;?></td>
                <td><?=date("d/m/Y", strtotime($us['entry_date']));?></td>
                <td><?=date("d/m/Y", strtotime($us['active_date']));?></td>
                <td><?=$us['username'];?></td>
                <td><?=$us['first_name'];?></td>
                <td><?=$us['ref_id'];?></td>
                <td><?=$us['pwd_hint'];?></td>
                <td><?=$us['tpwd'];?></td>
                <td><?=$us['email'];?></td>
                <td><a href="<?=BASEURL?>admin/view_user_details/<?=bin2hex($us['username']);?>"><button type="button" class="btn btn-primary btn-sm" fdprocessedid="60z5ko">view</button></a></td>
                <td><button type="button" class="btn btn-Danger btn-sm" fdprocessedid="60z5ko">Block</button></td>
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