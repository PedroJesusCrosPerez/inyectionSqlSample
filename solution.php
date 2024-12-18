<?php
    session_start();

    session_regenerate_id(true);

    ini_set('session.cookie_secure', 1);  // solo se transmite a través de HTTPS
    ini_set('session.cookie_httponly', 1); // solo accesible a través de HTTP(S), no JavaScript

    $_SESSION['user'] = 'pedrocros';
    $_SESSION['role'] = 'admin';

    echo "Bienvenido, " . $_SESSION['user'] . "<br>";
    echo "Rol: " . $_SESSION['role'] . "<br>";
?>