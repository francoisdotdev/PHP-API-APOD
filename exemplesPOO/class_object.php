<?php

//! voici un exemple de classe et la manipulation d'un objet

class User
{
    public $name;
    public $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function showName()
    {
        return $this->name;
    }
}


//instanciation d'un objet
$utilisateur1 = new User("max", "max@gmail.com");
echo $utilisateur1->showName(); // affiche "max

?>