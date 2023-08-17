
<?php

session_start();
require 'includes/config.php';


if(isset($_SESSION["email"]) & !empty($_SESSION["email"])){
    $UserID = $_SESSION["uid"];
    $fname = $_SESSION["fname"];
}else{
    $UserID = 0;
}

$title = "FAQs";


include 'header.php';
?>
 <script>
    document.addEventListener("DOMContentLoaded", () => {
      const faqs = document.querySelectorAll(".faq");

      faqs.forEach((faq) => {
        faq.addEventListener("click", () => {
          faq.classList.toggle("active");
        });
      });
    });
  </script>

    <div class="content">
      <h1 style="text-align: center">Frequently Asked Questions</h1>
      <hr />
      <div class="faq">
        <div class="question">
          <h2>How can I place an order?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            To place an order, simply browse our online store, select the items
            you want to purchase, and add them to your shopping cart. Then,
            proceed to the checkout page and follow the instructions to complete
            your order.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>What payment methods do you accept?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            We accept various payment methods, including credit cards (Visa,
            Mastercard, American Express), PayPal, and bank transfers. You can
            choose your preferred payment option during the checkout process.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>Do you offer international shipping?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>No, we do not offer international shipping.</p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>How long does it take to receive my order?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            The delivery time depends on your location and the shipping method
            you choose. Generally, orders are processed and shipped within 1-3
            business days. Once shipped, the estimated delivery time is usually
            between 5-10 business days for domestic orders.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>How much does shipping cost?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            Shipping costs vary depending on the destination and the weight of
            the package. You can calculate the shipping cost during the checkout
            process before finalizing your order.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>Can I track my order?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            Yes, you can track your order. After your order has been shipped, we
            will provide you with a tracking number. You can enter this tracking
            number on our website or the shipping carrier's website to track the
            progress of your shipment.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>What is your return policy?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            We have a hassle-free return policy. If you are not satisfied with
            your purchase, you can return the item within 30 days of receiving
            it for a refund or exchange. Please ensure the item is unused and in
            its original condition with all tags and packaging intact.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>How do I return or exchange an item?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            To return or exchange an item, please contact our customer service
            team or visit our returns page on the website. They will guide you
            through the process and provide you with the necessary instructions
            and a return shipping label, if applicable.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>Is it safe to make a payment on your website?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            Yes, it is safe to make a payment on our website. We take the
            security of your personal and payment information seriously. We use
            industry-standard encryption and secure payment gateways to protect
            your data and ensure a secure checkout experience.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>What if the item I received is damaged or defective?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            If the item you received is damaged or defective, please contact our
            customer service team immediately. We will assist you in resolving
            the issue by offering a replacement, repair, or refund, depending on
            the specific circumstances.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>Do you offer size guides or measurements for your clothing?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            Yes, we provide detailed size guides and measurements for our
            clothing items. You can find these guides on the product page, which
            will help you choose the right size based on your measurements.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>
            Are the colors of the products accurate to what is shown on the
            website?
          </h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            We make every effort to display the colors of our products
            accurately on our website. However, please note that the actual
            colors may vary slightly due to monitor settings and lighting
            conditions. We provide product descriptions and high-quality images
            to give you the best representation possible.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>Can I cancel or modify my order after it has been placed?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            We strive to process and ship orders as quickly as possible.
            Therefore, if you need to cancel or modify your order, please
            contact our customer service team immediately. We will do our best
            to accommodate your request, but we cannot guarantee changes or
            cancellations once the order has been processed or shipped.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>Do you offer gift wrapping or personalized messages?</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>
            Yes, we offer gift wrapping services for selected items. During the
            checkout process, you can choose to have your order gift-wrapped for
            a special occasion. We also provide the option to include a
            personalized message with your gift.
          </p>
        </div>
      </div>
      <div class="faq">
        <div class="question">
          <h2>qqq</h2>
          <svg width="15" height="10" viewbox="0 0 42 25">
            <path
              d="M3 3L21 21L39 3"
              stroke="white"
              stroke-width="7"
              stroke-linecap="round"
            />
          </svg>
        </div>
        <div class="answer">
          <p>aaaa</p>
        </div>
      </div>
    </div>


<?php

$conn->close();
include 'footer.php';

?>