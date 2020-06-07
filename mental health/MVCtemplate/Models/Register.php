<?php
//THIS CLASS IS USED TO GET DETAILS OF THE USER ADD OR SIGN USER IN THE SYSTEM
require_once('Models/Database.php');

class Register
{
    protected $_dbHandle, $_dbInstance; //CREATING THE FIELDS

    public function __construct()      // CREATING THE CONSTRUCTOR
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    /**
     * THIS METHOD IS USED TO RETURN THE ID OF THE USER
     * @param $password
     * @param $name
     * @return mixed
     */
    public function getID($password, $name)
    {
        $sql = "SELECT user_id FROM user WHERE user_password ='$password' AND user_name='$name'";
        //SELECT THE USER-ID OF THE USER WHOSE NAME AND PASSWORD IS GIVEN
        //THIS WILL NOT CAUSE A PROBLEM BECAUSE ONLY ONE USER CAN HAVE THE SPECIFIC USERNAME
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();       //EXECUTE THE PDO STATEMENT
        //echo $sql;                 //TEST THE SQL STATEMENT
        $id = $statement->fetchColumn(); //GETTING THE COLUMN INTO THE $ID VARIABLE
        return $id;  //RETUNING THE VARIABLE
    }


    /**
     * GETTING THE EMAIL OF THE USER BY THEIR ID
     * @param $id
     * @return mixed
     */
    public function getUser($id){
        $sql = "SELECT user_email FROM user WHERE user_id= '$id'";
        //GETTING EMAIL OF THE USER IF GIVEN ID IS STORED IN THE DATABASE
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();//EXECUTING THE PDO STATEMENET
        //echo $sql;    //TESTING THE VARIABLE
        $user = $statement->fetchColumn();//GETTING THE COLUMN INTO THE $USER VARIABLE
        return $user;   //RETURNING THE VARIABLE
    }

    public function getUser2($name){
        $sql = "SELECT user_id FROM user WHERE user_name= '$name'";
        //GETTING EMAIL OF THE USER IF GIVEN ID IS STORED IN THE DATABASE
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();//EXECUTING THE PDO STATEMENET
        //echo $sql;    //TESTING THE VARIABLE
        $user = $statement->fetchColumn();//GETTING THE COLUMN INTO THE $USER VARIABLE
        return $user;   //RETURNING THE VARIABLE
    }

    /**
     * ADDS USER WITH A UNIQUE USER NAME TO THE SYSTEM
     * @param $name
     * @param $password
     * @param $email
     * @return false|PDOStatement|null
     */
    public function addUser($name, $password, $email)
    {
        $sql2 = "SELECT user_name FROM user WHERE user_name='$name'"; //SQL STATEMENT TO GET THE USERNAME
        $res = $this->_dbHandle->query($sql2);       //executing the the sql statement
        //echo $sql2;                                //testing the sql statement
        if ($res->rowCount() == 0) {                 //if the cont of the row is 0
            $sql = "INSERT INTO user (user_name, user_password, user_email)VALUES('$name','$password','$email')";
            //INSERT THE USER WITH DETAILS TO THE USER DATABASE
            //echo $sql;  //TESTING THE SQL STATEMENT
            $res2 = $this->_dbHandle->query($sql);//EXECUTING THE SQL STATEMENT
            if ($res2->rowCount() > 0) { //IF NOW THE ROW IS FOUND
                return $res;              //RETURN THE VARIABLE
            }}
           echo "Please Register First";
           return null;                   //USER IS NOT FOUND
    }


    /**
     * MAKE THE USER WHO ALREADY REGISTERED SIGN-IN
     * @param $password
     * @param $name
     * @return false|PDOStatement|null
     */
    public function sign($password, $name)
    {    $sql = "SELECT * FROM user WHERE user_password ='$password' AND user_name='$name'";
         //SQL STATEMENT TO GET THE USER DETAILS
            //echo $sql;
        $res = $this->_dbHandle->query($sql); //EXECUTING THE QUERY
        if ($res->rowCount() > 0) {           //IF THE ROW IS EXISTED
            return $res;                      //RETURN THE VARIABLE
        }
        else{
            return null;                      //IF THE USER IS NOT FOUND
        }
    }

    /**
     * GETTING THE HASHPASSWORD OF THE SPECIFIC USER
     * @param $name
     * @return mixed
     */
    public function getHashPassword( $name){
        $sql = "SELECT user_password FROM user WHERE user_name='$name'";
        // SELECTING THE PASSWORD OF THE USER WHO'S NAME IS EQUAL TO TO GIVEN PARAMETER
        $statement = $this->_dbHandle->prepare($sql);  // prepare PDO statement
        $statement->execute();                    //EXECUTING THE STATEMENT
        //echo $sql;                              //TEST THE SQL STATEMENT
        $pass = $statement->fetchColumn();        //GETTING THE COLUMN
        //echo $pass;                             //TESTING THE COLUMN
        return $pass;                             //RETURNING THE COLUMN
        }


}