<?php
    require "Addition.php";
    include "Subtraction.php";
    use Adding\Addition,Subtracting\Subtraction;
    $sum1=new Addition();
    $sum1->add(10,20);
    $subtract1=new Subtraction();
    $subtract1->subtract(20.34,81.3);
?>