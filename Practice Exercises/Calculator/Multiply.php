<?php

namespace Multiplication;

class Multiply
{
    function multiply()
    {
        $numbers = readline("\nEnter two numbers: ");
        list($number1, $number2) = explode(" ", $numbers);
        echo $number1 . " x " . $number2 . " = " . (float) ($number1 * $number2)  . "\n";
    }
}
