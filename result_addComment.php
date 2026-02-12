<?php
    session_start();

    if (isset($_SESSION['login'])) {
        echo 'Connecté en tant que : ' . htmlspecialchars($_SESSION['login']);
    }

    include("pdo.php");

    if (!isset($_GET['id']) || !isset($_GET['login']) || !isset($_GET['commentaire'])) {
        die("Données manquantes");
    }

    $id_link = $_GET['id'];
    $login = $_GET['login'];
    $commentaire = $_GET['commentaire'];

    $query = $bdd->prepare('INSERT INTO link_comment ( login, commentaire, id_link, date_, heure ) VALUES (:login, :commentaire, :id_link, Curdate(), CURTIME())');

    $query->bindParam(':login', $login);
    $query->bindParam(':commentaire', $commentaire);
    $query->bindParam(':id_link', $id_link, PDO::PARAM_INT);

    $query->execute();

    header("Location: commentaire.php?id=".$id_link);
    exit;


?>