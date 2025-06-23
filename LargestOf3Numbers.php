<?php
    $numbers=readline("Enter three numbers: ");
    list($number1,$number2,$number3)=explode(" ",$numbers);
    if($number1>$number2)
    {
        if($number1>$number3)
            $largestNumber=$number1;
        else
            $largestNumber=$number3;
    }
    else
    {
        if($number2>$number3)
            $largestNumber=$number2;
        else
            $largestNumber=$number3;
    }
    echo "Largest number is $largestNumber";
?>
