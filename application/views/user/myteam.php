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
               <h4 class="card-title mb-0">My Team</h4>
            </div>
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Userid</th>
                     <th>Name</th>
                     <th>level</th>
                  </tr>
               </thead>
                  <tbody>
                  <?php  
                  $count=1;
         $child = $this->db->select('team')->where('child_id', $this->session->userdata('micusername'))->get('uni_tree')->row()->team;
            $my_team = explode("~", $child);
            $total_team = count($my_team);
            
            $user_team = $this->db->like('team', $this->session->userdata('micusername'))->get('uni_tree')->result_array();
            $level = 0; 
            
            foreach ($user_team as $key => $user) {
                $username = $this->db->where('username',$user['child_id'])->get('user_role')->row_array();
                $parents = explode("~", $user['team']);
                $total = count($parents);
                
                $level =$total - $total_team;
                
            
                ?>
                <tr>
                     <td><?=$count++;?></td>
                     <td><?=$user['child_id'];?></td>
                     <td><?=$username['first_name'];?></td>
                     <td><?=$level?></td>
       
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