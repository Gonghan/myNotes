<?php
include_once '../user.php';
session_start();
$user=new User;
$password=$_POST['password'];
$email=$_POST['email'];
if(empty($password) || empty($email)){
	echo 'false';
}
$auth=$user->authenticateUser($email,$password);
if($auth){
	$_SESSION['name']=$user->getName();
	$_SESSION['email']=$user->getEmail();
	echo $user->getName();
}else{
	echo 'false';
}

?>