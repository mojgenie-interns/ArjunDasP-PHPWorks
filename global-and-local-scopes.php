<?php
    $variable=10; #Global variable

    function testingScope()
    {
        $variable="Ben"; #Local variable
        echo "Inside the function variable is $variable\n";
    }

    testingScope();

    echo "Inside the function variable is $variable";
?>