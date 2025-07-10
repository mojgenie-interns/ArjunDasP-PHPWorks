<?php
class Maze
{
    private $width;
    private $height;
    private $maze = [];

    public function __construct($width, $height)
    {
        // Ensure odd dimensions
        $this->width = ($width % 2 == 0) ? $width + 1 : $width;
        $this->height = ($height % 2 == 0) ? $height + 1 : $height;
        $this->initMaze();
        $this->carve(1, 1);
        $this->maze[1][1] = 'S'; // Start
        $this->maze[$this->height - 2][$this->width - 2] = 'E'; // End
    }

    private function initMaze()
    {
        for ($y = 0; $y < $this->height; $y++) {
            for ($x = 0; $x < $this->width; $x++) {
                $this->maze[$y][$x] = '#';
            }
        }
    }

    private function carve($x, $y)
    {
        $directions = [[2, 0], [-2, 0], [0, 2], [0, -2]];
        shuffle($directions);

        foreach ($directions as [$dx, $dy]) {
            $nx = $x + $dx;
            $ny = $y + $dy;

            if ($nx > 0 && $ny > 0 && $nx < $this->width - 1 && $ny < $this->height - 1) {
                if ($this->maze[$ny][$nx] === '#') {
                    $this->maze[$ny][$nx] = ' ';
                    $this->maze[$y + $dy / 2][$x + $dx / 2] = ' ';
                    $this->carve($nx, $ny);
                }
            }
        }
    }

    public function display()
    {
        foreach ($this->maze as $row) {
            foreach ($row as $cell) {
                echo $cell;
            }
            echo PHP_EOL;
        }
    }
}

// Example usage
$maze = new Maze(21, 11);
$maze->display();
