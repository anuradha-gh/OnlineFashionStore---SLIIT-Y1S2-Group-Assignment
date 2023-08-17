<?php
if(isset($_POST["login"]))
{
	$adminun = $_POST["username"];
	$pwd=$_POST["pwd"];
	
	require '../../includes/config.php';
	require 'adminfunction.inc.php';
	
	if(emptyInputLogin($adminun,$pwd)!==false){
		header("Location:../login.php?error=emptyinputs");
		exit();
	}
	
	loginAdmin($conn,$adminun,$pwd);
}
else{	
		header('Location:../login.php');
}