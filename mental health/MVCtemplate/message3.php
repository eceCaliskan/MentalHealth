<?php
session_start();//starting the session
$_SESSION['reciever_name']=$_REQUEST['name']; //REQUESTING THE RECIEVER OF THE MESSAGES'S NAME
require ("Views/message2.phtml");//REQUIRING THE CLASS CALLED MESSAGESET