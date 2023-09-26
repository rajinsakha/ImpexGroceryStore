<?php
require('dbconnection.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location:login.php");
  exit();
}

if (isset($_SESSION['userid'])) {
  $customer_id = $_SESSION['userid'];
  $sql = "SELECT * from cart where customer_id = '$customer_id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) <= 0) {
    $_SESSION['message'] = "Failed to checkout due to empty items in the cart!";
    header("location: cart.php");
  }

  $page = "";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout | Impex Grocery Store</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="checkout.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <!-- Proceed to CheckOut Section -->
  <?php include('header.php') ?>
  <div class="container">
    <h2>Checkout Details</h2>
    <form class="form-container" id="checkout-form" action="proceedtoCheckout.php" method="POST" novalidate>

      <div class="form-field">
        <input type="text" name="fullname" placeholder="FullName">
        <div class="form-error name-error"></div>
      </div>
     

      <div class="form-field">
      <input type="text" name="address" placeholder="Street Address">
      <div class="form-error address-error"></div>
      </div>
      
    <div class="form-field">
    <input type="email" name="email" placeholder="Email">
      <div class="form-error email-error"></div>
    </div>
 
      <div class="form-field">
      <input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{10}">
      <div class="form-error contact-error"></div>
      </div>
     
      <div class="form-field">
      <input type="text" name="city" placeholder="City">
      <div class="form-error city-error"></div>
      </div>
      
      <div class="form-field">
      <input type="text" name="zip" placeholder="ZIP/Postal Code">
      <div class="form-error zip-error"></div>
      </div>
      

      <button type="submit">Proceed to Payment</button>
    </form>
  </div>
  <?php include('footer.php') ?>
</body>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const checkoutForm = document.getElementById('checkout-form');

    checkoutForm.addEventListener('submit', function (e) {
      let hasError = false;

      // Full Name validation
      const fullname = document.querySelector('input[name="fullname"]').value;
      if (fullname === '') {
        document.querySelector('.name-error').textContent = 'Full name is required!';
        hasError = true;
      } else {
        document.querySelector('.name-error').textContent = '';
      }

      // Address validation
      const address = document.querySelector('input[name="address"]').value;
      if (address === '') {
        document.querySelector('.address-error').textContent = 'Address is required!';
        hasError = true;
      } else {
        document.querySelector('.address-error').textContent = '';
      }

      // Email validation
      const email = document.querySelector('input[name="email"]').value;
      if (email === '' || !email.includes('@')) {
        document.querySelector('.email-error').textContent = 'Valid email is required!';
        hasError = true;
      } else {
        document.querySelector('.email-error').textContent = '';
      }

      // Phone validation
      const phone = document.querySelector('input[name="phone"]').value;
      const phonePattern = /^[0-9]{10}$/;
      if (!phonePattern.test(phone)) {
        document.querySelector('.contact-error').textContent = 'Enter a valid 10-digit phone number!';
        hasError = true;
      } else {
        document.querySelector('.contact-error').textContent = '';
      }

      // City validation
      const city = document.querySelector('input[name="city"]').value;
      if (city === '') {
        document.querySelector('.city-error').textContent = 'City is required!';
        hasError = true;
      } else {
        document.querySelector('.city-error').textContent = '';
      }

      // ZIP validation
      const zip = document.querySelector('input[name="zip"]').value;
      if (zip === '') {
        document.querySelector('.zip-error').textContent = 'ZIP/Postal code is required!';
        hasError = true;
      } else {
        document.querySelector('.zip-error').textContent = '';
      }

      // Prevent form submission if there's an error
      if (hasError) {
        e.preventDefault();
      }
    });
  });



</script>

</html>