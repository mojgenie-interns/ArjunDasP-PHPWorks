<?php
    abstract class Marks
    {
        protected $mark1,$mark2,$mark3;
        abstract function average():float;
    }

    class AverageOf2 extends Marks
    {
        function __construct($mark1,$mark2)
        {
            $this->mark1=$mark1;
            $this->mark2=$mark2;
        }
        function average(): float
        {
            return ($this->mark1+$this->mark2)/2;
        }
        function __destruct()
        {
            echo "Happy alle?";
        }
    }

    class AverageOf3 extends Marks
    {
        function __construct($mark1,$mark2,$mark3)
        {
            $this->mark1=$mark1;
            $this->mark2=$mark2;
            $this->mark3=$mark3;
        }
        function average(): float
        {
            return ($this->mark1+$this->mark2+$this->mark3)/3;
        }
        function __destruct()
        {
            echo "Mark kuranj poyo?";
        }
    }

    $student1=new AverageOf2(10,20);
    echo "Average mark is ",$student1->average(),PHP_EOL;

    $student2=new AverageOf3(10,20,02);
    echo "Average mark is ",$student2->average();
?>


