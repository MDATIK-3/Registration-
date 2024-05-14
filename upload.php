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

    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $targetDirectory = "uploads/"; 
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]); 

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (getimagesize($_FILES["image"]["tmp_name"]) === false) {
            echo "Error: File is not an image.";
            exit;
        }

        if (file_exists($targetFile)) {
            echo "Error: File already exists.";
            exit;
        }

        if ($_FILES["image"]["size"] > 5 * 1024 * 1024) {
            echo "Error: File is too large.";
            exit;
        }

        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            exit;
        }

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "Error uploading image.";
            exit;
        }

        $imagePath = $targetFile;
        $userId = 1; 
        $sql = "INSERT INTO photo (user_id, image_path) VALUES ('$userId', '$imagePath')";
        if ($conn->query($sql) === TRUE) {
            echo "Image uploaded successfully.";
        } else {
            echo "Error inserting image path into database: " . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
