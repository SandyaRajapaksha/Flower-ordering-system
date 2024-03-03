<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost"; // Replace with your database server name
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "flowerdb"; // Replace with your database name

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $phone_number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $flowers = $_POST['flowers'];
    $quantity = $_POST['quantity'];
    $order_date = $_POST['order_date'];

    // SQL to insert data into the table
    $sql = "INSERT INTO order(first_name, last_name, phone_number, email, address, flowers, quantity, order_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssis", $first_name, $last_name, $phone_number, $email, $address, $flowers, $quantity, $order_date);

    if ($stmt->execute()) {
        echo "Order information has been successfully saved.";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
