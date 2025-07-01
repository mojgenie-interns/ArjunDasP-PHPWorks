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

    #Update array
    $index=readline("\nEnter the index to update: ");
    $newItem=readline("Enter the item: ");
    $newArray[$index]=$newItem;

    #Display array
    echo "\nArray: ";
    foreach($newArray as $j)
    {
        echo $j."\t";
    }

?>