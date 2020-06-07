<?php
session_start();    //STARTING THE SESSION
require_once ("Models/UserSet.php");
$view = new stdClass();                //CREATING A NEW stdCLASS
$messageSett = new UserSet();            //CREATING A NEW MESSAGESET OBJECT
$i=$view->messageSett = $messageSett->seeUsers();   //RETURNS THE USER DATA
echo json_encode($i);




