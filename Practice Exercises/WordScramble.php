<?php

namespace Puzzle;

class WordScramble
{
    private $word;
    private $scrambledWord;

    function __construct()
    {
        $this->word = "ARJUN";
    }

    function scramble()
    {
        $letters = str_split($this->word);
        shuffle($letters);
        $this->scrambledWord = $letters;
        echo "\nScrambled word: ";
        foreach ($this->scrambledWord as $letter) {
            echo $letter . " ";
        }
        echo "\n";
    }

    function guessWord()
    {
        $this->scramble();
        $guess = strtoupper(readline("Guess the word: "));
        if ($guess === $this->word) {
            echo "Right answer.\n";
            return true;
        } else {
            echo "Wrong answer. Try again.\n";
            return false;
        }
    }
}
