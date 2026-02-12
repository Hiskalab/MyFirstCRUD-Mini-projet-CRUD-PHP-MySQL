<?php
    session_start();

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
        <div class="container display">
            <div class="child_main">

                <?php include("pdo.php");

                    $requete = "SELECT * FROM link WHERE 1";
                    $reponseArticle = $bdd->query($requete);
                    foreach ($reponseArticle as $info) {
                        echo "<div>"."<h2>".$info['titre']."</h2>".
                        "<p>".$info['description']."..."."</p>".
                        "<div class='cm'>"."<a href='{$info['url']}'>".$info['url']."</a>"."<p>"."Publié :".$info['date_']."</p>"."</div></div>";

                        $requeteCount = "SELECT COUNT(*) AS nb_commentaires FROM link_comment WHERE id_link = ".$info['id_link'];
                        $resultCount = $bdd->query($requeteCount)->fetch(PDO::FETCH_ASSOC);
                        $nbCommentaires = $resultCount['nb_commentaires'];

                        echo "<div><p>Il y a : "."<a href='commentaire.php?id={$info['id_link']}'>".$nbCommentaires." commentaire(s)</a></p></div>";

                        echo "<hr>";
                    }
                ?>
            </div>
        </div>
    </main>
    <footer>
        <div class="container display_footer">
            <nav>
                <ul>
                    <li><a href="./connexion.php">Se connecter/</a></li>
                    <li><a href="./deconnexion.php">Se deconnecter/</a></li>
                    <li><a href="./inscription.php">S'inscire/</a></li>
                </ul>
                <?php
                    if (isset($_SESSION['id_user']) && $_SESSION['id_user'] === 1) {
                        echo "<ul><li><a href='backoffice.php'>Backoffice</a></li></ul>";
                    }
                ?>
            </nav>
        </div>
    </footer>
</body>
</html>