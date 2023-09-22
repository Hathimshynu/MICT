<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"/>


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
                    <h4 class="card-title mb-0">search the user</h4>
                </div>
                <div class="filter-container">
            <label for="usernameFilter">Enter User ID:</label>
            <input type="text" id="usernameFilter" placeholder="Enter userID">
        </div>
        <div id="errorContainer" class="alert alert-danger" style="display: none;"></div>
                
                         <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <!--<th>SL.no</th>-->
                <th>Joining</th>
                <th>Name</th>
                <th>User Details</th>
                <th>Sponser Details</th>
                <th>Password</th>
                <th>Tran.Password</th>
                <!--<th>View</th>-->
                <!--<th>Action</th>-->
            </tr>
        </thead>
        <tbody>
        
        </tbody>

    </table>
             </div>
          </div>
      </div>
      <!--Table Ends-->
      
   
 </div>         
    
   







<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<script>
//   $(document).ready(function () {
//     $('#example').DataTable();
// }); 
</script>



<script>
$(document).ready(function() {
    var dataTable = $('#example').DataTable({
        searching: false,
        paging: false,
        info: false,
    });

    // Handle Enter key press in the input field
    $('#usernameFilter').on('keyup', function(e) {
        if (e.key === 'Enter') {
            var usernameFilter = $(this).val().trim();

            // Send an AJAX request to fetch user details based on the username
            $.ajax({
                url: '<?=BASEURL?>admin/filterByUsername',
                type: 'POST',
                data: { username: usernameFilter },
                dataType: 'json',
                success: function(response) {
                    // Clear the current table data
                    dataTable.clear().draw();

                    // Check the response status
                    if (response.status === 'success') {

                        // Convert the object to JSON
                        var userDetailsJson = JSON.stringify(response.data);

                        // Parse the JSON back to an object
                        var userDetails = JSON.parse(userDetailsJson);
                        // Create a new row and append it to the table
                        var newRow = [
                            userDetails.joining,
                            userDetails.username,
                            userDetails.user_details,
                            userDetails.sponsor_details,
                            userDetails.password,
                            userDetails.tran_password,
                        ];

                        dataTable.row.add(newRow).draw();
                        $('#errorContainer').hide();
                    } else {
                        // Handle the error case, e.g., show an error message
                        console.error('Error:', response.message);
                         $('#errorContainer').html('Error: ' + response.message).show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});

</script>
























<?php include 'footer.php';?>