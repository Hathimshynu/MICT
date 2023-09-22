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
               
               
      <div class="container-fluid content-inner pb-5">
        
         <div class="row mb-5">
          <div class="col-lg-12">
             <div class="card ">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Deposit History</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>SL.no</th>
                <th>Date</th>
                <th>Time</th>
                <th>USDT</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $deposit_history = $this->db->where('user_id',$this->session->userdata('micusername'))->where('remark','Deposit')->get('e_wallet')->result_array();
            foreach($deposit_history as $key => $deposit){
            ?>
            <tr>
                <td><?=$count++?></td>
                <td><?= date('d F Y', strtotime($deposit['entry_date'])); ?></td>
                <td><?= date('H:i:s', strtotime($deposit['entry_date'])); ?></td>
                <td><?=$deposit['credit'];?></td>
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