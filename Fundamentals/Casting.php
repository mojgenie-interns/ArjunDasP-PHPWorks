<?php
    $integerNumber=200;
    $floatingNumber=305.34;
    $text="Say my name";
    $collection=array([23,32,53]);
    $boolean=false;
    $nullCharacter=NULL;

    #Cast to string
    echo (string) $integerNumber."\n";
    echo (string) $floatingNumber."\n";
    echo (string) $text."\n";
    // echo (string) $collection."\n";
    echo (string) $boolean."\n";
    echo (string) $nullCharacter."\n";

    #Cast to integer
    echo "\n";
    echo (int) $integerNumber."\n";
    echo (int) $floatingNumber."\n";
    echo (int) $text."\n";
    echo (int) $collection."\n";
    echo (int) $boolean."\n";
    echo (int) $nullCharacter."\n";

    #Cast to float
    echo "\n";
    echo (float) $integerNumber."\n";
    echo (float) $floatingNumber."\n";
    echo (float) $text."\n";
    echo (float) $collection."\n";
    echo (float) $boolean."\n";
    echo (float) $nullCharacter."\n";

    #Cast to boolean
    echo "\n";
    echo (boolean) $integerNumber."\n";
    echo (boolean) $floatingNumber."\n";
    echo (boolean) $text."\n";
    echo (boolean) $collection."\n";
    echo (boolean) $boolean."\n";
    echo (boolean) $nullCharacter."\n";

    #Cast to object
    echo "\n";
    echo (object) $integerNumber."\n";
    echo (object) $floatingNumber."\n";
    echo (object) $text."\n";
    echo (object) $collection."\n";
    echo (object) $boolean."\n";
    echo (object) $nullCharacter."\n";
?>