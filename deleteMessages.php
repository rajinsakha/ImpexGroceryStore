<?php
require ('dbconnection.php');
session_start();
if (!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] != true) {
    header("location:adminlogin.php");
    exit();
}

if(isset($_GET['message_id'])){
    $message_id = $_GET['message_id'];

    // Fetch detailed product information from the database based on the product_id
    $sql = "DELETE FROM messages WHERE message_id = '$message_id'";
    $result = mysqli_query($conn, $sql);

    if($conn->affected_rows == 1) {
        $_SESSION['success_msg'] = "Message deleted successfully.";
        header("location:manageMessages.php");
    }

}

?>