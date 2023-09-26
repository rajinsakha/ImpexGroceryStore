<?php
require ('dbconnection.php');
session_start();

if (!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] != true) {
    header("location:adminlogin.php");
    exit();
}

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];

    // Fetch detailed product information from the database based on the product_id
    $sql = "DELETE FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);

    if($conn->affected_rows == 1) {
        $_SESSION['success_msg'] = "Product deleted successfully.";
        header("location:manageProducts.php");
    }

}

?>