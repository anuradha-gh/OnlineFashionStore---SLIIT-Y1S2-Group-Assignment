<?php

session_start();
require 'includes/config.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

if((isset($_GET['productid']))&(isset($_GET['userid']))&(isset($_GET['orderid']))&($UserID == $_GET['userid'])){
    $pid = $_GET['productid'];
    $cid = $_GET['cartid'];

    $checkoutsql = "SELECT U.*, P.*, C.* FROM Users U, Product P, Cart C WHERE P.ProductID = '$pid' AND C.CartID = '$cid' AND U.UserID = '$UserID'";

    $checkoutresult = $conn->query($checkoutsql);

    
    if ($checkoutresult->num_rows> 0)
    {
        while($row = $checkoutresult->fetch_assoc())
        {
            $orderdet[]=$row;
            
        }
    }
    else
    {
    echo "Product Not Found";
    header("Location:./mycart.php?message=productnotfound");
    } 
   
$title = "Product Checkout";
$meta=".";
include 'header.php';
?>
<div class="order-img">
    <center><h2>CHECKOUT</h2></center>
	<hr>
    <div class="order-column">
        <img src="./images/cart.png" alt="mycart">
        <h2>Cart</h2>

    </div>
    <div class="order-column">
        <img src="./images/checkout.png" alt="checkout">
        <h2>Checkout</h2>

    </div>
    <div class="order-column">

        <img src="./images/payment.png" alt="Category 3">
        <h2>Payment</h2>

    </div>
  </div>



<?php foreach ($orderdet as $orderdet):?>
  <div class="billing-container">
    <h2>Billing Details</h2>
    <p><i class="fas fa-user icon"></i><strong>User ID:</strong><?php echo $orderdet["UserID"];?></p>
    <p><i class="fas fa-user icon"></i><strong>Name:</strong> <?php echo $orderdet["FirstName"]." ".$orderdet["LastName"];?></p>
    <p><i class="fas fa-phone icon"></i><strong>Phone:</strong><?php echo $orderdet["Phone"];?></p>
    <p><i class="fas fa-home icon"></i><strong>Address:</strong> <?php echo $orderdet["Address"];?></p>
    <p><i class="fas fa-city icon"></i><strong>City:</strong><?php echo $orderdet["City"];?></p>
    <p><i class="fas fa-mail-bulk icon"></i><strong>Postal Code:</strong> <?php echo $orderdet["PostalCode"];?></p>
</div>
  

  <div class="order-container">
    <div class="order-item">
      <h3 style = "text-align:center;">Your Order</h3><hr>
      <center><img class="order-image" src="<?php echo $orderdet["Image"];?>" alt="Product Image"></center>
      <div class="order-details">
        <center><h3><?php echo $orderdet["ProductName"];?></h3></center><hr>
        <p><strong>Unit Price:</strong> RS.<?php echo $orderdet["Price"];?>.00</p>
      </div>
      <div class="order-quantity">
        <strong>Qty:</strong> <?php echo $orderdet["Quantity"];?>
      </div>
      <div class="order-price">
        Rs.<?php echo $orderdet["TotalAmount"];?>.00
      </div>
    </div>

    <div class="total-amount">

    <hr><p><strong>Total:</strong> Rs.<?php echo $orderdet["TotalAmount"];?>.00</p><hr><hr style = "border: 3px solid black;">
    </div>
  </div>
  
<?php 

$address = $orderdet["Address"];
$qty = $orderdet["Quantity"];



endforeach;?>

        <div class = "bill-content">
          
          <form method = "post" action="">
            <strong><label for="billingaddressk">Billing Address:</label></strong><br>
            <textarea id="billingaddress" name="billingaddress" rows="4" cols="50"><?php echo $address;?></textarea><br>

            <input type="hidden" name="qty" value="<?php echo $qty;?>">
            <input type="hidden" name="productid" value="<?php echo $pid;?>">
            <strong><label for="pm">Payment Method:</label></strong><br>
            <div class = "paymethod">
            <input type="radio" id="option1" name="paymethod" value="CashOnDelivery" checked>
            <label for="option1"><img src ="./images/cash-on-delivery.png"/>Cash On Delivery</label>
          
            <input type="radio" id="option2" name="paymethod" value="CreditDebitCard">
            <label for="option2"><img src ="./images/card.png"/>Credit Or Debit Card</label>

            <input type="radio" id="option3" name="paymethod" value="Paypal">
            <label for="option3"><img src ="./images/paypal.png"/>PayPal</label>
          </div>
          <div class = "product-info"><input type="submit" name = "place" value="PLACE ORDER"></div>
        </form>
        
        </div>




        
<?php 
    if (isset($_POST["place"])) {
        $paymethod = $_POST["paymethod"];
        $baddress = $_POST["billingaddress"];
        $qty = $_POST["qty"];

        $placedsql = "INSERT INTO Orders(Comment,slevel,UserID,ProductID,AdminUN) 
                        VALUES ('$feedback', $rate, $UserID ,$pid , 'admin')";
        if($conn->query($placedsql)){
                echo "Inserted successfully";
                header("Location:./myorders.php?message=feedbacksubmitted");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./myorders.php?message=paymentfailed");

               
        }

        
        
} 
}else{
    header("Location:./mycart.php?message=accessesdenied");
}


$conn->close();
include 'footer.php';
?>