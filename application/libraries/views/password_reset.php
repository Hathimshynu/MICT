<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
if ($this->session->flashdata('success_message')) { ?>
    <div style="z-index: 999; right: 0; top: 80px; position: absolute;" class="alert alert-success alert-dismissible fade show">
        <?php echo $this->session->flashdata('success_message');?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div> 
<?php } 
if ($this->session->flashdata('error_message')) { ?>
    <div style="z-index: 999; right: 0; top: 80px; position: absolute;" class="alert alert-danger alert-dismissible fade show">
        <?php echo $this->session->flashdata('error_message');?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php } ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                <h3 class="card-header bg-white mb-3">Change Password</h3>

                    <div class="card-body"> 
                        <form class="validatedForm" action="<?=BASEURL?>password_reset" method="POST">
                            <div class="form-row">
                                
                                <div class="col-md-6 mb-3">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" id="new_pass" name="new_pass" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Confirm Password <span id='message'></span></label>
                                    <input type="password" class="form-control" id="c_pass" name="c_pass" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button id="btnsubmit" class="btn btn-primary" type="submit" disabled>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
    <?php $this->load->view('footer'); ?>
    
    <script type="text/javascript">
    
    $('#new_pass, #c_pass').on('keyup', function () {
        $('#btnsubmit').prop('disabled', true);
  if ($('#new_pass').val() == $('#c_pass').val()) {
      $('#btnsubmit').prop('disabled', false);
    $('#message').html('Matching').css('color', 'green');
    
  } else {
  $('#btnsubmit').prop('disabled', true);
    $('#message').html('Not Matching').css('color', 'red');
  }
    
});
  </script>
