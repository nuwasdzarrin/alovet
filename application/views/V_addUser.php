<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">New User</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Please enter user data
				</div>
				<div class="panel-body">
					<div class="row">
						<form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('Register')?>">
							<div class="col-lg-6">
								<?php echo form_open('register');?>
								<div class="form-group">
									<label>ID Employee</label>
									<input class="form-control" name="name" value="<?php echo set_value('name'); ?>" required>
									<p> <?php echo form_error('name'); ?> </p>
								</div>
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" name="username" value="<?php echo set_value('username'); ?>" required>
									<p> <?php echo form_error('username'); ?> </p>
								</div>
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>" required>
									<p> <?php echo form_error('email'); ?> </p>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" required>
									<p> <?php echo form_error('password'); ?> </p>
								</div>
								<div class="form-group">
									<label>Re-Enter Password</label>
									<input class="form-control" type="password" name="password_conf" value="<?php echo set_value('password_conf'); ?>" required>
									<p> <?php echo form_error('password_conf'); ?> </p>
								</div>
								<button type="submit" class="btn btn-success">Add User</button>
								<button type="reset" class="btn btn-danger">Reset</button>
								<?php echo form_close();?>
							</div>
						<!-- /.col-lg-6 (nested) -->
						</form>
					</div>
					<!-- /.row (nested) -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	
</div>