<?php

require('dbconnection.php');

$adminlogin = false;
$page="";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $adminemail = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
  $sql = "SELECT * from admins where email='$adminemail'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])){
        $adminlogin = true;
        session_start();
        $_SESSION['adminloggedin'] = true;
        $_SESSION['adminemail'] = $useremail;
     
        $adminid = $row['admin_id'];
        $_SESSION['adminid'] = $adminid;
        $_SESSION['success_msg']="You have successfully logged in!";
        header("location:admin.php");
        
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
  <meta charset="UTF-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >
  <title>Admin Login </title>
  <link rel="stylesheet" href="style.css" >
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="message.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" >
</head>

<body>
<?php  include ('header.php') ?>

  <!-- Account Section -->  
  <div class="container">
    <div class="login form">
      <h3>Admin Login</h3>
      <div id="alertContainer">
      <?php include('message.php') ?>
      </div>
      <form action="<?php htmlspecialchars('adminlogin.php')?>" method="POST" novalidate>
      <input type="email" name="email" placeholder="Enter your email" >
        <div class="email-error"></div>
        <input type="password" name="password" placeholder="Enter your Password"  >
        <div class="password-error"></div>
        <input type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <a href="adminregistration.php">Signup</a>
        </span>
      </div>
    </div>
</div>

<?php include ('footer.php') ?>
<script src="app.js"></script>
<script src="message.js"></script>
<script src ="validateLogin.js"></script>
</body>

</html>
