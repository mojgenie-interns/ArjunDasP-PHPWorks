<?php
    class MyIterator implements Iterator
    {
        private $items=[];
        private $points=0;
        function __construct($items)
        {
            $this->items=array_values($items);
        }
    }
    $iterator1=new MyIterator(["A","R","J","U","N"]);
    
?>