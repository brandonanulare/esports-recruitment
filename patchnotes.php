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
<title>Patch Notes</title>
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
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .patch-notes {
        text-align: center;
    }

    .patch-note {
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
        padding: 20px; /* Add padding for content */
        border-radius: 10px; /* Rounded corners */
        margin-bottom: 20px; /* Add bottom margin for spacing between patch notes */
    }

    .patch-note h3 {
        margin-top: 0; /* Remove default margin for consistency */
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
        <section class="patch-notes">
            <h2>Patch Notes</h2>
            <div class="container">
                <div class="patch-note">
                    <h3>Date: 02/21/2024</h3>
                    <div class="update">
                        <strong>Agent Updates:</strong>
                        <p>Breach's voice lines updated and added interactions with Deadlock, Gekko, and Harbor.</p>
                    </div>
                </div>
                <div class="patch-note">
                    <h3>Date: 02/22/2024</h3>
                    <div class="update">
                        <strong>Chamber:</strong>
                        <p>Headhunter (Q) price decreased to 100; Tour De Force (X) firing rate increased to 0.9.</p>
                    </div>
                </div>
                <div class="patch-note">
                    <h3>Date: 02/23/2024</h3>
                    <div class="update">
                        <strong>Bug Fixes:</strong>
                        <p>Fixed various issues including Agents looking nearsighted in 3rd person, incorrect kills per round rounding up, and Ultimate Charges being covered by long usernames.</p>
                    </div>
                </div>
                <div class="patch-note">
                    <h3>Date: 02/24/2024</h3>
                    <div class="update">
                        <strong>New Map - Oasis:</strong>
                        <p>Added a new map called Oasis to the rotation. Oasis features a desert theme with wide open spaces and tight indoor areas, providing diverse gameplay opportunities.</p>
                    </div>
                </div>
                <div class="patch-note">
                    <h3>Date: 02/25/2024</h3>
                    <div class="update">
                        <strong>Gameplay Changes:</strong>
                        <p>Adjusted weapon balance, reduced movement speed of certain agents, and increased bomb plant time in Competitive mode.</p>
                    </div>
                </div>
                <div class="patch-note">
                    <h3>Date: 02/26/2024</h3>
                    <div class="update">
                        <strong>New Skins:</strong>
                        <p>Added a collection of new weapon skins to the in-game store. Check them out and customize your loadout!</p>
                    </div>
                </div>
				<div class="patch-note">
                    <h3>Date: 02/27/2024</h3>
                    <div class="update">
                        <strong>New Agent Clove and Abilities:</strong>
                        <p>Ruse (E): EQUIP to view the battlefield. FIRE to set the locations where Clove’s clouds will settle. ALT FIRE to confirm, launching clouds that block vision in the chosen areas. 
						Clove can use this ability after death.Meddle (Q): EQUIP a fragment of immortality essence. FIRE to throw the fragment, which erupts after a short delay and temporarily decays all targets caught inside.
						Pick-me-up (C): INSTANTLY absorb the life force of a fallen enemy that Clove damaged or killed, gaining haste and temporary health.
						Not Dead Yet (X): After dying, ACTIVATE to resurrect. Once resurrected, Clove must earn a kill or a damaging assist within a set time or they will die.</p>
                    </div>
                </div>
				<div class="patch-note">
                    <h3>Date: 02/28/2024</h3>
                    <div class="update">
                        <strong>LOL Patch Notes:</strong>
                        <p>In this patch we're focusing on getting everything ready for MSI, so that means you'll see some more Pro-oriented changes to make sure things are in good shape going into the tournament. 
						But if you aren't a Pro like me don't worry, because there are still quite a few changes here for us as well!</p>
                    </div>
                </div>
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

        function openLogin() {
            window.location.href = "login.php";
        }

        function openSignup() {
            window.location.href = "signup.php";
        }
    </script>
</body>
</html>