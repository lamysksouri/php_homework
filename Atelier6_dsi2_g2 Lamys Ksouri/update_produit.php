<?php
ob_start();
require_once "config/connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $qte = $_POST['qte'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "UPDATE produit SET libelle = :libelle, prix = :prix, qte = :qte, description = :description, image = :image WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':qte', $qte);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->execute();

    header("Location: produits.php?etat=2");
    exit();
}

if (isset($_GET['id'])) {
    $produitId = $_GET['id'];
    $sql = "SELECT * FROM produit WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':id', $produitId);
    $stmt->execute();
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produit) {
        echo "<h1>Modifier le produit</h1>";
        echo "<form method='post' action='update_produit.php?id={$produit['id']}'>";
        echo "<input type='hidden' name='id' value='{$produit['id']}'>";
        echo "<label>Libellé:</label>";
        echo "<input type='text' name='libelle' value='{$produit['libelle']}' required><br>";
        echo "<label>Prix:</label>";
        echo "<input type='text' name='prix' value='{$produit['prix']}' required><br>";
        echo "<label>Quantité:</label>";
        echo "<input type='text' name='qte' value='{$produit['qte']}' required><br>";
        echo "<label>Description:</label>";
        echo "<textarea name='description' required>{$produit['description']}</textarea><br>";
        echo "<label>Image URL:</label>";
        echo "<input type='text' name='image' value='{$produit['image']}' required><br>";
        echo "<button type='submit'>Modifier</button>";
        echo "</form>";
    } else {
        echo "<p>Produit non trouvé.</p>";
    }
} else {
    echo "<p>Aucun ID de produit spécifié.</p>";
}

$contenu = ob_get_clean();
include "layout.php";
?>
