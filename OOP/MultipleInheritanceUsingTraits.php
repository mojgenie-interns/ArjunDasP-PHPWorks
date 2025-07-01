<?php
    trait ReadFirstNumber
    {
        public $number1;
        function read1($number1)
        {
            $this->number1=$number1;
        }
    }

    trait ReadSecondNumber
    {
        public $number2;
        function read2($number2)
        {
            return $this->number2=$number2;
        }
    }

    class AddTwoNumbers
    {
        use ReadFirstNumber,ReadSecondNumber;
        function sum($number1,$number2)
        {
            return $this->number1+$this->number2;
        }
    }

    $value1=new AddTwoNumbers();
    $value1->read1(20);
    echo $value->number1;
?>