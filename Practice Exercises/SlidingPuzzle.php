<?php
class SlidingPuzzle
{
    private $board;
    private $size = 3;

    public function __construct()
    {
        $this->initializeBoard();
        $this->shuffleBoard(10); // do only 10 random valid moves from solved state
    }

    private function initializeBoard()
    {
        $this->board = [];
        $num = 1;
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                $this->board[$i][$j] = $num;
                $num++;
            }
        }
        $this->board[$this->size - 1][$this->size - 1] = 0; // empty space
    }

    private function shuffleBoard($moves)
    {
        for ($i = 0; $i < $moves; $i++) {
            $this->doRandomMove();
        }
    }

    private function doRandomMove()
    {
        list($emptyRow, $emptyCol) = $this->findEmpty();
        $directions = [
            [-1, 0],
            [1, 0],
            [0, -1],
            [0, 1]
        ];
        shuffle($directions);

        foreach ($directions as [$dr, $dc]) {
            $newRow = $emptyRow + $dr;
            $newCol = $emptyCol + $dc;

            if ($this->isValid($newRow, $newCol)) {
                $this->swap($emptyRow, $emptyCol, $newRow, $newCol);
                return;
            }
        }
    }

    private function isValid($row, $col)
    {
        return $row >= 0 && $row < $this->size && $col >= 0 && $col < $this->size;
    }

    private function swap($row1, $col1, $row2, $col2)
    {
        $temp = $this->board[$row1][$col1];
        $this->board[$row1][$col1] = $this->board[$row2][$col2];
        $this->board[$row2][$col2] = $temp;
    }

    private function printBoard()
    {
        echo "\n";
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                $cell = $this->board[$i][$j];
                echo $cell === 0 ? "   " : str_pad($cell, 2, " ", STR_PAD_LEFT) . " ";
            }
            echo "\n";
        }
        echo "\n";
    }

    private function findEmpty()
    {
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                if ($this->board[$i][$j] === 0) {
                    return [$i, $j];
                }
            }
        }
        return null;
    }

    private function moveTile($tile)
    {
        list($emptyRow, $emptyCol) = $this->findEmpty();

        $directions = [
            [-1, 0],
            [1, 0],
            [0, -1],
            [0, 1]
        ];

        foreach ($directions as [$dr, $dc]) {
            $newRow = $emptyRow + $dr;
            $newCol = $emptyCol + $dc;

            if ($this->isValid($newRow, $newCol) && $this->board[$newRow][$newCol] == $tile) {
                $this->swap($emptyRow, $emptyCol, $newRow, $newCol);
                return true;
            }
        }
        return false;
    }

    private function isSolved()
    {
        $num = 1;
        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                if ($i == $this->size - 1 && $j == $this->size - 1) {
                    if ($this->board[$i][$j] !== 0) return false;
                } else {
                    if ($this->board[$i][$j] !== $num) return false;
                    $num++;
                }
            }
        }
        return true;
    }

    public function play()
    {
        while (true) {
            $this->printBoard();

            if ($this->isSolved()) {
                echo "Congratulations! You solved the puzzle!\n";
                break;
            }

            $input = readline("Tile to move: ");
            $tile = intval($input);

            if (!$this->moveTile($tile)) {
                echo "Can't move tile $tile. Try another tile.\n";
            }
        }
    }
}

$game = new SlidingPuzzle();
$game->play();
