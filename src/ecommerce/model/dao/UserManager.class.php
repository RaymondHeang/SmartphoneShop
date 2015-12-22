<?php
	namespace ecommerce\model\dao;
	use ecommerce\model\User;
	use ecommerce\model\dao\DBOperation;

	class UserManager{

		public static function connect(User $user){
			$sQuery = "SELECT * FROM users WHERE mail = '".$user->getMail()."'";

         	$userBdd = DBOperation::getOne($sQuery);
         
         	if($userBdd)
         	{	  
         		if(password_verify($user->getPassword(), $userBdd["password"]))
          		{
          	  		return new User($userBdd["id"], $userBdd["mail"], $userBdd["password"], false, $userBdd["firstname"], $userBdd["lastname"], $userBdd["address"], $userBdd["cp"], $userBdd["city"], $userBdd["phone"], $userBdd["role"]);
            	}
            
            	return false;
         	}
        	else{
         		return false;
         	}
		}

		public static function insert(User $user){
			$query = "INSERT INTO users (mail, password, firstname, lastname, address, cp, city, phone, role) 
			VALUES ('".$user->getMail()."','".$user->getPassword()."','".$user->getFirstname()."','".$user->getLastname()."','".$user->getAddress()."','".$user->getCp()."','".$user->getCity()."','".$user->getPhone()."','".$user->getRole()."')";
			var_dump($query);
			if(DBOperation::exec($query)){
				header('Location: index.php?controller=Front&method=home&success');
			}else{
				header('Location: index.php?controller=Front&method=signin&error');
			}

		}
	}