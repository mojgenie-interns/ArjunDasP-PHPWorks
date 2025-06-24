<?php
     class SumOfTwoNumbers
     {
        public $number1;
        public $number2;
        protected function sum($number1,$number2)
        {
            $this->number1=$number1;
            $this->number2=$number2;
            return $number1+$number2;
        }

     }
     $sum1=new SumOfTwoNumbers();
     echo "Sum is ",$sum1->sum(20,10),"\n";

     class AverageOfTwoNumbers extends SumOfTwoNumbers
     {
        public function average($number1,$number2)
        {
            $this->number1=$number1;
            $this->number2=$number2;
            return $this->sum($number1,$number2)/2;
        }
     }
     $avg1=new AverageOfTwoNumbers();
     echo "Average is ",$avg1->average(20,10);
?>