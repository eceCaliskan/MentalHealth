
<?php
//THIS CLASS IS USED TO SEND THE COMMENTS, SEE THE COMMENTS WITH THE SPECIFIC POST
require_once ('Models/Comment.php');
require_once('Database.php');
require_once ('Post.php');
class CommentSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() //TO CREATE THE CONNECTION USING DATABASE CLASS
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }


    /**
     * THIS CLASS IS USED TO PRINT BOTH THE SPECIFIC POST AND COMMENTS OF THAT POST
     * @param $postID
     * @return array
     */
    public function seeComments($postID)
    {
        $sql = "SELECT * FROM post, comment WHERE post.post_id=comment.post_id AND post.post_id=$postID";
        //SQL STATEMENT TO SELECT EVERYTHING FROM POST AND COMMENT TABLES IF THERE POST_ID IS THE SAME AS THE GIVEN ONE
        //echo $sql;     //CHECKING THE SQL STATEMENT
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();                        //EXECUTING THE PDO STATEMENT
        $dataSet = [];                                //CREATING THE DATASET TO STORE THE COMMENT OBJECTS
        while ($row = $statement->fetch()) {          //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[]= new Comment($row);            //PUTTING THE NEW COMMENT OBJECT INTO DATASET[]
        }
        return $dataSet;                              //RETURNING THE DATASET
    }


    /**
     * THIS CLASS USED TO STORE COMMENTS TO THE DATABASE
     * @param $_pID
     * @param $_uID
     * @param $_text
     * @return mixed
     */
    public function sendComment($_pID, $_uID, $_text){
        $sql = "INSERT INTO comment (post_id, user_id, comment_text )VALUES($_pID, $_uID, '$_text')";
        //SQL STATEMENT TO INSERT EVERYTHING FROM COMMENT TABLE WITH THE VALUES GETTING FROM THE PARAMETERS
        $statement = $this->_dbHandle->prepare($sql); // prepare PDO statement
        $statement->execute();                        //EXECUTING THE PDO STATEMENT
        $dataSet = [];                                //CREATING THE DATASET TO STORE THE COMMENT OBJECTS
        while ($row = $statement->fetch()) {          //TO FETCH THE STATEMENT INTO THE VARIABLE CALLED $ROW
            $dataSet[]= new Comment($row);              //PUTTING THE NEW POST2 OBJECT INTO DATASET[]
        }
        return $dataSet;                              //RETURNING THE DATASET
    }
}