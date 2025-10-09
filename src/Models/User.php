<?php
namespace App\Models;
use DateTime;

class User
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $media_object;
    private $created_at;
    private $last_connection;

    public function __construct(string $username, string $email, string $password, ?string $media_object = null)
    {
        $timeNow = new DateTime();
        $formateDate = $timeNow->format('l, F j, Y H:i:s');

        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->media_object = $media_object;
        $this->created_at = $formateDate;
        $this->last_connection = $formateDate;
    }


    public function setUsername(string $username)
    {
        $this->username = $username;
    }
    public function getUsername()
    {
        return $this->username;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }


    public function setPassword(string $password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }


    public function setMedia($media_object)
    {
        $this->media_object = $media_object;
    }
    public function getMedia()
    {
        return $this->media_object;
    }


    public function setCreatedAt(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }


    public function setLastConnection(DateTime $last_connection)
    {
        $this->last_connection = $last_connection;
    }
    public function getLastConnection()
    {
        return $this->last_connection;
    }


    public function getUsernameAndEmail()
    {
        return $this->getUsername() . ' ' . $this->getEmail();
    }
}