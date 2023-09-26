<?php
require ('dbconnection.php');
session_start();

if (!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] != true) {
    header("location:adminlogin.php");
    exit();
}

if(isset($_GET['customer_id'])&&isset($_GET['order_id'])){
    $customer_id = $_GET['customer_id'];
    $order_id = $_GET['order_id'];
    // Fetch detailed product information from the database based on the product_id
    $sql = "DELETE FROM orders WHERE customer_id = '$customer_id' AND order_id = '$order_id' ";
    $result = mysqli_query($conn, $sql);

    if($conn->affected_rows == 1) {
        $_SESSION['message'] = "Order deleted successfully.";
        header("location:manageOrders.php");
    }
}
?>
