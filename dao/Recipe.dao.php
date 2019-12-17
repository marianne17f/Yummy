<?php 
//------------------ DAO creation -------------------//


// load the model linked to the DAO
require_once('modele/Recipe.class.php');


// Declaration of the DAO object
class DaoRecipe
{
	// Insert a new Recipe in the Data Base
	// Dao method declaration with $recipe object as argument
	public function create($recipe)
	{
		DB::select('INSERT INTO recipe (name,image,cooking_time, preparation_time, nb_people,level,description,fk_user) VALUES (?,?,?,?,?,?,?,?)', array($recipe->getName(),$recipe->getImage(),$recipe->gipCooking_time(),$recipe->gipPreparation_time(),$recipe->getNb_people(),$recipe->getLevel(),$recipe->getDescription(),$recipe->getFk_user()));

		$recipe->getId();
	}


	// Recovers data about the requested ID
	public function read($id)
	{
		$recipeData = DB::select('SELECT * FROM recipe WHERE id = ?', array($id));
	
	if (!empty($recipeData))
		{
			// A new object is instanced with the recovered data and stored in a variable $recipe
			$recipe = new Recipe($recipeData[0]['name'],$recipeData[0]['image'],$recipeData[0]['cooking_time'], $recipeData[0]['preparation_time'],$recipeData[0]['nb_people'],$recipeData[0]['level'],$recipeData[0]['description'],$recipeData[0]['fk_user']);
			
			$recipe->setId($recipeData[0]['id']);
			
			// The variable and its contents are returned to the controller
			return $recipe;
		}
		else
		{
			return null;
		}
	}



	//Recovers all Recipes
	public function readAll()
	{
		$recipeData = DB::select('SELECT * FROM recipe WHERE archive = 0');

		if (!empty($recipeData))
		{
			foreach($recipeData as $key => $recipe)
			{
				// A new object is instanced for each Recipe with the recovered data and stored in a variable $recipes
				$recipes[$key] = new Recipe($recipe['name'],$recipe['image'],$recipe['cooking_time'],$recipe['preparation_time'],$recipe['nb_people'],$recipe['level'],$recipe['description'],$recipe['fk_user']);
				
				$recipes[$key]->setId($recipe['id']);
				
			}
			return $recipes;
		}
		else
		{
			return null;
		}
	}
	

	
	// Recovers created Recipes by the connected user
	public function readByUser($id)
	{
		$recipeData = DB::select('SELECT * FROM recipe WHERE fk_user = ?',array($id));
	}
	

	
	// Updates a Recipe
	public function update($recipe)
	{
		DB::select('UPDATE recipe SET name = ?, image = ?, cooking_time = ?, preparation_time = ?, nb_people = ?, level = ?, description = ?, fk_user = ?,  description = ? WHERE id = ?', array($recipe->getName(),$recipe->getImage(),$recipe->getCooking_time(), $recipe->getPreparation_time(),$recipe->getNb_people(),$recipe->getLevel(),$recipe->getDescription(),$recipe->getFk_user()));

		$recipe->getId();
	}

}

 ?>

