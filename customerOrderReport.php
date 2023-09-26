<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Database connection code (include your dbconnection.php file)
require_once('dbconnection.php');

// Create a new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Customer');
$pdf->SetTitle('Customer Generated Report');
$pdf->SetSubject('Customer Order Report');
$pdf->SetKeywords('PDF, MySQL, Export, TCPDF');

// Add a page
$pdf->AddPage();

// Fetch data from MySQL
session_start();
if (isset($_SESSION['userid'])) {
  $userid = $_SESSION['userid'];
}

$query = "SELECT * FROM orders where `customer_id` = $userid";
$result = $conn->query($query);


// Define the table structure and headers
$html = '<h1>Customer\'s Orders Report</h1>
            <table border="1">
            <tr>
                <th>Order ID</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Total Price</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Order Date</th>
                <!-- Add more table headers for additional fields -->
            </tr>';

// Loop through the results and add them to the HTML table
while ($row = $result->fetch_assoc()) { 
    $html .= '<tr>';
    $html .= '<td>' . $row['order_id'] . '</td>';
    $html .= '<td>' . $row['customer_id'] . '</td>';
    $html .= '<td>' . $row['customer_name'] . '</td>';
    $html .= '<td>' . $row['product_name'] . '</td>';
    $html .= '<td>' . $row['total_price'] . '</td>';
    $html .= '<td>' . $row['payment'] . '</td>';
    $html .= '<td>' . $row['status'] . '</td>';
    $html .= '<td>' . $row['order_date'] . '</td>';
    $html .= '</tr>';
}

// Close the HTML table
$html .= '</table>';

// Add the HTML table to the PDF
$pdf->writeHTML($html, true, false, false, false, '');


// Output the PDF to the browser
$pdf->Output('Customer\'s_Orders_Report.pdf', 'I'); // 'I' sends the file inline to the browser

// Close the database connection
$conn->close();

