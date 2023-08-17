<?php

session_start();
require './../includes/config.php';
require 'includes/adminfunction.inc.php';

if(isset($_SESSION["AdminUN"]) & !empty($_SESSION["AdminUN"])){
    header("Location: index.php");
}


$title = "Log IN";?>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="styles/styles.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  
  </head>

<body>
<div class = "user-header">
<img src = "./images/logow.png" width = "100px">
  <center>
  
  <h1>Admin Dashboard</h1>
  </center>
</div>

<div class="login-form">
<center><h2 style = "color:black">Admin Login</h2>
    <img src = "./images/user.png" width = "80" >
</center>
<form action="includes/login.inc.php" method = "post">
    <input type="text" id = "username" name ="username" placeholder="username">
    <input type="password" id = "password" name ="pwd" placeholder="password">
    <button name = "login" type="submit">login</button>
</form>
</div>
<?php
if(isset($_GET["error"])){
	if($_GET["error"]=="emptyinput"){
		echo'<div class = "error">fill all</div>';
	}elseif($_GET["error"]=="emptyinput"){
		echo'<div class = "error">fill all</div>';
	}elseif($_GET["error"]=="none"){
		echo'<div class = "error">account created successfully</div>';
	}
}
?>

<?php
include 'footer.php';

?>