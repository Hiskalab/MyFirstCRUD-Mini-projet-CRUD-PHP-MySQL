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

    $requete=$bdd->prepare("SELECT * FROM link WHERE id_link = :id_link");
    $requete->execute(["id_link"=>$id]);
    $resultat=$requete->fetch(PDO::FETCH_ASSOC);

    $id=$resultat['id_article'];
    $titre=$resultat["titre"];
    $description=$resultat["description"];

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
        <a href="backoffice.php"><h3>BACKOFFICE / Modifier</h3></a>
        <h2>Modifier un link</h2>
        <form action="result_modifier.php" method="GET">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            URL (*):<input type="text" name="modUrl" value="<?php echo $url; ?>"><br>
            Titre (*):<input type="text" name="modTitre" value="<?php echo $titre; ?>"><br>
            Description : <textarea name="modDescription" value="<?php echo $description ?>n"></textarea>
            <br><input type="submit" value="Modifier">
        </form>
    </main>
    <footer>
        <div class="container display_footer">
            <nav>
                <ul>
                    <li><a href="./connexion.php">HOME/</a></li>
                    <li><a href="./deconnexion.php">Se deconnecter</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>