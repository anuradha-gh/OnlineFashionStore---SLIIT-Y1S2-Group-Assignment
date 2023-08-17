<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(isset($_SESSION["email"]) & !empty($_SESSION["email"])){
    header("Location: profile.php");
}

$title = "Sign Up";
include 'header.php';

?>
<center><h2>Sign Up</h2></center>
<div class = "login-form">
<form action="includes/signup.inc.php" method = "post">
	<input type="text" id = "fname" name ="fname" placeholder="First Name" required>
    <input type="text" id = "lname" name ="lname" placeholder="Last Name"><br>
	<input type="text" id ="email" name ="email" placeholder="Email" required>
	<input type="tel" id="phone" name="phone" placeholder="Phone"><br>
	<input type="password" id = "pwd" name ="pwd" placeholder="password">
	<input type="password" id = "repassword" name ="repassword" placeholder="re enter password"><br><br>
	Gender:<br>
	Male:<input type="radio" id="male" name="gender" value="Male" required>
	Female:<input type="radio" id="female" name="gender" value="Female"><br><br>
	Date Of Birth:<input type ="date" id = "dob" name = "dob" placeholder="Last Name" required><br>
	<input type="text"id="address"name="address" placeholder="Address" required>
	<input type="text"id="city"name="city" placeholder="City" required>
	<input type ="number" id="postalcode" name="postalcode" placeholder="Postal Code" required>
	<br><br>

	<input type ="checkbox" id="confirm" name="confirm" checked = "checked" required>By clicking I agreed to <a href="termsandcondition.php">terms & conditions</a> and  <a href="privacypolicy.php">Privacy Policy</a><br>
    
    <button name = "submit" type="submit"><b>Register</b></button>
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
include_once 'footer.php';
?>
