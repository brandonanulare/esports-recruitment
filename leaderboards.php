<?php
session_start();
// Check if user is logged in
$loggedIn = isset($_SESSION["username"]);

// Database credentials
$servername = "localhost";
$username = "root";
$password = "Password";
$database = "valorantlol";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for Valorant leaderboard
$valorant_query = "SELECT val_players.*, val_teams.team_logo FROM val_players JOIN val_teams ON val_players.team_id = val_teams.team_id WHERE val_players.player_id <> 36 ORDER BY ADR DESC LIMIT 10";
$valorant_result = $conn->query($valorant_query);

// Fetch data for League of Legends leaderboard
$lol_query = "SELECT lol_players.*, lol_teams.team_logo FROM lol_players JOIN lol_teams ON lol_players.team_id = lol_teams.team_id ORDER BY KDA DESC LIMIT 10";
$lol_result = $conn->query($lol_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboards</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional CSS for adjusting the layout */
        .player {
            display: flex;
            align-items: center;
        }
		.avatar {
			/* Remove any circular background */
			background: transparent;
			/* Remove any border-radius */
			border-radius: 0;
			/* Adjust other styles as needed */
		}

		.avatar img {
			width: 50px;
			height: auto;
			margin-right: 10px;
		}
        .player-info {
            width: calc(100% - 60px); /* Adjust the width of player information container */
        }
    </style>
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
        <section class="leaderboards">
            <div class="leaderboard">
                <h2>Valorant Leaderboard</h2>
                <div class="players">
                    <?php
                    if ($valorant_result->num_rows > 0) {
                        while ($row = $valorant_result->fetch_assoc()) {
                            echo "<div class='player'>";
                            echo "<div class='avatar'><img src='/". $row["team_logo"] . "' alt='Team Logo'></div>";
                            echo "<div class='player-info'>"; // Added container div for player info
                            echo "<h3>" . $row["player_name"] . "</h3>";
                            echo "<p>ADR: " . $row["adr"] . "</p>";
                            echo "</div>"; // Close player-info
                            echo "</div>";
                        }
                    } else {
                        echo "No players found";
                    }
                    ?>
                </div>
            </div>
            <div class="leaderboard">
                <h2>League of Legends Leaderboard</h2>
                <div class="players">
                    <?php
                    if ($lol_result->num_rows > 0) {
                        while ($row = $lol_result->fetch_assoc()) {
                            echo "<div class='player'>";
                            echo "<div class='avatar'><img src='/". $row["team_logo"] . "' alt='Team Logo'></div>";
                            echo "<div class='player-info'>"; // Added container div for player info
                            echo "<h3>" . $row["player_name"] . "</h3>";
                            echo "<p>KDA: " . $row["KDA"] . "</p>";
                            echo "</div>"; // Close player-info
                            echo "</div>";
                        }
                    } else {
                        echo "No players found";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; recruitment.gg</p>
    </footer>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>