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
    private $userAnswer;

    public function __construct()
    {
        $this->puzzle = ['5', '10', '13', '26', '29', '_', '61'];
        $this->value = '58';
    }

    public function getInput()
    {
        echo "Puzzle: " . implode(', ', $this->puzzle) . "\n";
        $this->userAnswer = readline("Enter the missing number: ");
    }

    public function checkInput()
    {
        $this->getInput();
        if ($this->userAnswer == $this->value) {
            echo "\nCorrect Answer.\n";
        } else {
            echo "\nWrong Answer. The correct number was {$this->value}.\n";
        }
    }
}


$game = new Puzzle();
$game->checkInput();
