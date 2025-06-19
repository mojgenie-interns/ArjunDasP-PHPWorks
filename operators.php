<?php
    $number_1=10;
    $number_2=20;

    #Arithmetic operators
    echo("$number_1+$number_2=".($number_1+$number_2)."\n");
    echo("$number_1-$number_2=".($number_1-$number_2)."\n");
    echo("$number_1*$number_2=".($number_1*$number_2)."\n");
    echo("$number_1/$number_2=".($number_1/$number_2)."\n");
    echo("$number_1%$number_2=".($number_1%$number_2)."\n");
    echo("$number_1^$number_2=".($number_1**$number_2)."\n");
    echo("\n");

    #Comparison operators
    echo(($number_1==$number_2).("\n")); #False
    echo(($number_1!=$number_2).("\n")); #True
    echo(($number_1>$number_2).("\n")); #False
    echo(($number_1<$number_2).("\n")); #True
    echo(($number_1>=$number_2).("\n")); #False
    echo(($number_1<=$number_2).("\n")); #True
    echo(($number_1===$number_2).("\n")); #False
    echo(($number_1<>$number_2).("\n")); #True
    echo(($number_1<=>$number_2).("\n")); #Spaceship
    echo(($number_1!==$number_2).("\n"));
    echo("\n");

    #Assignment operators
    $number_3=26;
    $number_4=13;
    echo($number_3+=$number_4)."\n";
    echo($number_3-=$number_4)."\n";
    echo($number_3*=$number_4)."\n";
    echo($number_3/=$number_4)."\n";
    echo($number_3%=$number_4)."\n";
    echo("\n");

    #Increment/decrement operators
    $number_5=$number_6=$number_7=$number_8=2002;
    echo ++$number_5."\n";
    echo --$number_6."\n";
    echo $number_7++."\n";
    echo $number_8--."\n";

    #Logical operators
    echo(10>20 and 26>13),"\n";
    echo(10>20 && 26>13),"\n";
    echo(10>20 or 26>13),"\n";
    echo(10>20 || 26>13),"\n";
    echo(10>20 xor 26>13),"\n";
    echo !(26<13),"\n";
    echo "\n";

    #String operators
    $text_1="Adi";
    $text_2="das";
    echo $text_1,$text_2."\n";
    echo $text_1.=$text_2."\n";
    echo "\n";

    #Array operators
    $array_1=[26,8,26];
    $array_2=[10];
    print_r($array_1+$array_2)."\n";
    echo ($array_1==$array_2)."\n"; #False
    echo ($array_1!=$array_2)."\n"; #True
    echo ($array_1===$array_2)."\n"; #False
    echo ($array_1<>$array_2)."\n"; #True
    echo ($array_1!==$array_2)."\n"; #True
    echo "\n";

    #Conditional assignment operators
    $number_a=0;
    $number_b=8;
    echo (($number_a>$number_b)?"$number_a is large":"$number_b is large"),"\n";

    echo $number_a??0;

?>