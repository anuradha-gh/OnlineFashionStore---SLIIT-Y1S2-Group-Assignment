<?php

session_start();
require_once 'includes/config.php';

$title = "FanCeylon Online Fashion Store";
include 'header.php';



?>


<div class="slideshow-container">
  <div class="slide">
    <img src="./images/images1.png" alt="Slide 1">
  </div>
</div>


  
   <div class="categories-section">
    <center><h2>Categories</h2></center>
	<hr>
    <div class="category-column">
      <a href="category.php?cat=men">
        <img src="./images/m.png" alt="Category 1">
        <h2>MEN</h2>
      </a>
    </div>
    <div class="category-column">
      <a href="category.php?cat=women">
        <img src="./images/f.png" alt="Category 2">
        <h2>WOMEN</h2>
      </a>
    </div>
    <div class="category-column">
      <a href="category.php?cat=kids">
        <img src="./images/k.png" alt="Category 3">
        <h2>KIDS</h2>
      </a>
    </div>
  </div>


  <?php
    $productssql= "SELECT * FROM Product ORDER BY ProductID DESC LIMIT 6;";
    $presult = $conn->query($productssql);

      if ($presult->num_rows> 0)
          {
              while($row = $presult->fetch_assoc())
              {
                  $items[]=$row;
                
              }?>
              <div class="items">

              <center><h2>New Arrivals</h2></center>
              
              <div class="product-items">
              <?php foreach ($items as $items): ?>
                <div class="product-item">
              
              
                  <img src="<?php echo $items['filepath']; ?>" alt="<?php echo $items['filename']; ?>">
                  <h4><?php echo $items['ProductName']; ?></h4>
                  <h3>Rs.<?php echo $items['Price']; ?>.00</h3>
                  <a href = "product.php?id=<?php echo $items['ProductID'];?>"><button>View Item</button></a>
                </div>
               <?php endforeach; ?>
              
              
              
              </div>
              </div>     
  
  
  <div class="marquee-container">
    <div class="marquee">
      <img src="./images/adidas.png" alt="Brand 1">
      <img src="./images/puma.png" alt="Brand 2">
      <img src="./images/moose.png" alt="Brand 3">
      <img src="./images/gucci.png" alt="Brand 4">
      <img src="./images/nike.png" alt="Brand 5">
	  <img src="./images/polo.png" alt="Brand 6">
    </div>
  </div>
<?php

}else{
  header("Location:./manageproduct.php?message=accessesdenied");
}
$conn->close();
include 'footer.php';
?>