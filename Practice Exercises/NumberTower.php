<?php
class NumberTower
{
    private $levels;

    public function __construct()
    {
        $this->levels = (int)readline("Enter the number of levels: ");
        $this->printTower();
    }

    private function printTower()
    {
        for ($i = 1; $i <= $this->levels; $i++) {
            // Print leading spaces
            for ($j = 1; $j <= $this->levels - $i; $j++) {
                echo " ";
            }

            // Print ascending numbers (left side)
            for ($j = 1; $j <= $i; $j++) {
                echo $j;
            }

            // Print descending numbers (right side)
            for ($j = $i - 1; $j >= 1; $j--) {
                echo $j;
            }

            echo "\n";
        }
    }
}

new NumberTower();
