<?php                              //STARTING THE PHP
session_start();                   //STARTING THE SESSION
$name = $_SESSION['name'];         //GETTING THE NAME OF THE USER STORED IN THE SESSION INTO A VARIABLE TO USE IT
echo "goodbye " . $name;           //PRINTING A MESSAGE FOR USER
session_destroy();                 //DESTROYING THE SESSIONS SO THAT WE CAN STORE NEW USER
require_once ("Views/signout.phtml");    //REQIRING THE SIGNOUT.PHP
?> <!--CLOSING THE PHP-->