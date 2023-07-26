<!DOCTYPE html>
<html>
<head>
    <title>Basic Form</title>
</head>
<body>
    <form id="basicForm" method="post" action="generate_pdf.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <button type="submit">Download</button>
    </form>


<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the FPDF library
    require('fpdf/fpdf.php');

    // Get form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Create a new PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Add content to the PDF
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Form Data', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Name: $name", 0, 1);
    $pdf->Cell(0, 10, "Address: $address", 0, 1);
    $pdf->Cell(0, 10, "Phone Number: $phone", 0, 1);

    // Output the PDF as a download
    $pdf->Output('Form_Data.pdf', 'D');
    exit;
}
?>

</body>
</html>

