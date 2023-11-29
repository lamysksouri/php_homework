<?php
ob_start();
require_once "config/connexion.php";

if (isset($_GET['id'])) {
    $produitId = $_GET['id'];
    $sql = "SELECT * FROM produit WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':id', $produitId);
    $stmt->execute();
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produit) {
        echo "<h1>Détails du produit</h1>";
        echo "<p>ID: " . $produit['id'] . "</p>";
        echo "<p>Libellé: " . $produit['libelle'] . "</p>";
        echo "<p>Prix: " . $produit['prix'] . "</p>";
        echo "<p>Quantité: " . $produit['qte'] . "</p>";
        echo "<p>Description: " . $produit['description'] . "</p>";
        echo "<img src='" . $produit['image'] . "' alt='Image du produit'>";
    } else {
        echo "<p>Produit non trouvé.</p>";
    }
} else {
    echo "<p>Aucun ID de produit spécifié.</p>";
}

$contenu = ob_get_clean();
include "layout.php";
?>
