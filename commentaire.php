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
                <div style="margin-block: 50px;"><a href="index.php"><h3>HOME / Commentaire</h3></a></div>
                <?php
                    include("pdo.php");

                    $id=$_GET['id'];

                    $requete = $bdd->prepare("SELECT * FROM link WHERE id_link = :id_link");
                    $requete->bindParam(':id_link', $id, PDO::PARAM_INT);
                    $requete->execute();

                    $reponseArticle = $requete->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($reponseArticle as $info) {
                        echo "<div>"."<h2>".$info['titre']."</h2>".
                        "<p>".$info['description']."..."."</p>".
                        "<div class='cm'>"."<a href='{$info['url']}'>".$info['url']."</a>"."<p>"."Publié :".$info['date_']."</p>"."</div></div>"."<hr>";

                        $requeteCom = $bdd->prepare("SELECT * FROM link_comment WHERE id_link = :id_link ORDER BY date_ ASC, heure ASC");
                        $requeteCom->bindParam(':id_link', $info['id_link'], PDO::PARAM_INT);
                        $requeteCom->execute();
                        $comments = $requeteCom->fetchAll(PDO::FETCH_ASSOC);

                        echo "<div><h3 style='margin-block: 50px;'>Commentaires : </h3>";
                        if (count($comments) ===0) {
                            echo "<p>Pas de commentaire pour ce lien.</p>";
                        } else {
                            foreach ($comments as $com) {
                                echo "<p><strong>".htmlspecialchars($com['login'])."</strong> : ".htmlspecialchars($com['commentaire'])." <em>(".$com['date_']." ".$com['heure'].")</em></p>";
                            }
                        }
                        echo "</div><hr>";
                    }
                ?>
                <div style="margin-block: 50px;"><a href="addComment.php?id=<?php echo $id; ?>"><h4>Ajouter un commentaire</h4></a></div>
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