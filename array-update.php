<?php

    #Create array
    $size=readline("Enter the size: ");
    $new_array=[];
    $i=0;
    echo "Enter the items:\n";
    while($i<$size)
    {
        $new_array[$i]=readline();
        $i++;
    }

    #Display array
    echo "\nArray: ";
    foreach($new_array as $j)
    {
        echo $j."\t";
    }

    #Update array
    $index=readline("\nEnter the index to update: ");
    $new_item=readline("Enter the item: ");
    $new_array[$index]=$new_item;

    #Display array
    echo "\nArray: ";
    foreach($new_array as $j)
    {
        echo $j."\t";
    }

?>