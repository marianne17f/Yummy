<main id="suiteInscription">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid height100p banner" id="home">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div class="centrer_form">
	

						<form action="<?php echo WEBROOT ?>User/addInfoUser" method="POST" enctype="multipart/form-data">

							<h1 class="headerText text-center">Terminer l'inscription</h1>

							<div class="form-group">
								<label>Ajouter une photo :
								<input type="file" name="photo"></label>
							</div>
							
							<div class="form-group">
								<label>Date de naissance :
								<input type="date" name="age" min=0 max=115 placeholder="Date de naissance" class="form-control"></label>
							</div>
							
							<div class="form-group">
								<label>Sexe :
								<select name="sex" class="form-control">
									<option value="" selected disabled="disabled">Sexe</option>
									<option value="homme">Homme</option>
									<option value="femme">Femme</option>
									<option value="autre">Autre</option>
								</select></label>
							</div>	
							
							<div class="form-group">
								<label>Code postal + ville :
								<input type="text" name="address" placeholder="ex: 34200 Sète" class="form-control"></label>
								<div class="info" id="infoAddress">
								</div>
							</div>	
							
							<div class="form-group">
								<label>Niveau en cuisine :
								<select name="level_cook" class="form-control">
									<option value="" selected disabled="disabled">Je suis ...</option>
									<option value="1">Débutant</option>
									<option value="2">Intermédiaire</option>
									<option value="3">Expert</option>
								</select></label>
							</div>	
							
							<p>Vous pourrez remplir les  champs plus tard.<br>Cliquez sur "Valider" pour confirmer l'inscription.</p>
							<div id="bouton_validation">
								<input class="bouton_valid" type="submit" value="Valider">
							</div>

						</form>






		
					
	    				
	    			</div>

	    		</div>
	  		</div>
		</div>
	</div>







	
</main>
