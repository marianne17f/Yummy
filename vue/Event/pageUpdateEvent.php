<main id="updateEvent">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Modifier<br> "<?php echo $event->getName(); ?>"</h1>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>


	<div class="container form">

		<form action="<?php echo WEBROOT ?>Event/updateEvent/" method="POST" enctype="multipart/form-data" id="formEvent">
		 	
		 	<div>
			 	<label>Nom l'événement :
			 	<input type="text" name="name" value="<?php echo $event->getName(); ?>"></label>
				
				
				<label>Photo illustrant l'événement culinaire :
				<div class = "contener_img">
					<img src="<?php echo WEBROOT ?>/img/<?php echo $event->getImage(); ?>" alt="partage lors d'événements culinaires <?php echo $event->getName(); ?>" title="événement culinaire <?php echo $event->getName(); ?>">
				</div>
				<input type="file" name="image"></label>
			</div>
			
			<div>
				<label>Programme de l'événement :
				<textarea class="textarea" name="program" placeholder="Expliquer le déroulement de l'événement" required><?php echo $event->getProgram(); ?></textarea></label>
			</div>

			<div>
				<label>Adresse : 
				<textarea class="textarea" name="address" placeholder="Adresse de l'événement"><?php echo $event->getAddress(); ?></textarea></label>
				
				<label>Date du rendez-vous :
				<input type="date" name="dater" value="<?php echo $event->getDater(); ?>"></label>

				<label>Heure du rendez-vous :
				<input type="time" name="timer" min="00:00" max="23:59" value="<?php echo $event->getTimer(); ?>"></label>

				<label>Nombre de places disponibles :
				<input type="number" name="availability" value="<?php echo $event->getAvailability(); ?>"></label>

				<label>Coût de la participation :
				<input type="number" name="cost" value="<?php echo $event->getCost(); ?>"></label>


				<input type="hidden" name="eventId" value="<?php echo $event->getId()?>">
				
				<input type="hidden" name="fk_user" value="<?php echo $_SESSION['id']?>">

			</div>


		
		</form>

		<div id="text-center">
			<input type="submit" class="bouton_valid" value="Valider" form="formEvent">	

			<input type="button" class="bouton_valid" value="Annuler" name="bnom" onClick="javascript:history.back();">
		</div>

	</div>
</main>