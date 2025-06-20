<?php
    function AddingTwoNumbers($number_1,$number_2)
    {
        return $number_1+$number_2;
    }

    $numbers=readline("Enter two numbers: ");
    list($number_1,$number_2)=explode(" ",$numbers);
    echo "$number_1+$number_2=".AddingTwoNumbers($number_1,$number_2);
?>