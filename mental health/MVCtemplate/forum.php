<?php
session_start(); //starting the session
$_SESSION["included"]=false;
require_once('Models/PostSet.php'); //requiring the postset class to use its methods
$view = new stdClass();             //creating new object of stdClass
$postSett = new PostSet();          //CREATING A NEW POSTSET OBJECT
$signed=$_SESSION['signed-in'];     //GETTING THE SESSION SIGNED IN TO CHECK IF THE USER SIGNED IN OR NOT
if($signed==true) {
    $sql4 = $view->postSett = $postSett->fetchAllPost(); //GETTING THE ALL THE POST
    echo  json_encode($sql4); //USING JSON ENCODE ECHOING THE POST DATA
}
else{
    $sql4 = $view->postSett = $postSett->fetchAllPost2(); //GETTING THE ALL THE POST
    echo  json_encode($sql4); //USING JSON ENCODE ECHOING THE POST DATA
}
?>





