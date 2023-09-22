<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>


<style>
    div#example_wrapper {
    margin: 20px;
}
.col-sm-12 {
    overflow: auto;
}

  /*@keyframes arrowAnimation {*/
  /*          0%, 100% { transform: translateY(0); }*/
  /*          50% { transform: translateY(-10px); }*/
  /*      }*/
  /*      .arrow-svg {*/
  /*          animation: arrowAnimation 1s infinite;*/
  /*      }*/
        
        .btn-glow {
  background: #FF971D;
  color:black !important;
  font-weight: 400;
  box-shadow: 0 0 0 0 #FEF130;
  animation: glow 1.4s ease-out infinite;
}

@keyframes glow {
  0% {
    box-shadow: 0 0 0 0 #FEF130;
  }

  50% {
    box-shadow: 0 0 30px 0 #FEF130;
  }
}


</style>

<?php include 'header.php';?>


<div class="container-fluid content-inner pb-0">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Generate Rank Income</h4>
                </div>
                <hr>
                <div class="card-body">
                   <div class="d-flex align-items-center justify-content-between mt-3">
                      <div>
                         <h5 class="text-primary" style="visibility: visible;">Click the below button to Generate Rank Income</h5>
                      </div>
                      <div class="border  bg-soft-primary rounded p-3">
                         <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                         </svg>
                      </div>
                   </div>
                   <div class="mt-4 text-center">
                  <a href="<?= BASEURL ?>admin/generate_rank" class="btn btn-primary btn-glow rounded-pill"><i class="fa-solid fa-circle-chevron-right me-2"></i> Generate</a>                   </div>
                </div>
          </div>
        </div>
    </div>
    
      <div class="row">
          <div class="col-lg-12">
             <div class="card ">
                 <div class="card-header">
                    <h4 class="card-title mb-0">History</h4>
                </div>
                 <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Date & Time</th>
                <th>User ID</th>
                <th>USDT</th>
                <th>Rank</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $rank_income = $this->db->where('remark','Rank income')->get('account')->result_array();
            foreach($rank_income as $key => $income){
            ?>
            <tr>
                <td><?=$count++;?></td>
                <td><?= date('d F Y', strtotime($income['entry_date'])); ?></td>
                <td><?=$income['username'];?></td>
                <td><?=$income['credit'];?></td>
                <td><?=$income['description'];?></td>
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