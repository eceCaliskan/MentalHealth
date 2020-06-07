<?php

session_id('mySessionID2'); //TO START THE SESSIONS
session_start();
require_once('Models/Register.php');   // INCLUDIN THE CLASS CALLED REGISTER
$name = $_POST["user_name"];           // POST USER NAME FROM THE SIGN IN FORM
$password = $_POST["user_password"];   //POST USER PASSWORD FROM THE SIGN IN FORM


$view = new stdClass();                //CREATING A NEW stdCLASS
$register = new Register();            //CREATING A NEW REGISTER OBJECT
$sql4 = $view ->register = $register->getHashPassword($name); // CALLING getHashPassword BY USING THE NAME OF THE USER T
                                                              //TO GET THE HASH PASSWORD STORED IN THE DATABASE
//echo $sql4;    // TEST THE HASH PASSWORD
$sql = $view ->register = $register->sign($sql4, $name); //CALLING sign METHOD TO SEE IF THE USER ALREADY REGISTERED AND
                                     //STORED IN THE DATABASE

    if ($sql) {
         $sql->fetchColumn();               //RETURNS THE COLUMN
         //echo $sql;                       //TESTING THE COLUMN
             if (password_verify($password, $sql4)) {   // TO CHECK IF PASSWORD IN THE DATABASE AND THE HASH OF PASSWORD ARE THE SAME
                   require_once("index2.php");  //IF THE PASSWORD IS BEING VERIFIED WE CAN LET USER GET IN TO INDEX2.PHP
                   $_SESSION['name'] = $name;  // PUT THE NAME OF USER INTO THE SESSION
                   $nam = $_SESSION['name'];   //CREATING A VARIABLE TO TEST IT
                   //echo $nam;                //TEST THE SESSION
                   $_SESSION['password2'] = $sql4;  //PUTTING THE PASSWORD OF THE USER INTO THE SESSION VARIABL
                   $pass = $_SESSION['password2'];  //CREATING A VARIABLE TO TEST IT
                   //echo $pass;                    //TEST THE SESSION
                   $_SESSION['signed-in'] = true;   //CREATING A SESSION TO MAKE THE USER SIGN-IN
                   $login = $_SESSION['signed-in']; //CREATING A VARIABLE TO TEST IT
                   //echo $login;                     //TEST THE SESSION
                   echo "welcome to forum " . $nam; //WELCOME MESSAGE FOR USER WITH THEIR USERNAME STORED IN THE SESSIONS
                 $view = new stdClass();                //CREATING A NEW stdCLASS
                 //$messageSet = new MessageSet();            //CREATING A NEW MESSAGESET OBJECT
                 $register = new Register();

                 $id = $view->register = $register->getID($pass , $nam);
                 echo $_SESSION['id'] = $id;
             }
    }


?>

