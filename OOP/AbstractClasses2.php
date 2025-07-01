<?php
    abstract class Marks
    {
        protected $mark1,$mark2,$mark3;
        abstract function average():float;
    }

    class Students extends Marks
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
    }

    $student1=new Students(10,20,30);
    echo "Average mark is ",$student1->average();
?>


