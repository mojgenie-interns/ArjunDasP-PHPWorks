<?php
    echo("Value of pi is ".pi())."\n";
    $collection=([100,96,80,76]);
    print_r($collection);
    echo("Largest number is ".max($collection)."\n");
    echo("Smallest number is ".min($collection)."\n");
    echo("Sum is ".array_sum($collection)."\n");
    echo("Number of items is ".count($collection)."\n");
    $number1=-23.04;
    echo("Absolute value of $number1 is ".abs($number1)."\n");
    $number2=5;
    echo("Square root of $number2 is ".sqrt($number2)."\n");
    $number3=3500.50;
    echo("Round of $number3 is ".round($number3)."\n");
    echo("Random number: ".rand()."\n");
    echo("Random number between 0 and 20102002: ".rand(0,21102002)."\n");
?>