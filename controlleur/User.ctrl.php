<?php 


class CtrlUser extends Controller
{
	public function index()
	{
		/* si l'utilisateur se connecte correctement (mail + mdp OK) , le diriger vers sa page Tableau de bord */
		$this->loadDao('User');
		if(isset($_SESSION['id']))
		{
			$d['user'] = $this->DaoUser->read($_SESSION['id']);
			$this->set($d);
		}

		$this->render('User','index');
	}




	public function pageSignUp()
	{
		$this->render('User','pageSignUp');
	}




	/* INSCRIPTION */

	public function signUp()
	{
        $this->loadDao('User');
        $badPoint = 0;

	    if ($this->DaoUser->readByEmail($this->input['email']) != null)
	    {
	        $d['user'] = $this->DaoUser->readByEmail($this->input['email']);

	        $d['log'] = "<p>".$this->input['email']." déjà inscrit";

	        $this->set($d);
	        $this->render('User','pageSignUp');
	    }

	    else
	    {       
			$newUser = new User($this->input['firstName'],$this->input['lastName'], $this->input['email'],$this->input['pass1']);

	       
	        if (!preg_match("/^[a-zA-Z\s-]+$/", $this->input['firstName']))
	        {

	            $badPoint++;

	            $d['log1'] = "<p>Le prénom doit contenir uniquement des lettres ou chiffres</p>";

	        } 

	        if (!preg_match("/^[a-zA-Z\s-]+$/", $this->input['lastName']))
	        {

	            $badPoint++;

	            $d['log2'] = "<p>Le nom doit contenir uniquement des lettres ou chiffres</p>";

	        } 

	        if (!preg_match("/^[\w.-]+@[\w.-]+\.[a-zA-Z0-9]{2,6}$/", $this->input['email']))
	        {

		        $badPoint++;

		        $d['log3'] = "<p>Email invalide</p>";

	        } 

	        if (!preg_match('/^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[&?:\/=+§^*¤£@\#!()"$]).*$/',$this->input['pass1']))

	        {

	          	$badPoint++;

	            $d['log4'] = " <p>Le mot de passe doit avoir :</p>
	              <ul>
		              <li>Au moins une majuscule</li>
		              <li>Au moins un chiffre</li>
		              <li>Au moins 6 caractères</li>
		              <li>Au moins un caractère spécial</li>
	              </ul>";

	        }
	        elseif ($this->input['pass1'] != $this->input['pass2'])
	        {

	            $badPoint++;

	            $d['log5'] = "<p>La vérification du mot de passe ne correspond pas</p>";

	        }

	        else
	        {

	            $goodPass = password_hash($this->input['pass1'], PASSWORD_BCRYPT);
	            $newUser->setPass($goodPass);
	    

	        }

	        if ($badPoint == 0)
	        {

		        $this->DaoUser->create($newUser);

		        $d['id'] = DB::lastId();

		        $_SESSION['id'] = DB::lastId();
		    }		      

	    }   

        if ($badPoint != 0)
        {
            $this->set($d);

       		$this->render('User','pageSignUp');
        }

        else
        {
            $this->set($d);

            $this->render('User','pageSignUp2');
        }    

    }





	public function addInfoUser()
	{
		$this->loadDao('User');

		$dossier = ROOT.'img/';
		$fichier = basename($this->files['photo']['name']);
		move_uploaded_file($this->files['photo']['tmp_name'], $dossier . $fichier);	
		

		$user = $this->DaoUser->read($_SESSION['id']);
	
		/* If the input['image'] is not empty, put what the user has written in */
		if (!empty($this->$fichier))
		{
			$user->setPhoto($fichier);
		}
		else/* insert a default image */
		{
			$user->setPhoto('cuisine.png');
		}

		$user->setAge($this->input['age']);
		$user->setSex($this->input['sex']);
		$user->setAddress($this->input['address']);
		$user->setLevel_cook($this->input['level_cook']);
			
		$this->DaoUser->addinfo($user);

		$d['user'] = $user;
		$this->set($d);

		$this->render('User','index');
	}



	public function userView()
	{
		$this->loadDao('User');
		
		if(isset($_SESSION['id']))
		{
			$d['user'] = $this->DaoUser->read($_SESSION['id']);
			$this->set($d);
			
			$this->render('User','userView');
		}
	}




