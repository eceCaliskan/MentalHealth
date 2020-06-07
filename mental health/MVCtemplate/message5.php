<?php
session_start();
require_once ('Models/Register.php');   //requiring the class register
require_once ('Models/MessageSet.php'); //requiring the class  messageset
$view = new stdClass();                //CREATING A NEW stdCLASS
$messageSet = new MessageSet();            //CREATING A NEW MESSAGESET OBJECT
$register = new Register();
$iDD = $_SESSION['id'];             //using variable to store the session
$username = $_SESSION['reciever_name'];     //reciever name
$reciever_id=$view->register = $register->getUser($username); //RECIEVER'S ID
$nofitication = $view->register = $messageSet->getNotification($iDD);
echo json_encode($nofitication);
