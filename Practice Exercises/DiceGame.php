<?php

class DiceGame
{
    private int $player1Score = 0;
    private int $player2Score = 0;

    public function rollDice(): int
    {
        return rand(1, 6); // Roll a dice
    }

    public function playGame()
    {
        echo "=== DICE GAME ===\nPlayer 1 vs. Player 2\n";

        $rounds = (int)readline("Enter number of rounds: ");

        for ($i = 1; $i <= $rounds; $i++) {
            echo "\n--- Round $i ---\n";

            sleep(1);
            $p1 = $this->rollDice();
            sleep(1);
            $p2 = $this->rollDice();

            echo "Player 1 rolls: $p1\n";
            echo "Player 2 rolls: $p2\n";

            if ($p1 > $p2) {
                $this->player1Score++;
                echo "Player 1 wins this round.\n";
            } elseif ($p2 > $p1) {
                $this->player2Score++;
                echo "Player 2 wins this round.\n";
            } else {
                echo "It's a tie.\n";
            }
        }

        echo "\n+++ Final Score +++\n";
        echo "Player 1: {$this->player1Score}\n";
        echo "Player 2: {$this->player2Score}\n";

        if ($this->player1Score > $this->player2Score) {
            echo "Player 1 wins the game.\n";
        } elseif ($this->player2Score > $this->player1Score) {
            echo "Player 2 wins the game.\n";
        } else {
            echo "It's a tie game.\n";
        }
    }
}

$game = new DiceGame();
$game->playGame();
