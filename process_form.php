<?php
    $message ="";
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
// mysql://uscrs25u233rjkv0:nqkVFEYCdNWaX9Ud1kx4@bjqhjj2wffm0vlsxosod-mysql.services.clever-cloud.com:3306/bjqhjj2wffm0vlsxosod



// $servername = "localhost";
// $dusername = "root";
// $dpassword = "";
// $dbname = "registation";

$servername = "bjqhjj2wffm0vlsxosod-mysql.services.clever-cloud.com";
$dusername = "uscrs25u233rjkv0";
$dpassword = "nqkVFEYCdNWaX9Ud1kx4";
$dbname = "bjqhjj2wffm0vlsxosod";

$conn = new mysqli($servername, $dusername, $dpassword, $dbname);
// echo"$conn";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
$result = $conn->query($sql);
if ($result === TRUE) {
    $message = "Form submitted successfully!";
    // echo $name.$email.$password;
    // echo $conn->error;
} else {
    echo "Error submitting form: " . $conn->error;
}

$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.pexels.com/photos/956999/milky-way-starry-sky-night-sky-star-956999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .container {
            
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            padding: 20px 60px 40px 60px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            animation: fadeIn 1s ease;
            min-width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        form {
            display: flex;
            flex-direction: column;
           
        }

        label {
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            background-color: #e0e0e0;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registration Form</h2>
        <p> <?php echo $message; ?></p>
        <form action="" method="POST" onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value.trim();
            var email = document.getElementById('email').value.trim();
            var password = document.getElementById('password').value;

            if (name === "" || email === "" || password === "") {
                alert("Please fill out all fields.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
