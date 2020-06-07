<?php
//THIS CLASS USED FOR GETTING THE DETAILS OF THE COMMENT STORED IN THE DATABASE TABLE CALLED COMMENT

class Comment
{
    protected $_cID, $_pID, $_uID, $_text;  //CREATING THE FIELDS COMMENTID , POSTID , USERID , TEXT


    public function __construct($dbRow) {     //CREATING THE CONSTRUCTOR
        $this->_commentID = $dbRow['comment_id'];   //GETTING THE COMMENT_ID FROM THE COMMENT TABLE AND PUT IT INTO CID FIELD
        $this->_postID = $dbRow['post_id'];      //GETTING THE POST_ID FROM THE COMMENT TABLE AND PUT IT INTO pID FIELD
        $this->_userID = $dbRow['user_id'];
        $this->_text = $dbRow['comment_text'];

    }

    /**
     * Returns the variable commentID
     *
     */
    public function getCommentID()
    {
        return $this->_commentID;
    }

    /**
     * Returns the variable getPostID
     */
    public function getPostID()
    {
        $this->_pID -> _postID;
    }

    /**
     * returns the variable getUserID
     */
    public function getUserID()
    {
        return $this->_userID;
    }

    /**
     * returns the variable getText
     */
    public function getText()
    {
        return $this->_text;
    }

}
