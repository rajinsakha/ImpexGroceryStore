<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Database connection code (include your dbconnection.php file)
require_once('dbconnection.php');

// Create a new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Impex Grocery Store');
$pdf->SetTitle('Products Report');
$pdf->SetSubject('Detailed Products Report');
$pdf->SetKeywords('PDF, MySQL, Export, TCPDF');

// Add a page
$pdf->AddPage();

// Fetch data from MySQL
$query = "SELECT * FROM products JOIN admins ON products.admin_id = admins.admin_id;";
$result = $conn->query($query);


// Define the table structure and headers
$html = '<h1>Products Report</h1>
            <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Added By</th>
                <th>Added Date</th>
            </tr>';

// Loop through the results and add them to the HTML table
while ($row = $result->fetch_assoc()) {
    $html .= '<tr>';
    $html .= '<td>' . $row['product_id'] . '</td>';
    $html .= '<td>' . $row['name'] . '</td>';
    $html .= '<td>' . $row['price'] . '</td>';
    $html .= '<td>' . $row['quantity'] . '</td>';
    $html .= '<td>' . $row['category'] . '</td>';
    $html .= '<td>' . $row['fullname'] . '</td>';
    $html .= '<td>' . $row['created_at'] . '</td>';
    
    $html .= '</tr>';
}

// Close the HTML table
$html .= '</table>';

// Add the HTML table to the PDF
$pdf->writeHTML($html, true, false, false, false, '');


// Output the PDF to the browser
$pdf->Output('Products_Report.pdf', 'I'); // 'I' sends the file inline to the browser

// Close the database connection
$conn->close();