<?php

class TicTacToe {
    private $board;
    private $currentPlayer;

    public function __construct() 
    {
        $this->board = array_fill(0, 3, array_fill(0, 3, ' '));
        $this->currentPlayer = 'X';
    }

    public function displayBoard() 
    {
        echo "\n";
        for($i = 0; $i < 3; $i++) 
        {
            echo " " . $this->board[$i][0] . " | " . $this->board[$i][1] . " | " . $this->board[$i][2] . "\n";
            if($i < 2) echo "---+---+---\n";
        }
        echo "\n";
    }

    public function play() 
    {
        $turns = 0;
        while (true) 
        {
            $this->displayBoard();
            echo "Enter your move, player {$this->currentPlayer}: ";
            fscanf(STDIN, "%d %d", $row, $col);

            if($this->isValidMove($row, $col)) 
            {
                $this->board[$row][$col] = $this->currentPlayer;
                $turns++;

                if($this->checkWinner()) 
                {
                    $this->displayBoard();
                    echo "Player {$this->currentPlayer} wins.\n";
                    break;
                }

                if($turns === 9) 
                {
                    $this->displayBoard();
                    echo "It's a draw.\n";
                    break;
                }

                $this->switchPlayer();
            } 
            else 
            {
                echo "Invalid move. Try again.\n";
            }
        }
    }

    private function isValidMove($row, $col) 
    {
        return $row >= 0 && $row < 3 && $col >= 0 && $col < 3 && $this->board[$row][$col] === ' ';
    }

    private function switchPlayer() 
    {
        $this->currentPlayer = $this->currentPlayer === 'X' ? 'O' : 'X';
    }

    private function checkWinner() 
    {
        $b = $this->board;
        for ($i = 0; $i < 3; $i++) 
        {
            if ($b[$i][0] === $b[$i][1] && $b[$i][1] === $b[$i][2] && $b[$i][0] !== ' ') return true;
            if ($b[0][$i] === $b[1][$i] && $b[1][$i] === $b[2][$i] && $b[0][$i] !== ' ') return true;
        }
        if ($b[0][0] === $b[1][1] && $b[1][1] === $b[2][2] && $b[0][0] !== ' ') return true;
        if ($b[0][2] === $b[1][1] && $b[1][1] === $b[2][0] && $b[0][2] !== ' ') return true;
        return false;
    }
}

$game = new TicTacToe();
$game->play();
