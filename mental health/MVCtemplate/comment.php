<?php
session_start(); //STARTING THE PHP

require_once("Models/PostSet.php");     //REQUIRING CLASS CALLED POSTSET TO USE ITS METHODS
require_once ("Models/CommentSet.php"); //REQUIRING CLASS CALLED COMMENTSET TO USE ITS METHODS
require_once ("Models/Register.php"); //REQUIRING CLASS CALLED REGISTER TO USE ITS METHODS

$view = new stdClass();                 //CREATING AN OBJECT OF STDCLASS
$view->pageTitle = 'Mental Health';     //PUTTING THE PAGE TITLE
$commentC = new CommentSet();           //CREATING AN OBJECT OF COMMENTSET
$postSett= new PostSet();               //CREATING AN OBJECT OF POSTSET
$register= new Register();              //CREATING AN OBJECT OF REGISTER

$post3=$_REQUEST["post_id2"];  //GETTING THE ID OF POST
$post2=$_REQUEST["post_id2"];    //GETTING THE ID OF POST
//echo $post2;              //TEST $POST2 VARIABLE
$comment_text=htmlentities($_POST['comment_text']);    //GETTING THE TEXT AND PUT IT INTO A VARIABLE
$name = $_SESSION['name'];               //GETTING THE NAME USING SESSION
//var_dump($post2,$comment_text,$name);  //CHECKING THE VARIABLES
$password1 = $_SESSION['password2'];     //GETTING THE PASSWORD USING SESSION
//var_dump($password1);                  //CHECKING THE PASSWORD VARIABLE
$image = $_FILES['userfile']['name'];    //GETTING THE FILE


    if (isset($_POST["comment"])) { //if the button called comment is pressed

            if($name) {  //if SESSION NAME IS NOT EMPTY(USER SIGNED)

               $id = $view->commentC = $register->getID($password1, $name); // GETTING THE USER ID USING GETID METHOD OF COMMENTsET
               //echo $id; //TESTING $id
               $t = $view->commentC = $commentC->sendComment($post3, $id, $comment_text);//LETTING USER SEND A COMMENT USING SENDCOMMENT METHOD
               echo "thank you for commenting to the post";
            }
    } else {           //IF COMMENT BUTTON IS NOT PRESSED
        if($name) {    //IF THE USER IS REGISTERED
            $n = $view->postSett = $postSett->getPost($post2); //SHOW THE SPECIFIC POST USING GETPOST OF THE POSTSETT CLASS
            $view->commentC = $commentC->seeComments($post2);   //GETTING ALL THE COMMENTS WHICH HAS THE SAME POST-ID USING SEARCH METHOD OF COMMENTSET
            require_once("Views/table3.phtml");            //SHOW THEM IN THE TABLE
        }else{         //IF THE USER IS NOT REGISTERED
            $n = $view->postSett = $postSett->getPost($post2); //SHOW THE SPECIFIC POST USING GETPOST OF THE POSTSETT CLASS
            $view->commentC = $commentC->seeComments($post2);//GETTING ALL THE COMMENTS WHICH HAS THE SAME POST-ID USING SEARCH METHOD OF COMMENTSET
            require_once("Views/table2.2.phtml");         //SHOW THEM IN THE TABLE EXCLUDING THE IMAGES
        }
    }
?>  <!--CLOSING PHP-->