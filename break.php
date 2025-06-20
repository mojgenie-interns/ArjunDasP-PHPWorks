<?php
    #Program to display natural numbers upto a limit
    $limit=readline("Enter the limit: ");
    for($i=1;$i<100;$i++)
    {
        if($i==$limit)
            break;
        echo $i."\n";
    }
?>
    