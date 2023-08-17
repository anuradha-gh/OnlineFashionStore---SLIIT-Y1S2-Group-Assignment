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
    if(isset($_GET["qty"])){ $qty = $_GET["qty"]; }else{ $qty = 1;}
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
    header("Location:./mycart.php?message=productnotfound");
    } 

    foreach ($products as $products):
        $productname = $products["ProductName"];
        $image = $products["filepath"];
        $size = $products["Size"];
        $price = $products["Price"];
        $totprice = $price*$qty;

    endforeach;


    


    $addtocartsql = "INSERT INTO Cart(ProductName,Image,Size,Price,Quantity,TotalAmount,UserID) 
                        VALUES ('$productname', '$image', '$size', $price, $qty, $totprice, $UserID)";
        if($conn->query($addtocartsql)){
                echo "Inserted successfully";
                header("Location:./mycart.php?message=addedtocart");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./mycart.php?message=failedtoaddtocart");

               
        }


}else{
    header("Location:./mycart.php?message=accessesdenied");
}


$conn->close();
?>