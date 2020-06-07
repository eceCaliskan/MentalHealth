<?php
//THIS CLASS IS TO GET THE DETAILS OF POSTS STORED IN THE POST TABLE IN THE DATABASE
class Post implements JsonSerializable
{
    protected $_postId, $_postSubject, $_postText, $_postReplies, $_postImage, $_postUser;
    //CREATING THE FIELDS


    public function __construct($dbRow) { //CREATING THE CONSTRUCTOR
        $this->_postId = $dbRow['post_id'];   //GETTING THE POST-ID FROM DATABASE AND STORE IT TO A FIELD
        $this->_postSubject = $dbRow['post_subject']; //GETTING THE POST_SUBJECT FROM DATABASE AND STORE IT TO A FIELD
        $this->_postText = $dbRow['post_text']; //GETTING THE POST_TEXT FROM DATABASE AND STORE IT TO A FIELD
        $this->_postReplies = $dbRow['post_replies'];//GETTING THE POST REPLIES FROM THE DATABASE AND STORE IT TO A FIELD
        $this->_postImage= $dbRow['post_image'];//GETTING THE POST_IMAGE FROM THE DATABASE AND STORE IT TO A FIELD
        $this->_postUser= $dbRow['user_id'];//GETTING THE USER_ID FROM THE DATABASE AND STORE IT TO A FIELD

    }

    /**
     * THIS METHOD RETURNS THE POST ID
     * @return mixed
     */
    public function getPostId()
    {
        return $this->_postId;
    }

    /**
     * THIS METHOD RETURNS THE POST SUBJECT
     * @return mixed
     */
    public function getPostSubject()
    {
        return $this->_postSubject;
    }

    /**
     * THIS METHOD RETURNS THE POST TEXT
     * @return mixed
     */
    public function getPostText()
    {
        return $this->_postText;
    }

    /**
     * THIS METHOD RETURNS THE POST IMAGE
     * @return mixed
     */
    public function getPostImage()
    {
        return $this->_postImage;
    }

    /**
     * THIS METHOD RETURNS THE REPLIES OF THE POST
     * @return mixed
     */
    public function getPostReplies()
    {
        return $this->_postReplies;
    }

    /**
     * THIS METHOD RETURNS THE USER OF THE POST
     * @return mixed
     */
    public function getPostUser()
    {
        return $this->_postUser;
    }

    //CONVERTS THE POST VARIABLES INTO JSON VARIABLES
    public function jsonSerialize()
    {
        return [
            'post_id' => $this->getPostId(),
            'post_subject' => $this-> getPostSubject(),
            'post_text' => $this-> getPostText(),
            'post_replies' => $this-> getPostReplies(),
            'post_image' => $this->getPostImage()


        ];
    }
}