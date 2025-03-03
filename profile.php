<?php
session_start();

// Check if user is logged in
$loggedIn = isset($_SESSION["username"]);

if (!$loggedIn) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Include database connection code here
$conn = new mysqli("localhost", "root", "Password", "valorantlol");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user's information from the database
$username = $_SESSION["username"];
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $user_id = $row["users_id"]; // Assuming "users_id" is the column name in your users table
    // Use $user_id for further processing
}

$stmt->close();

// Retrieve top 10 teams and players for Valorant and League of Legends
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        <section class="grid-container">
            <div class="top-section">
                <h2>Top 10 College Valorant Teams</h2>
                <?php
                $result = $conn->query("SELECT team_name FROM val_teams ORDER BY team_id DESC LIMIT 10");
                while ($row = $result->fetch_assoc()) {
                    echo "<p>" . $row['team_name'] . "</p>";
                }
                ?>
            </div>
            <div class="top-section">
                <h2>Top 10 College Valorant Players</h2>
                <?php
                $result = $conn->query("SELECT player_name FROM val_players ORDER BY adr ASC LIMIT 10");
                while ($row = $result->fetch_assoc()) {
                    echo "<p>" . $row['player_name'] . "</p>";
                }
                ?>
            </div>
            <div class="top-section">
                <h2>Top 10 College League of Legends Teams</h2>
                <?php
                $result = $conn->query("SELECT team_name FROM lol_teams ORDER BY team_id DESC LIMIT 10");
                while ($row = $result->fetch_assoc()) {
                    echo "<p>" . $row['team_name'] . "</p>";
                }
                ?>
            </div>
            <div class="top-section">
                <h2>Top 10 College League of Legends Players</h2>
                <?php
                $result = $conn->query("SELECT player_name FROM lol_players ORDER BY kda ASC LIMIT 10");
                while ($row = $result->fetch_assoc()) {
                    echo "<p>" . $row['player_name'] . "</p>";
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; recruitment.gg</p>
    </footer>
    <script>
        function search() {
            var input = document.getElementById('searchInput').value;
            // Perform search functionality here
            alert('You searched for: ' + input);
        }
    </script>
</body>
</html>