<?php

session_start();
require './../includes/config.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];

if((isset($_GET['productid']))){
    $pid = $_GET['productid'];



$title = "Edit Product Details";
include 'header.php';
?>

<div class="user-content">
        <center>
        <h2>Edit Product Details</h2>
        </center>
<?php
    $productssql= "SELECT * FROM Product WHERE ProductID = $pid;";
    $presult = $conn->query($productssql);

      if ($presult->num_rows> 0)
          {
              while($row = $presult->fetch_assoc())
              {
                  $productdet[]=$row;
                
              }
                foreach ($productdet as $productdet): ?>

<center><h3><?php echo $productdet["ProductName"]?></h3>   
        <img src="./../<?php echo $productdet["filepath"]?>"/>
        <p><?php echo $productdet["ProductDesc"]?></p>
        <hr>
        <p><b>Price: Rs.<?php echo $productdet["Price"]?>.00</b></p>
</center>


    <form method= "POST" action ="">
        <fieldset>
            <legend>Edit Product Details</legend>
            <label for="productname">Product Name:</label>
            <input type = "text" name = "productname" id = "productname" value ="<?php echo $productdet["ProductName"]?>"><br>
            <label for="productdesc">Product Description:</label>
            <textarea name="productdesc" id="productdesc"><?php echo $productdet["ProductDesc"]?></textarea><br><br>
            <label for="availability">Product Availability:</label>
            <select name="availability" id="av" required>
                <option value="InStock"<?php if ($productdet["Availability"] == "InStock") echo ' selected="selected"'; ?>>InStock</option>
                <option value="OutOfStock"<?php if ($productdet["Availability"] == "OutOfStock") echo ' selected="selected"'; ?>>OutOfStock</option>
            </select><br>
            <label for = "Size">Size:</label><br>
         
            XS:<input type="radio" id="rate" name="size" value = "XS"<?php if ($productdet["Size"] == "XS") echo ' checked = "checked"'; ?>>&nbsp;
            S:<input type="radio" id="rate" name="size" value = "S"<?php if ($productdet["Size"] == "S") echo ' checked="checked"'; ?>>&nbsp;
            M:<input type="radio" id="rate" name="size" value = "M"<?php if ($productdet["Size"] == "M") echo ' checked="checked"'; ?>>&nbsp;
            L:<input type="radio" id="rate" name="size" value = "L"<?php if ($productdet["Size"] == "L") echo ' checked="checked"'; ?>>&nbsp;
            XL:<input type="radio" id="rate" name="size" value = "XL"<?php if ($productdet["Size"] == "XL") echo ' checked="checked"'; ?>>&nbsp;
            No Size:<input type="radio" id="rate" name="size" value = "NA" <?php if ($productdet["Size"] == "NA") echo ' checked="checked"'; ?>><br>

            <label for = "price">Price:</label><br>
            Rs:<input type = "number" name = "price" id = "price" value = "<?php echo $productdet["Price"]?>" required>.00<br><br>
            <input type="checkbox" id="agree" name="agree" value="agree" required><label for="agree"> Confirm Product Details</label><br>
            
            <input type="submit" name="update" value="Update Product">
        </fieldset>
    </form>
</div>
    <?php endforeach; 
    }


    if (isset($_POST["update"])) {
        $pname = $_POST["productname"];
        $pdesc = $_POST["productdesc"];
        $pav = $_POST["availability"];
        $psize = $_POST["size"];
        $pprice = $_POST["price"];


        $updatesql = "UPDATE Product SET ProductName = '$pname', ProductDesc = '$pdesc', Availability = '$pav', Size = '$psize' WHERE ProductID = $pid;";
        if($conn->query($updatesql)){
                
                header("Location:./manageproducts.php?message=added");
                }
                else{
                
                header("Location:./manageproducts.php?message=failed");

               
        }

        
        
} 

?>



<?php 
}else{
    header("Location:./manageproduct.php?message=accessesdenied");
}

$conn->close();
include 'footer.php';

?>