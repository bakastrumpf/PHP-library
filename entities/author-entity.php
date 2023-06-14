<?php

class Author
{
    var $author_id;
    var $author_name;
    var $author_surname;

    public function __construct($author_id, $author_name, $author_surname = null)
    {
        $this->author_id = $author_id;
        $this->author_name = $author_name;
        $this->author_surname = $author_surname;
    }

    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }

    function setAuthorName($new_author_name)
    {
        $this->author_name = $new_author_name;
    }

    function getAuthorName()
    {
        return $this->author_name;
    }

    function setAuthorSurname($new_author_surname)
    {
        $this->author_surname = $new_author_surname;
    }

    function getAuthorSurname()
    {
        return $this->author_surname;
    }

    function __toString()
    {
        return $this->author_id . " " . $this->author_name . " " . $this->author_surname . " ";
    }
}
