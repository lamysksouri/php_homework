<?php
ob_start();
require_once "config/connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $qte = $_POST['qte'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "INSERT INTO produit (libelle, prix, qte, description, image) VALUES (:libelle, :prix, :qte, :description, :image)";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':qte', $qte);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->execute();

    header("Location: produits.php?etat=3");
    exit();
}

echo "<h1>Ajouter un produit</h1>";
echo "<form method='post' action='add_produit.php'>";
echo "<label>Libellé:</label>";
echo "<input type='text' name='libelle' required><br>";
echo "<label>Prix:</label>";
echo "<input type='text' name='prix' required><br>";
echo "<label>Quantité:</label>";
echo "<input type='text' name='qte' required><br>";
echo "<label>Description:</label>";
echo "<textarea name='description' required></textarea><br>";
echo "<label>Image URL:</label>";
echo "<input type='text' name='image' required><br>";
echo "<button type='submit'>Ajouter</button>";
echo "</form>";

$contenu = ob_get_clean();
include "layout.php";
?>
