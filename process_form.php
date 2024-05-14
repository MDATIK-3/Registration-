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
// echo"$conn";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "Form submitted successfully!";
    echo $name.$email.$password;
    echo $conn->error;
} else {
    echo "Error submitting form: " . $conn->error;
}

$conn->close();
?>