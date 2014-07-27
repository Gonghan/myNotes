<?php
include_once '../user.php';
session_start();
$user=new User;
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
if(empty($password) || empty($email) || empty($name)){
	echo 'false';
}
$user->insertUser($name,$email,$password);
$_SESSION['name']=$user->getName();
$_SESSION['email']=$user->getEmail();
echo $name;
?>