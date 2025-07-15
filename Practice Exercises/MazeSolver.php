<?php
class MazeSolver
{
    private array $maze;
    private int $rows;
    private int $column;
    private array $solution;

    public function __construct(array $maze)
    {
        $this->maze = $maze;
        $this->rows = count($maze);
        $this->column = count($maze[0]);
        $this->solution = array_fill(0, $this->rows, array_fill(0, $this->column, 0));
    }

    public function solve()
    {
        if ($this->findPath(0, 0)) {
            echo "Path found.\n";
            $this->printSolution();
        } else {
            echo "Path not found.\n";
        }
    }

    private function findPath(int $x, int $y)
    {

        if ($x < 0 || $x >= $this->rows || $y < 0 || $y >= $this->column || $this->maze[$x][$y] == 0) {
            return false;
        }

        $this->solution[$x][$y] = 1; //Set path
        $this->maze[$x][$y] = 0; //Mark visited

        if ($x == $this->rows - 1 && $y == $this->column - 1) { //Ending point
            return true;
        }

        //Recursion
        if ($this->findPath($x, $y + 1)) { //Move right
            return true;
        }
        if ($this->findPath($x + 1, $y)) { //Move down
            return true;
        }
        if ($this->findPath($x, $y - 1)) { //Move left
            return true;
        }
        if ($this->findPath($x - 1, $y)) { //Move up
            return true;
        }

        //Backtrack
        $this->solution[$x][$y] = 0;
        $this->maze[$x][$y] = 1;

        return false;
    }

    private function printSolution()
    {
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->column; $j++) {
                echo $this->solution[$i][$j] . " ";
            }
            echo "\n";
        }
    }
}


$maze = [
    [1, 0, 0, 0],
    [1, 1, 0, 1],
    [0, 1, 0, 0],
    [1, 1, 1, 1]
];

$solver = new MazeSolver($maze);
$solver->solve();
