<?php 
class CtrlRecipe extends Controller
{
	//Return all recipes in the page index (in the folder Recipe)
	public function index()
	{
		$this->loadDao('Recipe');

		$d['recipes'] = $this->DaoRecipe->readAll();
		
		$this->set($d);
		$this->render('Recipe','index');
	}


	// Return the myRecipes page (page which will content the recipes created by the connected user)
	public function myRecipes()
	{
		$this->render('Recipe','myRecipes');
	}



	// Calls the Dao which will recovers data from the requested Recipe
	public function detail($id)
	{
		$this->loadDao('Recipe');
		$this->loadDao('Ingredient');
		
		$d['recipe'] = $this->DaoRecipe->read($id);
		$d['ingredient'] = $this->DaoIngredient->readByRecipe(); // créer la méthode readByRecipe
		
		$this->set($d);
		$this->render('Recipe','detail',$id);
	}



	// Return the page "pageAddRecipe.php" (which contains form to create an Recipe)
	public function pageAddRecipe()
	{
		if(isset($_SESSION['id']))
		{
			/* if the user is connected, allow him to access to the pageAddRecipe.php */
			$this->render('Recipe','pageAddRecipe');
		}
		else
		{
			/*if the user isn't connected, send back him to the redictionInscripCo page*/
			$this->render('Home','redirectionInscripCo');
		}
	}



}

 ?>