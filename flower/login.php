
<html>
<body>

<?php
// Assign form values to variables
$username = $_POST["username"];
$password = $_POST["password"];


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
$sql = "INSERT INTO login ( c_username , c_password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ss", $username,$password);

if ($stmt->execute()) {
  echo "Login successfully";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

</body>
</html>
