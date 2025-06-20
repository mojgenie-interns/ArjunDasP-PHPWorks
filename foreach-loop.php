<?php
    $weeks=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    foreach($weeks as $week)
    {
        echo "$week"."\n";
    }

    echo "\n";
    $interns=["Int 1"=>"Mariya","Int 2"=>"Athira","Int 3"=>"Arjun"];
    foreach($interns as $key=>$value)
    {
        echo "$key: $value\t";
    }
?>