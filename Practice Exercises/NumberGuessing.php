<?php

class NumberGuessing
{
    public $number;

    function __construct($number)
    {
        $this->number = $number;
    }

    function getGuess()
    {
        $attempt = 0;
        do {
            $guess = readline("\nGuess a number: ");
            $attempt++;
            if ($guess > $this->number) {
                echo "The number is less than $guess\n";
            } elseif ($guess < $this->number) {
                echo "The number is greater than $guess\n";
            } else {
                echo "You guessed the number in attempt $attempt";
            }
        } while ($guess != $this->number);
    }
}

$play = new NumberGuessing(43);
$play->getGuess();
