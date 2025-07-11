<?php

namespace Addition;

class Add
{
    function add()
    {
        $numbers = readline("\nEnter two numbers: ");
        list($number1, $number2) = explode(" ", $numbers);
        echo $number1 . " + " . $number2 . " = " . (float) ($number1 + $number2) . "\n";
    }
}
