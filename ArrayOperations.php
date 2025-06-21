<?php

    #Create array
    $size=readline("Enter the size: ");
    $newArray=[];
    $i=0;
    echo "Enter the items:\n";
    while($i<$size)
    {
        $newArray[$i]=readline();
        $i++;
    }

    #Display array
    echo "\nArray: ";
    foreach($newArray as $j)
    {
        echo $j."\t";
    }

    #Sort array
    echo "\nAfter sorting,\nArray: ";
    sort($newArray);
    foreach($newArray as $j)
    {
        echo $j."\t";
    }

    echo "\nIn descending order,\nArray: ";
    rsort($newArray);
    foreach($newArray as $j)
    {
        echo $j."\t";
    }

?>