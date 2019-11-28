<main id="myAddresses">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Mes bonnes adresses culinaires</h1>
	    				<h2>Créez, modifiez et supprimez vos bonnes adresses culinaires</h2>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>

	<div id="addressesCreated">
 	
		<div class="headerText text-center">
			<a href="<?php echo WEBROOT ?>Address/pageAddAddress/" class="btn btnD1 btn_creation">Créer une nouvelle bonne adresse</a>
		</div>
		

		<div class="container">
			<div class="search">
				<div class="text-box">
					<form action="search.php" method="post">
						<input type="search" name="search" placeholder="Rechercher" minlength="4" spellcheck="true">
						<button><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>

			<div class="row">


		<?php 
	
			if (isset($addresses))
			{
				foreach ($addresses as $key => $address)
				{
		?>

			<div class="col-sm-6">
				<div class="blogpost">
					<div class="imgBx">
						<img src="<?php echo WEBROOT."img/".$address->getImage() ?>" alt="partage de bonnes adresses culinaires" title="adresse culinaire" class="img-fluid">
					</div>
					<div class="fit-content">
						<h3><?php echo $address->getName() ?></h3>
						<p><strong>Description : </strong><?php echo $address->getDescription() ?></p>
						<p><strong>Adresse : </strong><?php echo $address->getAddress() ?></p>
						<p><strong>Horaires : <br></strong><?php echo $address->getSchedul() ?></p>
						<p><strong>Coordonnées : </strong><?php echo $addresse->getPhone() ?><br><?php echo $address->getEmail() ?></p>
						<a href="<?php echo $address->getWebSite() ?>" class="lien_colore margin-bottom">Site Web</a>
						
					</div>
				</div>
			</div>	
				
		<?php			
				}
			}
		 ?>

		</div>
	</div>
</div>

 	

	<div id="addAddress">


		<div id="explicatif_bonneAdresse">
			<div id="text">
				<p>Avec YUMMY !, nous voulons satisfaire les personnes qui visitent notre site internet. Les professionnels de la restauration ont la possibilité de communiquer au sujet de leur activité. Votre publicité s'affichera dans l'onglet "Bonnes Adresses" et sera ainsi accessible aux visiteurs du site.</p>

				<span>Pour 150 € / mois</span>
					<p>Bénéficiez d'une visibilité sur notre site web : tous les visiteurs de YUMMY ! pourront voir votre publicité et créer un événement culinaire via celle-ci.</p> 

				<p>Après l'enregistrement de vos coordonnées bancaires, vous accéderez à la page de création de votre publicité.</p>
			</div>


			<form action="<?php echo WEBROOT ?>Address/addAddress" method="POST" id="formAddress">
			
				<h2>Enregistrement de votre activité professionnelle</h2>
					<div>
						<fieldset>
							<legend>Ses coordonnées</legend>
							<input type="text" name="" placeholder="Nom et prénom du gérant">
							<input type="text" name="" placeholder="Nom de l'entreprise">
							<input type="text" name="" placeholder="Adresse">
							<input type="tel" name="" placeholder="Téléphone">
							<input type="email" namep="" placeholder="Email de l'entreprise">
						</fieldset>

						<fieldset>
							<legend>Sa domiciliation bancaire</legend>
							<input type="text" placeholder="Nom du titulaire">
							<input type="number" placeholder="Code banque">
							<input type="number" placeholder="Code Guichet">
							<input type="number" placeholder="Numéro de compte">
							<input type="number" placeholder="Clé RIB">
						</fieldset>
					</div>

					<label class="legend">Date de prélèvement mensuel :
						<select name="date_prelev">
							<option value="" selected disabled="disabled">Choisir</option>
							<option value="1">5 du mois</option>
							<option value="2">10 du mois</option>
							<option value="3">15 du mois</option>
						</select>
					</label>
					
					<div id="bouton_validation">
						<input type="submit" class="bouton_valid" value="Enregistrer" form="formAddress">	
					</div>
			</form>

		</div>  <!--  /explicatif_bonneAdresse -->



	


	</div>





</main>