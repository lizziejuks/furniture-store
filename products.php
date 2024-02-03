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

// Retrieve products from the database
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
    <title>Online Furniture Store - Products</title>
</head>
<body>
    <div class="container">
        <nav>
            <h2>ONLINE FURNITURE STORE</h2>
            <!-- Add your navigation links here -->
        </nav>
        <section class="showD">
            <div class="left">
                <h1>ASHLIZ FURNITURE</h1>
                <p>Furnish your home, furnish your life.</p>
                <button>Explore</button>
            </div>
        </section>
        <section class="showM">
            <!-- Display Products -->
            <div class="products-list">
                <h2>Our Products</h2>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<img src='" . $row['image_url'] . "' alt='" . $row['name'] . "'>";
                        echo "<div class='info'>";
                        echo "<h4>" . $row['name'] . "</h4>";
                        echo "<b>ksh." . $row['price'] . "</b>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No products available.";
                }
                ?>
            </div>
        </section>
    </div>
</body>
</html>
