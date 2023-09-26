<?php
session_start();
require('dbconnection.php');



$login = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $useremail = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * from customers where email='$useremail'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])){
        $login = true;
        $_SESSION['loggedin'] = true;
        $_SESSION['useremail'] = $useremail;
        $row = mysqli_fetch_assoc($result);
        $userid = $row['customer_id'];
        $_SESSION['userid'] = $userid;
        header("location:index.php");
        $_SESSION['success_msg']="You have successfully logged in!";
    }
    else {
        $_SESSION['message']="Invalid Credentials";
      }
  }else{
    $_SESSION['message']="User doesn't exist";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customer Login </title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="message.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php  $page="login"; include ('header.php') ?>
 
  <!-- Account Section -->
  <div class="container">
    <div class="login form">
      <h3>Login</h3>
      <div id="alertContainer">
      <?php include('message.php') ?>
      </div>
     
      <form action="customerlogin.php" method="POST">
        <input type="email" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <a href="signup.php">Signup</a>
        </span>
      </div>
    </div>
</div>

<?php include ('footer.php') ?>
<script src="app.js"></script>
<script src="message.js"></script>

</body>

</html>