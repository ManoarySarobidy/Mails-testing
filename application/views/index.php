<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap-5.0.2/css/bootstrap.min.css'); ?>">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<div class="container">
			<div class="my-3 row">
				<div class="container">
					<div class="card shadow-sm border-0">
						<div class="card-body">
							<form action="<?php echo site_url("user/login"); ?>" method="POST" class="form">
								<div class="my-3">
									<label for="" class="form-label"> Your username </label>
									<input type="text" name="username" id="" class="form-control">
								</div>

								<div class="my-3">
									<label for="" class="form-label"> Your password </label>
									<input type="password" class="form-control" name="password">
								</div>

								<div class="my-3">
									<input type="submit" class="btn btn-primary" value="Log in">
								</div>

							</form>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>