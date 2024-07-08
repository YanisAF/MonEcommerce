<?php

// ------ TITRE PAGES
$title = "";

//* configuration phpdotenv
require __DIR__ . '/../vendor/autoload.php';
Dotenv\Dotenv::createUnsafeImmutable(__DIR__ .'/../')->load();

$mysqli = new mysqli('localhost', 'db_user', '12345', 'monecommerce');
if ($mysqli->connect_error)
    die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");

//--------- SESSION
session_start();
 
//--------- CHEMIN
// print_r($_SERVER);
define("RACINE_SITE", "http://" . $_SERVER['HTTP_HOST'] . "/");  //TODO $_SERVER['SERVER_NAME'] . ":"

// Autre inclusions
require_once("functions.inc.php");
// debug($mysqli,0);

//* Déclarer une variable d'environement
putenv('NOM_VARIABLE=Le nom de ma variable d\'environnement avec <span style="font-weight:bold;">putenv(NOM_VARIABLE)</span>');
//* ou
$_ENV['NOM_VARIABLE'] = 'Le nom de ma variable d\'environnement avec <span style=font-weight:bold;">$_ENV[NOM_VARIABLE]</span>';

$contenu = "";