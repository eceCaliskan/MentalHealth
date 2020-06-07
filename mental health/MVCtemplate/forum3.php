<?php
session_start();
require_once('Models/PostSet.php');  //REQUIRING THE POSTSET CLASS
$view = new stdClass();
$postSett = new PostSet();    //CREATING NEW POSTSET OBJECT
$q=$_REQUEST["q"];            //REQUESTING THE VARIABLE PASSED BY THE URL FROM THE SEARCH.JS
$q= trim($q);                 //REMOVING SPACES
$signed=$_SESSION['signed-in'];     //GETTING THE SESSION SIGNED IN TO CHECK IF THE USER SIGNED IN OR NOT
if($signed==true) {
    $sql4 = $view->postSett = $postSett->search($q);  //SEARCH THE POSTSUNDER THE CRITERIA
    echo json_encode($sql4);   //PRINTING THEM OUT
}else{
    $sql4 = $view->postSett = $postSett->search3($q);  //SEARCH THE POSTSUNDER THE CRITERIA
    echo json_encode($sql4);   //PRINTING THEM OUT

}