<?php

class DigitalClock
{
    function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }

    function displayClock()
    {
        while (true) {

            $this->getDate();
            $this->getTime();

            flush();

            sleep(60);
        }
    }

    function getDate()
    {
        echo "Date: " . date("Y-m-d") . "\n";
    }

    function getTime()
    {
        echo "Time: " . date("H:i:s") . "\n";
    }
}

$clock = new DigitalClock();
$clock->displayClock();
