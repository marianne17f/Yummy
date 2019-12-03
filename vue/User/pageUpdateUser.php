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
		
	<form action="<?php echo WEBROOT ?>User/updateUser2" method="POST" enctype="multipart/form-data" id="formProfil">
			
	
		<div class="form-group">
			<label>Photo de profil :<br>
				<input type="file" name="photo" class="input">
			</label>
		</div>
		
		<div class="form-group">
			<label>Prénom : <br>
				<input type="text" name="firstName" value="<?php echo htmlspecialchars($user->getFirstName()); ?>" class="input">
			</label>
			<div class="info" id="infoPrenom">
				<?php if (isset ($log1)) 
					{
					 	echo $log1;
					}
				?>
			</div>
		</div>
		
		<div class="form-group">
			<label>Nom : <br>
				<input type="text" name="lastName" value="<?php echo $user->getLastName(); ?>" class="input">
			</label>
			<div class="info" id="infoNom">
				<?php if (isset ($log2)) 
					{
						echo $log2;
					}
				?>
			</div>
		</div>
		
		<div class="form-group">
			<label>Date de naissance :<br>
				<input type="date" name="age" value="<?php  echo $user->getAge(); ?>" class="input">
			</label>
		</div>
		
		<div class="form-group">
			<label>Sexe :<br>
				<select name="sex">
					<option value="" selected disabled="disabled">Sexe</option>
					<option value="homme">Homme</option>
					<option value="femme">Femme</option>
					<option value="autre">Autre</option>
				</select>
			</label>
		</div>
		
		<div class="form-group">
			<label>Code postal + ville : <br>
				<input type="text" name="address" placeholder="Entrez votre adresse" value="<?php  echo $user->getAddress(); ?>" class="input">
			</label>
			<div class="info" id="infoAddress">
				<?php if (isset ($log6)) 
					{
						echo $log6;
					}
				?>
			</div>

		</div>
		
		<div class="form-group">
			<label>Niveau en cuisine : <br>
				<select name="level_cook">
					<option value="" selected disabled="disabled">Je suis ...</option>
					<option value="1">Débutant</option>
					<option value="2">Intermédiaire</option>
					<option value="3">Expert</option>
				</select>
			</label>
		</div>	
		
		<div class="form-group">
			<label>Email :<br>
				<input type="email" name="email" value="<?php  echo $user->getEmail(); ?>" class="input">
			</label>
			<div class="info" id="infoEmail">
				<?php if (isset ($log3)) 
					{
						echo $log3;
					}
				?>
			</div>
		</div>
		
		<div class="form-group">
			<label>Nouveau mot de passe :<br>
				<input type="password" name="pass1" class="input">
			</label>
			<div class="info" id="infoPass1">
				<?php if (isset ($log4)) 
					{
						echo $log4;
					}
				?>
			</div>
		</div>
		
		<div class="form-group">
			<label>Confirmer le nouveau mot de passe :<br>
				<input type="password" name="pass2" class="input">
			</label>
			<div class="info" id="infoPass2">
				<?php if (isset ($log5)) 
					{
						echo $log5;
					}
				?>
			</div>
		</div>

	</form>
	
	<div class="headerText text-center">
		<input type="submit" class="bouton_valid" value="Valider" form="formProfil">	

		<input type="button" class="bouton_valid" value="Annuler" name="bnom" onClick="javascript:history.back();">
	</div>

	<p class="text-center"><a href="<?php echo WEBROOT ?>/User/archive">Mettez votre compte en suspens</a></p>
			
	<p class="text-center"><a href="<?php echo WEBROOT ?>/User/delete">Supprimez définitivement votre compte</a></p>

</main>