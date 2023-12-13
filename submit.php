<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GBV";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$gender = $_POST['gender'];
$incident_type = $_POST['incident_type'];
$location = $_POST['location'];
$description = $_POST['description'];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO incidents (name, gender, incident_type, location, description) 
                        VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param("sssss", $name, $gender, $incident_type, $location, $description);

if ($stmt->execute()) {
    echo "Incident reported successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>
