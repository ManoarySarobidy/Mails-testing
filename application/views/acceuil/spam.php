<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap-5.0.2/css/bootstrap.min.css') ?>">
	<title>Document</title>
</head>
<body>
	
	<div class="container">
				<?php $this->load->view('utilities/header'); ?>

			<div class="container my-3">

				<!-- Mail container -->
				<?php 
					if( count($spams) > 0 ){ ?>
						<h4 class="text-center text-decoration-underline">
							Tous les mails que vous avez recus :
						</h4>
						<div class="row my-3">
							 	<div class="card list-send-mails">
							 		<div class="card-body">
						<?php 

						foreach( $spams as $mail ){ ?>
							 			<div class="row my-3">
							 				<!-- omena titre oe iza no nandefa -->
							 				<div class="card p-3">
							 					<div class="card-title my-3">
							 						<p class="to">
							 							To : <?php echo $mail['sender']; ?>
							 						</p>
							 					</div>
							 					<div class="card-body">
							 						<u>Contenu : </u>
							 						<span class="text-secondary">
							 								<?php echo $mail['contenu']; ?>
							 						</span>
							 					</div>
							 					<div class="card-footer">
							 						<div class="row d-flex">
							 							<!-- <div class="col">
							 								<a href="<?php echo site_url('acceuil/see/'.$mail['idmail']); ?>" class="btn btn-primary"> Reply </a>
							 							</div> -->
							 							<div class="col">
							 								<a href="<?php echo site_url('acceuil/remove_from_span/'.$mail['idmail']); ?>" class="btn btn-success"> Not Spam </a>
							 							</div>
							 							<!-- <div class="col">
							 								<a href="<?php echo site_url('acceuil/move_to_span/'.$mail['idmail']); ?>" class="btn btn-danger"> Spam </a>
							 							</div> -->
							 						</div>
							 					</div>
							 				</div>
							 			</div>
						<?php }
						?>
							 		</div>
							 	</div>
							 </div>
				<?php }
					else{ ?>
						<div class="row my-3 text-secondary text-center">
							<p class="text-center">
								Aucun spam Reçu.
							</p>
						</div>
					<?php }

					$this->load->view('utilities/Footer');

				?>


			</div>
		</div>
</body>
</html>