<?php

class Anagram
{
    private string $word;
    private array $anagrams;

    function __construct()
    {
        $this->word = "EARTH";
        $this->anagrams = ["HEART", "HATER"];
        echo "The word is " . $this->word;
    }

    function guessWord()
    {

        $guess = strtoupper(readline("\nGuess the anagram: "));
        if (in_array($guess, $this->anagrams)) {
            echo "Right. You got it";
            exit;
        }
        echo "Wrong. Try again\n";
        $this->guessWord();
    }
}

$play = new Anagram;
$play->guessWord();
