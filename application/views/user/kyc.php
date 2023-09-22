<?php include 'header.php';?>


<style>
    .canvas-image-box{
        min-height:100px !important;
        max-height:300px !important;
        overflow:hidden !important;
        height:auto;
        padding:6px;
        width:300px;
        cursor:pointer;
    }
    .canvas-image-box img{
        max-height:300px !important;
        border-radius:10px;
        object-fit:contain;
    }
    
    @media screen and (max-width:500px){
        .kyc-row > * {
    padding-right: 7px !important;
    padding-left: 7px !important;
    }
    
    .canvas-image-box{
        max-height:200px !important;
        padding: 0px !important;
    }
    .canvas-image-box img{
        max-height:200px !important;
    }
    
    .note-badge{
        font-size:10px !important;
    }
    
    }    
</style>


<div class="container-fluid content-inner pb-5">
   <div class="row kyc-row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title mb-0">KYC</h4>
            </div>
            
           <div class="card-body">
               
               <div class="text-center notes">
                   <span style="font-size: 12px;" class="badge rounded-pill bg-primary note-badge py-1">Note : Uploading File format must be in <span class="text-dark">JPG</span> (or) <span class="text-dark">PNG</span> </span>
               </div>
               
                 <form action="<?=BASEURL?>user/reset_password" method="post">
                   <div class="row justify-content-center mt-3 mb-3">
                      <div class="form-group col-lg-8">
                         <label class="form-label" for="aadharno">Aadhar Card Number</label>
                         <input type="text" class="form-control" id="aadharno"   placeholder="Enter Aadhar Number" name="oldpass">
                      </div>
                      
                      
                     <div class="form-group col-lg-8">
                      <label for="aadharfront" class="form-label">Upload Aadhar Card Front</label>
                      <input class="form-control" type="file" id="aadharfront-file" accept=".jpg, .jpeg, .png">
                    </div>
                    
                    
                    <div class="aadhar-front-img-container">
                        <h6 class="text-center text-info pb-1">Aadhar Front Side Image</h6>
                        <div class="text-center"><small id="aadharfront-upload-success" style="color:#009432;font-weight:500;"></small></div>
                        <div class="d-flex justify-content-center mb-3">
                            <div class="canvas-image-box">
                                <img id="aadhar-front-img" style="object-fit:contain;" src="<?=BASEURL?>assets/images/no-image.png" class="img-fluid img-responsive">
                            </div>
                        </div>
                    </div>
                    
                    
                    
                      <div class="form-group col-lg-8">
                          <label for="aadharback" class="form-label">Upload Aadhar Card Back</label>
                          <input class="form-control" type="file" id="aadharback-file" accept=".jpg, .jpeg, .png">
                    </div>
                    
                    
                    <div class="aadhar-back-img-container">
                        <h6 class="text-center text-info pb-1">Aadhar Back Side Image</h6>
                        <div class="text-center"><small id="aadharback-upload-success" style="color:#009432;font-weight:600;"></small></div>
                         <div class="d-flex justify-content-center mb-3">
                            <div class="canvas-image-box">
                                <img id="aadhar-back-img" style="object-fit:contain;" src="<?=BASEURL?>assets/images/no-image.png" class="img-fluid img-responsive">
                            </div>
                        </div>
                    </div>        
                    
                    
                    
                     <div class="form-group col-lg-8">
                         <label class="form-label" for="panno">PAN Card Number</label>
                         <input type="text" class="form-control" id="panno"   placeholder="Enter PAN Number" name="">
                      </div>
                      
                      
                       <div class="form-group col-lg-8">
                      <label for="pancardimg" class="form-label">Upload PAN Card Photo</label>
                      <input class="form-control" type="file" id="pancard-file" accept=".jpg, .jpeg, .png">
                    </div>
                    
                    
                     <div class="pan-img-container">
                        <h6 class="text-center text-info pb-1">PAN Card Image</h6>
                        <div class="text-center">
                            <small id="pan-upload-success" style="color:#009432;font-weight:600;"></small>
                        </div>
                         <div class="d-flex justify-content-center mb-3">
                            <div class="canvas-image-box">
                                <img id="pan-card-img" style="object-fit:contain;" src="<?=BASEURL?>assets/images/no-image.png" class="img-fluid img-responsive">
                            </div>
                        </div>
                     </div>    
                    
                    
                   </div>
                  <div class=" mb-3 d-flex justify-content-center"> 
                       <button type="submit" class="btn btn-success"><i class="fa-regular fa-circle-check me-2"></i>Submit</button>
                  </div>
                </form>
            </div>
            
            
         </div>
      </div>
   </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
      // Function to handle image upload and display
      function handleImageUpload(fileInput, imageElement, uploadSuccessText) {
         const storedImage = sessionStorage.getItem(imageElement.attr('id') + 'Image');
         const isUploaded = sessionStorage.getItem(imageElement.attr('id') + 'IsUploaded');

         if (storedImage) {
            imageElement.attr('src', storedImage);
         } else {
            imageElement.attr('src', '<?= BASEURL ?>assets/images/no-image.png');
         }

         if (isUploaded) {
            uploadSuccessText.text('Uploaded');
         }

         fileInput.on('change', function () {
            const file = fileInput[0].files[0];
            if (file) {
               const reader = new FileReader();

               reader.onload = function (e) {
                  const uploadedImageSrc = e.target.result;
                  imageElement.attr('src', uploadedImageSrc);

                  // Display "Uploaded" text
                  uploadSuccessText.text('Uploaded');

                  // Store the uploaded image and "Uploaded" state in session storage
                  sessionStorage.setItem(imageElement.attr('id') + 'Image', uploadedImageSrc);
                  sessionStorage.setItem(imageElement.attr('id') + 'IsUploaded', true);
               };

               reader.readAsDataURL(file);
            } else {
               // If no file is selected, set the default image URL and clear "Uploaded" text
               imageElement.attr('src', '<?= BASEURL ?>assets/images/no-image.png');
               uploadSuccessText.text('');

               // Clear the image and "Uploaded" state from session storage
               sessionStorage.removeItem(imageElement.attr('id') + 'Image');
               sessionStorage.removeItem(imageElement.attr('id') + 'IsUploaded');
            }
         });
      }

      // Handle Aadhar Front image
      handleImageUpload($('#aadharfront-file'), $('#aadhar-front-img'), $('#aadharfront-upload-success'));

      // Handle Aadhar Back image
      handleImageUpload($('#aadharback-file'), $('#aadhar-back-img'), $('#aadharback-upload-success'));

      // Handle Pan Card image
      handleImageUpload($('#pancard-file'), $('#pan-card-img'), $('#pan-upload-success'));
   });
</script>








<?php include 'footer.php';?>