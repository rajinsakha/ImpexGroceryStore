<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>About Us | Impex Grocery Store</title>
    <link rel="stylesheet" href="style.css" >
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    >
  </head>
  <body>
    <?php  $page="about"; include ('header.php') ?>
    <!-- About Us  -->
    <div class="about-us">
      <div class="about-us-title">
        <h1>About Us</h1>
      </div>

      <div class="our-vision">
        <div class="our-vision-desc">
          <h2>Our Vision</h2>
          <p>
            Impex Clothing Store aims to revolutionize the online shopping
            experience by becoming the premier destination for fashion
            enthusiasts, providing a seamless blend of exceptional style,
            unmatched convenience, and unparalleled customer service. We strive
            to inspire confidence, empower individuality, and cultivate a sense
            of personal expression through our curated collection of
            high-quality clothing and accessories.
          </p>
          <p>
            Our vision is to inspire confidence, empower individuality, and
            revolutionize the way people connect with fashion. We curate
            high-quality apparel for diverse tastes, occasions, and body types.
            With personalized recommendations and innovative technology, we
            offer a seamless and immersive shopping experience.
          </p>
          <p>
            Join us on our journey to become the premier destination for fashion
            enthusiasts worldwide.
          </p>
        </div>

        <div class="our-vision-image">
          <img src="./assets/Vision-compass.jpg" alt="our-vision" />
        </div>
      </div>

      <div class="our-approach">
        <div class="our-approach-image">
          <img src="./assets/pexels-pixabay-35550.jpg" alt="" />
        </div>

        <div class="our-approach-desc">
          <h2>Our Approach</h2>
          <p>
            At Impex Clothing Store, our approach revolves around three key
            pillars: curation, convenience, and community. We curate a diverse
            collection of high-quality clothing and accessories, catering to
            different tastes, occasions, and body types. Our user-friendly
            website and mobile app offer a seamless shopping experience with
            personalized recommendations and a streamlined checkout process. We
            prioritize convenience with flexible payment options and fast
            shipping. We value community, encouraging customers to share their
            style inspirations and engage with our fashion community.
          </p>
          <p>
            Through curation, convenience, and community, Impex Clothing Store
            aims to redefine online fashion shopping.
          </p>
        </div>
      </div>

      <div class="our-process">
        <div class="our-process-desc">
          <h2>Our Process</h2>
          <p>
            We have established a well-defined process to ensure a smooth and
            efficient operation of our e-commerce clothing store. Our process
            begins with product sourcing and curation, where our experienced
            buyers and fashion experts carefully select and source high-quality
            clothing and accessories from trusted suppliers and brands.
          </p>
          <p>
            We have prioritized user-friendliness in the design of our online
            platform. Our website and mobile app offer an intuitive and seamless
            shopping experience. We prioritize secure ordering and payment by
            implementing robust security measures..
          </p>
          <p>
            We continuously seek feedback from our customers to improve our
            processes and offerings.We embrace innovation and leverage emerging
            technologies to stay at the forefront of the e-commerce industry.
          </p>
        </div>

        <div class="our-process-image">
          <img src="./assets/pexels-pixabay-355948.jpg" alt="" />
        </div>
      </div>
    </div>

    <!-- Terms and Conditons -->
    <div class="terms">
      <h1>Terms and Conditions</h1>
      <div class="conditions">
        <h3>1. Use of Website</h3>
        <div class="condition">
          <h4>
            1.1 Eligibility:
            <span
              >To use our Website, you must be at least 18 years old or the age
              of majority in your jurisdiction. By accessing and using our
              Website, you affirm that you meet the eligibility criteria.</span
            >
          </h4>

          <h4>
            1.2 Account Registration:
            <span
              >Some features of our Website may require you to create an
              account. You agree to provide accurate, current, and complete
              information during the registration process. You are responsible
              for maintaining the confidentiality of your account credentials
              and all activities that occur under your account.</span
            >
          </h4>

          <h4>
            1.3 Prohibited Activities:
            <span
              >You agree not to engage in any unlawful, abusive, fraudulent, or
              harmful activities on our Website. This includes, but is not
              limited to, violating any applicable laws or regulations,
              interfering with the proper functioning of the Website, attempting
              to gain unauthorized access to our systems, and transmitting
              viruses or harmful code.</span
            >
          </h4>
        </div>

        <h3>2. Products and Services</h3>
        <div class="condition">
          <h4>
            2.1 Product Descriptions:<span
              >We make every effort to provide accurate product descriptions,
              images, and pricing on our Website. However, we do not guarantee
              the accuracy, completeness, or reliability of such information.
              The actual products you receive may vary from the images on the
              Website..</span
            >
          </h4>

          <h4>
            2.2 Pricing:
            <span>
              We strive to display accurate pricing information on our Website.
              In the event of an error in the displayed price, we reserve the
              right to refuse or cancel any orders placed at the incorrect
              price.</span
            >
          </h4>

          <h4>
            2.3 Availability:
            <span
              >All products and services are subject to availability. We reserve
              the right to limit the quantity of products sold and to
              discontinue or modify any product at any time without prior
              notice.</span
            >
          </h4>

          <h4>
            2.4 Product Use:
            <span
              >You agree to use all products purchased from Mega Grocery Store
              in accordance with their intended purpose and all safety
              guidelines provided by the manufacturer.</span
            >
          </h4>
        </div>

        <h3>3. Order and Payment</h3>
        <div class="condition">
          <h4>
            3.1 Order Acceptance:<span
              >When you place an order through our Website, it constitutes an
              offer to purchase the products. We reserve the right to accept or
              decline your order at our sole discretion.</span
            >
          </h4>

          <h4>
            3.2 Payment:
            <span
              >You agree to pay the total amount specified during the checkout
              process, including applicable taxes, shipping fees, and other
              charges. Payment methods accepted will be clearly indicated on the
              Website.</span
            >
          </h4>

          <h4>
            3.3 Cancellation:
            <span
              >If you wish to cancel an order, please contact our customer
              support team immediately. We may not be able to cancel the order
              once it has been processed for shipping</span
            >
          </h4>
        </div>
      </div>
    </div>
    <?php include ('footer.php') ?>
    <script src="app.js"></script>
  </body>
</html>


