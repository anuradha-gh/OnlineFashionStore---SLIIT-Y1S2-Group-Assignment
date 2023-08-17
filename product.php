<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(isset($_SESSION["email"]) & !empty($_SESSION["email"])){
    $UserID = $_SESSION["uid"];
    $fname = $_SESSION["fname"];
}else{
    $UserID = 0;
}


if((isset($_GET['id'])) & !empty($_GET['id'])){
    $pid = $_GET['id'];

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
    header("Location:./index.php?message=productnotfound");
    } 
    foreach ($products as $products):
        $productname = $products["ProductName"];
        $productdesc = $products["ProductDesc"];
        $image = $products["filepath"];
        $imagealt = $products["filename"];
        $price = $products["Price"];
        $brand = $products["Brand"];
        $size = $products["Size"];
        $category = $products["Category"];
        $subcategory= $products["SubCategory"];
        $availability = $products["Availability"];
        $title = $products["ProductName"];
        $meta = $products["ProductDesc"];

    endforeach;


include 'header.php';
?>

<div class="content">
    <div class="container">
        <div class="product-image">
        <img src="<?php echo $image?>" alt = "<?php echo $imagealt?>" width = "500">
        </div>
        <div class="product-info">
        <h2 style = "text-align:center;"><?php echo $productname?></h2>
        <hr><h3>Rs.<?php echo $price?>.00</h3>
        <p><?php echo $productdesc?></p>
        <div class="label-buttons">
        <a href = "size.php?size=<?php echo $size;?>"><button class="label-button">Size: <?php echo $size;?></button></a>
        <a href = "brand.php?brand=<?php echo $brand;?>"><button class="label-button">Brand: <?php echo $brand;?></button></a>
        </div>

        
        <?php
        if($availability=="InStock"){
            echo '<div class="instock-label"><span>Availability: In Stock</span></div>';
        }else{
            echo '<div class="outofstock-label"><span>Availability: Out Of Stock</span></div>';

        }

        ?>

        <form action="addtocart.php" method="GET">
        <input type="hidden" name="productid" value="<?php echo $pid;?>">
        <input type="hidden" name="userid" value="<?php echo $UserID;?>">
		<h4>Quantity:</h4><select name="qty">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>
        <hr>				
        
            <a href = "addtowishlist.php?productid=<?php echo $pid?>&userid=<?php echo $UserID?>"><input type = "button" name = "addtowishlist" value ="Add to Wishlist"/></a>
            <input type="submit" value="Add to Cart">
        </form>
        <hr>
        <div class="category-buttons">
        <h4>Categories:</h4>
          <a href = "category.php?cat=<?php echo $category;?>"><button class="category-button"><?php echo $category;?></button></a>
          <a href = "category.php?subcat=<?php echo $subcategory;?>"><button class="category-button"><?php echo $subcategory;?></button></a>
          <a href = "subcategory.php?cat=<?php echo $category;?>&subcat=<?php echo $subcategory;?>"><button class="category-button"><?php echo $category." ".$subcategory;?></button></a>
       
        </div>
  
        </div>
    </div>
</div>
<h3 style="text-align:center;">Customer Feedbacks</h3>

<?php

    $feedbacksql = "SELECT F.*, U.* FROM Feedback F,Users U WHERE F.ProductID = '$pid' AND U.UserID=F.UserID ORDER BY F.FID DESC;";
    $feedbackres = $conn->query($feedbacksql);

    
    if ($feedbackres->num_rows> 0)
    {
        while($row = $feedbackres->fetch_assoc())
        {
            ?>
            <div class="feedback-card">
                <img src="<?php gendercheck($conn,$row["UserID"]);?>" alt="Profile Image">
                <div class="user-details">
                <div class="user-name"><?php echo $row["FirstName"]." ".$row["LastName"];?></div>
                <div class="date-time"><?php echo $row["Date"];?></div>
                <div class="user-rating"><?php echo productrating($row["slevel"]);?></div>
                <div class="feedback-message"><?php echo $row["Comment"];?></div>
                </div>
            </div>
         <?php   
        }
    }
    else
    {
    ?>
        <div class='feedback-message'>No Feedbacks Yet</div>;
    <?php
    } 

}else
{
    
    header("Location:./index.php?message=productnotfound");


} 


$conn->close();
include 'footer.php';

?>