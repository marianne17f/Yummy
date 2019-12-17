<?php 
	class CtrlHome extends Controller
	{
		//Return all Recipes, all Events & all Addresses in the index page(in the folder Home)
		public function index()
		{
			$this->loadDao('Recipe');
			$d['recipes'] = $this->DaoRecipe->readAll();
			$this->set($d);

			$this->loadDao('Event');
			$d['events'] = $this->DaoEvent->readAll();
			$this->set($d);

			$this->loadDao('Address');
			$d['addresses'] = $this->DaoAddress->readAll();
			$this->set($d);
			
			$this->render('Home','index');
		}

		// Return the cookies page	
		public function cookies()
		{
			$this->render('Home','cookies');
		}

		// Return the legal page
		public function legal()
		{
			$this->render('Home','legal');
		}

		// Return the policy page
		public function policy()
		{
			$this->render('Home','policy');
		}

		// Return the 404 page
		public function p404()
		{
			$this->render('Home','p404');
		}

	}


 ?>