<?php
include_once 'db.php';
class User{
	private $conn=NULL;
	private $name=NULL;
	private $email=NULL;
	public function __construct(){
		$db=new DB;
		$this->conn=$db->getDB();
	}
	
	public function insertUser($name,$email,$password){
		$sql="INSERT INTO users(name,email,password)values('$name','$email','$password')";
		$result=mysql_query($sql);
		$this->name=$name;
		$this->email=$email;
	}
	
	public function authenticateUser($email,$password){
		$sql="SELECT * FROM users where email='$email' && password='$password'";
		$result=mysql_query($sql);
		while($row = mysql_fetch_array($result)) {
			$this->name=$row['name'];
			$this->email=$row['email'];
			return true;
		}
		return false;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getEmail(){
		return $this->email;
	}
}
?>