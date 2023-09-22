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
                                <h4 class="card-title mb-0">Forex Profit History</h4>
                            </div>
                             <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mode</th>
                            <th>Currency</th>
                            <th>Today's Profit</th>
                            <th>Total Profit</th>
                            <th>Referral Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Crypto</td>
                            <td>USDT</td>
                            <td>xxxx</td>
                            <td>xxxx</td>
                            <td>xxxx</td>
                        </tr>
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