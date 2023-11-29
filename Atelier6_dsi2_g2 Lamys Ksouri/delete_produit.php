<?php
ob_start();
echo "<h1>Liste des produits</h1>";
require_once "config/connexion.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "delete from produit where id=$id";
$res = $connexion->exec($sql);
if ($res) {
    header("location:produits.php?etat=1");
    exit;
}



$contenu = ob_get_clean();
include "layout.php";
