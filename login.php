<?php
// Start session to store user information
session_start();

// Check if the user is already logged in, redirect to products.php
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// This code handles login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get user input from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];

            // Redirect to index.php upon successful login
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "User not found. Please check your email.";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Online Furniture Store - Login</title>
</head>
<body>
    <div class="container">
        <nav>
            <h2>ONLINE FURNITURE STORE</h2>
            <!-- Add your navigation links here -->
			<ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Store</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="about.php">About Us</a></li>
				<li><a href="signup.php">Sign Up</a></li>
				<li><a href="login.php">Log In</a></li>
            </ul>
        </nav>
        <section class="showD">
            <div class="left">
                <h1>ASHLIZ FURNITURE</h1>
                <p>Furnish your home, furnish your life.</p>
                <button>Explore</button>
            </div>
        </section>
        <section class="showM">
            <!-- Login Form -->
            <div class="login-form">
                <h2>Login</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" name="password" required>

                    <button type="submit">Login</button>
                </form>
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </section>
    </div>
</body>
</html>
