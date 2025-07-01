<?php
    interface Area
    {
        function area();
    }

    class AreaOfSquare implements Area
    {
        private $length;
        function __construct($length)
        {
            $this->length=$length;
        }
        function area()
        {
            return $this->length**2;
        }
    }

    class AreaOfCircle implements Area
    {
        private $length;
        private $breadth;
        function __construct($length,$breadth)
        {
            $this->breadth=$breadth;
            $this->length=$length;
        }
        function area()
        {
            return $this->length*$this->breadth;
        }
    }

    $area1=new AreaOfSquare(3);
    echo "Area of square is ",$area1->area(),PHP_EOL;
    $area2=new AreaOfCircle(2,3);
    echo "Area of rectangle is ",$area2->area();
?>