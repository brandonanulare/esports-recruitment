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

// Retrieve user's information from the database (example)
$user_id = isset($_SESSION['users_id']) ? $_SESSION['users_id'] : null;
if (!$user_id) {
    echo "Username not found.";
    exit();
}

// Update user's information if profile form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["profile_submit"])) {
    $new_bio = $_POST["bio"];
    $new_description = $_POST["description"];
    $new_profile_pic_url = $_POST["profile_pic_url"];

    // Process the submitted profile form data (e.g., update database with new information)
    $stmt_update = $conn->prepare("UPDATE profiles SET bio=?, description=?, profile_pic_url=? WHERE users_id=?");
    $stmt_update->bind_param("sssi", $new_bio, $new_description, $new_profile_pic_url, $user_id);

    if ($stmt_update->execute()) {
        echo "Profile updated successfully";
        // Redirect to the same page to prevent form resubmission
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating profile: " . $stmt_update->error;
    }

    $stmt_update->close();
}

$conn->close();
?>