<?php
require ('dbconnection.php');
session_start();
if (!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] != true) {
    header("location:adminlogin.php");
    exit();
}

if(isset($_GET['customer_id'])){
    $customer_id = $_GET['customer_id'];

    // Fetch detailed product information from the database based on the product_id
    $sql = "DELETE FROM customers WHERE customer_id = '$customer_id'";
    $result = mysqli_query($conn, $sql);

    if($conn->affected_rows == 1) {
        $_SESSION['success_msg'] = "Customer deleted successfully.";
        header("location:manageCustomers.php");
    }

}

?>