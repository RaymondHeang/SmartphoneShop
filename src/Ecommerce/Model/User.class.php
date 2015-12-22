<?php
	namespace Ecommerce\Model;

	class User
    {
		protected $password, $mail, $lastname, $firstname, $address, $cp, $city, $phone, $role, $id;

		public function __construct($id, $mail, $password, $crypt=false, $firstname, $lastname, $address, $cp, $city, $phone, $role=null)
        {
			$this->setMail($mail);
			$this->setPassword($password, $crypt);
			$this->setFirstname($firstname);
			$this->setLastname($lastname);
			$this->setAddress($address);
			$this->setCp($cp);
			$this->setCity($city);
			$this->setPhone($phone);
			$this->setRole($role);
			$this->setId($id);
		}

		public function getPassword()
        {
			return $this->password;
		}

		public function setPassword($password, $crypt)
        {
			if ($crypt) {
				$this->password = password_hash($password, PASSWORD_DEFAULT);
			} else {
				$this->password = $password;
			}
		}

		public function getMail()
        {
			return $this->mail;
		}

		public function setMail($mail)
        {
			$this->mail = $mail;
		}

		public function getFirstname()
        {
			return $this->firstname;
		}

		public function setFirstname($firstname)
        {
			$this->firstname = $firstname;
		}

		public function getLastname()
        {
			return $this->lastname;
		}

		public function setLastname($lastname)
        {
			$this->lastname = $lastname;
		}

		public function getAddress()
        {
			return $this->address;
		}

		public function setAddress($address)
        {
			$this->address = $address;
		}

		public function getCp()
        {
			return $this->cp;
		}

		public function setCp($cp)
        {
			$this->cp = $cp;
		}

		public function getCity()
        {
			return $this->city;
		}

		public function setCity($city)
        {
			$this->city = $city;
		}

		public function getPhone()
        {
			return $this->phone;
		}

		public function setPhone($phone)
        {
			$this->phone = $phone;
		}

		public function getRole()
        {
			return $this->role;
		}

		public function setRole($role)
        {
			$this->role = $role;
		}

		public function getId()
        {
			return $this->id;
		}

		public function setId($id)
        {
			$this->id = $id;
		}
	}
