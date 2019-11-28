


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


	<section id="tutos_events">
		
		<?php

			if (isset($event))
			{
		?>

		<article>
			<div>
				<img src="<?php echo WEBROOT ?>img/<?php echo $event->getImage()?>" alt="photo de profil Yummy site de partage de recettes healthy et d'événements culinaires" title="événement culinaire">
				<table>
					<tr>
						<td><?php echo date("d/m/Y", strtotime($event->getDater()))?></td>
						<td><?php echo date("H:i", strtotime($event->getTimer()))?></td>
					</tr>
					<tr>
						<td colspan="2"><?php echo $event->getAddress()?><button>Voir sur une carte</button></td>
					</tr>
					<tr>
						<td colspan="2"><?php echo $event->getCost()?> €</td>
					</tr>
				</table>
			</div>

			<div>
				<p><B>Programme :</B></p>
				<p><?php echo $event->getProgram()?></p>
			</div>
			<div>
				<button class="orange">Il reste <?php echo $event->getAvailability()?> places</button>
				<button class="btnD1">Je veux participer !</button>
				<p>(nb de participants) participants :</p>
				<p><?php echo WEBROOT.'img/'.$user->getPhoto() ?></p>
				<p><?php echo WEBROOT.'img/'.$user->getFirstName() ?></p>
				<p><?php echo WEBROOT.'img/'.$user->getLastName() ?></p>					
			</div>
		</article>
		
		<?php
			}
		?>


		
		<article>
			<div></div>
			<div>
				<h2>Commentaires</h2>
				<form>
					<textarea name="commentaire" placeholder="Laissez un commentaire"></textarea>
					<input type="submit" class="bouton_valid" value="Afficher">	
				</form>

				

			</div>
			<div></div>
			

		</article>
		

	</section>

</main>