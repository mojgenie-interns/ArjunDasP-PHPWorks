<?php
    interface Read
    {
        function readNumber();
    }

    class ReadFirstNumber implements Read
    {
        public $number1;
        function readNumber()
        {
            $this->number1=readline("Enter the first number: ");
        }
    }

    class ReadSecondNumber implements Read
    {
        var $number2;
        function readNumber()
        {
            $this->number2=readline("Enter the second number: ");
        }
    }

    $read1=new ReadFirstNumber();
    $read2=new ReadSecondNumber();
    $read1->readNumber();
    $read2->readNumber();
    echo "$read1->number1+$read2->number2=".$read1->number1+$read2->number2;
?>