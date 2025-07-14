<?php

class WordCodePuzzle
{
    private $word = "KING";
    private $numberCode = '';

    function __construct()
    {
        $this->assignNumbers();
    }

    function assignNumbers()
    {
        $word = strtoupper($this->word);
        $letters = range('A', 'Z');
        $numbers = [];

        for ($i = 0; $i < strlen($word); $i++) {
            $currentLetter = $word[$i];
            foreach ($letters as $index => $alpha) {
                if ($currentLetter == $alpha) {
                    $numbers[] = $index + 1;
                    break;
                }
            }
        }

        $this->numberCode = implode(' ', $numbers);
    }


    function userInput()
    {
        echo "\nDecode the number code: " . $this->numberCode . "\n";
        $input = strtoupper(readline("Enter the word: ")); // Use uppercase for comparison

        if ($input == $this->word) {
            echo "\nCorrect answer.\n";
            exit;
        }

        echo "\nWrong answer. Try again.\n";
        $this->userInput();
    }
}

$puzzle = new WordCodePuzzle();
$puzzle->userInput();
