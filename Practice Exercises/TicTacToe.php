<?php

    enum Mark 
    {
        case X;
        case O;
    }

    enum BoardState 
    {
        case Playing;
        case XWon;
        case OWon;
        case Tie;
    }

    // Exceptions
    class CellAlreadyFilledException extends Exception{}
    class InvalidBoardPositionException extends Exception{}

    interface BoardDisplayInterface 
    {
        function display(board $board): void;
    }


    class Position 
    {
        public int $row;
        public int $column;

        function __construct(int $row,int $column) 
        {
            $this->row = $row;
            $this->column = $column;
        }
    }

    class Cell 
    {
        private ?Mark $mark = null;

        function isEmpty(): bool 
        {
            return $this->mark === null;
        }

        function getMark(): ?Mark 
        {
            return $this->mark;
        }

        function setMark(mark $mark): void 
        {
            if (!$this->isEmpty())
                throw new CellAlreadyFilledException("Cell already filled.");
            $this->mark = $mark;
        }
    }

    class Board 
    {
        private int $size;
        private array $cells;

        function __construct(int $size = 3) 
        {
            $this->size = $size;
            $this->cells = [];
            for ($i = 0; $i < $size; $i++) 
            {
                for ($j = 0; $j < $size; $j++)
                    $this->cells[$i][$j] = new Cell();
            }
        }

        function getSize(): int 
        {
            return $this->size;
        }

        function getCell(Position $pos): Cell 
        {
            return $this->cells[$pos->row][$pos->column];
        }

        function placeMark(Position $pos, Mark $mark): void 
        {
            $this->getCell($pos)->setMark($mark);
        }

        function checkWinner(): ?Mark 
        {
            $size = $this->size;

            // Rows and Columns
            for ($i = 0; $i < $size; $i++) 
            {
                $rowMark = $this->cells[$i][0]->getMark();
                $colMark = $this->cells[0][$i]->getMark();

                if ($rowMark !== null && $rowMark === $this->cells[$i][1]->getMark() && $rowMark === $this->cells[$i][2]->getMark()) 
                    {
                        return $rowMark;
                    }

                if ($colMark !== null && $colMark === $this->cells[1][$i]->getMark() && $colMark === $this->cells[2][$i]->getMark()) {
                    return $colMark;
                }
            }

            // Diagonals
            $center = $this->cells[1][1]->getMark();
            if ($center !== null) 
            {
                if ($center === $this->cells[0][0]->getMark() && $center === $this->cells[2][2]->getMark())
                    return $center;

                if ($center === $this->cells[0][2]->getMark() && $center === $this->cells[2][0]->getMark())
                    return $center;
            }

            return null;
        }

        function isFull(): bool 
        {
            foreach ($this->cells as $row) 
            {
                foreach ($row as $cell) 
                {
                    if ($cell->isEmpty()) return false;
                }
            }
            return true;
        }

        function getCells(): array 
        {
            return $this->cells;
        }
    }

    abstract class Player 
    {
        protected string $name;
        protected Mark $mark;

        function __construct(string $name, Mark $mark) 
        {
            $this->name = $name;
            $this->mark = $mark;
        }

        function getMark(): Mark 
        {
            return $this->mark;
        }

        function getName(): string 
        {
            return $this->name;
        }

        abstract function getMove(Board $board): Position;
    }

    class HumanPlayer extends Player 
    {
        function getMove(Board $board): Position 
        {
            while (true) 
            {
                $input = readline("Enter row and column, {$this->name} - {$this->mark->name}: ");
                [$row, $column] = explode(" ", $input);
                $pos = new Position((int)$row, (int)$column);
                try 
                {
                    if ($row < 0 || $row > 2 || $column < 0 || $column > 2)
                        throw new InvalidBoardPositionException("Invalid position.");
                    if (!$board->getCell($pos)->isEmpty())
                        throw new CellAlreadyFilledException("Cell already filled.");
                    return $pos;
                } 
                catch (Exception $e)
                {
                    echo $e->getMessage() . PHP_EOL;
                }
            }
        }
    }

    // Display
    class ConsoleBoxedDisplay implements BoardDisplayInterface {
        function display(Board $board): void 
        {
            echo PHP_EOL;
            for ($i = 0; $i < $board->getSize(); $i++) 
            {
                for ($j = 0; $j < $board->getSize(); $j++) 
                {
                    $mark = $board->getCells()[$i][$j]->getMark();
                    echo "[" . ($mark?->name ?? " ") . "]";
                }
                echo PHP_EOL;
            }
        }
    }

    class Game 
    {
        private Board $board;
        private Player $player1;
        private Player $player2;
        private BoardDisplayInterface $display;

        function __construct(Player $p1, Player $p2, BoardDisplayInterface $display) 
        {
            $this->board = new Board();
            $this->player1 = $p1;
            $this->player2 = $p2;
            $this->display = $display;
        }

        function play(): void 
        {
            $currentPlayer = $this->player1;

            while (true) 
            {
                $this->display->display($this->board);
                $position = $currentPlayer->getMove($this->board);
                $this->board->placeMark($position, $currentPlayer->getMark());

                $winner = $this->board->checkWinner();
                if ($winner !== null) 
                {
                    $this->display->display($this->board);
                    echo "Player {$currentPlayer->getName()} ({$winner->name}) wins\n";
                    break;
                }

                if ($this->board->isFull()) 
                {
                    $this->display->display($this->board);
                    echo "It is a tie\n";
                    break;
                }

                $currentPlayer = $currentPlayer === $this->player1 ? $this->player2 : $this->player1;
            }
        }
    }

    // Runner
    $player1=readline("Enter the name of player 1: ");
    $player2=readline("Enter the name of player 2: ");
    $p1 = new HumanPlayer($player1, Mark::X);
    $p2 = new HumanPlayer($player2, Mark::O);
    $display = new ConsoleBoxedDisplay();
    $game = new Game($p1, $p2, $display);
    $game->play();

?>
