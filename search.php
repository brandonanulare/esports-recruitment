<?php
session_start();

// Check if user is logged in
$loggedIn = isset($_SESSION["username"]);

// Redirect to login page if not logged in
if (!$loggedIn) {
    header("Location: login.php");
    exit();
}

// Include database connection code here
$conn = new mysqli("localhost", "root", "Password", "valorantlol");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize $searchQuery variable
$searchQuery = "";

// Check if the query parameter is set
if (isset($_GET["query"])) {
    // Sanitize the input to prevent SQL injection
    $searchQuery = $conn->real_escape_string($_GET["query"]);

    // Search for usernames (profiles)
    $profiles_result = $conn->query("SELECT * FROM profiles WHERE user_id LIKE '%$searchQuery%' OR bio LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%' OR profile_pic_url LIKE '%$searchQuery%'");

    // Search for keywords in other tables
    $keywords_result = $conn->query("SELECT player_name AS name, NULL AS description, NULL AS profile_pic_url FROM val_players WHERE player_name LIKE '%$searchQuery%' UNION ALL SELECT team_name AS name, NULL AS description, NULL AS profile_pic_url FROM val_teams WHERE team_name LIKE '%$searchQuery%' UNION ALL SELECT player_name AS name, NULL AS description, NULL AS profile_pic_url FROM LOL_players WHERE player_name LIKE '%$searchQuery%' UNION ALL SELECT team_name AS name, NULL AS description, NULL AS profile_pic_url FROM LOL_teams WHERE team_name LIKE '%$searchQuery%'");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
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
    <main>
        <section class="search-results">
            <h2>Search Results for '<?php echo $searchQuery; ?>'</h2>
            <div class="profiles">
                <h3>Profiles:</h3>
                <?php if (isset($profiles_result) && $profiles_result->num_rows > 0) : ?>
                    <?php while ($row = $profiles_result->fetch_assoc()) : ?>
                        <?php $userId = isset($row["user_id"]) ? $row["user_id"] : "Unknown"; ?>
                        <p>User ID: <?php echo $userId; ?>, Bio: <?php echo $row["bio"]; ?>, Description: <?php echo $row["description"]; ?>, Profile Pic URL: <?php echo $row["profile_pic_url"]; ?></p>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>No profiles found.</p>
                <?php endif; ?>
            </div>
            <div class="keywords">
                <h3>Keywords:</h3>
                <?php if (isset($keywords_result) && $keywords_result->num_rows > 0) : ?>
                    <?php while ($row = $keywords_result->fetch_assoc()) : ?>
                        <?php $playerName = isset($row["name"]) ? $row["name"] : "Unknown"; ?>
                        <p><?php echo $playerName; ?></p>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>No keywords found.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; recruitment.gg</p>
    </footer>
</body>
</html>