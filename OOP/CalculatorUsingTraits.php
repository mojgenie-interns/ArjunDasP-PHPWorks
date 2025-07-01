<?php
    trait Addition
    {
        function add(float $number1,float $number2)
        {
            echo "$number1+$number2=",$number1+$number2,PHP_EOL;
        }
    }
    
    trait Subtraction
    {
        function subtract(float $number1,float $number2)
        {
            echo "$number1-$number2=",$number1-$number2,PHP_EOL;
        }
    }

    class Calculator
    {
        use Addition,Subtraction;
    }

    $add1=new Calculator();
    $add1->add(10,20);
    $subtract1=new Calculator();
    $subtract1->subtract(10,20);
?>