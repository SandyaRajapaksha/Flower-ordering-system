<html>
<body>

<?php
// Assign form values to variables
$fristname = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flowerdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Use prepared statements to prevent SQL injection
$sql = "INSERT INTO contact (f_name,  c_email  , c_message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("sss", $fristname,$email,$message );

if ($stmt->execute()) {
  echo "New record created successfully";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

</body>
</html>
