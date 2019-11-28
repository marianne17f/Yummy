<main id="my_recipes">
	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid heights100p banners">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div>
	    				<h1>Mes recettes haelthy</h1>
	    				<h2>Créez, modifiez et supprimez vos recettes saines et gourmandes</h2>
	    			</div>
	    		</div>
	  		</div>
		</div>
	</div>
	
	
 	<div id="recipesCreated" class="container">
	
		<div class="blog" id="recipe">

	 		<div class="headerText text-center">
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


		</div>

	</div>

</main>
