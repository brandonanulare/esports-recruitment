<?php
session_start();
// Check if user is logged in
$loggedIn = isset($_SESSION["username"]);

// Include database connection code here
$conn = new mysqli("localhost", "root", "Password", "valorantlol");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url('background.jpg'); /* Specify the path to your background image */
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the background image */
            /* Add more background properties as needed */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .logo {
            flex: 1;
        }

        .center-logo img {
            width: 350px;
            height: 100px;
        }

        .user {
            flex: 1;
            text-align: right;
        }

        .inbox {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Adjust the number of columns as needed */
            gap: 20px; /* Add gap between messages */
            margin-top: 20px;
        }

        .message {
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
        }

        .message p {
            margin: 0;
            padding: 5px 0;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo">recruitment.gg</div>
    <div class="center-logo">
        <img src="logo.jpeg" alt="Site Logo" style="width: 350px; height: 100px;">
    </div>
    <div class="user">
        <?php if ($loggedIn) : ?>
            <button class="username" onclick="window.location.href='profile.php'"><?php echo $_SESSION["username"]; ?></button>
            <button onclick="window.location.href='edit_profile.php'">Edit Profile</button>
            <button onclick="window.location.href='profile_settings.php'">Profile Settings</button>
            <button onclick="window.location.href='inbox.php'">Inbox</button>
            <button onclick="window.location.href='contact.php'">Contact</button>
            <button onclick="window.location.href='logout.php'">Sign Out</button>
        <?php else : ?>
            <button onclick="openLogin()">Login</button>
            <button onclick="openSignup()">Sign Up</button>
        <?php endif; ?>
    </div>
</header>
<div class="search">
    <form action="search.php" method="get">
        <input type="text" id="searchInput" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
</div>
<main>
    <section class="buttons">
        <a href="index.php" class="button">Homepage</a>
        <a href="leaderboards.php" class="button">Leaderboards</a>
        <a href="LFT.php" class="button">Looking for Team</a>
        <a href="tournaments.php" class="button">Tournaments</a>
        <a href="patchnotes.php" class="button">Patchnotes</a>
        <a href="socials.php" class="button">Socials</a>
    </section>
    <section class="inbox">
        <h1>Inbox</h1>
        <div class="messages">
            <?php
            // Include database connection code here
            $conn = new mysqli("localhost", "root", "Password", "valorantlol");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve messages for the logged-in user from the database
            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
            if ($user_id) {
                $sql = "SELECT * FROM messages WHERE recipient_id = $user_id ORDER BY timestamp DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='message'>";
                        echo "<p><strong>From:</strong> " . $row["sender_id"] . "</p>";
                        echo "<p><strong>Date:</strong> " . $row["timestamp"] . "</p>";
                        echo "<p><strong>Message:</strong> " . $row["message"] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No messages found.</p>";
                }
            } else {
                echo "<p>User not logged in.</p>";
            }

            // Close database connection
            $conn->close();
            ?>
        </div>
    </section>
</main>

<!-- Footer -->
<footer>
    <p>&copy; recruitment.gg</p>
</footer>
<script>
    function search() {
        var input = document.getElementById('searchInput').value;
        // Perform search functionality here
        alert('You searched for: ' + input);
    }

    function openLogin() {
        window.location.href = "login.php";
    }

    function openSignup() {
        window.location.href = "signup.php";
    }
</script>
</body>
</html>