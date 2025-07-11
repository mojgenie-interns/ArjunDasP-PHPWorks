<?php

require "Add.php";
require "Subtract.php";
require "Multiply.php";
require "Divide.php";
require "Modulo.php";

use Addition\Add;
use Subtraction\Subtract;
use Multiplication\Multiply;
use Division\Divide;
use Modulo\Modulo;

class Calculator
{
    private $adder;
    private $subtracter;
    private $multiplier;
    private $divider;
    private $moduloFinder;

    function __construct()
    {
        $this->adder = new Add;
        $this->subtracter = new Subtract;
        $this->multiplier = new Multiply;
        $this->divider = new Divide;
        $this->moduloFinder = new Modulo;
    }

    function run()
    {
        while (true) {
            echo "\n=== CALCULATOR ===\n";
            echo "1. Add two numbers\n2. Subtract two numbers\n3. Multiply two numbers\n4. Divide two numbers\n5. Modulo two numbers\n6. Exit\n";
            $option = readline("Enter the option: ");
            if ($option == 1)
                $this->adder->add();
            elseif ($option == 2)
                $this->subtracter->subtract();
            elseif ($option == 3)
                $this->multiplier->multiply();
            elseif ($option == 4)
                $this->divider->divide();
            elseif ($option == 5)
                $this->moduloFinder->modulo();
            elseif ($option == 6)
                exit;
            else
                echo "\nInvalid entry. Try again.\n";
        }
    }
}

$calculate = new Calculator();
$calculate->run();
