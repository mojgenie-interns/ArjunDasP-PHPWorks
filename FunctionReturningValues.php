<?php
    function AddingTwoNumbers($number1,$number2)
    {
        return $number1+$number2;
    }

    $numbers=readline("Enter two numbers: ");
    list($number1,$number2)=explode(" ",$numbers);
    echo "$number1+$number2=".AddingTwoNumbers($number1,$number2);
?>