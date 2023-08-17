<?php

session_start();
require './../includes/config.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];

$title = "Admin Dashboard";
include 'header.php';
?>


    <div class="user-content">

        <?php
        if(isset($_GET["message"])){
          if($_GET["message"]=="failedtoupdateprofile"){
            echo'<div class = "message error">failed to update user data</div>';
          }elseif($_GET["message"]=="userprofileupdated"){
            echo'<div class = "message success">User Details Updated successfully! </div>';
          }
        }
       
		$statssql = "SELECT 
		(SELECT COUNT(UserID) FROM Users) AS ucount, 
		(SELECT COUNT(ProductID) FROM Product) AS pcount, 
		(SELECT COUNT(OrderID) FROM Orders WHERE OrderStatus != 'Cancelled' AND OrderStatus != 'Declined') AS ocount, 
		(SELECT SUM(Amount) FROM Orders WHERE OrderStatus != 'Cancelled' AND OrderStatus != 'Declined') AS income,
		(SELECT COUNT(OrderID) FROM Orders WHERE OrderStatus = 'Pending') AS pending,
		(SELECT COUNT(DISTINCT SubCategory) FROM Product) AS ccount";

		$stats = $conn->query($statssql);

      if ($stats->num_rows> 0)
        {
            while($row = $stats->fetch_assoc())
            {
              $statss[]=$row;
            }
    
        }
        else
        {
			$statss[]="No results";
        echo "No results";
        }

        
foreach ($statss as $statss):?>
	
	<div class="stat-section">
    <center><h2 style = "color:black;">Analytics</h2></center>
	<hr>
    <div class="stat-column" style = "background-color:#0099ff;">
      <a href="manageusers.php">
        <img src="./images/users.png" alt="users"></a>
		<h1><?php echo $statss["ucount"];?></h1>
        <h2>Total Customers</h2>
    </div>
    <div class="stat-column" style = "background-color:#00b386;">
      <a href="manageproducts.php">
        <img src="./images/products.png" alt="products"></a>
        <h1><?php echo $statss["pcount"];?></h1>
        <h2>Total Products</h2>
      
    </div>
    <div class="stat-column" style = "background-color:#ff944d;">
      <a href="orders.php">
        <img src="./images/orders.png" alt="orders"></a>
		<h1><?php echo $statss["ocount"];?></h1>
        <h2>Orders</h2>

    </div>

	<div class="stat-column" style = "background-color:#ff4d4d;">
	<a href="orders.php">
        <img src="./images/pending.png" alt="pending"></a>
        <h1><?php echo $statss["pending"];?></h1>
        <h2>Pending Orders</h2>
    </div>
    <div class="stat-column" style = "background-color:#d24dff;">
      <a href="./../category.php">
        <img src="./images/categories.png" alt="categories"></a>
        <h1><?php echo $statss["ccount"];?></h1>
        <h2>Sub Categories</h2>
      
    </div>
    <div class="stat-column" style = "background-color:#ff4d94;">
      <a href="orders.php">
        <img src="./images/income.png" alt="income"></a>
        <h1>Rs.<?php echo $statss["income"];?>.00</h1>
        <h2>Total Income</h2>
      
    </div>
  </div>

<?php endforeach;?>
        
      
    </div>
  </div>




<?php




 
$conn->close();
include 'footer.php';

?>