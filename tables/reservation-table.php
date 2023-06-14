<?php

class Reservation
{
    var $reservation_id;
    var $res_is_booked;
    var $res_validity;
    var $user_id;
    var $book_id;

    public function __construct($reservation_id, $res_is_booked, $res_validity, $user_id, $book_id = null)
    {
        $this->reservation_id = $reservation_id;
        $this->res_is_booked = $res_is_booked;
        $this->res_validity = $res_validity;
        $this->user_id;
        $this->book_id = $book_id;
    }

    public function setReservationId($new_reservation_id)
    {
        $this->reservation_id = $new_reservation_id;
    }

    function setResIsBooked($new_res_is_booked)
    {
        $this->res_is_booked = $new_res_is_booked;
    }

    function getResIsBooked()
    {
        return $this->res_is_booked;
    }

    function setResValidity($new_res_validity)
    {
        $this->res_validity = $new_res_validity;
    }

    function getResValidity()
    {
        return $this->res_validity;
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
        return $this->reservation_id . " " . $this->res_is_booked . " " . $this->res_validity . " " . $this->user_id . " " . $this->book_id . " ";
    }
}
