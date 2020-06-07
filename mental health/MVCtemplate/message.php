<?php                    //starting php
session_start();
require_once ('Models/Register.php');   //requiring the class register
require_once ('Models/MessageSet.php'); //requiring the class  messageset
$view = new stdClass();                //CREATING A NEW stdCLASS
$messageSet = new MessageSet();            //CREATING A NEW MESSAGESET OBJECT
$register = new Register();
$iDD = $_SESSION['reciever_id'];             //using variable to store the session
$username = $_SESSION['reciever_name'];   //reciever name
$reciever_id=$view->register = $register->getUser2($username);//GETTING THE RECIEVER'S ID
$senderiDD = $_SESSION['id'];
$name2 = $_SESSION['name'];     //getting the name from the session variable
$password2 = $_SESSION['password2']; //getting the password from the session variable
$text = $_REQUEST["q"];//getting the password from table message.phtml
$i =$view->messageSet = $messageSet->seeMessage($senderiDD, $reciever_id);
echo json_encode($i);
?>
