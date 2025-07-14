<?php
class DiceRollerSimulator
{
    private $sides = [
        1 => "
+-------+
|       |
|   o   |
|       |
+-------+",
        2 => "
+-------+
| o     |
|       |
|     o |
+-------+",
        3 => "
+-------+
| o     |
|   o   |
|     o |
+-------+",
        4 => "
+-------+
| o   o |
|       |
| o   o |
+-------+",
        5 => "
+-------+
| o   o |
|   o   |
| o   o |
+-------+",
        6 => "
+-------+
| o   o |
| o   o |
| o   o |
+-------+",
    ];

    public function rollDice()
    {
        echo "Rolling...";
        sleep(3);
        $number = array_rand($this->sides);
        echo $this->sides[$number] . "\n";
    }
}

$dice = new DiceRollerSimulator();
$dice->rollDice();
