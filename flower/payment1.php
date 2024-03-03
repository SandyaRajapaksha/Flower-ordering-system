<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's input
    $card_number = $_POST["card_number"];
    $expiration_date = $_POST["expiration_date"];
    $cvv = $_POST["cvv"];
    $amount = $_POST["amount"];

    // You should validate and sanitize the input data here
    // For a real implementation, consider using a payment gateway library like Stripe or PayPal

    // Connect to the database (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flowerdb";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert payment data into the database
    $sql = "INSERT INTO payment(card_number, expiration_date, cvv, amount) VALUES ('$card_number', '$expiration_date', '$cvv', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "Payment successful, and data has been inserted into the database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request";
}
?>
