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
                    <h4 class="card-title mb-0">Binary Income</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Matching Date</th>
                <th>Matching</th>
                <th>Recieved</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
   <?php $binary_income=$this->db->where('remark','Pair Income')->where('pair_id !=','')->get('account')->result_array();
         $count=1;
         foreach($binary_income as $key=>$binary){ 
         $income=$this->db->select_sum('credit')->where('description',$binary['pair_id'])->get('account')->row()->credit+0; ?>
            <tr>
                <td><?=$count++?></td>
                <td><?=$binary['entry_date']?></td>
                <td><?=$binary['left_pair']?></td>
                <td><?=$income?></td>
                <td><a href="<?=BASEURL?>user/binary_history/<?=$binary['pair_id']?>"><button type="button" class="btn btn-primary btn-sm" fdprocessedid="60z5ko">view</button></a></td>
            </tr>
             
        </tbody>
     <?php } ?>
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