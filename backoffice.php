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
        <a href="./backoffice.php"><h3>Backoffice</h3></a>
        <a href="./addLink.php"><h2>Ajouter un link</h2></a>
        <br><h3>Modifier / Supprimer un link</h3>
        <?php
            include('pdo.php');
            $requete = 'SELECT * FROM link WHERE 1';
            $reponse = $bdd->query($requete);
            foreach ($reponse as $info) {
                echo "<br><div>"."- ".$info['titre']."</div>".
                "<br><div><a href='./modifier.php?id={$info['id_link']}'>Modifier"." / ".
                "<a href='./supprimer.php?id={$info['id_link']}'>Supprimer</a></div><br>";
            }
        ?>
    </main>
    <footer>
        <div class="container display_footer">
            <nav>
                <ul>
                    <li><a href="./index.php">HOME/</a></li>
                    <li><a href="./deconnexion.php">Se deconnecter</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>



<!--
Requete sql pour mettre lheure automatiquement a chaque post

ALTER TABLE link
MODIFY date_ DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP; -->