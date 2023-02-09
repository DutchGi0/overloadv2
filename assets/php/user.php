<?php

class user
{
    public $username;
    private $password;
    public $role;

    public function set_username($username)
    {
        $this->username = $username;
    }

    public function set_password($password)
    {
        $this->password = $password;
    }

    public function set_role($role)
    {
        $this->role = $role;
    }

    public function get_username()
    {
        return $this->user;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function get_role()
    {
        return $this->role;
    }
}