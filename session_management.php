<?php
    session_start();

    $_SESSION['user'] = 'pedrocros';
    $_SESSION['role'] = 'admin';

    echo "Bienvenido, " . $_SESSION['user'] . "<br>";
    echo "Rol: " . $_SESSION['role'] . "<br>";

    echo "ID de sesión: " . session_id(); // Un atacante podría robar este ID de sesión y usarlo en otra máquina
?>