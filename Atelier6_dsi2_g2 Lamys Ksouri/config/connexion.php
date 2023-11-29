<?php
$dsn = "mysql:host=localhost;dbname=atelier6_dsi2_g2";
$username = "root";
$password = "";
try {
    $connexion = new PDO($dsn, $username, $password);
} catch (Exception $e) {
    echo "erreur de connexion!!!" . $e->getMessage();
}
