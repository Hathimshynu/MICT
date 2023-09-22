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
                    <h4 class="card-title mb-0">Mining Income</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Investment Date</th>
                <th>Investment</th>
                <th>Recieved</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $mining = $this->db->where('user_id',$this->session->userdata('micusername'))->get('user_package')->result_array();
            $count =1;
            foreach($mining as $key => $mg)
            {
               $rec =  $this->db->select('sum(credit) + sum(ewallet) as balance')->where('remark','ROI Income')->where('entry_date <=',date('Y-m-d H:i:s'))->where('username',$this->session->userdata('micusername'))->where('description',$mg['up_id'])->get('account')->row()->balance+0;
            ?>
            <tr>
                <td><?=$count++;?></td>
                <td><?=date("d/m/Y", strtotime($mg['entry_date']));?></td>
                <td><?=$mg['amount'];?></td>
                <td><?=number_format($rec,2);?></td>
                <td><a href="<?=BASEURL?>user/mining_history/<?=$mg['up_id']?>"><button type="button" class="btn btn-primary btn-sm" fdprocessedid="60z5ko">view</button></a></td>
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