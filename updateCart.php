<?php
require('dbconnection.php'); // Make sure to include your database connection file
session_start();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $productsql = "SELECT * from products WHERE product_id = $product_id";
    $productquery = mysqli_query($conn, $productsql);

    $row = mysqli_fetch_assoc($productquery);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $productQuantity = $_POST['productQuantity'];

        // Update the cart details in the database
        $sql = "UPDATE `cart` SET  `quantity` = '$productQuantity' WHERE `cart`.`product_id` = '$product_id'";
        if (mysqli_query($conn, $sql)) {
            // Redirect back to the product list page or show a success message
            $_SESSION['success_msg'] = "Product updated successfully.";
            header('location:cart.php'); // Change to the appropriate URL
            exit();
        } else {
            $_SESSION['message'] = "Error updating product: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Cart</title>
    <link rel="stylesheet" href="updateCart.css">
</head>

<body>
    <!-- Edit Quantity -->
    <div class="container" id="edit_product">
        <div class="container-content">
            <div class="editQty">
                <h2>Edit Quantity</h2>
                <button id="closeEditQuantity" onclick="window.location.href='cart.php'">x</button>
            </div>

            <div class="content">
                <form id="editProductForm" action="#" method="POST" novalidate>

                    <label for="productQuantity">Quantity:</label>
                    <input type="number" id="productQuantity" name="productQuantity" min="1"
                        max="<?php echo $row['quantity'] ?>">
                    <div class="quantity-error"></div>


                    <div class="button">
                        <input type="submit" value="Update Quantity">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        const form = document.querySelector('form');
        let productQuantityInput = document.getElementById('productQuantity');
        let minQuantity = Number(productQuantityInput.min);
        let maxQuantity = Number(productQuantityInput.max);
        const quantityError = document.querySelector('.quantity-error');

        // Event listener for form submission
        form.addEventListener('submit', function (event) {
            let isValid = true;

            let quantityValue = Number(productQuantityInput.value);
            // Clear previous error messages
            quantityError.textContent = '';

            if (quantityValue < minQuantity || quantityValue > maxQuantity) {
                quantityError.textContent='Please enter a quantity between ' + minQuantity + ' and ' + maxQuantity;
                isValid = false;
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });


    </script>
</body>


</html>