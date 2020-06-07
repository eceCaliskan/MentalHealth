<?php
//THIS CLASS IS USED TO GET DETAILS FROM THE TABLE CALLED WATCH_LIST FROM THE DATABASE

class WatchListPosts
{
    protected $_watchListID, $_post_id, $_user_id; //CREATING THE FIELDS


    public function __construct($dbRow) {      //CREATING THE CONSTRUCTOR
        $this->_watchListID = $dbRow['watch_list_id']; //GETTING WATCH_LIST_ID FROM THE TABLE AND PUT IT INTO A VARIABLE
        $this->_post_id = $dbRow['post_id'];//GETTING POST-ID FROM THE TABLE AND PUT IT INTO A VARIABLE
        $this->_user_id = $dbRow['user_id'];//GETTING THE USER-ID FROM THE TABLE AND PUT IT INTO A VARIABLE

    }

    /**
     * RETURNS THE WATCHLISTID
     * @return mixed
     */
    public function getWatchListID()
    {
        return $this->_watchListID;
    }

    /**
     * RETURNS THE POSTID
     * @return mixed
     */
    public function getPostId()
    {
        return $this->_post_id;
    }

    /**
     * RETURNS THE USERID
     * @return mixed
     */
    public function getUserId()
    {
        return $this->_user_id;
    }
}