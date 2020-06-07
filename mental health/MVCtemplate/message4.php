<?php
session_start();
require_once ('Models/Register.php');   //requiring the class register
require_once ('Models/MessageSet.php'); //requiring the class  messageset
$view = new stdClass();                //CREATING A NEW stdCLASS
$messageSet = new MessageSet();            //CREATING A NEW MESSAGESET OBJECT
$register = new Register();
$iDD = $_SESSION['reciever_id'];             //using variable to store the session
$username = $_SESSION['reciever_name'];     //reciever name
$reciever_id=$view->register = $register->getUser2($username); //RECIEVER'S ID
$senderiDD = $_SESSION['id'];
$name2 = $_SESSION['name'];     //getting the name from the session variable
$password2 = $_SESSION['password2']; //getting the password from the session variable
$text = $_REQUEST["q"];//GETTING THE TEXT
$image = $_REQUEST["q2"]; //GETTING THE IMAGE
echo $image;
$i2=$view->messageSet = $messageSet->sendMessage($senderiDD, $reciever_id, $text, $image); //SENDING THE MESSAGE
?>