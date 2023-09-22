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
                    <h4 class="card-title mb-0">Level Team</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Activate date</th>
                <th>Level</th>
                <th>User ID</th>
                <th>User Name</th>
               
            </tr>
        </thead>
        <tbody>
        <?php  
        $teams = $this->db->like('team',$this->session->userdata('micusername'))->get('uni_tree')->result_array();
        $count = 1;
        foreach($teams as $key => $team)
        {
           $user = $this->db->where('username',$team['child_id'])->get('user_role')->row_array();
           $level = explode("~",$team['team']);
           $get_team = $this->db->select('team')->where('child_id',$this->session->userdata('micusername'))->get('uni_tree')->row()->team;
           log_message('error',$get_team);
           $user_level = explode("~",$get_team);
           $level_count = count($level) - count($user_level);
        ?>
            <tr>
                <td><?=$count++;?></td>
                <td><?=date("d/m/Y h:i a", strtotime($user['active_date']));?></td>
                <td>level <?=$level_count;?></td>
                <td><?=$user['username']?></td>
                <td><?=$user['first_name']." ".$user['last_name']?></td>
               
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