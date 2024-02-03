<?php
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
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

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
				<li><a href="signup.php">Sign Up</a></li>
				<li><a href="login.php.php">Log In</a></li>
            </ul>
        </nav>
        <section class="showD">
            <div class="left">
                <h1>ASHLIZ FURNITURE</h1>
                <p>
                    Furnish your home, furnish your life. 
                </p>
                <button>Explore</button>
            </div>
        </section>
        <section class="showM">
            <?php
            // Display products dynamically
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div>';
                    echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '">';
                    echo '<div class="info">';
                    echo '<h4>' . $row['name'] . '</h4>';
                    echo '<b>ksh.' . number_format($row['price'], 2) . '</b>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products available</p>';
            }
            ?>
        </section>
    </div>
</body>
</html>
