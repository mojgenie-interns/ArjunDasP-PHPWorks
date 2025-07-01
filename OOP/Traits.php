<?php
    trait ReadTwoNumbers
    {
        public $number1;
        public $number2;
        function read()
        {
            $numbers=readline("Enter two numbers: ");
            list($number1,$number2)=explode(" ",$numbers);
            $this->number1=$number1;
            $this->number2=$number2;
        }
    }
    
    class AddTwoNumbers
    {
        use ReadTwoNumbers;
        function sum()
        {
            return $this->number1+$this->number2;
        }

    }

    $sum1=new AddTwoNumbers();
    $sum1->read();
    echo "Sum is ",$sum1->sum();
?>