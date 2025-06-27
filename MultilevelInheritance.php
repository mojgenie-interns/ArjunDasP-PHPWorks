<?php

    class ReadNumbers
    {
        public float $number1;
        public float $number2;
        function read()
        {
            $numbers=readline("Enter the numbers: ");
            list($this->number1,$this->number2)=explode(" ",$numbers);
        }
    }

    class AddNumbers extends ReadNumbers
    {
        function add():float
        {
            return $this->number1+$this->number2;
        }
    }

    class Average extends AddNumbers
    {
        function avg():float
        {
            return $this->add()/2;
        }
    }

    $avg1=new Average();
    $avg1->read();
    echo "Sum=",$avg1->add(),PHP_EOL;
    echo "Average=",$avg1->avg(),PHP_EOL;
?>