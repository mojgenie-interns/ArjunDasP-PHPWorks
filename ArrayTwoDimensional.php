<?php
    $array2D=[[1,"Abhiram","10-04-2003"],[2,"Arjun","20-10-2002"]];
    foreach($array2D as $row)
    {
        foreach($row as $column)
        {
            echo $column."\t";
        }
        echo "\n";
    }
?>