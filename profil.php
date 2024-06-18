<?php 
require_once("./inc/init.inc.php"); 

if(!internauteEstConnecte()) header("location:connexion.php");

$contenu .= '<div class="profil"><p class="centre">Bonjour <strong>' . $_SESSION['utilisateur']['pseudo'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2>Voici vos informations</h2>';
$contenu .= '<p> votre email est: ' .$_SESSION['utilisateur']['email'] . '</p><br>';
$contenu .= '<p> votre ville est: ' .$_SESSION['utilisateur']['ville'] . '</p><br>';
$contenu .= '<p> votre code postal est: ' .$_SESSION['utilisateur']['code_postal'] . '</p><br>';
$contenu .= '<p> votre adresse est: ' .$_SESSION['utilisateur']['adresse'] .'</p></div></div><br><br>';
?>

<?php require_once("./inc/haut.inc.php"); 
echo $contenu;?>
<?php require_once("./inc/bas.inc.php"); ?>