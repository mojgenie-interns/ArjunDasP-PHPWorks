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

    #Sort array
    echo "\nAfter sorting,\nArray: ";
    sort($new_array);
    foreach($new_array as $j)
    {
        echo $j."\t";
    }

    echo "\nIn descending order,\nArray: ";
    rsort($new_array);
    foreach($new_array as $j)
    {
        echo $j."\t";
    }

?>