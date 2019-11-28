<main id="addAddress">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners" id="home">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Nouvelle bonne adresse culinaire</h1>
	    				
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>

	<div class="container">

		<form action="<?php echo WEBROOT ?>Address/addAddress" method="POST" enctype="multipart/form-data" id="formAddress">
	
 	
		 	<div>
		 		<label>Nom de votre bonne adresse :
			 	<input type="text" name="name"></label>

				<label>Type de bonne adresse : 
					<select name="category">
						<option value="" selected disabled="disabled">Votre activité</option>
						<option value="1">Traiteur</option>
						<option value="2">Restaurant</option>
						<option value="3">Cours de cuisine</option>
					</select></label>
				
				<label>Ajouter une photo illustrant votre activité :
				<input type="file" name="image"></label>
			</div>
			
			<div>
				<label>Horaires d'ouverture :
				<input type="time" name="timer" min="00:00" max="23:59"></label>
				
				<label>Adresse :
				<textarea class="textarea" name="address" ></textarea></label>
				
				<label>Téléphone :
				<input type="tel" name="phone" ></label>
				
				<label>E-mail :
				<input type="email" name="email"></label>
			</div>

			<div>
				<label>Description de votre activité :
				<textarea class="textarea" name="description" required></textarea></label>

				<label>Les internautes du site YUMMY ! bénéficieront-ils d'une offre spéciale s'ils viennent chez vous ?
					<select name="offer_yummy">
						<option value="" selected disabled="disabled">Offre YUMMY ?</option>
						<option value="1">Oui</option>
						<option value="2">Non</option>
					</select></label>
				
				<input type="hidden" name="fk_user" value="<?php echo $_SESSION['id']?>">
			</div>


		</form>

	
		 <div id="bouton_validation">
			<input type="submit" class="bouton_valid" value="Valider" form="formAddress">	

			<input type="button" class="bouton_valid" value="Annuler" name="bnom" onClick="javascript:history.back();">
		</div>
	</div>
</main>
