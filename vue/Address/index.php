<main id="address">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners" id="home">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Nos bonnes adresses culinaires</h1>
	    				<h2>Inspirez-vous de nos bonnes adresses pour créer une rencontre culinaire </h2>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>

	<div class="blog" id="address">
		<div class="container">

			<div class="headerText text-center">
				<a href="<?php echo WEBROOT ?>Address/pageAddAddress" class="btn btnD1 btn_creation">Créer une nouvelle bonne adresse</a>		
			</div>	

			<div id="filtres" class="container">
				<button class="btnVert">Offres YUMMY !</button>
			</div>

			<label>Activités : 
				<select name="category">
					<option value="" selected disabled="disabled">Type</option>
					<option value="1">Traiteur</option>
					<option value="2">Restaurant</option>
					<option value="3">Cours de cuisine</option>
					<option value="4">Offres YUMMY !</option>
					<option value="5">Tous</option>

				</select></label>

				<label>Villes : 
				<select name="villes">
					<option value="" selected disabled="disabled">Type</option>
					<option value="1">Béziers</option>
					<option value="2">Montpellier</option>
					<option value="3">Nîmes</option>
					<option value="4">Sète</option>

				</select></label>
	

	

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

							<a href="<?php echo WEBROOT ?>Address/pageAddEvent/" class="btn btnD1">Créer une rencontre culinaire chez <br><?php echo $address->getName() ?></a>
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
