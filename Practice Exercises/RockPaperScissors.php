<?php

class RockPaperScissors
{
    private $player1;
    private $player2;

    function humanMove()
    {
        echo "1. Rock\n2. Paper\n3. Scissors";
        $choice = readline("\nSelect the move: ");
        if ($choice == 1) {
            $this->player1 = "Rock";
        } elseif ($choice == 2) {
            $this->player1 = "Paper";
        } elseif ($choice == 3) {
            $this->player1 = "Scissors";
        } else {
            echo "Invalid move. Try again.\n";
            $this->humanMove();
        }
    }

    function computerMove()
    {
        $options = ["Rock", "Paper", "Scissors"];
        $randomIndex = array_rand($options);
        $this->player2 = $options[$randomIndex];
        echo "Computer chose: {$this->player2}\n";
    }

    function playGame()
    {
        if (($this->player1 == "Rock" && $this->player2 == "Scissors") ||
            ($this->player1 == "Scissors" && $this->player2 == "Paper") ||
            ($this->player1 == "Paper" && $this->player2 == "Rock")
        ) {
            echo "\nYou won.\n";
        } elseif (($this->player2 == "Rock" && $this->player1 == "Scissors") ||
            ($this->player2 == "Scissors" && $this->player1 == "Paper") ||
            ($this->player2 == "Paper" && $this->player1 == "Rock")
        ) {
            echo "\nComputer won.\n";
        } else {
            echo "\nIt's a tie.\n";
        }
    }

    function run()
    {
        echo "\n🪨 x 📄 x ✂️\n";
        $this->humanMove();
        sleep(1);
        $this->computerMove();
        sleep(1);
        $this->playGame();
    }
}

$game = new RockPaperScissors();
$game->run();
