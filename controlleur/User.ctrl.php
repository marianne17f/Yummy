<?php 
// ----------- CREATION OF THE OBJECT CONTROLLER ----------- //


	// Declaration of the controller object which inherits from the "super controller" Controller
	class CtrlUser extends Controller
	{
		public function index()
		{	
			// load the DAO User with the "loadDao" method of the "super controller"	
			$this->loadDao('User');
			// if the user is connected...
			if(isset($_SESSION['id']))
			{
				// ... Recovers user's data in the Data Base ...
				$d['user'] = $this->DaoUser->read($_SESSION['id']);
				$this->set($d);

				//  ... and directs him to his Dashboard page
				// Load the 'index' view with the render method of the "super controller"
				$this->render('User','index');
			}

		}



		// Directs user to the SignUp page
		public function pageSignUp()
		{
			// Load the 'pageSignUp' view with the render method of the "super controller"
			$this->render('User','pageSignUp');
		}




		// Creates a new user in the Data Base
		public function signUp()
		{
	        $this->loadDao('User');

	        // $badPoint is initialized to zero
	        $badPoint = 0;

	       	// if the mail in the input is already stored in the Data Base
		    if ($this->DaoUser->readByEmail($this->input['email']) != null)
		    {
		    	// Stores the method 'readByEmail()' in $d['user']
		        $d['user'] = $this->DaoUser->readByEmail($this->input['email']);

		        // Stores the message in $d['log'] 
		        $d['log'] = "<p>".$this->input['email']." déjà inscrit</p>";

		        // Send $d with its contents...
		        $this->set($d);

		        // ... to the view User/pageSignUp
		        $this->render('User','pageSignUp');
		    }

		    // if the mail in the input isn't stored in the Data Base
		    else
		    {     
		    	// Creates a new object User with the data contained in the form's inputs
				$newUser = new User($this->input['firstName'],$this->input['lastName'], $this->input['email'],$this->input['pass1']);

		       // if the RegEx doesn't match the source (= the input's value)
		        if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\-\s]+$/", $this->input['firstName']))
		        {
		        	// Increments the variable $badPoint
		            $badPoint++;

		            // And stores the message in the $d['log']
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

		        // if the RegEx doesn't match the source (= the input's value)
		        if (!preg_match('/^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[&?:\/=+§^*¤£@\#!()"$]).*$/',$this->input['pass1']))
		        {
		        	// Increments the variable $badPoint
		          	$badPoint++;

		          	// And stores the message in the $d['log']
		            $d['log4'] = " <p>Le mot de passe doit avoir :</p>
		              <ul>
			              <li>Au moins une majuscule</li>
			              <li>Au moins un chiffre</li>
			              <li>Au moins 6 caractères</li>
			              <li>Au moins un caractère spécial</li>
		              </ul>";
		        }

		        // if input's value['pass1'] is different from input's value['pass2']
		        elseif ($this->input['pass1'] != $this->input['pass2'])
		        {
		        	// Increments the variable $badPoint
		            $badPoint++;

		          	// And stores the message in the $d['log']
		            $d['log5'] = "<p>La vérification du mot de passe ne correspond pas</p>";
		        }

		        // if password matches the RegEx AND input's value['pass1']= input's value['pass2']
		        else
		        {
		        	// Hashes the password and stores it in a variable
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
			// Load the Dao 'User'
			$this->loadDao('User');

			// Stores in the variable $dossier, the path we're going to store the profile photo
			$dossier = ROOT.'img/profile/';

			// $fichier stores only the last component of the file path
			//example : the file path is 'holidaysPhotos/ItalieHolidays/TreviFountain.jpg' => $fichier = 'TreviFountain.jpg'
			$fichier = basename($this->files['photo']['name']);

			// Method move_uploaded_file() moves the name of the downloaded file (ex: 'TreviFountain.jpg') to ROOT.'img/profile'
			move_uploaded_file(($this->files['photo']['tmp_name']), $dossier . $fichier);	
			
			// Stores data of the user connected in the variable $user
			$user = $this->DaoUser->read($_SESSION['id']);
		
			// If the input['image'] is not empty... put what the user has written in
			if (!empty($this->files['photo']['name']))
			{
				//...put what the user has written in
				$user->setPhoto($fichier);
			}

			// Otherwise, insert a default image
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
			
			//Loads the Dao which will update data in the Data Base	
			$this->DaoUser->addinfo($user);

			// Stores new Data in the $d
			$d['user'] = $user;

			// Sends $d...
			$this->set($d);

			// ...to the view
			$this->render('User','index');
		}


		// Method returns the view 'userView' 
		public function userView()
		{
			$this->loadDao('User');			
			// if the user is connected
			if(isset($_SESSION['id']))
			{
				// Stores user data returned by DaoUser read() in the variable $d
				$d['user'] = $this->DaoUser->read($_SESSION['id']);
				// Sends them...
				$this->set($d);				
				// ...to the view 'userView'
				$this->render('User','userView');
			}
		}



		// method returns a view 'pageUpdateUser'
		public function pageUpdateUser()
		{
			$this->loadDao('User');

			// if the user is connected
			if(isset($_SESSION['id']))
			{
				// Select and stores data of the user in the variable $d
				$d['user'] = $this->DaoUser->read($_SESSION['id']);

				// Sends them...
				$this->set($d);

				// ...to the view 'pageUpdateUser'
				$this->render('User','pageUpdateUser');
			}
		}




		public function updateUser()
		{
			$this->loadDao('User');

			// $badPoint is initialized to zero
			$badPoint = 0;

			$dossier = ROOT.'img/profile/';
			$fichier = basename($this->files['photo']['name']);
			move_uploaded_file($this->files['photo']['tmp_name'], $dossier . $fichier);	
			
			// Stores data of the user connected in the variable $user	
			$user = $this->DaoUser->read($_SESSION['id']); 
			
			// if the input value ['firstname'] isn't empty
			if (!empty($this->input['firstName']))
			{
				//  and if the RegEx doesn't match the source (= the input value)
				if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\-\s]+$/", $this->input['firstName']))
				{
					// Increments the variable $badPoint
					$badPoint++;

					// And stores the message in the $d['log']
		            $d['log1'] = "<p>Le prénom doit contenir uniquement des lettres</p>";
				}
				else
				{
					// Otherwise, Changes data and stores the new data in $user
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
					// increments (add +1) of the validity variable
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





		// Returns the pageLogIn (from the User's folder)
		public function pageLogIn()
		{
			$this->render('User','pageLogIn');
		}



		// Method to connect user
		public function login()
		{
			$this->loadDao('User');

			// if the mail in the input is already stored in the Data Base
			if ($this->DaoUser->readByEmail($this->input['email']) != null)
			{
				// Stores the user's data in $user
				$user = $this->DaoUser->readByEmail($this->input['email']);
				
				// Checks that the input value matches the value in the Data Base
				if (password_verify($this->input['pass'],$user->getPass()))	
				{
					// Stores in the Session Variable, Id, Firstname et Lastname
					$_SESSION['id'] = $user->getId();
					$_SESSION['firstname'] = $user->getFirstName();
					$_SESSION['lastname'] = $user->getLastName();
					
					header('location:'.WEBROOT.'User/index');
				}

				// if password doesn't match
				else 
				{
					$d['log1'] = "<p>Mot de passe incorrect</p>";
					$this->set($d);
					$this->render('User','pageLogIn');
				}
			} 

			// if email doesn't match
			else
			{
				$d['log'] = "<p>Email incorrect</p>";
				$this->set($d);
				$this->render('User','pageLogIn');
			}		
		}



		// Method destroys the session of the user to deconnect him
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



		// Calls the method to delete the user in the DB
		public function delete()
		{
			$this->loadDao('User');
			// This method'll work  only if the user is connected
			if(isset($_SESSION['id']))
			{
				$this->DaoUser->delete($_SESSION['id']);

				// R
				$this->logOut();
			}
		}



		// Returns all recipes, events and addresses and send them to the Admin page
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