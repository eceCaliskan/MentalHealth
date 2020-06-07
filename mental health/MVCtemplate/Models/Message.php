<?php
//THIS CLASS USED FOR GETTING THE DETAILS OF THE MESSAGE STORED IN THE DATABASE TABLE CALLED MESSAGE

class Message implements JsonSerializable
{
    protected $_id, $_sender, $_reciever, $_text, $_image; //CREATING FIELDS TO STORE MESSAGEID, SENDERID , RECIVERID, TEXT


    public function __construct($dbRow) {   //creating the constructor
        $this->_id = $dbRow['message_id'];  //getting message id from database and putting it on a variable
        $this->_sender = $dbRow['sender_id']; //getting  sender id from databse and putting it on a variable
        $this->_reciever = $dbRow['reciever_id']; //getting the reciever id from database and putting it on a variable
        $this->_text = $dbRow['text']; //getting text from the database and putting it on a variable
        $this->_image = $dbRow['image'];
    }

    /**
     * TO GET ID OF THE MESSAGE
     * @return mixed
     */
    public function getMessageID()
{
    return $this->_id;
}

    /**
     * TO GET THE ID OF THE SENDER OF THE MESSAGE
     * @return mixed
     */
    public function getSender()
    {
        return $this->_sender;
    }

    /**
     * TO  GET THE ID OF THE RECIEVER OF MESSAGE
     * @return mixed
     */
    public function getReciever()
    {
        return $this->_reciever;
    }

    /**
     * TO GET THE MAIN TEXT
     * @return mixed
     */
    public function getText()
    {
        return $this->_text;
    }

    public function getImage()
    {
        return $this->_image;
    }

    /**
     * This method is used to convert variables into json and use them in the array
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return [
            'user' => $this->getMessageID(),
            'sender' => $this-> getSender(),
            'reciever' => $this-> getReciever(),
            'text' => $this-> getText(),
            'image' => $this->getImage()


        ];
    }
}