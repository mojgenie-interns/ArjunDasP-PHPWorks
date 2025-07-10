<?php

namespace Subtraction;

class Subtract
{
    private float $number1;
    private float $number2;
    function __construct()
    {
        $numbers = readline("Enter two numbers: ");
        list($number1, $number2) = explode(" ", $numbers);
        $this->number1 = $number1;
        $this->number2 = $number2;
    }

    function subtract()
    {
        echo $this->number1 . " - " . $this->number2 . " = " . (float) ($this->number1 - $this->number2);
    }
}

$sub = new Subtract;
$sub->subtract();
