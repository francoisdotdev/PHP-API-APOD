<?php

class User
{
    private $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function changePassword($newPassword)
    {
        $this->password = $newPassword;
    }

    public function showPassword()
    {
        return $this->password;
    }
}