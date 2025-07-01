<?php
    class Message
    {
        static function display()
        {
            echo "Hello";
        }

        // Message::display();
        function __construct()
        {
            self::display();
        }
    }
    new Message();
?>