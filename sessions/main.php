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

if(!function_exists('restart'))
{
    function restart()
    {
        $_SESSION['Try']=0;
        $_SESSION['NumGuess']=random_int(1,100);
    }
}

if(!function_exists('check'))
{
    function check($var0, $var1)
    {
        $isGuess = false;
        if($var0===$var1)
        {
            echo "Bravo !<br>";
            $_SESSION['Try']+=1;
            $isGuess = true;
        }
        elseif($var0<$var1)
        {
            echo "nope !<br>";
            echo "c'est plus !<br>";
            $_SESSION['Try']+=1;
        }
        // elseif($var1<$var0)
        else
        {
            echo "nope !<br>";
            echo "c'est moins !<br>";
            $_SESSION['Try']+=1;
        }
        return $isGuess;
    }
}

$numGood = $_SESSION['NumGuess'];
$num = $_POST['Guess']??null;
settype($num,"int");
$restart=$_POST['restart'];


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

$isGuess = ($num !== 0)?check($num, $numGood):false;
if(7<=$_SESSION['Try'])
{
    echo "Tu est un con Harry !!!<br>";
    echo "Le bon nombre était: ".$_SESSION['NumGuess']."<br>";
    restart();
}
elseif($isGuess)
{
    echo "Félicitation résultat obtenu après ".$_SESSION['Try']." essais sur 7 !<br>";
    restart();
}
if($restart==="restart")
{
    echo "Nouvelle chance !<br>";
    restart();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat</title>
</head>
<body>
    <form action="GuessNumber.php">
        <button type="submit">Continue</button>
    </form>
</body>
</html>