<?php
    class AreaOfShape
    {
        public $length;
        public $breadth;
        function area(float $length)
        {
            $this->length=$length;
            echo "Area of square is ",$length**2,PHP_EOL;
        }
        function area(float $length,float $breadth)
        {
            $this->length=$length;
            $this->breadth=$breadth;
            echo "Area of rectangle is ",$length*$breadth,PHP_EOL;
        }
    }

    $square1=new AreaOfShape();
    $square1->area(4);
    $rectangle1=new AreaOfShape();
    $rectangle1->area(10,20);
?>