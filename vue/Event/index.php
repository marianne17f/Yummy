<main id="event">
	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Nos rencontres culinaires</h1>
	    				<h2>Participez et rencontrez les Yummiers lors de rencontres culinaires</h2>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>

	<div class="blog event">
		<div class="container">
			<div class="text-center">

				<a href="<?php echo WEBROOT ?>Event/pageAddEvent/" class="btn btnD1 btn_creation">Créer une nouvelle rencontre culinaire</a>
				
			</div>

			<div class="search">
				<div class="text-box">
					<form action="<?php echo WEBROOT ?>core/search.php" method="post">
						<input type="search" name="search" placeholder="Rechercher" minlength="2" spellcheck="true" class="search">
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

						<a href="<?php echo WEBROOT ?>Event/detail/<?php echo $event->getId()?>" class="single-team">
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

				<?php	
						}
					}
				 ?>

				</div>
			</div>
		</div>
	</div>
</main>








	





