<?php
    namespace Space;
    include "Called.php";
    function display()
    {
        echo __NAMESPACE__.PHP_EOL;
    }
    const TEMP=100;
    display();
    MySpace\display();
    echo __NAMESPACE__.PHP_EOL;
    ECHO TEMP.PHP_EOL;
    echo MySpace\TEMP;
?>