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
			
			<div class="headerText text-center">
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
					if (isset($events))
					{
						foreach ($events as $key => $event)
						{
				?>
					<div class="conteneurEvent">
						<div class="single-team">
							<a href="<?php echo WEBROOT ?>Event/detail/<?php echo $event->getId()?>">
							<img src="<?php echo WEBROOT ?>img/<?php echo $event->getImage() ?>" alt="partage de moments conviviaux lors d'événements culinaires" title="événement culinaire">
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

						<div class="boutons_valid_annul">
							<a href="<?php echo WEBROOT ?>Event/pageUpdateEvent/<?php echo $event->getId()?>">
								<button class="displayUpdateEvent">Modifier<img class="icone iconesMS" src="<?php echo WEBROOT ?>img/modifier.png" alt="partage de moments conviviaux lors d'événements culinaires" title="événement culinaire"></button>
							</a>
								<button class="displayDeleteEvent">Supprimer<img class="icone iconesMS" src="<?php echo WEBROOT?>img/delete.png" alt="partage de moments conviviaux lors d'événements culinaires" title="événement culinaire"></button>
						</div>
					</div>	

				<?php
						}
					}
				 ?>
				 
				</div>
			</div>
		</div>

	</div>



	
	<?php 
		if (isset($events))
		{
			foreach ($events as $key => $event)
			{
	?>

	<div id="deleteEvent">
		<div class="deleteEvent">
			<p>Valider la suppression ?</p>
			<div class="bouton_horizontal">
				<a href="<?php echo WEBROOT ?>/Event/archive/<?php echo $event->getId();?>"><button class="validDeleteEvent">OUI</button></a>
				<button class="cancelDeleteEvent">NON</button>
			</div>
		</div>
	</div>
	
	<?php
			}
		}
	 ?>


</main>
