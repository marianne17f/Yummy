<main id="detail_recipe">


	<section id="tutos_recipes">
		
		<?php

			if (isset($recipe))
			{
				echo '<article>';
				echo '<h1>'.$recipe->getName().'</h1>';
				echo '<img src="'.WEBROOT.'img/'.$recipe->getImage().'" alt="partage de recettes healthy gourmandes et équilibrées" title="recette healthy">';
				echo '<p>'.$recipe->getCooking_time().'</p>';
				echo '<p>'.$recipe->getPreparation_time().'</p>';
				echo '<p>'.$recipe->getNb_people().'</p>';
				switch($recipe->getLevel())
					{
					case 1:
						echo '<p>Débutant</p>';
						break;
					case 2:
						echo '<p>Intermédiaire</p>';
						break;
					case 3:
						echo '<p>Confirmé</p>';
						break;
					}
				echo '<p>'.$recipe->getDescription().'</p>';
				echo '<p>'.$recipe->getIngredient().'</p>';
				echo '</article>';

			}
		

		?>
	</section>

</main>



