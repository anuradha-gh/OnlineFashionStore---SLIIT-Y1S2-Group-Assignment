
<?php

session_start();
require 'includes/config.php';


if(isset($_SESSION["email"]) & !empty($_SESSION["email"])){
    $UserID = $_SESSION["uid"];
    $fname = $_SESSION["fname"];
}else{
    $UserID = 0;
}

$title = "Contact Us";


include 'header.php';
?>
	  <div class="content">
	<h2 style = "text-align:center;">Privacy Policy</h2>
	<hr>
	<ul>
		<li><b>Personal Information Collection :</b></li>
			<p style="text-align: justify;"> 
				We collect personal information, such as your name, address, email, and phone number when you create an account 
				or place an order on our website and we may also collect 
				non-personal information such as your IP address, browser type, and operating system for analytical purposes. 
				We use the data we gather in a variety of ways, including the following, Our website is provided, operated, and maintained. 
				Enhance, personalize, and broaden our website. Learn about and analyze how you use our website. 
				Create innovative new products, services, features, and functionality. 
				Communicate with you, either directly or through one of our partners, for customer service, updates and 
				other website-related information, and marketing and promotional purposes. We wil send you emails if we Detect and prevent fraud.
			</p>
		<li><b>Use of Personal Information :</b></li>
			<p style="text-align: justify;">
				We use the personal information you provide to process your orders, ship your purchases, and provide customer support. 
				We may use your email address to send you promotional offers, newsletters, or updates about our latest products and services.
			</p>
		<li><b>Data Sharing :</b></li>
			<p style="text-align: justify;">
				We do not sell or rent your personal information to third parties. 
				However, we may share your information with trusted service providers who assist us in operating our website, processing payments, 
				or delivering products to you. 
				We may disclose personal information if required by law or to protect our rights, property, or safety, or the rights, property, or safety of others.
			</p>
		<li><b>Marketing Communications :</b></li>
			<p style="text-align: justify;">
				You can register and enter your email address if you want to receive marketing emails from us. 
				You can update your preferences by visiting your account settings or by clicking the 'unsubscribe' link in our emails. 
				We may use personal information for customer profiling to provide personalized recommendations or offers based on your shopping preferences and history. 
			</p>
		<li><b>Security Measures :</b></li>
			<p style="text-align: justify;">
				We take reasonable measures to protect your personal information from unauthorized access, loss, or disclosure. 
				These measures include encryption, firewalls, and regular security audits. We use secure payment processors to ensure 
				the safety of your payment information during transactions.
			</p>
		<li><b>User Rights :</b></li>
			<p style="text-align: justify;">
				You have the right to access, update, or delete your personal information. 
				You can do so by logging into your account or by contacting our privacy officer at FanCeylon@SL.com. 
				If you are a resident of certain jurisdictions, you may have additional rights under applicable data protection laws, 
				such as the right to restrict processing or the right to data portability.
			</p>
		<li><b>Cookies and Tracking Technologies :</b></li>
			<p style="text-align: justify;">
				We use cookies and similar tracking technologies to enhance your browsing experience and analyze website traffic. 
				Third-party services may also place cookies on your device for advertising or analytics purposes. You can manage your cookie preferences 
				through your browser settings or by using the opt-out options provided by third-party services.
			</p>
		<li><b>Age Restrictions :</b></li>
			<p style="text-align: justify;">
				Our website is intended for users who are at least 18 years old. 
				We do not knowingly collect personal information from individuals under the age of 18. If we become aware of such 
				information being collected, we will take steps to delete it. 
			</p>
		<li><b>Changes to the Policy :</b></li>
			<p style="text-align: justify;">
				We may update this privacy policy from time to time to reflect changes in our practices or legal requirements. 
				We will notify you of any significant changes by posting a prominent notice on our website or by sending you an email.
			</p>
		<li><b>Contact Information :</b></li>
			<p style="text-align: justify;">
				If you have any questions, concerns, or requests regarding your privacy or this privacy policy, 
				please contact our privacy officer at Studio9@SL.com or use the contact form on our website.
			</p>
	</ul>
	<hr>
  </div>
<?php

$conn->close();
include 'footer.php';

?>