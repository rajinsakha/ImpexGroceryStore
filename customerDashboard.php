<?php

require('dbconnection.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location:login.php");
  exit();
}



if (isset($_SESSION['userid'])) {
  $userid = $_SESSION['userid'];
 
}
$sql = "SELECT * FROM customers where customer_id = $userid";
$result = mysqli_query($conn, $sql);

$totalorders_query = "SELECT COUNT(*) AS TotalOrders FROM orders where customer_id = $userid";
$totalorders_result = mysqli_query($conn, $totalorders_query);
$totalorders = mysqli_fetch_assoc($totalorders_result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Customer Dashboard</title>
    <link rel="stylesheet" href="customerdashboard.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <?php $page='customer'; include ('header.php') ?>

    <!--Logged in Customer's Profile Zone -->
    <div class="profile">
      <!-- Side Menu -->
      <div class="profile-category">
        <div class="profile-sidemenu">
          <div class="profile-sidemenu-item active-sidemenu">
            <a href="#">
            <p><i class="fa-solid fa-table-cells-large"></i>Dashboard</p>
            </a>
          </div>
          <div class="profile-sidemenu-item">
          <a href="./customerOrders.php">
            <p><i class="fa-solid fa-rectangle-list"></i>Orders</p>
            </a>
          </div>
          <div class="profile-sidemenu-item">
            <a href="./customerDetails.php">
            <p><i class="fa-solid fa-money-check"></i>Details</p>
            </a>
          </div>
         
        </div>
      </div>

      <div class="welcome-section">
        <div class="welcome-header">
          <h1>Welcome <?php  if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
              echo $row['fullname'];
            }
          } ?>
          </h1>
        </div>

        <!-- ======================= Cards ================== -->
     <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"> <?php echo $totalorders['TotalOrders'] ?></div>
                        <div class="cardName">TOTAL ORDERS</div>
                    </div>

                    <div class="iconBx">
                    <i class="fa-solid fa-rectangle-list"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">0</div>
                        <div class="cardName">TOTAL TRANSACTIONS</div>
                    </div>

                    <div class="iconBx">
                    <i class="fas fa-money-check-alt"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">0</div>
                        <div class="cardName">TOTAL PURCHASES</div>
                    </div>

                    <div class="iconBx">
                    <i class="fas fa-shopping-bag"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">0</div>
                        <div class="cardName">MY WALLET</div>
                    </div>

                    <div class="iconBx">
                    <i class="fas fa-wallet"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">0</div>
                        <div class="cardName">Rewards</div>
                    </div>

                    <div class="iconBx">
                    <i class="fas fa-gift"></i>
                    </div>
                </div>
        </div>
      </div>
    </div>

       

      
      </div>
    </div>

    <!-- Bottom Menu -->
    <div class="bottom-menu">
      <div class="bottom-menu-item active-bottom">
        <a href="#">
        <i class="fa-solid fa-table-cells-large"></i>
        <p>Dashboard</p>
        </a>
      </div>
      <div class="bottom-menu-item">
        <a href="./customerOrders.php">
        <i class="fa-solid fa-rectangle-list"></i>
        <p>Orders</p>
        </a>
      </div>
      <div class="bottom-menu-item">
        <a href="./customerDetails.php">
        <i class="fa-solid fa-money-check"></i>
        <p>Details</p>
        </a>
      </div>
      <!-- <div class="bottom-menu-item">
        <a href="./customerReports.php">
        <i class="fa-solid fa-file"></i>
        <p>Reports</p>
        </a>
      </div> -->
    </div>

    <?php include ('footer.php') ?>
    <script src="app.js"></script>
  </body>
</html>