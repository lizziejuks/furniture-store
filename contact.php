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
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];

    // Insert user message into the database
    $sql = "INSERT INTO user_messages (first_name, last_name, country, subject) 
            VALUES ('$firstName', '$lastName', '$country', '$subject')";

    if ($conn->query($sql) === TRUE) {
        echo "Message submitted successfully!";
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
    <title>Online Furniture Store - Contact Us</title>
    <style>
        /* Add your styles here */
        .container {
            width: 80%;
            margin: auto;
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .column {
            flex: 50%;
            padding: 20px;
        }

        form {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
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
				<li><a href="login.php.php">Log In</a></li>
            </ul>
        </nav>
    <div class="container">
        <h2>Contact Us</h2>
        <p>Inquire about our furniture or leave us a message:</p>
        <div class="row">
            <div class="column">
                <img src="sofaset.jpg" style="width:100%">
            </div>
            <div class="column">
                <!-- Contact Form -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

                    <label for="country">Country:</label>
                    <select id="country" name="country" required>
                        
    <option value="kenya">Kenya</option>
    <option value="nairobi">Nairobi</option>
    <option value="mombasa">Mombasa</option>
    <option value="kisumu">Kisumu</option>
                    </select>

                    <label for="subject">Subject:</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px" required></textarea>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
