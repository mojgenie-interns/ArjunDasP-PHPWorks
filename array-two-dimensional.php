<?php
    $array_2d=[[1,"Abhiram","10-04-2003"],[2,"Arjun","20-10-2002"]];
    foreach($array_2d as $i)
    {
        foreach($i as $j)
        {
            echo $j."\t";
        }
        echo "\n";
    }
?>