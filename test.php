<?php
$servername = "localhost";
$username = "saimapdi";
$password = "SACamels4!";
$dbname = "saimapdi_studentinfosa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT program, city, country FROM SA Institution Info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "program: " . $row["progran"]. " - Name: " . $row["city"]. " " . $row["country"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>