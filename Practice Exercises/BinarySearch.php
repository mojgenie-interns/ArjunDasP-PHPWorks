<?php

class BinarySearch
{
    public int $size;
    public array $collection;

    function __construct()
    {
        $this->size = (int)readline("Enter the size of array: ");
        $this->collection = [];
    }

    function readItems()
    {
        echo "Enter $this->size numbers:\n";
        for ($i = 0; $i < $this->size; $i++) {
            $item = (int)readline("");
            $this->collection[] = $item; //Inserting into array without specifying index
        }

        sort($this->collection); //Sorted

        //Displaying the array
        echo "Array: ";
        foreach ($this->collection as $item) {
            echo $item . " ";
        }
        echo "\n";
    }

    function search()
    {
        $number = readline("\nEnter the number to search: ");

        $start = 0;
        $end = $this->size - 1;
        $middle = (int) (($start + $end) / 2);

        while ($start <= $end) {
            if ($number == $this->collection[$middle]) {
                echo "Item found.";
                return;
            } elseif ($number < $this->collection[$middle]) {
                $end = $middle - 1;
            } else
                $start = $middle + 1;
            $middle = (int) (($start + $end) / 2);
        }
        echo "Item not found.";
    }
}

$search = new BinarySearch();
$search->readItems();
$search->search();
