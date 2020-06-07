<?php
session_id('mySessionID');
session_start();      //STARTING THE SESSION
require_once('Views/register.phtml'); //REQUIRING THE VIEWS/register.phtml


$name = $_POST["user_name"];          //GETTING USERNAME FROM  THE REGISTER.PHTML TABLE
echo $name . "<br>";                          //TESTING THE NAME VARIABLE
$password = $_POST["user_password"];  //GETTING THE PASSWORD FROM THE REGISTER.PHTML TABLE
$hashed_password = password_hash($password, PASSWORD_DEFAULT ); //CREATING A HASHED PASSWORD FOR SECURITY OUT OF T
                                                                     //THE PASSWORD USER HAS GIVEN
//echo password;                      //TESTING THE NORMAL PASSWORD
//echo $hashed_password               //TESTING THE HASHED PASSWORD
$email = $_POST["user_email"];        //GETTING THE EMAIL FROM THE REGISTER.PHTML TABLE
//echo e-mail;                        //TESTING THE E-MAIL

require("Models/Register.php");       //REQUIRING THE CLASS CALLED REGISTER TO USE METHODS FROM THAT CLASS
$view = new stdClass();               //CREATING STD CLASS OBJECT
$register = new Register();           //CREATING A NEW  REGISTER OBJECT


    if(isset($_POST['register'])) {        //IF A BUTTON CALLED REGISTER HAS BEEN PRESSED
         $vv = $view->register = $register->addUser($name, $hashed_password, $email);//USING THE REGISTER CLASS ADDING
        //// THE USER TO THE DATABASE
         $vv->fetchColumn();              //RETURNS THE COLUMN
            if ($vv) {                    //IF THE COLUMN EXISTS(IF USER IN THE DATABASE)
                 //echo "thank you for registering to forum";  //PRINTING A MESSAGE
                $_SESSION['name'] = $name; //PUTTING THE USER NAME INTO THE SESSION VARIABLE
                $name1 = $_SESSION['name']; //PUTTING THE SESSION INTO A VARIABLE TO TEST IT
                echo $name1;
                //$_SESSION['password2'] = $hashed_password; //PUTTING THE USER PASSWORD INTO THE SESSION VARIABLE
                //echo $_SESSION['password2'];
                $_SESSION['signed-in'] = true;   //CREATING A SIGNED-IN SESSION TO MAKE USER SIGN-IN
                $signC = $_SESSION['signed-in']; //PUTTING THE SESSION INTO A VARIABLE TO TEST IT
                echo $signC;
                //echo "welcome " . $name1 . $signC;  //TO TEST THE VARIABLES

                include ("register2.php");                  //INCLUDING REGISTER2.PHP TO MAKE THEM REACH TO INDEX2 BY
                                                             //USING THE HOME BUTTON

            }


    }


?>





