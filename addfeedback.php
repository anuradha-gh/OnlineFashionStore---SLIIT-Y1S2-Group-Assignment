<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

if((isset($_GET['productid']))&(isset($_GET['userid']))&($UserID == $_GET['userid'])){
    $pid = $_GET['productid'];

    $productsql = "SELECT * FROM Product WHERE ProductID = '$pid'";
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
    echo "Product Not Found";
    header("Location:./myorders.php?message=productnotfound");
    } 
   

    $title = $fname."'s Feedback";
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
        <h2>Add Feedbacks</h2>
        <img src = "./images/user.png"/>
        </center>
    <?php foreach ($products as $products): ?>
        <h3><?php echo $products["ProductName"]?></h3>   
        <img src="<?php echo $products["filepath"]?>"/>
        <p><?php echo $products["ProductDesc"]?></p>

    <?php endforeach;?>

        <form method = "post" action="">
            <label for="feedback">Feedback:</label><br>
            <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea><br>
            <label for="rating">Rating:</label><br>
            5:<input type="radio" id="rate" name="rate" value = "5">
            4:<input type="radio" id="rate" name="rate" value = "4">
            3:<input type="radio" id="rate" name="rate" value = "3">
            2:<input type="radio" id="rate" name="rate" value = "2">
            1:<input type="radio" id="rate" name="rate" value = "1"><br>
            <input type="submit" name = "submit" value="Submit">
        </form>

        </div>
</div>

<center> <p> User Profile</p></center>
        
<?php 
    if (isset($_POST["submit"])) {
        $feedback = $_POST["feedback"];
        $rate = $_POST["rate"];

        $feedbacksql = "INSERT INTO Feedback(Comment,slevel,UserID,ProductID,AdminUN) 
                        VALUES ('$feedback', $rate, $UserID ,$pid , 'admin')";
        if($conn->query($feedbacksql)){
                echo "Inserted successfully";
                header("Location:./myorders.php?message=feedbacksubmitted");
                }
                else{
                echo "Error:". $conn->error;
                header("Location:./myorders.php?message=failedtosubmitfeedback");

               
        }

        
        
} 

}else{
    header("Location:./myorders.php?message=accessesdenied");
}


$conn->close();
include 'footer.php';
?>