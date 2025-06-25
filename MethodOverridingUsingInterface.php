<?php
    interface AreaOfShape
    {
        function area();
    }
    
    class Square implements AreaOfShape
    {
        function area(float $length)
        {
            $this->length=$length;
            echo "Area of square is ",$length**2,PHP_EOL;
        }
    }

    class Rectangle implements AreaOfShape
    {
        function area(float $length,float $breadth)
        {
            $this->length=$length;
            $this->breadth=$breadth;
            echo "Area of rectangle is ",$length*$breadth,PHP_EOL;
        }
    }

?>