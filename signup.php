<?php

require('dbconnection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $fullname = filter_input(INPUT_POST, "fullname", FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
  $contact = filter_input(INPUT_POST, "contact", FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
  $cpassword = filter_input(INPUT_POST, "cpassword", FILTER_SANITIZE_SPECIAL_CHARS);

  $existSql = "SELECT * FROM `customers` where email = '$email'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if ($numExistRows > 0) {
    $_SESSION['message']="User with this email already exists.";
  } else {
    if (($password == $cpassword)) {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `customers`( `fullname`, `email`, `password`, `mobile_num`, `created_at`) VALUES ('$fullname','$email','$hash','$contact',current_timestamp())";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $_SESSION['success_msg']="Your account has been succesfully created and you can log in to the system.!";
        header("location: login.php");
       
      } 
    }
    else {
    $_SESSION['message']="Password do not match.";
  }

  }
 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customer SignUp | Impex Grocery Store</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="signup.css">
  <link rel="stylesheet" href="message.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php $page="login"; include ('header.php') ?>

  <div class="container">

    <div class="registration form">
      <h3>Signup</h3>
      <div id="alertContainer">
     <?php include('message.php') ?>

    </div>
    <form action="<?php htmlspecialchars('signup.php')?>" method="POST" novalidate>
        <input type="text" name="fullname" placeholder="Full Name" >
        <div class="name-error"></div>
        <input type="email" name="email" placeholder="Email" >
        <div class="email-error"></div>
        <input type="text" name="contact" placeholder="Mobile Number">
        <div class="contact-error"></div>
        <input type="password" name="password" placeholder="Password"  >
        <div class="password-error"></div>
        <input type="password" name="cpassword" placeholder="Confirm Password">
        <div class="cpassword-error"></div>
        <input type="submit" class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
          <a href="login.php">Login</a>
        </span>
      </div>
    </div>

  </div>

  <?php include ('footer.php') ?>

  <script src="app.js"></script>
  <script src="message.js"></script>
  <script src="validateRegistration.js"></script>
  
</body>

</html>