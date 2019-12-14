<main id="detail_event">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1><?php echo $event->getName() ?></h1>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>


	<div id="tutos_events">

		<?php
			
			// display "update" and "delete" buttons only if the event'creator is the connected user
			if(isset($_SESSION['id']) && ($_SESSION['id']) == $event->getFk_user() && isset($event))
			{

		?>
		<div class="article">
			<div class="btn_action2">
				<a href="<?php echo WEBROOT ?>Event/pageUpdateEvent/<?php echo $event->getId()?>" class="displayUpdateEvent">Modifier<img class="icone iconesMS" src="<?php echo WEBROOT ?>img/img_site/modifier.png" alt="partage de moments conviviaux lors d'événements culinaires" title="événement culinaire">
				</a>
					<button class="displayDeleteEvent">Supprimer<img class="icone iconesMS" src="<?php echo WEBROOT?>img/img_site/delete.png" alt="partage de moments conviviaux lors d'événements culinaires" title="événement culinaire"></button>
			</div>
		</div>


		<?php
			}
		?>
		
		<?php

			if (isset($event))
			{
		?>

		
		<div class="article">
			<div class="btn_action">
				<img src="<?php echo WEBROOT ?>img/event/<?php echo $event->getImage()?>" alt="Yummy site de partage d'événements culinaires <?php echo $event->getName() ?>" title="événement culinaire <?php echo $event->getName() ?>">
				<table>
					<tr>
						<td><?php echo date("d/m/Y", strtotime($event->getDater()))?></td>
						<td><?php echo date("H:i", strtotime($event->getTimer()))?></td>
					</tr>
					<tr>
						<td colspan="2"><?php echo $event->getAddress()?></td>
					</tr>
					<tr>
						<td colspan="2"><?php echo $event->getCost()?> €</td>
					</tr>
				</table>
			</div>

			<div class="btn_action">
				<p class="program">Programme :</p>
				<p><?php echo $event->getProgram()?></p>
			</div>
			<div class="btn_action">
				<p class="orange">Il reste <?php echo $event->getAvailability()?> places</p>
				<button class="btnD1">Je veux participer !</button>
				
				<p>Participants :</p>
				<?php
					if (isset($party))
					{
						foreach ($party as $key => $user)
						{
				?>

				<p><?php echo $user->getPhoto().' '.$user->getFirstname().''.$user->getLastname() ?></p>

				<?php	
						}
					}
				 ?>
			</div>
		</div>

		<div class="article">	
			<div class="btn_action">
				<h2>Commentaires</h2>
					<form action="<?php echo WEBROOT ?>Event/comment" method="POST">
						
						
						<textarea name="comment" placeholder="Laissez un commentaire"></textarea>
				
							<input type="text" name="fk_user" value="<?php echo $_SESSION['id']?>">
							
							<input type="text" name="fk_event" value="<?php echo $event->getId()?>">

							<input type="time" name="horodate">

						<?php
							if(isset($_SESSION['id']) &&isset($event))
							{
						?>
						<input type="submit" class="bouton_valid" value="Afficher">	
						<?php
							}
						?>

						

					</form>
			</div>
		</div>
		

		<?php 
			if (isset($comment))
			{
		?>



		<?php
			}
		?>


		<?php
			}
		?>




		<?php 
			if (isset($event))
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
		 ?>
		

	</div>

</main>