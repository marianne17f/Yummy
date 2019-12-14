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
 	
		<div class="text-center">
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
							<img src="<?php echo WEBROOT."img/address/".$address->getImage() ?>" alt="partage de bonnes adresses culinaires <?php echo $address->getName() ?>" title="adresse culinaire <?php echo $address->getName() ?>" class="img-fluid">
						</div>
						<div class="content">
							<h3><?php echo $address->getName() ?></h3>

								<?php 

									if (!empty($address->getDescription()) )
									{
										echo '<p><B>Description : </B>'.$address->getDescription().'</p>';
									}

									else
									{
										echo '<p><B>Description : </B>Pas indiqué</p>';
									}
								?>


								<?php 

									if (!empty($address->getAddress()) )
									{
										echo '<p><B>Adresse : </B>'.$address->getAddress().'</p>';
									}

									else
									{
										echo '<p><B>Adresse : </B>Pas indiqué</p>';
									}
								?>



								<?php 

									$scheduleData = $address->getSchedul();
									$schedule = explode('%', $scheduleData);

									if (!empty($address->getSchedul()))
									{

										echo '<p><B>Horaires : </B><br>';

										foreach( $schedule as $value )
										{
  											echo $value . '<br>';
										}

										echo '</p>';
									}



									else
									{
										echo '<p><B>Horaires : </B>Pas indiqué</p>';
									}
								?>


								<?php 

									if (!empty($address->getPhone()) )
									{
										echo '<p><B>Téléphone : </B>'.$address->getPhone().'</p>';
									}

									else
									{
										echo '<p><B>Téléphone : </B>Pas indiqué</p>';
									}
								?>




								<?php 

									if (!empty($address->getEmail()) )
									{
										echo '<p><B>Email : </B>'.$address->getEmail().'</p>';
									}

									else
									{
										echo '<p><B>Email : </B>Pas indiqué</p>';
									}
								?>


								<?php 

									if (!empty($address->getWebSite()) )
									{
										echo '<a href="'.$address->getWebSite().'" class="lien_colore">Site Web</a>';
									}
								?>

							<a href="<?php echo WEBROOT ?>Event/pageAddEvent/" class="btn btnD1">Créer une rencontre culinaire chez <br><?php echo $address->getName() ?></a>
						</div>
					</div>
				</div>	
				<?php 
					}}
				?>		
			



		

			</div>
		</div>
	</div>

 	

	<div id="addAddress" class="container">


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
							<legend>Coordonnées</legend>
							<input type="text" name="director" placeholder="Nom et prénom du gérant">
							<input type="text" name="company" placeholder="Nom de l'entreprise">
							<input type="text" name="address" placeholder="Adresse">
							<input type="tel" name="phone" placeholder="Téléphone">
							<input type="email" name="email" placeholder="Email de l'entreprise">
						</fieldset>
					</div>
					<div>
						<fieldset>
							<legend>Domiciliation bancaire</legend>
							<input type="text" name="cbowner" placeholder="Nom du titulaire">
							<input type="number" name="bankcode" placeholder="Code banque">
							<input type="number" name="sortcode" placeholder="Code Guichet">
							<input type="number" name="accountnumber" placeholder="Numéro de compte">
							<input type="number" name="ribkey" placeholder="Clé RIB">
						</fieldset>
					</div>
						
					<fieldset>
						<legend>Date de prélèvement mensuel</legend>
						<select name="date_prelev">
							<option value="" selected disabled="disabled">Choisir</option>
							<option value="1">5 du mois</option>
							<option value="2">10 du mois</option>
							<option value="3">15 du mois</option>
						</select>
					</fieldset>
					
					
					<div id="bouton_validation">
						<input type="submit" class="bouton_valid" value="Enregistrer" form="formAddress">	
					</div>
			</form>

		</div> 



	


	</div>





</main>