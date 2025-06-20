<?php
    $students=["Abhiram","Arjun","Abina","Akshara","Anagha","Ashika"];
    print_r($students);

    array_splice($students,0,2);
    print_r($students);

    unset($students[0]);
    print_r($students);

    array_pop($students);
    print_r($students);

    array_shift($students);
    print_r($students);
?>