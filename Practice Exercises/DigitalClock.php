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
            // system(strncasecmp(PHP_OS, 'WIN', 3) === 0 ? 'cls' : 'clear');

            $this->getDate();
            $this->getTime();

            sleep(60);
        }
    }

    function getDate()
    {
        echo "\nDate: " . date("Y-m-d") . "\n";
    }

    function getTime()
    {
        echo "Time: " . date("H:i:s") . "\n";
    }
}

$clock = new DigitalClock();
$clock->displayClock();
