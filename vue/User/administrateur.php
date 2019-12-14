<main id="admin">
	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Administrateur</h1>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>



	<div class="blog event">
		<div class="container">
			<div class="text-center">
				<h2>Rencontres culinaires en attente de validation</h2>
			</div>
			
			<div class="container-area">
				<div class="team-area">

				<?php 	
					if (isset($events))
					{
						foreach ($events as $key => $event)
						{
				?>

					<div class="single-team">
						<a href="<?php echo WEBROOT ?>Event/detail/<?php echo $event->getId()?>">
		
							<img src="<?php echo WEBROOT ?>img/event/<?php echo $event->getImage() ?>" alt="partage lors d'événements culinaires <?php echo $event->getName() ?>" title="événement culinaire <?php echo $event->getName() ?>">
								
							<div class="team-text">
								<h2><?php echo $event->getName() ?></h2>
								<div class="para">
									<p><?php echo $event->getAvailability() ?> participants</p>

									<p>Le <?php echo date("d/m/Y", strtotime($event->getDater()))?></p>
									<p>À <?php echo date("H:i", strtotime($event->getTimer()))?></p>
									
								</div>
							</div>	

						</a>	
					</div>
					<p class="text-center"><a href="<?php echo WEBROOT ?>/Event/validation/<?php echo $event->getId()?>">Mettre en ligne</a></p>

				<?php	
						}
					}
				 ?>

				</div>
			</div>
		</div>
	</div>
</main>