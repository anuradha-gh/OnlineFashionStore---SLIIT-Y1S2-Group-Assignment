<?php

session_start();
require './../includes/config.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];

if((isset($_GET['userid']))){
    $uid = $_GET['userid'];
    $delproductsql = "DELETE FROM Users WHERE UserID=$uid";
        if($conn->query($delproductsql)){
                echo "Removed";
                header("Location:./manageusers.php?message=removed");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./manageusers.php?message=removefailed");
        }
   



}else{
    header("Location:./manageusers.php?message=accessesdenied");
}


$conn->close();
?>