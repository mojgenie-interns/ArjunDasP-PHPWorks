<?php

class WordCounter
{
    private $sentence;
    function __construct() {}

    function readSentence()
    {
        $this->sentence = readline("Enter the sentence: ");
    }

    function countWords()
    {
        $this->readSentence();
        $words = explode(" ", $this->sentence);
        $count = count($words);
        echo "There are " . $count . " words in the sentence.";
    }
}

$string = new WordCounter;
$string->countWords();
