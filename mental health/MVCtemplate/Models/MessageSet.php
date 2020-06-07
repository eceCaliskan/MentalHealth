<?php
//THIS CLASS IS TO SEND MESSAGE TO A USER AND RECEIVE THE MESSAGES WHICH OTHER USERS SENT TO YOU
require_once('Database.php');
require_once('Models/Message.php');
require_once ('Models/User.php');
class MessageSet
{
    protected $_dbHandle, $_dbInstance;   //CREATING FIELDS

    public function __construct() //CREATING THE CONSTRUCTOR TO ESTABLISH DATABASE CONNECTION THROUGH DATABASE.PHP
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    /**
     * THIS METHOD IS TO MAKE USER ACCESS TO THEIR MESSAGES. USES TWO PARAMETERS TO IDENTIFY THE CORRECT MESSAGES
     * @param $userID
     * @param $reciever
     * @return array
     */
    public function seeMessage($userID, $reciever){
        $sql= "SELECT * FROM message WHERE (sender_id= '$reciever' AND reciever_id='$userID' ) OR ( sender_id= '$userID'AND reciever_id= '$reciever')"; //WE ARE GOING TO SELECT THE MESSAGES ONLY IF THE USER_ID IN PARAMETER
        //IS EQUALS TO THE USER_ID IN THE DATABASE
        //echo $sql;  //TO TEST THE SQL STATEMENT
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();                        //EXECUTE PDO STATEMENT
        $dataSet=[];                                  //CREATING A DATASET VARIABLE
        while($row = $statement->fetch()){            //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW

            $dataSet[] = $row["text"];           //GETTING THE TEXT ROW
            $dataSet[] = $row["sender_id"];      //GETTING THE SENDER ID ROW
            $dataSet[] = $row["image"];          //GETTING THE IMAGE ROW
        }
        return $dataSet;                              //RETURN THE DATASET
    }


    public function getNotification($id)//WE ARE GOING TO FETCH ALL THE POST TO SHOW WHAT IS IN THE DATABASE(last 50 results)
    {

        $statement2 = "SELECT * FROM message ORDER BY message_id DESC LIMIT 1;  "; //GETTING EVERYTHING FROM POST TABLE

        $statement = $this->_dbHandle->prepare($statement2); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement = $this->_dbHandle->prepare($statement2); // prepare a PDO statement
        $statement->execute();   // execute the PDO statement
        $dataSet = [];           //CREATING THE DATASET VARIABLE
        while ($row = $statement->fetch()) {  //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            if($row["reciever_id"]==$id) {
                $dataSet[] = $row["reciever_id"];           //GETTING THE TEXT ROW
                $dataSet[] =$row["sender_id"];
            }

        }
        return $dataSet;
    }









    /**
     * THIS METHOD IS TO SEND MESSAGES TO OTHER USER AND STORE OUR MESSAGE TO THE DATABASE
     * @param $userID
     * @param $userID2
     * @param $text
     * @param $image
     * @return array
     */
    public function sendMessage($userID, $userID2, $text, $image){
        $sql= "INSERT INTO message(sender_id, reciever_id, text, image) VALUES ('$userID','$userID2','$text','$image')";


        //CREATING A NEW MESSAGE AND INSERTING IT TO THE TABLE CALLED MESSAGE
        //echo $sql;         //TO TEST THE SQL STATEMENT
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();                        //EXECUTE PDO STATEMENT
        $dataSet=[];                                  //CREATING A DATASET VARIABLE
        if($row = $statement->fetch()){               //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[] = new Message($row);           //CREATING A NEW MESSAGE OBJECT AND PUTTING IT ON THE DATASET
        }
        return $dataSet;                              //RETURN THE DATASET
    }



}
