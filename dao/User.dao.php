<?php 
//------------------ DAO creation -------------------//


	
// load the model linked to the DAO
	require_once('modele/User.class.php');



	// Declaration of the DAO object
	class DaoUser
	{
		//sign up : insert data's user in Data Base
		// Dao method declaration with $user object as argument
		public function create($user)
		{
	        DB::select('INSERT INTO user (firstname, lastname, email, pass) VALUES (?,?,?,?)', array($user->getFirstName(),$user->getLastName(),$user->getEmail(),$user->getPass()));

	        $user->getId();
	    }



		// the rest of sign up
		public function addinfo($user)
		{		
			DB::select('UPDATE user SET photo = ?, age = ?, sex = ?, address = ?, level_cook = ?, role = ? WHERE id = ? ', array($user->getPhoto(),$user->getAge(),$user->getSex(), $user->getAddress(),$user->getLevel_cook(),$user->getRole(),$user->getId()));
		}




		// Recovers user data in the Data Base
		public function read($id)
		{
			$donnee = DB::select('SELECT * FROM user WHERE id = ? AND archive = 0', array($id));

			if (!empty($donnee))
			{	
				// A new object is instanced with data from the Data Base in parameters / and this new object is stored in a variable $event
				$user = new User($donnee[0]['firstname'],$donnee[0]['lastname'],$donnee[0]['email'],$donnee[0]['pass']);

				$user->setPhoto($donnee[0]['photo']);
				$user->setAge($donnee[0]['age']);
				$user->setSex($donnee[0]['sex']);
				$user->setAddress($donnee[0]['address']);
				$user->setLevel_cook($donnee[0]['level_cook']);
				$user->setRole($donnee[0]['role']);
				$user->setId($donnee[0]['id']);

				return $user;
			}
			
			else
			{
				return null;
			}
		}




		// user login
		public function readByEmail($email)
		{
			$donnees = DB::select('SELECT * FROM user WHERE email = ? AND archive = 0', array($email));

			if (!empty($donnees))
			{
				// A new object is instanced with data from the Data Base in parameters / and this new object is stored in a variable $event
				$user = new User($donnees[0]['firstname'],$donnees[0]['lastname'],$donnees[0]['email'],$donnees[0]['pass']);

				$user->setPhoto($donnees[0]['photo']);
				$user->setAge($donnees[0]['age']);
				$user->setSex($donnees[0]['sex']);
				$user->setAddress($donnees[0]['address']);
				$user->setLevel_cook($donnees[0]['level_cook']);
				$user->setRole($donnees[0]['role']);
				$user->setId($donnees[0]['id']);
				
				return $user;
			}
			else
			{
				return null;
			}
		}




		// sending user changes to the DB
		public function update($user)
		{		
			DB::select('UPDATE user SET firstname = ?, lastname = ?, email = ?, pass = ?, photo = ?, age = ?, sex = ?, address = ?, level_cook = ?, role = ? WHERE id = ?', array($user->getFirstName(),$user->getLastName(),$user->getEmail(),$user->getPass(), $user->getPhoto(),$user->getAge(),$user->getSex(),$user->getAddress(), $user->getlevel_cook(),$user->getRole(),$user->getId()));
		}

	

		// archive the user in the DB
		public function archive($id)
		{
			DB::select('UPDATE user SET archive = 1 WHERE id = ?', array($id));
		}



		// definitely delete the user from the DB
		public function delete($id)
		{
			DB::select('DELETE FROM user WHERE id = ?', array($id));
		}
	}


 ?>

