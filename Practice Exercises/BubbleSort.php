<?php

class BubbleSort
{

    public $items = [];

    function __construct()
    {
        $input = readline("Enter the items: ");
        $this->items = array_map('intval', explode(" ", trim($input)));
    }

    public function sort()
    {
        echo "After sorting: ";
        $count = count($this->items);

        for ($i = 0; $i < $count - 1; $i++) { //Pass
            for ($j = 0; $j < $count - $i - 1; $j++)
                if ($this->items[$j] > $this->items[$j + 1]) {
                    $temp = $this->items[$j];
                    $this->items[$j] = $this->items[$j + 1];
                    $this->items[$j + 1] = $temp;
                }
        }

        foreach ($this->items as $item) {

            echo $item . " ";
        }
    }
}

$object = new BubbleSort();
$object->sort();
