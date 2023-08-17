<?php 

session_start();
require 'includes/config.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

    if (isset($_POST["place"])) {
        $paymethod = $_POST["paymethod"];
        $baddress = $_POST["billingaddress"];
        $qty = $_POST["qty"];
        $tot = $_POST["totamount"];
        $pid = $_POST["productid"]

        $placedsql = "INSERT INTO Orders(Amount,BillingAddress,Quantity,PaymentMethod,UserID,AdminUN,ProductID) 
                        VALUES ($tot, '$baddress', $qty, '$paymethod', $UserID , 'admin', $pid)";
        if($conn->query($placedsql)){
                echo "Inserted successfully";
                header("Location:./myorders.php?message=paymentconfirmed");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./myorders.php?message=paymentfailed");

               
        }else{
            echo "Error:". $conn->error;
            header("Location:./myorders.php?message=paymentfailed");
        }
        

        
        
} 
else{
    header("Location:./myorders.php?message=accessesdenied");
}


$conn->close();
include 'footer.php';
?>