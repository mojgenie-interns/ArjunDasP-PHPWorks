<?php

    interface AreaOfShape
    {
        const PI=3.14159265359;
        function area(float $value);
    }
    
    class AreaOfSquare implements AreaOfShape
    {
        function area($length)
        {
            return $length**2;
        }
    }

    class AreaOfCircle implements AreaOfShape
    {
        function area($radius)
        {
            return AreaOfShape::PI*$radius**2;
        }
    }

    $area1=new AreaOfCircle();
    echo "Area of circle is ",$area1->area(2).PHP_EOL;
    $area2=new AreaOfSquare();
    echo "Area of square is ",$area2->area(100).PHP_EOL;
?>