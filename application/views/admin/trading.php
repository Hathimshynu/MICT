
<?php include 'header.php';?>
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>
<style>

   .col-sm-12 {
   overflow: auto;
   }
   .walletbtn {
   display: flex;
   align-items: center;
   justify-content: center;
   }
</style>
<div class="container-fluid content-inner pb-0">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">Trading</h4>
            </div>
            <div class="card-body"> 
          
               <form action="" method="post">
                   <div class="row">
                <div class="form-group col-md-4">
                     <label class="form-label" for="fname">Pair</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_name" value=""  >  
                  </div>
                  <div class="form-group col-md-4">
                                 <label class="form-label"> <span class="text">Type</span></label>
                                 <select name="country" class="selectpicker form-control" data-style="py-0">
                                    <option value="sell">sell</option>
                                    <option value="buy">buy</option>
                                   
                                 </select>
                              </div>
                   <div class="form-group col-md-4">
                     <label class="form-label" for="fname">Value</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_name" value=""  >
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Buy Price</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_name" value=""  >
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Sell price</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_name" value=""  >
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">S/L</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_name" value=""  >
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">T/P</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_name" value=""  >
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Open</label>
                     <input type="text" class="form-control" id="" placeholder="" name="package_name" value=""  >
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Swap</label>
                     <input type="text" class="form-control" id="" placeholder="" value="" name="package_value"  >
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">M</label>
                     <input type="text" class="form-control" id="" placeholder="" value="" name="days"  >
                  </div>
                   <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Commission</label>
                     <input type="text" class="form-control" id="" placeholder="" value="" name="percentage" >
                  </div>
                  </div>
                   <div class="walletbtn">   
                     <button class="btn btn-primary m-3">Submit</button>
                  </div>
               </form>
        </div> 
        </div>
          <div class="card"> 
            <div class="card-header">
               <h6 class="card-title mb-3">Trading history</h6>
            </div>
             <div class="card-body"> 
            <table id="example" class="table" style="width:100%">
               <thead>
                  <tr>
                     <th>SL.no</th>
                     <th>Entry Date</th>
                     <th>Buy price</th>
                     <th>Sell Price</th>
                      <th>S/L</th>
                     <th>T/P</th>
                     <th>Swap</th>
                     <th>M</th>
                     <th>Commission</th>
                  </tr>
               </thead>
               <tbody>
                 <tr>
                     <td>1</td>
                     <td>13/01/2023</td>
                     <td>4455</td>
                      <td>4455</td>
                     <td>454</td>
                     <td>45451</td>
                     <td>4455</td>
                      <td>4455</td>
                       <td>4455</td>
                 </tr>
               </tbody>
            </table>
          
         </div>
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