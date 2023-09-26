<?php
require('dbconnection.php'); // Make sure to include your database connection file
session_start();

if (isset($_GET['customer_id']) && isset($_GET['order_id'])) {
    $customer_id = $_GET['customer_id'];
    $order_id = $_GET['order_id'];

        // Update the product details in the database
        $sql = "UPDATE `orders` SET `status` = 'Ready for Delivery' WHERE `orders`.`customer_id` = '$customer_id' AND `orders`.`order_id` = '$order_id'";
        if (mysqli_query($conn, $sql)) {
            // Redirect back to the product list page or show a success message
            header('location:manageOrders.php'); // Change to the appropriate URL

            exit();
        } else {
            echo "Error updating order: " . mysqli_error($conn);
        }
    
}
?>