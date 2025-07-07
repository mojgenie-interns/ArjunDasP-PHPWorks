<?php

class UserAuthenticationSystem
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

    function save()
    {
        file_put_contents($this->file, json_encode($this->data, JSON_PRETTY_PRINT));
    }

    function register()
    {
        $this->username = readline("Enter the username: ");
        if (!in_array($this->username, $this->data['username'])) {
            $this->password = readline("Enter the password: ");
            $this->data[] = ['username' => $this->username, 'password' => $this->password];
            echo "Saved successfully";
            $this->save();
        } else {
            echo $this->username . " already exists";
            exit;
        }
    }
}

$user1 = new UserAuthenticationSystem();
$user1->register();
