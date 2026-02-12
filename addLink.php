<?php
session_start();

if (!isset($_SESSION['id_user']) || $_SESSION['id_user'] !== 1) {
    header('Location: connexion.php');
    exit;
}
if (isset($_SESSION['login'])) {
    echo 'Connecté en tant que : ' . htmlspecialchars($_SESSION['login']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <header>
        <div class="bandeau">
            <div class="container display">
                <div class="child_header">
                    <h1>Share My Links</h1>
                </div>
            </div>
        </div>
    </header>
    <main>
        <a href="backoffice.php"><h3>BACKOFFICE / Ajouter</h3></a>
        <h2>Ajouter un link</h2>
        <form action="result_addLink.php" method="GET">
            URL (*):<input type="text" name="addUrl"><br>
            Titre (*):<input type="text" name="addTitre"><br>
            Description : <textarea name="addDescription"></textarea>
            <br><input type="submit" value="Publier">
        </form>
    </main>
    <footer>
        <div class="container display_footer">
            <nav>
                <ul>
                    <li><a href="./connexion.php">Se connecter/</a></li>
                    <li><a href="./deconnexion.php">Se deconnecter</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>