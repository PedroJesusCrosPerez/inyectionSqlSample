<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "testdb";

// Create conection
$conn = new mysqli($servername, $username, $password, $dbname);

// Verify conection
if ($conn->connect_error) {
    die("Failed conection: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Generate statement SQL
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";

    $result = $conn->query($sql);

    if (!$result) {
        die("Error in statement SQL: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "Login succesfully ✅";
    } else {
        echo "Invalid credentials";
    }
}


$conn->close();

echo '<br><a href="http://localhost:80">Come Back</a>';
?>
