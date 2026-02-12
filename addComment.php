<?php
    session_start();

    if (isset($_SESSION['login'])) {
        echo 'Connecté en tant que : ' . htmlspecialchars($_SESSION['login']);
    }
    $id=$_GET['id'];
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
                <div style="margin-block: 50px;"><a href="commentaire.php"><h3>HOME / Commentaire / Ajouter un commentaire</h3></a></div>
                <form action="result_addComment.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    login : <input type="text" name="login" value="<?php     if (isset($_SESSION['login'])) {echo htmlspecialchars($_SESSION['login']);} else { echo ""; } ?>"><br>
                    Commentaire : <textarea name="commentaire"></textarea><br>
                    <input type ="submit" value="Envoyer">
                </form>
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