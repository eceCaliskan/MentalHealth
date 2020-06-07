<?php //STARTING THE PHP
session_start();   //STARTING THE SESSION
session_id('mySessionID2');

require_once('Models/PostSet.php'); //REQUIRING THE POSTING.PHP CLASS TO USE ITS METHODS
require_once('Models/Register.php');//REQUIRING THE REGISTER.PHP CLASS TO USE ITS METHODS


if (isset($_FILES['userfile'])) {  //the file is called userfile
    //pre_r($_FILES);
    $error= false; //we assign error variable to false
    $fileExtensions= array('jpeg','jpg','gif','png');// WE ARE ONLY GOING TO ACCEPT FILES ENDS WITH THESE EXTENSIONS
    $exist=  explode('.', $_FILES['userfile']['name']);// WE EXTRACT THE NAME OF THE FILE AND EXTENSION
    //pre_r($exist); //PRINTING OUT
    $exist= end($exist);  //GETTING THE EXTENSION
    $max_size=16000;//DECIDING THE MAX SIZE OF A FILE(IMAGE) A USER CAN UPLOAD
    $fileSize=$_FILES['userfile']['size']; //GETTING THE SIZE OF THE IMAGE
    //echo $fileSize;     //TESTING THE IMAGE SIZE
    if($max_size<$fileSize){  //IF THE IMAGE SIZE IS GREATER THAN THE ALLOWED MAX_SIZE
        echo "file is too big"; //PRINT A MESSAGE
        $error=true;            //SET THE ERROR VARIABLE TO TRUE
    }
    if(!in_array($exist, $fileExtensions)){//IF THE FILE EXTENSION IS NOT EXISTED IN THE ARRAY
        $error=true;            //SET THE ERROR VARIABLE TO TRUE
        echo "file is not uploaded";//PRINT A MESSAGE
    }else {
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'images/' . $_FILES['userfile']['name']);
        //take the given file's name with tmpname and move it to the image directory
    }
}


$subject = htmlentities($_POST["post_subject"]);  //GETTING THE POST SUBJECT FROM POST.PHTML
//echo $subject;                    //TESTING THE SUBJECT
$text = htmlentities($_POST["post_text"]);        //GETTING THE POST TEXT FROM POST.PHTML

//echo $text;                       //TESTING THE TEXT VARIABLE
$image = $_FILES['userfile']['name']; //GETTING THE UPLOADED FILE
$name1 = $_SESSION['name'];   //GETTING THE NAME OF THE USER FROM THE SESSION VARIABLE
//echo $name;                 //TESTING THE SESSION VARIABLE
$password1 = $_SESSION['password2'];  //GETTING THE USERS PASSWORD FROM THE SESSION VARIABLE
//echo $password1;                    //TESTING THE SESSION VARIABLE


$view = new stdClass();      //CREATING A NEW OBJECT STDCLASS
$posting = new PostSet();    //CREATING A NEW POST OBJECT
$register = new Register();




    if($name1){                            //IF THE SESSION NAME IS NOT EMPTY(USER SIGNED IN)
         if($_GET['pressed']==1) {         //if pressed is 1 in the post.phtml
            require_once("Views/post.phtml");  //require post.phtml to get the table
            if (isset($_POST['post'])) {   //if the button called sign is pressed
                                           // require_once("Views/post.phtml");
                 $id = $view->posting = $register->getID($password1, $name1); //calling getid method in posting class to get the id
                                                                             //of the user
                 //echo $id; //testing the return result
                 if($error==false){         //IF THERE IS NO ERROR IN THE FILE
                 $view->posting = $posting->post($subject, $text, $id, $image); // ADDING THE POST TO THE DATABASE
            }}
         }
    }

?> <!--closing the php-->


