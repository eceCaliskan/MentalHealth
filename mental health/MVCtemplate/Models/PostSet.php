<?php
//THIS CLASS IS USED TO SELECT SPECIFIC POSTS, SHOW ALL THE POSTS AND ADD THE POST TO THE DATABASE TABLE
require_once('Models/Database.php');
require_once('Models/Post.php');

class PostSet
{
    protected $_dbHandle, $_dbInstance; //SETTING THE FIELDS

    public function __construct()       //CREATING A CONSTRUCTOR TO CONNECT TO THE DATABASE USING DATABASE CLASS
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }


    /**
     * THIS METHOD IS USED TO DISPLAY POSTS WHILE USING PAGING
     * @param $start
     * @return array
     */
    public function fetchAllPost()//WE ARE GOING TO FETCH ALL THE POST TO SHOW WHAT IS IN THE DATABASE(last 50 results)
    {

        $statement2 = 'SELECT * FROM post ORDER BY post.post_id DESC LIMIT 50 '; //GETTING EVERYTHING FROM POST TABLE
        $statement = $this->_dbHandle->prepare($statement2); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement = $this->_dbHandle->prepare($statement2); // prepare a PDO statement
        $statement->execute();   // execute the PDO statement
        $dataSet = [];           //CREATING THE DATASET VARIABLE
        while ($row = $statement->fetch()) {  //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[] = $row["post_id"];     //PUTS THE POST-ID INTO THE DATASET ARRAY
            $dataSet[] = $row["post_subject"];//PUTS THE POST-SUBJECT INTO THE DATASET ARRAY
            $dataSet[] = $row["post_text"];//PUTS THE POST-TEXT INTO THE DATASET ARRAY
            $dataSet[] = $row["post_replies"];//PUTS THE POST-REPLIES INTO THE DATASET ARRAY
            $dataSet[] = $row["post_image"];//PUTS THE POST-IMAGE INTO THE DATASET ARRAY
        }
        return $dataSet;
    }

    /**
     * THIS METHOD IS USED TO DISPLAY POSTS without image
     * @param $start
     * @return array
     */
    public function fetchAllPost2()//WE ARE GOING TO FETCH ALL THE POST TO SHOW WHAT IS IN THE DATABASE(last 50 results)
    {

        $statement2 = 'SELECT * FROM post ORDER BY post.post_id DESC LIMIT 50'; //GETTING EVERYTHING FROM POST TABLE
        $statement = $this->_dbHandle->prepare($statement2); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $statement = $this->_dbHandle->prepare($statement2); // prepare a PDO statement
        $statement->execute();   // execute the PDO statement
        $dataSet = [];           //CREATING THE DATASET VARIABLE
        while ($row = $statement->fetch()) {  //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[] = $row["post_id"];     //PUTS THE POST-ID INTO THE DATASET ARRAY
            $dataSet[] = $row["post_subject"];//PUTS THE POST-SUBJECT INTO THE DATASET ARRAY
            $dataSet[] = $row["post_text"];//PUTS THE POST-TEXT INTO THE DATASET ARRAY
            $dataSet[] = $row["post_replies"];//PUTS THE POST-REPLIES INTO THE DATASET ARRAY

        }
        return $dataSet;
    }

    /**
     * THIS METHOD IS USED TO SEARCH FOR A SPECIFIC KEYWORD OR A USER ID IN POST. RETURNS ALL THE INFORMATION ABOUT POST
     * @param $query
     * @return array
     */
    public function search($query)

    {
        $sql = "SELECT * FROM post WHERE post_subject = '$query'";
        //SQL STATEMENT TO GET POSTS WHICH HAS THE SPECIFIC KEYWORD OR SPECIFIC NUMBER
        //echo $sql; //TESTING THE SQL STATEMENET
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();                        //EXECUTE PDO STATEMENT
        $dataSet = [];             //CRREATING A DATASET VARIABLE
        while ($row = $statement->fetch()) {       //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[] = $row["post_id"];          //PUTS THE POST-ID INTO THE DATASET ARRAY
            $dataSet[] = $row["post_subject"];     //PUTS THE POST-SUBJECT INTO THE DATASET ARRAY
            $dataSet[] = $row["post_text"];        //PUTS THE POST-TEXT INTO THE DATASET ARRAY
            $dataSet[] = $row["post_replies"];     //PUTS THE POST-REPLIES INTO THE DATASET ARRAY
            $dataSet[] = $row["post_image"];       //PUTS THE POST-IMAGE INTO THE DATASET ARRAY
        }
     return $dataSet;             //RETURNING THE DATASET
    }

    /**
     * THIS METHOD IS USED TO SEARCH FOR A SPECIFIC KEYWORD OR A USER ID IN POST. RETURNS ALL THE INFORMATION ABOUT POST
     * @param $query
     * @return array
     */
    public function search3($query)

    {
        $sql = "SELECT * FROM post WHERE post_subject = '$query'";
        //SQL STATEMENT TO GET POSTS WHICH HAS THE SPECIFIC KEYWORD OR SPECIFIC NUMBER
        //echo $sql; //TESTING THE SQL STATEMENET
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();                        //EXECUTE PDO STATEMENT
        $dataSet = [];             //CRREATING A DATASET VARIABLE
        while ($row = $statement->fetch()) {       //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[] = $row["post_id"];          //PUTS THE POST-ID INTO THE DATASET ARRAY
            $dataSet[] = $row["post_subject"];     //PUTS THE POST-SUBJECT INTO THE DATASET ARRAY
            $dataSet[] = $row["post_text"];        //PUTS THE POST-TEXT INTO THE DATASET ARRAY
            $dataSet[] = $row["post_replies"];     //PUTS THE POST-REPLIES INTO THE DATASET ARRAY

        }
        return $dataSet;             //RETURNING THE DATASET
    }

    /**
     * Search specific post using post-subject and a parameter. Returns post-subject
     * @param $query
     * @return array
     */
    public function search2($query)
    {
        $sql = "SELECT * FROM post WHERE post_subject LIKE '$query%' ";
        //SQL STATEMENT TO GET POSTS WHICH HAS THE SPECIFIC KEYWORD OR SPECIFIC NUMBER
        //echo $sql; //TESTING THE SQL STATEMENET
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();                        //EXECUTE PDO STATEMENT
        $dataSet = [];             //CRREATING A DATASET VARIABLE
        while ($row = $statement->fetch()) {       //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
             $dataSet[] = $row["post_subject"];    //PUTS THE POST-SUBJECT INTO THE DATASET ARRAY
        }
        return $dataSet;             //RETURNING THE DATASET
    }

    /**
     * THIS METHOD IS USED TO GET THE SPECIFIC POST USING POST-ID
     * @param $post_id
     * @return array
     */
    public function getPost($post_id)
    {
        $sqlQuery = 'SELECT * FROM post WHERE post_id = '.$post_id.'.';
        //SELECT EVERYTHING FROM POST IF THE POST-ID IS AS THE SAME AS THE GIVEN PARAMETER
        //echo $sqlQuery; //TO TEST THE QUERY
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute();       // execute the PDO statement
        $dataSet = [];             //CRREATING A DATASET VARIABLE
        while ($row = $statement->fetch()) {       //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[]= new Post($row);        //CREATING A NEW POST AND PUT IT INTO THE DATASET
        }
        return $dataSet;             //RETURNING THE DATASET
    }


    /**
     * THIS METHOD IS TO CREATE A NEW POST AND PUT IT INTO THE DATABASE
     * @param $subject
     * @param $text
     * @param $id
     * @param $image
     * @return string
     */
    public function post($subject, $text, $id,  $image)
    {
        $m = "INSERT INTO post (post_subject, post_text,user_id,post_image)VALUES('$subject','$text','$id','$image')";
        $statement = $this->_dbHandle->prepare($m); // prepare PDO statement
        $statement->execute();                      //EXECUTE PDO STATEMENT
        //echo $m;                                  //TEST THE SQL STATEMENT
        //return $m;
    }
}