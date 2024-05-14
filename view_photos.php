<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Photos</title>
</head>

<body>
    <h2>View Photos</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="id">Enter User ID:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">View Photos</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $servername = "bjqhjj2wffm0vlsxosod-mysql.services.clever-cloud.com";
        $dusername = "uscrs25u233rjkv0";
        $dpassword = "nqkVFEYCdNWaX9Ud1kx4";
        $dbname = "bjqhjj2wffm0vlsxosod";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $id = $_POST["id"];

        $sql = "SELECT image_path FROM photo WHERE id = '$id'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $image_path = $row['image_path'];
                echo '<img src="' . $image_path . '" alt="User Photo"><br>';
            }
        } else {
            echo "No photos found for this user.";
        }


        $conn->close();
    }
    ?>
</body>

</html>