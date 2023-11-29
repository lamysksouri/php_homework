<?php
ob_start();
echo "<h1>Liste des produits</h1>";
echo "Lorem ipsum dolor sit amet consectetur adipisicing
 elit. Architecto maiores, repellendus est ratione magnam autem.
  Repellendus maxime ullam ut ab esse nemo enim fugit, beatae,
   tenetur voluptatem nihil, nulla est.";
$contenu = ob_get_clean();
include "layout.php";
