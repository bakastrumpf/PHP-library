<?php

class Written
{
    var $book_id;
    var $author_id;

    public function __construct($book_id, $author_id = null)
    {
        $this->book_id = $book_id;
        $this->author_id = $author_id;
    }

    function setBookId($new_book_id)
    {
        $this->book_id = $new_book_id;
    }

    function getBookId()
    {
        return $this->book_id;
    }

    function setAuthorId($new_author_id)
    {
        $this->author_id = $new_author_id;
    }

    function getAuthorId()
    {
        return $this->author_id;
    }

    function __toString()
    {
        return $this->book_id . " " . $this->author_id . " ";
    }
}
