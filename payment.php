<?php
require('dbconnection.php');
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['userid'])) {
  if ($_SESSION['totalitem'] <= 0) {
    header('location: cart.php');
  }

  $customer_id = $_SESSION['userid'];
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $payment_method = $_POST['payment'];

    // Fetch cart items and group by product
    $sql = "SELECT products.name, products.product_id, products.price,
            SUM(cart.quantity) as total_quantity,
            shipping_details.fullname, shipping_details.address, shipping_details.email
            FROM products
            JOIN cart ON products.product_id = cart.product_id
            JOIN shipping_details ON cart.customer_id = shipping_details.customer_id
            WHERE cart.customer_id = '$customer_id'
            GROUP BY products.product_id";

    $orderdata = mysqli_query($conn, $sql);

    if (mysqli_num_rows($orderdata) > 0) {
      $result = true; // Initialize result flag
      while ($row = mysqli_fetch_assoc($orderdata)) {
        $price = $row['price'];
        $total_quantity = $row['total_quantity'];
        $product_id = $row['product_id'];
        $totalprice = $price * $total_quantity;
        $product_name = $row['name'];
        $fullname = $row['fullname'];
        $email = $row['email'];
        $address = $row['address'];

        $query = "INSERT INTO `orders`(`customer_id`, `product_id`, `total_price`, `product_name`, `customer_name`, `email`, `address`, `payment`, `status`, `order_date`) VALUES ('$customer_id','$product_id','$totalprice','$product_name','$fullname','$email','$address','$payment_method', 'Pending' ,current_timestamp())";

        // Execute the query
        $result = $result && mysqli_query($conn, $query);

        // If an error occurred in any iteration, break the loop
        if (!$result) {
          break;
        }

        // Remove all cart items for the product from the cart after creating an order
        $delete_cart_query = "DELETE FROM cart WHERE customer_id = $customer_id AND product_id = $product_id";
        mysqli_query($conn, $delete_cart_query);
      }

      if ($result) {
  
        header("location:thankyou.php");
      }
    }
  }
} else {
  header("location:login.php");
}

$page = "";
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment | Impex Grocery Store</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="paymentdetails.css">

</head>

<body>
  <?php include('header.php') ?>
  <!-- Payment Section -->
  <div class="payment-section section-padding">

    <div class="payment-title">
      <h1>Payment Method</h1>
    </div>


    <div class="payment-info">


      <div class="container">
        <div class="title">
          <h4>Select a <span style="color: #6064b6">Payment</span> method</h4>
        </div>

        <form action="payment.php" method="post">
          <!-- <input type="radio" name="payment" id="visa">
          <input type="radio" name="payment" id="mastercard">
          <input type="radio" name="payment" id="esewa"> -->
          <input type="radio" name="payment" id="cod" value="COD">


          <div class="category">
         
            <label for="cod" class="codMethod">
              <div class="imgName">
                <div class="imgContainer cod">
                  <img src="./assets/cod.png" alt="cash-on-delivery">
                </div>
                <span class="name">Cash on Delivery</span>
              </div>
              <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
            </label>
          </div>

          <div class="place-order">
          <input type="submit" id="placeOrderButton" class="order-button" value="Place Order" />
          </div>
        </form>
      </div>


      <div class="order-info">
      <div class="order-title">
        <h2>Order Summary</h2>
      </div>

      <div class="total-items-info">

      <h3 id="itemNum"> Items Number: <?php echo $_SESSION['totalitem']; ?> </h3>
      <h3 id="totalPrice">Total Price: <?php echo $_SESSION['totalprice'];?></h3>


      </div>
    </div>

    </div>
  </div>
  <?php include('footer.php') ?>

  <script>
  // Get reference to the radio buttons
  const paymentRadios = document.querySelectorAll('input[type="radio"][name="payment"]');

  // Get reference to the "Place Order" button
  const placeOrderButton = document.getElementById('placeOrderButton');

  // Function to toggle the "Place Order" button
  function togglePlaceOrderButton() {
    // Check if any radio button is checked
    const checkedRadioButton = Array.from(paymentRadios).find(radio => radio.checked);
    
    // Show or hide the button based on the checked state
    if (checkedRadioButton) {
      placeOrderButton.style.display = 'block';
    } else {
      placeOrderButton.style.display = 'none';
    }
  }

  // Add event listener to each radio button
  paymentRadios.forEach(radio => {
    radio.addEventListener('change', togglePlaceOrderButton);
  });

  // Initially hide the button
  togglePlaceOrderButton();
</script>

  <script src="payment.js"></script>
  <script src="app.js"></script>
</body>

</html>