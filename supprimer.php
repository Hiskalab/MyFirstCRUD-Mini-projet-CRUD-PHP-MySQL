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

$id=$_GET['id'];

// supprimer les commentaires
$bdd->prepare(
    'DELETE FROM link_comment WHERE id_link = :id'
)->execute(['id' => $id]);

// supprimer le lien
$bdd->prepare(
    'DELETE FROM link WHERE id_link = :id'
)->execute(['id' => $id]);

echo "<br>Le lien a été correctement supprimé";
echo "<br><a href='index.php'>HOME</a>";
echo "<br><a href='backoffice.php'>Backoffice</a>";


?>