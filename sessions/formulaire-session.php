<?php
//partant de cette base, créer une prix en session, comparé ce prix à la valeur saisie dans le formulaire, et tu compte le nombre d'erreur, (on donne 7 essai max avant de perdre la aprtie) en bonus, prévoir un bouton recommencer
session_start();
echo 'le prix est de ' . $_POST['prix'];
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
    <form action="" method="post">
        <input type="number" name="prix" id="">
    </form>
</body>

</html>