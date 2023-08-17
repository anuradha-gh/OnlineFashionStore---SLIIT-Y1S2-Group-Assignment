<?php

session_start();
require './../includes/config.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];

$title = "Manage Orders";
include 'header.php';
?>

    <div class="user-content">
        <center>
        <h2>My Orders</h2>
        <img src = "./../images/checkout.png"/>
        </center>

        <?php
          if(isset($_GET["message"])){
            if($_GET["message"]=="productnotfound"){
              echo'<div class = "message error">Product Not Found!</div>';
            }elseif($_GET["message"]=="orderstatusupdated"){
              echo'<div class = "message success">Order Status Updated!</div>';
            }elseif($_GET["message"]=="orderstatusfailed"){
              echo'<div class = "message error">Failed To Update order Status</div>';
            }elseif($_GET["message"]=="accessesdenied"){
              echo'<div class = "message error">suspicious attempt detected!</div>';

          }
        }
        

      $ordersql= "SELECT O.*, P.ProductName FROM Orders O,Product P WHERE P.ProductID = O.ProductID ORDER BY O.OrderID DESC;";
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
                  <td><?php echo $orders["PaymentMethod"] ?></td>
                  <td><?php echo $orders["Amount"] ?></td>
                  <td><?php echo $orders["OrderStatus"] ?></td>
                  <td>
                      <a href = "manageorder.php?productid=<?php echo $orders['ProductID']."&orderid=".$orders['OrderID']."&userid=".$orders['UserID'];?>"class="button button-edit">Update Order Status</a>

                      
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