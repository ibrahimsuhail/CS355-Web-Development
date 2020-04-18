<!DOCTYPE html>
<html>
<body>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "reallyStrongPwd123";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$conn->close();
?>

</body>
</html>

