
<?php

session_start();
require 'includes/config.php';


if(isset($_SESSION["email"]) & !empty($_SESSION["email"])){
    $UserID = $_SESSION["uid"];
    $fname = $_SESSION["fname"];
}else{
    $UserID = 0;
}

$title = "Terms & Condition";


include 'header.php';
?>
<div class="content">
		<h2 style = "text-align:center;">Terms & Conditions</h2>
		<hr>
			<ol>
				<li><b>Acceptance of Terms: </b></li>
				<p style = "text-align: justify;">
					Clearly state that by using the website or making a purchase, the user agrees to be bound by the terms and 
					conditions outlined.
				</p>
				<li><b>Product Descriptions: </b></li>
				<p style = "text-align: justify;">
					Provide accurate and detailed descriptions of the products available for purchase, including any limitations 
					or disclaimers.
				</p>
				<li><b>Pricing and Payment: </b></li>
				<p style = "text-align: justify;">
					Specify the currency, pricing, and payment methods accepted by the store. Clarify any additional charges 
					such as taxes, shipping fees, or customs duties.
				</p>
				<li><b>Order Placement and Acceptance: </b></li>
				<p style = "text-align: justify;">
					Explain the process of placing an order, order confirmation, and the store's right to accept or reject orders. 
					Include any conditions for order cancellations or modifications.
				</p>
				<li><b>Shipping and Delivery: </b></li>
				<p style = "text-align: justify;"> 
					Outline the store's shipping methods, estimated delivery times, and any associated terms or conditions for 
					delivery, such as tracking, insurance, or international shipping limitations.
				</p>
				<li><b>Returns and Refunds: </b></li>
				<p style = "text-align: justify;">
					Explain the store's policy regarding returns, exchanges, and refunds. Include details about eligible products, 
					timeframes for returns, and any conditions or fees associated with returns.
				</p>
				<li><b>Intellectual Property: </b></li>
				<p style = "text-align: justify;">
					Clarify the ownership and protection of intellectual property rights, including trademarks, copyrights, 
					and content displayed on the website. Inform users that unauthorized use of such intellectual property is prohibited.
				</p>
				<li><b>User Conduct:  </b></li>
				<p style = "text-align: justify;">
					Set forth guidelines for user conduct, such as not engaging in fraudulent activities, not misrepresenting 
					identity, and not interfering with the website's functionality or security.
				</p>
				<li><b>Privacy and Data Protection: </b></li>
				<p style = "text-align: justify;">
					Describe how the store collects, uses, and protects personal information of users. Reference the privacy 
					policy for more detailed information.
				</p>
				<li><b>Limitation of Liability: </b></li>
				<p style = "text-align: justify;"> 
					Specify the limitations of liability for the store, including disclaimers of warranties, limitations on 
					damages, and indemnification provisions.
				</p>
				<li><b>Governing Law and Jurisdiction: </b></li>
				<p style = "text-align: justify;"> 
					Indicate the governing law that applies to the terms and conditions and any disputes that may arise, as 
					well as the jurisdiction where disputes will be resolved.
				</p>
				<li><b>Modifications and Termination: </b></li>
				<p style = "text-align: justify;">
					Reserve the right to modify or terminate the terms and conditions at any time and explain how users will 
					be notified of such changes.
				</p>
			</ol>
			<hr>
	  </div>
<?php

$conn->close();
include 'footer.php';

?>