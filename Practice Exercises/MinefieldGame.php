<?php
class MineField
{
    public $field = [];
    public $mines = [4, 7, 10, 13]; // adjusted to match row cells: last cell of each row

    function __construct()
    {
        for ($i = 1; $i <= 16; $i++) {
            $this->field[$i] = (string)$i;
        }
        // Mark starting position
        // $this->field[1] = '🧑';
    }

    public function display()
    {
        echo "\n";
        for ($i = 1; $i <= 16; $i += 4) {
            echo "+-----+-----+-----+-----+\n";
            echo "|";
            for ($j = 0; $j < 4; $j++) {
                $val = $this->field[$i + $j];
                echo " " . str_pad($val, 3) . " |";
            }
            echo "\n";
        }
        echo "+-----+-----+-----+-----+\n";
    }

    public function escape()
    {
        $row = 1;
        while ($row <= 4) {
            $start = ($row - 1) * 4 + 1; // e.g., 1,5,9,13
            $end = $start + 3;           // e.g., 4,8,12,16

            $index = (int)readline("\nChoose a cell from row $row (cell number between $start and $end): ");

            if ($index < $start || $index > $end) {
                echo "\nInvalid choice! Please choose a cell from row $row (between $start and $end)\n";
                continue;
            }

            if (in_array($index, $this->mines)) {
                $this->field[$index] = '💣';
                $this->display();
                echo "\nMINE!!! Game Over.\n";
                return;
            } else {
                // Clear previous '🧑'
                foreach ($this->field as $k => $v) {
                    if ($v === '🧑') $this->field[$k] = (string)$k;
                }
                $this->field[$index] = '🧑';
                echo "\nSAFE! Go to the next level.\n";
                $this->display();
                $row++;
            }
        }

        echo "\nCongratulations! You escaped the minefield safely.\n";
    }
}

$object = new MineField();
$object->display();
$object->escape();
