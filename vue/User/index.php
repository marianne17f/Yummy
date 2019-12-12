<main id="tableau_bord">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Tableau de bord de <br><?php echo $user->getFirstName().' '.$user->getLastName() ?></h1>
	    			</div>
	    		</div>
	  		</div>
		</div>
		<div class="photo_profil">
			<img src="<?php echo WEBROOT.'img/'.strip_tags($user->getPhoto()) ?>" alt="Photo de profil de <?php echo strip_tags($user->getFirstName()).' '.strip_tags($user->getLastName())?>" title="Photo de profil de <?php echo strip_tags($user->getFirstName()).' '.strip_tags($user->getLastName())?>">
		</div>
	</div>

	<div id="contenu_profil">
		<div id="menu_profil" class="container">
			
			
			<a href="<?php echo WEBROOT ?>Recipe/myRecipes"><span>Mes recettes</span><img src="<?php echo WEBROOT?>img/kitchen.png" alt="mes recettes créées" title="mes recettes créées"></a>
			
			<a href="<?php echo WEBROOT ?>Event/myEvents">Mes rencontres culinaires<img src="<?php echo WEBROOT ?>img/evenement.png" alt="mes rencontres culinaires créées" title="mes rencontres culinaires créées"></a>

			<a href="<?php echo WEBROOT ?>Address/myAddresses">Mes Bonnes Adresses<img src="<?php echo WEBROOT ?>img/pub.png" alt="mes adresses culinaires créées" title="mes adresses culinaires créées"></a>

			<a href="">Recettes favorites<img class="icone" src="<?php echo WEBROOT ?>img/coeur.png" alt="mes recettes favorites" title="mes recettes favorites"></a>
			
			<a href="">Mon agenda<img src="<?php echo WEBROOT ?>img/agenda.png" alt="mes participations à des événements" title="mes participations à des événements"></a>
			
			<a href="<?php echo WEBROOT ?>User/userView">Paramètres du profil<img src="<?php echo WEBROOT ?>img/outils.png" alt="accès à mes paramètres profil" title="accès à mes paramètres profil"></a>
			

			<?php 

				/*Afficher le sous-menu "administrateur" seulement si utilisateur = Admin */
				if ($user->getRole() === 'admin')
				{
			?>
			
				<a href="<?php echo WEBROOT ?>User/administrateur">Administrateur<img src="<?php echo WEBROOT ?>img/compose.png" alt="admin"></a>	

			<?php		
				}
			?>	
			
		</div>
	</div>
</main>
