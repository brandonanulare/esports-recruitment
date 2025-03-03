ValorantLoL Web Application
This repository contains the source code for my capstone project, a web-based platform that allows users to create profiles, find teams, send messages, and interact with leaderboards for Valorant and League of Legends. This guide will walk you through setting up the project on your own Apache (XAMPP) server, importing the database, and running the application on your local machine.

Setting Up Apache and MySQL
To run this project, you need to have XAMPP installed. XAMPP is an all-in-one package that includes Apache (the web server), MySQL (the database), and PHP (the backend language). If you haven’t already installed XAMPP, you can download it from https://www.apachefriends.org. After installing XAMPP, open the XAMPP Control Panel and start both Apache and MySQL. Once both services are running, you are ready to proceed.

Downloading the Project Files
You can obtain the project files by either cloning the repository using Git or downloading the repository as a ZIP file. If using Git, open a terminal and run the command git clone https://github.com/your-username/your-repository.git. If you prefer to download the ZIP file, click the green “Code” button on the GitHub page, select “Download ZIP,” and extract the files to your local machine. Once you have the project files, move the entire project folder into the htdocs directory of your XAMPP installation. On Windows, this is typically located at C:\xampp\htdocs\.

Importing the MySQL Database
To ensure the project functions correctly, you need to set up the MySQL database. Open your web browser and go to http://localhost/phpmyadmin/, which is the interface for managing MySQL databases. Click on the “Databases” tab and create a new database named valorantlol. After creating the database, click on it in the left sidebar, go to the “Import” tab, and upload the provided SQL file from the project directory, which is located at database/valorantlol.sql. Once the file is selected, click “Go” to import the database. This process will create all necessary tables and insert the initial data required for the application to run properly.

Configuring the Database Connection
After setting up the database, the next step is to configure the PHP application to connect to it. Locate the config.php file inside the project folder and open it in a text editor. Ensure the database connection settings match your local environment. By default, XAMPP uses localhost as the server name, root as the MySQL username, and an empty password. The database name should be set to valorantlol. The configuration should look something like this:

php
copy
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "valorantlol";
$conn = new mysqli($servername, $password, $database);

if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}
?>
If you set a password for mysql during installation, update the $password field accordingly. Save the file after making any necessary changes.

Running the Project
Now that everything is set up, you can launch the project. Open your web browser and enter the following URL: http://localhost/your-project-folder/. If everything is configured correctly, the homepage should load, and you can access all features, including signing up, logging in, editing your profile, searching for teams, viewing leaderboards, and sending messages.

Troubleshooting
If Apache or MySQL fails to start in XAMPP, there may be a port conflict. To resolve this, open the XAMPP Control Panel, click “Config” next to Apache, select httpd.conf, and change the line Listen 80 to Listen 8080. Restart XAMPP, and access the website using http://localhost:8080/your-project-folder/. If you encounter a "Database not found" error, double-check that the database was successfully imported in phpMyAdmin and that the database name in config.php matches the one created in MySQL.

Next Steps
This project is fully functional, but potential future improvements include adding password encryption for user accounts, implementing a real-time chat feature, and refining the user interface for a better experience. If you would like to contribute to this project, you are welcome to fork the repository and submit a pull request.

Contact Information
If you have any questions or run into any issues while setting up the project, feel free to reach out to me at anulareb@gmail.com or connect with me on LinkedIn at https://www.linkedin.com/in/brandonanulare/.

By following these instructions, you should be able to successfully run the ValorantLoL esports recruitment web application on your local Apache server. Thank you for checking out my project!
