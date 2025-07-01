<?php
    $number1=10;
    $number2=20;

    #Arithmetic operators
    echo("$number1+$number2=".($number1+$number2)."\n");
    echo("$number1-$number2=".($number1-$number2)."\n");
    echo("$number1*$number2=".($number1*$number2)."\n");
    echo("$number1/$number2=".($number1/$number2)."\n");
    echo("$number1%$number2=".($number1%$number2)."\n");
    echo("$number1^$number2=".($number1**$number2)."\n");
    echo("\n");

    #Comparison operators
    echo(($number1==$number2).("\n")); #False
    echo(($number1!=$number2).("\n")); #True
    echo(($number1>$number2).("\n")); #False
    echo(($number1<$number2).("\n")); #True
    echo(($number1>=$number2).("\n")); #False
    echo(($number1<=$number2).("\n")); #True
    echo(($number1===$number2).("\n")); #False
    echo(($number1<>$number2).("\n")); #True
    echo(($number1<=>$number2).("\n")); #Spaceship
    echo(($number1!==$number2).("\n"));
    echo("\n");

    #Assignment operators
    $number3=26;
    $number4=13;
    echo($number3+=$number4)."\n";
    echo($number3-=$number4)."\n";
    echo($number3*=$number4)."\n";
    echo($number3/=$number4)."\n";
    echo($number3%=$number4)."\n";
    echo("\n");

    #Increment/decrement operators
    $number5=$number6=$number7=$number8=2002;
    echo ++$number5."\n";
    echo --$number6."\n";
    echo $number7++."\n";
    echo $number8--."\n";

    #Logical operators
    echo(10>20 and 26>13),"\n";
    echo(10>20 && 26>13),"\n";
    echo(10>20 or 26>13),"\n";
    echo(10>20 || 26>13),"\n";
    echo(10>20 xor 26>13),"\n";
    echo !(26<13),"\n";
    echo "\n";

    #String operators
    $text1="Adi";
    $text2="das";
    echo $text1,$text2."\n";
    echo $text1.=$text2."\n";
    echo "\n";

    #Array operators
    $array1=[26,8,26];
    $array2=[10];
    print_r($array1+$array2)."\n";
    echo ($array1==$array2)."\n"; #False
    echo ($array1!=$array2)."\n"; #True
    echo ($array1===$array2)."\n"; #False
    echo ($array1<>$array2)."\n"; #True
    echo ($array1!==$array2)."\n"; #True
    echo "\n";

    #Conditional assignment operators
    $numberA=0;
    $numberB=8;
    echo (($numberA>$numberB)?"$numberA is large":"$numberB is large"),"\n";

    echo $numberA??0;

?>