<?php
    function increment()
    {
        static $number=10; #Used static keyword
        echo "$number\n";
        $number++;
    }

    increment();
    increment();
    increment();
?>
