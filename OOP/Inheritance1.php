<?php
    class Crews
    {
        public $writer;
        public $director;
    
        function __construct($director,$writer)
        {
            $this->writer=$writer;
            $this->director=$director;
        }
        function crewDetails()
        {
            return "\nDirected by $this->director\nWritten by $this->writer\n";
        }
    }
    
    // $crew1=new Crews("Arjun Nishadasan","Arjun Nishadasan, Abhiram Sugathan and Jothish VS");
    // echo $crew1->crewDetails();

    class Films extends Crews
    {
        public $title;
        function __construct($title)
        {
            $this->title=$title;
            echo $this->title;
            $this->crewDetails();
        }
    }

    $film1=new Films("VAVAL");
    $film1=new Crews("Arjun Nishadasan","Arjun Nishadasan, Abhiram Sugathan and Jothish VS\n");
    echo $film1->crewDetails();

    $film2=new Films("KHANAM");
    $film2=new Crews("Vysakh","Arjun Nishadasan, Abhiram Sugathan and Jothish VS\n");
    echo $film1->crewDetails();
?>