	public function pageUpdateUser()
	{
		$this->loadDao('User');
		if(isset($_SESSION['id']))
		{
			$d['user'] = $this->DaoUser->read($_SESSION['id']);
			$this->set($d);
		}
		$this->render('User','pageUpdateUser');
	}




	public function updateUser()
	{
		$this->loadDao('User');

		$dossier = ROOT.'img/';
		$fichier = basename($this->files['photo']['name']);
		move_uploaded_file($this->files['photo']['tmp_name'], $dossier . $fichier);	
			
		$user = $this->DaoUser->read($_SESSION['id']);
		
		if (!empty($this->input['firstName']))
		{
			$user->setFirstName($this->input['firstName']);
		}

		if (!empty($this->input['lastName']))
		{
			$user->setLastName($this->input['lastName']);
		}

		if (!empty($this->input['email']))
		{
			$user->setEmail($this->input['email']);
		}

		if (!empty($this->input['lastName']))
		{
			$user->setLastName($this->input['lastName']);
		}
		
		if (!empty($this->files['photo']['name']))
		{
			$user->setPhoto($fichier);
		}

		else
		{
			$user->setPhoto('cuisine.png');
		}


		if (!empty($this->input['age']))
		{
			$user->setAge($this->input['age']);
		}

		if (!empty($this->input['sex']))
		{
			$user->setSex($this->input['sex']);

		}

		if (!empty($this->input['address']))
		{
			$user->setAddress($this->input['address']);
		}

		if (!empty($this->input['level_cook']))
		{
			$user->setLevel_cook($this->input['level_cook']);
		}

		$badPoint = 0;
		
		if (isset($_POST['pass1']) && isset($_POST['pass2']) && $_POST['pass1'] != "" && $_POST['pass2'] != "")
		{
			// Variable pour garder en memoire si le mot de passe est valable 
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];

			// 1°. vérification du regexp
			if (!preg_match('/^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[&?:\/=+§^¤£@\#*!()"$]).*$/',$pass1))
			{
				// incrémentation (ajouter +1) de la variable de validité
				$badPoint++;
			// 2°. vérification pass similaire
			}
			elseif ($pass1 != $pass2)
			{
				$badPoint++;
			}
			// Si le mot de passe est valable, alors j'update le mot de passe
		}

		if ($badPoint == 0)
		{
			$goodPass = password_hash($this->input['pass1'], PASSWORD_BCRYPT);	
			$user->setPass($goodPass);
		}

		

		$this->DaoUser->update($user);
		$d['user'] = $user;

		$this->set($d);				
		$this->render('User','userView');
	}





	public function pageLogIn()
	{
		$this->render('User','pageLogIn');
	}





	public function modifProfil()
	{
		$this->render('User','updateProfil');
	}




	public function login()
	{
		$this->loadDao('User');


		if ($this->DaoUser->readByEmail($this->input['email']) != null)
		{

			
			$user = $this->DaoUser->readByEmail($this->input['email']);

			if (password_verify($this->input['pass'],$user->getPass()))	
			{
				$_SESSION['id'] = $user->getId();
				$_SESSION['firstname'] = $user->getFirstName();
				$_SESSION['lastname'] = $user->getLastName();
				

				// $d['user'] = $user;
				// $this->render('User','index');
				header('location:'.WEBROOT.'User/index');
	
			}
			else 
			{
			
				$d['log1'] = "<p>Mot de passe incorrect</p>";
				$this->set($d);
				$this->render('User','pageLogIn');
			}
		} 
		else
		{
			// header('Location: '.WEBROOT.'User/connexion');
			$d['log'] = "<p>Email incorrect</p>";
			$this->set($d);
			$this->render('User','pageLogIn');
		}		
	}




	public function logOut()
	{
		session_start();
		$_SESSION = [];
		session_destroy();
		// header('Location: '.WEBROOT.'Home/index');
		$this->render('Home','index');
	}




	public function archive()
	{
		$this->loadDao('User');

		if(isset($_SESSION['id']))
		{
			$this->DaoUser->archive($_SESSION['id']);

			// header('location:'.WEBROOT.'User/logOut');
			$this->render('User','logOut');
		}
	}




	public function delete()
	{
		$this->loadDao('User');

		if(isset($_SESSION['id']))
		{
			$this->DaoUser->delete($_SESSION['id']);

			// header('location:'.WEBROOT.'User/logOut');
			$this->render('User','logOut');
		}
	}




	public function administrateur()
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

		$this->render('User','administrateur');
	}

}
?>