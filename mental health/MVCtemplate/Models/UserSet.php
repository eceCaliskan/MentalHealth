<?php
require_once('Models/Database.php');
require_once('Models/User.php');

class UserSet
{
    protected $_dbHandle, $_dbInstance; //SETTING THE FIELDS

    public function __construct()       //CREATING A CONSTRUCTOR TO CONNECT TO THE DATABASE USING DATABASE CLASS
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    //RETURNS ALL THE USERS IN THE DATABASE
    public function seeUsers()
    {
         $sql = "SELECT * FROM user";//SQL STATEMENT TO RETURN USERS
         $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
         $statement->execute();                        //EXECUTING THE PDO STATEMENT
         $dataSet =[];                                //CREATING THE DATASET TO STORE THE USER OBJECTS
         while ($row = $statement->fetch()) {          //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[]= $row["user_name"] ;             //STORES THE USER NAMES INTO THE ARRAY
         }
        return $dataSet; //RETURNS NAME OF THE USERS

    }

    public function seeUsers2()
    {
        $sql = "SELECT user_password FROM user";

        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();                        //EXECUTING THE PDO STATEMENT
        $dataSet = [];                                //CREATING THE DATASET TO STORE THE USER OBJECTS
        while ($row = $statement->fetch()) {          //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[]= new User($row);               //PUTTING THE NEW USER OBJECT INTO DATASET[]
        }
        return $dataSet;                              //RETURNING THE DATASET
    }
}



