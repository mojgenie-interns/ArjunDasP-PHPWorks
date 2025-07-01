<?php
    $firstNumber=10;
    $secondNumber=20;

    function addTwoNumbers()
    {
        global $firstNumber;
        global $secondNumber;
        echo $firstNumber+$secondNumber;
        echo "\n";
    }

    addTwoNumbers();
    echo $firstNumber+$secondNumber;
?>