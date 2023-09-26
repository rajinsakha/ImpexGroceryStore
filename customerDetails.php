<?php

require('dbconnection.php');
session_start();
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    // Now you can use $userid for further processing
}
$sql = "SELECT * FROM customers where customer_id = $userid";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Details | Customer Dashboard</title>
    <link rel="stylesheet" href="customerdashboard.css" />
    <link rel="stylesheet" href="customerDetails.css">
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
                <div class="profile-sidemenu-item">
                    <a href="./customerOrders.php">
                        <p><i class="fa-solid fa-rectangle-list"></i>Orders</p>
                    </a>
                </div>
                <div class="profile-sidemenu-item active-sidemenu">
                    <a href="#">
                        <p><i class="fa-solid fa-money-check"></i>Details</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="profile-details section-padding">
            <?php
            if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                <div class="card">
                <h1>Profile Details</h1>
                <div class="row">
                    <div class="row-1">
                        <h2>Fullname</h2>
                    </div>
                    <div class="row-2">
                        <p><?php echo $row["fullname"]; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="row-1">
                        <h2>Email</h2>
                    </div>
                    <div class="row-2">
                        <p><?php echo $row["email"]; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="row-1">
                        <h2>Phone</h2>
                    </div>
                    <div class="row-2">
                      <p><?php echo $row["mobile_num"]; ?></p>  
                    </div>
                </div>
            </div>

                    <!-- <div>
                    <h3>Account Created: <span> <?php echo $row["fullname"]; ?></span></h3>
                  </div>

                  <div>
                    <h3>Full Name : <span> <?php echo $row["fullname"]; ?></span></h3>
                  </div> -->


                <?php endwhile; ?>

            <?php else: ?>
                <div>
                    <h1>"No Details found."</h1>
                </div>
            <?php endif; ?>


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
      <div class="bottom-menu-item">
        <a href="./customerOrders.php">
        <i class="fa-solid fa-rectangle-list"></i>
        <p>Orders</p>
        </a>
      </div>
      <div class="bottom-menu-item active-bottom">
        <a href="#">
        <i class="fa-solid fa-money-check"></i>
        <p>Details</p>
        </a>
      </div>
    
    </div>

    <?php include('footer.php') ?>
    <script src="app.js"></script>
</body>

</html>