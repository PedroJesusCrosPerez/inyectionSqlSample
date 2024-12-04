<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "testdb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Generar consulta SQL
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    
    // Imprimir consulta para depuración
    //echo "Consulta generada: $sql <br>";

    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta SQL: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "Inicio de sesión exitoso";
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}


$conn->close();

echo '<br><a href="http://localhost:80">Come Back</a>';
?>
