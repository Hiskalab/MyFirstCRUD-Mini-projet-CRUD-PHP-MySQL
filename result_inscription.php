<?php include("pdo.php");

$password = $_GET['ipassword'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$query = $bdd->prepare('INSERT user_ (login, password) VALUES (:login, :password)');
$query->bindParam(':login', $_GET['ilogin']);
$query->bindParam('password', $hashed_password);
$query->execute();

echo "Utilisateur créé<br>";
echo "<a href='index.php'>Home</a>";
echo "<a href='connexion.php'>Seconnecter</a>";

?>

