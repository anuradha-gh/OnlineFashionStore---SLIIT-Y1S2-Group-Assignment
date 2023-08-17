<?php

session_start();
require './../includes/config.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];



$title = "Add New Product";
include 'header.php';
?>

    <div class="user-content">
        <center>
        <h2>Add New Product</h2>
        </center>

    <form action="publish.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Add New Product</legend>
            <label for="productname">Product Name:</label>
            <input type = "text" name = "productname" id = "productname" required><br>
            <label for="productdesc">Product Description:</label>
            <textarea name="productdesc" id="productdesc"></textarea><br>
            <label for="image">Select Product Image:</label>
            <input type="file" name="image" id="image" required><br>
            <label for="Category">Choose Category:</label><br>
            <label for="Main Category">Main Categories:</label>
            <select name="maincategory" id="maincategory" onchange="updateSubcategory()" required>
                <option value="men">Men</option>
                <option value="female">Female</option>
                <option value="kids">Kids</option>
            </select>

            <label for="Sub Category">Sub Category:</label>
            <select name="subcategory" id="subcategory" required>
                <option value="tshirt">T-Shirt</option>
                <option value="trouser">Trouser</option>
                <option value="shirt" data-category="men">Shirt</option>
                <option value="frock" data-category="female">Frock</option>
                <option value="watches" data-category="men">Watches</option>
                <option value="boys" data-category="kids">Boys</option>
                <option value="girls" data-category="kids">Girls</option>
                <option value="accessories" data-category="women">Accessories</option>
                <option value="accessories" data-category="men">Accessories</option>
                <option value="accessories" data-category="kids">Accessories</option>
                <option value="watches" data-category="women">Watches</option>
                <option value="watches" data-category="kids">Watches</option>
                <option value="footwear" data-category="men">Footwear</option>
                <option value="footwear" data-category="women">Footwear</option>
                <option value="blouse" data-category="women">Blouse</option>
                <option value="short" data-category="women">Shorts</option>
                <option value="short" data-category="men">Shorts</option>
               
                
            </select><br>
            <label for = "Size">Size:</label><br>
         
            XS:<input type="radio" id="rate" name="size" value = "XS">&nbsp;
            S:<input type="radio" id="rate" name="size" value = "S">&nbsp;
            M:<input type="radio" id="rate" name="size" value = "M">&nbsp;
            L:<input type="radio" id="rate" name="size" value = "L">&nbsp;
            XL:<input type="radio" id="rate" name="size" value = "XL">&nbsp;
            No Size:<input type="radio" id="rate" name="size" value = "NA" checked><br>
            <label for = "Brand">Brand:</label><br>
            <input type = "text" name = "brand" id = "brand"><br>

            <label for = "price">Price:</label><br>
            Rs:<input type = "number" name = "price" id = "price" required>.00<br>
            <input type="checkbox" id="agree" name="agree" value="agree" required>
            <label for="agree"> Confirm Product Details</label><br>
            <input type="submit" name="publish" value="Publish">
        </fieldset>
    </form>



        

    </div>


<?php 

$conn->close();
include 'footer.php';

?>