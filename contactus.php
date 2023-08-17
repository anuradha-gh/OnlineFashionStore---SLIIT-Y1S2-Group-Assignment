
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
      <!--content-->
      <h2 style="text-align: right">Contact Us</h2>
      <hr />
      <p>
        We value your feedback and are here to assist you. If you have any
        questions, concerns, or suggestions, please don't hesitate to reach out
        to us. Our dedicated customer support team is ready to assist you.
      </p>
      <div class="Rect">
        <div class="Rect-columns">
          <div class="Rect-column">
            <h3>Contact</h3>
            <div class="icon-d">
              <img
                src="./images/telephone-call.png"
                class="icon-s"
                height="30px"
                width="30px"
              />
              <span>Phone: 081-6524653</span>
            </div>
            <div class="icon-d">
              <img
                src="./images/email.png"
                class="icon-s"
                height="30px"
                width="30px"
              />
              <span>Email: FanCeylon@SL.com</span>
            </div>
            <div class="icon-d">
              <img
                src="./images/location.png"
                class="icon-s"
                height="30px"
                width="30px"
              />
              <span>Address: 89/90A, Wesley LN, Kandy,</br> Sri Lanka.</span>
            </div>
          </div>
          <div class="Rect-column">
            <p>Get In Touch With Us</p>
            <form>
              <input type="text" placeholder="Name" /><br />
              <input type="tel" placeholder="Phone Number" /><br />
              <input type="email" placeholder="E-mail" /><br />
              <textarea placeholder="Message"></textarea><br />

              <button type="submit">Submit</button>
            </form>
          </div>
          <div class="Rect-column">
            <div class="banner">
              <img src="./images/banner.jpg" height="500px" width="380" />
            </div>
          </div>
        </div>
      </div>
    </div>

<?php

$conn->close();
include 'footer.php';

?>