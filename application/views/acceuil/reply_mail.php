<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/bootstrap-5.0.2/css/bootstrap.min.css"); ?>">
	<title>See Content</title>
</head>
<body>

	<div class="container">
		<?php $this->load->view('utilities/header'); ?>
		<div class="container my-3">
			<!-- inona ny atao eto
			atao daholo izay azo atao
			alaina ilay mail de apoitra hoe avy aiza ilay izy
			rehefa avy eo de apoitra ilay contenu an'ilay mail
			 -->
			<div class="card container">
				<div class="card-body">
					<div class="row">
						<?php 
							if( count( $mails ) > 0 ){
								foreach( $mails as $mail ){ ?>
								<div class="card original-mail">
									<div class="card-title">
										<p>
											From : <?php echo $mail['receiver']; ?>
										</p>
									</div>
									<div class="card-body text-secondary">
										<span class=" text-dark text-decoration-underline">
											Contenu :
										</span>
										<?php echo $mail['contenu']; ?>
									</div>
								</div>

							<?php	}
							}
						?>
						<div class="row">
							<form action="<?php echo site_url('acceuil/reply'); ?>" method="POST" class="form">
								<div class="my-3">
									<label for=""> To : </label>
									<input type="text" class="form-control" disabled value="<?php echo $mails[0]['receiver']; ?>">
									<input type="hidden" name="receiver" value="<?php echo $mails[0]['idreceiver']; ?>">
								</div>
								<div class="my-3">
									<label for="" class="form-label"> Ton message : </label>
									<textarea name="contenu" class="form-control" id="" cols="30" rows="5" placeholder="Your message ... ">

									</textarea>
								</div>
								<div class="my-3">
									<input type="submit" value="Reply" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
				<?php $this->load->view('utilities/Footer'); ?>

	</div>
	
</body>
</html>