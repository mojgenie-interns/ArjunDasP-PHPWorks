<?php

class LinearSearch
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

    public function search()
    {
        $item = readline("\nEnter the number to search: ");
        for ($i = 0; $i < count($this->collection); $i++) {
            if ($this->collection[$i] == $item) {
                echo "Item found.\n";
                return;
            }
        }
        echo "Item not found.
        \n";
    }
}

$search = new LinearSearch();
$search->readItems();
$search->search();
