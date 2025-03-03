<?php
session_start();
// Check if user is logged in
$loggedIn = isset($_SESSION["username"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tournaments</title>
<style>
    .tournament-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        grid-gap: 20px;
    }

    .tournament {
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .tournament h3 {
        margin-top: 0;
    }

    .tournament p {
        margin-bottom: 10px;
    }

    .tournament a {
        display: block;
        width: fit-content;
        margin-top: 10px;
    }
</style>
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
        <section class="tournament-grid">
            <h2>Tournaments</h2>
            <div class="tournament">
                <h3>Valorant Tournament in Michigan</h3>
                <p>Date: 07/01/2024</p>
                <p>Location: New Baltimore, MI</p>
                <p>Description: $20 entry, $500 first place</p>
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<a href='#' class='button'>Register</a>";
                }
                ?>
            </div>
            <div class="tournament">
                <h3>Valorant Tournament in Columbus</h3>
                <p>Date: 03/01/2024</p>
                <p>Location: Columbus, Ohio</p>
                <p>Description: $200 first place and tickets to possibly win a new gaming desk</p>
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<a href='#' class='button'>Register</a>";
                }
                ?>
            </div>
            <div class="tournament">
                <h3>LOL Championship Series</h3>
                <p>Date: 08/15/2024</p>
                <p>Location: Los Angeles, CA</p>
                <p>Description: Annual championship series featuring the top LOL teams competing for the title.</p>
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<a href='#' class='button'>Register</a>";
                }
                ?>
            </div>
            <div class="tournament">
                <h3>Valorant Masters Tournament</h3>
                <p>Date: 09/20/2024</p>
                <p>Location: Berlin, Germany</p>
                <p>Description: International Valorant tournament with a massive prize pool and top teams from around the world.</p>
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<a href='#' class='button'>Register</a>";
                }
                ?>
            </div>
            <!-- Add more tournament entries as needed -->
            <div class="tournament">
                <h3>LOL World Championship</h3>
                <p>Date: 11/01/2024</p>
                <p>Location: Various locations around the world</p>
                <p>Description: The pinnacle of competitive League of Legends, featuring the best teams from each region battling for the title of world champion.</p>
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<a href='#' class='button'>Register</a>";
                }
                ?>
            </div>
            <div class="tournament">
                <h3>Valorant Champions Tour</h3>
                <p>Date: 12/10/2024</p>
                <p>Location: Global</p>
                <p>Description: The official competitive circuit for Valorant, consisting of various tournaments and events culminating in the Champions event.</p>
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<a href='#' class='button'>Register</a>";
                }
                ?>
            </div>
			<div class="tournament">
				<h3>Mid-Season Invitational (MSI)</h3>
				<p>Date: 05/01/2024</p>
				<p>Location: Global</p>
				<p>Description: An international League of Legends tournament held annually between the Spring and Summer splits, featuring top teams from around the world competing for regional pride and a spot at the World Championship.</p>
				<?php
				if (isset($_SESSION["username"])) {
					echo "<a href='#' class='button'>Register</a>";
				}
				?>
			</div>
			<div class="tournament">
				<h3>Valorant First Strike</h3>
				<p>Date: 11/15/2024</p>
				<p>Location: Global</p>
				<p>Description: The first official global Valorant tournament organized by Riot Games, featuring regional qualifiers leading to a grand finals event.</p>
				<?php
				if (isset($_SESSION["username"])) {
					echo "<a href='#' class='button'>Register</a>";
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