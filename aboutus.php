
<?php

session_start();
require 'includes/config.php';


if(isset($_SESSION["email"]) & !empty($_SESSION["email"])){
    $UserID = $_SESSION["uid"];
    $fname = $_SESSION["fname"];
}else{
    $UserID = 0;
}

$title = "About Us";


include 'header.php';
?>
	  <div class="content">
			<h2>About Us</h2> <!--Changed Hansa-->
				<span class ="square-background" style = "font-family:Pristina; font-size:35px;width: 1070px; height: 50px;">
					"Harmonize Your Wardrobe with Fanceylon's Stylish Symphony."
					<span style="font-family:Calibri; font-size: 20px;">
						-FanCeylon-
					</span>
				</span>
			<br><br>
			<div class = "Paragraph-style"> <!--Changed Hansa-->
				<p  style = "font-family: Calibri; font-size:30px; text-align:center; background-color:rgb(6,57,112, 0.25);">
					Welcome to FanCeylon, your ultimate destination for trendy and fashionable clothing.
				</p>
			  <p style = "font-size:16px; text-align:center;"> <!--Changed Hansa-->
				At FanCeylon, we believe that fashion is a powerful form of self-expression, allowing individuals to showcase their unique style and personality.
				As an online fashion store, we curate a diverse collection of high-quality garments that cater to a wide range of tastes and preferences. 
				Whether you're looking for chic dresses, comfortable loungewear, stylish accessories, or statement pieces, we have you covered. 
				Our team of fashion enthusiasts handpicks each item, ensuring that you have access to the latest trends and timeless classics.
				We understand the importance of both style and comfort, which is why we prioritize selecting fabrics that feel luxurious against your skin and designs that flatter your body shape. 
				Our commitment to quality extends beyond just the products we offer. 
				We strive to provide an exceptional shopping experience, with easy-to-use navigation, secure payment options, and efficient shipping services.
				<br><br>
				At FanCeylon, we value our customers and their individuality. We believe that everyone deserves to feel confident and empowered through their fashion choices.
				Whether you're a trendsetter, a fashion-forward professional, or someone who simply wants to update their wardrobe, our goal is to inspire and assist you in creating your own unique style statement.
				<br><br>
				Join us on this exciting fashion journey and explore our collections that are designed to make you look and feel your best. 
				We are dedicated to providing exceptional customer service and creating a seamless shopping experience that will keep you coming back for more.
				Thank you for choosing FanCeylon as your go-to online fashion store. We look forward to being a part of your style evolution and helping you express your inner fashionista.
				Happy shopping!
				</p>
				</div>
				<br>
			<div class="slideshowInAboutUs"> <!--Changed Hansa-->
            <center>
				<img src="./images/1.png" alt="Aroshana" style="width:65%">
				<img src="./images/2.png" alt="Akila" style="width:65%">
				<img src="./images/3.png" alt="Achira" style="width:65%">
				<img src="./images/4.png" alt="Anuradha" style="width:65%">
				<img src="./images/5.png" alt="Hansamalee" style="width:65%">
                </center>
				<br>
				<!-- Navigation dots/bullets -->
				<!--Changed Hansa-->
				<div style="text-align:center">
					<span class="dot"></span>
					<span class="dot"></span>
					<span class="dot"></span>
					<span class="dot"></span>
					<span class="dot"></span>
				</div>
			</div>	
			<script> <!--Changed Hansa-->
				var slideIndex = 0;
				showSlides();

				function showSlides() {
					var slides = document.getElementsByClassName("slideshowInAboutUs")[0].getElementsByTagName("img");
					var dots = document.getElementsByClassName("dot");

					// Hide all slides
					for (var i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";
					}

					// Remove active class from all dots
					for (var i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}

					// Show the current slide and add active class to the corresponding dot
					slideIndex++;
					if (slideIndex > slides.length) {
						slideIndex = 1;
					}
					slides[slideIndex - 1].style.display = "block";
					dots[slideIndex - 1].className += " active";

					// Change slide every 2 seconds
					setTimeout(showSlides, 3000);
				}
			</script>
		</div>

<?php

$conn->close();
include 'footer.php';

?>