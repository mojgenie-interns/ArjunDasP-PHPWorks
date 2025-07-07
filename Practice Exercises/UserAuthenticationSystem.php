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
        $this->username = readline("\nEnter the username: ");
        foreach ($this->data as $user)
            if ($this->username === $user['username']) {
                echo $this->username . " already exists!";
                exit;
            }
        $this->password = readline("Enter the password: ");
        $this->data[] = ['username' => $this->username, 'password' => $this->password];
        echo "Registered successfully.\n";
        $this->save();
    }

    function displayUsers()
    {
        echo "\n--- Users ---\n";
        foreach ($this->data as $user)
            echo $user['username'] . "\n";
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

    function menu()
    {
        while (true) {
            echo "\n=== USER AUTHENTICATION SYSTEM ===\n";
            $choice = readline("1. Login\n2. Register user\n3. View users\n4. Exit\nEnter the option: ");
            if ($choice == 1)
                $this->login();
            elseif ($choice == 2)
                $this->register();
            elseif ($choice == 3)
                $this->displayUsers();
            elseif ($choice == 4)
                break;
            else
                echo "Invalid option! Try again.";
        }
    }
}

$user1 = new UserAuthenticationSystem();
// $user1->register();
$user1->menu();
