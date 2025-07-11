<?php

namespace Modulo;

class Modulo
{

    function modulo()
    {
        $numbers = readline("\nEnter two numbers: ");
        list($number1, $number2) = explode(" ", $numbers);
        echo $number1 . " % " . $number2 . " = " . (int) ($number1 % $number2)  . "\n";
    }
}
