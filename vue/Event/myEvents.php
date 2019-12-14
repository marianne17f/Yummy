<main id="my_events">
	
	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Mes rencontres culinaires</h1>
	    				<h2>Créez, modifiez et supprimez vos rencontres culinaires</h2>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>

	
	
 	<div id="eventsCreated" class="container">
		
		<div class="blog" id="event">
			
			<div class="text-center">
				<a href="<?php echo WEBROOT ?>Event/pageAddEvent/" class="btn btnD1 btn_creation">Créer une nouvelle rencontre culinaire</a>
			</div>

			<div class="search">
				<div class="text-box">
					<form action="search.php" method="post">
						<input type="search" name="search" placeholder="Rechercher" minlength="4" spellcheck="true">
						<button><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
		
				
			<div class="container-area">

				<div class="team-area">


				<?php 
					if (isset($events1))
					{
						foreach ($events1 as $key => $event)
						{
				?>
					<div class="conteneurEvent">
						<div class="single-team">
							<a href="<?php echo WEBROOT ?>Event/detail/<?php echo $event->getId()?>">
							<img src="<?php echo WEBROOT ?>img/event/<?php echo $event->getImage() ?>" alt="partage de moments conviviaux avec <?php echo $event->getName() ?>" title="événement culinaire <?php echo $event->getName() ?>">
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

						<div class="boutons_action">
							<a href="<?php echo WEBROOT ?>Event/pageUpdateEvent/<?php echo $event->getId()?>" class="displayUpdateEvent">
								Modifier<img class="icone iconesMS" src="<?php echo WEBROOT ?>img/img_site/modifier.png" alt="partage de moments conviviaux lors d'événements culinaires" title="événement culinaire">
							</a>
								<button class="displayDeleteEvent">Supprimer<img class="icone iconesMS" src="<?php echo WEBROOT?>img/img_site/delete.png" alt="partage de moments conviviaux lors d'événements culinaires" title="événement culinaire"></button>
						</div>
					</div>	

				<?php
						}
					}
				 ?>
				 
				</div>
			</div>

			
			<h2 class="text-center">Rencontres culinaires en attente de validation</h2>

			<div class="container-area">
				<div class="team-area">

					<?php 
					if (isset($events0))
					{
						foreach ($events0 as $key => $event)
						{
				?>
					<div class="conteneurEvent">
						<div class="single-team">
							<a href="<?php echo WEBROOT ?>Event/detail/<?php echo $event->getId()?>">
							<img src="<?php echo WEBROOT ?>img/event/<?php echo $event->getImage() ?>" alt="partage de moments conviviaux avec <?php echo $event->getName() ?>" title="événement culinaire <?php echo $event->getName() ?>">
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

						<div class="boutons_action">
							<a href="<?php echo WEBROOT ?>Event/pageUpdateEvent/<?php echo $event->getId()?>" class="displayUpdateEvent">
								Modifier<img class="icone iconesMS" src="<?php echo WEBROOT ?>img/img_site/modifier.png" alt="partage de moments conviviaux lors d'événements culinaires" title="événement culinaire">
							</a>
								<button class="displayDeleteEvent">Supprimer<img class="icone iconesMS" src="<?php echo WEBROOT?>img/img_site/delete.png" alt="partage de moments conviviaux lors d'événements culinaires" title="événement culinaire"></button>
						</div>
					</div>	

				<?php
						}
					}
					else
					{
						echo '<p>Aucune rencontre culinaire en attente de validation</p>';
					}
				 ?>
				 
				</div>
			</div>



		</div>

	</div>
	

	

		<?php 

		// display window "deleteEvent" for created and unvalidated events)
		if (isset($events0))
		{
			foreach ($events0 as $key => $event)
			{
	?>

	<div id="deleteEvent">
		<p>Valider la suppression ?</p>
		<div class="bouton_horizontal">
			<a href="<?php echo WEBROOT ?>/Event/archive/<?php echo $event->getId();?>" class="validDeleteEvent">OUI</a>
			<button class="cancelDeleteEvent">NON</button>
		</div>
	</div>
	
	<?php
			}
		}
	 ?>


	
	<?php 

		// display window "deleteEvent" for created and validated events)
		if (isset($events1))
		{
			foreach ($events1 as $key => $event)
			{
	?>

	<div id="deleteEvent">
		<p>Valider la suppression ?</p>
		<div class="bouton_horizontal">
			<a href="<?php echo WEBROOT ?>/Event/archive/<?php echo $event->getId();?>" class="validDeleteEvent">OUI</a>
			<button class="cancelDeleteEvent">NON</button>
		</div>
	</div>
	
	<?php
			}
		}
	 ?>


</main>
