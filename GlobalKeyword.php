<?php
    $first_number=10;
    $second_number=20;

    function addTwoNumbers()
    {
        global $first_number;
        global $second_number;
        echo $first_number+$second_number;
        echo "\n";
    }

    addTwoNumbers();
    echo $first_number+$second_number;
?>