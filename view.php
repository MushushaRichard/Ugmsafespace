<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete incident if a delete request is received
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    $deleteSql = "DELETE FROM incidents WHERE id = $deleteId";
    $conn->query($deleteSql);
}

// Retrieve incidents from the database
$sql = "SELECT * FROM incidents";
$result = $conn->query($sql);

// Display the incidents in a table with delete option
echo "<h2>Reported Incidents</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Gender</th><th>Incident Type</th><th>Location</th><th>Description</th><th>Date</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['incident_type'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['created_at'] . "</td>";
    echo "<td><a href='view.php?delete=" . $row['id'] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";

// Close the database connection
$conn->close();
?>
