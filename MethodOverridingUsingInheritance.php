<?php
    class Avengers
    {
        function call()
        {
            echo "Avengers assemble!".PHP_EOL;
        }
    }

    class CaptainAmerica extends Avengers
    {
        function call()
        {
            echo "Captain".PHP_EOL;
        }
    }

    class IronMan extends Avengers
    {
        function call()
        {
            echo "Tony".PHP_EOL;
        }
    }

    $avengers=[new Avengers(),new CaptainAmerica(),new IronMan()];
    foreach($avengers as $member)
    {
        $member->call();
    }
?>