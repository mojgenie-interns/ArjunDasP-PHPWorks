<?php
    class Person1
    {
        final function message()
        {
            echo "Hello".PHP_EOL;
        }
    }
    
    class Person2 extends Person1
    {
        function message()
        {
            echo "Hi".PHP_EOL;
        }
    }

    $message1=new Person1();
    $message1->message();

    $message2=new Person2();
    $message2->message();
?>