<?php
    $limit=readline("Enter the limit: ");
    echo "Natural numbers upto $limit are\n";
    $i=1;
    while($i<$limit)
    {
        echo $i."\n";
        $i++;
    }
?>