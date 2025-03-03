<?php
session_start();

// Check if user is logged in
$loggedIn = isset($_SESSION["username"]);

// Include database connection code here
$conn = new mysqli("localhost", "root", "Password", "valorantlol");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user's information from the session
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if (!$user_id) {
    echo "User ID not found.";
    exit();
}

// Fetch user's existing profile information from the database
$stmt_profile = $conn->prepare("SELECT bio, description, profile_pic_url FROM profiles WHERE user_id=?");
$stmt_profile->bind_param("i", $user_id);
$stmt_profile->execute();
$stmt_profile->bind_result($bio, $description, $profile_pic_url);
$stmt_profile->fetch();
$stmt_profile->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Looking for Team</title>
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
        <section class="edit-profile">
            <h2>Edit Profile</h2>
            <form action="submit_profile.php" method="post">
                <label for="bio">Bio:</label><br>
                <textarea id="bio" name="bio" rows="4" cols="50"><?php echo $bio; ?></textarea><br><br>
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50"><?php echo $description; ?></textarea><br><br>
                <label for="profile-pic-url">Profile Picture URL:</label><br>
                <input type="text" id="profile_pic_url" name="profile_pic_url" value="<?php echo $profile_pic_url; ?>"><br><br>
                <button type="submit">Submit</button>
            </form>
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
