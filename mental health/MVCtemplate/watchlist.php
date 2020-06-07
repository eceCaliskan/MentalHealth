<?php
session_id('mySessionID2'); //TO START THE SESSIONS
session_start();
require_once('Models/WatchList.php');   // INCLUDING THE CLASS CALLED WATCHLIST
require_once ('Models/Register.php');



$name = $_SESSION["name"];              //GETTING THE NAME OF THE USER WHO USES THE WEBSITE FROM SESSIONS
$password=$_SESSION["password2"];       //GETTING THE PASSWORD OF THE USER WHO USES THE WEBSITE FROM SESSIONS

$view = new stdClass();                //CREATING A NEW stdCLASS
$watchList = new WatchList();          //CREATING A NEW watchList OBJECT
$post= new Register();               //CREATING A NEW messageSet OBJECT


   if($_GET['post_id']) {                 //GETTING POST-ID FROM THE TABLE IN TABLE.PHTML
        $posstID = $_GET['post_id'];
        $sql = $view->post = $post->getID($password, $name);  //GETTING THE ID OF THE USER
        //echo "<br>" . $posstID . "<br>";                     //TESTING THE POST-ID

        $sql1 = $view->watchList = $watchList->addWatchList($posstID, $sql);  //CALLING ADDWATCHLIST METHOD TO ADD POST TO
                                                                          //USERS WATCHLIST

   }

   if($_GET['post_idm']) {
        $posstID = $_GET['post_idm'];    //GETTING THE POST ID FROM THE TABLE IN WATCHLIST.PHTML
        $sql = $view->post = $post->getID($password, $name); //GETTING THE ID OF THE USER
        //echo "<br>" . $posstID . "<br>";                    //TESTING THE POST-ID

        $sql1 = $view->watchList = $watchList->removeFromWatchList($posstID, $sql); ////CALLING removeFromWatchList METHOD
                                                                                    //  TO REMOVE POST FROMO USERS WATCHLIST
   }


   $sql3=$view->post = $post->getID($password, $name); //GETTING THE USERS ID
   $sql4 = $view->watchList= $watchList->getWatchList ($sql3); // CALLING GETWATCHLIST METHOD IN WATCHLIST CLASS TO
                                                               //SHOW ALL THE POSTS IN THE USERS WATCHLIST
   //echo $sql;
   require_once ("Views/watchList.phtml");  //CALLING watchList.phtml TO SHOW THE POST IN THE WAATCHLIST IN A TABLE
?>