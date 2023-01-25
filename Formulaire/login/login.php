<?php

/*
for debug
XDEBUG_SESSION_START=[name]
*/
//recuperation des infos du form
$mail=$_POST['email'];
$pwd=$_POST['pwd'];

//connection a la bdd
$dsn = "mysql:dbname=phpepnak;host=127.0.0.1;port=3306;charset=utf8;";
$bdd = new PDO($dsn, 'root', '');

//determine la requete select user generique
$query = "SELECT * FROM `user` WHERE `email` = :email";

//prepare la requete
$stmt=$bdd->prepare($query);

//lancer l execution
$result = $stmt->execute(
    [
        'email' => $_POST['email']
    ]
);

if($result)
{
    //lie la fiche user
    $user = $stmt->fetch();
    //verifie que le mdp est le meme
    $resultCheck = password_verify($_POST['pwd'], $user['pwd']);
    if($resultCheck)
    {
        echo "login OK";
    }
    else
    {
        echo "login failed";
    }
}