<main id="admin">




	<section class="sec1" id="recipe">
		<div class="container">
			<div class="row">
				<div class="offset-sm-2 col-sm-8">
					<div class="headerText text-center">
						<h1>Admin</h1>	
					</div>	
				</div>
			</div>

			<div class="row">
				
				<?php
					if (isset($recipes))
					{ 
						foreach ($recipes as $key => $recipe)
					{	
				?>

				<div class="col-sm-4">
					<div class="placeBox">
						<div class="imgBx">
							<img src="<?php echo WEBROOT ?>img/<?php echo $recipe->getImage() ?>" alt="" class="img-fluid"> 
						</div>

						<div class="content">
							<h3><?php $recipe->getName() ?><br><span><a href=""><img class="like" title="Mettre en favoris" src="<?php echo WEBROOT ?>img/yummylike.png"></a></span></h3>
						</div>
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
						<a href="<?php WEBROOT ?>Recipe/detail/<?php $recipe->getId() ?>"><button class="police">YUMMY ?</button></a>
					</div>
				</div>
				<?php
						}
					}
				?>
			</div>
		</div>
		
	</section>

	<section class="blog" id="event">
		
		<div class="container">
			<div class="row">
				<div class="offset-sm-2 col-sm-8">
					<div class="headerText text-center">
						<h2>Toutes les rencontres</h2>

					
					</div>
				</div>
			</div>
			<div class="row">
				<div class="team-area">
				<?php 
			
					if (isset($events))
					{
						foreach ($events as $key => $event)
						{
				?>
			
			
				<div class="single-team">
					<a href="<?php echo WEBROOT ?>Event/detail/<?php echo $event->getId()?>">
						<img src="<?php echo WEBROOT ?>img/<?php echo $event->getImage() ?>" alt="événements culinaires" title="événements culinaires">
							<div class="team-text">
								<h2><?php echo $event->getName() ?></h2>
								<div class="para">
									<p><?php echo $event->getAvailability() ?> participants</p>
									
									<p><?php echo date("d/m/Y", strtotime($event->getDater()))?></p>
									<p><?php echo date("H:i", strtotime($event->getTimer()))?></p>

								</div>
							</div>		
					</a>
				</div>
					
					

				
			<?php

				}
			}
		 	?>
				



			</div>
		</div>
			 	
	</section>



	<section class="blog" id="address">
		
		<div class="container">
			<div class="row">
				<div class="offset-sm-2 col-sm-8">
					<div class="headerText text-center">
						<h2>Toutes les bonnes adresses</h2>
					</div>
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
							<img src="<?php echo WEBROOT."img/".$address->getImage() ?>" alt="partage de adresses culinaires" title="adresses culinaires" class="img-fluid">
						</div>
						<div class="fit-content">
							<h3><?php echo $address->getName() ?></h3>
							<p><strong>Description : </strong><?php echo $address->getDescription() ?></p>
							<p><strong>Adresse : </strong><?php echo $address->getAddress() ?></p>
							<p><strong>Horaires : <br></strong><?php echo $address->getSchedul() ?></p>
							<p><strong>Coordonnées : </strong><?php echo $address->getPhone() ?><br><?php echo $address->getEmail() ?></p>
							<p><strong>Site web : </strong><a href=""><?php echo $address->getWebSite() ?></a></p>
						</div>
					</div>
				</div>	

				<?php 
					}
				}
				?>	
	
			</div>
		</div>
	</section>
</main>