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




		/* Create a new user in the DB */

		public function signUp()
		{
	        $this->loadDao('User');
	        $badPoint = 0;

		    if ($this->DaoUser->readByEmail($this->input['email']) != null)
		    {
		        $d['user'] = $this->DaoUser->readByEmail($this->input['email']);

		        $d['log'] = "<p>".$this->input['email']." déjà inscrit</p>";

		        $this->set($d);
		        $this->render('User','pageSignUp');
		    }

		    else
		    {       
				$newUser = new User($this->input['firstName'],$this->input['lastName'], $this->input['email'],$this->input['pass1']);

		       
		        if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\-\s]+$/", $this->input['firstName']))
		        {

		            $badPoint++;

		            $d['log1'] = "<p>Le prénom doit contenir uniquement des lettres ou chiffres</p>";

		        } 

		        if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\-\s]+$/", $this->input['lastName']))
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

		        // if all regex are validated, create a new user and save data in BD
		        if ($badPoint == 0)
		        {

			        $this->DaoUser->create($newUser);

			        $_SESSION['id'] = DB::lastId();
			    }		      

		    }   

		    // if one or many regex aren't ok, return the user back to the signup page
	        if ($badPoint != 0)
	        {
	            $this->set($d);

	       		$this->render('User','pageSignUp');
	        }

	        //if all regex are ok, drive the user back to the second page of signup
	        else
	        {
	            $_SESSION['id'] = DB::lastId();
	            
	            $this->render('User','pageSignUp2');
	        }    
	    }





		public function addInfoUser()
		{
			$this->loadDao('User');

			$dossier = ROOT.'img/profile/';
			$fichier = basename(strip_tags($this->files['photo']['name']));
			move_uploaded_file(strip_tags($this->files['photo']['tmp_name']), $dossier . $fichier);	
			

			$user = $this->DaoUser->read($_SESSION['id']);
		
			/* If the input['image'] is not empty, put what the user has written in */
			if (!empty($this->files['photo']['name']))
			{
				$user->setPhoto($fichier);
			}
			else/* insert a default image */
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
			$badPoint = 0;

			$dossier = ROOT.'img/profile/';
			$fichier = basename($this->files['photo']['name']);
			move_uploaded_file($this->files['photo']['tmp_name'], $dossier . $fichier);	
				
			$user = $this->DaoUser->read($_SESSION['id']); 
			
			if (!empty($this->input['firstName']))
			{
				if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\-\s]+$/", $this->input['firstName']))
				{
					 $badPoint++;

		            $d['log1'] = "<p>Le prénom doit contenir uniquement des lettres</p>";
				}
				else
				{
					$user->setFirstName($this->input['firstName']);
				}
			}

			if (!empty($this->input['lastName']))
			{
				if(!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\-\s]+$/", $this->input['lastName']))
				{
					$badPoint++;

		            $d['log2'] = "<p>Le nom doit contenir uniquement des lettres</p>";
				}
				else
				{
					$user->setLastName($this->input['lastName']);
				}				
			}

			if (!empty($this->input['email']))
			{
				if (!preg_match("/^[\w.-]+@[\w.-]+\.[a-zA-Z0-9]{2,6}$/", $this->input['email']))
				{
					$badPoint++;

			        $d['log3'] = "<p>Email invalide</p>";
				}
				else
				{
					$user->setEmail($this->input['email']);
				}				
			}
			
			if (!empty($this->files['photo']['name']))
			{
				$user->setPhoto($this->files['photo']['name']);
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
				if (!preg_match("/^[0-9A-Za-zÀ-ÖØ-öø-ÿ\-\s]+$/", $this->input['address']))
				{
					$badPoint++;
			        $d['log6'] = "<p>L\'adresse ne peut contenir :</p><ul><li>Des lettres</li><li>Des chiffres</><li>Des espaces, tirets et apostrophes</li></ul>";
				}

				else
				{
					$user->setAddress($this->input['address']);
				}	
			}

			if (!empty($this->input['level_cook']))
			{
				$user->setLevel_cook($this->input['level_cook']);
			}

			
			if (isset($_POST['pass1']) && isset($_POST['pass2']) && $_POST['pass1'] != "" && $_POST['pass2'] != "")
			{
				// Variable to keep the password in memory if it's valid
				
				$pass1 = $_POST['pass1'];
				$pass2 = $_POST['pass2'];

				// 1°. checking the regex
				if (!preg_match('/^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[&?:\/=+§^¤£@\#*!()"$]).*$/',$pass1))
				{
					// increment (add +1) of the validity variable
					$badPoint++;

					$d['log4'] = " <p>Le mot de passe doit avoir :</p>
	              <ul>
		              <li>Au moins une majuscule</li>
		              <li>Au moins un chiffre</li>
		              <li>Au moins 6 caractères</li>
		              <li>Au moins un caractère spécial</li>
	              </ul>";
				}

				// 2°. similar password verification
				elseif ($pass1 != $pass2)
				{
					$badPoint++;
					$d['log5'] = "<p>La vérification du mot de passe ne correspond pas</p>";
				}

				// if the password is valid, I hash the password
				else
				{
					$goodPass = password_hash($pass1, PASSWORD_BCRYPT);
					$user->setPass($goodPass);
				}
			}

			// if the new data are valid, I change data in the DB
			if($badPoint == 0)
			{	
				$this->DaoUser->update($user);

				$d['user'] = $user;

				$this->set($d);					
			}
			
			// if new data don't match the RegEx, back to the pageUpdateUser
			if($badPoint != 0)	
			{
				$this->set($d);
				
				$this->pageUpdateUser();
			}

			// if new data match the RegEx, go to the UserView
			else
			{
				$this->set($d);
			
	           	$this->render('User','userView');
			}			
		}






		public function pageLogIn()
		{
			$this->render('User','pageLogIn');
		}




		public function login()
		{
			$this->loadDao('User');


			if ($this->DaoUser->readByEmail($this->input['email']) != null)
			{

				
				$user = $this->DaoUser->readByEmail($this->input['email']);
				
				// $pass = password_hash($this->input['pass'], PASSWORD_BCRYPT);
	            

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



		// Method destroy the session of the user to deconnect him
		public function logOut()
		{
			session_start();
			$_SESSION = [];
			session_destroy();
			header('Location: '.WEBROOT.'Home/index');
		}



		// update column "archive" 0 to 1 in the DB, user'll get his account if he send a request
		public function archive()
		{
			$this->loadDao('User');

			if(isset($_SESSION['id']))
			{
				$this->DaoUser->archive($_SESSION['id']);

				header('location:'.WEBROOT.'User/logOut');
			}
		}



		// delete in the DB
		public function delete()
		{
			$this->loadDao('User');

			if(isset($_SESSION['id']))
			{
				$this->DaoUser->delete($_SESSION['id']);

				$this->render('User','logOut');
			}
		}



		// displays all recipes, events and addresses
		public function administrateur()
		{
			$this->loadDao('Recipe');
			$d['recipes'] = $this->DaoRecipe->readAll();
			$this->set($d);

			$this->loadDao('Event');
			$d['events'] = $this->DaoEvent->readAllUnvalidated();
			$this->set($d);

			$this->loadDao('Address');
			$d['addresses'] = $this->DaoAddress->readAll();
			$this->set($d);

			$this->render('User','administrateur');
		}

	}
?>