<?php 
	class CtrlHome extends Controller
	{
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



		public function cookies()
		{
			$this->render('Home','cookies');
		}



		public function legal()
		{
			$this->render('Home','legal');
		}




		public function policy()
		{
			$this->render('Home','policy');
		}

	}


 ?>