<?php

class PasswordGenerator
{
    private $length;

    public function __construct()
    {
        $length = readline("Enter the length of the password: ");
        $this->length = ($length < 9) ? 9 : $length;
    }

    public function generatePassword()
    {
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers   = '0123456789';
        $specials  = '!@#$%^&*()-_=+[]{};:,.<>?';

        $password = [
            $lowercase[random_int(0, strlen($lowercase) - 1)],
            $uppercase[random_int(0, strlen($uppercase) - 1)],
            $numbers[random_int(0, strlen($numbers) - 1)],
            $specials[random_int(0, strlen($specials) - 1)]
        ];

        $all = $lowercase . $uppercase . $numbers . $specials;
        for ($i = 4; $i < $this->length; $i++) {
            $password[] = $all[random_int(0, strlen($all) - 1)];
        }

        shuffle($password);

        echo "Password is" . implode('', $password);
    }
}

$generator = new PasswordGenerator;
$generator->generatePassword();
