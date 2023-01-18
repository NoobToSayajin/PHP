<?php

//exec permet d'executer une ligne de commande extérieur (commande en console)
exec('mkdir result');

//la gestion de f
//1 - j'ouvre mon fichier en mode écriture
$file = fopen('C:\\xampp\\htdocs\\TutoPHP\\result\\test.txt', 'w+');

//j'ecris le contenu dans mon fichier
fputs($file, 'nouvelle ligne 1' . PHP_EOL); // PHP_EOL => end of line
fputs($file, 'nouvelle ligne 10' . PHP_EOL);
fputs($file, 'nouvelle ligne 42' . PHP_EOL);

//je ferme le fichier
fclose($file);

echo 'ok<br>';

// j'ouvre le fichier en mode lecture
$file = fopen('C:\\xampp\\htdocs\\TutoPHP\\result\\test.txt', 'r');

//tant que je ne suis pas à la fin du fichier je lis la ligne en cours et je l'affiche
while (!feof($file)) {
    echo fgets($file) . '<br>';
}