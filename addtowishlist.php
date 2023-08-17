<?php

session_start();
require 'includes/config.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

if((isset($_GET['productid']))&(isset($_GET['userid']))&($UserID == $_GET['userid'])){
    $productid = $_GET['productid'];
    

    $productsql = "SELECT * FROM Product WHERE ProductID = '$productid'";
    $presult = $conn->query($productsql);

    
    if ($presult->num_rows> 0)
    {
        while($row = $presult->fetch_assoc())
        {
            $products[]=$row;
            
        }

    }
    else
    {
    echo "Products Not Found";
    header("Location:./mywishlist.php?message=productnotfound");
    } 

    foreach ($products as $products):
        $productname = $products["ProductName"];
        $image = $products["filepath"];
        $price = $products["Price"];
        $av = $products["Availability"];

    endforeach;


    


    $addtowishsql = "INSERT INTO Wishlist(UserID,ProductName,Image,Price,Availability) 
                        VALUES ($UserID, '$productname', '$image', $price, '$av')";
        if($conn->query($addtowishsql)){
                echo "Inserted successfully";
                header("Location:./mywishlist.php?message=addedtowishlist");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./mywishlist.php?message=failedtoaddtowishlist");

               
        }


}else{
    header("Location:./mywishlist.php?message=accessesdenied");
}


$conn->close();
?>