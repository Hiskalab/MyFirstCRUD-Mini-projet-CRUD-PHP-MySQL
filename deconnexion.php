<?php
session_start();
echo "Session deconnecté";
echo "<br><a href='index.php'>HOME</a>";
echo "<br><a href='connexion.php'>Se connecter</a>";
session_destroy();
exit;
?>