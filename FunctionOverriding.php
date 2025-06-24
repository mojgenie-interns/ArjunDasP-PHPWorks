<?php
    class Display1
    {
        function message()
        {
            echo "Hi";
        }
    }

    class Display2 extends Display1
    {
        function message()
        {
            // parent::message();
            echo "Hello";
        }
    }

    $message1=new Display2();
    $message1->Display1::message();
?>