<?php

class TreasureHunt
{

    public $correctDirection;

    public function __construct()
    {

        $this->correctDirection = rand(1, 4);
    }

    public function menu()
    {
        echo "\n<--- TREASURE HUNT --->\n";
        echo "Choose correct direction to the treasure.\n";
        // echo "First guess must be correct. Then survive 3 more correct turns!\n";

        $first = $this->getGuess("\nTurn 1");

        if ($first == $this->correctDirection) {
            echo "\nCorrect! Now survive 3 more turns...\n";

            for ($i = 2; $i <= 4; $i++) {
                $next = $this->getGuess("\nTurn $i");

                if ($next != $this->correctDirection) {
                    echo "\nWrong direction on turn $i. Game Over!\n";
                    return;
                }
            }

            echo "\nYou made 4 correct moves. You found the treasure!\n";
        } else {
            echo "\nWrong guess. Game Over!\n";
        }
    }

    public function getGuess($turnLabel)
    {
        echo "$turnLabel: Choose a direction\n";
        echo "1. North\n2. South\n3. East\n4. West\n";
        $input = readline("Enter your choice: ");

        while (!in_array($input, ['1', '2', '3', '4'])) {
            $input = readline("Invalid input. ");
        }

        return (int)$input;
    }
}


$object = new TreasureHunt();
$object->menu();
