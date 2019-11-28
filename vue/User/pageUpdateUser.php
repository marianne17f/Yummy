<main id="profilUpdate">
	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Paramètres de <br><?php echo $user->getFirstName().' '.$user->getLastName() ?></h1>
	    			</div>
	    		</div>
	  		</div>
		</div>
		<div class="photo_profil">
			<img src="<?php echo WEBROOT.'img/'.$user->getPhoto() ?>">
		</div>
	</div>

	<div class="headerText text-center">		
		<h2>Modification du profil</h2>
	</div>
		
	<form action="<?php echo WEBROOT ?>User/updateUser" method="POST" enctype="multipart/form-data" id="formProfil">
			
	

		<label>Photo de profil :<br>
		<input type="file" name="photo" class="input"></label>
		
		<label>Prénom : <br>
		<input type="text" name="firstName" value="<?php echo $user->getFirstName(); ?>" class="input"></label>
		
		<label>Nom : <br>
		<input type="text" name="lastName" value="<?php echo $user->getLastName(); ?>" class="input"></label>
		
		<label>Date de naissance :<br>
		<input type="date" name="age" value="<?php  echo $user->getAge(); ?>" class="input"></label>

		<label>Sexe :<br>
		<select name="sex">
			<option value="" selected disabled="disabled">Sexe</option>
			<option value="homme">Homme</option>
			<option value="femme">Femme</option>
			<option value="autre">Autre</option>
		</select></label>
		
		<label>Code postal + ville : <br>
		<input type="text" name="adresse" placeholder="Entrez votre adresse" value="<?php  echo $user->getAddress(); ?>" class="input"></label>

		<label>Niveau en cuisine : <br>
			<select name="level_cook">
				<option value="" selected disabled="disabled">Je suis ...</option>
				<option value="1">Débutant</option>
				<option value="2">Intermédiaire</option>
				<option value="3">Expert</option>
			</select></label>	

		<label>Email :<br>
			<input type="email" name="email" value="<?php  echo $user->getEmail(); ?>" class="input"></label>
		
		<label>Nouveau mot de passe :<br>
		<input type="password" name="pass1" class="input"></label>	
		
		<label>Confirmer le nouveau mot de passe :<br>
		<input type="password" name="pass2" class="input"></label>

	</form>
	
	<div class="headerText text-center">
		<input type="submit" class="btn btnD1" value="Valider" form="formProfil">	

		<input type="button" class="bouton_valid" value="Annuler" name="bnom" onClick="javascript:history.back();">
	</div>

	<p>Vous songez à nous quitter mais vous n'êtes pas sûr de votre choix ? <a href="<?php echo WEBROOT ?>/User/archive">Mettez votre profil en suspens</a>. Si vous changez d'avis, revenez vers nous.</p>
			
	<p><a href="<?php echo WEBROOT ?>/User/delete">Supprimez définitivement votre profil</a></p>

</main>