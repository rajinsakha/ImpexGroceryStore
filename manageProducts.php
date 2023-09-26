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


$sql = "SELECT * FROM products JOIN admins ON products.admin_id = admins.admin_id;";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Admin Dashboard</title>
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
                    <a href="#">
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


            <!-- Product List -->
            <div class="header">
                <h2>Product List</h2>
                <div class="btns">
                    <a href="#" id="add_product_button">Add Product</a>
                    <a href="generateProductReport.php" class="generateReport-btn">Generate Report</a>

                </div>


            </div>

            <div id="alertContainer">
                <?php include('message.php') ?>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Added By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td>
                                        <?php echo $row["product_id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["name"]; ?>
                                    </td>
                                    <td>
                                        <img src="./assets/<?= $row["img_main"]; ?>" alt="<?php echo $row["img_main"] ?>"
                                            class="product-image" />

                                    </td>
                                    <td>Rs
                                        <?php echo $row["price"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["quantity"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["category"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["fullname"]; ?>
                                    </td>
                                    <td>
                                        <a href="updateProducts.php?product_id=<?php echo $row['product_id'] ?>"
                                            class="edit-button">Edit</a>
                                        <a href="deleteProducts.php?product_id=<?php echo $row['product_id']; ?>"
                                            class="delete-button">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    <?php else: ?>
                        <tr>
                            <td colspan='4'> "No products found."</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>


            <!-- Add Product Modal -->
            <div class="modal" id="add_product_modal">
                <div class="modal-content">
                    <span class="close" id="close_add_modal">&times;</span>
                    <h3>Add Product</h3>
                    <form id="productForm" action="addProducts.php" method="POST" enctype="multipart/form-data"
                        novalidate>
                        <label for="productName">Product Name:</label>
                        <input type="text" id="productName" name="productName">
                        <div class="name-error"></div>

                        <label for="productDescription">Description:</label>
                        <textarea id="productDescription" name="productDescription"></textarea>
                        <div class="description-error"></div>

                        <label for="productCategory">Category:</label>
                        <input type="text" id="productCategory" name="productCategory">
                        <div class="category-error"></div>

                        <div class="field-row">
                            <div class="field-row-item">
                                <label for="productPrice">Price:</label>
                                <input type="number" id="productPrice" name="productPrice" step="5">
                                <div class="price-error"></div>
                            </div>

                            <div class="field-row-item">
                                <label for="productQuantity">Quantity:</label>
                                <input type="number" id="productQuantity" name="productQuantity">
                                <div class="quantity-error"></div>
                            </div>
                        </div>

                        <div class="field-row">
                            <div class="field-row-item">
                                <label for="productImage">Product Image:</label>
                                <input type="file" id="productImage" name="productImage" accept="image/*">
                                <div class="image1-error"></div>
                            </div>

                            <div class="field-row-item">
                                <label for="productImage">Product Image 2:</label>
                                <input type="file" id="productImage2" name="productImage2" accept="image/*">
                                <div class="image2-error"></div>
                            </div>
                        </div>

                        <div class="field-row gap">
                            <div class="field-row-item">
                                <label for="productImage">Product Image 3:</label>
                                <input type="file" id="productImage3" name="productImage3" accept="image/*">
                                <div class="image3-error"></div>
                            </div>

                            <div class="field-row-item">
                                <label for="productImage">Product Image 4:</label>
                                <input type="file" id="productImage4" name="productImage4" accept="image/*">
                                <div class="image4-error"></div>
                            </div>
                        </div>


                        <button type="submit">Add Product</button>
                    </form>
                </div>
            </div>



            <div>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const addProductButton = document.getElementById("add_product_button");
                        const closeModalButton = document.getElementById("close_add_modal");
                        const modal = document.getElementById("add_product_modal");

                        addProductButton.addEventListener("click", function () {
                            modal.style.display = "block";
                        });

                        closeModalButton.addEventListener("click", function () {
                            modal.style.display = "none";
                        });

                        window.addEventListener("click", function (event) {
                            if (event.target === modal) {
                                modal.style.display = "none";
                            }
                        });

                    });
                </script>


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
                <script src="message.js"></script>
                <script src="validateProducts.js"></script>
                <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>