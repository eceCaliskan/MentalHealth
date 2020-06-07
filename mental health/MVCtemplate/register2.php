<!DOCTYPE html>    <!--using html to create a button to index2.php-->
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="/css/bootstrap-theme.css" rel="stylesheet">
        <link href="/css/my-style.css" rel="stylesheet">
        <title>MENTAL HEALTH <?php echo $view->pageTitle ?> </title><!--THE NAME OF THE PAGE-->
    </head><!--OPENING THE HEAD ELEMENT-->


<body>
<input type="submit" name="Home8" value="Home" formaction="index2.php"/> <!--CREATING A BUTTON TO INDEX2.PHP-->
</body>
</html>

<?php  //STARTING PHP
session_id('mySessionID');
session_start();                                 //STARTING THE SESSION
$name = $_SESSION['name'];
echo "Thank You For Registering To The Forum " .$name ;  //PRINTING A MESSAGE FOR USER
?>     <!--ENDING PHP-->

