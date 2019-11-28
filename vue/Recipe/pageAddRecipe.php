<main id="addRecipe">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Nouvelle recette</h1>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>
	
	<div class="container">

		 <form action="<?php echo WEBROOT ?>Recipe/addRecipe" method="POST" enctype="multipart/form-data" id="formRecipe">
		 	
		 	<div>
		 		<label>Intitulé de la recette : 	
			 	<input type="text" name="name" placeholder="Nom de la recette"></label>
				
				<label>Ajouter une photo illustrant la recette :
				<input type="file" name="image"></label>
				
				<label>Temps de préparation:
				<input type="varchar" name="preparation_time" placeholder="ex : 15min ou 1h10"></label>

				<label>Temps de cuisson:
				<input type="varchar" name="cooking_time" placeholder="ex : 15min ou 1h10"></label>
				
				<label>nombre de personnes :
				<input type="number" name="party" min="1"></label>
				
				<label>Niveau de difficulté :
				<select name="level">
					<option value="" selected disabled="disabled">Niveau</option>
					<option value="1">Facile</option>
					<option value="2">Intermédiaire</option>
					<option value="3">Difficile</option>
				</select></label>
				
			</div>
			
			<div>
				<label>Etapes :
				<textarea class="textarea" name="description" placeholder="Expliquer le déroulement de la recette" required></textarea></label>
				
				<button class="step_button">Ajouter une étape </button>
			</div>


			<div>
				<label>Ingrédients :
				<textarea class="textarea" name="ingredient" placeholder="Liste des ingrédients"></textarea></label>
			
			<input type="hidden" name="fk_user" value="<?php echo $_SESSION['id']?>">	
				
			</div>
			

		 </form>

		 <div id="bouton_validation">
			<input type="submit" class="bouton_valid" value="Valider" form="formRecipe">	

			<input type="button" class="bouton_valid" value="Annuler" name="bnom" onClick="javascript:history.back();">
		</div>

	</div>
</main>