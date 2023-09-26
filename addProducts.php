<?php
require('dbconnection.php');
session_start();

if (!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] != true) {
    header("location:adminlogin.php");
    exit();
}

$adminid = $_SESSION['adminid'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['productName']) && isset($_POST['productDescription']) && isset($_POST['productCategory']) && isset($_POST['productPrice']) && isset($_POST['productQuantity']) && isset($_FILES['productImage']) && isset($_FILES['productImage2']) && isset($_FILES['productImage3']) && isset($_FILES['productImage4'])) {
        $name = $_POST['productName'];
        $description = $_POST['productDescription'];
        $category = $_POST['productCategory'];
        $price = $_POST['productPrice'];
        $quantity = $_POST['productQuantity'];
        $img_name = $_FILES['productImage']['name'];
        $img_name2 = $_FILES['productImage2']['name'];
        $img_name3 = $_FILES['productImage3']['name'];
        $img_name4 = $_FILES['productImage4']['name'];
        $img_size = $_FILES['productImage']['size'];
        $img_size2 = $_FILES['productImage2']['size'];
        $img_size3 = $_FILES['productImage3']['size'];
        $img_size4 = $_FILES['productImage4']['size'];
        $tmp_name = $_FILES['productImage']['tmp_name'];
        $tmp_name2 = $_FILES['productImage2']['tmp_name'];
        $tmp_name3 = $_FILES['productImage3']['tmp_name'];
        $tmp_name4 = $_FILES['productImage4']['tmp_name'];




        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
        $img_ex_lc2 = strtolower($img_ex2);

        $img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
        $img_ex_lc3 = strtolower($img_ex3);

        $img_ex4 = pathinfo($img_name4, PATHINFO_EXTENSION);
        $img_ex_lc4 = strtolower($img_ex4);
        $allowed_ex = array("jpeg", "jpg", "png");

        if (in_array($img_ex_lc, $allowed_ex) && in_array($img_ex_lc2, $allowed_ex) && in_array($img_ex_lc3, $allowed_ex) && in_array($img_ex_lc4, $allowed_ex)) {

            $img_upload_path = 'assets/' . $img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $img_upload_path2 = 'assets/' . $img_name2;
            move_uploaded_file($tmp_name, $img_upload_path2);

            $img_upload_path3 = 'assets/' . $img_name3;
            move_uploaded_file($tmp_name, $img_upload_path3);

            $img_upload_path4 = 'assets/' . $img_name4;
            move_uploaded_file($tmp_name, $img_upload_path4);

            $sql = "INSERT INTO products (`name`, `category`, `price`, `quantity`, `img_main`, `img2`, `img3`,`img4`, `description`, `created_at`, `admin_id`) VALUES ('$name', '$category', '$price', '$quantity', '$img_name', '$img_name2', '$img_name3', '$img_name4', '$description', current_timestamp(), $adminid)";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['success_msg']="Product has been added successfully.";
                header("location: manageProducts.php");
                exit();
            } else {
                $_SESSION['message']="Product cannot be added.";
            }
        } else {
            echo "Invalid image format. Allowed formats: jpeg, jpg, png.";
        }
    } else {
        echo "Incomplete form data.";
    }
} else {
    echo "Error in adding product.";
}
?>