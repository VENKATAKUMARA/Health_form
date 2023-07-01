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

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO health_reports (name, age, weight, email, report_pdf) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sissb", $name, $age, $weight, $email, $pdfData);

// Get form data
