<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit();
  }

$page = "";  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thank You | Impex Grocery Store</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="thankyou.css">
</head>

<body>

    <?php include('header.php') ?>


    <!-- Thank You Section -->
    <div class="thank-section">

        <div class="thank-section-image">
            <div class="thank-image">
                <img src="./assets/like.png" alt="">
            </div>
        </div>

        <div class="thank-section-content">
            <h2>Thank you !</h2>

            <div class="payment-msg">
                <div class="payment-icon">
                    <i class="fa-solid fa-check"></i>
                </div>
                <p>Order Placed Successfully!</p>
            </div>

            <span>Thank you for shopping with us. Your goods will be delivered on your doorstep.</span>

            <div class="home-button">
                <a href="./index.php">Continue Shopping</a>
            </div>

        </div>
    </div>

    <?php include('footer.php') ?>
</body>

</html>