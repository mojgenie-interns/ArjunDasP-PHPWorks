<?php

class NumberSystemConverter
{
    public $number;

    function __construct()
    {
        echo "NUMBER SYSTEM CONVERTER";
        $this->number = readline("\nEnter the number: ");
    }

    function readNumber()
    {
        echo "\n1. Decimal to Binary\n2. Binary to Decimal\n3. Decimal to Octal\n4. Octal to Decimal\n5. Decimal to Hexadecimal\n6. Hexadecimal to Decimal\n";
        $option = readline("Enter an option: ");

        if ($option == 1) {
            $this->decimalToBinary();
        } elseif ($option == 2) {
            $this->binaryToDecimal();
        } elseif ($option == 3) {
            $this->decimalToOctal();
        } elseif ($option == 4) {
            $this->octalToDecimal();
        } elseif ($option == 5) {
            $this->decimalToHexadecimal();
        } elseif ($option == 6) {
            $this->hexadecimalToDecimal();
        } else {
            echo "Invalid entry.\n";
        }
    }

    function decimalToBinary()
    {
        echo "\nBinary: ".decbin((int)$this->number);
    }

    function binaryToDecimal()
    {
        echo "\nDecimal: ".bindec($this->number);
    }
    
    function decimalToOctal()
    {
        echo "\nOctal: ".decoct($this->number);
    }
    
    function octalToDecimal()
    {
        echo "\nDecimal: ".octdec($this->number);
    }
    
    function decimalToHexadecimal()
    {
        echo "\nHexadecimal: ".dechex($this->number);
    }
    
    function hexadecimalToDecimal()
    {
        echo "\nDecimal: ".hecdec($this->number);
    }
}

$converter = new NumberSystemConverter();
$converter->readNumber();
