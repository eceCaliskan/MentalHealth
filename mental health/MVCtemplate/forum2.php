<?php
session_start(); //starting the session
$_SESSION["included"] = false;
require_once('Models/PostSet.php'); //requiring the posrset class to use its methods
$view = new stdClass();             //creating new object of stdClass
$postSett = new PostSet();          //CREATING A NEW POST OBJECT
$signed = $_SESSION['signed-in'];     //GETTING THE SESSION SIGNED IN TO CHECK IF THE USER SIGNED IN OR NOT
$q=$_REQUEST["q"];                      //REQUESTING THE VARIABLE FROM THE JAVASCRIPT FILE
$hint = "";
$sql4 = $view->postSett = $postSett->search2($q);  //GETTING THE SEARCHED POSTS
if ($q !== "") {    //IF THE VARIABLE IS NOT NULL OR BLANK
    $q = strtolower($q);
    $len=strlen($q);
    foreach($sql4 as $name) {      //GET THE ARRAY AS $NAMR
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;    //PUT IT INTO $HINT VARIABLE
            } else {
                $hint .= ", $name";
            }
        }
    }
}// Ou4tput "no suggestion" if no hint was found or output results  
echo $hint === "" ? "no suggestion" : $hint;
