<?php

class User
{
    var $id;
    var $name;
    var $surname;
    var $email;
    var $password;
    var $street;
    var $city;
    var $phone;
    var $role;
    var $isActive;
    var $membPaid;

    public function __construct($id, $name, $surname, $email, $password, $street, $city, $phone, $role, $isActive, $membPaid = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->street = $street;
        $this->city = $city;
        $this->phone = $phone;
        $this->role = $role;
        $this->isActive = $isActive;
        $this->membPaid = $membPaid;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    function setName($new_name)
    {
        $this->name = $new_name;
    }

    function getName()
    {
        return $this->name;
    }

    function setSurname($new_surname)
    {
        $this->surname = $new_surname;
    }

    function getSurname()
    {
        return $this->surname;
    }

    function setEmail($new_email)
    {
        $this->email = $new_email;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setPassword($new_password)
    {
        $this->password = $new_password;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setStreet($new_street)
    {
        $this->street = $new_street;
    }

    function getStreet()
    {
        return $this->street;
    }

    function setCity($new_city)
    {
        $this->city = $new_city;
    }

    function getCity()
    {
        return $this->city;
    }

    function setPhone($new_phone)
    {
        $this->phone = $new_phone;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function setRole($new_role)
    {
        $this->role = $new_role;
    }

    function getRole()
    {
        return $this->role;
    }

    function setIsActive($new_isActive)
    {
        $this->role = $new_isActive;
    }

    function getIsActive()
    {
        return $this->isActive;
    }

    function setMembPaid($new_membPaid)
    {
        $this->role = $new_membPaid;
    }

    function getMembPaid()
    {
        return $this->isActive;
    }

    function __toString()
    {
        return $this->id . " " . $this->name . " " . $this->surname . " " . $this->email . " " . $this->street . " " . $this->city . " " . $this->phone . " " . $this->role . " " . $this->isActive . " " . $this->membPaid . " ";
    }
}
