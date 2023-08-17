<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

$title = "Hello"." ".$fname;
$meta = ".";
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
        <h2>My Details</h2>
        <img src = "./images/user.png"/>
        </center>

        <?php
        if(isset($_GET["message"])){
          if($_GET["message"]=="failedtoupdateprofile"){
            echo'<div class = "message error">failed to update user data</div>';
          }elseif($_GET["message"]=="userprofileupdated"){
            echo'<div class = "message success">User Details Updated successfully! </div>';
          }
        }
       
      $usersql = "SELECT * FROM Users WHERE UserID = '$UserID'";
      $result = $conn->query($usersql);

      if ($result->num_rows> 0)
        {
            while($row = $result->fetch_assoc())
            {
              $profile[]=$row;
            }
    
        }
        else
        {
        echo "No results";
        }

        
foreach ($profile as $profile):?>
  <div class="detail-container">
    <h2>My Details</h2>
    <p><i class="fas fa-user icon"></i><strong>User ID:</strong><?php echo $profile["UserID"];?></p>
    <p><i class="fas fa-user icon"></i><strong>Name:</strong> <?php echo $profile["FirstName"]." ".$profile["LastName"];?></p>
    <p><i class="fas fa-phone icon"></i><strong>Phone:</strong><?php echo $profile["Phone"];?></p>
    <p><i class="fas fa-home icon"></i><strong>Address:</strong> <?php echo $profile["Address"];?></p>
    <p><i class="fas fa-city icon"></i><strong>City:</strong><?php echo $profile["City"];?></p>
    <p><i class="fas fa-mail-bulk icon"></i><strong>Postal Code:</strong> <?php echo $profile["PostalCode"];?></p>
  
  </div>
  <form action = "" method = "POST">
  <div class="detail-container" style ="float:right;">
    <h2>Edit Details</h2>
    <p><i class="fas fa-user icon"></i><strong>FirstName:</strong></p><input type = "text" name= "finame" value="<?php echo $profile["FirstName"];?>">
    <p><i class="fas fa-user icon"></i><strong>LastName:</strong></p><input type = "text" name= "laname" value="<?php echo $profile["LastName"];?>">
    <p><i class="fas fa-phone icon"></i><strong>Phone:</strong></p><input type="tel" name="phone" value="<?php echo $profile["Phone"];?>">
    <p><i class="fas fa-home icon"></i><strong>Address:</strong></p> <textarea id="address" name="address" rows="4" cols="50"><?php echo $profile["Address"];?></textarea>
    <p><i class="fas fa-city icon"></i><strong>City:</strong></p><input type = "text" name= "city" value="<?php echo $profile["City"];?>">
    <p><i class="fas fa-mail-bulk icon"></i><strong>Postal Code:</strong> <input type ="number" id="postalcode" name="postalcode" value = "<?php echo $profile["PostalCode"];?>">
    <br><div class = "product-info"><input type="submit" name = "submit" value="UPDATE"></div>
  
  </div>
  </form>

<?php endforeach;?>
        
      
    </div>
  </div>
<?php

    if (isset($_POST["submit"])) {
        $finame = $_POST["finame"];
        $laname = $_POST["laname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $postalcode = $_POST["postalcode"];


        $updateusersql = "UPDATE Users SET FirstName = '$finame', LastName = '$laname', Phone = $phone, Address = '$address', City = '$city', PostalCode = $postalcode WHERE UserID = $UserID;";
        if($conn->query($updateusersql)){
                
                header("Location:./profile.php?message=userprofileupdated");
                }
                else{
                
                header("Location:./profile.php?message=failedtoupdateprofile");

               
        }

        
        
} 



$conn->close();
include 'footer.php';

?>