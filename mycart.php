<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

$title = $fname."'s Shopping Cart";
$meta = " ";
include 'header.php';

?>
<div class = "user-header">
 <center>
  <img src = "<?php gendercheck($conn,$UserID);?>" width = "100px">
  <h1>Hello! <?php echo $fname?> Welcome Back</h1>
  </center>
</div>
  <div class="user-container">
    <div class="user-sidebar">
      <ul class="user-menu">
        <li><a href="profile.php">My Details</a></li>
        <li><a href="myorders.php">My Orders</a></li>
        <li><a href="mycart.php">My Cart</a></li>
        <li><a href="mywishlist.php">My Wishlist</a></li>
		
      </ul>
    </div>
    <div class="user-content">
        <center>
        <h2>My Cart</h2>
        <img src = "./images/cart.png"/>
        </center>
        <br><br>

        <?php
          if(isset($_GET["message"])){
            if($_GET["message"]=="accessesdenied"){
              echo'<div class = "message error">suspicious attempt detected!</div>';
            }elseif($_GET["message"]=="removed"){
              echo'<div class = "message success">Product successfully! Removed from your Cart</div>';
            }elseif($_GET["message"]=="removefailed"){
              echo'<div class = "message error">remove product Failed!</div>';
            }elseif($_GET["message"]=="addedtocart"){
              echo'<div class = "message success">Product successfully!Added to your cart</div>';
            }elseif($_GET["message"]=="failedtoaddtocart"){
              echo'<div class = "message error">add product to cart: Failed!</div>';
            }
            elseif($_GET["message"]=="productnotfound"){
              echo'<div class = "message error">Product Not Found!</div>';
            }
          }

          $cartsql= "SELECT C.*, P.ProductID FROM  Cart C, Product P WHERE C.UserID = '$UserID' AND P.ProductName = C.ProductName ORDER BY C.CartID DESC";
          $cartresult = $conn->query($cartsql);
          
           if ($cartresult->num_rows> 0)
              {
                  while($row = $cartresult->fetch_assoc())
                  {
                       $cart[]=$row;
                     
                  } ?>
                  <table>
                    <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>TotalAmount(Rs)</th>
                    <th>Actions</th>
                    </tr>
                    <?php foreach ($cart as $cart): ?>
                    <tr>
                    <td><br><br><?php echo $cart["ProductName"] ?><br><br><img width = "100" src="<?php echo $cart["Image"] ?>"/><br>
                    <h4>Rs<?php echo $cart["Price"] ?></h4><br>
                    </td>
                    <td><?php echo $cart["Quantity"] ?></td>
                    <td><?php echo $cart["Size"] ?></td>
                    <td><?php echo $cart["TotalAmount"] ?></td>
                    <td>
                        
                        <div id="edit-btn">
                        <a href = "checkout.php?productid=<?php echo $cart['ProductID']."&userid=".$cart['UserID']."&cartid=".$cart['CartID']?>"><button id="edit-btn">Checkout</button></a>
                        
                        </div>
                        <div id = "delete-btn">
                        <a href = "deletecart.php?cartid=<?php echo $cart['CartID']."&userid=".$cart['UserID']?>"><button id="delete-btn">Remove Item</button></a>
                        </div>
                        
                    </td>
                    </tr>
                    <?php endforeach; ?>
       
                  </table>

             <?php
              }
              else
              {
              echo "No Items Found on Your Cart";
              }

       
    
      

     ?> 
    </div>
  </div>

<?php
$conn->close();
include 'footer.php';

?>