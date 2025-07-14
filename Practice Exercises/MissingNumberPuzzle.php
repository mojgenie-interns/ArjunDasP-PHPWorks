<?php
interface MissingNumber
{
    public function getInput();
    public function checkInput();
}

class Puzzle implements MissingNumber
{
    private $puzzle;
    private $value;
    private $userInput;

    public function __construct()
    {
        $this->puzzle = ['5', '10', '13', '26', '29', '_', '61'];
        $this->value = '58';
    }

    public function getInput()
    {
        echo "Puzzle: " . implode(', ', $this->puzzle) . "\n";
        $this->userInput = readline("Enter the missing number: ");
    }

    public function checkInput()
    {
        $this->getInput();
        if ($this->userInput == $this->value) {
            echo "\nCorrect Answer.\n";
        } else {
            echo "\nWrong Answer. The correct number was {$this->value}.\n";
        }
    }
}


$game = new Puzzle();
$game->checkInput();
