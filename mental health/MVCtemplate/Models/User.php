<?php
// THIS CLASS IS USED TO GET THE DETAILS OF THE USER FROM USER TABLE IN THE DATABASE

 class User implements JsonSerializable {

    protected $_id, $_name, $_password, $_email;  //CREATING THE FIELDS USERID, USERNAME, USERPASSWORD, USSEREMAIL


    public function __construct($dbRow) {            //CREATING THE CONSTRUCTOR
        $this->_id = $dbRow['user_id'];           //GETTING USER_ID FROM USER TABLE AND PUT IT INTO THE VARIABLE
        $this->_name = $dbRow['user_name'];       //GETTING USER_NAME FROM USER TABLE AND PUT IT INTO THE VARIABLE
        $this->_password = $dbRow['user_password'];   //GETTING USER_PASSWORD FROM USER TABLE AND PUT IT INTO THE VARIABLE
        $this->_email = $dbRow['user_email'];     //GETTING USER_EMAIL FROM USER TABLE AND PUT IT INTO THE VARIABLE

    }

    /**
     * RETURNS THE NAME OF THE USER
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * RETURNS THE ID OF THE USER
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * RETURNS THE PASSWORD OF THE USER
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * RETURNS THE E-MAIL ADDRESS OF THE USER
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    //CONVERTS THE RESULTS INTO JSON VARIABLES
     public function jsonSerialize()
     {
    return [

        'username' => $this-> getName(),
        'userid' => $this-> getId(),
        'userpassword' => $this->getPassword(),
        'useremail' => $this-> getEmail(),

    ];
     }
 }