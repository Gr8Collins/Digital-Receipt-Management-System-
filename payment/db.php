<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // Use your MySQL root password if any

// Step 1: Create connection to MySQL server (no DB selected yet)
$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Create database
$sql = "CREATE DATABASE IF NOT EXISTS great_collins_technologies";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully.<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Step 3: Select the database
mysqli_select_db($conn, "great_collins_technologies");

// Step 4: Create payments table

$tableSql= "CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    payment_id VARCHAR(50) NOT NULL,
    payer_name VARCHAR(100) NOT NULL,
    payment_date DATE NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    first_payment DECIMAL(10, 2),
    second_payment DECIMAL(10, 2)
)";


if (mysqli_query($conn, $tableSql)) {
    echo "Table 'payments' created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
