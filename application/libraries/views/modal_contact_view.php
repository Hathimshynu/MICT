<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
p{color:red;margin-top:5px;}
</style>
</head>
<body>


<div class="container">  
	<div class="row"> 
		<h1>Example: Form Validation in CodeIgniter</h1>
		<div class="col-xs-4">
			<?=form_open('formsubmit', $attributes);?>
			<div class="form-group">
				<label for="phone">Name:</label>
				<input type="text" name="phone" class="form-control" value="<?=$this->input->post('phone'); ?>" />
				<?=form_error('phone');  ?>
			</div>
			
			<div class="form-group"><input class="btn btn-success" type="submit"/> </div>
			<?= form_close();?>
		</div>
	</div>
</div>
</body>
</html>