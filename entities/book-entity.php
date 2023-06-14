<?php

class User
{
    var $id;
    var $title;
    var $year;
    var $publisher;
    var $nrPages;
    var $isbn;
    var $descr;
    var $img;
    var $genre;
    var $isToBorrow;
    var $nrCopies;
    var $isAvailable;

    public function __construct($id, $title, $year, $publisher, $nrPages, $isbn, $descr, $img, $genre, $isToBorrow, $nrCopies, $isAvailable = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
        $this->publisher = $publisher;
        $this->nrPages = $nrPages;
        $this->isbn = $isbn;
        $this->descr = $descr;
        $this->img = $img;
        $this->genre = $genre;
        $this->isToBorrow = $isToBorrow;
        $this->nrCopies = $nrCopies;
        $this->isAvailable = $isAvailable;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    function setTitle($new_title)
    {
        $this->title = $new_title;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setYear($new_year)
    {
        $this->year = $new_year;
    }

    function getYear()
    {
        return $this->year;
    }

    function setPublisher($new_publisher)
    {
        $this->publisher = $new_publisher;
    }

    function getPublisher()
    {
        return $this->publisher;
    }

    function setNrPages($new_nrPages)
    {
        $this->nrPages = $new_nrPages;
    }

    function getNrPages()
    {
        return $this->nrPages;
    }

    function setIsbn($new_isbn)
    {
        $this->isbn = $new_isbn;
    }

    function getIsbn()
    {
        return $this->isbn;
    }

    function setImg($new_img)
    {
        $this->img = $new_img;
    }

    function getImg()
    {
        return $this->img;
    }

    function setGenre($new_genre)
    {
        $this->genre = $new_genre;
    }

    function getGenre()
    {
        return $this->genre;
    }

    function setIsToBorrow($new_isToBorrow)
    {
        $this->isToBorrow = $new_isToBorrow;
    }

    function getIsToBorrow()
    {
        return $this->isToBorrow;
    }

    function setNrCopies($new_nrCopies)
    {
        $this->nrCopies = $new_nrCopies;
    }

    function getNrCopies()
    {
        return $this->nrCopies;
    }

    function setIsAvailable($new_isAvailable)
    {
        $this->isAvailable = $new_isAvailable;
    }

    function getIsAvailable()
    {
        return $this->isAvailable;
    }

    function __toString()
    {
        return $this->id . " " . $this->title . " " . $this->year . " " . $this->publisher . " " . $this->nrPages . " " . $this->isbn . " " . $this->descr . " " . $this->img . " " . $this->genre . " " . $this->isToBorrow . " " . $this->nrCopies . " " . $this->isAvailable;
    }
}
