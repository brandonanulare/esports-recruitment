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
    <title>Esports Recruitment - Socials</title>
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

        .search {
            text-align: center;
            margin-top: 20px;
        }

        .social-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .social-icon img {
            width: 50px; /* Adjust the size of the social media icons */
        }

        .social-link {
            text-decoration: none;
            color: #fff; /* Adjust the color of the social media links */
            font-size: 18px; /* Adjust the font size of the social media links */
        }

        .welcome-message {
            text-align: center;
            color: #000;
            font-size: 24px;
            margin-top: 20px;
        }
		
		.closing-message {
            text-align: center;
            color: #000;
            font-size: 18px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo">recruitment.gg</div>
    <div class="center-logo">
        <img src="logo.jpeg" alt="Site Logo">
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
    <div class="welcome-message">
        Welcome to Esports Recruitment!
    </div>
    <section class="social-container">
        <div class="social-icon"><a href="https://twitter.com"><img src="twitter.jpg" alt="Twitter"></a></div>
        <div class="social-icon"><a href="https://facebook.com"><img src="facebook.jpg" alt="Facebook"></a></div>
        <div class="social-icon"><a href="https://instagram.com"><img src="instagram.jpg" alt="Instagram"></a></div>
        <div class="social-icon"><a href="https://youtube.com"><img src="youtube.jpg" alt="YouTube"></a></div>

        <div class="social-link"><a href="https://twitter.com">Twitter</a></div>
        <div class="social-link"><a href="https://facebook.com">Facebook</a></div>
        <div class="social-link"><a href="https://instagram.com">Instagram</a></div>
        <div class="social-link"><a href="https://youtube.com">YouTube</a></div>
    </section>
	<div class="closing-message">
        Currently, recruitment.gg has just been finished and we are working on creating social media accounts for our website!
		If you would like to contact us; (586)265-9797 or email anulareb@tiffin.edu !
    </div>
	    <!-- Add more content here if needed -->
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

    function openLogin() {
        window.location.href = "login.php";
    }

    function openSignup() {
        window.location.href = "signup.php";
    }
</script>
</body>
</html>