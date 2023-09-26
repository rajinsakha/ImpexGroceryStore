<?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
   $loggedin = true;
  }
  else{
    $loggedin = false;
  }
?>

 <!-- Navbar Section -->
 <div class="navbar">
      <!-- Logo -->
      <div class="navbar-logo">
        <a href="./index.php"><img src="./assets/IB.png" alt="logo" ></a>
      </div>

      <!-- Links -->
      <div class="navbar-links">
        <p><a href="index.php" class="<?php if($page === 'index'){echo 'active';}?>">Home</a></p>
        <p><a href="products.php" class="<?php if($page === 'products'){echo 'active';}?>">Products</a></p>
        <p><a href="about.php" class="<?php if($page === 'about'){echo 'active';}?>">About</a></p>
        <p><a href="contact.php" class="<?php if($page === 'contact'){echo 'active';}?>">Contact</a></p>
      </div>

       <!-- Account Section -->
  <div class="navbar-account">
    <?php if(!$loggedin) { ?>
      <p><a href="login.php" class="<?php if($page === 'login'){echo 'active';} ?>"><i class="fa-solid fa-user"></i></a></p>
      <p><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></p>
    <?php } else { ?>
      <p><a href="customerDashboard.php" class="<?php if($page === 'customer'){echo 'active';} ?>"><i class="fa-solid fa-user"></i></a></p>
      <p><a href="cart.php" class="<?php if($page === 'cart'){echo 'active';} ?>"><i class="fa-solid fa-cart-shopping"></i></a></p>
      <p><a class="hide-logout" href="logout.php">LogOut</a></p>
    <?php } ?>
  </div>
      <!-- For responsive Navbar -->

      <i class="fa-solid fa-bars" id="open-btn" onclick="openMenu()"></i>

      <div class="side-menu">
      <p><a href="index.php" class="<?php if($page === 'index'){echo 'active';}?>">Home</a></p>
        <p><a href="products.php" class="<?php if($page === 'products'){echo 'active';}?>">Products</a></p>
        <p><a href="about.php" class="<?php if($page === 'about'){echo 'active';}?>">About</a></p>
        <p><a href="contact.php" class="<?php if($page === 'contact'){echo 'active';}?>">Contact</a></p>
        <?php if($loggedin) { ?>
          <p><a href="logout.php">Log Out</a></p>
        <?php } ?>
        <i class="fa-solid fa-xmark" id="close-btn" onclick="closeMenu()"></i>
      </div>
</div>

