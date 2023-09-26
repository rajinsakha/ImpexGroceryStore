<?php
require('dbconnection.php'); 
session_start();

if (!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] != true) {
    header("location:adminlogin.php");
    exit();
}


if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productCategory = $_POST['productCategory'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];

        // Update the product details in the database
        $sql = "UPDATE `products` SET `name` = '$productName', `category` = '$productCategory', `price` = '$productPrice', `quantity` = '$productQuantity', `description` = '$productDescription' WHERE `products`.`product_id` = '$product_id'";
        if (mysqli_query($conn, $sql)) {
            
            header('location:manageProducts.php'); 
            exit();
        } else {
            echo "Error updating product: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product | Admin Dashboard</title>
    <link rel="stylesheet" href="updateProducts.css">
</head>

<body>
    <!-- Edit Product -->
    <div class="container" id="edit_product">
        <div class="container-content">
            <h3>Edit Product
                <button id="closeEditProduct" onclick="window.location.href='manageProducts.php'">x</button>
            </h3>
            <div class="content">
                <form id="editProductForm" action="#" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Product Name</span>
                            <input type="text" id="productName" name="productName">
                            <div class="form-error name-error"></div>
                        </div>
                        <div class="input-box">
                            <span class="details">Category</span>
                            <input type="text" id="productCategory" name="productCategory">
                            <div class="form-error category-error"></div>
                        </div>
                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea id="productDescription" cols="30" rows="10" name="productDescription"></textarea>
                            <div class="form-error description-error"></div>
                        </div>
                        <div class="input-box">
                            <span class="details">Price</span>
                            <input type="number" id="productPrice" name="productPrice" step="5">
                            <div class="form-error price-error"></div>
                        </div>
                        <div class="input-box">
                            <span class="details">Quantity</span>
                            <input type="number" id="productQuantity" name="productQuantity">
                            <div class="form-error quantity-error"></div>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Update Product">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editProductForm = document.getElementById('editProductForm');

            editProductForm.addEventListener('submit', function (e) {
                let hasError = false;

                // Product Name validation
                const productName = document.getElementById('productName').value;
                if (productName === '') {
                    document.querySelector('.name-error').textContent = 'Product name is required!';
                    hasError = true;
                } else {
                    document.querySelector('.name-error').textContent = '';
                }

                // Category validation
                const productCategory = document.getElementById('productCategory').value;
                if (productCategory === '') {
                    document.querySelector('.category-error').textContent = 'Category is required!';
                    hasError = true;
                } else {
                    document.querySelector('.category-error').textContent = '';
                }

                // Description validation
                const productDescription = document.getElementById('productDescription').value;
                if (productDescription === '') {
                    document.querySelector('.description-error').textContent = 'Description is required!';
                    hasError = true;
                } else {
                    document.querySelector('.description-error').textContent = '';
                }

                // Price validation
                const productPrice = document.getElementById('productPrice').value;
                if (productPrice === '' || productPrice <= 0) {
                    document.querySelector('.price-error').textContent = 'Enter a valid price!';
                    hasError = true;
                } else {
                    document.querySelector('.price-error').textContent = '';
                }

                // Quantity validation
                const productQuantity = document.getElementById('productQuantity').value;
                if (productQuantity === '' || productQuantity < 0) {
                    document.querySelector('.quantity-error').textContent = 'Enter a valid quantity!';
                    hasError = true;
                } else {
                    document.querySelector('.quantity-error').textContent = '';
                }

                // Prevent form submission if there's an error
                if (hasError) {
                    e.preventDefault();
                }
            });
        });

    </script>
</body>

</html>