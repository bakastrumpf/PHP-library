<?php

class Borrowed
{
    var $user_id;
    var $book_id;
    var $date_taken;
    var $date_ret;
    var $fine;


    public function __construct($user_id, $book_id, $date_taken, $date_ret, $fine = null)
    {
        $this->user_id = $user_id;
        $this->book_id = $book_id;
        $this->date_taken = $date_taken;
        $this->date_ret = $date_ret;
        $this->fine = $fine;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    function setDateTaken($new_date_taken)
    {
        $this->date_taken = $new_date_taken;
    }

    function getDateTaken()
    {
        return $this->date_taken;
    }

    function setDateRet($new_date_ret)
    {
        $this->date_ret = $new_date_ret;
    }

    function getDateRet()
    {
        return $this->date_ret;
    }

    function setFine($new_fine)
    {
        $this->fine = $new_fine;
    }

    function getFine()
    {
        return $this->fine;
    }

    function __toString()
    {
        return $this->user_id . " " . $this->book_id . " " . $this->date_taken . " " . $this->date_ret . " " . $this->fine . " ";
    }
}
