<?php

class ThreeDoorProblem
{
    private array $doors;

    public function __construct()
    {
        $items = ['Goat', 'Goat', 'Car'];
        shuffle($items);

        $this->doors = [
            1 => $items[0],
            2 => $items[1],
            3 => $items[2],
        ];
    }

    public function play()
    {
        echo "### 3 DOOR PROBLEM ###\n";
        echo "There is a car behind one door and goats behind the others.\n";
        echo "[1] [2] [3]\n";

        $choice1 = (int)readline("Open a door: ");

        $hostOptions = [];
        foreach ($this->doors as $doorNum => $item) {
            if ($doorNum != $choice1 && $item == 'Goat') {
                $hostOptions[] = $doorNum;
            }
        }

        $hostOpens = $hostOptions[array_rand($hostOptions)];
        echo "\nThe host opens door {$hostOpens} and shows a Goat!\n";

        $choice2 = readline("Do you want to switch to the other unopened door? (yes/no): ");

        if (strtolower($choice2) == 'yes') {
            foreach ([1, 2, 3] as $doorNum) {
                if ($doorNum != $choice1 && $doorNum != $hostOpens) {
                    $choice1 = $doorNum;
                    break;
                }
            }
        }

        echo "You chose door {$choice1}...\n";
        echo "\nBehind the door is {$this->doors[$choice1]}!\n";

        if ($this->doors[$choice1] == 'Car') {
            echo "Congratulations, You won the car.\n";
        } else {
            echo "Sorry, you got a goat.\n";
        }
    }
}

$game = new ThreeDoorProblem();
$game->play();
