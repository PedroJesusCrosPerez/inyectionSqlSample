<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Verify connection
if ($conn->connect_error) {
    die("Failed connection: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    
    // Bind parameters to the prepared statement
    $stmt->bind_param("ss", $user, $pass); // "ss" means both parameters are strings
    
    // Execute the statement
    $stmt->execute();

    // Store result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Login successfully ✅";
    } else {
        echo "Invalid credentials";
    }

    // Close statement
    $stmt->close();
}

$conn->close();

echo '<br><a href="http://localhost:80">Come Back</a>';
?>
