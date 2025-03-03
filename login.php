<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["username"])) {
    header("Location: profile.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection
    $conn = new mysqli("localhost", "root", "Password", "valorantlol");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if username exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row["password"])) {
            // Password is correct, set session variables and redirect
            $_SESSION["user_id"] = $row["users_id"];
            $_SESSION["username"] = $username;
            header("Location: profile.php");
            exit();
        }
    }

    // Invalid username or password
    echo "Invalid username or password";

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Esports Recruitment</title>
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
	</style>
</head>
<body>
    <header>
        <div class="logo">recruitment.gg</div>
        <div class="center-logo">
            <img src="logo.jpeg" alt="Site Logo" style="width: 350px; height: 100px;">
        </div>
        <div class="user">
            <?php
            if (isset($_SESSION["username"])) {
                echo "<a href='profile.php'>My Profile</a>";
                echo "<a href='logout.php'>Logout</a>";
            } else {
                echo "<button onclick='openLogin()'>Login</button>";
                echo "<button onclick='openSignup()'>Sign Up</button>";
            }
            ?>
        </div>
    </header>
    <div class="search">
        <form action="search.php" method="get">
            <input type="text" id="searchInput" name="query" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="container">
        <form class="form" action="login.php" method="POST">
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
    <footer>
        <nav>
            <ul>
                <li><a href="index.php">Homepage</a></li>
                <li><a href="leaderboards.php">Leaderboards</a></li>
                <li><a href="LFT.php">Looking for Team</a></li>
                <li><a href="tournaments.php">Tournaments</a></li>
                <li><a href="patchnotes.php">Patchnotes</a></li>
                <li><a href="socials.php">Socials</a></li>
            </ul>
        </nav>
        <p>&copy; recruitment.gg</p>
    </footer>
    <script>
        function openLogin() {
            window.location.href = "login.php";
        }

        function openSignup() {
            window.location.href = "signup.php";
        }
    </script>
</body>
</html>