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
            <h5 class="mb-3 ms-2 ms-lg-0 ms-md-0">Referral</h5>
            <div class="card">
                <div class="card-body">
                        <div class="row d-flex justify-content-center">
                         <div class="container social-container">
                        <h4 style="color:#5D61E2 !important;" class="text-center">Share Registration Link to Social Media</h4>
                            <div class="effect aeneas">
                                <div class="buttons">
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style row" data-a2a-url="<?= BASEURL."user/registration/".bin2hex($this->session->userdata('micusername')) ?>" data-a2a-title="MICT">
                                  <div class="col-4 col-lg-2 mb-3 mb-lg-4">     
                                <a class="a2a_button_facebook fb" rel="nofollow noopener" href="/#facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Share to Facebook"  ><i class="fa-brands fa-facebook" aria-hidden="true"></i></a>

                                </div> 
                                <div class="col-4 col-lg-2 mb-3 mb-lg-4"> 
                                <a class="a2a_button_whatsapp whatsapp" target="_blank" href="/#whatsapp" rel="nofollow noopener"  data-bs-toggle="tooltip" data-bs-placement="top" title="Share to Whatsapp"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a>
                                </div> 
                               
                                <!--<div class="col-4 col-lg-2 mb-3 mb-lg-4">-->
                                <!--<a class="a2a_button_twitter tw" target="_blank" href="/#twitter" rel="nofollow noopener" data-bs-toggle="tooltip" data-bs-placement="top" title="Share to Twitter" title="Join us on Twitter"><i class="fa-brands fa-square-x-twitter" aria-hidden="true"></i></a>-->
                                <!--</div>-->

                                <div class="col-4 col-lg-2 mb-3 mb-lg-4"> 
                                <a class="a2a_button_whatsapp whatsapp" target="_blank" href="/#whatsapp" rel="nofollow noopener" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Share to Whatsapp Business"  class="whatsapp" ><i class="fa-brands fa-square-whatsapp" aria-hidden="true"></i></a>
                                </div> 
                                <!--<div class="col-4 col-lg-2 mb-3 mb-lg-4">-->
                                <!--<a href="https://www.instagram.com/sharer.php?url=https://demo-web-site.com/squaremarket/dev/admin/registration/live/3739333234343133/"  rel="noopener" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Share to Instagram" class="insta" ><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>-->
                                <!--</div>-->
                               <!-- <div class="col-4 col-lg-2 mb-3 mb-lg-4">-->
                               <!-- <a class="a2a_button_linkedin in" target="_blank" href="/#linkedin" rel="nofollow noopener" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Share to Linked In" ><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a>-->
                               <!--</div>-->
                              
                                </div> <!--Row Ends-->
                               <!-- Copy to Clipboard -->
                               
                                 <div style="padding-right:0;padding-left:0;" class="row d-flex justify-content-center my-5">
                                     <h4 style="color:#5D61E2 !important;" class="text-center">Referral Link</h4>
                                 <div class="container-copy text-center w-50 mt-3">
                                    <div class="copy-text gradient-border" id="gradient-border">
                                        <input type="text" class="text" value="<?= BASEURL."user/registration/".bin2hex($this->session->userdata('micusername')) ?>" />
                                        
                                        
                                        <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Click to Copy"><i class="fa fa-clone copy-icon"></i></button>
                                    </div>
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
<script type="text/javascript">
    let copyText = document.querySelector(".copy-text");
copyText.querySelector("button").addEventListener("click", function () {
	let input = copyText.querySelector("input.text");
	input.select();
	document.execCommand("copy");
	copyText.classList.add("active");
	window.getSelection().removeAllRanges();
	setTimeout(function () {
		copyText.classList.remove("active");
	}, 3000);
});

</script>


    <!--// <script>-->
    <!--//     function shareright(){-->
    <!--//          alert('hii');-->
    <!--//         if (location.protocol !== 'https:') {-->
    <!--//             var rtextarea = document.createElement("textarea");-->
    <!--//             document.body.appendChild(rtextarea);-->
    <!--//             rtextarea.value = '<?= BASEURL."user/register/".bin2hex($this->session->userdata('ubloomuser')).'/right' ?>'; -->
    <!--// save main text in it-->
    <!--//             rtextarea.select(); -->
    <!--//select textarea contenrs-->
    <!--//             document.execCommand("copy");-->
    <!--//             document.body.removeChild(rtextarea);-->
    <!--//           } else {-->
    <!--//             let shareData = {-->
    <!--//               title: '<?=$comp['company_name']?>',-->
    <!--//               text: '<?=$comp['company_name']?>',-->
    <!--//               url: '<?= BASEURL."user/register/".bin2hex($this->session->userdata('ubloomuser')).'/right' ?>',-->
    <!--//           }-->
    <!--//           navigator.clipboard.writeText('<?= BASEURL."user/register/".bin2hex($this->session->userdata('ubloomuser')).'/right' ?>');-->
    <!--//           navigator.share(shareData);-->
    <!--//         }-->
    <!--//     } -->
    <!--// </script>-->
    



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
  