<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
            <?php
                // if (!isset($_SESSION['id_user'])  || ($_SESSION['id_user'] !== 1)) {
                //     echo "Erreur";
                // }
            ?>
            <h2>Connexion</h2>
            <form action="./result_connexion.php" method="get">
                <div style="padding-top: 10px;">Login : <input type="text" name="login"></div>
                <div style="padding-top: 10px;">Password : <input type="text" name="password"></div>
                <div style="padding-block: 10px;"><input type="submit" value="Se connecter"></div>
            </form>
        </div>
    </main>
    <footer>
        <div class="container display_footer">
            <nav>
                <ul>
                    <li><a href="./index.php">Accueil/</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>