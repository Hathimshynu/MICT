<?php include 'header.php';?>



<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="<?=BASEURL?>assets/css/registration.css" />

 <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   
  <div class="container-fluid content-inner pb-5">
    <div class="row">
    <div class="col-xxl-12">
            <h5 class="mb-3 ms-2 ms-lg-0 ms-md-0">USDT Deposit</h5>
            <div class="card">
                <div class="card-body">
                        <div class="row d-flex justify-content-center">
                         <div class="container social-container">
                            <div class="effect aeneas">
                                <div class="buttons">
                                    
                               
                                 <div style="padding-right:0;padding-left:0;" class="row d-flex justify-content-center my-5">
                                     <h4 style="color:#5D61E2 !important;" class="text-center">Deposit Amount USDT</h4>
                                 <div class="container-copy text-center w-50 mt-3">
                                    
                                        <form action="<?=BASEURL?>coinpayments/genpay_link" method="post">
                                            <div class="copy-text gradient-border" id="gradient-border">
                                            <input type="number" class="text" name="amount" />
                                            </div>
                                            <button type="submit" title="Deposit Amount USDT">Deposit</button>
                                        </form>
                                    
                                </div>
                                 </div>
                                 <!-- Copy to Clipboard -->
                                </div>
                             </div>
                            </div>
                        </div>
                        </div>
                <!--end col-->
        </div>     
      </div>
     </div>
    </div>
<!-- container-fluid -->
   
<!-- Script for Copy to Clipboard -->


 <script>
var a2a_config = a2a_config || {};
a2a_config.onclick = 1;
</script>


<script async="" src="https://static.addtoany.com/menu/page.js"></script>
    
                
        <!-- prismjs plugin -->
   <script src="<?=BASEURL?>assets/libs/prismjs/prism.js"></script>

         
                
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="<?=BASEURL?>assets/js/pages/datatables.init.js"></script>
                
    <script>
        $(document).ready(function () {
    $('#scroll-horizontal1').DataTable();
});

    </script>
    
  

<?php include 'footer.php';?>
  