<?php

session_start();
require './../includes/config.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];

if((isset($_GET['productid']))){
    $pid = $_GET['productid'];
    $delproductsql = "DELETE FROM Product WHERE ProductID=$pid";
        if($conn->query($delproductsql)){
                echo "Removed";
                header("Location:./manageproducts.php?message=removed");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./manageproducts.php?message=removefailed");
        }
   



}else{
    header("Location:./manageproduct.php?message=accessesdenied");
}


$conn->close();
?>