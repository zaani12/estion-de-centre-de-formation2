<!-- <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "centre_de_formation";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?> -->
<?php
// Database configuration
$dbhost = 'localhost';
$dbname = 'centre_de_formation';
$dbuser = 'root';
$dbpass = '';

// PDO database connection
$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>