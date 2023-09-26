<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Impex Clothing Store</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="message.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php $page = "index";
  include('header.php') ?>

  <div id="alertContainer">
    <?php include('message.php') ?>
  </div>
  <!-- Header Section -->
  <div class="header section-padding">
    <div class="header-content">
      <h1>Buy Groceries at Unbeatable Prices</h1>
      <p>
        Looking for the best deals on groceries without breaking the bank? You've come to the right place! At our online
        store, we take pride in offering you an extensive selection of top-quality groceries at incredibly affordable
        prices.
      </p>

      <div class="explore-button">
        <a href="products.php">Explore Now <i id="right-arrow" class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>

    <div class="header-image">
      <img src="./assets/hero-image.png" alt="groceries" />
    </div>
  </div>

  <!-- Products Section -->
  <div class="products section-margin">
    <div class="products-title">
      <h1>Featured Products</h1>
    </div>

    <div class="product-list">
      <!-- First Product -->
      <div class="product">
        <div class="product-image">
          <img src="./assets/regular-pustakari.jpg" alt="pustakari-sweet" />
        </div>
        <div class="product-content">
          <h3>SWEETS</h3>
          <h4>Makkuse Pustakari 1 Box</h4>
          <!-- Rating Star Icons -->
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <p>Rs 390</p>
        </div>
      </div>

      <!-- Second Product -->
      <div class="product">
        <div class="product-image">
          <img src="./assets/watermelon.jpg" alt="watermelon" />
        </div>
        <div class="product-content">
          <h3>FRUITS</h3>
          <h4>Watermelon 1Pcs</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <p>Rs 260</p>
        </div>
      </div>

      <!-- Third Product -->
      <div class="product">
        <div class="product-image">
          <img src="./assets/apple.jpg" alt="apple" />
        </div>
        <div class="product-content">
          <h3>FRUITS</h3>
          <h4>Apple Fuji 1Kg</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star" style="color: #d9d9d9"></i>
          </div>
          <p>Rs 340</p>
        </div>
      </div>

      <!-- Fourth Product -->
      <div class="product">
        <div class="product-image">
          <img src="./assets/chocolate-cookies.jpg" alt="chocolate-cookies" />
        </div>
        <div class="product-content">
          <h3>SNACKS</h3>
          <h4>Chocolate Cookies 1 Box</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
            <i class="fa-solid fa-star" style="color: #d9d9d9"></i>
          </div>
          <p>Rs 600</p>
        </div>
      </div>

      <!-- Fifth Product -->
      <div class="product">
        <div class="product-image">
          <img src="./assets/mango.jpg" alt="mango" />
        </div>
        <div class="product-content">
          <h3>FRUITS</h3>
          <h4>Mango 1Kg</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
            <i class="fa-solid fa-star" style="color: #d9d9d9"></i>
          </div>
          <p>Rs 200</p>
        </div>
      </div>

      <!-- Sixth Product -->
      <div class="product">
        <div class="product-image">
          <img src="./assets/Doritos.jpg" alt="doritos-chips" />
        </div>
        <div class="product-content">
          <h3>SNACKS</h3>
          <h4>Doritos Chips Pack of 4</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
            <i class="fa-solid fa-star" style="color: #d9d9d9"></i>
          </div>
          <p>Rs 240</p>
        </div>
      </div>

      <!-- Seventh Product -->
      <div class="product">
        <div class="product-image">
          <img src="./assets/regular-gundpak.jpeg" alt="regular-gundpak" />
        </div>
        <div class="product-content">
          <h3>SWEETS</h3>
          <h4>Makkuse Gundpak 1 Jar</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
            <i class="fa-solid fa-star" style="color: #d9d9d9"></i>
          </div>
          <p>Rs 650</p>
        </div>
      </div>

      <!-- Eighth Product -->
      <div class="product">
        <div class="product-image">
          <img src="./assets/oatmeal-cookies.jpg" alt="oatmeal-cookies" />
        </div>
        <div class="product-content">
          <h3>SNACKS</h3>
          <h4>Oatmeal Cookies 1 Box</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
            <i class="fa-solid fa-star" style="color: #d9d9d9"></i>
          </div>
          <p>Rs 600</p>
        </div>
      </div>


    </div>
  </div>

  <!-- Service Section -->

  <div class="service section-margin">
    <div class="service-title">
      <h1>Our Services</h1>
    </div>

    <div class="service-list">
      <div class="service-pay">
        <img src="./assets/cash.png" alt="" class="service-image" />
        <div class="service-content">
          <h4>Pay Better</h4>
          <p>Speed through checkout and offset delivery emissions.</p>
        </div>
      </div>

      <div class="service-track">
        <img src="./assets/track.png" alt="" class="service-image" />
        <div class="service-content">
          <h4>Track Better</h4>
          <p>
            Get real-time delivery updates from cart to home in one place.
          </p>
        </div>
      </div>

      <div class="service-shop">
        <img src="./assets/cart.png" alt="" class="service-image" />
        <div class="service-content">
          <h4>Shop Better</h4>
          <p>Upgrade yourself with personal recommendations from store.</p>
        </div>
      </div>
    </div>
  </div>


  <!-- NewsLetter Section -->
  <div class="newsletter section-padding">
    <div class="newsletter-content">
      <h4>Subscribe to our Newsletter</h4>
      <p>Receive email updates about early discount offers, updates and new products info.</p>
    </div>

    <div class="email-form">
      <input type="text" placeholder="Your email address">
      <button>Subscribe</button>
    </div>

  </div>
  <?php include('footer.php') ?>
  <script src="app.js"></script>
  <script src="message.js"></script>
</body>

</html>