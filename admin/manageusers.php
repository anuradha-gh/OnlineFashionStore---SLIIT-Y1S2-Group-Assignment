<?php

session_start();
require './../includes/config.php';
require 'includes/adminfunction.inc.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];

$title = "Manage Users";
include 'header.php';
?>

    <div class="user-content">
        <center>
        <h2 style = "color:black;">Manage Users</h2>

        <a href = "./../signup.php "class="button button-edit">Add New User</a><br>
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
            }elseif($_GET["message"]=="removefailed"){
            echo'<div class = "message error">Error: Cant Remove Product</div>';
            }elseif($_GET["message"]=="removed"){
            echo'<div class = "message success">Product Removed Successfully!</div>';
            }elseif($_GET["message"]=="added"){
            echo'<div class = "message success">New Product Added Successfully!</div>';
            }elseif($_GET["message"]=="failedtoupdateprofile"){
            echo'<div class = "message error">failed to update user data</div>';
            }elseif($_GET["message"]=="userprofileupdated"){
            echo'<div class = "message success">User Details Updated successfully! </div>';
            }
            
        }

       
        

      $userssql= "SELECT * FROM Users ORDER BY UserID DESC;";
      $uresult = $conn->query($userssql);

      if ($uresult->num_rows> 0)
          {
              while($row = $uresult->fetch_assoc())
              {
                  $userdet[]=$row;
                
              }?>
              <table>
                  <tr>
                  <th>User ID</th>
                  <th>User</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Actions</th>
                  </tr>
                  <?php foreach ($userdet as $userdet): ?>
                  <tr>
                  <td><?php echo $userdet["UserID"] ?></td>
                  <td>
                  <?php echo $userdet["FirstName"]." ".$userdet["LastName"] ?><br><br><img width = "150" src="<?php echo gendercheck($conn,$userdet["UserID"]);?>"/><br>
                    <p><?php echo $userdet["Email"];?></p>
                </td>
                  <td><?php echo $userdet["Phone"];?></td>
                  <td><?php echo $userdet["Address"] ?></td>
                  <td>
                      <a href = "edituser.php?userid=<?php echo $userdet['UserID'];?>"class="button button-edit">Edit User</a>
                      <a href = "deleteuser.php?userid=<?php echo $userdet['UserID'];?>"class="button button-delete">Delete User</a>

                      
                  </td>
                  </tr>
                  <?php endforeach; ?>
                
            </table>

          <?php
          }
          else
          {
          echo "No Users";
          }
    
      ?>

    </div>
  </div>

<?php 
$conn->close();
include 'footer.php';

?>