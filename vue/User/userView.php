<main id="profil">

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
			<img src="<?php echo WEBROOT.'img/'.$user->getPhoto() ?>" alt="ma photo de profil" title="ma photo de profil">
		</div>
	</div>
			
	<div id="profilView">

		<?php 	

			if (isset($user))
			{
		?>

	
		<div id="presentation_profil" class="relative">
			<img src="<?php echo WEBROOT?>img/orange.png" class="absolute img1" alt="alimentation saine">
			<img src="<?php echo WEBROOT?>img/onion-1.png" class="absolute img2" alt="alimentation saine">

			
			
			<div>
				<p><?php echo $user->getFirstName().' '.$user->getLastName() ?></p>
				<p><?php echo date("d/m/Y", strtotime($user->getAge()))?> -
			
				<?php
					switch($user->getSex())
					{
						case "homme":
							echo 'Homme</p>';
							break;
						case "femme":
							echo ' Femme</p>';
							break;
						case "autre":
							echo ' Autre</p>';
							break;
					}

					echo '<p>'.$user->getAddress().'</p>';
					switch($user->getLevel_cook())
					{
						case 1:
							echo '<p>Cuisine : Niveau débutant</p>';
							break;
						case 2:
							echo '<p>Cuisine : Niveau intermédiaire</p>';
							break;
						case 3:
							echo '<p>Cuisine : Niveau expert</p>';
							break;
					}
				?>
				
				<p><?php echo $user->getEmail() ?></p>

			</div>

			<div id="bouton_validation">
				<a href="<?php echo WEBROOT ?>User/pageUpdateUser"class="btn btnD1">Modifier</a>
			</div>
		</div>
	

	<?php
		}
	 ?>
	

	</div>	
</main>