 <!------------------------------------------------------ FICHE PRODUIT  ---------------------------------------------->
 <?php
require_once("./inc/init.inc.php");
$title = " | Fiche Produit";

// ---------- TRAITEMENT PHP 

if (isset($_GET['id_produit'])) {
    $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'");
}
if ($resultat->num_rows <= 0) {
    header("location:boutique.php");
    exit();
}
$produit = $resultat->fetch_assoc();
$contenu .= "<h2>Titre : $produit[titre]</h2><hr><br>";
$contenu .= "<p>Categorie: $produit[categorie]</p>";
$contenu .= "<p>Couleur: $produit[couleur]</p>";
$contenu .= "<p>Taille: $produit[taille]</p>";
$contenu .= "<img src='$produit[photo]'>";
$contenu .= "<p><i>Description: $produit[description]</i></p>"; 
$contenu .= "<p>Prix: $produit[prix] €</p><br>";
if ($produit['stock'] > 0 ) {
    $contenu .= "<i>nombre de produit(s) disponibles : $produit[stock] </i><br><br>";
    $contenu .= '<form method="post" action="panier.php">';
    $contenu .= "<input type='hidden' name='id_produit' value='$produit[id_produit]'>";
    $contenu .= '<label for="quantite">Quantité : </label>';
    $contenu .= '<select id="quantite" name="quantite">';
    for ($i = 1; $i <= $produit['stock'] && $i <= 5; $i++) {
        $contenu .= "<option> $i</option>";
    }
    $contenu .= '</select>';
    $contenu .= '<input type="submit" name="ajout_panier" value="Ajouter au panier">';
    $contenu .= '</form>';
} else {
    $contenu .= 'Rupture de stock !';
}
$contenu .= "<br><a href='boutique.php?categorie=" . $produit['categorie'] . "'>Retour vers la selection de " . $produit['categorie'] . "</a>";

// ---------- AFFICHAGE HTML
require_once("./inc/haut.inc.php");
echo '<h2>Fiche produit : n ° ' . $_GET['id_produit'] . '</h2>';
echo $contenu;

require_once("./inc/bas.inc.php");