<?php
session_start();

if (!isset($_SESSION['id_user']) || $_SESSION['id_user'] !== 1) {
    header('Location: connexion.php');
    exit;
}
if (isset($_SESSION['login'])) {
    echo 'Connecté en tant que : ' . htmlspecialchars($_SESSION['login']);
}

include("pdo.php");

$query = $bdd->prepare('INSERT INTO link ( url, titre, description ) VALUES (:url, :titre, :description)');
$query->bindParam(':url', $_GET['addUrl']);
$query->bindParam(':titre', $_GET['addTitre']);
$query->bindParam(':description', $_GET['addDescription']);
$query->execute();

echo "<br>Link créé";
echo "<br><a href='backoffice.php'>Backoffice</a>";
echo "<br><a href='index.php'>HOME</a>";


?>