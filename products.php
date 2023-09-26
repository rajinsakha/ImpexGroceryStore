<?php
require('dbconnection.php');
session_start();
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products | Impex Grocery Store </title>
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php  $page="products"; include('header.php') ?>
  <!-- Products Section -->
  <div class="product-page">
    <div class="product-category">
      <h2>CATEGORY</h2>
      <div class="product-category-list">
        <h4 class="category-link active-link">ALL</h4>
        <h4 class="category-link">SWEETS</h4>
        <h4 class="category-link">FRUITS</h4>
        <h4 class="category-link">SNACKS</h4>
      </div>
    </div>

    <!-- For Responsive product Category -->
    <i class="fa-solid fa-filter" id="open-category" onclick="openCategoryMenu()"></i>

    <div class="side-menu-category">
      <h4 class="category-link active-link">ALL</h4>
      <h4 class="category-link">SWEETS</h4>
      <h4 class="category-link">FRUITS</h4>
      <h4 class="category-link">SNACKS</h4>
      <i class="fa-solid fa-xmark" id="close-category" onclick="closeCategoryMenu()"></i>
    </div>

    <div class="explore-category">
      <h2>EXPLORE PRODUCTS</h2>

      <span>Discover delightful products that are sure to satisfy your cravings and elevate your culinary experience.</span>

      <!-- All Category -->
      <div class="explore-products active-tab" id="all">

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
        ?>

            <div class="product" onclick="window.location.href='detailedProduct.php?product_id=<?php echo $product_id; ?>'">
              <div class="product-image">
                <img src="assets/<?= $img; ?>" alt="<?php echo "$name" ?>" /> 
              </div>
              <div class="product-content">
                <h3><?php echo $category ?></h3>
                <h4><?php echo $name; ?></h4>
                <!-- Rating Star Icons -->
                <div class="rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p>Rs <?php echo $price; ?></p>
              </div>
            </div>

        <?php
          }
        } else {
          echo "NO DATA FOUND";
        } ?>

      </div>

      <!-- Sweets Category -->
      <div class="explore-products" id="sweets">

        <?php
        $sql_sweets = "SELECT * FROM products WHERE category = 'SWEETS'";
        $result_sweets = mysqli_query($conn, $sql_sweets);


        if (mysqli_num_rows($result_sweets) > 0) {
          while ($row_sweets = mysqli_fetch_assoc($result_sweets)) {
            $product_id = $row_sweets['product_id'];
            $name = $row_sweets['name'];
            $category = $row_sweets['category'];
            $price = $row_sweets['price'];
            $quantity = $row_sweets['quantity'];
            $desc = $row_sweets['description'];
            $img = $row_sweets['img_main'];
        ?>

            <div class="product">
              <div class="product-image">
                <img src="assets/<?= $img; ?>" alt="<?php echo "$name" ?>" />
              </div>
              <div class="product-content">
                <h3><?php echo $category ?></h3>
                <h4><?php echo $name; ?></h4>
                <!-- Rating Star Icons -->
                <div class="rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p>Rs <?php echo $price; ?></p>
              </div>
            </div>

        <?php
          }
        } else {
          echo "NO DATA FOUND";
        } ?>

      </div>



      <!-- Fruits Category -->
      <div class="explore-products" id="fruits">
        <?php
        $sql_fruits = "SELECT * FROM products WHERE category = 'FRUITS'";
        $result_fruits = mysqli_query($conn, $sql_fruits);


        if (mysqli_num_rows($result_fruits) > 0) {
          while ($row_fruits = mysqli_fetch_assoc($result_fruits)) {
            $product_id = $row_fruits['product_id'];
            $name = $row_fruits['name'];
            $category = $row_fruits['category'];
            $price = $row_fruits['price'];
            $quantity = $row_fruits['quantity'];
            $desc = $row_fruits['description'];
            $img = $row_fruits['img_main'];
        ?>

            <div class="product">
              <div class="product-image">
                <img src="assets/<?= $img; ?>" alt="<?php echo "$name" ?>" />
              </div>
              <div class="product-content">
                <h3><?php echo $category ?></h3>
                <h4><?php echo $name; ?></h4>
                <!-- Rating Star Icons -->
                <div class="rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p>Rs <?php echo $price; ?></p>
              </div>
            </div>

        <?php
          }
        } else {
          echo "NO DATA FOUND";
        } ?>


      </div>

      <!-- Snacks Category -->
      <div class="explore-products" id="snacks">
        <?php
        $sql_snacks = "SELECT * FROM products WHERE category='SNACKS'";
        $result_snacks = mysqli_query($conn, $sql_snacks);


        if (mysqli_num_rows($result_snacks) > 0) {
          while ($row_snacks = mysqli_fetch_assoc($result_snacks)) {
            $product_id = $row_snacks['product_id'];
            $name = $row_snacks['name'];
            $category = $row_snacks['category'];
            $price = $row_snacks['price'];
            $quantity = $row_snacks['quantity'];
            $desc = $row_snacks['description'];
            $img = $row_snacks['img_main'];
        ?>

            <div class="product">
              <div class="product-image">
                <img src="assets/<?= $img; ?>" alt="<?php echo "$name" ?>" />
              </div>
              <div class="product-content">
                <h3><?php echo $category ?></h3>
                <h4><?php echo $name; ?></h4>
                <!-- Rating Star Icons -->
                <div class="rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p>Rs <?php echo $price; ?></p>
              </div>
            </div>

        <?php
          }
        } else {
          echo "NO DATA FOUND";
        } ?>

    
      </div>
    </div>
  </div>

  <?php include('footer.php') ?>
  <script src="app.js"></script>
</body>

</html>