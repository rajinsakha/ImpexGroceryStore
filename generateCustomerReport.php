<?php
// Including the TCPDF library
require_once('tcpdf/tcpdf.php');

// Database connection code 
require_once('dbconnection.php');

// Creating a new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Setting document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Impex Grocery Store');
$pdf->SetTitle('Customer Reports');
$pdf->SetSubject('Customer Reports in PDF');
$pdf->SetKeywords('PDF, MySQL, Export, TCPDF');

// Adding a page
$pdf->AddPage();

// Fetching data from MySQL
$query = "SELECT * FROM customers";
$result = $conn->query($query);

// Defining the table structure and headers
$html = '<h1>Customers Report</h1>
            <table border="1">
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Created At</th>
            </tr>';

// Looping through the results and adding them to the HTML table
while ($row = $result->fetch_assoc()) {
    $html .= '<tr>'; 
    $html .= '<td>' . $row['customer_id'] . '</td>';
    $html .= '<td>' . $row['fullname'] . '</td>';
    $html .= '<td>' . $row['email'] . '</td>';
    $html .= '<td>' . $row['mobile_num'] . '</td>';
    $html .= '<td>' . $row['created_at'] . '</td>';
    $html .= '</tr>';
}

// Closing the HTML table
$html .= '</table>';

// Adding the HTML table to the PDF
$pdf->writeHTML($html, true, false, false, false, '');

// Output the PDF to the browser
$pdf->Output('Customers_Report.pdf', 'I'); // 'I' sends the file inline to the browser

// Closing the database connection
$conn->close();