<?php

namespace Division;

class Divide
{
    function divide()
    {
        $numbers = readline("\nEnter two numbers: ");
        list($number1, $number2) = explode(" ", $numbers);
        echo $number1 . " / " . $number2 . " = " . (float) ($number1 / $number2) . "\n";
    }
}
