<?php

class Rating
{
    var $rating_id;
    var $user_comm;
    var $user_rating;
    var $book_id;

    public function __construct($rating_id, $user_comm, $user_rating, $book_id = null)
    {
        $this->rating_id = $rating_id;
        $this->user_comm = $user_comm;
        $this->user_rating = $user_rating;
        $this->book_id = $book_id;
    }

    public function setRatingId($new_rating_id)
    {
        $this->rating_id = $new_rating_id;
    }

    function setUserComm($new_user_comm)
    {
        $this->user_comm = $new_user_comm;
    }

    function getUserComm()
    {
        return $this->user_comm;
    }

    function setUserRating($new_user_rating)
    {
        $this->user_rating = $new_user_rating;
    }

    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    function __toString()
    {
        return $this->rating_id . " " . $this->user_comm . " " . $this->user_rating . " " . $this->book_id . " ";
    }
}
