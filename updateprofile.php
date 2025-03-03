<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Update session variables with form data
    $_SESSION["bio"] = $_POST["bio"];
    $_SESSION["description"] = $_POST["description"];
    $_SESSION["profile_picture"] = $_POST["profile_picture"];

    // Redirect back to the edit profile page with a success message
    header("Location: edit_profile.php?success=1");
    exit();
} else {
    // Redirect back to the edit profile page with an error message
    header("Location: edit_profile.php?error=1");
    exit();
}
?>