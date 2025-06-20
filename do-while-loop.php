<?php
    $limit=readline("Enter the limit: ");
    echo "Natural numbers upto $limit are\n";
    $i=1;
    do
    {
        echo $i."\n";
        $i++;
    }
    while($i<$limit);
?>