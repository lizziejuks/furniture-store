<?php
// Start session to check if the user is logged in
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Connect to the database (replace these with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Online Furniture Store</title>
</head>
<body>
    <div class="container">
        <nav>
            <h2>ONLINE FURNITURE STORE</h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Store</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="about.php">About Us</a></li>
                
                <li><a href="logout.php">Log Out</a></li><!-- Add a logout link -->
            </ul>
        </nav>
        <section class="showD">
            <div class="left">
                <h1>ASHLIZ FURNITURE</h1>
                <p>
                    Furnish your home, furnish your life. 
                </p>
                <button></button>
            </div>
        </section>
        
    </div>
</body>
</html>
