<?php
require ('dbconnection.php');
session_start();

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];

    // Fetch detailed product information from the database based on the product_id
    $sql = "DELETE FROM cart WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['success_msg'] = "Product deleted successfully.";
        header("location:cart.php");
    }
    else{
        $_SESSION['message'] = "Failed to delete product";
    }

}

?>