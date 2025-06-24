<?php
    class NumbersFromOneToTen implements Iterator
    {
        private $numbers;
        private $index=0;
        function __construct($numbers)
        {
            $this->numbers=$numbers;
        }
        function current(): mixed
        {
            return $this->numbers[$this->index];
        }
        function next(): void
        {
            ++$this->index;
        }
        function key(): mixed
        {
            return $this->index;
        }
        function valid(): bool
        {
            return isset($this->numbers[$this->index]);
        }
        function rewind(): void
        {
            $this->index=0;
        }
    }

    $firstRun=new NumbersFromOneToTen([1,2,3,4,5,6,7,8,9,10]);

    foreach($firstRun as $key=>$value)
    {
        echo "$key: $value".PHP_EOL;
    }
?>