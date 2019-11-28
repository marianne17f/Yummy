<main id="home">
	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid height100p banner" id="returnHome">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>	
		    			<div>
							<a href="#returnHome"><img src="<?php echo WEBROOT ?>img/yummylike.png" class="big_logo" alt="logo Yummy site de partage entre passionnés de cuisine healthy" title="rencontres culinaires et recettes healthy"></a>
							<h1>YUMMY !</h1>	
						</div>
	    				<h2>Partage de recettes gourmandes et de moments culinaires axés sur le thème de la cuisine healthy</h2>
						
						<?php 
							if (!isset($_SESSION['id']))
							{
						?>

						<div>
							<a href="<?php echo WEBROOT?>User/pageLogIn" class="btn btnD2 btn_connexion">Se connecter</a>
	    					<a href="<?php echo WEBROOT?>User/pageSignUp" class="btn btnD2 btn_connexion">S'inscrire</a>
						</div>
	    				<?php
							}
						 ?>	
	    			</div>

	    		</div>
	  		</div>
		</div>
	</div>


	<div class="blog recipe">
		<div class="container">
			<div class="row">
				<div class="offset-sm-2 col-sm-8">
					<div class="headerText text-center">
						<h2>Tutos recettes healthy du moment</h2>	
					</div>	
				</div>
			</div>

			<div class="row">
				<div class="text_descriptif">
			 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla assumenda, maiores, est quis libero modi dolorem at tempore nesciunt. Consectetur minus explicabo reprehenderit unde eaque quibusdam nemo alias sunt, rerum.</p>

				 	<div id="btn_recipe">
						<a href="<?php echo WEBROOT ?>Recipe/index" class="btnD3">Voir toutes les recettes<img src="<?php echo WEBROOT ?>img/lien-animated.png" alt="Rencontres culinaires et partage d'idées recettes healthy et gourmandes" title="recettes healthy" class="btn_recipe"></a>
					</div>
				</div>


				<div class="row">
					<div class="team-area">
				
				<?php
					if (isset($recipes))
					{ 
						$i = 0;
						foreach ($recipes as $key => $recipe)

						{	
				?>

						<div class="single-team">
							<a href="<?php echo WEBROOT ?>Recipe/detail/<?php echo $recipe->getId()?>">
								<img src="<?php echo WEBROOT ?>img/<?php echo $recipe->getImage() ?>" alt="Rencontres culinaires et partage d'idées recettes healthy" title="idées recettes healthy">
									<div class="team-text">
										<h2><?php echo $recipe->getName() ?></h2>
										<div class="para">

											<?php switch($recipe->getLevel())
												{
													case 1:
														echo '<span>Débutant</span>';
														break;
													case 2:
														echo '<span>Intermédiaire</span>';
														break;
													case 3:
														echo '<span>Confirmé</span>';
														break;
												} 
											?>

										</div>
									</div>		
							</a>
						</div>

						<?php
								if (++$i == 2) break;	
								}
							}
					 	?>

					</div>
				</div>
			</div>
		</div>
	</div>

				
			

	<div class="blog event">
		<img class="img_fond" src="<?php echo WEBROOT ?>img/delimiteur.png" alt="Rencontres culinaires et partage d'idées recettes healthy et gourmandes" title="rencontres culinaires">
		<div class="container">
			<div class="row">
				<div class="offset-sm-2 col-sm-8">
					<div class="headerText text-center">
						<h2>Rencontres culinaires du moment</h2>

					
					</div>
				</div>
			</div>
			<div class="row">
				<div class="team-area">



				<?php 
			
					if (isset($events))
					{
						$i = 0;
						foreach ($events as $key => $event)
						{
				?>
						
					<div class="single-team">
						<a href="<?php echo WEBROOT ?>Event/detail/<?php echo $event->getId()?>">
							<img src="<?php echo WEBROOT ?>img/<?php echo $event->getImage() ?>" alt="Rencontres culinaires et partage d'idées recettes healthy et gourmandes" title="rencontres culinaires">
								<div class="team-text">
									<h2><?php echo $event->getName() ?></h2>
									<div class="para">
										<p><?php echo $event->getAvailability() ?> participants</p>
										
										<p>Le <?php echo date("d/m/Y", strtotime($event->getDater()))?></p>
										<p>À <?php echo date("H:i", strtotime($event->getTimer()))?></p>

									</div>
								</div>		
						</a>
					</div>
				
				<?php
						if (++$i == 2) break;	
						}
					}
			 	?>
				
				 	
				 	<div class="text_descriptif">
				 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla assumenda, maiores, est quis libero modi dolorem at tempore nesciunt. Consectetur minus explicabo reprehenderit unde eaque quibusdam nemo alias sunt, rerum.</p>

					 	<div id="btn_event">
							<a href="<?php echo WEBROOT ?>Event/index" class="btnD3">Voir toutes les rencontres<img src="<?php echo WEBROOT ?>img/lien-animated.png" alt="Rencontres culinaires et partage d'idées recettes healthy et gourmandes" class="btn_event" title="rencontres culinaires"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
			 	
	</div>



	<div class="blog address">
		<img class="img_fond2" src="<?php echo WEBROOT ?>img/img_fond3.png" alt="Rencontres culinaires et partage d'idées recettes healthy et gourmandes" title="adresses culinaires">
		<div class="container">
			<div class="row">
				<div class="offset-sm-2 col-sm-8">
					<div class="headerText text-center">
						<h2>Nos bonnes adresses</h2>
					</div>
				</div>
			</div>
			<div class="row"> 
				<div class="text_descriptif">
			 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla assumenda, maiores, est quis libero modi dolorem at tempore nesciunt. Consectetur minus explicabo reprehenderit unde eaque quibusdam nemo alias sunt, rerum.</p>
					
					 <p><a href="<?php echo WEBROOT ?>Contact/index" class="lien_contact">Demande de renseignements</a></p>
			 		

			 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla assumenda, maiores, est quis libero modi dolorem at tempore nesciunt. Consectetur minus explicabo reprehenderit unde eaque quibusdam nemo alias sunt, rerum.</p>
				 	
				 	<div id="btn_address">
						<a href="<?php echo WEBROOT ?>Address/index" class="btnD3">Voir toutes les bonnes adresses<img src="<?php echo WEBROOT ?>img/lien-animated.png" alt="Rencontres culinaires et partage d'idées recettes healthy et gourmandes" title="adresses culinaires" class="btn_address"></a>
					</div>
				</div>
			
				<?php 
						if (isset($adresses))
						{
							$i = 0;
							foreach ($adresses as $key => $adresse)
						{
					?>

				<div class="col-sm-6">
					<div class="blogpost">
						<div class="imgBx">
							<img src="<?php echo WEBROOT."img/".$address->getImage() ?>" alt="Rencontres culinaires et partage d'idées recettes healthy et gourmandes" title="adresses culinaires" class="img-fluid">
						</div>
						<div class="fit-content">
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
										echo '<a href="'.$address->getWebSite().'" class="lien_colore margin-bottom">Site Web</a>';
									}
								?>
						</div>
					</div>
				</div>	

				<?php 
						if (++$i == 1) break;
						}
					}
				?>	
	
			</div>
		</div>
	</div>
</main>