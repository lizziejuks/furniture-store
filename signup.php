<?php
// This code handles form submission
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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to products.php upon successful registration
        header("Location: products.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Online Furniture Store - Signup</title>
    <style>
	nav {
    background-color: #333;
    color: white;
    padding: 1rem;
    text-align: center;
}

nav h2 {
    cursor: pointer;
    font-size: 1.5rem;
}

ul {
    list-style: none;
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

ul li {
    margin: 0 15px;
    cursor: pointer;
    display: inline;
    font-size: 1rem;
    border-bottom: 2px solid transparent;
    padding-bottom: 3px;
    transition: 0.5s;
}

ul li:hover {
    color: darkslategray;
    font-size: 1.1rem;
    border-bottom: 2px solid white;
}

a {
    text-decoration: none;
    color: white;
    margin-left: 15px;
    font-size: 1rem;
    border-bottom: 2px solid transparent;
    padding-bottom: 3px;
    transition: 0.5s;
}

a:hover {
    color: darkslategray;
    font-size: 1.1rem;
    border-bottom: 2px solid white;
}

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            background-color: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        nav h2 {
            cursor: pointer;
        }

        .showD {
            background-color: #f0f0f0;
            padding: 2rem;
        }

        .left {
            width: 50%;
            margin: auto;
            text-align: center;
        }

        .left h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .left p {
            font-size: 1.2rem;
            color: #444;
        }

        button {
            width: 150px;
            height: 40px;
            background-color: #333;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            margin-top: 1.5rem;
            cursor: pointer;
            transition: 0.5s;
        }

        button:hover {
            background-color: #222;
        }

        .showM {
            background-color: #fff;
            padding: 2rem;
        }

        .signup-form {
            width: 50%;
            margin: auto;
            text-align: center;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 1rem;
        }

        input {
            width: 300px;
            height: 30px;
            margin-bottom: 1rem;
            padding: 8px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            width: 150px;
            height: 40px;
            background-color: #333;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.5s;
        }

        button[type="submit"]:hover {
            background-color: #222;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <h2>ONLINE FURNITURE STORE</h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Store</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="about.php">About Us</a></li>
				<li><a href="signup.php">Sign Up</a></li>
				<li><a href="login.php.php">Log In</a></li>
            </ul>
        </nav>
        </nav>
        <section class="showD">
            <div class="left">
                <h1>ASHLIZ FURNITURE</h1>
                <p>Furnish your home, furnish your life.</p>
                <button>Explore</button>
            </div>
        </section>
        <section class="showM">
            <!-- Signup Form -->
            <div class="signup-form">
                <h2>Sign Up</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="name">Name:</label>
                    <input type="text" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" required>

                    <label for="password">Password:</label>
                    <input type="password" name="password" required>

                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>

