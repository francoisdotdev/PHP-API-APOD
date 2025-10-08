<?php

class Admin extends User
{
    public $role = "Admin";

    public function showRole()
    {
        return $this->role;
    }
}

$admin = new Admin("maxAdmin", "max-admin@gmail.com");
echo $admin->showName();//heritage de la classe utilisateur
echo $admin->showRole();//specifique à la classe admin

?>