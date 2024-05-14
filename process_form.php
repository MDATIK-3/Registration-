<?php
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


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Form submitted successfully!";
} else {
    echo "Error submitting form: " . $conn->error;
}

$conn->close();
?>