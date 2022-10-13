<?php
session_start();

/*
 _       _ _   
(_)     (_) |  
 _ _ __  _| |_ 
| | '_ \| | __|
| | | | | | |_ 
|_|_| |_|_|\__|
               
*/ 
$file = "dictionnaire.json";
$data = file_get_contents($file);
$json = json_decode($data);

if(!function_exists('init'))
{
    function restart()
    {
        global $_NBTRYMAX;
        echo "nouveau jeu<br>";
        init();
        guesser($_SESSION['a_word']);
        echo "Tentative n° ".$_SESSION['i_try']."/$_NBTRYMAX<br>";
        echo "<br>";
    }
}

if(!function_exists('init'))
{
    function init()
    {
        global $json;
        global $letterGuess;
        $letterGuess = false;
        $nb = random_int(0,count($json)-1);

        $_SESSION['a_test'] = [];
        $_SESSION['i_try'] = 1;
        $_SESSION['guessWord'] = $json[$nb];
        $_SESSION['a_word']=[];
        $_SESSION['points'] = 0;
    
        for($i=0;$i<strlen($_SESSION['guessWord']);$i++)
        {
            $_SESSION['a_word'][$i]=['letter'=>substr($_SESSION['guessWord'],$i,1),'bGuess'=>false];
        }
    }
}

if(!function_exists('check'))
{
    function check($var0, $var1)
    {
        $isGuess = false;
        if($var0===$var1)
        {
            $isGuess = true;
        }
        return $isGuess;
    }
}

if(!function_exists('guesser'))
{
    function guesser($pTable)
    {
        foreach($pTable as $var)
        {
            $letter=($var['bGuess'])?$var['letter']:"*";
            echo $letter;
        }
        echo "<br>";
    }
}

if(!function_exists('isExist'))
{
    function isExist($c_letter, $a_test)
    {
        global $isExist;
        foreach($a_test as $var)
        {
            $isExist = false;
            if($c_letter===$var)
            {
                $isExist = true;
                break;
            }
        }
        return $isExist;
    }
}

/*
 _____                      _                       
|  __ \                    | |                      
| |  \/ __ _ _ __ ___   ___| |     ___   ___  _ __  
| | __ / _` | '_ ` _ \ / _ \ |    / _ \ / _ \| '_ \ 
| |_\ \ (_| | | | | | |  __/ |___| (_) | (_) | |_) |
 \____/\__,_|_| |_| |_|\___\_____/\___/ \___/| .__/ 
                                             | |    
                                             |_|    
*/

$_NBTRYMAX = 7;
$guess=$_POST['guess']??"";
$restart=$_POST['restart']??"";
$guess=strtolower($guess);


if($restart==='restart')
{
    restart();
}
else
{
    if(isExist($guess,$_SESSION['a_test']))
    {
        echo "La lettre $guess a déjà été utilisé !<br>";
    }
    elseif($guess!=="")
    {
        $letterGuess = false;
        array_push($_SESSION['a_test'],$guess);
        for($i=0;$i<count($_SESSION['a_word']);$i++)
        {
            
            if(!$_SESSION['a_word'][$i]['bGuess'])
            {
                $isGuess = check($guess,$_SESSION['a_word'][$i]['letter']);
                $_SESSION['a_word'][$i]['bGuess'] = $isGuess;
                if($isGuess)
                {
                    $letterGuess = true;
                    $_SESSION['points']++;

                }
            }
        }

        if(!$letterGuess)
        {
            $_SESSION['i_try']++;
            if($_NBTRYMAX<$_SESSION['i_try'])
            {
                echo "Perdu le mot était ".$_SESSION['guessWord']."<br>";
                restart();
            }
        }
        else
        {
            if(strlen($_SESSION['guessWord'])<=$_SESSION['points'])
            {
                echo "c'est gagné !<br>";
                echo "le bon mot était:<br>";
            }
        }
    }
    global $_NBTRYMAX;
    guesser($_SESSION['a_word']);
    echo "Tentative n° ".$_SESSION['i_try']."/$_NBTRYMAX<br>";
    echo "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pendu</title>
    </head>
    <body>
        <form action="index.php" method="post">
            <label for="guess">Entrez une lettre: 
                <br>
                <input type="hidden" name="restart" value="no">
                <input type="text" name="guess">
                <br>
                <?php
                    echo "lettre utilisées: <br>";
                    for($i=0;$i<count($_SESSION['a_test']);$i++)
                    {
                        echo $_SESSION['a_test'][$i].";";
                    }
                ?>
                <br>
                <button type="submit">continue</button>
                <br>
            </label>
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="restart" value="restart">
            <button type="submit">Restart</button>
        </form>
    </body>
</html>