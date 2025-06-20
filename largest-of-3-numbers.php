<?php
    $numbers=readline("Enter three numbers: ");
    list($number_1,$number_2,$number_3)=explode(" ",$numbers);
    if($number_1>$number_2)
    {
        if($number_1>$number_3)
            $largest_number=$number_1;
        else
            $largest_number=$number_3;
    }
    else
    {
        if($number_2>$number_3)
            $largest_number=$number_2;
        else
            $largest_number=$number_3;
    }
    echo "Largest number is $largest_number";
?>
