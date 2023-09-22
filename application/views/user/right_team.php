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
                    <h4 class="card-title mb-0">Right Team</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Activate date</th>
                <th>User ID</th>
               
            </tr>
        </thead>
        <tbody>
        <?php 
        $left_team = $this->admin->get_myteam($this->session->userdata('micusername'),'right');
        //print_r($left_team);
        $count = 1;
        for($i=0; $i < count($left_team); $i++)
        {
            $active_date = $this->db->select('active_date')->where('username',$left_team[$i])->get('user_role')->row()->active_date;
        ?>
            <tr>
                <td><?=$count++;?></td>
                <td><?=date("d/m/Y h:i a", strtotime($active_date));?></td>
                <td><?=$left_team[$i]?></td>
            </tr>
            <?php
        }
          ?> 
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