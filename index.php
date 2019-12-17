<?php 

	session_start();


	// WEBROOT => project folder from the server root
	define('WEBROOT',str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
	// ROOT => project folder from the root of the hard drive
	define('ROOT',str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/style.css">
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/360-991px.css">
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/360-767px.css">
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/768-991px.css">
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/992-1199px.css">
	<title>YUMMY ! Rencontres culinaires et partage de recettes healthy</title>
	<meta name="description" content="YUMMY ! Partage de recettes gourmandes et de moments culinaires axés sur le thème de la cuisine healthy">




</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?php echo WEBROOT ?>Home/index"><img class="logo" src="<?php echo WEBROOT ?>img/img_site/yummylike.png" alt="partage de recettes healthy et événements culinaires" title="retour en haut de page"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  		</button>
				


				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav ml-lg-auto">
				    	<li class="nav-item">
				        	<a class="nav-link" href="<?php echo WEBROOT ?>Home/index">Accueil</a>
				     	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="<?php echo WEBROOT ?>Recipe/index">Recettes</a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="<?php echo WEBROOT ?>Event/index">Rencontres culinaires</a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="<?php echo WEBROOT ?>Address/index">Bonnes adresses</a>
				      	</li>
				      	<li class="nav-item">
				        	<a class="nav-link" href="<?php echo WEBROOT ?>Contact/index">Contact</a>
				      	</li>
				      	<?php 
							if (isset($_SESSION['id']))
							{
						?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo WEBROOT ?>User/index/<?php $_SESSION['id']?>">Tableau de bord</a>
								</li>
								<li>
									<a href="<?php echo WEBROOT ?>User/logOut" class="btn_connexion">Déconnexion</a>
								</li>
						<?php
							}
						 ?>
				    </ul>
			    
		    	</div>				     	
		    </div>
		</nav>
	</header>



	<?php 
	// ----------- INIT 1 : creating routing ----------- //

		// Load core files
		require_once('core/bdd.php');
		require_once('core/controller.php');
		require_once('core/abstractEntity.php');




		/* ROUTING */

		// Routing management to display the default page
		if (isset($_GET['p']))
		{
			if ($_GET['p'] == "")
			{
				$_GET['p'] = "Home/index";
			}
		}

		//If there is no $GET ['p'] (if URL = localhost/Yummy/)
		else 
		{
			$_GET['p'] = "Home/index";
		}

		// Loading the controller
		//$tabController is an array which contains the entities' names accepted by the website
		$tabController = array('Home', 'Address', 'Contact', 'Event', 'Recipe', 'User');

		// Assignment to the variable $param of the explode of $_GET['p'], allows to pass from the url 'Controller/action' to an array ['Controller','action']
		$param = explode("/",$_GET['p']);


		// If the controller name from the url is in the $tabController
		if(in_array($param[0], $tabController))
		{
			// Assignment to $controller the name of the requested controller
			$controller = $param[0];
			
			// If there is an action
			if (isset($param[1]))
			{
				// Assignment to $action the name of the requested action
				$action = $param[1];
			}

			else
			{
				// Assignment to $action 'index' by default
				$action = 'index';
			}


			// Load controller
			require_once('controlleur/'.$controller.'.ctrl.php');

			// Name of the controller class
			$controller = 'Ctrl'.$controller;

			// Instantiation of the controller
			$controller = new $controller();

			
			// If the $action method exists in the $controller object
			if (method_exists($controller,$action))
			{
				// We remove the indices 0 and 1 from the $param array
				unset($param[0]);
				unset($param[1]);

				// We execute the method $action of the object $controller with $param as parameter of the method
				call_user_func_array(array($controller,$action), $param);
			}

			// if $action not present in $controller
			else
			{
				//redirect page 404
				header('Location: '.WEBROOT.'Home/p404');
			}
		}
		
		else
		{
			// redirect Home/index if controller unknown
			header('Location: '.WEBROOT.'Home/p404');
		}

	

	 ?>


	

	<footer>
		<div class="sci">
			<a href="<?php echo WEBROOT ?>Home/legal">Mentions légales</a>
			<a href="<?php echo WEBROOT ?>Home/policy">Données personnelles</a>
			<a href="<?php echo WEBROOT ?>Home/cookies">Gérer mes cookies</a>
		</div>
		<p>Copyright © 2019 YUMMY !</p>	
	</footer>

	

	
	<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
	
	<script src="<?php echo WEBROOT ?>js/script.js"></script>
	
	<script>
 		let url = "<?php echo $_SESSION['url']?>";
	</script>

	<script>window.onload = changeUrl(url);</script>

	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  	<script>
   		AOS.init();
  	</script>
	
	<script>
		$(document).scroll(function()
		{
			$('.navbar').toggleClass('scrolled', $(this).scrollTop() > $('.navbar').height());
		});
	</script>
	
	
	<script>
		$(document).click(function()
		{
			$('.navbar').toggleClass('clicked');
		});
	</script>	

	 
</body>
</html>