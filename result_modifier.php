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

    $id = $_GET['id'];
    $url = $_GET['modUrl'];
    $titre = $_GET['modTitre'];
    $description = $_GET['modDescription'];

    $update = $bdd->prepare("UPDATE link SET url = '$url', titre = '$titre', description = '$description' WHERE id_link = :id_link");
    $update->execute(['id_link'=>$id]);

    echo "<br>Link modifié";
    echo "<br><a href='backoffice.php'>Backoffice</a>";

?>