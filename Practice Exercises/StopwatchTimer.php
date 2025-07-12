<?php

error_reporting(E_ALL & ~E_DEPRECATED);

trait Stopwatch
{
    function startStopwatch()
    {
        echo "\nPress Ctrl+C to stop.\n";

        $start = microtime(true);

        while (true) {
            $elapsed = microtime(true) - $start;

            // Convert elapsed time to hours, minutes, seconds
            $hours = floor($elapsed / 3600);
            $minutes = floor(($elapsed % 3600) / 60);
            $seconds = floor($elapsed % 60);

            // Print formatted time with carriage return to overwrite the same line
            echo sprintf("\r%02d:%02d:%02d", $hours, $minutes, $seconds);

            // Flush output immediately
            flush();

            // Wait for 1 second
            sleep(1);
        }
    }
}

trait Timer
{
    private $hours;
    private $minutes;
    private $seconds;
    private $time;

    function getTime()
    {
        $this->time = readline("Enter the time (HH:MM:SS): ");
        [$this->hours, $this->minutes, $this->seconds] = explode(":", $this->time);

        // Convert to integers
        $this->hours = (int) $this->hours;
        $this->minutes = (int) $this->minutes;
        $this->seconds = (int) $this->seconds;
    }

    function startTimer()
    {

        echo "\n";
        $this->getTime();
        // Calculate total seconds
        $totalSeconds = $this->hours * 3600 + $this->minutes * 60 + $this->seconds;

        while ($totalSeconds > 0) {
            // Calculate hours, minutes, seconds
            $hours = floor($totalSeconds / 3600);
            $minutes = floor(($totalSeconds % 3600) / 60);
            $seconds = $totalSeconds % 60;

            // Display timer in format HH:MM:SS
            echo sprintf("\r%02d:%02d:%02d", $hours, $minutes, $seconds);
            flush();

            sleep(1); // Wait for 1 second
            $totalSeconds--;
        }

        echo "\nTime's up.\n";
    }
}

class StopwatchTimer
{
    use Stopwatch, Timer;

    function run()
    {
        echo "\nSTOPWATCH/TIMER\n";
        echo "1. Stopwatch\n2. Timer\n";
        $option = readline("Enter one: ");
        if ($option == 1)
            $this->startStopwatch();
        else if ($option == 2)
            $this->startTimer();
        else
            echo "Enter a valid option.\n";
    }
}

$app = new StopwatchTimer();
$app->run();
