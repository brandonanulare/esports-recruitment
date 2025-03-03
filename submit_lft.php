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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $game = $_POST["game"];
    $rank = $_POST["rank"];
    $description = $_POST["description"];
    $username = $_SESSION["username"];

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO lft_submissions (name, game, `rank`, description, username) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $game, $rank, $description, $username);
    
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