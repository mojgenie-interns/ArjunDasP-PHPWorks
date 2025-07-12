<?php

class FibonacciGenerator
{
    private $number;

    function getNumber()
    {
        $this->number = (int) readline("Enter the number: ");
    }

    function fibonacci($number)
    {
        if ($number <= 0) return 0;
        if ($number == 1) return 1;
        return $this->fibonacci($number - 1) + $this->fibonacci($number - 2);
    }

    function displaySeries()
    {
        echo "\nFibonacci series up to {$this->number} terms:\n";
        for ($i = 0; $i < $this->number; $i++) {
            echo $this->fibonacci($i) . " ";
        }
        echo "\n";
    }
}

$series = new FibonacciGenerator;
$series->getNumber();
$series->displaySeries();
