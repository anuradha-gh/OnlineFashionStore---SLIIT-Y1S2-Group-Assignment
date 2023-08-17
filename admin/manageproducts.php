<?php

session_start();
require './../includes/config.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];

$title = "Manage Products";
include 'header.php';
?>

    <div class="user-content">
        <center>
        <h2 style = "color:black;">Manage Products</h2>

        <a href = "addproduct.php "class="button button-edit">Add New Product</a><br>
        </center>

        <?php
          if(isset($_GET["message"])){
            if($_GET["message"]=="productnotfound"){
              echo'<div class = "message error">Product Not Found!</div>';
            }elseif($_GET["message"]=="orderstatusupdated"){
              echo'<div class = "message success">Order Status Updated!</div>';
            }elseif($_GET["message"]=="failed"){
              echo'<div class = "message error">Failed To Update Product</div>';
            }elseif($_GET["message"]=="accessesdenied"){
              echo'<div class = "message error">suspicious attempt detected!</div>';
            }elseif($_GET["message"]=="removefailed"){
            echo'<div class = "message error">Error: Cant Remove Product</div>';
            }elseif($_GET["message"]=="removed"){
            echo'<div class = "message success">Product Removed Successfully!</div>';
            }elseif($_GET["message"]=="added"){
            echo'<div class = "message success">New Product Added Successfully!</div>';
            }
            
        }
        

      $productssql= "SELECT * FROM Product ORDER BY ProductID DESC;";
      $presult = $conn->query($productssql);

      if ($presult->num_rows> 0)
          {
              while($row = $presult->fetch_assoc())
              {
                  $productdet[]=$row;
                
              }?>
              <table>
                  <tr>
                  <th>Product ID</th>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Availability</th>
                  <th>Actions</th>
                  </tr>
                  <?php foreach ($productdet as $productdet): ?>
                  <tr>
                  <td><?php echo $productdet["ProductID"] ?></td>
                  <td>
                  <?php echo $productdet["ProductName"] ?><br><br><img width = "150" src="./../<?php echo $productdet["filepath"] ?>"/><br><br>
                    <h4>Rs <?php echo $productdet["Price"] ?></h4><br>
                    <a href = "./../product.php?id=<?php echo $productdet['ProductID'];?>"class="button button-view">View Product On Store</a>
                
                
                </td>
                  <td><?php echo $productdet["Category"] ?> , <?php echo $productdet["SubCategory"] ?></td>
                  <td><?php echo $productdet["Availability"] ?></td>
                  <td>
                      <a href = "editproduct.php?productid=<?php echo $productdet['ProductID'];?>"class="button button-edit">Edit Product</a>
                      <a href = "deleteproduct.php?productid=<?php echo $productdet['ProductID'];?>"class="button button-delete">Delete Product</a>

                      
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