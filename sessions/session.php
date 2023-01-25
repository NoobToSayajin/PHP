<?php
//permet d'ouvrir une session (un tableau qui garde une valeur en mémoire meme si le script et rechargé et peut partager ses données entre plusieurs fichier)
session_start();

$_SESSION['valeur'] = 42;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="lecture-session.php">lire la session</a>
</body>
</html>