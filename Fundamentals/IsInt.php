<?php
    $number1=32;
    $number2=400.25;
    $number3=1.9e411;
    $number4="2314";
    echo is_int($number1)."\n";
    echo is_long($number1)."\n";
    echo is_int($number2)."\n";
    echo is_long($number2)."\n";
    echo is_finite($number3)."\n";
    echo is_infinite($number3)."\n";
    echo is_nan($number1)."\n";
    echo is_nan($number4);
?>
