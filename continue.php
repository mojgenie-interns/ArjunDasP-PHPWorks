<?php
    #Program to display even numbers upto a limit
    $limit=readline("Enter the limit: ");
    $i=1;
    while($i<=$limit)
    {
        if($i%2!=0)
        {
            $i++;
            continue;
        }
        echo $i."\t";
        $i++;
    }
?>