<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

$title = $fname."'s Orders";
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
        <h2>My Orders</h2>
        <img src = "./images/checkout.png"/>
        </center>

        <?php
          if(isset($_GET["message"])){
            if($_GET["message"]=="productnotfound"){
              echo'<div class = "message error">Product Not Found!</div>';
            }elseif($_GET["message"]=="feedbacksubmitted"){
              echo'<div class = "message success">Feedback Submitted successfully!</div>';
            }elseif($_GET["message"]=="failedtosubmitfeedback"){
              echo'<div class = "message error">account createdsuccessfully!</div>';
            }elseif($_GET["message"]=="accessesdenied"){
              echo'<div class = "message error">suspicious attempt detected!</div>';
            }elseif($_GET["message"]=="cancelled"){
              echo'<div class = "message success">Order Cancelled successfully!</div>';
            }elseif($_GET["message"]=="cancelfailed"){
              echo'<div class = "message error">Order Cancelation Failed!</div>';
            }elseif($_GET["message"]=="paymentfailed"){
              echo'<div class = "message error">Order Placement Failed!</div>';
            }elseif($_GET["message"]=="paymentconfirmed"){
              echo'<div class = "message success">Order Placed successfully!</div>';
            }
          }
        

      $ordersql= "SELECT O.*, P.ProductName FROM Orders O,Product P WHERE O.UserID = '$UserID' AND O.ProductID=P.ProductID ORDER BY O.OrderID DESC;";
      $orderresult = $conn->query($ordersql);

      if ($orderresult->num_rows> 0)
          {
              while($row = $orderresult->fetch_assoc())
              {
                  $orders[]=$row;
                
              }?>
              <table>
                  <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Amount(Rs)</th>
                  <th>Order Status</th>
                  <th>Actions</th>
                  </tr>
                  <?php foreach ($orders as $orders): ?>
                  <tr>
                  <td><?php echo $orders["OrderID"] ?></td>
                  <td><?php echo $orders["OrderDate"] ?></td>
                  <td><?php echo $orders["ProductName"] ?></td>
                  <td><?php echo $orders["Quantity"] ?></td>
                  <td><?php echo $orders["Amount"] ?></td>
                  <td><?php echo $orders["OrderStatus"] ?></td>
                  <td>
                      
                      <div id="edit-btn">
                      <a href = "addfeedback.php?productid=<?php echo $orders['ProductID']."&userid=".$orders['UserID']?>"><button id="edit-btn">Add Feedback</button></a>
                      
                      </div>
                      <div id = "delete-btn">
                      <a href = "cancelorder.php?orderid=<?php echo $orders['OrderID']."&userid=".$orders['UserID']?>"><button id="delete-btn">Cancel Order</button></a>
                      </div>
                      
                  </td>
                  </tr>
                  <?php endforeach; ?>
                
            </table>

          <?php
          }
          else
          {
          echo "You Dont Have Any Orders Yet";
          }
    
      ?>

    </div>
  </div>

<?php 
$conn->close();
include 'footer.php';

?>