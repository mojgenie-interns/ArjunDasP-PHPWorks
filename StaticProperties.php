<?php
    class Contacts
    {
        public static $email="arjundaspalappilli@gmail.com";
        function display()
        {
            echo "Email: ".self::$email.PHP_EOL;
        }
    }

    class Email extends Contacts
    {
        function __construct()
        {
            echo "Email: ",parent::$email,PHP_EOL;
        }
    }

    echo "Email: ",Contacts::$email,PHP_EOL;

    $callEmail=new Contacts();
    $callEmail->display();

    $email1=new Email();
?>