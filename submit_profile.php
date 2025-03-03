<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Include database connection code here
$conn = new mysqli("localhost", "root", "Password", "valorantlol");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user ID from session
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Validate form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bio = $_POST["bio"];
    $description = $_POST["description"];
    $profile_pic_url = $_POST["profile_pic_url"];

    // Update user's profile in the database
    $stmt = $conn->prepare("INSERT INTO profiles (bio, description, profile_pic_url, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $bio, $description, $profile_pic_url, $user_id);

    if ($stmt->execute()) {
        // Redirect back to the index page
        header("Location: index.php?message=Response%20posted");
        exit();
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>