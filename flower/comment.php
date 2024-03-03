<html>
<body>

<?php
// Assign form values to variables
$comment = $_POST["message"];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flowerdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connectionz
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Use prepared statements to prevent SQL injection
$sql = "INSERT INTO comment (c_message) VALUES (?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $comment );
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


