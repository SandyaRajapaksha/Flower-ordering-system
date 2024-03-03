<html>
<body>

<?php
// Assign form values to variables
$cardnumber= $_POST["card_number"];
$cardholder = $_POST["card_holder"];
$expmonth = $_POST["exp_month"];
$cvv = $_POST["cvv"];




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
$sql = "INSERT INTO payments (card_number,card_holder,exp_month,cvv,created_at) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("iiiii", $cardnumber,$cardholder,$expmonth,$cvv ,$createdat);

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
