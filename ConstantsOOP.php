<?php
    class Warning
    {
        const MESSAGE="I am coming";
        function calling()
        {
            echo self::MESSAGE;
        }
    }
    // $warning1=new Warning();
    // $warning1->calling();
    echo Warning::MESSAGE;
?>