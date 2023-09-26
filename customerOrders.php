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



$sql = "SELECT * FROM orders where `customer_id` = $userid";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orders | Customer Dashboard</title>
  <link rel="stylesheet" href="customerdashboard.css" />
  <link rel="stylesheet" href="adminProduct.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php $page = 'customer';
  include('header.php') ?>

  <!--Logged in Customer's Profile Zone -->
  <div class="profile">
    <!-- Side Menu -->
    <div class="profile-category">
      <div class="profile-sidemenu">
        <div class="profile-sidemenu-item ">
          <a href="./customerDashboard.php">
            <p><i class="fa-solid fa-table-cells-large"></i>Dashboard</p>
          </a>
        </div>
        <div class="profile-sidemenu-item active-sidemenu">
          <a href="#">
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
    

      <div class="order-header">
                <h2>Recent Orders</h2>
                <a href="customerOrderReport.php" class="generateReport-btn">Generate Report</a>
            </div>


      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Product Name</th>
              <th>Address</th>
              <th>Payment Type</th>
              <th>Order Status</th>
              <th>Order Created</th>

            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($result) > 0): ?>
              <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                  <td>
                    <?php echo $row["order_id"]; ?>
                  </td>
              
                  <td>
                    <?php echo $row["product_name"]; ?>
                  </td>
          
                  <td>
                    <?php echo $row["address"]; ?>
                  </td>

                  <td>
                    <?php echo $row["payment"]; ?>
                  </td>
                  <td>
                    <?php echo $row["status"]; ?>
                  </td>
                  <td>
                    <?php echo $row["order_date"]; ?>
                  </td>

                </tr>
              <?php endwhile; ?>
            </tbody>
          <?php else: ?>
            <tr>
              <td colspan='5'>"No orders found."</td>
            </tr>
          <?php endif; ?>
        </table>
      </div>


    </div>
  </div>

  <!-- Bottom Menu -->
  <div class="bottom-menu">
      <div class="bottom-menu-item ">
        <a href="./customerDashboard.php">
        <i class="fa-solid fa-table-cells-large"></i>
        <p>Dashboard</p>
        </a>
      </div>
      <div class="bottom-menu-item active-bottom">
        <a href="#">
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
     
    </div>

  <?php include('footer.php') ?>
  <script src="app.js"></script>
</body>

</html>