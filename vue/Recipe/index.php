<main id="recipe">

	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Nos recettes healthy</h1>
	    				<h2>Créez et partagez vos idées recettes healthy et gourmandes</h2>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>

	
	<div class="blog recipe">
		<div class="container">
		
			<div class="text-center">
				<a href="<?php echo WEBROOT ?>Recipe/pageAddRecipe/" class="btn btnD1 btn_creation">Créer une nouvelle recette</a>		
			</div>	
				
			<div class="search">
				<div class="text-box">
					<form action="search.php" method="post">
						<input type="search" name="search" placeholder="Rechercher" minlength="4" spellcheck="true">
						<button><i class="fa fa-search"></i></button>
					</form>
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
							<img src="<?php echo WEBROOT ?>img/recipe/<?php echo $recipe->getImage() ?>" alt="partage de recettes healthy gourmandes et équilibrées <?php echo $recipe->getName() ?>" title="recette healthy <?php echo $recipe->getName() ?>">
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
</main>


	