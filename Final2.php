<?php
    class JusticeLeague
    {
        final function call()
        {
            echo "JUSTICE LEAGUE".PHP_EOL;
        }
    }

    class WonderWoman extends JusticeLeague
    {
        function call()
        {
            echo "WONDER WOMAN".PHP_EOL;
        }
    }

    $member1=new JusticeLeague();
    $member1->call();
?>