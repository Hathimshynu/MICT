<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"/>


<?php include 'header.php';?>

      <div class="container-fluid content-inner pb-0">
            <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">My Currencies</h4>
                                    <div class="flex-shrink-0">
                                        <button class="btn btn-soft-secondary btn-sm">24H</button>
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="btn btn-soft-primary btn-sm" role="button" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Get Report<i class="mdi mdi-chevron-down align-middle ms-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Download Report</a>
                                                <a class="dropdown-item" href="#">Export</a>
                                                <a class="dropdown-item" href="#">Import</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-hover table-borderless table-centered align-middle table-nowrap mb-0">
                                            <thead class="text-muted bg-soft-light">
                                                <tr>
                                                    <th>Coin Name</th>
                                                    <th>Price</th>
                                                    <th>24h Change</th>
                                                    <th>Total Balance</th>
                                                    <th>Total Coin</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="assets/images/svg/crypto-icons/btc.svg" alt="" class="avatar-xxs">
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-0">Bitcoin</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$48,568.025</td>
                                                    <td>
                                                        <h6 class="text-success fs-13 mb-0"><i class="mdi mdi-trending-up align-middle me-1"></i>5.26
                                                        </h6>
                                                    </td>
                                                    <td>$53,914.025</td>
                                                    <td>1.25634801</td>
                                                    <td><a href="apps-crypto-buy-sell.html" class="btn btn-sm btn-soft-primary">Trade</a></td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="assets/images/svg/crypto-icons/ltc.svg" alt="" class="avatar-xxs">
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-0">Litecoin</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$87,142.027</td>
                                                    <td>
                                                        <h6 class="text-danger fs-13 mb-0"><i class="mdi mdi-trending-down align-middle me-1"></i>3.07
                                                        </h6>
                                                    </td>
                                                    <td>$75,854.127</td>
                                                    <td>2.85472161</td>
                                                    <td><a href="apps-crypto-buy-sell.html" class="btn btn-sm btn-soft-primary">Trade</a></td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="assets/images/svg/crypto-icons/eth.svg" alt="" class="avatar-xxs">
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-0">Eathereum</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$33,847.961</td>
                                                    <td>
                                                        <h6 class="text-success fs-13 mb-0"><i class="mdi mdi-trending-up align-middle me-1"></i>7.13
                                                        </h6>
                                                    </td>
                                                    <td>$44,152.185</td>
                                                    <td>1.45612347</td>
                                                    <td><a href="apps-crypto-buy-sell.html" class="btn btn-sm btn-soft-primary">Trade</a></td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="assets/images/svg/crypto-icons/bnb.svg" alt="" class="avatar-xxs">
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-0">Binance</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$73,654.421</td>
                                                    <td>
                                                        <h6 class="text-success fs-13 mb-0"><i class="mdi mdi-trending-up align-middle me-1"></i>0.97
                                                        </h6>
                                                    </td>
                                                    <td>$48,367.125</td>
                                                    <td>0.35734601</td>
                                                    <td><a href="apps-crypto-buy-sell.html" class="btn btn-sm btn-soft-primary">Trade</a></td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="assets/images/svg/crypto-icons/usdt.svg" alt="" class="avatar-xxs">
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-0">Tether</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$66,742.077</td>
                                                    <td>
                                                        <h6 class="text-danger fs-13 mb-0"><i class="mdi mdi-trending-down align-middle me-1"></i>1.08
                                                        </h6>
                                                    </td>
                                                    <td>$53,487.083</td>
                                                    <td>3.62912570</td>
                                                    <td><a href="apps-crypto-buy-sell.html" class="btn btn-sm btn-soft-primary">Trade</a></td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="assets/images/svg/crypto-icons/dash.svg" alt="" class="avatar-xxs">
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-0">Dash</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$34,736.209</td>
                                                    <td>
                                                        <h6 class="text-success fs-13 mb-0"><i class="mdi mdi-trending-up align-middle me-1"></i>4.52
                                                        </h6>
                                                    </td>
                                                    <td>$15,203.347</td>
                                                    <td>1.85412740</td>
                                                    <td><a href="apps-crypto-buy-sell.html" class="btn btn-sm btn-soft-primary">Trade</a></td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="assets/images/svg/crypto-icons/neo.svg" alt="" class="avatar-xxs">
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-0">Neo</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$56,357.313</td>
                                                    <td>
                                                        <h6 class="text-danger fs-13 mb-0"><i class="mdi mdi-trending-down align-middle me-1"></i>2.87
                                                        </h6>
                                                    </td>
                                                    <td>$61,843.173</td>
                                                    <td>1.87732061</td>
                                                    <td><a href="apps-crypto-buy-sell.html" class="btn btn-sm btn-soft-primary">Trade</a></td>
                                                </tr><!-- end -->
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-2">
                                                                <img src="assets/images/svg/crypto-icons/doge.svg" alt="" class="avatar-xxs">
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-0">Dogecoin</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$62,357.649</td>
                                                    <td>
                                                        <h6 class="text-success fs-13 mb-0"><i class="mdi mdi-trending-up align-middle me-1"></i>3.45
                                                        </h6>
                                                    </td>
                                                    <td>$54,843.173</td>
                                                    <td>0.95632087</td>
                                                    <td><a href="apps-crypto-buy-sell.html" class="btn btn-sm btn-soft-primary">Trade</a></td>
                                                </tr><!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div><!-- end tbody -->
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
      
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