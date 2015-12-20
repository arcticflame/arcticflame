<?php
class ValidateLogin {
	private $con;

	public function __construct($array) {
		$this->con = new Connection($array);
	}

	public function check($username, $password) {
		if(!$this->checkUser($username))
			return false;

		if(!$this->checkPassword($username, $password))
			return false;

		return true;
	}

	public function setUser($username) {
		$sql = "SELECT * from users WHERE email=?";
		$q = $this->con->prepareExecute($sql, array($username));
		$res = $this->con->fetch();

		$check = $this->checkUserType($res->type);

		if($check) {
			$_SESSION['user']['name'] = $res->firstname;
			$_SESSION['user']['id'] = $res->id;

			return true;
		}

		return false;
	}

	private function checkUser($username) {
		$sql = "SELECT id from users WHERE email=?";
		$q = $this->con->prepareExecute($sql, array($username));
		$res = $this->con->fetch();

		if($res)
			return true;
		else
			return false;
	}

	private function checkPassword($username, $password) {
		$sql = "SELECT password from users WHERE email=?";
		$q = $this->con->prepareExecute($sql, array($username));

		if($q) {
			$res = $this->con->fetch();

			if(password_verify($password, $res->password))
				return true;
			else
				return false;
		}
		else
			return false;
	}

	private function checkUserType($type) {
		switch ($type) {
			case '0':
				return false;
				break;
			case '2':
				$_SESSION['admin'] = true;
				break;
			default:
				break;
		}

		return true;
	}
}