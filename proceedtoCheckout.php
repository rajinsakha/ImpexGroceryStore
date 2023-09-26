<?php
require ('dbconnection.php');
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['userid'])){
  $customer_id= $_SESSION['userid'];
  if(($_SERVER["REQUEST_METHOD"] === "POST")){
    $fullname = filter_input(INPUT_POST, "fullname", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $contact = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $straddress = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
    $address = $straddress.",".$city;
    $zip=filter_input(INPUT_POST, "zip", FILTER_SANITIZE_SPECIAL_CHARS);
  
    $query = "SELECT * from cart where customer_id = $customer_id";
    $checkoutdata = mysqli_query($conn, $query);
    if(mysqli_num_rows($checkoutdata)>0 ){
        $sql = "INSERT INTO `shipping_details`( `fullname`, `email` , `mobile_num`, `address`, `zip`, `customer_id`) VALUES ('$fullname','$email','$contact','$address','$zip','$customer_id')";
        $result = mysqli_query($conn, $sql);  
      }
    }
    header("location:payment.php");
    
  }

else{
  header("location:login.php");
}

?>