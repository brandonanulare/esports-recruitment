<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Include database connection code here
$conn = new mysqli("localhost", "root", "Password", "valorantlol");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the sender's user ID from the session
$sender_id = $_SESSION['user_id'];

// Retrieve form data
$recipient_username = $_POST['recipient']; // Assuming you're submitting the recipient's username in the form

// Prepare and bind the SQL statement to retrieve the recipient's user ID
$sql = "SELECT users_id FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $recipient_username);
$stmt->execute();
$stmt->bind_result($recipient_id);
$stmt->fetch();
$stmt->close();

// Check if the recipient exists
if ($recipient_id) {
    // Retrieve the message from the form data
    $message = $_POST['message'];

    // Prepare and execute the SQL insert statement
    $sql = "INSERT INTO messages (sender_id, recipient_id, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $sender_id, $recipient_id, $message);
    $stmt->execute();
    $stmt->close();
} else {
    // Handle the case where the recipient does not exist
    echo "Recipient not found.";
}

// Close the database connection
$conn->close();

// Redirect to a success page or display a success message
header("Location: inbox.php");
exit();
?>