<?php
    abstract class Family
    {
        public $name;
        function __construct($name)
        {
            $this->name=$name;
        }
        abstract function message();
    }

    class Mother extends Family
    {
        function message()
        {
            echo $this->name,": I am the mother.\n";
        }
    }
    class Father extends Family
    {
        function message()
        {
            echo $this->name,": I am father.\n";
        }
    }

    $name1=new Mother("Nisha");
    $name1->message();
    $name2=new Father("Dasan");
    $name2->message();
?>