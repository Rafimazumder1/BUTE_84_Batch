<?php
// require('fpdf.php');
include 'connection.php';

// Get the Registration Number from URL
if (isset($_GET['id'])) {
    $reg_no = $_GET['id'];

    // Fetch data from database
    $sql = "SELECT * FROM V_TOTAL_REG_02 WHERE REG_NO = :reg_no";
    $parse = oci_parse($conn, $sql);
    oci_bind_by_name($parse, ':reg_no', $reg_no);
    oci_execute($parse);

    $row = oci_fetch_assoc($parse);
    if (!$row) {
        die("No data found!");
    }

    oci_free_statement($parse);

    // Create PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    
    // Title
    $pdf->Cell(190, 10, 'Member Registration Details', 1, 1, 'C');

    // Data
    $pdf->SetFont('Arial', '', 12);
    $pdf->Ln(10);
    $pdf->Cell(50, 10, 'Registration No:', 1);
    $pdf->Cell(140, 10, $row['REG_NO'], 1, 1);
    
    $pdf->Cell(50, 10, 'Member Name:', 1);
    $pdf->Cell(140, 10, $row['MEM_NAME'], 1, 1);
    
    $pdf->Cell(50, 10, 'Session:', 1);
    $pdf->Cell(140, 10, $row['BATCH'], 1, 1);
    
    $pdf->Cell(50, 10, 'Mobile No:', 1);
    $pdf->Cell(140, 10, $row['MEM_MOBILE_NO'], 1, 1);
    
    $pdf->Cell(50, 10, 'Degree:', 1);
    $pdf->Cell(140, 10, $row['SECTION_NAME'], 1, 1);
    
    $pdf->Cell(50, 10, 'Total Persons:', 1);
    $pdf->Cell(140, 10, $row['TOT_PERSON'], 1, 1);
    
    // Output PDF
    $pdf->Output();
} else {
    die("Invalid request!");
}
?>
