<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Esports Recruitment</title>
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
        <button onclick="openLogin()">Login</button>
        <button onclick="openSignup()">Sign Up</button>
    </div>
</header>
<div class="search">
    <form action="search.php" method="get">
        <input type="text" id="searchInput" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
</div>
<div class="container">
    <form class="form" action="signup.php" method="POST">
        <h2>Sign Up</h2>
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Sign Up</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            exit();
        }

        // Validate password (minimum length, containing letters and numbers, etc.)
        if (strlen($password) < 8) {
            echo "Password must be at least 8 characters long";
            exit();
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Connect to the database
        $conn = new mysqli("localhost", "root", "Password", "valorantlol");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if user with the same username or email exists
        $stmt_check = $conn->prepare("SELECT * FROM users WHERE username=? OR email=?");
        $stmt_check->bind_param("ss", $username, $email);
        $stmt_check->execute();
        $result = $stmt_check->get_result();
        if ($result->num_rows > 0) {
            echo "User with this username or email already exists";
            exit();
        }
        $stmt_check->close();

        // Use prepared statement to prevent SQL injection
        $stmt_insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt_insert->execute()) {
            echo "User registered successfully";
            // You can redirect the user to a different page after successful registration
            // header("Location: profile.php");
            // exit();
        } else {
            echo "Registration failed, please try again later";
        }

        $stmt_insert->close();
        $conn->close();
    }
    ?>
</div>
<footer>
    <nav>
        <ul>
            <li><a href="index.php" class="button">Homepage</a></li>
            <li><a href="leaderboards.php" class="button">Leaderboards</a></li>
            <li><a href="LFT.php" class="button">Looking for Team</a></li>
            <li><a href="tournaments.php" class="button">Tournaments</a></li>
            <li><a href="patchnotes.php" class="button">Patchnotes</a></li>
            <li><a href="socials.php" class="button">Socials</a></li>
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