<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $user = $_GET['username'];
    $pass = $_GET['password'];

    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta SQL: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "Succesfully log in";

        http_response_code(200);
        echo "OK";
        
        header("Location: http://localhost/user_logged.html");
    } else {
        echo "Wrong username or password<br>";

        http_response_code(400);
    }
}

$conn->close();

?>
