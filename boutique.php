<?php

require_once("inc/init.inc.php");
$title = " | Boutique";

// ---------------------- TRATEMENT PHP -------------------------//

// ---- AFFICHAGE DES CATEGORIES
$categories_des_produits = executeRequete("SELECT DISTINCT categorie FROM produit");
$contenu .= '<div class="boutique-categories">';
$contenu .= "<ul>";
while ($cat = $categories_des_produits->fetch_assoc()) {
    $contenu .= "<li><a href='?categorie=" . $cat['categorie'] . "'>" . $cat['categorie'] . "</a></li>";
}
$contenu .= "</ul>";
$contenu .= "</div>";
// ---- AFFICHAGE DES PRODUITS
$contenu .= '<div class="boutique-produits">';
if (isset($_GET['categorie'])) {
    $donnees = executeRequete("SELECT id_produit, reference, titre, photo, prix FROM produit WHERE categorie='$_GET[categorie]'");
    while ($produit = $donnees->fetch_assoc()) {
        $contenu .= '<div class="boutique-produit">';
        $contenu .= "<h2>$produit[titre]</h2>";
        $contenu .= "<a href=\"fiche-produit.php?id_produit=$produit[id_produit]\"><img src=\"$produit[photo]\"></a>";
        $contenu .= "<p>$produit[prix] €</p>";
        $contenu .= '<a class="fiche" href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '">Voir la fiche</a>';
        $contenu .= '</div>';
    }
}



// ------------------------ AFFICHAGE HTML -----------------------//



require_once("inc/haut.inc.php");
echo $contenu;
require_once("inc/bas.inc.php");