<?php

class Stopwatch
{

    function runStopwatch()
    {
        echo "Stopwatch started. Press Ctrl+C to stop.\n";

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

    function stopwatchMenu()
    {
        echo "\nSTOPWATCH\n";
        echo "1. Start\n2. Exit\n";
        $option = readline("Enter the option: ");
        if ($option == 1)
            $this->runStopwatch();
        elseif ($option == 2)
            exit;
        else
            echo "Enter a valid option";
    }
}

$start = new Stopwatch;
$start->runStopwatch();
