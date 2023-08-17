<!DOCTYPE html>
<html>
<head>
  <?php 
  require 'includes/config.php';
  ?>
  <title><?php echo $title?></title>

  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="Online Fashion Store">
  <meta name="author" content="a">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/aboutus.css">
 
  <link rel="stylesheet" href="styles/cdnjs.cloudflare.com_ajax_libs_font-awesome_5.15.3_css_all.min.css">
  <script src = "js/faqs.js"></script>
  

  
  </head>
<body>
  <?php
  if(isset($_SESSION["email"])){
    echo '<div class="top-nav">
      <ul>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="profile.php">My Profile</a></li>
        <li><a href="includes/logout.inc.php">Log Out</a></li>
      </ul>
    </div>';

    
  }else{
    echo 
    '<div class="top-nav">
      <ul>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Sign up</a></li>
      </ul>
    </div>';
    
    
    
  }
  ?>
  
  <div class="header-container">
    <div class="logo">
	<a href = "index.php"><img src ="./images/logob.png" class="logo" height = "200" width="200"/></a>
</div>
    <div class="search-bar">
    <form action="result.php" method="GET">
    <input type="text" placeholder="Search" name = "search">
      <button type="submit" name = "submit">Search</button>
    </form>
    </div>
    <div class="icon-links">
      <a href="mycart.php" class="icon-link">
        <img src="./images/cart.png" alt="My Cart" height="24" width="24">
        My Cart
      </a>
      <a href="mywishlist.php" class="icon-link">
        <img src="./images/wishlist.png" alt="My Wishlist" height="24" width="24">
        My Wishlist
      </a>
    </div>
  </div>
  
  <header>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="category.php?cat=men">Men</a></li>
        <li><a href="category.php?cat=women">Women</a></li>
        <li><a href="category.php?cat=kids">Kids</a></li>
		<li><a href="index.php">New</a></li>
      </ul>
    </nav>
  </header>
  
