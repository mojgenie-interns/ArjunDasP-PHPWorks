<?php

class Hangman
{
    private string $word;
    private array $guessedLetters = [];

    public function __construct(string $word)
    {
        $this->word = strtoupper($word);
    }

    public function displayLetters()
    {
        echo "\n";
        foreach (str_split($this->word) as $char) {
            if (in_array($char, $this->guessedLetters)) {
                echo " $char ";
            } else {
                echo " _ ";
            }
        }
        echo PHP_EOL;
    }

    private function hasWon(): bool
    {
        foreach (str_split($this->word) as $char) {
            if (!in_array($char, $this->guessedLetters)) {
                return false;
            }
        }
        return true;
    }

    public function play()
    {
        $chances = 7;
        while ($chances > 0) {
            $this->displayLetters();

            $letter = trim(strtoupper(readline("Enter a letter: ")));

            if (strlen($letter) !== 1) {
                echo "Enter a single alphabet letter.\n";
                continue;
            }

            if (in_array($letter, $this->guessedLetters)) {
                echo "You've already guessed '$letter'. Try another letter.\n";
                continue;
            }

            $this->guessedLetters[] = $letter;

            if (strpos($this->word, $letter) === false) {
                $chances--;
                echo "Wrong guess! $chances chances left.\n";
            } else {
                echo "Good guess.\n";
            }

            if ($this->hasWon()) {
                echo "\nCongratulations. You guessed the word: $this->word\n";
                return;
            }
        }

        echo "Game over! The word was: $this->word\n";
    }
}

$game = new Hangman("master");
$game->play();
