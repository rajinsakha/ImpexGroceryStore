<?php
include ('dbconnection.php');
session_start();

if(isset($_GET['product_id']) && isset($_SESSION['userid'])){
    $product_id = $_GET['product_id'];
    $customer_id = $_SESSION['userid'];
    $query="SELECT * FROM `cart` WHERE `product_id`='$product_id' AND `customer_id`='$customer_id'"  ;
     $data=mysqli_query($conn,$query);
    if(mysqli_num_rows($data)>=1){
     $_SESSION['message']="The product is already added to cart";
     header("location:detailedProduct.php?product_id=$product_id");
     exit();
    }
    else{
        $query="SELECT `price` FROM `products` WHERE `product_id`='$product_id'";
        $result=mysqli_query($conn, $query);///$con is your MySQL connection code
        while($row = mysqli_fetch_assoc($result)){
        $price=$row['price'];
        $quantity=1;
        $totalPrice=$quantity*$price;
        $sql="INSERT INTO `cart`( `product_id`, `quantity`, `customer_id`) VALUES ('$product_id','$quantity','$customer_id')";
        mysqli_query($conn,$sql);
        $_SESSION['success_msg']="You have successfully added product to cart!";
        header("location:detailedProduct.php?product_id=$product_id");
        exit();
        }
    }

}

?>