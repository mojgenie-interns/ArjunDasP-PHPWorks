<?php
    class Sum 
    {
        protected $number1;
        protected $number2;
        function add(int $number1,int $number2)
        {
            return $number1+$number2;
        }
    }

    class Average extends Sum
    {
        function average($number1,$number2)
        {
            return $this->add($number1,$number2)/2;
        }
    }

    $avg1=new Average();
    echo $avg1->average(10,20);
?>