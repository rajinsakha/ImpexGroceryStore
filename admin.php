<?php
require('dbconnection.php');

session_start();
if (!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] != true) {
    header("location:adminlogin.php");
    exit();
}

$adminid = $_SESSION['adminid'];

$adminsql = "SELECT * FROM admins WHERE admin_id = $adminid";
$adminresult = mysqli_query($conn, $adminsql);

$customersql = "SELECT * FROM customers";
$customerresult = mysqli_query($conn, $customersql);

$ordersql = "SELECT * FROM orders";
$orderresult = mysqli_query($conn, $ordersql);

$totalcustomers_query = "SELECT COUNT(*) AS TotalCustomers FROM customers";
$totalcustomers_result = mysqli_query($conn, $totalcustomers_query);
$totalcustomers = mysqli_fetch_assoc($totalcustomers_result);

$totalproducts_query = "SELECT COUNT(*) AS TotalProducts FROM products";
$totalproducts_result = mysqli_query($conn, $totalproducts_query);
$totalproducts = mysqli_fetch_assoc($totalproducts_result);

$totalorders_query = "SELECT COUNT(*) AS TotalOrders FROM orders";
$totalorders_result = mysqli_query($conn, $totalorders_query);
$totalorders = mysqli_fetch_assoc($totalorders_result);



$totalearning_query = "SELECT SUM(total_price) AS TotalAmount
FROM orders";
$totalearning_result = mysqli_query($conn, $totalearning_query);
$totalearning = mysqli_fetch_assoc($totalearning_result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title"><?php  if (mysqli_num_rows($adminresult) > 0){
            while ($row1 = mysqli_fetch_assoc($adminresult)){
              echo $row1['fullname'];
            }
          } ?></span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="./manageProducts.php">
                        <span class="icon">
                            <ion-icon name="cube-outline"></ion-icon>
                        </span>
                        <span class="title">Products</span>
                    </a>
                </li>

                <li>
                    <a href="./manageOrders.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Orders</span>
                    </a>
                </li>

                <li>
                    <a href="./manageCustomers.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="./manageMessages.php">
                        <span class="icon">
                            <ion-icon name="mail-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>

                    </a>
                </li>

                <li>
                    <a href="./adminlogout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <div class="user">
                    <img src="assets/user.png" alt="user-profile-img">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php echo $totalcustomers['TotalCustomers'] ?>
                        </div>
                        <div class="cardName">Customers</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php echo $totalproducts['TotalProducts'] ?>
                        </div>
                        <div class="cardName">Products</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cube-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php echo $totalorders['TotalOrders'] ?>
                        </div>
                        <div class="cardName">Orders</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            if (mysqli_num_rows($orderresult) > 0) {
                                echo $totalearning['TotalAmount'];
                            } else {
                                echo "0";
                            }
                            ?>
                        </div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>


            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="./manageOrders.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (mysqli_num_rows($orderresult) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($orderresult)): ?>
                                    <tr>
                                        <td>
                                            <?php echo $row["product_name"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["total_price"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["payment"] ?>
                                        </td>
                                        <td>
                                            <?php echo $row["status"] ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>

                            <?php else: ?>
                                <tr>
                                    <td colspan='4'>No Orders found</td>
                                </tr>
                            <?php endif; ?>


                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>

                        <?php
                        if (mysqli_num_rows($customerresult) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($customerresult)): ?>
                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="assets/user.png" alt="customer-img"></div>
                                    </td>
                                    <td>
                                        <h4>
                                            <?php echo $row["fullname"]; ?>
                                        </h4>
                                    </td>

                                </tr>
                            <?php endwhile; ?>

                        <?php else: ?>
                            <tr>
                                <td colspan='4'>No customers found</td>
                            </tr>
                        <?php endif; ?>


                    </table>
                </div>
            </div>
        </div>
    </div>




    <!-- =========== Scripts =========  -->
    <script>
        // add hovered class to selected list item
        let list = document.querySelectorAll(".navigation li");

        function activeLink() {
            list.forEach((item) => {
                item.classList.remove("hovered");
            });
            this.classList.add("hovered");
        }

        list.forEach((item) => item.addEventListener("mouseover", activeLink));

        // Menu Toggle
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");

        toggle.onclick = function () {
            navigation.classList.toggle("active");
            main.classList.toggle("active");
        };

    </script>



    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>