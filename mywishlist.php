<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

$title = $fname."'s Wishlist";
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
        <h2>My Wishlist</h2>
        <img src = "./images/wishlist.png"/><br><br>
        </center>

        <?php
          if(isset($_GET["message"])){
            if($_GET["message"]=="accessesdenied"){
              echo'<div class = "message error">suspicious attempt detected!</div>';
            }elseif($_GET["message"]=="removed"){
              echo'<div class = "message success">Product successfully! Removed from your Wishlist</div>';
            }elseif($_GET["message"]=="removefailed"){
              echo'<div class = "message error">remove product Failed!</div>';
            }elseif($_GET["message"]=="addedtowishlist"){
              echo'<div class = "message success">Product successfully!Added to your wishlist</div>';
            }elseif($_GET["message"]=="failedtoaddtowishlist"){
              echo'<div class = "message error">add product to wishlist: Failed!</div>';
            }
          }
       
$wishsql= "SELECT W.*, P.ProductID FROM  Wishlist W, Product P WHERE W.UserID = '$UserID' AND P.ProductName = W.ProductName ORDER BY W.WishlistID DESC";
$wishresult = $conn->query($wishsql);
if ($wishresult->num_rows> 0)
    {
        while($row = $wishresult->fetch_assoc())
        {
             $wish[]=$row;
           
        }
        ?>
        <table>
        <tr>
        <th>❌</th>
        <th>Product</th>
        <th>StockStatus</th>
        <th>Actions</th>
        </tr>
        <?php foreach ($wish as $wish): ?>
        <tr>
        <td><div id = "delete-btn">
            <a href = "removewishlist.php?wishid=<?php echo $wish['WishlistID']."&userid=".$wish['UserID']?>"><button id="delete-btn"><i class="fa-light fa-trash-can"></i>Remove</button></a>
            </div>
        </td>
        <td><?php echo $wish["ProductName"] ?><br><br><img width = "150" src="<?php echo $wish["Image"] ?>"/><br><br>
        <h4>Rs <?php echo $wish["Price"] ?></h4><br>
        </td>
        <td style ="color:orange;"><?php echo $wish["Availability"] ?></td>
        <td>
          <div id="view-btn">
          <a href = "product.php?id=<?php echo $wish['ProductID']?>"><button id="view-btn">View Item</button></a>    
           </div>
            
          <div id="edit-btn">
          <a href = "addtocart.php?productid=<?php echo $wish['ProductID']."&userid=".$wish['UserID']?>"><button id="edit-btn">Add To Cart</button></a>
            
          </div>
            
        </td>
        </tr>
        <?php endforeach; ?>
       
  </table> 
  <?php
}
  else
  {
  echo "No Items Added to Wishlist yet";
  }   
  ?>  
  </div>
  </div>

<?php
$conn->close();
include 'footer.php';

?>