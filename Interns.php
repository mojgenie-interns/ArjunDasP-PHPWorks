<?php
    class Interns
    {
        public $number;
        public $name;
        function readNumber()
        {
            $number=readline("Enter the number: ");
            $this->number=$number;
        }
        function readName()
        {
            $name=readline("Enter the name: ");
            $this->name=$name;
        }
        function printDetails()
        {
            echo "Intern $this->number: $this->name";
        }
        
    }
    $intern1=new Interns();
    $intern1->readNumber();
    $intern1->readName();
    $intern1->printDetails();
?>