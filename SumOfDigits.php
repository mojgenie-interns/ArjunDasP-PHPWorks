<?php
    class SumOfDigits
    {
        public $originalNumber;
        public $sum;
        function __construct()
        {
            $this->originalNumber=readline("Enter the number: ");
        }
        function sum()
        {
            $number=$this->originalNumber;
            $sum=0;
            while($number>0)
            {
                $sum+=$number%10;
                $number=(int) ($number/10);
            }
            echo "Sum of digits of $this->originalNumber is ",$sum;
        }
    }

    $number1=new SumOfDigits();
    $number1->sum();
?>