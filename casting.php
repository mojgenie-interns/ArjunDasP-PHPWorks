<?php
    $integer_number=200;
    $floating_number=305.34;
    $text="Say my name";
    $collection=array([23,32,53]);
    $boolean=false;
    $null_character=NULL;

    #Cast to string
    echo (string) $integer_number."\n";
    echo (string) $floating_number."\n";
    echo (string) $text."\n";
    // echo (string) $collection."\n";
    echo (string) $boolean."\n";
    echo (string) $null_character."\n";

    #Cast to integer
    echo "\n";
    echo (int) $integer_number."\n";
    echo (int) $floating_number."\n";
    echo (int) $text."\n";
    echo (int) $collection."\n";
    echo (int) $boolean."\n";
    echo (int) $null_character."\n";

    #Cast to float
    echo "\n";
    echo (float) $integer_number."\n";
    echo (float) $floating_number."\n";
    echo (float) $text."\n";
    echo (float) $collection."\n";
    echo (float) $boolean."\n";
    echo (float) $null_character."\n";

    #Cast to boolean
    echo "\n";
    echo (boolean) $integer_number."\n";
    echo (boolean) $floating_number."\n";
    echo (boolean) $text."\n";
    echo (boolean) $collection."\n";
    echo (boolean) $boolean."\n";
    echo (boolean) $null_character."\n";

    #Cast to object
    echo "\n";
    echo (object) $integer_number."\n";
    echo (object) $floating_number."\n";
    echo (object) $text."\n";
    echo (object) $collection."\n";
    echo (object) $boolean."\n";
    echo (object) $null_character."\n";
?>