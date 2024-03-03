<?php
// Replace these with your actual database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "flowerdb";

try {
    // Create a new PDO instance (assuming you're using MySQL)
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define your SQL query
    $sql = "INSERT INTO `order` (first_name, last_name, phone_number, email, address, flowers, quantity, order_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind the parameters (replace these with actual values)
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $phone_number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $flowers = $_POST['flowers'];
    $quantity = $_POST['quantity'];
    $order_date = $_POST['order_date'];


    $stmt->bindParam(1, $first_name);
    $stmt->bindParam(2, $last_name);
    $stmt->bindParam(3, $phone_number);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(5, $address);
    $stmt->bindParam(6, $flowers);
    $stmt->bindParam(7, $quantity);
    $stmt->bindParam(8, $order_date);

    // Execute the statement
    $stmt->execute();

    echo "Order successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
