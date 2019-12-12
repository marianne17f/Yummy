<?php 
// ----------- INIT 2 : creation du super Controleur ----------- //
class Controller
{
	public $input;
	public $files;
	var $vars = array();

	public function __construct()
	{
		if (isset($_POST))
		{
			$this->input = $_POST;
		}
		if (isset($_FILES))
		{
			$this->files = $_FILES;
		}
	}

	function loadDao($name)
	{
		require_once('dao/'.$name.'.dao.php');
		$daoClass = 'Dao'.$name;
		$this->$daoClass = new $daoClass();
	}

	function set($d)
	{
		$this->vars = array_merge($this->vars, $d); /* tableau évolutif en fonction de la valeur qu'on met ds la variable d */
	}

	// Declaration de la fonction render qui permet d'afficher la vue (et save l'url)
	function render($controller, $viewFile,$param = null)
	{
		// Extraction de $vars
		// permet le passage de $d['maVar'] = value (côté controlleur) à $maVar = value (côté vue)
		extract($this->vars); 
		// Démarrage de la mémoire tampon
		ob_start();
		require_once('vue/'.$controller.'/'.$viewFile.'.php');
		// Vide la mémoire tempon et affecte le contenue dans $content
		$content = ob_get_clean();

		echo $content;
		// Execution de saveUrl 
		$this->saveUrl($controller, $viewFile,$param);
	}




	function saveUrl($ctrl,$vue,$param = null)
	{
		// Affectation a la variable de session url, l'url à sauvegarder
		$_SESSION['url'] = $ctrl.'/'.$vue.'/'.$param;
	}
}

 ?>

