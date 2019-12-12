<main id="addEvent">
	<div class="addEvent">

		<div class="conteneur-img">
			<div class="jumbotron jumbotron-fluid heights100p banners">
		  		<div class="container h100">
		    		<div class="contentBox h100">
		    			<div>
		    				<h1>Nouvelle rencontre culinaire</h1>
		    			</div>
		    		</div>
		  		</div>
			</div>
		</div>


		<div class="container form">
	

			 <form action="<?php echo WEBROOT ?>Event/addEvent" method="POST" enctype="multipart/form-data" id="formEvent">
			 	
			 	<div>
				 	<label>Nom de la rencontre * :
				 	<input type="text" name="name" placeholder="Nom de l'événement" required></label>
					
					<label>Ajouter une photo illustrant la rencontre culinaire * :
					<input type="file" name="image" required></label>
					
					<label>Date du rendez-vous * :
					<input type="date" name="dater" required></label>

					<label>Heure du rendez-vous * :
					<input type="time" name="timer" min="00:00" max="23:59" required></label>
				</div>
				
				<div>
					<label>Programme de la rencontre * :
					<textarea class="textarea" name="program" placeholder="Expliquer le déroulement de l'événement" required></textarea></label>
				</div>

				<div>
					<label>Adresse * : 
					<textarea class="textarea" name="address" placeholder="Adresse de l'événement" required></textarea></label>
					
					<label>Nombre de places disponibles à cet événement :
					<input type="number" name="availability"></label>

					<label>Coût de la participation :
					<input type="number" name="cost"></label>
					
					<input type="hidden" name="fk_user" value="<?php echo $_SESSION['id']?>">

				</div>


				

			 </form>

			 <div id="bouton_validation">
				<input type="submit" class="bouton_valid" value="Valider" form="formEvent">	

				<input type="button" class="bouton_valid" value="Annuler" name="bnom" onClick="javascript:history.back();">
			</div>
	
	
		</div>
	</div>
</main>

