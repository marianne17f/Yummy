<?php 
// ----------- INIT 2 : creating the super Controller ----------- //
class Controller
{
	public $input;
	public $files;
	public $vars = array();



	// Declaration of the construct which will be used in all the controllers which will extend Controller
	public function __construct()
	{
		// If the controller receives a $_POST
		if (isset($_POST))
		{
		// Assignment of $_POST to the attribute $input
			$this->input = $_POST;
		}

		// If the controller receives a $_FILES
		if (isset($_FILES))
		{
			// Assignment of $_FILES to the attribute $files
			$this->files = $_FILES;
		}
	}




	// Declaration of the "loadDao" method which will be used in all the controllers which will extend Controller, it is used to load a dao according to $name
	function loadDao($name)
	{
		// Load the dao file
		require_once('dao/'.$name.'.dao.php');
		// assignment to $daoClass of the name of the class of the loaded dao
		$daoClass = 'Dao'.$name;
		// assignment to $this -> $daoClass of the instance of the loaded dao
		$this->$daoClass = new $daoClass();
	}




	// Declaration of the "set" method which will be used in all the controllers which will extend Controller, it is used to save the data provided by $d
	function set($d)
	{
		// assignment to $this->vars from merging $this->vars with $d
		$this->vars = array_merge($this->vars, $d); /* array_merge => evolutionary array based on the value stored in the variable $d */
	}




	
	// Declaration of the "render" method which is used to load the requested view
	function render($controller, $viewFile,$param = null)
	{	
		// Extraction of $vars
		// allows the passage from $d ['maVar'] = value (controller side) to $maVar = value (view side)
		extract($this->vars); 
		// Start buffer memory
		ob_start();
		// Load the view file
		require_once('vue/'.$controller.'/'.$viewFile.'.php');
		// Clear the buffer memory and affect the content in $content
		$content = ob_get_clean();
		// Display the view
		echo $content;
		// Execution of saveUrl 
		$this->saveUrl($controller, $viewFile,$param);
	}




	// Declaration of the saveUrl method which is used to save the url
	function saveUrl($ctrl,$vue,$param = null)
	{
		// Assignment to the session variable "url", the url to save
		$_SESSION['url'] = $ctrl.'/'.$vue.'/'.$param;
	}
}

 ?>

