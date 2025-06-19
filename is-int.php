<?php
    $number_1=32;
    $number_2=400.25;
    $number_3=1.9e411;
    $number_4="2314";
    echo is_int($number_1)."\n";
    echo is_long($number_1)."\n";
    echo is_int($number_2)."\n";
    echo is_long($number_2)."\n";
    echo is_finite($number_3)."\n";
    echo is_infinite($number_3)."\n";
    echo is_nan($number_1)."\n";
    echo is_nan($number_4);
?>
