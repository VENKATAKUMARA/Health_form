<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the email ID from the request
$email = $_GET['email'];

// Prepare and bind statement
$stmt = $conn->prepare("SELECT report_pdf FROM health_reports WHERE email = ?");
$stmt->bind_param("s", $email);

// Execute the statement
$stmt->execute();

// Bind the result to a variable
$stmt->bind_result($pdfData);

// Fetch the result
$stmt->fetch();

// Set the appropriate header for PDF file download
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="health_report.pdf"');

// Output the PDF file content
echo $pdfData;

// Close the statement and connection
$stmt->close();
$conn->close();
?>
