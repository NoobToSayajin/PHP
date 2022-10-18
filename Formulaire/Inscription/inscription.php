<?php
//$sql = "INSERT INTO `user` (`id`, `prenom`, `nom`, `email`, `pwd`) VALUES (NULL, 'dave', 'loppeur', 'dave@loppeur.com', 'incroyable')";

//connection a la BDD
$dsn = "mysql:dbname=phpepnak;host=127.0.0.1;port=3306;charset=utf8;";
$bdd = new PDO($dsn, 'root', '');

//determine la requete insert user generique
$query = "INSERT INTO `user`  VALUES (NULL, :prenom, :nom, :email, :pwd);";

//prepare la requete
$stmt=$bdd->prepare($query);

//hash du mdp
$mdp=password_hash($_POST['pwd'], PASSWORD_ARGON2I);

//lancer l execution
$result = $stmt->execute(
    [
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'email' => $_POST['email'],
        'pwd' => $mdp
    ]
);

if($result)
{
    echo "requete effectuer avec succes";
}