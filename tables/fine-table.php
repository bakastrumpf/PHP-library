<?php

class Fine
{
    var $fine_id;
    var $fine_per_day;
    var $fine_keep_days;
    var $fine_max_books;
    var $user_id;
    var $book_id;

    public function __construct($fine_id, $fine_per_day, $fine_keep_days, $fine_max_books, $user_id, $book_id = null)
    {
        $this->fine_id = $fine_id;
        $this->fine_per_day = $fine_per_day;
        $this->fine_keep_days = $fine_keep_days;
        $this->fine_max_books = $fine_max_books;
        $this->user_id = $user_id;
        $this->book_id = $book_id;
    }

    public function setFineId($fine_id)
    {
        $this->fine_id = $fine_id;
    }

    function setFinePerDay($new_fine_per_day)
    {
        $this->fine_per_day = $new_fine_per_day;
    }

    function getFinePerDay()
    {
        return $this->fine_per_day;
    }

    function setFineKeepDays($new_fine_keep_days)
    {
        $this->fine_keep_days = $new_fine_keep_days;
    }

    function getFineKeepDays()
    {
        return $this->fine_keep_days;
    }

    function setMaxBooks($new_max_books)
    {
        $this->fine_max_books = $new_max_books;
    }

    function getMaxBooks()
    {
        return $this->fine_max_books;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    function __toString()
    {
        return $this->fine_id . " " . $this->fine_per_day . " " . $this->fine_max_books . " " . $this->user_id . " " . $this->book_id . " ";
    }
}
