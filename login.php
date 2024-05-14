<?php
$email = $_POST['email'];
$password = $_POST['password'];

$servername = "bjqhjj2wffm0vlsxosod-mysql.services.clever-cloud.com";
$dusername = "uscrs25u233rjkv0";
$dpassword = "nqkVFEYCdNWaX9Ud1kx4";
$dbname = "bjqhjj2wffm0vlsxosod";

$conn = new mysqli($servername, $dusername, $dpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $username = "MD.Atik";
    header("Location: https://codeforces.com/profile/" . urlencode($username));
exit();
} else {
    echo "Invalid username or password";
}

$conn->close();
?>