<?php
//THIS CLASS IS USED TO ADD POSTS TO THE WATCHLIST, RETURN THE RESULTS IN THE WATCHLIST AND REMOVE THE POSTS
require_once('Database.php');
require_once ("PostSet.php");
require_once ('WatchListPosts.php');

class WatchList
{
    protected $_dbHandle, $_dbInstance;//CREATING THE FIELDS

    public function __construct() //CREATING THE CONSTRUCTION TO CONNECT WITH THE DATABASE
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    /**
     * ADDING THE POST INTO USER'S WATCH LIST
     * @param $postID
     * @param $user_id
     * @return array
     */
    public function addWatchList($postID, $user_id){
        $sql= "INSERT INTO watch_list( post_id, user_id) VALUES ('$postID','$user_id')";
        //INSERTING THE THE ELEMENTS INTO WATCHLIST
        //echo $sql; //TESTING THE SQL STATEMENT
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();                        //EXECUTING THE PDO STATEMENET
        if($row = $statement->fetch()){               //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW

            $dataSet[] = new WatchListPosts($row);    //CREATING A NEW WATCHLISTPOST OBJECT
            return $dataSet;                          //RETURNING THE DATASET VARIABLE
        }
    }

    /**
     * THIS METHOD IS TO GET THE USERS WATCHLIST
     * @param $user_id
     * @return array
     */
    public function getWatchList($user_id)
    {
        $sql = "SELECT * FROM watch_list WHERE user_id= ' $user_id '";
        //SELECT EVERYTHING FROM WATCH_LIST TABLE THAT BELONGS TO THE GIVEN USERID
        //echo $sql;  //TESTING THE STATEMENT
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();   //EXECUTE PDO STATEMENT
        $dataSet =[];     //CREATING THE DATASET VARIABLE
        while ($row = $statement->fetch()) { //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[] = new WatchListPosts($row); //CREATING A NEW WATCHLISTPOST OBJECT
        }
            return $dataSet; //RETURNING THE DATASET

        }

    /**
     * REMOVING A POST FROM THE WATCHLIST
     * @param $postID
     * @param $userID
     * @return array
     */
    public function removeFromWatchList($postID, $userID){
        $sql = "DELETE  FROM watch_list WHERE user_id='$userID' AND post_id='$postID'";
        //DELETE THE DETAILS GIVEN WATCHLISTPOST FROM THE WATCH_LIST TABLE
        //echo $sql;
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute(); //executing the PDO STATEMENT
        $dataSet =[];   //CREATING THE DATABASE VARIABLE
        while ($row = $statement->fetch()) {//TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[] = new WatchListPosts($row);//CREATING A NEW WATCHLISTPOST OBJECT
        }
        return $dataSet; //RETURNING THE DATASET

    }
}