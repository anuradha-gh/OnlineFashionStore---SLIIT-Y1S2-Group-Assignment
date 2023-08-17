<?php

require './../includes/config.php';

if (isset($_POST['publish'])) {
  $filename = $_FILES['image']['name'];
  $tmpFilePath = $_FILES['image']['tmp_name'];
  $pname = $_POST['productname'];
  $pdesc = $_POST['productdesc'];
  $mcategory = $_POST['maincategory'];
  $scategory = $_POST['subcategory'];
  $psize = $_POST['size'];
  $pbrand = $_POST['brand'];
  $pprice = $_POST['price'];

  // Move the uploaded file to a desired directory
  $uploadDirectory = '../uploads/';
  $imageDirectory = 'uploads/';
  $uploadedFilePath = $uploadDirectory . $filename;
  $ImagePath = $imageDirectory . $filename;
  move_uploaded_file($tmpFilePath, $uploadedFilePath);

  // Insert Product Details into the database
  $addproductsql = "INSERT INTO Product (ProductName, ProductDesc, filename, filepath, Price, Brand, Size, Category, SubCategory, AdminUN) 
                  VALUES ('$pname', '$pdesc', '$filename', '$ImagePath', $pprice, '$pbrand', '$psize', '$mcategory', '$scategory', 'admin')";
  if ($conn->query($addproductsql) === FALSE) {
    echo "Error inserting data: " . $conn->error;
  }
  else{
    header("Location: manageproducts.php?message=added");


  }
}
?>
