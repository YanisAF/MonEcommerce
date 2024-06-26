<?php
function executeRequete($req)
{
    var_dump($req);
    global $mysqli;
    $resultat = $mysqli->query($req);
    if (!$resultat) {
        die("Erreur sur la requete sql.<br>Message : " . $mysqli->error . "<br>Code: " . $req);
    }
    return $resultat;
}

function debug($var, $mode = 1)
{
    echo '<div style="background: orange; padding: 5px; float: right; clear: both; ">';
    $trace = debug_backtrace();
    $trace = array_shift($trace);
    echo 'Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].';
    if ($mode === 1) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    } else {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
    echo '</div>';
}

function internauteEstConnecte()
{
    if(!isset($_SESSION['utilisateur'])) return false;
    else return true;
}

function internauteEstConnecteEtEstAdmin()
{
    if (internauteEstConnecte() && $_SESSION['utilisateur']['statut'] == 1) return true;
    else return false;
}

