<?php
require('dbconnection.php');
session_start();
$login = false;
if (isset($_SESSION['userid'])) {
  $login = true;
}

if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];

  // Fetch detailed product information from the database based on the product_id
  $sql = "SELECT * FROM products WHERE product_id = '$product_id' ";
  $result = mysqli_query($conn, $sql);

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Description | Impex Grocery Store</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="message.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>

    <?php  $page="products"; include('header.php') ?>
    <div id="alertContainer">
      <?php include('message.php') ?>
    </div>

    <!-- Product Description -->
    <?php

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $name = $row['name'];
        $category = $row['category'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $desc = $row['description'];
        $img = $row['img_main'];
        $img2 = $row['img2'];
        $img3 = $row['img3'];
        $img4 = $row['img4'];
      
        ?>

        <div class="detailedProduct">
          <div class="detailedProduct-image">
            <div class="image-list">
              <img src="./assets/<?= $img; ?>" alt="<?php echo "$img" ?>" class="image-link active-image" />
              <img src="./assets/<?= $img2; ?>" alt="<?php echo "$img2" ?>" class="image-link" />
              <img src="./assets/<?= $img3; ?>" alt="<?php echo "$img3" ?>" class="image-link" />
              <img src="./assets/<?= $img4; ?>" alt="<?php echo "$img4" ?>" class="image-link" />
            </div>

            <div class="main-image">
              <img src="./assets/<?= $img; ?>" alt="<?php echo "$img" ?>" class="main-image-link active-main-image"
                id="product-image" />
              <img src="./assets/<?= $img2; ?>" alt="<?php echo "$img2" ?>" class="main-image-link" />
              <img src="./assets/<?= $img3; ?>" alt="<?php echo "$img3" ?>" class="main-image-link" />
              <img src="./assets/<?= $img4; ?>" alt="<?php echo "$img4" ?>" class="main-image-link" />
            </div>
          </div>

          <div class="detailedProduct-desc">
            <h2 class="product-name">
              <?php echo $name ?>
            </h2>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <h4 class="product-price">Rs
              <?php echo $price; ?>
            </h4>

            <div class="line"></div>

            <div class="detailedProduct-desc_info">
              <p>
                <?php echo $desc; ?>
              </p>
            </div>


            <div class="detailedProduct-btns">
              <?php if ($login) {
                echo '<a href="addtoCart.php?product_id=' . $row["product_id"] . '" class="addCart-btn">Add to Cart</a>';
              } else {
                echo '<a href="login.php" class="addCart-btn" >Add to Cart</a>';
              }

              ?>

            </div>

            <div class="more-info">
              <h3>Category: <span>
                  <?php echo $category ?>
                </span></h3>
            </div>
          </div>
        </div>
      <?php }
    } else {
      echo "Product not found.";
    }
} else {
  echo "Invalid request.";
}
?>

  <!-- Recommended Products Section -->
  <div class="recommended-products">
    <div class="recommended-products-title">
      <h1>Recommended Products</h1>
    </div>

    <div class="products-wrapper">
      <i id="left" class="fa-solid fa-angle-left change"></i>
      <div class="product-slider">
        <!-- First Product -->
        <div class="product-card">
          <div class="card-image">
            <img src="./assets/regular-pustakari.jpg" alt="regular-pustakari" draggable="false" />
          </div>
          <div class="card-content">
            <h3>SWEETS</h3>
            <h4>Makkuse Pustakari 1 Box</h4>
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
        <div class="product-card">
          <div class="card-image">
            <img src="./assets/almonds.jpg" alt="almonds" draggable="false" />
          </div>
          <div class="card-content">
            <h3>SWEETS</h3>
            <h4>Mamra Almonds 1 Packet</h4>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star" style="color: #d9d9d9"></i>
            </div>
            <p>Rs 600</p>
          </div>
        </div>

        <!-- Third Product -->
        <div class="product-card">
          <div class="card-image">
            <img src="./assets/chocolate-cookies.jpg" alt="chocolate-cookies" draggable="false" />
          </div>
          <div class="card-content">
            <h3>SNACKS</h3>
            <h4>Chocolate Cookies 1 Box</h4>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p>Rs 690</p>
          </div>
        </div>

        <!-- Fourth Product -->
        <div class="product-card">
          <div class="card-image">
            <img src="./assets/semolina-cookies.jpg" alt="semolina-cookies" draggable="false" />
          </div>
          <div class="card-content">
            <h3>SNACKS</h3>
            <h4>Semolina Cookies 1 Box</h4>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p>Rs 700</p>
          </div>
        </div>

        <!-- Fifth Product -->
        <div class="product-card">
          <div class="card-image">
            <img src="./assets/dryfruits-sweets.jpg" alt="dry-fruits" draggable="false" />
          </div>
          <div class="card-content">
            <h3>SWEETS</h3>
            <h4>Haldiram Dry Fruits Sweets</h4>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p>Rs 450</p>
          </div>
        </div>

        <!-- Sixth Product -->
        <div class="product-card">
          <div class="card-image">
            <img src="./assets/cheetos.jpg" alt="cheetos" draggable="false" />
          </div>
          <div class="card-content">
            <h3>SNACKS</h3>
            <h4>Cheetos Chips 1 Packet</h4>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p>Rs 50</p>
          </div>
        </div>

        <!-- Seventh Product -->
        <div class="product-card">
          <div class="card-image">
            <img src="./assets/saon-papdi.jpg" alt="saon-papdi" draggable="false" />
          </div>
          <div class="card-content">
            <h3>SWEETS</h3>
            <h4>Saon Papdi Sweets 1 Box</h4>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p>Rs 350</p>
          </div>
        </div>

        <!-- Eigth Product -->
        <div class="product-card">
          <div class="card-image">
            <img src="./assets/oatmeal-cookies.jpg" alt="oatmeal-cookies" draggable="false" />
          </div>
          <div class="card-content">
            <h3>SNACKS</h3>
            <h4>Oatmeal Cookies 1 Box</h4>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p>Rs 690</p>
          </div>
        </div>
      </div>
      <i id="right" class="fa-solid fa-angle-right change"></i>
    </div>
  </div>
  <?php include('footer.php') ?>


  <script src="app.js"></script>
  <script src="message.js"></script>
  <script src="imageSlider.js" defer></script>

</body>

</html>