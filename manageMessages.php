<?php
require('dbconnection.php');
session_start();

if (!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] != true) {
    header("location:adminlogin.php");
    exit();
}

$adminid = $_SESSION['adminid'];

$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);

$adminsql = "SELECT * FROM admins WHERE admin_id = $adminid";
$adminresult = mysqli_query($conn, $adminsql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers | Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="adminProduct.css">
    <link rel="stylesheet" href="message.css">
</head>

<body>

    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title">
                            <?php if (mysqli_num_rows($adminresult) > 0) {
                                while ($row1 = mysqli_fetch_assoc($adminresult)) {
                                    echo $row1['fullname'];
                                }
                            } ?>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="./admin.php">
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
                    <img src="assets/user.png" alt="user">
                </div>
            </div>

            <!-- Customer List -->
            <div class="header">
                <h2>Message List</h2>
            </div>

            <div id="alertContainer">
                <?php include('message.php') ?>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Received Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td>
                                        <?php echo $row["message_id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["fullname"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["email"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["message"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["message_date"]; ?>
                                    </td>
                                    <td>

                                        <a href="deleteMessages.php?message_id=<?php echo $row['message_id']; ?>"
                                            class="delete-button">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    <?php else: ?>
                        <tr>
                            <td colspan='7'>"No Customers found."</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>



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


            <script src="message.js"></script>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>