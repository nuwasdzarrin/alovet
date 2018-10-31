<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Alovet</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/main.css">
	<link rel="shortcut icon" href="<?php echo base_url();?>/assets/login/favicon.ico" type="image/x-icon"/>
	<!--===============================================================================================-->
</head>
<body>
	<?php
   	//cetak jika ada notifikasi
	if($this->session->flashdata('sukses')) { ?>
		<script> alert("<?php echo $this->session->flashdata('sukses');?>") </script>
	<?php } ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?php echo site_url('login');?>">
					<?php echo form_open('login');?>
					<span class="login100-form-title p-b-48">
						Administrator Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid Email is: admin@gmail.com">
						<input class="input100" type="text" name="email" value="<?php echo set_value('email'); ?>" required>
						<span class="focus-input100" data-placeholder="Email"></span>
						<p> <?php echo form_error('email'); ?> </p>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" value="<?php echo set_value('password'); ?>" required>
						<span class="focus-input100" data-placeholder="Password"></span>
						<p> <?php echo form_error('password'); ?> </p>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
					<?php echo form_close();?>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/js/main.js"></script>

</body>
</html>