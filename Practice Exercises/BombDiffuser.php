<?php

class BombDiffuser
{
    public $wires = [];
    public $correctWire;

    function __construct()
    {
        $this->wires = ['red', 'green', 'blue', 'yellow'];
        $this->correctWire = $this->wires[array_rand($this->wires)];
    }

    public function diffuser()
    {
        sleep(2);
        echo "Bomb is active.\n";
        sleep(2);
        $wire = strtolower(trim(readline("\nChoose a wire to cut (" . implode(", ", $this->wires) . "): ")));
        sleep(2);
        if ($wire !== $this->correctWire) {
            sleep(2);
            echo "\nWrong wire. The bomb has exploded💥\n";
            sleep(2);
            echo "\nCorrect wire was {$this->correctWire}.\n";
            return;
        }
        sleep(2);
        echo "\nCorrect wire cut. Bomb disarmed successfully.\n";
    }
}

$diffuse = new BombDiffuser();
$diffuse->diffuser();
