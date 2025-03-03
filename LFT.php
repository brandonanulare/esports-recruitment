<?php
session_start();
// Check if user is logged in
$loggedIn = isset($_SESSION["username"]);

// Include database connection code here
$conn = new mysqli("localhost", "root", "Password", "valorantlol");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing LFT posts from the database
$lft_query = "SELECT * FROM lft_submissions";
$lft_result = $conn->query($lft_query);
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
    <style>
        .lft-posts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
        }

        .lft-post {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .lft-post h3 {
            margin-top: 0;
        }

        .lft-post p {
            margin-bottom: 10px;
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
        <section class="form">
            <h2>Looking for Team Form</h2>
            <form action="submit_lft.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="game">Game:</label>
                <input type="text" id="game" name="game" required><br><br>
                <label for="rank">Rank:</label>
                <input type="text" id="rank" name="rank" required><br><br>
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" required></textarea><br><br>
                <button type="submit">Submit</button>
            </form>
        </section>
        <section class="lft-posts">
            <h2>Current LFT Posts</h2>
            <?php if ($lft_result->num_rows > 0) : ?>
                <?php while ($row = $lft_result->fetch_assoc()) : ?>
                    <div class="lft-post">
                        <h3><?php echo $row["name"]; ?></h3>
                        <p>Game: <?php echo $row["game"]; ?></p>
                        <p>Rank: <?php echo $row["rank"]; ?></p>
                        <p>Description: <?php echo $row["description"]; ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No LFT posts found.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; recruitment.gg</p>
    </footer>
    <script>
        function openLogin() {
            window.location.href = "login.php";
        }

        function openSignup() {
            window.location.href = "signup.php";
        }

        function search() {
            var input = document.getElementById('searchInput').value;
            // Perform search functionality here
            alert('You searched for: ' + input);
        }
    </script>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>