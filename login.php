<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(isset($_SESSION["email"]) & !empty($_SESSION["email"])){
    header("Location: profile.php");
}

$title = "Log IN";
include 'header.php';

?>
<div>
	<div class = "login-form">
		<center><img src = "./images/user.png" ></center>
<form action="includes/login.inc.php" method = "post">
    <input type="text" id = "email" name ="email" placeholder="email">
    <input type="password" id = "password" name ="pwd" placeholder="password">
    <button name = "submit" type="submit"><b>LOGIN</b></button>
</form>
</div>
<?php
if(isset($_GET["error"])){
	if($_GET["error"]=="emptyinput"){
		echo'<div class = "error">fill all</div>';
	}elseif($_GET["error"]=="emptyinput"){
		echo'<div class = "message error">fill all</div>';
	}elseif($_GET["error"]=="none"){
		echo'<div class = "message success">account created successfully</div>';
	}elseif($_GET["error"]=="mustlogin"){
		echo'<div class = "message error">You must login to access that page</div>';

	}
}
?>

<?php
include 'footer.php';

?>
