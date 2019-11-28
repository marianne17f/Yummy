

<?php 

  
  /*

  session cookie reinforcement
  v191104 - coded with devotion by jérémie / www.humanize.me
  you are free to use this code but please leave this comment
  bigup teamSète 2019 <3

  */

  $p = pathinfo($_SERVER["REQUEST_URI"]);
  $lifetime = time()+(60*30); // 30 min
  $path     = "/";
  $domain   = filter_var($_SERVER["SERVER_NAME"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $secure   = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'); // true if already on SSL
  $httponly = 1;
  $samesite = "Strict"; // PHP > 7.3

  if (PHP_VERSION_ID >= 70300)
  {

    session_set_cookie_params([
      "lifetime" => $lifetime,
      "path" => $path,
      "domain" => $domain,
      "secure" => $secure,
      "httponly" => $httponly,
      "samesite" => $samesite
    ]);

  }
  else
 {

    session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);

  }

  session_name("yummy");

  /*

  session start

  */

  session_start();
  session_regenerate_id();



	// if (!isset($_SESSION['id']) && $_SERVER[\'HTTP_HOST\'] )
	// {
	// 	$this->render('Accueil','index');
	// }



?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<?php 
		define('WEBROOT',str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
		define('ROOT',str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

	 ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fascinate+Inline&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/style.css">
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/360-991px.css">
	<title>YUMMY ! Rencontres culinaires et partage de recettes healthy</title>
	<meta name="description" content="YUMMY ! Partage de recettes gourmandes et de moments culinaires axés sur le thème de la cuisine healthy">




</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?php echo WEBROOT ?>Home/index"><img class="logo" src="<?php echo WEBROOT ?>img/yummylike.png" alt="partage de recettes healthy et événements culinaires" title="retour en haut de page"></a>
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
	// ----------- INIT 1 : creation du routage ----------- //
		// Charge le core de l'appli
		require_once('core/bdd.php');
		require_once('core/controller.php');
		require_once('core/abstractEntity.php');

		// Gestion du routage pour afficher la page par defaut
		if (isset($_GET['p']))
		{
			if ($_GET['p'] == "")
			{
				$_GET['p'] = "Home/index";
			}
		}
		else /* S'il n'y a pas de $GET['p'] ( si URL = localhost/Yummy2/ ) */
		{
			$_GET['p'] = "Home/index";
		}

		// Chargement du controleur
		$param = explode("/",$_GET['p']);
		$controller = $param[0];
		if (isset($param[1]))
		{
			$action = $param[1];
		}
		else
		{
			$action = 'index';
		}
		require_once('controlleur/'.$controller.'.ctrl.php');
		$controller = 'Ctrl'.$controller;
		$controller = new $controller();

		// Execution de l'action du controleur avec les paramètres supplementaires si existant
		// Si action non présente dans le controleur, alors page 404
		if (method_exists($controller,$action))
		{
			unset($param[0]);
			unset($param[1]);
			call_user_func_array(array($controller,$action), $param);
		}
		else
		{
			echo 'erreur 404';
		}
	 ?>


	

	<footer>
		<div class="sci">
			<a href="<?php echo WEBROOT ?>Home/legal">Mentions légales</a>
			<a href="<?php echo WEBROOT ?>Home/policy">Données personnelles</a>
			<a href="<?php echo WEBROOT ?>Home/cookies">Gérer mes cookies</a>
		</div>
		<p class="cpryt">Copyright © 2019 YUMMY !</p>	
	</footer>



	
	<script src="<?php echo WEBROOT ?>js/script.js"></script>
	
	<script>
 		let url = "<?php echo $_SESSION['url']?>";
	</script>

	<script>window.onload = changeUrl(url);</script>

	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
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

	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	

	 
</body>
</html>