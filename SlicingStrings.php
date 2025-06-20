<?php
    $text="I am vengeance";
    echo substr($text,5,9)."\n"; #Slicing
    echo substr($text,5)."\n"; #Slice to the end
    echo substr($text,5,-5)."\n"; #Negative slicing
    echo substr($text,-9); #Slicing from the end
?>