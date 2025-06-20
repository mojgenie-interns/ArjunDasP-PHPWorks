<?php
    echo("Value of pi is ".pi())."\n";
    $collection=([100,96,80,76]);
    print_r($collection);
    echo("Largest number is ".max($collection)."\n");
    echo("Smallest number is ".min($collection)."\n");
    echo("Sum is ".array_sum($collection)."\n");
    echo("Number of items is ".count($collection)."\n");
    $number_1=-23.04;
    echo("Absolute value of $number_1 is ".abs($number_1)."\n");
    $number_2=5;
    echo("Square root of $number_2 is ".sqrt($number_2)."\n");
    $number_3=3500.50;
    echo("Round of $number_3 is ".round($number_3)."\n");
    echo("Random number: ".rand()."\n");
    echo("Random number between 0 and 20102002: ".rand(0,21102002)."\n");
?>