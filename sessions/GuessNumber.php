<?php
session_start();

if(!isset($_SESSION['Try']))
{
    $_SESSION['Try'] = 0;
}
if(!isset($_SESSION['NumGuess']))
{
    $_SESSION['NumGuess']=random_int(1,100);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess</title>
</head>
<body>
    <form action="main.php" method="post">
        <label for="Guess">Guess the number !<br>
            <input type="number" name="Guess" min="1">
        </label>
        <br>
        <?php echo "Essai: ".$_SESSION['Try']."/7" ?>
        <br>
        <input type="hidden" name="restart" value="no">
        <button type="submit">Continue</button>
    </form>
    <form action="main.php" method="post">
        <input type="hidden" name="restart" value="restart">
        <button type="submit">Restart</button>
    </form>
</body>
</html>