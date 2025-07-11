<?php

class Alarm
{

    private $time;
    private $label;
    function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }

    function setAlarm()
    {
        $this->time = readline("Time (HH:MM): ");
        $this->label = readline("Label: ");
    }

    function getAlarm()
    {
        while (true) {
            if ($this->time == date("H:i")) {
                echo "\e[5m{$this->time} - {$this->label}\e[0m\n";
                break;
            }
            sleep(1);
        }
    }
}

$alarm = new Alarm;
$alarm->setAlarm();
$alarm->getAlarm();
