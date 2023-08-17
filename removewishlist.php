<?php

session_start();
require 'includes/config.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

if((isset($_GET['wishid']))&(isset($_GET['userid']))&($UserID == $_GET['userid'])){
    $wishid = $_GET['wishid'];
    $delwishsql = "DELETE FROM Wishlist WHERE WishlistID=$wishid" ;
        if($conn->query($delwishsql)){
                echo "Removed";
                header("Location:./mywishlist.php?message=removed");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./mywishlist.php?message=removefailed");
        }
   



}else{
    header("Location:./mywishlist.php?message=accessesdenied");
}


$conn->close();
?>