<main id="address">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-once="true">Nos bonnes adresses culinaires</h1>
	    				<h2 data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000" data-aos-once="true">Inspirez-vous de nos bonnes adresses pour créer une rencontre culinaire </h2>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>

	<div class="blog address">
		<div class="container">

			<div class="text-center">
				<a href="<?php echo WEBROOT ?>Address/pageAddAddress" class="btn btnD1 btn_creation" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-once="true">Créer une nouvelle bonne adresse</a>		
			</div>	

			
			<div id="filtre" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000" data-aos-once="true">
				<label>Activités : <br>
					<select name="category">
						<option value="" selected disabled="disabled">Type</option>
						<option value="1">Traiteur</option>
						<option value="2">Restaurant</option>
						<option value="3">Cours de cuisine</option>
						<option value="4">Offres YUMMY !</option>
						<option value="5">Tous</option>

					</select>
				</label>

				<label>Villes : <br>
					<select name="villes">
						<option value="" selected disabled="disabled">Type</option>
						<option value="1">Béziers</option>
						<option value="2">Montpellier</option>
						<option value="3">Nîmes</option>
						<option value="4">Sète</option>

					</select>
				</label>
			</div>
	

	

			<div class="search" data-aos="fade-up" data-aos-delay="450" data-aos-duration="1000" data-aos-once="true">
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
				
				<div class="col-sm-6" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000" data-aos-once="true">
					<div class="blogpost noir">
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
</main>
