<?php

class LoginSystem
{

    protected $file = 'user-authentication-system.json';
    protected $data = [];
    public $username;
    private $password;

    public function __construct()
    {
        if (file_exists($this->file))
            $this->data = json_decode(file_get_contents($this->file), true);
    }

    function login()
    {
        $this->username = readline("\nEnter the username: ");
        $this->password = readline("Enter the password: ");
        foreach ($this->data as $user)
            if ($this->username == $user['username'] && $this->password == $user['password']) {
                echo "\nLogged in successfully.\n";
                return;
            }
        echo "\nLogin failed!\n";
    }
}

$user = new LoginSystem();
$user->login();
