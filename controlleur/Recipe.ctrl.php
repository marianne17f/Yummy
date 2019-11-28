<?php 
class CtrlRecipe extends Controller
{
	public function index()
	{
		$this->loadDao('Recipe');

		$d['recipes'] = $this->DaoRecipe->readAll();
		
		$this->set($d);
		$this->render('Recipe','index');
	}



	public function myRecipes()
	{
		$this->render('Recipe','myRecipes');
	}



	public function detail($id)
	{
		$this->loadDao('Recipe');
		$this->loadDao('Ingredient');
		


		$d['recipe'] = $this->DaoRecipe->read($id);
		$d['ingredient'] = $this->DaoIngredient->readByRecipe(); // créer la méthode readByRecipe
		
		$this->set($d);
		$this->render('Recipe','detail',$id);
	}

	public function pageAddRecipe()
	{
		if(isset($_SESSION['id']))
		{
			$this->render('Recipe','pageAddRecipe');
		}
		else
		{
			$this->render('Home','redirectionInscripCo');
		}
	}



}

 ?>