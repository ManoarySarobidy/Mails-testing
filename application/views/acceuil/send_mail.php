<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/bootstrap-5.0.2/css/bootstrap.min.css"); ?>">
</head>
<body>
		<div class="container">
			<?php $this->load->view('utilities/header'); ?>
			<div class="container my-3">
				<!-- Okey inona ny manaraka eto
				mamorona page andefasana mail
				izany hoe asiana dropdown afahan'ilay olona misafidy ny olona andefasana mail
				manisy input afahan'ny manoratra an'ilay izy
				 -->
				 <div class="row">
				 	<h4 class="text-center text-decoration-underline"> Send a new mail </h4>
				 	<!-- <div class="coiner"> -->
				 		<div class="card p-3">
				 			<form action="<?php echo site_url('acceuil/send'); ?>" method="POST" class="form">
				 				<div class="my-3">
				 					<label for="" class="form-label"> To : </label>
				 					<select class="form-select" name="user" id="">
				 						<?php
				 							foreach( $users as $user ){ ?>
				 								<option value="<?php echo $user['iduser']; ?>"> 
				 									<?php echo $user['nom']; ?>
				 								</option>
				 						<?php }
				 						?>
				 					</select>
				 				</div>
				 				<div class="my-3">
				 					<label for="" class="form-label"> Your message </label>
				 					<textarea name="contenu" class="form-control" id="" cols="30" rows="5"></textarea>
				 				</div>
				 				<div class="my-3">
				 					<input type="submit" class="btn btn-primary" value="Send Mail">
				 				</div>

				 			</form>
				 		</div>
				 	</div>
				 </div>
			</div>
					<?php $this->load->view('utilities/Footer'); ?>

		<!-- </div> -->
</body>
</html>