<?php
//require_once('C:\Users\VICTUS\Downloads\UniServerZ\www\Device Management System - Copy\TCPDF-main/tcpdf_include.php');



// Include the TCPDF library
require_once('tcpdf_include.php');

// Create a new TCPDF document
$pdf = new TCPDF();

// Set the font for the document
$pdf->SetFont('helvetica', '', 11);

// Add a page to the document
$pdf->AddPage();

// Define some sample data for the table
$data = array(
    array('Name', 'Age', 'Gender'),
    array('John', '30', 'Male'),
    array('Jane', '25', 'Female'),
    array('Bob', '35', 'Male'),
);

// Generate the HTML for the table
$html = '<table border="1">';
foreach ($data as $row) {
    $html .= '<tr>';
    foreach ($row as $cell) {
        $html .= '<td>' . $cell . '</td>';
    }
    $html .= '</tr>';
}
$html .= '</table>';

// Write the HTML to the PDF document
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF document
$pdf->Output('table.pdf', 'I');
?>
