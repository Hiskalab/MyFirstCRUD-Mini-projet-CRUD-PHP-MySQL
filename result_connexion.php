
<?php
    session_start();

    include("pdo.php");

    $query = $bdd->prepare('SELECT * FROM user_ WHERE login = :login');
    $query->bindParam(':login', $_GET['login']);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_GET['password'], $user['password'])) {
    $_SESSION['id_user'] = (int) $user['id_user'];
    $_SESSION['login'] = $user['login'];
    if ($_SESSION['id_user'] === 1) {
        header('location: backoffice.php');
        exit;
    }
    header('location: index.php');
    exit;
    } else {
    echo "Erreur, identifiant incorrect ou inexistant";
    echo "<br><a href='./index.php'>HOME</a>";
    exit;
    }

?>
